
<?php extract($data);?>
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-light">
  <div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
      <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">All Trasactions</span></h4>
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
      <div class="breadcrumb">
        <a href="#" class="breadcrumb-item">Dashboard</a>
        <a href="#" class="breadcrumb-item">Transactions</a>
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
            <th>AWB #</th>
            <th>SHIPPER</th>
            <th>CONSIGNEE</th>
            <th>RECEIVED BY</th>
            <th>ORIGIN</th>
            <th>DESTINATION</th>
            <th style="width:1px" class="text-center">STATUS</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($transactions as $key => $value) { ?>
          <tr>
            <td><?=$i++?></td>
            <td><?=$value[0]['awbNumber']?></td>
            <td><?=$value[0]['ShipperName']?></td>
            <td><?=$value[0]['ConsigneeName']?></td>
            <td><?=$value[0]['Recieved_By']?></td>
            <td><?=$value[0]['Origin']?></td>
            <td><?=$value[0]['Destination']?></td>
            <td><?=$value[0]['Transaction_Status']?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      
    </div>
  </div>
  <!-- /sidebars overview -->


  
</div>
<!-- /content area -->


