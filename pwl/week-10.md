# 🔍 Pertemuan 10: Pagination dan Search

---

## 👋 Pagination

**Pagination/paging** adalah teknik untuk menampilkan data tabel ke dalam beberapa halaman. Dengan pagination, data bisa dibagi dalam beberapa halaman, tergantung berapa data yang mau ditampilkan per halaman.

## 🔎 Search Engine

**Search engine** adalah program yang bisa mencari dan mengidentifikasi item-item di dalam database yang sesuai dengan kata kunci atau karakter tertentu. Secara umum, fungsinya buat menyediakan informasi berdasarkan kata kunci yang dimasukkan.

Minggu ini kita gabungin dua-duanya jadi satu halaman: `pagination.php`. Kode lengkap ada di [`src/week-10/`](./src/week-10/).

---

## 🧱 Struktur Halaman

Pakai Bootstrap 3 + jQuery buat tampilannya:

```html
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
```

### 🔍 Form Pencarian

Panel form dengan dropdown kolom pencarian (Nama Mahasiswa / NIM) + input kata kunci:

```php
<select class="form-control" id="Kolom" name="Kolom" required="">
<?php
$kolom = (isset($_GET['Kolom']))? $_GET['Kolom'] : "";
?>
<option value="nama_mhs" <?php if ($kolom=="nama_mhs") echo "selected"; ?>>Nama Mahasiswa</option>
<option value="NIM" <?php if ($kolom=="NIM") echo "selected";?>>NIM</option>
</select>

<input type="text" name="KataKunci" value="<?php if (isset($_GET['KataKunci'])) echo $_GET['KataKunci']; ?>">
```

Nilai `Kolom` dan `KataKunci` dikirim lewat `GET`, jadi bisa langsung dipakai buat filter query di bawahnya.

---

## 📄 Query Data + Pagination

```php
include "koneksi.php";

$page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
$kolomCari = (isset($_GET['Kolom']))? $_GET['Kolom'] : "";
$kolomKataKunci = (isset($_GET['KataKunci']))? $_GET['KataKunci'] : "";

// Jumlah data per halaman
$limit = 5;
$limitStart = ($page - 1) * $limit;

// kondisi jika parameter pencarian kosong
if ($kolomCari=="" && $kolomKataKunci==""){
    $SqlQuery = mysqli_query($koneksi, "SELECT * FROM mahasiswa LIMIT ".$limitStart.",".$limit);
} else {
    // kondisi jika parameter kolom pencarian diisi
    $SqlQuery = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE $kolomCari LIKE '%$kolomKataKunci%' LIMIT ".$limitStart.",".$limit);
}
```

Konsepnya:

1. `$page` diambil dari query string (default halaman 1)
2. `$limit` = berapa baris data per halaman (di sini 5)
3. `$limitStart` = offset SQL — dihitung dari `(halaman - 1) x limit`
4. kalau ga ada pencarian → `SELECT ... LIMIT offset, limit`
5. kalau ada pencarian → tambahin `WHERE kolom LIKE '%katakunci%'`

---

## ⏮️⏭️ Link Previous & Next

```php
// Jika page = 1, maka LinkPrev disable
if ($page == 1) {
    // <li class="disabled"><a href="#">Previous</a></li>
} else {
    $LinkPrev = ($page > 1)? $page - 1 : 1;
    // <li><a href="pagination.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
}
```

Logikanya: kalau `$page` masih 1, tombol **Previous** dibikin disabled. Kalau ga, link-nya nunjuk ke `page - 1`. Pola yang sama dipakai buat tombol **Next**, tapi cek-nya ke `$jumlahPage` (halaman terakhir).

Setiap link (Previous/Next/nomor halaman) juga perlu bawa parameter `Kolom` dan `KataKunci` kalau lagi ada pencarian aktif — biar filter-nya ga ke-reset pas pindah halaman.

---

## 🔢 Link Nomor Halaman

```php
// Hitung semua jumlah data yang berada pada tabel mahasiswa
$JumlahData = mysqli_num_rows($SqlQuery);
// Hitung jumlah halaman yang tersedia
$jumlahPage = ceil($JumlahData / $limit);

for ($i = $startNumber; $i <= $endNumber; $i++) {
    $linkActive = ($page == $i)? ' class="active"' : '';
    // <li<?php echo $linkActive; ?>><a href="pagination.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
}
```

- `mysqli_num_rows()` — hitung total baris data (tanpa `LIMIT`) buat tau ada berapa data semuanya
- `ceil($JumlahData / $limit)` — bulatkan ke atas buat dapetin jumlah halaman
- halaman yang lagi aktif dikasih class `active` biar keliatan tombolnya lagi dipencet

📄 [`src/week-10/pagination.php`](./src/week-10/pagination.php) + [`src/week-10/koneksi.php`](./src/week-10/koneksi.php)

> ℹ️ **Catatan:** `koneksi.php` di deck ini ga ditampilin (dianggap udah ada dari materi CRUD di [Pertemuan 6](./week-6.md)). Skema kolom yang dipakai di `pagination.php` juga sedikit beda dari week-6 — di sini pakai `nama_mhs` dan `NIM` (bukan `nama`/`nim`), jadi `koneksi.php` di folder ini disesuaikan supaya konsisten.

---

## 📌 Tugas

> Buatlah fungsi pagination dan pencarian pada projek UTS yang telah dibuat.

---

**✨ End of Week 10 ✨**
