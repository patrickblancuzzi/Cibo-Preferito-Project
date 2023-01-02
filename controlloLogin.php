<?php
    $secretKey = '6LcaR68jAAAAAL3opAFZ-wJEWfbwEYQizOVFX1hn';
    $token = $_POST['g-token'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $token . "&remoteip=" . $ip;
    $request = file_get_contents($url);
    $response = json_decode($request);



    if ($response->success) {
        echo "Success";
    } else {
        echo "Failed";
    }

    print_r($response);
?>