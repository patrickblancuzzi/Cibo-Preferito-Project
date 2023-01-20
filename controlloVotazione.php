<?php
    session_start();

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $cibo = $_POST['cibo'];

    $regex = "/^[a-zA-Z]+$/";

    if(!preg_match($regex, $nome) || !preg_match($regex, $cognome)) {
        header("Location: votazione.php?error=1");
    } else {
        $json = file_get_contents("voti.json");
        $data = json_decode($json, true);

        $new_data = array(
            "nome" => $nome,
            "cognome" => $cognome,
            "cibo" => $cibo
        );

        $data[] = $new_data;

        $json = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents("voti.json", $json);

        $_SESSION["voted"] = true;
        header("Location: ringraziamenti.html");
    }
?>