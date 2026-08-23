<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Form Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2 align="center"><b>Halaman Login</b></h2>
<!-- Membuat Form Login -->
<form action="hasil.php" method="post">
<table border="0" cellpadding="0" cellspacing="0" align="center">
<tr>
<td>Username</td>
<td><input name="username" value="" maxlength="20"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password" value ="" maxlength="15"></td>
</tr>
<tr>
<td>Captcha</td>
<!-- tentukan letak script generate gambar -->
<td><img src="captcha.php" alt="gambar" /> </td>
</tr>
<td>Isikan captcha </td>
<td><input name="kodecaptcha" value="" maxlength="5"/></td>
</tr>
<tr>
<td><input id="submit" type ="submit" value="Login"></td>
</tr>
</table>
</form>
</body>
</html>
