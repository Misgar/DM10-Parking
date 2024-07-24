<?php

$nome = filter_input(INPUT_POST, 'nome');
$cpf = filter_input(INPUT_POST, 'cpf');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$ativo = filter_input(INPUT_POST, 'status');



$cliente = new Cliente;

cliente -> cadastrar_cliente();

