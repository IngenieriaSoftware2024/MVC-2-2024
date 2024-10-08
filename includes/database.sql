CREATE TABLE productos(
    producto_id INT AUTO_INCREMENT PRIMARY KEY,
    producto_nombre VARCHAR(200),
    producto_precio DECIMAL(10, 2),
    producto_situacion SMALLINT DEFAULT 1
);

CREATE TABLE usuario(
    usu_id INT AUTO_INCREMENT PRIMARY KEY,
    usu_nombre VARCHAR(50),
    usu_catalogo INTEGER,
    usu_password VARCHAR(150),
    usu_situacion SMALLINT DEFAULT 1
);

CREATE TABLE aplicacion(
    app_id INT AUTO_INCREMENT PRIMARY KEY,
    app_nombre VARCHAR(75),
    app_situacion SMALLINT DEFAULT 1
);

CREATE TABLE rol(
    rol_id INT AUTO_INCREMENT PRIMARY KEY,
    rol_nombre VARCHAR(75),
    rol_nombre_ct VARCHAR(25),
    rol_app INTEGER,
    rol_situacion SMALLINT DEFAULT 1,
    FOREIGN KEY (rol_app) REFERENCES aplicacion(app_id)
);

CREATE TABLE permiso (
    permiso_id INT AUTO_INCREMENT PRIMARY KEY,
    permiso_usuario INTEGER,
    permiso_rol INTEGER,
    permiso_situacion SMALLINT DEFAULT 1,
    FOREIGN KEY (permiso_usuario) REFERENCES usuario (usu_id),
    FOREIGN KEY (permiso_rol) REFERENCES rol (rol_id)
)