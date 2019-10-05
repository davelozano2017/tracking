<?php extract($data);?>
<?php foreach($transactions as $key => $value) {} ?>
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-light">
  <div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
      <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"><?=$value[0]['ConsigneeName']?></span></h4>
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
      <div class="breadcrumb">
        <a href="#" class="breadcrumb-item">Dashboard</a>
        <a href="#" class="breadcrumb-item">Transactions</a>
        <a href="#" class="breadcrumb-item">View</a>
        <a href="#" class="breadcrumb-item active"><?=$value[0]['ConsigneeName']?></a>
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
      <form action="<?=site_url('Transactions/UpdateTransactions')?>" method="POST" data-parsley-validate>
        <input type="hidden" class="form-control" name="transactions_id" value="<?=encode($value[0]['transactions_id'])?>" required>
        <div class="form-group row">
          <label class="col-form-label col-lg-2">AWB #:</label>
          <div class="col-lg-10">
          <input type="number" class="form-control" name="awb_number" value="<?=$value[0]['awbNumber']?>" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-lg-2">Shipper:</label>
          <div class="col-lg-10">
            <select name="shipper_id" class="form-control">
                  <option value="<?=encode($value[0]['ShipperId'])?>"><?=$value[0]['ShipperName']?></option>
              <?php foreach($couriers as $courier) { ?>
                  <option value="<?=encode($courier['accounts_id'])?>"><?=$courier['name']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-lg-2">Consignee:</label>
          <div class="col-lg-10">
            <select name="consignee_id" class="form-control">
              <option value="<?=encode($value[0]['ConsigneeId'])?>"><?=$value[0]['ConsigneeName']?></option>
              <?php foreach($customers as $customer) { ?>
                <option value="<?=encode($customer['accounts_id'])?>"><?=$customer['name']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-lg-2">Origin:</label>
          <div class="col-lg-10">
            <select name="origin_id" class="form-control">
                  <option value="<?=encode($value[0]['OriginId'])?>"><?=$value[0]['Origin']?></option>
              <?php foreach($provinces as $city) { ?>
                <option value="<?=encode($city['province_id'])?>"><?=$city['provDesc']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-lg-2">Destination:</label>
          <div class="col-lg-10">
            <select name="destination_id" class="form-control">
                  <option value="<?=encode($value[0]['DestinationId'])?>"><?=$value[0]['Destination']?></option>
                <?php foreach($provinces as $city) { ?>
                    <option value="<?=encode($city['province_id'])?>"><?=$city['provDesc']?></option>
                <?php } ?>
              </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-lg-2">Address: (Optional)</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" value="<?=$value[0]['Address']?>" name="address">
          </div>
        </div>
        
        <div class="form-group row">
          <label class="col-form-label col-lg-2">Quantity:</label>
          <div class="col-lg-10">
            <input type="number" class="form-control" name="quantity" value="<?=$value[0]['Quantity']?>"  required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-lg-2">Actual Weight:</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="description" value="<?=$value[0]['Description']?>"  required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-lg-2">CWT:</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="cwt" value="<?=$value[0]['Cwt']?>"  required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-lg-2">Pay Mode:</label>
          <div class="col-lg-10">
            <select name="pay_mode_id" class="form-control">
            <option value="<?=encode($value[0]['PayModeId'])?>"><?=$value[0]['PayModeName']?></option>
              <?php foreach($pay_modes as $pay_mode) { ?>
                <option value="<?=encode($pay_mode['pay_mode_id'])?>"><?=$pay_mode['pay_mode_name']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-lg-2">Service Mode:</label>
          <div class="col-lg-10">
            <select name="service_mode_id" class="form-control">
                  <option value="<?=encode($value[0]['ServiceModeId'])?>"><?=$value[0]['ServiceModeName']?></option>
              <?php foreach($service_modes as $service_mode) { ?>
                  <option value="<?=encode($service_mode['service_mode_id'])?>"><?=$service_mode['service_mode_name']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-form-label col-lg-2">Amount:</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="amount" value="<?=$value[0]['Amount']?>" required>
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


