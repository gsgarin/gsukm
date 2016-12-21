<?php 
session_start();
include('../koneksi/db.php');
include('../koneksi/filter.php');
$jumlah = cleanXSS($_POST['jumlah']);
$id_ukm = cleanXSS($_POST['id_ukm']);


	$query2=$db->prepare("INSERT INTO regist_maks SET maks='$jumlah', id_ukm='$id_ukm' ");
	$query2->execute(); 
	echo 	"<script language='javascript'>
				alert('Berhasil');
				top.location='index.php';
			</script>			
	";
?>