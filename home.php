<?php 

  include 'config.php';
  
  $sql = "SELECT SUM(stok) AS total_stok FROM tbl_barang";
  $sql2 = "SELECT COUNT(*) AS total_barangmasuk FROM tbl_barangmasuk";
  $sql3 = "SELECT COUNT(*) AS total_sortir FROM tbl_penyortiran";
  $sql4 = "SELECT COUNT(*) AS total_pencacahan FROM tbl_pencacahan";
  $sql5 = "SELECT COUNT(*) AS total_pengemasan FROM tbl_pengemasan";
  $sql6 = "SELECT COUNT(*) AS total_pengiriman FROM tbl_pengiriman WHERE status = 'Progress'";

  $result = $conn->query($sql);
  $result2 = $conn->query($sql2);
  $result3 = $conn->query($sql3);
  $result4 = $conn->query($sql4);
  $result5 = $conn->query($sql5);
  $result6 = $conn->query($sql6);

  if ($result->num_rows > 0) {
      // Mendapatkan hasil kueri
      $row = $result->fetch_assoc();
      $totalStok = $row['total_stok'];
  } else {
      echo "Tidak ada data stok.";
  }

  if ($result2->num_rows > 0) {
      // Mendapatkan hasil kueri
      $row = $result2->fetch_assoc();
      $totalStok2 = $row['total_barangmasuk'];
  } else {
      echo "Tidak ada data stok.";
  }

  if ($result3->num_rows > 0) {
      // Mendapatkan hasil kueri
      $row = $result3->fetch_assoc();
      $totalStok3 = $row['total_sortir'];
  } else {
      echo "Tidak ada data stok.";
  }
  
  if ($result4->num_rows > 0) {
      // Mendapatkan hasil kueri
      $row = $result4->fetch_assoc();
      $totalStok4 = $row['total_pencacahan'];
  } else {
      echo "Tidak ada data stok.";
  }

  if ($result5->num_rows > 0) {
      // Mendapatkan hasil kueri
      $row = $result5->fetch_assoc();
      $totalStok5 = $row['total_pengemasan'];
  } else {
      echo "Tidak ada data stok.";
  }

  if ($result6->num_rows > 0) {
      // Mendapatkan hasil kueri
      $row = $result6->fetch_assoc();
      $totalStok6 = $row['total_pengiriman'];
  } else {
      echo "Tidak ada data stok.";
  }

  // Menutup koneksi ke database
  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./assets/img/favicon.png" rel="icon">
  <link href="./assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="./assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Template Main CSS File -->
  <link href="./assets/style.css" rel="stylesheet">

</head>
<body class="home">
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn"></i>
      <a href="home.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">CmS</span>
      </a>
    </div><!-- End Logo -->
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center mt-4">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

 <!-- ======= Sidebar ======= -->
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
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1 style="margin-bottom: 40px;">Selamat datang</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard ">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Barang (Gudang)</h5>

                  <div class="d-flex align-items-center mt-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box"></i>
                    </div>
                    <div class="ps-3">
                      <h3><?= $totalStok; ?></h3>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Barang masuk</h5>

                  <div class="d-flex align-items-center mt-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box"></i>
                    </div>
                    <div class="ps-3">
                      <h3><?= $totalStok2; ?></h3> 
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Penyortiran</h5>

                  <div class="d-flex align-items-center mt-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box"></i>
                    </div>
                    <div class="ps-3">
                      <h3><?= $totalStok3; ?></h3>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Pencacahan</h5>

                  <div class="d-flex align-items-center mt-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box"></i>
                    </div>
                    <div class="ps-3">
                      <h3><?= $totalStok4; ?></h3>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Pengemasan</h5>

                  <div class="d-flex align-items-center mt-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box"></i>
                    </div>
                    <div class="ps-3">
                      <h3><?= $totalStok5; ?></h3>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Pengiriman</h5>

                  <div class="d-flex align-items-center mt-4">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box"></i>
                    </div>
                    <div class="ps-3">
                      <h3><?= $totalStok6; ?></h3>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            </div><!-- End Sales Card -->
          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>
  </main><!-- End #main -->

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