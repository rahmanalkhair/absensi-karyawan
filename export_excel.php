<?php
header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Absensi.xls");

include 'koneksi.php';
echo "<table border='1'>
<tr><th>No</th><th>Nama</th><th>Tanggal</th><th>Jam Masuk</th><th>Jam Pulang</th></tr>";

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
echo "</table>";
?>
