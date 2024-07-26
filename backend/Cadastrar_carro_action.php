<?php

require '../vendor/autoload.php';


$cpf = filter_input(INPUT_POST, 'cliente_id');
$modelo = filter_input(INPUT_POST, 'modelo');
$placa = filter_input(INPUT_POST, 'placa');

$carro = new Vehicle();

try

{
    # Adiciona registro na tabela de veiculos, vinculando FK carrosEstacionados.cpfProprietarios ao proprietario.cpf e redireciona pra home listando os carros
     
    $carro -> createVehicle($cpf, $modelo, $placa);
    
    header('Location: ../');
} catch (Exception $e)
{
    echo "ERRO AO TENTAR INSERIR NOVO CARRO " . $e->getMessage();
}




