<?php
include 'koneksi.php'; // pastikan koneksi.php sudah ada dan benar

// Ambil data dari form
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$jumlah_pesanan = $_POST['jumlah_pesanan'];
$harga = $_POST['harga'];
$tanggal = $_POST['tanggal'];

// Simpan ke database
$query = "INSERT INTO pemesanan (nama_pelanggan, no_hp, jumlah_pesanan, harga, tanggal)
          VALUES ('$nama', '$no_hp', '$jumlah_pesanan', '$harga', '$tanggal')";

if (mysqli_query($conn, $query)) {
    echo "<script src="assets/js/proses_pemesanan.js"></script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
