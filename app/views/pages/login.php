<?php extract($data);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets//css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/parsley/parsley.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	

</head>

<body>

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
				<form class="login-form" method="POST" data-parsley-validate action="<?=site_url('Accounts/auth')?>">
				<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  

				<input type="hidden" name="token" value="<?=$token?>">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Login to your account</h5>
								<span class="d-block text-muted">Your credentials</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="email" class="form-control" name="email" placeholder="Email Address" required>
								<div class="form-control-feedback">
									<i class="icon-envelope text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>

						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
<!-- Core JS files -->
<script src="<?=base_url()?>assets//js/main/jquery.min.js"></script>
<script src="<?=base_url()?>assets//js/main/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>assets//js/plugins/loaders/blockui.min.js"></script>
<script src="<?=base_url()?>assets//js/plugins/ui/ripple.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="<?=base_url()?>assets//js/plugins/forms/styling/uniform.min.js"></script>

<script src="<?=base_url()?>assets/js/app.js"></script>
<script src="<?=base_url()?>assets//js/demo_pages/login.js"></script>
<!-- /theme JS files -->
<script src="<?=base_url()?>assets/parsley/parsley.min.js"></script>
</body>
</html>
