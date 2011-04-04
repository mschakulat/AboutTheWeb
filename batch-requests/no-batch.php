<?php
/**
 * Abfrage der Newsfeeds OHNE Batch Requests.
 * @package Batch Requests
 * @author Michael Schakulat <michael@abouttheweb.de>
 */

require_once 'library/facebook.php';

$app_id = "191716614200385";
$app_secret = "924ed1bcbd66815c5057e7cd3518864d";

$facebook = new Facebook(array(
  'appId' => $app_id,
  'secret' => $app_secret,
  'cookie' => true,
));

$starttime = microtime(true);

if ($session = $facebook->getSession()) {
  try {
    $facebook->api('adidas/feed?limit=100');
    $facebook->api('levis/feed?limit=100');
    $facebook->api('marketingde/feed?limit=100');
    $facebook->api('starbucks/feed?limit=100');
    $facebook->api('cocacola/feed?limit=100');
  } catch (FacebookApiException $e) {
    print $e;
  }
} else {
  $oauth = "http://www.facebook.com/dialog/oauth/?"
         . "client_id=" . $app_id . "&"
         . "redirect_uri=http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "&"
         . "response_type=token";

  print '<a href="' . $oauth . '" target="_parent">Oauth Dialog</a>';
}

print "<br />Runtime: " . round(microtime(true) - $starttime, 2) . ' seconds';

?>

