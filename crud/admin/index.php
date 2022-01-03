<?php 
require '../functions/functions.php';

$jumlahDataPerHalaman = 10 ;
$jumlahData = count(query("SELECT * FROM buku"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$buku = query("SELECT * FROM buku INNER JOIN kategori on buku.id_kategori = kategori.id_kategori LIMIT $awalData,$jumlahDataPerHalaman");




if ( isset($_POST["cari"]) ){
  $buku = cariBuku($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard | Data Buku</title>
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
                      <h2 class="text-center">Data Seluruh Buku</h2>
                    </div>
                  </div>
                  <!-- judul -->
                  <!-- content -->
                  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div class="col-lg-2">
                          <a href="tambah.php" class="btn btn-primary">Tambah Data Buku</a>
                        </div>
                        <div class="col-lg-2">
                        <form action="" method="post" class="w-100">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="keyword" placeholder="Masukkan keyword pencarian.." aria-label="Search">
                              <button class="d-none" type="submit" id="cari" name="cari">Button</button>
                            </div>
                          </form>
                        </div>
                      </div>

                      <!-- alert -->
                      <div class="row">
                        <div class="col">
                          <?php 
                          if(empty($buku)){
                            alertGagal("Data Kosong");
                          }         
                          ?>  
                        </div>
                      </div>
                      <!-- akhir alert -->
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
                      <div class="table-responsive">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Gambar</th>
                              <th scope="col">Nama Buku</th>
                              <th scope="col">Nama Penulis</th>
                              <th scope="col">Tahun Terbit</th>
                              <th scope="col">Kategori Buku</th>
                              <th scope="col">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          
                            <?php $i = 1; ?>
                            <?php foreach ($buku as $row) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td> <img style="width: 200px;" src="../asset/img/<?= $row["gambar"] ; ?>"> </td>
                                    <td class="align-middle"><?= $row["nama"]; ?></td>
                                    <td class="align-middle"><?= $row["penulis"]; ?></td>
                                    <td class="align-middle"><?php echo date('Y', strtotime($row["tahun"])); ?></td>
                                    <td class="align-middle"><?= $row["nama_kategori"]; ?></td>
                                    <td class="align-middle"><a class= "btn btn-warning text-light" href="edit.php?id_buku=<?= $row["id_buku"]; ?>">Edit</a> <a class= "btn btn-danger text-light" href="hapus.php?id_buku=<?= $row["id_buku"]; ?>">Hapus</a></td>
                                </tr>   
                            <?php $i++; ?> 
                            <?php endforeach;?>

                          </tbody>
                        </table>
                      </div>

                      <nav>
                        <ul class="pagination justify-content-center">
                          <li class="page-item">
                            <?php if($halamanAktif > 1) :?>
                              <a class="page-link" href="?halaman= <?= $halamanAktif - 1;?>">Sebelumnya</a>
                            <?php endif;?>
                          </li>

                            <?php for($i = 1; $i <= $jumlahHalaman; $i++) :?>
                              <li class="page-item">
                              <?php if($i == $halamanAktif) :?>
                                <a class="page-link bg-primary fw-bold text-light" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                              <?php else :?>
                                <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                              <?php endif ;?>
                              </li>
                            <?php endfor;?>

                          <li class="page-item">
                            <?php if($halamanAktif < $jumlahHalaman) :?>
                              <a class="page-link"  href="?halaman= <?= $halamanAktif + 1;?>">Selanjutnya</a>
                            <?php endif;?>
                          </li>
                        </ul>
                      </nav>

                      
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
