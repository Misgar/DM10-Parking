<?php

// Arquivo conterá a classe cliente, responsável pelas operações de Cliente.

require '../vendor/autoload.php';



class Vehicle
{   
    private $cpf;
    private $nome;

    private $email;

    private $telefone;

    public DBConnection $conn; 
      

    // Função para inserir clientes na tabela proprietarios
    public function createVehicle($cpf, $modelo, $placa)
    {
        try
        {
            // VERIFICAR SE O CPF JÁ EXISTE NO BANCO ANTES DE INSERIR
            $this->conn = new DBConnection(); 
           
                $query = $this->conn->returnConnection()->prepare 
                (
                    "INSERT INTO carrosEstacionados 
                    (cpfProprietario, marcaCarro, placaCarro)
                     VALUES (:cpfProprietario, :modelo, :placa)"
                );

            $query -> bindValue(":cpfProprietario", $cpf);
            $query -> bindValue(":modelo", $modelo);
            $query -> bindValue(":placa", $placa);

            $query -> execute();      

        } catch (Exception $e)
        {
        
            echo "Falha ao cadastrar cliente." . $e->getMessage();
        }
    }

     
    public function listAllVehicles() // Função parar retornar os clientes da tabela proprietarios
    {
        $data = [];

        $this->conn = new DBConnection(); 
           
            
       $query = $this->conn->returnConnection()->prepare
        ("
            SELECT * FROM carrosEStacionados;
        ");

        $query -> execute();
        // Verifica se existem registros na consulta, e se sim, retorna os dados no vetor data.
        if ($query -> rowCount() > 0)
        {
            $data = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }

    public function listVehicleInfoById($placa) // Função para retornar um cliente por ID(CPF)
    {
        $data = [];
        try
        {
            $this->conn = new DBConnection(); 
           
            $query = $this->conn->returnConnection()->prepare
            (
                // Join das tabelas de cliente e veiculos, trazendo os dados de cadastro do proprietario do carro especifico
                "SELECT e.marcaCarro, e.placaCarro, p.nome, p.email,p.idade, p.celular, p.cpf
                FROM carrosEstacionados e
                JOIN proprietarios p ON e.cpfProprietario = p.cpf
                WHERE e.placaCarro = :placa"
            );

            $query -> bindValue (":placa", $placa);

            $query->execute();

            if($query -> rowCount() > 0)
            {
                $data = $query->fetch(PDO::FETCH_ASSOC);
    
                return $data;
            }
    
        } catch (Exception $e)
        {
            echo "Falha ao RETORNAR DADOS do cliente." . $e->getMessage();
        }
       

       
    }

    public function listAllVehicleOwner()

    {
        $data = [];
        try 
        {
            $this->conn = new DBConnection();
            $query = $this->conn->returnConnection()->prepare
            (
                "SELECT carrosEStacionados.cpfProprietario, proprietarios.nome, carrosEstacionados.marcaCarro, 
                carrosEstacionados.placaCarro FROM 
                carrosEstacionados INNER JOIN proprietarios ON proprietarios.cpf = carrosEstacionados.cpfProprietario;"
            );
    
            $query -> execute();
    
            if($query -> rowCount() > 0)
            {
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
    
                return $data;
            }
        }
        catch (Exception $e)
        {
            echo "Erro ao tentar listar veiculos " . $e->getMessage();
        }
    
    }
    public function updateVehicle($placa, $modelo, $cpf)
    {   
        try 
        {
            $this->conn = new DBConnection();
            $query = $this->conn->returnConnection()->prepare
            (
                "UPDATE carrosEstacionados
                 SET marcaCarro = :modelo, 
                     placaCarro = :placa
                WHERE cpfProprietario = :cpf"
            );

            $query -> bindValue(":modelo", $modelo);
            $query -> bindValue(":placa", $placa);
            $query -> bindValue(":cpf", $cpf);

            $query -> execute();
        } catch (Exception $e)
        {
            echo "Erro ao tentar atualizar veiculo " . $e->getMessage();
        }
    }


    public function deleteVehicle($cpf)
    {
        try
        {
       
            $query = $this->conn->returnConnection()->prepare
            (
                "DELETE FROM carrosEstacionados WHERE cpfProprietario = :cpf"
            );

            $query -> bindValue(":cpf", $this->getCpf());
            $query -> execute();

            if ($query -> rowCount() > 0)
            {    
                $query = $this->getConn()->returnConnection()->prepare
                (
                    "DELETE FROM proprietarios WHERE cpf = :cpf"
                );

                $query -> bindValue(":cpf", $cpf);

                $query -> execute();
            };
            
        } catch (Exception $e)
        {
            echo "Falha ao TENTAR DELETAR REGISTRO " . $e -> getMessage();
        }
    }

  
}



