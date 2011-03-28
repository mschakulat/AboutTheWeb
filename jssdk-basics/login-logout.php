<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Die Facebook Javascript SDK</title>
    <script src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
  </head>
  <body>

    <div id="fb-root"></div>
    <script src="http://connect.facebook.net/de_DE/all.js"></script>
    <script>
      FB.init({
        appId  : '143655195699763',
        status : true, // check login status
        cookie : true, // enable cookies to allow the server to access the session
        xfbml  : true  // parse XFBML
      });
    </script>

    <button id="fb-auth">Bei Facebook anmelden</button>

    <script>
    function updateButton(response) {
      if (response.session) {
        $("#fb-auth").html('Bei Facebook abmelden');
        $("#fb-auth").click ( function() {
          FB.logout(function(response) {
            console.log('Der Benutzer wurde abgemeldet.');
          });
        });
      } else {
        $("#fb-auth").html('Bei Facebook anmelden');
        $("#fb-auth").click ( function() {
          FB.login(function(response) {
            if (response.session) {
              console.log('Der Benutzer wurde angemeldet.');
            } else {
              console.log('Der Benutzer wurde abgemeldet oder hat den Vorgang abgebrochen.');
            }
          });
        });
      }
    }

    FB.getLoginStatus(updateButton);
    FB.Event.subscribe('auth.statusChange', updateButton);
    </script>

  </body>
</html>