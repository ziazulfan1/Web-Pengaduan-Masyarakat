<?php
include("headeruser.php");
include("koneksi.php");
?>
<?php
include_once('cekuser.php');
?>
<style type="text/css">
    body {
        background: url(img/yy.jpg) no-repeat fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
        min-height: 100%;
    }

.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

.tab button:hover {
  background-color: #ddd;
}

.tab button.active {
  background-color: #ccc;
}

.tabcontent {
  display: none;
  background-color: #fff;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
<br>
<br>
<br>


<div class="container">
    <div class="span3 well">
        <center>
            <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="fotos/<?php echo $_SESSION['foto']; ?>" name="aboutme" width="140" height="140" class="img-circle"></a>
            <h3><?php echo $_SESSION['nama']; ?></h3>
            <em>Klik Gambar</em>
        </center>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <br>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">Tentang <?php echo $_SESSION['nama']; ?></h4>
                </div>
                <div class="modal-body">
                    <center>
                        <img src="fotos/<?php echo $_SESSION['foto']; ?>" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                        <h3 class="media-heading"><?php echo $_SESSION['nama']; ?></h3>
                    </center>
                    <hr>
                    <center>
                        <p class="text-left"><strong>Data Pengguna : </strong><br><br>
                            <strong> - Alamat : </strong> <?php echo $_SESSION['alamat']; ?> <br>
                            <br>
                            <strong> - Email : </strong><?php echo $_SESSION['email']; ?><br>
                            <br>
                            <strong> - Level : </strong><?php echo $_SESSION['level']; ?><br>
                            <br>
                        </p>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                    </center>
                </div>

            </div>
        </div>

    </div>
</div>
</div>
</div>

<div class="container">

<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'data_solusi')">Penyelesaian masalah</button>
  <button class="tablinks" onclick="openCity(event, 'data_pengaduan')">Data Pengaduan yang diinput</button>
  
  
</div>

<div id="data_solusi" class="tabcontent">

    <div class="panel panel-primary">

        <div class="panel-heading">
            <center>Penyelesaian masalah terhadap laporan pengaduan akan di post dibawah ini.
        </div>
        </center>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Judul Laporan</th>
                        <th>Lampiran</th>
                        <th>Tools</th>
                    </tr>


                    <?php
                    $cek = mysqli_query($koneksi, "SELECT * FROM data_solusi WHERE username ='" . $_SESSION['username'] . "'") or die(mysql_error());
                    if (mysqli_num_rows($cek) == 0) {
                        echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>';
                    } else {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($cek)) {
                            echo '
                            <tr>
                                <td>' . $no . '</td>
                                <td>' . $row['username'] . '</a></td>
                                <td>' . $row['judul'] . '</a></td>
                                <td>' . $row['lampiran'] . '</a></td>

                                <td>
                            <a href="lihat_solusi.php?id=' . $row['id'] . '" title="Lihat Aspirasi" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <a href="download.php?file=' . $row['lampiran'] . '" title="Download lampiran" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-download" aria-hidden="true"></span></a>
                            
                                </td>

                            </tr>
                            ';
                            $no++;
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="data_pengaduan" class="tabcontent">
        <div class="panel panel-primary">

        <div class="panel-heading">
            <center>Data pengaduan yang telah diinput beserta status pengaduan akan di post dibawah ini.
        </div>
        </center>
        <div class="panel-body">
                    <div class=" table-responsive ">
                <table class="table table-striped table-hover table-bordered a">
                    <thead>
                        <tr>
                            <th width="40px">NO</th>
                            <th>Pelapor</th>
                            <th>Judul Pengaduan</th>
                            <th>Nama Instansi</th>
                            <th width="140px">Tanggal Kejadian</th>
                            <th width="140px">Status</th>
                            <th width="140px">Upload Lampiran</th>
                            <th width="140px">Tools</th>
                        </tr>
                    </thead>


                    <?php
                    $cek = mysqli_query($koneksi, "SELECT * FROM data_pengaduan WHERE username ='" . $_SESSION['username'] . "'") or die(mysql_error());
                    if (mysqli_num_rows($cek) == 0) {
                        echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>';
                    } else {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($cek)) {
                            echo '
                         <tr>
                                <td>' . $no . '</td>
                                <td>' . $row['username'] . '</a></td>
                                <td>' . $row['judulpengaduan'] . '</a></td>
                                <td>' . $row['nama_instansi'] . '</a></td>
                                <td>' . $row['tanggal'] . '</td>
                                <td>' . $row['status'] . '</td>
                                <td>' . $row['lampiran'] . '</td>

                                <td>
                            <a href="lihat_laporan.php?id=' . $row['id'] . '" title="Lihat Laporan" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <a href="download.php?file=' . $row['lampiran'] . '" title="Download lampiran" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-download" aria-hidden="true"></span></a>
                            
                                </td>

                            </tr>
                            ';
                            $no++;
                        }
                    }
                    ?>
                </table>
                             
            </div>
        </div>
    </div>
</div>

    <script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>