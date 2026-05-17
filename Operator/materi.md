# Panduan Lengkap Operator dalam PHP

Di dalam PHP, **Operator** adalah simbol atau tanda yang digunakan untuk melakukan operasi pada nilai (values) atau variabel. Operator memungkinkan kita untuk memanipulasi data, melakukan perhitungan matematika, membandingkan nilai, hingga menggabungkan teks (string).

Terdapat beberapa kelompok operator utama di dalam PHP. Berikut adalah penjelasan detail, lengkap, dan mendalam beserta contoh penggunaannya.

---

## 1. Operator Aritmatika (Matematika Dasar)

Operator aritmatika digunakan untuk melakukan perhitungan matematika dasar seperti penjumlahan, pengurangan, perkalian, pembagian, dan sisa hasil bagi (modulus).

| Simbol | Nama | Contoh | Hasil |
| :---: | :--- | :--- | :--- |
| `+` | Penjumlahan (Addition) | `$x + $y` | Menjumlahkan $x dan $y |
| `-` | Pengurangan (Subtraction) | `$x - $y` | Mengurangkan $y dari $x |
| `*` | Perkalian (Multiplication) | `$x * $y` | Mengalikan $x dengan $y |
| `/` | Pembagian (Division) | `$x / $y` | Membagi $x dengan $y |
| `%` | Sisa Bagi (Modulus) | `$x % $y` | Sisa hasil pembagian $x oleh $y |
| `**` | Pangkat (Exponentiation) | `$x ** $y` | Hasil dari $x pangkat $y |

### **Contoh 1: Perhitungan Dasar (Kalkulator Sederhana)**
```php
<?php
$a = 15;
$b = 4;

echo "Penjumlahan: " . ($a + $b) . "<br>"; // 19
echo "Pengurangan: " . ($a - $b) . "<br>"; // 11
echo "Perkalian: " . ($a * $b) . "<br>"; // 60
echo "Pembagian: " . ($a / $b) . "<br>"; // 3.75
?>
```

### **Contoh 2: Penggunaan Modulus (Sisa Bagi)**
Modulus sangat sering digunakan untuk menentukan apakah sebuah bilangan ganjil atau genap.
```php
<?php
$angka = 10;
$sisa = $angka % 3; // 10 dibagi 3 adalah 9, sisa 1

echo "Sisa bagi 10 dibagi 3 adalah: " . $sisa;
?>
```

### **Contoh 3: Operator Pangkat**
```php
<?php
$basis = 5;
$pangkat = 3;

// Sama dengan 5 * 5 * 5
$hasil = $basis ** $pangkat; 

echo "5 pangkat 3 adalah: " . $hasil; // 125
?>
```

---

## 2. Operator Penugasan (Assignment Operators)

Operator penugasan digunakan untuk memberikan atau mengisi nilai (value) ke dalam sebuah variabel. Operator dasar penugasan adalah sama dengan (`=`).

Selain itu, PHP menyediakan "jalan pintas" (shorthand assignment) yang menggabungkan aritmatika dan penugasan sekaligus.

| Simbol | Contoh | Sama Artinya Dengan |
| :---: | :--- | :--- |
| `=` | `$x = $y` | `$x = $y` |
| `+=` | `$x += $y` | `$x = $x + $y` |
| `-=` | `$x -= $y` | `$x = $x - $y` |
| `*=` | `$x *= $y` | `$x = $x * $y` |
| `/=` | `$x /= $y` | `$x = $x / $y` |
| `%=` | `$x %= $y` | `$x = $x % $y` |

### **Contoh 1: Penugasan Standar**
```php
<?php
$umur = 20; // Variabel umur diisi dengan angka 20
$nama = "Andi"; // Variabel nama diisi dengan string "Andi"
?>
```

### **Contoh 2: Penambahan Nilai Kumulatif**
Sangat berguna untuk proses perhitungan total harga seperti di keranjang belanja.
```php
<?php
$total_harga = 50000;
$pajak = 5000;

// Menambahkan pajak ke dalam total harga
$total_harga += $pajak; 

echo "Total yang harus dibayar: " . $total_harga; // 55000
?>
```

### **Contoh 3: Pengurangan Berkala (Simulasi Diskon)**
```php
<?php
$stok_barang = 100;
$barang_terjual = 15;

// Mengurangi jumlah stok barang saat ini dengan barang terjual
$stok_barang -= $barang_terjual;

echo "Sisa stok di gudang: " . $stok_barang; // 85
?>
```

---

## 3. Operator Perbandingan (Comparison Operators)

Digunakan untuk membandingkan dua buah nilai. Operator ini selalu mengembalikan (menghasilkan) nilai boolean, yaitu `true` (benar) atau `false` (salah). Sangat sering dipakai dalam blok *Struktur Kondisi* (`if...else`).

| Simbol | Nama | Penjelasan |
| :---: | :--- | :--- |
| `==` | Sama Dengan | Bernilai true jika nilainya sama (mengabaikan tipe data). |
| `===` | Identik | Bernilai true jika nilai **DAN** tipe datanya persis sama. |
| `!=` atau `<>` | Tidak Sama | Bernilai true jika nilainya tidak sama. |
| `!==` | Tidak Identik | Bernilai true jika nilai atau tipe datanya tidak sama. |
| `<` | Kurang Dari | Bernilai true jika nilai kiri lebih kecil dari kanan. |
| `>` | Lebih Dari | Bernilai true jika nilai kiri lebih besar dari kanan. |
| `<=` | Kurang dari/Sama | Bernilai true jika nilai kiri lebih kecil atau sama dengan kanan. |
| `>=` | Lebih dari/Sama | Bernilai true jika nilai kiri lebih besar atau sama dengan kanan. |

### **Contoh 1: Membandingkan Angka Dasar**
```php
<?php
$a = 10;
$b = 15;

var_dump($a > $b);  // bool(false)
var_dump($a <= $b); // bool(true)
?>
```

### **Contoh 2: Sama Dengan (`==`) vs Identik (`===`)**
Perbedaan mendasar antara keduanya terletak pada *tipe data*.
```php
<?php
$angka = 5;       // Integer
$teks = "5";      // String

// Cek hanya kesamaan NILAI
var_dump($angka == $teks);  // bool(true) -> PHP memaklumi perbedaannya

// Cek kesamaan NILAI dan TIPE DATA
var_dump($angka === $teks); // bool(false) -> karena Integer tidak identik dengan String
?>
```

### **Contoh 3: Operator Tidak Sama Dengan**
```php
<?php
$status = "aktif";

if ($status != "nonaktif") {
    echo "Akun ini sedang bisa digunakan.";
}
// Output: Akun ini sedang bisa digunakan.
?>
```

---

## 4. Operator Logika (Logical Operators)

Digunakan untuk menggabungkan beberapa pernyataan kondisional sekaligus.

| Simbol | Nama | Hasil Bernilai `true` Jika... |
| :---: | :--- | :--- |
| `&&` atau `and` | AND | **KEDUA** kondisi (kiri dan kanan) bernilai `true`. |
| `||` atau `or` | OR | **SALAH SATU** atau kedua kondisi bernilai `true`. |
| `!` | NOT | Membalikkan nilai (jika true menjadi false, jika false menjadi true). |
| `xor` | XOR | **HANYA SALAH SATU** kondisi bernilai `true` (tidak boleh dua-duanya). |

### **Contoh 1: Menggunakan AND (`&&`)**
Syarat kelulusan: Nilai ujian harus di atas 70 **DAN** absensi harus penuh (100).
```php
<?php
$nilai = 85;
$absensi = 100;

if ($nilai > 70 && $absensi == 100) {
    echo "Anda Lulus dengan Sempurna!";
}
// Output: Anda Lulus dengan Sempurna!
?>
```

### **Contoh 2: Menggunakan OR (`||`)**
Bisa mendaftar jika: Usia lebih dari 18 tahun **ATAU** sudah memiliki izin orang tua.
```php
<?php
$usia = 16;
$punya_izin = true;

if ($usia >= 18 || $punya_izin) {
    echo "Pendaftaran Diterima.";
}
// Output: Pendaftaran Diterima.
?>
```

### **Contoh 3: Menggunakan NOT (`!`)**
Berguna untuk membalikkan logika atau mengecek status *kebalikan*.
```php
<?php
$is_login = false;

// Dibaca: "Jika TIDAK sedang login"
if (!$is_login) {
    echo "Silakan login terlebih dahulu untuk melihat dashboard.";
}
// Output: Silakan login terlebih dahulu untuk melihat dashboard.
?>
```

---

## 5. Operator String

Di PHP, operator khusus string hanya ada dua, dan keduanya berfungsi untuk **menggabungkan (Concatenation)** teks.

| Simbol | Nama | Contoh | Hasil |
| :---: | :--- | :--- | :--- |
| `.` | Penggabung Teks | `$teks1 . $teks2` | Menggabungkan isi teks 1 dan 2 |
| `.=` | Penugasan Penggabung | `$teks1 .= $teks2`| Menempelkan teks 2 ke akhir teks 1 |

### **Contoh 1: Penggabungan Sederhana (`.`)**
```php
<?php
$nama_depan = "Budi";
$nama_belakang = "Santoso";

$nama_lengkap = $nama_depan . " " . $nama_belakang;
echo "Halo, " . $nama_lengkap . "!";
// Output: Halo, Budi Santoso!
?>
```

### **Contoh 2: Menambah Teks Tanpa Menghapus (`.=`)**
```php
<?php
$pesan = "Selamat datang ";
$pesan .= "di aplikasi web "; // Teks ini ditambahkan ke belakang
$pesan .= "kami.";

echo $pesan;
// Output: Selamat datang di aplikasi web kami.
?>
```

---

## 6. Operator Increment dan Decrement

Digunakan khusus untuk **menaikkan (increment)** atau **menurunkan (decrement)** nilai sebuah variabel numerik sebanyak 1 poin. Paling sering dijumpai pada blok perulangan (`for` / `while`).

| Simbol | Nama | Efek |
| :---: | :--- | :--- |
| `++$x` | Pre-increment | Menaikkan nilai $x sebesar 1, **lalu** me-return nilainya. |
| `$x++` | Post-increment | Me-return nilai awal $x, **kemudian baru** dinaikkan 1. |
| `--$x` | Pre-decrement | Menurunkan nilai $x sebesar 1, **lalu** me-return nilainya. |
| `$x--` | Post-decrement | Me-return nilai awal $x, **kemudian baru** diturunkan 1. |

### **Contoh 1: Pre-increment vs Post-increment**
```php
<?php
$a = 5;
echo "Post-increment: " . $a++; // Mencetak 5 dahulu, baru memori a berubah menjadi 6
echo "<br>Nilai A sekarang: " . $a; // Menjadi 6

$b = 5;
echo "<br>Pre-increment: " . ++$b; // Memori b diubah jadi 6, langsung mencetak 6
?>
```

### **Contoh 2: Penggunaan Standar di Luar Loop**
```php
<?php
$counter = 10;
$counter--; // Mengurangi 1, menjadikannya 9
$counter--; // Mengurangi 1 lagi, menjadikannya 8

echo "Hitungan tersisa: " . $counter; // 8
?>
```

---

## Kesimpulan

Operator adalah bagian sentral yang tidak akan pernah lepas dari sebuah program. Penggunaannya yang tepat amat sangat mempengaruhi proses dan logika aplikasi yang Anda bangun:
- Gunakan **Operator Aritmatika** saat Anda berhadapan dengan matematika atau perhitungan hitungan.
- Gunakan **Operator Penugasan** untuk mengelola dan menetapkan nilai pada variabel secara dinamis.
- Gunakan **Operator Perbandingan dan Logika** di dalam `if..else` (Struktur Kondisi) untuk membuat sistem keputusan *business rule*.
- Gunakan **Operator String (`.`)** ketika bekerja merangkai teks pesan atau merangkai elemen HTML dalam PHP.
- Gunakan **Operator Increment/Decrement** saat menulis iterasi seperti perulangan *looping*.
