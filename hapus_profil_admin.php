<?php
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($connect, "DELETE FROM user WHERE id='$id'")
or die(mysqli_error($connect));

if($query){
    header("Location: manage.php");
}
?>