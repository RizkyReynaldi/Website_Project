<?php 
include 'init_db.php';
$id = $_GET['id'];
$action = $_GET['action'];
$status = "Berjalan";
$status_ujian = "danger";

if ($action == "Buka Ujian") {
	// update mulai dan tombol action = Berhenti
	date_default_timezone_set('Asia/Jakarta');
	$date = date("h:i:sa");
	$action_status_ujian = "Berhenti";

	$sql = "UPDATE daftar_ujian SET status_ujian = '$status_ujian', mulai = '$date',action_status_ujian = '$action_status_ujian',status = '$status' WHERE id = '$id'";
	if (mysqli_query($db->Get_database(),$sql)) {
		header("Location: dashboard.php");
		exit;
	}
}else if ($action == "Berhenti") {
	// update stop dan tombol action = Selesai
	date_default_timezone_set('Asia/Jakarta');
	$date = date("h:i:sa");
	$action_status_ujian = "Selesai";
	$status = "Selesai";
	$status_ujian = "success";

	$sql = "UPDATE daftar_ujian SET status_ujian = '$status_ujian', selesai = '$date',action_status_ujian = '$action_status_ujian',status = '$status' WHERE id = '$id'";
	if (mysqli_query($db->Get_database(),$sql)) {
		header("Location: dashboard.php");
		exit;
	}
}else{
	header("Location: dashboard.php");
	exit;
}
?>