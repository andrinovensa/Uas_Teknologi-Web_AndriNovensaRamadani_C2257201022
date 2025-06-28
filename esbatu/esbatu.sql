-- Buat database
CREATE DATABASE IF NOT EXISTS esbatu;
USE esbatu;

-- Tabel admin (login admin)
CREATE TABLE IF NOT EXISTS admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Tambahkan admin default (username: admin, password: admin)
INSERT INTO admin (username, password) VALUES
('admin', 'admin');

-- Tabel untuk menyimpan data pemesanan dari pelanggan
CREATE TABLE IF NOT EXISTS pemesanan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_pelanggan VARCHAR(100) NOT NULL,
  no_hp VARCHAR(20) NOT NULL,
  jumlah_pesanan INT NOT NULL,
  harga INT NOT NULL,
  tanggal DATE NOT NULL,
  link_lokasi TEXT
);

-- Tabel untuk menyimpan pesanan yang sudah selesai diantar
CREATE TABLE IF NOT EXISTS pesanan_selesai (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_pelanggan VARCHAR(100) NOT NULL,
  no_hp VARCHAR(20) NOT NULL,
  jumlah_pesanan INT NOT NULL,
  harga INT NOT NULL,
  tanggal DATE NOT NULL,
  link_lokasi TEXT
);
