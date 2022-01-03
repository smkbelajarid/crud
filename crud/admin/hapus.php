<?php 
require '../functions/functions.php';

$id = $_GET["id_buku"];


if(hapus($id) > 0) { 
    header('location:index.php');
}

?>