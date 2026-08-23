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
