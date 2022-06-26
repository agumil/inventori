    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Measurement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Measurement</li>
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

                    <a href="<?= site_url('measurement/add'); ?>" class="btn btn-sm btn-primary">Add New Measurement</a>
                  </div>
                  
                </div>
                <div class="card-body">
                  <table id="generalTable" class="table table-bordered table-hover">
                      <thead>
                          <th>#</th>
                          <th>Name</th>
                          <th>Unit</th>
                          <th>Action</th>
                      </thead>
                      <tbody>
                          <?php $no = 1; ?>
                          <?php foreach ($measurements as $measurement) { ?>
                          <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $measurement->name; ?></td>
                              <td><?= $measurement->unit; ?></td>
                              <td class="text-right">
                                  <a href="<?= site_url('measurement/') . $measurement->id; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>&nbsp; Edit</a>
                                  <a href="javascript:;" class="btn btn-sm btn-danger" onclick="deleteItem('<?= site_url('measurement/') . $measurement->id . '/delete'; ?>')"><i class="fas fa-trash"></i>&nbsp; Delete</a>
                              </td>
                          </tr>
                          <?php } ?>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

