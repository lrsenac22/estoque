<?php
require 'config.php';
 

$codigo = filter_input(INPUT_GET, 'codigo');
$nome = filter_input(INPUT_GET, 'nome');
$preco = filter_input(INPUT_GET, 'preco');
$quantidade = filter_input(INPUT_GET, 'quantidade');
$quantidade_min = filter_input(INPUT_GET, 'quantidade_min');
//$img = filter_input(INPUT_GET, 'avatar');


    
    if($codigo && $nome && $preco && $quantidade && $quantidade_min){
        
        $sql = $pdo->prepare("INSERT INTO produtos (codigo,nome,preco,quantidade,quantidade_min) VALUES (:codigo, :nome, :preco, :quantidade, :quantidade_min)");
        $sql->bindValue(":codigo", $codigo);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":preco", $preco);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":quantidade_min", $quantidade_min);
        
        $sql->execute();
        
        header("Location:home.php");
        exit;
    }
        else {
            //header('Location: cadastrar_produto.php');
            // exit;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./static/style_home.css">
    <link rel="stylesheet" href="./static/style_cadastroP.css">
</head>
<body>

<div class="container">

<header>
        <a href="#" class="btn-abrir" onclick="abrirMenu()">&#9776; Menu</a>
        <img src="./static/img/estoque.png" alt="" srcset="">

    </header>
    
    <nav id="menu">
        <a href="#" onclick="fecharMenu()">&times; Fechar</a>
        <a href="home.php">Home</a>
        <a href="cadastrar_produto.php">Cadastrar Estoque</a>
        <a href="relatorio.php">Relatório</a>
    </nav>
    <main id="main"> 
        <h1>Consulta de Estoque</h1>



    <div class="formulario">

    
    <form action="" method="get" enctype="multipart/form-data">
        
            <label for="codigo">Codigo:</br>
            <input  class="inp"type="text" name="codigo">
            </label>
        
        
            <label for="">Nome:</br>
            <input type="text" name="nome">
            </label>
        
       
            <label for="">Preço:</br></br>
            <input class="inp" type="text" name="preco">
            </label>
        
        
            <label for="">Quantidade: </br>
            <input  class="inp"type="text" name="quantidade">
            </label>
        
       
            <label for="">Quantidade est: <br/>
            <input class="inp" type="text" name="quantidade_min">
            </label>
        
        
        
            <input type="submit" class="botao" name="enviar">
        
              </form>
    </div>
        </main>
<script>
        function abrirMenu(){
            document.getElementById('menu').style.width = '250px';
            document.getElementById('main').style.marginLeft= '250px';
        }
        function fecharMenu(){
            document.getElementById('menu').style.width = '0px';
            document.getElementById('main').style.marginLeft = '0px';
        }
        
    </script>
</body>
</html>