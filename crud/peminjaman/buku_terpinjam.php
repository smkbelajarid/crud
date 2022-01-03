<?php 

require '../functions/functions.php';

$id = $_SESSION["id_siswa"];

$conn = mysqli_connect("localhost","root","","crud");

$pinjam = query("SELECT * FROM peminjaman
INNER JOIN buku on peminjaman.id_buku=buku.id_buku
WHERE id_siswa = '$id';
");

// echo "<pre>";
// var_dump($siswa);
// echo "</pre>";
// if(isset($_POST['submit'])){
//     if(editProfil($_POST) > 0){
//         header("location:profil.php");
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
                  <!-- judul -->
                  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <div class="col">
                      <h2 class="text-center">Data peminjaman</h2>
                    </div>
                  </div>
                  <!-- judul -->
                  <!-- content -->
                  <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Buku</th>
                          <th scope="col">Tanggal Peminjaman</th>
                          <th scope="col">Tanggal Pengembalian</th>
                          <th scope="col">Status Peminjaman</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                        <?php $i = 1; ?>
                        <?php foreach ($pinjam as $row) : ?>
                            <tr>
                                <td class="align-middle"><?= $i; ?></td>
                                <td class="align-middle"><?= $row["nama"]; ?></td>
                                <td class="align-middle"><?php echo date('d F Y', strtotime($row["tanggal_pinjam"])); ?></td>
                                <td class="align-middle"><?php echo date('d F Y', strtotime($row["tanggal_kembali"])); ?></td>
                                <td class="align-middle">
                                  <?php 
                                  
                                  if($row["status_peminjaman"] == 1){
                                    echo '<p class="m-0">Peminjaman Disetujui</p>';
                                  } else {
                                    echo '<p class="m-0">Peminjaman Belum Disetujui</p>';
                                  }
                                  ?>

                                </td>
                            </tr>   
                        <?php $i++; ?> 
                        <?php endforeach;?>

                      </tbody>
                    </table>
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