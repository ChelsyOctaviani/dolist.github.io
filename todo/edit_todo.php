<?php
// Menghubungkan ke file konfigurasi database
include("config.php");

// Mengambil data tugas berdasarkan ID yang dikirim melalui URL
$hasil = mysqli_query($koneksi, "SELECT * FROM todo WHERE id= '$_GET[id]'");

// Mengambil hasil query dalam bentuk array asosiatif
$row = mysqli_fetch_array($hasil);
?>

<div class="d-flex justify-content-center">
    <div class="card col-md-6">
        <div class="card-header">
            Edit Tugas
        </div>

        <!-- Menampilkan pesan error jika gagal mengedit karena jangka waktu melebihi deadline -->
        <?php if(isset($_GET['pesan_edit']) && $_GET['pesan_edit'] == 'gagal_deadline') : ?>
            <div class="alert alert-danger text-center">
                Gagal mengedit! Jangka waktu tidak boleh melebihi deadline sebelumnya.
            </div>
        <?php endif; ?>

        <!-- Form untuk mengedit tugas -->
        <form method="POST" action="todo/aksi_edit_todo.php">
            <div class="card-body">
                <!-- Input untuk mengedit nama tugas -->
                <div class="mb-3">
                    <label class="form-label">Nama tugas</label>
                    <input type="text" class="form-control" placeholder="Tugas" name="tugas" value="<?= $row['tugas'] ?>">
                    <!-- Input hidden untuk menyimpan ID tugas agar tetap dikenali di proses edit -->
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                </div>

                <!-- Input untuk mengedit jangka waktu tugas -->
                <div class="mb-3">
                    <label class="form-label">Jangka Waktu</label>
                    <input type="date" class="form-control" name="jangka_waktu" value="<?= $row['jangka_waktu'] ?>">
                </div>

                <!-- Dropdown untuk memilih status tugas -->
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option>Pilih</option>
                        <option <?= $row['status'] == 'Belum selesai' ? 'selected' : '' ?>>Belum selesai</option>
                        <option <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                    </select>
                </div>

                <!-- Dropdown untuk memilih prioritas tugas -->
                <div class="mb-3">
                    <label class="form-label">Prioritas</label>
                    <select class="form-control" name="prioritas">
                        <option value="Low" <?= $row['prioritas'] == 'Low' ? 'selected' : '' ?>>Low</option>
                        <option value="Medium" <?= $row['prioritas'] == 'Medium' ? 'selected' : '' ?>>Medium</option>
                        <option value="High" <?= $row['prioritas'] == 'High' ? 'selected' : '' ?>>High</option>
                    </select>
                </div>
            </div>

            <!-- Tombol aksi untuk kembali dan menyimpan perubahan -->
            <div class="card-footer text-body-secondary">
                <a href="index.php?halaman=todo">
                    <button type="button" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </button>
                </a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
