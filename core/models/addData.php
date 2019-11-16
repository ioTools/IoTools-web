<?php
  function addEvento($lat, $long, $timestamp, $FK_Furgone, $FK_Attrezzo, $db_conn){
    $sql = "INSERT INTO t_evento (Latitudine, Longitudine, Tempo, FK_Furgone, FK_Attrezzo) 
            VALUES ('$lat', '$long', '$timestamp', $FK_Furgone, $FK_Attrezzo)";
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
  function addAttrezzatura($nome, $db_conn){
    $sql = "INSERT INTO t_attrezzi (Attrezzo) 
            VALUES ('$nome')";
    try {
      $addAttrezzatura = mysqli_query($db_conn, $sql);
      if (!$addAttrezzatura){
        return false;
      }
    } catch (Exception $e) {
      return false;
    }
    return true;
  }
  function addFurgoni($nome, $db_conn){
    $sql = "INSERT INTO t_furgoni (Furgone) 
            VALUES ('$nome')";
    try {
      $addFurgone = mysqli_query($db_conn, $sql);
      if (!$addFurgone){
        return false;
      }
    } catch (Exception $e) {
      return false;
    }
    return true;
  }
  function addSquadra($squadra, $idFurgone, $db_conn){
    $sql = "INSERT INTO t_squadre (Squadra, FK_Furgone) 
            VALUES ('$squadra', '$idFurgone')";
    try {
      $addSquadra = mysqli_query($db_conn, $sql);
      if (!$addSquadra){
        return false;
      }
    } catch (Exception $e) {
      return false;
    }
    return true;
  }
  function addOperai($nome, $cognome, $cellulare, $squadra, $db_conn){
    $sql = "INSERT INTO t_lavoratore (Nome, Cognome, Cellulare, FK_Squadra) 
            VALUES ('$nome', '$cognome', '$cellulare', '$squadra')";
    try {
      $addOperai = mysqli_query($db_conn, $sql);
      if (!$addOperai){
        return false;
      }
    } catch (Exception $e) {
      return false;
    }
    return true;
  }
?>