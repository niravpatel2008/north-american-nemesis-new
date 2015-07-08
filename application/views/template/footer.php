<footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-9" style="text-align: right; padding-right: 191px;">
                    &copy; <?=date('Y');?> All Rights Reserved.
                </div>
				<div class="col-sm-3" style="text-align: center;">
					<a href="<?=base_url()?>privacypolicy">Privacy Policy</a> | 
					<a href="<?=base_url()?>terms">Terms & Conditions</a> | 
					<a href="<?=base_url()?>faq">FAQ</a>
				</div>
            </div>
        </div>
    </footer><!--/#footer-->

    
    <script src="<?=public_path()?>js/bootstrap.min.js"></script>
    <script src="<?=public_path()?>js/jquery.isotope.min.js"></script>
    <script src="<?=public_path()?>js/jquery.prettyPhoto.js"></script>
    <script src="<?=public_path()?>js/main.js"></script>
	<script type="text/javascript">
        function admin_path () {
            return '<?=admin_path()?>';
        }

        function success_msg_box (msg) {
            var html = '<div class="alert alert-success alert-dismissable msg-display"> \n\
                            <i class="fa fa-check"></i> \n\
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> \n\
                            '+msg+' \n\
                        </div>';
            return html;
        }

        function error_msg_box(msg)
        {
            var html = '<div class="alert alert-danger alert-dismissable msg-display"> \n\
                            <i class="fa fa-ban"></i> \n\
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> \n\
                            '+msg+' \n\
                        </div>';
            return html;
        }
    </script>
	<script>
	<?php
		$flash_msg = $this->session->flashdata('flash_arr');
	?>
		<?php if (isset($flash_msg['flash_msg'])) {  
				if($flash_msg['flash_type']=='success')
				{ ?>
					$('#flash_msg').html(success_msg_box('<?php echo $flash_msg['flash_msg'] ?>'));
					 setTimeout(function(){  $( "#flash_msg" ).fadeOut( 500 );},4000);
				<?php }
				else if($flash_msg['flash_type']=='error')
				{?>
					$('#flash_msg').html(error_msg_box('<?php echo $flash_msg['flash_msg'] ?>'));
					 setTimeout(function(){  $( "#flash_msg" ).fadeOut( 500 );},4000);
				<?php }
		 } else { ?>
			$('#flash_msg').html('');
		 <?php } ?>
		
	</script>
</body>
</html>