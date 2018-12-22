<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Page</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
	<!-- Admin LTE CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css') ?>">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
	    <div class="login-logo">
			<a href="../../index2.html"><b>Sign</b>In</a>
		</div>
	  <!-- /.login-logo -->
		<div class="login-box-body">
		    <p class="login-box-msg">Sign in to start your session</p>
			<form action="<?php echo base_url('login/do_login'); ?>" method="post">		
				<div class="form-group has-feedback">
			        <input type="email" class="form-control" name="email" placeholder="Email">
			        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		      	</div>
			    <div class="form-group has-feedback">
			        <input type="password" class="form-control" name="password" placeholder="Password">
			        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			    </div>
			    <div class="row">
			        <div class="col-xs-8">
			        </div>
			        <!-- /.col -->
			        <div class="col-xs-4">
			          	<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
			        </div>
			        <!-- /.col -->
			    </div>
			</form>
		</div>
	</div>
</body>
</html>