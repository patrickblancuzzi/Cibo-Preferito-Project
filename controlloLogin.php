<?php
    $secretKey = '6LcaR68jAAAAAL3opAFZ-wJEWfbwEYQizOVFX1hn';
    $token = $_POST['g-token'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $token . "&remoteip=" . $ip;
    $request = file_get_contents($url);
    $response = json_decode($request);

    if ($response->success) {
        $user_input_password = $_POST["psw"];

        $json = file_get_contents("users.json");
        $data = json_decode($json, true);
        
        if (password_verify($user_input_password, $data["user"]["password"])) {
            session_start();
            $_SESSION["user"] = "user";
            header("Location: votazione.php");
        } elseif (password_verify($user_input_password, $data["admin"]["password"])) {
            session_start();
            $_SESSION["user"] = "admin";
            header("Location: statistiche.php");
        } else {
            header('Location: index.php?error=2');
        }
    } else {
        header("Location: index.php?error=1");
    }
?>