-- Pertemuan 2: Database MySQL
-- Dasar-dasar DDL/DML lewat MySQL command line client.

-- ================================
-- MEMBUAT DATABASE DAN TABLE
-- ================================

show databases;

create database pegawai;

use pegawai;

create table anggota (
    nomor int(6) not null primary key,
    nama char(40) not null,
    email char(255) not null,
    alamat char(80) not null,
    kota char(20) not null
);

-- ================================
-- MEMASUKKAN DATA (INSERT)
-- ================================

insert into anggota values (100,'Adi','adi@yahoo.com','Jl. Keputih 2A no 5','Surabaya');

-- Latihan: masukkan data-data berikut ke tabel anggota
insert into anggota values (105,'Adi','adi@yahoo.com','Jl. Keputih 2A no 5','Surabaya');
insert into anggota values (106,'Arif','arif@hotmail.com','Jl. Gebang Lor 32D','Surabaya');
insert into anggota values (107,'Iqbal','iqbal@yahoo.com','Jl. Klampis 3','Surabaya');
insert into anggota values (108,'Setyo','setyo@mailcity.com','Jl. Madiun 5','Sidoarjo');
insert into anggota values (109,'Ilham','ilham@yahoo.com','Jl. Surabaya 9','Malang');
insert into anggota values (110,'Syamsudin','sam@yahoo.com','Jl. Pabean 11','Surabaya');
insert into anggota values (111,'Faruq','faruq@yahoo.com','Jl. Raya 5','Kediri');
insert into anggota values (112,'Hari','hari@yahoo.com','Jl. Raya 9','Banyuwangi');

-- ================================
-- MENAMPILKAN ISI TABLE (SELECT)
-- ================================

select * from anggota;
select nama, email from anggota;

-- ================================
-- MENGHAPUS RECORD (DELETE)
-- ================================

delete from anggota where nomor='103';

-- ================================
-- MEMODIFIKASI RECORD (UPDATE)
-- ================================

-- UPDATE table SET column = value [, column = value, ...] [WHERE condition];
update anggota set email='hari_s@gmail.com' where nomor='100';

-- ================================
-- LATIHAN: tgs_nim_nama_mysql
-- ================================

create database tgs_nim_nama_mysql;
use tgs_nim_nama_mysql;

create table pegawai (
    ID int(5) not null,
    Nama varchar(20) not null,
    Alamat varchar(20) not null,
    Gaji int(10) not null
);

insert into pegawai values (100,'Arif','Surabaya',10000);
insert into pegawai values (101,'Andi','Jakarta',14000);
insert into pegawai values (102,'Burhan','Malang',12000);
insert into pegawai values (103,'Fikri','Madiun',15000);
insert into pegawai values (104,'Fariz','Malang',17000);
insert into pegawai values (105,'Sigit','Surabaya',20000);
insert into pegawai values (106,'Ifan','Kediri',16000);
insert into pegawai values (107,'Hanif','Yogyakarta',12000);
insert into pegawai values (108,'Zakiuddin','Surabaya',21000);

-- 1) Hapus record dengan ID 100
delete from pegawai where ID='100';

-- 2) Update data untuk ID 101 dan 102
update pegawai set Nama='Naila', Alamat='Surabaya', Gaji=10000 where ID='101';
update pegawai set Nama='Rafi', Alamat='Semarang', Gaji=14000 where ID='102';

-- 3) Tampilkan semua kolom dari tabel pegawai
select * from pegawai;

-- 4) Tampilkan kolom nama dan gaji dari tabel pegawai
select Nama, Gaji from pegawai;

-- 5) Tampilkan kolom nama dan alamat yang mempunyai nama dengan awalan F
select Nama, Alamat from pegawai where Nama like 'F%';

-- 6) Tampilkan kolom nama dan alamat yang mempunyai nama dengan akhiran n
select Nama, Alamat from pegawai where Nama like '%n';

-- 7) Tampilkan kolom nama dan gaji yang mempunyai gaji diatas 15000
select Nama, Gaji from pegawai where Gaji > 15000;
