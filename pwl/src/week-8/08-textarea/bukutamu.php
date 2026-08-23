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
