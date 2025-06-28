<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$link_lokasi = $_POST['link_lokasi'];
$harga = $jumlah * 8000;

// Query insert ke database
$query = "INSERT INTO pemesanan (nama_pelanggan, no_hp, jumlah_pesanan, harga, tanggal, link_lokasi)
          VALUES ('$nama', '$no_hp', '$jumlah', '$harga', '$tanggal', '$link_lokasi')";

// Jika berhasil insert, redirect ke pelanggan.php dengan parameter sukses
if (mysqli_query($conn, $query)) {
    header("Location: ../pelanggan.php?sukses=1");
    exit;
} else {
    // Kalau gagal, bisa redirect dengan parameter gagal (opsional)
    header("Location: ../pelanggan.php?sukses=0");
    exit;
}
?>
