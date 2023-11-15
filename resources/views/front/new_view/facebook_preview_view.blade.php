<!DOCTYPE html>
<html>
<head>
<title>{{ $name }}</title>
<meta property="og:image" content="https://toulemarket.com/{{$pict_prod}}" >
<meta property="og:image:width" content="1200" >
<meta property="og:image:height" content="630" >
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">

</head>
<body>



<!-- Top menu -->


<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">
    <img src="/w3images/chef.jpg"  class="w3-image"  width="1200" height="630" style="visibility: hidden">
    <div class="w3-padding-32">
      <p>Clicquer sur le lien pour consulter tout le catalogue sur Toulemarket et bénéficier des achats rapides et livraison rapide.</p>
    </div>
  </div>
  <hr>
<!-- End page content -->
</div>

<script>
window.addEventListener('load', (event) =>{

  let chemin = window.location.pathname;
  var pathArray = chemin.split('/');
  window.location.href = "/rayon/25/tv-image-son/?id="+pathArray[2]+""

});

</script>

</body>
</html>
