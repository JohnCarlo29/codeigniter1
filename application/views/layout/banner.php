<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="banner">
    <img src="<?= base_url('assets/images/logo.jpg');?>" class="logo">
    <p>Muntinlupa National High School</p>
    <div class="buttons">
    	<?php if(base_url(uri_string()) != base_url('menu')){
    		echo '<a href="'.base_url("menu").'" class="btn btn-warning text-white"><i class="fa fa-bars"></i></a>';
    	}?>
    	<form method="post" action="logout">
    		<button type="submit" onclick="confirm('Do you want to logout?')"class="btn btn-secondary text-white"><i class="fa fa-sign-out"></i></button>
    	</form>
    </div>
</div>