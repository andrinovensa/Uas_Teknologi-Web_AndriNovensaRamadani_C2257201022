<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$link_lokasi = $_POST['link_lokasi'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$harga = $jumlah * 8000;

$query = "INSERT INTO pemesanan (nama_pelanggan, no_hp, link_lokasi, jumlah_pesanan, harga, tanggal)
          VALUES ('$nama', '$no_hp', '$link_lokasi', '$jumlah', '$harga', '$tanggal')";

if (mysqli_query($conn, $query)) {
    header("Location: ../pemesanan.php?sukses=1");
    exit;
} else {
    header("Location: ../pemesanan.php?sukses=0");
    exit;
}
?>
