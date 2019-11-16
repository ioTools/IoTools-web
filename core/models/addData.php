<?php
  function addEvento($lat, $long, $timestamp, $FK_Furgone, $FK_Attrezzo, $db_conn){
    $sql = "INSERT INTO t_evento (Latitudine, Longitudine, Tempo, FK_Furgone, FK_Attrezzo) 
            VALUES ('$lat', '$long', '$timestamp', '$FK_Furgone', '$FK_Attrezzo')";
    try {
      $addEvento = mysqli_query($db_conn, $sql);
      if (!$addEvento){
        return false;
      }
    } catch (Exception $e) {
      return false;
    }
    return true;
  }

?>