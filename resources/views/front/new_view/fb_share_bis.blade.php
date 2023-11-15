<html>
<head>
<title>Your Website Title</title>
{{-- <!-- You can use Open Graph tags to customize link previews.
Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
<meta property="og:url"           content="https://toulemarket.com/fab_preview" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="https://toulemarket.com/assets/images2/ciel/12h.png" /> --}}
</head>
<body>

<script>
     // initialize fb sdk
     window.fbAsyncInit = function() {
        FB.init({
            appId      : '617550933502528',
            xfbml      : true,
            version    : 'v3.0'
        });
    };

    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>

<button onclick="share()"> Costom fb share btn</button>

<script>


    function share() {
        FB.ui({
            method: 'share',
            href: 'https://toulemarket.com/fab_preview',
        }, function(response){});
    }

</script>

</body>
</html>
