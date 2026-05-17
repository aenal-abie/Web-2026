# Panduan Lengkap HTML Form

Dalam pengembangan web, **HTML Form** adalah elemen krusial yang berfungsi sebagai media interaksi antara pengguna (user) dengan sistem atau server. Melalui form, pengguna bisa menginputkan data seperti teks, pilihan, unggahan file, hingga kata sandi untuk kemudian diproses oleh bahasa *back-end* (seperti PHP).

---

## 1. Struktur Dasar Form `<form>`

Semua komponen masukan data harus dibungkus di dalam tag `<form>` dan ditutup dengan `</form>`. Tag ini memiliki dua atribut yang paling penting:

- **`action`**: Menentukan ke mana (URL/file apa) data tersebut akan dikirimkan untuk diproses setelah tombol submit ditekan.
- **`method`**: Menentukan "cara" pengiriman data tersebut. Ada dua metode utama: `GET` dan `POST`.

### **Sintaks Dasar:**
```html
<form action="proses_data.php" method="POST">
    <!-- Elemen input data diletakkan di sini -->
</form>
```

---

## 2. Mengenal Method `GET` vs `POST`

Pemilihan metode pengiriman data sangat krusial, bergantung pada sifat data yang dikirim.

### **A. Method GET**
- Data yang dikirim akan **ditampilkan secara transparan di alamat URL** browser (contoh: `proses.php?nama=budi&umur=20`).
- Sangat cocok untuk form pencarian (*Search Engine*) atau filter data, di mana URL-nya bisa di-bookmark atau dibagikan.
- **TIDAK BOLEH** digunakan untuk mengirim data sensitif seperti *password*, karena semua orang bisa melihatnya di URL.
- Memiliki batas panjang karakter (tergantung browser, biasanya sekitar 2048 karakter).

### **B. Method POST**
- Data dikirim di "belakang layar" melalui *HTTP Request Body*, sehingga **tidak terlihat di URL**.
- Sangat aman untuk mengirim data rahasia seperti *password*, informasi kartu kredit, atau data registrasi.
- Digunakan untuk mengirim data berukuran besar (seperti unggahan file/gambar) karena kapasitasnya jauh lebih besar daripada `GET`.

---

## 3. Elemen-elemen Form dan Tipe Input

Di dalam form, kita memiliki banyak jenis elemen untuk menerima berbagai tipe masukan dari pengguna.

### **A. Tag `<input>` Dasar dan Atribut `type`**
Tag `<input>` adalah tag mandiri (tidak perlu tag penutup). Elemen ini sangat fleksibel dan memiliki banyak sekali fungsi yang murni dikendalikan oleh **atribut `type`**. Atribut `type` memberitahu browser bagaimana bentuk interaksi yang diharapkan dari kotak input tersebut.

Berikut adalah daftar `type` yang sering digunakan pada HTML5:
1. **`type="text"`**: Input teks biasa satu baris (contoh: nama, kota, pekerjaan).
2. **`type="password"`**: Khusus kata sandi. Karakter yang diketik akan disensor menjadi titik-titik bulat / bintang.
3. **`type="email"`**: Khusus alamat email. Browser akan otomatis memastikan apakah pengguna mengetik format email yang benar (harus ada karakter `@` dan nama domain).
4. **`type="number"`**: Khusus angka numerik. Browser web akan menampilkan tombol panah naik-turun di ujung kotak. Di perangkat seluler, ini akan langsung memunculkan *keyboard* angka.
5. **`type="date"`**: Akan menampilkan kalender (*date picker*) bawaan browser sehingga pengguna tidak perlu mengetik tanggal manual.
6. **`type="time"`**: Menampilkan input waktu (jam dan menit).
7. **`type="color"`**: Memunculkan kotak kecil yang jika diklik akan membuka pemilih warna (*color picker*).
8. **`type="file"`**: Digunakan untuk mengunggah (upload) dokumen, gambar, atau file lainnya dari komputer pengguna.
9. **`type="tel"`**: Khusus untuk nomor telepon genggam. (Di hp memunculkan numpad).
10. **`type="hidden"`**: Menyimpan data yang tidak terlihat oleh pengguna, tetapi akan tetap dikirimkan ke server saat form di-submit (biasanya digunakan untuk mengirimkan kode ID rahasia).

```html
<!-- Contoh Penggunaan Tipe Input -->
<input type="text" name="nama" placeholder="Teks biasa">
<input type="email" name="email_anda" placeholder="contoh@gmail.com">
<input type="file" name="foto_profil">
<input type="color" name="warna_favorit">
```

### **B. Atribut Penting pada `<input>`**
- **`name`**: Atribut wajib! Ini adalah "kunci" atau nama variabel yang akan dibaca oleh PHP (`$_POST['nama']`).
- **`id`**: Identifier unik untuk CSS, JavaScript, atau dihubungkan ke tag `<label>`.
- **`value`**: Nilai *default* / nilai awal yang sudah terisi di dalam kotak input.
- **`placeholder`**: Teks bayangan sebagai petunjuk (hilang saat user mulai mengetik).
- **`required`**: Memaksa user untuk mengisi bidang ini (form tidak bisa di-submit jika ini kosong).

### **C. Tag `<label>`**
Memberikan teks keterangan yang terhubung ke input. Sangat dianjurkan demi aksesibilitas. Jika user mengklik label, browser akan otomatis menaruh kursor di input yang dihubungkan lewat atribut `for` (yang nilainya harus sama dengan `id` input tersebut).

```html
<label for="email_user">Email Anda:</label>
<input type="email" id="email_user" name="email">
```

### **D. Pilihan Tunggal (Radio Button) & Pilihan Ganda (Checkbox)**
- **Radio Button (`type="radio"`)**: Hanya boleh memilih satu dari banyak opsi (seperti Jenis Kelamin). Atribut `name` pada satu kelompok radio button **harus sama persis**.
- **Checkbox (`type="checkbox"`)**: Boleh memilih lebih dari satu (seperti Hobi).

```html
<!-- Radio Button -->
<label>Jenis Kelamin:</label>
<input type="radio" name="gender" value="Laki-laki" id="pria"> <label for="pria">Laki-laki</label>
<input type="radio" name="gender" value="Perempuan" id="wanita"> <label for="wanita">Perempuan</label>

<!-- Checkbox -->
<br>
<label>Hobi:</label>
<input type="checkbox" name="hobi[]" value="Membaca" id="hobi1"> <label for="hobi1">Membaca</label>
<input type="checkbox" name="hobi[]" value="Olahraga" id="hobi2"> <label for="hobi2">Olahraga</label>
```

### **E. Teks Panjang (`<textarea>`)**
Berbeda dengan input biasa, `textarea` digunakan untuk input teks berparagraf-paragraf panjang seperti "Alamat" atau "Komentar". Tag ini memiliki penutup `</textarea>`.

```html
<label for="alamat">Alamat Lengkap:</label><br>
<textarea id="alamat" name="alamat_lengkap" rows="4" cols="50" placeholder="Ketik di sini..."></textarea>
```

### **F. Dropdown Pilihan (`<select>` & `<option>`)**
Digunakan untuk pilihan panjang yang memakan tempat (misal: memilih Agama, Provinsi, Jurusan).

```html
<label for="agama">Agama:</label>
<select name="agama" id="agama">
    <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Katolik">Katolik</option>
    <option value="Hindu">Hindu</option>
    <option value="Buddha">Buddha</option>
</select>
```

### **G. Tombol Form (`submit` vs `reset`)**
- **Submit**: Untuk memproses / mengirim form ke URL tujuan di tag `<form>`.
- **Reset**: Untuk menghapus kembali semua isian di form menjadi kosong seperti semula.

Bisa menggunakan `<input>` atau `<button>`:
```html
<input type="submit" value="Kirim Data">
<input type="reset" value="Kosongkan Form">

<!-- Atau -->
<button type="submit">Kirim Data</button>
```

---

## 4. Contoh Kasus: Formulir Pendaftaran Lengkap

Berikut adalah gabungan semua elemen di atas dalam satu skrip utuh Form Pendaftaran:

```html
<!DOCTYPE html>
<html>
<head>
    <title>Formulir Registrasi</title>
</head>
<body>

    <h2>Form Pendaftaran Akun</h2>
    <!-- Menggunakan POST karena ada data sensitif -->
    <form action="proses.php" method="POST">
        
        <p>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required>
        </p>
        
        <p>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
        </p>

        <p>
            <label for="tgl_lahir">Tanggal Lahir:</label><br>
            <input type="date" id="tgl_lahir" name="tanggal_lahir">
        </p>

        <p>
            <label>Jenis Kelamin:</label><br>
            <input type="radio" id="l" name="jenis_kelamin" value="L"> <label for="l">Laki-laki</label>
            <input type="radio" id="p" name="jenis_kelamin" value="P"> <label for="p">Perempuan</label>
        </p>

        <p>
            <label for="pekerjaan">Pekerjaan:</label><br>
            <select name="pekerjaan" id="pekerjaan">
                <option value="Pelajar/Mahasiswa">Pelajar / Mahasiswa</option>
                <option value="Karyawan">Karyawan Swasta</option>
                <option value="PNS">Pegawai Negeri</option>
                <option value="Wiraswasta">Wiraswasta</option>
            </select>
        </p>

        <p>
            <label for="biodata">Deskripsi Diri:</label><br>
            <textarea id="biodata" name="biodata" rows="5" cols="40" placeholder="Ceritakan tentang Anda..."></textarea>
        </p>

        <p>
            <button type="submit">Daftar Sekarang</button>
            <button type="reset">Ulangi</button>
        </p>

    </form>

</body>
</html>
```

---

## Kesimpulan

Sebuah HTML Form sangat identik dengan atribut **`name`** pada setiap inputannya. Tanpa atribut `name`, data tersebut tidak akan pernah bisa ditangkap atau diproses oleh server / PHP! 
Ingat rumus dasarnya:
- HTML `name="kota"` akan dibaca oleh PHP sebagai `$_POST['kota']`.
- Tentukan struktur `method` yang tepat (gunakan `POST` untuk keamanan dan pengiriman data panjang).
