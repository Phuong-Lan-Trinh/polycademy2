<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" ng-app="myApp"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?= $title ?> - <?= $desc ?></title>
		<meta name="description" content="<?= $meta_desc ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="google-site-verification" content="<?= $google_site_verification ?>" />
		<link rel="shortcut icon" href="<?php echo base_url() ?>favicon.ico">
		<link rel="apple-touch-icon" href="<?php echo base_url() ?>apple-touch-icon.png">
		<link rel="stylesheet" href="<?= base_url() ?>css/main.css">
		<script src="<?= base_url() ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body>
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
		<header>
			<div class="container">
				<ul class="menu">
					<li><a href="#/view1">view1</a></li>
					<li><a href="#/view2">view2</a></li>
				</ul>
			</div>
		</header>