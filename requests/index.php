<?php

require_once 'library/facebook.php';

define('APP_ID', '180266555350464');
define('SECRET', 'b938ea614ac6c4ad9738126ba4c648c2');

$config = array(
  'appId' => APP_ID,
  'secret' => SECRET,
  'cookie' => false,
);

$facebook = new Facebook($config);

if (!$session = $facebook->getSession()) {
  $oauth = "http://www.facebook.com/dialog/oauth/?"
         . "client_id=" . APP_ID . "&"
         . "redirect_uri=http://apps.facebook.com/atw-requests/&"
         . "response_type=token";

  print 'Um diese Anwendung zu testen, musst du sie zuerst <a href="' . $oauth . '" target="_parent">Autorisieren</a>';
} else {

  $requests = $facebook->api("/me/apprequests", 'get');
  print '<pre>' . print_r($requests, true) . '</pre>';

}

?>
