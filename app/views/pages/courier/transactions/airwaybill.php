
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
<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  

  <!-- Sidebars overview -->
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <form action="<?=site_url('Transactions/CreateAssignToDriver')?>" method="POST" data-parsley-validate>
            <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
            <input type="hidden" name="awb_number" value="<?=encode($value[0]['awbNumber'])?>">
              <div class="form-group">
                  <label class="col-form-label">Assign To:</label>
                  <div class="">
                    <select name="accounts_id" class="form-cotrol">
                      <?php foreach($AllDrivers as $keys => $driver) { ?> 
                        <option value="<?=encode($driver[0]['accounts_id'])?>"><?=$driver[0]['name']?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-form-label">Estimated Delivery Date:</label>
                  <div class="">
                    <input type="date" min="<?=date('Y-m-d')?>" class="form-control" name="delivery_date" required>
                  </div>
                </div>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary ml-3">Submit <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
      </div>
    </div>
    <div class="col-md-9">
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
    </div>
  </div>
  <!-- /sidebars overview -->


  
</div>
<!-- /content area -->


