<?php
session_start();
$email = $_SESSION['usuario'];

// Conectado ao banco
$conexao = mysqli_connect("localhost", "root", "", "trab_martin_luciano");
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Definiçao da pasta de destino
$pastadestino = "../upload/uploads/"; // 

// pegamos o nome do arquivo
$nomeArquivo = $_FILES['arquivo']['name'];
$extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

// Verificar se o arquivo já existe
if (file_exists($pastadestino . $nomeArquivo)) {
    echo "Arquivo já existe";
    exit;
}

// Verificar se o tamanho do arquivo é maior que 10MB
if ($_FILES['arquivo']['size'] > 10000000) { // 10MB
    echo "Arquivo muito grande";
    exit;
}

// verificar se o arquivo é uma imagem
$extensao = strtolower(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION));

if (
    $extensao != "png" && $extensao != "jpg" &&
    $extensao != "jpeg" && $extensao != "gif" &&
    $extensao != "jfif" && $extensao != "svg"
) { // condição de guarda 👮
    echo "O arquivo não é uma imagem! Apenas selecione arquivos 
    com extensão png, jpg, jpeg, gif, jfif ou svg.";
    die();
}

$nomearq = uniqid(); // Gera um nome único para o arquivo
$nomeArquivoFinal = $nomearq . "." . $extensao; // Nome final do arquivo
$fezupload = move_uploaded_file($_FILES['arquivo']['tmp_name'], $pastadestino . $nomeArquivoFinal);

if ($fezupload) {
    $sql = "UPDATE usuario SET foto='$nomeArquivoFinal' WHERE email='$email'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        // Se for uma alteração de foto, excluir a foto antiga
        if (isset($_POST['foto']) && !empty($_POST['foto'])) {
            $fotoAntiga = $_POST['foto'];
            $caminhoFotoAntiga = $pastadestino . $fotoAntiga;
            if (file_exists($caminhoFotoAntiga)) {
                unlink($caminhoFotoAntiga);
            }
        }
        header("Location: ../recuperar_senha/principal.php"); // Redireciona após o sucesso
    } else {
        echo "Erro ao atualizar o banco de dados: " . mysqli_error($conexao);
    }
} else {
    echo "Erro ao mover o arquivo.";
}

mysqli_close($conexao);
