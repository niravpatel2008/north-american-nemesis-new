<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->

<div class="register-container container" style="width:540px;margin:0 auto;">
	<div class="row">
		
		<div class="register span6">
			<!--<form action="" method="post">-->
			<form id="frmPurchase" name="frmPurchase" method="post" accept-charset="UTF-8">
				<h2 class="clsPurchaseDom">Purchase more domain</h2>
				
				<label for="website"><span class="red">* </span>Website
				<span style="font-size:10px;color:#777;"> (website must be unique)</span>
				</label>
				<input type="text" name="website" id="website" placeholder="enter your website..." class="validate[required,url]" value="<?= set_value('website'); ?>" ><?= my_form_error('website') ?>

				<label for="subdomain"><span class="red">* </span>Subdomain Name <span style="font-size:10px;color:#777;">(e.g.{subdomain}.chat.com & it must be unique)</span></label>
				<input type="text" name="subdomain" id="subdomain" placeholder="enter your subdomain prefix..." class="validate[required]" value="<?= set_value('subdomain'); ?>" ><?= my_form_error('subdomain') ?>

				<label for="plan">Select Plan</label>
				<select id="planSelect" name="planSelect">
					<?php
					foreach ($packages as $k=>$item) {?>
						<option value="<?= $item->package_id;?>"><?= $item->package_name." - $".$item->package_price." for ".$item->package_description;?></option>
					<?php }?>
				</select>

				
				<button type="submit" class="btn btn-primary btn-lg"  id="btnRegUser" name="btnRegUser" title="Register">PURCHASE</button>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$("#frmPurchase").validationEngine();
});
</script>
