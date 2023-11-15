<div class="box box-profil arrow-top is-hidden" id="profil-box1" tabindex="0" style="height: 127px; width: 208px;">
    <style>
        .menu-item{
            text-decoration: none;
        }
    </style>
    @if (!\Illuminate\Support\Facades\Auth::check())
        <div class="guest-menu">
            <div class="welcome-on-toulemarket">
                Bienvenue sur <b style="color:#D0021B">TOUL&#200;</b> <b style="color:#191970">Market</b>
            </div>
            <div class="btn-inscription-basic" onclick="document.getElementById('register-login').click()">
                Se connecter / S’inscrire
            </div>
            <a href="javascript:;" class="d-none" data-toggle="modal" onclick="formulaire_0()" id="register-login" data-target="#registerLoginModal"></a>

            <div class="autre-choix-connexion-ou">OU</div>
            <div class="autre-choix-connexion">
            </div>

            <div class="connexion-facebook" onclick="document.getElementById('facebook-auth').click()">
                <div class="icon-facebook"><img src="{{ asset('assets/images/facebook.svg') }}" alt=""></div>
                <div class="text-facebook">Continuer avec Facebook</div>
            </div>

            <div class="connexion-google" onclick="document.getElementById('google-auth').click()">
                <div class="icon-google"><img src="{{ asset('assets/images/google.png') }}" alt=""></div>
                <div class="text-google">Continuer avec Google</div>
            </div>
        </div>
    @else
        {{-- <div class="user-name">
            <div class="user-image">
                <img src="{{ \App\User::getImage() }}" alt="">
            </div>
            <div class="box-user-info">
                <p class="p-0 m-0 p1">{{ \Illuminate\Support\Facades\Auth::user()->getNom() }}<br>{{ \Illuminate\Support\Facades\Auth::user()->getPrenom() }}</p>
                <p class="p-0 m-0 p2">{{ \Illuminate\Support\Facades\Auth::user()->customId() }}</p>
            </div>
        </div> --}}
    @endif

    @if (\Illuminate\Support\Facades\Auth::check())

        <style>
            .container-zone-elemnt1 {
                width: 208px;
                height: 46px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .element-box-zone-1 {
                width: 198px;
                height: 36px;
                border-radius: 6px;
                display: flex;
            }

            .element-box-zone-1:hover {
                cursor: pointer;
                background-color: #F5F5F5;
            }

            .profil-box-zone-1 {
                width: 36px;
                height: 36px;
                border-radius: 6px;
                display: flex;
                align-items: center;
            }

            .profil-box-zone-2 {
                width: 138px;
                border-radius: 6px;
                margin-left: 2.5px;
            }

            .profil-box-zone-3 {
                width: 24px;
                height: 36px;
                border-radius: 6px;
                position: relative;
                padding-left: 2px;
                padding-top: 8px;
            }

            /* all child from down  */
            .mon-compte-client {
                width: 133px;
                height: 15px;
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 300;
                font-size: 11px;
                line-height: 11px;
                color: #4A4A4A;
                padding-top: 2.5px;
            }

            .profil-box-user-id {
                width: 133px;
                height: 21px;
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 700;
                font-size: 16px;
                line-height: 16px;
                padding-top: 2.5px
            }

            .pic-zone-element {
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
                left: 2.5px
            }

            .zone-bouton-element {
                width: 208px !important;
                height: 35px !important;
                padding-top: 5px;
                padding-left: 5px;
            }

            .bouton-section-zone {
                width: 198px !important;
                height: 25px !important;
                border-radius: 6px;
                position: relative;
                top: -1px;
            }

        </style>

        <div class="container-zone-elemnt1">
                <a href="{{ url('/') }}" style="text-decoration: none; color:#191970">
                    <div class="element-box-zone-1">
                    <div class="profil-box-zone-1">

                        <div class="pic-zone-element">
                            @if(isset($_SESSION['boutique_profil_mage']) && $_SESSION['boutique_profil_mage'] != "" && isset($_SESSION['boutique_marchand']))
                                <img id="marchand-profil-box-avatar-1" style="position: relative; border-radius: 6px" src="{{ $_SESSION['boutique_profil_mage'] }}" alt="" />
                                @else
                                <span class="nom-moutique">
                                    {{-- {{substr($_SESSION['boutique_marchand'], 0, 1)}} --}}
                                </span>
                            @endif
                        </div>

                    </div>
                    <div class="profil-box-zone-2" >

                        <div class="mon-compte-client">
                            Mon compte client
                        </div>

                        <div class="profil-box-user-id">
                            {{ \Illuminate\Support\Facades\Auth::user()->getNom() }}
                        </div>

                    </div>
                    <div class="profil-box-zone-3">

                    </div>
                </div>
            </a>

        </div>

        <hr class="m-0 p-0">
        <div class="container-zone-elemnt1" style="pointer-events: none">
            <div class="element-box-zone-1">

                <div class="profil-box-zone-1">
                    <div class="pic-zone-element">
                        @if(isset($_SESSION['boutique_profil_mage']) && $_SESSION['boutique_profil_mage'] != "")
                            <img id="marchand-profil-box-avatar-2" style="position: relative; border-radius: 6px" src="{{ $_SESSION['boutique_profil_mage'] }}" alt="" />
                            @elseif(isset($_SESSION['boutique_marchand']))
                            <span class="nom-moutique">
                                {{substr($_SESSION['boutique_marchand'], 0, 1)}}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="profil-box-zone-2">
                    <div class="mon-compte-client">
                        Ma boutique
                    </div>

                    <div class="profil-box-user-id">
                        {{-- {{ \Illuminate\Support\Facades\Auth::user()->getNom() }} --}}
                        <p class="nom-moutique">
                            @if(isset($_SESSION['boutique_marchand']))
                            {{$_SESSION['boutique_marchand']}}
                            @endif
                        </p>
                    </div>
                </div>

                <div class="profil-box-zone-3">
                    <img  class="mute-img" src="{{ asset('assets/images/icones-vendeurs2/Valideblanc.svg') }}" alt="">
                </div>

            </div>
        </div>

        <hr class="m-0 p-0">
        <ul class="liste-menu zone-bouton-element">
            <li class="bouton-section-zone">
                <div style="position: relative; left: -6px">
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
                </div>
            </li>
        </ul>
    @endif
</div>
