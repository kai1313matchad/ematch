<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Login</title>
	<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/style.css" />
	<!-- Google Font -->
	<link href="//fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
	<link type="text/css" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- jQuery Library -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <!-- Bootstrap Core JS -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>
</head>
<body>
	
	<section class="container">
	    <section class="login-form">
		<form method="POST" action="<?php echo base_url();?>login/getLogin" role="form">
			<div>
				<img src="images/logo.png" alt="" />
				<h4>Login to your private dashboard</h4>
			</div>			
			<input type="text" name="username" id="username" placeholder="username" required class="form-control input-lg" />
			<input type="password" name="password" id="password" placeholder="Password" required class="form-control input-lg" />
			<button type="submit" name="go" class="btn btn-lg btn-block btn-info">Sign in</button>
			<div>
				<a href="#">Create account</a> or <a href="#">reset password</a>
			</div>
			<?php
				$info = $this->session->flashdata('info'); //menampung informasi yang di lempar di mode
				if(!empty($info)) //jika info tidak kosong maka tampilkan warning
				{
					echo $info;//kita tes
				}
			?>	
		</form>
		</section>
	</section>
	
</body>
</html>