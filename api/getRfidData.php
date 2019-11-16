<?php
    include "core/dbConnection.php";
    include "core/functions.php";
    include "core/models/getData.php";
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
                if (empty($vans) or empty($tools)){
                    return;
                }
                $evento = addEvento($lat, $long, $timestamp, $FK_Furgone, $FK_Attrezzo, $db_conn);
                if ($evento){
                    return "{result:'OK'}";
                }else{
                    return "{result:'error'}";
                }
        }
    }catch(Exception $e){
        return $e;
    }
?>