<?php if ($this->session->flashdata('pesan')) { ?>
<div class="alert alert-info" role="alert">
<strong>Sukses! </strong><?php echo $this->session->flashdata('pesan'); ?>
</div>
<?php } ?>

<div class="xs">
 <h3 style="text-align: center;font-weight: 600;font-size: 36px">Data Genre</h3>
 <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#tambah">Tambah Data</button>
 <div class="bs-example4" data-example-id="contextual-table">
   <table class="table" id="table">
    <thead>
      <tr>
        <th>No.</th>
        <th>Kode Genre</th>
        <th>Nama Genre</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php  
      $no = 0;
      foreach ($tampil as $kat):
        $no++
      ?>
      <tr>
        <th scope="row"><?php echo $no ?></th>
        <td><?php echo $kat->kode_genre ?></td>
        <td><?php echo $kat->nama_genre ?></td>
        <td>
          <a class="btn btn-sm btn-default" data-toggle="modal" data-target="#edit" onclick="edit('<?= $kat->kode_genre ?>')">Update</a>
          <a name="delete" href="<?php echo base_url('index.php/genre/delete/'.$kat->kode_genre) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data Genre akan dihapus')">Delete</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<script type="text/javascript">
  function edit(a) {
    $.ajax({
      type: "post",
      url: "<?= base_url() ?>index.php/genre/detail/"+a,
      dataType: "json",
      success:function(data){
        $("#kode").val(data.kode_genre);
        $("#nama").val(data.nama_genre);
        $("#kodeLama").val(data.kode_genre);
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
          <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()" method="post" action="<?php echo base_url() ?>index.php/genre/update">
            <fieldset>
              <div class="form-group">
                <label class="control-label">Kode Genre</label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="kode" id="kode">
              </div>

              <div class="form-group">
                <label class="control-label">Nama Genre</label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="nama" id="nama">
              </div>
              <input type="hidden" id="kodeLama" name="kodeLama">
            </fieldset>
         
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <input type="submit" name="submit" value="Update Data" class="btn btn-primary">
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
          <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()" method="post" action="<?php echo base_url() ?>index.php/genre/add">
            <fieldset>
              <div class="form-group">
                <label class="control-label">Kode Genre</label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="kode">
              </div>

              <div class="form-group">
                <label class="control-label">Nama Genre</label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="nama">
              </div>
            </fieldset>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="submit" value="Tambah">
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
</div>
</div>

<!-- 
<script type="text/javascript">
  $(document).ready(function(){
    $('#table').DataTable();
  });
</script> -->