<?php
$host = "localhost";
$nama_pengguna = "app_user";
$kata_sandi = "StrongPass123";
$nama_database = "catatan_tugas_kuliah";

$koneksi = mysqli_connect($host, $nama_pengguna, $kata_sandi, $nama_database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
