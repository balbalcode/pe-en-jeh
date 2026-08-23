# ✅ Pertemuan 8: Validasi Form

---

## 👋 Tag `<FORM>`

Tag `<FORM>` mendefinisikan satu kesatuan masukan. Dalam satu halaman dapat terdiri dari satu atau lebih tag `<form>`, dan dalam satu tag `<form>` bisa terdiri dari beberapa jenis masukan.

### Atribut Form

| Atribut | Fungsi |
|---------|--------|
| **ACTION** | menentukan di halaman mana form masukan akan diproses. Bisa berisi `nama_halaman.php`, atau kosong (`""`) — kalau kosong, form diproses di halaman itu sendiri |
| **METHOD** | menentukan bagaimana form akan diproses. Ada 2: **POST** dan **GET** |

### Sintaks Form

```html
<FORM ACTION="action base" METHOD="method" ENCTYPE="media type" TARGET="target window name">
  form tags
</FORM>
```

`TARGET` window name diisi:

- `_blank` : buka window baru
- `_self` : pada window yang sama
- `_parent`, `_top` : sesuai konteks frame

### Submit & Reset Button

**SUBMIT BUTTON** adalah trigger yang menandakan suatu form akan diproses — bisa berupa tombol atau komponen HTML lain yang difungsikan sebagai tombol. **RESET** dipakai buat mengosongkan data yang udah diisi sebelumnya.

---

## 📮 Penanganan Form di PHP: `$_GET`, `$_POST`, `$_REQUEST`

| Superglobal | Dipakai untuk |
|-------------|---------------|
| `$_POST` | form dengan method **POST** — data **tidak** ditampilkan di address browser |
| `$_GET` | form dengan method **GET** — data **ditampilkan** di address browser |
| `$_REQUEST` | form dengan method POST **maupun** GET |

### Contoh GET

```html
<h1>Input</h1>
<form action="getproses.php" method="get">
Masukkan nama :
<input type="text" name="nama" size="10">
<input type="submit" value="Proses">
</form>
```

```php
<!-- getproses.php -->
<body>
Nama : <?php echo $_GET["nama"]; ?>
</body>
```

📄 [`src/week-8/01-get/`](./src/week-8/01-get/)

### Contoh POST

Sama persis, tinggal ganti `method="post"` dan `$_POST["nama"]`.

📄 [`src/week-8/02-post/`](./src/week-8/02-post/)

### Contoh REQUEST

```php
<body>
Nama : <?php echo $_REQUEST["nama"]; ?>
</body>
```

`$_REQUEST` kerja baik form-nya pakai GET maupun POST.

📄 [`src/week-8/03-request/`](./src/week-8/03-request/)

---

## 🔒 Input Password

```html
<INPUT TYPE=PASSWORD NAME=name>
<INPUT TYPE=PASSWORD NAME=name MAXLENGTH=length>
<INPUT TYPE=PASSWORD NAME=name SIZE=size>
```

> ⚠️ **NB:** Gunakan metode **POST** untuk menerima data password, biar ga kelihatan datanya di address bar (beda sama GET).

Contoh:

```html
<form action="cpasswd.php" method="post">
Username : <input type="text" name="username"><br>
Password : <input type="password" name="password"><br>
<input type="submit" value="Login">
<input type="reset" value="Reset">
</form>
```

```php
<!-- cpasswd.php -->
<body>
<h1>Only for authorized user</h1>
<hr>
<?php
$username = $_POST["username"];
$password = $_POST["password"];
?>
Username : <?php echo $username; ?> <br>
Password : <?php echo $password; ?><br>
</body>
```

📄 [`src/week-8/04-password/`](./src/week-8/04-password/)

---

## 🔘 Input Radio Button

```html
<INPUT TYPE=RADIO NAME=name VALUE=value>
<INPUT TYPE=RADIO NAME=name VALUE=value CHECKED>
```

```php
<!-- cradio.php -->
<form action="cradio.php" method="post">
Gender : <br>
<input type="radio" name="gender" value="Laki-laki" checked>Laki-laki
<br>
<input type="radio" name="gender" value="Perempuan">Perempuan
<input type="submit" value="Submit Data">
</form>
<?php
$data = $_POST["gender"];
echo "Nama : $data";
?>
```

📄 [`src/week-8/05-radio/cradio.php`](./src/week-8/05-radio/cradio.php)

> 🐛 **Transkrip apa adanya:** labelnya `echo "Nama : $data"` padahal yang dipilih itu **gender**, bukan nama — kelihatan hasil copy-paste dari contoh lain. Coba benerin sendiri jadi `"Gender : $data"`.

---

## ☑️ Input Checkbox

```php
<!-- mcheckbox.php -->
<form method="post" action="proses.php">
<input type="checkbox" value="menulis" name="hobi1"> Menulis <br/>
<input type="checkbox" value="makan" name="hobi2"> Makan <br/>
<input type="checkbox" value="tidur" name="hobi3"> Tidur <br/>
<input type="checkbox" value="nonton tv" name="hobi4"> Nonton TV <br/>
<input type="submit" value="Submit" name="submit">
</form>
```

```php
<!-- proses.php -->
<?php
if (isset($_POST['hobi1']))
    echo $_POST['hobi1']."<br />";
if (isset($_POST['hobi2']))
    echo $_POST['hobi2']."<br />";
if (isset($_POST['hobi3']))
    echo $_POST['hobi3']."<br />";
if (isset($_POST['hobi4']))
    echo $_POST['hobi4']."<br />";
?>
```

Beda sama radio button, checkbox yang **ga dicentang** ga bakal terkirim sama sekali di `$_POST` — makanya tiap checkbox harus dicek pakai `isset()` dulu ("function `isset()` ini dipakai untuk mendeteksi apakah suatu variabel sudah ada dalam memory atau belum"), baru di-`echo`.

📄 [`src/week-8/06-checkbox/`](./src/week-8/06-checkbox/)

---

## 🔽 Input Combo Box (`<select>`)

```php
<!-- index.php -->
<form method="post" action="proses1.php">
PENS :
<select name="jur">
<option value="Elka">Elektronika</option>
<option value="Elin">Listrik</option>
<option value="IT">Informatika</option>
<option value="Telkom">Telekomunikasi</option>
</select>
<input type="submit" value="Submit" name="submit">
</form>
```

```php
<!-- proses1.php -->
<?php
$data = $_POST["jur"];
echo "Jurusan : $data";
?>
```

📄 [`src/week-8/07-combo/`](./src/week-8/07-combo/)

---

## 📝 Input Textarea

```php
<!-- bukutamu.php -->
<?php
$nama = $_POST["nama"];
$komentar = $_POST["komentar"];
?>
Nama : <?php echo $nama; ?> <br>
<form action="bukutamu.php" method="post">
Nama : <br>
<input type="text" name="nama"><br>
Komentar : <br>
<textarea name="komentar" cols="40" rows="5"><?php echo $komentar; ?></textarea><br>
<input type="submit" value="kirim">
<input type="reset" value="ulangi">
</form>
```

Contoh buku tamu sederhana — form yang nge-submit ke dirinya sendiri, terus nampilin lagi nilai yang barusan dikirim.

📄 [`src/week-8/08-textarea/bukutamu.php`](./src/week-8/08-textarea/bukutamu.php)

---

## 🔁 PHP_SELF — Form yang Memproses Dirinya Sendiri

`$_SERVER['PHP_SELF']` dipakai untuk mengirim variabel ke dirinya sendiri, cukup 1 file PHP aja (form dan proses jadi satu, kayak `cradio.php` & `bukutamu.php` di atas, tapi ACTION-nya dinamis).

```php
<!-- calc.php: kalkulator sederhana, baru support operator "+" -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Bil1 : <input name="bil1" type="text" size=4><br>
Bil2 : <input name="bil2" type="text" size=4><br>
Operator : <input name="op" type="text" size=2><br>
<input type="submit" value="Proses">
<?php
$a = $_POST["bil1"];
$b = $_POST["bil2"];
$c = $_POST["op"];
echo "<br>";
echo "Output : <br>";
if ($c=="+")
{
    $hasil = $a+$b;
    echo "Hasil = $hasil";
}
?>
</form>
```

Contoh: Bil1=5, Bil2=4, Operator=+ → Output: `Hasil = 9`.

📄 [`src/week-8/09-phpself/calc.php`](./src/week-8/09-phpself/calc.php)

> 📌 **Latihan tambahan:** kode aslinya cuma nangenin operator `+`. Coba tambahin cabang buat `-`, `*`, dan `/` sendiri.

---

## 🛡️ Form Validation

Untuk validasi sebuah form, kita bisa pakai:

1. **JavaScript** — diproses di sisi **client**
2. **PHP Script** — diproses di sisi **server**
3. cek panjang data (**Panjang**)
4. cek data kosong

### Validasi dengan JavaScript

```html
<SCRIPT LANGUAGE="JavaScript">
function pesan() {
  var ceknama = document.forms[0].elements[0].value;
  var cekumur = document.forms[0].elements[1].value;
  var cekemail = document.forms[0].elements[2].value;
  if (ceknama.length == 0)
      window.alert("Anda belum memasukkan nama Anda");
  else if ((cekumur < 0) || (isNaN(cekumur)) || (cekumur.length == 0))
      window.alert("Input umur Anda salah");
  else if ((cekemail.length == 0) || (cekemail.indexOf("@",1) == -1))
      window.alert("Periksa kembali alamat email Anda");
  else
      document.forms[0].submit();
}
</SCRIPT>
<H1> Selamat Datang di Situs Kami </H1>
Silakan isi identitas Anda <BR>
<FORM NAME="identity" METHOD="post" ACTION="proses.php">
<PRE>
Nama    : <INPUT TYPE="text" NAME="nama">
Umur    : <INPUT TYPE="text" NAME="umur"> tahun
Email   : <INPUT TYPE="text" NAME="email">
<INPUT TYPE="button" VALUE="Submit" onClick=pesan()>
</PRE>
</FORM>
```

Kuncinya: pakai `<INPUT TYPE="button">` (bukan `type="submit"`), lalu `onClick=pesan()` yang manggil fungsi validasi. Kalau semua pengecekan lolos, baru `document.forms[0].submit()` dipanggil manual buat ngirim form-nya.

📄 [`src/week-8/10-validasi-js/data.php`](./src/week-8/10-validasi-js/data.php)

> ℹ️ **Catatan:** deck aslinya cuma nunjukin `data.php` buat contoh ini, `proses.php`-nya ga ditampilin (soalnya validasi udah kejadian duluan di client). File `proses.php` di folder ini adalah rekonstruksi minimal biar contohnya bisa langsung dicoba.

### Validasi dengan PHP Script

```php
<!-- data.php -->
<H1> Selamat Datang di Situs Kami </H1>
Silakan isi identitas Anda <BR>
<FORM METHOD="post" ACTION="proses.php">
<PRE>
Nama    : <INPUT TYPE="text" NAME="nama">
Umur    : <INPUT TYPE="text" NAME="umur"> tahun
Email   : <INPUT TYPE="text" NAME="email">
<INPUT TYPE="submit" VALUE="Send">
</PRE>
</FORM>
```

```php
<!-- proses.php -->
<?php
$nama = $_POST["nama"];
$umur = $_POST["umur"];
$email = $_POST["email"];

if (strlen($nama) == 0)
    echo "Silahkan masukkan nama anda<br>";

if ((trim($umur) == '') || ($umur < 0) || (ereg('[^0-9]', $umur)))
    echo "Input umur anda salah<br>";

if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
    echo "Invalid email<br>";
}
?>
```

📄 [`src/week-8/11-validasi-php/`](./src/week-8/11-validasi-php/)

> ⚠️ **Fungsi deprecated:** `ereg()` dan `eregi()` udah **dihapus total** dari PHP sejak PHP 7.0 (dulu cuma deprecated di PHP 5.3+). Materi aslinya ditulis buat PHP versi lama. Kalau mau jalanin di PHP modern, ganti ke fungsi `preg_match()` — contoh: `preg_match('/[^0-9]/', $umur)` dan `preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)`. Ini juga contoh bagus kenapa kode lama perlu di-maintain — lihat lagi konsep [Maintainability di sqa-4](../sqa-4/week-2.md).

---

## 📌 Latihan

> Buatlah program form input pada UTS dengan menggunakan validasi PHP.

---

**✨ End of Week 8 ✨**
