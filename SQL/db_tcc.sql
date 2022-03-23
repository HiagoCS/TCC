-- USE ['DATABASE NAME'] --
CREATE DATABASE IF NOT EXISTS tcc;
USE tcc;
CREATE TABLE IF NOT EXISTS tb_category(
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    commision FLOAT NOT NULL
)ENGINE=InnoDb DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_levels(
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)ENGINE=InnoDb DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_user(
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel VARCHAR(13) NOT NULL,
    password VARCHAR(32) NOT NULL,
    status VARCHAR(32) NOT NULL,
    cpf VARCHAR(32) NOT NULL,
    cep int(10) NOT NULL,
    id_category INT,
    level INT NOT NULL,
    FOREIGN KEY (id_category) REFERENCES tb_category(id),
    FOREIGN KEY (level) REFERENCES tb_levels(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_chat(
    id INT AUTO_INCREMENT PRIMARY KEY,
    author INT NOT NULL,
    content TEXT NOT NULL,
    FOREIGN KEY (author) REFERENCES tb_user(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_product(
	id INT AUTO_INCREMENT PRIMARY KEY,
    id_saler INT NOT NULL,
    id_category INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    cost FLOAT NOT NULL,
    num_sales INT NOT NULL,
    service_tm TIME NOT NULL,
    mean_rating FLOAT NOT NULL,
    description LONGTEXT NOT NULL,
    FOREIGN KEY (id_saler) REFERENCES tb_user(id),
    FOREIGN KEY (id_category) REFERENCES tb_category(id)
   )ENGINE=InnoDb DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_rating(
	id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    id_product INT NOT NULL,
    rating float not null,
    description LONGTEXT NOT NULL,
    FOREIGN KEY (id_client) REFERENCES tb_user(id),
    FOREIGN KEY (id_product) REFERENCES tb_product(id)
   )ENGINE=InnoDb DEFAULT CHARSET=utf8;

CREATE TABLE tb_receipt(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    id_product INT NOT NULL,
    status INT NOT NULL,
    FOREIGN KEY (id_client) REFERENCES tb_user(id),
    FOREIGN KEY (id_product) REFERENCES tb_product(id)
   )ENGINE=InnoDb DEFAULT CHARSET=utf8;