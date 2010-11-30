<?php

require 'library/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '145178132195106', // Anwendungs ID
  'secret' => '14816c7bf9ceb4231d95242d51ccd693', // Anwendungs-Geheimcode
  'cookie' => true, // enable optional cookie support
));

if ($session = $facebook->getSession()) { // Session vorhanden?
  try {
    $data = $facebook->api('/me/likes?limit=2'); // Daten üder API abfragen.
    print '<pre>' . print_r($data, true) . '</pre>'; // Ausgabe der Daten.
  } catch (FacebookApiException $e) {
    print $e;
  }
} else { // Keine Session vorhanden.
  $params = array(
    'fbconnect' => 0,
    'canvas' => 1,
  );

  $loginUrl = $facebook->getLoginUrl($params); // URL zum Autorisierungsdialog erstellen.
  print '<script>top.location.href = "' . $loginUrl . '"</script>'; // Weiterleitung zum Anfordern der Autorisierung.
}
?>