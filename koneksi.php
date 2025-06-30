<?php
$host = "localhost";  
$user = "root";      
$pass = ""; 
$db   = "db_absensi";

$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
