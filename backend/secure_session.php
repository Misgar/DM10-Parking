<?php
# Script para validar se existe sessão ativa na pagina 
session_start();

if(!isset($_SESSION['user_email']))
{
    header('Location: ../Public/login.php');
    exit;
}