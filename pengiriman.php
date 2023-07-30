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
                          window.location.href = "?page=pengiriman";
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
      <h1>Data Pengiriman</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Kelola Pengiriman</li>
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
                      <a href="cetak_data_pengiriman.php" target="_blank" class="btn btn-outline-info mb-3">
                        Print all</a>
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
                    <th scope="col">Id pengiriman</th>
                    <th scope="col">Tgl kirim</th>
                    <th scope="col">Nama pengirim</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Foto barang</th>
                    <th scope="col">status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no=1;
                      if (isset($_GET['search'])) {
                        $search_keyword = $_GET['search'];
                        $sql = "SELECT * FROM tbl_pengiriman WHERE nama_pengirim LIKE '%$search_keyword%'";
                        $result = mysqli_query($conn, $sql);
                      } else {
                        $sql = "SELECT * FROM tbl_pengiriman";
                        $result = mysqli_query($conn, $sql);
                    }
                      while($rs = mysqli_fetch_array($result)){
                      ?>	
                  <tr>
                  <td><?php echo"$no"; ?></td>
                    <td><?php echo"$rs[id_pengiriman]"; ?></td>
                    <td><?php echo"$rs[tgl_kirim]"; ?></td>
                    <td><?php echo"$rs[nama_pengirim]"; ?></td>
                    <td><?php echo"$rs[tujuan]"; ?></td>
                    <td><img src="./uploads/<?php echo"$rs[foto_brg]"; ?>" alt="img" style="width: 70%;" /></td>
                    <td style="text-align: center;"><?php echo $rs['status']; ?>
                    </td>
                    <td class="d-flex justify-content-center">
                      <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $rs['id_pengiriman']; ?>"><i class="bi bi-pencil"></i></button>
                     <!-- Modal Edit -->
                       <form method="POST" action="">
                          <div class="modal fade" id="ModalEdit<?php echo $rs['id_pengiriman']; ?>" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="ModalEdit">Form status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                      <label for="kd_plastik" class="form-label">Id pengemasan</label>
                                      <select name="status" class="custom-select form-control">
                                        <option value="Progress" selected>Pilih status</option>
                                        <option value="Progress">Progress</option>
                                        <option value="Cancel">Cancel</option>
                                        <option value="Done">Done</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="id_pengiriman" class="form-control" value="<?php echo"$rs[id_pengiriman]" ?>">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" value="produksi" name="produksi">Kirim sekarang</button>
                                </div>
                              </div>
                            </div>
                          </div>
                      </form>
                      <?php
                    if (isset($_POST['produksi'])) {
                      $id_pengiriman = $_POST['id_pengiriman'];
                      $status = $_POST['status'];

                      // Fungsi untuk menghasilkan string acak berisi 5 karakter
                      
                      if ($_POST['id_pengiriman'] == "") {
                          $error = "id pengiriman tidak boleh kosong!";
                        } else if ($_POST['status'] == "") {
                            $error = "status tidak boleh kosong!";
                        } else {
                            $sql = "UPDATE tbl_pengiriman SET status = '$status' WHERE id_pengiriman = '$id_pengiriman'";
                            mysqli_query($conn, $sql);
                            echo '<script>setTimeout(function(){ location.reload(); }, 100);</script>';  echo '<script>
                                    setTimeout(function() {
                                        window.location.href = "?page=pengiriman";
                                    }, 100);
                                  </script>';
                            $conn->close();
                            exit;
                            if(!$sql) {
                                echo "error";
                            }
                        } 
                      }
                    ?>
                    <!-- End Modal Edit -->
                  <a target="_blank" href="cetak_data_pengiriman.php?op=kirim&id=<?php echo $rs['id_pengiriman']; ?>" class="btn btn-outline-info" style="height: 38px;margin: 0px 0px 0px 10px;" name="hapus">
                    <i class="bi bi-file-pdf"></i>
                  </a>
                  <a href ="?page=barang&hapus=<?php echo $rs['id_pengiriman']; ?>" class="btn btn-outline-danger" style="height: 38px;margin: 0 10px;" name="hapus"><i class="bi bi-trash"></i></a>
                  <?php
                   if (isset($_GET['hapus'])) {
                       $id_pengiriman = $_GET['hapus'];
                       if (!empty($id_pengiriman)) {
                      $sqlhapus = "DELETE FROM tbl_pengiriman WHERE id_pengiriman='$id_pengiriman'";
                      if ($conn->query($sqlhapus) === false) {
                          trigger_error ("SQL manual anda salah : ". $sqlhapus . "Error : " .$conn->error, E_USER_ERROR);
                      }else {
                        echo '<script>setTimeout(function(){ location.reload(); }, 100);</script>';  echo '<script>
                                  setTimeout(function() {
                                      window.location.href = "?page=pengiriman";
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