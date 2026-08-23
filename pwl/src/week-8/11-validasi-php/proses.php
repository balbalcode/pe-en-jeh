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
