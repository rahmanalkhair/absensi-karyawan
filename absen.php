<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d");
$jam = date("H:i:s");

// Koordinat lokasi kantor
$lat_kantor = -6.889794351132032;
$long_kantor = 107.61643827951072;

$lat_user = $_POST['latitude'];
$long_user = $_POST['longitude'];

// Hitung jarak (dalam km)
function distance($lat1, $lon1, $lat2, $lon2) {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    return acos($dist) * 6371; // Jarak dalam KM
}

$jarak = distance($lat_kantor, $long_kantor, $lat_user, $long_user);

if ($jarak < 0.2) {
    $user = "nama_user"; // sesuaikan dengan session login
    $aksi = $_POST['aksi']; // tap_in atau tap_out

    if ($aksi == "tap_in") {
        $conn->query("INSERT INTO absensi (nama, tanggal, jam_masuk) VALUES ('$user', '$tanggal', '$jam')");
    } else {
        $conn->query("UPDATE absensi SET jam_pulang='$jam' WHERE nama='$user' AND tanggal='$tanggal'");
    }

    echo "Absen berhasil";
} else {
    echo "Lokasi Anda tidak di kantor!";
}
?>
