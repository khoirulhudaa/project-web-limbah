<?php
// Include file config.php dan buat koneksi ke database
include 'config.php';

if (isset($_GET['submit']) && !empty($_GET['search'])) {
  $searchKeyword = $_GET['search'];

  // Query untuk mencari data berdasarkan kata kunci
  $sql = "SELECT * FROM tbl_barang WHERE jns_plastik LIKE '%$searchKeyword%'";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
    die("Error: " . mysqli_error($conn));
  }

  // Tampilkan hasil pencarian dalam bentuk tabel
  if (mysqli_num_rows($result) > 0) {
    echo '<table class="table table-bordered text-center">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Jenis Plastik</th>
                <th scope="col">Stok</th>
                <th scope="col">Satuan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>';

    $no = 1;
    while ($rs = mysqli_fetch_array($result)) {
      echo '<tr>
              <td>' . $no . '</td>
              <td>' . $rs['kd_plastik'] . '</td>
              <td>' . $rs['jns_plastik'] . '</td>
              <td>' . $rs['stok'] . '</td>
              <td>' . $rs['satuan'] . '</td>
              <td class="d-flex justify-content-center">
                <!-- Tombol edit dan hapus -->
                <!-- ... -->
              </td>
            </tr>';
      $no++;
    }

    echo '</tbody></table>';
  } else {
    echo '<p>Tidak ada data yang cocok dengan kata kunci "' . $searchKeyword . '".</p>';
  }
}
?>
