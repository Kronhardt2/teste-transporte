CREATE DATABASE testeTranspostes;

USE testeTranspostes;

CREATE TABLE motoristas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cnh VARCHAR(20) NOT NULL,
    telefone VARCHAR(20) NOT NULL
);

CREATE TABLE clientes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    cnpj VARCHAR(18) NOT NULL
);

CREATE TABLE entregas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    destino VARCHAR(100) NOT NULL,
    status ENUM('Pendente', 'A Caminho', 'Entregue', 'Cancelado', 'Devolução') NOT NULL,
    id_motorista INT NULL,
    id_cliente INT NOT NULL,
    FOREIGN KEY (id_motorista) REFERENCES motoristas(id),
    FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);

INSERT INTO motoristas(nome,cnh,telefone) VALUES
('João Silva', '123456789', '51999999999'),
('Maria Souza', '987654321', '51988888888'),
('Carlos Pereira', '555555555', '51977777777');

INSERT INTO clientes(nome,cidade,cnpj) VALUES
('MoveFast', 'Porto Alegre', '12.345.678/0001-90'),
('Transportes RS', 'Canoas', '98.765.432/0001-66'),
('LogBrasil', 'Guaíba', '45.987.321/0001-66');

INSERT INTO entregas(data,destino,status,id_motorista,id_cliente) VALUES
('2025-10-22', 'Porto Alegre', 'Pendente', NULL, 1),
('2025-10-23', 'Canoas', 'A Caminho', 2, 2),
('2025-10-24', 'Guaíba', 'Entregue', 3, 3),
('2025-10-25', 'Porto Alegre', 'Cancelado', NULL, 1),
('2025-10-25', 'Guaíba', 'Devolução', 3, 3);