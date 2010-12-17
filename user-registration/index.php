<?php
define('FACEBOOK_APP_ID', '140311802689086');
define('FACEBOOK_SECRET', '5beff86f67ef26fdebed3b4e7be886b7');

function parse_signed_request($signed_request, $secret) {
  list($encoded_sig, $payload) = explode('.', $signed_request, 2);

  // decode the data
  $sig = base64_url_decode($encoded_sig);
  $data = json_decode(base64_url_decode($payload), true);

  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
    error_log('Unknown algorithm. Expected HMAC-SHA256');
    return null;
  }

  // check sig
  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
  if ($sig !== $expected_sig) {
    error_log('Bad Signed JSON signature!');
    return null;
  }

  return $data;
}

function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_', '+/'));
}

$json = '[
 {"name":"name"},
 {"name":"email"},
 {"name":"location"},
 {"name":"gender"},
 {"name":"birthday"},
 {"name":"password",   "view":"not_prefilled"},
 {"name":"like",       "description":"Gefällt Dir dieses Plugin?",        "type":"checkbox",  "default":"checked"},
 {"name":"phone",      "description":"Telefonnummer",                     "type":"text"},
 {"name":"anniversary","description":"Jahrestag",                         "type":"date"},
 {"name":"useplugin",  "description":"Wirst Du dieses Plugin einsetzen?", "type":"select",    "options":{"ja":"Ja","nein":"Nein"}, "default":"ja"},
 {"name":"movie",      "description":"Lieblingsfilm",                     "type":"typeahead", "categories":["movie","book"]},
 {"name":"captcha"}
]
';
?>

<?php if ($_REQUEST['signed_request']) : ?>
  <?php
    print '<p>signed_request contents:</p>';
    $response = parse_signed_request($_REQUEST['signed_request'], FACEBOOK_SECRET);
    print '<pre>' . print_r($response, true) . '</pre>';
  ?>
<?php else : ?>
<div style="width: 560px; margin: 0 auto;">
  <iframe src='http://www.facebook.com/plugins/registration.php?
               client_id=140311802689086&
               redirect_uri=http://user-registration.abouttheweb.de/&
               fields=<?= $json ?>'
          scrolling="auto"
          frameborder="no"
          style="border:none"
          allowTransparency="true"
          width="100%"
          height="700">
  </iframe>
</div>
<?php endif ?>