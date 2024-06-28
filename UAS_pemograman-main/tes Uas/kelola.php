<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>CRUD Application</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="indeks.php">CRUD</a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <?php
            include 'connect.php';

            // Ambil data jika sedang proses edit
            if (isset($_GET['ubah'])) {
                $nim = $_GET['ubah'];
                $query = "SELECT * FROM tb_siswa WHERE nim = '$nim'";
                $result = mysqli_query($conn, $query);
                $data = mysqli_fetch_assoc($result);
            }
            ?>

            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <!-- proses edit data-->
                    <input type="text" name="nim" class="form-control" id="nim" value="<?php if (isset($data['nim'])) echo $data['nim']; ?>" <?php if (isset($_GET['ubah'])) echo "readonly"; ?> />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_mahasiswa" class="form-control" id="nama_mahasiswa" value="<?php if (isset($data['nama_mahasiswa'])) echo $data['nama_mahasiswa']; ?>" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no_hp" class="col-sm-2 col-form-label">No Hp</label>
                <div class="col-sm-10">
                    <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?php if (isset($data['no_hp'])) echo $data['no_hp']; ?>" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto_profil" class="col-sm-2 col-form-label">Foto Profil</label>
                <div class="col-sm-10">
                    <input class="form-control" name="foto_profil" type="file" id="foto_profil" accept="image/*"/>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email_mahasiswa" class="col-sm-2 col-form-label">Email Mahasiswa</label>
                <div class="col-sm-10">
                    <input
                        type="email"
                        class="form-control"
                        id="email_mahasiswa"
                        name="email_mahasiswa"
                        placeholder="@email.com or @student.unmer.ac.id"
                        value="<?php if (isset($data['email_mahasiswa'])) echo $data['email_mahasiswa']; ?>"
                    />
                </div>
            </div>
            <div class="mb-3 row mt-4">
                <div class="col text-center">
                    <?php if(isset($_GET['ubah'])) { ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan Perubahan
                        </button>
                    <?php } else { ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Tambahkan
                        </button>
                    <?php } ?>
                    <a href="indeks.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i> Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
