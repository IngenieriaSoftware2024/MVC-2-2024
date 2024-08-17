CREATE TABLE productos(
    producto_id INT AUTO_INCREMENT PRIMARY KEY,
    producto_nombre VARCHAR(200),
    producto_precio DECIMAL(10,2),
    producto_situacion SMALLINT DEFAULT 1
);

CREATE TABLE usuario(
    usu_id INT AUTO_INCREMENT PRIMARY KEY,
    usu_nombre VARCHAR(50),
    usu_catalogo INTEGER,
    usu_password VARCHAR(50),
    usu_situacion SMALLINT DEFAULT 1
);