<?php
include 'connect.php';

$query = "SELECT * FROM tb_siswa";
$sql = mysqli_query($conn, $query);
$no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>Data Mahasiswa</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="indeks.php">CRUD</a>
        </div>
    </nav>
    <div class="container">
        <figure>
            <h1 class="mt-4">Data Mahasiswa</h1>
            <blockquote class="blockquote">
                <p>DASHBOARD BERUPA CRUD</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Create Update and Delete</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i> Tambah data
        </a>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th><center>No</center></th>
                        <th><center>NIM</center></th>
                        <th><center>Nama Mahasiswa</center></th>
                        <th><center>Foto Profil</center></th>
                        <th><center>No Hp</center></th>
                        <th><center>Email Mahasiswa</center></th>
                        <th><center>Update & Delete</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($result = mysqli_fetch_assoc($sql)) { ?>
                        <tr>
                            <td><center><?php echo $no++; ?></center></td>
                            <td><center><?php echo $result['nim']; ?></center></td>
                            <td><?php echo $result['nama_mahasiswa']; ?></td>
                            <td><img src="img/<?php echo $result['foto_profil']; ?>" style="width: 120px"></td>
                            <td><?php echo $result['no_hp']; ?></td>
                            <td><?php echo $result['email_mahasiswa']; ?></td>
                            <td>
                                <a href="proses.php?hapus=<?php echo $result['nim']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Hapus
                                </a>
                                <a href="kelola.php?ubah=<?php echo $result['nim']; ?>" class="btn btn-success btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
