<?php
include 'koneksi.php';

$id_ebook = $_GET['id_ebook'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
date_default_timezone_set('Asia/Jakarta');
$waktu = date("j F Y");

$query = mysqli_query($connect,"UPDATE ebook SET judul='$judul', penulis = '$penulis', 
penerbit = '$penerbit', waktu = '$waktu' WHERE id_ebook = '$id_ebook'") or die(mysqli_errno($connect));

if ($query) {
    setcookie("message2","Data e-book berhasil diubah", time()+30);
    header("Location: ebook.php");
}else{
    setcookie("message2", "", time()-30);
    header("Location: edit_file.php");
}
?>