<?php
$conexao = new PDO('mysql:host=localhost; dbname=def_safety', "root", "");
    
     $email = $_POST['email'];
     $password = $_POST['password'];
     $adress = $_POST['adress'];
     $adress2 = $_POST['adress2'];
     $city = $_POST['city'];
     $state = $_POST['state'];
     $zip = $_POST['zip'];
     $country =  $_POST['country'];


    $insert = $conexao->prepare("INSERT INTO `distributor`(`id`, `email`, `password`, `adress`, `adress2`, `city`, `state`, `zip`, `country`) VALUES (null, '{$email}','{$password}','{$adress}','{$adress2}','{$city}','{$state}','{$zip}','{$country}')");
    $insert->bindParam(1, $email);
    $insert->bindParam(2, $password);
    $insert->bindParam(3, $adress);
    $insert->bindParam(4, $adress2); 
    $insert->bindParam(5, $city);
    $insert->bindParam(6, $state);
    $insert->bindParam(7, $zip); 
    $insert->bindParam(8, $country);
    $insert->execute();
    
    header('location: index.php');     

?>