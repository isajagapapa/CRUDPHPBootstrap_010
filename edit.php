<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Data Mahasiswa</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Data Mahasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    // memanggil file config.php
    include 'config.php';
    // menangkap id yang dikirim melalui button edit di index.php
    $id = $_GET['id'];
    // melakukan query untuk mendapatkan data mahasiswa berdasarkan $id
    $mahasiswa = mysqli_query($koneksi, "select * from mahasiswa where id='$id'");

    while ($data = mysqli_fetch_assoc($mahasiswa)){
    ?>
        <div class="container mt-5">
            <p>
                <a href="index.php">Home</a> / Edit Mahasiswa / <?php echo $data['nama'] ?>
            </p>
            <div class="card">
                <div class="card-header">
                    <p class="fw-bold">Profil Mahasiswa</p>
                </div>
                <div class="card-body fw-bold">
                    <form method="post" action="update.php" name="form">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Mahasiswa" name="nama" value="<?php echo $data['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="NIM" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="NIM" placeholder="Masukkan NIM Mahasiswa" name="nim" value="<?php echo $data['nim']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="Alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="Alamat" placeholder="Masukkan Alamat Mahasiswa" name="alamat" value="<?php echo $data['alamat']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" value="SIMPAN">Update</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</body>
</html>