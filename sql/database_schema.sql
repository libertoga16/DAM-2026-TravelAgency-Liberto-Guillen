


CREATE DATABASE IF NOT EXISTS NexAir CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE NexAir;


CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS oferta (
    id_viaje INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    plazas INT NOT NULL DEFAULT 50,
    tipo_viaje VARCHAR(50) NOT NULL,
    imagenes VARCHAR(255),
    destacado TINYINT(1) DEFAULT 0,
    itinerario TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO oferta (titulo, descripcion, fecha_inicio, fecha_fin, precio, plazas, tipo_viaje, imagenes, destacado)
VALUES
('Escapada a París', 'Visita la ciudad de las luces durante 5 días.', '2026-06-10', '2026-06-15', 899.00, 40, 'Cultural', '', 1),
('Aventura en los Alpes', 'Descenso en kayak y senderismo en montañas.', '2026-07-20', '2026-07-27', 1200.00, 20, 'Aventura', '', 0),
('Relax en la Costa Azul', 'Hotel 5 estrellas con todo incluido.', '2026-08-05', '2026-08-12', 1500.00, 30, 'Relax', '', 0);







