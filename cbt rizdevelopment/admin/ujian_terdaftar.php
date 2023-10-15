<?php 
include 'init_db.php';
if (!isset($_SESSION["login_admin"])) {
  header("Location: login.php");
  exit;
}
$data_list_ujian_not_validation = mysqli_query($db->Get_database(), "select * from daftar_ujian where validasi_soal = 'no'");
$data_list_ujian_validation = mysqli_query($db->Get_database(), "select * from daftar_ujian where validasi_soal = 'yes'");
$data_list_ujian_delete = mysqli_query($db->Get_database(), "select * from daftar_ujian");
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

            <!-- Table Not Validation -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">List Ujian - Belum Validasi Soal</h6>
                    </div>
                    <div class="table-responsive">
                        <form action="" method="post">
                        <table class="table text-start align-middle table-bordered mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nama Ujian</th>
                                    <th scope="col">Tipe Ujian</th>
                                    <th scope="col">Jumlah Soal</th>
                                    <th scope="col">Waktu Pengerjaan</th>
                                    <th scope="col">Mulai</th>
                                    <th scope="col">Selesai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_list_ujian_not_validation as $data_ujian):?>
                                <tr>
                                    <td><?php echo $data_ujian["nama_ujian"]?></td>
                                    <td><?php echo $data_ujian["tipe_ujian"]?></td>
                                    <td><?php echo $data_ujian["jumlah_soal"]?></td>
                                    <td><?php echo $data_ujian["waktu_pengerjaan"]?></td>
                                    <td><?php echo $data_ujian["mulai"]?></td>
                                    <td><?php echo $data_ujian["selesai"]?></td>
                                    <td><a href="input_soal.php?nama_ujian=<?php echo $data_ujian['nama_ujian']?>&jumlah_soal=<?php echo $data_ujian['jumlah_soal']?>&tipe_ujian=<?php echo $data_ujian['tipe_ujian']?>&no_soal=1" class="btn btn-primary btn-sm">Input Soal</a></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
            <!-- END Table Not Validation -->

            <!-- Table Validation -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">List Ujian - Soal Divalidasi</h6>
                    </div>
                    <div class="table-responsive">
                        <form action="" method="post">
                        <table class="table text-start align-middle table-bordered mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nama Ujian</th>
                                    <th scope="col">Tipe Ujian</th>
                                    <th scope="col">Jumlah Soal</th>
                                    <th scope="col">Waktu Pengerjaan</th>
                                    <th scope="col">Mulai</th>
                                    <th scope="col">Selesai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_list_ujian_validation as $data_ujian):?>
                                <tr>
                                    <td><?php echo $data_ujian["nama_ujian"]?></td>
                                    <td><?php echo $data_ujian["tipe_ujian"]?></td>
                                    <td><?php echo $data_ujian["jumlah_soal"]?></td>
                                    <td><?php echo $data_ujian["waktu_pengerjaan"]?></td>
                                    <td><?php echo $data_ujian["mulai"]?></td>
                                    <td><?php echo $data_ujian["selesai"]?></td>
                                    <td><a href="ubah_soal.php?nama_ujian=<?php echo $data_ujian['nama_ujian']?>&tipe_ujian=<?php echo $data_ujian['tipe_ujian']?>" class="btn btn-warning btn-sm">Ubah Soal</a></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
            <!-- END Table Validation -->
            <!-- Table Delete -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Hapus Data</h6>
                    </div>
                    <div class="table-responsive">
                        <form action="" method="post">
                        <table class="table text-start align-middle table-bordered mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nama Ujian</th>
                                    <th scope="col">Tipe Ujian</th>
                                    <th scope="col">Jumlah Soal</th>
                                    <th scope="col">Waktu Pengerjaan</th>
                                    <th scope="col">Mulai</th>
                                    <th scope="col">Selesai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_list_ujian_delete as $data_ujian):?>
                                <tr>
                                    <td><?php echo $data_ujian["nama_ujian"]?></td>
                                    <td><?php echo $data_ujian["tipe_ujian"]?></td>
                                    <td><?php echo $data_ujian["jumlah_soal"]?></td>
                                    <td><?php echo $data_ujian["waktu_pengerjaan"]?></td>
                                    <td><?php echo $data_ujian["mulai"]?></td>
                                    <td><?php echo $data_ujian["selesai"]?></td>
                                    <td><a href="hapus_soal.php?id=<?php echo $data_ujian['id']?>&nama_ujian=<?php echo $data_ujian['nama_ujian']?>&tipe_ujian=<?php echo $data_ujian['tipe_ujian']?>" class="btn btn-danger btn-sm">Hapus Soal</a></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
            <!-- End Table Delete -->

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