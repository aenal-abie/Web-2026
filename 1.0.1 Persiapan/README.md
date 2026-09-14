# Persiapan Belajar Web dan HTML

Sebelum mulai menulis kode HTML, ada beberapa hal yang perlu disiapkan agar proses belajar web menjadi lebih mudah, rapi, dan tidak membingungkan. Persiapan ini mencakup perangkat, aplikasi, folder kerja, pemahaman dasar, dan kebiasaan belajar.

---

## 1. Perangkat yang Dibutuhkan

Untuk belajar web, tidak harus menggunakan komputer dengan spesifikasi tinggi. Laptop atau komputer biasa sudah cukup selama bisa menjalankan browser dan text editor.

Minimal yang dibutuhkan:

- Laptop atau komputer.
- Sistem operasi Windows, Linux, atau macOS.
- Ruang penyimpanan yang cukup untuk menyimpan file latihan.
- Koneksi internet untuk mencari dokumentasi, referensi, dan mengunduh aplikasi.

Belajar HTML, CSS, dan JavaScript dasar bisa dilakukan tanpa server khusus. File HTML dapat langsung dibuka melalui browser.

---

## 2. Aplikasi yang Perlu Disiapkan

### **A. Web Browser**

Browser digunakan untuk membuka dan melihat hasil halaman web yang dibuat.

Browser yang disarankan:

- Google Chrome
- Mozilla Firefox
- Microsoft Edge

Disarankan memasang minimal dua browser. Tujuannya agar kita bisa membandingkan tampilan website di browser yang berbeda.

### **B. Text Editor atau Code Editor**

Text editor digunakan untuk menulis kode HTML, CSS, dan JavaScript.

Editor yang disarankan:

- Visual Studio Code
- Sublime Text
- Notepad++

Untuk pemula, **Visual Studio Code (VS Code)** sangat disarankan karena ringan, populer, dan memiliki banyak fitur untuk membantu menulis kode.

### **C. File Manager**

File manager digunakan untuk mengatur folder dan file proyek.

Contoh:

- File Explorer di Windows
- Files di Linux
- Finder di macOS

Dalam belajar web, pengaturan folder sangat penting agar file HTML, CSS, gambar, dan JavaScript tidak berantakan.

---

## 3. Extension yang Disarankan untuk VS Code

Jika menggunakan Visual Studio Code, beberapa extension berikut dapat membantu proses belajar:

### **A. Live Server**

Live Server digunakan untuk menjalankan halaman web secara lokal. Dengan Live Server, halaman web bisa otomatis diperbarui ketika file disimpan.

Manfaat Live Server:

- Melihat hasil kode langsung di browser.
- Tidak perlu refresh manual terus-menerus.
- Membiasakan diri membuka proyek seperti website sungguhan.

### **B. Prettier**

Prettier digunakan untuk merapikan format kode secara otomatis.

Manfaat Prettier:

- Membuat kode lebih rapi.
- Mengurangi kesalahan karena indentasi berantakan.
- Membantu membiasakan struktur kode yang enak dibaca.

### **C. Auto Rename Tag**

Auto Rename Tag membantu mengubah tag pembuka dan tag penutup secara bersamaan.

Contoh:

Jika tag `<p>` diubah menjadi `<h1>`, maka tag penutup `</p>` juga ikut berubah menjadi `</h1>`.

---

## 4. Membuat Folder Belajar Web

Sebelum mulai menulis kode, buat folder khusus untuk menyimpan semua latihan web.

Contoh struktur folder:

```text
belajar-web/
├── 01-html-dasar/
│   ├── index.html
│   └── gambar.jpg
├── 02-css-dasar/
│   ├── index.html
│   └── style.css
└── 03-javascript-dasar/
    ├── index.html
    └── script.js
```

Manfaat membuat folder yang rapi:

- File latihan mudah ditemukan.
- Tidak bingung membedakan file HTML, CSS, dan JavaScript.
- Lebih siap saat membuat proyek web yang lebih besar.
- Membiasakan cara kerja programmer yang terstruktur.

---

## 5. File Utama dalam Website

Dalam website sederhana, biasanya ada beberapa jenis file utama.

### **A. File HTML**

HTML digunakan untuk membuat struktur halaman.

Contoh nama file:

```text
index.html
```

File `index.html` biasanya menjadi halaman utama sebuah website.

### **B. File CSS**

CSS digunakan untuk mengatur tampilan halaman, seperti warna, ukuran teks, jarak, dan layout.

Contoh nama file:

```text
style.css
```

### **C. File JavaScript**

JavaScript digunakan untuk membuat halaman menjadi interaktif.

Contoh nama file:

```text
script.js
```

### **D. Folder Assets**

Folder assets biasanya digunakan untuk menyimpan gambar, ikon, video, font, atau file pendukung lainnya.

Contoh:

```text
assets/
├── images/
├── icons/
└── fonts/
```

---

## 6. Membuat File HTML Pertama

Setelah folder siap, buat file bernama:

```text
index.html
```

Kemudian isi dengan struktur dasar berikut:

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar HTML</title>
</head>
<body>
    <h1>Halo, Dunia!</h1>
    <p>Ini adalah halaman HTML pertama saya.</p>
</body>
</html>
```

Setelah disimpan, file tersebut bisa dibuka menggunakan browser.

---

## 7. Cara Membuka File HTML di Browser

Ada beberapa cara untuk membuka file HTML:

### **A. Klik Dua Kali File HTML**

Cara paling sederhana adalah klik dua kali file `index.html`. File akan terbuka di browser default.

### **B. Drag and Drop ke Browser**

Tarik file `index.html` ke jendela browser.

### **C. Menggunakan Live Server**

Jika menggunakan VS Code dan sudah memasang extension Live Server:

1. Buka folder proyek di VS Code.
2. Klik kanan pada file `index.html`.
3. Pilih **Open with Live Server**.
4. Browser akan terbuka dan menampilkan halaman web.

---

## 8. Pengetahuan Dasar yang Perlu Dipahami

Sebelum masuk lebih jauh ke HTML, sebaiknya pahami beberapa konsep dasar berikut.

### **A. File dan Folder**

Website tersusun dari banyak file. Karena itu, kita perlu paham cara membuat, menyimpan, memindahkan, dan memberi nama file.

### **B. Ekstensi File**

Ekstensi file menunjukkan jenis file.

Contoh:

- `.html` untuk file HTML
- `.css` untuk file CSS
- `.js` untuk file JavaScript
- `.jpg`, `.png`, `.webp` untuk gambar

### **C. Path atau Lokasi File**

Path adalah alamat lokasi file.

Contoh:

```html
<img src="assets/images/foto.jpg" alt="Foto Profil">
```

Pada contoh tersebut, browser akan mencari gambar di folder `assets/images/`.

### **D. Internet dan Browser**

Browser digunakan untuk membuka website. Saat membuat website, browser juga digunakan untuk melihat hasil kode yang telah dibuat.

---

## 9. Kebiasaan Baik Saat Belajar Web

Agar proses belajar lebih mudah, biasakan hal-hal berikut:

- Simpan file secara teratur.
- Gunakan nama file tanpa spasi, misalnya `halaman-profil.html`.
- Gunakan huruf kecil untuk nama file dan folder.
- Jangan takut mencoba dan membuat kesalahan.
- Baca pesan error dengan tenang.
- Gunakan indentasi agar kode mudah dibaca.
- Latih kode sedikit demi sedikit.
- Jangan hanya menonton tutorial, tetapi ikut mengetik dan mencoba.
- Biasakan membuka DevTools di browser untuk memeriksa halaman.

---

## 10. Urutan Belajar Web yang Disarankan

Untuk pemula, urutan belajar web dapat dimulai dari:

1. **Web Browser**

   Memahami apa itu browser, cara kerja browser, dan bagaimana website ditampilkan.

2. **HTML**

   Belajar membuat struktur halaman web, seperti judul, paragraf, link, gambar, tabel, dan form.

3. **CSS**

   Belajar mengatur tampilan halaman, seperti warna, ukuran, posisi, layout, dan responsive design.

4. **JavaScript**

   Belajar membuat halaman menjadi interaktif, misalnya tombol, validasi form, dan manipulasi elemen.

5. **PHP**

   Belajar membuat website dinamis yang diproses di server.

6. **Database**

   Belajar menyimpan, mengambil, mengubah, dan menghapus data.

7. **Proyek Akhir**

   Menggabungkan semua materi menjadi aplikasi web sederhana.

---

## 11. Kesalahan Umum Pemula

Beberapa kesalahan yang sering terjadi saat baru belajar web:

- Lupa menyimpan file sebelum membuka di browser.
- Salah menulis nama file atau folder.
- Menggunakan spasi pada nama file sehingga path menjadi membingungkan.
- Lupa menutup tag HTML.
- Salah meletakkan file gambar.
- Mengubah file, tetapi browser masih menampilkan versi lama karena cache.
- Terlalu cepat masuk ke framework sebelum memahami HTML, CSS, dan JavaScript dasar.

Kesalahan seperti ini wajar terjadi. Yang penting adalah belajar membaca masalahnya dan mencoba memperbaiki satu per satu.

---

## 12. Checklist Persiapan

Sebelum mulai belajar HTML, pastikan hal-hal berikut sudah siap:

- [ ] Sudah memiliki laptop atau komputer.
- [ ] Sudah memasang browser.
- [ ] Sudah memasang code editor seperti VS Code.
- [ ] Sudah membuat folder khusus belajar web.
- [ ] Sudah memahami perbedaan file HTML, CSS, dan JavaScript.
- [ ] Sudah bisa membuat file `index.html`.
- [ ] Sudah bisa membuka file HTML di browser.
- [ ] Sudah siap mencoba, salah, memperbaiki, dan belajar lagi.

---

## Kesimpulan

Persiapan belajar web tidak hanya tentang memasang aplikasi, tetapi juga tentang membangun kebiasaan kerja yang rapi. Alat utama yang perlu disiapkan adalah browser, code editor, dan folder kerja yang terstruktur.

Setelah persiapan selesai, langkah berikutnya adalah mulai belajar HTML sebagai dasar utama pembuatan halaman web. Dari HTML, pembelajaran dapat dilanjutkan ke CSS, JavaScript, PHP, database, dan proyek web yang lebih lengkap.
