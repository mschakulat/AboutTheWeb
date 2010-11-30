<?php

require 'library/facebook.php';

define('APP_ID',      '119632661432164');
define('APP_SECRET' , '055f7f6d0bc4bcb90afbeee67846f7d9');

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

  // Abfrage der Profildaten über FQL.
  $fql = $facebook->api(array(
                        'method'  => 'fql.query',
                        'query'   => "SELECT name FROM user WHERE uid = '{$testuserId}'",
                        'access_token' => $testuserToken,
                        ));

  // Ausgabe der FQL Daten.
  print '<pre>' . print_r($fql, true) . '</pre>';

} catch (FacebookApiException $e) {
  print $e;
}

?>