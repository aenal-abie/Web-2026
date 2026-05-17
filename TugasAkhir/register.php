<?php
require_once __DIR__ . '/includes/fungsi.php';
mulai_sesi();

$koneksi = muat_koneksi();
$nama = '';
$email = '';
$pesan_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $kata_sandi = $_POST['kata_sandi'] ?? '';
    $konfirmasi_kata_sandi = $_POST['konfirmasi_kata_sandi'] ?? '';

    if ($nama === '' || $email === '' || $kata_sandi === '' || $konfirmasi_kata_sandi === '') {
        $pesan_error = 'Semua field wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $pesan_error = 'Format email tidak valid.';
    } elseif ($kata_sandi !== $konfirmasi_kata_sandi) {
        $pesan_error = 'Kata sandi dan konfirmasi tidak sama.';
    } else {
        $nama_bersih = bersihkan_input($nama, $koneksi);
        $email_bersih = bersihkan_input($email, $koneksi);
        $pengguna_ada = ambil_pengguna_by_email($koneksi, $email_bersih);

        if ($pengguna_ada) {
            $pesan_error = 'Email sudah terdaftar.';
        } else {
            $hash_kata_sandi = buat_hash_kata_sandi($kata_sandi);
            $query = "INSERT INTO pengguna (nama, email, kata_sandi) VALUES ('$nama_bersih', '$email_bersih', '$hash_kata_sandi')";

            if (mysqli_query($koneksi, $query)) {
                pesan_flash('sukses', 'Pendaftaran berhasil. Silakan login.');
                alihkan('login.php');
            } else {
                $pesan_error = 'Pendaftaran gagal. Coba lagi.';
            }
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>
<div class="container halaman-utama d-flex align-items-center py-5">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-md-8 col-lg-5">
            <div class="card card-tugas">
                <div class="card-body p-4 p-md-5">
                    <h1 class="h4 mb-3 text-center">Daftar Akun</h1>

                    <?php if ($pesan_error): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($pesan_error) ?></div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($nama) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kata Sandi</label>
                            <input type="password" name="kata_sandi" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" name="konfirmasi_kata_sandi" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </form>

                    <p class="text-center mt-3 mb-0">
                        Sudah punya akun? <a href="login.php">Masuk</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
