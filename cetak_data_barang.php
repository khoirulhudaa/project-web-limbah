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
<br>
<hr>

<label><font size="5"><u><center>Laporan Data Barang</center></u></font></label>

<p>&nbsp;</p>

<table style="border: 1px solid gray;" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<th style="border-right: 1px solid gray">No.</th>
		<th style="border-right: 1px solid gray">Kode Barang</th>
		<th style="border-right: 1px solid gray">Jenis Barang</th>
		<th style="border-right: 1px solid gray">Stok</th>	
		<th style="border-right: 1px solid gray">Satuan</th>			
	</tr>

	<?php
		include"config.php";
		$no=1;
		$sqls = mysqli_query($conn,"Select * from tbl_barang");
		while($rs = mysqli_fetch_array($sqls)){
		?>	
		<tr>
			<td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo"$no"; ?></td>
			<td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;" ><?php echo"$rs[kd_plastik]"; ?></td>
			<td style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo"$rs[jns_plastik]"; ?></td>
			<td style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo"$rs[stok]"; ?></td>
			<td style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo"$rs[satuan]"; ?></td>
		</tr>
	<?php $no++;	}
	?>
</table>

<p>&nbsp;</p>

<table align="left" cellpadding="0" cellspacing="0">
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