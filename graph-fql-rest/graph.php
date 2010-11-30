<?php

require 'library/facebook.php';

define('APP_ID',      '119632661432164');
define('APP_SECRET' , '26573e26aa356dffec3180c4a16058c2');

$facebook = new Facebook(array(
  'appId'  => APP_ID, // Anwendungs ID
  'secret' => APP_SECRET, // Anwendungs-Geheimcode
  'cookie' => true, // enable optional cookie support
));

try {

  // Alle Testuser abrufen, die für diese Anwendung erstellt wurden.
  $testuser = $facebook->api(APP_ID . "/accounts/test-users", 'get');

  // Wenn noch kein Testuser für diese Anwendung existiert, erstellen wir uns einen.
  if (!isset($testuser['data'][0]['id'])) {
    $facebook->api(APP_ID . "/accounts/test-users?installed=true&permissions=user_about_me", 'post');
  }
  // Wir speichern die User ID und den Access Token des Testusers.
  $testuserId    = $testuser['data'][0]['id'];
  $testuserToken = $testuser['data'][0]['access_token'];

  // Abfrage der Profildaten über die Graph API.
  $graphApi = $facebook->api("/{$testuserId}", array('access_token' => $testuserToken));

  // Ausgabe der Graph API Daten.
  print '<pre>' . print_r($graphApi, true) . '</pre>';

} catch (FacebookApiException $e) {
  print $e;
}

?>