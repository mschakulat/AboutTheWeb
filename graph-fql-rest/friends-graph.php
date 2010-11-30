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
  $friends = $facebook->api("/{$userId}/friends", array('access_token' => $userAt));

  // Abfrage der Profildaten über die Graph API.
  for ($i = 0, $friendCount = sizeof($friends['data']); $i < $friendCount; $i++) {
    // Wir gehen die Liste der Freunde durch und speichern die ID der Freunde.
    $friendId = $friends['data'][$i]['id'];
    // Profildaten abrufen über einen API Aufruf.
    $graphApi = $facebook->api("/{$friendId}", array('access_token' => $userAt));
    // Ausgabe der Profildaten.
    print '<pre>' . print_r($graphApi, true) . '</pre>';
  }

} catch (FacebookApiException $e) {
  print $e;
}

?>