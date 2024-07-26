<?php
require '../vendor/autoload.php';

// Captura dos dados do formulário
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
$conn = new DBConnection();

if ($email && $senha) 
    {
    //criptografando a senha em hash 
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Conexão com o banco de dados
    try {

        // Inserção ds dados no banco
        $insert = $conn->returnConnection()->prepare(
            "INSERT INTO usuarios (email, senha) 
             VALUES (:email, :senha)"
        );

        $insert->bindValue(':email', $email);
        $insert->bindValue(':senha', $senha_hash);
     

        $insert->execute();

        echo "Usuário registrado com sucesso!";
       
         header('Location: ../public/index.php');
         exit;
        } catch (PDOException $e) {
            echo "Erro ao registrar usuario no banco de dados. Possivel duplicidade" . $e->getMessage();
           
            header("Location: login.php");
            
        
        }
    } else {
        echo "Por favor, preencha todos os campos corretamente.";
    }
?>;
