<?php $pengguna_login = user_login(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="dashboard.php">Catatan Tugas Kuliah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUtama">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarUtama">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <?php if ($pengguna_login): ?>
                    <li class="nav-item">
                        <span class="nav-link text-white-50">Halo, <?= htmlspecialchars($pengguna_login['nama']) ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm" href="logout.php">Keluar</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link text-white" href="login.php">Masuk</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="register.php">Daftar</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
