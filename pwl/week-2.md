# 🗄️ Pertemuan 2: Database MySQL

---

## 👋 Apa itu MySQL?

MySQL adalah sistem manajemen database relasional (**RDBMS**) berbasis open-source yang populer digunakan oleh kebanyakan orang. MySQL dipakai untuk mengelola dan mengakses data dalam jumlah besar, dan dipakai buat mengelola berbagai website maupun aplikasi ternama.

MySQL pakai bahasa perintah **SQL** (Structured Query Language) untuk mengakses dan memanipulasi data dalam tabel-tabel relasional.

### Struktur Hirarki Database

Untuk mengelola database diperlukan perangkat lunak yang disebut **DBMS** (Database Management System). DBMS adalah sistem perangkat lunak yang memungkinkan user untuk membuat, memelihara, mengontrol, dan mengakses database secara praktis dan efisien.

### Cara Kerja MySQL

1. Software (client) membuat database untuk menyimpan dan memodifikasi data, serta menentukan keterkaitan antar tabel
2. Client memberikan perintah dengan instruksi spesifik menggunakan bahasa SQL
3. Server menjalankan perintah yang diterima dan menampilkan hasilnya di layar client

---

## 📋 Kategori Perintah MySQL

| Kategori | Kepanjangan | Fungsi |
|----------|-------------|--------|
| **DML** | Data Manipulation Language | manipulasi data — `INSERT`, `UPDATE`, `DELETE` |
| **DDL** | Data Definition Language | mendefinisikan struktur data — `CREATE`, `DROP`, `ALTER` |
| **DCL** | Data Control Language | hak akses & transaksi — `GRANT`, `REVOKE`, `COMMIT`, `ROLLBACK` |

**DML:**

| Perintah | Fungsi |
|----------|--------|
| `INSERT` | memasukkan data ke dalam tabel |
| `UPDATE` | mengubah data yang ada di dalam tabel |
| `DELETE` | menghapus data di dalam tabel |

**DDL:**

| Perintah | Fungsi |
|----------|--------|
| `CREATE` | membuat tabel dan database |
| `DROP` | menghapus database dan tabel |
| `ALTER` | mengubah struktur tabel (`CHANGE`, `ADD`, `DROP`, `RENAME`) |

**DCL:**

| Perintah | Fungsi |
|----------|--------|
| `GRANT` | memberikan izin ke user untuk mengakses database |
| `REVOKE` | membatalkan izin user |
| `COMMIT` | menetapkan penyimpanan pada database |
| `ROLLBACK` | membatalkan penyimpanan pada database |

---

## ⌨️ Mengoperasikan MySQL

Ada 2 cara umum buat operasiin MySQL:

1. **Command Line Interface (CLI)** — pakai `mysql` command line client yang udah include di installer MySQL
2. **phpMyAdmin** — front-end MySQL berbasis web

---

## 🧱 Tipe Data di MySQL

| Tipe data | Keterangan |
|-----------|------------|
| `INT(M) [UNSIGNED]` | angka, -2147483648 s/d 2147483647 |
| `FLOAT(M,D)` | angka pecahan |
| `DATE` | tanggal, format `YYYY-MM-DD` |
| `DATETIME` | tanggal dan waktu, format `YYYY-MM-DD HH:MM:SS` |
| `CHAR(M)` | string panjang tetap, 1–255 karakter |
| `VARCHAR(M)` | string panjang berubah-ubah, 1–255 karakter |
| `BLOB` | teks maksimum 65535 karakter |
| `LONGBLOB` | teks maksimum 4294967295 karakter |

---

## 💻 Praktik: Command Line

Semua query di bawah ini juga ada lengkap di [`src/week-2/queries.sql`](./src/week-2/queries.sql), bisa langsung dijalanin.

**Buat database:**

```sql
show databases;
create database pegawai;
use pegawai;
```

**Buat tabel `anggota`** (nomor, nama, email, alamat, kota):

```sql
create table anggota (
    nomor int(6) not null primary key,
    nama char(40) not null,
    email char(255) not null,
    alamat char(80) not null,
    kota char(20) not null
);
```

**Insert data:**

```sql
insert into anggota values (100,'Adi','adi@yahoo.com','Jl. Keputih 2A no 5','Surabaya');
```

**Tampilkan isi tabel:**

```sql
select * from anggota;
select nm_kolom from namatable;
```

**Hapus record:**

```sql
delete from anggota where nomor='103';
```

**Ubah data:**

```sql
UPDATE table SET column = value [, column = value, ...] [WHERE condition];

update anggota set email='hari_s@gmail.com' where nomor='100';
```

---

## 🖱️ Praktik: phpMyAdmin

phpMyAdmin ngasih cara yang sama tapi lewat GUI berbasis web:

1. **Create Database** — buka phpMyAdmin, pilih *Create new database*, isi nama (contoh: `pegawai`)
2. **Create Table** — isi nama tabel + jumlah field, klik *Go*
3. **Create Field** — isi tiap kolom dengan nama, tipe data, panjang, dan atribut:
   - **P** (Primary) — kunci unik pengenal baris
   - **I** (Index) — mempercepat pencarian
   - **U** (Unique) — nilai kolom harus unik
   - kolom seperti `nip` biasanya di-set **auto_increment + primary**, jadi tiap insert nilainya otomatis naik
4. Setelah tabel tersimpan, ada beberapa menu per-baris:
   - **Browse** — lihat isi tabel
   - **Insert** — tambah data baru
   - **Structure** — lihat/ubah struktur kolom
   - **Drop** — hapus field
   - **Empty** — kosongkan isi tabel
5. **Insert lewat GUI** — isi form per-kolom, phpMyAdmin otomatis generate query SQL-nya
6. **Browse** — nampilin data yang udah masuk
7. **Ubah data** — klik ikon edit di baris record, ubah nilai, simpan → phpMyAdmin nampilin jumlah record yang berubah + query SQL yang dijalankan
8. **Hapus data** — klik ikon X di baris record → konfirmasi *OK*/*Cancel*
9. **Search** — pilih menu *Search*, tentuin field, kondisi pencarian, dan urutan, lalu klik *Go*

---

## 📌 Latihan

1. Buatlah database baru dengan nama `tgs_nim_nama_mysql`
2. Buatlah tabel `pegawai` dengan field:

   | Kolom/Field | Tipe data |
   |-------------|-----------|
   | ID | `int(5) not null` |
   | Nama | `varchar(20) not null` |
   | Alamat | `varchar(20) not null` |
   | Gaji | `int(10) not null` |

3. Masukkan data-data berikut:

   | ID | Nama | Alamat | Gaji |
   |----|------|--------|------|
   | 100 | Arif | Surabaya | 10000 |
   | 101 | Andi | Jakarta | 14000 |
   | 102 | Burhan | Malang | 12000 |
   | 103 | Fikri | Madiun | 15000 |
   | 104 | Fariz | Malang | 17000 |
   | 105 | Sigit | Surabaya | 20000 |
   | 106 | Ifan | Kediri | 16000 |
   | 107 | Hanif | Yogyakarta | 12000 |
   | 108 | Zakiuddin | Surabaya | 21000 |

4. Hapus record dengan ID 100
5. Update data untuk ID 101 dan 102:

   | ID | Nama | Alamat | Gaji |
   |----|------|--------|------|
   | 101 | Naila | Surabaya | 10000 |
   | 102 | Rafi | Semarang | 14000 |

6. Buat perintah SQL untuk menampilkan:
   - semua kolom dari tabel `pegawai`
   - kolom nama dan gaji
   - kolom nama dan alamat yang namanya berawalan **F**
   - kolom nama dan alamat yang namanya berakhiran **n**
   - kolom nama dan gaji yang gajinya di atas 15000

Jawaban lengkapnya ada di bagian bawah [`src/week-2/queries.sql`](./src/week-2/queries.sql) — coba kerjain sendiri dulu sebelum ngintip guys!

---

**✨ End of Week 2 ✨**
