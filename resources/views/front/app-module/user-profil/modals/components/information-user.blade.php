<style>
    .div-info-user{
        box-sizing: border-box;
        height: 79px;
        width: 100%;
        margin-left: 5px;
        margin-top:-1px;
        border: 1px solid #D8D8D8;
        border-radius: 7px 6px 6px 7px;
        background-color: #FFFFFF;
    }
    .photo-user{
        box-sizing: border-box;
        height: 78px;
        width: 79px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #D8D8D8;
        margin-right: 20px;
        margin-top: -1px;
        background-size: cover !important;
    }
    .photo-user img {
        height: 20px;
        width: 20px;
        margin-right: 5px;
        margin-top: 8px;
        margin-left: 6px;
    }

    .profil-icon{
        position: relative;
        top: 57%;
        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, #191970 100%);
        opacity: .7;
        height: 33px;
        width: 77px;
        border-radius: 0 0 6px 6px;
        padding: 0 5px;
    }
    .welcome_note{
        height: 21px;
        width: 201px;
        color: #191970;
        font-family: Roboto;
        font-size: 21px;
        font-weight: 300;
        letter-spacing: -0.51px;
        line-height: 21px;
        margin-top: 5px;
    }

</style>


<div class="div-info-user">
    <div class="d-flex">
        <div class="photo-user" style="background: url(/@auth{{ Auth::user()->image }} @endauth) no-repeat;">
        {{-- <div class="photo-user" > --}}
        <div class="d-flex justify-content-between profil-icon">
            <a class="photo-profil" data-id="#upload-photo-profil">
            <style>
            .edit-bnt-custom:hover, .logout-btn-custom:hover {
                cursor: pointer;
            }
            </style>
            <div class="edit-btn edit-bnt-custom"><img src="{{ asset('assets/images/profil-edit-icon.svg') }}" alt="">
            </div>
            </a>
            <div class="logout-btn logout-btn-custom"><img src="{{ asset('assets/images/profil-logout-icon.svg') }}" alt="">
            </div>
        </div>
        </div>

        <div style="width:201px">
            <div class="welcome_note">Heureux de vous revoir,</div>
            <div class="my_name" style="color: #191970;font-size: 21px;font-weight: 500;letter-spacing: -0.51px;line-height: 21px;" id="nom_user">@auth
                {{ Auth::user()->nom }}
            @endauth

            @guest
                <span id="guest-user-name"></span>
            @endguest
        </div>
            <div class="my_id_user" style="color: #191970;font-size: 14px;font-weight: 300;letter-spacing: 0;line-height: 12px; margin-top: 13px">N° @auth
                {{ Auth::user()->personal_key }}
                @endauth
                @guest
                    <span id="guest-user-personal_key"></span>
                @endguest
            </div>
        </div>
    </div>
</div>

<script>
 // click function
</script>
