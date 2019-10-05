
<?php extract($data);
foreach($transactions as $key => $value) {
} ?>
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-light">
  <div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
      <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">AirWayBill # <?=$value[0]['awbNumber']?></span></h4>
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
      <div class="breadcrumb">
        <a href="#" class="breadcrumb-item">Dashboard</a>
        <a href="#" class="breadcrumb-item">Transactions</a>
        <a href="#" class="breadcrumb-item">All</a>
        <a href="#" class="breadcrumb-item active"><?=$value[0]['awbNumber']?></a>
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
            <th>SHIPPER</th>
            <th>CONSIGNEE</th>
            <th>ORIGIN</th>
            <th>DESTINATION</th>
            <th style="width:1px" class="text-center">ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($transactions as $key => $value) { ?>
          <tr>
            <td><?=$i++?></td>
            <td><?=$value[0]['ShipperName']?></td>
            <td><?=$value[0]['ConsigneeName']?></td>
            <td><?=$value[0]['Origin']?></td>
            <td><?=$value[0]['Destination']?></td>
            <td class="text-center">
              <div class="list-icons">
                <div class="dropdown">
                  <a href="#" class="list-icons-item" data-toggle="dropdown">
                    <i class="icon-menu9"></i>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?=site_url('courier/transactions/view/'.encode($value[0]['transactions_id']))?>" class="dropdown-item"><i class="icon-eye"></i> View</a>
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


