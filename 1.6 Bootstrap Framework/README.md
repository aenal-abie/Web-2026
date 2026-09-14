# Pengantar Bootstrap Framework

Membuat desain web (styling) menggunakan CSS murni dari awal (seperti mengatur margin, padding, warna, dan responsivitas layar) membutuhkan waktu yang sangat lama dan rumit. Di sinilah **Framework CSS** sangat membantu, dan yang paling populer di dunia saat ini adalah **Bootstrap**.

---

## 1. Apa itu Bootstrap?

**Bootstrap** adalah sebuah kerangka kerja (framework) CSS *open-source* yang menyediakan kumpulan kode CSS dan JavaScript yang sudah dituliskan sebelumnya (*pre-written*). Anda hanya perlu memanggil nama `class`-nya saja di dalam tag HTML, dan elemen tersebut akan langsung memiliki desain yang bagus, modern, dan **Responsif** (bisa menyesuaikan ukuran layar HP, Tablet, maupun Desktop).

**Mengapa menggunakan Bootstrap?**
- Mempercepat proses pembuatan desain halaman web.
- Hasil desain dijamin responsif (*Mobile-First*).
- Menyediakan banyak komponen siap pakai (tombol, tabel, navigasi, form).
- Kompatibel dengan semua browser modern.

---

## 2. Cara Memasang Bootstrap

Cara paling praktis dan cepat untuk menggunakan Bootstrap (tanpa perlu mendownload file) adalah menggunakan **CDN (Content Delivery Network)**. Anda cukup menyalin tautan CSS dan JS mereka ke dalam file HTML Anda.

### **Contoh Pemasangan (Template Awal Bootstrap 5):**
```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Bootstrap</title>
    
    <!-- Link CSS Bootstrap 5 diletakkan di dalam <head> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <h1 class="text-primary text-center mt-5">Halo, Bootstrap!</h1>

    <!-- Script JS Bootstrap diletakkan tepat sebelum tutup </body> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

---

## 3. Sistem Grid (Grid System)

Ini adalah keunggulan utama Bootstrap. Grid system Bootstrap memungkinkan Anda membagi lebar layar menjadi **12 kolom**. Anda bisa menentukan seberapa banyak kolom yang ingin dipakai oleh sebuah elemen.

Aturan wajib Grid Bootstrap:
1. Harus dibungkus dengan `.container` atau `.container-fluid`.
2. Di dalam container, harus ada baris yang ditandai dengan class `.row`.
3. Di dalam baris, barulah diisi dengan kolom menggunakan class `.col-`.

### **Contoh Grid Dasar:**
```html
<div class="container">
    <div class="row">
        <!-- Kotak ini akan mengambil 6 dari 12 kolom (Setengah layar) -->
        <div class="col-6 bg-warning">
            Kiri (50%)
        </div>
        
        <!-- Kotak ini juga mengambil 6 kolom -->
        <div class="col-6 bg-info">
            Kanan (50%)
        </div>
    </div>
</div>
```

---

## 4. Warna di Bootstrap (Utility Colors)

Daripada menulis kode hex panjang-panjang, Bootstrap sudah menyediakan tema warna dasar yang konsisten yang bisa dipakai untuk teks (`text-`) maupun latar belakang (`bg-`):

- `primary`: Biru tua (Utama)
- `secondary`: Abu-abu (Sekunder)
- `success`: Hijau (Sukses/Berhasil)
- `danger`: Merah (Bahaya/Gagal/Hapus)
- `warning`: Kuning (Peringatan)
- `info`: Biru muda (Informasi)
- `light`: Terang/Putih abu-abu
- `dark`: Gelap/Hitam

**Contoh Teks dan Latar Belakang:**
```html
<p class="text-danger">Teks ini berwarna merah.</p>
<div class="bg-success text-white">Kotak hijau dengan teks putih.</div>
```

---

## 5. Spacing (Jarak - Margin & Padding)

Di CSS murni Anda menulis `margin-top: 10px;`. Di Bootstrap, Anda cukup menulis singkatan `class`-nya:
- **m** = untuk Margin, **p** = untuk Padding
- **t** (top), **b** (bottom), **s** (start/kiri), **e** (end/kanan), **x** (kiri-kanan), **y** (atas-bawah).
- Angkanya berkisar dari **0 sampai 5** (semakin besar angka, semakin jauh jaraknya).

**Contoh Penerapan Spacing:**
```html
<!-- Margin top (mt) sebesar level 3 -->
<div class="mt-3">Saya turun sedikit ke bawah</div>

<!-- Padding kiri-kanan (px) level 4, margin bawah (mb) level 2 -->
<button class="px-4 mb-2">Tombol Nyaman</button>
```

---

## 6. Komponen Siap Pakai

Bootstrap menyediakan puluhan elemen antarmuka siap pakai. Berikut adalah 2 contoh yang paling sering digunakan.

### **A. Tombol (Buttons)**
Tinggal tambahkan class `.btn` dan tema warnanya.
```html
<button class="btn btn-primary">Simpan Data</button>
<a href="#" class="btn btn-danger">Hapus</a>
<button class="btn btn-outline-success">Sukses Bergaris</button>
```

### **B. Kartu (Cards)**
Kotak elegan bersudut tumpul untuk menampilkan produk, artikel, atau profil.
```html
<div class="card" style="width: 18rem;">
    <img src="gambar.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Judul Produk</h5>
        <p class="card-text">Ini adalah deskripsi singkat tentang produk tersebut.</p>
        <a href="#" class="btn btn-primary">Beli Sekarang</a>
    </div>
</div>
```

---

## Kesimpulan

Jika Anda telah menguasai dasar-dasar HTML dan struktur CSS, melompat ke Bootstrap akan terasa seperti menggunakan "kekuatan super". Alih-alih menulis ratusan baris CSS untuk mendesain tombol atau membagi halaman menjadi dua bagian sama rata, di Bootstrap Anda hanya perlu "memanggil nama class" yang sudah disediakan. Selalu siapkan **Dokumentasi Resmi Bootstrap (getbootstrap.com)** saat Anda membuat proyek.
