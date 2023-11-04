CREATE TABLE Pessoas (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(255),
    Sobrenome VARCHAR(255),
    DataNascimento DATE,
    Genero VARCHAR(10),
    Endereco VARCHAR(255),
    Telefone VARCHAR(20),
    Email VARCHAR(255),
    DataCriacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    DataModificacao DATETIME ON UPDATE CURRENT_TIMESTAMP,
    EAdmin BOOLEAN,
    Observacoes TEXT
);
