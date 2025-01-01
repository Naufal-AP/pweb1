<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'tracer_alumni';

// Koneksi ke database
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menangani permintaan GET untuk memuat data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM alumni";
    $result = $conn->query($query);

    $output = '';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output .= "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['graduation_year']}</td>
                    <td>{$row['job_title']}</td>
                </tr>
            ";
        }
    } else {
        $output .= "<tr><td colspan='3'>Belum ada data alumni.</td></tr>";
    }
    echo $output;
    exit();
}

// Menangani permintaan POST untuk menyimpan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $pekerjaan = $_POST['pekerjaan'];

    $query = "INSERT INTO alumni (name, graduation_year, job_title) VALUES ('$nama', '$tahun_lulus', '$pekerjaan')";
    if ($conn->query($query) === TRUE) {
        echo "Data alumni berhasil ditambahkan!";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
    exit();
}
?>