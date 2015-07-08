
<div class="register-container container" style="width:540px;margin:0 auto;">
	<div class="row">
		
		<div class="register span6">
			<!--<form action="" method="post">-->
			<form id="frmSignup" name="frmSignup" method="post" accept-charset="UTF-8">
				<h2>Edit Profile</h2>
				<label for="firstname"><span class="red">* </span>First Name</label>
				<input type="text" placeholder="enter your first name..." name="fname" id="fname" value="<?php echo $user->u_fname; ?>" class="validate[required]"><?= my_form_error('fname') ?>
				
				<label for="lastname"><span class="red">* </span>Last Name</label>
				<input type="text" placeholder="enter your first name..." name="lname" class="validate[required]" id="lname" value="<?php echo $user->u_lname; ?>" ><?= my_form_error('lname') ?>
				
				<label for="phone">Phone</label>
				<input type="text" placeholder="enter your phone no..." name="phone" id="phone" value="<?php echo $user->u_phone; ?>" maxlength="12"><?= my_form_error('phone') ?>
					
				<label class="col-md-12" for="email">Email</label>				
				<label class="col-md-12" style="color:#000000;"><b><?php echo $user->u_email; ?></b></label>

				<button type="submit" class="btn btn-primary btn-lg"  id="btnRegUser" name="btnRegUser" title="Register">UPDATE</button>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$("#frmSignup").validationEngine();
});
</script>
