<?php
    session_start();
    require("grafici.php");
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <!-- <a href="#" class="button">Torta</a>
                <a href="#" class="button">Barre</a> -->
            </div>
        <div class="low-graph">
            <center>
                <div class="graphic">
                    <div style="width: 500px">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </center>
        </div>
        </div>
    </section>
    <?php
        if(isset($_SESSION["user"]) && $_SESSION["user"] == "admin"){

            $json_string = file_get_contents("voti.json");
            $data = json_decode($json_string, true);

            echo '<section class="sectionVotanti">';
                echo '<div class="totVotanti">';
                    echo '<div class="textVotanti">';
                        echo '<h2 class="textTotVotanti">Totale Votanti:</h2>';
                    echo '</div>';
                    echo '<div class="textVotanti">';
                        echo '<h2 class="numeroVotanti">' . count($data) . '</h2>';
                    echo '</div>';
                echo '</div>';
            echo '</section>';

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

<script>
  const ctx = document.getElementById('myChart');

    let json

    fetch('voti.json')
    .then(response => response.json())
    .then(data => {
        json = data;
        console.log(json)
        const nomiCibi = json.map(json => json.cibo);
        console.log(nomiCibi);
        
        let pizza = 0
    let carbonara = 0
    let sushi = 0
    let hotdog = 0
    let tacos = 0
    let frico = 0
    let frittata = 0
    let lasagne = 0
    let cotoletta = 0
    let riso = 0

    nomiCibi.forEach(element => {
        if(element == "pizza"){
            pizza++
            console.log("AA")
        }else if(element == "carbonara"){
            carbonara++
        }else if(element == "sushi"){
            sushi++
        }else if(element == "hotdog"){
            hotdog++
        }else if(element == "tacos"){
            tacos++
        }else if(element == "frico"){
            frico++
        }else if(element == "frittata"){
            frittata++
        }else if(element == "lasagne"){
            lasagne++
        }else if(element == "cotoletta"){
            cotoletta++
        }else if(element == "riso"){
            riso++
        }
    });

    console.log(pizza)

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ['Pizza', 'Carbonara', 'Sushi', 'Hotdog', 'Tacos', 'Frico', 'Frittata', 'Lasagne', 'Cotoletta', 'Riso'],
        datasets: [{
            label: '# of Votes',
            data: [pizza, carbonara, sushi, hotdog, tacos, frico, frittata, lasagne, cotoletta, riso],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        },
        defaultFontColor: '#fff'
        }
    });
    })
</script>
</body>
</html>