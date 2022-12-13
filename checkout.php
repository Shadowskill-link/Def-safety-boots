<?php
$conexao = new PDO('mysql:host=localhost; dbname=def_safety', "root", "");
    
     $fullname = $_POST['fullname'];
     $email = $_POST['email'];
     $company = $_POST['company'];
     $address1 = $_POST['address1'];
     $address2 = $_POST['address2'];
     $city = $_POST['city'];
     $provincia =  $_POST['provincia'];


    $insert = $conexao->prepare("INSERT INTO `orders` (`id_orders`, `fullname`, `email`, `company`, `address1`, `address2`, `city`, `provincia`) VALUES (NULL, '{$fullname}', '{$email}', '{$company}', '{$address1}', '{$address2}', '{$city}', '{$provincia}')");
    $insert->bindParam(1, $fullname);
    $insert->bindParam(2, $email);
    $insert->bindParam(3, $company);
    $insert->bindParam(4, $address1); 
    $insert->bindParam(5, $address2);
    $insert->bindParam(6, $city);
    $insert->bindParam(7, $provincia);
    $insert->execute();
    

    if($conexao){
        $order_id = $conexao->lastInsertId();

        foreach($_SESSION['dados'] as $dados){

        $nome_produto = $dados['nome_produto'];
        $descricao_produto = $dados['descricao_produto'];
        $quantity = $dados['quantity'];

        $insert = $conexao->prepare("INSERT INTO `order_produto` (`id`, `id_order`, `nome_produto`, `descricao_produto`, `quantity`) VALUES (NULL, '{$order_id}', '{$nome_produto}', '$descricao_produto', ' $quantity')");  
        
        $insert->bindParam(1, $nome_produto);
        $insert->bindParam(2, $descricao_produto);
        $insert->bindParam(3, $quantity);
        $insert->execute();

    }

    session_destroy();
    header('location: index.php?page=cart');

    }
    
     

?>