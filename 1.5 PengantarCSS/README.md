# Pengantar CSS Dasar (Cascading Style Sheets)

Jika HTML diibaratkan sebagai kerangka atau tulang dari sebuah halaman web, maka **CSS** adalah kulit, pakaian, dan perhiasannya. CSS bertugas untuk mengatur *tampilan* atau desain dari elemen HTML (seperti warna, ukuran, jarak, dan letak).

---

## 1. Tiga Cara Menambahkan CSS ke HTML

Ada 3 metode (cara) untuk menyematkan kode CSS ke dalam halaman web HTML.

### **A. Inline CSS (Gaya Baris)**
Menambahkan properti CSS langsung ke dalam tag HTML menggunakan atribut `style`. Cara ini sebaiknya **dihindari** kecuali untuk keadaan terdesak, karena akan membuat file HTML menjadi sangat berantakan.
```html
<h1 style="color: blue; text-align: center;">Ini Judul Berwarna Biru</h1>
```

### **B. Internal CSS (Gaya Internal)**
Menuliskan blok CSS di dalam tag `<style>`, yang biasanya diletakkan di dalam bagian `<head>` pada file HTML. Cara ini digunakan jika Anda hanya ingin mengatur desain untuk **satu halaman tunggal** saja.
```html
<head>
    <style>
        h1 {
            color: green;
        }
    </style>
</head>
```

### **C. External CSS (Gaya Eksternal)**
Cara **terbaik dan paling direkomendasikan** oleh standar industri. Anda menulis semua kode CSS di sebuah file terpisah (berakhiran `.css`), kemudian memanggilnya ke dalam `<head>` HTML menggunakan tag `<link>`.
```html
<head>
    <link rel="stylesheet" href="style.css">
</head>
```

---

## 2. Anatomi Sintaks CSS

Sintaks CSS pada dasarnya sangat sederhana dan berpusat pada satu aturan utama:

```css
selector {
    property: value;
}
```

- **Selector**: Elemen HTML apa yang ingin Anda beri gaya (misal: `h1`, `p`, `button`).
- **Property**: Bagian mana yang mau diubah (misal: warna teks, ukuran huruf).
- **Value**: Nilai perubahannya (misal: merah, 16px).
*(Jangan lupa selalu mengakhiri deklarasi property-value dengan tanda titik koma `;`)*

---

## 3. Selector Dasar (Memilih Elemen)

Bagaimana cara menargetkan elemen tertentu tanpa mengubah elemen lainnya?

### **A. Element / Type Selector**
Menargetkan langsung nama tag HTML-nya. (Peringatan: ini akan merubah *seluruh* tag tersebut yang ada di halaman).
```css
/* Merubah SEMUA paragraf <p> di website */
p {
    color: gray;
}
```

### **B. Class Selector (`.`)**
Menargetkan elemen berdasarkan atribut `class`. Kelas adalah pemilih yang **bisa dipakai berulang kali** pada beberapa elemen sekaligus. Ditandai dengan titik (`.`) di file CSS.
```html
<p class="teks-tebal">Paragraf 1</p>
<p class="teks-tebal">Paragraf 2</p>
```
```css
/* Menargetkan semua elemen yang memiliki class="teks-tebal" */
.teks-tebal {
    font-weight: bold;
}
```

### **C. ID Selector (`#`)**
Menargetkan elemen berdasarkan atribut `id`. Berbeda dengan class, ID sifatnya **unik dan mutlak**, hanya boleh ada 1 ID dengan nama yang sama dalam satu halaman. Ditandai dengan tanda pagar (`#`) di file CSS.
```html
<h1 id="judul-utama">Selamat Datang</h1>
```
```css
/* Hanya menargetkan elemen ber-id "judul-utama" */
#judul-utama {
    text-transform: uppercase;
}
```

---

## 4. Properti Desain Paling Sering Digunakan

### **A. Warna dan Latar Belakang**
- `color`: Mengatur warna teks (font).
- `background-color`: Mengatur warna latar belakang elemen.
```css
body {
    background-color: #f0f0f0; /* menggunakan kode hex */
    color: rgb(30, 30, 30);    /* menggunakan format rgb */
}
```

### **B. Pengaturan Teks (Typography)**
- `font-family`: Mengganti jenis huruf (font).
- `font-size`: Mengubah ukuran huruf (biasanya menggunakan satuan `px`, `em`, atau `rem`).
- `text-align`: Meratakan teks (`left`, `center`, `right`, `justify`).
```css
h1 {
    font-family: Arial, sans-serif;
    font-size: 24px;
    text-align: center;
}
```

---

## 5. Konsep Penting: Box Model

Ini adalah fondasi terpenting dalam mengatur tata letak web. Semua elemen HTML di mata CSS pada dasarnya adalah **"Kotak" (Box)**. Kotak ini memiliki 4 lapisan dari dalam ke luar:

1. **Content**: Isi asli (teks / gambar).
2. **Padding**: Jarak aman / ruang kosong di bagian **dalam** elemen (antara konten dan batas luar/border).
3. **Border**: Garis tepi / bingkai yang membatasi kotak elemen.
4. **Margin**: Jarak dorong / ruang kosong di bagian **luar** elemen (jarak antara elemen ini dengan elemen di sebelahnya).

### **Contoh Penerapan Box Model:**
```css
.kartu-produk {
    width: 300px;           /* Lebar kotak asli konten */
    padding: 20px;          /* Jarak napas isi kartu ke garis bingkai */
    border: 2px solid black;/* Bingkai setebal 2px dengan garis solid warna hitam */
    margin: 15px;           /* Jarak dorong elemen ini dengan elemen kartu di luarnya */
}
```

---

## Kesimpulan

CSS adalah nyawa dari sisi visual website Anda.
- Selalu usahakan menggunakan file eksternal (`.css`) agar halaman HTML tetap bersih.
- Biasakan memberikan nama `class` pada elemen untuk men-styling-nya (seperti tombol, kartu, banner) daripada menggunakan Element Selector atau ID.
- Kuasai konsep **Box Model** (margin, padding, border) karena itu adalah rahasia untuk mengatur jarak antar setiap komponen web agar terlihat proporsional dan tidak bertumpuk.
