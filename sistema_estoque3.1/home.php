<?php
require 'config.php';

$id = filter_input(INPUT_GET, 'id');

$lista = [];
        $sql = $pdo->query("SELECT * FROM produtos");

    if($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);

}

$name = filter_input(INPUT_GET, 'nome');
$codigo = filter_input(INPUT_GET, 'codigo');
$preco = filter_input(INPUT_GET, 'preco');
$quantidade = filter_input(INPUT_GET, 'quantidaed_float');
$quantidade_estq = filter_input(INPUT_GET, 'quantidade_estq');

if(isset($_GET['busca'])){
    $busca = $_GET['busca'];    
    $lista = $pdo->query("SELECT * FROM produtos WHERE nome LIKE '%$busca%' or  codigo = '$busca' ");
}else{
    $lista = $pdo->query("SELECT * FROM produtos "); 
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

</head>
<body>

<div class="container">

<header>
        <a href="#" class="btn-abrir" onclick="abrirMenu()">&#9776; Menu</a>

    </header>
    
    <nav id="menu">
        <a href="#" onclick="fecharMenu()">&times; Fechar</a>
        <a href="home.php">Home</a>
        <a href="cadastrar_produto.php">Cadastrar Estoque</a>
        <a href="relatorio.php">Relatório</a>
        <a href="sair.php">Sair</a>
    </nav>







    
    <form action="" method="get">
        <div>
            <label for="">
                <input type="search" name="busca" placeholder="Buscar nome ou codigo do produto">
                <input class="" type="submit" value="Buscar">
            </label>
        </div>

    </form>

    <div>
        <table >
            <tr>
                <th>Imagem</th>
                <th>codigo</th>
                <th>nome</th>
                <th>preco</th>
                <th>quatidade</th>              
                <th>Ações</th>
            </tr>

            <?php
                foreach ($lista as $listas): {
                    
                    
                }
            ?>
            <tr>

            <td><img src="./arquivos/<?php echo $listas['imagens']; ?>" alt="" width="50px">
        

            <td></a> <?php echo $listas['codigo']; ?></td>

            <td> <?php echo $listas['nome']; ?></td>

            <td> <?php echo $listas['preco']; ?></td>

            <td> <?php echo $listas['quantidade']; ?></td>

            <td> <a href="editar.php?id=<?=$listas['id']?>">Editar</a></td>
            
            <?php endforeach; ?>
            </tr>

        </table>

    </div>


</div>    
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