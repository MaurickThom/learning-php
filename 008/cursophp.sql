DROP DATABASE IF EXISTS cursophp;

CREATE DATABASE IF NOT EXISTS cursophp;

CREATE TABLE IF NOT EXISTS usuarios(
    id_usuario SMALLINT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    paterno VARCHAR(30) NOT NULL,
    materno VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL
);

INSERT INTO usuarios VALUES (DEFAULT,"Thom","Roman","Aguilar","thomtwd@gmail.com");

SELECT * FROM usuarios;