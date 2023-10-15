<?php
include 'init_db.php';
if (!isset($_SESSION["login_admin"])) {
  header("Location: login.php");
  exit;
}
$id = $_GET['id'];
$nama_ujian = $_GET['nama_ujian'];
$tipe_ujian = $_GET['tipe_ujian'];

$sql_delete_soal = "DELETE FROM soal WHERE nama_ujian = '$nama_ujian' AND tipe_ujian = '$tipe_ujian'";
$sql_delete_daftar_ujian = "DELETE FROM daftar_ujian WHERE id = '$id'";

if (mysqli_query($db->Get_database(), $sql_delete_soal)) {
	if (mysqli_query($db->Get_database(), $sql_delete_daftar_ujian)) {
		header("Location: ujian_terdaftar.php");
		exit;
	}
}
?>