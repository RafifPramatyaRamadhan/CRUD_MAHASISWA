<?php
include 'connect.php';

// Fungsi untuk membersihkan dan melindungi input data
function sanitize($input) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($input));
}

// Jika terdapat parameter 'hapus', hapus data sesuai nim
if (isset($_GET['hapus'])) {
    $nim_to_delete = sanitize($_GET['hapus']);
    $query = "DELETE FROM tb_siswa WHERE nim = '$nim_to_delete'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        header("location: indeks.php");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// proses kembali dari tambah data ke dashboard
if (isset($_POST['aksi']) && $_POST['aksi'] == "add") {
    $nim = sanitize($_POST['nim']);
    $nama_mahasiswa = sanitize($_POST['nama_mahasiswa']);
    $no_hp = sanitize($_POST['no_hp']);
    $email_mahasiswa = sanitize($_POST['email_mahasiswa']);
    $foto_profil = $_FILES['foto_profil']['name'];
    
    $dir = "img/";
    $tmpfile = $_FILES['foto_profil']['tmp_name'];
    move_uploaded_file($tmpfile, $dir.$foto_profil);
    
    $query = "INSERT INTO tb_siswa (nim, nama_mahasiswa, no_hp, email_mahasiswa, foto_profil) 
              VALUES ('$nim', '$nama_mahasiswa', '$no_hp', '$email_mahasiswa', '$foto_profil')";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        header("location: indeks.php?pesan=tambah_sukses");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// fungtion edit agar tetap ada nilai didalam nya
if (isset($_POST['aksi']) && $_POST['aksi'] == "edit") {
    $nim = sanitize($_POST['nim']); 
    $nama_mahasiswa = sanitize($_POST['nama_mahasiswa']);
    $no_hp = sanitize($_POST['no_hp']);
    $email_mahasiswa = sanitize($_POST['email_mahasiswa']);

    // Handle foto profil jika diubah
    if ($_FILES['foto_profil']['size'] > 0) {
        $foto_profil = $_FILES['foto_profil']['name'];
        $dir = "img/";
        $tmpfile = $_FILES['foto_profil']['tmp_name'];
        move_uploaded_file($tmpfile, $dir.$foto_profil);
        $query = "UPDATE tb_siswa SET nama_mahasiswa='$nama_mahasiswa', no_hp='$no_hp', email_mahasiswa='$email_mahasiswa', foto_profil='$foto_profil' WHERE nim='$nim'";
    } else {
        $query = "UPDATE tb_siswa SET nama_mahasiswa='$nama_mahasiswa', no_hp='$no_hp', email_mahasiswa='$email_mahasiswa' WHERE nim='$nim'";
    }

    $result = mysqli_query($conn, $query);
    
    if ($result) {
        header("location: indeks.php?pesan=edit_sukses");
        exit; 
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
