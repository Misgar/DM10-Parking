<?php
#Arquivo para destruir a sessão ativa quando chamado, e redirecionad para pagina de login
session_start();
session_destroy(); 
header('Location: ../Public/login.php');
exit;
