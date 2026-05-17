# Pengantar JavaScript (JS)

Jika **HTML** adalah "kerangka/tulang" dari sebuah website, dan **CSS** adalah "pakaian/kulit"-nya, maka **JavaScript** adalah "otot dan saraf" yang membuat website tersebut **hidup dan interaktif**.

JavaScript (disingkat JS) adalah bahasa pemrograman inti di sisi klien (*Client-side*) yang berjalan langsung di dalam *browser* pengguna. Berkat JS, Anda bisa membuat animasi, *slider* gambar, memvalidasi form, hingga mengambil data dari server tanpa perlu me-*refresh* halaman web.

---

## 1. Tiga Cara Memasang JavaScript

Sama seperti CSS, ada 3 cara untuk menyisipkan kode JavaScript ke dalam HTML.

### **A. Inline (Gaya Baris)**
JS ditulis langsung di dalam tag HTML menggunakan atribut *event* seperti `onclick`.
```html
<button onclick="alert('Halo Dunia!')">Klik Saya</button>
```

### **B. Internal (Di dalam HTML)**
JS ditulis di antara tag `<script>...</script>`. Biasanya diletakkan tepat di atas tag penutup `</body>` agar HTML dan CSS termuat terlebih dahulu.
```html
<body>
    <h1>Belajar JS</h1>

    <!-- Script diletakkan sebelum tutup body -->
    <script>
        alert('Selamat datang di website kami!');
    </script>
</body>
```

### **C. External (File Terpisah)**
Cara **terbaik dan paling disarankan**. Kode JS dipisah ke dalam file berekstensi `.js` (misal: `script.js`), lalu dipanggil menggunakan atribut `src` pada tag `<script>`.
```html
<body>
    <script src="script.js"></script>
</body>
```

---

## 2. Cara Menampilkan Output

Berbeda dengan PHP yang menggunakan `echo`, JavaScript memiliki beberapa cara untuk menampilkan hasil:

1. **`alert("Pesan")`**: Menampilkan pop-up peringatan di tengah atas browser.
2. **`console.log("Pesan")`**: Menampilkan teks di *Console* browser (tekan F12 lalu pilih tab Console). Ini sangat sering digunakan oleh programmer untuk mencari *error* (Debugging).
3. **`document.write("Pesan")`**: Menuliskan teks langsung ke halaman HTML (jarang digunakan di web modern).

---

## 3. Variabel (Tempat Menyimpan Data)

Di JS modern (ES6), kita menggunakan `let` dan `const` untuk membuat variabel (menggantikan `var` yang sudah kuno).

- **`let`**: Digunakan untuk nilai yang **bisa diubah** nanti.
- **`const`**: Digunakan untuk nilai yang **tetap (konstan)** dan tidak boleh diubah.

```javascript
let nama = "Budi Santoso"; // Tipe data String (Teks)
let umur = 20;             // Tipe data Number (Angka)
let belumMenikah = true;   // Tipe data Boolean (Benar/Salah)

// Coba ubah nilai variabel
umur = 21; // Boleh, karena menggunakan let

const PI = 3.14; 
// PI = 3.15; // INI AKAN ERROR! karena const tidak bisa diubah
```

---

## 4. Berinteraksi dengan HTML (DOM Manipulation)

Kekuatan utama JavaScript adalah kemampuannya memanipulasi elemen HTML (yang disebut DOM - *Document Object Model*). JS bisa mengambil, mengubah, menghapus, atau menambah elemen HTML secara *real-time*.

**Cara mengambil elemen HTML:**
Paling sering menggunakan `document.getElementById('id_elemen')`.

**Contoh: Mengubah teks ketika tombol diklik**

```html
<!DOCTYPE html>
<html>
<body>

    <!-- Elemen dengan ID khusus -->
    <h2 id="judul">Teks ini akan berubah</h2>
    
    <!-- Tombol yang memicu fungsi JS -->
    <button onclick="ubahTeks()">Ubah Teks!</button>

    <script>
        // Membuat Fungsi / Perintah
        function ubahTeks() {
            // 1. Ambil elemen H2 berdasarkan ID
            let elemenJudul = document.getElementById("judul");
            
            // 2. Ubah isi HTML-nya
            elemenJudul.innerHTML = "Tadaa! Teks berhasil diubah oleh JavaScript!";
            
            // 3. Ubah warna teksnya (CSS via JS)
            elemenJudul.style.color = "red";
        }
    </script>

</body>
</html>
```

### **Contoh: Mengambil Nilai (Value) dari Form Input**

Selain mengubah teks, JS juga sangat sering digunakan untuk "menangkap" apa yang diketik oleh pengguna di dalam kotak input formulir.

```html
<!DOCTYPE html>
<html>
<body>

    <label>Masukkan Nama Anda: </label>
    <input type="text" id="inputNama" placeholder="Ketik di sini...">
    <button onclick="sapaPengguna()">Sapa Saya</button>

    <!-- Tempat untuk menampilkan hasil -->
    <p id="pesanSapaan" style="font-weight: bold;"></p>

    <script>
        function sapaPengguna() {
            // 1. Ambil elemen input
            let elemenInput = document.getElementById("inputNama");
            
            // 2. Ambil NILAI (value) yang ada di dalam input tersebut
            let namaDiketik = elemenInput.value;
            
            // 3. Ambil elemen target untuk tempat pesan
            let elemenPesan = document.getElementById("pesanSapaan");
            
            // Cek apakah inputnya kosong?
            if(namaDiketik === "") {
                elemenPesan.innerHTML = "Hei, nama tidak boleh kosong!";
                elemenPesan.style.color = "red";
            } else {
                // Jika ada isinya, gabungkan teks
                elemenPesan.innerHTML = "Halo, selamat datang " + namaDiketik + "!";
                elemenPesan.style.color = "green";
            }
        }
    </script>

</body>
</html>
```

---

## Kesimpulan

JavaScript adalah bahasa yang wajib dipelajari oleh setiap *Web Developer*. Jika PHP berjalan di Server (belakang layar), maka JavaScript berjalan di Browser (layar depan). 
Fokus awal Anda saat belajar JS sebaiknya berada pada pemahaman tentang:
1. Cara membuat variabel (`let`, `const`).
2. Menampilkan output untuk *debugging* (`console.log`).
3. Bagaimana mengambil dan mengubah tag HTML menggunakan *DOM Manipulation* (`getElementById` dan `innerHTML`).
