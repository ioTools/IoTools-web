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
          $furgoni = text_filter($_POST["furgoni"]);
          $addFurgoni = addFurgoni($furgoni, $db_conn);
          if ($addFurgoni){
            echo "
            <script>
              flatAlert('', 'Added new van', 'success', '../../dashboard.php?redirect=furgoni');
            </script>";
            return;
          }else{
            echo "
            <script>
              flatAlert('Error', 'Check your data', 'error', '../../dashboard.php?redirect=furgoni');
            </script>";
            return;
          }
        }
      }
    ?>
  </body>
</html>
