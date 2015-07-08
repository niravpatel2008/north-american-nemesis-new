 <!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand">
				<a href="#">
					User Admin
				</a>
			</li>
			<li <?php if($this->router->fetch_class()=='dashboard' && $this->router->fetch_method()=='index'){ echo"class='active'";} ?> >
				<a href="<?=base_url()?>dashboard/">Dashboard</a>
			</li>
			<li <?php if($this->router->fetch_class()=='dashboard' && $this->router->fetch_method()=='purchasePlan'){ echo"class='active'";} ?>>
				<a href="<?=base_url()?>dashboard/purchasePlan">My Plan</a>
			</li>
			<li <?php if($this->router->fetch_class()=='dashboard' && $this->router->fetch_method()=='plan_upgrade'){ echo"class='active'";} ?>>
				<a href="<?=base_url()?>dashboard/plan_upgrade">Upgrade Plan</a>
			</li>
			<li <?php if($this->router->fetch_class()=='dashboard' && $this->router->fetch_method()=='profile'){ echo"class='active'";} ?>>
				<a href="<?=base_url()?>dashboard/profile">Profile</a>
			</li>
			<li <?php if($this->router->fetch_class()=='dashboard' && $this->router->fetch_method()=='purchase'){ echo"class='active'";} ?>>
				<a href="<?=base_url()?>dashboard/purchase">Purchase more domain</a>
			</li>
			<li <?php if($this->router->fetch_class()=='dashboard' && $this->router->fetch_method()=='transaction'){ echo"class='active'";} ?>>
				<a href="<?=base_url()?>dashboard/transaction">Transactions</a>
			</li>
			<li <?php if($this->router->fetch_class()=='complaint' && $this->router->fetch_method()=='index'){ echo"class='active'";} ?>>
				<a href="<?=base_url()?>complaint">Complaint</a>
			</li>
		</ul>
	</div>
	 
	<div style="background-color:#000000;height:50px;">
	<a href="#menu-toggle" style="float:left;font-size:30px;" id="menu-toggle"><i class="glyphicon glyphicon-align-justify" ></i></a>
		
		<div class="signup-btn">
			<a href="<?=base_url()?>" target="_blank">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=base_url()?>dashboard/change_password" >Change Password</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=base_url()?>index/signout/" >Log Out</a>&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	</div>
	<!-- /#sidebar-wrapper -->
