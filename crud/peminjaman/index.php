<?php 
require '../functions/functions.php';

$buku = query("SELECT * FROM buku 
INNER JOIN kategori on buku.id_kategori=kategori.id_kategori
ORDER BY id_buku DESC
LIMIT 6
");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../asset/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Peminjaman | Home</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Kesiman Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
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

    <!-- content -->
    <section id="content">
        <div class="container">
             <!-- alert -->
                <div class="row">
                    <div class="col">
                    <?php             
                        if(isset($_SESSION['flash']))
                        {
                        if($_SESSION['flash']['status'] == 'success')
                        {
                            alertBerhasil($_SESSION['flash']['message']);
                        }
                        else
                        {
                            alertGagal($_SESSION['flash']['message']);
                        }

                        unset($_SESSION['flash']);
                        }         
                    ?>          
                    </div>
                </div>
                <!-- akhir alert -->

            <section id="header" style="margin-top: 100px;">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-8">
                            <h1>
                                Kesiman Library adalah perpusatkaan online. Yang menangani peminjaman buku secara melalui online.
                            </h1>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum velit consectetur ratione inventore facere eveniet, nihil quos accusantium reprehenderit sint iste excepturi eius doloremque nobis quae mollitia recusandae at assumenda quisquam dolor ducimus quibusdam optio et sapiente? Ducimus voluptas repellendus, dolore hic error exercitationem expedita alias! Quis ea molestias officia.</p>
                        </div>
                        <div class="col-lg-3">
                            <img src="../asset/img/jBuku.png" class="d-block ms-auto w-100" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <div class="row justify-content-center" style="margin-top:100px;">
                <h1 class="text-center">Data Buku</h1>
            </div>


            <div class="row justify-content-center" style="margin-top:32px;">
                <?php foreach($buku as $row) : ?>

                <div class="mt-4 col-lg-4 col-md-6">
                    <div class="card shadow-lg p-3 mb-5 bg-body border-0" style="border-radius: 15px;">
                        <a href="peminjaman.php?id=<?= $row["id_buku"]; ?>" class="text-decoration-none text-dark">
                            <div class="row g-0">
                                <div class="col-md-4">
                                <img src="../asset/img/<?= $row["gambar"] ; ?>" class="img-fluid" style="border-radius: 15px;" alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title mb-2"><?= $row["nama"]; ?></h5>
                                    <p class="card-text m-0">Penulis : <?= $row["penulis"]; ?></p>
                                    <p class="card-text mb-3">Kategori : <?= $row["nama_kategori"]; ?></p>
                                    <p class="card-text"><small class="text-muted fw-bold">Tahun Terbit : <?php echo date('Y', strtotime($row["tahun"])); ?></small></p>
                                </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                </div>
                
                <?php endforeach;?>

            </div>

            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-3 col-5">
                    <a href="seluruh_buku.php" class="btn btn-dark btn-satu d-block ms-auto">Seluruh Buku</a>
                </div>
            </div>

        </div>
    </section>
    <!-- akhir-content -->

    <?php 
    include '../layouts/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>