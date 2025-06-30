<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['role'] !== 'admin') {
    echo "Dashboard ini hanya untuk admin.";
    exit;
}

?>  
<link rel="stylesheet" href="style.css">
<h2>Data Absensi</h2>
<a href="export_excel.php">Export Excel</a>
<table border="1">
    <tr><th>No</th><th>Nama</th><th>Tanggal</th><th>Jam Masuk</th><th>Jam Pulang</th></tr>
    <?php
    $no = 1;
    $q = $conn->query("SELECT * FROM absensi");
    while($data = $q->fetch_assoc()) {
        echo "<tr>
            <td>$no</td>
            <td>{$data['nama']}</td>
            <td>{$data['tanggal']}</td>
            <td>{$data['jam_masuk']}</td>
            <td>{$data['jam_pulang']}</td>
        </tr>";
        $no++;
    }
    ?>
</table>
