<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM pesanan_selesai WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: ../pemesanan.php?hapus=berhasil");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
