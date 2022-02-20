-- USE ['DATABASE NAME'] --
CREATE DATABASE IF NOT EXISTS tcc;
USE tcc;
CREATE TABLE IF NOT EXISTS tb_category(
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
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
    cep int(10) NOT NULL,
    category_id INT,
    level INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES tb_category(id),
    FOREIGN KEY (level) REFERENCES tb_levels(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tb_msg(
    id INT PRIMARY KEY AUTO_INCREMENT,
    author INT NOT NULL,
    receiver INT NOT NULL,
    content TEXT NOT NULL,
    timestamp datetime NOT NULL,
    isAnswer boolean NOT NULL,
    feedback_id INT,
    isSend boolean NOT NULL,
    isRead boolean NOT NULL,
    FOREIGN KEY (author) REFERENCES tb_user(id),
    FOREIGN KEY (receiver) REFERENCES tb_user(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8;