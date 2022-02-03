<?php


try{

    $db = new PDO('mysql:host=localhost;dbname=members;charset=utf8','root','');


} catch(Exception $e) {

    die('Erreur mon vieux ! : '.$e->getMessage());
}







?>