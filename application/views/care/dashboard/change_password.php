
<div class="register-container container" style="width:540px;margin:0 auto;">
	<div class="row">
		<div class="register span6">

			<form id="frmChangePwd" name="frmChangePwd" method="post">
				<h2>Change password</h2>

				<label for="password">New Password</label>
				<input type="password" id="password" name="password" class="validate[required]" placeholder="enter current password..."><?= form_error('password'); ?>

				<label for="password2">Confirm Password</label>
				<input type="password" id="password2" name="password2" class="validate[required,equals[password]]" placeholder="enter new password ..."><?= form_error('password2'); ?>

				<button type="button" class="btn btn-primary btn-lg"  id="btnChangePwd" name="btnChangePwd" title="Change Password" onclick="javascript:userSignup('frmChangePwd');">Change Password</button>
			</form>
		</div>
	</div>
</div>
    

<script type="text/javascript">
$(document).ready(function() {
	$("#frmChangePwd").validationEngine();
});
</script>
