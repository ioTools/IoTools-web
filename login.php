<?php
  @ob_start();
  session_start();
?>
<html>
  <head>
    <?php
      include "core/views/_header.html";
      try{
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        // error_reporting per togliere il notice quando non trova
        error_reporting(0);
        // inclusione del file per la connessione al database
        include "core/dbConnection.php";
        include "core/functions.php";
        include "core/models/getData.php";
        $loginScreen = null;
        if (!$error_message) {
          $user = $_GET['user'];
          if ($user != null){
            if ($user == "admin"){
              $loginScreen = "core/views/_loginAdmin.php";
            }else if ($user == "vans"){
              $loginScreen = "core/views/_loginVans.php";
            }else{
              redirect('index.php');
            }
          }
        }
        if ($loginScreen == null){
          redirect('index.php');
        }
      }catch(Exception $e){
      }
    ?>
  </head>
  
    <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header style-header">
        <div class="mdl-layout__header-row">
        <span class="mdl-layout-title style-text-color-grey" style="font-weight:600">IoT</span><span class="mdl-layout-title style-text-color-grey">ools</span>
        <div class="mdl-layout-spacer"></div>
        <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link style-text-color-grey" href="index.php">Home</a>
            <a class="mdl-navigation__link style-text-color-grey" href="">Login as Worker</a>
            <a class="mdl-navigation__link style-text-color-grey" href="">About</a>
        </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">IoTools</span>
        <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="index.php">Home</a>
        <a class="mdl-navigation__link" href="">Login as Worker</a>
        <a class="mdl-navigation__link" href="">About</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            <div id="particles-js" width="100%" height="100%" style="width:100%;height:100%">
            </div>
            <?php include($loginScreen); ?>
        </div>
    </main>
    </div>

    </body>



</html>   