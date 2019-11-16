<?php

    function getAdmins($ID, $db_conn){
        $admin = array();
        $sql = "";
        if ($ID == null){
            $sql = "SELECT * FROM t_amministratori";
        }else{
            $sql = "SELECT * FROM t_amministratori WHERE (ID='$ID')";
        }
        $ris = mysqli_query($db_conn, $sql);
        if ($ris == false){
            die("error");
        }
        $i=0;
        while($risultato = mysqli_fetch_array ($ris, MYSQLI_ASSOC)){
            if ($ID == null){
                $admin["$i"] = array($risultato['ID'], $risultato['Nome'], $risultato['Cognome'], $risultato['Email'], $risultato['Password']);
                $i++;
            }else{
                $admin[0] = array($risultato['ID'], $risultato['Nome'], $risultato['Cognome'], $risultato['Email'], $risultato['Password']);
            }
        }
        return $admin;        
    }
    function getWorkers($ID, $db_conn){
        $workers = array();
        $sql = "";
        if ($ID == null){
            $sql = "SELECT * FROM t_lavoratore ORDER BY FK_Squadra";
        }else{
            $sql = "SELECT * FROM t_lavoratore WHERE (ID='$ID')";
        }
        $ris = mysqli_query($db_conn, $sql);
        if ($ris == false){
            die("error");
        }
        $i=0;
        while($risultato = mysqli_fetch_array ($ris, MYSQLI_ASSOC)){
            if ($ID == null){
                $workers["$i"] = array($risultato['ID'], $risultato['Nome'], $risultato['Cognome'], $risultato['Cellulare'], $risultato['FK_Squadra']);
                $i++;
            }else{
                $workers[0] = array($risultato['ID'], $risultato['Nome'], $risultato['Cognome'], $risultato['Cellulare'], $risultato['FK_Squadra']);
            }
        }
        return $workers;        
    }
    function getVans($ID, $db_conn){
        $vans = array();
        $sql = "";
        if ($ID == null){
            $sql = "SELECT * FROM t_furgoni";
        }else{
            $sql = "SELECT * FROM t_furgoni WHERE ID='$ID'";
        }
        $ris = mysqli_query($db_conn, $sql);
        if ($ris == false){
            die("error");
        }
        $i=0;
        while($risultato = mysqli_fetch_array ($ris, MYSQLI_ASSOC)){
            if ($ID == null){
                $vans["$i"] = array($risultato['ID'], $risultato['Furgone'], $risultato['Password']);
                $i++;
            }else{
                $vans[0] = array($risultato['ID'], $risultato['Furgone'], $risultato['Password']);
            }
        }
        return $vans;        
    }

    function getTools($ID, $db_conn){
        $tools = array();
        $sql = "";
        if ($ID == null){
            $sql = "SELECT * FROM t_attrezzi";
        }else{
            $sql = "SELECT * FROM t_attrezzi WHERE (ID='$ID')";
        }
        $ris = mysqli_query($db_conn, $sql);
        if ($ris == false){
            die("error");
        }
        $i=0;
        while($risultato = mysqli_fetch_array ($ris, MYSQLI_ASSOC)){
            if ($ID == null){
                $tools["$i"] = array($risultato['ID'], $risultato['Attrezzo'], $risultato['Speciale']);
                $i++;
            }else{
                $tools[0] = array($risultato['ID'], $risultato['Attrezzo'], $risultato['Speciale']);
            }
        }
        return $tools;        
    }
    
    function getEvento($ID, $db_conn){
        $evento = array();
        $sql = "";
        if ($ID == null){
            $sql = "SELECT * FROM t_evento ORDER BY Tempo";
        }else{
            $sql = "SELECT * FROM t_evento WHERE (ID='$ID')";
        }
        $ris = mysqli_query($db_conn, $sql);
        if ($ris == false){
            die("error");
        }
        $i=0;
        while($risultato = mysqli_fetch_array ($ris, MYSQLI_ASSOC)){
            if ($ID == null){
                $evento["$i"] = array($risultato['ID'], $risultato['FK_Attrezzo'], $risultato['Tempo'], $risultato['FK_Furgone'], $risultato['Latitudine'], $risultato['Longitudine']);
                $i++;
            }else{
                $evento[0] = array($risultato['ID'], $risultato['FK_Attrezzo'], $risultato['Tempo'], $risultato['FK_Furgone'], $risultato['Latitudine'], $risultato['Longitudine']);
            }
        }
        return $evento;        
    }
    function getSquad($ID, $db_conn){
        $squads = array();
        $sql = "";
        if ($ID == null){
            $sql = "SELECT * FROM t_squadre";
        }else{
            $sql = "SELECT * FROM t_squadre WHERE (ID='$ID')";
        }
        $ris = mysqli_query($db_conn, $sql);
        if ($ris == false){
            die("error");
        }
        $i=0;
        while($risultato = mysqli_fetch_array ($ris, MYSQLI_ASSOC)){
            if ($ID == null){
                $squads["$i"] = array($risultato['ID'], $risultato['Squadra'], $risultato['FK_Furgone']);
                $i++;
            }else{
                $squads[0] = array($risultato['ID'], $risultato['Squadra'], $risultato['FK_Furgone']);
            }
        }
        return $squads;        
    }
    function checkAdminPassword($id, $password, $db_conn){
        $selectQuery = "SELECT * FROM t_amministratori WHERE ID='$id' AND Password='$password'";
        $select = mysqli_query($db_conn, $selectQuery);
        if ($select==null){
          die('error');
        }
        $admin = false;
        while($ris = mysqli_fetch_array ($select, MYSQLI_ASSOC)){
          $admin = getAdmins($ID, $db_conn);
        }
        return $admin;
      }

      function checkVansPassword($id, $password, $db_conn){
        $selectQuery = "SELECT * FROM t_furgoni WHERE ID='$id' AND Password='$password'";
        $select = mysqli_query($db_conn, $selectQuery);
        if ($select==null){
          die('error');
        }
        $vans = false;
        while($ris = mysqli_fetch_array ($select, MYSQLI_ASSOC)){
          $vans = getVans($ID, $db_conn);
        }
        return $vans;
      }
?>