<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/extra.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
  	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	 <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<title>Halaman Transaksi</title>
	<!-- datatable -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
	<style>
        .iki.table-striped>tbody>tr:nth-child(odd)>td, 
        .iki.table-striped>tbody>tr:nth-child(odd)>th {
        background-color: #1452b7; color:white;
        }
   </style>
</head>
<body class="bg semua" style="font-family: 'Raleway', sans-serif;">
	<!-- mulai navbar -->
	    <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#113672;">
	      <div class="container"> 
	          <div class="navbar-header">
	              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span> 
	              </button>
	              <a class="navbar-brand" href="#"><img style="height:75px;width:150px" class="img-responsive" src="<?php echo base_url()?>assets/img/LogoProject.png"></a>
	          </div>
	          <div class="collapse navbar-collapse">
	              <ul class="nav navbar-nav">
	                  <li ><a href="<?php base_url(); ?>index" style="color: white" ><span class="glyphicon glyphicon-time"></span> Reminder</a></li>
	                   <li class="dropdown">
	                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white">Menu
	                      <span class="caret"></span>
	                      </a>
	                      <ul class="dropdown-menu">
		                      	<?php if ($this->session->userdata('level') != 5 ) { ?>
	                          <li><a href="<?php echo base_url(); ?>crud/home">Main Dashboard</a></li>
	                          <?php if ($this->session->userdata('level') != 2 AND  $this->session->userdata('level') != 11 AND $this->session->userdata('level') != 10 ) { ?>
	                          <li><a href="<?php echo base_url(); ?>crud/tambah">Input New Project</a></li>
	                          <?php } ?>

	                        <?php } ?>
	                        <?php if ($this->session->userdata('level') == 5 || $this->session->userdata('level') == 1 ) { ?>
	                          <li><a href="<?php echo base_url(); ?>crud/update">Acc Project (Goal) Dept</a></li>
	                          <li><a href="<?php echo base_url(); ?>crud/hapus_project">Hapus Project</a></li>
	                        <?php } ?>
	                      </ul>
	                   </li>              
	               </ul>
	              <ul class="nav navbar-nav navbar-right">
	                  <li class="dropdown">
	                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white">
	                          <span class="glyphicon glyphicon-user"></span> 
	                          <strong><?php echo $this->session->userdata('username'); ?></strong>
	                          <span class="glyphicon glyphicon-chevron-down"></span>
	                      </a>
	                      <ul class="dropdown-menu">
	                          <li>
	                             <a href="<?php echo base_url();?>" style=" margin: 0px 25px ">
	                              <span class="glyphicon glyphicon-home"></span> Home E-Match</a> 
	                          </li>
	                          <li>
	                             <a href="<?php echo base_url();?>login/logout" style=" margin: 0px 25px "><span class="glyphicon glyphicon-log-out"></span> Logout</a> 
	                          </li>
	                      </ul>
	                  </li>
	              </ul>
	          </div>
	      </div>
	  </div>
	  <!-- selesai navbar -->
    <!--content-->
	<div class="row clearfix">
	    
		<div class="col-lg-12" style="padding-top: 100px">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 style="text-align:center;">Project New Time Table</h1>

					<!-- tampilkan flash -->
					<?php if ($this->session->flashdata('message_name')) { ?>
			        	<center>
			        	<div class="alert alert-success alert-dismissable col-md-4 col-md-offset-4" style="background-color: green; color: white">
			                 <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			                 <?= $this->session->flashdata('message_name') ?>
			          	</div>
			          	</center>
			        <?php } ?>
			        
			        <script type="text/javascript">
			        $(document).ready(function () {
			         
			        window.setTimeout(function() {
			            $(".alert").fadeTo(1500, 0).slideUp(500, function(){
			                $(this).remove(); 
			            });
			        }, 5000);
			         
			        });
			        </script>
			        <!-- tampilkan flash -->
				</div>
				<div class="panel-body">
					<form class="form-horizontal" action="<?php echo base_url(). 'crud/tambah_aksi'; ?>" method="post">
						<div class="form-group">
					    	<label class="control-label col-sm-2" for="namaproject">Nama Project (Goal):</label>
					    	<div class="col-sm-10">
					    		<input type="text" class="form-control" name="namaproject" id="namaproject" placeholder="Project Name" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-sm-2" for="Departemen">Departemen:</label>
					    	<div class="col-sm-10">
					      		<select name="dept" id="dept" class="form-control input-md select2" required>
					      			<option value="">-- Pilih Dept --</option>
									<?php foreach ($isinamadept->result() as $key): ?>
									<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
									<?php endforeach ?>

					      		    <!-- <option>--- Pilih Departement ---</option>
									<?php foreach ($isidept->result() as $key): ?>
										<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
									<?php endforeach ?> -->
								</select>
					    	</div>
					  	</div>
					  	
					  	<div class="form-group">
					    	<label class="control-label col-sm-2 " for="start">Project Start:</label>
					    	<div class="col-sm-10">
					    		<div class='input-group date' id='datetimepicker1'>     
									<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
									</span>
									<input type='text' class="form-control input-group-addon" placeholder="Start" name="start" id="start" required>
								</div>

					      		<!-- <div class="input-group">
					      		<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					      		<input type="date" class="form-control" name="start" id="start" placeholder="yyyy-mm-dd" required>
					      		</div> -->
						    </div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-sm-2" for="end">Project End:</label>
					    	<div class="col-sm-10">
					    		<div class='input-group date' id='datetimepicker2'>     
									<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
									</span>
									<input type='text' class="form-control input-group-addon" placeholder="End" name="end" id="end" required>
								</div>
					      		<!-- <div class="input-group">
					      		<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					      		<input type="date" class="form-control" name="end"id="end" placeholder="yyyy-mm-dd" required>
					      		</div> -->
						    </div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-sm-2" for="pic">PIC:</label>
					    	<div class="col-sm-10">
					    		<input type="text" class="form-control" name="pic" id="pic" placeholder="PIC Name" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-sm-2" for="progress">Progress Project:</label>
					    	<div class="col-sm-10">
					    		<textarea style="resize:vertical;" rows="5" class="form-control" name="progress" id="progress" placeholder="Progress"></textarea>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-sm-2" for="Cabang">Cabang:</label>
					    	<div class="col-sm-10">
					      		<select name="cabang" id="cabang" class="form-control input-md select2">
					      		    <option>- Pilih Cabang -</option>
									<option value="JAKARTA">Jakarta</option>
									<option value="SURABAYA">Surabaya</option>
								</select>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<div class="col-sm-offset-2 col-sm-10">
					      		<button type="submit" class="btn btn-primary">Save</button>
					      		<button type="submit" class="btn btn-default">Cancel</button>
					    	</div>
					  	</div>
					</form>

					
					<table id="dataTables" class="table table-bordered table-hover table-striped iki">
		    			<thead>
			    			<tr style="background-color: #e22639; color:white;">
			    				<!--<th>No</th>-->
			    				<th>Nama Project</th>
			    				<th>Departemen</th>
			    				<th>PIC</th>
			    				<th>Start Project</th>
			    				<th>End Project &nbsp (Deadline)</th>
			    				<th>Progress Project</th>
			    				<th>Cabang</th>
			    				<th>Selesai</th>
			    				<th>Action</th> 
			    			</tr>
		    			</thead>
		    			<tbody>
		    			    <?php 
		                         foreach($dataproject as $d){ 
		                    ?>
		    				<tr>
		    				    <form action="<?php echo base_url(). 'Crud/update_aksi_project'; ?>" method="post">
		    				        <input type="hidden" name="id" value=<?php echo $d->id ?>>
		    					<!--<td><?php echo $d->id ?></td>-->
    					        <td><input type="text" class="form-control" name="namaproject1" id="namaproject1" placeholder="Project Name" value="<?php echo $d->project ?>" required></td>
    					        <!--<td><input type="text" class="form-control" name="dept1" id="dept1" placeholder="Department Name" value="<?php echo $d->dept ?>" required></td>-->
    					        <td>
					      		<select name="dept1" id="dept1" class="form-control input-md select2" required>
					      			<option value="">-- Pilih Dept --</option>
									<?php foreach ($isinamadept->result() as $key): ?>
									<option value="<?php echo $key->id_dept;?>" 
										<?php if($key->id_dept == $d->dept) {echo 'selected' ;} ?> >
										<?php echo $key->nama_dept;?></option>
									<?php endforeach ?>
									<!-- <option><?php echo $d->nama_dept ?></option>
									<?php foreach ($isidept->result() as $key): ?>
										<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
									<?php endforeach ?> -->
								</select>
					    	    </td>
    					        <td><input type="text" class="form-control" name="pic1" id="pic1" placeholder="PIC Name" value="<?php echo $d->pic ?>" required></td>
    					        <td><?php echo $d->project_start ?></td>
    					        <td><?php echo $d->project_end ?></td>
    					        <td><input type="text" class="form-control" name="progress1" id="progress1" placeholder="Progress" value="<?php echo $d->progress ?>"></td>
    					        <!--<td><input type="text" class="form-control" name="cab1" id="cab1" placeholder="Cabang" value="<?php echo $d->cabang ?>" required></td>-->
                                <td>
                                    <select name="cab1" id="cab1" class="form-control input-md select2" required>
					      		           <!-- <option><?php echo $d->cabang ?></option> -->
					      		           <option value="">-- Pilih Cabang --</option>
									       <option value="JAKARTA" <?php if($d->cabang == 'JAKARTA') {
									       	echo 'selected';
									       } ?>>Jakarta</option>
									       <option value="SURABAYA" <?php if($d->cabang == 'SURABAYA') {
									       	echo 'selected';
									       } ?>>Surabaya</option>
								    </select>
                                </td>
                                <?php
                                     if ($d->approved==1) {
                                        echo   '<td><span class="label label-success"><span class="glyphicon glyphicon-ok"></span></span>
                                        </td>';
                                     }else {echo   '<td><span class="label label-success"></span>
                                        </td>';}
                                ?>
                                <td>
									<button type="submit" style="color:black"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span></button>
								</td>
                                </form>
                                
		    				</tr>
		    				<?php } ?>
		    			</tbody>
		    		</table>
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
					<p style="text-align:center; margin-bottom: 0px;">Hak Cipta @2016 Designed by Match Ad</p>
				</div>
			</div>
		</div>
	</div>
	<!--footer-->
	 <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#dataTables').DataTable({
        "bLengthChange": false,
        "bFilter": false,
        "bInfo" : false,
        "paging": false
    });
  } );
  </script>

  <!-- datepicker -->
  <script src="<?php echo base_url();?>assets/js/moment.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>

  <script>
  	$(function () {
				   $('#datetimepicker1').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'DD-MMM-YYYY'
					});         
				});
  	$(function () {
				   $('#datetimepicker2').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'DD-MMM-YYYY'
					});         
				});
  </script>
  <!-- datetimepicker -->
  

</body>
</html>