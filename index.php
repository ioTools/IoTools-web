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
            error_reporting(0);
            // inclusione del file per la connessione al database
            include "core/dbConnection.php";
            include "core/functions.php";
            include "core/models/getData.php";
            $logged = false;
            if (!$error_message) {
                $logged = $_SESSION['logged'];
                if ($logged){
                    if (!isset($_SESSION['ID']) or !isset($_SESSION['user'])){
                        redirect('core/logout.php');
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
        <span class="mdl-layout-title style-text-color-grey" style="font-weight:600">IoT</span><span class="mdl-layout-title style-text-color-grey">ools</span>
        <div class="mdl-layout-spacer"></div>
        <nav class="mdl-navigation mdl-layout--large-screen-only">
            <?php
                if($logged){
                    echo '<a class="mdl-navigation__link style-text-color-grey" href="core/logout.php">Logout</a>';
                }else{
                    echo '<a class="mdl-navigation__link style-text-color-grey" href="login.php?user=admin">Login as Admin</a>';
                    echo '<a class="mdl-navigation__link style-text-color-grey" href="login.php?user=vans">Login as Worker</a>';
                    
                }
            ?>
            <a class="mdl-navigation__link style-text-color-grey" href="">About</a>
        </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">IoTools</span>
        <nav class="mdl-navigation">
        <?php
                if($logged){
                    echo '<a class="mdl-navigation__link style-text-color-grey" href="core/logout.php">Logout</a>';
                }else{
                    echo '<a class="mdl-navigation__link style-text-color-grey" href="login.php?user=admin">Login as Admin</a>';
                    echo '<a class="mdl-navigation__link style-text-color-grey" href="login.php?user=vans">Login as Worker</a>';
                    
                }
            ?>
            <a class="mdl-navigation__link style-text-color-grey" href="">About</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">
            <div id="particles-js" width="100%" height="100%" style="width:100%;height:100%">
            </div>
            <section id="home">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--7-col" 
                        style="text-align:center">
                    <br><br><br><br>
                    <h2 class="style-text-color-grey">Reinventing <span style="font-weight:600">tools</span> tracking through <span style="font-weight:600">IoT</span>...</h2>
                    <br><br>
                    <?php
                        if($logged){
                        echo '<button class="style-button-red" onclick="location.href='."'dashboard.php'".'">ENTER</button>';
                        }else {
                        echo '<button class="style-button-red" onclick="location.href='."'login.php?user=admin'".'">START NOW!</button>';
                        }
                    ?>
                    <button class="style-button-white" onclick="location.href='#explore'">MORE</button>
                    </div>
                    <div class="mdl-cell mdl-cell--5-col mdl-cell--hide-phone" style="background:url('img/abstract.svg');background-repeat:no-repeat;background-size:contain;text-align:center">
                    <img src="imgs/tool.png" 
                        class="style-home-image"
                        onclick="openImage('tool.png')" 
                        style="width:80%;margin-top:30%"></img>
                    </div>
                </div>
                <div class="style-arrow animated bounce">
                    <i class="material-icons style-arrow-icon">keyboard_arrow_down</i>
                </div>
            </section>
            <section id="explore">
                
            </section>
        </div>
    </main>
    </div>
  </body>

</html>