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

    <fb:login-button autologoutlink="true"></fb:login-button>
    <div id="account-info"></div>
    
    <script>
      showMe = function(response) {
        if (!response.session) {
          document.getElementById('account-info').innerHTML = '<em>Not Connected</em>';
        } else {
          FB.api(
            {
              method: 'fql.query',
              query: 'SELECT name, pic_square FROM user WHERE uid=me()'
            },
            function(response) {
              document.getElementById('account-info').innerHTML = (
                '<img src="' + response[0].pic_square + '"> ' + response[0].name
              );
            }
          );
        }
      };

      FB.getLoginStatus(function(response) {
        showMe(response); 
        FB.Event.subscribe('auth.sessionChange', showMe); 
      });
    </script>

  </body>
</html>