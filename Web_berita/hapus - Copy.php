<?php
include 'setting.php';
$kode = $_GET['kode'];
$query="DELETE FROM tbl_artikel WHERE kode=$kode";
$sql= mysqli_query($koneksi,$query);
if($sql){
    echo "data berhasil di hapus";
    header('location:utama.php');
}else{
    echo "data gagal terhapus";
}