DROP DATABASE IF EXISTS cursophp;

CREATE DATABASE IF NOT EXISTS cursophp;

CREATE TABLE IF NOT EXISTS usuarios(
    id_usuario SMALLINT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    paterno VARCHAR(30) NOT NULL,
    materno VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL
);

DROP TABLE IF EXISTS estudiantes;

CREATE TABLE IF NOT EXISTS paises(
    id_pais SMALLINT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,
    CONSTRAINT uc_email UNIQUE(nombre)
);


CREATE TABLE IF NOT EXISTS tecnologias(
    id_tecnologia SMALLINT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,
    CONSTRAINT uc_email UNIQUE(nombre)
);

DROP TABLE IF EXISTS estudiantes;
CREATE TABLE IF NOT EXISTS estudiantes(
    id_estudiante SMALLINT(11) PRIMARY KEY AUTO_INCREMENT,
    id_pais SMALLINT(11) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    paterno VARCHAR(30) NOT NULL,
    materno VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    edad SMALLINT(3) NOT NULL,
    fecha_ingreso TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT uc_email UNIQUE(email),
    CONSTRAINT fk_estudiante_pais FOREIGN KEY (id_pais)
    REFERENCES paises(id_pais)  ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS estudiantes_tecnologias(
    id_estudiante_tecnologia SMALLINT(11) PRIMARY KEY AUTO_INCREMENT,
    id_estudiante SMALLINT(11) NOT NULL,
    id_tecnologia SMALLINT(11) NOT NULL,
    CONSTRAINT fk_estudiante FOREIGN KEY (id_estudiante)
    REFERENCES estudiantes(id_estudiante)  ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_tecnologia FOREIGN KEY (id_tecnologia)
    REFERENCES tecnologias(id_tecnologia)  ON DELETE RESTRICT ON UPDATE CASCADE
);


INSERT INTO usuarios VALUES (DEFAULT,"Thom","Roman","Aguilar","thomtwd@gmail.com");

SELECT * FROM usuarios;

select count(*) from estudiantes;


INSERT INTO paises (nombre) VALUES ("Peru"); 
INSERT INTO paises (nombre) VALUES ("Argentina"); 
INSERT INTO paises (nombre) VALUES ("Bolivia"); 
INSERT INTO paises (nombre) VALUES ("Canada"); 
INSERT INTO paises (nombre) VALUES ("Mexico"); 
INSERT INTO paises (nombre) VALUES ("EEUU");

INSERT INTO estudiantes(id_pais,edad,email,materno,nombre,paterno) VALUES
    (1,22,"thomtwd@gmail.com","Aguilar","Thom","Roman"),
    (2,18,"carlos@gmail.com","Algo","Alog","Algo"),
    (3,20,"erick@gmail.com","Huarancca","Erick","Rivas");

INSERT INTO tecnologias (nombre) VALUES 
    ("javascript"),
    ("php"),
    ("python"),
    ("IA");

INSERT INTO estudiantes_tecnologias (id_estudiante,id_tecnologia) VALUES
(1,11),
(2,12),
(3,9);