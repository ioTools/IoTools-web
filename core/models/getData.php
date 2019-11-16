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
        while($ris = mysqli_fetch_array ($ris, MYSQLI_ASSOC)){
            if ($ID == null){
                $admin["$i"] = array($ris['ID'], $ris['Nome'], $ris['Cognome'], $ris['Email'], $ris['Password']);
                $i++;
            }else{
                $admin[0] = array($ris['ID'], $ris['Nome'], $ris['Cognome'], $ris['Email'], $ris['Password']);
            }
        }
        return $admin;        
    }

    function getVans($ID, $db_conn){
        $vans = array();
        $sql = "";
        if ($ID == null){
            $sql = "SELECT * FROM t_furgoni";
        }else{
            $sql = "SELECT * FROM t_furgoni WHERE (ID='$ID')";
        }
        $ris = mysqli_query($db_conn, $sql);
        if ($ris == false){
            die("error");
        }
        $i=0;
        while($ris = mysqli_fetch_array ($ris, MYSQLI_ASSOC)){
            if ($ID == null){
                $vans["$i"] = array($ris['ID'], $ris['Furgone'], $ris['Password']);
                $i++;
            }else{
                $vans[0] = array($ris['ID'], $ris['Furgone'], $ris['Password']);
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
        while($ris = mysqli_fetch_array ($ris, MYSQLI_ASSOC)){
            if ($ID == null){
                $tools["$i"] = array($ris['ID'], $ris['Attrezzo']);
                $i++;
            }else{
                $tools[0] = array($ris['ID'], $ris['Attrezzo']);
            }
        }
        return $tools;        
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