<?php //echo '<pre>';print_r($user);die;?>
<div class="register-container container" style="width:540px;margin:0 auto;">
	<div class="row">
		<div class="register span6">

			<form id="frmPlanUpgrade" name="frmPlanUpgrade" method="post">
				<h2>Upgrade Plan</h2>
				<input type="hidden" id="hdnUid" name="hdnUid" value="<?=$user->u_id;?>" />
				<label for="name">Name : <?= $user->u_fname." ".$user->u_lname; ?> </label>
				<br/><br/>
				<label for="username"> Username : <?php echo $user->u_email;?></label><br/><br/>
				<label for="multipledomain">Select domain</label>
				<select id="domainSelect" name="domainSelect">
				<?php 
					foreach ($user_plan as $k=>$item)
					{
					?>
						<option value="<?= $item->up_id;?>"><?= $item->up_website." - ".$item->up_subdomain;?></option>
					<?php  }?>
				</select>
				<br/><br/>
				<label for="plan">Select Plan</label>
				<select id="planSelect" name="planSelect">
					<!--<option value=""> </option>-->
					<?php 
					foreach ($packages as $k=>$item)
					{
					if($item->package_id!=1) {
					?>
						<option value="<?= $item->package_id;?>"><?= $item->package_name." - $".$item->package_price." for ".$item->package_description;?></option>
					<?php } }?>
				</select>

				<button type="submit" class="btn btn-primary btn-lg"  id="btnUpgradePlan" name="btnUpgradePlan" title="Upgrade Plan">Upgrade Plan</button>
			</form>
		</div>
	</div>
</div>
