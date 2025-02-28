<?php
// Menghubungkan ke file konfigurasi database
include "../config.php";

// Menyusun query untuk menghapus data dari tabel 'todo' berdasarkan ID yang diterima melalui URL
$sql = "DELETE FROM todo WHERE id='$_GET[id]'";

// Menjalankan query delete
mysqli_query($koneksi, $sql);

// Mengecek apakah ada baris yang terpengaruh setelah query dijalankan
$r = mysqli_affected_rows($koneksi);

if ($r > 0) {
    // Jika penghapusan berhasil, arahkan kembali ke halaman utama dengan pesan sukses
    header("Location: http://localhost/dolist/index.php?halaman=todo&pesan_hapus=berhasil");
} else {
    // Jika penghapusan gagal, arahkan kembali ke halaman utama dengan pesan gagal
    header("Location: http://localhost/dolist/index.php?halaman=todo&pesan_hapus=gagal");
}

// Menghentikan eksekusi script setelah melakukan redirect
exit();
?>
