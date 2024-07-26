<?php
require '../vendor/autoload.php';

#A
$placa = filter_input(INPUT_GET, 'placa');

$veiculo = new Vehicle();

try

{
    # gatilho para liberar os registros (delete na tabela veiculos estacionados) onde placa = placa.
    $veiculo -> freeParkingSpot($placa);

    header('Location: ../public/index.php');
    
    

} catch (Exception $e)
{
    echo "ERRO AO TENTAR INSERIR CLIENTE " . $e->getMessage();
}




