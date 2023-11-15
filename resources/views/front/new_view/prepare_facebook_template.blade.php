<html >
    <head>
        <title>facebook prepare</title>
        <style>

            .prepare_facebook {
                width: 300px;
                height: 300px;
                background-color: #ccc;
                margin-top: 200px;
                display: flex;
                align-items: center;
                justify-content: center;

            }

            .btn-partager {
                background-color: rgba(70, 70, 250, 0.856);
                border: transparent;
                height: 41px;
                color: #fff;
                width: 120px;
                border-radius: 6px;
            }

            .btn-partager:hover {
                cursor: pointer;
            }

        </style>
    </head>
    <body>
        <div class="container" style="display: flex; align-items: center; justify-content: center">
            <div class="prepare_facebook">
                <button class="btn-partager" id="shareBtnPersonnel">Partager</button>
            </div>
        </div>

<script>
   window.fbAsyncInit = function() {
       FB.init({
           appId      : '1207420726577218',
           xfbml      : true,
           autoLogAppEvents : true,
           version    : 'v16.0'
       });
   };

   (function(d, s, id) {
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) return;
   js = d.createElement(s); js.id = id;
   js.src = "https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v17.0&appId=1207420726577218&autoLogAppEvents=1";
   fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

    document.getElementById('shareBtnPersonnel').onclick = function() {

        $.ajax({
            type: 'POST',
            url: '/article_screen_shot',
            data: {},
            success: function(response) {
                console.log('Screen shot', response)
            }

        })
    // FB.ui({
    //     display: 'popup',
    //     method: 'share',
    //     href: 'https://toulemarket.com/partageface',
    // }, function(response){
    //    console.log('Voici la reponse après le partage =>', response ) 
    // });

    }


//    function share_on_face_book() {
//         console.log('Here is the starting point ---> ')
//         let url_redirection = 'https://toulemarket.com/share_article_templete_facebook/'
//         FB.ui({
//         method: 'share',
//         href: url_redirection,
//         },
//         function (response) {
//             // Action after response
//         });
//     }

</script>

    </body>

</html>