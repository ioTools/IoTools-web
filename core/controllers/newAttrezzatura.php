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
          $attrezzatura = text_filter($_POST["attrezzatura"]);
          $speciale = text_filter($_POST["speciale"]);
          $addAttrezzatura = addAttrezzatura($attrezzatura,$speciale, $db_conn);
          if ($addAttrezzatura){
            echo "
            <script>
              flatAlert('', 'Attrezzatura aggiunta con successo', 'success', '../../dashboard.php?redirect=attrezzi');
            </script>";
            return;
          }else{
            echo "
            <script>
              flatAlert('Errore nell\'aggiunta dell\'attrezzatura', 'Controlla bene i dati immessi', 'error', '../../dashboard.php?redirect=attrezzi');
            </script>";
            return;
          }
        }
      }
    ?>
  </body>
</html>
