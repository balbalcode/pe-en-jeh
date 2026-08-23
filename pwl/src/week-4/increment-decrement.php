<html>
<body>
    <h1> Operator Increment & Decrement</h1>
<p>
<?php
echo '<h4><u>Post-increment</u></h4>';
    $a = 5;
    echo '$a = '.$a.'<br />';
    echo '$a akan bernilai 5 = '.$a++.' (operasi $a++)<br />';
    echo '$a akan bernilai 6 = '.$a.'<br />';

    echo '<h4><u>Pre-increment</u></h4>';
    $a = 5;
    echo '$a = '.$a.'<br />';
    echo '$a akan bernilai 6 = '.++$a.' (operasi ++$a)<br />';
    echo '$a akan bernilai 6 = '.$a.'<br />';

echo "<h4><u>Post-decrement</u></h4>";
    $a = 5;
    echo '$a = '.$a.'<br />';
    echo '$a akan bernilai 5 = '.$a--.' (operasi $a--)<br />';
    echo '$a akan bernilai 4 = '.$a.'<br />';

    echo "<h4><u>Pre-decrement</u></h4>";
    $a = 5;
    echo '$a = '.$a.'<br />';
    echo '$a akan bernilai 4 = '.--$a.' (operasi --$a)<br />';
    echo '$a akan bernilai 4 = '.$a.'<br />';
?>
</p>
</body>
</html>
