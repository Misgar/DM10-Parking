<?php

// Arquivo conterá a classe cliente, responsável pelas operações de Cliente.

require '../vendor/autoload.php';


$nome = filter_input(INPUT_POST, 'nome');
$cpf = filter_input(INPUT_POST, 'cpf');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');
$ativo = filter_input(INPUT_POST, 'status');


class Cliente
{   
    private $cpf;
    private $nome;

    private $email;

    private $telefone;

    private $conn = new DBConnection();    

    // Função para inserir clientes na tabela proprietarios
    public function createClient($nome, $cpf, $telefone, $email)
    {
        try
        {
            // VERIFICAR SE O CPF JÁ EXISTE NO BANCO ANTES DE INSERIR
             $query = $this->conn->returnConnection()->prepare("SELECT * FROM proprietarios WHERE cpf = :cpf");
             $query -> bindValue(':cpf', $cpf);
             $query -> execute();


            if ($query -> rowCount() < 0)
            {
                $query = $this->conn->returnConnection()->prepare 
                (
                    "INSERT INTO proprietarios (nome, cpf, email, celular)
                     VALUES (:nome, :cpf, :email, :celular)"
                );

                $query -> bindValue(':nome', $this->nome);
                $query -> bindValue(':cpf', $this->cpf);
                $query -> bindValue(':email', $this->email);
                $query -> bindValue(':celular', $this->telefone);
            }

            $query -> execute();

        } catch (Exception $e)
        {
            echo "Falha ao cadastrar cliente." . $e->getMessage();
        }
    }

     
    public function listAllClients() // Função parar retornar os clientes da tabela proprietarios
    {
        $data = [];
        $query = $this->getConn()->returnConnection()->prepare
        ("
            SELECT * FROM proprietarios;
        ");
        // Verifica se existem registros na consulta, e se sim, retorna os dados no vetor data.
        if ($query -> rowCount() > 0)
        {
            $data = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }

    public function listClientByCpf($cpf) // Função para retornar um cliente por ID(CPF)
    {
        $data = [];

        $query = $this->getConn()->returnConnection()->prepare
        (
            " SELECT * FROM proprietarios WHERE cpf = :cpf"
        );

        $query -> bindValue(":id", $this->getCpf());

        $query->execute();

        if($query -> rowCount() > 0)
        {
            $data = $query->fetch(PDO::FETCH_ASSOC);

            return $data;
        }

    }


    public function deleteClient($cpf)
    {
        try
        {
       
            $query = $this->getConn()->returnConnection()->prepare
            (
                "SELECT * FROM proprietarios WHERE cpf = :cpf"
            );

            $query -> bindValue(":cpf", $this->getCpf());
            $query -> execute();

            if ($query -> rowCount > 0)
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

    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }


    /**
     * Set the value of cpf
     */
    public function setCpf($cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }


    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of conn
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    /**
     * Get the value of telefone
     */ 
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */ 
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }
}



