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
                    if (!isset($_SESSION['ID']) or !isset($_SESSION['user']) or $_SESSION['user'] != "vans" ){
                        redirect('core/logout.php');
                        return;
                    }
                }
            }
        }catch(Exception $e){

        }
    ?>
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header style-header">
        <div class="mdl-layout__header-row">
        <span class="mdl-layout-title style-text-color-grey">IoTools</span>
        <div class="mdl-layout-spacer"></div>
        <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" href="core/logout.php">Logout</a>
        </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">IoTools</span>
        <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="core/logout.php">Logout</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            <div style="text-align:center">
                <h2 class="style-text-color-grey">Toolboxes Status</h2>
            </div>
            <div class="mdl-grid">
                <?php
                    $tools = getTools(null, $db_conn);
                    for ($i=0; $i < count($tools); $i++){
                        echo "<div class='mdl-cell mdl-cell--4-col'>";
                        echo "<div class='mdl-card mdl-shadow--2dp' style='text-align:center'>";
                        echo "<h4>".$tools[$i][1]."</h4>";
                        echo "</div>";
                        echo "</div>";
                    }
                    
                ?>
                
                <div class="mdl-cell mdl-cell--4-col">

                </div>
                <div class="mdl-cell mdl-cell--4-col">

                </div>
            </div>
        </div>
    </main>
    </div>
  </body>

</html>