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

  // Eine Liste der Freunde abrufen.
  $friends = $facebook->api(array(
                              'method'  => 'friends.get',
                              'uid'    => "{$userId}",
                              'access_token' => $userAt,
                            ));

  foreach ($friends as $friendId) {
    // Abfrage der Profildaten über REST.
    $restApi = $facebook->api(array(
                                'method'  => 'users.getInfo',
                                'uids'    => "{$friendId}",
                                'fields'  => 'uid, first_name, middle_name, last_name, name, locale, profile_url, sex',
                                'access_token' => $userAt,
                              ));

    // Ausgabe der REST Daten.
    print '<pre>' . print_r($restApi, true) . '</pre>';
  }

} catch (FacebookApiException $e) {
  print $e;
}

?>