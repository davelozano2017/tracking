<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=website_name?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets//css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/components.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/colors.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/parsley/parsley.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/main.css">


	<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
				<form class="login100-form validate-form" method="POST" data-parsley-validate action="<?=site_url('Accounts/auth')?>">
				<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  

					<div class="py-5"> <img style="width:100%" class="img-responsive" src="<?=base_url()?>assets/images/logo_light.png" alt=""></div>
					<input type="hidden" name="token" value="<?=$token?>">

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
					
				</form>

				<div class="login100-more" style="background-image: url('<?=base_url()?>assets/images/background-login.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	<script src="<?=base_url()?>assets/js/main/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?=base_url()?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?=base_url()?>assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->
	
	<!-- Theme JS files -->
	<script src="<?=base_url()?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	
	<script src="<?=base_url()?>assets/js/app.js"></script>
	<script src="<?=base_url()?>assets/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->
	<script src="<?=base_url()?>assets/parsley/parsley.min.js"></script>
</body>
</html>