<!DOCTYPE HTML>
<html>
	<head>
		<title>Chat</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Make recharge online" />
		<meta name="keywords" content="Recharge,online recharge" />

		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?=public_path()?>js/skel.min.js"></script>
		<script src="<?=public_path()?>js/skel-panels.min.js"></script>
		<script src="<?=public_path()?>js/init.js"></script>

		<link rel="stylesheet" href="<?=public_path()?>css/skel-noscript.css" />
		<link rel="stylesheet" href="<?=public_path()?>css/style.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="<?=public_path()?>css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="<?=public_path()?>css/ie/v9.css" /><![endif]-->

		<script>
			var baseurl='<?=base_url()?>';
		</script>
	</head>
<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div class="container">

				<!-- Logo -->
					<div id="logo">
						<h1><a href="#">Monochromed</a></h1>
						<span>Design by TEMPLATED</span>
					</div>

				<!-- Nav -->
				<?=$this->load->view('template/nav_bar');?>


			</div>
		</div>
	<!-- Header -->
<!-- Main -->
		<div id="main">
