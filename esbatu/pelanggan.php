<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Form Pemesanan Es Batu Kristal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <!-- Tombol Kembali (pojok kanan atas, seperti di laporan.php) -->
  <div style="position: absolute; top: 20px; right: 20px;">
    <a href="dashboard.php" class="btn btn-outline-secondary btn-kembali" 
   style="width: 37px; height: 37px; display: flex; align-items: center; justify-content: center;" 
   data-bs-toggle="tooltip" data-bs-placement="left" title="Kembali ke Dashboard">
  <i class="bi bi-arrow-left"></i>
</a>

  </div>

  <div class="text-center">
    <img src="assets/logo.png" alt="Logo" width="50">
  </div>

  <h2 class="mb-4 text-center">Form Pemesanan Es Batu Kristal Cemara</h2>

  <?php if (isset($_GET['sukses']) && $_GET['sukses'] == 1): ?>
    <div class="alert alert-success text-center">Pesanan berhasil dikirim!</div>
  <?php endif; ?>

  <div class="row justify-content-center">
    <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
      <form action="proses/pelanggan_input.php" method="POST">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="no_hp" class="form-label">Nomor HP</label>
          <input type="text" name="no_hp" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="lokasi" class="form-label">Lokasi Anda (klik tombol untuk memilih)</label>
          <div class="input-group">
            <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Lokasi belum dipilih" readonly required>
            <button type="button" id="btn-lokasi" class="btn btn-dark">Pilih Lokasi</button>
          </div>
          <small class="form-text text-muted" id="status-lokasi">Klik tombol untuk mendeteksi lokasi Anda.</small>
        </div>

        <input type="hidden" name="link_lokasi" id="link_lokasi">

        <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah Pesanan (pcs, 1 pcs = 5kg)</label>
          <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Total Harga</label>
          <input type="text" id="harga-total" class="form-control" readonly>
        </div>

        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal Pesanan</label>
          <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
        </div>
      </form>

      <div class="text-center mt-3">
        <a href="login.php">Masuk Admin</a>
      </div>
    </div>
  </div>
</div>

<!-- AOS Animation JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<!-- Hitung Harga Otomatis -->
<script>
  document.getElementById('jumlah').addEventListener('input', function() {
    var jumlah = parseInt(this.value);
    var hargaPerPcs = 8000;
    if (!isNaN(jumlah)) {
      document.getElementById('harga-total').value = 'Rp ' + (jumlah * hargaPerPcs).toLocaleString();
    } else {
      document.getElementById('harga-total').value = '';
    }
  });
</script>

<!-- Deteksi Lokasi -->
<script>
  document.getElementById('btn-lokasi').addEventListener('click', function () {
    const status = document.getElementById('status-lokasi');
    status.textContent = "Mendeteksi lokasi... Mohon tunggu.";

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function (position) {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;
          const link = `https://www.google.com/maps?q=${lat},${lng}`;
          document.getElementById('lokasi').value = `${lat}, ${lng}`;
          document.getElementById('link_lokasi').value = link;
          status.innerHTML = `<span class="text-success">Lokasi berhasil dideteksi! <a href="${link}" target="_blank">Lihat di Maps</a></span>`;
        },
        function (error) {
          status.innerHTML = "<span class='text-danger'>Gagal mendeteksi lokasi. Pastikan izin lokasi aktif.</span>";
        }
      );
    } else {
      status.innerHTML = "<span class='text-danger'>Browser tidak mendukung fitur lokasi.</span>";
    }
  });
</script>

</body>
</html>
