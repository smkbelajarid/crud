<?php 
require '../../functions/functions.php';

$id = $_GET["id_kategori"];

if(hapusKategori($id) > 0) {
    header("location:kategori.php");
} 
?>