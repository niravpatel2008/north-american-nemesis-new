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
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?=public_path()?>images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=public_path()?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=public_path()?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=public_path()?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=public_path()?>images/ico/apple-touch-icon-57-precomposed.png">
	<?php  
		if($this->router->fetch_method() == 'signin')
		{
			echo '<link href="'.public_path().'css/login.css" rel="stylesheet" type="text/css">';
			echo '<link href="'.public_path().'css/validationEngine.css" rel="stylesheet" type="text/css">';
		}
		//if($this->router->fetch_class() == 'signup'){
		if(in_array($this->router->fetch_class(), array("signup","dashboard","index"))){
			echo '<link href="'.public_path().'css/signup.css" rel="stylesheet" type="text/css">';
			echo '<link href="'.public_path().'css/validationEngine.css" rel="stylesheet" type="text/css">';
			
		}
	?>
	<script src="<?=public_path()?>js/jquery.js"></script>
	<script>
			var baseurl='<?=base_url()?>';
		</script>
	<?php 
		if(in_array($this->router->fetch_class(), array("signup","dashboard","index"))){
			//echo '<script src="'.public_path().'js/jquery.backstretch.min.js"></script>';
			echo '<script src="'.public_path().'js/btvalidationEngine-en.js"></script>';
			
			echo '<script src="'.public_path().'js/btvalidationEngine.js"></script>';
			echo '<script src="'.public_path().'js/common.js"></script>';
			echo '<script src="'.public_path().'js/bootstrap.min.js"></script>';
		}
	?>
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
    <header id="header" role="banner">
        <div class="container">
            <div id="navbar" class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url();?>"></a>
                </div>
                <div class="collapse navbar-collapse">
						<?php if($isLogin == true && $this->router->fetch_class() != 'index'){ ?>
							<ul class="nav navbar-nav">
							<li class=""><a href="<?=base_url()?>dashboard/">Dashboard</a></li>
							<li class=""><a href="<?=base_url()?>dashboard/#purchasePlan">My Plan</a></li>
							</ul>
						<?php }?>
						<?php if($isLogin == true ){?>
						<div class="signup-btn">
							<a href="<?=base_url()?>dashboard/">Dashboard</a>&nbsp;&nbsp;|&nbsp;&nbsp;
							<a href="<?=base_url()?>dashboard/change_password" >Change Password</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=base_url()?>index/signout/" >Log Out</a>
						</div>
						<?php } else { ?>
						<ul class="nav navbar-nav">
							<li class="active"><a href="<?=base_url()?>#main-slider"><i class="icon-home"></i></a></li>
							<li><a href="<?=base_url()?>#services">Features</a></li>
							<li><a href="<?=base_url()?>#portfolio">Portfolio</a></li>
							<li><a href="<?=base_url()?>#pricing" >Pricing</a></li>
							<li><a href="<?=base_url()?>#about-us">About Us</a></li>
							<li><a href="<?=base_url()?>#contact">Contact</a></li>
						</ul>
						<?php } ?>
						<?php if($isLogin == false) { ?>
						<div class="signup-btn">
						<a href="<?=base_url()?>signin">Login</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=base_url()?>signup">Sign Up</a>
						</div>
						<?php }?>
					
                </div>
            </div>
        </div>
    </header><!--/#header-->
