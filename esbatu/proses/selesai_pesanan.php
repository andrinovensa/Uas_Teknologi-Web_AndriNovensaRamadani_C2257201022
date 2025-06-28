<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil data pesanan dari tabel pemesanan
    $query = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id = $id");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        // Simpan ke tabel pesanan_selesai
        $nama = mysqli_real_escape_string($conn, $data['nama_pelanggan']);
        $hp = mysqli_real_escape_string($conn, $data['no_hp']);
        $jumlah = intval($data['jumlah_pesanan']);
        $harga = intval($data['harga']);
        $tanggal = $data['tanggal'];
        $lokasi = mysqli_real_escape_string($conn, $data['link_lokasi']);

        mysqli_query($conn, "INSERT INTO pesanan_selesai (nama_pelanggan, no_hp, jumlah_pesanan, harga, tanggal, link_lokasi) 
            VALUES ('$nama', '$hp', $jumlah, $harga, '$tanggal', '$lokasi')");

        // Hapus dari tabel pemesanan
        mysqli_query($conn, "DELETE FROM pemesanan WHERE id = $id");

        header("Location: ../pemesanan.php?selesai=berhasil");
        exit;
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak valid.";
}
?>
