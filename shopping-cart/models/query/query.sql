CREATE DATABASE IF NOT EXISTS dbShoppingCart;

USE dbShoppingCart;

CREATE TABLE IF NOT EXISTS categories(
    id_category INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    CONSTRAINT uq_name UNIQUE (name)
);

CREATE TABLE IF NOT EXISTS products(
    id_product INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_category INT NOT NULL,
    name_product VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL NOT NULL,
    CONSTRAINT fk_categProduc FOREIGN KEY (id_category)
    REFERENCES categories(id_category),
    CHECK(quantity >= 0),
    CHECK(price >= 0)
);

ALTER TABLE products ADD img VARCHAR(100) NOT NULL;


INSERT INTO categories(name)  VALUES ("juguetes"),("libros");

INSERT  INTO products(id_category,name_product,price,quantity,img) VALUES
(1,"BATMAN MALO",500,10,"/public/img/juguete01.jpg"),
(1,"CAPITAN AMERICA",260,5,"/public/img/juguete02.jpg"),
(1,"THANOS",260,1,"/public/img/juguete03.jpg"),
(1,"MISTERIO",340,100,"/public/img/juguete04.jpg"),
(1,"SHAZAM",340,3,"/public/img/juguete05.jpg"),
(1,"STICH",340,10,"/public/img/juguete06.jpg"),
(2,"LIBRO A",340,100,"/public/img/libro01.jpg"),
(2,"LIBRO B",260,1,"/public/img/libro02.jpg"),
(2,"LIBRO C",340,3,"/public/img/libro03.jpg"),
(2,"LIBRO D",340,10,"/public/img/libro04.jpg"),
(2,"LIBRO E",340,10,"/public/img/libro05.jpg"),
(2,"LIBRO F",340,10,"/public/img/libro06.jpg");

SELECT * FROM products WHERE id_category = 1 AND quantity>0;

UPDATE products SET quantity = quantity - 1 WHERE id_product = 4;