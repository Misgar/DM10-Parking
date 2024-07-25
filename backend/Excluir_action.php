<?php
require '../vendor/autoload.php';


$cpf = $_GET['cpf'];


$cliente = new Cliente();
$veiculo = new Vehicle();


try

{
    
    $veiculo -> deleteVehicle($cpf);
    $cliente -> deleteClient($cpf);


    header('Location: ../public/index.php');
    
    

} catch (Exception $e)
{
    echo "ERRO AO TENTAR INSERIR CLIENTE " . $e->getMessage();
}




