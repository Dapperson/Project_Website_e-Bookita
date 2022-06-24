<?php
include 'koneksi.php';
$kd = $_GET['kd'];

$query = mysqli_query($connect, "DELETE FROM pesan WHERE kd='$kd'")
or die(mysqli_error($connect));

if($query){
    header("Location: manage.php");
}
?>