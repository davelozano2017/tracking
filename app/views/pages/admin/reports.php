<?php extract($data);?>

<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-light">
  <div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
      <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Reports</span></h4>
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
      <div class="breadcrumb">
      <a href="#" class="breadcrumb-item">Dashboard</a>
      <a href="#" class="breadcrumb-item active">Reports</a>
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
            <th>DATE</th>
            <th>AWB#</th>
            <th>SHIPPER</th>
            <th>COSIGNEE</th>
            <th>ORIGIN</th>
            <th>DEST.</th>
            <th>QTY.</th>
            <th>ACTUAL WEIGHT</th>
            <th>CWT</th>
            <th>PAY MODE</th>
            <th>SERVICE MODE</th>
            <th>AMOUNT</th>
            <th>RECEIVED BY</th>
          </tr>
        </thead>
        <tbody>
          <?php for($i=1;$i < 5; $i++) { ?>
          <tr>
            <td><?=date('m/d/y')?> </td>
            <td>1002110<?=$i?> </td>
            <td>LBC </td>
            <td>John Doe </td>
            <td>MNL </td>
            <td>CGY </td>
            <td>1 </td>
            <td>120 </td>
            <td>1767 </td>
            <td>PAYMENT MODE <?=$i?></td>
            <td>SERVICE MODE <?=$i?></td>
            <td>₱9,100.00 </td>
            <td>John Doe </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- /sidebars overview -->


  
</div>
<!-- /content area -->


