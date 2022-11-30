<?php
    session_start();
    ob_start();
    require 'config.php';

    $list = [];

    $sql = $pdo->query("SELECT * FROM produtos WHERE quantidade_min > quantidade");
    if($sql->rowCount() > 0){
        $list = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Nem um produto está com estoque baixo";
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 <link rel="stylesheet" href="./static/style_home.css">
 <link rel="stylesheet" href="./static/style_prod.css">

    <title>Document</title>
    <link rel="stylesheet" href="./static/style_prod.css">
</head>
<body>
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




    <div class="container">

    <div class="conteudo">
        <h1 class="relh1">Relatório</h1>
        
        
        <table >
            <tr>
                <th>Nome do Produto</th>
                <th>Qtd.</th>
                <th>Qtd. Mínima</th>
                <th>Diferença</th>
            </tr>
            <?php foreach($list as $item): ?>
                
                <tr>
                    <td><?=$item['nome'];?></td>
                    <td><?=$item['quantidade'];?></td>
                    <td><?=$item['quantidade_min'];?></td>
                    <td><?php echo (floatVal($item['quantidade_min']) - floatVal($item['quantidade'])); ?></td>
                </tr>
                <?php endforeach; ?>    
            </table>
            <button  onclick="imprimir()">Imprimir</button>
    </div>
</div>

<script >
    function imprimir(){
        window.print();
    }
        function abrirMenu(){
        document.getElementById('menu').style.width = '250px';
            document.getElementById('main').style.marginLeft= '250px';
        }
        function fecharMenu(){
            document.getElementById('menu').style.width = '0px';
            document.getElementById('main').style.marginLeft = '0px';
    }
</script>