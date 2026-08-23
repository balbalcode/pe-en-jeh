<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Bil1 : <input name="bil1" type="text" size=4><br>
Bil2 : <input name="bil2" type="text" size=4><br>
Operator : <input name="op" type="text" size=2><br>
<input type="submit" value="Proses">
<?php
$a = $_POST["bil1"];
$b = $_POST["bil2"];
$c = $_POST["op"];
echo "<br>";
echo "Output : <br>";
if ($c=="+")
{
    $hasil = $a+$b;
    echo "Hasil = $hasil";
}
?>
</form>
