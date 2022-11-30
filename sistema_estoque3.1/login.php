<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href="./static/login.css">
</head>
<body>
    
    <main>

        
        <h1> Estoque </h1> 
    
        <h2> Login </h2> 
    
    
    <form action="action_login.php" method="post">
        <label for="">Email</label><br>
        <input class="input-form" type="email" name="email" placeholder="email"> <br>
        <label for="">Senha</label><br>
        <input class="input-form" type="password" name="senha" placeholder="senha"> <br><br>

        <a href="cadastro.php">  Não tem uma conta ? </a> <br> <br>

         <input id="button-right" type="submit" value="Logar" name="SendLogin">
    </form>
    </div>

</main>
</body>
</html>