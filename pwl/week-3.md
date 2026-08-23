# 🐘 Pertemuan 3: Pengenalan PHP

---

## 👋 Apa itu PHP?

**PHP** (akronim dari **P**HP **H**ypertext **P**reprocessor / awalnya *Personal Home Page*) adalah bahasa pemrogramman berbasis web yang punya kemampuan buat memproses data secara dinamis.

Dibuat pertama kali oleh **Rasmus Lerdorf**. Pada awalnya merupakan program CGI yang dikhususkan untuk menerima input melalui form yang ditampilkan di web browser.

PHP dikatakan sebagai **server-side embedded script language** — artinya sintaks-sintaks dan perintah yang kita kasih bakal sepenuhnya dijalankan oleh server, tapi disertakan pada halaman HTML biasa. Aplikasi yang dibangun pakai PHP pada umumnya bakal ngasih hasil di web browser, tapi prosesnya secara keseluruhan dijalankan di server.

> 💡 Pada prinsipnya server akan bekerja apabila ada permintaan dari client.

Alurnya:

1. Client menggunakan kode-kode PHP untuk mengirimkan permintaan ke server
2. Script PHP dieksekusi di server
3. Hasil yang dikirim ke browser adalah hasil jadi dalam bentuk HTML — **kode PHP-nya sendiri ga kelihatan**

PHP terus berkembang, dan sejak **PHP 5** udah mendukung **Object Oriented Programming (OOP)** secara penuh (ini yang jadi dasar folder `oop` di [`sqa-4/src`](../sqa-4/src/) juga).

---

## 🧩 PHP Native & Framework PHP

| Istilah | Penjelasan |
|---------|------------|
| **PHP Native** | pengkodean PHP murni tanpa framework — dasar buat belajar PHP |
| **Framework PHP** | kerangka kerja yang udah terpola, memudahkan pengembangan web pakai PHP. Umumnya pakai metode **MVC** (Model View Controller) buat misahin bagian-bagian aplikasi |

## 🤔 Kenapa PHP?

- **Multi platform** — bisa jalan di platform yang beda-beda (Windows, Linux, Unix, dll.)
- **Open source** — source-nya bisa dibuka, didistribusikan, dikembangkan, dan gratis
- **Mudah dipelajari**
- **Ringan**

---

## 🛠️ Tools Requirement

Buat bangun aplikasi pakai PHP, butuh beberapa dukungan aplikasi lain:

| Tools | Fungsi |
|-------|--------|
| **Editor** | nulis kode program (Notepad, Notepad++, Sublime, Adobe Dreamweaver, dll.) |
| **Web Browser** | nampilin hasil pemrograman berbasis web |
| **Web Server** | nerjemahin kode PHP jadi HTML (Apache, Nginx, Microsoft IIS) |
| **PHP** | aplikasi penerjemah kode PHP itu sendiri di dalam web server |

> 💡 Web Server + PHP + MySQL umumnya bisa diinstall dalam satu paket aplikasi (**XAMPP**, **WAMP**).

---

## ✍️ Syntax Dasar PHP Script

PHP adalah bahasa scripting bertipe **interpreter** (ga perlu compiling) — cukup dibaca lalu diinterpretasi hasilnya. PHP bisa disisipkan di script lain kayak HTML.

### Cara Penulisan Kode PHP

Ada beberapa "kerangka" buat nyisipin PHP dalam script HTML:

```php
<?php
// menandai awal tag
echo "kerangka 1 (paling umum dipakai)";
// menandai akhir tag
?>
```

```php
<? echo "kerangka 2 (short tag)"; ?>
```

> 💡 Tag pembuka juga bisa dituliskan cukup dengan tanda `<?` aja (short tag) — tapi ini butuh `short_open_tag = On` di `php.ini`, jadi ga selalu bisa diandalkan di semua server.

### Penting!

- Simpan file dengan format `.php` di direktori `C:\xampp\htdocs`
- Buka browser, ketikkan `localhost/nama_file` di address bar
- **Pastikan web server XAMPP udah aktif** sebelum menjalankan file PHP
- Kode PHP disimpan sebagai plain text format ASCII — bisa ditulis di hampir semua editor teks (notepad, wordpad, dll.)
- Kode PHP disertakan di sebuah halaman HTML, dan dijalankan oleh server **sebelum** dikirim ke browser
- Pada file `.html` biasa, HTTP server cuma ngelewatin isi file ke browser — server ga nyoba ngerti atau proses file itu (itu tugas browser)

### Penulisan Statement & Ekspresi

Setiap statement dan ekspresi di PHP **harus diakhiri titik koma (`;`)**.

### Aturan Penulisan Case PHP

PHP adalah bahasa **case sensitive** — huruf besar (kapital) dan huruf kecil dibedakan.

### Penulisan Komentar

Komentar adalah bagian yang **ga dieksekusi** komputer, biasanya buat keterangan/dokumentasi. Ada 2 cara:

```php
// untuk komentar satu baris

/*
untuk komentar
lebih dari satu baris
*/
```

### Penulisan Blok Program

Blok program (kumpulan statement & ekspresi) dibungkus kurung kurawal `{ ... }`.

---

## 🖨️ Fungsi Mencetak Teks

PHP punya beberapa fungsi buat nge-print teks ke layar: `echo()`, `print()`, `printf()`.

| Fungsi | Karakteristik |
|--------|----------------|
| `echo()` | bisa dipakai dengan atau tanpa tanda kurung. Boleh lebih dari satu parameter. **Ga** mengembalikan nilai |
| `print()` | mirip `echo()`, juga bisa tanpa tanda kurung. **Selalu** mengembalikan nilai `1` saat dieksekusi. Cuma boleh **satu** parameter |
| `printf()` | buat format teks/string. Balikin panjang teks saat dieksekusi |

`printf()` pakai simbol *placeholder*:

| Simbol | Untuk |
|--------|-------|
| `%s` | teks (string) |
| `%d` | bilangan desimal (integer) |
| `%f` | pecahan (float) |
| `%b` | boolean |

```php
<?php
echo "Halo dari echo <br>";
echo "Halo ", " dari ", " echo dengan banyak parameter <br>";

print("Halo dari print <br>");

printf("Nama: %s, Umur: %d tahun <br>", "Budi", 20);
?>
```

📄 [`src/week-3/demo.php`](./src/week-3/demo.php)

---

## 📌 Tugas

> Buatlah halaman pemesanan yang sudah dibuat sebelumnya (lihat [Pertemuan 1](./week-1.md)) dengan menggunakan HTML, diupdate dengan mencetak pemesanan menggunakan pemrograman PHP.

Contoh penyelesaiannya — form pemesanan paket wisata dari Pertemuan 1, sekarang divalidasi dan dihitung pakai PHP (bukan cuma HTML statis):

📄 [`src/week-3/pemesanan.php`](./src/week-3/pemesanan.php)

---

**✨ End of Week 3 ✨**
