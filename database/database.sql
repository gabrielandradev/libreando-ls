CREATE DATABASE IF NOT EXISTS libreando;

USE libreando;

CREATE TABLE IF NOT EXISTS usuarios (
	id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    contraseña VARCHAR(72) NOT NULL, -- Maximo creado por BCRYPT
    rol ENUM('estudiante', 'profesor'),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS estudiantes (
    dni VARCHAR(8) NOT NULL,
    id_usuario INT NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    año TINYINT NOT NULL CHECK(año BETWEEN 1 AND 6),
    division TINYINT NOT NULL,
    turno ENUM('mañana', 'tarde') NOT NULL,
    especialidad ENUM('electrica', 'mecanica', 'computacion', 'electronica', 'quimica', 'construcciones'),
    domicilio VARCHAR(50) NOT NULL,
    celular VARCHAR(15) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    PRIMARY KEY(dni)
);

CREATE TABLE IF NOT EXISTS profesores (
	dni VARCHAR(8) NOT NULL,
    id_usuario INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    PRIMARY KEY(dni)
);