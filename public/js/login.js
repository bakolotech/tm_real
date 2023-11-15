const FBK = require('passport-facebook').Strategy;

let fbkAppId = '450737143207069';
let fbkAppSecret = '83a67063326b1eb3ba29103bd0fb3809';

passport.use(new FacebookStrategy({
        clientID: fbkAppId,
        clientSecret: fbkAppSecret,
        callbackURL: "http://localhost:8000/facebook-login"
    },
    function(accessToken, refreshToken, profile, cb) {
        User.findOrCreate({ facebookId: profile.id }, function (err, user) {
            return cb(err, user);
        });
    }
));
