<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Utama</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
      <div class="text-center">
        <img src="assets/logo.png" alt="Logo" class="logo">
        <h5 class="text-white">Dashboard</h5>
      </div>
      <a href="dashboard.php">🏠 Beranda</a>
      <a href="login.php">🔐 Login Admin</a>
      <a href="pelanggan.php">🛒 Pemesanan Pelanggan</a>
      <a href="laporan.php">📄 Cetak Laporan</a>
    </nav>

    <!-- Main content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
      <div class="description-card">
        <h2>Sistem Informasi Pemesanan Es Batu Kristal Cemara</h2>
        <p>
          Selamat datang di halaman utama sistem pemesanan Es Batu Kristal Cemara! Kami menyediakan solusi praktis dan efisien bagi pelanggan untuk melakukan pemesanan es batu tanpa harus datang langsung ke lokasi. Sistem ini dirancang untuk mempercepat proses pemesanan, meningkatkan kenyamanan pelanggan, dan membantu tim admin dalam mengelola data pesanan serta laporan pendapatan harian secara terorganisir.
        </p>
        <p>
          Dengan tampilan antarmuka yang ramah pengguna, pelanggan dapat dengan mudah mengisi form pemesanan, memilih jumlah pesanan, serta mendapatkan konfirmasi secara cepat. Bagi admin, tersedia fitur login yang memungkinkan pengelolaan data pelanggan, riwayat pemesanan, dan pencetakan laporan hanya dalam beberapa klik.
        </p>
        <div class="contact-info">
          <h5>📍 Alamat:</h5>
          <p>JL. Menteng XXV Sebelah Blok F</p>

          <h5>📞 Kontak Admin:</h5>
          <p>0822-5090-1730</p>
        </div>
      </div>
    </main>
  </div>
</div>
<!-- AOS Animation JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
