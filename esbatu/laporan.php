<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

$bulan_nama = [
  1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
  'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

$bulan_terpilih = isset($_GET['bulan']) ? (int)$_GET['bulan'] : date('n');
$tahun = date('Y');

$query = "SELECT * FROM pesanan_selesai WHERE MONTH(tanggal) = $bulan_terpilih AND YEAR(tanggal) = $tahun ORDER BY tanggal DESC";
$result = mysqli_query($conn, $query);
$total = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan - Es Batu Kristal Cemara</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f5f5;
      font-family: 'Segoe UI', sans-serif;
      padding-top: 40px;
    }
    .container {
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h3 {
      font-weight: bold;
    }
    .btn-kembali {
      position: absolute;
      top: 20px;
      right: 20px;
    }
  </style>
</head>
<body>
<a href="dashboard.php" class="btn btn-outline-secondary btn-kembali"  
style="width: 37px; height: 37px; display: flex; align-items: center; justify-content: center;" 
   data-bs-toggle="tooltip" data-bs-placement="left" title="Kembali ke Dashboard">
  <i class="bi bi-arrow-left"></i>
  &larr;
</a>

<div class="container">
  <h3 class="mb-4">Laporan Pendapatan Bulanan</h3>

  <form method="get" class="row g-3 mb-4">
    <div class="col-md-6">
      <label for="bulan" class="form-label">Pilih Bulan:</label>
      <select name="bulan" id="bulan" class="form-select">
        <?php foreach ($bulan_nama as $num => $nama): ?>
          <option value="<?= $num ?>" <?= ($bulan_terpilih == $num) ? 'selected' : '' ?>><?= $nama ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-md-6 d-flex align-items-end">
      <button type="submit" class="btn btn-primary">Tampilkan</button>
      <a href="cetak_laporan.php?bulan=<?= $bulan_terpilih ?>" target="_blank" class="btn btn-success ms-2">Cetak</a>
    </div>
  </form>

  <table class="table table-bordered table-striped">
    <thead class="table-success">
      <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>No HP</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; while ($row = mysqli_fetch_assoc($result)):
        $total += $row['harga']; ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
          <td><?= $row['no_hp'] ?></td>
          <td><?= $row['jumlah_pesanan'] ?> pcs</td>
          <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
          <td><?= $row['tanggal'] ?></td>
        </tr>
      <?php endwhile; ?>
      <tr class="fw-bold table-secondary">
        <td colspan="4">Total</td>
        <td colspan="2">Rp <?= number_format($total, 0, ',', '.') ?></td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>
