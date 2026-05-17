<?php
require_once __DIR__ . '/../includes/cek_login.php';
$koneksi = muat_koneksi();
$pengguna_login = user_login();
$id_tugas = (int) ($_GET['id'] ?? 0);

$data_tugas = ambil_tugas_by_id($koneksi, $id_tugas, $pengguna_login['id']);

if ($data_tugas) {
    $query = "UPDATE tugas SET status = 'Selesai' WHERE id = " . (int) $data_tugas['id'] . " AND id_pengguna = " . (int) $pengguna_login['id'];
    mysqli_query($koneksi, $query);
    pesan_flash('sukses', 'Tugas ditandai selesai.');
}

alihkan('../dashboard.php');
