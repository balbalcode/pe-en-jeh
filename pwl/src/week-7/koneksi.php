<?php
// koneksi.php tidak muncul di slide Pertemuan 7 (rujuk pertemuan koneksi database).
// Ini rekonstruksi standar biar folder week-7 bisa langsung dicoba.
$con = mysqli_connect('localhost', 'root', '', 'pwl_db');

if (!$con) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}
