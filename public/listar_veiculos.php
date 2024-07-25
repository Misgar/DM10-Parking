<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Veículos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
        require '../vendor/autoload.php';

    
        $dadosClientes = [];


        $veiculos = new Vehicle();

        $dadosClientes = $veiculos -> listAllVehicleOwner(); 
       
    ?>

    <div class="container mt-5">
        <h2>Veículos Estacionados</h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Cliente</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>[ Entrada ]</th>
                    <th>[ Ação ]</th>
                </tr>
             
            </thead>
            <tbody>
                <?php 
                    foreach($dadosClientes as $indice => $valorProprietarios): ?>
                    <tr>
                        <td><?= $valorProprietarios['nome'];?></td>
                        <td><?= $valorProprietarios['marcaCarro'];?></td>
                        <td><?= $valorProprietarios['placaCarro'];?></td>
                        <td>00</td>

                        <td>
                            <a href="editar_cliente_veiculo.php?placa=<?=$valorProprietarios['placaCarro'] ;?>" class="badge badge-warning">Editar</a>
                            <a href="../backend/Excluir_action.php?cpf=<?=$valorProprietarios['cpfProprietario'] ;?>" class="badge badge-danger">Excluir</a>
                        </td>
                          
                            
                          

                    </tr>
                <?php endforeach; ?>

                  
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
