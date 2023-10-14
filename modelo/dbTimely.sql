-- Crear base de datos timely
CREATE DATABASE bbdd_timely;

-- Crear Tabla Usuarios
USE bbdd_timely;
CREATE TABLE usuarios(
id int AUTO_INCREMENT,
usuario VARCHAR(40),
nivel VARCHAR(40),
correo VARCHAR(40),
contraseña VARCHAR(200),
token VARCHAR(200),
PRIMARY KEY(id)
);

ALTER TABLE usuarios
ADD UNIQUE(usuario);

ALTER TABLE usuarios
MODIFY contraseña VARCHAR(200);

ALTER TABLE usuarios
MODIFY token VARCHAR(200);

-- Crear Tabla emprendedores
USE bbdd_timely;
CREATE TABLE emprendedores(
id INT AUTO_INCREMENT,
fk_id_usu INT,
nombre_completo VARCHAR(40),
ciudad VARCHAR(40),
cedula VARCHAR(40),
telefono VARCHAR(40),
direccion VARCHAR(40),
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id)
);

-- Crear Tabla Modelo
USE bbdd_timely;
CREATE TABLE modelo(
id INT AUTO_INCREMENT,
fk_id_empre INT,
title_emprendimiento VARCHAR(200),
descripcion TEXT,
productos TEXT,
imagenes TEXT,
whatsapp VARCHAR(40),
logo TEXT,
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
fecha_actualizacion DATETIME,
PRIMARY KEY(id)
);

-- Crear Tabla Contactanos
USE bbdd_timely;
CREATE TABLE contactanos(
id INT AUTO_INCREMENT,
nombre VARCHAR(40),
correo VARCHAR(40),
descripcion TEXT,
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id)
);

-- Triger  
DELIMITER //
CREATE TRIGGER actualiza_fecha
BEFORE UPDATE ON modelo
FOR EACH ROW
BEGIN
    SET NEW.fecha_actualizacion = NOW();
END;
//
DELIMITER ;
