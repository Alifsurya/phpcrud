<?php
// hubungkan dengan fungsi
require 'functions.php';

// ambil data di url
$id = $_GET['id'];
// query data berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// matikan stric mode agar report aktif
// mysqli_report(MYSQLI_REPORT_OFF); 
// koneksi ke dbms
// $conn = mysqli_connect("localhost","root","","belajar");

// cek apakah submit pernah di tekan
if ( isset( $_POST["submit"] ) ) {
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert ('Data Berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert ('Data gagal diubah');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Mahasiswa</title>
</head>
<body>
    <h1>Ubah data Mahasiswa</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
        <ul>
            <li>
                <label for="nip">NIP :</label>
                <input type="text" name="nip" id="nip" value="<?= $mhs["nip"]; ?>">
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>
    </form>   
</body>
</html>
