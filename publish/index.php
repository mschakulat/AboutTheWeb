<?php

require 'library/facebook.php';

define('APP_ID',      '171501209535074');
define('APP_SECRET' , '9e8448b3d547b9ed7ded4ce3843d9353');

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
    $facebook->api(APP_ID . "/accounts/test-users?installed=true&permissions=publish_stream", 'post');
  }
  // Wir speichern die User ID und die Login URL des Testusers.
  $testuserId       = $testuser['data'][0]['id'];
  $testuserLoginUrl = $testuser['data'][0]['login_url'];

  // Diese Daten sollen im Newsfeed gepostet werden.
  $arguments = array(
    'message' => 'Hier kann eine persönliche Nachricht stehen.',
    'picture' => 'http://www.abouttheweb.de/wp-content/themes/abouttheweb/img/atw-meta-image.jpg',
    'link'  => 'http://www.abouttheweb.de',
    'name' => 'About The Web',
    'caption' => 'Tutorials zu Facebook Anwendungen',
    'description' => 'Herzlich willkommen auf AboutTheWeb. Hier findest Du Tutorials, zur Erstellung von Facebook Anwendungen.
                      AboutTheWeb bietet Einsteigern die Chance, sich in die Erstellung
                      von Facebook Anwendungen mit PHP einzuarbeiten.',
    'actions' => '{"name": "ATW auf Facebook", "link": "http://www.facebook.com/pages/About-The-Web/151034811586000?v=app_102918576445766"}',
    'privacy' => '{"value": "EVERYONE"}',
  );

  // API Call. Veröffentlichen der Status Meldung.
  $facebook->api("/{$testuserId}/feed", 'post', $arguments);

  // Um zu prüfen, ob alles geklappt hat, melden wir uns, durch klicken dieses Links, als der Testuser an.
  print '<a href="' . $testuserLoginUrl . '">Hier geht´s zum Testuser Profil</a>';

} catch (FacebookApiException $e) {
  print $e;
}

?>