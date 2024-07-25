<?php
require '../vendor/autoload.php';


$nome = filter_input(INPUT_POST, 'nome_edit');
$idade = filter_input(INPUT_POST, 'idade_edit');
$celular = filter_input(INPUT_POST, 'celular_edit');
$email = filter_input(INPUT_POST, 'email_edit');
$modelo = filter_input(INPUT_POST, 'modelo_edit');
$placa = filter_input(INPUT_POST, 'placa_edit');
$cpf = $_POST['cliente_id'];


$cliente = new Cliente();
$veiculo = new Vehicle();

echo $cpf;
echo "<br>";
echo $idade;
echo "<br>";
echo $celular;
echo "<br>";
echo $email;
echo "<br>";
echo $modelo;
echo "<br>";
echo $placa;
echo "<br>";
echo $nome;


try

{
    
    #$cliente -> updateClient($nome, $idade, $celular, $email, $cpf);
    # $veiculo -> updateVehicle($placa, $modelo, $cpf);
  
    echo $cpf;
    #header('Location: ../../public/index.php');
    
    

} catch (Exception $e)
{
    echo "ERRO AO TENTAR INSERIR CLIENTE " . $e->getMessage();
}




