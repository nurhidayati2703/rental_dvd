<?php if ($this->session->flashdata('pesan')) { ?>
<div class="alert alert-info" role="alert">
	<strong>Kembalian </strong><?php echo number_format($this->session->flashdata('pesan')); ?>
</div>
<?php } ?>

<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	<div class="panel-body no-padding">
		<form action="<?php echo base_url() ?>index.php/cart/simpan" method="post">
			<input type="hidden" name="kode_user" value="<?php echo $this->session->userdata('kode_user')?>">
			<table class="table table-striped">
				<thead>
					<tr class="warning">
						<th>No</th>
						<th>Judul Buku</th>
						<th width="200px">Qty</th>
						<th>Harga</th>
						<th>Subtotal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0; foreach ($this->cart->contents() as $items):
					$no++;
					?>
					<tr>
						<input type="hidden" name="kode_film[]" value="<?php echo $items['id'] ?>">
						<input type="hidden" name="rowid[]" value="<?php echo $items['rowid'] ?>">
						<input type="hidden" name="stok[]" value="<?php echo $items['options']['stok'] ?>">
						<td><?php echo $no ?></td>
						<td><?php echo $items['name'] ?></td>
						<td><input class="form-control1" style="height: 30px; width: 50%" type="number" min="1" max="<?php echo $items['options']['stok'] ?>" name="qty[]" value="<?php echo $items['qty'] ?>"></td>
						<td><?php echo $items['price'] ?></td>
						<td>Rp. <?php echo number_format($items['subtotal']) ?></td>
						<td><a href="<?php echo base_url('index.php/cart/delete/'.$items['rowid']) ?>" class="btn btn-sm btn-danger">X</a></td>
					</tr>
				<?php endforeach ?>
			</tbody>

			<tfoot>
				<tr style="font-weight: bold">
					<td colspan="4" style="text-align: right;">Grand Total</td>
					<td>Rp. <?php echo number_format($this->cart->total()) ?></td>
					<input type="hidden" name="grandtotal" id="grandtotal" value="<?php echo $this->cart->total() ?>">
				</tr>
				<tr></tr>
				<tr style="font-weight: bold; border-top: 2px solid #eee">
					<td colspan="4" style="text-align: right;">Nama Pembeli</td>
					<td colspan="2"><input class="form-control1" style="height: 30px; width: 80%" type="text" name="nama"></td>
				</tr>
				<tr style="font-weight: bold;">
					<td colspan="4" style="text-align: right;">Uang yang dibayar</td>
					<td colspan="2"><input class="form-control1" style="height: 30px; width: 80%" type="number" name="mbayar" id="mbayar"></td>
				</tr>
				<!-- <tr style="font-weight: bold;">
					<td colspan="4" style="text-align: right;">Kembalian</td>
					<td colspan="2"><span id="kembalian"><?php echo $uang ?></span><input class="form-control1" style="height: 30px; width: 80%" type="hidden" name="kembalian"></td>
				</tr> -->
			</tfoot>
		</table>
	</div>
</div>
<input class="btn btn-lg btn-primary" type="submit" name="bayar" id="bayar" value="Bayar">
<div class="pull-right">
	<input class="btn btn-lg btn-default" type="submit" name="update" value="Update Qty">
	<a class="btn btn-lg btn-danger" type="submit" name="delete" href="<?php echo base_url('index.php/cart/deleteAll') ?>">Clear Cart</a>
</div>
</form>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		$("#bayar").click(function(){
			var mbayar = $("#mbayar").val();
			var grandtotal = $("#grandtotal").val();
			var kembalian = mbayar - grandtotal;
			$("#kembalian").html(kembalian);
		});
	});
</script> -->