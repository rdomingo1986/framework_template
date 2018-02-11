<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" ng-app="example-app">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard</title>
	<link rel="stylesheet" href="<?= base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">
</head>
<body>

	<div ng-view></div>

	<script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>
	<script src="<?= base_url();?>assets/plugins/blockui/jquery.blockUI.js"></script>
	<script src="<?= base_url();?>assets/plugins/toast/js/jquery.toast.min.js"></script>
	<script src="<?= base_url();?>assets/plugins/angularjs/angular.min.js"></script>
	<script src="<?= base_url();?>assets/plugins/angularjs/angular-route.min.js"></script>
	<script src="<?= base_url();?>assets/plugins/angularjs/angular-messages.min.js"></script>
	<script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<script src="<?= base_url();?>assets/app/js/app.js"></script>
	<script src="<?= base_url();?>assets/app/js/services/HTTPHandlerService.js"></script>
	<script src="<?= base_url();?>assets/app/js/services/NotificationService.js"></script>

	<input type="hidden" value="<?= base_url();?>" id="base_url">
</body>
</html>