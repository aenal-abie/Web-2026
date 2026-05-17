# Plan Pemula: Aplikasi Catatan Tugas Kuliah
## PHP Native Tanpa Framework + Bootstrap

---

## 1. Tujuan Proyek

Membuat aplikasi web sederhana untuk mencatat tugas kuliah. Aplikasi ini dibuat menggunakan **PHP native tanpa framework**, **MySQL** sebagai database, dan **Bootstrap** sebagai CSS agar tampilan lebih rapi tanpa perlu membuat desain dari nol.

Plan ini sengaja dibuat untuk mahasiswa yang baru belajar:
- PHP dasar
- HTML dan CSS dasar
- Bootstrap dasar
- MySQL dasar
- CRUD sederhana
- Login menggunakan session

---

## 2. Gambaran Aplikasi

**Nama aplikasi:** Catatan Tugas Kuliah

**Fungsi utama aplikasi:**
- Pengguna bisa daftar akun.
- Pengguna bisa login dan logout.
- Pengguna bisa menambah tugas kuliah.
- Pengguna bisa melihat daftar tugas.
- Pengguna bisa mengedit tugas.
- Pengguna bisa menghapus tugas.
- Pengguna bisa menandai tugas sebagai selesai.
- Pengguna bisa melihat tugas berdasarkan status.

**Tech stack:**
- Bahasa: PHP native
- Database: MySQL
- Styling: Bootstrap 5
- Server lokal: XAMPP, Laragon, atau PHP built-in server
- Koneksi database: MySQLi procedural
- Login: PHP session

---

## 3. Batasan Untuk Pemula

Agar proyek mudah diselesaikan, fitur yang terlalu sulit tidak dibuat di versi awal.

**Yang dibuat di versi awal:**
- Web berbasis halaman PHP biasa.
- Login sederhana dengan session.
- CRUD tugas.
- Validasi form sederhana.
- Tampilan Bootstrap.
- Database MySQL.

---

## 4. Struktur Folder

Gunakan struktur folder sederhana berikut:

```text
catatan-tugas-kuliah/
├── index.php
├── login.php
├── register.php
├── logout.php
├── dashboard.php
│
├── tugas/
│   ├── tambah.php
│   ├── edit.php
│   ├── hapus.php
│   └── selesai.php
│
├── config/
│   └── database.php
│
├── includes/
│   ├── header.php
│   ├── navbar.php
│   ├── footer.php
│   └── cek_login.php
│
├── assets/
│   └── css/
│       └── style.css
│
└── database/
    └── catatan_tugas_kuliah.sql
```

**Penjelasan folder:**
- `config/` berisi koneksi database.
- `includes/` berisi bagian halaman yang dipakai berulang.
- `tugas/` berisi halaman khusus pengelolaan tugas.
- `assets/css/` berisi CSS tambahan jika Bootstrap belum cukup.
- `database/` berisi file SQL untuk membuat tabel.

---

## 5. Database

Nama database:

```sql
catatan_tugas_kuliah
```

### Tabel `pengguna`

```sql
CREATE TABLE pengguna (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  kata_sandi VARCHAR(255) NOT NULL,
  dibuat_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Tabel `tugas`

```sql
CREATE TABLE tugas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_pengguna INT NOT NULL,
  judul VARCHAR(150) NOT NULL,
  deskripsi TEXT,
  mata_kuliah VARCHAR(100),
  prioritas ENUM('Rendah', 'Sedang', 'Tinggi') DEFAULT 'Sedang',
  deadline DATE,
  status ENUM('Belum Selesai', 'Selesai') DEFAULT 'Belum Selesai',
  dibuat_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  diperbarui_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_pengguna) REFERENCES pengguna(id) ON DELETE CASCADE
);
```

---

## 6. Halaman Yang Dibuat

### 1. `index.php`

Halaman awal aplikasi.

Isi halaman:
- Judul aplikasi.
- Penjelasan singkat.
- Tombol login.
- Tombol register.

Komponen Bootstrap yang dipakai:
- Container
- Card
- Button
- Navbar sederhana

---

### 2. `register.php`

Halaman daftar akun.

Input form:
- Nama
- Email
- Kata sandi
- Konfirmasi kata sandi

Proses yang dilakukan:
- Cek semua input wajib diisi.
- Cek email belum digunakan.
- Cek kata sandi dan konfirmasi sama.
- Simpan password menggunakan `password_hash()`.
- Simpan data pengguna ke tabel `pengguna`.

---

### 3. `login.php`

Halaman masuk aplikasi.

Input form:
- Email
- Kata sandi

Proses yang dilakukan:
- Cari pengguna berdasarkan email.
- Cocokkan password menggunakan `password_verify()`.
- Jika benar, simpan data login ke `$_SESSION`.
- Arahkan pengguna ke `dashboard.php`.

---

### 4. `logout.php`

Halaman untuk keluar dari aplikasi.

Proses yang dilakukan:
- Jalankan `session_start()`.
- Hapus session.
- Arahkan kembali ke `login.php`.

---

### 5. `dashboard.php`

Halaman utama setelah login.

Isi halaman:
- Navbar.
- Sapaan nama pengguna.
- Tombol tambah tugas.
- Daftar tugas milik pengguna yang sedang login.
- Badge status tugas.
- Badge prioritas tugas.
- Tombol edit.
- Tombol hapus.
- Tombol tandai selesai.

Fitur sederhana:
- Tampilkan semua tugas.
- Filter status lewat query string, contoh:

```text
dashboard.php?status=Selesai
dashboard.php?status=Belum Selesai
```

---

### 6. `tugas/tambah.php`

Halaman tambah tugas baru.

Input form:
- Judul tugas
- Deskripsi
- Mata kuliah
- Prioritas
- Deadline

Proses yang dilakukan:
- Pastikan pengguna sudah login.
- Validasi judul tidak kosong.
- Simpan tugas ke database sesuai `id_pengguna` yang login.
- Arahkan kembali ke dashboard.

---

### 7. `tugas/edit.php`

Halaman edit tugas.

Proses yang dilakukan:
- Ambil `id` tugas dari URL.
- Pastikan tugas tersebut milik pengguna yang sedang login.
- Tampilkan data lama ke form.
- Simpan perubahan ke database.
- Arahkan kembali ke dashboard.

Contoh URL:

```text
tugas/edit.php?id=1
```

---

### 8. `tugas/hapus.php`

Halaman proses hapus tugas.

Proses yang dilakukan:
- Ambil `id` tugas dari URL.
- Pastikan tugas milik pengguna yang sedang login.
- Hapus tugas dari database.
- Arahkan kembali ke dashboard.

Catatan untuk pemula:
- Bisa memakai konfirmasi JavaScript sederhana sebelum menghapus.

---

### 9. `tugas/selesai.php`

Halaman proses menandai tugas sebagai selesai.

Proses yang dilakukan:
- Ambil `id` tugas dari URL.
- Pastikan tugas milik pengguna yang sedang login.
- Ubah status menjadi `Selesai`.
- Arahkan kembali ke dashboard.

---

## 7. Alur Aplikasi

```text
Pengguna membuka index.php
        ↓
Pilih Register atau Login
        ↓
Jika register berhasil, pengguna login
        ↓
Masuk ke dashboard.php
        ↓
Pengguna mengelola tugas
        ↓
Pengguna logout
```

---

## 8. Tahapan Pengerjaan

### Tahap 1: Persiapan Project

Checklist:
- [ ] Buat folder project `catatan-tugas-kuliah`.
- [ ] Jalankan project lewat XAMPP, Laragon, atau PHP server.
- [ ] Buat folder sesuai struktur.
- [ ] Buat file `index.php`.
- [ ] Pasang Bootstrap CDN di `includes/header.php`.
- [ ] Buat `includes/footer.php`.
- [ ] Buat `assets/css/style.css`.

Target akhir tahap ini:
- Halaman awal bisa dibuka di browser.
- Bootstrap sudah tampil.

---

### Tahap 2: Database dan Koneksi

Checklist:
- [ ] Buat database `catatan_tugas_kuliah`.
- [ ] Buat tabel `pengguna`.
- [ ] Buat tabel `tugas`.
- [ ] Buat file `config/database.php`.
- [ ] Tes koneksi database.

Target akhir tahap ini:
- PHP berhasil terhubung ke MySQL.

Contoh isi sederhana `config/database.php`:

```php
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "catatan_tugas_kuliah";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
```

---

### Tahap 3: Register

Checklist:
- [ ] Buat tampilan form register.
- [ ] Validasi input kosong.
- [ ] Validasi konfirmasi kata sandi.
- [ ] Cek email sudah terdaftar atau belum.
- [ ] Simpan password dengan `password_hash()`.
- [ ] Simpan pengguna baru ke database.
- [ ] Tampilkan pesan sukses atau error.

Target akhir tahap ini:
- Pengguna baru bisa daftar akun.

---

### Tahap 4: Login dan Logout

Checklist:
- [ ] Buat tampilan form login.
- [ ] Cari pengguna berdasarkan email.
- [ ] Cek password dengan `password_verify()`.
- [ ] Simpan session login.
- [ ] Buat file `includes/cek_login.php`.
- [ ] Buat file `logout.php`.

Target akhir tahap ini:
- Pengguna bisa login dan logout.
- Halaman dashboard tidak bisa dibuka sebelum login.

---

### Tahap 5: Dashboard

Checklist:
- [ ] Buat halaman `dashboard.php`.
- [ ] Tampilkan nama pengguna.
- [ ] Ambil daftar tugas berdasarkan `id_pengguna`.
- [ ] Tampilkan tugas dalam card atau tabel Bootstrap.
- [ ] Tampilkan badge prioritas.
- [ ] Tampilkan badge status.
- [ ] Tampilkan pesan jika belum ada tugas.

Target akhir tahap ini:
- Pengguna bisa melihat daftar tugas miliknya sendiri.

---

### Tahap 6: Tambah Tugas

Checklist:
- [ ] Buat halaman `tugas/tambah.php`.
- [ ] Buat form tambah tugas.
- [ ] Validasi judul wajib diisi.
- [ ] Simpan tugas ke database.
- [ ] Arahkan kembali ke dashboard setelah berhasil.

Target akhir tahap ini:
- Pengguna bisa membuat tugas baru.

---

### Tahap 7: Edit Tugas

Checklist:
- [ ] Buat halaman `tugas/edit.php`.
- [ ] Ambil data tugas berdasarkan `id`.
- [ ] Pastikan tugas milik pengguna yang login.
- [ ] Tampilkan data lama ke form.
- [ ] Simpan perubahan ke database.

Target akhir tahap ini:
- Pengguna bisa mengubah tugas miliknya.

---

### Tahap 8: Hapus dan Selesai

Checklist:
- [ ] Buat halaman `tugas/hapus.php`.
- [ ] Tambahkan konfirmasi hapus.
- [ ] Buat halaman `tugas/selesai.php`.
- [ ] Ubah status tugas menjadi `Selesai`.
- [ ] Pastikan pengguna tidak bisa mengubah tugas orang lain.

Target akhir tahap ini:
- Pengguna bisa menghapus tugas.
- Pengguna bisa menandai tugas selesai.

---

### Tahap 9: Filter dan Rapikan Tampilan

Checklist:
- [ ] Tambahkan filter semua tugas.
- [ ] Tambahkan filter tugas belum selesai.
- [ ] Tambahkan filter tugas selesai.
- [ ] Rapikan warna badge prioritas.
- [ ] Rapikan layout mobile dengan Bootstrap grid.
- [ ] Tambahkan CSS kecil di `assets/css/style.css`.

Target akhir tahap ini:
- Aplikasi lebih nyaman digunakan.
- Tampilan tetap bagus di laptop dan HP.

---

### Tahap 10: Testing Sederhana

Checklist:
- [ ] Test register dengan email baru.
- [ ] Test register dengan email yang sama.
- [ ] Test login password salah.
- [ ] Test tambah tugas.
- [ ] Test edit tugas.
- [ ] Test hapus tugas.
- [ ] Test tandai selesai.
- [ ] Test logout.
- [ ] Test dashboard tanpa login.

Target akhir tahap ini:
- Aplikasi berjalan stabil untuk demo tugas kuliah.

---

## 9. Aturan Coding Untuk Pemula

Gunakan penamaan Bahasa Indonesia agar mudah dipahami.

Kode dibuat dengan gaya **prosedural**, bukan OOP. Jadi tidak perlu memakai `class`, `object`, atau struktur yang terlalu rumit.

Contoh variabel:

```php
$nama = $_POST['nama'];
$email = $_POST['email'];
$kataSandi = $_POST['kata_sandi'];
$daftarTugas = [];
```

Contoh session:

```php
$_SESSION['id_pengguna'] = $pengguna['id'];
$_SESSION['nama_pengguna'] = $pengguna['nama'];
```

Contoh pengecekan login:

```php
if (!isset($_SESSION['id_pengguna'])) {
    header('Location: login.php');
    exit;
}
```

Aturan penting:
- Gunakan `password_hash()` untuk menyimpan password.
- Gunakan `password_verify()` untuk mengecek password.
- Gunakan `mysqli_connect()` untuk koneksi database.
- Gunakan `mysqli_query()` untuk menjalankan query sederhana.
- Gunakan `mysqli_real_escape_string()` sebelum menyimpan input teks ke database.
- Jangan menyimpan password asli di database.
- Jangan menampilkan tugas milik pengguna lain.
- Gunakan `htmlspecialchars()` saat menampilkan data dari database.

Contoh query sederhana:

```php
<?php
include 'config/database.php';

$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$query = "SELECT * FROM pengguna WHERE email = '$email'";
$hasil = mysqli_query($koneksi, $query);
$pengguna = mysqli_fetch_assoc($hasil);
```

---

## 10. Komponen Bootstrap Yang Dipelajari

Bootstrap yang cukup dipakai:
- `container`
- `row`
- `col`
- `card`
- `table`
- `form-control`
- `form-select`
- `btn`
- `badge`
- `alert`
- `navbar`

Contoh penggunaan badge:

```html
<span class="badge bg-success">Selesai</span>
<span class="badge bg-warning text-dark">Sedang</span>
<span class="badge bg-danger">Tinggi</span>
```

---

## 11. Tugas Mahasiswa

Jika dikerjakan sendiri, ikuti urutan tahapan dari tahap 1 sampai tahap 10.

---

## 12. Estimasi Waktu

Estimasi untuk pemula:

| Tahap | Durasi |
| --- | --- |
| Persiapan project | 1 hari |
| Database dan koneksi | 1 hari |
| Register | 1-2 hari |
| Login dan logout | 1-2 hari |
| Dashboard | 1-2 hari |
| Tambah tugas | 1 hari |
| Edit tugas | 1 hari |
| Hapus dan selesai | 1 hari |
| Filter dan styling | 1-2 hari |
| Testing sederhana | 1 hari |

Total estimasi: **10-15 hari belajar**

---

## 13. Fitur Tambahan Setelah Versi Dasar

Jika versi dasar sudah selesai, fitur tambahan yang bisa dicoba:
- Cari tugas berdasarkan judul.
- Urutkan tugas berdasarkan deadline.
- Tampilkan tugas yang deadline-nya dekat.
- Tambahkan halaman profil.
- Tambahkan pilihan status `Dikerjakan`.
- Tambahkan dark mode sederhana.
- Tambahkan export tugas ke PDF.
- Upload lampiran tugas.

---

## 14. Kriteria Selesai

Aplikasi dianggap selesai jika:
- Pengguna bisa register.
- Pengguna bisa login.
- Pengguna bisa logout.
- Pengguna bisa menambah tugas.
- Pengguna bisa melihat tugas miliknya sendiri.
- Pengguna bisa mengedit tugas.
- Pengguna bisa menghapus tugas.
- Pengguna bisa menandai tugas selesai.
- Tampilan memakai Bootstrap.
- Database berjalan tanpa error.
- Halaman penting tidak bisa diakses tanpa login.

---

## 15. Catatan Untuk Mahasiswa

Kerjakan aplikasi ini pelan-pelan. Jangan langsung membuat semua fitur sekaligus.

Urutan belajar yang disarankan:

1. Pahami HTML form.
2. Pahami cara menerima data dengan `$_POST`.
3. Pahami session login.
4. Pahami koneksi MySQLi.
5. Pahami query `SELECT`, `INSERT`, `UPDATE`, dan `DELETE`.
6. Baru rapikan tampilan dengan Bootstrap.

Jika error muncul, baca pesan errornya dulu. Biasanya masalah pemula ada di:
- Nama database salah.
- Nama tabel salah.
- Nama kolom salah.
- Lupa `session_start()`.
- Lupa `exit` setelah `header('Location: ...')`.
- Path include salah.
- Query salah atau input belum dibersihkan dengan `mysqli_real_escape_string()`.

---

**Status:** Plan siap digunakan untuk implementasi PHP native pemula.
