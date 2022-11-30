
<?php


require 'config.php';

   
    $id = filter_input(INPUT_GET, 'id');
    $codigo = filter_input(INPUT_GET, 'codigo'); 
    $nome = filter_input(INPUT_GET, 'nome'); 
    $preco = filter_input(INPUT_GET, 'preco'); 
    $quantidade = filter_input(INPUT_GET, 'quantidade'); 
    $quantidade_min = filter_input(INPUT_GET, 'quantidade_min'); 
    
   
    
    $listas = [];


    if($id) {

        $sql = $pdo->query("SELECT * FROM produtos WHERE id = $id");

        $listas = $sql->fetch(PDO::FETCH_ASSOC);  

    }






    
    if($id && $codigo && $nome && $preco && $quantidade && $quantidade_min) {
        

        $sql = $pdo->prepare("UPDATE produtos SET codigo = :codigo, nome = :nome, preco = :preco, quantidade = :quantidade, quantidade_min = :quantidade_min WHERE id = :id");
        $sql->bindValue(':codigo',"$codigo"); 
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':preco',$preco);
        $sql->bindValue(':quantidade',$quantidade);
        $sql->bindValue(':quantidade_min',$quantidade_min);
        $sql->bindValue(':id',$id); 
        $sql->execute(); 
    
        // header("Location: lista_produtos.php");
        // exit;

    } else {
         
        //  header('Location: editar.php'); 
        //  exit;
    }    


    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./static/editar.css">
    
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
<main>

    <div class="formulario">
        
        <form action="" method="get">
            
            <input type="hidden" name="id" value="<?=$listas['id']?>">
            
            <div>
                <label for="codigo">Codigo:</br>
                <input type="text" name="codigo" value="<?=$listas['codigo']?>">
            </label>
        </div>
        <div>
            <label for="">Nome:</br>
            <input type="text" name="nome" value="<?=$listas['nome']?>">
        </label>
    </div>
    <div>
        <label for="">Preço:</br></br>
        <input type="text" name="preco" value="<?=$listas['preco']?>">
    </label>
</div>
<div>
    <label for="">Quantidade: </br>
    <input type="text" name="quantidade" value="<?=$listas['quantidade']?>">
</label>
</div>
<div>
    <label for="">Quantidade est: <br/>
    <input type="text" name="quantidade_min" value="<?=$listas['quantidade_min']?>">
</label>
</div>

</form>

<form action="recebedor.php" method="post" enctype="multipart/form-data"/>
<input type="hidden" name="id" value="<?=$listas['id']?>"><br>

<input type="file" name="arquivo" /><br><br>
<input type="submit" class="botao" value="Enviar">
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