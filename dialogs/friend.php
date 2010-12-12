<?php
$friend = "http://www.facebook.com/dialog/friends/?"
        . "id=brent&"
        . "app_id=125209680874919&"
        . "redirect_uri=http://apps.facebook.com/atw-dialogs/redirect_uri.php";

print '<a href="' . $friend . '" target="_parent">Friend Dialog</a>';
?>