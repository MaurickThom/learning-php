CREATE DATABASE IF NOT EXISTS usersDB;

CREATE TABLE IF NOT EXISTS users(
    id SMALLINT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL
);

INSERT INTO users(name) VALUES
    ("Thom"),
    ("Alog"),
    ("Erick");