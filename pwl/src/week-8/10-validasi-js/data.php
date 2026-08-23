<SCRIPT LANGUAGE="JavaScript">
function pesan() {
  var ceknama = document.forms[0].elements[0].value;
  var cekumur = document.forms[0].elements[1].value;
  var cekemail = document.forms[0].elements[2].value;
  if (ceknama.length == 0)
      window.alert("Anda belum memasukkan nama Anda");
  else if ((cekumur < 0) || (isNaN(cekumur)) || (cekumur.length == 0))
      window.alert("Input umur Anda salah");
  else if ((cekemail.length == 0) || (cekemail.indexOf("@",1) == -1))
      window.alert("Periksa kembali alamat email Anda");
  else
      document.forms[0].submit();
}
</SCRIPT>
<H1> Selamat Datang di Situs Kami </H1>
Silakan isi identitas Anda <BR>
<FORM NAME="identity" METHOD="post" ACTION="proses.php">
<PRE>
Nama    : <INPUT TYPE="text" NAME="nama">
Umur    : <INPUT TYPE="text" NAME="umur"> tahun
Email   : <INPUT TYPE="text" NAME="email">
<INPUT TYPE="button" VALUE="Submit" onClick=pesan()>
</PRE>
</FORM>
