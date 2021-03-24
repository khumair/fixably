<?php
function fetch_token()
{
    $postRequest = array(
        'Email' => 'matti.meikalainen@fixably.com',
        'Name' => 'Matti Meikäläinen'
    );

    $headers[] = "Content-Type: multipart/form-data";

    $ch = curl_init('https://careers-api.fixably.com/token');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postRequest);
    // $apiResponse - available data from the API request
    $apiResponse = curl_exec($ch);
    $jsonArrayResponse = json_decode($apiResponse, true);
    // TODO: set token in session 
    return $jsonArrayResponse;
    
}

function post($uri, $token, $data = null)
{
    $headers[] = "Content-Type: multipart/form-data";
    $headers[] = "X-Fixably-Token: " . $token;

    $ch = curl_init('https://careers-api.fixably.com/' . $uri);
   
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    // $apiResponse - available data from the API request
    $apiResponse = curl_exec($ch);
    $jsonArrayResponse = json_decode($apiResponse, true);
    if(array_key_exists('error', $jsonArrayResponse)) {
        $tokenData = fetch_token();
        $token = $tokenData['token'];
        $_SESSION['token'] = $token;
        stream_set_timeout($token, 2);
        if($token)
        post($uri, $token, $data);
    }
    else
        return $jsonArrayResponse;

}

function get($uri, $token)
{
    $headers[] = "Content-Type: multipart/form-data";
    $headers[] = "X-Fixably-Token: " . $token;

    $ch = curl_init('https://careers-api.fixably.com/' . $uri);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $apiResponse = curl_exec($ch);
    $jsonArrayResponse = json_decode($apiResponse, true);
    if(array_key_exists('error', $jsonArrayResponse)) {
        $tokenData = fetch_token();
        $token = $tokenData['token'];
        // session_start();
        $_SESSION['token'] = $token;
        get($uri, $token);

    }
    else
        return $jsonArrayResponse;
    
  
}
