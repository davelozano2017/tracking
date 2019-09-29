
<?php extract($data);?>
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-light">
  <div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
      <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">All Drivers</span></h4>
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
      <div class="breadcrumb">
        <a href="#" class="breadcrumb-item">Dashboard</a>
        <a href="#" class="breadcrumb-item">Drivers</a>
        <a href="#" class="breadcrumb-item active">All</a>
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
            <th>Status</th>
            <th>Date of Registration</th>
            <th style="width:1px"  class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php for($i=1;$i<=5;$i++) { ?>
          <tr>
            <td><?=$i?></td>
            <td>John Doe <?=$i?></td>
            <td>JohnDoe<?=$i?>@gmail.com</td>
            <td><span class="badge badge-success">Not Active</span></td>
            <td><?=date('F d, Y')?></td>
            <td class="text-center">
              <div class="list-icons">
                <div class="dropdown">
                  <a href="#" class="list-icons-item" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?=site_url('courier/drivers/view/'.encode($i))?>" class="dropdown-item"><i class="icon-eye"></i> View</a>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- /sidebars overview -->


  
</div>
<!-- /content area -->


