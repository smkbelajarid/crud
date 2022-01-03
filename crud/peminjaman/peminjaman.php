<?php 

require '../functions/functions.php';

$conn = mysqli_connect("localhost","root","","crud");

$id = $_GET["id"];

$buku = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$id'");

$data = mysqli_fetch_assoc($buku);

// var_dump($data);

if(isset($_POST["submit"])){
    if(iPeminjam($_POST) > 0){
        header("location:index.php");
    } 
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Peminjaman | Peminjaman</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Kesiman Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="seluruh_buku.php">Buku</a>
                </li>
            </ul>
            <div class="dropdown">
                <a class="ms-lg-3" style="font-size:30px;" href="profil.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle text-light"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="profil.php"><i class="bi bi-person-fill"></i> Profil</a></li>
                    <li><a class="dropdown-item" href="../logout.php"><i class="bi bi-box-arrow-right"></i> Logout </a></li>
                </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir -->

    <!-- content -->
    <section id="form">
        <div class="container">
        <div class="row" style="margin-top:100px;">
                <h1 class="text-center mb-5">Buku Yang Akan Dipinjam</h1>
            </div>
            <div class="row">
                <form action="" method="post">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tanggal_pinjam" class="form-label">Tanggal_pinjam :</label>
                                <input type="date" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tanggal_kembali" class="form-label">tanggal_kembali :</label>
                                <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="id_siswa" class="form-label">Nama Siswa :</label>
                                <input type="hidden" class="form-control" name="id_siswa" id="id_siswa" value="<?php echo $_SESSION['id_siswa']; ?>">
                                <input type="text" class="form-control" value="<?php echo $_SESSION['username']; ?>" disabled>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="id_siswa" class="form-label">Nama Buku :</label>
                                <input type="hidden" class="form-control" name="id_buku" id="id_buku" value="<?php echo $data['id_buku']; ?>">
                                <input type="text" class="form-control" value="<?php echo $data['nama']; ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">kirim</button>
                </form>
            </div>
        </div>
    </section>
    <!-- akhir content -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>