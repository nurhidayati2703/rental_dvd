<?php if ($this->session->flashdata('pesan')) { ?>
<div class="alert alert-info" role="alert">
<?php echo $this->session->flashdata('pesan'); ?>
</div>
<?php } ?>

<div class="xs">
 <h3 style="text-align: center;font-weight: 600;font-size: 36px">Data Film</h3>
 <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#tambah">Tambah Data</button>
 <div class="bs-example4" data-example-id="contextual-table">
   <table class="table" id="table">
    <thead>
      <tr>
        <th>Gambar</th>
        <th>Judul Film</th>
        <th>Kode Film</th>
        <th>Nama Genre</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php  
      foreach ($film as $film):
    ?>
      <tr>
        <td><img src="<?php echo base_url('assets/upload/'.$film->foto_film)?>" width="100px"></td>
        <td><?php echo $film->judul_film ?></td>
        <td><?php echo $film->kode_film ?></td>
        <td><?php echo $film->nama_genre ?></td>
        <td><?php echo $film->stok ?></td>
        <td>Rp. <?php echo number_format($film->harga) ?></td>
        <td>
          <a class="btn btn-sm btn-default" data-toggle="modal" data-target="#edit" onclick="edit('<?php echo $film->kode_film ?>')">Update</a>
          <a class="btn btn-sm btn-danger" href="<?php echo base_url('film/delete/'.$film->kode_film) ?>" onclick="return confirm('Data Buku akan dihapus')">Delete</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <script type="text/javascript">
    function edit(a) {
    $.ajax({
      type: "post",
      url: "<?= base_url() ?>index.php/film/detail/"+a,
      dataType: "json",
      success:function(data){
        $("#kodefilm").val(data.kode_film);
        $("#judul").val(data.judul_film);
        $("#tahun").val(data.tahun);
        $("#genre").val(data.kode_genre);
        $("#harga").val(data.harga);
        $("#produksi").val(data.produksi);
        $("#sutradara").val(data.sutradara);
        $("#stok").val(data.stok);
        $("#tampilGambar").attr('src','<?php echo base_url() ?>assets/upload/'+data.foto_film);

      }
    });
  }
  </script>

  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="modal-title">Update Data</h2>
        </div>
        <div class="modal-body">

          <div class="well1 white">
            <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()" enctype="multipart/form-data" method="post" action="<?php echo base_url()?>index.php/film/update">
              <fieldset>
              <input type="hidden" id="kodefilm" name="kodefilm">
                <div class="form-group">
                  <label class="control-label">Judul Film</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="judul" id="judul">
                </div>

                <div class="form-group">
                  <label class="control-label">Tahun</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="tahun" id="tahun">
                </div>
                <div class="form-group filled">
                  <label class="control-label">Genre</label>
                  <select class="form-control1 ng-invalid ng-invalid-required" ng-model="model.select" required name="genre" id="genre"><option></option>
                    <?php  
                    foreach ($genre as $kat):
                    ?>
                    <option value="<?php echo $kat->kode_genre ?>"><?php echo $kat->nama_genre ?></option>
                  <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label class="control-label">Harga</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="harga" id="harga">
                </div>

                <div class="form-group">
                  <label class="control-label">Produksi</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="produksi" id="produksi">
                </div>

                <div class="form-group">
                  <label class="control-label">Sutradara</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="sutradara" id="sutradara">
                </div>

                <div class="form-group">
                  <label class="control-label">Stok</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" name="stok" id="stok">
                </div>

                <div class="form-group">
                  <label class="control-label">Foto Film</label>
                  <img id="tampilGambar" src="" width="100%;">
                  <input type="file" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" name="gambar">
                </div>
              </fieldset>
            
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <input class="btn btn-primary" type="submit" name="submit">
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="modal-title">Tambah Data</h2>
        </div>
        <div class="modal-body">

          <div class="well1 white">
            <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()" enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>index.php/film/add">
              <fieldset>
                <div class="form-group">
                  <label class="control-label">Judul Film</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="judul">
                </div>

                <div class="form-group">
                  <label class="control-label">Tahun</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="tahun">
                </div>
                <div class="form-group filled">
                  <label class="control-label">Genre</label>
                  <select class="form-control1 ng-invalid ng-invalid-required" ng-model="model.select" required name="genre" id="genre"><option></option>
                    <?php  
                    foreach ($genre as $kat1):
                    ?>
                    <option value="<?php echo $kat1->kode_genre ?>"><?php echo $kat1->nama_genre ?></option>
                  <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label class="control-label">Harga</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="harga">
                </div>

                <div class="form-group">
                  <label class="control-label">Produksi</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="produksi">
                </div>

                <div class="form-group">
                  <label class="control-label">Sutradara</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="sutradara">
                </div>

                <div class="form-group">
                  <label class="control-label">Stok</label>
                  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" name="stok">
                </div>

                <div class="form-group">
                  <label class="control-label">Foto Cover</label>
                  <input type="file" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" name="gambar">
                </div>
              </fieldset>

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <input type="submit" class="btn btn-primary" value="Tambah Data">
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
</div>
</div>