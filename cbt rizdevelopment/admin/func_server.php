<?php 
session_start();
class Connect_Database
{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "cbt_rizdevelopment";
	private $connect_db;
	
	function __construct()
	{
		$this->connect_db = mysqli_connect($this->servername,$this->username,$this->password,$this->database);

		if (mysqli_connect_errno()) {
			echo "Koneksi Database Gagal" . mysqli_connect_error();
		}
	}

	function Get_database(){
		return $this->connect_db;
	}

	function Daftar_ujian($nama_ujian, $tipe_ujian, $jumlah_soal,$waktu_pengerjaan,$mulai,$selesai,$validasi_soal,$status_ujian,$action_status_ujian,$status){
		$sql = "INSERT INTO daftar_ujian(id,nama_ujian,tipe_ujian,jumlah_soal,waktu_pengerjaan,mulai,selesai,validasi_soal,status_ujian,action_status_ujian,status)
		VALUES (NULL,'$nama_ujian','$tipe_ujian','$jumlah_soal','$waktu_pengerjaan','$mulai','$selesai','$validasi_soal','$status_ujian','$action_status_ujian','$status')";
		if (mysqli_query($this->Get_database(),$sql)) {
			return 1;
		}else{
			return 0;
		}
	}

	function Input_soal($nama_ujian,$tipe_ujian,$no_soal,$soal,$gambar,$a,$b,$c,$d,$e,$jawaban_benar){
		$sql = "INSERT INTO soal(id,nama_ujian,tipe_ujian,no_soal,soal,gambar,a,b,c,d,e,jawaban_benar)
		VALUES (NULL,'$nama_ujian','$tipe_ujian','$no_soal','$soal','$gambar','$a','$b','$c','$d','$e','$jawaban_benar')";
		if (mysqli_query($this->Get_database(),$sql)) {
			return 1;
		}else{
			return 0;
		}
	}

	function Ubah_soal($id_soal,$soal,$gambar,$a,$b,$c,$d,$e,$jawaban_benar){
		$sql = "UPDATE soal SET soal = '$soal', gambar = '$gambar', a = '$a', b = '$b', c = '$c', d = '$d', e = '$e', jawaban_benar = '$jawaban_benar' WHERE id = '$id_soal'";
		if (mysqli_query($this->Get_database(), $sql)) {
			return 1;
		}else{
			return 0;
		}
	}

	function Tambah_user($nama_lengkap,$no_identitas,$username,$password,$tipe_user){
		$sql = "INSERT INTO user (id,username,password,tipe_user,nama_lengkap,no_identitas) VALUES (NULL,'$username','$password','$tipe_user','$nama_lengkap','$no_identitas')";
		if (mysqli_query($this->Get_database(),$sql)) {
			return 1;
		}else{
			return 0;
		}
	}

	function Tambah_admin($username,$password){
		$sql = "INSERT INTO admin (id,username,password) VALUES (NULL,'$username','$password')";
		if (mysqli_query($this->Get_database(),$sql)) {
			return 1;
		}else{
			return 0;
		}
	}
}