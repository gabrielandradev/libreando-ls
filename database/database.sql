CREATE DATABASE IF NOT EXISTS libreando;

USE libreando;

CREATE TABLE IF NOT EXISTS Usuario (
	id_cuenta INT PRIMARY KEY,
    email VARCHAR(255) not null,
    password VARCHAR(255) not null
);

CREATE TABLE IF NOT EXISTS Alumno (
    apellido VARCHAR(50) not null,
    nombre VARCHAR(50) not null,
    dni INT PRIMARY KEY,
    año INT not null, /*La ñ es valida???*/
    division INT not null,
    turno VARCHAR(10) not null,
    especialidad VARCHAR(20) not null,
    domicilio VARCHAR(50) not null,
    localidad VARCHAR(50) not null,
    celular VARCHAR(15) not null,
    id_usuario INT not null,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_cuenta)
);


CREATE TABLE IF NOT EXISTS Profesor (
	dni INT PRIMARY KEY,
    nombre VARCHAR(255) not null,
    apellido VARCHAR(255) not null,
    id_usuario INT not null,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_cuenta)
);
