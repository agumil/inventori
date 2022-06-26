    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Outgoinggood Good (<?= $outgoinggood->name; ?>)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Manage Outgoinggood Good</li>
              <li class="breadcrumb-item active">Edit Outgoinggood Good</li>
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
                    <a href="<?= site_url('outgoinggood'); ?>" class="btn btn-sm btn-primary">Back</a>
                  </div>                  
                </div>
                <div class="card-body">
                    <form id="f-edit-outgoinggood" action="<?= site_url('outgoinggood/') . $outgoinggood->id . '/save'; ?>" method="post">
                    <div class="form-group row">
                            <label for="brand" class="col-sm-3 col-form-label text-right">Brand</label>
                            <div class="col-sm-9">
                                <select name="brand" id="brand" class="form-control w-50">
                                    <?php foreach ($brands as $brand) { ?>
                                    <option 
                                        value="<?= $brand->id; ?>"
                                        <?= $brand->id == $outgoinggood->brand_id ? 'selected' : ''; ?>
                                    ><?= ucwords($brand->name); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="color" class="col-sm-3 col-form-label text-right">Color</label>
                            <div class="col-sm-9">
                                <select name="color" id="color" class="form-control w-50">
                                    <?php foreach ($colors as $color) { ?>
                                    <option 
                                        value="<?= $color->id; ?>"
                                        <?= $color->id == $outgoinggood->color_id ? 'selected' : ''; ?>
                                    ><?= ucwords($color->name); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="measurement" class="col-sm-3 col-form-label text-right">Measurement</label>
                            <div class="col-sm-9">
                                <select name="measurement" id="measurement" class="form-control w-50">
                                    <?php foreach ($measurements as $measurement) { ?>
                                    <option 
                                        value="<?= $measurement->id; ?>"
                                        <?= $measurement->id == $outgoinggood->measurement_id ? 'selected' : ''; ?>
                                    ><?= ucwords($measurement->name) . ' ' . "({$measurement->unit})"; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label text-right">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control w-50" id="name" name="name" placeholder="Product Name" value="<?= $outgoinggood->name; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label text-right">Outgoing Date</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control w-50" id="date" name="date" placeholder="Date" value="<?= $outgoinggood->date; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="qty" class="col-sm-3 col-form-label text-right">Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control w-25" id="qty" name="qty" placeholder="Qty" value="<?= $outgoinggood->quantity; ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success" form="f-edit-outgoinggood">Save</button>
                            <button type="reset" class="btn btn-secondary" form="f-edit-outgoinggood">Reset</button>
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

