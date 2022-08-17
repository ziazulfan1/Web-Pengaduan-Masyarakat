<?php
include("adminheader.php");
include("koneksi.php");
include("sidenav.php");
?>
<style>
    .main {
        margin-top: 40px;
        margin-left: 120px;
        padding: 0px 10px;
    }

    table.a {
        table-layout: fixed;
        width: 100%;
    }
</style>

<?php
include_once('cekadmin.php');
?>
<div class="main">
    <div class="container">
        <div class="content">
            <h2>Data Solusi</h2>
            <br>
            <a href="pdfsolusi.php" class="btn btn-danger" data-toggle="tooltip" title="register">Export PDF</a>
            <br>
            <br>

            <input class="form-control" id="myInput" type="text" placeholder="Search..">
            <br />

            <div class=" table-responsive ">
                <table class="table table-striped table-hover table-bordered a">
                    <thead>
                        <tr>
                            <th width="40px">NO</th>
                            <th>Username</th>
                            <th>Judul Pengaduan</th>
                            <th>Nama Instansi</th>
                            <th width="140px">Lampiran</th>
                            <th width="140px">Tools</th>
                        </tr>
                    </thead>

                    <?php
                    if (isset($_GET['aksi']) == 'delete') {
                        $id = $_GET['id'];
                        $cek = mysqli_query($koneksi, "SELECT * FROM data_solusi WHERE id='$id'");
                        if (mysqli_num_rows($cek) == 0) {
                            echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                        } else {
                            $delete = mysqli_query($koneksi, "DELETE FROM data_solusi WHERE id='$id'");
                            if ($delete) {
                                echo '<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Hapus.</div>';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                            }
                        }
                    }
                    ?>
                    <?php
                    $nama = $_SESSION ['nama'];
                    if ($_SESSION ['level'] == "Super Admin") {
                        $cek = mysqli_query($koneksi, "SELECT * FROM data_solusi");
                    }else {
                    $cek = mysqli_query($koneksi, "SELECT * FROM data_solusi WHERE nama_instansi='$nama'");
                    }
                    if (mysqli_num_rows($cek) == 0) {
                        echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>';
                    } else {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($cek)) {
                            echo '
							<tbody id="myTable">
							<tr>
								<td>' . $no . '</td>
								<td>' . $row['username'] . '</a></td>
								<td>' . $row['judul'] . '</a></td>
                                <td>' . $row['nama_instansi'] . '</a></td>
								<td>' . $row['lampiran'] . '</td>
								<td>
							<a href="editsolusi.php?id=' . $row['id'] . '" title="kirim solusi" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
							<a href="download.php?file=' . $row['lampiran'] . '" title="Download lampiran" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-download" aria-hidden="true"></span></a>';

                            if ($_SESSION ['level']=="Super Admin") { 
                            echo '<a href="data_solusi.php?aksi=delete&id=' . $row['id'] . '" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data ' . $row['username'] . '?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
                                } 
                            $no++;
                        }
                    }
                    ?>

                            
								</td>
							</tr>
							</tbody>
							

                </table>

            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>