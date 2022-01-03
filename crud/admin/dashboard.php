<?php 

require '../functions/functions.php';
$conn = mysqli_connect("localhost","root","","crud");
$jBuku = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM buku"));
$jSiswa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM siswa"));
$jKategori = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kategori"));
$jPinjam = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM peminjaman WHERE status_peminjaman = 1 "));
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard | Home</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" href="../asset/css/dashboard.css">
        <link rel="stylesheet" href="../asset/css/style.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading bg-transparent text-dark" style="height: 54px;">Kesiman Library</div>
                    <div class="list-group list-group-flush rounded-0">
                        <a class="list-group-item list-group-item-action ms-1 p-3" href="dashboard.php"><i class="bi bi-house-fill me-2"></i>Home</a>
                            <div class="accordion-item rounded-0">
                            <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionSatu" aria-expanded="false" aria-controls="accordionSatu">
                                <i class="bi bi-book-half me-2"></i>Buku
                            </button>
                            </h2>
                            <div id="accordionSatu" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordioFlush">
                                <div class="accordion-body p-0">
                                    <div class="list-group">
                                        <a href="index.php" class="list-group-item list-group-item-action">Data Buku</a>
                                        <a href="tambah.php" class="list-group-item list-group-item-action">Tambah Buku</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded-0">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionEmpat" aria-expanded="false">
                                <i class="bi bi-grid-fill me-2"></i>Kategori
                            </button>
                            </h2>
                            <div id="accordionEmpat" class="accordion-collapse collapse" data-bs-parent="#accordioFlush">
                                <div class="accordion-body p-0">
                                    <div class="list-group">
                                        <a href="adminKategori/kategori.php" class="list-group-item list-group-item-action">Kategori</a>
                                        <a href="adminKategori/tambah_kategori.php" class="list-group-item list-group-item-action">Tambah Kategori</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded-0">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionDua" aria-expanded="false">
                                <i class="bi bi-calendar2-event-fill me-2"></i>Peminjaman
                            </button>
                            </h2>
                            <div id="accordionDua" class="accordion-collapse collapse" data-bs-parent="#accordioFlush">
                                <div class="accordion-body p-0">
                                    <div class="list-group">
                                        <a href="adminPeminjaman/peminjaman.php" class="list-group-item list-group-item-action">Peminjam Buku</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item rounded-0">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionTiga" aria-expanded="false">
                                <i class="bi bi-people-fill me-2"></i>Siswa
                            </button>
                            </h2>
                            <div id="accordionTiga" class="accordion-collapse collapse" data-bs-parent="#accordioFlush">
                                <div class="accordion-body p-0">
                                    <div class="list-group">
                                        <a href="adminSiswa/siswa.php" class="list-group-item list-group-item-action">Data Siswa</a>
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
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                    <div class="container-fluid">
                        <button class="btn text-dark" id="sidebarToggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list fw-bold" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <a href="../logout.php" class="btn btn-transparent">Keluar</a>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">   
                  <!-- judul -->
                  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <div class="col">
                      <h2 class="text-center">Halaman Home</h2>
                    </div>
                  </div>
                  <!-- judul -->
                  <!-- content -->
                  <div class="row d-flex justify-content-evenly">
                    <div class="col-lg-4 col-md-6 col-10">
                      <div class="card shadow-lg p-3 mb-5 bg-body border-0 d-flex" style="border-radius: 15px;">
                          <a href="index.php" class="text-decoration-none text-dark">
                              <div class="row g-0">
                                  <div class="col-lg-3 col-md-4">
                                  <img src="../asset/img/jBuku.png" class="img-fluid w-100 align-items-center img-dahsboard" alt="...">
                                  </div>
                                  <div class="col-lg-9 col-md-8">
                                  <div class="card-body text-center">
                                      <h1 class="h1-judul mb-2" ><?= $jBuku; ?></h1>
                                      <h5 class="h5-p m-0 text-muted fw-bold"> Data Buku</h5>
                                  </div>
                                  </div>
                              </div> 
                              </a>
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-6 col-10">
                        <div class="card shadow-lg p-3 mb-5 bg-body border-0 d-flex" style="border-radius: 15px;">
                            <a href="kategori.php" class="text-decoration-none text-dark">
                                <div class="row g-0">
                                    <div class="col-lg-3 col-md-4">
                                    <img src="../asset/img/jKategori.png" class="img-fluid w-100 align-items-center img-dahsboard" alt="...">
                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                    <div class="card-body text-center">
                                        <h1 class="h1-judul mb-2" ><?= $jKategori; ?></h1>
                                        <h5 class="h5-p m-0 text-muted fw-bold"> Kategori Buku</h5>
                                    </div>
                                    </div>
                                </div> 
                            </a>
                        </div>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-evenly mt-5">
                    <div class="col-lg-4 col-md-6 col-10">
                      <div class="card shadow-lg p-3 mb-5 bg-body border-0 d-flex" style="border-radius: 15px;">
                          <a href="siswa.php" class="text-decoration-none text-dark">
                              <div class="row g-0">
                                  <div class="col-lg-3 col-md-4">
                                  <img src="../asset/img/jSiswa.png" class="img-fluid w-100 align-items-center img-dahsboard" alt="...">
                                  </div>
                                  <div class="col-lg-9 col-md-8">
                                  <div class="card-body text-center">
                                      <h1 class="h1-judul mb-2" ><?= $jSiswa; ?></h1>
                                      <h5 class="h5-p m-0 text-muted fw-bold"> Data Siswa</h5>
                                  </div>
                                  </div>
                              </div> 
                              </a>
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-6 col-10">
                        <div class="card shadow-lg p-3 mb-5 bg-body border-0 d-flex" style="border-radius: 15px;">
                            <a href="peminjaman.php" class="text-decoration-none text-dark">
                                <div class="row g-0">
                                    <div class="col-lg-3 col-md-4">
                                    <img src="../asset/img/jPinjam.png" class="img-fluid w-100 align-items-center img-dahsboard" alt="...">
                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                    <div class="card-body text-center">
                                        <h1 class="h1-judul mb-2" ><?= $jPinjam; ?></h1>
                                        <h5 class="h5-p m-0 text-muted fw-bold"> Buku Terpinjam</h5>
                                    </div>
                                    </div>
                                </div> 
                            </a>
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

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        
        <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
        <script src="../asset/js/script.js"></script>


    </body>
</html>
