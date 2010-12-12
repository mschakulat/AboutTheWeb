<?php
$feed = "http://www.facebook.com/dialog/feed/?"
      . "app_id=125209680874919&"
      . "name=AboutTheWeb&"
      . "description=Facebook Anwendungen erstellen&"
      . "link=http://www.abouttheweb.de/&"
      . "picture=http://www.abouttheweb.de/wp-content/themes/abouttheweb/img/atw-meta-image.jpg&"
      . "redirect_uri=http://apps.facebook.com/atw-dialogs/redirect_uri.php";

print '<a href="' . $feed . '" target="_parent">Feed Dialog</a>';
?>