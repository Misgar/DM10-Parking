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

        $placa = filter_input(INPUT_GET, "placa")
    ?>

    <div class="container mt-5">
        <h2>Editar cadastro de Clientes</h2>
        <?php 
            $dados = [];
            $infoClientes = new Vehicle();

            $dados = $infoClientes -> listVehicleInfoById($placa);

            
         
        ?>
        <form action="../backend/Editar_action.php/" method="POST">
            <div class="form-group">
                <label for="cliente_id">CPF do Cliente</label>
                <select name="cliente_id" class="form-control" required>
                    <option value="<?= $dados['cpf'] ;?>"><?= $dados['cpf'] ;?>s</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="modelo">Nome do cliente (Obs: Será alterado para todos os veiculos!!)</label>
                <input type="text" class="form-control" id="modelo" name="nome_edit" required value="<?= $dados['nome'] ;?>">
            </div>

            <div class="form-group">
                <label for="modelo">Idade</label>
                <input type="text" class="form-control" id="modelo" name="idade_edit" required value="<?= $dados['idade'] ;?>">
            </div>

            <div class="form-group">
                <label for="modelo">Celular</label>
                <input type="text" class="form-control" id="modelo" name="celular_edit" required value="<?= $dados['celular'] ;?>">
            </div>

            <div class="form-group">
                <label for="modelo">E-mail</label>
                <input type="text" class="form-control" id="modelo" name="email_edit" required value="<?= $dados['email'] ;?>">
            </div>
            
            <div class="form-group">
                <label for="modelo">Modelo do Carro</label>
                <input type="text" class="form-control" id="modelo" name="modelo_edit" required value="<?= $dados['marcaCarro'] ;?>">
            </div>
            <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa_edit" required value="<?= $dados['placaCarro'] ;?>">
            </div>
         

            <button type="submit" class="btn btn-danger">Atualizar cadastro</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
