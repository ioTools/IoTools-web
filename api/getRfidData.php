<?php
    include "../core/dbConnection.php";
    include "../core/functions.php";
    include "../core/models/getData.php";
    include "../core/models/addData.php";
    //http://www.iotools.altervista.com/api/getRfidData.php?idFurgone=1&ecc...
    try{
        $idFurgone = $_GET['idFurgone'];
        $idAttrezzo = $_GET['idAttrezzo'];
        $timestamp = $_GET['timestamp'];
        $latitudine = $_GET['lat'];
        $longitudine = $_GET['long'];
        if (isset($idFurgone) &&
            isset($idAttrezzo)&&
            isset($timestamp) &&
            isset($latitudine) &&
            isset($longitudine)){
                $vans = getVans($idFurgone, $db_conn);
                $tools = getTools($idAttrezzo, $db_conn);
                if (empty($vans)){
                    echo "Error Vans empty";
                    return "Vans empty";
                }
                if(empty($tools)){
                    echo "Error Empty tools";
                    return "Empty tools";
                }
                $timestamp = date("Y-m-d H:i:s", $timestamp);
                $idFurgone = intval($idFurgone);
                $idAttrezzo = intval($idAttrezzo);
                $evento = addEvento($latitudine, $longitudine, $timestamp, $idFurgone, $idAttrezzo, $db_conn);
                if ($evento){
                    echo "OK";
                    return "OK";
                }else{
                    echo "error";
                    return "error";
                }
        }
    }catch(Exception $e){
        return $e;
    }
?>