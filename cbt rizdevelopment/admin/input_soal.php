<?php 
include 'init_db.php';
if (!isset($_SESSION["login_admin"])) {
  header("Location: login.php");
  exit;
}
$nama_ujian = $_GET['nama_ujian'];
$tipe_ujian = $_GET['tipe_ujian'];
$jumlah_soal = $_GET['jumlah_soal'];
$no_soal = $_GET["no_soal"];

if ($no_soal > $jumlah_soal) {
    header("Location: soal_penuh.php?nama_ujian=$nama_ujian&tipe_ujian=$tipe_ujian");
    exit;
}

if (isset($_POST["simpan_soal"])) {
$soal = $_POST['soal'];
$gambar = $_POST['gambar'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$e = $_POST['e'];
$jawaban_benar = $_POST['jawaban_benar'];
    if ($no_soal <= $jumlah_soal) {
        $result_input_soal = $db->Input_soal($nama_ujian,$tipe_ujian,$no_soal,$soal,$gambar,$a,$b,$c,$d,$e,$jawaban_benar);
        if ($result_input_soal == 1) {
            $no_soal++;
            header("Location: input_soal.php?nama_ujian=$nama_ujian&jumlah_soal=$jumlah_soal&tipe_ujian=$tipe_ujian&no_soal=$no_soal");
            exit;  
        }else if ($result_input_soal == 0) {
            echo "<script>alert('data gagal di input')</script>";    
        }
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

        <!-- Content Start -->
        <div class="content">
            <br>
            <h3>Form Input Soal | <?php echo $nama_ujian?> | <?php echo $tipe_ujian?></h3>
            <div class="col-sm-12 col-xl-8">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Masukkan Soal No <?php echo $no_soal;?></h6>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Soal</label>
                                    <textarea name="soal" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Masukkan Gambar (jika ada)</label>
                                    <input type="text" name="gambar" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Pilihan A</label>
                                    <input type="text" name="a" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Pilihan B</label>
                                    <input type="text" name="b" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Pilihan C</label>
                                    <input type="text" name="c" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Pilihan D</label>
                                    <input type="text" name="d" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Pilihan E</label>
                                    <input type="text" name="e" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Jawaban Benar</label>
                                    <input type="text" name="jawaban_benar" class="form-control" id="exampleInputPassword1">
                                </div>
                                <input type="submit" value="Simpan Soal" name="simpan_soal" class="btn btn-primary"></>
                            </form>
                        </div>
                    </div>
                    
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