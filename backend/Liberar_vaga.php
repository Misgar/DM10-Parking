<?php
require '../vendor/autoload.php';


$placa = filter_input(INPUT_GET, 'placa');

$veiculo = new Vehicle();

try

{
    
    $veiculo -> freeParkingSpot($placa);

    header('Location: ../public/index.php');
    
    

} catch (Exception $e)
{
    echo "ERRO AO TENTAR INSERIR CLIENTE " . $e->getMessage();
}




