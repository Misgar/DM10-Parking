<?php
# Script para validar se existe sessão ativa na pagina 
session_start();

if(!isset($_SESSION['user_email'])) # Se não houver registro dentro da superglobal sessão, há um redirecionamento pra tela de login
{
    header('Location: ../Public/login.php');
    exit;
}