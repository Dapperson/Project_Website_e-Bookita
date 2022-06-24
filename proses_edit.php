<?php
include 'koneksi.php';

$idlama = $_GET['id'];
$id = $_POST['id'];
$username = $_POST['username'];
$nama = $_POST['nama'];

$query = mysqli_query($connect,"UPDATE user SET id = '$id', username='$username', nama = '$nama' WHERE id = '$idlama'")
or die(mysqli_errno($connect));

if ($query) {
    setcookie("message1","Silahkan logout terlebih dahulu kemudian login kembali untuk melihat perubahan data", time()+30);
    header("Location: profil.php");
}else{
    setcookie("message1", "", time()-30);
    header("Location: edit.php");
}
?>