<?php
//echo '<pre>';print_r($user_plan);die;
?>
<div class="register-container container" style="margin:0 auto;">
	<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <h2 style="text-align:center;">Transaction History</h2>
						  <?php
						  if(empty($user_plan))
						  {
							echo "No Transaction has been made yet.";
							echo '</section></div></div></div>';die;
						  }
						  ?>
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bookmark"></i> Website</th>
                                  <th><i class="fa fa-bookmark"></i> Subdomain</th>
                                  <th><i class="fa fa-bookmark"></i> Package</th>
								  <th><i class="fa fa-bookmark"></i> Expiry Date</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th></th>
                              </tr>
                              </thead>
							  <tbody>
							  <?php
							  foreach($user_plan as $k=>$v)
							  {
								  if(strtolower($v->up_status) == 'active')
									  $cls = "label label-success";
								  else
									  $cls ="label label-danger";
								  ?>
								<tr>
									<td><?=$v->up_website;?></td>
									<td><?=$v->up_subdomain;?></td>
									<td><?=$v->package_name.' - $'.$v->package_price;?></td>
									<td><?=date('Y-m-d',strtotime($v->up_package_expiry_date));?></td>
									<td><span class="<?=$cls;?>"><?=$v->up_status;?></span></td>
								</tr>
							  <?php }
							  ?>
                              <!--<tr>
                                  <td><a href="#">Vector Ltd</a></td>
                                  <td class="hidden-phone">Lorem Ipsum dorolo imit</td>
                                  <td>12120.00$ </td>
                                  <td><span class="label label-info label-mini">Due</span></td>
                                  <td>
                                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                  </td>
                              </tr>-->
                              
							  </tbody>
							</table>
						</section>
					</div>
	</div>
</div>