  <!-- Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-user"> </i> Dashboard Profile
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2"><b>Nama Depan</b></div><div class="col-md-10"><?= $userData->first_name; ?></div>            
            <div class="col-md-2"><b>Nama Belakang</b></div><div class="col-md-10"><?= $userData->last_name; ?></div>
            <div class="col-md-2"><b>Username</b></div><div class="col-md-10"><?= $userData->username; ?></div>
            <div class="col-md-2"><b>Email Address</b></div><div class="col-md-10"><?= $userData->email; ?></div>
            <div class="col-md-4 mt-4">
              <a href="<?=site_url("user/change_details")?>" class="btn btn-success">Edit Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
