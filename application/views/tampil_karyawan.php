<!DOCTYPE html>
<html>
<head>
	<title>Data Karyawan</title>
	<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		.container {
			width: 1000px;
			height: auto;
			margin-top: 40px
		}

		.jarak {
			margin-top: 8px;
		}
	</style>



	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
</head>
<body class="bg semua">
	
	<div class="container">
	<div id="alert alert-message"><?php echo $this->session->flashdata('msg'); ?></div>
	<div style="float: right;">
		<a class= "btn btn-primary" href="<?php echo base_url(); ?>Index" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-home"></span><h7><i> Home</i></h7></a>
		<a class= "btn btn-primary" href="<?php echo base_url(); ?>Addkaryawan" style="font-family: 'Exo 2', sans-serif;"><h7><i>Tambah Karyawan</i></h7></a>
		<a href="<?php base_url();?>login/logout" class="btn btn-danger" style="font-family: 'Exo 2', sans-serif; margin: 0px 25px ">Logout</a>
	</div>
	
		<h1>Data Karyawan</h1>
		<table id="dataTables" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th style="text-align: center;">NO.</th>
	                <th style="text-align: center;">Username</th>
	                <th style="text-align: center;">Nama Lengkap</th>
	                <th style="text-align: center;">Pangkat</th>
	                <th style="text-align: center;">Jabatan</th>
	                <th style="text-align: center;">Departement</th>
	                <th style="text-align: center;">Email</th>
	                <th style="text-align: center;">Status</th>
	                <th width="130px"  style="text-align: center;">Action</th>
	                
	            </tr>
	        </thead>
			
			<tbody >
						<?php 
						$no = 1;
						if (!isset($table)) {
							echo "tidak ada data";
						}
						else {
							
						foreach($table as $u){ 
							
						?>
							<tr>
								<!--<td style="text-align: center;"><?php echo $u->id_karyawan ?></td>!-->
								<td style="text-align: center;"><?php echo $no++ ?></td>
								<td style="text-align: center;"><?php echo $u->username ?></td>
								<td style="text-align: center;"><?php echo $u->nama_karyawan ?></td>
								<td style="text-align: center;"><?php echo $u->nama_akses ?></td>
								<td style="text-align: center;"><?php echo $u->jabatannya ?></td>
								<td style="text-align: center;"><?php echo $u->deptini ?></td>
								<td style="text-align: center;"><?php echo $u->email ?></td>
								<td style="text-align: center;"><?php echo $u->status ?></td>
								<td>
									<button data-toggle="modal" data-target="#myModal<?php echo $u->id_karyawan ?>" type="button" class="btn btn-default btn-sm">
							          <span class="glyphicon glyphicon-edit"></span> 
							          <text style="text-transform: capitalize;"> Edit</text> 


							        </button>
			
		<!-- Modal -->
		<div class="modal fade" id="myModal<?php echo $u->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header" style="background-color: #6db1ff">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel"><b>Edit</b></h4>
		      </div>
		      <div class="modal-body">
		      
		     <!--isi modal!-->

		<form id="form_kpim" action="<?php base_url();?>Karyawan/ganti/<?php echo $u->id_karyawan ?>" method="POST" enctype="multipart/form-data">

		<div class="row jarak">
			<div class="col-lg-4">
				<div style="">Username :</div>
			</div>
			
			<div class="col-lg-8">
				<input value="<?php echo $u->username ?>" type="text" class="form-control" name="username" placeholder="Username" required>
			</div>
		</div>

		<div class="row jarak">
			<div class="col-lg-4">
				<div style="">Nama Lengkap :</div>
			</div>
			
			<div class="col-lg-8">
				<input value="<?php echo $u->nama_karyawan ?>" type="text" class="form-control"  name="nama" placeholder="Nama Lengkap" required>
			</div>
		</div>

		<div class="row jarak">
			<div class="col-lg-4">
				<div style="">Password :</div>
			</div>
			
			<div class="col-lg-8">
				<input type="Password" class="form-control" name="password" placeholder="Password">
			</div>
		</div>

		<div class="row jarak">
			<div class="col-lg-4">
				<div style="">Pangkat :</div>
			</div>
			<!-- <?php echo $u->id_jabatan ?> -->
			<div class="col-lg-8">
				<select name="pangkat" class="form-control" required>
					<option value="">-- Pilih Pangkat --</option>
				 	<?php 
		            foreach($isijabatan as $row)
		            { ?>
		        	<option value="<?= $row->id_akses ?>" <?php if($u->id_jabatan == $row->id_akses){ echo 'selected' ;}; ?>><?= $row->nama_akses ?></option>


		             <!--  echo '<option value="'.$row->id_akses.'" .'if($u->id_jabatan == $row->id_akses){ echo 'selected' ;};'.>'.$row->nama_akses.'</option>'; -->
		            <?php } ?>
<!-- 
					
					<option value="1">Admin</option>
					<option value="2">Staff</option>
					<option value="3">Head</option>
					<option value="4">Manager</option>
					<option value="5">Board of Directors</option>
					<option value="6">SPV</option>					
					<option value="7">Assistant SPV</option>
					<option value="8">Assistant Manager</option>	 -->				
				</select>
			</div>
		</div>

		

		<div class="row jarak">
			<div class="col-lg-4">
				<div style="">Jabatan :</div>
			</div>
			
			<div class="col-lg-8">
				<input value="<?php echo $u->jabatannya ?>" type="text" class="form-control"  name="jabatannya" placeholder="Jabatan" required>
			</div>
		</div>

		<div class="row jarak">
			<div class="col-lg-4">
				<div style="">Hari Kerja :</div>
			</div>
			<!-- <?php echo $u->id_jabatan ?> -->
			<div class="col-lg-8">
				<select name="harikerja" class="form-control" required>
					<option value="">-- Pilih Hari Kerja --</option>
				 	
		        	<option value="5" <?php if($u->harikerja == '5'){ echo 'selected' ;}; ?>>5 Hari Kerja</option>

		        	<option value="6" <?php if($u->harikerja == '6'){ echo 'selected' ;}; ?>>6 Hari Kerja</option>
				</select>
			</div>
		</div>

		<div class="row jarak">
			<div class="col-lg-4">
				<div style="">Alamat Email :</div>
			</div>
			
			<div class="col-lg-8">
				<input value="<?php echo $u->email ?>" type="text" class="form-control"  name="email" placeholder="Email">
			</div>
		</div>

		<div class="row" style="padding-top: 20px">
				<div class="col-sm-4" style="padding-top: 10px">
				Hak Akses :<br/>


				<?php $id_aksesku = explode(',', $u->hak_akses);?>
					
				
				<text style="color: red">*biarkan kosong jika tidak memiliki hak untuk menilai</text>
				</div>
				<div class="col-lg-8">
			    <div class="col-sm-3" >
					<div class="checkbox">
					  <label><input type="checkbox" name="hak[]" value="2" <?php if(in_array("2", $id_aksesku)) {echo 'CHECKED';}; ?>>Staff</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="hak[]" value="3" <?php if(in_array("3", $id_aksesku)) {echo 'CHECKED';}; ?>>Head</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="hak[]" value="7" <?php if(in_array("7", $id_aksesku)) {echo 'CHECKED';}; ?>>Assistant SPV</label>
					</div>
					
								
				</div>

				<div class="col-sm-3" >
					<div class="checkbox">
					  <label><input type="checkbox" name="hak[]" value="6" <?php if(in_array("6", $id_aksesku)) {echo 'CHECKED';}; ?>>SPV</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="hak[]" value="8" <?php if(in_array("8", $id_aksesku)) {echo 'CHECKED';}; ?>>Assistant Manager</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="hak[]" value="4" <?php if(in_array("4", $id_aksesku)) {echo 'CHECKED';}; ?>>Manager</label>
					</div>
				</div>

				<div class="col-sm-4" >
					<div class="checkbox">
					  <label><input type="checkbox" name="hak[]" value="9" <?php if(in_array("9", $id_aksesku)) {echo 'CHECKED';}; ?>>Senior Manager</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="hak[]" value="10" <?php if(in_array("10", $id_aksesku)) {echo 'CHECKED';}; ?>>Senior Staff</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="hak[]" value="11" <?php if(in_array("11", $id_aksesku)) {echo 'CHECKED';}; ?>>Non Staff</label>
					</div>
				</div>
				</div>
			</div>

		<hr>
		

		<div class="row jarak">
			<div class="col-lg-4">
				<div style="font-size: 20px">Departement Match Ad:</div>
				<?php $id_deptku = explode(',', $u->dept);?>
			</div>

			<div class="col-lg-8">
				<div class="checkbox">
				  <label><input id="allmatch<?php echo $u->id_karyawan ?>" onclick="pilihdeptmatch(<?php echo $u->id_karyawan ?>)" type="checkbox" value="">Pilih semua Dept. Match</label>
				</div>
			</div>
			
			<div class="col-lg-8 col-lg-offset-4">
				 <div class="col-sm-2" style="padding-right: 90px">
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="1" <?php if(in_array("1", $id_deptku)) {echo 'CHECKED';}; ?>>IT</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="2" <?php if(in_array("2", $id_deptku)) {echo 'CHECKED';}; ?>>HC</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="3" <?php if(in_array("3", $id_deptku)) {echo 'CHECKED';}; ?>>PAT</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="4" <?php if(in_array("4", $id_deptku)) {echo 'CHECKED';}; ?>>GA</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="5" <?php if(in_array("5", $id_deptku)) {echo 'CHECKED';}; ?>>Marketing </label>
					</div>				
				</div>

				<div class="col-sm-2" style="padding-right: 90px">
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="6" <?php if(in_array("6", $id_deptku)) {echo 'CHECKED';}; ?>>Finance</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="7" <?php if(in_array("7", $id_deptku)) {echo 'CHECKED';}; ?>>Logistic</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="8" <?php if(in_array("8", $id_deptku)) {echo 'CHECKED';}; ?>>Production</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="9" <?php if(in_array("9", $id_deptku)) {echo 'CHECKED';}; ?>>SITAC</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="a" <?php if(in_array("a", $id_deptku)) {echo 'CHECKED';}; ?>>Accounting</label>
					</div>
				</div>


				<div class="col-sm-4">
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="b" <?php if(in_array("b", $id_deptku)) {echo 'CHECKED';}; ?>>Secretary</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="c" <?php if(in_array("c", $id_deptku)) {echo 'CHECKED';}; ?>>Internal Audit</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept match<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="l" <?php if(in_array("l", $id_deptku)) {echo 'CHECKED';}; ?>>Vendor</label>
					</div>
				</div>
			</div>
		</div>

		<hr>

		<div class="row jarak">
			<div class="col-lg-4">
				<div style="font-size: 20px">Departement Wiperindo:</div>
			</div>

			<div class="col-lg-8">
				<div class="checkbox">
				  <label><input id="allwpi<?php echo $u->id_karyawan ?>" onclick="pilihdeptwpi(<?php echo $u->id_karyawan ?>)" type="checkbox" value="">Pilih semua Dept. WPI</label>
				</div>
			</div>
			
			<div class="col-lg-8 col-lg-offset-4">
				 <div class="col-sm-2" style="padding-right: 90px">
					<div class="checkbox">
					  <label><input class="pilihandept wpi<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="w" <?php if(in_array("w", $id_deptku)) {echo 'CHECKED';}; ?>>IT</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wpi<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="f" <?php if(in_array("f", $id_deptku)) {echo 'CHECKED';}; ?>>HC</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wpi<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="g" <?php if(in_array("g", $id_deptku)) {echo 'CHECKED';}; ?>>PAT</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wpi<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="h" <?php if(in_array("h", $id_deptku)) {echo 'CHECKED';}; ?>>GA</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wpi<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="i" <?php if(in_array("i", $id_deptku)) {echo 'CHECKED';}; ?>>Marketing </label>
					</div>	
					
				</div>

				<div class="col-sm-2" style="padding-right: 90px">
					<div class="checkbox">
					  <label><input class="pilihandept wpi<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="j" <?php if(in_array("j", $id_deptku)) {echo 'CHECKED';}; ?>>Finance</label>
					</div>					
					<div class="checkbox">
					  <label><input class="pilihandept wpi<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="k" <?php if(in_array("k", $id_deptku)) {echo 'CHECKED';}; ?>>Logistic</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wpi<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="d" <?php if(in_array("d", $id_deptku)) {echo 'CHECKED';}; ?>>Production</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wpi<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="m" <?php if(in_array("m", $id_deptku)) {echo 'CHECKED';}; ?>>SITAC</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wpi<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="n" <?php if(in_array("n", $id_deptku)) {echo 'CHECKED';}; ?>>Accounting</label>
					</div>
				</div>


				<div class="col-sm-4">
					
					
					<div class="checkbox">
					  <label><input class="pilihandept wpi<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="o" <?php if(in_array("o", $id_deptku)) {echo 'CHECKED';}; ?>>Secretary</label>
					</div>
				</div>
			</div>
		</div>

		<hr>

		<div class="row jarak">
			<div class="col-lg-4">
				<div style="font-size: 20px">Departement KCT:</div>
			</div>

			<div class="col-lg-8">
				<div class="checkbox">
				  <label><input id="allkct<?php echo $u->id_karyawan ?>" onclick="pilihdeptkct(<?php echo $u->id_karyawan ?>)" type="checkbox" value="">Pilih semua Dept. KCT</label>
				</div>
			</div>

			<div class="col-lg-8 col-lg-offset-4">
				 <div class="col-sm-2" style="padding-right: 90px">
					<div class="checkbox">
					  <label><input class="pilihandept kct<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="p" <?php if(in_array("p", $id_deptku)) {echo 'CHECKED';}; ?>>IT</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept kct<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="q" <?php if(in_array("q", $id_deptku)) {echo 'CHECKED';}; ?>>HC</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept kct<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="r" <?php if(in_array("r", $id_deptku)) {echo 'CHECKED';}; ?>>PAT</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept kct<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="s" <?php if(in_array("s", $id_deptku)) {echo 'CHECKED';}; ?>>GA</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept kct<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="t" <?php if(in_array("t", $id_deptku)) {echo 'CHECKED';}; ?>>Marketing </label>
					</div>	
					
				</div>

				<div class="col-sm-2" style="padding-right: 90px">
					<div class="checkbox">
					  <label><input class="pilihandept kct<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="u" <?php if(in_array("u", $id_deptku)) {echo 'CHECKED';}; ?>>Finance</label>
					</div>					
					<div class="checkbox">
					  <label><input class="pilihandept kct<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="v" <?php if(in_array("v", $id_deptku)) {echo 'CHECKED';}; ?>>Logistic</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept kct<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="e" <?php if(in_array("e", $id_deptku)) {echo 'CHECKED';}; ?>>Production</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept kct<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="x" <?php if(in_array("x", $id_deptku)) {echo 'CHECKED';}; ?>>SITAC</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept kct<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="y" <?php if(in_array("y", $id_deptku)) {echo 'CHECKED';}; ?>>Accounting</label>
					</div>
				</div>


				<div class="col-sm-4">
					
					
					<div class="checkbox">
					  <label><input class="pilihandept kct<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="z" <?php if(in_array("z", $id_deptku)) {echo 'CHECKED';}; ?>>Secretary</label>
					</div>
				</div>
			</div>
		</div>

		<hr>

		<div class="row jarak">
			<div class="col-lg-4">
				<div style="font-size: 20px">Departement WIKLAN:</div>
			</div>

			<div class="col-lg-8">
				<div class="checkbox">
				  <label><input id="allwiklan<?php echo $u->id_karyawan ?>" onclick="pilihdeptwiklan(<?php echo $u->id_karyawan ?>)" type="checkbox" value="">Pilih semua Dept. WIKLAN</label>
				</div>
			</div>

			<div class="col-lg-8 col-lg-offset-4">
				 <div class="col-sm-2" style="padding-right: 90px">
					<div class="checkbox">
					  <label><input class="pilihandept wiklan<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="22" <?php if(in_array("22", $id_deptku)) {echo 'CHECKED';}; ?>>IT</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wiklan<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="17" <?php if(in_array("17", $id_deptku)) {echo 'CHECKED';}; ?>>HC</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wiklan<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="18" <?php if(in_array("18", $id_deptku)) {echo 'CHECKED';}; ?>>GA</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wiklan<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="16" <?php if(in_array("16", $id_deptku)) {echo 'CHECKED';}; ?>>Marketing </label>
					</div>	
					
				</div>

				<div class="col-sm-2" style="padding-right: 90px">
					<div class="checkbox">
					  <label><input class="pilihandept wiklan<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="20" <?php if(in_array("20", $id_deptku)) {echo 'CHECKED';}; ?>>Finance</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wiklan<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="19" <?php if(in_array("19", $id_deptku)) {echo 'CHECKED';}; ?>>SITAC</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wiklan<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="21" <?php if(in_array("21", $id_deptku)) {echo 'CHECKED';}; ?>>Accounting</label>
					</div>
					<div class="checkbox">
					  <label><input class="pilihandept wiklan<?php echo $u->id_karyawan ?>" type="checkbox" name="dept[]" value="23" <?php if(in_array("23", $id_deptku)) {echo 'CHECKED';}; ?>>Secretary</label>
					</div>
				</div>
			</div>
		</div>

		<hr>

		<div class="row" style="padding-bottom: 5px">
				<div class="col-sm-4">
					Status :
				</div>

				<div class="col-sm-8">
					<label class="form-check-label"><input type="radio" class="form-check-input" name="status" value="Aktif"  <?php if($u->status == 'Aktif'){ echo 'checked="checked"' ;}; ?> /> Aktif &nbsp </label> 
					<label class="form-check-label"> <input type="radio" class="form-check-input" name="status" value="Blokir"  <?php if($u->status == 'Blokir'){ echo 'checked="checked"' ;}; ?> /> <span style="color: red">Blokir &nbsp</span></label>
					<label class="form-check-label"> <input type="radio" class="form-check-input" name="status" value="Cuti"  <?php if($u->status == 'Cuti'){ echo 'checked="checked"' ;}; ?> /> <span style="color: blue">Cuti</span></label>
				</div>
				
		</div>

		<div class="row">
				<div class="col-sm-4">
					Gambar :
				</div>

				<div class="col-sm-8">
					<input type="file" name="ft_profil">
				</div>
				
		</div>			
			<!--isi modal selesai!-->

		      </div>
		      <div class="modal-footer" style="background-color: #6db1ff">
		        <button type="button" style="font-family: 'Exo 2', sans-serif;" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="submit" id='checkBtn' style="font-family: 'Exo 2', sans-serif;" name="input"  class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
		<!--Modal selesai!-->
			                    <?php echo anchor('Karyawan/hapus/'.$u->id_karyawan,
			                    	'<button type="button" class="btn btn-default btn-sm">
							          <span class="glyphicon glyphicon-trash"></span>
							          	<text style="text-transform: capitalize;"> Hapus</text>  
							        </button>', array('class'=>'hapus', 'onclick'=>"return confirmDialog();")
							    ); ?>
			                   
							</td>


							</tr>
						<?php } } ?>
						</tbody>
			
		</table>

	</div>
	<br/>



	<div style="padding-bottom: 30px"></div>



	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
		$('#dataTables').DataTable();
	} );
	</script>

	<script type="text/javascript">
			function confirmDialog() {
		 return confirm('Apakah anda yakin akan menghapus data?')
		}
	</script>

	<script type="text/javascript">
	$(document).ready(function () {
	    $('#checkBtn').click(function() {
	      checked = $("input[type=checkbox]:checked").length;

	      if(!checked) {
	        alert("Anda harus memilih salah satu!");
	        return false;
	      }

	    });
	});

	</script>

	<script type="text/javascript">
	<!--
	 
	$(document).ready(function () {
	 
	window.setTimeout(function() {
	    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
	        $(this).remove(); 
	    });
	}, 4000);
	 
	});
	//-->
	</script>

	<!-- untuk checked all -->
	<script>

		// untuk checkbox all
		function pilihdeptmatch(a){
			if ($('#allmatch' + a).prop('checked')) {
		    	$('.match' + a).prop('checked', true);
		    	}
		    else {
		        $('.match' + a).prop('checked', false);
		    }
		}

		function pilihdeptwpi(a){
		    if ($('#allwpi' + a).prop('checked')) {
		    	$('.wpi' + a).prop('checked', true);
		    	}
		    else {
		        $('.wpi' + a).prop('checked', false);
		    }
		}

		function pilihdeptkct(a){
		    if ($('#allkct' + a).prop('checked')) {
		    	$('.kct' + a).prop('checked', true);
		    	}
		    else {
		        $('.kct' + a).prop('checked', false);
		    }
		}

		function pilihdeptwiklan(a){
		    if ($('#allwiklan' + a).prop('checked')) {
		    	$('.wiklan' + a).prop('checked', true);
		    	}
		    else {
		        $('.wiklan' + a).prop('checked', false);
		    }
		}

		$(document).ready(function () {

		    $('#checkBtn').click(function() {
		      checked = $("input[type=checkbox]:checked").length;

		      if(!checked) {
		        alert("Anda harus memilih salah satu Departement!");
		        return false;
		    	}
	    	});

		});
		
			

		
	</script>


	<script type="text/javascript" src="<?php base_url();?>assets/bootstrap/js/bootstrap.js"></script>
	<script src="assets/js/moment.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
</body>
</html>