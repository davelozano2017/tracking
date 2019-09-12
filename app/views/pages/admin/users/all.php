
<?php extract($data);?>
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-light">
  <div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
      <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">All Users</span></h4>
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
      <div class="breadcrumb">
        <a href="#" class="breadcrumb-item">Dashboard</a>
        <a href="#" class="breadcrumb-item">Users</a>
        <a href="#" class="breadcrumb-item active">All Users</a>
      </div>

    </div>

  </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

  <!-- Sidebars overview -->
  <div class="card">
    <div class="card-body">

    <table class="table datatable-responsive">
        <thead>
          <tr>
            <th style="width:1px">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th style="width:1px"  class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; foreach($users as $user) { ?>
          <tr>
            <td><?=$i?></td>
            <td><?=$user['name']?></td>
            <td><?=$user['email']?></td>
            <td><?=$user['role'] == 'Customer' ? '<span class="badge badge-success">Customer</span>' : '<span class="badge badge-info">Courier</span>';?></td>
            <td><span class="badge badge-success"><?=$user['status'] == '0' ? 'Active' : 'Not Active';?></span></td>
            <td class="text-center">
              <div class="list-icons">
                <div class="dropdown">
                  <a href="#" class="list-icons-item" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?=site_url('Admin/users/view/'.encode($user['accounts_id']))?>" class="dropdown-item"><i class="icon-eye"></i> View</a>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      
    </div>
  </div>
  <!-- /sidebars overview -->


  
</div>
<!-- /content area -->


