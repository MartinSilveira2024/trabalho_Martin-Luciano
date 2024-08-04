<?php
$arq = $_GET['Nome_arquivo'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Arquivo</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Alterando o arquivo <?= $arq ?>:<br>
        <input type="hidden" name="Nome_arquivo" value="<?= $arq ?>">
        <input type="file" name="arquivo"><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>