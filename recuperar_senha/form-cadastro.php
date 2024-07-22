<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuario</title>
</head>

<body>
    <form action="../upload/upload.php" method="post" enctype="multipart/form-data">
        Selecione a imagem para foto de perfil: <br>
        <input type="file" name="arquivo"> <br>
        <label> Nome: <input type="text" name="nome"> </label> <br>
        <label> Email: <input type="email" name="email"> </label> <br>
        <label> Senha: <input type="password" name="senha"> </label> <br>
        <input type="submit" value="Cadastrar-se">
    </form>
</body>

</html>