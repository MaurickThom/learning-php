CREATE DATABASE IF NOT EXISTS sessionDB;
use sessionDB;

CREATE TABLE IF NOT EXISTS users(
    id SMALLINT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    CONSTRAINT uq_username UNIQUE(username)
);

/* DROP TABLE  users; */

INSERT INTO users(name,username,password) VALUES ("thom","@maurickthom","123456"); 