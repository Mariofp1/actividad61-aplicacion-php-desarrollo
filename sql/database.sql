CREATE TABLE articulos (
  articulo_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  apellido_autor VARCHAR(100) NOT NULL,
  nombre_autor VARCHAR(100) NOT NULL,
  deporte VARCHAR(100) NOT NULL,
  fecha_publicacion DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Ortuño', 'Alfredo', 'fútbol', '2024-06-04');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Magallanes', 'Cayetano', 'waterpolo', '2024-08-16');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Vargas', 'Mario', 'baloncesto', '2024-10-30');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Pérez', 'Maria', 'atletismo', '2024-12-11');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Celis', 'Nuria', 'rugby', '2025-01-10');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Ortuño', 'Alfredo', 'fútbol', '2025-02-21');
INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) VALUES('Vargas', 'Mario', 'baloncesto', '2025-03-01');