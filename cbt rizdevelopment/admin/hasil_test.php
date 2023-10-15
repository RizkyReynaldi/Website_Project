<?php 
include 'init_db.php';
if (!isset($_SESSION["login_admin"])) {
  header("Location: login.php");
  exit;
}
$query_nama_ujian = mysqli_query($db->Get_database(),"SELECT DISTINCT nama_ujian,tipe_user FROM hasil_ujian");

if (isset($_POST['cari_hasil_ujian'])) {
    $jenis_ujian = $_POST['jenis_ujian'];
    $tipe_user = $_POST['tipe_user'];

    $result_cari_hasil = mysqli_query($db->Get_database(),"SELECT DISTINCT username,tipe_user,nama_ujian FROM hasil_ujian WHERE tipe_user = '$tipe_user' AND nama_ujian = '$jenis_ujian'");
    $cari_hasil_true = 1;
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
        <?php include "sidebar.html"?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <form action="" method="post">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Pilih Ujian</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nama Ujian</th>
                                    <th scope="col">Tipe user</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-select" name="jenis_ujian" aria-label="Default select example">
                                          <option selected>Jenis Ujian</option>
                                          <?php foreach($query_nama_ujian as $d):?>
                                        <option value="<?php echo $d['nama_ujian']?>"><?php echo $d['nama_ujian']?></option>
                                          <?php endforeach?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select" name="tipe_user" aria-label="Default select example">
                                          <option selected>Tipe User</option>
                                          <?php foreach($query_nama_ujian as $d):?>
                                        <option value="<?php echo $d['tipe_user']?>"><?php echo $d['tipe_user']?></option>
                                          <?php endforeach?>
                                        </select>
                                    </td>
                                    
                                    <td><input type="submit" class="btn btn-primary" name="cari_hasil_ujian" value="Cari Data"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
        <?php if(isset($cari_hasil_true)):?>
        <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Daftar Ujian</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Tipe User</th>
                                    <th scope="col">Nama Ujian</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($result_cari_hasil as $d_hasil):?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $d_hasil['username']?></td>
                                <td><?php echo $d_hasil['tipe_user']?></td>
                                <td><?php echo $d_hasil['nama_ujian']?></td>
                                <td><a href="
                                    hasil_test_peserta.php?username=<?php echo $d_hasil['username']?>&tipe_user=<?php echo $d_hasil['tipe_user']?>&nama_ujian=<?php echo $d_hasil['nama_ujian']?>" class="btn btn-danger btn-sm">Lihat Jawaban</a></td>
                            </tr>
                        <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif?>
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