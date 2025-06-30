<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Absensi Karyawan</title>
    <script>
        function getLocation(action) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById("latitude").value = position.coords.latitude;
                    document.getElementById("longitude").value = position.coords.longitude;
                    document.getElementById("aksi").value = action;
                    document.getElementById("absenForm").submit();
                }, function(error) {
                    alert("Gagal mendapatkan lokasi!");
                });
            } else {
                alert("Browser tidak mendukung GPS.");
            }
        }
    </script>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <h2>Selamat Datang di Sistem Absensi Karyawan</h2>
    <form id="absenForm" method="POST" action="absen.php">
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
        <input type="hidden" name="aksi" id="aksi">
        
        <br><br>
        <button type="button" onclick="getLocation('tap_in')">Tap In</button>
        <button type="button" onclick="getLocation('tap_out')">Tap Out</button>
    </form>
    <br><br>
    <a href="dashboard.php">📊 Lihat Dashboard</a> | 
    <a href="logout.php">🔓 Logout</a>
</body>
</html>

