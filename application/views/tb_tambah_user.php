<!DOCTYPE html>
<?php
  //proteksi halaman
  $this->simple_login->cek_login();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href=<?php echo base_url()."css/bootstrap.min.css";?>>
  	<link rel="stylesheet" href=<?php echo base_url()."css/extra.css";?>>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src=<?php echo base_url()."js/bootstrap.min.js";?>></script>
	<title>Halaman Transaksi</title>
</head>
<body>
	<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#113672">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img style="height:75px;width:150px" class="img-responsive" src="<?php echo base_url()?>assets/logo/LogoProject.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu">
				<li><a href="<?php echo base_url('Crud/home') ?>">Main Dashboard</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="<?php echo base_url('Crud/hapus_project') ?>">Hapus Project</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo base_url('Crud/chgpass') ?>">Change Password</a></li>			
                <li><a href="<?php echo base_url('Crud/logout') ?>">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!--content-->
    <div class="container">
	<div class="row clearfix">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 style="text-align:center;">Account User - Tambah User</h1>
				</div>
				<div class="panel-body">					
					<div class="col-lg-4">						
						<div class="list-group">								
						    <ul class="breadcrumb">
								<li class="active"><a href="<?php echo base_url('Crud/data_user') ?>">Data User</a><span class="divider"></span></li>
								<li ><a href="<?php echo base_url('Crud/tambah_user') ?>">Tambah User</a></li>
							</ul>	
						</div>						
					</div>
					<div class="col-lg-8">	
					    <form class="form-horizontal" action="<?php echo base_url(). 'crud/tambah_user_aksi'; ?>" method="post">
						<div class="form-group">
							<label for="judul">Name</label>
							<input type="text" name="nama" id="name" class="form-control" placeholder="Name Full" required/>
							<label for="judul">Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username" required/>
							<label for="judul">Password</label>
							<input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required/>
							<label for="judul">E-mail</label>
							<input type="text" name="mail" id="mail" class="form-control" placeholder="e-Mail" />
							<label for="judul">Department</label><br>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="IT">IT</label>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="HC">HC</label>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="PAT">PAT</label>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="GA">GA</label>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="MARKETING">MARKETING</label>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="FINANCE">FINANCE</label>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="LOGISTIC">LOGISTIC</label>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="PRODUCTION">PRODUCTION</label>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="SITAC">SITAC</label><br>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="ACCOUNTING">ACCOUNTING</label>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="Secretary">Secretary</label>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="INTERNAL AUDIT">INTERNAL AUDIT</label>
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="WIPERINDO">WIPERINDO</label>							
								<label class="checkbox-inline"><input name="dept[]" type="checkbox" value="Tritunggal Metalworks">Tritunggal Metalworks</label>
								<br>
							<label for="judul">Hak Akses</label>
								<select name="hakakses" id="hakakses" class="form-control input-md select2">																	
																	<option value="Head">Head</option>
																	<option value="BOD">BoD</option>
																	<option value="Admin">Admin</option>
																</select>
							<label for="judul">Status</label>
								<select name="status" id="status" class="form-control input-md select2">
									<option value="aktif">Aktif</option>
									<option value="non-Aktif">Non-Aktif</option>
								</select>
						</div>
						<div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>					
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
    <!--content-->
    <!--footer-->
    <div class="row clearfix">
			<div class="col-lg-12">
				<div class="panel panel-primary">
				<div class="panel-body" style="background-color: #3068a5; color:white;">
					<p style="text-align:center; margin-bottom: 0px;">Hak Cipta @2017 Designed by Match Ad</p>
				</div>
			</div>
		</div>
	</div>
	<!--footer-->
</body>
</html>