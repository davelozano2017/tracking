<?php extract($data);?>

<div class="content-wrapper">

  <!-- Page header -->
  <div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
      <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Dashboard</span></h4>
      </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
      <div class="d-flex">
        <div class="breadcrumb">
          <a href="index.html" class="breadcrumb-item">Dashboard</a>
        </div>

      </div>

    </div>
  </div>
  <!-- /page header -->


  <!-- Content area -->
  <div class="content">

    <!-- Sidebars overview -->
    <?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
    <div class="row">
    <div class="col-sm-3"></div>

      <div class="col-sm-3 col-xl-3">
        <div class="card card-body">
          <div class="media">
            <div class="mr-3 align-self-center">
              <i class="icon-folder icon-3x text-success-400"></i>
            </div>

            <div class="media-body text-right">
              <h3 class="font-weight-semibold mb-0"><?=@number_format($countPackages)?></h3>
              <span class="text-uppercase font-size-sm text-muted">Packages</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-3 col-xl-3">
        <div class="card card-body">
          <div class="media">
            <div class="mr-3 align-self-center">
              <i class="icon-ship icon-3x text-success-400"></i>
            </div>

            <div class="media-body text-right">
              <h3 class="font-weight-semibold mb-0"><?=number_format($countDelivered)?></h3>
              <span class="text-uppercase font-size-sm text-muted">Delivered</span>
            </div>
          </div>
        </div>
        </div>
        </div>

    <div class="col-sm-3"></div>


    <div class="row">
      <?php if(!isset($transactions)) { ?> 
      <div class="col-md-12">
        <div class="alert alert-info">No record found.</div>
      </div>
      <?php } else { ?>
        <?php foreach($transactions as $key => $value) { ?>
          <div class="col-lg-4">
            <div class="card card-body">
              <div class="media">
                <div class="mr-3">
                  <a href="#"><i class="icon-truck text-success-400 icon-2x mt-1"></i></a>
                </div>

                <div class="media-body">
                  <h6 class="media-title font-weight-semibold">AWB #: <strong style="color:red"><?=$value[0]['awbNumber']?></strong></h6>
                  <h6 class="media-title font-weight-semibold">SHIPPER: <strong style="color:red"><?=$value[0]['ShipperName']?></strong></h6>
                  <h6 class="media-title font-weight-semibold">CONSIGNEE: <strong style="color:red"><?=$value[0]['ConsigneeName']?></strong></h6>
                  <h6 class="media-title font-weight-semibold">ORIGIN: <strong style="color:red"><?=$value[0]['Origin']?></strong></h6>
                  <h6 class="media-title font-weight-semibold">DESTINATION: <strong style="color:red"><?=$value[0]['Destination']?></strong></h6>
                  <h6 class="media-title font-weight-semibold">STATUS: <strong style="color:red"><?=$value[0]['transaction_status'] ? $value[0]['transaction_status'] : 'Pending'?></strong></h6>
                  <a  data-toggle="dropdown">
                    <h6 class="media-title font-weight-semibold dropdown-toggle">ACTION
                      <div class="dropdown-menu ">
                        <a href="<?=site_url('transactions/updateTransactionStatusByAWBNumber/'.encode($value[0]['awbNumber']))?>" class="dropdown-item">Delivered</a>
                      </div>
                    </h6>
                  </a> 
                </div>
              </div>
            </div>
        <?php } ?>
        </div>
      <?php } ?>


</div>
</div>
  <!-- /content area -->


