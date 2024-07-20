<?php
$conexao = mysqli_connect("localhost", "root", "", "upload_Arquivos");
$sql = "SELECT * FROM arquivo";
$resultado = mysqli_query($conexao, $sql);
if ($resultado != false) {
    $arquivos = mysqli_fetch_all($resultado, MYSQLI_BOTH);
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
    <title>Document</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Selecione a imagem para dar upload: <br>
        <input type="file" name="arquivo"> <br>
        <input type="submit" value="Upload Image" bname="submit"> <br>
    </form>
    <br> <br>
    <table>
        <thead>
            <tr>
                <th colspan="2"> Nome do Arquivo</th>
                <th colspan="2"> Opções </th>
            </tr>
        </thead>
        <tbody>
            <img <?php
                    foreach ($arquivos as $arquivo) {
                        $arq = $arquivo['Nome_arquivo'];
                        echo "<tr>"; //iniciar a linha
                        echo "<td><img src='uploads/$arq' width='100px' height='100px'></td>"; //
                        echo "<td> <a href='uploads/$arq'>$arq </a></td>"; //1a coluna com o nome do arquivo
                        echo "<td>"; //iniciar a 2a coluna
                        echo "<a "; //abriu a tag A ( o link)
                        echo "href='alterar.php?Nome_arquivo=$arq'>"; //inseriu o link do arquivo
                        echo "Alterar"; //imprime o texto da tag a
                        echo "</a>"; //fechei a tag a (fechei o link)
                        echo "</td>"; //fechei a segunda coluna
                        echo "<td>"; //abri a terceira coluna
                        echo "<button "; // abrir o botão
                        echo "onclick="; // criou o atributo onclick
                        echo "'excluir(\"$arq\");'>"; //chamamos a função excluir
                        echo "Excluir";
                        echo "</button>"; // fechar o botão
                        echo "</td>"; // fechar a terceira coluna
                        echo "</tr>"; // fechar a linha


                        //echo "<td><button onclick='excluir(\"" . $arquivo['Nome_arquivo'] . "\");'>Excluir</button></td></tr>";
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
</body>

</html>