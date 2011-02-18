<?php

// Facebook PHP SDK einbinden
require_once 'library/facebook.php';

define('APP_ID', '180266555350464');
define('SECRET', 'b938ea614ac6c4ad9738126ba4c648c2');

$config = array(
  'appId' => APP_ID, // Anwendungs ID
  'secret' => SECRET, // Anwendungs Geheimnis
  'cookie' => false, // Keinen Cookie Support
);

$facebook = new Facebook($config);

if (!$session = $facebook->getSession()) {
  // Wenn der User die Anwendung noch nicht autorisiert hat,
  // wird er zum Autorisierungsdialog weitergeleitet.
  $oauth = "http://www.facebook.com/dialog/oauth/?"
         . "client_id=" . APP_ID . "&"
         . "redirect_uri=http://apps.facebook.com/atw-requests/&"
         . "response_type=token";

  print 'Um diese Anwendung zu testen, musst du sie zuerst <a href="' . $oauth . '" target="_parent">autorisieren</a>';
} else {

  // Die Nachricht, die im Request enthalten sein soll.
  $params = array(
    'message' => 'eine nachricht',
  );
  // Den Request generieren.
  $result = $facebook->api('/me/apprequests', 'post', $params);
  
  print 'Request ID: ' . $result;
}

?>
