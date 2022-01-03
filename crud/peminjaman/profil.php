<?php 

require '../functions/functions.php';

$conn = mysqli_connect("localhost","root","","crud");

$id = $_SESSION['id_siswa'];

$siswa = query("SELECT * FROM siswa WHERE id_siswa = '$id'")[0];

// if(isset($_POST["submit"])){
//     if(updateProfil($_POST) > 0){
//         header("location:index.php");
//     }
// }

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" href="../asset/css/dashboard.css">
        <link rel="stylesheet" href="../asset/css/style.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading bg-transparent text-dark" style="height: 54px;">Kesiman Library</div>
                    <div class="list-group list-group-flush rounded-0">
                        <a class="list-group-item list-group-item-action ms-1 p-3" href="index.php"><i class="bi bi-house-fill me-2"></i>Home</a>
                            <div class="accordion-item rounded-0">
                            <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionSatu" aria-expanded="false" aria-controls="accordionSatu">
                                <i class="bi bi-book-half me-2"></i>Buku
                            </button>
                            </h2>
                            <div id="accordionSatu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordioFlush">
                                <div class="accordion-body p-0">
                                    <div class="list-group">
                                        <a href="buku_terpinjam.php" class="list-group-item list-group-item-action">Buku Terpinjam</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded-0">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionTiga" aria-expanded="false">
                                <i class="bi bi-person-fill me-2"></i>Profil
                            </button>
                            </h2>
                            <div id="accordionTiga" class="accordion-collapse collapse" data-bs-parent="#accordioFlush">
                                <div class="accordion-body p-0">
                                    <div class="list-group">
                                        <a href="profil.php" class="list-group-item list-group-item-action">Profil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="list-group-item list-group-item-action ms-1 p-3 mt-auto" href="../logout.php">Keluar</a>
                    </div>
                </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <button class="btn text-dark" id="sidebarToggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list fw-bold" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <div class="dropdown dropstart">
                                    <a class="ms-lg-3" style="font-size:30px;" href="profil.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle text-dark"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="profil.php"><i class="bi bi-person-fill"></i> Profil</a></li>
                                        <li><a class="dropdown-item" href="../logout.php"><i class="bi bi-box-arrow-right"></i> Logout </a></li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">   
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
                  <!-- judul -->
                  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <div class="col">
                      <h2 class="text-center">Biodata Diri</h2>
                    </div>
                  </div>
                  <!-- judul -->
                  <!-- content -->
                    <div class="row justify-content-center">
                    <a href="updateProfil.php" class="d-block text-center">
                        <img class="img-profil" src="../asset/img/<?= $siswa["gambar"] ; ?>">
                        </a>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 container-card shadow-lg p-3 mb-5 mt-5">
                            <div class="row justify-content-center py-5">
                                <div class="col-11">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" disabled value="<?= $siswa["nama"]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" disabled value="<?= $siswa["username"]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" disabled value="<?= $siswa["email"]; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" disabled value="<?= $siswa["password"]; ?>">
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-lg-6">
                                            <a href="update_profil.php" class="btn btn-primary d-block">Update Profil</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="../logout.php" class="btn btn-danger d-block">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- content -->
                </div>
                <?php 
                  include '../layouts/footer.php';
                  ?>
            </div>
        </div>

        <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
        <script src="../asset/js/script.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>