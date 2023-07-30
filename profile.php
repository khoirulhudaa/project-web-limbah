<?php 

  include 'config.php';
  
  $sql = "SELECT * FROM tbl_admin";

  // Menjalankan kueri SQL
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
      // Mendapatkan data dari hasil kueri
      $row = $result->fetch_assoc();
      
  } elseif ($result->num_rows === 0) {
      echo "Tidak ada data admin.";
  } else {
      echo "Terjadi kesalahan dalam pengambilan data admin.";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Cirebon Mitra Selaras</title>

   <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Template Main CSS File -->
  <link href="assets/style.css" rel="stylesheet">

</head>
<body class="home">
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn"></i>
      <a href="home.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
    </div><!-- End Logo -->
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

 <!-- ======= Sidebar ==Villa Kondangsari Kec. Beber, Kab. Cirebon===== -->
 <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link">
          <i class="bi bi-grid"></i>
          <span>Menu Utama</span>
        </a>
        <li class="nav-item">
          <a class="nav-link collapsed" href="home.php">
            <i class='bx bxs-home'></i>
            <span>Home</span>
          </a>
        </li><!-- End Blank Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="profile.php">
          <i class="bi bi-person-fill"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-heading">Kelola Data</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="barang.php">
          <i class="bi bi-table"></i>
          <span>Kelola Barang</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="barangmasuk.php">
          <i class="bi bi-table"></i>
          <span>Kelola Barang Masuk</span>
        </a>
      </li><!-- End Contact Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-table"></i><span>Kelola Produksi</span><i class="bi bi-chevron-right ms-auto"></i></i></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
          <a href="./penyortiran.php">
              <i class="bi bi-table"></i><span>Kelola Penyortiran</span>
            </a>
          </li>
          <li>
            <a href="pencacahan.php">
              <i class="bi bi-table"></i><span>Kelola Pencacahan</span>
            </a>
          </li>
          <li>
            <a href="pengemasan.php">
              <i class="bi bi-table"></i><span>Kelola Pengemasan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="pengiriman.php">
          <i class="bi bi-table"></i>
          <span>Kelola Pengiriman</span>
        </a>
      </li><!-- End Contact Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
      <div class="row justify-content-center">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="assets/img/foto.png" alt="Profile" class="rounded-circle">
              <h2><?= $row['nama'] ?></h2>
              <h3 class='mt-4'>Admin</h3>
              <div class="col-xl-8 pt-3">
                <div class="tab-content pt-2">
                    <!-- Profile Edit Form -->
                    <form action="" method="post">
                      <div class="row mb-3">
                          <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                          <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control" name="name" id="fullName" value="<?= $row['nama'] ?>">
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                          <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control" name="alamat" id="Address" value="<?= $row['alamat'] ?>">
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                          <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control" name="no_tlp" id="Phone" value="<?= $row['no_tlp'] ?>">
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                              <input type="email" class="form-control" name="email" id="Email" value="<?= $row['email'] ?>">
                          </div>
                      </div>

                      <div class="text-start mt-4">
                          <input type="hidden" name='id_admin' value='<?= $row['id_admin'] ?>'>
                          <button type="submit" class="btn btn-primary" name="update">Save Changes</button>
                      </div>
                  </form><!-- End Profile Edit Form -->

                  <?php
                    if (isset($_POST['update'])) {
                        $id_admin = $_POST['id_admin'];
                        $name = $_POST['name'];
                        $alamat = $_POST['alamat'];
                        $no_tlp = $_POST['no_tlp'];
                        $email = $_POST['email'];

                        $sqls = "UPDATE tbl_admin SET nama='$name', alamat='$alamat', no_tlp='$no_tlp', email='$email' WHERE id_admin='$id_admin'";

                        if ($conn->query($sqls) === false) {
                            trigger_error("Periksan perintah SQL : " . $sqls . " Error : " . $conn->error, E_USER_ERROR);
                        } else {
                            // Jika berhasil di-update, alihkan kembali ke halaman profil
                            $conn->close();
                            echo '<script>setTimeout(function(){ location.reload(); }, 100);</script>';  echo '<script>
                                    setTimeout(function() {
                                        window.location.href = "?page=profile";
                                    }, 100);
                                  </script>';
                            $conn->close();
                            exit;
                        }
                      }
                    ?>
                  </div>
                </div><!-- End Bordered Tabs -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>
</html>