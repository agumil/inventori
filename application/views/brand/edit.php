    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Brand (<?= $brand->name; ?>)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Manage Brand</li>
              <li class="breadcrumb-item active">Edit Brand</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <?php $this->load->view('_layouts/alert'); ?>
        <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center justify-content-between">
                    <h3 class="card-title">DataTable with minimal features & hover style</h3>
                    <a href="<?= site_url('brand'); ?>" class="btn btn-sm btn-primary">Back</a>
                  </div>                  
                </div>
                <div class="card-body">
                    <form id="f-edit-brand" action="<?= site_url('brand/') . $brand->id . '/save'; ?>" method="post">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label text-right">Brand Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control w-50" id="name" name="name" placeholder="Name" value="<?= $brand->name; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-sm-3 col-form-label text-right">Brand Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control w-50" id="code" name="code" placeholder="Code" value="<?= $brand->code; ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success" form="f-edit-brand">Save</button>
                            <button type="reset" class="btn btn-secondary" form="f-edit-brand">Reset</button>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

