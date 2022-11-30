<?php
require 'config.php';
$permitidos = array('image/jpg','image/jpeg','image/png');

$id = filter_input(INPUT_POST, 'id');

if(in_array($_FILES['arquivo']['type'], $permitidos)){
    $nomes = $_FILES['arquivo']['name'];;
    move_uploaded_file($_FILES['arquivo']['tmp_name'], 'arquivos/'.$nomes);
    
    
    $sql = $pdo->prepare("UPDATE produtos SET imagens = :imagens WHERE id = :id");
    $sql->bindValue(':id',$id);
    $sql->bindValue(':imagens',$nomes);
    $sql->execute();
    
    header("Location:home.php");
    exit;
    
}else{
    header("Location:editar.php");
    exit;
  }  


