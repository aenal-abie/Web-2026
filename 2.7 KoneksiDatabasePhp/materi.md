# Koneksi PHP ke Database MySQL menggunakan `mysqli_connect`

Untuk membuat halaman web yang dinamis, PHP harus dihubungkan (dikoneksikan) dengan server database agar bisa melakukan operasi CRUD (Create, Read, Update, Delete). Pada materi ini, kita akan fokus menggunakan ekstensi **MySQLi (MySQL Improved)** dengan gaya **Prosedural** melalui fungsi bawaan `mysqli_connect()`.

---

## 1. Apa itu `mysqli_connect`?

`mysqli_connect()` adalah sebuah fungsi bawaan PHP yang bertugas untuk membuka koneksi baru ke server MySQL. Fungsi ini adalah cara paling dasar dan populer bagi pemula untuk menghubungkan kode PHP dengan Database.

Fungsi ini membutuhkan **4 informasi penting (parameter)** agar bisa masuk ke dalam database:

1. **Hostname / Server**: Alamat server tempat database berada. Jika Anda menggunakan XAMPP di komputer sendiri, nilainya selalu `"localhost"`.
2. **Username**: Nama pengguna untuk masuk ke server MySQL. Bawaan XAMPP adalah `"root"`.
3. **Password**: Kata sandi pengguna MySQL. Bawaan XAMPP adalah **kosong** `""` (jangan diisi spasi, cukup string kosong).
4. **Database Name**: Nama database spesifik yang ingin kita akses/kelola.

---

## 2. Cara Membuat Koneksi Dasar

Berikut adalah contoh skrip sederhana untuk melakukan koneksi ke database. Diasumsikan kita telah membuat database bernama `db_sekolah` di phpMyAdmin.

```php
<?php
// 1. Menyiapkan kredensial (informasi login) database
$host     = "localhost";
$username = "root";
$password = "";
$database = "db_sekolah";

// 2. Mencoba melakukan koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// 3. Mengecek apakah koneksi berhasil atau gagal
if (!$koneksi) {
    // Jika gagal, hentikan program (die) dan tampilkan pesan error
    die("Koneksi ke database gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi ke database berhasil!";
}
?>
```

### **Penjelasan Kode:**
- Variabel `$koneksi` bertugas "menampung" jembatan penghubung ke database. Variabel ini akan sangat sering digunakan di file lain nanti saat Anda ingin menjalankan perintah SQL.
- Fungsi `mysqli_connect_error()` berguna untuk menampilkan teks *error* spesifik mengapa koneksi bisa gagal (misalnya karena password salah atau database tidak ditemukan).
- Fungsi `die()` akan menghentikan eksekusi kode PHP di bawahnya secara total jika terjadi kegagalan sistem kritikal seperti putusnya jalur database.

---

## 3. Praktik Terbaik: Pisahkan File Koneksi!

Dalam membangun aplikasi web sungguhan, **jangan** menulis ulang kode koneksi di setiap halaman (misal: di `index.php`, `tambah.php`, `hapus.php`). Hal tersebut sangat tidak efisien.

Praktik terbaiknya adalah: **Buat satu file khusus** (biasanya diberi nama `koneksi.php` atau `config.php`), lalu panggil file tersebut di halaman lain yang membutuhkannya menggunakan `include` atau `require`.

### **Langkah 1: Buat file `koneksi.php`**
Isi file ini hanya murni untuk logika koneksi tanpa menampilkan pesan sukses (agar layar tidak kotor oleh tulisan "Koneksi berhasil!").

```php
<?php
// File: koneksi.php

$koneksi = mysqli_connect("localhost", "root", "", "db_sekolah");

// Cek koneksi
if (!$koneksi) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>
```

### **Langkah 2: Panggil di File Lain (Contoh: `index.php`)**
Gunakan `require_once` untuk memastikan file koneksi dipanggil dengan benar.

```php
<?php
// File: index.php

// 1. Panggil jembatan koneksinya terlebih dahulu
require_once 'koneksi.php';

// 2. Sekarang Anda sudah terhubung ke database dan bisa melakukan Query!
// echo "Berada di halaman utama, siap memuat data dari database.";

// Contoh penggunaan variabel $koneksi
// $data = mysqli_query($koneksi, "SELECT * FROM siswa");
?>
```

---

## Kesimpulan

Fungsi `mysqli_connect()` adalah gerbang utama aplikasi PHP Anda. Tanpa koneksi yang berhasil, seluruh proses CRUD tidak akan bisa dijalankan. Selalu ingat 4 pilar parameternya: **Host**, **User**, **Pass**, dan **DB_Name**. Biasakan juga untuk merapikan kode Anda dengan memisahkan skrip koneksi ke dalam satu file tersendiri (`koneksi.php`).
