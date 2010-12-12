<html>
  <body>
    <script src="http://connect.facebook.net/de_DE/all.js"></script>
    <div id="fb-root"></div>
    <script>
      // assume we are already logged in
      FB.init({appId: '125209680874919', xfbml: true, cookie: true});

      FB.ui({
          method: 'feed',
          name: 'AboutTheWeb',
          description: 'Facebook Anwendungen erstellen',
          link: 'http://www.abouttheweb.de/',
          picture: 'http://www.abouttheweb.de/wp-content/themes/abouttheweb/img/atw-meta-image.jpg'
          });
     </script>
  </body>
</html>
