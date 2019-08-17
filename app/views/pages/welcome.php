
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Winter Framework</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" type="text/css">
	<style type="text/css">body {padding:20px 10px 10px 10px; }.widget { padding: 18px; background-color: #fff; box-shadow: 0 1px 6px rgba(0, 0, 0, 0.12), 0 1px 4px rgba(0, 0, 0, 0.24); }.widget > input {  display: block; width: 100%; min-height: 30px; margin-bottom: 20px; border: 0 none; border-bottom: 1px solid #ccc; outline: none;}.folder-container { margin: 12px; padding: 0 15px; margin:0 }.folder-wrapper {margin: 0;padding: 0;list-style-type: none;}.file-item,.folder-item { margin-left: -16px; padding-left: 20px; list-style-type: none;}.file-item {background: transparent  url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAsUlEQVQ4T2NkgIKE2q4DMDZW+j+jAgPj//0LmssSkeUZEQZ0/1/QXArnoxuSUNPdwMDIEMDwn2HDgpbSBpg8aQYw/H/PwMCQwMDIMHFBc9kCkCGkGODAwMAAwiBd9TDXYhiQUNtdwPCfgR97ePy7uKClfENCLcK7RLsA2UC8BoADi4HhP44YObigpfTAsHfBgMcC3vwAzze0TAcUuKDrAMN/RlwJCNVcRoaPC5pLA0CCALOMnRHTr6OKAAAAAElFTkSuQmCC') no-repeat left center;}.folder-item {font-weight: bold;background: transparent  url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAA6UlEQVQ4T62TvQ3CMBCF31OgDxPACGwATAAjeAOgSKpECgoCiRTABmYDNgA2yAawAUpNwiGHH0GBlATcuPH3vbPvTPy4+COPXKCCpY30sgORPIU6dLtF5FTeYgWgA2KtQ1fnQj8amQ2C81fJVcZ65sZUfhTr0GmrYN5iZjWLpIqwC0oLVjah8hd7WPUBsvQIwC4ieD9zFwgDELuyMCCHuwDcAliWFgg2jwoQgxxWEDzeICfZqSDoPa9QHjZpVq1B5UUnEIXa91GhSKKnrm3mQEqXngNyMNNqBKYD/QqSsQ6d1X8+U4X0F3IDjRRPOikDqHUAAAAASUVORK5CYII=') no-repeat left center;}.flat { border-radius:0px !important }</style>
</head>
<body>

	<div class="container">
		<div class="card">
			<h5 class="card-header flat text-center text-uppercase text-white bg-dark">Welcome to Winter Framework</h5>
			<div class="card-body ">
				<div class="row">

					<div class="col-md-6">
						<p>If you would like to edit this page you'll find it located at:</p>
						<div id="views"></div>
					</div>

					<div class="col-md-6">
						<p>The corresponding controller for this page is found at:</p>
						<div id="controllers"></div>
					</div>

				</div>
			</div>
		</div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/main.js"></script>
</body>
</html>