# api_sia
CREATE DATABASE TestVocacionalISC;
USE TestVocacionalISC;

-- EXPERTO = 1 
-- USUARIO = 0

CREATE TABLE Usuarios(
Id INT AUTO_INCREMENT PRIMARY KEY,
Rol BOOL,
Nombre VARCHAR(25),
Usuario VARCHAR(15) UNIQUE,
Contrasena VARCHAR(20) UNIQUE
);

CREATE TABLE UsuariosResultado(
	IdUsuario INT,
    Resultado1 VARCHAR(6),
    Resultado2 VARCHAR(6),
    Resultado3 VARCHAR(6),
    FOREIGN KEY (IdUsuario) REFERENCES Usuarios(Id)
);

INSERT INTO Usuarios(Rol,Nombre, Usuario, Contrasena) VALUES(1,'Arturo Espinoza','arturo','123');

SELECT * FROM Usuarios;


CREATE TABLE Carreras(
IdCarrera INT PRIMARY KEY AUTO_INCREMENT,
Nombre VARCHAR(50)
);

CREATE TABLE PesoCarrera(
IdPeso INT PRIMARY KEY AUTO_INCREMENT,
IdCarrera INT,
Peso INT,
foreign key(IdCarrera) references Carreras(IdCarrera)
);

CREATE TABLE Materias(
IdMateria INT PRIMARY KEY auto_increment,
Nombre VARCHAR(50)
);

CREATE TABLE CarreraMaterias(
IdCarreraMateria INT PRIMARY KEY auto_increment,
IdCarrera INT,
IdMateria INT,
Peso INT,
foreign key (IdCarrera) REFERENCES Carreras(IdCarrera),
foreign key (IdMateria) REFERENCES Materias(IdMateria)
);


CREATE TABLE Preguntas(
IdPregunta INT PRIMARY KEY AUTO_INCREMENT,
IdMateria INT,
Pregunta VARCHAR(100),
FOREIGN KEY (IdMateria) REFERENCES Materias(IdMateria)
);