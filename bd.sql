create database u178928053_examen /*esto es el nombre directro de la base de datos y su credencial*/
use u178928053_examen



CREATE TABLE publicaciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255),
  contenido TEXT
);


CREATE TABLE usuarios( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contrasenha VARCHAR(100)NOT NULL
);
