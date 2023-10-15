<?php 
include 'init_db.php';
if (!isset($_SESSION["login_admin"])) {
  header("Location: login.php");
  exit;
}
$nama_ujian = $_GET['nama_ujian'];
$tipe_ujian = $_GET['tipe_ujian'];
$data_ubah_soal = mysqli_query($db->Get_database(),"select * from soal where nama_ujian = '$nama_ujian' AND tipe_ujian = '$tipe_ujian'");

if (isset($_POST['ubah_soal'])) {
    $id_soal = $_POST['id_soal'];
    $soal = $_POST['soal'];
    $gambar = $_POST['gambar'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $jawaban_benar = $_POST['jawaban_benar'];
    $result_ubah_data = $db->Ubah_soal($id_soal,$soal,$gambar,$a,$b,$c,$d,$e,$jawaban_benar);

    if ($result_ubah_data == 1) {
        header("Location: ubah_soal.php?nama_ujian=$nama_ujian&tipe_ujian=$tipe_ujian");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin CBT Riz Development</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php include "sidebar.html" ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <?php foreach ($data_ubah_soal as $d):?>
                <br>
            <div class="col-sm-12 col-xl-8">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Ubah Soal No <?php echo $d["no_soal"]?></h6>
                            <form action="" method="post">
                                <input type="hidden" name="id_soal" value="<?php echo $d['id']?>">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Soal</label>
                                    <input type="text" name="soal" value="<?php echo $d['soal']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Gambar Soal</label>
                                    <img src="" width="200" height="100">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Ubah Gambar</label>
                                    <input type="text" name="gambar" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jawaban A</label>
                                    <input name="a" type="text" value="<?php echo $d['a']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jawaban B</label>
                                    <input name="b" type="text" value="<?php echo $d['b']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jawaban C</label>
                                    <input name="c" type="text" value="<?php echo $d['c']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jawaban D</label>
                                    <input name="d" type="text" value="<?php echo $d['d']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jawaban E</label>
                                    <input name="e" type="text" value="<?php echo $d['e']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jawaban Benar</label>
                                    <input name="jawaban_benar" type="text" value="<?php echo $d['jawaban_benar']?>" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <input type="submit" name="ubah_soal" class="btn btn-primary" value="Ubah Soal"></input>
                            </form>
                        </div>
                    </div>
                <?php endforeach;?>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>