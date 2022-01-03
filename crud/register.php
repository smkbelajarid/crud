<?php 

require 'functions/functions.php';

if(isset($_POST["submit"])){
    if(register($_POST) > 0) {
        echo "<script>
        alert('data berhasil di tambahkan');
      </script>";
      header("Location: index.php");
    } else{
        echo mysqli_error($conn);
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/login.css">
    <title>Hello, world!</title>
  </head>
  <body>
  
    <section id="login">
      <div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-center">
          <div class="col-lg-6 col-md-12 col-12">
           <img src="asset/img/register.png" class="img-fluid d-block w-100" alt="">
          </div>
          <div class="col-lg-6 col-md-10 col-11">
            <div class="row d-flex align-items-center justify-content-center">
              <div class="col-lg-11 col-12">
                <div class="container-card shadow-lg p-3 mb-5 bg-body p-md-5 p-lg-5 p-4">
                  <h1 class="h1-judul">Registrasi</h1>
                  <div class="row">
                    <p class="p-subjudul" >Terima kasih sudah mau berkunjung kembali. <br> Ayo akses kembali dan temukan buku yang anda inginkan di sini.</p>
                  </div>
                  <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-12 col-md-12 col-lg-12" >
                      <form action="" method="post">
                        <div class="row justify-content-center">
                          <div class="col-lg-6 col-md-6">
                            <div class="form-floating mt-4">
                              <input type="text" class="form-control rounded-top" id="floatingInput" name="nama" placeholder="name@example.com">
                              <label for="floatingInput">Nama Lengkap</label>
                            </div>
                            <div class="form-floating mt-4">
                              <input type="text" class="form-control rounded-bottom" id="floatingInput" name="username" placeholder="name@example.com">
                              <label for="floatingInput">Username</label>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="form-floating mt-4">
                              <input type="email" class="form-control rounded-top" id="floatingInput" name="email" placeholder="name@example.com">
                              <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mt-4">
                              <input type="password" class="form-control rounded-bottom" id="floatingInput" name="password" placeholder="name@example.com">
                              <label for="floatingInput">Password</label>
                            </div>
                          </div>

                        </div>
                        <p class="text-end mt-4"><a href="#" class="text-decoration-none text-muted">Lupa password ?</a></p>
                        <button class="w-100 btn btn-lg btn-dark btn-satu mt-4" type="submit" name="submit">Buat Akun</button>
                      </form>
                      <div class="content">
                        <a href="index.php" class=" text-muted text-decoration-none">Sudah memiliki akun ? <a href="index.php">Login</a></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
