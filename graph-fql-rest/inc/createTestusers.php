<?php
// Alle Testuser abrufen, die für diese Anwendung erstellt wurden.
$testusers = $facebook->api(APP_ID . "/accounts/test-users", 'get');

$testuserMax    = 5;
$testuserCount  = sizeof($testusers['data']);

// Wir erstellen uns 5 Testuser und schließen Freundschaft zwischen dem Ersten User und allen anderen.
if ($testuserCount < $testuserMax) {
  // 5 User anlegen.
  for ($i = $testuserCount; $i < $testuserMax; $i++) {
    $facebook->api(APP_ID . "/accounts/test-users?installed=true&permissions=user_about_me", 'post');
  }
  // Liste der User abrufen, um an die IDs zu kommen.
  $testusers = $facebook->api(APP_ID . "/accounts/test-users", 'get');
  // User1 schließt Freundschaft mit allen anderen Usern.
  for ($i = 1; $i < $testuserMax; $i++) {
    // Die ID des Users, mit dem Freundschaft geschlossen werden soll.
    $friendId = $testusers['data'][$i]['id'];
    // Der Access Token des Users, mit dem Freundschaft geschlossen werden soll.
    $friendAt = $testusers['data'][$i]['access_token'];
    // User1 fragt Freundschaft an.
    $facebook->api("/{$userId}/friends/{$friendId}", 'post', array('access_token' => $userAt));
    // User $i bestätigt Freundschaft.
    $facebook->api("/{$friendId}/friends/{$userId}", 'post', array('access_token' => $friendAt));
  }
}
?>