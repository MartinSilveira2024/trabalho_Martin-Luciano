<?php

use  PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "conexao.php";
$conexao = conectar();

$email = $_POST['email'];
$sql = "SELECT * FROM usuario WHERE email='$email'";
$resultado = executarSQL($conexao, $sql);

$usuario = (mysqli_fetch_assoc($resultado));
if ($usuario == null) {
    echo "Email não cadastrado! Faça o cadastro e 
    em seguida realize o login.";
    die();
}
//gerar um token unico
$token = bin2hex(random_bytes(50));

require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';
include 'config.php';

$mail = new PHPMailer(true);
try {
    //configurações
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->setLanguage('br'); //
    // $mail->SMTPDebug = SMTP::DEBUG_OFF; //tIRA AS MENSAGENS DE ERRO
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //imprime as mensagens de erro
    $mail->isSMTP(); //envia o email usando SMTP
    $mail->Host = 'smtp.gmail.com'; //Set the 
    $mail->SMTPAuth = true;
    $mail->Username = $config['email'];
    $mail->Password = $config['senha_email'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //enable implicit
    $mail->Port = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //Recipients
    $mail->setFrom($config['email'], 'Aula de Programação III');
    $mail->addAddress($usuario['email'], $usuario['nome']); //Add a recipient
    $mail->addReplyTo($config['email'], 'Aula de Tópicos');

    //content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Recuperação de Senha do Sistema';
    $mail->Body = 'Olá <br>
    Você solicitou a recuperação da sua conta no nosso sistema.
        Para isso, clique no link abaixo para realizar a troca de senha: <br>
        <a href="' . $_SERVER['SERVER_NAME'] . '/recuperar_senha/nova_senha.php?email=' . $usuario['email'] . '&token=' . $token . '">Recuperar Senha</a>
        <br>
        Atenciosamente<br>
            Equipe do sistema...';
    $mail->send();
    echo 'Email enviado com sucesso!<br> Confira o seu email.';


    // gravar as informações na tabela recuperar-senha
    date_default_timezone_set('America/Sao_Paulo');
    $data = new DateTime('now');
    $agora = $data->format('Y-m-d H:i:s');
    $sql2 = "INSERT INTO recuperar_senha(email,token,data_criacao, usado) VALUES ('" . $usuario['email'] . "', '$token','$agora',0)";
        executarSQL($conexao, $sql2);




} catch (Exception $e) {
    echo "Não foi possivel enviar o email.
    Mailer Error: {$mail->ErrorInfo}";
}
