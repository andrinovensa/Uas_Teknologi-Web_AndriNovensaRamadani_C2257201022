<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pemesanan WHERE id=$id"));
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Pesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h3>Edit Data Pemesanan</h3>
  <form method="post" action="proses/edit_pesanan.php">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= $data['nama_pelanggan'] ?>" required>
    </div>
    <div class="mb-3">
      <label>No HP</label>
      <input type="text" name="no_hp" class="form-control" value="<?= $data['no_hp'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Jumlah</label>
      <input type="number" name="jumlah" class="form-control" value="<?= $data['jumlah_pesanan'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Tanggal</label>
      <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
    <a href="pemesanan.php" class="btn btn-secondary">Batal</a>
  </form>
</div>
</body>
</html>
