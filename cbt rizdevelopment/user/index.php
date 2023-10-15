<?php
include '../admin/init_db.php';
if (!isset($_SESSION["login_user"])) {
	header("Location: login.php");
	exit;
}
$id_user_login = $_SESSION["login_user"];
$result_user = mysqli_query($db->Get_database(),"SELECT * FROM user WHERE id = '$id_user_login'");
$nama_lengkap;
$no_identitas;
$tipe_user;
foreach ($result_user as $data) {
	$nama_lengkap = $data['nama_lengkap'];
	$no_identitas = $data['no_identitas'];
	$tipe_user = $data['tipe_user'];
}
$result_ujian_open = mysqli_query($db->Get_database(),"SELECT * FROM daftar_ujian WHERE tipe_ujian = '$tipe_user' AND status = 'berjalan'");
$no = 0;
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
<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid mb-2">
    <a class="navbar-brand">
    	<h3>Selamat Datang <?php echo $nama_lengkap?> | <?php echo $no_identitas?><br><hr><?php echo $tipe_user?></h3>
    	<h4><div id="DisplayClock" class="clock" onload="showTime()"></div></h4>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<!-- end navbar -->
<!-- figures -->
<div class="card">
  <div class="card-header">
    List Pilihan Test
  </div>
  <div class="card-body">
    <blockquote class="blockquote">
      <!-- table -->
      <table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Nama Test</th>
		      <th scope="col">Banyak Soal</th>
		      <th scope="col">Waktu Pengerjaan</th>
		      <th scope="col">Mulai</th>
		      <th scope="col">Selesai</th>
		      <th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach($result_ujian_open as $data_ujian):?>
		  	<?php $no += 1;?>
		    <tr>
		      <th scope="row"><?php echo $no;?></th>
		      <td><?php echo $data_ujian['nama_ujian']?></td>
		      <td><?php echo $data_ujian['jumlah_soal']?></td>
		      <td><?php echo $data_ujian['waktu_pengerjaan']?></td>
		      <td><?php echo $data_ujian['mulai']?></td>
		      <td><?php echo $data_ujian['selesai']?></td>
		      <td><a href="progress_ujian.php?nama_ujian=<?php echo $data_ujian['nama_ujian']?>&tipe_ujian=<?php echo $tipe_user?>" class="btn btn-success"><b>Kerjakan</b></a></td>
		    </tr>
		    <?php endforeach;?>
		  </tbody>
		</table>
      <!-- end table -->
      <footer class="blockquote-footer">Ujian Ini Direkam Oleh Admin, Silahkan Kerjakan Ujian Dengan Jujur.</footer>
    </blockquote>
  </div>
</div>
<!-- end figures -->

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <!-- Copyright -->
  <div class="text-end p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    <a href="" class="btn btn-warning btn-lg">Refresh</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="logout.php" class="btn btn-danger btn-lg">Logout</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<!-- end footer -->
<!-- Js Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jam.js"></script>
</body>

</html>