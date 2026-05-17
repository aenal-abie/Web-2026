# HTML Semantik dan Elemen Pembungkus

Seiring berkembangnya HTML menjadi HTML5, muncullah konsep yang disebut **HTML Semantik**. Secara sederhana, tag semantik adalah tag yang memiliki **makna spesifik** tentang konten yang ada di dalamnya, bukan sekadar menentukan tampilannya.

---

## 1. Elemen Pembungkus Generik (Non-Semantik)

Sebelum era HTML5, programmer membagi struktur website (kotak-kotak/bagian web) menggunakan tag generik yang tidak memiliki makna secara bahasa.

### **A. Tag `<div>` (Division)**
Adalah *Block-level element* yang berfungsi mengelompokkan elemen-elemen besar (seperti menyatukan sebuah gambar, judul, dan tombol ke dalam satu kotak kartu/card). Tag ini akan mengambil lebar penuh (*full width*) halaman dari kiri ke kanan.

```html
<div class="kartu-profil">
    <img src="foto.jpg">
    <h3>Nama Lengkap</h3>
    <button>Lihat Profil</button>
</div>
```

### **B. Tag `<span>`**
Adalah *Inline-level element* yang berfungsi untuk mengelompokkan atau memberi gaya pada bagian kecil di dalam sebuah baris teks. Ia tidak akan membuat teks pindah ke baris baru.

```html
<p>Harga baju ini adalah <span style="color: red; font-weight: bold;">Rp. 50.000</span> rupiah.</p>
```

---

## 2. Mengapa HTML Semantik Penting?

Walaupun kita bisa membungkus seluruh website hanya dengan menggunakan ribuan tag `<div>`, hal itu sangat tidak disarankan karena:
- **Aksesibilitas (Screen Readers)**: Tunanetra yang menggunakan alat pembaca layar akan kebingungan membedakan mana navigasi, mana isi artikel, dan mana bagian bawah halaman jika semuanya berupa `<div>`.
- **SEO (Search Engine Optimization)**: Mesin pencari seperti Google akan lebih mudah membaca dan me-ranking website Anda karena Google paham di mana bagian "konten inti" artikel diletakkan.
- **Kemudahan Membaca Kode**: Programmer lain akan lebih mudah mengerti struktur kode Anda.

---

## 3. Tag-Tag Semantik Utama di HTML5

Berikut adalah tag-tag yang menggantikan posisi `<div>` untuk membuat kerangka halaman (layout) yang berstandar internasional:

1. **`<header>`**: Bagian "Kop" atau atas halaman/artikel. Biasanya berisi Logo, nama website, atau banner.
2. **`<nav>`** (Navigation): Khusus untuk membungkus menu link navigasi utama (misal: Home, About, Contact).
3. **`<main>`**: Bagian sentral atau konten pokok yang paling mendominasi halaman tersebut. Hanya boleh ada satu `<main>` dalam satu halaman.
4. **`<section>`**: Bagian terpisah di dalam dokumen. (Misal: Section "Tentang Kami", Section "Layanan", Section "Testimoni").
5. **`<article>`**: Konten independen yang bisa berdiri sendiri (misal: satu artikel blog penuh, atau satu postingan forum).
6. **`<aside>`**: Konten di samping (sidebar). Biasanya berupa kotak pencarian, artikel populer, atau iklan.
7. **`<footer>`**: Bagian kaki atau ujung bawah web. Biasanya berisi info hak cipta (copyright), alamat kontak, dan tautan media sosial.

### **Contoh Struktur Layout Modern:**
```html
<!DOCTYPE html>
<html>
<body>

    <!-- KEPALA HALAMAN -->
    <header>
        <h1>Logo Web Saya</h1>
        <nav>
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </nav>
    </header>

    <!-- KONTEN UTAMA -->
    <main>
        <section>
            <h2>Artikel Terbaru</h2>
            
            <article>
                <h3>Cara Belajar HTML</h3>
                <p>HTML sangat mudah dipelajari, Anda hanya perlu paham tag-tag dasarnya.</p>
            </article>
            
        </section>

        <!-- SIDEBAR -->
        <aside>
            <h4>Iklan Sponsor</h4>
            <p>Beli produk kami di sini!</p>
        </aside>
    </main>

    <!-- KAKI HALAMAN -->
    <footer>
        <p>&copy; 2026 Web Saya. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>
```

Kesimpulannya, mulai biasakan menggunakan elemen semantik (bukan sekadar kumpulan `<div>`) untuk meningkatkan struktur, SEO, dan kualitas kode *Front-end* Anda.
