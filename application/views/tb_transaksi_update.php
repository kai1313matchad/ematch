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
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="http://placehold.it/150x75&text=Logo" ></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('Crud/home') ?>">Main Dashboard</a></li>
                <li role="separator" class="divider"></li>
                <?php 
                      $hakses= $this->session->userdata('hakakses');
                      if ($hakses =='Admin') { echo '<li><a href="data_user">Account User</a></li>';
                                               echo '<li role="separator" class="divider"></li>';
                      }
                      if ($hakses =='Admin' or $hakses =='Head') { echo '<li><a href="tambah">Input Project New</a></li>';}
                      if ($hakses =='Admin' or $hakses =='BOD') { echo '<li><a href="update">ACC Project (Goal) Dept</a></li>';}
                ?>
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
					<h1 style="text-align:center;">Manage Project - Data Project</h1>
				</div>
				<div class="panel-body">					
					<div class="col-lg-4">						
						<div class="list-group">								
						    <ul class="breadcrumb">
							  <li class="active"><a href="data_user.html">Data User</a><span class="divider"></span></li>
							  <li ><a href="tmbUser.html">Tambah User</a></li>
							</ul>							
							<ul class="breadcrumb">
								<li class="active"><a href="upd_prj.html">Update Project</a></li>								
							</ul>
						</div>						
					</div>
					<div class="col-lg-8">						
						<table class="table table-striped table-condensed table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Project</th>
										<th>Departemen</th>
										<th>Start Project</th>
										<th>End Project</th>
										<th>PIC</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>							
									<tr>
										<td>1</td>
										<td>Project AAAA</td>
										<td>FINANCE</td>
										<td>12/12/2016</td>
										<td>12/12/2017</td>
										<td>Nama PIC</td>
										<td><a href="#">Delete</a></td>
									</tr>
								</tbody>
							</table>					
					</div>
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
				<div class="panel-body">
					<p style="text-align:center; margin-bottom: 0px;">Hak Cipta @2016 Designed by Match Ad Ver 1.0</p>
				</div>
			</div>
		</div>
	</div>
	<!--footer-->
</body>
</html>