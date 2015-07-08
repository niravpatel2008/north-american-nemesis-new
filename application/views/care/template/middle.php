
<div id="wrapper">
<div id="flash_msg"></div>
<?php
$this->load->view('care/template/nav_bar');
$this->load->view("care/".$this->router->fetch_class()."/".$view); 
?>
</div>

