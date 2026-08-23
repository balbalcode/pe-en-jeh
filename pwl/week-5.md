# 🔌 Pertemuan 5: Koneksi PHP dan MySQL

---

## 👋 Metode Koneksi PHP ke MySQL

PHP menyediakan 3 metode untuk konek ke database MySQL:

1. **PHP MySQL Extension** (sudah deprecated & dihapus dari PHP 7)
2. **PHP MySQLi Extension** — yang kita pakai di pembelajaran ini
3. **PHP Data Object (PDO)**

Masing-masing metode punya kelebihan dan kekurangan. Kita fokus ke **PHP MySQLi Extension**, yang nyediain beragam fungsi buat akses database MySQL.

Kode lengkap ada di [`src/week-5/`](./src/week-5/).

---

## 🔗 Fungsi `mysqli_connect()`

Dipakai untuk membuka koneksi ke server MySQL dan memilih database yang akan digunakan.

```
mysqli_connect(hostname, username, password, database)
```

- **hostname**: nama host atau alamat IP dari server MySQL yang ingin diakses
- **username**: nama login pengguna untuk proses otentikasi
- **password**: sandi login pengguna untuk proses otentikasi
- **database**: nama basis data yang ingin digunakan

```php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'latihan';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());
}
else
{
    echo "terkoneksi ke MySQL !<br>";
}
```

📄 [`src/week-5/koneksi.php`](./src/week-5/koneksi.php)

---

## 📨 Fungsi `mysqli_query()`

Dipakai untuk mengirimkan perintah SQL ke server MySQL, buat aktivitas **CRUD**:

| Aksi | Perintah SQL |
|------|-------------|
| **C**reate | `INSERT` — menambahkan data |
| **R**ead | `SELECT` — membaca data |
| **U**pdate | `UPDATE` — mengubah data |
| **D**elete | `DELETE` — menghapus data |

```
mysqli_query(resource_link_identifier, query)
```

- **resource_link_identifier**: variable yang sebelumnya dipakai buat nyimpan hasil eksekusi `mysqli_connect()`
- **query**: perintah SQL buat manipulasi data (`INSERT`, `UPDATE`, `DELETE`) atau `SELECT`

Contoh — bikin tabel `sales` dan isi datanya:

```php
require 'koneksi.php';

$sql = 'CREATE TABLE IF NOT EXISTS `sales` (
        `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
        `id_produk` int(11) NOT NULL,
        `tgl_transaksi` date NOT NULL,
        `kuantitas` tinyint(4) NOT NULL,
        `harga` int(11) NOT NULL,
        `id_pelanggan` int(11) NOT NULL,
        PRIMARY KEY (`id_transaksi`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';

$query = mysqli_query($conn, $sql);
if (!$query) {
    die ('ERROR: Tabel sales gagal dibuat: ' . mysqli_error($conn));
}

$sql = "INSERT INTO `sales` (`id_transaksi`, `id_produk`, `tgl_transaksi`, `kuantitas`, `harga`, `id_pelanggan`)
        VALUES (1, 100, '2016-09-20', 8, 265000, 1), ...";

$query = mysqli_query($conn, $sql);
```

📄 [`src/week-5/create-insert.php`](./src/week-5/create-insert.php)

---

## 📥 Fungsi Mengambil Hasil Query

Setelah `mysqli_query()` dijalankan buat `SELECT`, kita butuh cara buat "narik" hasilnya baris demi baris.

### `mysqli_fetch_array()`

Mengambil baris hasil query sebagai **array asosiatif**, referensinya pakai key berupa nama field.

```php
while ($row = mysqli_fetch_array($query))
{
    echo $row['id_produk'];
    echo $row['tgl_transaksi'];
}
```

📄 [`src/week-5/tampil-fetch-array.php`](./src/week-5/tampil-fetch-array.php)

### `mysqli_fetch_assoc()`

Fungsinya sama dengan `mysqli_fetch_array()`, bedanya array yang dihasilkan **cuma** berbentuk associative array (key = nama field), ga ada duplikat index numerik.

📄 [`src/week-5/tampil-fetch-assoc.php`](./src/week-5/tampil-fetch-assoc.php)

### `mysqli_fetch_row()`

Mengambil baris hasil query, tapi field-nya diakses lewat **index angka** (`$row[0]`, `$row[1]`, ...), bukan nama field.

```php
while ($row = mysqli_fetch_row($query))
{
    echo $row[0]; // id_produk (kolom pertama di SELECT)
    echo $row[1]; // tgl_transaksi (kolom kedua)
}
```

📄 [`src/week-5/tampil-fetch-row.php`](./src/week-5/tampil-fetch-row.php)

### `mysqli_num_rows()`

Dipakai untuk mengambil **jumlah baris** hasil eksekusi query.

```
mysqli_num_rows(resource_result)
```

---

## 🧮 Fungsi Data Temporary Field

Kita bisa bikin kolom "sementara" (temporary field) hasil perhitungan langsung di query SQL, pakai `AS`:

```sql
SELECT id_produk, tgl_transaksi, harga, kuantitas, harga*kuantitas AS total_byr
FROM sales
```

Ini bikin `temporary field` bernama `total_byr`, hasil perkalian dari `harga` x `kuantitas`. Bisa diakses kayak kolom biasa: `$row['total_byr']`.

📄 [`src/week-5/tampil-temporary-field.php`](./src/week-5/tampil-temporary-field.php)

---

> ℹ️ Deck aslinya ga nyantumin soal "Latihan" eksplisit di pertemuan ini (langsung lanjut ke "Terima Kasih, Next Week"). Coba jalanin ketiga contoh fetch di atas dan bandingin sendiri hasilnya.

---

**✨ End of Week 5 ✨**
