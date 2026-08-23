# 🤖 Pertemuan 9: Fungsi CAPTCHA

---

## 👋 Apa itu CAPTCHA?

**CAPTCHA** adalah singkatan dari *Completely Automated Public Turing test to tell Computers and Humans Apart* — sebuah metode turing test yang digagas oleh Alan Turing pada tahun 1950.

CAPTCHA adalah sejenis fitur *challenge-response* untuk memastikan bahwa respon yang dihasilkan hanya boleh dibuat oleh manusia, bukan komputer. CAPTCHA dipakai untuk mencegah akses otomatis (bot) melakukan hal yang sama seperti manusia — sign up, login, dsb.

### Kegunaan CAPTCHA

- Mencegah komentar spam di website
- Melindungi pendaftaran di website
- Melindungi alamat email dari scrapper
- Mencegah search engine bot
- Melindungi dari brute-force / dictionary attack
- Melindungi dari serangan worms, DOS

### Tipe-Tipe CAPTCHA

| Tipe | Cara kerja |
|------|------------|
| **Hard Recognized Text** | teks yang sulit dikenali, diacak bentuknya, warna beragam — paling banyak dipakai |
| **Pattern Matching** | user diminta memilih gambar yang sesuai dengan kata yang diharapkan, atau mencocokkan gambar sejenis |
| **Sound Recognition** | awalnya buat user dengan kelemahan penglihatan, pakai teknik "scramble voice" |

Yang kita bikin minggu ini adalah tipe **Hard Recognized Text** — generate teks acak jadi gambar pakai PHP GD Library.

Kode lengkap ada di [`src/week-9/`](./src/week-9/).

---

## 📝 index.php — Form Login + Captcha

```php
<form action="hasil.php" method="post">
<table border="0" cellpadding="0" cellspacing="0" align="center">
  <tr><td>Username</td><td><input name="username" maxlength="20"></td></tr>
  <tr><td>Password</td><td><input type="password" name="password" maxlength="15"></td></tr>
  <tr>
    <td>Captcha</td>
    <!-- tentukan letak script generate gambar -->
    <td><img src="captcha.php" alt="gambar" /></td>
  </tr>
  <td>Isikan captcha</td>
  <td><input name="kodecaptcha" maxlength="5"/></td>
  <tr><td><input id="submit" type="submit" value="Login"></td></tr>
</table>
</form>
```

Perhatiin `<img src="captcha.php">` — attribut `src` gambar itu ga harus file gambar statis, bisa nunjuk ke script PHP yang **generate gambar langsung** pas di-request. Itu yang bakal kita bikin di `captcha.php`.

📄 [`src/week-9/index.php`](./src/week-9/index.php)

> 🐛 **Transkrip apa adanya:** baris `<td>Isikan captcha</td>` ga didahului `<tr>` pembuka (row sebelumnya udah ditutup `</tr>`) — table row-nya jadi ga simetris. Browser modern biasanya masih toleran, tapi ini best practice yang buruk. Coba benerin sendiri strukturnya.

---

## 🎨 captcha.php — Generate Gambar Captcha

Alur:

1. `acakCaptcha()` — bikin string random 5 karakter dari kumpulan huruf+angka pakai `rand()`
2. simpan hasilnya ke `$_SESSION["code"]` (buat dicocokin nanti pas submit)
3. `imagecreatetruecolor(173, 50)` — bikin canvas gambar
4. `imagecolorallocate()` — tentuin warna background & teks
5. `imagestring()` — tulis kode captcha ke gambar
6. `header('content-type: image/jpg')` + `imagejpeg()` — kirim gambar ke browser
7. `imagedestroy()` — bebasin memory

```php
function acakCaptcha() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array();
    $panjangAlpha = strlen($alphabet) - 2;
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $panjangAlpha);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}
```

📄 [`src/week-9/captcha.php`](./src/week-9/captcha.php)

> ⚠️ **Catatan:** kalau captcha ga muncul (error `imagecreatetruecolor()`), harus aktifin PHP GD Library dulu di `php.ini` — contoh lokasinya `C:\xampp\apache\bin\php.ini`, cari baris `extension=php_gd2.dll` dan hapus tanda `;` di depannya (remark).

---

## ✅ hasil.php — Verifikasi Captcha

```php
session_start();
if ($_SESSION["code"] != $_POST["kodecaptcha"]) {
    echo "Kode CAPTCHA anda salah";
} else {
    echo "Kode CAPTCHA anda benar";
}
```

Simpel: cocokin `$_SESSION["code"]` yang disimpan pas generate gambar, sama input `kodecaptcha` yang diketik user.

📄 [`src/week-9/hasil.php`](./src/week-9/hasil.php)

---

## 🎨 style.css

Styling form + tombol submit bulat dengan efek hover.

📄 [`src/week-9/style.css`](./src/week-9/style.css)

---

## 📌 Tugas

> Buatlah fungsi captcha pada projek web masing-masing.

---

**✨ End of Week 9 ✨**
