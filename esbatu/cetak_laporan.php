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
  <title>Cetak Laporan - Es Batu Kristal Cemara</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 30px;
    }
    h2, h4 {
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #e0f7e9;
    }
    .total {
      font-weight: bold;
      background-color: #f0f0f0;
    }
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="no-print" style="text-align:right; margin-bottom:10px;">
    <button onclick="window.print()">🖨 Cetak</button>
  </div>

  <h2>Laporan Pendapatan</h2>
  <h4>Bulan <?= $bulan_nama[$bulan_terpilih] ?> <?= $tahun ?></h4>

  <table>
    <thead>
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
      <tr class="total">
        <td colspan="4">Total</td>
        <td colspan="2">Rp <?= number_format($total, 0, ',', '.') ?></td>
      </tr>
    </tbody>
  </table>
</body>
</html>
