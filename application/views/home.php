<div class="col_3">
 <div class="col-md-3 widget widget1">
  <div class="r3_counter_box">
    <i class="pull-left fa fa-thumbs-up icon-rounded"></i>
    <div class="stats">
      <h5><strong><?php echo $jumlah ?></strong></h5>
      <span>Buku Terjual</span>
    </div>
  </div>
</div>
<div class="col-md-3 widget widget1">
  <div class="r3_counter_box">
    <i class="pull-left fa fa-book user1 icon-rounded"></i>
    <div class="stats">
      <h5><strong><?php echo $jmlbuku ?></strong></h5>
      <span>Jenis Film</span>
    </div>
  </div>
</div>
<div class="col-md-3 widget widget1">
  <div class="r3_counter_box">
    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
    <div class="stats">
      <h5><strong><?php echo $jmlTrans ?></strong></h5>
      <span>Transaksi Hari Ini</span>
    </div>
  </div>
</div>
<div class="col-md-3 widget">
  <div class="r3_counter_box">
    <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
    <div class="stats">
      <h5><strong>Rp. <?php echo number_format($keuntungan) ?></strong></h5>
      <span>Keuntungan Hari Ini</span>
    </div>
  </div>
</div>
<div class="clearfix"> </div>
</div>

<div class="col_1">
  <div class="col-md-4 stats-info">
    <div class="panel-heading">
      <h4 class="panel-title">Histori</h4>
    </div>
    <div class="panel-body">
    <?php foreach ($histori as $histori): ?>
      
    
      <ul class="list-unstyled">
        <li><?php echo $histori->nama_peminjam ?><div class="text-success pull-right"><?php echo number_format($histori->total) ?></div></li>
      </ul>

      <?php endforeach ?>
    </div>
  </div>
</div>