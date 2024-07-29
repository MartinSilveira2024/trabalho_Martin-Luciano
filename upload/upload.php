<?php

// definiu a pasta de destino
$pastadestino = "/uploads/";
//pegamos o nome do arquivo
$nomeArquivo = $_FILES['arquivo']['name'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
//verificar se o arquivo ja existe
if (file_exists(__DIR__ . $pastadestino . $nomeArquivo)) {
    echo "arquivo ja existe";
    exit;
}

//verificar se o tamanho esperarado é maior que 10mb
if ($_FILES['arquivo']['size'] > 10000000) { //10M
    echo "arquivo muito grande";
    exit;
}
//verificar se o arquivo é uma imagem
$extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

if ($extensao != "jpg" && $extensao != "png" && $extensao != "gif" && $extensao != "jfif" && $extensao != "svg") {
    echo "Isso nao é uma imagem";
    exit;
}



// verificar se é uma imagem de fato
if (getimagesize($_FILES['arquivo']['tmp_name']) === false) {
    echo "Problemas ao enviar a imagem. Tente novamente.";
    die();
}

$nomearq = uniqid();
//se deu certo até aqui
$fezupload = move_uploaded_file($_FILES['arquivo']['tmp_name'], __DIR__ .  $pastadestino . $nomearq . "." . $extensao);


if ($fezupload == true) {
    $conexao = mysqli_connect("localhost", "root", "", "trab_martin_luciano");
    $sql = "INSERT INTO usuario (nome, email, senha, foto) VALUES ('$nome','$email','$senha', '$nomearq.$extensao')";
    $resultado = mysqli_query($conexao, $sql);
    session_start();
    $_SESSION['usuario'] = $email;
    if ($resultado != false) {
        //se for uma alteração de arquivo
        if (isset($_POST['foto'])) {
            $apagou = unlink(__DIR__ .  $pastadestino . $_POST['foto']);
            if ($apagou == true) {
                $sql = "DELETE FROM usuario WHERE foto='"
                    . $_POST['foto'] . "'";
                $resultado2 = mysqli_query($conexao, $sql);
                if ($resultado2 == false) {
                    echo "Erro ao apagar o arquivo do banco de dados.";
                    die();
                }
            } else {
                echo "Erro ao apagar o arquivo antigo.";
            }
        }
        header("location:../recuperar_senha/principal.php");
    } else {
        echo "erro ao mover arquivo";
    }
} else {
    echo "Erro ao registrar o arquivo no banco de dados.";
}
