<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Pesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<div class="container mt-5">
  <h3>Tambah Pemesanan</h3>
  <form method="post" action="proses/tambah_pesanan.php">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>No HP</label>
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

        <!-- Hidden field untuk link Google Maps -->
        <input type="hidden" name="link_lokasi" id="link_lokasi">

    <div class="mb-3">
      <label>Jumlah (pcs)</label>
      <input type="number" name="jumlah" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Tanggal</label>
      <input type="date" name="tanggal" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="pemesanan.php" class="btn btn-secondary">Batal</a>
  </form>
</div>
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
