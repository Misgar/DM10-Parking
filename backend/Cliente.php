<?php

// Arquivo conterá a classe cliente, responsável pelas operações de Cliente.

require '../vendor/autoload.php';


/*
    Arquivo contendo a classe Cliente responsável pelas operações relacionadas a cliente  na tabela
    proprietarios.
*/
class Cliente
{   
    private $cpf;
    private $nome;

    private $email;

    private $telefone;

    public DBConnection $conn; 
      

    // Função para inserir clientes na tabela proprietarios
    public function createClient($nome, $cpf, $telefone, $email)
    {
        /* 
            Método para criar registros vindos do form na tabela de proprietarios
        */
        try
        {
            // VERIFICAR SE O CPF JÁ EXISTE NO BANCO ANTES DE INSERIR
            $this->conn = new DBConnection(); 
           
            $query = $this->conn->returnConnection()->prepare("SELECT * FROM proprietarios WHERE cpf = :cpf");
            $query -> bindValue(':cpf', $cpf);
            $query -> execute();
           


            if ($query -> rowCount() <= 0)
            {
                $query = $this->conn->returnConnection()->prepare 
                (
                    "INSERT INTO proprietarios (nome, cpf, email, celular)
                     VALUES (:nome, :cpf, :email, :celular)"
                );

                $query -> bindValue(':nome', $nome);
                $query -> bindValue(':cpf', $cpf);
                $query -> bindValue(':email', $email);
                $query -> bindValue(':celular', $telefone);

                echo $this->getTelefone();


                $query -> execute();
            };
            
           

        } catch (Exception $e)
        {
        
            echo "Falha ao cadastrar cliente." . $e->getMessage();
        }
    }

     
    public function listAllClients() // Função parar retornar os clientes da tabela proprietarios
    {
        /* 
            Retorna um array associativo com os registros da tabela 
            proprietarios
        */
        $data = [];

        $this->conn = new DBConnection(); 
           
            
       $query = $this->conn->returnConnection()->prepare
        ("
            SELECT * FROM proprietarios;
        ");

        $query -> execute();
        // Verifica se existem registros na consulta, e se sim, retorna os dados no vetor data.
        if ($query -> rowCount() > 0)
        {
            $data = $query -> fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }

    public function listClientByCpf($cpf) // Função para retornar um cliente por ID(CPF)
    {
        /* 
            Metodo para retornar um unico cliente da tabela proprietarios 
            consultando por cpfProprietario = cpf
        */
        $data = [];

        $query = $this->conn->returnConnection()->prepare
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

    public function updateClient($nome, $idade, $celular, $email, $cpf)
    {   
        /* 
            Atualiza registros na tabela 
            proprietarios

        */
        try 
        {
            $this->conn = new DBConnection();
            
            $query = $this->conn->returnConnection()->prepare
            (
                "UPDATE proprietarios
                 SET nome = :nome,
                     idade = :idade,
                     celular = :celular,
                     email = :email
                WHERE cpf = :cpf"
            );

            $query -> bindValue(":nome", $nome);
            $query -> bindValue(":idade", $idade);
            $query -> bindValue(":celular", $celular);
            $query -> bindValue(":email", $email);
            $query -> bindValue(":cpf", $cpf);


            $query -> execute();

            
        } catch (Exception $e)
        {
            echo "Erro ao tentar atualizar Cliente " . $e->getMessage();
        }
    }


    public function deleteClient($cpf)
    {
        /*
            Deleta todos as linhas de registros da tabela
            proprietarios
            onde cpfProprietarios = cpfInformado
        */
        try
        {
            $this->conn = new DBConnection();
            $query = $this->conn->returnConnection()->prepare
            (
                "SELECT * FROM proprietarios WHERE cpf = :cpf"
            );

            $query -> bindValue(":cpf", $cpf);
            $query -> execute();

            
            if ($query -> rowCount() > 0)
            {    
                
                $query = $this->conn->returnConnection()->prepare
                (
                    "DELETE FROM proprietarios WHERE cpf = :cpf"
                );
    
                $query -> bindValue(":cpf", $cpf);
                $query -> execute();
            
            
            }
        }  catch (Exception $e)
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



