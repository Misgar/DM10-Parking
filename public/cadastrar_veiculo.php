<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Veículo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
        include 'header.php'; 
        require '../vendor/autoload.php';
        require '../backend/secure_session.php';
    ?>

    <div class="container mt-5">
        <h2>Cadastrar Veículo</h2>
        <?php 
            $dados = [];
            $infoClientes = new Cliente();

            $dados = $infoClientes -> listAllClients();
        ?>
        <form action="../backend/Cadastrar_carro_action.php" method="post">
            <div class="form-group">
                <label for="cliente_id">CPF do Cliente</label>
                <select class="form-control" id="cliente_id" name="cliente_id" required>
                    <!-- Popular com clientes DB retornando a lista de CPF para vincular o veiculo ao cliente
                      -->
        
                    <?php foreach ($dados as $indice => $valor):?>
    
                     <option value="<?= $valor['cpf'];?>"> <?= $valor['cpf'] ;?></option> 
    

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>
            <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
