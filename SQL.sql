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
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

ALTER TABLE proprietarios ADD INDEX(idPessoa);
ALTER TABLE proprietarios CHANGE idPessoa idPessoa INT NOT NULL AUTO_INCREMENT;

INSERT INTO usuarios (email, senha) VALUES ('admin@mail.com', 'admin');
INSERT INTO proprietarios (cpf, nome, idade, email, celular) VALUES ('99999999999', 'Doom Guy', 0, 'doomguysmail@gmail.com', 66666);
INSERT INTO carrosEstacionados (cpfProprietario, marcaCarro, placaCarro) VALUES ('99999999999', 'Doom Car', '666');

