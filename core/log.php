<?php
  @ob_start();
  session_start();
  include "functions.php";
  // raccoglie i dati del client
  $ipaddress = $_SERVER['REMOTE_ADDR'];
  $timestamp = date('d/m/Y H:i:s');
  $browser = $_SERVER['HTTP_USER_AGENT'];
  $line = "Connessione: [".$timestamp."] - ".$_SESSION['ID']." - ".$ipaddress." - ".$browser."\n";
  $filename = "log.txt";
  $filedir = "../logs/$filename";
  chmod('../logs', 0777);
  // salva nel log di accesso i dati del client
  if (!file_exists($filedir)){
    $log = fopen($filedir, "w");
  }else{
    $log = fopen($filedir, "a+");
  }
  fwrite($log, $line);
  fclose($log);
  $user = $_SESSION['user'];
  if (isset($user)){
    if ($user == "admin"){

    }else if ($user == "vans"){

    }else{
      redirect("logout.php");
    }
  }else{
    redirect("logout.php");
  }
  redirect("../dashboard.php");
?>
