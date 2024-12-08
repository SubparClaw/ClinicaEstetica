create database bdicaria;
use bdicaria;

CREATE TABLE IF NOT EXISTS persona (
    id_persona INT(10) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    genero ENUM('Mujer', 'Hombre', 'No definido') NOT NULL,
    dni VARCHAR(8),
    telefono VARCHAR(15) NOT NULL,
    correo VARCHAR(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS clientes (
    id_cliente INT(10) PRIMARY KEY AUTO_INCREMENT,
    id_persona INT(10) NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    fechaRegistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    estado ENUM('Activo','Inactivo'),
    FOREIGN KEY (id_persona) REFERENCES persona(id_persona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT(10) PRIMARY KEY AUTO_INCREMENT,
    id_persona INT(10) NOT NULL,
    nombreUsuario VARCHAR(100) NOT NULL,
    contrasenia VARCHAR(200) NOT NULL,
    estado ENUM('Activo','Inactivo'),
    fechaRegistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    FOREIGN KEY (id_persona) REFERENCES persona(id_persona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS doctores (
    id_doctor INT(10) PRIMARY KEY AUTO_INCREMENT,
    id_persona INT(10) NOT NULL,
    especialidad VARCHAR(200) NOT NULL,
    nacionalidad VARCHAR(255) NOT NULL,
    descripcion VARCHAR(350) NOT NULL,
    facebook_link VARCHAR(255),
    twitter_link VARCHAR(255),
    instagram_link VARCHAR(255),
    dribbble_link VARCHAR(255),
    img VARCHAR(255),
    estado ENUM('Activo','Inactivo'),
    fechaRegistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    FOREIGN KEY (id_persona) REFERENCES persona(id_persona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS categorias (
    id_categoria INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombreCategoria VARCHAR(50) NOT NULL,
    fechaRegistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS servicios (
    id_servicio INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nomServicio VARCHAR(200) NOT NULL,
    descripcion VARCHAR(320) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    img VARCHAR(200) NOT NULL,
    id_categoria INT(10) NOT NULL,
    estado ENUM('Activo', 'Inactivo') NOT NULL,
    fechaRegistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS producto (
    id_producto INT(10) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    cantidad INT(10) NOT NULL,
    estado ENUM('Activo', 'Inactivo'),
    PRIMARY KEY (Id_producto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS cita (
  id_cita INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  -- id_cliente INT,
  id_doctor INT NOT NULL,
  id_servicio INT NOT NULL,
  citanum VARCHAR(80) NOT NULL,
  nombres VARCHAR(120),
  telefono VARCHAR(15),
  correo VARCHAR(320),
  fecha VARCHAR(120) NOT NULL,
  hora VARCHAR(10) NOT NULL,
  estado VARCHAR(20) ,
  fechaRegistro timestamp NULL DEFAULT current_timestamp(),
  CONSTRAINT FK_ServicioID FOREIGN KEY (id_servicio) REFERENCES servicios (id_servicio),
  CONSTRAINT FK_doctorID FOREIGN KEY (id_doctor) REFERENCES doctores (id_doctor)
 -- CONSTRAINT FK_clienteID FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SELECT id_doctor FROM doctor WHERE CONCAT(nombres, ' ', apellidos)  = 'Katherine Rosmery Gutierrez Cari';

-- Tabla facturaprueba_perfil
CREATE TABLE IF NOT EXISTS perfil (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nombre_comercial VARCHAR(255) NOT NULL,
  propietario VARCHAR(255) NOT NULL,
  telefono VARCHAR(30) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  email VARCHAR(64) NOT NULL,
  web VARCHAR(100) NOT NULL,
  moneda VARCHAR(3) NOT NULL,
  iva VARCHAR(2) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

update perfil set iva = '18' where id =1;
select * from perfil;

-- Tabla facturaprueba_proformas
CREATE TABLE IF NOT EXISTS factura (
  id_factura INT(11) NOT NULL AUTO_INCREMENT,
  id_usuario INT(11) NOT NULL,
  id_cliente INT(11) NOT NULL,
  id_doctor INT NOT NULL,
  descripcion VARCHAR(255) NOT NULL,
  fechaemision TIMESTAMP NOT NULL,
  PRIMARY KEY (id_factura),
  CONSTRAINT FK_factura_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
  CONSTRAINT FK_factura_cliente FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
  CONSTRAINT FK_factura_doctor FOREIGN KEY (id_doctor) REFERENCES doctores(id_doctor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS detalle_factura(
	id_detalle_fac INT(11) NOT NULL AUTO_INCREMENT,
    id_factura INT NOT NULL,
    id_servicio INT NOT NULL,
    cantidad INT(11) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id_detalle_fac),
    CONSTRAINT FK_detalleFac_factura FOREIGN KEY (id_factura) REFERENCES factura(id_factura),
    CONSTRAINT FK_detalleFac_servicio FOREIGN KEY (id_servicio) REFERENCES servicios(id_servicio)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*===========================Roles y permisos ==========================*/
CREATE TABLE IF NOT EXISTS roles (
  id_rol INT(11) NOT NULL AUTO_INCREMENT,
  nombre_rol VARCHAR(50) NOT NULL,
  estado ENUM('Activo','Inactivo'),
  PRIMARY KEY (id_rol),
  UNIQUE INDEX nombre_rol_unique (nombre_rol)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS permisos (
  id_permiso INT(11) NOT NULL AUTO_INCREMENT,
  nombre_permiso VARCHAR(50) NOT NULL,
  estado ENUM('Activo','Inactivo'),
  PRIMARY KEY (id_permiso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS roles_permisos (
  id_rol INT(11) NOT NULL,
  id_permiso INT(11) NOT NULL,
  PRIMARY KEY (id_rol, id_permiso),
  FOREIGN KEY (id_rol) REFERENCES roles(id_rol),
  FOREIGN KEY (id_permiso) REFERENCES permisos(id_permiso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS usuarios_roles (
  id_usuario INT(11) NOT NULL,
  id_rol INT(11) NOT NULL,
  PRIMARY KEY (id_usuario, id_rol),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
  FOREIGN KEY (id_rol) REFERENCES roles(id_rol)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

# Insertar datos en la tabla roles_permisos
INSERT INTO roles_permisos (id_rol, id_permiso)
VALUES (1, 1), (1, 2), (1, 3), (1, 4);



/*sp para insercion de datos*/

DELIMITER //
CREATE PROCEDURE sp_InsertarPersonaCliente(
    IN p_nombre VARCHAR(100),
    IN p_apellido VARCHAR(100),
    IN p_fechaNacimiento DATE,
    IN p_genero ENUM('Mujer','Hombre','No definido'),
    IN p_dni VARCHAR(8),
    IN p_telefono VARCHAR(15),
    IN p_correo VARCHAR(320),
    IN c_direccion VARCHAR(200),
    IN c_estado ENUM('Activo','Inactivo')
)
BEGIN
    DECLARE id_persona INT;
  
    INSERT INTO persona (nombre, apellido, fecha_nacimiento, genero, dni, telefono, correo)
    VALUES (p_nombre, p_apellido, p_fechaNacimiento, p_genero, p_dni, p_telefono, p_correo);
  
    SET id_persona = LAST_INSERT_ID();
  
    INSERT INTO clientes (id_persona, direccion, estado, fechaRegistro)
    VALUES (id_persona, c_direccion, c_estado, NOW());
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE sp_ActualizarPersonaCliente(
    IN p_nombre VARCHAR(100),
    IN p_apellido VARCHAR(100),
    IN p_fechaNacimiento DATE,
    IN p_genero ENUM('Mujer', 'Hombre', 'No definido'),
    IN p_dni VARCHAR(8),
    IN p_telefono VARCHAR(15),
    IN p_correo VARCHAR(320),
    IN c_direccion VARCHAR(200),
    IN c_id_cliente INT
)
BEGIN
    DECLARE idPersonaB INT;

    -- Obtener el id_persona asociado al id_cliente proporcionado
    SELECT id_persona INTO idPersonaB FROM clientes WHERE id_cliente = c_id_cliente;

    -- Actualizar los datos de la persona si existe
    IF idPersonaB IS NOT NULL THEN
        UPDATE persona
        SET nombre = p_nombre,
            apellido = p_apellido,
            fecha_nacimiento = p_fechaNacimiento,
            genero = p_genero,
            dni = p_dni,
            telefono = p_telefono,
            correo = p_correo
        WHERE id_persona = idPersonaB;

        -- Actualizar los datos del cliente
        UPDATE clientes
        SET direccion = c_direccion
        WHERE id_cliente = c_id_cliente;
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El cliente con el id proporcionado no existe en la base de datos';
    END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_EliminarPersonaCliente(
    IN c_id_cliente INT,
    IN c_estado ENUM('Activo', 'Inactivo')
)
BEGIN
    DECLARE cliente_existente INT;

    SELECT COUNT(*) INTO cliente_existente FROM clientes WHERE id_cliente = c_id_cliente;

    IF cliente_existente = 1 THEN
        UPDATE clientes SET estado = c_estado WHERE id_cliente = c_id_cliente;
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cliente no encontrado';
    END IF;
END //
DELIMITER ;

/*============================Doctores=======================*/

DELIMITER //
CREATE PROCEDURE sp_InsertarPersonaDoctores(
    IN p_nombre VARCHAR(100),
    IN p_apellido VARCHAR(100),
    IN p_fechaNacimiento DATE,
    IN p_genero ENUM('Mujer','Hombre','No definido'),
    IN p_dni VARCHAR(8),
    IN p_telefono VARCHAR(15),
    IN p_correo VARCHAR(320),
    IN doc_especialidad VARCHAR(200),
    IN doc_nacionalidad VARCHAR(255),
    IN doc_descripcion VARCHAR(350),
    /*IN doc_facebook_link VARCHAR(255),
    IN doc_twitter_link VARCHAR(255),
    IN doc_instagram_link VARCHAR(255),
    IN doc_dribbble_link VARCHAR(255),
    IN doc_img VARCHAR(255),*/
    IN doc_estado ENUM('Activo','Inactivo')
)
BEGIN
    DECLARE id_persona INT;
  
    INSERT INTO persona (nombre, apellido, fecha_nacimiento, genero, dni, telefono, correo)
    VALUES (p_nombre, p_apellido, p_fechaNacimiento, p_genero, p_dni, p_telefono, p_correo);
  
    SET id_persona = LAST_INSERT_ID();
  
    INSERT INTO doctores (id_persona, especialidad, nacionalidad, descripcion, facebook_link, twitter_link, instagram_link, dribbble_link, img, estado, fechaRegistro)
    VALUES (id_persona, doc_especialidad, doc_nacionalidad, doc_descripcion, null, null, null,null, null, doc_estado, NOW());
END //
DELIMITER ;

call obtenerInformacionDoctores()

DELIMITER //

CREATE PROCEDURE obtenerInformacionDoctores()
BEGIN
    SELECT
        doc.id_doctor,
        doc.especialidad,
        CONCAT(SUBSTRING_INDEX(p.nombre, ' ', 1), ' ', SUBSTRING_INDEX(p.apellido, ' ', 1)) AS nombre,
        p.genero,
        p.dni,
        doc.nacionalidad,
        p.telefono,
        p.correo,
        doc.estado
    FROM
        doctores doc
    INNER JOIN
        persona p ON doc.id_persona = p.id_persona;
END //

DELIMITER ;



DELIMITER //
CREATE PROCEDURE sp_ActualizarPersonaDoctores(
    IN p_nombre VARCHAR(100),
    IN p_apellido VARCHAR(100),
    IN p_fechaNacimiento DATE,
    IN p_genero ENUM('Mujer','Hombre','No definido'),
    IN p_dni VARCHAR(8),
    IN p_telefono VARCHAR(15),
    IN p_correo VARCHAR(320),
    IN doc_especialidad VARCHAR(200),
    IN doc_nacionalidad VARCHAR(255),
    IN doc_descripcion VARCHAR(350),
    IN doc_facebook_link VARCHAR(255),
    IN doc_twitter_link VARCHAR(255),
    IN doc_instagram_link VARCHAR(255),
    IN doc_dribbble_link VARCHAR(255),
    IN doc_img VARCHAR(255),
    IN doc_estado ENUM('Activo','Inactivo'),
    IN doc_id_doctor INT
)
BEGIN
    DECLARE idPersonaB INT;

    SELECT id_persona INTO idPersonaB FROM doctores WHERE id_doctor = doc_id_doctor;

    -- Actualizar los datos de la persona si existe
    IF idPersonaB IS NOT NULL THEN
        UPDATE persona
        SET nombre = p_nombre,
            apellido = p_apellido,
            fecha_nacimiento = p_fechaNacimiento,
            genero = p_genero,
            dni = p_dni,
            telefono = p_telefono,
            correo = p_correo
        WHERE id_persona = idPersonaB;

        -- Actualizar los datos del cliente
        UPDATE clientes
        SET especialidad = doc_especialidad,
            nacionalidad = doc_nacionalidad,
            descripcion = doc_descripcion,
            facebook_link = doc_facebook_link,
            twitter_link = doc_twitter_link,
            instagram_link = doc_instagram_link,
            dribbble_link = doc_dribbble_link,
            img = doc_img,
            estado = doc_estado
        WHERE id_cliente = c_id_cliente;
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El cliente con el id proporcionado no existe en la base de datos';
    END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_EliminarPersonaDoctores(
    IN doc_id_doctor INT,
    IN doc_estado ENUM('Activo', 'Inactivo')
)
BEGIN
    DECLARE doctor_existente INT;

    SELECT COUNT(*) INTO doctor_existente FROM doctores WHERE id_doctor = doc_id_doctor;

    IF doctor_existente = 1 THEN
        UPDATE doctores SET estado = doc_estado WHERE id_doctor = doc_id_doctor;
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cliente no encontrado';
    END IF;
END //
DELIMITER ;

/*Fin Stored Procedures para doctores*/

insert into categorias(nombreCategoria,fecharegistro) 
values ('Procedimientos faciales',now()),
('Procedimientos corporales',now()),
('Procedimientos de mama',now()),
('Glúteos',now()),
('Cuidado de la piel',now()),
('Medicina Estética no Quirúrgica',now());

INSERT INTO servicios (nomServicio, descripcion, precio, img, id_categoria, estado, fechaRegistro)
VALUES
('Lifting facial', 'Procedimiento quirúrgico para rejuvenecer la cara y el cuello, eliminando el exceso de piel y tensando los músculos faciales.', 2000, 'img/lifting_facial', 1, 'Activo', NOW()),
('Mini lifting facial', 'Versión más pequeña del lifting facial, centrada en áreas específicas para proporcionar un aspecto rejuvenecido.', 1600, 'img/mini_lifting_facial', 1, 'Activo', NOW()),
('Blefaroplastia', 'Cirugía de párpados para mejorar la apariencia de los ojos, eliminando el exceso de piel y grasa alrededor de los ojos.', 1800, 'img/blefaroplastia', 1, 'Activo', NOW()),
('Lifting de cejas', 'Procedimiento para levantar y reposicionar las cejas, proporcionando un aspecto más fresco y alerta.', 1500, 'img/lifting_cejas', 1, 'Activo', NOW()),
('Rinoplastia', 'Cirugía estética para cambiar la forma o mejorar la función de la nariz.', 2200, 'img/rinoplastia', 1, 'Activo', NOW()),
('Implantes de mentón', 'Procedimiento para mejorar la proyección del mentón mediante la colocación de implantes.', 1700, 'img/implantes_menton', 1, 'Activo', NOW()),
('Rellenos faciales', 'Inyecciones de materiales para rellenar y suavizar líneas y arrugas faciales, restaurando volumen y proporcionando un aspecto más juvenil.', 1900, 'img/rellenos_faciales', 1, 'Activo', NOW());

INSERT INTO servicios (nomServicio, descripcion, precio, img, id_categoria, estado, fechaRegistro)
VALUES
('Liposucción', 'Procedimiento quirúrgico que elimina depósitos de grasa no deseados para esculpir y remodelar el cuerpo.', 2500, 'img/liposuccion', 2, 'Activo', NOW()),
('Abdominoplastia', 'Cirugía de abdomen para eliminar el exceso de piel y grasa, y fortalecer los músculos abdominales.', 3000, 'img/abdominoplastia', 2, 'Activo', NOW()),
('Contorno corporal', 'Procedimientos estéticos para mejorar la forma y la apariencia del cuerpo.', 2000, 'img/contorno_corporal', 2, 'Activo', NOW()),
('Transferencia de grasa', 'Procedimiento que implica la recolección de grasa de una parte del cuerpo para ser transferida a otra área.', 1800, 'img/transferencia_grasa', 2, 'Activo', NOW());
INSERT INTO servicios (nomServicio, descripcion, precio, img, id_categoria, estado, fechaRegistro)
VALUES
('Aumento de senos (mamoplastia de aumento)', 'Procedimiento para aumentar el tamaño y mejorar la forma de los senos mediante la colocación de implantes.', 2800, 'img/aumento_senos', 3, 'Activo', NOW()),
('Reducción de senos (mamoplastia de reducción)', 'Procedimiento quirúrgico para reducir el tamaño y aliviar los problemas asociados con senos grandes.', 3200, 'img/reduccion_senos', 3, 'Activo', NOW()),
('Levantamiento de senos (mastopexia)', 'Cirugía para levantar y remodelar los senos caídos, devolviéndoles una apariencia más juvenil.', 2600, 'img/levantamiento_senos', 3, 'Activo', NOW()),
('Reconstrucción mamaria', 'Procedimiento para reconstruir el seno después de una mastectomía u otra cirugía que afecta la apariencia del seno.', 3500, 'img/reconstruccion_mamaria', 3, 'Activo', NOW());
INSERT INTO servicios (nomServicio, descripcion, precio, img, id_categoria, estado, fechaRegistro)
VALUES
('Aumento de glúteos', 'Procedimiento para aumentar y mejorar la forma de los glúteos mediante la colocación de implantes o injertos de grasa.', 3000, 'img/aumento_gluteos', 4, 'Activo', NOW()),
('Levantamiento de glúteos', 'Procedimiento para levantar y mejorar la forma de los glúteos, proporcionando una apariencia más firme y juvenil.', 2500, 'img/levantamiento_gluteos', 4, 'Activo', NOW()),
('Contorno y modelado de glúteos', 'Procedimientos estéticos para mejorar la forma y el contorno de los glúteos, proporcionando resultados personalizados.', 2200, 'img/contorno_gluteos', 4, 'Activo', NOW());

INSERT INTO servicios (nomServicio, descripcion, precio, img, id_categoria, estado, fechaRegistro)
VALUES
('Tratamientos faciales', 'Variedad de procedimientos para mejorar la salud y apariencia de la piel facial, incluyendo limpiezas faciales y exfoliaciones.', 1200, 'img/tratamientos_faciales', 5, 'Activo', NOW()),
('Peelings químicos', 'Procedimiento que utiliza soluciones químicas para exfoliar la piel y mejorar su textura, eliminando células muertas y promoviendo la regeneración.', 800, 'img/peelings_quimicos', 5, 'Activo', NOW()),
('Microdermoabrasión', 'Procedimiento no invasivo que utiliza partículas finas para exfoliar y renovar la capa externa de la piel, mejorando la textura y la apariencia.', 1000, 'img/microdermoabrasion', 5, 'Activo', NOW()),
('Terapia con láser para la piel', 'Tratamiento con láser diseñado para abordar problemas específicos de la piel, como manchas, arrugas o cicatrices.', 1500, 'img/terapia_laser', 5, 'Activo', NOW()),
('Inyecciones de toxina botulínica (Botox) para reducir arrugas', 'Procedimiento para reducir temporalmente las arrugas faciales mediante la inyección de toxina botulínica.', 1800, 'img/botox', 5, 'Activo', NOW()),
('Rellenos dérmicos para rellenar líneas y arrugas', 'Inyecciones de materiales para rellenar y suavizar líneas y arrugas, restaurando volumen y proporcionando un aspecto más juvenil.', 1600, 'img/rellenos_dermicos', 5, 'Activo', NOW()),
('Tratamientos para el acné y las cicatrices', 'Procedimientos diseñados para abordar el acné y sus cicatrices, mejorando la apariencia general de la piel.', 1300, 'img/tratamientos_acne', 5, 'Activo', NOW());

/*============ FACTURAS ======================*/
-- Crear tabla temporal si no existe
CREATE TABLE IF NOT EXISTS TempServicio (
	codigo VARCHAR(6),
	descripcion VARCHAR(255),
	cantidad INT,
	precio DECIMAL(10, 2),
	idS INT,
	idusuario INT,
	PRIMARY KEY (idS)
);

DELIMITER //

CREATE PROCEDURE sp_DetalleFacturaServicio(
    IN sp_id_servicio INT,
    IN sp_id_usuario INT
)
BEGIN
    -- Variables
    DECLARE codigoTmp VARCHAR(6);
    DECLARE nomServicioTmp VARCHAR(255);
    DECLARE cantidadTmp INT;
    DECLARE precioTmp DECIMAL(10, 2);
    DECLARE idTmp INT;

    -- Obtener datos del servicio
    SELECT nomServicio, precio INTO nomServicioTmp, precioTmp
    FROM servicios
    WHERE id_servicio = sp_id_servicio;
	
    -- Verificar si ya existe el servicio en la tabla temporal
    SELECT idS INTO idTmp
    FROM TempServicio
    WHERE idS = sp_id_servicio;

    -- Si ya existe, actualizar cantidad
    IF idTmp IS NOT NULL THEN
        UPDATE TempServicio
        SET cantidad = cantidad + 1
        WHERE idS = sp_id_servicio;
    ELSE
        -- Si no existe, insertar el servicio
        INSERT INTO TempServicio (codigo, descripcion, cantidad, precio, idS, idusuario)
        SELECT 
            LPAD(UPPER(CONCAT(sp_id_servicio, SUBSTRING(nomServicioTmp, 1, 3))), 6, '0'),
            nomServicioTmp,
            1,
            precioTmp,
            sp_id_servicio,
            sp_id_usuario
        WHERE NOT EXISTS (
            SELECT 1
            FROM TempServicio
            WHERE idS = sp_id_servicio
        );
    END IF;

END //

DELIMITER ;


-- call  sp_DetalleFacturaServicio(5,1);

select * from  TempServicio;
-- drop table  TempServicio;
-- Listar servicios Tmp

DELIMITER //
CREATE PROCEDURE sp_ListarServiciosTmp()
BEGIN
	select idS, codigo, descripcion, cantidad, precio from  TempServicio;
END; //
DELIMITER ;

call sp_ListarServiciosTmp();
-- Eliminar Servicio Tmp

DELIMITER //
CREATE PROCEDURE sp_EliminarServicioTmp(
    IN sp_id_servicioTmp INT
)
BEGIN
    DELETE FROM TempServicio WHERE idS = sp_id_servicioTmp;
END; //
DELIMITER ;


-- Crear factura sp_GenerarFactura
DELIMITER //
CREATE PROCEDURE sp_GenerarFactura(
    IN sp_id_cliente INT,
    IN sp_id_usuario INT,
    IN sp_id_doctor INT,
    IN sp_descripcion VARCHAR(255)
)
BEGIN
    DECLARE idFact INT;

    -- Inicio de la transacción
    START TRANSACTION;

    INSERT INTO factura (id_cliente, id_usuario, id_doctor, descripcion)
    VALUES (sp_id_cliente, sp_id_usuario, sp_id_doctor, sp_descripcion);

    SET idFact = LAST_INSERT_ID();
    
    INSERT INTO detalle_factura (id_factura, id_servicio, cantidad, precio)
    SELECT idFact, idS, cantidad, precio
    FROM tempservicio
    WHERE idusuario = sp_id_usuario;

    -- Fin de la transacción
    COMMIT;
    SET SQL_SAFE_UPDATES = 0;
    DELETE FROM TempServicio;
    SET SQL_SAFE_UPDATES = 1;

END; //
DELIMITER ;

select * from tempservicio;
select * from factura;
select * from detalle_factura;

--  Detalle factura:
DELIMITER //

CREATE PROCEDURE sp_ListarFactura()
BEGIN
SELECT
    f.id_factura,
    CONCAT(p.nombre, ' ', p.apellido) AS nombreCli,
    ROUND(SUM(df.cantidad * df.precio) * 1.18, 2) AS total,
    f.fechaemision
FROM
    factura f
INNER JOIN clientes c ON f.id_cliente = c.id_cliente
INNER JOIN persona p ON c.id_persona = p.id_persona
INNER JOIN detalle_factura df ON df.id_factura = f.id_factura
GROUP BY
    f.id_factura, nombreCli, f.fechaemision;
END; //
DELIMITER ;

-- CALL sp_ListarFactura()
/*SP_CrearCuentaUsuario*/

DELIMITER //
CREATE PROCEDURE sp_CrearCuentaUsuario(
	IN p_nombre VARCHAR(100),
    IN p_apellido VARCHAR(100),
    IN p_fechaNacimiento DATE,
    IN p_genero ENUM('Mujer','Hombre','No definido'),
    IN p_dni VARCHAR(8),
    IN p_telefono VARCHAR(15),
    IN p_correo VARCHAR(320),
    IN u_nombreUsuario VARCHAR(200),
    IN u_contrasenia VARCHAR(200),
    IN u_estado ENUM('Activo','Inactivo'),
    IN r_id_rol INT
)
BEGIN
    DECLARE id_persona INT;
    DECLARE sp_idUsuario INT;
  
    INSERT INTO persona (nombre, apellido, fecha_nacimiento, genero, dni, telefono, correo)
    VALUES (p_nombre, p_apellido, p_fechaNacimiento, p_genero, p_dni, p_telefono, p_correo);
  
    SET id_persona = LAST_INSERT_ID();
  
    INSERT INTO usuarios (id_persona, nombreUsuario, contrasenia,estado)
    VALUES (id_persona, u_nombreUsuario, u_contrasenia, u_estado);
    
    -- Después de la inserción
    SET sp_idUsuario = LAST_INSERT_ID() ;
    INSERT INTO usuarios_roles (id_usuario, id_rol) VALUES (sp_idUsuario, r_id_rol);
END; //
DELIMITER ;

/*===========================Roles y permisos ==========================*/
DELIMITER //
CREATE PROCEDURE sp_ObtenerUsuarioRol()
BEGIN
	SELECT
		u.id_usuario,
		CONCAT(SUBSTRING_INDEX(p.nombre, ' ', 1), ' ', SUBSTRING_INDEX(p.apellido, ' ', 1)) AS nombre,
		u.nombreusuario,
		r.nombre_rol AS nombreRol,
		u.estado
	FROM
		usuarios u
	INNER JOIN
		persona p ON u.id_persona = p.id_persona
	INNER JOIN
		usuarios_roles ur ON u.id_usuario = ur.id_usuario
	INNER JOIN
		roles r ON ur.id_rol = r.id_rol;
END; //
DELIMITER ;

-- actualizar usuarios y datos;

DELIMITER //
CREATE PROCEDURE sp_ActualizarUsuario(
    IN p_nombre VARCHAR(100),
    IN p_apellido VARCHAR(100),
    IN p_fechaNacimiento DATE,
    IN p_genero ENUM('Mujer', 'Hombre', 'No definido'),
    IN p_dni VARCHAR(8),
    IN p_telefono VARCHAR(15),
    IN p_correo VARCHAR(320),
    IN u_estado ENUM('Activo', 'Inactivo'),
    IN r_idrol INT,
    IN u_id_usuario INT
)
BEGIN
    DECLARE idPersonaB INT;

    -- Obtener el id_persona asociado al id_usuario proporcionado
    SELECT id_persona INTO idPersonaB FROM usuarios WHERE id_usuario = u_id_usuario;

    -- Verificar si el id_persona existe
    IF idPersonaB IS NOT NULL THEN
        -- Actualizar los datos de la persona
        UPDATE persona
        SET nombre = p_nombre,
            apellido = p_apellido,
            fecha_nacimiento = p_fechaNacimiento,
            genero = p_genero,
            dni = p_dni,
            telefono = p_telefono,
            correo = p_correo
        WHERE id_persona = idPersonaB;

        -- Actualizar los datos del Usuario
        UPDATE usuarios
        SET estado = u_estado
        WHERE id_usuario = u_id_usuario;
        
        -- Actualizar el rol del usuario
        UPDATE usuarios_roles
        SET id_rol = r_idrol
        WHERE id_usuario = u_id_usuario;
        
    ELSE
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El id_persona no existe en la base de datos';
    END IF;
END; //
DELIMITER ;

/*SP citas*/
DELIMITER //

CREATE PROCEDURE sp_listarcitassinaceptar()
BEGIN
	SELECT * FROM cita WHERE estado = '';
END; //
DELIMITER ;

DELIMITER //

CREATE PROCEDURE sp_ObtenerDatosUsuario(IN usuario_id INT)
BEGIN
    SELECT
        u.id_usuario,
        p.nombre, 
        p.apellido,
        p.fecha_nacimiento,
        p.genero,
        p.dni,
        p.telefono,
        p.correo,
        u.nombreusuario,
        r.id_rol,
        r.nombre_rol
    FROM
        usuarios u
    INNER JOIN
        persona p ON u.id_persona = p.id_persona
    INNER JOIN
        usuarios_roles ur ON u.id_usuario = ur.id_usuario
    INNER JOIN
        roles r ON ur.id_rol = r.id_rol
    WHERE
        u.id_usuario = usuario_id;
END //

DELIMITER ;

