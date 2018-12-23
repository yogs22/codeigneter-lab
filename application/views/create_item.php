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
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Input Barang</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" action="<?= base_url('admin/store_item') ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama barang" required>
              </div>
              <div class="form-group">
                <label for="category">Kategori</label>
                <select class="form-control" id="category" name="category" required>
                  <?php foreach($categories as $category) { ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga barang">
              </div>
              <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
              </div>
              <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" name="image" id="image" required>
              </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </section>
</div>
