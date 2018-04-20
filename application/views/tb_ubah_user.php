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
          <a class="navbar-brand" href="#"><img src="<?php echo base_url()?>assets/logo/LogoProject.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu">
				<li><a href="<?php echo base_url('Crud/home') ?>">Main Dashboard</a></li>
                <li><a href="<?php echo base_url('Crud/data_user') ?>">Account User User</a></li>                
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
					<h1 style="text-align:center;">Manage User - Update User</h1>
				</div>
				<?php extract($usr); ?>
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
					    <form class="form-horizontal" action="<?php echo base_url(). 'crud/ubah_user_aksi'; ?>" method="post">
						<div class="form-group">
							<label for="judul">Nama</label>
							<input type="text" name="nama" id="name" class="form-control" placeholder="nama" value="<?php echo $nama; ?>" />
							<label for="judul">Username</label>
							<input type="text" name="username" id="username" class="form-control" placeholder="username" value="<?php echo $username; ?>"/>
							<label for="judul">Password</label>
							<input type="password" name="pass" id="pass" class="form-control" placeholder="password" value="<?php echo $password; ?>" />
							<label for="judul">E-mail</label>
							<input type="text" name="mail" id="mail" class="form-control" placeholder="e-mail" value="<?php echo $mail; ?>" />
							<label for="judul">Departmen</label><br>
								<?php
									$dat = $dep->dept;
									$dbs = explode(',', $dat);
									$dpt = array ("IT","HC","PAT","GA","MARKETING","FINANCE","LOGISTIC","PRODUCTION","SITAC","ACCOUNTING","SECRETARY","INTERNAL AUDIT","WIPER INDONESIA","TRITUNGGAL METALWORKS");
		
									foreach($dpt as $ak)
									{
										if(in_array($ak,$dbs))
										{
											if($ak=="ACCOUNTING")
											{
												echo "<br><label class=\"checkbox-inline\"><input name=\"dept[]\" type=\"checkbox\" value=\"$ak\" CHECKED> $ak</label>";
											}
												else
												{
													echo "<label class=\"checkbox-inline\"><input name=\"dept[]\" type=\"checkbox\" value=\"$ak\" CHECKED> $ak</label>";
												}
										}
										else
										{
											if($ak=="ACCOUNTING")
											{
												echo "<br><label class=\"checkbox-inline\"><input name=\"dept[]\" type=\"checkbox\" value=\"$ak\" > $ak</label>";
											}
												else
												{
													echo "<label class=\"checkbox-inline\"><input name=\"dept[]\" type=\"checkbox\" value=\"$ak\" > $ak</label>";
												}
										}
									}
								?><br>
							<label for="judul">Hak Akses</label>
								<select name="hakakses" id="hakakses" class="form-control input-md select2">
									<option value="Head" <?php if ($usr['hakakses'] == "Head") { echo 'selected'; } ?>>
										Head
									</option>
									<option value="BoD" <?php if($usr['hakakses'] == "BoD") { echo 'selected';} ?>>
										BoD
									</option>
									<option value="Admin" <?php if ($usr['hakakses'] == "Admin") { echo 'selected'; } ?>>
										Admin
									</option>									
								</select>
							<label for="judul">Status</label>
								<select name="status" id="status" class="form-control input-md select2">
									<option value="aktif" <?php if ($usr['status'] == "aktif") { echo 'selected'; } ?>>
										Aktif
									</option>
									<option value="non-Aktif" <?php if ($usr['status'] == "non-Aktif") { echo 'selected'; } ?>>
										Non-Aktif
									</option>
								</select>
						</div>
						<div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>					
					</div>
					<input type="hidden" name="id" id="id" class="form-control"  value="<?php echo $id; ?>" /> 
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
				<div class="panel-body"style="background-color: #3068a5; color:white;">
					<p style="text-align:center; margin-bottom: 0px;">Hak Cipta @2016 Designed by Match Ad Ver 1.0</p>
				</div>
			</div>
		</div>
	</div>
	<!--footer-->
</body>
</html>