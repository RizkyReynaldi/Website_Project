<?php
// var default
$nama_ujian = "";
$no_soal = "";
$jawaban = "";
$jawaban_benar = "";
$warna_status = "";
$cek_no_soal;
include '../admin/init_db.php';
if (!isset($_SESSION["login_user"])) {
	header("Location: login.php");
	exit;
}

$no_soal = $_GET["no_soal"];
$buat_db_jawaban = "false";
$nama_ujian = $_GET["nama_ujian"];
$tipe_ujian = $_GET["tipe_ujian"];
$jumlah_soal;
$buat_db_jawaban = $_GET["buat_db_jawaban"];
$result_ujian = mysqli_query($db->Get_database(),"SELECT * FROM daftar_ujian WHERE nama_ujian = '$nama_ujian' AND tipe_ujian = '$tipe_ujian'");
foreach ($result_ujian as $data_ujian) {
	$jumlah_soal = $data_ujian['jumlah_soal'];
}

$id_user_login = $_SESSION["login_user"];
$result_user = mysqli_query($db->Get_database(),"SELECT * FROM user WHERE id = '$id_user_login'");
$username;
$no_identitas;
$tipe_user;
foreach ($result_user as $data) {
	$username = $data['username'];
	$no_identitas = $data['no_identitas'];
	$tipe_user = $data['tipe_user'];
}

$result_soal = mysqli_query($db->Get_database(),"SELECT * FROM soal WHERE nama_ujian = '$nama_ujian' AND tipe_ujian = '$tipe_ujian' AND no_soal = '$no_soal'");
$result_all_soal = mysqli_query($db->Get_database(),"SELECT * FROM hasil_ujian WHERE nama_ujian = '$nama_ujian' AND tipe_user = '$tipe_ujian'");
if (isset($_POST['lanjutkan'])) {
	$nama_ujian = $_POST['nama_ujian'];
	$no_soal = $_POST['no_soal'];
	$jawaban = $_POST['jawaban'];
	$jawaban_benar = $_POST['jawaban_benar'];
	$warna_status = "primary";
  $status_ujian;
  $cek_waktu_ujian = mysqli_query($db->Get_database(),"SELECT status FROM daftar_ujian WHERE nama_ujian = '$nama_ujian' AND tipe_ujian = '$tipe_user'");
  foreach ($cek_waktu_ujian as $data_cek_ujian) {
    $status_ujian = $data_cek_ujian['status'];
  }

  if ($status_ujian === "Selesai") {
    header("Location: index.php");
    exit;
  }

	if (!empty($jawaban)) {
		$sql = "UPDATE hasil_ujian SET jawaban = '$jawaban',jawaban_benar = '$jawaban_benar',warna_status = '$warna_status'
		WHERE username = '$username' AND tipe_user = '$tipe_user' AND nama_ujian = '$nama_ujian' AND no_soal = '$no_soal'";
		mysqli_query($db->Get_database(),$sql);
		$no_soal += 1;
		header("Location: ujian.php?nama_ujian=$nama_ujian&tipe_ujian=$tipe_ujian&no_soal=$no_soal");
		exit;
	}else if(empty($jawaban)){
		$no_soal += 1;
		header("Location: ujian.php?nama_ujian=$nama_ujian&tipe_ujian=$tipe_ujian&no_soal=$no_soal");
		exit;
	}	
}

if ($buat_db_jawaban === "true") {
  $jawaban;
  $jawaban_benar;
  $warna_status = "secondary";

  // cek data double
  $result_data = mysqli_query($db->Get_database(),"SELECT * FROM hasil_ujian WHERE username = '$username' AND tipe_user = '$tipe_user' AND nama_ujian = '$nama_ujian'");

  if (!mysqli_fetch_assoc($result_data)) {
  for ($i=1; $i <= $jumlah_soal ; $i++) { 
    $sql = "INSERT INTO hasil_ujian (id,username,tipe_user,nama_ujian,no_soal,jawaban,jawaban_benar,warna_status)
    VALUES (NULL,'$username','$tipe_user','$nama_ujian','$i','$jawaban','$jawaban_benar','$warna_status')";
    mysqli_query($db->Get_database(),$sql);
  }
  }else{
    echo "<script>";
    echo "var ujian_selesai = confirm('Ujian Telah Selesai Dikerjakan');";
    echo "if(ujian_selesai) {
      window.location = 'index.php'
    }else{
      window.location = 'index.php'
    }";
    echo "</script>";
  }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- css bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<title>CBT | Riz Development</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid mb-2">
    <a class="navbar-brand">
    	<h3><?php echo $username?> | <?php echo $no_identitas?> | <?php echo $nama_ujian?><br><hr>Soal No <?php echo $no_soal;?></h3>
    </a>
    <p id="no_soal" style="display: none"><?php echo $no_soal?></p>
    <p id="max_soal" style="display: none"><?php echo $jumlah_soal?></p>
    <script>
      var no_soal = document.getElementById("no_soal").innerHTML;
      var max_soal = document.getElementById("max_soal").innerHTML;
      if (no_soal > max_soal) {
        window.location = "index.php";
      }
    </script>
</nav>
<?php foreach($result_soal as $data_soal):?>
<p class="h5 ms-3 me-5 mb-3"><?php echo $data_soal['soal']?></p>
<p class="h5 ms-3 me-5 mb-3">A.<?php echo $data_soal['a']?></p>
<p class="h5 ms-3 me-5 mb-3">B.<?php echo $data_soal['b']?></p>
<p class="h5 ms-3 me-5 mb-3">C.<?php echo $data_soal['c']?></p>
<p class="h5 ms-3 me-5 mb-3">D.<?php echo $data_soal['d']?></p>
<p class="h5 ms-3 me-5 mb-3">E.<?php echo $data_soal['e']?></p>
<?php $jawaban_benar = $data_soal['jawaban_benar']?>
<?php endforeach;?>
<br>
<form action="" method="post">
<div class="ms-3 form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jawaban" id="exampleRadios1" value="A">
  <label class="form-check-label" for="exampleRadios1">
    A
  </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jawaban" id="exampleRadios2" value="B">
  <label class="form-check-label" for="exampleRadios2">
   B
  </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jawaban" id="exampleRadios2" value="C">
  <label class="form-check-label" for="exampleRadios2">
   C
  </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jawaban" id="exampleRadios2" value="D">
  <label class="form-check-label" for="exampleRadios2">
   D
  </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="jawaban" id="exampleRadios2" value="E">
  <label class="form-check-label" for="exampleRadios2">
   E
  </label>
</div>
<br><br>
<input type="hidden" name="nama_ujian" value="<?php echo $nama_ujian?>">
<input type="hidden" name="no_soal" value="<?php echo $no_soal?>">
<input type="hidden" name="jawaban_benar" value="<?php echo $jawaban_benar?>">
<input type="submit" id="lanjutkan_ujian" class="btn btn-warning ms-2" name="lanjutkan" value="Lanjutkan Soal">
</form>
<br><br>
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="ms-5 me-5 d-none d-lg-block" align="justify">

    	<?php foreach($result_all_soal as $gui_hasil):?>
      		<a href="ujian.php?nama_ujian=<?php echo $nama_ujian?>&tipe_ujian=<?php echo $tipe_ujian?>&no_soal=<?php echo $gui_hasil['no_soal']?>" class="container-sm bg-<?php echo $gui_hasil['warna_status']?> text-white" style="text-decoration: none; font-size: 20px; margin: 2px;"><?php echo $gui_hasil['no_soal']?></a>
    	<?php endforeach?>
    	<a href="index.php" class="btn btn-warning bg-warning" style="text-decoration: none; font-size: 20px; color: white; margin: 2px;">Selesai</a>
    </div>
  </section>
  <!-- Section: Social media -->

  

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<!-- Js Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>