<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manter Perfil</title>
</head>

<body>
    <h1> Bem vindo ao visualizador de perfil </h2>
    <form action="../recuperar_senha/login.php" method="post">
        <label> Email: <input type="email" name="email"> <br></lable>
            <label> Senha: <input type="password" name="senha"> </label> <br>
            <input type="submit" value="Logar"> <br>
    </form> <br> <br>
    <a href="./recuperar_senha/form-cadastro.php"> Cadastrar-se </a> <br> <br>
    <a href="./recuperar_senha/form-recuperar-senha.php"> Recuperar senha </a> <br>
</body>

</html>