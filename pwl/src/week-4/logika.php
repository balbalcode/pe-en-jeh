<html>
<body>
    <h1> Operator logika</h1>
<p>
<?php
$b = 4!=4;
$c = 3+7 == 10;
$a = ($b and $c);
echo "\$a=$a <br>";
$a = ($b or $c);
echo "\$a=$a <br>";
$a = ($b xor $c);
echo "\$a=$a <br>";
$a = (!$b or $c);
echo "\$a=$a <br>";
$a = $b && $c;
echo "\$a=$a <br>";
$a = $b || $c;
echo "\$a=$a <br>";

?>
</p>
</body>
</html>
