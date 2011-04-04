<?php
/**
 * Abfrage mit FQL.
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

if ($session = $facebook->getSession()) {
  try {

    $result = $facebook->api('?batch=[' .
                      '{"method":"POST",' .
                       '"relative_url":"method/fql.query?query=select+name+from+user+where+uid=4"}]',
                      'post', array('access_token' => $facebook->getAccessToken()));
    
    print '<pre>' . print_r ($result, true) .  '</pre>';
  } catch (FacebookApiException $e) {
    print $e;
  }
} else {
  $oauth = "http://www.facebook.com/dialog/oauth/?"
         . "client_id=" . $app_id . "&"
         . "scope=publish_stream&"
         . "redirect_uri=http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "&"
         . "response_type=token";

  print '<a href="' . $oauth . '" target="_parent">Oauth Dialog</a>';
}

?>

