<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
  $data = mysqli_fetch_array($query);

  if ($data) {
    $_SESSION['admin'] = $data['username'];
    header("Location: pemesanan.php");
  } else {
    echo "<script>alert('Login gagal! Username atau Password salah.');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin - Es Batu Kristal Cemara</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background: linear-gradient(to bottom right, #a2d4f5, #e0f7ff);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
      overflow: hidden;
      position: relative;
    }

    .background-logo {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0.08;
      width: 500px;
      z-index: 0;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 15px;
      backdrop-filter: blur(15px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
      padding: 40px;
      width: 100%;
      max-width: 400px;
      position: relative;
      z-index: 1;
    }

    .logo-img {
      width: 60px;
      margin-bottom: 10px;
    }

    .form-control {
      background: rgba(255, 255, 255, 0.7);
      border: none;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }
  </style>
</head>
<body>

  <!-- Logo Background Transparan -->
  <img src="assets/logo.png" alt="Logo Background" class="background-logo">

  <div class="login-card text-center">
    <img src="assets/logo.png" alt="Logo Es Batu" class="logo-img">
    <h4 class="mb-4 text-primary fw-bold">Login Admin</h4>
    <form method="POST" action="">
      <div class="mb-3 text-start">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required autofocus>
      </div>
      <div class="mb-3 text-start">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="d-grid mt-3">
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
    </form>
    <div class="mt-3">
      <a href="dashboard.php" class="text-decoration-none text-muted">← Kembali ke Dashboard</a>
    </div>
  </div>

</body>
</html>
