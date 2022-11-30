<?php
    require 'config.php';

   
    $id = filter_input(INPUT_POST, 'id');
    $codigo = filter_input(INPUT_POST, 'codigo'); 
    $nome = filter_input(INPUT_POST, 'nome'); 
    $preco = filter_input(INPUT_POST, 'preco'); 
    $quantidade = filter_input(INPUT_POST, 'quantidade'); 
    $quantidade_min = filter_input(INPUT_POST, 'quantidade_min'); 
    
    
 
    
    if($id && $codigo && $nome && $preco && $quantidade && $quantidade_min) {

        $sql = $pdo->prepare("UPDATE produtos SET codigo = :codigo, nome = :nome, preco = :preco, quantidade = :quantidade, quantidade_min = :quantidade_min WHERE id = :id");
        $sql->bindValue(':codigo',"$codigo"); 
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':preco',$preco);
        $sql->bindValue(':quantidade',$quantidade);
        $sql->bindValue(':quantidade_min',$quantidade_min);
        $sql->bindValue(':id',$id); 
        $sql->execute(); 
        
        header("Location: home.php");
        exit;

    } else {
         
         header('Location: editar.php'); 
         exit;
    }    