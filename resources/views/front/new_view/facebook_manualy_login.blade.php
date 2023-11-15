{{-- @extends('front.layout.main-layout') --}}
<html>
    <head>
        
    <title>En attente de facebook ...</title>

    <style>
        
        .container {
            width: 200px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @-webkit-keyframes spinner-border {
        to {
            transform: rotate(360deg);
        }
        }

        @keyframes spinner-border {
        to {
            transform: rotate(360deg);
        }
        }

            .spinner-border-helper {
                width: 1.5rem !important;
                height: 1.5rem !important;
                vertical-align: -0.125em;
                border: 0.25em solid currentColor;
                border-right-color: #1A7EF5!important;
                border-radius: 50%;
                border-color: #D8D8D8;
                -webkit-animation: .75s linear infinite spinner-border;
                animation: .75s linear infinite spinner-border;
            }

            .spinner-border {
                display: inline-block;
                width: 2rem;
                height: 2rem;
                vertical-align: -0.125em;
                border: 0.25em solid currentColor;
                border-right-color: transparent;
                border-radius: 50%;
                -webkit-animation: 0.75s linear infinite spinner-border;
                        animation: 0.75s linear infinite spinner-border;
                }

                .container-spiner {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

        </style>
    </head>
    <body style="display: flex; align-items: center; justify-content: center">
        <div>
            <div class="container center">
                <div class="container-spiner">
                    <a href="{{url('/facebook/oauth')}}">Connexion via Facebook</a>
                    {{-- <a href="https://www.facebook.com/v17.0/dialog/oauth?client_id=1207420726577218"&redirect_uri={https://toulemarket.com/en_attente_de_facebooK}&state="{st=state123abc,ds=123456789}">Connexion via Facebook</a> --}}
                    {{-- <a href="">Connexion manuel</a> --}}
                    {{-- <span aria-label="Me geolocaliser" class="spinner-border spinner-border-helper hide spinner-location" id="location_spiner3-bis" role="status" aria-hidden="true"></span> --}}
                    {{-- <span aria-label="Me geolocaliser" class="spinner-borderd spinner-border-helper  spinner-locationd" id="location_spiner3-bis" role="status" aria-hidden="true"></span> --}}
                </div>
            </div>
        </div>
    </body>
</html>
