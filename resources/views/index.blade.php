<html>
<head>
<title></title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="container">
<h1>Test d'envoie de code de reinitialisation du mot de passe</h1>
<div class="alert alert-danger" id="error" style="display: none;"></div>
<div class="card">
<div class="card-header">
Numéro de téléphone
</div>
<div class="card-body">
<div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
<form>
<label>Numéro:</label>
<input type="text" id="number" class="form-control" placeholder="+241********">
<div id="recaptcha-container"></div>
<button type="button" class="btn btn-success" onclick="phoneSendAuth();">Soumettre</button>
</form>
</div>
</div>
<div class="card" style="margin-top: 10px">
<div class="card-header">
Entrer le code de vérification
</div>
<div class="card-body">
<div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
<form>
<input type="text" id="verificationCode" class="form-control" placeholder="Enter verification code">
<button type="button" class="btn btn-success" onclick="codeverify();">Vérifier</button>
</form>
</div>
</div>
</div>
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyDUT30LD4rI6fzmk5oJ127otbdb7eE_SYs",
        authDomain: "toulemarket-349520.firebaseapp.com",
        //databaseURL: "https://itdemo-push-notification.firebaseio.com",
        projectId: "toulemarket-349520",
        storageBucket: "toulemarket-349520.appspot.com",
        messagingSenderId: "307188942444",
        appId: "1:307188942444:web:42b2400629f2b9ecdc3a49",
        measurementId: "G-44JH651VC1"
    };
    firebase.initializeApp(firebaseConfig);
</script>
<script type="text/javascript">
window.onload=function () {
render();
};
function render() {
window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
recaptchaVerifier.render();
}
function phoneSendAuth() {
var number = $("#number").val();
firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
window.confirmationResult=confirmationResult;
coderesult=confirmationResult;
console.log(coderesult);
$("#sentSuccess").text("Le message a été envoyé.");
$("#sentSuccess").show();
}).catch(function (error) {
$("#error").text(error.message);
$("#error").show();
});
}
function codeverify() {
var code = $("#verificationCode").val();
coderesult.confirm(code).then(function (result) {
var user=result.user;
console.log(user);
$("#successRegsiter").text("Vous avez saisie le bon code.");
$("#successRegsiter").show();
}).catch(function (error) {
$("#error").text(error.message);
$("#error").show();
});
}
</script>
</body>
</html>
