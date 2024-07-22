<?php
$conexao = mysqli_connect("localhost", "root", "", "trab_martin_luciano");
$sql = "SELECT * FROM usuario";
$resultado = mysqli_query($conexao, $sql);
if ($resultado != false) {
    $user = mysqli_fetch_all($resultado, MYSQLI_BOTH);
} else {
    echo "Erro ao executar comando SQL.";
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
</head>
<body>

<table>
        <thead>
            <tr>
                <th colspan="2"> Nome</th>
                <th colspan="2"> Opções </th>
            </tr>
        </thead>
        <tbody>
            <?php
                    foreach ($user as $users) {
                        $arq = $users['foto'];
                        echo "<tr>"; //iniciar a linha
                        echo "<a href='../upload/index.php'> Alterar foto de perfil</a>"; //inseriu o link do arquivo
                        echo "<td><img src='./uploads/$arq' width='100px' height='100px'></td>"; // exibe imagem 
                        echo "<td>" . $user = $users['nome']; "</td>"; //1a coluna com o nome do arquivo
                        echo "<tr>";
                    }
                    ?> </tbody>
    </table>

    <script>
        function excluir(Nome_arquivo) {
            confirm("Você tem certeza que deseja excluir este arquivo " + Nome_arquivo + "?");
            let deletar = confirm("Você tem certeza que deseja excluir?")
            if (deletar == true) {
                window.location.href = "deletar.php?Nome_arquivo=" + Nome_arquivo;
            }
        }
    </script>
    <h1> Você está logado! Olá</h1>
</body>
</html>

