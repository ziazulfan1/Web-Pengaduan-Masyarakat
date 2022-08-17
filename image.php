<?php
include('koneksi.php');
if (isset($_GET['id'])) {
    $query = mysqli_query($koneksi, "select * from user where foto='" . $_GET['id'] . "'");
    $row = mysqli_fetch_array($query);

    echo $row["foto"];
} else {
    header('location:index.php');
}
