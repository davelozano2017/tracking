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
    <div class="row">
      <div class="col-sm-6 col-xl-4">
        <div class="card card-body">
          <div class="media">
            <div class="mr-3 align-self-center">
              <i class="icon-folder icon-3x text-success-400"></i>
            </div>

            <div class="media-body text-right">
              <h3 class="font-weight-semibold mb-0">652,549</h3>
              <span class="text-uppercase font-size-sm text-muted">All Transactions</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-4">
        <div class="card card-body">
          <div class="media">
            <div class="mr-3 align-self-center">
              <i class="icon-ship icon-3x text-success-400"></i>
            </div>

            <div class="media-body text-right">
              <h3 class="font-weight-semibold mb-0">652,549</h3>
              <span class="text-uppercase font-size-sm text-muted">Courier</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-4">
        <div class="card card-body">
          <div class="media">
            <div class="mr-3 align-self-center">
              <i class="icon-users4 icon-3x text-success-400"></i>
            </div>

            <div class="media-body text-right">
              <h3 class="font-weight-semibold mb-0">652,549</h3>
              <span class="text-uppercase font-size-sm text-muted">Customers</span>
            </div>
          </div>
        </div>
      </div>
    </div>
      
    <div class="card">
      <div class="card-header header-elements-inline">
        <h5 class="card-title">Top 10 Latest Transactions</h5>
      </div>
      <div class="card-body">
        <table class="table datatable-responsive">
          <thead>
            <tr>
              <th style="width:1px">#</th>
              <th>AWB #</th>
              <th>SHIPPER</th>
              <th>CONSIGNEE</th>
              <th>ORIGIN</th>
              <th>DESTINATION</th>
              <th style="width:1px" class="text-center">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            <?php for($i=1;$i <= 10; $i++) { ?>
            <tr>
              <td><?=$i?></td>
              <td>10010029<?=$i?></td>
              <td>Shipper<?=$i?></td>
              <td>Consignee<?=$i?></td>
              <td>Origin<?=$i?></td>
              <td>Destination<?=$i?></td>
              <td class="text-center">
                <div class="list-icons">
                  <div class="dropdown">
                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                      <i class="icon-menu9"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                      <a href="#" class="dropdown-item"><i class="icon-eye"></i> View</a>
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


