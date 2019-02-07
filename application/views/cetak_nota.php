<h2 align="center" style="margin-top: 50px">Nota Pembayaran</h2>
<table border="0" style="padding-left: 50px; margin-top: 100px">
	<tr>
		<td>No. Pembayaran</td>
		<td>: <?php echo $transaksi->kode_transaksi ?></td>
	</tr>
	<tr>
		<td>Kode Kasir</td>
		<td>: <?php echo $transaksi->kode_user ?></td>
	</tr>
	<tr>
		<td>Atas Nama</td>
		<td>: <?php echo $transaksi->nama_pembeli?></td>
	</tr>
	<tr>
		<td>Tanggal Pembelian</td>
		<td>: <?php echo $transaksi->tanggal_beli ?></td>
	</tr>
</table>

<table border="1"  style="margin-top: 50px; width: 96%; margin-left: 2%;margin-right: 2%; border-collapse: collapse; text-align: center;">
	<tr style="font-weight: 600;margin-bottom: 20px" style="text-align: center;">
		<td style="    padding-bottom: 20px;
    text-align: center;
    padding-top: 20px;">No</td>
		<td>Judul Buku</td>
		<td>Qty</td>
		<td>Harga @</td>
		<td>Subtotal</td>
	</tr>
	<?php 
	$no = 0;
	foreach ($pembelian as $key): 
		$no++;
	?>


	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $key->judul_buku ?></td>
		<td><?php echo $key->jumlah ?></td>
		<td><?php echo number_format($key->harga) ?></td>
		<td><?php echo number_format($key->harga*$key->jumlah)?></td>
	</tr>

<?php endforeach ?>

	<tr>
		<td colspan="4" style="font-weight: 600;padding-top: 20px; padding-bottom: 20px">Grand Total</td>
		<td><?php echo number_format($transaksi->total) ?></td>
	</tr>
</table>

<script type="text/javascript">
	window.print();
</script>