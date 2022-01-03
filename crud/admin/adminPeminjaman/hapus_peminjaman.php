<?php 
require '../../functions/functions.php';
$id = $_GET["id_peminjam"];

if(hapusPeminjaman($id) > 0) {
    header("location:peminjaman.php");
} 
?>