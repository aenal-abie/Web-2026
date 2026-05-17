# Pengantar Database (Basis Data) dalam Pengembangan Web

Dalam pengembangan aplikasi web yang dinamis, kemampuan untuk menyimpan, mengelola, dan mengambil data secara permanen sangatlah penting. Di sinilah peran **Database** (Basis Data) dibutuhkan. 

Materi ini akan membahas konsep dasar database, sistem manajemen database, hingga operasi dasar SQL yang sering digunakan bersama PHP.

---

## 1. Apa itu Database?

**Database** adalah kumpulan data atau informasi yang terstruktur, yang disimpan dan dikelola di dalam sistem komputer. Berbeda dengan menyimpan data di dalam file teks (seperti `.txt` atau Excel), database dirancang agar data dapat diakses, diubah, dikelola, dan dicari dalam jumlah besar dengan sangat cepat dan aman.

## 2. Apa itu DBMS dan RDBMS?

- **DBMS (Database Management System)**: Adalah *software* atau perangkat lunak yang digunakan untuk berinteraksi, memelihara, dan mengontrol akses ke database.
- **RDBMS (Relational Database Management System)**: Adalah jenis DBMS yang menyimpan data dalam bentuk tabel-tabel yang saling berelasi (berhubungan). 

Dalam ekosistem PHP dan pengembangan web, perangkat lunak RDBMS yang paling populer digunakan adalah **MySQL** dan **MariaDB**. (Di dalam paket XAMPP yang Anda instal, MariaDB sudah tertanam di dalamnya).

---

## 3. Konsep Struktur Relational Database

Di dalam RDBMS seperti MySQL, data disimpan dalam konsep yang menyerupai spreadsheet Excel:

1. **Database**: Wadah utama penampung data (Contoh: `db_sekolah`).
2. **Table (Tabel)**: Kumpulan data spesifik dalam database (Contoh: tabel `siswa`, tabel `guru`).
3. **Column / Field (Kolom)**: Struktur yang mendefinisikan jenis data (Contoh: kolom `nama`, `alamat`, `tanggal_lahir`).
4. **Row / Record (Baris)**: Satu kesatuan data utuh individu (Contoh: Data milik "Budi Santoso" yang mengisi seluruh kolom).
5. **Primary Key (Kunci Utama)**: Kolom khusus (biasanya `id`) yang sifatnya unik untuk membedakan satu baris data dengan baris data lainnya.

---

## 4. Berkenalan dengan SQL (Structured Query Language)

Untuk berinteraksi dengan database (seperti menambah, menghapus, atau mencari data), kita menggunakan bahasa standar yang disebut **SQL**.

Perintah SQL secara umum dibagi menjadi beberapa kelompok, yang paling sering digunakan adalah:
- **DDL (Data Definition Language)**: Digunakan untuk mendefinisikan struktur, seperti membuat tabel atau database.
- **DML (Data Manipulation Language)**: Digunakan untuk memanipulasi isi datanya (Inilah yang paling sering digunakan dalam pemrograman PHP).

---

## 5. Operasi DML Dasar (CRUD)

Dalam dunia pemrograman dan database, terdapat 4 operasi paling esensial yang dikenal dengan singkatan **CRUD (Create, Read, Update, Delete)**.

Berikut adalah contoh perintah SQL untuk operasi CRUD pada tabel bernama `mahasiswa`:

### **A. CREATE (Memasukkan Data Baru)**
Perintah yang digunakan adalah `INSERT INTO`. Digunakan untuk menambah baris data (record) baru ke dalam tabel.

```sql
-- Memasukkan 1 mahasiswa baru
INSERT INTO mahasiswa (nim, nama, jurusan) 
VALUES ('12345', 'Budi Santoso', 'Teknik Informatika');
```

### **B. READ (Membaca/Menampilkan Data)**
Perintah yang digunakan adalah `SELECT`. Digunakan untuk mengambil dan melihat data.

```sql
-- Menampilkan SEMUA kolom dan SEMUA baris dari tabel mahasiswa
SELECT * FROM mahasiswa;

-- Menampilkan kolom nama dan jurusan saja
SELECT nama, jurusan FROM mahasiswa;

-- Menampilkan mahasiswa yang hanya dari jurusan 'Sistem Informasi'
SELECT * FROM mahasiswa WHERE jurusan = 'Sistem Informasi';
```

### **C. UPDATE (Mengubah Data)**
Perintah yang digunakan adalah `UPDATE`. Digunakan untuk memodifikasi data yang sudah ada. 
**Peringatan:** Selalu gunakan `WHERE` saat melakukan UPDATE, jika tidak, *seluruh* data dalam tabel akan ikut terubah!

```sql
-- Mengubah jurusan Budi Santoso berdasarkan NIM-nya
UPDATE mahasiswa 
SET jurusan = 'Sistem Informasi' 
WHERE nim = '12345';
```

### **D. DELETE (Menghapus Data)**
Perintah yang digunakan adalah `DELETE`. Digunakan untuk menghapus baris data.
**Peringatan:** Sama seperti UPDATE, selalu gunakan `WHERE` agar tidak menghapus semua isi tabel!

```sql
-- Menghapus data mahasiswa yang memiliki NIM 12345
DELETE FROM mahasiswa WHERE nim = '12345';
```

---

## 6. Bagaimana PHP Berkomunikasi dengan Database?

Mesin PHP tidak bisa mengerti database secara langsung. Dibutuhkan sebuah "jembatan" atau ekstensi agar PHP dapat mengirim perintah SQL ke server MySQL. 

Di PHP modern, terdapat 2 cara utama (ekstensi) untuk menghubungkan PHP dengan MySQL:
1. **MySQLi (MySQL Improved)**: Ekstensi khusus dan dioptimalkan untuk MySQL/MariaDB. Sangat ramah untuk pemula dan mendukung format prosedural maupun *Object-Oriented*.
2. **PDO (PHP Data Objects)**: Pendekatan berbasis *Object-Oriented* yang lebih canggih. PDO sangat fleksibel karena jika suatu saat Anda ingin pindah dari database MySQL ke PostgreSQL atau Oracle, Anda tidak perlu merombak banyak kode PHP Anda.

*Kita akan mempelajari implementasi kode PHP untuk koneksi ke database menggunakan MySQLi atau PDO pada materi-materi selanjutnya.*

---

## Kesimpulan

Database adalah pondasi dari semua aplikasi web modern (seperti Toko Online, Sistem Informasi Kampus, dan Sosial Media). Tanpa database, aplikasi web hanya akan berupa halaman statis yang datanya hilang setiap kali browser ditutup. Menguasai perintah SQL (terutama **CRUD**) adalah langkah krusial sebelum Anda mulai menghubungkan PHP dengan MySQL.
