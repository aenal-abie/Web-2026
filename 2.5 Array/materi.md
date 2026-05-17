# Materi Array di PHP untuk Mahasiswa Web 1

## 1. Pengantar Array

Dalam pemrograman PHP, **array** adalah struktur data yang digunakan untuk menyimpan banyak nilai dalam satu variabel.

Tanpa array, kita harus membuat banyak variabel untuk menyimpan data yang sejenis.

Contoh tanpa array:

```php
<?php
$mahasiswa1 = "Andi";
$mahasiswa2 = "Budi";
$mahasiswa3 = "Citra";
?>
```

Cara tersebut tidak efisien jika data mahasiswa berjumlah banyak. Dengan array, semua data dapat disimpan dalam satu variabel.

Contoh menggunakan array:

```php
<?php
$mahasiswa = ["Andi", "Budi", "Citra"];
?>
```

Array sangat penting dalam pengembangan web karena sering digunakan untuk:

- Menyimpan data mahasiswa, produk, user, kategori, nilai, dan transaksi.
- Menampilkan data berulang ke halaman HTML.
- Mengolah data dari form.
- Mengolah data dari database.
- Mengirim atau menerima data dalam bentuk JSON.

## 2. Pengertian Array

Array adalah variabel khusus yang dapat menyimpan lebih dari satu nilai. Setiap nilai di dalam array disebut **elemen**.

Setiap elemen array memiliki penanda yang disebut **index** atau **key**.

Contoh:

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];
?>
```

Penjelasan:

- `"Apel"` berada pada index `0`.
- `"Jeruk"` berada pada index `1`.
- `"Mangga"` berada pada index `2`.

> Catatan penting: pada array numerik di PHP, index dimulai dari angka `0`, bukan `1`.

## 3. Jenis-Jenis Array di PHP

PHP memiliki tiga jenis array utama:

1. **Array numerik**, yaitu array yang menggunakan index angka.
2. **Array asosiatif**, yaitu array yang menggunakan key berupa teks.
3. **Array multidimensi**, yaitu array yang berisi array lain.

## 4. Array Numerik

Array numerik adalah array yang menggunakan index berupa angka.

Contoh:

```php
<?php
$namaMahasiswa = ["Andi", "Budi", "Citra", "Dewi"];

echo $namaMahasiswa[0]; // Output: Andi
echo $namaMahasiswa[1]; // Output: Budi
?>
```

Penjelasan:

- Index `0` berisi `"Andi"`.
- Index `1` berisi `"Budi"`.
- Index `2` berisi `"Citra"`.
- Index `3` berisi `"Dewi"`.

Array numerik cocok digunakan untuk data yang sifatnya berurutan, misalnya daftar nama, daftar angka, daftar mata kuliah, atau daftar kategori.

Contoh lain:

```php
<?php
$nilai = [80, 75, 90, 85];

echo "Nilai pertama: " . $nilai[0];
?>
```

## 5. Array Asosiatif

Array asosiatif adalah array yang menggunakan key berupa teks atau nama tertentu.

Array ini cocok untuk menyimpan data yang memiliki identitas jelas, misalnya data mahasiswa dengan nama, NIM, jurusan, dan semester.

Contoh:

```php
<?php
$mahasiswa = [
    "nim" => "230101001",
    "nama" => "Andi Saputra",
    "jurusan" => "Teknik Informatika",
    "semester" => 2
];

echo $mahasiswa["nama"];    // Output: Andi Saputra
echo $mahasiswa["jurusan"]; // Output: Teknik Informatika
?>
```

Penjelasan:

- Key `"nim"` berisi `"230101001"`.
- Key `"nama"` berisi `"Andi Saputra"`.
- Key `"jurusan"` berisi `"Teknik Informatika"`.
- Key `"semester"` berisi `2`.

Array asosiatif lebih mudah dibaca karena key menjelaskan isi datanya.

## 6. Array Multidimensi

Array multidimensi adalah array yang berisi array lain di dalamnya.

Array jenis ini sering digunakan untuk menyimpan kumpulan data yang lebih kompleks, misalnya banyak data mahasiswa.

Contoh:

```php
<?php
$dataMahasiswa = [
    [
        "nim" => "230101001",
        "nama" => "Andi Saputra",
        "jurusan" => "Teknik Informatika"
    ],
    [
        "nim" => "230101002",
        "nama" => "Budi Santoso",
        "jurusan" => "Sistem Informasi"
    ],
    [
        "nim" => "230101003",
        "nama" => "Citra Lestari",
        "jurusan" => "Teknik Informatika"
    ]
];

echo $dataMahasiswa[0]["nama"]; // Output: Andi Saputra
echo $dataMahasiswa[1]["nim"];  // Output: 230101002
?>
```

Penjelasan:

- `$dataMahasiswa[0]` adalah data mahasiswa pertama.
- `$dataMahasiswa[1]` adalah data mahasiswa kedua.
- `$dataMahasiswa[0]["nama"]` mengambil nama dari mahasiswa pertama.

Array multidimensi sangat sering digunakan saat menampilkan data tabel di halaman web.

## 7. Cara Membuat Array di PHP

Ada dua cara umum untuk membuat array di PHP.

### A. Menggunakan tanda kurung siku

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];
?>
```

### B. Menggunakan fungsi `array()`

```php
<?php
$buah = array("Apel", "Jeruk", "Mangga");
?>
```

Pada PHP modern, penggunaan `[]` lebih sering dipakai karena lebih singkat dan mudah dibaca.

## 8. Menambahkan Elemen ke Array

Elemen baru dapat ditambahkan ke dalam array dengan beberapa cara.

Contoh array numerik:

```php
<?php
$buah = ["Apel", "Jeruk"];
$buah[] = "Mangga";

print_r($buah);
?>
```

Output:

```text
Array
(
    [0] => Apel
    [1] => Jeruk
    [2] => Mangga
)
```

Contoh array asosiatif:

```php
<?php
$mahasiswa = [
    "nim" => "230101001",
    "nama" => "Andi"
];

$mahasiswa["jurusan"] = "Teknik Informatika";

print_r($mahasiswa);
?>
```

## 9. Mengubah Elemen Array

Nilai dalam array dapat diubah dengan memanggil index atau key-nya.

Contoh array numerik:

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];
$buah[1] = "Pisang";

echo $buah[1]; // Output: Pisang
?>
```

Contoh array asosiatif:

```php
<?php
$mahasiswa = [
    "nama" => "Andi",
    "semester" => 2
];

$mahasiswa["semester"] = 3;

echo $mahasiswa["semester"]; // Output: 3
?>
```

## 10. Menghapus Elemen Array

Untuk menghapus elemen array, gunakan fungsi `unset()`.

Contoh:

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];
unset($buah[1]);

print_r($buah);
?>
```

Output:

```text
Array
(
    [0] => Apel
    [2] => Mangga
)
```

Setelah `unset()`, index tidak otomatis tersusun ulang. Jika ingin menyusun ulang index, gunakan `array_values()`.

Contoh:

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];
unset($buah[1]);
$buah = array_values($buah);

print_r($buah);
?>
```

## 11. Menampilkan Isi Array

Ada beberapa cara untuk menampilkan isi array.

### A. Menggunakan `echo` untuk satu elemen

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];
echo $buah[0];
?>
```

### B. Menggunakan `print_r()` untuk melihat struktur array

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];
print_r($buah);
?>
```

### C. Menggunakan `var_dump()` untuk melihat struktur dan tipe data

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];
var_dump($buah);
?>
```

Perbedaan:

- `echo` digunakan untuk menampilkan nilai tunggal.
- `print_r()` digunakan untuk menampilkan isi array dengan format yang mudah dibaca.
- `var_dump()` digunakan untuk debugging karena menampilkan tipe data dan panjang data.

## 12. Perulangan pada Array

Array sering ditampilkan menggunakan perulangan.

### A. Menggunakan `for`

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];

for ($i = 0; $i < count($buah); $i++) {
    echo $buah[$i] . "<br>";
}
?>
```

Penjelasan:

- `count($buah)` menghitung jumlah elemen array.
- `$i` dimulai dari `0` karena index array dimulai dari `0`.

### B. Menggunakan `foreach`

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];

foreach ($buah as $item) {
    echo $item . "<br>";
}
?>
```

`foreach` lebih sering digunakan untuk array karena lebih sederhana dan mudah dibaca.

### C. `foreach` dengan key dan value

```php
<?php
$mahasiswa = [
    "nim" => "230101001",
    "nama" => "Andi Saputra",
    "jurusan" => "Teknik Informatika"
];

foreach ($mahasiswa as $key => $value) {
    echo $key . ": " . $value . "<br>";
}
?>
```

Output:

```text
nim: 230101001
nama: Andi Saputra
jurusan: Teknik Informatika
```

## 13. Menampilkan Array ke dalam Tabel HTML

Dalam pemrograman web, array sering digunakan untuk menampilkan data ke tabel HTML.

Contoh kasus: menampilkan daftar mahasiswa ke dalam tabel.

```php
<?php
$dataMahasiswa = [
    [
        "nim" => "230101001",
        "nama" => "Andi Saputra",
        "jurusan" => "Teknik Informatika",
        "nilai" => 85
    ],
    [
        "nim" => "230101002",
        "nama" => "Budi Santoso",
        "jurusan" => "Sistem Informasi",
        "nilai" => 78
    ],
    [
        "nim" => "230101003",
        "nama" => "Citra Lestari",
        "jurusan" => "Teknik Informatika",
        "nilai" => 92
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Nilai</th>
        </tr>

        <?php foreach ($dataMahasiswa as $index => $mhs): ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= $mhs["nim"]; ?></td>
                <td><?= $mhs["nama"]; ?></td>
                <td><?= $mhs["jurusan"]; ?></td>
                <td><?= $mhs["nilai"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
```

Penjelasan:

- `$dataMahasiswa` menyimpan banyak data mahasiswa.
- `foreach` digunakan untuk membaca setiap data mahasiswa.
- `$index + 1` digunakan agar nomor dimulai dari `1`.
- `$mhs["nim"]`, `$mhs["nama"]`, `$mhs["jurusan"]`, dan `$mhs["nilai"]` digunakan untuk mengambil data berdasarkan key.

## 14. Fungsi-Fungsi Array yang Sering Digunakan

PHP menyediakan banyak fungsi bawaan untuk mengolah array.

| Fungsi | Kegunaan |
| --- | --- |
| `count()` | Menghitung jumlah elemen array. |
| `array_push()` | Menambahkan elemen ke akhir array. |
| `array_pop()` | Menghapus elemen terakhir array. |
| `array_shift()` | Menghapus elemen pertama array. |
| `array_unshift()` | Menambahkan elemen ke awal array. |
| `in_array()` | Memeriksa apakah sebuah nilai ada di dalam array. |
| `array_keys()` | Mengambil semua key dari array. |
| `array_values()` | Mengambil semua value dari array dan menyusun ulang index. |
| `sort()` | Mengurutkan array secara menaik. |
| `rsort()` | Mengurutkan array secara menurun. |

Contoh `count()`:

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];
echo count($buah); // Output: 3
?>
```

Contoh `array_push()`:

```php
<?php
$buah = ["Apel", "Jeruk"];
array_push($buah, "Mangga", "Pisang");
print_r($buah);
?>
```

Contoh `in_array()`:

```php
<?php
$buah = ["Apel", "Jeruk", "Mangga"];

if (in_array("Jeruk", $buah)) {
    echo "Jeruk tersedia";
} else {
    echo "Jeruk tidak tersedia";
}
?>
```

Contoh `sort()`:

```php
<?php
$angka = [30, 10, 20];
sort($angka);
print_r($angka);
?>
```

## 15. Contoh Kasus 1: Menghitung Rata-Rata Nilai Mahasiswa

Masalah: sebuah kelas memiliki beberapa nilai mahasiswa. Buat program untuk menghitung total nilai dan rata-rata nilai.

```php
<?php
$nilai = [80, 75, 90, 85, 70];

$total = 0;

foreach ($nilai as $n) {
    $total += $n;
}

$rataRata = $total / count($nilai);

echo "Total nilai: " . $total . "<br>";
echo "Rata-rata nilai: " . $rataRata;
?>
```

Penjelasan:

- `$nilai` berisi daftar nilai mahasiswa.
- `$total` digunakan untuk menyimpan jumlah seluruh nilai.
- `foreach` membaca setiap nilai di dalam array.
- `$total += $n` berarti nilai `$n` ditambahkan ke `$total`.
- `count($nilai)` digunakan untuk menghitung jumlah data nilai.
- Rata-rata diperoleh dari total nilai dibagi jumlah data.

## 16. Contoh Kasus 2: Menentukan Kelulusan Mahasiswa

Masalah: setiap mahasiswa memiliki nilai. Mahasiswa dinyatakan lulus jika nilainya minimal `75`.

```php
<?php
$mahasiswa = [
    ["nama" => "Andi", "nilai" => 85],
    ["nama" => "Budi", "nilai" => 70],
    ["nama" => "Citra", "nilai" => 90],
    ["nama" => "Dewi", "nilai" => 60]
];

foreach ($mahasiswa as $mhs) {
    echo "Nama: " . $mhs["nama"] . "<br>";
    echo "Nilai: " . $mhs["nilai"] . "<br>";

    if ($mhs["nilai"] >= 75) {
        echo "Status: Lulus";
    } else {
        echo "Status: Tidak Lulus";
    }

    echo "<hr>";
}
?>
```

Penjelasan:

- Data mahasiswa disimpan dalam array multidimensi.
- Setiap mahasiswa memiliki key `"nama"` dan `"nilai"`.
- `foreach` digunakan untuk membaca setiap mahasiswa.
- `if` digunakan untuk menentukan status kelulusan.

## 17. Contoh Kasus 3: Menampilkan Daftar Produk

Masalah: sebuah toko online sederhana ingin menampilkan daftar produk berisi nama produk, harga, dan stok.

```php
<?php
$produk = [
    [
        "nama" => "Keyboard",
        "harga" => 150000,
        "stok" => 10
    ],
    [
        "nama" => "Mouse",
        "harga" => 75000,
        "stok" => 25
    ],
    [
        "nama" => "Monitor",
        "harga" => 1200000,
        "stok" => 5
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
</head>
<body>
    <h2>Daftar Produk</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Keterangan</th>
        </tr>

        <?php foreach ($produk as $index => $item): ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= $item["nama"]; ?></td>
                <td>Rp<?= number_format($item["harga"], 0, ",", "."); ?></td>
                <td><?= $item["stok"]; ?></td>
                <td>
                    <?php
                    if ($item["stok"] > 0) {
                        echo "Tersedia";
                    } else {
                        echo "Habis";
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
```

Penjelasan:

- Array `$produk` berisi beberapa data produk.
- Setiap produk memiliki nama, harga, dan stok.
- `number_format()` digunakan untuk menampilkan harga dalam format rupiah.
- Jika stok lebih dari `0`, produk dinyatakan tersedia.

## 18. Contoh Kasus 4: Mengolah Data dari Form Checkbox

Dalam web, array sering digunakan saat form mengirim banyak data sekaligus. Contoh paling umum adalah checkbox.

File `form_hobi.php`:

```html
<form method="post" action="proses_hobi.php">
    <label>
        <input type="checkbox" name="hobi[]" value="Membaca">
        Membaca
    </label><br>

    <label>
        <input type="checkbox" name="hobi[]" value="Olahraga">
        Olahraga
    </label><br>

    <label>
        <input type="checkbox" name="hobi[]" value="Musik">
        Musik
    </label><br>

    <button type="submit">Kirim</button>
</form>
```

File `proses_hobi.php`:

```php
<?php
if (isset($_POST["hobi"])) {
    $hobi = $_POST["hobi"];

    echo "Hobi yang dipilih:<br>";

    foreach ($hobi as $item) {
        echo "- " . htmlspecialchars($item) . "<br>";
    }
} else {
    echo "Tidak ada hobi yang dipilih.";
}
?>
```

Penjelasan:

- `name="hobi[]"` membuat data checkbox dikirim sebagai array.
- `$_POST["hobi"]` berisi daftar hobi yang dipilih.
- `isset()` digunakan untuk memeriksa apakah data hobi ada.
- `foreach` digunakan untuk menampilkan semua hobi.
- `htmlspecialchars()` digunakan agar output lebih aman saat ditampilkan ke HTML.

## 19. Hubungan Array dengan Database

Saat mengambil data dari database menggunakan PHP, hasil query biasanya dibaca dalam bentuk array.

Contoh sederhana:

```php
<?php
$mahasiswa = [
    "nim" => "230101001",
    "nama" => "Andi Saputra",
    "jurusan" => "Teknik Informatika"
];

echo $mahasiswa["nama"];
?>
```

Pada aplikasi nyata, data seperti ini biasanya berasal dari tabel database. Misalnya tabel mahasiswa:

| nim | nama | jurusan |
| --- | --- | --- |
| 230101001 | Andi Saputra | Teknik Informatika |
| 230101002 | Budi Santoso | Sistem Informasi |

Ketika data tersebut diambil menggunakan PHP, setiap baris dapat diperlakukan seperti array asosiatif:

```php
<?php
echo $row["nim"];
echo $row["nama"];
echo $row["jurusan"];
?>
```

Jadi, memahami array adalah dasar penting sebelum mahasiswa belajar CRUD dan database.

## 20. Kesalahan Umum Saat Menggunakan Array

Beberapa kesalahan yang sering terjadi:

### 1. Salah index

```php
<?php
$buah = ["Apel", "Jeruk"];
echo $buah[2]; // Salah, karena index 2 tidak ada
?>
```

Solusi: pastikan index tersedia sebelum digunakan.

### 2. Salah menulis key

```php
<?php
$mahasiswa = ["nama" => "Andi"];
echo $mahasiswa["Nama"]; // Salah, karena key "Nama" berbeda dengan "nama"
?>
```

Catatan: key array bersifat case-sensitive. Artinya, `"nama"` dan `"Nama"` dianggap berbeda.

### 3. Lupa menggunakan tanda `[]` pada checkbox

Salah:

```html
<input type="checkbox" name="hobi" value="Membaca">
```

Benar:

```html
<input type="checkbox" name="hobi[]" value="Membaca">
```

### 4. Menggunakan `echo` langsung untuk menampilkan array

Salah:

```php
<?php
$buah = ["Apel", "Jeruk"];
echo $buah; // Salah
?>
```

Benar:

```php
<?php
print_r($buah);
?>
```

## 21. Tips Memahami Array

Tips belajar array untuk mahasiswa:

1. Bayangkan array sebagai lemari data. Setiap laci memiliki nomor atau label.
2. Gunakan array numerik untuk data berurutan, seperti daftar buah, daftar nilai, atau daftar nama.
3. Gunakan array asosiatif untuk data yang memiliki identitas, seperti data mahasiswa, data produk, atau data user.
4. Gunakan array multidimensi untuk kumpulan data, seperti daftar mahasiswa, daftar produk, atau daftar transaksi.
5. Biasakan menggunakan `foreach` karena sangat cocok untuk membaca isi array di PHP.
6. Gunakan `print_r()` atau `var_dump()` saat debugging.

## 22. Latihan

### Latihan 1

Buat array berisi 5 nama teman, lalu tampilkan semua nama menggunakan `foreach`.

### Latihan 2

Buat array asosiatif untuk menyimpan data diri:

- Nama
- NIM
- Jurusan
- Semester

Tampilkan data tersebut ke halaman web.

### Latihan 3

Buat array multidimensi berisi 5 data mahasiswa. Setiap mahasiswa memiliki:

- NIM
- Nama
- Nilai

Tampilkan data dalam tabel HTML dan tentukan status lulus atau tidak lulus.

### Latihan 4

Buat daftar produk toko sederhana. Setiap produk memiliki:

- Nama produk
- Harga
- Stok

Tampilkan dalam tabel HTML. Jika stok `0`, tampilkan keterangan `"Habis"`. Jika stok lebih dari `0`, tampilkan `"Tersedia"`.

### Latihan 5

Buat form pilihan hobi menggunakan checkbox. Setelah form dikirim, tampilkan semua hobi yang dipilih oleh user.

## 23. Kesimpulan

Array adalah struktur data penting dalam PHP yang digunakan untuk menyimpan banyak nilai dalam satu variabel. Array membuat program lebih rapi, efisien, dan mudah dikembangkan.

Jenis array utama dalam PHP adalah:

- **Array numerik**, yaitu array dengan index angka.
- **Array asosiatif**, yaitu array dengan key berupa teks.
- **Array multidimensi**, yaitu array yang berisi array lain.

Dalam pengembangan web, array banyak digunakan untuk menampilkan data, mengolah input form, membaca data dari database, dan membangun aplikasi dinamis. Karena itu, penguasaan array merupakan fondasi penting sebelum mempelajari topik PHP lanjutan seperti CRUD, session, login, database, dan framework.
