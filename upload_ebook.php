<?php
include "koneksi.php";

//pengecekan tipe harus pdf
$tipe_file = $_FILES['nama_file']['type']; //mendapatkan mime type
if ($tipe_file == "application/pdf") //mengecek apakah file tersebu pdf atau bukan
{
 $judul = trim($_POST['judul']);
 $penulis = trim($_POST['penulis']);
 $penerbit = trim($_POST['penerbit']);
 $jenis = trim($_POST['jenis']);
 date_default_timezone_set('Asia/Jakarta');
 $waktu = date("j F Y");
 $nama_file = trim($_FILES['nama_file']['name']);

 $sql = "INSERT INTO ebook (judul,penulis,penerbit,jenis,waktu) VALUES ('$judul','$penulis','$penerbit','$jenis','$waktu')";
 mysqli_query($connect,$sql); //simpan data dahulu untuk mendapatkan id

 //dapatkan id terkahir
 $query = mysqli_query($connect,"SELECT id_ebook FROM ebook ORDER BY id_ebook DESC LIMIT 1");
 $data  = mysqli_fetch_array($query);

 //mengganti nama pdf
 $nama_baru =  $data['id_ebook']."-".$jenis."-".$judul.".pdf"; //hasil contoh: file_1.pdf
 $file_temp = $_FILES['nama_file']['tmp_name']; //data temp yang di upload
$folder = "ebook";

 move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
 //update nama file di database
 mysqli_query($connect,"UPDATE ebook SET nama_file='$nama_baru' WHERE id_ebook='$data[id_ebook]' ");

 header("Location: ebook.php");
 echo "berhasil";

} else
{
 echo "Gagal Upload File Bukan PDF! <a href='upload_ilmiah.php'> Kembali </a>";
}

?>