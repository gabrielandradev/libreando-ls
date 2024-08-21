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
    año TINYINT NOT NULL CHECK(
        año BETWEEN 1
        AND 6
    ),
    division TINYINT NOT NULL,
    turno ENUM('mañana', 'tarde') NOT NULL,
    especialidad ENUM(
        'electrica',
        'mecanica',
        'computacion',
        'electronica',
        'quimica',
        'construcciones'
    ),
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
    especialidad ENUM(
        'electrica',
        'mecanica',
        'computacion',
        'electronica',
        'quimica',
        'construcciones'
    ),
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
    telefono VARCHAR(25) NOT NULL,
    funcion VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    PRIMARY KEY (dni)
);

CREATE TABLE IF NOT EXISTS Libro (
    id INT AUTO_INCREMENT,
    num_inventario INT NOT NULL,
    ubicacion_fisica VARCHAR(255) NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    isbn_10 VARCHAR(13),
    isbn_13 VARCHAR(16),
    año_edicion SMALLINT CHECK (año_edicion > 0),
    num_edicion INT,
    lugar_edicion VARCHAR(255),
    desc_primario VARCHAR(255) NOT NULL,
    desc_secundario VARCHAR(255) NOT NULL,
    idioma VARCHAR(255) NOT NULL,
    notas VARCHAR(255),
    num_paginas INT,
    disponibilidad ENUM(
        'disponible',
        'prestamo',
        'bloqueado'
    ),
    PRIMARY KEY(id_libro)
);

CREATE TABLE IF NOT EXISTS Autor (
    id INT AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_autor)
);

CREATE TABLE IF NOT EXISTS Libro_Autor(
    id_autor INT NOT NULL,
    id_libro INT NOT NULL,
    FOREIGN KEY (id_autor) REFERENCES Autor(id_autor),
    FOREIGN KEY (id_libro) REFERENCES Libro(id_libro),
    PRIMARY KEY (id_autor, id_libro)
);

CREATE TABLE IF NOT EXISTS Prestamo (
    id_libro INT NOT NULL,
    id_usuario INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_devolucion DATE NOT NULL,
    estado ENUM(
        'solicitado',
        'cancelado',
        'prestado',
        'devuelto',
        'atrasado'
    ),
    FOREIGN KEY (id_libro) REFERENCES Libro(id_libro),
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id),
    PRIMARY KEY(id_libro, id_usuario)
);