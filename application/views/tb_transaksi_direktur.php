<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/extra.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<title>Halaman Transaksi</title>
	<!-- Icon Peringatan & Reward -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	                          <li><a href="<?php echo base_url(); ?>crud/tambah">Input New Project</a></li>
	                          <?php } ?>
	                          <li><a href="<?php echo base_url(); ?>crud/update">Acc Project (Goal) Dept</a></li>
	                          <li><a href="<?php echo base_url(); ?>crud/hapus_project">Hapus Project</a></li>
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
    <div class="row">
        <?php if ($this->session->flashdata('message_name')) { ?>
        	<center>
        	<div class="alert alert-info alert-dismissable col-md-4 col-md-offset-4">
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
    </div>
	<div>
	    
		<div style="padding-top: 100px">
		    
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1 style="text-align:center;">Form Acc Project (Goal)</h1>
				</div>
				<div class="panel-body">
					<form action="<?php echo base_url(). 'Crud/cari_data'; ?>" method="post">
						<div class="form-group">
					    	<label class="control-label col-sm-1" for="namaproject">Departemen:</label>
					    	<div class="col-sm-4">
					    		<select name="dept" id="dept" class="form-control input-md select2">
					    		    <option>--- Pilih Departement ---</option>
									<?php foreach ($isidept->result() as $key): ?>
										<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
									<?php endforeach ?>
								</select>
					    	</div>
					    	<label class="control-label col-sm-1" for="namaproject">Kota:</label>
					    	<div class="col-sm-4">
					    		<select name="cabang" id="cabang" class="form-control input-md select2">
					    		    <option>- Pilih Cabang -</option>
									<option value="SURABAYA">SURABAYA</option>
									<option value="JAKARTA">JAKARTA</option>
								</select>
					    	</div>
					    	<div class="col-sm-2">
					    		<button type="submit" class="btn btn-primary">Search</button>
					    		<a href="update" type="button" class="btn btn-primary">Refresh</a>
					    	</div>
					  	</div>
					</form><br><br>
					<div class="row">
					<div class="col-sm-12 table-responsive">
					<table id="dataTables" class="table table-bordered table-hover table-striped iki">
		    			<thead>
			    			<tr style="background-color: #e22639; color:white;">
			    				<!--<th>No</th>-->
			    				<th>Nama Project</th>
			    				<th>Departemen</th>
			    				<th>PIC</th>
			    				<th class="col-md-2">Start Project</th>
			    				<th class="col-md-1">End Project &nbsp (Deadline)</th>
			    				<th class="col-md-2">Progress Project</th>
			    				<th class="col-md-2">Status</th>
			    				<th class="col-md-2">Peringatan Project</th>
			    				<th class="col-md-2">Reward Project</th>
			    				<th class="col-md-2">Acc</th>
			    				<th>Approved</th>
			    				<th style="display:none;">aaaa</th>
			    			</tr>
		    			</thead>
		    			<tbody>
		    			    <?php 
		                         foreach($dataproject as $d){ 
		                    ?>
		    				
		    				 <tr>
		    					<!--<td><?php echo $d->id ?></td>-->
    					        <td><?php echo $d->project ?></td>
    					        <td><?php echo $d->nama_dept ?></td>
    					        <td><?php echo $d->pic ?></td>
    					        <td><?php echo $d->project_start ?></td>
    					        <td><?php echo $d->project_end ?></td>
    					        <td><?php echo $d->progress ?></td>
    					        <form action="<?php echo base_url(). 'Crud/update_aksi'; ?>" method="post">
    					        	<input type="hidden" name="tgl_end" value="<?php echo $d->project_end; ?>">
		    					<td>
		    					    <div class="input-group">
		    					        <span class="input-group-addon"> <i class="glyphicon glyphicon-gift" aria-hidden="true"></i></span>
		    					        <select name="status" id="status" class="form-control input-md select2">
		    					                <?php if ($d->status == "Selesai") { echo '
		    					                <option value="">Pilihan</option>
									        	<option selected="selected" value="Selesai">Selesai</option>
										        <option value="Belum Selesai">Belum Selesai</option>
										        <option value="PENDING">PENDING</option>' ;} else
										        if ($d->status == "Belum Selesai") { echo '
										        <option value="">Pilihan</option>
									        	<option value="Selesai">Selesai</option>
										        <option selected="selected" value="Belum Selesai">Belum Selesai</option>
										        <option value="PENDING">PENDING</option>' ;} else
										        if ($d->status == "PENDING") { echo '
										        <option value="">Pilihan</option>
									        	<option value="Selesai">Selesai</option>
										        <option value="Belum Selesai">Belum Selesai</option>
										        <option selected="selected" value="PENDING">PENDING</option>' ;} else
										        {echo '
										        <option value="">Pilihan</option>
										        <option value="Selesai">Selesai</option>
										        <option value="Belum Selesai">Belum Selesai</option>
										        <option value="PENDING">PENDING</option>' ;    
										        }
										        ?>
									    </select>
									</div>
                                </td>
                                <td>
    					            <div class="input-group">
		    					         <span class="input-group-addon"><i class="material-icons" style="font-size:15px;color:red">warning</i></span>
					    		         <input type="text" class="form-control" name="peringatan" id="peringatan" placeholder="Peringatan" value="<?php echo $d->peringatan ?>">
					    	        </div>
		    					</td>
                                <td>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-gift" style="font-size:15px;color:blue"></i></span>
                                        <input type="text" class="form-control" name="reward" id="reward" placeholder="Reward" value="<?php echo $d->reward ?>">
                                    </div>
		    					</td>
		    					<?php
                                     if ($d->approved==1) {
                                        echo   '<td><span class="label label-success"><span class="glyphicon glyphicon-ok"></span></span>
                                        </td>';
                                     }else {echo   '<td><span class="label label-success"></span>
                                        </td>';}
                                ?>
                                <td>
									<!-- <button type="submit" style="font-size:9px;color:green">ACC<i class="material-icons" style="font-size:9px;color:green">offline_pin</i></button> -->

									<button type="button" class="btn btn-warning" style="padding-bottom:15px"  data-toggle="modal" data-target="#myModalsend<?php echo $d->id ?>">ACC <i class="material-icons" style="color:white">offline_pin</i></button>

									<!-- Modal send -->
									<div class="modal fade" id="myModalsend<?php echo $d->id ?>" role="dialog" style="padding-top: 100px;">
										<div class="modal-dialog modal-sm">
										  <div class="modal-content">
										    <div class="modal-header">
										      <button type="button" class="close" data-dismiss="modal">&times;</button>
										      <h4 class="modal-title">Konfirmasi ACC</h4>
										    </div>
										    <div class="modal-body" style="background-color: #2372ef; ">
										    
										      <p style="text-align: center; color: white;">Yakin Acc Project?</p>
										    
										    </div>
										    <div class="modal-footer">
										      <input type="submit" name="input" style="margin-top:5px" class="btn btn-primary" value="Acc"> 
										      <button type="button" class="btn btn-primary" style="margin-top:5px" data-dismiss="modal">Batal</button>
										    </div>
										  </div>
										</div>
									</div>
									<!-- Modal send selesai-->
									
								</td>
								<td style="display:none;"><input type="hidden" name="id" value="<?php echo $d->id ?>"></td>
                                </form>
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
    <!--content-->
    <!--footer-->
    <div>
        <center>
        <tr<td><b>Intime   =</b> Selesai Sebelum Deadline |</td></tr>
        <tr><td><b>Ontime   =</b> Selesai Sesuai Deadline |</td></tr>
        <tr><td><b>Overtime =</b> Selesai Melebihi Deadline |</td></tr>
        <tr><td><b>Pending  =</b> Sesuai Kebijakan BOD </td></tr>
        </center>
    </div>
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
        order : [[0,'asc']]
    });
  } );
  </script>
</body>
</html>