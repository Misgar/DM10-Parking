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
        include 'header.php'; 
        require '../vendor/autoload.php';

        $dados = [];
        $veiculos = new Vehicle();
        

        $dados = $veiculos -> listAllVehicles();
    ?>

    <div class="container mt-5">
        <h2>Veículos Cadastrados</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                    <?php 
                        echo "<td>";
                            foreach($dados as $indice => $valor)
                            {
                                echo $valor['marcaCarro'];
                                echo "<br>";
                            }

                        echo "</td>"; 

                        echo "<td>";
                            foreach($dados as $indice => $valor)
                            {
                                echo $valor['marcaCarro'];
                                echo "<br>";
                            }

                        echo "</td>"; 

                        echo "<td>";
                            foreach($dados as $indice => $valor)
                            {
                                echo $valor['placaCarro'];
                                echo "<br>";
                            }

                        echo "</td>"; 
                    ?>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
