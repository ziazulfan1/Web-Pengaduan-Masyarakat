<?php

$folder = "files/";
$filename = $_GET['file'];
$file_extension = strtolower(substr(strrchr($filename, "."), 1));

if (!file_exists($folder . $_GET['file'])) {
    echo "<h1>Access forbidden!</h1>
 <p>File Sudah Tidak Ada</p>";
    exit;
} else if ($file_extension == 'php') {
    echo "<h1>Access forbidden!</h1>
 <p>Maaf, file yang Anda download sudah tidak tersedia atau filenya (direktorinya) telah diproteksi. <br />.</p>";
    exit;
} else {

    header("Content-Disposition: attachment; filename=" . basename($filename));
    header("Content-Type: application/octet-stream;");

    readfile("files/" . $filename);
}
