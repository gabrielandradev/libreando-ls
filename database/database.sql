CREATE DATABASE IF NOT EXISTS libreando;

USE libreando;

CREATE TABLE IF NOT EXISTS Usuario (
	id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    contraseña VARCHAR(72) NOT NULL,
    rol ENUM('estudiante', 'profesor', 'administrador'),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Estudiante (
    dni VARCHAR(8) NOT NULL,
    id_usuario INT NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    año TINYINT NOT NULL CHECK(año BETWEEN 1 AND 6),
    division TINYINT NOT NULL,
    turno ENUM('mañana', 'tarde') NOT NULL,
    especialidad ENUM('electrica', 'mecanica', 'computacion', 'electronica', 'quimica', 'construcciones'),
    telefono VARCHAR(25) NOT NULL,
    domicilio VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    PRIMARY KEY(dni)
);

CREATE TABLE IF NOT EXISTS Profesor (
	dni VARCHAR(8) NOT NULL,
    id_usuario INT NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    especialidad ENUM('electrica', 'mecanica', 'computacion', 'electronica', 'quimica', 'construcciones'),
    telefono VARCHAR(25) NOT NULL,
    domicilio VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    PRIMARY KEY(dni)
);

CREATE TABLE IF NOT EXISTS Administrador (
	dni VARCHAR(8) NOT NULL,
    id_usuario INT NOT NULL AUTO_INCREMENT,
    apellido VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    celular VARCHAR(25) NOT NULL,
    funcion VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    PRIMARY KEY (dni)
);

CREATE TABLE IF NOT EXISTS Libro (
	num_inventario VARCHAR(255) NOT NULL,
    ubicacion_fisica VARCHAR(255) NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL, /*Multivaluadiririjillo*/
    año_edicion YEAR NOT NULL,
    num_edicion INT NOT NULL,
    lugar_edicion VARCHAR(255) NOT NULL,
    isbn VARCHAR(255),
    desc_primario VARCHAR(255) NOT NULL,
    desc_secundario VARCHAR(255) NOT NULL,
    idioma VARCHAR(255) NOT NULL,
    notas VARCHAR(255) NOT NULL,
    num_paginas VARCHAR(255) NOT NULL,
    PRIMARY KEY(num_inventario)
    );
    
CREATE TABLE IF NOT EXISTS Prestamo (
	num_inventario VARCHAR(255) NOT NULL,
    id_usuario INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_devolucion DATE NOT NULL,
    estado ENUM('solicitado', 'cancelado', 'prestado', 'devuelto', 'atrasado'),
    FOREIGN KEY (num_inventario) REFERENCES Libro(num_inventario),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    PRIMARY KEY(num_inventario, id_usuario)
    );