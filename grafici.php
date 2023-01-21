<?php
// Creazione dell'immagine
$img = imagecreatetruecolor(600, 400);

// Assegnazione dei colori
$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);

// Leggi il file JSON
$json = file_get_contents('data.json');

// Decodifica il json in un oggetto
$data = json_decode($json);

// Crea l'array associativo per contenere i dati del cibo e le relative occorrenze
$food_count = array();

// Estrarre il cibo e contare le occorrenze
foreach ($data as $person) {
    $food = $person->cibo;
    if (array_key_exists($food, $food_count)) {
        $food_count[$food]++;
    } else {
        $food_count[$food] = 1;
    }
}

// Disegna il grafico a barre
$x = 50;
foreach ($food_count as $food => $count) {
    $bar_height = $count * 20;
    imagefilledrectangle($img, $x, 400 - $bar_height, $x + 30, 400, $red);
    imagestring($img, 4, $x, 400 - $bar_height - 20, $food, $black);
    $x += 50;
}

// Salvataggio o visualizzazione dell'immagine
header("Content-type: image/png");
imagepng($img);

// Liberazione della memoria
imagedestroy($img);
?>
