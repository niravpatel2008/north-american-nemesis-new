<?php
if(isset($this->front_session) && $this->front_session['u_id'] > 0)
	$isLogin = true;
else
	$isLogin = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chat</title>
    <link href="<?=public_path()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=public_path()?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=public_path()?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=public_path()?>css/main.css" rel="stylesheet">
	<link href="<?=public_path()?>css/sb-admin.css" rel="stylesheet">
	<link href="<?=public_path()?>css/simple-sidebar.css" rel="stylesheet">
	 <!-- Custom Fonts -->
    <link href="<?=public_path()?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<link href="<?=public_path()?>css/signup.css" rel="stylesheet" type="text/css">
	<link href="<?=public_path()?>css/validationEngine.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	
	<script src="<?=public_path()?>js/jquery.js"></script>
	<script>
			var baseurl='<?=base_url()?>';
	</script>
	<?php 
		if(in_array($this->router->fetch_class(), array("signup","dashboard","index","complaint"))){
			//echo '<script src="'.public_path().'js/jquery.backstretch.min.js"></script>';
			echo '<script src="'.public_path().'js/btvalidationEngine-en.js"></script>';
			
			echo '<script src="'.public_path().'js/btvalidationEngine.js"></script>';
			echo '<script src="'.public_path().'js/common.js"></script>';
			echo '<script src="'.public_path().'js/bootstrap.min.js"></script>';
		}
	?>

</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
   