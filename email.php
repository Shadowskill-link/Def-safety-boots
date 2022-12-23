<?php
 $conexao = new PDO('mysql:host=localhost; dbname=def_safety', "root", "");
    
    $email = $_POST['email'];
    
    $inserts = $conexao->prepare("INSERT INTO `emails` (null,  `email`) VALUES (NULL, '{$email}')");
    $inserts->bindParam(1, $email);
   
    $inserts->execute();

    header('location: index.php?page=home');
    ?>