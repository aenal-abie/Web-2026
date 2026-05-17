<?php
require_once __DIR__ . '/includes/fungsi.php';
mulai_sesi();

if (isset($_SESSION['id_pengguna'])) {
    alihkan('dashboard.php');
}

$koneksi = muat_koneksi();
$email = '';
$pesan_error = pesan_flash('sukses');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $kata_sandi = $_POST['kata_sandi'] ?? '';

    if ($email === '' || $kata_sandi === '') {
        $pesan_error = 'Email dan kata sandi wajib diisi.';
    } else {
        $email_bersih = bersihkan_input($email, $koneksi);
        $pengguna = ambil_pengguna_by_email($koneksi, $email_bersih);

        if (!$pengguna || !cocokkan_kata_sandi($kata_sandi, $pengguna['kata_sandi'])) {
            $pesan_error = 'Email atau kata sandi salah.';
        } else {
            $_SESSION['id_pengguna'] = $pengguna['id'];
            $_SESSION['nama_pengguna'] = $pengguna['nama'];
            $_SESSION['email_pengguna'] = $pengguna['email'];
            alihkan('dashboard.php');
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
                    <h1 class="h4 mb-3 text-center">Masuk</h1>

                    <?php if ($pesan_error): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($pesan_error) ?></div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kata Sandi</label>
                            <input type="password" name="kata_sandi" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </form>

                    <p class="text-center mt-3 mb-0">
                        Belum punya akun? <a href="register.php">Daftar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
