<?php if ($this->session->flashdata('pesan')) { ?>
<div class="alert alert-info" role="alert">
<?php echo $this->session->flashdata('pesan'); ?>
</div>
<?php } ?>

<div class="xs">
 <h3 style="text-align: center;font-weight: 600;font-size: 36px">Data Kasir</h3>
 <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#tambah">Tambah Data</button>

<div class="panel-body1">
 <table class="table">
   <thead>
    <tr>
      <th>Kode Kasir</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Password</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($kasir as $kasir): ?>
    
  
    <tr>
      <th scope="row"><?php echo $kasir->kode_user ?></th>
      <td><?php echo $kasir->nama_user ?></td>
      <td><?php echo $kasir->username ?></td>
      <td><?php echo $kasir->password ?></td>
      <td>
          <a class="btn btn-sm btn-default" onclick="edit('<?php echo $kasir->kode_user ?>')" data-toggle="modal" data-target="#edit">Update</a>
          <a href="<?php echo base_url('index.php/kasir/delete/'.$kasir->kode_user) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Data Kasir akan dihapus')">Delete</a>
        </td>
    </tr>

    <?php endforeach ?>
  </tbody>
</table>
</div>

<script type="text/javascript">
  function edit(a) {
    $.ajax({
      type: "post",
      url: "<?= base_url() ?>index.php/kasir/detail/"+a,
      dataType: "json",
      success:function(data){
        $("#nama").val(data.nama_user);
        $("#username").val(data.username);
        $("#password").val(data.password);
        $("#kode_user").val(data.kode_user);
      }
    });
  }
</script>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h2 class="modal-title">Update Kasir</h2>
      </div>
      <div class="modal-body">

        <div class="well1 white">
          <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()" method="post" action="<?php echo base_url() ?>index.php/kasir/update">
            <fieldset>
              <div class="form-group">
                <label class="control-label">Nama Kasir</label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="nama" id="nama">
              </div>

              <div class="form-group">
                <label class="control-label">Username</label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="username" id="username">
              </div>

              <div class="form-group">
                <label class="control-label">Password</label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="password" id="password">
              </div>
              <input type="hidden" name="kode_user" id="kode_user">
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
        <h2 class="modal-title">Update Kasir</h2>
      </div>
      <div class="modal-body">

        <div class="well1 white">
          <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()" method="post" action="<?php echo base_url() ?>index.php/kasir/add">
            <fieldset>
              <div class="form-group">
                <label class="control-label">Nama Kasir</label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="nama" id="nama">
              </div>

              <div class="form-group">
                <label class="control-label">Username</label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="username" id="username">
              </div>

              <div class="form-group">
                <label class="control-label">Password</label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required name="password" id="password">
              </div>
            </fieldset>
         
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <input type="submit" name="submit" value="Tambah Kasir" class="btn btn-primary">
      </div>
       </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>