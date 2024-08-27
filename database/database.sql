CREATE TABLE IF NOT EXISTS Turno (
	id INT NOT NULL,
  	nombre VARCHAR(20),
  	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Especialidad (
	id INT NOT NULL,
  	nombre VARCHAR(20),
  	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Rol (
  	id INT NOT NULL,
  	nombre VARCHAR(20),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Disponibilidad_Libro (
    id INT,
  	estado VARCHAR(50),
  	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Estado_Prestamo (
    id INT,
    estado VARCHAR(50),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Estado_Cuenta (
    id INT NOT NULL,
    estado VARCHAR(50),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Usuario (
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    contraseña VARCHAR(72) NOT NULL,
    id_rol INT NOT NULL,
    id_estado_cuenta INT NOT NULL,
    PRIMARY KEY (id),
  	FOREIGN KEY(id_rol) REFERENCES Rol(id),
    FOREIGN KEY(id_estado_cuenta) REFERENCES Estado_Cuenta(id)
);

CREATE TABLE IF NOT EXISTS Estudiante (
    dni VARCHAR(8) NOT NULL,
    id_usuario INT NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    año TINYINT NOT NULL CHECK (año BETWEEN 1 AND 6),
    division VARCHAR(20) NOT NULL,
    id_turno INT NOT NULL,
    id_especialidad INT,
    telefono VARCHAR(25) NOT NULL,
    domicilio VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id),
  	FOREIGN KEY (id_turno) REFERENCES Turno(id),
  	FOREIGN KEY (id_especialidad) REFERENCES Especialidad(id),
    PRIMARY KEY(dni)
);

CREATE TABLE IF NOT EXISTS Administrador (
    dni VARCHAR(8) NOT NULL,
    id_usuario INT NOT NULL AUTO_INCREMENT,
    apellido VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    telefono VARCHAR(25) NOT NULL,
    funcion VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id),
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
    num_edicion TINYINT NOT NULL,
    lugar_edicion VARCHAR(255),
    desc_primario VARCHAR(255) NOT NULL,
    desc_secundario VARCHAR(255) NOT NULL,
    idioma VARCHAR(255) NOT NULL,
    notas VARCHAR(255),
    num_paginas INT,
    id_disponibilidad INT NOT NULL,
    fecha_creacion DATE NOT NULL,
    fecha_edicion DATE NOT NULL,
    FOREIGN KEY (id_disponibilidad) REFERENCES Disponibilidad_Libro(id),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Profesor (
    dni VARCHAR(8) NOT NULL,
    id_usuario INT NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    especialidad VARCHAR(50),
    telefono VARCHAR(25) NOT NULL,
    domicilio VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id),
    PRIMARY KEY(dni)
);
  
CREATE TABLE IF NOT EXISTS Autor (
    id INT AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Libro_Autor(
    id_autor INT NOT NULL,
    id_libro INT NOT NULL,
    FOREIGN KEY (id_autor) REFERENCES Autor(id),
    FOREIGN KEY (id_libro) REFERENCES Libro(id),
    PRIMARY KEY (id_autor, id_libro)
);

CREATE TABLE IF NOT EXISTS Prestamo (
    id_libro INT NOT NULL,
    id_usuario INT NOT NULL,
    fecha_prestamo DATE NOT NULL,
    fecha_devolucion DATE NOT NULL,
    id_estado_prestamo INT NOT NULL,
    FOREIGN KEY (id_libro) REFERENCES Libro(id),
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id),
    FOREIGN KEY (id_estado_prestamo) REFERENCES Estado_Prestamo(id),
    PRIMARY KEY(id_libro, id_usuario)
);