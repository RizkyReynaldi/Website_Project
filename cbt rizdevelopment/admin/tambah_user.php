<?php 
include 'init_db.php';
if (!isset($_SESSION["login_admin"])) {
  header("Location: login.php");
  exit;
}
$result_data_ujian = mysqli_query($db->Get_database(),"SELECT DISTINCT (tipe_ujian) FROM daftar_ujian");

if (isset($_POST['tambah_user'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_identitas = $_POST['no_identitas'];
    $username = strtolower($_POST['username']);
    $password = strtolower($_POST['password']);
    $tipe_user = $_POST['tipe_user'];
    $secure_pass = password_hash($password, PASSWORD_DEFAULT);

    $result_tambah_user = $db->Tambah_user($nama_lengkap,$no_identitas,$username,$secure_pass,$tipe_user);

    if ($result_tambah_user == 1) {
        echo "<script>alert('User Berhasil Ditambahkan')</script>";
        header("Location: dashboard.php");
        exit;
    }else{
        echo "<script>alert('User Gagal Ditambahkan')</script>";
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
            <h3>Form Tambah User</h3>
            <div class="col-sm-12 col-xl-8">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Masukkan Data User</h6>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">No Identitas</label>
                                    <input type="text" name="no_identitas" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Tipe User</label>
                                    <select class="form-control" name="tipe_user">
                                    <option value="null">Pilih salah satu</option>
                                    <?php foreach($result_data_ujian as $d):?>
                                        <option value="<?php echo $d['tipe_ujian']?>"><?php echo $d['tipe_ujian']?></option>
                                    <?php endforeach;?>    
                                    </select>
                                    
                                </div>
                                <input type="submit" value="Tambah User" name="tambah_user" class="btn btn-primary"></>
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