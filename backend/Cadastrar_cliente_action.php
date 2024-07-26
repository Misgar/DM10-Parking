<?php
require '../vendor/autoload.php';

$nome = filter_input(INPUT_POST, 'nome');
$cpf = filter_input(INPUT_POST, 'cpf');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$ativo = filter_input(INPUT_POST, 'status');

$cliente = new Cliente();

try

{
    # Cadastra as informações de cliente na tabela proprietarios e direciona pro cadastro de veiculo 
    
    $cliente -> createClient($nome, $cpf, $telefone, $email);

    header('Location: ../public/cadastrar_veiculo.php');
    exit;
    

} catch (Exception $e)
{
    echo "ERRO AO TENTAR INSERIR CLIENTE " . $e->getMessage();
}




