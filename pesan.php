<?php
include 'koneksi.php';

date_default_timezone_set('Asia/Jakarta');
 $waktu = date("j F Y");
 $nama = trim($_POST['nama']);
 $email = trim($_POST['email']);
 $subjek = trim($_POST['subjek']);
 $pesan = trim($_POST['pesan']);

 $sql = mysqli_query($connect, "INSERT INTO pesan (waktu,nama,email,subjek,pesan) VALUES 
 ('$waktu','$nama','$email','$subjek','$pesan')") or die(mysqli_error($connect));
 mysqli_query($connect,$sql);

 $query = mysqli_query($connect,"SELECT kd FROM pesan ORDER BY kd DESC LIMIT 1");
 $data  = mysqli_fetch_array($query);
 
 if ($query) {
    setcookie("message3","Pesan terkirim", time()+30);
    header("Location: dashboard.php");
}else{
    setcookie("message3", "", time()-30);
    header("Location: dashboard.php");
}
?>