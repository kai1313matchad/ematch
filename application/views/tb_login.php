<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href=<?php echo base_url()."css/bootstrap.min.css";?>>
  	<link rel="stylesheet" href=<?php echo base_url()."css/extra.css";?>>
	<link rel="stylesheet" href=<?php echo base_url()."css/signin.css";?>>
	<style>
	    body{
	        background: url('<?php echo base_url()?>assets/logo/BackgroundLogin.png') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
	    }
	</style> 
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src=<?php echo base_url()."js/bootstrap.min.js";?>></script>
	<title>Halaman Transaksi</title>
</head>
	<body>
		<div class="container">
		    
			<div class="row">
				<div class="col-lg-4 column col-lg-offset-4">
					<div class="panel panel-default">
					    <div class="panel-heading" style="background-color:#1828ba;color:white">
							<h2 class="form-signin-heading"><center><h1>Login RaKer</h1></center></h2>
						</div>
					    <div class="row">
                            <?php
                            if($this->session->flashdata('sukses'))
                                {
                                    echo $this->session->flashdata('sukses');
                                }
                            ?>
                        </div>
						<div class="panel-body">
							<form class="form-signin" role="form" action="<?php echo base_url('Crud/login_user') ?>" method="post" >
								<input type="user" class="form-control" name="username" placeholder="Username" required autofocus>
								<br>
								<input type="password" class="form-control" name="password" placeholder="Password" required>
								<br>
								<button class="btn btn-lg btn-primary btn-block" style="background-color:#24871f;color:white" type="submit">Sign in</button>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</div>
		<!-- JavaScript -->
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/bootstrap.js"></script>
		<!-- JavaScript -->
</body>
</html>