
<?php extract($data);?>
<body>

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-green navbar-static">
  <div class="navbar-brand">
    <a href="<?=site_url('admin/dashboard')?>" class="d-inline-block">
      <img style="" class="img-responsive" src="<?=base_url()?>assets/images/logo_light.png" alt="">
    </a>
  </div>

  <div class="d-md-none">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
      <i class="icon-tree5"></i>
    </button>
    <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
      <i class="icon-paragraph-justify3"></i>
    </button>
  </div>

  <div class="collapse navbar-collapse" id="navbar-mobile">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block" ddata-placement="bottom" data-container="body" data-trigger="hover">
          <i class="icon-paragraph-justify3"></i>
        </a>
      </li>
    </ul>

    <ul class="navbar-nav ml-md-auto">
      <li class="nav-item dropdown">
        <a href="#" class="navbar-nav-link">
          Hello <?=$user[0]['name']?>
        </a>
      </li>

    </ul>
  </div>
</div>
<!-- /main navbar -->
