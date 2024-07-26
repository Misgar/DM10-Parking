<?php
require '../vendor/autoload.php';
session_start();

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
$conn = new DBConnection();

if ($email && $senha) 
{
    try {
        $login = $conn->returnConnection()->prepare("SELECT * FROM usuarios WHERE email = :email");
        $login->bindValue(':email', $email);
        $login->execute();

        $usuario = $login->fetch(PDO::FETCH_ASSOC);
       
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Login bem-sucedido
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_name'] = $usuario['nome_usuario'];
            $_SESSION['user_email'] = $usuario['email'];
            #echo "<pre>";
            #var_dump($_SESSION); #VALIDANDO RETORNO DAS INFORMAÇÕES NA VARIAVEL DE SESSÃO
            header('Location: ../');
            exit;
        } else {
            echo "E-mail ou senha incorretos.";
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
    }
    } else {
        echo "Por favor, preencha todos os campos.";
    }

