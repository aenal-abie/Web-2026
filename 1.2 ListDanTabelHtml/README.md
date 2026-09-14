# List (Daftar) dan Tabel di HTML

Selain menampilkan teks biasa, HTML menyediakan struktur khusus untuk menyusun data secara berurutan menggunakan **List** dan menyusun data baris-kolom menggunakan **Table**.

---

## 1. List (Daftar/Poin)

List digunakan untuk membuat urutan data. Ada dua jenis list utama dalam HTML: **Unordered List** (tidak berurutan / memakai simbol *bullet*) dan **Ordered List** (berurutan / memakai angka atau huruf).

### **A. Unordered List (`<ul>`)**
Kumpulan daftar yang urutannya tidak terlalu penting. Item di dalamnya dibuat menggunakan tag `<li>` (List Item).
```html
<h3>Daftar Belanja:</h3>
<ul>
    <li>Apel</li>
    <li>Jeruk</li>
    <li>Mangga</li>
</ul>
```
*(Hasilnya akan berupa titik hitam di sebelah setiap buah)*

### **B. Ordered List (`<ol>`)**
Kumpulan daftar yang urutannya sangat penting (misal: urutan langkah/tutorial).
```html
<h3>Cara Memasak Mie Instan:</h3>
<ol>
    <li>Rebus air hingga mendidih.</li>
    <li>Masukkan mie ke dalam air panas.</li>
    <li>Tiriskan mie dan campur dengan bumbu.</li>
</ol>
```
*(Hasilnya akan otomatis bernomor 1, 2, dan 3)*

*Tips: Anda dapat mengubah angka menjadi huruf (A, B, C) atau angka romawi (I, II, III) dengan atribut `type` pada tag `<ol>`.*

---

## 2. Table (Tabel)

Tabel adalah cara terbaik untuk menyajikan data dua dimensi (baris dan kolom). 

### **Anatomi Tabel HTML:**
Sebuah tabel disusun menggunakan beberapa tag:
- `<table>`: Pembungkus utama tabel.
- `<tr>` *(Table Row)*: Mendefinisikan sebuah "Baris" horizontal.
- `<th>` *(Table Header)*: Sel tabel untuk "Judul Kolom" (teksnya akan otomatis tebal dan berada di tengah).
- `<td>` *(Table Data)*: Sel tabel untuk "Isi Data".

### **Contoh Dasar Tabel:**
```html
<!-- border="1" agar garis tabel terlihat (biasanya ini diatur via CSS) -->
<table border="1" cellpadding="5" cellspacing="0">
    <!-- Baris Pertama: Judul Tabel -->
    <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Nilai</th>
    </tr>
    
    <!-- Baris Kedua: Isi Data Pertama -->
    <tr>
        <td>1</td>
        <td>Budi Santoso</td>
        <td>85</td>
    </tr>
    
    <!-- Baris Ketiga: Isi Data Kedua -->
    <tr>
        <td>2</td>
        <td>Siti Aminah</td>
        <td>90</td>
    </tr>
</table>
```

### **Penggabungan Sel (Colspan & Rowspan)**
Seringkali kita perlu menggabungkan beberapa kolom atau baris menjadi satu sel besar (mirip fungsi *Merge Cells* di Excel).
- **`colspan`**: Menggabungkan sel ke kanan (menggabungkan kolom).
- **`rowspan`**: Menggabungkan sel ke bawah (menggabungkan baris).

```html
<table border="1">
    <tr>
        <th colspan="2">Data Diri</th> <!-- Kolom ini memakan lebar 2 kolom -->
    </tr>
    <tr>
        <td>Nama</td>
        <td>Andi</td>
    </tr>
</table>
```
