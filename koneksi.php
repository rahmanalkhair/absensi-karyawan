<?php
$koneksi = new mysqli("localhost", "root", "", "db_absensi");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
