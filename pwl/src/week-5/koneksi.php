<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'latihan'; // Nama Database
//simpan koneksi ke database ke variabel $conn
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
/*tes apakah koneksi gagal ( if (!$conn) ) jika gagal maka script akan berhenti dan memunculkan pesan
kesalahan penyebab gagal nya koneksi, jika berhasil, akan tampil terkoneksi ke MySQL.*/
if (!$conn) {
    die ('Gagal terhubung MySQL: ' . mysqli_connect_error());
}
else
{
    echo "terkoneksi ke MySQL !<br>";
}
