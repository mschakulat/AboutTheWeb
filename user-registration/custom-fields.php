<?php
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