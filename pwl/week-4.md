# ➕ Pertemuan 4: Elemen Operator PHP

---

## 👋 Pengantar

Operator adalah simbol-simbol untuk melakukan operasi-operasi matematis ataupun operasi string di PHP. Minggu ini kita bahas 8 jenis operator: **Aritmetika**, **Penugasan**, **Logika**, **Bitwise**, **Pembandingan**, **Increment/Decrement**, **String**, dan **Ternary**.

Semua contoh di bawah bisa langsung dicoba di [`src/week-4/`](./src/week-4/).

---

## ➗ Operator Aritmetika

Operator yang dipakai dalam operasi dasar matematika.

| Operator | Operasi |
|----------|---------|
| `+` | Penambahan |
| `-` | Pengurangan |
| `*` | Perkalian |
| `/` | Pembagian |
| `%` | Sisa bagi (modulus) |
| `**` | Pangkat |

```php
$a = 5;
$b = 2;

$c = $a + $b;  echo "$a + $b = $c";  // 7
$c = $a - $b;  echo "$a - $b = $c";  // 3
$c = $a * $b;  echo "$a * $b = $c";  // 10
$c = $a / $b;  echo "$a / $b = $c";  // 2.5
$c = $a % $b;  echo "$a % $b = $c";  // 1
$c = $a ** $b; echo "$a ** $b = $c"; // 25
```

📄 [`src/week-4/aritmetika.php`](./src/week-4/aritmetika.php)

---

## 🟰 Operator Penugasan

Berfungsi memberikan nilai ke sebuah variabel. Dilambangkan dengan tanda sama dengan (`=`). Bersifat fleksibel dan bisa dipakai dengan berbagai variasi — sering dipakai buat pendefinisian nilai dari suatu variabel, atau pendefinisian variabel dengan pernyataan.

```php
$a = 3;
$b = 7;
$a += 6;          // $a = $a + 6 -> 9
$b = ($c = 9) + 3; // assign $c = 9, lalu $b = 9 + 3 -> 12

echo "Var a = $a"; // 9
echo "Var b = $b"; // 12
echo "Var c = $c"; // 9
```

📄 [`src/week-4/penugasan.php`](./src/week-4/penugasan.php)

---

## 🔀 Operator Logika

| Operator | Nama |
|----------|------|
| `and` / `&&` | dan |
| `or` / `\|\|` | atau |
| `xor` | atau ekslusif |
| `!` | tidak/bukan (not) |

```php
$b = 4!=4;       // false
$c = 3+7 == 10;  // true

$a = ($b and $c); // and
$a = ($b or $c);  // or
$a = ($b xor $c); // xor
$a = (!$b or $c); // not
$a = $b && $c;    // and (short-circuit)
$a = $b || $c;    // or (short-circuit)
```

📄 [`src/week-4/logika.php`](./src/week-4/logika.php)

---

## 💾 Operator Bitwise (operasi bilangan biner)

| Operator | Nama |
|----------|------|
| `&` | dan (AND) |
| `\|` | atau (OR) |
| `^` | atau ekslusif (XOR) |
| `<<` | geser kiri (shift left) |
| `>>` | geser kanan (shift right) |

```php
$a = 60;
$b = 13;

$c = $a & $b;  // bitwise AND
$c = $a | $b;  // bitwise OR
$c = $a ^ $b;  // bitwise XOR
$c = $a << $b; // shift left
$c = $a >> $b; // shift right
```

📄 [`src/week-4/bitwise.php`](./src/week-4/bitwise.php)

---

## ⚖️ Operator Pembandingan

Dipakai untuk membandingkan dua atau lebih nilai, variabel, atau pernyataan, dan menghasilkan nilai `True` atau `False`.

| Operator | Arti |
|----------|------|
| `==` | Sama (melihat data secara fisik/nilai) |
| `===` | Identik (melihat data dari tipe data juga) |
| `!=` | Tidak sama |
| `!==` | Tidak identik |
| `<` | Lebih kecil |
| `>` | Lebih besar |
| `<=` | Lebih kecil atau sama dengan |
| `>=` | Lebih besar atau sama dengan |

---

## ⬆️⬇️ Operator Increment & Decrement

Berfungsi menambah atau mengurangi nilai variabel dengan satu (`1`).

- **Increment**: `++` (dua tanda tambah) di kiri atau kanan variabel
- **Decrement**: `--` (dua tanda kurang) di kiri atau kanan variabel
- Operator di **kiri** variabel → **pre**increment/**pre**decrement
- Operator di **kanan** variabel → **post**increment/**post**decrement

> Kalau pakai **post**increment, nilai variabel tepat saat ekspresi dinyatakan masih tetap nilai yang sama — baru di langkah berikutnya ditambah satu. Kalau pakai **pre**increment, nilai variabel langsung bertambah satu saat ekspresi dinyatakan. Berlaku hal yang sama untuk post/pre-decrement.

```php
$a = 5;
echo $a++; // cetak 5 dulu (nilai lama), BARU $a jadi 6
echo $a;   // 6

$a = 5;
echo ++$a; // $a jadi 6 DULU, baru dicetak 6
echo $a;   // 6
```

📄 [`src/week-4/increment-decrement.php`](./src/week-4/increment-decrement.php)

---

## ❓ Operator Ternary

Operator ternary dipakai buat bikin sebuah kondisi dalam satu baris. Simbol yang dipakai: tanda tanya (`?`) dan titik dua (`:`).

```php
$suka = true;
$jawab = $suka ? "iya" : "tidak";
echo $jawab; // iya
```

📄 [`src/week-4/ternary.php`](./src/week-4/ternary.php)

---

## 📌 Latihan

> Kerjakan semua contoh program yang ada pada materi dan berikan penjelasannya.
>
> Buat Program Kalkulator.

---

**✨ End of Week 4 ✨**
