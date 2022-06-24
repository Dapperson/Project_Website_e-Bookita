<?php
include "koneksi.php";

$id_ebook    = mysqli_real_escape_string($connect,$_GET['id_ebook']);
$query = mysqli_query($connect,"DELETE FROM ebook WHERE id_ebook='$id_ebook' ") or die(mysqli_errno($connect)) ;

header('location:ebook.php');
?>