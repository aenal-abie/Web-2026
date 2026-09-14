# Pengantar HTML Dasar

**HTML (HyperText Markup Language)** adalah bahasa kerangka (markup) standar yang digunakan untuk membuat dan menyusun struktur sebuah halaman web. Perlu diingat bahwa HTML **bukanlah** bahasa pemrograman (karena tidak memiliki logika seperti *if-else* atau variabel), melainkan bahasa markup yang menggunakan tag (tanda) untuk mendeskripsikan konten.

---

## 1. Pengertian Tag, Elemen, dan Atribut pada HTML

Sebelum mempelajari lebih jauh, penting untuk memahami tiga istilah dasar dalam HTML: **tag**, **elemen**, dan **atribut**.

### **Tag**
Tag adalah tanda yang digunakan untuk menandai bagian tertentu dalam HTML. Tag biasanya ditulis menggunakan tanda kurang dari dan lebih dari, misalnya `<p>`, `<h1>`, atau `<a>`.

Tag umumnya terdiri dari:
- **Tag pembuka**: misalnya `<p>`
- **Tag penutup**: misalnya `</p>`

Contoh:
```html
<p>Ini adalah paragraf.</p>
```

### **Elemen**
Elemen adalah keseluruhan bagian HTML yang terdiri dari tag pembuka, isi konten, dan tag penutup. Jadi, elemen merupakan satu kesatuan utuh.

Contoh:
```html
<p>Ini adalah paragraf.</p>
```

Pada contoh di atas:
- `<p>` adalah tag pembuka
- `Ini adalah paragraf.` adalah isi konten
- `</p>` adalah tag penutup
- keseluruhannya disebut elemen paragraf

### **Atribut**
Atribut adalah informasi tambahan yang dituliskan di dalam tag pembuka untuk memberikan keterangan atau mengatur perilaku elemen.

Contoh:
```html
<a href="https://www.google.com" target="_blank">Buka Google</a>
```

Pada contoh tersebut:
- `href` adalah atribut yang berisi alamat tujuan link
- `target="_blank"` adalah atribut yang membuat link terbuka di tab baru

Beberapa atribut sering digunakan pada HTML, misalnya:
- `href` untuk tautan
- `src` untuk sumber gambar
- `alt` untuk teks alternatif gambar
- `id` untuk identitas unik elemen
- `class` untuk memberi nama kelompok elemen

### **Ringkasan Singkat**
- **Tag** = tanda HTML, misalnya `<p>`
- **Elemen** = tag pembuka + isi + tag penutup
- **Atribut** = informasi tambahan pada tag, misalnya `href=""`

---

## 2. Struktur Dasar Halaman HTML

Setiap halaman HTML yang standar harus mengikuti struktur kerangka utama berikut ini:

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Judul Halaman Web</title>
</head>
<body>

    <!-- Semua konten web yang terlihat oleh pengguna diletakkan di sini -->
    <h1>Halo Dunia!</h1>

</body>
</html>
```

### **Penjelasan:**
- `<!DOCTYPE html>`: Deklarasi yang memberitahu browser bahwa dokumen ini menggunakan standar HTML5 (versi terbaru).
- `<html>`: Tag pembuka dari seluruh dokumen HTML. Atribut `lang="id"` menunjukkan bahasa utama halaman adalah bahasa Indonesia.
- `<head>`: Bagian "kepala" web yang berisi *meta-data* (data di balik layar) seperti pengaturan karakter, tautan CSS, dan judul tab browser (`<title>`). Konten di dalam `<head>` tidak ditampilkan langsung di halaman.
- `<body>`: Bagian "badan" web. Ini adalah area utama. Semua yang ingin Anda tampilkan kepada pengguna (teks, gambar, tombol, tabel) **harus** berada di dalam tag ini.

---

## 3. Heading (Judul) dan Paragraf

HTML menyediakan 6 tingkatan *heading* (judul) yang digunakan untuk menyusun hierarki dokumen, mulai dari `<h1>` hingga `<h6>`.

```html
<h1>Ini Judul Utama (Sangat Penting)</h1>
<h2>Ini Sub-judul Tingkat 2</h2>
<h3>Ini Sub-judul Tingkat 3</h3>
<!-- dan seterusnya hingga h6 -->
```
*Catatan: Pastikan hanya ada SATU tag `<h1>` dalam satu halaman web untuk optimasi SEO (Search Engine Optimization).*

Untuk membuat paragraf atau teks panjang, gunakan tag `<p>`:
```html
<p>Ini adalah sebuah paragraf teks yang berisi penjelasan mengenai suatu topik. Teks ini akan otomatis memiliki jarak spasi antar paragraf lainnya.</p>
```

---

## 4. Link (Tautan)

Link atau tautan digunakan untuk menghubungkan satu halaman web ke halaman web lain. Tag yang digunakan adalah `<a>` (singkatan dari *Anchor*). Atribut **`href`** wajib diisi dengan alamat tujuan.

```html
<!-- Link ke website eksternal -->
<a href="https://www.google.com">Buka Google</a>

<!-- Link ke halaman lain di dalam folder yang sama -->
<a href="profil.html">Lihat Profil Saya</a>

<!-- Link yang akan membuka tab baru saat diklik -->
<a href="https://github.com" target="_blank">Buka GitHub</a>
```

---

## 5. Image (Gambar)

Untuk menyisipkan gambar, kita menggunakan tag `<img>`. Tag ini bersifat tunggal (tidak memiliki penutup). Atribut wajibnya adalah **`src`** (sumber gambar) dan **`alt`** (teks alternatif jika gambar gagal dimuat).

```html
<!-- Menampilkan gambar dari folder lokal -->
<img src="foto-profil.jpg" alt="Foto Budi" width="300" height="300">

<!-- Menampilkan gambar dari internet -->
<img src="https://contoh-website.com/logo.png" alt="Logo Website">
```

---

## 6. Pemformatan Teks Sederhana

Anda juga dapat mengatur format teks agar tebal, miring, atau digarisbawahi menggunakan tag-tag khusus:
- `<b>` atau `<strong>`: Membuat teks menjadi **tebal** (*strong* lebih disarankan karena memiliki makna *semantic* bahwa teks tersebut penting).
- `<i>` atau `<em>`: Membuat teks menjadi *miring* (*italic*).
- `<u>`: Membuat teks memiliki garis bawah (*underline*).
- `<br>`: Singkatan dari *Break*. Digunakan untuk menurunkan teks ke baris baru secara paksa (seperti menekan tombol *Enter*).
- `<hr>`: Menampilkan garis horizontal pembatas.

```html
<p>Teks ini <strong>sangat penting</strong> dan teks ini <em>miring</em>.</p>
<p>Baris pertama.<br>Baris kedua.</p>
```
