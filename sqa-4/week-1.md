## The Concept
yo guys, ini pertemuan pertama kalian. basically disini kalian akan belajar mengenai apa itu quality assurance, software dan kenapa software quality assurance. dari semua pertemuan ini kalian akan dapat project akhir yang akan berhubungan dengan setiap pertemuan yang kita lakukan, yaaa penulis tidak akan maksa kalian untuk memperhatikan atau tidak. 


BRO, hampir 99% orang yang kuliah ingin dapet pekerjaan yang lebih baik. kalau klean belajar dan baca ini? kira-kira lowongan pekerjaan apa yang bisa banget kalian pick guys?
yaa selama masih kompeni tech-tech bum AFAIK:
- SDET
- manual tester
- penetration tester
- automation tester
- it auditor
- security testing
- bug bounty (paling menggoda......)


<br>
<br>

setelah baca ringkasan buku `Software Engineering: A Practitioner’s Approach` tulisan Roger S. Pressman dan `Software Engineering` karangan Ian Sommerville:  ada kutipan:
> “Software is a collection of computer programs, procedures, and associated documentation and data.”

<br>
Software adalah sekumpulan program komputer, data serta prosedur yang saling berkaitan tapi guys ada juga kutipan
<br>

> "Software is not just the programs themselves but also all associated documentation and configuration data that is required to make these programs operate correctly.”

<br>
jadi kalau kita simpulin bareng: SOFTWARE itu sistem yang isinya sekumpulan apa yg disebutin diatas **TAPI** bukan cuma kodingan yang mungkin kalian udah pelajari dibeberapa matkul lainnya. nah matkul ini kalian akan membuka mindset bahwa __SOFTWARE itu BUKAN CUMA KODINGAN kalian yang jalan ga error TAPI terdokumentasi__
<br>
<br>

> Kalau dokumentasi jelek, menurut kalian, kualitas softwarenya masih bisa dibilang baik atau tidak?

jawabannya tergantung KANTOR wkwk, yg penting rilis dlu guys! tapi dalam mata perkuliahan ini kita akan paksa jawabannya adalah "tidak". 
<br>
<br>
___

> [!IMPORTANT]
> AH GUA KAGA MAU JADI ROLE DIATAS, GUA KAGA PERLU FOKUS DI MATKUL INI.
>
> BROO 😅, disamping kalian akan punya kewajiban untuk menyelesaikan final project kalian juga akan mengerti kalau software/apps/fitur yang akan kerjakan nanti didunia kerja bisa minim fault. dan yang paling penting tim klean ga akan dikejar terus menerus oleh tim QA karna yang klean bikin dah sesuai dengan requirement dan sejenisnya.
___



### The parts
sekarang kita beralih ke  `ERROR`, `FAULT` dan `FAILURE`. yang namanya sistem selama dibikin pasti klean pasti akan ketemu yang namanya `ERROR` or `HUMAN ERROR` yang bakal sebabin sistem kalian produce `FAULT` seburuk-buruknya bahkan bisa ngebikin sistem klean `FAILURE`.

buat pahamin, apa yang tertulis diatas coba deh baca poin-poin dibawah:
- `ERROR` or `HUMAN ERROR` itu kesalahan yang terjadi di dalam pikiran manusia sebelum perangkat lunak dijalankan.
- `FAULT` naaah ini bug nih, klean ada dipart ini. ini tuh  kesalahan yang tertanam di dalam perangkat lunak sebagai akibat langsung dari `ERROR` or `HUMAN ERROR`.
- `FAILURE` simplenya ini adalah unexpected guys, ini tuh sistem kalian yang harusnya bisa jalanin 1 perintah, tapi gagal.


kira-kira begini guys. saat kalian bikin sistem atau bikin aplikasi marketplace kemudian ada fitur voucher. dan user pakai fitur itu dengan skenario
1. user punya voucher 50.000
2. user pilih barang dan redi buat checkout dengan total barang dan belanja intinya cuma 10.000
3. user pake voucher 50.000, **dan klean ga bikin validasi yg advanced untuk voucher yg kalian bikin** jadi total belanja user `10.000 - 50.000 = - 40.000`
4. pas mau checkout kaga bisa, masa ada virtual account yang bisa charge atau nagih - 40.000, kaga mungkin brok klean ngutang ke user 😅

___

### Whats SQ & SQA?
bro, SQ atau software quality adalah titik dimana apps klean itu terukur kualitasnya, apakah buruk dan lain sebagainya. karna kalian ga ingin dong apps kalian yang bikin banyak bug. 

selanjutnya kita akan bahas apa itu SQA, software quality assurance. tentunya sebagai pengembang aplikasi atau sistem kalian basically pengen apps yang kalian bikin dipake user bukan?. nah disini pentingnya SQA.

karna at the end of the day `USER CENTRIC` akan menggoda user itu buat dateng wkwkw. SQA adalah dimana kalian bisa memastikan software yang kalian bikin sesuai dengan standard kualitas yang ada. yang bisa mastiin sistem kalian setidaknya ga fault dan ga failure.

intinya, SQ adalah state dimana apps yang kalian bikin itu memiliki kualitas, sedangkan SQA adalah proses yang dilakukan untuk mengambil keputusan bahwa apps klean itu baik or buruk. 


