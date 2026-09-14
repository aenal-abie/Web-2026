# Pengantar PHP (PHP: Hypertext Preprocessor)

## 1. Apa itu PHP?
PHP (awalnya merupakan singkatan dari *Personal Home Page*, sekarang secara rekursif menjadi *PHP: Hypertext Preprocessor*) adalah bahasa pemrograman *server-side scripting* yang dirancang secara khusus untuk pengembangan web (Web Development). Karena berjalan di sisi server, kode PHP tidak akan terlihat oleh pengguna (client), yang terlihat di *browser* hanyalah hasil dari eksekusi berupa HTML, CSS, dan JavaScript murni.

## 2. Mengapa Belajar dan Menggunakan PHP?
- **Populer dan Banyak Digunakan**: Mayoritas website di seluruh dunia (termasuk CMS raksasa seperti WordPress) dibangun menggunakan PHP.
- **Gratis (Open Source)**: PHP sepenuhnya gratis dan bebas dikembangkan atau digunakan.
- **Lintas Platform**: PHP dapat dijalankan di berbagai sistem operasi seperti Windows, Linux, dan macOS.
- **Kompatibel dengan Banyak Database**: PHP memiliki dukungan yang luar biasa untuk MySQL, PostgreSQL, Oracle, Sybase, dan lain-lain.
- **Komunitas Besar**: Sangat mudah mencari dokumentasi, tutorial, atau bantuan jika terjadi *error*.

---

## 3. Cara Kerja PHP (Client-Server Architecture)
Berbeda dengan HTML atau JavaScript yang dieksekusi langsung oleh *Browser*, alur kerja PHP adalah sebagai berikut:
1. Client (Pengguna) meminta sebuah halaman web melalui Browser.
2. Server menerima permintaan (Request) tersebut.
3. Jika halaman yang diminta memiliki ekstensi `.php`, *Web Server* (seperti Apache/Nginx) akan menyerahkannya kepada mesin PHP untuk diproses.
4. Mesin PHP menjalankan kode, berkomunikasi dengan Database (jika perlu), dan menghasilkan kode HTML murni.
5. HTML murni tersebut dikirim kembali (Response) ke Browser milik Pengguna untuk ditampilkan.

---

## 4. Persiapan Lingkungan Kerja (Environment)
Untuk menjalankan PHP di komputer lokal Anda, dibutuhkan sebuah "Web Server Lokal". Anda bisa menginstal *bundle software* seperti XAMPP, MAMP, atau Laragon.

### **Panduan Setup XAMPP di Windows**
XAMPP adalah paket perangkat lunak yang paling disarankan untuk pemula. Di dalamnya sudah terdapat Apache (sebagai Web Server), MySQL/MariaDB (untuk Database), dan modul utama PHP.

**Langkah-langkah Instalasi dan Menjalankan XAMPP:**
1. **Unduh XAMPP:** Kunjungi situs resmi [Apache Friends](https://www.apachefriends.org/) dan pilih installer XAMPP untuk OS Windows.
2. **Jalankan Installer:** Klik dua kali file yang sudah diunduh (contoh: `xampp-windows-x64-installer.exe`).
3. **Pilih Komponen:** Biarkan pengaturan default (pastikan Apache, MySQL, PHP, dan phpMyAdmin tercentang), lalu klik *Next*.
4. **Pilih Folder Instalasi:** Secara default akan diinstal di `C:\xampp`. Sangat disarankan untuk tidak mengubah lokasi ini kecuali diperlukan. Klik *Next* hingga instalasi selesai.
5. **Buka XAMPP Control Panel:** Setelah selesai, jalankan *XAMPP Control Panel*. Anda akan melihat beberapa modul di sana.
6. **Nyalakan Server:** Klik tombol **Start** pada baris **Apache**. (Jika Anda butuh database nanti, klik juga Start pada MySQL). Jika berhasil, modul Apache akan berubah warna menjadi hijau.
7. **Buat Folder Proyek:** Buka Windows Explorer dan arahkan ke `C:\xampp\htdocs`. Di sinilah letak folder penyimpanan proyek web Anda. Buat folder baru (misal: `C:\xampp\htdocs\belajar-php`).
8. **Test Web Server:** Buka browser kesayangan Anda dan ketikkan alamat URL: `http://localhost/belajar-php`. File PHP yang Anda letakkan di folder tersebut akan otomatis dieksekusi!

---

## 5. Sintaks Dasar PHP

Sebuah blok (script) PHP dapat diletakkan di mana saja di dalam dokumen. Script ini **selalu diawali** dengan tag `<?php` dan **diakhiri** dengan tag `?>`.

Setiap pernyataan (statement) dalam PHP wajib diakhiri dengan titik koma (`;`).

### **Contoh 1: Hello World**
```php
<?php
// Menampilkan teks ke layar menggunakan echo
echo "Halo, Dunia! Ini adalah program PHP pertama saya.";
?>
```

### **Contoh 2: PHP yang Disisipkan dalam HTML**
Anda bisa menggabungkan PHP langsung di dalam elemen HTML.
```php
<!DOCTYPE html>
<html>
<body>

<h1>Halaman Utama</h1>

<?php
echo "<p>Paragraf ini dihasilkan secara dinamis menggunakan PHP.</p>";
?>

</body>
</html>
```

---

## 6. Variabel dan Tipe Data Dasar PHP

Variabel digunakan sebagai wadah/tempat untuk menyimpan nilai (data). 
Aturan penulisan variabel di PHP:
1. Variabel selalu diawali dengan tanda dolar (`$`).
2. Setelah tanda `$`, variabel harus diawali dengan huruf atau garis bawah (`_`), tidak boleh diawali dengan angka.
3. Variabel PHP bersifat *case-sensitive* (huruf besar dan kecil dianggap berbeda: `$nama` berbeda dengan `$Nama`).
4. Anda tidak perlu mendeklarasikan tipe datanya, PHP akan menentukannya secara otomatis (Loosely Typed Language).

### **Contoh Deklarasi Variabel**
```php
<?php
$nama_lengkap = "Budi Santoso"; // Tipe data String (teks)
$umur = 20;                     // Tipe data Integer (angka bulat bulat)
$berat_badan = 65.5;            // Tipe data Float (angka desimal)
$status_mahasiswa = true;       // Tipe data Boolean (true/false)

// Menampilkan hasil gabungan (concatenation)
echo "Halo, nama saya $nama_lengkap. Saya berusia $umur tahun.";
?>
```

---

## 7. Memberikan Komentar pada Kode

Komentar adalah baris kode yang **tidak akan dieksekusi** atau dijalankan oleh mesin PHP. Fungsi utamanya adalah sebagai catatan untuk programmer agar lebih mudah memahami kode yang ditulis.

```php
<?php
// Ini adalah komentar satu baris (single-line comment) menggunakan garis miring ganda

# Ini juga komentar satu baris menggunakan tanda pagar

/*
Ini adalah komentar multi-baris (multi-line comment).
Anda dapat menekan enter beberapa kali di sini
karena blok teks diapit oleh tanda miring dan bintang.
*/

echo "Pesan ini akan tercetak di layar.";
?>
```
