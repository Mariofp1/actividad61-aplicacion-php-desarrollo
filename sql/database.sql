CREATE SCHEMA IF NOT EXISTS actividad61MaFe;

ALTER USER 'root'@'localhost' IDENTIFIED BY 'MarioFernandez@2005';

CREATE USER 'usuarioMaFe'@'localhost' IDENTIFIED BY 'MarioFernandez@20055';

GRANT ALL PRIVILEGES ON actividad61MaFe.* TO 'usuarioMaFe'@'localhost';

USE actividad61MaFe;

CREATE TABLE articulos (
  articulo_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  apellido_autor VARCHAR(100) NOT NULL,
  nombre_autor VARCHAR(100) NOT NULL,
  deporte INT UNSIGNED NOT NULL,
  fecha_publicacion DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Ortuño', 'Alfredo', 'fútbol', '04-06-2024');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Magallanes', 'Cayetano', 'waterpolo', '16-08-2024');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Vargas', 'Mario', 'baloncesto', '30-10-2024');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Pérez', 'Maria', 'atletismo', '11-12-2024');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Celis', 'Nuria', 'rugby', '10-01-2025');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Ortuño', 'Alfredo', 'fútbol', '21-02-2025');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Vargas', 'Mario', 'baloncesto', '01-03-2025');