CREATE DATABASE php_crud_mvc_test;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    nama VARCHAR(255) NOT NULL ,
    npm CHAR(20) NOT NULL ,
    prodi VARCHAR(255)
) ENGINE = InnoDB;

DESC users;

SELECT * FROM users;

INSERT INTO users(nama, npm, prodi) VALUES('Febri','1235461717','Teknik Informatiks');