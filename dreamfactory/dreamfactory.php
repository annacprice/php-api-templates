<?php
    // Initialise curl
    $ch1 = curl_init();

    // STEP 1: Get session token
    $login = array("email" => "email_here", "password" => "password_here");
    $login_string = json_encode($login);

    $headers1 = array('Content-Type: application/json');
    $url1 = 'https://api.com/user/session';

    curl_setopt($ch1, CURLOPT_URL, $url1);
    curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $login_string);
    curl_setopt($ch1, CURL_HTTPHEADER, $headers1);
    curl_setopt($ch1, CURL_RETURNTRANSFER, true);

    $result1 = curl_exec($ch1);
    $response1 = json_decode($result1);
    $token = $reposnse1->session_token;

    // STEP 2: Use session token to make API call
    $headers2 = array(
                     'accept: application/json',
                     'X-DreamFactory-API-Key: key_here',
                     "X-DreamFactory-Session-Token: $token"
                     );
    $url2 = 'https://api.com/call';

    curl_setopt($ch1, CURLOPT_URL, $url2);
    curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch1, CURLOPT_POSTFIELDS, '');
    curl_setopt($ch1, CURL_HTTPHEADER, $headers2);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

    $result2 = curl_exec($ch1);
    $response2 = json_decode($result2);

    curl_close($ch1);
?>
