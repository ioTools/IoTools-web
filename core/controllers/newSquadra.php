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
          $squadra = text_filter($_POST["squadra"]);
          $furgone = text_filter($_POST["furgone"]);
          $addSquadra = addSquadra($squadra, $furgone, $db_conn);
          if ($addSquadra){
            echo "
            <script>
              flatAlert('', 'Added new squad', 'success', '../../dashboard.php?redirect=squadre');
            </script>";
            return;
          }else{
            echo "
            <script>
              flatAlert('Error', 'Controlla bene i dati immessi', 'error', '../../dashboard.php?redirect=squadre');
            </script>";
            return;
          }
        }
      }
    ?>
  </body>
</html>
