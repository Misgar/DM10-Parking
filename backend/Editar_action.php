<?php
require '../vendor/autoload.php';


$nome = filter_input(INPUT_POST, 'nome_edit');
$idade = filter_input(INPUT_POST, 'idade_edit');

$celular = filter_input(INPUT_POST, 'celular_edit');
$email = filter_input(INPUT_POST, 'email_edit');

$modelo = filter_input(INPUT_POST, 'modelo_edit');
$placa = filter_input(INPUT_POST, 'placa_edit');

$placaID = filter_input(INPUT_GET, 'oldReg'); #Registro antigo da placa no sistema
$cpf = $_POST['cliente_id'];


$cliente = new Cliente();
$veiculo = new Vehicle();


try

{
    /* Atualiza os registros na tabela proprietarios, e após isso na tabela carrosEstacionados. 
        Todos os parametros são passados, mesmo que sejam iguais, para permitir que sejam atualizados todos ou só alguns campos 
    */
    $cliente -> updateClient($nome, $idade, $celular, $email, $cpf);
    $veiculo -> updateVehicle($placa, $modelo, $placaID);

    header('Location: ../public/index.php');
    
    

} catch (Exception $e)
{
    echo "ERRO AO TENTAR INSERIR CLIENTE " . $e->getMessage();
}




