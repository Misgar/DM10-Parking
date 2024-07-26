CREATE DATABASE estacionamento;

USE estacionamento;

CREATE TABLE proprietarios (
	idPessoa INT,
	cpf VARCHAR(15) PRIMARY KEY NOT NULL,
	nome varchar(255) NOT NULL,
	idade INT NOT NULL,
	email VARCHAR(50),
	celular VARCHAR(30) NOT NULL
);
	
CREATE TABLE carrosEstacionados (
	idCarro INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	cpfProprietario VARCHAR(15) NOT NULL,
	marcaCarro VARCHAR(100),
	placaCarro VARCHAR(7),
	CONSTRAINT FOREIGN KEY (cpfProprietario) REFERENCES proprietarios(cpf) ON DELETE CASCADE
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);


ALTER TABLE proprietarios ADD INDEX(idPessoa);
ALTER TABLE proprietarios CHANGE idPessoa idPessoa INT NOT NULL AUTO_INCREMENT;

INSERT INTO proprietarios (cpf, nome, idade, email, celular) VALUES ('666', 'Doom Guy', 0, 'doomguysmail@gmail.com', 66666);



ALTER TABLE proprietarios MODIFY COLUMN  ativo VARCHAR(1) NOT NULL DEFAULT 1;
