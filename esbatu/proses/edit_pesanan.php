<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$harga = $jumlah * 8000;

$query = "UPDATE pemesanan SET 
          nama_pelanggan='$nama', no_hp='$no_hp', jumlah_pesanan='$jumlah',
          harga='$harga', tanggal='$tanggal' 
          WHERE id=$id";

mysqli_query($conn, $query);

header("Location: ../pemesanan.php");
