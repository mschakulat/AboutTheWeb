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
  // Einen Testuser erstellen.
  $testuser1 = $facebook->api(APP_ID . "/accounts/test-users?installed=true&permissions=read_stream", 'post');

  // Einen weiteren Testuser erstellen.
  $testuser2 = $facebook->api(APP_ID . "/accounts/test-users?installed=true&permissions=read_stream", 'post');

  // Alle Testuser dieser Anwendung abrufen.
  $allTestusers = $facebook->api(APP_ID . "/accounts/test-users", 'get');

  // Ausgabe.
  print '<pre>' . print_r($allTestusers, true) . '</pre>';

} catch (FacebookApiException $e) {
  print $e;
}

?>