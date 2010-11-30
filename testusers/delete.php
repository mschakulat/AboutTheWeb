<?php

require 'library/facebook.php';

define('APP_ID',      '162308607140076');
define('APP_SECRET' , 'cf8f943703472bbcdc1d1f8ad62190eb');

$facebook = new Facebook(array(
  'appId'  => APP_ID, // Anwendungs ID
  'secret' => APP_SECRET, // Anwendungs-Geheimcode
  'cookie' => true, // enable optional cookie support
));

try {

  // Testuser 1 löschen.
  $facebook->api("/100001884883543", 'delete');

  // Testuser 2 löschen.
  $facebook->api("/100001879514295", 'delete');

  // Alle Testuser dieser Anwendung abrufen.
  $allTestusers = $facebook->api(APP_ID . "/accounts/test-users", 'get');

  // Ausgabe leer, da wir unsere Testuser gelöscht haben.
  print '<pre>' . print_r($allTestusers, true) . '</pre>';

} catch (FacebookApiException $e) {
  print $e;
}

?>