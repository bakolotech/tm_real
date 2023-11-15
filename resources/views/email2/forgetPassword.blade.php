<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}">
    <title>Toulè-Market</title>
</head>
<body class="container">
        <div class="card-body">
          <h5 class="card-title">Bonjour {{ $utilisateur }}</h5>
          <hr>
          <p class="card-text">Login : <strong>{{ $login }}</strong></p>
          <p class="card-text">Nouveau mot de passe : <strong>{{ $mdp }}</strong></p>
          <p class="card-text"><small class="text-muted">Vous devez modifier votre mot de passe sous 24H</small></p>
        </div>
</body>
</html>


