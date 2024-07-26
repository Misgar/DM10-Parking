<!DOCTYPE html>
<html lang="pt-br">

<?php 
    require 'header.php';
    
    
    require '../backend/secure_session.php';
    
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estacionamento</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1>Olá, Bem-vindo ao Sistema de Estacionamento</h1>
        <p>Use o menu acima para navegar pelo sistema.</p>
        <p href="#">Sessão ativa:<a href="#"> <?php echo $_SESSION['user_email'] ;?><a/></p>
        <small><a href="../backend/logout.php" class="text-danger">Deslogar</a></small>
    </div>
    <?php
        require 'listar_veiculos.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>