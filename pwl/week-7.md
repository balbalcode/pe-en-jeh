# 🔐 Pertemuan 7: Register, Login dan Logout

---

## 👋 Pengantar

yo guys, minggu ini kita masuk ke bagian yang hampir selalu ada di setiap sistem/aplikasi: **Register, Login dan Logout**.

Register, login dan logout ini adalah bagian dari sebuah website yang membutuhkan izin tertentu untuk mengaksesnya. Registrasi biasanya ada pada sebuah sistem yang membutuhkan login untuk masuk kedalamnya.

| Term | Fungsi |
|------|--------|
| 📝 **Registrasi** | digunakan sebagai pendaftaran user baru untuk memperoleh izin masuk kedalam sistem tersebut |
| 🔑 **Login** | digunakan sebagai autorisasi / hak akses user kedalam sebuah sistem/aplikasi |
| 🚪 **Logout** | mengakhiri sesi (session) user yang sedang login |

Kode lengkap dan bisa langsung dicoba ada di [`src/week-7/`](./src/week-7/).

---

## 🗄️ Table `users`

Sebelum bikin form-nya, kita siapin dulu tabelnya di database.

```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

📄 [`src/week-7/create_table_users.sql`](./src/week-7/create_table_users.sql)

> ⚠️ **Catatan:** kolom `password` dibikin `varchar(255)` bukan `varchar(50)` biasa, soalnya hasil `password_hash()` PHP itu panjang. Jangan pernah nyimpen password dalam bentuk plain text ya guys!

---

## 📝 register.php — Alur Register

Alur singkatnya:

1. `require('koneksi.php')` buat konek ke database, lalu `session_start()`
2. kalau user submit form, semua input di-`stripslashes()` lalu di-`mysqli_real_escape_string()` — ini cara **sederhana** buat mitigasi SQL injection
3. validasi: field ga boleh kosong, password harus sama dengan re-password
4. cek dulu ke fungsi `cek_nama()` apakah username sudah kepake atau belum
5. kalau aman, password di-hash pakai `password_hash($password, PASSWORD_DEFAULT)` baru di-`INSERT`
6. sukses → redirect ke `index.php` dan simpan `username` ke `$_SESSION`

📄 [`src/week-7/register.php`](./src/week-7/register.php)

> 🐛 **Ketemu bug beneran nih guys** (transkrip apa adanya dari materi aslinya, sengaja ga dibenerin biar jadi bahan latihan):
> ```php
> $query = "INSERT INTO users (username,name,email, password ) VALUES ('$username','$nama'
> ,'$email','$pass')";
> ```
> variabel yang di-assign itu `$name`, tapi yang dipake di query `$nama` — beda nama variabel, jadi bakal muncul **undefined variable warning** dan kolom `name` di-database bakal kosong. ini contoh bagus kenapa **unit test** (kayak yang kalian bikin di `sqa-4`) penting banget buat nangkep bug kayak gini sebelum sampai production.

---

## 🏠 index.php — Halaman yang Diproteksi

`index.php` ini contoh halaman yang cuma boleh diakses kalau user **sudah login**:

```php
if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}
```

Kalau session `username` ga ada, langsung di-redirect balik ke `login.php`. Pattern kayak gini yang biasanya disebut **route guard** / **auth middleware** versi paling sederhana.

📄 [`src/week-7/index.php`](./src/week-7/index.php)

---

## 🔑 login.php — Alur Login

Mirip sama register, bedanya di sini kita:

1. `SELECT * FROM users WHERE username = '$username'`
2. ambil hash password dari row yang ketemu
3. cocokin pakai `password_verify($password, $hash)` — **bukan** `==` ke plain text, karena passwordnya udah di-hash pas register
4. kalau cocok → simpan `username` ke session, redirect ke `index.php`

📄 [`src/week-7/login.php`](./src/week-7/login.php)

> 🐛 **Bug lain yang ke-transkrip apa adanya:** pas username ga ketemu di database (`$rows == 0`), pesan errornya malah `'Register User Gagal !!'` — padahal ini di halaman **login**, bukan register. Kelihatan banget ini hasil copy-paste dari `register.php` yang lupa diganti pesannya. Coba deh kalian benerin sendiri jadi `'Username atau Password salah !!'`.

---

## 🚪 logout.php — Logout

```php
session_start();
if(session_destroy()) {
    header("Location: index.php");
}
```

Simpel banget: hancurin session yang aktif, terus redirect ke `index.php` (yang otomatis bakal mental lagi ke `login.php` karena session-nya udah ga ada).

📄 [`src/week-7/logout.php`](./src/week-7/logout.php)

---

## 🎨 style.css

Styling minimal buat form register & login biar ga nempel ke atas dan ada card putih di tengah.

📄 [`src/week-7/style.css`](./src/week-7/style.css)

---

## 📌 Tugas

> Buatlah fungsi registrasi, login dan logout pada projek web masing-masing.

---

**✨ End of Week 7 ✨**
