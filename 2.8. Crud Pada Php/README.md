# Panduan Lengkap CRUD PHP: Studi Kasus Pendaftaran Calon Mahasiswa Baru

**CRUD** adalah singkatan dari **Create, Read, Update, dan Delete**. Keempat operasi ini adalah inti dari hampir seluruh aplikasi web dinamis. Pada materi ini, kita akan belajar membuat sistem CRUD sederhana menggunakan PHP Prosedural (`mysqli`) dengan studi kasus **Pendaftaran Calon Mahasiswa Baru**.

---

## 1. Persiapan Database & Tabel

Pertama, kita harus menyiapkan wadah untuk menyimpan data pendaftar. Buatlah sebuah database bernama `db_pendaftaran`, lalu jalankan *query* SQL berikut di phpMyAdmin untuk membuat tabel `calon_mahasiswa`:

```sql
CREATE DATABASE db_pendaftaran;
USE db_pendaftaran;

CREATE TABLE calon_mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    agama VARCHAR(20) NOT NULL,
    sekolah_asal VARCHAR(100) NOT NULL
);
```

---

## 2. Struktur File Proyek

Dalam proyek ini, kita akan memisahkan kode agar rapi dan mudah di-maintenance. Buatlah folder proyek (misal: `pendaftaran-maba`) di dalam `htdocs`, lalu siapkan file-file berikut:
1. `koneksi.php` (Menghubungkan PHP dengan database)
2. `index.php` (Menampilkan daftar pendaftar / **Read**)
3. `tambah.php` (Formulir pendaftaran / **Create**)
4. `edit.php` (Formulir ubah data / **Update**)
5. `hapus.php` (Skrip hapus data / **Delete**)

---

## 3. Membuat Koneksi Database (`koneksi.php`)

File ini akan di-*include* ke semua file lain yang membutuhkan akses database.

```php
<?php
// File: koneksi.php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pendaftaran";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>
```

---

## 4. READ: Menampilkan Data Pendaftar (`index.php`)

File ini adalah halaman utama aplikasi. Fungsinya untuk mengambil data dari tabel `calon_mahasiswa` dan menampilkannya dalam bentuk tabel HTML.

```php
<?php
// File: index.php
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Mahasiswa Baru</title>
</head>
<body>
    <h2>Daftar Calon Mahasiswa Baru</h2>
    <a href="tambah.php">[+] Tambah Pendaftar Baru</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah Asal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query untuk mengambil semua data
            $query = "SELECT * FROM calon_mahasiswa";
            $result = mysqli_query($koneksi, $query);

            $no = 1;
            // Looping data dari database
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['jenis_kelamin'] . "</td>";
                echo "<td>" . $row['agama'] . "</td>";
                echo "<td>" . $row['sekolah_asal'] . "</td>";
                
                // Tombol aksi Edit dan Hapus
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
                // Hati-hati dengan tombol hapus, arahkan ke hapus.php beserta ID-nya
                echo "<a href='hapus.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
```

---

## 5. CREATE: Menambah Data Baru (`tambah.php`)

File ini berisi form HTML sekaligus skrip PHP untuk memproses inputan dari *User* lalu memasukkannya ke dalam database (`INSERT INTO`).

```php
<?php
// File: tambah.php
require_once 'koneksi.php';

// Mengecek apakah tombol 'daftar' sudah ditekan
if (isset($_POST['daftar'])) {
    // Menangkap data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    // Query untuk insert data
    $query = "INSERT INTO calon_mahasiswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) 
              VALUES ('$nama', '$alamat', '$jk', '$agama', '$sekolah')";
    
    $insert = mysqli_query($koneksi, $query);

    // Cek keberhasilan
    if ($insert) {
        // Jika sukses, lempar kembali ke halaman index
        header('Location: index.php');
    } else {
        echo "Gagal mendaftar: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Maba</title>
</head>
<body>
    <h2>Form Pendaftaran Calon Mahasiswa Baru</h2>
    <form action="" method="POST">
        <p>
            <label>Nama Lengkap: </label><br>
            <input type="text" name="nama" required>
        </p>
        <p>
            <label>Alamat Lengkap: </label><br>
            <textarea name="alamat" required></textarea>
        </p>
        <p>
            <label>Jenis Kelamin: </label><br>
            <label><input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>
        </p>
        <p>
            <label>Agama: </label><br>
            <select name="agama" required>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
            </select>
        </p>
        <p>
            <label>Sekolah Asal: </label><br>
            <input type="text" name="sekolah_asal" required>
        </p>
        <p>
            <input type="submit" value="Daftar Sekarang" name="daftar">
            <a href="index.php">Batal</a>
        </p>
    </form>
</body>
</html>
```

---

## 6. UPDATE: Mengubah Data Pendaftar (`edit.php`)

Halaman ini berfungsi menarik data spesifik (berdasarkan `id`) untuk diisi ke dalam form. Ketika formulir disubmit, data tersebut akan ditimpa dengan nilai baru (`UPDATE`).

```php
<?php
// File: edit.php
require_once 'koneksi.php';

// 1. Tangkap ID dari URL (GET)
if (!isset($_GET['id'])) {
    header('Location: index.php');
}

$id = $_GET['id'];

// Ambil data dari database untuk ditampilkan di form
$query = "SELECT * FROM calon_mahasiswa WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$maba = mysqli_fetch_assoc($result);

if (!$maba) {
    die("Data tidak ditemukan di database.");
}

// 2. Proses jika form disubmit
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    // Query Update Data
    $queryUpdate = "UPDATE calon_mahasiswa SET 
                        nama = '$nama', 
                        alamat = '$alamat', 
                        jenis_kelamin = '$jk', 
                        agama = '$agama', 
                        sekolah_asal = '$sekolah' 
                    WHERE id = $id";
    
    $update = mysqli_query($koneksi, $queryUpdate);

    if ($update) {
        header('Location: index.php');
    } else {
        echo "Gagal menyimpan perubahan: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Maba</title>
</head>
<body>
    <h2>Form Edit Data Mahasiswa</h2>
    <form action="" method="POST">
        <p>
            <label>Nama Lengkap: </label><br>
            <input type="text" name="nama" value="<?php echo $maba['nama']; ?>" required>
        </p>
        <p>
            <label>Alamat Lengkap: </label><br>
            <textarea name="alamat" required><?php echo $maba['alamat']; ?></textarea>
        </p>
        <p>
            <label>Jenis Kelamin: </label><br>
            <?php $jk = $maba['jenis_kelamin']; ?>
            <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($jk == 'Laki-laki') ? "checked" : ""; ?>> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($jk == 'Perempuan') ? "checked" : ""; ?>> Perempuan</label>
        </p>
        <p>
            <label>Agama: </label><br>
            <?php $agama = $maba['agama']; ?>
            <select name="agama" required>
                <option <?php echo ($agama == 'Islam') ? "selected" : ""; ?>>Islam</option>
                <option <?php echo ($agama == 'Kristen') ? "selected" : ""; ?>>Kristen</option>
                <option <?php echo ($agama == 'Katolik') ? "selected" : ""; ?>>Katolik</option>
                <option <?php echo ($agama == 'Hindu') ? "selected" : ""; ?>>Hindu</option>
                <option <?php echo ($agama == 'Buddha') ? "selected" : ""; ?>>Buddha</option>
            </select>
        </p>
        <p>
            <label>Sekolah Asal: </label><br>
            <input type="text" name="sekolah_asal" value="<?php echo $maba['sekolah_asal']; ?>" required>
        </p>
        <p>
            <input type="submit" value="Simpan Perubahan" name="simpan">
            <a href="index.php">Batal</a>
        </p>
    </form>
</body>
</html>
```

---

## 7. DELETE: Menghapus Data Pendaftar (`hapus.php`)

File `hapus.php` bekerja di belakang layar tanpa tampilan visual. File ini bertugas menerima perintah tangkapan `id` dari URL, menjalankan query `DELETE`, dan otomatis *redirect* kembali ke halaman `index.php`.

```php
<?php
// File: hapus.php
require_once 'koneksi.php';

// Pastikan ada parameter ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM calon_mahasiswa WHERE id = $id";
    $hapus = mysqli_query($koneksi, $query);

    if ($hapus) {
        // Jika berhasil terhapus, kembalikan ke index.php
        header('Location: index.php');
    } else {
        die("Gagal menghapus data: " . mysqli_error($koneksi));
    }
} else {
    // Jika tidak ada ID di URL, kembalikan ke halaman index
    header('Location: index.php');
}
?>
```

---

## Kesimpulan

Selamat! Anda baru saja menyusun sebuah modul sistem pendaftaran mahasiswa menggunakan arsitektur CRUD murni di PHP prosedural. Siklus ini akan sangat identik di semua pengembangan web:
1. Menampilkan data ke tabel HTML (**Read**).
2. Membuka formulir, lalu menyimpannya dengan `INSERT` (**Create**).
3. Mengambil data spesifik dengan `SELECT WHERE id`, merender nilai awalnya pada form, lalu mengeksekusi `UPDATE` (**Update**).
4. Menangkap ID yang dikirim lewat URL (`$_GET`), kemudian mengeksekusi `DELETE` (**Delete**).
