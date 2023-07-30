<body onload="javascript:window.print()" style="margin:0 auto; width:1000px">
<div style="margin-left: 20px"></div>
<p>&nbsp;</p>

<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td><div align="center"><font size="7">PT. Cirebon Mitra Selaras <br></font></div></td>
	</tr>
	<tr>
		<td><div align="center"><font size="3">
			JL. RAYA JEND SUDIRMAN (CIREBON - KUNINGAN ) BLOK PON RT.001 / RW. 007 DESA BEBER - KEC. BEBER KAB.CIREBON <br>TLP. 08129028294 / 082219977724 KODE POS : 45172
		</font></div></td>
	</tr>
</table>

<label><font size="5"><u><center>Laporan Data Barang Penyortiran</center></u></font></label>
<br>
<hr>
<p>&nbsp;</p>
<?php 
    include 'config.php';
    session_start();

    $op = "";

    if(isset($_GET['op'])) {
        $op = $_GET['op'];
    }else {
        $op = '';
    }
   
    if($op == 'kirim') {
        $id = $_GET['id'];
        $sql = "select * from tbl_pengiriman where id_pengiriman = '$id'";
        $sql2 = mysqli_query($conn, $sql);
        $sql3 = mysqli_fetch_array($sql2);
        $id_pengiriman = $sql3['id_pengiriman'];
        $tgl_kirim = $sql3['tgl_kirim'];
        $tujuan = $sql3['tujuan'];
        $kode_brg = $sql3['kode_brg'];
        $nama_pengirim = $sql3['nama_pengirim'];
        $nama_brg = $sql3['nama_brg'];
        $jum_kirim = $sql3['jum_kirim'];
        $foto_brg = $sql3['foto_brg'];
    }

?>
<div style="display: flex;align-items: center;margin-bottom: 30px;">
    <p><span style="font-weight: bold;">Id pengiriman</span> : <?php echo $id_pengiriman ?></p>
</div>
<div style="display: flex;align-items: center;margin-bottom: 30px;">
    <p><span style="font-weight: bold;">Tgl pengiriman</span> : <?php echo $tgl_kirim ?></p>
</div>
<div style="display: flex;align-items: center;margin-bottom: 30px;">
    <p><span style="font-weight: bold;">Tujaun pengiriman</span> : <?php echo $tujuan ?></p>
</div>

<table style="border: 1px solid gray;" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<th style="border-right: 1px solid gray">No.</th>
		<th style="border-right: 1px solid gray">Kode barang</th>
		<th style="border-right: 1px solid gray">Nama pengirim</th>
		<th style="border-right: 1px solid gray">Nama barang</th>	
		<th style="border-right: 1px solid gray">Jumlah barang</th>			
		<th style="border-right: 1px solid gray">Foto barang</th>			
	</tr>
    <tr>
        <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $no; ?></td>
        <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $kode_brg; ?></td>
        <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $nama_pengirim; ?></td>
        <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $nama_brg; ?></td>
        <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $jum_kirim; ?></td>
        <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><img src="./uploads/<?php echo $foto_brg; ?>" style="width: 70%:" alt="img" /></td>
    </tr>
</table>

<p>&nbsp;</p>

<table align="left" cellpadding="0">
	<tr>
		<td>Cirebon, <?php echo date("d F Y")?>
	</td>
	</tr>
	<tr><td>Direktur PT. Cirebon Mitra Selaras
	<p><img src="image/ttd.png" width="20%"></p>
	<u>Syarif, M.Pd</u>
	</td>
	</tr>
</table>
</body>