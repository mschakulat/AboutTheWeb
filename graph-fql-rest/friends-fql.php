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

  // Hier werden 5 Testuser angelegt und Freunschaft
  // zwischen dem ersten und allen anderen Usern geschlossen.
  include 'inc/createTestusers.php';

  // Wir speichern die ID von User1.
  $userId = $testusers['data'][0]['id'];
  // Wir speichern den Access Token von User1.
  $userAt = $testusers['data'][0]['access_token'];

  // Abfrage der Profildaten über FQL.
  $fql = $facebook->api(array(
                        'method'  => 'fql.query',
                        'query'   => "SELECT uid, name, first_name, middle_name, last_name, profile_url, sex, locale
                                        FROM user
                                        WHERE uid = {$userId}
                                        OR uid IN (SELECT uid2 FROM friend WHERE uid1 = {$userId})",
                        'access_token' => $userAt,
                      ));

  // Ausgabe der FQL Daten.
  print '<pre>' . print_r($fql, true) . '</pre>';

} catch (FacebookApiException $e) {
  print $e;
}

?>