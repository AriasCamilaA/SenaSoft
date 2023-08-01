DROP DATABASE IF EXISTS senasoft_db;
CREATE DATABASE IF NOT EXISTS senasoft_db;
USE senasoft_db;

CREATE TABLE rol(
	rol_id INT PRIMARY KEY AUTO_INCREMENT,
    rol_tipo VARCHAR(50) NOT NULL
);

CREATE TABLE categoria(
	cat_id INT PRIMARY KEY AUTO_INCREMENT,
    cat_tipo VARCHAR(50) NOT NULL
);

CREATE TABLE usuario(
	usu_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(20) NOT NULL,
    password VARCHAR(60) NOT NULL
);

CREATE TABLE usuario_rol(
	usuario_rol_id INT PRIMARY KEY AUTO_INCREMENT,
	usu_id_fk INT,
	rol_id_fk INT,
    FOREIGN KEY (usu_id_fk) REFERENCES usuario(usu_id),
    FOREIGN KEY (rol_id_fk) REFERENCES rol(rol_id)
);

CREATE TABLE datos_personales(
  data_id INT PRIMARY KEY AUTO_INCREMENT,
  data_nombre VARCHAR(50) NOT NULL,
  data_apellido VARCHAR(50) NOT NULL,
  data_tipo_id VARCHAR(20) NOT NULL,
  data_numero_id VARCHAR(20) NOT NULL,
  data_telefono VARCHAR(20) NOT NULL,
  data_correo VARCHAR(50) NOT NULL,
  usu_id_fk INT,
  FOREIGN KEY (usu_id_fk) REFERENCES usuario(usu_id)
);

CREATE TABLE vehiculo(
	veh_placa VARCHAR(10) PRIMARY KEY,
    veh_modelo INT,
    veh_marca VARCHAR(50) NOT NULL,
    veh_color VARCHAR(50) NOT NULL,
    veh_estado VARCHAR(30) NOT NULL,
    veh_precio INT,
    data_id_fk INT,
    cat_id_fk INT,
    FOREIGN KEY (data_id_fk) REFERENCES datos_personales(data_id),
    FOREIGN KEY (cat_id_fk) REFERENCES categoria(cat_id)
);

INSERT INTO rol (rol_tipo) VALUES
	('Comprador'),
    ('Vendedor');

INSERT INTO categoria(cat_tipo) VALUES
	('Camperos'),
    ('Automoviles'),
    ('Camionetas');

INSERT INTO usuario(email, password) VALUES
	('Comprador','$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty'),
    ('Vendedor','$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty'),
    ('CompradorVendedor','$2y$10$6gpwlik9Y/ZClXDTVk3N6uJTsV4B9P1abA2Z1Kzjny/O3DiA8jfty');

INSERT INTO usuario_rol(usu_id_fk, rol_id_fk) VALUES
	(1, 1),
    (2, 2),
    (3, 1),
    (3, 2);

INSERT INTO datos_personales(data_nombre, data_apellido, data_tipo_id, data_numero_id, data_telefono, data_correo, usu_id_fk) VALUES
	('Alejandro', 'Arias', 'Cédula de Ciudadania', '1234567890', '1234567890', 'AlejandroArias@correo.com', 1),
    ('Julie', 'Ruiz', 'Cédula de Ciudadania', '2345678912', '2345678912', 'JulieRuiz@correo.com', 2),
    ('Camila', 'Arias', 'Cédula de Ciudadania', '3456789123', '3456789123', 'CamilaArias@correo.com', 3);

INSERT INTO vehiculo(veh_placa, veh_modelo, veh_marca, veh_color, veh_estado, veh_precio, data_id_fk, cat_id_fk) VALUES
	('ABC123', 2020, 'Toyota', 'Azul' , 'Nuevo', 25000000, 2, 1),
    ('DEF456', 2015, 'Honda', 'Rojo' , 'Usado', 18000000, 2, 2),
    ('GHI789', 2019, 'Chevrolet', 'Rojo', 'Nuevo', 22000000, 3, 2),
    ('JKL012', 2018, 'Ford', 'Negro', 'Usado', 20000000, 3, 3);