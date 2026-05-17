CREATE DATABASE IF NOT EXISTS catatan_tugas_kuliah;
USE catatan_tugas_kuliah;

CREATE TABLE IF NOT EXISTS pengguna (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  kata_sandi VARCHAR(255) NOT NULL,
  dibuat_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS tugas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_pengguna INT NOT NULL,
  judul VARCHAR(150) NOT NULL,
  deskripsi TEXT,
  mata_kuliah VARCHAR(100),
  prioritas ENUM('Rendah', 'Sedang', 'Tinggi') DEFAULT 'Sedang',
  deadline DATE,
  status ENUM('Belum Selesai', 'Selesai') DEFAULT 'Belum Selesai',
  dibuat_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  diperbarui_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_tugas_pengguna FOREIGN KEY (id_pengguna) REFERENCES pengguna(id) ON DELETE CASCADE
);
