<div class="box box-profil arrow-top is-hidden" id="profil-box" tabindex="0" style="padding-bottom: 5px !important">
    <style>

        .menu-item{
            text-decoration: none;
        }
        .boutique-avatar {
            font-weight: 900;
            background-color: #fff;
            width: 31px;
            height: 31px;
            border-radius: 50%; font-size: 25px;
            font-weight: 900;
            border: 1px solid #d8d8d8;
        }

        .menu-hidden {
            display: none !important;
        }

        .profil-avatar-box-element {
            width: 31px;
            height: 31px;
            border-radius: 6px;
            background-color: #fff;
            font-weight: 900;
            font-size: 25px;
            font-weight: 900;
            border: 1px solid #d8d8d8;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 15px;
            position: relative;
            left: 2.5px;
        }
    </style>

    @if (!\Illuminate\Support\Facades\Auth::check())
        <div class="guest-menu" id="user-no-connexion-option">
            <div class="welcome-on-toulemarket">
                Bienvenue sur <b style="color:#D0021B">TOUL&#200;</b> <b style="color:#191970">Market</b>
            </div>
            <div class="btn-inscription-basic" onclick="showLoginRegister()" >
                <span id="register-login-spinner" style="position: absolute; margin-left: -34px; margin-top: 1.5px; width: 27px; height: 27px" class="spinner-border modal-loading-spinner" role="status" ></span>
                Se connecter / S’inscrire
            </div>
            <a href="javascript:;" class="d-none" data-toggle="modal" id="register-login" data-target="#registerLoginModal"></a>

            <div class="autre-choix-connexion-ou">OU</div>
            <div class="autre-choix-connexion">
            </div>

           <div class="connexion-facebook" onclick="document.getElementById('facebook-auth-bis-1').click()"> 
           {{-- <div class="connexion-facebook" onclick="go_to_facebook()"> --}}
                <div class="icon-facebook"><img src="{{ asset('assets/images/facebook.svg') }}" alt=""></div>
                <div class="text-facebook">Continuer avec Facebook</div>
            </div>

            <div class="connexion-google" onclick="document.getElementById('google-auth-1').click()" >
                <a id="google-auth-1" href="{{ url('/google-auth') }}" hidden class="d-none">connexion avec google</a>
                <div class="icon-google"><img src="{{ asset('assets/images/google.png') }}" alt=""></div>
                <div class="text-google">Continuer avec Google</div>
            </div>

            <a href="{{url('/facebook/oauth')}}" style="visibility: hidden" id="facebook-auth-bis-1" ></a>

        </div>
    @else
        <div class="user-name">
            <div class="user-image">
                <img src="{{ \App\User::getImage() }}" alt="">
            </div>
            <div class="box-user-info">
                <p class="p-0 m-0 p1">{{ \Illuminate\Support\Facades\Auth::user()->getNom() }}<br>{{ \Illuminate\Support\Facades\Auth::user()->getPrenom() }}</p>
                <p class="p-0 m-0 p2">{{ \Illuminate\Support\Facades\Auth::user()->customId() }}</p>
                <input type="hidden" id="id_user_prod_game" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
            </div>
        </div>  

        <!-- script pour recupeer l'id du user -->
        
    @endif

    <div class="user-name menu-hidden" id="user-infos-auto-menu">
        <div class="user-image">
            <img src="" alt="" id="u-img-auto">
        </div>
        <div class="box-user-info">
            <p class="p-0 m-0 p1" id="guest-user-nom-prenom-connexion">  </p>
            <p class="p-0 m-0 p2" id="guest-user-key-connexion">  </p>
        </div>
    </div>

    <hr class="m-0 p-0" style="margin-bottom: 6px !important;">

    <ul class="liste-menu" >
        @if(\Illuminate\Support\Facades\Auth::check())
        <li class="">
        @else
        <li class="menu-hidden" id="mon-profil-auto-menu" >
        @endif
            <a href="javascript:;" onclick="document.getElementById('test').click()" class="menu-item">
                <div class="d-flex">
                    <div class="menu-item-icon">
                        <img class="mute-img" src="{{ asset('assets/images/user1.svg') }}" alt="">
                        <img class="hover-img" src="{{ asset('assets/images/user-icon-blue.svg') }}" alt="">
                    </div>
                    <div class="menu-item-text">
                        Mon profil
                    </div>
                </div>
            </a>
        </li>
        {{-- @endif --}}
        <li class="">
            <a href="javascript:;"  class="menu-item" id="voir_panier_bis" onclick="loadPanier()">
                {{-- <div class="d-flex">
                    <div class="menu-item-icon">
                        <img class="mute-img" src="{{ asset('assets/images/Panier_1.svg') }}" alt="">
                        <img class="hover-img" src="{{ asset('assets/images/Pannier_over.svg') }}" alt="">
                    </div>
                    <div class="menu-item-text" style="border: none !important; ">
                        Mon panier
                    </div>
                </div> --}}

                <div class="d-flex">
                    <div class="menu-item-icon" >

                        <div class="panier-icon-section" id="show-panier-menu" >
                            <img class="mute-img" src="{{ asset('assets/images/Panier_1.svg') }}" alt="">
                            <img class="hover-img" src="{{ asset('assets/images/Pannier_over.svg') }}" alt="">
                        </div>

                        <div class="load-panier-spinner">
                            <span id="show-panier-spinner" style="position: relative; margin-left: -12px; width: 20px; height: 20px" class="spinner-border modal-loading-spinner" role="status" ></span>
                        </div>

                    </div>
                   
                    <div class="menu-item-text" style="border: none !important; ">
                        Mon panier
                    </div>
                </div>

                @if(isset($_SESSION['panier']) && count($_SESSION['panier']) > 0)
                @php
                    $nbre_element = 0;
                    for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
                        $nbre_element += $_SESSION['panier'][$i]['quantite'];
                    }
                @endphp
                <div class="menu-item-counter text-center" id="nbr_panier">
                    {{ $nbre_element }}
                </div>
                <span id="nbr_panier2_hidden" style="visibility:hidden; position: absolute">
                    {{ $nbre_element }}
                </span>

                @else <span class="" id="nbr_panier"></span>
                @endif
            </a>
        </li>

        @if(\Illuminate\Support\Facades\Auth::check())
        <li class="">
        @else
        <li class="menu-hidden" id="mes-com-auto-menu">
        @endif
        <a href="javascript:;" class="menu-item">
            <div class="d-flex" id="voir_commandes">
                <div class="menu-item-icon">
                    <img class="mute-img" src="{{ asset('assets/images/commande1.svg') }}" alt="">
                    <img class="hover-img" src="{{ asset('assets/images/commande-icon-blue.svg') }}" alt="">
                </div>
                <div class="menu-item-text">
                    Mes commandes
                </div>
            </div>

            @if(isset($_SESSION['commande_client']) >0)
            <div class="menu-item-counter" id="nbr_commande" style="text-align: center">
                {{$_SESSION['commande_client']}}
            </div>
            @else
            <div class="menu-item-counter" id="nbr_commande" style="text-align: center"></div>
         @endif
        </a>
    </li>

        <li class="">
            <a href="javascript:;" class="menu-item">
                <div class="d-flex">
                    <div class="menu-item-icon">
                        <img class="mute-img" src="{{ asset('assets/images/heart_outline.svg') }}" alt="">
                        <img class="hover-img" src="{{ asset('assets/images/favoris-icon-blue.svg') }}" alt="">
                    </div>
                    <div class="menu-item-text">
                        Mes favoris
                    </div>
                </div>
                    @if(isset($_SESSION['favori']) && count($_SESSION['favori'])>0)
                        <div class="menu-item-counter text-center" id="nbr_favorie">
                            {{count($_SESSION['favori'])}}
                        </div>
                        @else
                        <div class="menu-item-counter text-center menu-hiddenL" id="nbr_favorie28"></div>
                     @endif


            </a>
        </li>
        @if(\Illuminate\Support\Facades\Auth::check())
        <li class="">
        @else
        <li class="menu-hidden" id="mon-historique-auto-menu">
        @endif
            <a href="javascript:;" class="menu-item">
                <div class="d-flex">
                    <div class="menu-item-icon">
                        <img class="mute-img" src="{{ asset('assets/images/Historique.svg') }}" alt="">
                        <img class="hover-img" src="{{ asset('assets/images/historique-icon-blue.svg') }}" alt="">
                    </div>
                    <div class="menu-item-text">
                        Mon historique
                    </div>
                </div>
            </a>
            </li>

            @if(\Illuminate\Support\Facades\Auth::check())
            <li class="">
            @else
            <li class="menu-hidden" id="mon-carnet-addr-auto-menu">
            @endif
                <a href="javascript:;" class="menu-item">
                    <div class="d-flex">
                        <div class="menu-item-icon">
                            <img class="mute-img" src="{{ asset('assets/images2/calendar _1.svg') }}" alt="">
                            <img class="hover-img" src="{{ asset('assets/images/adresse-icon-blue.svg') }}" alt="">
                        </div>
                        <div class="menu-item-text">
                            Carnet d'adresse
                        </div>
                    </div>
                </a>
            </li>
        {{-- @endif --}}
        <li class="" style="margin-bottom: 6px;">
            <a href="javascript:;" class="menu-item">
                <div class="d-flex">
                    <div class="menu-item-icon">
                        <img class="mute-img" src="{{ asset('assets/images/help_circle_outline.svg') }}" alt="">
                        <img class="hover-img" src="{{ asset('assets/images/help-icon-blue.svg') }}" alt="">
                    </div>
                    <div class="menu-item-text">
                        Centre d'aide
                    </div>
                </div>
            </a>
        </li>

        @if(\Illuminate\Support\Facades\Auth::check())
        <li class="">
        @else
        <li class="menu-hidden" id="ma-deconnexion-auto-menu">
        @endif
                <div class="d-none">
                    <form action="{{ url('/byebye') }}" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit" id="logout-btn" hidden>Déconnexion</button>
                    </form>
                </div>
                <a href="javascript:;" class="menu-item">
                    <div class="d-flex">
                        <div class="menu-item-icon">
                            <img  class="mute-img" src="{{ asset('assets/images/off.svg') }}" alt="">
                            <img class="hover-img" src="{{ asset('assets/images/off_over.svg') }}" alt="">
                        </div>
                        <div class="menu-item-text" onclick="document.getElementById('logout-btn').click()">
                            Déconnexion
                        </div>
                    </div>
                </a>
            </li>
        {{-- @endif --}}

        <li class="d-none">
            <a href="javascript:;" class="menu-item">
                <div class="d-flex">
                    <div class="menu-item-text">
                        <a href="javascript:;" id="test" data-toggle="modal" data-target="#userProfilModal">
                            Test
                        </a>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    @if (\Illuminate\Support\Facades\Auth::check() && isset($_SESSION['boutique_marchand']))
        <hr class="m-0 p-0" style="margin-top:6px !important;">
        <div class="menu-marchand">
            <div class="d-flex justify-content-start menu-marchand-content">

                <div class="menu-marchand-img">
                    <div style="" class="profil-avatar-box-element">
                        @if(isset($_SESSION['boutique_profil_mage']) && $_SESSION['boutique_profil_mage'] != "")
                            <img style="position: relative; top: 0px" src="/{{ $_SESSION['boutique_profil_mage'] }}" alt="" />
                            @elseif(isset($_SESSION['boutique_marchand']))
                            <span >
                                {{substr($_SESSION['boutique_marchand'], 0, 1)}}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="menu-marchand-text">
                    <a href="{{ url('/acceuil-marchand-marchand') }}" style="text-decoration: none; position:relative;">
                        <p class="type-compte">Ma boutique</p>
                        <p class="nom-moutique">
                            @if(isset($_SESSION['boutique_marchand']))
                            {{$_SESSION['boutique_marchand']}}
                            @endif
                        </p>
                    </a>
                </div>

            </div>
        </div>
    @endif
</div>

<script>
    $('#test').on('click', function() {
        $.ajax({
            type: 'POST',
            url: '/get_user_infos_profil',
            data: {},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Profil data clicked:', response)
                $('#my_id_user').text(response.personal_key)
                $('#nom_user').text(response.nom)
                $('#upload-photo-profil').css('display', 'none')

                $('#defaul-menu-courant-user').removeClass('applied-width')
                $('#commande-options-zone').addClass('hide-commande-tr')
                $(".mydata-menu-profil").removeClass('active-menu-left')
                $(".donnees-menu-profil").hide();
                $('#info-perso').show()

            }
        })
    })

    function go_to_facebook() {

        var appId = '1207420726577218';
        var code = Math.floor(Math.random() * (999999 - 100000 + 1)) + 100000;
        var redirectUri = encodeURIComponent('https://toulemarket.com/facebook_manualy_login/');
        var state = 'fb-' + code + '_tm';

        var url = "https://www.facebook.com/v17.0/dialog/oauth?client_id=" + appId + "&redirect_uri=" + redirectUri + "&state=" + state;

        var w = 800;
        var h = 600;
        var left = (screen.width/2)-(w/2); // calculate the left position of the window
        var top = (screen.height/2)-(h/2); // calculate the top position of the window

        var windowName = "toulemarket";
        var windowFeatures = "width=800,height=600, left= "+left+" , top= "+top+", scrollbars=yes,status=yes, resizable=false";

        window.open(url, windowName, windowFeatures);

    }

</script>
