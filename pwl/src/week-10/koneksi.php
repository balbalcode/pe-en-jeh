<?php
// koneksi.php tidak ditampilkan di slide Pertemuan 10 (dianggap sudah ada dari pertemuan CRUD sebelumnya).
// Skema di sini disamakan dengan nama kolom yang dipakai pagination.php: nama_mhs, NIM, alamat.
$koneksi = mysqli_connect("localhost", "root", "", "akademik");

if (!$koneksi) {
    die("Koneksi database gagal : " . mysqli_connect_error());
}
