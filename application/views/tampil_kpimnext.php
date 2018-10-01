<!DOCTYPE html>
<html lang="en">
<head>

<title>KPIM Online - Plan Next</title>
<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/metisMenu/metisMenu.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>!-->
<link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>

<!--font google!-->
<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- <script src="bootstrap-confirm-delete.js"></script> -->

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

</head>
<style type="text/css">
	@media screen and (max-width: 1024px) {
      .jarak {
        margin-bottom: 10px;
      }
      .test {
    	background-color: #eee;
   	 }
    }
    .blink {
    animation-duration: 1s;
    animation-name: blink;
    animation-iteration-count: infinite;
    animation-timing-function: steps(2, start);
	}
	@keyframes blink {
	    0% {
	        opacity: 1;
	    }
	    80% {
	        opacity: 1;
	    }
	    81% {
	        opacity: 0;
	    }
	    100% {
	        opacity: 0;
	    }
	}

	button {
		font-family: 'Exo 2', sans-serif !important;
	}

	select#konten {
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    text-indent: 1px;
	    text-overflow: '';
	}
</style>
<body class="bg semua">
<?php 
date_default_timezone_set('Asia/Jakarta');
 ?>

	<!---Mulai navbar account!-->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	    <div class="container-fluid"> 
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span> 
	            </button>
	            <!--<?php print_r($this->session->all_userdata());?>!-->
	            <a href="<?php echo base_url();?>home" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> KPIM Online.</a>
	        </div>
	        <div class="collapse navbar-collapse">
	            <ul class="nav navbar-nav">
	                <li ><a href="<?php echo base_url();?>kpimmingguan">KPIM Mingguan</a></li>
	                <li class="active"><a href="#">KPIM Plan Next</a></li>
	                		<li class="dropdown">
                				<?php
									foreach ($inboxblmbaca as $total)
									foreach ($noteblmbaca as $totalnote)
									foreach ($planblmbaca as $totalplan)
									foreach ($noteplan as $totalnoteplan) { 
								?>

			                    <a href="#" class="dropdown-toggle test" data-toggle="dropdown"><text class="blink">Notifikasi</text>
			                    <span class="caret"></span>
			                     <?php if(isset($totalnote->jumlah)){ ?> 
			                    <text style="background-color: orange; color: white; border-radius: 5px; padding: 5px 5px;  margin-right: 3px; text-align: center;">
			                        
								<?=$totalnote->jumlah?> <span class="glyphicon glyphicon-pencil"></span> 	
								</text>

			                    <?php } ?>

			                    <!-- batas -->

			                    <?php if(isset($totalplan->jumlah)){ ?> 
			                    <text style="background-color: #ce0808; color: white; border-radius: 5px; padding: 5px 5px;  margin-right: 3px; text-align: center;">
			                        
								<?=$totalplan->jumlah?> <span class="glyphicon glyphicon-remove"></span> 	
								</text>

			                    <?php } ?>			                    

			                    <!-- batas -->

			                    <?php if(isset($totalnoteplan->jumlah)){ ?> 
			                    <text style="background-color: orange; color: white; border-radius: 5px; padding: 5px 5px;  margin-right: 3px; text-align: center;">
			                        
								<?=$totalnoteplan->jumlah?> <span class="glyphicon glyphicon-pencil"></span> 	
								</text>

			                    <?php } ?>			                    

			                    <!-- batas -->

			                    <?php if(isset($total->jumlah)){ ?> 
			                    <text style="background-color: black; color: white; border-radius: 5px; padding: 5px 5px;  margin-right: 3px; text-align: center;">
			                        
								<?=$total->jumlah?> <span class="glyphicon glyphicon-envelope"></span> 	
								</text>

			                    <?php } ?>
			                    </a>
			                    <ul class="dropdown-menu"> 
			                        <li><a href="<?php echo base_url(); ?>kpimmingguan/replykpim">KPIM Mingguan
			                        <?php if(isset($totalnote->jumlah)){ ?>


			                       	<div style="background-color: orange; color: white; border-radius: 5px; padding: 5px 5px; text-align: center;">
			                        
									<?=$totalnote->jumlah?> <span class="glyphicon glyphicon-pencil"></span> Catatan Baru
									
									</div>
									<?php }?>
			                        </a></li>
			                        <li><a href="<?php echo base_url(); ?>kpimmingguan/replykpimnext">KPIM Plan Next
			                        <?php if(isset($totalplan->jumlah)){ ?>


			                       	<div style="background-color: #ce0808; color: white; border-radius: 5px; padding: 5px 5px; text-align: center;">
			                        
									<?=$totalplan->jumlah?> <span class="glyphicon glyphicon-remove"></span> Plan tidak disetujui
									
									</div>
									<?php }?>

									<!-- ganti -->

									<?php if(isset($totalnoteplan->jumlah)){ ?>


			                       	<div style="background-color: orange; color: white; border-radius: 5px; padding: 5px 5px; text-align: center;">
			                        
									<?=$totalnoteplan->jumlah?> <span class="glyphicon glyphicon-pencil"></span> Catatan pada Plan
									
									</div>
									<?php }?>
			                        </a></li>
			                        <li><a href="<?php echo base_url(); ?>kpimmingguan/pesan">Pesan
			                        
									<?php if(isset($total->jumlah)){ ?>


			                       	<div style="background-color: black; color: white; border-radius: 5px; padding: 5px 5px; text-align: center;">
			                        
									<?=$total->jumlah?> <span class="glyphicon glyphicon-envelope"></span> Pesan Baru
									
									</div>
									<?php }?>
									</a>

									<?php }?>


			                        </li>
			                    </ul>
			                 </li>
	                <a class="btn btn-primary navbar-btn" href="<?php echo base_url(); ?>kpimmingguan/jadwal" style="font-family: 'Exo 2', sans-serif; margin-left: 5px ">Jadwal Pengumpulan KPIM</a>
	                 <?php 
				if ($this->session->userdata('level') == 1 ) {
					$base = base_url();
					echo '<li class="dropdown">
			                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Data Karyawan
			                    <span class="caret"></span>
			                    </a>
			                    <ul class="dropdown-menu"> 
			                        <li><a href="'.$base.'Addkaryawan">Tambah Karyawan</a></li>
			                        <li><a href="'.$base.'Karyawan">Data Karyawan</a></li>
			                    </ul>
			                 </li>';
			}
			?>
	                 <!--<li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">DropDown
	                    <span class="caret"></span>
	                    </a>
	                    <ul class="dropdown-menu">
	                        <li><a href="#">Link 2</a></li>
	                    </ul>
	                 </li>!-->
	             </ul>
	            <ul class="nav navbar-nav navbar-right">
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                        <!-- <span class="glyphicon glyphicon-user"></span>  -->
	                        <span style="position: absolute; margin-left: -40px; margin-top: -3px"><?php
								foreach ($profilku as $row) { 
							?>	
							<?php $alamatfoto =  $row->img; 
							if (empty($alamatfoto)) {
								$alamatfoto = 'kosong.png';
							}?>
                            <!-- <span class="glyphicon glyphicon-user icon-size"></span> -->
                            <img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $alamatfoto; ?>" alt="<?php echo $row->username; ?>" title="Foto <?php echo $row->username; ?>" style=" border-radius: 50%; width: 2em; height: auto;">
                            <?php } ?>
                            </span>
	                        <strong><?php echo $this->session->userdata('username'); ?></strong>
	                        <span class="glyphicon glyphicon-chevron-down"></span>
	                    </a>
	                    <ul class="dropdown-menu" style="width: 250px">
	                        <li>
	                            <div class="navbar-login">
	                                <div class="row">
	                                    <div class="col-lg-4">
	                                        <p class="text-center">
	                                             <?php
													foreach ($profilku as $row) { 
												?>	
												<?php $alamatfoto =  $row->img; 
												if (empty($alamatfoto)) {
													$alamatfoto = 'kosong.png';
												}?>
	                                            <!-- <span class="glyphicon glyphicon-user icon-size"></span> -->
	                                            <img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $alamatfoto; ?>" alt="<?php echo $row->username; ?>" title="Foto <?php echo $row->username; ?>" style=" border-radius: 50%; border: solid 3px gray; margin-left: 10px">
	                                            <?php } ?>
	                                        </p>
	                                    </div>
	                                    <div class="col-lg-8">
	                                        <p class="text-left" style="max-width: 120px"><strong><?php echo $this->session->userdata('nama_karyawan'); ?></strong></p>
	                                        <p class="text-left small" style="max-width: 120px">
	                                        	<?php
													foreach ($jabatan->result() as $row) { 
												?>		
													<i><?php echo $row->nama_akses; ?></i>
												<?php	}
												?>
												-
												<?php
													foreach ($dept->result() as $row) { 
												?>		
													<b><?php echo $row->deptini; ?></b>
												<?php	}
												?>

	                                        </p>
	                                        <!--<p class="text-left">
	                                            <a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
	                                        </p>!-->
	                                    </div>
	                                </div>
	                            </div>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <div class="navbar-login navbar-login-session">
	                                <div class="row">
	                                    <div class="col-lg-8">
	                                        <p>
	                                            <a href="<?php base_url();?>login/logout" class="btn btn-danger btn-block" style="font-family: 'Exo 2', sans-serif; margin: 0px 25px ">Logout</a>
	                                        </p>
	                                    </div>
	                                </div>
	                            </div>
	                        </li>
	                    </ul>
	                </li>
	            </ul>
	        </div>
	    </div>
	</div>
	<!--selesai navbar-->

<div class="container" style="width:95%">
	<div class="background">
		<h1 style="padding-top: 20px"><center>KPIM Online - Plan Next</center></h1><br><br>

		<?php if ($this->session->flashdata('hari_libur')) { ?>
			<div class="alert alert-danger alert-dismissable">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		    <?= $this->session->flashdata('hari_libur') ?>
		  	</div>
		    
		<?php } ?>
	
		<div class="row">
			<div class="col-lg-4 text-left" style="margin-left: 5px">
				<h4><strong>
				<span class="glyphicon glyphicon-user"></span> Nama  &nbsp &nbsp &nbsp&nbsp: &nbsp<?php echo $this->session->userdata('nama_karyawan'); ?>
				</strong></h4>
				<h4><strong>
				<span class="glyphicon glyphicon-briefcase"></span> Jabatan &nbsp  : &nbsp<?php echo $this->session->userdata('jabatannya'); ?>
				</strong></h4>
			</div>
		</div>
		

	<form id="form_kpim" action="<?php base_url();?>kpimmingguannext/create" method="POST">
		<div class="row">
			<div class="col-lg-5 text-left" style="margin-left: 5px">
				<h4><strong>Rencana Mingguan : </strong></h4>

			</div>
		</div>

		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
					<div class='input-group date' id='datetimepicker1'>     
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' class="form-control input-group-addon" name="tgl" placeholder="Tanggal" required/>
					</div>

				</div>
				
			</div>
		</div>
		<div class="row">

    	<div class="col-lg-4">
				<div class="form-group">
					<select name="tgs_dept"  id="pilihdept" class="form-control" required oninvalid="this.setCustomValidity('Pilih terlebih dahulu')" oninput="setCustomValidity('')">
						<option value="">-- Pilih Dept --</option>
						<?php foreach ($isinamadept->result() as $key): ?>
						<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
						<?php endforeach ?>
					</select>

					<div id="jdl_konten" class="text-left" style="margin:0px 0 0 5px; display: none">
					Goal/Pekerjaan :
					</div>

					<!-- <select id="konten" class="form-control" name="goals" id="" style="display: none" required>
						<option value="">-- Pilih Goal/Pekerjaan --</option>
						<?php foreach ($selectbobot as $sb) { ?>

						<option value="<?php echo $sb->nama . 'pisah' . $sb->bobot?> "><?php echo $sb->nama ?></option>		
						<?php } ?>
					</select>
					<button id="open" type="button" class="btn btn-sm btn-primary" onclick="bukakdept()" style="display: none">Open</button> -->

					<div class="input-group">
			            <select id="konten" class="form-control" name="goals" id="" style="display: none" required>
							<option value="">-- Pilih Goal/Pekerjaan --</option>
							<?php foreach ($selectbobot as $sb) { ?>

							<option value="<?php echo $sb->nama . 'pisah' . $sb->bobot?> "><?php echo $sb->nama ?></option>		
							<?php } ?>
						</select>
			            <span class="input-group-btn">
			                <button id="open" type="button" class="btn btn-primary" onclick="bukakdept()" style="display: none; text-transform: capitalize; ">Open</button>
			            </span>
			        </div>


				</div>

			</div>
  
			<!--tanggal-->
			

		
			<!--goal-->
			<!-- <div class="col-lg-4">
				

				<select id="konten" class="form-control" name="goals" id="">
					<option value="">-- Pilih Goal/Pekerjaan --</option>
					<?php foreach ($selectbobot as $sb) { ?>

					<option value="<?php echo $sb->nama . 'pisah' . $sb->bobot?> "><?php echo $sb->nama ?></option>		
					<?php } ?>
				</select>
			</div> -->
			<!--action-->
			<div class="col-md-5">
				<!--input type='text' class="form-control" name="action" placeholder="Action"/-->
				<textarea class="form-control jarak" rows="4" cols="40" placeholder="Description" name="action" id="action" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
			</div>
			

				<!--<div id='datetimepicker_tgledit'>
							<input id="MyDate<?php echo $u->id ?>" value="<?php echo $u->tgl ?>" type='text' class="form-control" name="tgledit" placeholder="Tanggal" disabled/> 
						</div>
			<!--Dateline-->
			<div class="col-lg-2">
				<div class="form-group">
					<div class='input-group date' id='datetimepicker4'>     
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' class="form-control input-group-addon" placeholder="Deadline" name="deadline" id="deadline"  required>
					</div>
					<br>
					<button type="submit" style="font-family: 'Exo 2', sans-serif; " name="input" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> Tambah Data</button>
				</div>
			</div>
			

			
			<!-- 
			<div class="col-lg-2">
			<button type="submit" style="font-family: 'Exo 2', sans-serif; " name="input" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> Tambah Data</button>
			</div> -->
		</div>
		</form>	

		<script>
			$('#pilihdept').change(function()
	        {	
	        	bukakdept();
	            //Ajax Load data from ajax
	            $.ajax({
	                url : "<?php echo site_url('karyawan/ambildatabobotkpim')?>",
	                type: "POST",
	                data: {pilihdept:$('#pilihdept').val()},
	                dataType: "JSON",
	                success: function(data)
	                { 
	                	$('#konten').empty();

	                	// document.getElementById('konten'); itu sama dengan $('#konten')[0]

                		var select = $('#konten')[0];
                		option = document.createElement('option');
                        option.value = '';
                        option.text = '--- Pilih salah satu ---';
                        select.add(option);

	                    for (var i = 0; i < data.length; i++) {
	                     	option = document.createElement('option');
	                        option.value = data[i]["nama"] + 'pisah' + data[i]["bobot"]
	                        option.text = data[i]["nama"];
	                       	select.add(option)
	                    }
	                    // $('#tabel_bobot').DataTable();
	                },
	                error: function (jqXHR, textStatus, errorThrown)
	                {
	                    alert('Error get data from ajax');
	                }
	            });
	        });
		</script>

		<!-- Modal -->
		  <div class="modal fade" id="pilihGoal" role="dialog">
		    <div class="modal-dialog modal-lg">
		      <div class="modal-content">
		        <div class="modal-header" style="">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Pilih Goal / Pekerjaan</h4>
		        </div>
		        <div class="modal-body">
		          	<div class="table-responsive">
						<table id="dataTables2" class="table table-bordered table-hover table-striped">
							<thead class="text-center" style="background-color: #6db1ff">
							  <tr>
								<th style="text-align: center;">No</th>
								<th style="text-align: center;">Dept</th>
								<th style="text-align: center; min-width: 500px">Goal/Pekerjaan</th>
								<th style="text-align: center;">Description</th>
							  </tr>
							</thead>
							<tbody id="isigoal">
								
								
							</tbody>
						</table>
					</div>							
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		    </div>
		  </div>
		<!-- selesai modal -->

		<script>
			function bukakdept(iddept){
				$('#pilihGoal').modal('show');
				$('#dataTables2').DataTable().destroy();

				$.ajax({
	                url : "<?php echo site_url('karyawan/ambildatabobotkpim/')?>",
	                type: "POST",
	                data: {pilihdept:$('#pilihdept').val()},
	                dataType: "JSON",
	                success: function(data)
	                { 
	                	$('#isigoal').empty();


	                	// document.getElementById('konten'); itu sama dengan $('#konten')[0]

	                    for (var i = 0; i < data.length; i++) {
	                    	var tes = data[i]['nama'];
	                     	var tr = $('<tr>').append(
	                     		$('<td>'+(i+1)+'</td>'),
	                     		$('<td>'+ data[i]['nama_dept'] +'</td>'),
	                     		$('<td>'+ data[i]['nama'] +'</td>'),
	                     		
	                     		$('<td><button class="btn btn-sm btn-primary" type="button" onclick="pick_goal(\''+ data[i]['nama']+ 'pisah' + data[i]['bobot'] +'\')" data-dismiss="modal">Pilih</button></td>')
	                     		).appendTo('#isigoal');


	                    }
					$('#dataTables2').DataTable({
				        "lengthMenu": [[20, 30, 50, -1], [20, 30, 50, "All"]]
				    });
					// $('#dataTables2').DataTable().ajax.reload();

	                },
	                error: function (jqXHR, textStatus, errorThrown)
	                {
	                    alert('Error get data from ajax');
	                }
	            });

	            


			}

			function pick_goal(idbobot){

				document.querySelector('#konten [value="' + idbobot +'"]').selected=true;

				// $('#konten select option [value=' + idbobot + ']').attr('selected','selected');

			}
		</script>

		<br/>
		<div id='div1' class="row">
			<div class="col-lg-12 table-responsive">
				<table id="dataTablenext" class="table table-bordered table-hover table-striped">
					<thead class="text-center" style="background-color: #6db1ff">
					  <tr>
						<th style="text-align: center;">No</th>
						<th style="text-align: center;">Hari/Tanggal</th>
						<th style="text-align: center;">Goal</th>
						<th style="text-align: center;">Description</th>
						<th style="text-align: center;">Deadline</th>
						<th style="text-align: center;">Departement</th>
						<th style="text-align: center;">Action</th>
					  </tr>
					</thead>
					<tbody >
					<?php 
					$no = 1;
					foreach($table as $u){ 
					?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo nama_hari($u->tgl).', '. tgl_indo($u->tgl)?></td>
							<td style="max-width: 200px; word-wrap: break-word; overflow: auto;"><?php echo $u->nama_goals ?></td>
							<td style="max-width: 200px; word-wrap: break-word; overflow: auto;"><?php echo $u->action ?></td>		
							<td><?php echo nama_hari($u->deadline).', '. tgl_indo($u->deadline)?></td>
							<td><?php echo $u->nama_dept ?></td>
							<td width="200px">
									<button data-toggle="modal" data-target="#myModal<?php echo $u->id ?>" type="button" class="btn btn-default btn-sm">
							          <span class="glyphicon glyphicon-edit"></span> 
							          <text style="text-transform: capitalize;"> Edit</text> 


							        </button>
			
		<!-- Modal -->
		<div class="modal fade" id="myModal<?php echo $u->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header" style="background-color: #6db1ff">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit</h4>
		      </div>
		      <div class="modal-body">
		      
		     <!--isi modal!-->

		<form id="form_kpim" action="<?php base_url();?>kpimmingguannext/update/<?php echo $u->id ?>" method="POST">
		    <div class="row">
			  	<div class="col-sm-4">
					<div class="col-lg-8">
						<h4>Tanggal :</h4>
					</div>
			 	</div>
				<div class="col-sm-8">
					<div class="col-lg-8 ">
						<div class='input-group date' id='edittgl<?php echo $u->id ?>'>     
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' value="<?php echo $u->tgl ?>" class="form-control input-group-addon" name="tgledit" placeholder="Tanggal" required/>
						</div>



						<!-- <div id='datetimepicker_tgledit'>
						<div class="col-sm-8" style="margin: 5px 5px 0px 0px"><?php echo date("d-m-Y", strtotime($u->tgl)) ?></div>
							<input id="MyDate<?php echo $u->id ?>" value="<?php echo $u->tgl ?>" type='hidden' class="form-control" name="tgledit" placeholder="Tanggal" /> 
						</div> -->
					</div>
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4">
					<div class="col-lg-8">
						<h4>Dept :</h4>
					</div>
			 	</div>
				<div class="col-sm-8">
					<div class="col-lg-8 ">
						<select id="deptedit<?php echo $u->id ?>" name="tgs_dept" class="form-control">
						<?php foreach ($isinamadept->result() as $key): ?>
						<option value="<?php echo $key->id_dept;?>" <?php if ($key->id_dept == $u->tgs_dept) { echo 'selected' ;}; ?>> <?php echo $key->nama_dept;?></option>
						<?php endforeach ?>
						</option>
					</select>
						<!--<textarea class="form-control" rows="5" id="goal" name="goaledit"></textarea>!-->
					</div>
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4">
					<div class="col-lg-8">
						<h4>Goal :</h4>
					</div>
			 	</div>
				<div class="col-sm-8">
					<div class="col-lg-8 ">
						<select id="kontenedit<?php echo $u->id ?>" class="form-control" name="goaledit" required>

						<?php $datadept = $this->M_karyawanku->getbobot($u->tgs_dept)->result(); ?>

						<?php foreach ($datadept as $sb) { ?>
						<option value="<?php echo $sb->nama . 'pisah' . $sb->bobot ?>" <?php if ($u->nama_goals == $sb->nama) { echo 'selected'; } ?> ><?php echo $sb->nama ?></option>							
						<?php } ?>


						<!-- di bawah ini untuk mengeluarkan semua -->
						<!-- <?php foreach ($selectbobot as $sb) { ?>
						<option value="<?php echo $sb->nama . 'pisah' . $sb->bobot ?>" <?php if ($u->nama_goals == $sb->nama) { echo 'selected'; } ?> ><?php echo $sb->nama ?></option>							
						<?php } ?> -->
							
						</select>
						<!-- <input value="<?php echo $u->nama_goals ?>" type="text" class="form-control" id="goal" name="goaledit" placeholder="Goal"> -->
					</div>
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4">
					<div class="col-lg-8">
						<h4>Description :</h4>
					</div>
			 	</div>
				<div class="col-sm-8">
					<div class="col-lg-8 ">
						<!--<input type="text" class="form-control" id="action" name="actionedit">!-->
						<textarea class="form-control" rows="4" id="action" name="actionedit" placeholder="Action"><?php echo $u->action ?></textarea>
					</div>
				</div>
			</div>

		

			

			<div class="row">
			  	<div class="col-sm-4">
					<div class="col-lg-8">
						<h4>Deadline :</h4>
					</div>
			 	</div>
				<div class="col-sm-8">
					<div class="col-lg-8 ">
						<div class='input-group date' id='tanggaldiedit<?php echo $u->id ?>'>     
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' value="<?php echo date($u->deadline) ?>" class="form-control input-group-addon" name="deadlineedit" placeholder="Tanggal" required/>
						</div>

						<!-- <div  id='datetimepicker_deadlineedit'>
							<div class="col-sm-8" style="margin: 5px 5px 0px 0px"><?php echo date("d-m-Y", strtotime($u->deadline)) ?></div>
							<input id="MyDate<?php echo $u->id ?>" value="<?php echo $u->deadline ?>" type='hidden' class="form-control" name="deadlineedit" placeholder="Tanggal" /> 
						</div> -->
					</div>
				</div>
			</div>

			<script>
				$('#deptedit<?php echo $u->id ?>').change(function()
		        {            
		            //Ajax Load data from ajax
		            $.ajax({
		                url : "<?php echo site_url('karyawan/ambildatabobotkpim')?>",
		                type: "POST",
		                data: {pilihdept:$('#deptedit<?php echo $u->id ?>').val()},
		                dataType: "JSON",
		                success: function(data)
		                { 
		                	$('#kontenedit<?php echo $u->id ?>').empty();

		                	// document.getElementById('konten'); itu sama dengan $('#konten')[0]

	                		var select = $('#kontenedit<?php echo $u->id ?>')[0];		                	                     
		                    for (var i = 0; i < data.length; i++) {
		                     	option = document.createElement('option');
		                        option.value = data[i]["nama"] + 'pisah' + data[i]["bobot"]
		                        option.text = data[i]["nama"];
		                       	select.add(option)
		                    }
		                    // $('#tabel_bobot').DataTable();
		                },
		                error: function (jqXHR, textStatus, errorThrown)
		                {
		                    alert('Error get data from ajax');
		                }
		            });
		        });
			</script>




			
			<!--isi modal selesai!-->

		      </div>
		      <div class="modal-footer" style="background-color: #6db1ff">
		        <button type="button" class="btn btn-default" data-dismiss="modal" style="font-family: 'Exo 2', sans-serif;">Close</button>
		        <button type="submit" name="input"  class="btn btn-primary" style="font-family: 'Exo 2', sans-serif;">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
		<!--Modal selesai!-->
			                    <button type="button" class="btn btn-default btn-sm" data-target="#myModalhapus<?php echo $u->id ?>" data-toggle="modal" name="input" class="btn btn-default" style="font-family: 'Exo 2', sans-serif; text-transform: capitalize;"> <span class="glyphicon glyphicon-trash"></span> Hapus
								</button>
			                    <!-- <?php echo anchor('kpimmingguannext/hapus/'.$u->id,
			                    	'<button type="button" class="btn btn-default btn-sm">
							          <span class="glyphicon glyphicon-trash"></span>
							          	<text style="text-transform: capitalize;"> Hapus</text>  
							        </button>', array('class'=>'hapus', 'onclick'=>"#myModal;")
							    ); ?> -->

							    <!-- Modal -->
								<div class="modal fade" id="myModalhapus<?php echo $u->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
								  <div class="modal-dialog vertical-align-center" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
								      </div>
								      <div class="modal-body" style="background-color: #2372ef; color: white">
								        <h4>Yakin hapus ?</h4>
								      </div>
								      <div class="modal-footer">
											<form id="form_kpim" method="POST" action="<?php echo base_url();?>kpimmingguannext/hapus/<?php echo $u->id?>">
										      	<button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal">Batal</button>
											<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary">Hapus</button>
											</form>
								      </div>
								    </div>
								  </div>
								</div>
			                   
							</td>

						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<br/>
		<div class="row">
			<div class="col-lg-12" style="margin-right: 15px">
				<!--button type="button" class="btn btn-primary">Save</button-->
			<div class="col-sm-2" style="float: left;"><a class= "btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" href="<?php echo base_url();?>kpimmingguan"><span class="glyphicon glyphicon-arrow-left"></span><h7> KPIM Mingguan</h7></a></div>
			<div class="col-sm-3" style="float: right;">
				<button class= "btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" onclick="ayo(); printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print</button>
				<a class= "btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" href="<?php echo base_url();?>home"><span class="glyphicon glyphicon-home"></span><h7>  Home</h7></a>
				<button type="button" class="btn btn-warning" style="font-family: 'Exo 2'; margin-top:5px"  data-toggle="modal" data-target="#myModalsend">Send</button>
			</div>
		
			</div>
		</div><br><br><br>

		<!-- Modal -->
		<div class="modal fade" id="myModalsend" role="dialog" style="padding-top: 100px;">
			<div class="modal-dialog modal-sm">
			  <div class="modal-content">
			    <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal">&times;</button>
			      <h4 class="modal-title">Konfirmasi Kirim</h4>
			    </div>
			    <div class="modal-body" style="background-color: #2372ef; ">
			    <form id="form_kpim" action="<?php base_url();?>kpimmingguannext/updatestatus" method="POST">
			    <input type='hidden' class="form-control" name="isistatus" value="2" />
			      <p style="text-align: center; color: white;">Yakin Kirim Plannext?</p>
			    
			    </div>
			    <div class="modal-footer">
			      <button type="button" class="btn btn-default" style="font-family: 'Exo 2'; margin-top:5px" data-dismiss="modal">Batal</button>
			      <input type="submit" name="input" style="font-family: 'Exo 2'; margin-top:5px" class="btn btn-primary" value="Kirim"> 
			    </form>
			    </div>
			  </div>
			</div>
		</div>

		
		

			<div class="container">
			<div class="dialogbox">
		    <div class="body">
		      <span class="tip tip-up"></span>
		      <div class="message">
		       
		    <p class="info">
			<text style="font-family: 'Exo 2', sans-serif, medium">
			<b>Ketentuan pengisian nilai aktual :</b><br></text>
			<text style="font-family: 'Exo 2', sans-serif; font-style: italic;">
			1. Total maksimal score karyawan adalah 100<br>
			2. Total nilai maksimal persentase KPIM adalah 75%<br>
			3. Standart bobot penilaian KPIM ditentukan oleh masing - masing departement<br>
			4. Standart penilaian KPIM karyawan (aktual) dilihat dari selesai dikerjakan, masih proses atau tidak dikerjakannya suatu goals<br>
			5. Penilaian juga dipertimbangkan berdasarkan Goals, Description, Result dan Deadline<br>
			6. Untuk Goals yang tidak tercapai pada minggu I harus tetap di cantumkan di KPIM minggu<br>
			7. Plannext(Rencana kegiatan/pekerjaan) wajib diisi<br></text>
			</p>
		      </div>
			</div>
			</div>
			</div>

		<div class="outputClass" id="outputdiv"></div>
	
		<script type="text/javascript" src="<?php base_url();?>assets/bootstrap/js/bootstrap.js"></script>
		<script src="assets/js/moment.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script>
			function ayo(){
		        $("#dataTablenext td:nth-child(7)").css({'display':'none'});
		        $("#dataTablenext th:nth-child(7)").css({'display':'none'});
		    }

			function printContent(el){
			    var restorepage = document.body.innerHTML;
			    var printcontent = document.getElementById(el).innerHTML;
			    document.body.innerHTML = printcontent;
			    window.print();
			    document.body.innerHTML = restorepage;

			}
		</script>
		<script>

		function confirmDialog() {
		 return confirm('Apakah anda yakin akan menghapus data?')
		}


		$(function() {
		  $('input[id^=MyDate]').datetimepicker({ format: 'YYYY-MM-DD' });
		});

		$(function() {
		  $('div[id^=tanggaldiedit]').datetimepicker({ format: 'YYYY-MM-DD' });
		});

		$(function() {
		  $('div[id^=edittgl]').datetimepicker({ useCurrent: false,
						format: 'YYYY-MM-DD',
						ignoreReadonly: true,
						minDate: moment().millisecond(0).second(0).minute(0).hour(24) });
		});
		

		// $(function () {
		// 			$('#datetimepicker1').datetimepicker({
		// 				//format: 'DD/MM/YYYY'
		// 				useCurrent: false,
		// 				format: 'YYYY-MM-DD',
		// 				ignoreReadonly: true,
		// 				minDate: moment().millisecond(0).second(0).minute(0).hour(24)
		// 			});         
		// 		});
		// $(function () {
		// 			$('#datetimepicker2').datetimepicker({
		// 				//format: 'DD/MM/YYYY'
		// 				useCurrent: false,
		// 				format: 'YYYY-MM-DD',
		// 				ignoreReadonly: true,
		// 				minDate: moment().millisecond(0).second(0).minute(0).hour(-24).day(7)
		// 			});         
		// 		});

		$(function () {
				   $('#datetimepicker1').datetimepicker({
						//format: 'DD/MM/YYYY'
						useCurrent: false,
						format: 'YYYY-MM-DD',
						ignoreReadonly: true,
						minDate: moment().millisecond(0).second(0).minute(0).hour(24)						
					});         
				   });         
		// 		});
		// $(function () {
		// 		   $('#datetimepicker3').datetimepicker({
		// 				//format: 'DD/MM/YYYY'
		// 				format: 'YYYY-MM-DD'
		// 			});         
		// 		});
		$(function () {
				   $('#datetimepicker4').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		$(function () {
				   $('#datetimepicker_tgledit').datetimepicker({
						//format: 'DD/MM/YYYY'
						useCurrent: false,
						format: 'YYYY-MM-DD',
						ignoreReadonly: true,
						minDate: moment().millisecond(0).second(0).minute(0).hour(24)
					});         
				});
		$(function () {
				   $('#datetimepicker_deadlineedit').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});

		$(function () {
				   $('#datetimepicker5').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		$(function () {
				   $('#datetimepicker6').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		</script>

		<script type="text/javascript">
		 
		$(document).ready(function () {
			$('#pilihdept').change(function(){
				
				if ($('#pilihdept').val() !== null ){
					$('#konten').show(1000);
					$('#jdl_konten').show(1000);
					$('#open').show(1000);

				}
			})


		 
		window.setTimeout(function() {
		    $(".alert").fadeTo(5500, 0).slideUp(500, function(){
		        $(this).remove(); 
		    });
		}, 5000);
		 
		});
		</script>
	</div>
</div>


</body>
</html>
