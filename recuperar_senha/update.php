<?php
require_once "conexao.php";
$conexao = conectar();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$id_usuario = $_POST['id_usuario'];

$sql = "UPDATE usuario SET nome ='$nome',email='$email', senha='$senha' WHERE id_usuario=$id_usuario";
$result = mysqli_query($conexao, $sql);
if ($result) {
    header("Location: principal.php");
} else {
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
}