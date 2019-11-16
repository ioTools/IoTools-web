<?php

    function getAdmins($ID, $db_conn){
        $admin = array();
        if ($ID == null){
            $sql = "SELECT * FROM t_amministratori";
        }else{
            $sql = "SELECT * FROM t_amministratori WHERE (ID='$ID')";
        }
        $ris = mysqli_query($db_conn, $sql);
        if ($ris == false){
            die("error");
        }else{
            if ($ID == null){
                $admin["$i"] = array($ris['ID'], $ris['Nome'], $ris['Cognome'], $ris['Email'], $ris['Password']);
            }else{
                $admin[0] = array($ris['ID'], $ris['Nome'], $ris['Cognome'], $ris['Email'], $ris['Password']);
            }
        }
        
        return $admin;        
    }


?>