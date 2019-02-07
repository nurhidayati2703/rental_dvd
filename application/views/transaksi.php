<div class="col-md-12 span_4">
	<div class="col_2">
	</form>
		<div class="box_1">
		<?php foreach ($film as $film):?>
			<div class="col-md-2 col_1_of_2 span_1_of_2">
				<a class="tiles_info">
					<div class="tiles-body red" style="border-bottom-right-radius: 0px;border-bottom-left-radius: 0px; background-color: #00aced">
						<img src="<?php echo base_url('assets/upload/'.$film->foto_film)?>" width="100%">
						<div class="text-center" style="font-size: 20px; margin-top: 10px;margin-bottom: 10px"><?php echo $film->judul_film ?></div>
						<div class="text-center" style="font-size: 16px; margin-top: 10px;margin-bottom: -10px"><?php echo $film->stok ?> Stok</div>
					</div>
					<div class="tiles-head red1" style="<?php if($film->stok == 0){echo 'display:none';} ?>;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;border-top-right-radius: 0px;border-top-left-radius: 0px; background-color: #09b5f7; cursor: pointer">
						<div class="text-center" style="background-color: #09b5f7;padding: 10px"><a href="<?php echo base_url('index.php/cart/addCart/'.$film->kode_film)?>" class="btn btn-default" style="width: 100%; background-color: transparent; border-color: transparent;color: white;font-size: 16px; font-weight: 600">Beli</a></div>
					</div>
				</a>
			</div>
		<?php endforeach ?>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>