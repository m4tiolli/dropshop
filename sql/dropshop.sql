DROP DATABASE IF EXISTS dropshop;
CREATE DATABASE dropshop DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE dropshop;

CREATE TABLE cliente (
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
nome VARCHAR (40),
cidade VARCHAR(40),
bairro VARCHAR(40),
rua VARCHAR(40),
numcasa VARCHAR(20),
complementocasa VARCHAR(40),
cep VARCHAR(15),
uf VARCHAR(2),
telefone VARCHAR (15),
cpf VARCHAR (15),
email VARCHAR(40),
senha VARCHAR(255),
data_nasc VARCHAR(255)
);

CREATE TABLE vendedor(
id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
nome VARCHAR (40),
cidade VARCHAR(40),
bairro VARCHAR(40),
rua VARCHAR(40),
numcasa VARCHAR(20),
cep VARCHAR(13),
uf VARCHAR(2),
cnpj VARCHAR (14),
email VARCHAR(255),
senha VARCHAR(255)
);

CREATE TABLE produto (
id INT(10) PRIMARY KEY,
nome VARCHAR (50),
descricao VARCHAR (50),
tamanho VARCHAR (2),
pr_venda VARCHAR(255),
quant VARCHAR (200),
site_compra VARCHAR (100)
);