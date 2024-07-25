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

ALTER TABLE proprietarios ADD INDEX(idPessoa);
ALTER TABLE proprietarios CHANGE idPessoa idPessoa INT NOT NULL AUTO_INCREMENT;
ALTER TABLE proprietarios MODIFY COLUMN  ativo VARCHAR(1) NOT NULL DEFAULT 1;
