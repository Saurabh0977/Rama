<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo PROJECT_NAME; ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ; ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ; ?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ; ?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ; ?>assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ; ?>assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url() ; ?>assets/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url() ; ?>assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url() ; ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url() ; ?>assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="<?php echo base_url() ; ?>assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="<?php echo base_url() ; ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url() ; ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="<?php echo base_url() ; ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="<?php echo base_url() ; ?>assets/js/plugins/pickers/daterangepicker.js"></script>

	<script src="<?php echo base_url() ; ?>assets/js/app.js"></script>
	<script src="<?php echo base_url() ; ?>assets/js/demo_pages/dashboard.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<?php echo $header; ?>

	<!-- Page content -->
	<div class="page-content">

		<?php  echo $sidebar;  ?>

		<!-- Main content -->
		<div class="content-wrapper">

		<?php echo $content; ?>

		<?php echo $footer; ?>

</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


</body>

</html>