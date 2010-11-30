<?php

require 'library/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '163466690349624', // Anwendungs ID
  'secret' => '5ec985cded140817a2465c6e924f949c', // Anwendungs-Geheimcode
  'cookie' => true, 
));

if ($facebook->getSession()) { // Session vorhanden?
  print 'Erweiterte Berechtigungen wurden erteilt.';
} else { // Keine Session vorhanden.
  $params = array(
    'fbconnect' => 0,
    'canvas'    => 1,
    'req_perms' => 'user_birthday, user_interests, user_photos', // Erweiterte Berechtigungen anfordern.
  );

  $loginUrl = $facebook->getLoginUrl($params); // URL zum Autorisierungsdialog erstellen.
  print '<script>top.location.href = "' . $loginUrl . '"</script>'; // Weiterleitung zum Anfordern der Autorisierung.
}
?>