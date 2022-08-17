<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "select * from data_pengaduan");
$html = '<center><h3>Daftar Pengaduan</h3></center><hr/><br><br/>';
$html .= '<table border="1" width="100%">
 <tr>
						<th>NO</th>
						<th>Pelapor</th>
						<th>Judul Pengaduan</th>
						<th>Nama Instansi</th>
						<th>Tanggal Kejadian</th>
					</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
	$html .= "<tr>
								<td>" . $no . "</td>
								<td>" . $row['username'] . "</a></td>
								<td>" . $row['judulpengaduan'] . "</a></td>
								<td>" . $row['nama_instansi'] . "</a></td>
								<td>" . $row['tanggal'] . "</td>
 </tr>";
	$no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'potrait');

$dompdf->render();

$dompdf->stream('laporan_pengaduan.pdf');
