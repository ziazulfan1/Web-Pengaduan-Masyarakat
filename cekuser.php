<?php
session_start();

if (!isset($_SESSION['username'])) {
    die("Anda belum login");
}

if ($_SESSION['level'] != "User") {
    die("Anda bukan Admin");
}
