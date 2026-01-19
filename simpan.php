<?php
include 'koneksi.php';

$nama       = $_POST['nama'];
$nis        = $_POST['nis'];
$jurusan    = $_POST['jurusan'];
$tgl_lahir  = $_POST['tgl_lahir'];
$gender     = $_POST['gender'];
$hp         = $_POST['hp'];
$email      = $_POST['email'];
$alasan     = $_POST['alasan'];

// ekskul (checkbox → array → string)
$ekskul = implode(", ", $_POST['ekskul']);

// upload foto
$foto = $_FILES['foto']['name'];
$tmp  = $_FILES['foto']['tmp_name'];

if ($foto != "") {
    move_uploaded_file($tmp, "upload/" . $foto);
}

// simpan ke database
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