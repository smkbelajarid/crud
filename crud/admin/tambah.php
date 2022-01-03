<?php 
require '../functions/functions.php';

if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        header("location:index.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard | Tambah Buku</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" href="../asset/css/dashboard.css">
        <link rel="stylesheet" href="../asset/css/style.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading bg-transparent text-dark" style="height: 54px;">Kesiman Library</div>
                <div class="list-group list-group-flush rounded-0">
                <a class="list-group-item list-group-item-action ms-1 p-3" href="dashboard.php"> <i class="bi bi-house-fill me-2"></i>Home</a>
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
                  <a class="list-group-item list-group-item-action ms-1 p-3" href="../logout.php">Keluar</a>
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
                      <h2 class="text-center">Tambah Data</h2>
                    </div>
                  </div>
                  <!-- judul -->
                  <!-- content -->
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Buku</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis Buku</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" required>
                    </div>

                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="date" class="form-control" id="tahun" name="tahun" required>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required> 
                    </div>

                    <div class="mb-3">
                        <label for="id_kategori" class="form-label">Kategori</label>
                        <select class="form-select" name="id_kategori" id="id_kategori" required> 
                        <option selected required>Pilih kategori</option>
                        <?php 
                              $conn = mysqli_connect("localhost", "root", "", "crud");
                              $sql = mysqli_query($conn, "SELECT * FROM kategori");
                              while($row = mysqli_fetch_array($sql)){
                          ?>
                          <option required value="<?= $row["id_kategori"]; ?>"><?= $row["nama_kategori"]; ?></option>
                          <?php }?>
                        </select>
                    </div>
                  <button type="submit" name="submit" class="btn btn-primary">Kirim Data</button>
                </form>
                  <!-- content -->
                </div>
                <?php 
                  include '../layouts/footer.php';
                  ?>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script src="../asset/js/script.js"></script>


    </body>
</html>
