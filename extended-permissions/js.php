<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml">
  <body>
    <div id="fb-root"></div>
    <script src="http://connect.facebook.net/de_DE/all.js"></script>
    <script>
      FB.init({appId: '163466690349624',
               status: true,
               cookie: true, 
               xfbml: true
             });

      function showPermsDialog() {
        FB.login(function(response) {
          alert(response.perms);
        }, {perms:'user_birthday, user_interests, user_photos'});
      }

    </script>
    <a href="" onclick="showPermsDialog(); return false;">Einloggen</a>
  </body>
</html>