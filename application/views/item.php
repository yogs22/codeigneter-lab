<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Item</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?= base_url('item') ?>">Item</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="alert" style="display: none"></div>
      <?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="<?= base_url('admin/create_item') ?>" class="btn btn-primary right">Tambah Barang</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <!-- /.content -->
</div>

<script type="text/javascript">
	var save_method;
	var table;
	$(document).ready(function() {
		table = $('#table').DataTable({
			"processing" : true,
			"serverSide" : true,
			"bSort" : false,
			"order" : [],
			"ajax" : {
				"url" : "<?= base_url('admin/item_json') ?>",
				"type" : "POST"
			}
		});

    function delete_by(id){
        if(confirm('Yakin Akan Menghapus Data ?')){
            $.ajax({
                url : "<?= base_url('admin/delete_item')?>/"+id,
                type: "POST",
                success: function(data){
                    if (data == "ok") {
                      var msg ="Sukses Menghapus Data!!";
                      setTimeout(function(){
                          $('.alert').removeClass('alert-danger').addClass('alert-success').fadeIn().html(msg).delay(4000).fadeOut();
                      }, 1700);
                    }else{
                      var msg ="Gagal Menghapus Data!!";
                      setTimeout(function(){
                          $('.alert').removeClass('alert-success').addClass('alert-danger').fadeIn().html(msg).delay(4000).fadeOut();
                        }, 1700);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown){
                    alert('Data Gagal Diproses !! Ada Kesalahan Sistem');
                }
            });
        }
    }
	});
</script>
