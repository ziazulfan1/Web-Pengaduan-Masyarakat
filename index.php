<?php
include("header.php");
include("koneksi.php");
?>

<style>
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }

  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }

  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }

  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    }

    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }

  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    }

    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }

  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }

    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }

  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }

  #carousel-bg {
    background-color: transparent;
    opacity: 2;
  }

  .carousel-control.right,
  .carousel-control.left {
    background-image: none;
  }

  .carousel-indicators li {
    border-color: #4863A0;
  }

  .carousel-indicators li.active {
    background-color: #4863A0;
  }


  .container-fluid {
    padding: 60px 50px;
  }

  .bg-grey {
    background-color: #c2c3d0;
  }

  .logo-small {
    color: #4863A0;
    font-size: 50px;
  }

  .logo {
    color: #4863A0;
    font-size: 200px;
  }

  .slideanim {
    visibility: hidden;
  }

  .slides {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
</style>

<body>

  <div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <div class="item active">

          <img src="img/hh.jpg" style="width:100%;">
        </div>

        <div class="item">
          <img src="img/nm.jpg" style="width:100%;">
        </div>

        <div class="item">
          <img src="img/ac.png" style="width:100%;">
        </div>
      </div>

      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  </div>
  <div id="tentang" class="container-fluid">
    <div class="row">
      <div class="col-sm-8">
        <h2>Tentang web SIAP Aceh Utara</h2><br>
        <h4>Sistem Informasi Aspirasi dan Pengaduan (SIAP) adalah sebuah web yang dikembangkan oleh pemerintah kabupaten Aceh Utara sebagai wadah pernyataan aspirasi dan pengaduan masalah terkait dengan pelayanan masyarakat khususnya di wilayah Aceh Utara .</h4><br>
        <p>Aplikasi web SIAP dikembangkan agar masyarakat bisa langsung memberikan aspirasi terhadap kinerja lembaga pelayanan masyarakat, juga sebagai tempat masyarakat mengadukan masalah yang berkaitan dengan pelayanan masyarakat di kabupaten Aceh utara.</p>

      </div>
      <div class="col-sm-4">
        <img class="slideanim" src="img/jjj.png" style="width:300px">
      </div>
    </div>
  </div>

  <div class="container-fluid bg-grey">
    <div class="row">
      <div class="col-sm-4">
        <span class="glyphicon glyphicon-globe logo slideanim"></span>
      </div>
      <div class="col-sm-8">
        <h2>Tujuan SIAP Aceh utara</h2><br>
        <h4><strong>MISSION:</strong> Menciptakan hubungan baik antara masyarakat dan pemerintahan daerah, sebagai salah satu langkah dalam meraih good government, menciptakan masyarakat yang terbuka.</h4><br>
        <p><strong>VISION:</strong> Aplikasi web SIAP menjadi aplikasi utama masyarakat terutama masyarakat kabupaten Aceh utara untuk mengutarakan pendapat dan masalah persoalan pelayan masyarakat.</p>
      </div>
    </div>
  </div>





  <div id="aspirasi" class="container-fluid  text-center slideanim">

    <?php

    if (isset($_POST['tambah'])) {
      $judulaspirasi   = $_POST['judulaspirasi'];
      $nama_instansi   = $_POST['nama_instansi'];
      $laporan     = $_POST['laporan'];
      $email     = $_POST['email'];
      $alamatpelapor     = $_POST['alamatpelapor'];
      $lampiran    = $_FILES['file']['name'];
      $lokasi_file = $_FILES['file']['tmp_name'];
      $folder = "files/$lampiran";

      if (move_uploaded_file($lokasi_file, "$folder"));
      $id = 'id';
      $cek = mysqli_query($koneksi, "SELECT * FROM data_aspirasi WHERE id='$id'");
      if (mysqli_num_rows($cek) == 0) {
        $insert = mysqli_query($koneksi, "INSERT INTO data_aspirasi ( judulaspirasi ,nama_instansi , laporan,email,alamatpelapor, lampiran) VALUES('$judulaspirasi','$nama_instansi','$laporan','$email','$alamatpelapor','$lampiran')") or die(mysqli_error($koneksi));

        if ($insert) {
          echo '<div class="alert alert-success alert-dismissable fade in""><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan! <a href="data.php"><- Kembali</a></div>';
        }
      }
    }
    ?>
    <h2>ASPIRASI</h2>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <center>Ayo berikan aspirasi anda</center>
      </div>
      <div class="panel-body">
        <div class="col-sm-10">
          <br>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-4 control-label">JUDUL LAPORAN ANDA</label>
              <div class="col-sm-7">
                <input type="text" name="judulaspirasi" class="form-control" placeholder="Ketik judul laporan anda*" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">LAPORAN</label>
              <div class="col-sm-7">
                <textarea name="laporan" rows="10" class="form-control" placeholder="Ketik isi laporan anda*"></textarea>

              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 control-label">NAMA INSTANSI</label>
              <div class="col-sm-7">
                <select name="nama_instansi" class="form-control" required>
                  <option value="">-----PILIH INSTANSI-----</option>
                  <option value="Dinas Pekerjaan Umum dan Penataan Ruang">Dinas Pekerjaan Umum dan Penataan Ruang</option>
                  <option value="Dinas Kependudukan dan Pencatatan Sipil">Dinas Kependudukan dan Pencatatan Sipil</option>
                  <option value="Dinas Kesehatan">Dinas Kesehatan</option>
                  <option value="Dinas Komunikasi dan Informatika">Dinas Komunikasi dan Informatika</option>
                  <option value="Dinas Lingkungan Hidup">Dinas Lingkungan Hidup</option>
                  <option value="Dinas Pendidikan dan Kebudayaan">Dinas Pendidikan dan Kebudayaan</option>
                  <option value="Dinas Pendidikan Dayah">Dinas Pendidikan Dayah</option>
                  <option value="Dinas Perhubungan">Dinas Perhubungan</option>
                  <option value="Dinas Perindustrian dan Perdagangan">Dinas Perindustrian dan Perdagangan</option>
                  <option value="Dinas Bina Marga">Dinas Bina Marga</option>
                  <option value="Dinas Bina Marga">Dinas Syariat Islam</option>
                  <option value="Dinas Pemberdayaan Perempuan dan Perlindungan Anak">Dinas Pemberdayaan Perempuan dan Perlindungan Anak</option>
                  <option value="Sekretariat Daerah">Sekretariat Daerah</option>
                  <option value="Badan Pusat Statistik">Badan Pusat Statistik</option>
                  <option value="Dinas Pertanian Tanaman Pangan">Dinas Pertanian Tanaman Pangan</option>
                  <option value="Dinas Perpustakaan dan Kearsipan">Dinas Perpustakaan dan Kearsipan</option>
                  <option value="Kecamatan Baktiya">Kecamatan Baktiya</option>
                  <option value="Kecamatan Baktiya Barat">Kecamatan Baktiya Barat</option>
                  <option value="Kecamatan Banda Baro">Kecamatan Banda Baro</option>
                  <option value="Kecamatan Cot Girek">Kecamatan Cot Girek</option>
                  <option value="Kecamatan Dewantara">Kecamatan Dewantara</option>
                  <option value="Kecamatan Geureudong Pase">Kecamatan Geureudong Pase</option>
                  <option value="Kecamatan Kuta Makmur">Kecamatan Kuta Makmur</option>
                  <option value="Kecamatan Langkahan">Kecamatan Langkahan</option>
                  <option value="Kecamatan Lapang">Kecamatan Lapang</option>
                  <option value="Kecamatan Lhoksukon">Kecamatan Lhoksukon</option>
                  <option value="Kecamatan Matangkuli">Kecamatan Matangkuli</option>
                  <option value="Kecamatan Meurah Mulia">Kecamatan Meurah Mulia</option>
                  <option value="Kecamatan Muara Batu">Kecamatan Muara Batu</option>
                  <option value="Kecamatan Nibong">Kecamatan Nibong</option>
                  <option value="Kecamatan Nisam">Kecamatan Nisam</option>
                  <option value="Kecamatan Nisam Antara">Kecamatan Nisam Antara</option>
                  <option value="Kecamatan Paya Bakong">Kecamatan Paya Bakong</option>
                  <option value="Kecamatan Pirak Timu">Kecamatan Pirak Timu</option>
                  <option value="Kecamatan Samudera">Kecamatan Samudera</option>
                  <option value="Kecamatan Sawang">Kecamatan Sawang</option>
                  <option value="Kecamatan Seunuddon">Kecamatan Seunuddon</option>
                  <option value="Kecamatan Simpang Keramat">Kecamatan Simpang Keramat</option>
                  <option value="Kecamatan Syamtalira Aron">Kecamatan Syamtalira Aron</option>
                  <option value="Kecamatan Syamtalira Bayu">Kecamatan Syamtalira Bayu</option>
                  <option value="Kecamatan Tanah Jambo Aye">Kecamatan Tanah Jambo Aye</option>
                  <option value="Kecamatan Tanah Luas">Kecamatan Tanah Luas</option>
                  <option value="Kecamatan Tanah Pasir">Kecamatan Tanah Pasir</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">ALAMAT PELAPOR</label>
              <div class="col-sm-7">
                <textarea type="text" name="alamatpelapor" rows="5" class="form-control" placeholder="Ketik alamat anda*" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">EMAIL</label>
              <div class="col-sm-7">
                <input type="text" name="email" class="form-control" placeholder="Ketik alamat email anda*" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">UPLOAD LAMPIRAN</label>
              <div class="col-sm-7">
                <input type="file" name="file" class="form-control" id="file" readonly />
                <p>*jika diperlukan</p>
              </div>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">&nbsp;</label>
          <div class="col-sm-8">
            <input type="submit" name="tambah" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data">

          </div>
        </div>

        </form>
      </div>
    </div>
  </div>
  </div>
  </div>


  <div id="kerjasama" class="container-fluid bg-grey text-center">
    <h2>INSTANSI</h2>
    <h4>Dinas - Dinas Kabupaten Aceh Utara :</h4>
    <br>
    <div id="Carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#Carousel" data-slide-to="0" class="active"></li>
        <li data-target="#Carousel" data-slide-to="1"></li>
        <li data-target="#Carousel" data-slide-to="2"></li>
      </ol>
      <div class="row slideanim">
        <div class="carousel-inner">
          <div class="item active" id="carousel-bg">
            <div class="col-sm-4">
              <img src="img/pu.jpg" width="130" height="130">
              <h4>Dinas Pekerjaan Umum dan Penataan Ruang</h4>
            </div>

            <div class="col-sm-4">
              <img src="img/aceh.png" width="130" height="130">
              <h4>Dinas Kependudukan dan Pencatatan Sipil</h4>
            </div>
            <div class="col-sm-4">
              <img src="img/kekes.png" name="aboutme" width="130" height="130">
              <h4>Dinas Kesehatan</h4>
            </div>
            <br><br>
            <div class="col-sm-4">
              <img src="img/ko.png" name="aboutme" width="130" height="130">
              <h4>Dinas Komunikasi dan Informatika</h4>
            </div>
            <div class="col-sm-4">
              <img src="img/aceh.png" name="aboutme" width="130" height="130">
              <h4>Dinas Lingkungan Hidup</h4>
            </div>
            <div class="col-sm-4">
              <img src="img/aceh.png" name="aboutme" width="130" height="130">
              <h4 style="color:#303030;">Dinas Pendidikan dan Kebudayaan</h4>
            </div>
          </div>

          <div class="item" id="carousel-bg">
            <div class="col-sm-4">
              <img src="img/aceh.png" width="130" height="130">
              <h4>Dinas Pendidikan Dayah</h4>
            </div>

            <div class="col-sm-4">
              <img src="img/favicon.png" width="130" height="130">
              <h4><a href=https://dishub.acehprov.go.id/profil>Dinas Perhubungan</a></h4>
            </div>
            <div class="col-sm-4">
              <img src="img/aceh.png" name="aboutme" width="130" height="130">
              <h4>Dinas Perindustrian dan Perdagangan</h4>
            </div>
            <br><br>
            <div class="col-sm-4">
              <img src="img/aceh.png" name="aboutme" width="130" height="130">
              <h4>Dinas Bina Marga</h4>
            </div>
            <div class="col-sm-4">
              <img src="img/aceh.png" name="aboutme" width="130" height="130">
              <h4>Dinas Syariat Islam</h4>
            </div>
            <div class="col-sm-4">
              <img src="img/aceh.png" name="aboutme" width="130" height="130">
              <h4 style="color:#303030;">Dinas Pemberdayaan Perempuan dan Perlindungan Anak</h4>
            </div>
          </div>
          <div class="item" id="carousel-bg">
            <div class="col-sm-4">
              <img src="img/aceh.png" width="130" height="130">
              <h4><a href="https://www.acehutara.go.id/">Sekretariat Daerah</a></h4>
            </div>

            <div class=" col-sm-4">
              <img src="img/bps.png" width="130" height="130">
              <h4><a href="https://acehutarakab.bps.go.id/">Badan Pusat Statistik Aceh Utara</a></h4>
            </div>
            <div class="col-sm-4">
              <img src="img/aceh.png" name="aboutme" width="130" height="130">
              <h4>Dinas Pertanian Tanaman Pangan</h4>
            </div>
            <br><br>
            <div class="col-sm-4">
              <img src="img/aceh.png" name="aboutme" width="130" height="130">
              <h4>Dinas Perpustakaan dan Kearsipan</h4>
            </div>
            <div class="col-sm-4">
              <img src="img/jjj.png" name="aboutme" width="130" height="130">
              <h4 style="color:#303030;">Web SIAP</h4>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#Carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#Carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
      <br>
    </div>
  </div>
  </div>

  <div id="contact" class="container-fluid">
    <?php
    if (isset($_POST['add'])) {
      $nama = $_POST['nama'];
      $email   = $_POST['email'];
      $komen    = $_POST['komen'];

      $id = 'id';
      $cek = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id='$id'");
      if (mysqli_num_rows($cek) == 0) {
        $insert = mysqli_query($koneksi, "INSERT INTO ulasan ( nama, email , komen) VALUES('$nama','$email','$komen')") or die(mysqli_error($koneksi));

        if ($insert) {
          echo '<div class="alert alert-success alert-dismissable fade in""><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
        } else {
          echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan! <a href="data.php"><- Kembali</a></div>';
        }
      }
    }
    ?>
    <h2 class="text-center">Ulasan</h2>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-5">
          <p>Berikan ulasan terhadap website kami</p>
          <p><span class="glyphicon glyphicon-map-marker"></span> Tambon Tunong, Aceh Utara</p>
          <p><span class="glyphicon glyphicon-phone"></span> +6282281527017</p>
          <p><span class="glyphicon glyphicon-envelope"></span> ziazulfan13@gmail.comm</p>
        </div>
        <div class="col-sm-7 slideanim">
          <div class="row">
            <div class="col-sm-6 form-group">
              <input class="form-control" id="nama" name="nama" placeholder="Nama" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
            </div>
          </div>
          <textarea class="form-control" id="komen" name="komen" placeholder="Ulasan" rows="5"></textarea><br>
          <div class="row">
            <div class="col-sm-12 form-group">
              <button class="btn btn-sm btn-primary" name="add" value="Simpan" type="submit">Kirim</button>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>

  <footer class="container-fluid bg-grey text-center">
    <a href="#myPage" title="To Top">
      <span class="glyphicon glyphicon-chevron-up"></span>
      <p>Kembali ke atas</p>
    </a>
  </footer>

  <script>
    $(document).ready(function() {
      $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

        if (this.hash !== "") {

          event.preventDefault();


          var hash = this.hash;

          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 900, function() {

            window.location.hash = hash;
          });
        }
      });

      $(window).scroll(function() {
        $(".slideanim").each(function() {
          var pos = $(this).offset().top;

          var winTop = $(window).scrollTop();
          if (pos < winTop + 600) {
            $(this).addClass("slides");
          }
        });
      });
    })
  </script>
</body>