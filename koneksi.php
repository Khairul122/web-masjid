<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "db_masjid");

$koneksi = new mysqli(HOST, USER, PASSWORD, DATABASE);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Set charset untuk mendukung UTF-8
$koneksi->set_charset("utf8");
?>
