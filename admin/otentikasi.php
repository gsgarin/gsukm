<?php


session_start();
include('../koneksi/db.php');
include('../koneksi/filter.php');
//tangkap data dari form login
$username = $_POST['username'];
$pass = $_POST['password'];


$username = cleanXSS($username);

//cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($pass)) {
	//kalau username dan password kosong
	header('location:login.php?error=1');
	break;
} else if (empty($username)) {
	//kalau username saja yang kosong
	header('location:login.php?error=2');
	break;
} else if (empty($pass)) {
	//kalau password saja yang kosong
	header('location:login.php?error=3');
	break;
}

$query = $db->prepare("select count(*) from admin where username='$username' and password='$pass'");
$query->execute();
$find = $query->fetchColumn();

if ($find > 0) {
	//kalau username dan password sudah terdaftar di database
	//buat session dengan nama username dengan isi nama user yang login
    $query = $db->prepare("select * from admin where username='$username' and password='$pass'");
    $query->execute();
    $peserta = $query->fetch();
	$_SESSION['id_ukm'] = $peserta['id_ukm'];
	
	$_SESSION['username'] = $username;
	
	//redirect ke halaman index
	echo "  <script language='javascript'>
                top.location='index.php';
            </script>";
} else {
	//kalau username ataupun password tidak terdaftar di database
	echo "
	<script language='javascript'>
	top.location='login.php?error=1';
	</script>";
}
?>