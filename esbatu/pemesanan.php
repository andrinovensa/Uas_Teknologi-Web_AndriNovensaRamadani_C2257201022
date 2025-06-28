<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

$pemesanan_aktif = mysqli_query($conn, "SELECT * FROM pemesanan ORDER BY tanggal DESC");
$pemesanan_selesai = mysqli_query($conn, "SELECT * FROM pesanan_selesai ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pemesanan - Es Batu Kristal Cemara</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom right, #a2d4f5, #e0f7ff);
      font-family: 'Segoe UI', sans-serif;
      padding-top: 40px;
    }
    .card-bg {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0, 123, 255, 0.1);
    }
    h3 {
      font-weight: bold;
      color: #007bff;
    }
    .table th {
      background-color: #007bff;
      color: white;
    }
    .btn-outline-success {
      border-color: #28a745;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card-bg">
    <div>
 <div class="text-center">
    <img src="assets/logo.png" alt="Logo" width="50">
  </div>
    <!-- Notifikasi -->
    <?php if (isset($_GET['hapus']) && $_GET['hapus'] == 'berhasil'): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data pesanan berhasil dihapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if (isset($_GET['selesai']) && $_GET['selesai'] == 'berhasil'): ?>
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        Pesanan ditandai telah selesai diantar.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3>Data Pemesanan Aktif</h3>
      <a href="dashboard.php" class="btn btn-outline-primary">← Kembali</a>
    </div>

    <!-- Tabel Aktif -->
    <div class="table-responsive mb-5">
      <table class="table table-bordered table-hover">
        <thead class="text-center">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while($row = mysqli_fetch_assoc($pemesanan_aktif)): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
            <td><?= htmlspecialchars($row['no_hp']) ?></td>
            <td><?= $row['jumlah_pesanan'] ?> pcs</td>
            <td>Rp <?= number_format($row['harga']) ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td class="text-center">
              <?php if (!empty($row['link_lokasi'])): ?>
                <a href="<?= $row['link_lokasi'] ?>" target="_blank" class="btn btn-sm btn-outline-success">Lihat Lokasi</a>
              <?php else: ?>
                <span class="text-muted">Belum tersedia</span>
              <?php endif; ?>
            </td>
            <td class="text-center">
              <a href="edit_pesanan.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="proses/hapus_pesanan.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
              <a href="proses/selesai_pesanan.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Tandai pesanan ini sudah selesai diantar?')">Selesai</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>

    <!-- Tabel Selesai -->
    <h3 class="mb-3">Pesanan Telah Selesai Diantar</h3>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="text-center">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while($row = mysqli_fetch_assoc($pemesanan_selesai)): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
            <td><?= htmlspecialchars($row['no_hp']) ?></td>
            <td><?= $row['jumlah_pesanan'] ?> pcs</td>
            <td>Rp <?= number_format($row['harga']) ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td class="text-center">
              <?php if (!empty($row['link_lokasi'])): ?>
                <a href="<?= $row['link_lokasi'] ?>" target="_blank" class="text-success" data-bs-toggle="tooltip" title="Lokasi">
                  <i class="bi bi-geo-alt-fill fs-5"></i>
                </a>
              <?php else: ?>
                <span class="text-muted">-</span>
              <?php endif; ?>
            </td>
            <td class="text-center">
              <a href="proses/hapus_selesai.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data ini?')" title="Hapus">
                <i class="bi bi-trash text-danger fs-5"></i>
              </a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  [...tooltipTriggerList].forEach(el => new bootstrap.Tooltip(el));
</script>

</body>
</html>
