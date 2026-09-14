# Panduan Lengkap Session di PHP

Pada protokol web (HTTP), pada dasarnya server tidak memiliki "ingatan". Ketika Anda membuka Halaman A dan kemudian pindah ke Halaman B, server menganggap itu sebagai dua permintaan dari orang yang sama sekali berbeda. 

Untuk memecahkan masalah ini dan memberikan "ingatan" kepada server (seperti mengetahui bahwa Anda sedang *login*), kita membutuhkan **Session**.

---

## 1. Apa itu Session?

**Session** adalah sebuah mekanisme di mana kita bisa menyimpan informasi / variabel sementara yang dapat diakses di seluruh halaman situs web. Informasi ini disimpan **di sisi Server**, berbeda dengan *Cookie* yang disimpan di sisi browser klien.

Kapan Session sering digunakan?
- Mengingat pengguna yang sedang *Login* ke dalam sistem.
- Menyimpan barang belanjaan di fitur *Keranjang Belanja* (Cart).
- Menyimpan preferensi pengguna sementara waktu.

---

## 2. Cara Memulai Session

Sebelum Anda bisa menyimpan, membaca, atau menghapus Session, Anda **wajib** menyalakan mesin session terlebih dahulu. Fungsi ini harus diletakkan **di baris paling atas dokumen PHP**, sebelum ada *output* HTML apapun yang dikirim ke browser.

Fungsi yang digunakan: `session_start();`

```php
<?php
// Wajib diletakkan di baris paling awal!
session_start();
?>
<!DOCTYPE html>
<html>
<body>
...
```

---

## 3. Membuat / Menyimpan Variabel Session

Setelah `session_start()` dipanggil, kita bisa menyimpan data ke dalam *Superglobal Array* bernama `$_SESSION`.

```php
<?php
session_start();

// Menyimpan data ke dalam Session
$_SESSION["username"] = "budi_santoso";
$_SESSION["role"] = "admin";

echo "Data session telah disimpan!";
?>
```

---

## 4. Membaca Data Session di Halaman Lain

Anda bisa membuat file PHP lain (misal: `halaman2.php`), dan data yang disimpan tadi akan tetap ada selama browser belum ditutup.

```php
<?php
// Di halaman manapun Anda ingin membaca Session, wajib memanggil session_start()
session_start();

// Mengecek apakah session 'username' ada
if (isset($_SESSION["username"])) {
    echo "Selamat datang kembali, " . $_SESSION["username"] . "!";
    echo "<br>Level Anda adalah: " . $_SESSION["role"];
} else {
    echo "Maaf, Anda belum login.";
}
?>
```

---

## 5. Menghapus / Mengakhiri Session

Jika pengguna melakukan *Logout* atau Anda ingin menghapus isi keranjang belanja, Anda harus menghapus session. Ada beberapa perintah untuk ini:

1. **`unset($_SESSION["kunci"])`**: Menghapus satu buah variabel session secara spesifik.
2. **`session_unset()`**: Menghapus / mengosongkan semua variabel session.
3. **`session_destroy()`**: Menghancurkan seluruh struktur session di sisi server secara permanen (sangat sering digunakan saat Logout).

```php
<?php
session_start();

// Menghapus hanya session username
unset($_SESSION["username"]);

// Menghancurkan seluruh session yang ada di website ini
session_destroy();

echo "Anda berhasil Logout.";
?>
```

---

## 6. Studi Kasus: Sistem Login Sederhana

Berikut adalah gambaran bagaimana struktur file untuk sebuah *Sistem Login* yang menggunakan session.

### **A. Halaman Login (`login.php`)**
```php
<?php
session_start();

// Cek apakah form login disubmit
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Simulasi pengecekan database sederhana
    if ($user == "admin" && $pass == "rahasia123") {
        // Jika benar, buat session!
        $_SESSION['status_login'] = true;
        $_SESSION['nama_user'] = "Administrator Utama";
        
        // Arahkan ke halaman dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Username atau Password salah!";
    }
}
?>

<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit" name="login">Masuk</button>
</form>
```

### **B. Halaman Admin (`dashboard.php`)**
File ini akan menolak akses dari orang yang mengetik URL langsung jika mereka belum *login*.

```php
<?php
session_start();

// Mengecek apakah session 'status_login' ada
if (!isset($_SESSION['status_login'])) {
    // Jika tidak ada, tendang kembali ke halaman login!
    header("Location: login.php");
    exit;
}
?>

<h1>Selamat Datang di Halaman Dashboard Admin!</h1>
<p>Halo, <?php echo $_SESSION['nama_user']; ?>. Anda berhasil masuk ke sistem rahasia.</p>
<a href="logout.php">Keluar (Logout)</a>
```

### **C. Halaman Logout (`logout.php`)**
```php
<?php
session_start();
session_unset();    // Hapus semua data
session_destroy();  // Hancurkan session

// Arahkan kembali ke halaman login
header("Location: login.php");
exit;
?>
```

---

## Kesimpulan

**Session** adalah jantung dari keamanan dan alur sistem (seperti Login, Multi-Step Forms, atau Keranjang Belanja). Selalu ingat 3 hal ini saat menggunakan Session:
1. Selalu panggil `session_start();` di baris pertama halaman.
2. Gunakan `$_SESSION['kunci']` untuk menyimpan dan memanggil data.
3. Gunakan `session_destroy();` jika ingin memastikan status pengguna benar-benar di-reset.
