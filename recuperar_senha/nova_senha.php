<?php

// verificar o email
//verificar o token
$email = $_GET['email'];
$token = $_GET['token'];

require_once "conexao.php";
$conexao = conectar();
$sql = "SELECT * FROM recuperar_senha WHERE email='$email' AND token ='$token'";
$resultado = executarSQL($conexao, $sql);
$recuperar = mysqli_fetch_assoc($resultado);

if ($recuperar == null) {
    echo "Email ou token incorreto. tente fazer um novo pedido de recuperação de senha.";
    die();
} else {
    // verificar a validade do pedido
    // verificar se o link ja foi usado
    date_default_timezone_set('America/Sao_Paulo');
    $data = new DateTime('now');
    $data_criacao = DateTime::createFromFormat(
        'Y-m-d H:i:s',
        $recuperar['data_criacao']
    );
    $UmDia = DateInterval::createFromDateString('1 day');
    $dataExpiracao = date_add($data_criacao, $UmDia);
    var_dump($data_criacao);
    var_Dump($dataExpiracao);
}
if ($data > $dataExpiracao) {
    echo "Essa solicitação de recuperação de senha expirou!
    Faça um novo pedido de recuperação de senha!!";
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nova Senha </title>
</head>

<body>
    <form action="salvar_nova_senha.php" method="POST">
        <input type="hidden" name="email" value="<?= $email ?>">
        <input type="hidden" name="token" value="<?= $token ?>">
        Email: <?= $email ?> <br>
        <?php echo $email ?> <br>
        <label> Senha: <input type="password" name="senha"></label> <br>
        <label> Repita a senha: <input type="password" name="repetirSenha"> <br>
            <input type="submit" value="Salvar nova senha"> <br> </label>
    </form>
</body>

</html>