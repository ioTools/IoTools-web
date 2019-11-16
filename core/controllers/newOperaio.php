<?php
  @ob_start();
  session_start();
  include '../dbConnection.php';
  include '../functions.php';
  include '../models/getData.php';
  include '../models/addData.php';
 ?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../../js/script.js"></script>
    <script src="../../js/sweetalert.js"></script>
    <link type="text/css" rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/font-quicksand.css">
  </head>
  <body>
    <?php
      if (!$error_message) {
        if (isset($_POST['salva'])){
          $nome = text_filter($_POST["nome"]);
          $cognome = text_filter($_POST["cognome"]);
          $cellulare = text_filter($_POST["cellulare"]);
          $squadra = text_filter($_POST["squadra"]);
          $addOperai = addOperai($nome, $cognome, $cellulare, $squadra, $db_conn);
          if ($addOperai){
            echo "
            <script>
              flatAlert('', 'Added new worker', 'success', '../../dashboard.php?redirect=operai');
            </script>";
            return;
          }else{
            echo "
            <script>
              flatAlert('Error', 'Error, check your data', 'error', '../../dashboard.php?redirect=operai');
            </script>";
            return;
          }
        }
      }
    ?>
  </body>
</html>
