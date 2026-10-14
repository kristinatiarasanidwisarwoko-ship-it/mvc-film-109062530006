CREATE DATABASE IF NOT EXISTS db_film
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE db_film;

CREATE TABLE IF NOT EXISTS film (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    tahun_rilis INT NOT NULL,
    sutradara VARCHAR(100) NOT NULL,
    durasi INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO film (judul, genre, tahun_rilis, sutradara, durasi)
VALUES
('Laskar Pelangi', 'Drama', 2008, 'Riri Riza', 124),
('KKN di Desa Penari', 'Horor', 2022, 'Awi Suryadi', 130),
('Agak Laen', 'Komedi', 2024, 'Muhadkly Acho', 119);