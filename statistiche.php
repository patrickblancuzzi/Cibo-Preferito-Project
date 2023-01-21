<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Document</title>
</head>
<body>
<section class="resetSession">
        <div class="containerGraphBtns">
            <!-- elimina section -->
            <a href="logout.php" class="button" style="text-align: center">Log-Out</a>
        </div>
    </section>
    <div class="title">
        <h1 class="bigTitle">STATISTICHE</h1>
    </div>
    <section class="firstPart">
        <div class="containerGraphBtns">
            <div class="containerButtons">
                <a href="#" class="button">Torta</a>
                <a href="#" class="button">Barre</a>
            </div>
            <div class="graphic">
                <!-- INSERISCI IL GRAFICO -->
                <img src="grafici.php" alt="Grafico a barre">
            </div>
        </div>
    </section>
    <?php
        if(isset($_SESSION["user"]) && $_SESSION["user"] == "admin"){

            echo '<section class="sectionVotanti">';
                echo '<div class="totVotanti">';
                    echo '<div class="textVotanti">';
                        echo '<h2 class="textTotVotanti">Totale Votanti:</h2>';
                    echo '</div>';
                    echo '<div class="textVotanti">';
                        echo '<h2 class="numeroVotanti">0</h2>';
                    echo '</div>';
                echo '</div>';
            echo '</section>';

            $json_string = file_get_contents("voti.json");
            $data = json_decode($json_string, true);

            echo '<section class="tableVotanti">';
                echo '<div class="tableCont">';
                echo '<table>';
                    echo '<tr>';
                        echo '<th>Nome</th>';
                        echo '<th>Cognome</th>';
                        echo '<th>Cibo</th>';
                    echo '</tr>';
                    foreach ($data as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["cognome"] . "</td>";
                        echo "<td>" . $row["cibo"] . "</td>";
                        echo "</tr>";
                    }
                echo '</table>';
                echo '</div>';
            echo '</section>';
        }
    ?>
</body>
</html>