<?php
echo "look out for the magic below<hr/>";
for ($i=0; $i < 60; $i++) { 
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.badgr.io/v2/issuers/THIS IS A LINK TO CMCC'S ISSUER/assertions",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>"{\n    \"badgeclass\": \"THIS IS THE BADGE CLASS ID\",\n\n    \"recipient\": {\n        \"identity\": \"phptest".$i."@thisisafakeemail.com\",\n        \"type\": \"email\",\n        \"hashed\": true\n    },\n\n    \"narrative\": \"This is an overall narrative describing how the badge was earned.\",\n    \"evidence\": [\n        {\n            \"url\": \"http://example.com\",\n            \"narrative\": \"This is a narrative describing the individual evidence item.\"\n        }\n    ],\n    \"expires\": \"2045-03-31T23:59:59Z\",\n    \"notify\": false\n}",
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json",
      "Authorization: Bearer ENTER-YOUR-BEARER-TOKEN-HERE"
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  echo $response;
}
?>
