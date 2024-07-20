<?php
$Nome_arquivo = $_GET['Nome_arquivo'];
$pastaDestino = "/uploads/";
$apagou = unlink( __DIR__ .  $pastaDestino . $Nome_arquivo);
if ($apagou == true) {
    $conexao = mysqli_connect("localhost","root","","upload_arquivos");
  $sql = "DELETE FROM arquivo WHERE Nome_arquivo='$Nome_arquivo'";
              $resultado2 = mysqli_query($conexao, $sql);
              if ($resultado2 == false) {
                  echo "Erro ao apagar o arquivo do banco de dados.";
                  die();
              }
            }
    
    ?>
              
