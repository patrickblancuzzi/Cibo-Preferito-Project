<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cibi - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="style.css" />
    <script src="https://www.google.com/recaptcha/api.js?render=6LcaR68jAAAAAPf2rbrNSGRKaeBxwFKPVNCWf0Va"></script>
</head>
    <div class="login_form_container">
      <form action="controlloLogin.php" method="post" id="login-form">
        <div class="login_form">
          <h2>Accedi</h2>
          <div class="input_group">
            <i class="fa fa-unlock-alt"></i>
            <input
              type="password"
              placeholder="Password"
              class="input_text"
              autocomplete="off"
              name="psw"
            />
          </div>
          <div>
            <input type="hidden" id="g-token" name="g-token">
          </div>
          <div>
            <center>
                <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 1) {
                            echo "<p class='error_p'>ReCaptcha non validato prova ad aggiornare la pagina</p>";
                        } elseif ($_GET['error'] == 2) {
                            echo "<p class='error_p'>Password errata</p>";
                        }
                    }
                ?>
            </center>
          </div>
          <center>
              <div class="button_group" id="login_button">
                <button type="submit">invia</button>
              </div>
          </center>
        </div>
      </form>
      <div class="cointainerPopup" id="popup">
        <img src="./404-tick.png">
        <h2>Grazie!</h2>
        <p>Abbiamo registrato la tua risposta</p>
        <button type="button">OK</button>
      </div>
    </div>
    <!-- <script>
      const loginForm = document.getElementById('login-form');
      loginForm.addEventListener('submit', (event) => {
        // Previene l'invio del modulo e il ricaricamento della pagina
        event.preventDefault();

        // Mostra il popup
        alert('Il modulo è stato inviato');
      });

    </script> -->
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LcaR68jAAAAAPf2rbrNSGRKaeBxwFKPVNCWf0Va', {action: 'homepage'}).then(function(token) {
            document.getElementById("g-token").value = token;
            });
        });
    </script>
  </body>
</html>