<?php
require 'config.php';

$permitidos = array('image/jpg','image/jpeg','image/png');


if(in_array($_FILES['arquivo']['type'], $permitidos)){
    $nomes = md5(time().rand(0, 100)).'.jpg';
    move_uploaded_file($_FILES['arquivo']['tmp_name'], 'arquivos/'.$nomes);


} 

$codigo = filter_input(INPUT_POST, 'codigo');
$nome = filter_input(INPUT_POST, 'nome');
$preco = filter_input(INPUT_POST, 'preco');
$quantidade = filter_input(INPUT_POST, 'quantidade');
$quantidade_min = filter_input(INPUT_POST, 'quantidade_min');
$img = filter_input(INPUT_POST, 'arquivo');


    
    if($codigo && $nome && $preco && $quantidade && $quantidade_min){
        $sql = $pdo->prepare("INSERT INTO produtos (codigo,nome,preco,quantidade,quantidade_min,imagens) VALUES (:codigo, :nome, :preco, :quantidade, :quantidade_min, :imagens )");
        $sql->bindValue(":codigo", $codigo);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":preco", $preco);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":quantidade_min", $quantidade_min);
        $sql->bindValue(":imagens", $img);
        $sql->execute();
        
        header("Location:home.php");
        exit;
    }
        else {
            header('Location: cadastrar_produto.php');
            exit;
        }
        
    





?>