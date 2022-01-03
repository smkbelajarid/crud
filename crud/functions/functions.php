<?php 

// koneksi ke db
$conn = mysqli_connect("localhost","root","","crud");

// $result = mysqli_query($conn,"SELECT * FROM buku INNER JOIN kategori on buku.id_buku = kategori.id_kategori");
session_start();

function query($query){
    global $conn;

    $result = mysqli_query($conn,$query);

    $rows = [];

    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;

}

function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $kategori = htmlspecialchars($data["id_kategori"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
      return false;
    }


    $query = "INSERT INTO buku
    VALUES 
    ('','$nama','$penulis','$tahun','$gambar','$kategori')";

    mysqli_query($conn, $query);

    $_SESSION['flash'] = [
      'status' => 'success',
      'message' => 'Data berhasil ditambah'
    ];

    return mysqli_affected_rows($conn);

}

function updateProfil($data){
  global $conn;

  $id = htmlspecialchars($data["id_siswa"]);
  $nama = htmlspecialchars($data["nama"]);
  $username = htmlspecialchars($data["username"]);
  $email = htmlspecialchars($data["email"]);
  $password = htmlspecialchars($data["password"]);

    $query = "UPDATE siswa SET
                  nama = '$nama',
                  username = '$username',
                  email ='$email',
                  password = '$password'
                WHERE id_siswa = '$id'
                ";

    mysqli_query($conn, $query);

    $_SESSION['flash'] = [
      'status' => 'success',
      'message' => 'Data berhasil diubah'
    ];

    return mysqli_affected_rows($conn);
}

function tambahKategori($data){
  global $conn;

  $nama = htmlspecialchars($data["nama_kategori"]);

  $query = "INSERT INTO kategori
  VALUES
  ('','$nama')";

  mysqli_query($conn, $query);

  $_SESSION['flash'] = [
    'status' => 'success',
    'message' => 'Kategori berhasil ditambahkan'
  ];

  return mysqli_affected_rows($conn);

}

function hapus($id){
    global $conn;

    mysqli_query($conn,"DELETE FROM buku WHERE id_buku = $id");

    $_SESSION['flash'] = [
      'status' => 'success',
      'message' => 'Data berhasil dihapus'
    ];

    return mysqli_affected_rows($conn);
}

function hapusPeminjaman($id){
  global $conn;

  mysqli_query($conn,"DELETE FROM peminjaman WHERE id_peminjam = $id");

  $_SESSION['flash'] = [
    'status' => 'success',
    'message' => 'Data berhasil dihapus'
  ];

  return mysqli_affected_rows($conn);
}
function hapusKategori($id){
  global $conn;

  mysqli_query($conn,"DELETE FROM kategori WHERE id_kategori = $id");

  $_SESSION['flash'] = [
    'status' => 'success',
    'message' => 'Data berhasil dihapus'
  ];

  return mysqli_affected_rows($conn);
}

function iPeminjam($data){
    global $conn;

    $tanggalP = htmlspecialchars($data["tanggal_pinjam"]);
    $tanggalK = htmlspecialchars($data["tanggal_kembali"]);
    $status = htmlspecialchars($data["status_peminjaman"]);
    $username = htmlspecialchars($data["id_siswa"]);
    $idBuku = htmlspecialchars($data["id_buku"]);

    $query = "INSERT INTO peminjaman
    VALUES 
    ('','$tanggalP','$tanggalK','$status','$username','$idBuku')";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);

    $_SESSION['flash'] = [
      'status' => 'success',
      'message' => 'Buku berhasil dipinjam'
    ];
}

function editProfil($data){
  global $conn;

      $id = htmlspecialchars($data["id_siswa"]);
      $nama = htmlspecialchars($data["nama"]);
      $username = htmlspecialchars($data["username"]);
      $gambar = htmlspecialchars($data["gambar"]);
      $gambarLama = htmlspecialchars($data["gambarLama"]);

      // cek apakah user memilih gambar baru atau tidak
    if ( $_FILES['gambar']['error'] === 4 ){
      $gambar = $gambarLama;
    } else{
      $gambar = upload();
    }

  $query = "UPDATE siswa SET
                nama = '$nama',
                username = '$username',
                gambar = '$gambar'
              WHERE id_siswa = '$id'
              ";

  mysqli_query($conn, $query);

  $_SESSION['flash'] = [
    'status' => 'success',
    'message' => 'Data berhasil diubah'
  ];

  return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;

        $id = htmlspecialchars($data["id_buku"]);
        $nama = htmlspecialchars($data["nama"]);
        $penulis = htmlspecialchars($data["penulis"]);
        $tahun = htmlspecialchars($data["tahun"]);
        $kategori = htmlspecialchars($data["id_kategori"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        // cek apakah user memilih gambar baru atau tidak
      if ( $_FILES['gambar']['error'] === 4 ){
        $gambar = $gambarLama;
      } else{
        $gambar = upload();
      }

    $query = "UPDATE buku SET
                  nama = '$nama',
                  penulis = '$penulis',
                  tahun ='$tahun',
                  id_kategori = '$kategori',
                  gambar = '$gambar'
                WHERE id_buku = '$id'
                ";

    mysqli_query($conn, $query);

    $_SESSION['flash'] = [
      'status' => 'success',
      'message' => 'Data berhasil diubah'
    ];

    return mysqli_affected_rows($conn);
}

function editKategori($data){
  global $conn;

      $id = htmlspecialchars($data["id_kategori"]);
      $nama = htmlspecialchars($data["nama_kategori"]);

  $query = "UPDATE kategori SET nama_kategori = '$nama' WHERE id_kategori = '$id' ";

  mysqli_query($conn, $query);

  $_SESSION['flash'] = [
    'status' => 'success',
    'message' => 'Data berhasil diubah'
  ];

  return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4){
      echo "<script>
        alert('Upload gambar terlebih dahulu');
      </script>";
  
      return false;
    }
  
    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
      echo "<script>
        alert('yang anda upload bukan gambar');
      </script>";
    }
  
    // cek jika ukurannya terlalu besar
    if ( $ukuranFile > 1000000){
      echo "<script>
        alert('yang anda upload bukan gambar');
      </script>";
    }
  
    // lolos pengecekan, gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
  
    move_uploaded_file($tmpName, '../asset/img/' .$namaFileBaru);
    return $namaFileBaru;
  
  }

  function register($data){
    global $conn;

    $nama = strtolower(stripslashes($data["nama"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = strtolower(mysqli_escape_string($conn, $data["password"]));
    $email = strtolower(stripslashes($data["email"]));

    $result = mysqli_query($conn, "SELECT username FROM siswa WHERE username = '$username' ");
    if(mysqli_fetch_assoc($result)){
      echo "
      <script>
        alert('username telah terdaftar');
      </script>
      ";
      return false;
    }

    // $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO siswa VALUES('','$nama','$username','$password','$email') ");

    return mysqli_affected_rows($conn);


  }
  
  function updateStatus($data){
    global $conn;

    $id = htmlspecialchars($data["id_peminjam"]);
    $status = htmlspecialchars($data["status_peminjaman"]);    

    $query = "UPDATE peminjaman SET
                  status_peminjaman = '$status'
                WHERE id_peminjam = '$id'
                ";

    mysqli_query($conn, $query);

    $_SESSION['flash'] = [
      'status' => 'success',
      'message' => 'Status berhasil dirubah'
    ];

    return mysqli_affected_rows($conn);
  }

  function cariBuku($keyword) {
    $query = "SELECT * FROM buku 
              INNER JOIN kategori 
              ON buku.id_kategori = kategori.id_kategori
                WHERE
              nama LIKE '%$keyword%' OR
              penulis LIKE '%$keyword%' OR
              tahun LIKE '%$keyword%' OR
              nama_kategori LIKE '%$keyword%'             
            ";
    return query($query);
  }
  function cariKategori($keyword) {
    $query = "SELECT * FROM kategori 
                WHERE
              nama_kategori LIKE '%$keyword%' ";
    return query($query);
  }

  function cariPinjaman($keyword) {
    $query = "SELECT peminjaman.* ,siswa.nama as nama_siswa,buku.nama as nama_buku FROM peminjaman 
                INNER JOIN siswa on peminjaman.id_siswa=siswa.id_siswa
                INNER JOIN buku on peminjaman.id_buku=buku.id_buku
                WHERE

              tanggal_pinjam LIKE '%$keyword%' OR
              tanggal_kembali LIKE '%$keyword%' OR
              nama_siswa LIKE '%$keyword%' OR
              nama_buku LIKE '%$keyword%'             
            ";
    return query($query);
  }

  function alertGagal($text){
    echo '
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>
    
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    '.$text.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }

  function alertBerhasil($text){
    echo '
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>
    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    '.$text.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }


?>

