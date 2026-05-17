# Panduan Lengkap Struktur Kondisi (Percabangan) dalam PHP

Di dalam bahasa pemrograman PHP, **struktur kondisi** atau **percabangan (branching)** digunakan untuk mengontrol alur eksekusi program. Dengan struktur kondisi, kita dapat membuat program "mengambil keputusan" untuk menjalankan blok kode tertentu berdasarkan suatu kondisi atau syarat yang dievaluasi menjadi benar (`true`) atau salah (`false`).

Berikut adalah pembahasan detail dan komprehensif mengenai struktur kondisi dalam PHP beserta contoh-contohnya.

---

## 1. Struktur `if`

Struktur `if` adalah bentuk percabangan paling dasar. Blok kode di dalam `if` **hanya akan dieksekusi jika kondisi di dalamnya bernilai benar (`true`)**. Jika salah, program akan mengabaikan blok kode tersebut dan melanjutkan ke baris berikutnya.

### **Sintaks Dasar**
```php
if (kondisi) {
    // Kode yang dieksekusi jika kondisi bernilai true
}
```

### **Contoh 1: Pengecekan Syarat Sederhana**
```php
<?php
$nilai = 80;

if ($nilai >= 75) {
    echo "Selamat, Anda Lulus!";
}
// Output: Selamat, Anda Lulus!
?>
```

### **Contoh 2: Pengecekan Usia Minimal**
```php
<?php
$umur = 20;

if ($umur >= 17) {
    echo "Anda sudah berhak membuat KTP.";
}
// Output: Anda sudah berhak membuat KTP.
?>
```

### **Contoh 3: Pengecekan Status Variabel/Boolean**
```php
<?php
$is_admin = true;

if ($is_admin) {
    echo "Akses menu konfigurasi dibuka.";
}
// Output: Akses menu konfigurasi dibuka.
?>
```

---

## 2. Struktur `if...else`

Struktur `if...else` menyediakan alternatif jika kondisi `if` tidak terpenuhi. Jika kondisi `if` bernilai `false`, maka program akan mengeksekusi blok kode yang ada di dalam `else`.

### **Sintaks Dasar**
```php
if (kondisi) {
    // Kode dieksekusi jika true
} else {
    // Kode dieksekusi jika false
}
```

### **Contoh 1: Penentuan Lulus atau Gagal**
```php
<?php
$nilai = 60;

if ($nilai >= 75) {
    echo "Anda Lulus!";
} else {
    echo "Mohon maaf, Anda belum lulus. Silakan remedial.";
}
// Output: Mohon maaf, Anda belum lulus. Silakan remedial.
?>
```

### **Contoh 2: Penentuan Bilangan Genap atau Ganjil**
```php
<?php
$angka = 7;

if ($angka % 2 == 0) {
    echo "Angka $angka adalah Genap.";
} else {
    echo "Angka $angka adalah Ganjil.";
}
// Output: Angka 7 adalah Ganjil.
?>
```

### **Contoh 3: Verifikasi Akses Password**
```php
<?php
$password_input = "12345";
$password_benar = "rahasia";

if ($password_input == $password_benar) {
    echo "Login berhasil!";
} else {
    echo "Login gagal. Password salah.";
}
// Output: Login gagal. Password salah.
?>
```

---

## 3. Struktur `if...elseif...else`

Struktur ini digunakan apabila terdapat **lebih dari dua kondisi/kemungkinan**. `elseif` (ditulis menyambung atau dipisah `else if`) memungkinkan kita membuat rantai pengecekan kondisi.

### **Sintaks Dasar**
```php
if (kondisi1) {
    // Eksekusi jika kondisi1 true
} elseif (kondisi2) {
    // Eksekusi jika kondisi2 true
} else {
    // Eksekusi jika semua kondisi di atas false
}
```

### **Contoh 1: Konversi Nilai Angka ke Huruf**
```php
<?php
$nilai = 85;

if ($nilai >= 90) {
    echo "Grade: A";
} elseif ($nilai >= 80) {
    echo "Grade: B";
} elseif ($nilai >= 70) {
    echo "Grade: C";
} else {
    echo "Grade: D";
}
// Output: Grade: B
?>
```

### **Contoh 2: Ucapan Salam Berdasarkan Waktu**
```php
<?php
$jam = 14; // Menggunakan format 24 jam

if ($jam >= 5 && $jam < 12) {
    echo "Selamat Pagi!";
} elseif ($jam >= 12 && $jam < 15) {
    echo "Selamat Siang!";
} elseif ($jam >= 15 && $jam < 18) {
    echo "Selamat Sore!";
} else {
    echo "Selamat Malam!";
}
// Output: Selamat Siang!
?>
```

### **Contoh 3: Penentuan Diskon Belanja**
```php
<?php
$total_belanja = 150000;

if ($total_belanja >= 500000) {
    echo "Anda mendapat diskon 20%";
} elseif ($total_belanja >= 200000) {
    echo "Anda mendapat diskon 10%";
} elseif ($total_belanja >= 100000) {
    echo "Anda mendapat diskon 5%";
} else {
    echo "Anda tidak mendapat diskon";
}
// Output: Anda mendapat diskon 5%
?>
```

---

## 4. Struktur `switch...case`

Struktur `switch` adalah alternatif dari deretan `if...elseif` yang panjang. `switch` sangat cocok digunakan jika Anda ingin **membandingkan satu buah variabel dengan banyak nilai spesifik** (biasanya angka atau teks). 

*Catatan: Selalu ingat untuk meletakkan perintah `break;` di akhir setiap blok `case` agar kode di bawahnya tidak ikut dieksekusi.*

### **Sintaks Dasar**
```php
switch (variabel) {
    case nilai1:
        // Eksekusi jika variabel == nilai1
        break;
    case nilai2:
        // Eksekusi jika variabel == nilai2
        break;
    default:
        // Eksekusi jika tidak ada case yang cocok (seperti 'else')
        break;
}
```

### **Contoh 1: Terjemahan Hari**
```php
<?php
$hari = "Sunday";

switch ($hari) {
    case "Monday":
        echo "Hari Senin";
        break;
    case "Tuesday":
        echo "Hari Selasa";
        break;
    case "Sunday":
        echo "Hari Minggu";
        break;
    default:
        echo "Hari tidak dikenali";
        break;
}
// Output: Hari Minggu
?>
```

### **Contoh 2: Menu Pilihan Sederhana (Menu Navigasi)**
```php
<?php
$menu = 2;

switch ($menu) {
    case 1:
        echo "Membuka halaman Profil";
        break;
    case 2:
        echo "Membuka halaman Pengaturan";
        break;
    case 3:
        echo "Keluar dari Sistem (Logout)";
        break;
    default:
        echo "Pilihan menu tidak valid.";
        break;
}
// Output: Membuka halaman Pengaturan
?>
```

### **Contoh 3: Penggabungan Multiple Cases (Tanpa Break)**
Jika beberapa nilai memiliki output atau perlakuan yang sama, Anda bisa menumpuk `case` tanpa menuliskan `break` di setiap case, seperti contoh pengecekan huruf vokal berikut:
```php
<?php
$huruf = 'a';

switch (strtolower($huruf)) {
    case 'a':
    case 'i':
    case 'u':
    case 'e':
    case 'o':
        echo "Huruf '$huruf' adalah huruf Vokal.";
        break;
    default:
        echo "Huruf '$huruf' adalah huruf Konsonan.";
        break;
}
// Output: Huruf 'a' adalah huruf Vokal.
?>
```

---

## Tambahan Tambahan Khusus: *Ternary Operator* (`? :`)

PHP juga memiliki bentuk *shortcut* (jalan pintas) untuk struktur `if...else` yang sangat sederhana yang disebut sebagai **Ternary Operator**. Sangat cocok jika Anda hanya mengembalikan atau mengisi suatu nilai (value).

### **Sintaks Dasar**
```php
$variabel = (kondisi) ? "Nilai jika True" : "Nilai jika False";
```

### **Contoh Penggunaan Ternary**
```php
<?php
$nilai = 80;

// Jika nilai >= 75, status lulus, jika tidak maka gagal
$status = ($nilai >= 75) ? "Lulus" : "Gagal";

echo "Status Ujian Anda: " . $status;
// Output: Status Ujian Anda: Lulus
?>
```

---

## Kesimpulan: Kapan Menggunakan Apa?

1. **Gunakan `if` tunggal**: Jika Anda hanya punya 1 kondisi, dan jika salah, program tidak perlu melakukan apa-apa.
2. **Gunakan `if...else`**: Jika Anda punya persis 2 jalan yang berlawanan (misal: Lulus/Gagal, Benar/Salah, Genap/Ganjil).
3. **Gunakan `if...elseif...else`**: Jika Anda memiliki banyak kondisi yang harus dicek secara hierarkis (misal: Rentang Nilai > 90, > 80, > 70).
4. **Gunakan `switch...case`**: Jika Anda harus membandingkan **satu buah variabel/nilai spesifik** dengan **banyak kecocokan pasti** (misal: "Senin", "Selasa", 1, 2, 3), karena kode akan terlihat lebih rapi dan terstruktur ketimbang if-else bersarang.
5. **Gunakan *Ternary***: Jika Anda hanya ingin mengecek `if...else` sederhana dalam satu baris (biasanya untuk memberikan isi pada variabel).
