# 📚 Week 2: Part-by-part


> BTW kerjain tugas di week-1 yaak kalau ada guys. Lets explore this repository (asal jangan ngepush ke repo ini 😂).

Kita akan bahasa mengenai, part-part atau komponen yang ada untuk kita measure atau memastikan bahwa software yang kita produce ini terbilang andal. McCall's ini adalah salah satu metode yang kita pilih dan kita gunakan guna menempuh mata perkuliahan ini ya, kalian bisa eksplor kalau mau tau lebih banyak.


Bicara soal kebutuhan software quality, tentunya kita sepakat bahwa keinginan kita "software dapat digunakan secara masif" dan mungkin ada yang "digunakan secara daily" (karna ini adalah cara kita dapet uang 😅). kita akan coba untuk helicopter view. kita akan melihat kenapa kita butuh software quality yang baik, kita akan melihat dari sisi kita sebagai user, kita sebagai developer. 

### Software quality matters for user
Sebagai pengembang software tentunya kalian ingin softwarenya dipakai oleh user, tapi kalau kita jadi user bro-sis kira kira sepenting apa ya software quality yang ngebikin kita jadi "mau" untuk pakai sistem mereka.
1. **kebutuhan mereka bisa solved** thats it, yang penting kebutuhan mereka bisa disolve
2. **usability, performance, and reliability**, ini cukup krusial akalu bicara 3 hal ini. karna sistem yang andal itu mudah digunakan, performancenya ga lelet dan reliabel. 
3. **seamless addictive**, secara ga langsung ngebikin adiksi untuk mereka. bayangin ada salah satu marketplace yang bikin fitur live kemudian kalau live ada voucher dll. kalian scroll nemu barang lucu mungkin akan tertarik untuk CO bro-sis.

---

### Software quality matters for developer

Bukan cuma buat user bro pastinya klo soal quality bagus ini, ternyata bisa buat kita as a developer. based on my experience, ngoding dengan code yang udah rapih secara arsitektur dan lain sebagainya jauh lebih mudah, cepat dan worry less. oke kita bedah 1-1.

1. **maintainnya mudah dan flexible**, bayangin kalau tiba-tiba kalian diminta hand-over kerjaan orang yang maintainnya mudah tentunya flexible. sekarang ditambah AI, kerjaan kalian makin mudah dan escalate nya lebih cepet
2. **Not a “fragile” code**, kalau kalian ngoding tapi salah dikit langsung broken sistemnya wkwk, kebayang ga ngoding disini eh disini affected dan jadi bug. ngodingnya jadi 2x bro.
3. **having documentation**, dokumetasi sekarang ga cuma kodingan bro, tapi error juga kalau ada dokumentasinya. kalian klo BSOD windows udah tau kan kodenya berapa? yaak, itu karna mereka nentuin error code dan lain-lain yang ngebikin mudah mereka dan juga penggunanya untuk fixing their problem.


---

<br>

> Software quality nya baik, akan berdampak pada development time yang finalnya akan mempengaruhi cost dan juga budgetting bro. bayangin kalau kalian diminta bikin 1 fitur yang dokumentasinya lengkap, handling errornya cepet kalian bisa kerjain dengan cepat tentunya perusahaan bisa rilis banyak fitur atau lainnya dalam waktu yang singkat

## Let's talk about Mc Call's
Yo guys, jadi dari sekian banyak metode yang ada salah satunya kita akan bicara mengenai McCall's. McCall's ini definisiin faktor-faktor sqa jadi 3 group guys, total ada 11 parts. Ada product operation,  product revision dan yang terakhir ada product transition. kita bahas 1-1.


### McCall's method - Product Operation
Tanpa berfikir panjang, kita bisa lihat "operation" dalam caption diatas. yaa intinya faktor yang ditentuin dari bagaimana produk tersebut di operasikan, mudahkah? efisienkah? reliabelkah? usefulkah?. nah dalam pengelompokkan faktor ini diantaranya ada:
1. Correctness -> ini tuh sisi yang bakal ngelihat apakah sistem atau apps yang dibangun akan sama dengan apa yang direncanakan sebelumnya.
2. Relibaility -> kalau ini sisi yang ngelihat seberapa reliabel sistem lu digunain oleh user, bener ga? failed ga? atau malah ga bisa digunain.
3. Usability -> kita pasti udah sering denger kata "Usability" intinya seberapa mudah sistem kita digunain
4. Efficiency -> ini untuk melihat guys, seberapa efisien sistem kita selama beroperasi
5. Integrity -> ini integritas dalam sistem yang kalian bangun, sistem kalian ini ngejaga data customer ga? bisa dipastiin ga datanya ga bocor/leak dll.

jadi guys, kalau kita lihat kembali-- product operation ini adalah faktor yang akan "terlihat" atau "muncul" atau "dapat dinilai" ketika sistem yang kalian bikin ini dijalankan. 

### McCall's method - Product Revision
kata kunci buat nebak dan mahamin faktor ini sebenernya ada pada kata "REVISI", yaa ini adalah faktor yang ditentuin dari bagaimana produk kalian itu bisa di benahi kesalahan atau errornya. langsung aja biar kebayang ada apa aja faktornya:
1. Maintainability: Maintainability jelas lah ya, kalau sistem yang kalian bikin mudah untuk di-maintain, kemungkinan faktor ini akan dimilki oleh sistem kalian
2. Flexibiliy: Singkat saja, sistem yang kalian bikin ini kalau ga fleksibel rumit guys. masa ubah dikit disini, eh yang disana juga harus diubah. development akan terasa runyam
3. Testability: ini sistem yang kalian bikin punya dan kemungkinan bisa ditest kah?

Nah guys, faktor ini akan muncul ketika masalah terjadi guys. jadi biasanya post-development kalian akan melihat walah ada error disini, walah ada bug atau kurang fitur ini. nah faktor ini akan muncul guys!


### McCall's method - Product Transition
The last one, product transition. mungkin ini ga bisa ditebak dengan mudah guys, tapi intinya faktor ini adalah faktor yang nentuin atau yang nilai seberapa mudah sistem kalian itu di-transisi atau dibawa kesana-kesini. misal ganti os lah, ganti device lah atau bahkan harus berhubungan dengan sistem lain. faktornya ini guys:
1. Portability -> okeee ini faktor yang akan melihat seberapa portable sistem yang kalian bikin, sebagai contoh kalian bikin web. nah ini web kalian ketika dibuka di mobile/ handphone akan ngehasilin data yang sama atau tidak.
2. Reusability -> oke ini agak rumit untuk dijelasin sebagai simplenya mungkin kalian bisa melihat ada beberapa tampilan yang sama dalam 1 aplikasi. nah itu ada proses "reusable" apakah sistem kalian punya hal tsb atau tidak.
3. Interoperability -> nah kalau last one ini, ini si ngelihat seberapa bisa sistem atau apps kalian itu bisa communicate atau elaborate sama sistem lain nih.

Kurang lebih itu bro, 




So McCall's is a one of a few methods which available to ensuring the system or software quality in 3 groups which is contains 11 parts. this is old model but still relevant. and guys, since we're totally refer to one book "daniel galin, Software Quality Assurance: From theory to implementation" this is also mentioned there.

**✨ End of Week 2 ✨** 