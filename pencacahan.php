<?php 
    include 'config.php';
    session_start();

    $kd_plastik   = "";
    $jns_plastik     = "";
    $stok = "";
    $satuan = "";
    $status = "Belum produksu";
    
    if(isset($_GET['op'])) {
        $op = $_GET['op'];
    }else {
        $op = '';
    }

    if(isset($_POST['simpan'])) {
        $kd_plastik   = $_POST['kd_plastik'];
        $jns_plastik     = $_POST['jns_plastik'];
        $stok = $_POST['stok'];
        $satuan = $_POST['satuan'];
        $status = "Belum produksu";

        if($_POST['kd_plastik'] == "") {
            $error = "kd_plastik tidak boleh kosong!";
        }else if($_POST['jns_plastik'] == "") {
            $error = "jns_Pplastik tidak boleh kosong!";
        }else if($_POST['stok'] == "") {
            $error = "stok tidak boleh kosong!";
        }else if($_POST['satuan'] == "") {
            $error = "satuan tidak boleh kosong!";
        }else {
            $sql = "insert into tbl_barang (kd_plastik, jns_plastik, stok, satuan, status) values ('$kd_plastik', '$jns_plastik', '$stok', '$satuan', '$status')";
            $sql2 = mysqli_query($conn, $sql);
            if($sql2) {
              echo '<script>setTimeout(function(){ location.reload(); }, 100);</script>';  echo '<script>
              setTimeout(function() {
                          window.location.href = "?page=pencacahan";
                      }, 100);
                    </script>';
              $conn->close();
              exit;
            } else {
                $error = "Failded!";
            }
        }

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
        <span class="d-none d-lg-block">CmS</span>
      </a>
    </div><!-- End Logo -->
    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" id="search" name="search" placeholder="Search" title="Enter search keyword">
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
      <h1>Data Pencacahan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php">Kelola produksi</a></li>
          <li class="breadcrumb-item active">Kelola Pencacahan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Barang</h5>
              <hr>
                    <!-- Button trigger modal -->
                      <!-- <button type="button" class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#ModalTambah">
                        Input
                      </button> -->
                      <a href="cetak_data_pencacahan.php" target="_blank" class="btn btn-outline-info mb-3">
                        Print</a>
                        <button type="button" class="btn btn-outline-secondary mb-3" id="reloadButton">Refresh</button>
                      <!-- Modal Input -->
                    <form method="POST" action="./barang.php">
                      <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="ModalTambah" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModalTambah">Form Input Data Barang</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-lab el="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                  <label for="kd_plastik" class="form-label">Kode Plastik</label>
                                  <input type="text" class="form-control" name="kd_plastik" >
                                </div>
                                <div class="mb-3">
                                    <label>Jenis plastik</label>
                                    <select name="jns_plastik" class="custom-select form-control">
                                    <option selected>Pilih jenis</option>
                                    <option value="ABS">ABS</option>
                                    <option value="HIPS">HIPS</option>
                                    <option value="ADROLIK">ADROLIK</option>
                                    <option value="POM">POM</option>
                                    <option value="NILONIPA">NILONIPA</option>
                                    <option value="PVC">PVC</option>
                                    <option value="PC">PC</option>
                                    <option value="PET">PET</option>
                                    <option value="PS">PS</option>
                                    <option value="AS">AS</option>
                                    <option value="HD">HD</option>
                                    <option value="LD">LD</option>
                                    <option value="HD BLOW">HD BLOW</option>
                                    <option value="DAILON">DAILON</option>
                                    <option value="ELA">ELA</option>
                                    <option value="KARESIN">KARESIN</option>
                                    <option value="ASTROLOID">ASTROLOID</option>
                                    <option value="HIP">HIP</option>
                                    <option value="TPU">TPU</option>
                                    <option value="TPR">TPR</option>
                                    <option value="DAN LAINNYA">DAN LAINNYA</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                  <label for="stok" class="form-label">Stok</label>
                                  <input type="number" value="0" class="form-control" name="stok" disabled>
                                </div>
                                <div class="mb-3">
                                    <label>Satuan</label>
                                    <select name="satuan" class="custom-select form-control">
                                    <option value="kg" selected>Pilih satuan</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Ton">Ton</option>
                                    <option value="Kwintal">Kwintal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" value="submit" name="simpan">Save</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                      <!-- End Modal Input -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Id pencacahan</th>
                    <th scope="col">Tgl produksi</th>
                    <th scope="col">Kode plastik</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no=1;
                      if (isset($_GET['search'])) {
                        $search_keyword = $_GET['search'];
                        $sql = "SELECT * FROM tbl_pencacahan WHERE nama_brg LIKE '%$search_keyword%'";
                        $sqls = mysqli_query($conn, $sql);
                      } else {
                        $sql = "SELECT * FROM tbl_pencacahan";
                        $sqls = mysqli_query($conn, $sql);
                    }
                      while($rs = mysqli_fetch_array($sqls)){
                    ?>	
                  <tr>
                  <td><?php echo"$no"; ?></td>
                    <td><?php echo"$rs[id_pencacahan]"; ?></td>
                    <td><?php echo"$rs[tgl_produksi]"; ?></td>
                    <td><?php echo"$rs[kode_brg]"; ?></td>
                    <td><?php echo"$rs[nama_brg]"; ?></td>
                    <td><?php echo"$rs[jum_sortir]"; ?></td>
                    <td class="d-flex justify-content-center">
                      <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $rs['id_pencacahan']; ?>"><i class="bi bi-arrow-right"></i></button>
                     <!-- Modal Edit -->
                       <form method="POST" action="">
                          <div class="modal fade" id="ModalEdit<?php echo $rs['id_pencacahan']; ?>" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="ModalEdit">Form produksi (pencacahan)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                      <label for="kd_plastik" class="form-label">Id pencacahan</label>
                                      <input type="text" class="form-control" name="id_pencacahan" value="<?php echo"$rs[id_pencacahan]"?>">
                                    </div>
                                    <div class="mb-3">
                                      <label for="kd_plastik" class="form-label">Kode plastik</label>
                                      <input type="text" class="form-control" name="kode_brg2" value="<?php echo"$rs[kode_brg]"?>">
                                    </div>
                                    <div class="mb-3">
                                      <label for="stok" class="form-label">Nama barang</label>
                                      <input type="text" class="form-control" name="nama_brg2" value="<?php echo"$rs[nama_brg]"?>">
                                    </div>
                                    <div class="mb-3" style="transform: scale(0.1);opacity: 0;">
                                      <label for="stok" class="form-label">Jumlah</label>
                                      <input type="number" class="form-control" name="jum_sortir2" value="<?php echo"$rs[jum_sortir]"?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="id_pencacahan" class="form-control" value="<?php echo"$rs[id_pencacahan]" ?>">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" value="produksi" name="produksi">Sortir</button>
                                </div>
                              </div>
                            </div>
                          </div>
                      </form>
                      <?php
                    if (isset($_POST['produksi'])) {
                      $id_pencacahan = $_POST['id_pencacahan'];
                      $kd_plastik = $_POST['kode_brg2'];
                      $nama_brg = $_POST['nama_brg2'];
                      $jum_sortir = $_POST['jum_sortir2'];

                      // Fungsi untuk menghasilkan string acak berisi 5 karakter
                      function generateRandomString($length = 5) {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                          $randomString .= $characters[rand(0, strlen($characters) - 1)];
                        }
                        return $randomString;
                      }

                      $id_pengemasan = generateRandomString(5);
                      if ($_POST['kode_brg2'] == "") {
                          $error = "Kode plastik tidak boleh kosong!";
                        } else if ($_POST['jum_sortir2'] == "") {
                          echo "ok1";
                          $error = "Jumlah barang tidak boleh kosong!";
                        } else {
                            $sql = "INSERT INTO tbl_pengemasan (id_pengemasan, kode_brg, jum_sortir, nama_brg) VALUES ('$id_pengemasan', '$kd_plastik', '$jum_sortir', '$nama_brg')";
                            $sql2 = mysqli_query($conn, $sql);
                            echo "ok2";
                        if ($sql2) {
                          $sqldelete = "DELETE FROM tbl_pencacahan WHERE id_pencacahan = '$id_pencacahan'";
                          mysqli_query($conn, $sqldelete);
                          echo '<script>setTimeout(function(){ location.reload(); }, 100);</script>';  echo '<script>
                                  setTimeout(function() {
                                      window.location.href = "?page=pencacahan";
                                  }, 100);
                                </script>';
                          $conn->close();
                          exit;
                        } else {
                          echo "Terjadi kesalahan";
                        }
                      }
                    }
                    ?>
                    <!-- End Modal Edit -->
                  <a href ="?page=barang&hapus=<?php echo $rs['id_pencacahan']; ?>" class="btn btn-outline-danger" style="height: 38px;margin: 0 10px;" name="hapus"><i class="bi bi-trash"></i></a>
                  <?php
                   if (isset($_GET['hapus'])) {
                       $id_pencacahan = $_GET['hapus'];
                       if (!empty($id_pencacahan)) {
                      $sqlhapus = "DELETE FROM tbl_pencacahan WHERE id_pencacahan='$id_pencacahan'";
                      if ($conn->query($sqlhapus) === false) {
                          trigger_error ("SQL manual anda salah : ". $sqlhapus . "Error : " .$conn->error, E_USER_ERROR);
                      }else {
                        echo '<script>setTimeout(function(){ location.reload(); }, 100);</script>';  echo '<script>
                                  setTimeout(function() {
                                      window.location.href = "?page=pencacahan";
                                  }, 100);
                                </script>';
                          $conn->close();
                          exit;
                      }
                    }
                  }  
                  ?>
                  </td>
                  </tr>
                  <?php $no++;	}
                  ?>
                </tbody>
              </table>
              <!-- Bordered Table -->
              <!-- End Bordered Table -->
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
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script>
        // Tangkap tombol berdasarkan ID-nya
        const reloadButton = document.getElementById('reloadButton');

        // Tambahkan event listener untuk menangkap klik tombol
        reloadButton.addEventListener('click', function() {
            // Gunakan metode location.reload() untuk me-reload halaman
            location.reload();
        });
    </script>
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