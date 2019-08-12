<?php
$curl = curl_init();

// Set parameters needed for url
$parameters = array(
                    'format' => 'xml',
                    'action' => 'query',
                    'titles' => 'Tennis',
                    'prop' => 'revisions',
	            'rvprop' => 'content'
                    );

// Build url
$url = 'https://en.wikipedia.org/w/api.php?';
$finalurl = $url . http_build_query($parameters, '', '&');

// Set options
curl_setopt($curl, CURLOPT_URL, $finalurl);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request
curl_close($curl);
?>
