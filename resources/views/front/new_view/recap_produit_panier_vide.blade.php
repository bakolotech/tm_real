<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <div class="modal-body-main" id="mon_panier" style="z-index: 13000 ">
    <div class="recap-box-detailt" style="z-index: 10000; display: flex; flex-direction: column;">

        <div class="main-body" style="z-index: 20000;">
                <div class="blue-header-panier-vide" style="z-index: 1">
                    <h6 class="panier-vide-titre">
                        APERÇU DE LA COMMANDE
                    </h6>
                </div>

                <div class="body-panier-vide">
                    <div class="image-panier-vide">
                        <img src="{{asset('assets/images/shoppingbasket2_114884.svg')}}" alt="" />
                    </div>
                    <h6>Oh! Nooooon,<br/>
                        votre panier… il est vide !!</h6>
                </div>
            </div>

            <div class="panier-vide-footer">

                <div >
                    <h6>EN MANQUE D'INSPIRATION ?</h6>
                </div>

                <div class="rowdd" style="margin-bottom: 15px">

                    <div class="ele3">
                        <button onclick="window.location = '/' " class="btn-panier-vide-custon" >Trouver des idées</button>
                    </div>

                    <div class="ele1">
                        <button onclick="showPanier_vides()" class="btn-fermer-panier-vide" style="background-color:transparent !important;"><img src="{{asset('assets/recap_produit/close-blue.svg')}}" alt=""/></button>
                    </div>
                </div>

                <div class="rowd" >
                    <img src="{{asset('assets/recap_produit/paiement.svg')}}" alt=""/>
                </div>

            </div>
        </div>

        </div>
    </div>

    <script type="text/javascript">

        function showPanier_vide() {
            document.body.style.overflow = "hidden";
            document.body.style.overflow = "hidden";
            const element = document.getElementById('mon_panier');
            element.classList.add('custom-modal-panier-vide');
        }

        function showPanier_vides(){
            document.body.style.overflow = "auto";
            const element = document.getElementById('mon_panier');
            element.classList.remove('panier_show');
            const element1 = document.getElementsByClassName('modal-body-main')
            element1.classList.add('custom-modal-panier-vide');
        }

	</script>
</body>
</html>
