<?php extract($data);?>

<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-light">
  <div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
      <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"><?=$getUsers[0]['name']?></span></h4>
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
      <div class="breadcrumb">
        <a href="#" class="breadcrumb-item">Dashboard</a>
        <a href="#" class="breadcrumb-item">Users</a>
        <a href="#" class="breadcrumb-item">View</a>
        <a href="#" class="breadcrumb-item active"><?=$getUsers[0]['name']?></a>
      </div>

    </div>

  </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

  <?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
  <!-- Sidebars overview -->
  <div class="card">
    <div class="card-body">
      <form action="<?=site_url('Accounts/UpdateUserById')?>" method="POST" data-parsley-validate>
      <input type="hidden" name="accounts_id" value="<?=encode($getUsers[0]['accounts_id'])?>">
      <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
          <div class="form-group row">
            <label class="col-form-label col-lg-2">Name:</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="name" value="<?=$getUsers[0]['name']?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-lg-2">Email Address:</label>
            <div class="col-lg-10">
              <input type="email" class="form-control" name="email" value="<?=$getUsers[0]['email']?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-lg-2">Province:</label>
            <div class="col-lg-10">
              <select name="province_id" class="form-control">
                    <option value="<?=encode($getUsers[0]['province_id'])?>" selected><?=$getUsers[0]['provDesc']?></option>
                <?php foreach($provinces as $city) { ?>
                    <option value="<?=encode($city['province_id'])?>"><?=$city['provDesc']?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-lg-2">Address:</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="address" value="<?=$getUsers[0]['address']?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-lg-2">Role:</label>
            <div class="col-lg-10">
              <select name="role" class="form-control">
                <option value="<?=$getUsers[0]['role']?>" selected><?=$getUsers[0]['role']?></option>
                <option value="Admin">Admin</option>
                <option value="Courier">Courier</option>
                <option value="Customer">Customer</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-form-label col-lg-2">Status:</label>
            <div class="col-lg-10">
              <select name="status" class="form-control">
                <option value="<?=$getUsers[0]['status']?>" selected><?=$getUsers[0]['status'] == 1 ? 'Not Active' : 'Active'?></option>
                <option value="0">Active</option>
                <option value="1">Not Active</option>
              </select>
            </div>
          </div>

          <div class="col-lg-10 ml-lg-auto text-right">
          <button type="submit" class="btn btn-primary ml-3">Save Changes <i class="icon-paperplane ml-2"></i></button>
          </div>
        </div>
      </form>
  </div>
  <!-- /sidebars overview -->


  
</div>
<!-- /content area -->


