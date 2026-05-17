<?php
require_once __DIR__ . '/includes/cek_login.php';
$koneksi = muat_koneksi();
$pengguna_login = user_login();
$status_filter = $_GET['status'] ?? '';
$daftar_tugas = ambil_semua_tugas($koneksi, $pengguna_login['id'], $status_filter);
$pesan_sukses = pesan_flash('sukses');

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>
<div class="container py-4">
    <?php if ($pesan_sukses): ?>
        <div class="alert alert-success"><?= htmlspecialchars($pesan_sukses) ?></div>
    <?php endif; ?>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Dashboard</h1>
            <p class="text-muted mb-0">Selamat datang, <?= htmlspecialchars($pengguna_login['nama']) ?>.</p>
        </div>
        <a href="tugas/tambah.php" class="btn btn-primary">+ Tambah Tugas</a>
    </div>

    <div class="mb-3">
        <div class="btn-group flex-wrap" role="group">
            <a href="dashboard.php" class="btn btn-outline-primary <?= $status_filter === '' ? 'active' : '' ?>">Semua</a>
            <a href="dashboard.php?status=Belum Selesai" class="btn btn-outline-primary <?= $status_filter === 'Belum Selesai' ? 'active' : '' ?>">Belum Selesai</a>
            <a href="dashboard.php?status=Selesai" class="btn btn-outline-primary <?= $status_filter === 'Selesai' ? 'active' : '' ?>">Selesai</a>
        </div>
    </div>

    <div class="row g-3">
        <?php if (empty($daftar_tugas)): ?>
            <div class="col-12">
                <div class="alert alert-info mb-0">Belum ada tugas. Silakan tambah tugas pertama.</div>
            </div>
        <?php else: ?>
            <?php foreach ($daftar_tugas as $tugas): ?>
                <div class="col-12 col-lg-6">
                    <div class="card card-tugas h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between gap-3">
                                <div>
                                    <h2 class="h5 mb-2"><?= htmlspecialchars($tugas['judul']) ?></h2>
                                    <p class="text-muted mb-2"><?= nl2br(htmlspecialchars($tugas['deskripsi'] ?? '')) ?></p>
                                </div>
                                <span class="badge badge-prioritas bg-<?= $tugas['prioritas'] === 'Tinggi' ? 'danger' : ($tugas['prioritas'] === 'Sedang' ? 'warning text-dark' : 'success') ?>">
                                    <?= htmlspecialchars($tugas['prioritas']) ?>
                                </span>
                            </div>

                            <div class="small text-muted mb-3">
                                <div>Mata kuliah: <?= htmlspecialchars($tugas['mata_kuliah'] ?: '-') ?></div>
                                <div>Deadline: <?= htmlspecialchars($tugas['deadline'] ?: '-') ?></div>
                            </div>

                            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                                <span class="badge <?= $tugas['status'] === 'Selesai' ? 'bg-success' : 'bg-secondary' ?>">
                                    <?= htmlspecialchars($tugas['status']) ?>
                                </span>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <a href="tugas/edit.php?id=<?= (int) $tugas['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="tugas/selesai.php?id=<?= (int) $tugas['id'] ?>" class="btn btn-sm btn-outline-success <?= $tugas['status'] === 'Selesai' ? 'disabled' : '' ?>">Selesai</a>
                                <a href="tugas/hapus.php?id=<?= (int) $tugas['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus tugas ini?')">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
