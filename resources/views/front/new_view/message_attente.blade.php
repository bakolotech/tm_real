<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <script src="https://kit.fontawesome.com/c2f21c01a9.js" crossorigin="anonymous"></script> --}}
    <title>First vues for toulemarket</title>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

		.modal-body {
            display: flex;
            flex-direction: column;
           flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            padding-bottom: 0px;
        }

        .modal-dialog {
            position: relative;
            top: 70px;
        }

        .modal-header {
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
        }

        .modal-header .close-btn {
            position: absolute;
        }

        .modal-header .rounded-check {
            height: 24px;
            width: 24px;
            outline: none;
            border: 1px solid #00B517;
            border-radius: 50%;
            background-color: #fff;
            justify-content: center;
            align-items: center;
            position: relative;
            left: -3.5px;
            top: -2px;
        }

        .modal-header .rounded-check i {
            text-align: center;
            position: relative;
            left: -3.5px;
            top: -2px;
        }

        .close-btn{
		    width: 24px;
		    height: 24px;
		    background-image: url('close.svg') !important;
			background-size:  24px;
		    background-repeat: no-repeat; /* Do not repeat the image */
		    border: 1px solid #fff;
		    background-color: #1A7EF5;
		    opacity: 1;
			border-radius: 50%;
		    position: absolute;
		    top: -21px;
		    right: -9px;
		}

        .modal-header h4 {
            color: #00B517;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 0;
            line-height: 22px;
            text-align: center;
        }

        .modal-body .msg-retour {
            height: 63px;
            width: 354px;
            color: #191970;
            font-family: Roboto;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 0;
            line-height: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .modal-body .coordonne-commande {
            margin-bottom: 0px;
        }

        .modal-body .coordonne-commande .auth-text {
            margin-bottom: 0px;
        }

        .modal-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            margin-top: 30px;
        }

        .modal-footer .renvoyer{
            height: 37px;
            width: 204px;
            border-radius: 6px;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 0.35px;
            line-height: 18px;
        }

        .modal-footer p{
            height: 14px;
            width: 231px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: 0;
            line-height: 13px;
            text-align: center;
        }

        .fa-check {
            color: #00B517;
        }

        .auth-text label {
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1.2px;
            line-height: 16px;
        }

        .toule-logo img {
            height: 46px;
            width: 255px;
        }

        .loading-text {
            height: 42px;
            width: 354px;
        }

        .loading-text p {
            height: 42px;
  width: 354px;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 20px;
            text-align: center;
        }

	</style>
</head>
<body>

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
	  Connexion
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <div class="modal-header">
              <!-- <button class="rounded-check"><i class="fas fa-check"></i></button>
              <h4>Merci de votre commande</h4>-->
	         <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <div class="modal-body">
            <div class="toule-logo">
                <img src="../images/logo.png.svg" alt="" />
            </div><br />


            <div class="loading-text">
               <p>
                Traitement de la requête<br />
                Veuillez patienter…
               </p>
            </div>

	      </div>

	      <div class="modal-footer">
            <p>Veuillez ne pas actualiser votre navigateur.</p>
	      </div>

	    </div>
	  </div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
