# 🧪 Week 4: Testing

------------------------------------------------------------------------

## 👋 Introduction

yo guys, di pertemuan ini kita bakal bahas sesuatu yang sering banget
disalah pahami di dunia software engineering yaitu **TESTING**.

banyak developer yang mikir:

> "testing itu buat buktiin kalau sistem kita udah bener"

**BRO... salah.**

testing itu bukan buat buktiin sistem kalian benar.\
testing itu buat **nemuin kesalahan sebanyak mungkin sebelum user yang
nemuin.**

karena kalau user yang nemuin duluan?

yaa siap-siap aja **kena komplain, tiket bug, atau bahkan rollback
production** 😅

di materi ini kita akan bahas:

-   tujuan testing
-   aktivitas testing
-   jenis-jenis testing
-   siapa saja yang terlibat dalam testing

------------------------------------------------------------------------

# 🎯 The Goals of Testing

sebelum kita ngomongin teknik testing, kita harus ngerti dulu **kenapa
testing itu penting**.

kalau gua tanya:

> menurut kalian tujuan testing itu apa?

biasanya jawabannya:

-   buat ngecek aplikasi jalan
-   buat mastiin sesuai requirement
-   buat nyari bug
-   atau kadang buat **jadi senjata kalau tim lain nyalahin kita** 😅

tapi secara akademis, testing punya tujuan yang lebih jelas.

------------------------------------------------------------------------

## 📚 Goals of Testing (Ian Sommerville)

dari buku **Software Engineering -- Ian Sommerville**, testing punya
beberapa tujuan utama.

### 🧑‍💻 Ensuring Customer Satisfaction

testing memastikan software yang kalian buat **benar-benar sesuai dengan
kebutuhan user**.

karena percuma sistem kalian keren kalau **user ga bisa pake**.

------------------------------------------------------------------------

### 📋 Verification of Requirements

testing memberikan **bukti bahwa requirement yang ada sudah terpenuhi**.

misalnya requirement bilang:

> user bisa login menggunakan email dan password

maka testing akan memastikan **fitur login benar-benar bekerja**.

------------------------------------------------------------------------

### 📐 Specification Compliance

testing memastikan setiap program atau module **berjalan sesuai dengan
desain sistem**.

contohnya:

-   function harus return integer
-   API harus return JSON
-   response harus sesuai schema

------------------------------------------------------------------------

### 💰 Cost Efficiency

ini penting banget di industri.

fix bug **sebelum release** jauh lebih murah dibanding **fix bug di
production**.

contohnya:

-   bug ketahuan saat coding → 5 menit fix
-   bug ketahuan saat production → bisa makan **hari bahkan minggu**

------------------------------------------------------------------------

# 🎯 Direct Goals of Testing

menurut **Daniel Galin -- Software Quality Assurance: From Theory to
Implementation**, testing punya beberapa tujuan langsung.

-   menemukan **error sebanyak mungkin**
-   meningkatkan kualitas software setelah bug diperbaiki
-   melakukan testing secara **efisien sesuai budget dan waktu**
-   mencatat error untuk **pencegahan di masa depan**
-   meningkatkan **kepercayaan developer terhadap sistem**

> testing **bukan** buat buktiin sistem kalian sempurna

testing itu buat **menunjukkan dimana sistem kalian salah**.

jadi kalau kalian bikin banyak test case dan menemukan banyak bug?

**itu berarti testing kalian bekerja dengan baik.**

------------------------------------------------------------------------

# 👥 Testing Stakeholders

testing bukan cuma kerjaan satu orang.

beberapa role biasanya ikut terlibat.

  -----------------------------------------------------------------------
  Role                                Responsibility
  ----------------------------------- -----------------------------------
  👨‍💻 **Programmer**                   melakukan **unit testing**

  🧪 **QA / Test Engineer**           melakukan **functional testing &
                                      integration testing**

  📊 **Project Manager**              ikut dalam **UAT**

  👤 **User**                         melakukan **acceptance testing**
  -----------------------------------------------------------------------

jadi testing itu **kolaborasi banyak role**, bukan cuma QA.

------------------------------------------------------------------------

# ⚙️ Testing Activities

testing bukan cuma **klik-klik random** di aplikasi.

ada proses yang harus dilakukan.

### langkah-langkah testing:

1.  menentukan **objektif yang akan diuji**
2.  menentukan **input**
3.  menentukan **expected result**
4.  menyiapkan **environment testing**
5.  menjalankan program
6.  menganalisis hasil testing

kalau kalian testing tanpa expected result?

itu bukan testing.

itu namanya **exploring tanpa tujuan** 😅

------------------------------------------------------------------------

# 🔍 Verification vs Validation

dua istilah ini sering banget bikin bingung mahasiswa.

## ✔️ Verification

verification terjadi **selama proses development**.

contohnya:

-   code review
-   unit test
-   static analysis

tujuannya:

> memastikan software **dibangun dengan benar**

------------------------------------------------------------------------

## ✅ Validation

validation terjadi **setelah sistem selesai dibuat**.

tujuannya:

> memastikan software **benar-benar menyelesaikan masalah user**

------------------------------------------------------------------------

  Term               Meaning
  ------------------ -----------------------------------
  **Verification**   are we building the system right?
  **Validation**     are we building the right system?

------------------------------------------------------------------------

# 🧪 Unit Testing (Lowest Level)

unit testing adalah testing terhadap **bagian kecil dari kode**.

contohnya:

-   function
-   class
-   method
-   procedure

actor utama:

> **developer**

tujuannya memastikan **logic code berjalan dengan benar**.

### contoh sederhana

misalnya ada function:

    counterNumbers([1,2,3])

test case:

-   apakah function dipanggil dengan benar
-   apakah return type integer
-   apakah hasilnya **6**

------------------------------------------------------------------------

# 🔗 Integration Testing

integration testing memastikan **module saling terhubung dengan benar**.

contoh:

fitur **booking ruang perpustakaan**

alur testing:

1.  user membuat order
2.  sistem menyimpan data
3.  admin menerima data

kalau salah satu gagal berarti **integrasi bermasalah**.

------------------------------------------------------------------------

# 🖥️ System Testing

system testing mengecek **seluruh sistem secara menyeluruh** sebelum
diberikan ke client.

beberapa jenis testing di level ini:

-   Functional Testing
-   Security Testing
-   Load Testing
-   Stress Testing
-   Performance Testing
-   Stability Testing
-   Reliability Testing

------------------------------------------------------------------------

# 🤖 Test Automation

automation digunakan untuk membantu proses testing.

manfaatnya:

-   meningkatkan produktivitas tester
-   meningkatkan coverage regression test
-   mempercepat proses testing
-   menurunkan biaya maintenance

> automation **tidak bisa menggantikan manual testing**

karena manusia masih lebih unggul dalam:

-   observasi
-   kreativitas
-   menemukan bug tidak terduga

------------------------------------------------------------------------
