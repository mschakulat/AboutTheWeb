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

  // Testuser 1 stellt eine Freundschaftsanfrage an Testuser 2.
  $facebook->api("/100001884883543/friends/100001879514295",
                  'post',
                  array(
                    'access_token' => '162308607140076|2.9tyCej_hDk7YORb_uhFmaw__.3600.1290204000-100001884883543|TBDOgjHYeM4XB-gyOzlD1FM-rAs'
                  )
                );

  // Testuser 2 akzeptiert die Anfrage.
  $facebook->api("/100001879514295/friends/100001884883543",
                  'post',
                  array(
                    'access_token' => '162308607140076|2.MC_IRMqblt_mWCGnov4W1g__.3600.1290204000-100001879514295|-oQz2e2M8FGV07ZY6Z5xrjPlA-I'
                  )
                );

} catch (FacebookApiException $e) {
  print $e;
}

?>