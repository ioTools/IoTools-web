<?php
  @ob_start();
  session_start();
  include '../dbConnection.php';
  include '../functions.php';
  include 'getData.php';
  if (isset($_GET['id'])){
    $id = text_filter($_GET['id']);
    if (!is_numeric($id)){
      redirect('../../dashboard.php?redirect=home');
    }
    if (isset($_GET['data'])){
      $data = text_filter($_GET['data']);
      switch ($data) {
        case 'attrezzatura':
          deleteAttrezzatura($id, $db_conn);
          break;
        case 'furgone':
          deleteFurgoni($id, $db_conn);
          break;
        case 'squadra':
          deleteSquadra($id, $db_conn);
          break;
        default:
          redirect('../../dashboard.php?redirect=home');        
          break;
      }
    }
  }
function deleteAttrezzatura($id, $db_conn){
    $sql = "DELETE FROM t_attrezzi WHERE ID='$id'";
    $deleteQuery = mysqli_query($db_conn, $sql);
    if ($deleteQuery == null){
      die("Errore nella cancellazione dell'attrezzatura: contattare l'amministratore");
    }
    redirect('../../dashboard.php?redirect=attrezzi');
  }


  function deleteFurgoni($id, $db_conn){
    $sql = "DELETE FROM t_furgoni WHERE ID='$id'";
    $deleteQuery = mysqli_query($db_conn, $sql);
    if ($deleteQuery == null){
      die("Errore nella cancellazione del furgone: contattare l'amministratore");
    }
    redirect('../../dashboard.php?redirect=furgoni');
  }

  function deleteSquadra($id, $db_conn){
    $sql = "DELETE FROM t_squadre WHERE ID='$id'";
    $deleteQuery = mysqli_query($db_conn, $sql);
    if ($deleteQuery == null){
      die("Errore nella cancellazione della squadra: contattare l'amministratore");
    }
    redirect('../../dashboard.php?redirect=squadre');
  }

 ?>
