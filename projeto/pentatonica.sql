CREATE DATABASE db_pentatonica;

USE db_pentatonica;

CREATE TABLE IF NOT EXISTS tb_cliente (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	cpf VARCHAR(20) NOT NULL UNIQUE,
	email VARCHAR(50) NOT NULL UNIQUE,
	senha VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_lojista (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	cpf VARCHAR(20) NOT NULL UNIQUE,
	email VARCHAR(50) NOT NULL UNIQUE,
	senha VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_leilao (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome_guitarra VARCHAR(100) NOT NULL,
	marca_guitarra VARCHAR(30) NOT NULL,
	descricao VARCHAR(1000) NOT NULL,
	lance_minimo DOUBLE NOT NULL,
	lance_maior DOUBLE NOT NULL,
	lance_arrebatamento DOUBLE NOT NULL,
	id_lojista INT NOT NULL,
	id_cliente INT,
	FOREIGN KEY (id_lojista) REFERENCES tb_lojista(id),
	FOREIGN KEY (id_cliente) REFERENCES tb_cliente(id)
);

CREATE TABLE IF NOT EXISTS tb_anuncio(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome_guitarra VARCHAR(100) NOT NULL,
	marca_guitarra VARCHAR(30) NOT NULL,
	descricao VARCHAR(1000) NOT NULL,
	id_lojista INT NOT NULL,
	FOREIGN KEY (id_lojista) REFERENCES tb_lojista(id)
);

CREATE TABLE IF NOT EXISTS tb_compra(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	valor DOUBLE NOT NULL,
	id_cliente INT NOT NULL,
	id_leilao INT,
	id_anuncio INT,
	FOREIGN KEY (id_cliente) REFERENCES tb_cliente(id),
	FOREIGN KEY (id_leilao) REFERENCES tb_leilao(id),
	FOREIGN KEY (id_anuncio) REFERENCES tb_anuncio(id)
);


