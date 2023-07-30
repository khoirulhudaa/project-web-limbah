<?php 
    include 'config.php';
    session_start();

    $kd_plastik   = "";
    $nama_pengirim = "";
    $nama_brg = "";
    $alamat_pengirim = "";
    $jum_brg = "";
    $status = "Belum produksi";
    
    if(isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = '';
    }

    if(isset($_POST['simpan'])) {
        $kd_plastik   = $_POST['kd_plastik'];
        $nama_pengirim = $_POST['nama_pengirim'];
        $alamat_pengirim = $_POST['alamat_pengirim'];
        $nama_brg = $_POST['nama_brg'];
        $jum_brg = $_POST['jum_brg'];
        $status = "Belum produksi";

        if($_POST['kd_plastik'] == "") {
            $error = "kd_plastik tidak boleh kosong!";
        } else if($_POST['nama_pengirim'] == "") {
            $error = "nama pengirim tidak boleh kosong!";
        } else if($_POST['jum_brg'] == "") {
            $error = "jumlah barang tidak boleh kosong!";
        } else if($_POST['nama_brg'] == "") {
            $error = "nama barang tidak boleh kosong!";
        } else {
            $sql = "INSERT INTO tbl_barangmasuk (kd_plastik, nama_pengirim, alamat_pengirim, nama_brg, jum_brg, status) values ('$kd_plastik', '$nama_pengirim', '$alamat_pengirim', '$nama_brg', '$jum_brg', '$status')";
            $sql2 = mysqli_query($conn, $sql);
            if($sql2) {
                $sukses = "Successfully";
                $sql_update_stok = "UPDATE tbl_barang SET stok = stok + $jum_brg WHERE kd_plastik = '$kd_plastik'";

                if ($conn->query($sql_update_stok) === TRUE) {
                    echo " Stok barang berhasil diperbarui.";
                } else {
                    echo " Error saat memperbarui stok barang: " . mysqli_error($conn);
                }
                echo '<script>setTimeout(function(){ location.reload(); }, 100);</script>';  echo '<script>
                      setTimeout(function() {
                          window.location.href = "?page=barangmasuk";
                      }, 100);
                    </script>';
              $conn->close();
              exit;
            } else {
               var_dump(mysqli_error($conn));
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
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Barang Masuk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Kelola Barang Masuk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Barang Masuk (KG)</h5>
              <hr>
                    <!-- Button trigger modal -->
                      <button type="button" class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#ModalTambah">
                        Input
                      </button>
                      <a href="cetak_data_barangmasuk.php" target="_blank" class="btn btn-outline-info mb-3">
                        Print</a> 
                      <!-- Modal Input -->
                      <button type="button" class="btn btn-outline-secondary mb-3" id="reloadButton">Refresh</button>
                    <form method="POST" action="./barangmasuk.php">
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
                                    <select name="kd_plastik" class="custom-select form-control">
                                      <?php
                                        $no=1;
                                        $sqls = mysqli_query($conn,"Select * from tbl_barang");
                                        while($rs = mysqli_fetch_array($sqls)){
                                      ?>	
                                        <option value="<?php echo"$rs[kd_plastik]"; ?>"><?php echo"$rs[kd_plastik]"; ?> - (<?php echo"$rs[jns_plastik]"; ?>)</option>
                                      <?php 
                                        }
                                      ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                  <label for="nama_pengirim" class="form-label">Nama pengirim</label>
                                  <input type="text" class="form-control" name="nama_pengirim">
                                </div>
                                <div class="mb-3">
                                  <label for="alamat_pengirim">Alamat pengirim</label>
                                  <input type="text" class="form-control" name="alamat_pengirim">
                                </div>
                                <div class="mb-3">
                                  <label for="nama_barang" class="form-label">Nama barang</label>
                                  <input type="text" class="form-control" name="nama_brg">
                                </div>
                                <div class="mb-3">
                                  <label for="jum_brg" class="form-label">Jumlah barang (KG)</label>
                                  <input type="number" class="form-control" name="jum_brg">
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" value="simpan" name="simpan">Save</button>
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
                    <th scope="col">Kode Plastik</th>
                    <th scope="col">Tgl Masuk</th>
                    <th scope="col">Nama Pengirim</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                // Ambil data dari tabel tbl_barangmasuk
                if (isset($_GET['search'])) {
                  $search_keyword = $_GET['search'];
                  $sql = "SELECT * FROM tbl_barangmasuk WHERE nama_pengirim LIKE '%$search_keyword%'";
                  $results = mysqli_query($conn, $sql);
                } else {
                  $sql = "SELECT * FROM tbl_barangmasuk";
                  $results = mysqli_query($conn, $sql);
              }

                // Periksa apakah ada data yang ditemukan
                if (mysqli_num_rows($results) > 0) {
                    $no = 1;
                    // Loop untuk menampilkan data
                    while ($row = mysqli_fetch_assoc($results)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['kd_plastik']; ?></td>
                            <td><?php echo $row['tgl_masuk']; ?></td>
                            <td><?php echo $row['nama_pengirim']; ?></td>
                            <td><?php echo $row['nama_brg']; ?></td>
                            <td><?php echo $row['jum_brg']; ?></td>
                    <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_brg_masuk']; ?>"><i class="bi bi-pencil"></i></button>
                    <!-- Modal Edit -->
                      <form method="POST" action="./barangmasuk.php">
                        <div class="modal fade" id="ModalEdit<?php echo $row['id_brg_masuk']; ?>" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="ModalTambah">Form Edit Data Barang Masuk</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-lab el="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="mb-3">
                                      <label for="kd_plastik" class="form-label">Kode Plastik</label>
                                        <select name="kd_plastik" class="custom-select form-control">
                                          <?php
                                            $no=1;
                                            $sqls = mysqli_query($conn,"Select * from tbl_barang");
                                            while($rs = mysqli_fetch_array($sqls)){
                                          ?>	
                                            <option value="<?php echo $rs['kd_plastik'] ?>" <?php echo ($rs['kd_plastik'] === $row['kd_plastik']) ? 'selected' : ''; ?>><?php echo $rs['kd_plastik'] ?></option>
                                          <?php 
                                            }
                                          ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                      <label for="nama_pengirim" class="form-label">Nama pengirim</label>
                                      <input type="text" class="form-control" name="nama_pengirim" value="<?php echo $row['nama_pengirim']; ?>">
                                    </div>
                                    <div class="mb-3">
                                      <label for="alamat_pengirim">Alamat pengirim</label>
                                      <input type="text" class="form-control" name="alamat_pengirim" value="<?php echo $row['alamat_pengirim']; ?>">
                                    </div>
                                    <div class="mb-3">
                                      <label for="nama_barang" class="form-label">Nama barang</label>
                                      <input type="text" class="form-control" name="nama_brg" value="<?php echo $row['nama_brg']; ?>">
                                    </div>
                                    <div class="mb-3" style="transform: scale(0.1);opacity: 0;">
                                      <label for="jum_brg" class="form-label">Jumlah barang</label>
                                      <input type="number" class="form-control" name="jum_brg" value="<?php echo $row['jum_brg']; ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <input type="hidden" name="id_brg_masuk" class="form-control" value="<?php echo $row['id_brg_masuk']; ?>">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" value="update" name="update">Save</button>
                                </div>
                              </div>
                            </div>
                          </div>
                      </form>
                    <!-- End Modal Input -->
                    <?php
                  if (isset($_POST['update'])) {
                    $id_brg_masuk = $_POST['id_brg_masuk'];
                    $kd_plastik = $_POST['kd_plastik'];
                    $nama_pengirim = $_POST['nama_pengirim'];
                    $nama_brg = $_POST['nama_brg'];
                    $alamat_pengirim = $_POST['alamat_pengirim'];
                    $jum_brg = $_POST['jum_brg'];
                    $status = 'Belum produksi';

                    $sqls = " UPDATE tbl_barangmasuk SET kd_plastik='$kd_plastik', nama_pengirim='$nama_pengirim', nama_brg='$nama_brg', alamat_pengirim='$alamat_pengirim', jum_brg='$jum_brg', status='$status' WHERE id_brg_masuk='$id_brg_masuk'";
                    
                    if ($conn ->query($sqls) === false ) {
                      trigger_error("Periksan perintah SQL : ".$sqls ."Error : " .$conn->error, E_USER_ERROR);
                    }else {
                      echo '<script>setTimeout(function(){ location.reload(); }, 100);</script>';  echo '<script>
                              setTimeout(function() {
                                  window.location.href = "?page=barangmasuk";
                              }, 100);
                            </script>';
                      $conn->close();
                      exit;
                    }
                  }
                  ?>
                  <!-- End Modal Edit -->
                  <a href="?page=barangmasuk&hapus=<?php echo $row['id_brg_masuk']; ?>&jum_brg=<?php echo $row['jum_brg']; ?>&kd_plastik=<?php echo $row['kd_plastik']; ?>" class="btn btn-outline-danger" name="hapus" style="margin-bottom: 8px;">
                      <i class="bi bi-trash"></i>
                  </a>

                  <?php
                   if (isset($_GET['hapus'])) {
                    $id_brg_masuk = $_GET['hapus'];
                    $jum_brg = $_GET['jum_brg'];
                    $kd_plastik = $_GET['kd_plastik'];
                    if (!empty($id_brg_masuk)) {
                      $sqlhapus = "DELETE FROM tbl_barangmasuk WHERE id_brg_masuk='$id_brg_masuk'";
                      //hapus juga semua data barang ini di tabel keluar-masuk
                      // $deltabelkeluar = mysqli_query($conn,"delete from sbrg_keluar where id='$idx'");
                      // $deltabelmasuk = mysqli_query($conn,"delete from sbrg_masuk where id='$idx'");
                    if ($conn->query($sqlhapus) === false) {
                        trigger_error ("SQL manual anda salah : ". $sqlhapus . "Error : " .$conn->error, E_USER_ERROR);
                      }else {
                        $sql_stok = "UPDATE tbl_barang SET stok = stok - $jum_brg WHERE kd_plastik = '$kd_plastik'";
                        mysqli_query($conn, $sql_stok);
                        echo '<script>setTimeout(function(){ location.reload(); }, 100);</script>';  echo '<script>
                                setTimeout(function() {
                                    window.location.href = "?page=barangmasuk";
                                }, 100);
                              </script>';
                        $conn->close();
                        exit;
                      }
                    }
                  }  
                  ?>
                     <button type="button" class="btn btn-outline-success mb-2" data-bs-toggle="modal" data-bs-target="#ModalStep<?php echo $row['id_brg_masuk']; ?>"><i class="bi bi-arrow-right"></i></button>
                    <!-- Modal Edit -->
                    <form method="POST" action="./barangmasuk.php">
                      <div class="modal fade" id="ModalStep<?php echo $row['id_brg_masuk']; ?>" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModalEdit">Form Produksi (Penyortiran)</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="kd_plastik" class="form-label">Kode Plastik</label>
                                <input type="text" class="form-control" name="kd_plastik2" value="<?php echo $row['kd_plastik']; ?>">
                              </div>
                              <div class="mb-3">
                                <label for="kd_plastik" class="form-label">Nama barang</label>
                                <input type="text" class="form-control" name="nama_brg2" value="<?php echo $row['nama_brg']; ?>">
                              </div>
                              <div class="mb-3">
                                <label for="tgl_masuk" class="form-label">Tanggal masuk</label>
                                <input type="text" class="form-control" name="tgl_masuk" value="<?php echo $row['tgl_masuk']; ?>">
                              </div>
                              <div class="mb-3" style="transform: scale(0.1);opacity: 0;">
                                <label for="stok" class="form-label">Stok saat ini</label>
                                <input type="number" class="form-control" name="jum_brg2" value="<?php echo $row['jum_brg']; ?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <input type="tetx" class="form-control" style="opacity: 0;transform: scale(0.1)" name="id_barang" value="<?php echo $row['id_brg_masuk']; ?>">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary" value="produksi" name="produksi">Sortir</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>

                    <?php
                    if (isset($_POST['produksi'])) {
                      $kd_plastik = $_POST['kd_plastik2'];
                      $nama_brg = $_POST['nama_brg2'];
                      $jum_sortir = $_POST['jum_brg2'];
                      $id_barang = $_POST['id_barang'];

                      // Fungsi untuk menghasilkan string acak berisi 5 karakter
                      function generateRandomString($length = 5) {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                          $randomString .= $characters[rand(0, strlen($characters) - 1)];
                        }
                        return $randomString;
                      }

                      $id_penyortiran = generateRandomString(5);

                      if ($_POST['kd_plastik2'] == "") {
                        $error = "Kode plastik tidak boleh kosong!";
                      } else if ($_POST['jum_brg2'] == "") {
                        $error = "Jumlah barang tidak boleh kosong!";
                      } else {
                        $sql = "INSERT INTO tbl_penyortiran (id_penyortiran, kode_brg, jum_sortir, nama_brg) VALUES ('$id_penyortiran', '$kd_plastik', '$jum_sortir', '$nama_brg')";
                        $sql2 = mysqli_query($conn, $sql);
                        if ($sql2) {
                          $sql_stok = "UPDATE tbl_barang SET stok = stok - $jum_sortir WHERE kd_plastik = '$kd_plastik'";
                          mysqli_query($conn, $sql_stok);
                          $sqldelete = "DELETE FROM tbl_barangmasuk WHERE id_brg_masuk = $id_barang";
                          mysqli_query($conn, $sqldelete);
                          echo '<script>setTimeout(function(){ location.reload(); }, 100);</script>';  echo '<script>
                                  setTimeout(function() {
                                      window.location.href = "?page=barangmasuk";
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

                    </td>
                  </tr>
                  <?php
                        $no++;
                      }
                    } 
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