<?php
  @ob_start();
  session_start();
?>
<html>
  <head>
    <?php
        include 'core/views/_header.html';
        try{
            //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            // error_reporting per togliere il notice quando non trova
            //error_reporting(0);
            // inclusione del file per la connessione al database
            include "core/dbConnection.php";
            include "core/functions.php";
            include "core/models/getData.php";
            $logged = false;
            if (!$error_message) {
                $logged = $_SESSION['logged'];
                if ($logged){
                    if (!isset($_SESSION['ID']) or !isset($_SESSION['user']) or $_SESSION['user'] != "admin" ){
                        redirect('core/logout.php');
                        return;
                    }
                    if (!$_SESSION['_dashboardLayout']){
                        $_SESSION['_dashboardLayout'] = 'app/views/_home.php';
                    }
                    if (isset($_GET['redirect'])){
                        // se il get è impostato allora includo nella dashboard il percorso del file selezionato
                        $redirect = text_filter($_GET['redirect']);
                        switch ($redirect) {
                          case 'operai':
                            $_SESSION['_dashboardLayout'] = 'core/views/_operai.php';
                            break;
                          case 'furgoni':
                            $_SESSION['_dashboardLayout'] = 'core/views/_furgoni.php';
                            break;
                          case 'squadre':
                            $_SESSION['_dashboardLayout'] = 'core/views/_squadre.php';
                            break;
                          case 'attrezzi':
                            $_SESSION['_dashboardLayout'] = 'core/views/_attrezzi.php';
                            break;
                          case 'home':
                            $_SESSION['_dashboardLayout'] = 'core/views/_home.php';
                            break;
                           case 'impostazioni':
                            $_SESSION['_dashboardLayout'] = 'app/views/_impostazioni.php';
                            break;
                          default:
                            $_SESSION['_dashboardLayout'] = 'app/views/_home.php';
                            break;
                        }
                      }
                }
            }
        }catch(Exception $e){

        }
    ?>
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
                mdl-layout--fixed-header">
        <header class="mdl-layout__header style-header">
            <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer">
            </div>
            <button id="nav-menu"
                  class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons style-text-red">settings</i>
          </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                for="nav-menu"
                style="border-radius:20px">
                <li class="mdl-menu__item" onclick="location.href='index.php#home'">Home</li>
                <li class="mdl-menu__item" onclick="location.href='?redirect=impostazioni'">Settings</li>
                <li class="mdl-menu__item" onclick="location.href='core/logout.php'">Logout</li>
            </ul>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">IoTools</span>
            <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="?redirect=home">Home</a>
            <a class="mdl-navigation__link" href="?redirect=operai">Workers</a>
            <a class="mdl-navigation__link" href="?redirect=furgoni">Vans</a>
            <a class="mdl-navigation__link" href="?redirect=squadre">Squads</a>
            <a class="mdl-navigation__link" href="?redirect=attrezzi">Tools</a>
            <a class="mdl-navigation__link" href="core/logoutphp">Logout</a>
            <hr>
            <span>Logged in as <?php echo $_SESSION['Email']?></span>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
            <?php
                // variabile $error_message situata in dbConnection.php
                if ($error_message) {
                    echo "
                    <script>
                        window.onload = function(){
                        flatAlert('Accesso', 'Impossibile connettersi al database', 'error', 'index.php');
                        }
                    </script>";
                }
                // integra il file salvato nella session
                include $_SESSION['_dashboardLayout'];
            ?>
            </div>
        </main>
    </div>
  </body>

</html>