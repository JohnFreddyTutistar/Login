<?php
    $con=true;
    $address='localhost';
    $user='root';
    $password="";
    $databases="final";
    $connection=new mysqli($address,$user,$password,$databases);
    if($connection->connect_errno){
        $con=false;
        echo "Fallo al conectar a MySql";
    }
?>