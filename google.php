<?php
// Include file gpconfig
include_once 'gpconfig.php';

if(isset($_GET['code'])){
	$gclient->authenticate($_GET['code']);
	$_SESSION['token'] = $gclient->getAccessToken();
	header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gclient->setAccessToken($_SESSION['token']);
}

if ($gclient->getAccessToken()) {
	include 'koneksi.php';

	// Get user profile data from google
	$gpuserprofile = $google_oauthv2->userinfo->get();

	$nama = $gpuserprofile['given_name']." ".$gpuserprofile['family_name']; // Ambil nama dari Akun Google
	$email = $gpuserprofile['email']; // Ambil email Akun Google nya

	// Buat query untuk mengecek apakah data user dengan email tersebut sudah ada atau belum
	// Jika ada, ambil id, username, dan nama dari user tersebut
	$sql = mysqli_query($connect, "SELECT id, username, nama FROM user WHERE email='".$email."'");
	$user = mysqli_fetch_array($sql); // Ambil datanya dari hasil query tadi

	if(empty($user)){ // Jika User dengan email tersebut belum ada
		// Ambil username dari kata sebelum simbol @ pada email
		$ex = explode('@', $email); // Pisahkan berdasarkan "@"
		$username = $ex[0]; // Ambil kata pertama

		// Lakukan insert data user baru tanpa password
		mysqli_query($connect, "INSERT INTO user(username, nama, email) VALUES('".$username."', '".$nama."', '".$email."')");

		$id = mysqli_insert_id($connect); // Ambil id user yang baru saja di insert
	}else{
		$id = $user['id']; // Ambil id pada tabel user
		$username = $user['username']; // Ambil username pada tabel user
		$nama = $user['nama']; // Ambil username pada tabel user
	}

	$_SESSION['id'] = $id;
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $nama;
    $_SESSION['email'] = $email;

    header("location: dashboard.php");
} else {
	$authUrl = $gclient->createAuthUrl();
	header("location: ".$authUrl);
}
?>
