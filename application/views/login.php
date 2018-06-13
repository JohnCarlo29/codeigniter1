<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid gradient-bg">
    <?php if($this->session->flashdata('login_error')){?>
    <div class="alert alert-danger" role="alert" id="login-message">
        <?php echo $this->session->flashdata('login_error'); ?>       
    </div>
    <?php } ?>
    <div id='loginbox'>
        <img src="<?=base_url('assets/images/logo.jpg'); ?>" id="avatar">
        <h1>Login</h1>
        <form method='post' action='admin/admin_login'>
            <p>Username</p>
            <input type="text" name="uname" id="uname" placeholder="Username" autocomplete="off">
            <p>Password</p>
            <input type="password" name="pword" id="pword" placeholder="Password">
            <input type="submit" name="login" id="login-btn" value="Login">
        </form>
    </div>
</div>
