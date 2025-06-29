 Sistem Informasi Pemesanan Es Batu Kristal Cemara

Sistem ini adalah aplikasi berbasis web yang digunakan untuk mengelola proses pemesanan, pengantaran, dan pelaporan penjualan es batu kristal pada usaha Es Batu Kristal Cemara.

 🔧 Fitur Utama
 👤 Halaman Pelanggan
- Formulir pemesanan es batu
- Input nama, nomor HP, lokasi pengantaran, dan jumlah pesanan
- Harga otomatis dihitung (Rp8.000 per 5kg)

 🔐 Halaman Admin
- Login admin
- Lihat semua data pemesanan aktif dan selesai
- Fitur tandai "Pesanan Telah Selesai Diantar"
- Fitur hapus data pesanan
- Notifikasi berhasil hapus dan update

 🧾 Laporan Pemesanan
- Menampilkan data berdasarkan status
- Tampilan tabel interaktif
- Fitur cetak laporan (jika ditambahkan)

 💻 Teknologi yang Digunakan
- Frontend: HTML5, CSS3, Bootstrap 5, JavaScript (minimal)
- Backend: PHP
- Database: Adminer/MySQL

 🗂️ Struktur Folder

```
esbatu/
├── index.php
├── login.php
├── dashboard.php
├── pemesanan.php
├── koneksi.php
├── proses/
│   ├── login_proses.php
│   ├── pelanggan_input.php
│   ├── hapus_pesanan.php
│   └── selesai_pesanan.php
└── assets/
```

 ⚙️ Cara Menjalankan
1. Clone atau download project ini ke `htdocs` (XAMPP) atau direktori server lokal lainnya.
2. Buat database MySQL:
   - Nama database: `esbatu`
   - Import struktur tabel dari file `.sql` atau buat manual:
     ```sql
     CREATE TABLE pemesanan (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nama_pelanggan VARCHAR(100),
       no_hp VARCHAR(20),
       jumlah_pesanan INT,
       harga INT,
       tanggal DATE,
       link_lokasi TEXT,
       status ENUM('aktif', 'selesai') DEFAULT 'aktif'
     );
     
     CREATE TABLE admin (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50),
       password VARCHAR(255)
     );
     
     -- Contoh user admin
     INSERT INTO admin (username, password) VALUES ('admin', 'admin');
     ```
3. Jalankan di browser:  
   `http://localhost/esbatu/`

Tampilan Web
![dasboard](https://github.com/user-attachments/assets/672ec931-5525-4002-a6db-d71d62bf8ccf)
![formpemesananpelanggan](https://github.com/user-attachments/assets/a89a738d-a811-4df3-a657-f89a59ad635c)
![loginadmin](https://github.com/user-attachments/assets/bd9d6745-433f-40e5-80db-f396593cb0bc)
![datapemesananpelanggan](https://github.com/user-attachments/assets/419d6dc1-c3b1-41a0-8569-66fff15aaab1)
![laporan](https://github.com/user-attachments/assets/26599e81-b35b-4f6d-b0d8-ee1af4eed8ba)
![cetaklaporan](https://github.com/user-attachments/assets/fa3f5784-a440-4052-9b71-a4de05fa4b5d)

 🙌 Kontributor
Andri Novensa Ramadani  
Proyek ini dibuat sebagai tugas besar untuk mata kuliah terkait Sistem Informasi/Inovasi Teknologi.  
Didampingi dengan semangat dan bantuan dari "Hero" 🤖


> Powered with 💙 for Efisiensi, Kecepatan, dan Profesionalisme
