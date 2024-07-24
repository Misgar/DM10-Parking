<?php

require '../vendor/autoload.php';


$cpf = filter_input(INPUT_POST, 'cliente_id');
$modelo = filter_input(INPUT_POST, 'modelo');
$placa = filter_input(INPUT_POST, 'placa');

$carro = new Vehicle();

try

{
    $carro -> createVehicle($cpf, $modelo, $placa);
    
    echo $cpf;
} catch (Exception $e)
{
    echo "ERRO AO TENTAR INSERIR NOVO CARRO " . $e->getMessage();
}




