<!DOCTYPE html>
<html lang="en" class="sc
roll-smooth">
  <head>
    <meta charset="utf-8" />
    <title>title</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="style.css">
    
  </head>
  <body class="bg-[#f1f1f1]">
    <div class="landingpage relative">
    <nav class="p-2 w-full h-[80px] bg-[#ffffff] flex justify-between items-center fixed z-100">
      <div class="logo flex gap-2 items-center">
        <img class="w-[50px] h-[50px]" src="img/logo.png" alt="logo" />
        <p>SMK HARAPAN MULIA</p>
      </div>
      <div class="nav flex w-[565px] gap-[20px] justify-end">
        <a href="#home">Home</a>
        <a href="#info">Informasi PPDB</a>
        <a href="#mitra">Mitra Industri</a>
        <a href="#about">Program Keahlian</a>
        <a href="#kontak">Kontak</a>
      </div>
    </nav>

    <!-- home -->
    <div id="home" class="text-[#f1f1f1] h-[626px] bg-[#0B2447] pl-20 relative pt-15">
      <div class="gam absolute right-0 h-[566px] w-[1005px]">
        <div class="gambarr absolute z-10 h-[566px] w-[1005px] bg-linear-to-r from-[#0B2447] to-transparent">
        </div>
        <img class="gambr absolute z-0 h-[565px] w-[1005px]">
          <img src="img/sekolah.jpeg" alt="sekolah"/>
          </img>
        </div>
        <h2 class="text-[48px] pt-15 z-20 relative font-weight-700"><strong>PENERIMAAN PESERTA DIDIK BARU <br> 2026/2027</strong></h2>
        <p class="relative z-20 text-[24px]">
          SMK Harapan Mulia membuka pendaftaran peserta didik baru tahun ajaran
          2026/2027 <br> secara online. Pilih Jurusan terbaikmu dan wujudkan cita-cita
          bersama kami
        </p>
        <div class="cta flex gap-4 relative z-20 items-center mt-10">
          <a class="text-[24px] bg-[#2E7D32] px-[10px] py-[5px] rounded-md" href="form.php">DAFTAR</a>
        </div>
      </div>
      </div>

      <!-- info -->
    <div id="info" class="flex justify-around">
        <img src="img/orang.png" alt="gambar" />
      <div class="kotak grid"> 
        <h3 class="text-[24px] text-center mt-5 text-[#0B2447]">INFORMASI PPDB</h3>
        <div class="text bg-[#0B2447] mb-5 min-h-[170px] max-w-[800px] text-white p-4 rounded-md">
          <p>
            Penerimaan Peserta Didik Baru (PPDB) SMK HARAPAN MULIA Tahun Ajaran
            2025/2026 dibuka pada tanggal 25 April - 30 Mei 2026. Proses
            verifikasi berkas akan dilaksanakan pada 1 Juni - 10 Juni 2026,
            sedangkan tes seleksi/observasi pada 15 Juni 2026. Pengumuman hasil
            seleksi dapat dilihat pada 20 Juni 2026, dan peserta yang diterima
            wajib melakukan daftar ulang pada 25 Juni - 10 Juli. Seluruh proses
            pendaftaran dilakukan secara online melalui website resmi ini, dan
            informasi resmi hanya diumumkan melalui website serta papan
            pengumuman sekolah.
          </p>
        </div>
      </div>
    </div>
<!-- mitra -->
<div id="mitra" class="bg-[#0B2447] h-[200px] flex items-center ">
  <div class="overflow-hidden w-full">
    <div class="img flex gap-15 scrolling px-8">
      <img class="h-[90px] bg-white rounded-sm" src="/ARYAxirpl/img/telkom.png" alt="">
      <img class="h-[90px] bg-white rounded-sm" src="/ARYAxirpl/img/biznet.jpg" alt="">
      <img class="h-[90px] bg-white rounded-sm" src="/ARYAxirpl/img/gamelab.png" alt="">
      <img class="h-[90px] bg-white rounded-sm p-2" src="/ARYAxirpl/img/pln.png" alt="">
      <img class="h-[90px] bg-white rounded-sm" src="/ARYAxirpl/img/exabytes.png" alt="">

      <img class="h-[90px] bg-white rounded-sm" src="/ARYAxirpl/img/telkom.png" alt="">
      <img class="h-[90px] bg-white rounded-sm" src="/ARYAxirpl/img/biznet.jpg" alt="">
      <img class="h-[90px] bg-white rounded-sm" src="/ARYAxirpl/img/gamelab.png" alt="">
      <img class="h-[90px] bg-white rounded-sm p-2" src="/ARYAxirpl/img/pln.png" alt="">
      <img class="h-[90px] bg-white rounded-sm" src="/ARYAxirpl/img/exabytes.png" alt="">
    </div>
  </div>
</div>

    <div id="about">
      <div class="jurusan flex justify-around p-10">
        <div class="h-[250px] w-[250px] grid  items-center p-5 bg-white rounded-lg">
          <img class="h-[95px]" src="img/rpl.png" alt="rpl">
          </img>
          <h3 class="text-2xl ">Rekayasa Perangkat Lunak</h3>
        </div>
        <div class="h-[250px] w-[250px] grid  items-center p-5 bg-white rounded-lg">
          <img class="h-[95px]" src="img/titl-removebg-preview.png" alt="titl">
          </img>
          <h3 class="text-2xl ">Teknik Instalasi Tenaga Listrik</h3>
        </div>
        <div class="h-[250px] w-[250px] grid  items-center p-5 bg-white rounded-lg">
          <img class="h-[95px]" src="img/tkj-removebg-preview.png" alt="tkj">
          </img>
          <h3 class="text-2xl ">Teknik Komputer jaringan</h3>
        </div>
      </div>
    </div>
 <div class="bg-black text-white p-10">
      <h3 class="text-3xl text-center" >KONTAK</h3>
    <div class="h-[550px] justify-around flex p-10" id="kontak">
      <form class="grid w-[450px] h-[500px] border border-white p-10">
        <label for="text">Nama</label>
        <input class="h-[50px] border border-white" type="email" name="Nama"/>
        <label for="email">Email</label>
        <input class="h-[50px] border border-white" type="email" name="email"/>
        <label for="pesan">Pesan</label>
        <input class="h-[200px] border border-white" type="text" name="pesan"/>
        <button class="bg-white rounded-lg text-black mt-2 h-[50px]">SUBMIT</button>
      </form>
      <div class="hub h-[210px] grid">
        <p>Hubungi Kami </p>
        <hr>
        <p>SMK HARAPAN MULIA</p>
        <div class="email text-logo">
          <img src="img/envelope.png" alt="email">
          <p>smkharapanmulia@gmail.com</p>
        </div>
        <div class="no text-logo">
          <img src="img/telephone.png" alt="email">
          <p>0858-0943-xxxx</p>
        </div>
        <div class="lokasi text-logo">
          <img src="img/placeholder.png" alt="email">
          <p>Jl kenangan no 112</p>
        </div>
      </div>
      <div class="follow h-[210px] grid">
        <p>Ikuti Kami </p>
        <hr>
        <p>SMK HARAPAN MULIA</p>
        <div class="ig text-logo">
          <img src="img/instagram.png" alt="email">
          <p>@smkharapanmulia</p>
        </div>
        <div class="fb text-logo">
          <img src="img/social.png" alt="email">
          <p>smkharapanmulia</p>
        </div>
      </div>
    </div>
    </div>

    <footer class="h-[60px] flex items-center justify-center">
      <p>Copyright © 2025 SMK HARAPN MULIA. All right reserved.</p>
    </footer>
  </div>
  </body>
</html>
