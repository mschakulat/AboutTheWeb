<?php
$oauth = "http://www.facebook.com/dialog/oauth/?"
       . "scope=email,user_birthday&"
       . "client_id=125209680874919&"
       . "redirect_uri=http://apps.facebook.com/atw-dialogs/redirect_uri.php&"
       . "response_type=token";

print '<a href="' . $oauth . '" target="_parent">Oauth Dialog</a>';
?>