<?php
require_once "conexao.php";
$conexao = conectar();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
//Tem que armazenar a senha de modo seguro depois
$sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome','$email','$senha')";
$resultado = mysqli_query($conexao, $sql);

$consulta = $conexao -> query("SELECT email FROM usuario WHERE email = '$email'");
$exibe = $consulta ->fetch(PDO::FETCH_ASSOC);
if($consulta -> rowCount() == 1) {
    echo "email já cadastrado";
}
else {
if ($resultado === false) {
        if(mysqli_errno($conexao) == 1062){
            echo "email já cadastrado no sistema! tente fazer o login ou faça a recuperação de senha.";
            die();
        } else {
    echo "Erro ao inserir o novo usuario!" .
        mysqli_errno($conexao) . ": " . mysqli_error($conexao);
} }
}
header("Location: index.php");