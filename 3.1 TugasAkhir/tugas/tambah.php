<?php
require_once __DIR__ . '/../includes/cek_login.php';
$koneksi = muat_koneksi();
$pengguna_login = user_login();

$judul = '';
$deskripsi = '';
$mata_kuliah = '';
$prioritas = 'Sedang';
$deadline = '';
$pesan_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $mata_kuliah = trim($_POST['mata_kuliah'] ?? '');
    $prioritas = $_POST['prioritas'] ?? 'Sedang';
    $deadline = $_POST['deadline'] ?? '';

    if ($judul === '') {
        $pesan_error = 'Judul tugas wajib diisi.';
    } else {
        $judul_bersih = bersihkan_input($judul, $koneksi);
        $deskripsi_bersih = bersihkan_input($deskripsi, $koneksi);
        $mata_kuliah_bersih = bersihkan_input($mata_kuliah, $koneksi);
        $prioritas_bersih = bersihkan_input($prioritas, $koneksi);
        $deadline_bersih = bersihkan_input($deadline, $koneksi);
        $id_pengguna = (int) $pengguna_login['id'];

        $query = "INSERT INTO tugas (id_pengguna, judul, deskripsi, mata_kuliah, prioritas, deadline) 
                  VALUES ($id_pengguna, '$judul_bersih', '$deskripsi_bersih', '$mata_kuliah_bersih', '$prioritas_bersih', " .
                  ($deadline_bersih !== '' ? "'$deadline_bersih'" : "NULL") . ")";

        if (mysqli_query($koneksi, $query)) {
            pesan_flash('sukses', 'Tugas berhasil ditambahkan.');
            alihkan('../dashboard.php');
        } else {
            $pesan_error = 'Tugas gagal ditambahkan.';
        }
    }
}

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card card-tugas">
                <div class="card-body p-4">
                    <h1 class="h4 mb-3">Tambah Tugas</h1>

                    <?php if ($pesan_error): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($pesan_error) ?></div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Judul Tugas</label>
                            <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($judul) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4"><?= htmlspecialchars($deskripsi) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" class="form-control" value="<?= htmlspecialchars($mata_kuliah) ?>">
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Prioritas</label>
                                <select name="prioritas" class="form-select">
                                    <option value="Rendah" <?= $prioritas === 'Rendah' ? 'selected' : '' ?>>Rendah</option>
                                    <option value="Sedang" <?= $prioritas === 'Sedang' ? 'selected' : '' ?>>Sedang</option>
                                    <option value="Tinggi" <?= $prioritas === 'Tinggi' ? 'selected' : '' ?>>Tinggi</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Deadline</label>
                                <input type="date" name="deadline" class="form-control" value="<?= htmlspecialchars($deadline) ?>">
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="../dashboard.php" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
