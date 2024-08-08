<?php
session_start();
$email = $_SESSION['usuario'];
$conexao = mysqli_connect("localhost", "root", "", "trab_martin_luciano");

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$sql = "SELECT * FROM usuario WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql);

if ($resultado != false) {
    $usuario = mysqli_fetch_assoc($resultado);
} else {
    echo "Erro ao executar comando SQL.";
    die();
}

// Defino o caminho para a imagem padrão
$imagemPadrao = '../upload/default.jpg';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>

<body>
    <table>
        <tbody>
            <?php
            // Verifico se a foto do usuário está definida e se o arquivo existe
            $arquivo = $usuario['foto'];
            // Corrijo o caminho para o diretório de uploads
            $caminhoUploads = '../upload/uploads/';
            $caminhoArquivo = $caminhoUploads . $arquivo;

            if (empty($arquivo) || !file_exists($caminhoArquivo)) {
                $caminhoArquivo = $imagemPadrao; // Use a imagem padrão se não houver uma foto definida
            } else {
                $caminhoArquivo = $caminhoArquivo; // define a foto do usuario
            }

            echo "<tr>"; // Iniciar a linha
            echo "<td><img src='$caminhoArquivo' width='100px' height='100px'></td>"; 
            echo "<td><a href='../upload/alterarfoto.php?Nome_arquivo={$usuario['foto']}'>Alterar foto de perfil</a></td>";
            ?>
        </tbody>
    </table>
    <p>Você está logado! <?php echo ($usuario['nome']); ?></p>
    <p>Seu email é: <?php echo ($_SESSION['usuario']); ?></p>
    <a href="form_update.php?id_usuario=' .$usuario['id_usuario'] . '"> Alterar perfil </a> <br> <br>
    <a href="form_update.php?id_usuario=' .$usuario['id_usuario'] . '"> Excluir perfil </a> <br> <br>
    <a href="deslogin.php"> Logout </a> 
</body>

</html>