
<div class="register-container container" style="width:540px;margin:0 auto;">
	<div class="row">
		<div class="register span6">

			<form id="frmForgetPwd" name="frmForgetPwd" method="post">
				<h2>Forget password</h2>

				<label for="email">Email</label>
				<input type="text" name="email" placeholder="enter your email..." class="validate[required,custom[email]] allow-enter" id="email" value="<?= set_value('email'); ?>" ><?= form_error('email') ?>

				<button type="button" class="btn btn-primary btn-lg sumitbtn"  id="btnForgetPwd" name="btnForgetPwd" title="Forget Password" onclick="javascript:userSignup('frmForgetPwd');">Submit</button>
			</form>
		</div>
	</div>
</div>
    

<script type="text/javascript">
$(document).ready(function() {
	$("#frmForgetPwd").validationEngine();
});
</script>
