<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "belajar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi tambah
function tambah($data) {
    global $conn;
    $nip = htmlspecialchars($data["nip"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query insert data
    $query = "INSERT INTO mahasiswa (nip, nama, email, jurusan, gambar)
                VALUES
                ('$nip', '$nama', '$email', '$jurusan', '$gambar')   
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($data) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $data");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id"];
    $nip = htmlspecialchars($data["nip"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query insert data
    $query = "UPDATE mahasiswa SET
                nip = '$nip',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
              WHERE id = $id;
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
                WHERE
             nama LIKE '%$keyword%' OR
             nip LIKE '%$keyword%' OR
             email LIKE '%$keyword%' OR
             jurusan LIKE '%$keyword%'
            ";
    return query($query);
}
?>


