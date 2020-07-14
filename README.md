# api_sia


CREATE DATABASE TestVocacionalISC;

USE TestVocacionalISC;

CREATE TABLE Usuarios(
Id INT AUTO_INCREMENT PRIMARY KEY,
Nombre VARCHAR(25),
Usuario VARCHAR(15) UNIQUE,
Contrasena VARCHAR(20) UNIQUE
);

INSERT INTO Usuarios(Nombre, Usuario, Contrasena) VALUES('Arturo Espinoza','arturo','123');
