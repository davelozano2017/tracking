
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
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php for($i=1;$i < 5; $i++) { ?>
          <tr>
            <td><?=$i?></td>
            <td>John Doe <?=$i?></td>
            <td>johndoe<?=$i?>@example.com</td>
            <td><span class="badge badge-success">Customer</span></td>
            <td><span class="badge badge-success">Active</span></td>
            <td class="text-center">
              <div class="list-icons">
                <div class="dropdown">
                  <a href="#" class="list-icons-item" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right">
                  <a href="#" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                  <a href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
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


