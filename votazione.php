<?php
    session_start();
    if (isset($_SESSION["user"])  && $_SESSION["user"] == "user") {
        if(isset($_SESSION["voted"]) && $_SESSION["voted"] == true) {
            header("Location: ringraziamenti.html");
        }
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <title>Selezione Cibo</title>
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cibi - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="style3.css"/>
</head>
<body>
    <div class="login_form_container">      
        <div>
            <form method="post" action="controlloVotazione.php">
                <div class="login_form">
                    <h1>Vota il tuo cibo preferito!</h1>
                    <div class="anagrafici">
                        <input type="text" required class="name" name="nome" id="nome" placeholder="nome">
                        <input type="text" required class="surname" name="cognome" id="cognome" placeholder="cognome">
                    </div>
                    <div>
                        <center>
                            <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 1) {
                                        echo "<p class='error_p'>Nome e cognome non devono contenere caratteri speciali</p>";
                                    }
                                }
                            ?>
                        </center>
                    </div>
                    <div class="label">
                        <p class="preSelector">
                            Seleziona:
                        </p>
                    </div>
                    <div class="selector">
                        <select name="cibo" id="cibo">
                            <option value="pizza">Pizza</option>
                            <option value="carbonara">Carbonara</option>
                            <option value="sushi">Sushi</option>
                            <option value="hotdog">Hot Dog</option>
                            <option value="tacos">Tacos</option>
                            <option value="frico">Frico</option>
                            <option value="frittata">Frittata</option>
                            <option value="lasagne">Lasagne</option>
                            <option value="cotoletta">Cotoletta</option>
                            <option value="riso">Risotto</option>
                        </select>
                    </div>
                    <div class="button_group" id="login_button">
                        <button type="submit">invia</button>
                      </div>
                </div>
            </form> 
        </div>
    </div>
</body>
</html>