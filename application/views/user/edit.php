    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User (<?= $user->email; ?>)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Manage Users</li>
              <li class="breadcrumb-item active">Edit User</li>
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
                    <a href="<?= site_url('user'); ?>" class="btn btn-sm btn-primary">Back</a>
                  </div>                  
                </div>
                <div class="card-body">
                    <form id="f-edit-user" action="<?= site_url('user/') . $user->id . '/save'; ?>" method="post">
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-3 col-form-label text-right">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control w-50" id="firstname" name="firstname" placeholder="First Name" value="<?= $user->firstname; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-sm-3 col-form-label text-right">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control w-50" id="lastname" name="lastname" placeholder="Last Name" value="<?= $user->lastname; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label text-right">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control w-50" id="email" name="email" placeholder="Email" value="<?= $user->email; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label text-right">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control w-50" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Role" class="col-sm-3 col-form-label text-right">Role</label>
                            <div class="col-sm-9">
                                <select name="role" id="role" class="form-control w-50">
                                    <?php foreach ($roles as $role) { ?>
                                    <option 
                                        value="<?= $role->id; ?>"
                                        <?= $role->id == $user->role_id ? 'selected' : ''; ?>
                                    ><?= ucwords($role->name); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success" form="f-edit-user">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
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

