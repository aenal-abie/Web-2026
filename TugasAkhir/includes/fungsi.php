<?php

function mulai_sesi(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function muat_koneksi()
{
    require_once __DIR__ . '/../config/database.php';
    return $koneksi;
}

function bersihkan_input($data, $koneksi)
{
    return mysqli_real_escape_string($koneksi, trim($data));
}

function buat_hash_kata_sandi($kata_sandi)
{
    return password_hash($kata_sandi, PASSWORD_DEFAULT);
}

function cocokkan_kata_sandi($kata_sandi, $hash)
{
    return password_verify($kata_sandi, $hash);
}

function alihkan($tujuan): void
{
    header("Location: $tujuan");
    exit;
}

function pesan_flash($kunci, $isi = null)
{
    mulai_sesi();

    if ($isi === null) {
        if (!isset($_SESSION['flash'][$kunci])) {
            return null;
        }

        $pesan = $_SESSION['flash'][$kunci];
        unset($_SESSION['flash'][$kunci]);
        return $pesan;
    }

    $_SESSION['flash'][$kunci] = $isi;
    return null;
}

function user_login(): ?array
{
    mulai_sesi();

    if (!isset($_SESSION['id_pengguna'])) {
        return null;
    }

    return [
        'id' => $_SESSION['id_pengguna'],
        'nama' => $_SESSION['nama_pengguna'],
        'email' => $_SESSION['email_pengguna'],
    ];
}

function wajib_login(): void
{
    if (user_login() === null) {
        alihkan('login.php');
    }
}

function ambil_semua_tugas($koneksi, $id_pengguna, $status = null): array
{
    $id_pengguna = (int) $id_pengguna;
    $where_status = '';

    if ($status !== null && $status !== '') {
        $status = mysqli_real_escape_string($koneksi, $status);
        $where_status = " AND status = '$status'";
    }

    $query = "SELECT * FROM tugas WHERE id_pengguna = $id_pengguna $where_status ORDER BY 
        CASE WHEN deadline IS NULL THEN 1 ELSE 0 END,
        deadline ASC,
        id DESC";

    $hasil = mysqli_query($koneksi, $query);
    $daftar_tugas = [];

    if ($hasil) {
        while ($baris = mysqli_fetch_assoc($hasil)) {
            $daftar_tugas[] = $baris;
        }
    }

    return $daftar_tugas;
}

function ambil_tugas_by_id($koneksi, $id_tugas, $id_pengguna)
{
    $id_tugas = (int) $id_tugas;
    $id_pengguna = (int) $id_pengguna;

    $query = "SELECT * FROM tugas WHERE id = $id_tugas AND id_pengguna = $id_pengguna LIMIT 1";
    $hasil = mysqli_query($koneksi, $query);

    return $hasil ? mysqli_fetch_assoc($hasil) : null;
}

function ambil_pengguna_by_email($koneksi, $email)
{
    $email = mysqli_real_escape_string($koneksi, $email);
    $query = "SELECT * FROM pengguna WHERE email = '$email' LIMIT 1";
    $hasil = mysqli_query($koneksi, $query);

    return $hasil ? mysqli_fetch_assoc($hasil) : null;
}

function ambil_pengguna_by_id($koneksi, $id_pengguna)
{
    $id_pengguna = (int) $id_pengguna;
    $query = "SELECT * FROM pengguna WHERE id = $id_pengguna LIMIT 1";
    $hasil = mysqli_query($koneksi, $query);

    return $hasil ? mysqli_fetch_assoc($hasil) : null;
}
