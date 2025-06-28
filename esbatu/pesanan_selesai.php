<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';
$selesai = mysqli_query($conn, "SELECT * FROM pesanan_selesai ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesanan Selesai - Es Batu Kristal Cemara</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background: linear-gradient(to bottom right, #d0f0ff, #ffffff);
      font-family: 'Segoe UI', sans-serif;
      padding-top: 40px;
    }
    .card-bg {
      background: rgba(255, 255, 255, 0.85);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0, 123, 255, 0.1);
    }
    h3 {
      font-weight: bold;
      color: #28a745;
    }
    .table th {
      background-color: #28a745;
      color: white;
      text-align: center;
    }
    .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card-bg">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3>Pesanan Telah Selesai Diantar</h3>
      <a href="dashboard.php" class="btn btn-secondary">← Kembali</a>
    </div>

    <?php if (isset($_GET['hapus']) && $_GET['hapus'] == 'berhasil'): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data pesanan selesai berhasil dihapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead>
          <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 20%;">Nama</th>
            <th style="width: 15%;">No HP</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th style="width: 10%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while($row = mysqli_fetch_assoc($selesai)): ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
            <td><?= htmlspecialchars($row['no_hp']) ?></td>
            <td class="text-center"><?= $row['jumlah_pesanan'] ?> pcs</td>
            <td>Rp <?= number_format($row['harga']) ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td class="text-center">
              <?php if (!empty($row['link_lokasi'])): ?>
                <a href="<?= $row['link_lokasi'] ?>" target="_blank" class="text-success me-2" data-bs-toggle="tooltip" title="Lokasi">
                  <i class="bi bi-geo-alt-fill fs-5"></i>
                </a>
              <?php else: ?>
                <span class="text-muted me-2">-</span>
              <?php endif; ?>
              <a href="proses/hapus_selesai.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')" title="Hapus">
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
  const tooltipList = [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el));
</script>
</body>
</html>
