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
	<!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<!-- datatable -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
	<style>
  .iki.table-striped>tbody>tr:nth-child(odd)>td, 
  .iki.table-striped>tbody>tr:nth-child(odd)>th {
    background-color: #1452b7; color:white;
   }
   </style>
</head>
<body style="font-family: 'Raleway', sans-serif;">
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
					<h1 style="text-align:center;">Account User - Data User</h1>
				</div>
				<div class="panel-body">
				    <div class="row">						
					<div class="col-lg-3">						
						<div class="list-group">								
						    <ul class="breadcrumb">
							  <li class="active"><a href="<?php echo base_url('Crud/data_user') ?>">Data User</a><span class="divider"></span></li>
							  <li ><a href="<?php echo base_url('Crud/tambah_user') ?>">Tambah User</a></li>
							</ul>							
						</div>						
					</div>
					<div class="col-lg-9"></div>
					</div>
					
					<div class="row">	
					
					<div class="col-lg-12 table-responsive">						
						<table id= "dataTables" class="table table-bordered table-striped iki table-condensed">
							<thead>
								<tr style="background-color: #e22639; color:white;">
									<!--<th style="width:20px">No</th>-->
									<th>Nama</th>
									<th>Hak Akses</th>
									<th>Departemen</th>
									<th>Username</th>
									<th>Password</th>
									<th>E-mail</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
		                             foreach($dataproject as $d){ 
		                        ?>
    				            <tr>
    					            <!--<td><?php echo $d->id ?></td>-->
    					            <td><?php echo $d->nama ?></td>
    					            <td><?php echo $d->hakakses ?></td>
    					            <td style="max-width:100px; break-word; overflow:auto;"><?php echo $d->dept ?></td>
    					            <td><?php echo $d->username ?></td>
    					            <td><?php echo md5($d->password) ?></td>
    					            <td><?php echo $d->mail ?></td>
    					            <td><?php echo $d->status ?></td>
    					            <td>
										<?php 
											echo anchor('Crud/ubah_user/'.$d->id,'<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button>',array('onclick'=>"return confirm('Are You Sure To Edit This Data ?')")); 
			                            ?>
			                            <?php
			                            	echo anchor('Crud/hapus_user/'.$d->id,'<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>',array('onclick'=>"return confirm('Are You Sure To Delete This Data ?')")); 
			                            ?>	
								    </td>
    				            </tr>
    			            	<?php } ?>
							</tbody>
						</table>					
					</div>
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
				<div class="panel-body" style="background-color: #3068a5; color:white;">
					<p style="text-align:center; margin-bottom: 0px;">Hak Cipta @2017 Designed by Match Ad</p>
				</div>
			</div>
		</div>
	</div>
	<!--footer-->
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#dataTables').DataTable({
        order : [[0,'desc']]
    });
  } );
  </script>
</body>
</html>