<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Akses ditolak");
}

$nama      = $_POST['nama'];
$nis       = $_POST['nis'];
$jurusan   = $_POST['jurusan'];
$tgl_lahir = $_POST['tgl_lahir'];
$gender    = $_POST['gender'];
$hp        = $_POST['hp'];
$email     = $_POST['email'];
$alasan    = $_POST['alasan'];

if (!isset($_POST['ekskul']) || count($_POST['ekskul']) < 1 || count($_POST['ekskul']) > 2) {
    die("Pilihan ekstrakurikuler tidak valid");
}
$ekskul = implode(", ", $_POST['ekskul']);

$foto = "";
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $foto = time() . "_" . $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "upload/" . $foto);
}

$query = "INSERT INTO pendaftaran_ekskul
(nama, nis, jurusan, tgl_lahir, gender, hp, email, ekskul, alasan, foto)
VALUES
('$nama','$nis','$jurusan','$tgl_lahir','$gender','$hp','$email','$ekskul','$alasan','$foto')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Pendaftaran berhasil'); window.location='ekstra.html';</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
