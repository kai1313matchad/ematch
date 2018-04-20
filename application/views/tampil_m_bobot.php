<!DOCTYPE html>
<html>
<head>
	<title>Subordinate</title>
	<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript" scr="<?php echo base_url(); ?>/assets/js/jquery-1.11.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
</head>
<style type="text/css">
	.test {
    	background-color: #eee;
    }

    .panel-default > .panel-heading {
	  background-color: white;
	}

</style>
<body class="semua bg">
	<?php date_default_timezone_set('Asia/Jakarta'); ?>
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
	            <a href="<?php echo base_url(); ?>home" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> KPIM Online.</a>
	        </div>
	        <div class="collapse navbar-collapse">
	            <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url();?>reportsub">KPIM Report Subordinate Mingguan</a></li>
	                <li><a href="<?php echo base_url();?>reportsubnext2">KPIM Plan Next Week</a></li>
	                <li class="active"><a href="#">Master Bobot</a></li>
	                <!-- <li><a href="<?php echo base_url(); ?>reportkaryawan">Grafik Report Karyawan</a></li> -->
	                <a class="btn btn-warning navbar-btn" href="<?php echo base_url(); ?>kpimmingguan/jadwalnilai" style="font-family: 'Exo 2', sans-serif; margin-left: 5px ">Jadwal Penilaian Terakhir KPIM</a>

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
	                        
	             </ul>
	            <ul class="nav navbar-nav navbar-right">
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                        <!-- <span class="glyphicon glyphicon-user"></span>  -->
	                        <span style="position: absolute; margin-left: -40px; margin-top: -3px"><?php
								foreach ($profilku as $row) { 
							?>	
                            <!-- <span class="glyphicon glyphicon-user icon-size"></span> -->
                            <img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $row->img; ?>" alt="<?php echo $row->username; ?>" title="Foto <?php echo $row->username; ?>" style=" border-radius: 50%; width: 2em; height: auto;">
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
	                                            <!-- <span class="glyphicon glyphicon-user icon-size"></span> -->
	                                            <img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $row->img; ?>" alt="<?php echo $row->username; ?>" title="Foto <?php echo $row->username; ?>" style=" border-radius: 50%; border: solid 3px gray; margin-left: 10px">
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
	                                            <a href="<?php echo base_url();?>login/logout" class="btn btn-danger btn-block" style="font-family: 'Exo 2', sans-serif; margin: 0px 25px ">Logout</a>
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



	<div style="padding-bottom: 60px"></div>
		<center>
		<img src="<?php echo base_url();?>assets/img/kpimlogo.png" alt="KIMP Online" name="KPIM Online" style="width:auto; height:70px; margin-bottom: 10px" >
		</center>
		<!-- <h1 style="padding-top: 20px; color: #0f6296"><center>Pesan</center></h1> -->

<?php 
if ($this->session->userdata('level') != 2 AND $this->session->userdata('level') != 11) {
?>
	<div class="container-fluid" style="max-width: 800px; background-color: rgba(204, 204, 204, 0.3); color: black; border:solid 4px #337ab7; border-radius: 15px;">

		<div class="row"> 
			<div class="col-sm-12 text-center" style="padding-top: 10px"><h4>Form Master Bobot Pekerjaan</h4></div>
		</div>

		<form id="form_bobot" action="<?php echo base_url();?>karyawan/simpanbobot" method="POST">

		
		<div class="row" style="padding-top: 15px;">
			<div class="col-sm-3"> 
			<text>Departement :</text>
			
			</div>




			<div id="form_pilih_dept" class="col-sm-9">
				<select class="form-control semua" id="pilihdept" name="pilihdept" >
				<option value="">--- Pilih Departement ---</option>
					<?php foreach ($isinamadept->result() as $key): ?>
						<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
					<?php endforeach ?>

			      </select>
			      
			</div>
		</div>
		

		<br>
		

		<div class="row" >
			<div class="col-sm-3"> 
			<text>Nama Pekerjaan :</text>
			</div>
			<div id="form_nm_pekerjaan" class="col-sm-9" style="padding-bottom: 10px">
				<input class="form-control" placeholder="Nama Pekerjaan" type="text" id="nama_pekerjaan" name="nama_pekerjaan" required>
			</div>
		</div>
		<div class="row">

			<div class="col-sm-3"> 
				<text>Nilai Bobot :</text>
			</div>

			<div id="form_pilih_nilai" class="col-sm-9" style="padding-bottom: 10px">
				<select class="form-control" id="nilai_bobot" name="nilai_bobot" placeholder="Pilih Karyawan" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
					<option value="" selected="">--- Pilih Nilai Bobot ---</option>
					<option value="5">5 ( Lima ) - Ringan</option>
					<option value="6">6 ( Enam ) - Ringan</option>
					<option value="7">7 ( Tujuh ) - Sedang</option>
					<option value="8">8 ( Delapan ) - Sedang</option>
					<option value="9">9 ( Sembilan ) - Berat</option>
					<option value="10">10 ( Sepuluh ) - Berat</option>
				
				
		      </select>
			</div>
		</div>

		<div class="row" >
			<div class="col-sm-3">
			<text>Level :</text>
			</div>

			<div class="col-lg-9">
				<div class="checkbox">
				  <label><input id="alllevel" onclick="pilihlevel()" type="checkbox" value="">Pilih semua level</label>
				</div>
			</div>

		    <div class="col-sm-2 col-sm-offset-3">
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="1">Admin</label>
				</div>
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="2">Staff</label>
				</div>
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="3">Head</label>
				</div>
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="4">Manager</label>
				</div>
								
			</div>

			<div class="col-sm-2">
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="5">BOD </label>
				</div>
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="6">SPV</label>
				</div>
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="7">Assistant SPV</label>
				</div>
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="8">Assistant Manager</label>
				</div>
				
				
			</div>


			<div class="col-sm-2">
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="9">Senior Manager</label>
				</div>
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="10">Senior Staff</label>
				</div>
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="11">Non Staff</label>
				</div>
			</div>

			<div class="col-sm-2">
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="12">Freelance</label>
				</div>
				<div class="checkbox">
				  <label><input class="level" type="checkbox" name="level[]" value="13">Direktur</label>
				</div>
			</div>
		</div>

		<!-- <script type="text/javascript">
			function ambilkaryawan(){
				
				$('#pilihdept2').change(function() {
					//var id = {id:$('#pilihdept').val()};
					//var idkar = {idkar:$('#idkar').val()};
				    $.ajax({
				        type: "POST",
				        url: "<?php echo base_url().'karyawan/get_karyawanygdinilai'; ?>",
				        data: {id:$('#pilihdept2').val(), idkar:$('#idkar2').val(), jab:$('#jab2').val(), hak:$('#hak2').val(), penilai:$('#namakar').val()}, //id,
				        success: function(resp){
				                $("#namakar2").html(resp);
				        },
				        error:function(event, textStatus, errorThrown) {
				            $("#namakar2").html('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				        },
				        timeout: 4000
						    });
						});    
					}

				ambilkaryawan();
				
		</script> -->

		

		

		<br>
		<div class="row">
			
			<div class="col-sm-12">
			

			<button type="button" name="input" id="konfirmasi" class="btn btn-primary col-lg-12 btn-block" data-toggle="modal" data-target="#myModal" style="font-family: 'Exo 2', sans-serif; margin-bottom: 10px"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button>
			</div>
			
		</div>

		<!-- Modal simpan -->
		  <div class="modal fade" id="myModal" role="dialog" style="padding-top: 100px;">
		    <div class="modal-dialog modal-lg">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Konfirmasi</h4>
		        </div>
		        <div class="modal-body">
		           Apakah Anda yakin menginputkan data sebagai berikut?
	                <table class="table">
	                    <tr>
	                        <th>Departement :</th>
	                        <td id="deptnya"></td> <td></td> <td></td>
	                    </tr>
	                    <tr>
	                        <th>Nama Pekerjaan :</th>
	                        <td id="nama_pekerjaannya"></td> <td></td> <td></td>
	                    </tr>
	                    <tr>
	                        <th>Nilai Bobot :</th>
	                        <td id="nilai_bobotnya"></td> <td></td> <td></td>
	                    </tr>
	                </table>
		        </div>
		        <div class="modal-footer">
		        	<div class="row">
			        	<div class="col-sm-10">
				         <button type="submit" id='simpansubordinate' name="input" class="btn btn-primary col-sm-12" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button>
				         </div>
						
						<div class="col-sm-2">
			          	<button type="button" class="btn btn-default" data-dismiss="modal" style="font-family: 'Exo 2', sans-serif;">Batal</button>
			          	</div>
		          	</div>
		        </div>
		      </div>
		    </div>
		  </div>
		<!-- modal selesai -->

		<script>
		$("#konfirmasi").click(function(){
			if ( $('#pilihdept').val() === '' ) {
				alert('Pilih Departement Terlebih Dahulu');
				$("#form_pilih_dept").addClass('has-error has-feedback');
				return false;
			}
			else {
				$("#form_pilih_dept").removeClass('has-error has-feedback');
			}
			if ( $('#nama_pekerjaan').val() === '' ) {
				alert('Isi Nama Pekerjaan Terlebih Dahulu');
				$("#form_nm_pekerjaan").addClass('has-error has-feedback');
				return false;
			}
			else {
				$("#form_nm_pekerjaan").removeClass('has-error has-feedback');
			}
			if ( $('#nilai_bobot').val() === '' ) {
				alert('Isi Nilai Bobot Terlebih Dahulu');
				$("#form_pilih_nilai").addClass('has-error has-feedback');
				return false;
			}
			else {
				$("#form_pilih_nilai").removeClass('has-error has-feedback');
			}
			$("#deptnya").text($("#pilihdept option:selected").text());
			$("#nama_pekerjaannya").text($("#nama_pekerjaan").val());
			$("#nilai_bobotnya").text($("#nilai_bobot option:selected").text());

		})
		</script>

		</form>
	</div>

<?php } ?>

	
		
			

	
	<div class="container" style="padding-top: 50px">
		<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Master Data Bobot</a></li>
                           
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-panel fade in active" >
                        	<div class="col-md-12" style="padding: 20px 0px">
                        		<!-- <a href="<?php echo site_url(); ?>karyawan/bobot"><button id="btnref" type="button" class="btn-sm btn-primary">Refresh</button></a> -->
                        		<select class="form-control" name="selectdept" id="selectdept" style="height: 50px; font-size: 18px; border: 2px #6db1ff solid; text-align-last:center; ">
                        			<option id="all" value="all">-- Pilih Departement --</option>
                        			<?php foreach ($isinamadept->result() as $key): ?>
										<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
									<?php endforeach ?>

                        		</select>
                        	</div>
                        	<div class="col-lg-12 table-responsive" id="div1">
								<table id="tabel_bobot" class="table table-bordered table-hover table-striped" style="text-align: center;" width="100%">
									<thead class="text-center" style="background-color: #6db1ff">
									  <tr>
										<th style="text-align: center;">No</th>
										
										<th style="text-align: center;">Dept</th>
										
										<th style="text-align: center;">Nama Pekerjaan</th>

										<th style="text-align: center;">Nilai Bobot</th>						

										<th style="text-align: center;">Tgl diinput</th>

										<th style="text-align: center;">Action</th>	
									  </tr>
									</thead>
									<tbody id="konten">
									<!-- <tbody> -->

									<!-- <?php 
									$no = 1;
									foreach($table as $u){ 
									?>
										<tr>
											<td><?php echo $no++ ?></td>
											
											<td style=" max-width: 150px; word-wrap: break-word; overflow: auto;"><?php echo $u->nama_dept ?></td>
											
											<td><?php echo $u->nama ?></td>

											<td><?php echo $u->bobot ?></td>

											<td><?php echo date('d-m-Y', strtotime($u->tgl_diinput) ) ?></td>
											
											
											
											<td width="200px">
												<button type="button" data-target="#myModaledit<?php echo $u->id_bobot ?>" data-toggle="modal" name="input" class="btn btn-default btn-sm" style="font-family: 'Exo 2', sans-serif; text-transform: capitalize;"> <span class="glyphicon glyphicon-edit"></span> Edit
												</button>
							                    <button type="button" data-target="#myModalhapus<?php echo $u->id_bobot ?>" data-toggle="modal" name="input" class="btn btn-warning btn-sm" style="font-family: 'Exo 2', sans-serif; text-transform: capitalize;"> <span class="glyphicon glyphicon-trash"></span> Hapus
												</button>


												
												<form action="<?php echo base_url(); ?>karyawan/updatebobot/<?php echo $u->id_bobot ?>" method="POST">
												<div class="modal fade" id="myModaledit<?php echo $u->id_bobot ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
												  <div class="modal-dialog modal-lg vertical-align-center" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title" id="myModalLabel">Edit Bobot</h4>
												      </div>
												      <div class="modal-body">
												        <div class="row" style="padding-top: 15px; padding-bottom: 10px">
															<div class="col-sm-3"> 
															<text>Departement :</text>
															
															</div>




															<div id="form_pilih_dept" class="col-sm-9">
																<select class="form-control semua" id="pilihdept" name="pilihdept" >
																<option value="">--- Pilih Departement ---</option>
																	<?php foreach ($isinamadept->result() as $key): ?>
																		<option value="<?php echo $key->id_dept;?>" <?php if ($key->id_dept == $u->id_dept) {echo 'selected';} ?> > <?php echo $key->nama_dept;?></option>
																	<?php endforeach ?>

															      </select>
															      
															</div>
														</div>

														<div class="row" >
															<div class="col-sm-3"> 
															<text>Nama Pekerjaan :</text>
															</div>
															<div id="form_nm_pekerjaan" class="col-sm-9" style="padding-bottom: 10px">
																<input class="form-control" placeholder="Nama Pekerjaan" type="text" id="nama_pekerjaan" name="nama_pekerjaan" value='<?= $u->nama ?>' required>
															</div>
														</div>
														<div class="row">

															<div class="col-sm-3"> 
																<text>Nilai Bobot :</text>
															</div>

															<div id="form_pilih_nilai" class="col-sm-9" style="padding-bottom: 10px">
																<select class="form-control" id="nilai_bobot" name="nilai_bobot" placeholder="Pilih Karyawan" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
																	<option value="">--- Pilih Nilai Bobot ---</option>
																	<option value="5" <?php if ($u->bobot == 5) {echo 'selected';} ?> >5 ( Lima ) - Ringan</option>
																	<option value="6" <?php if ($u->bobot == 6) {echo 'selected';} ?> >6 ( Enam ) - Ringan</option>
																	<option value="7" <?php if ($u->bobot == 7) {echo 'selected';} ?> >7 ( Tujuh ) - Sedang</option>
																	<option value="8" <?php if ($u->bobot == 8) {echo 'selected';} ?> >8 ( Delapan ) - Sedang</option>
																	<option value="9" <?php if ($u->bobot == 9) {echo 'selected';} ?> >9 ( Sembilan ) - Berat</option>
																	<option value="10" <?php if ($u->bobot == 10) {echo 'selected';} ?> >10 ( Sepuluh ) - Berat</option>
																
																
														      </select>
															</div>
														</div>

														<div class="row" style="text-align: left;">
															<div class="col-sm-3" style="text-align: center;">
															<text>Level :</text>
															</div>

															<?php $id_levelku = explode(',', $u->id_levelakses);?>

															<div class="col-lg-9">
																<div class="checkbox">
																  <label><input id="alllevel<?php echo $u->id_bobot ?>" onclick="pilihleveledit(<?php echo $u->id_bobot ?>)" type="checkbox" value="">Pilih semua level</label>
																</div>
															</div>

														    <div class="col-sm-2 col-sm-offset-3">
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="1" <?php if(in_array("1", $id_levelku)) {echo 'CHECKED';}; ?>>Admin</label>
																</div>
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="2" <?php if(in_array("2", $id_levelku)) {echo 'CHECKED';}; ?>>Staff</label>
																</div>
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="3" <?php if(in_array("3", $id_levelku)) {echo 'CHECKED';}; ?>>Head</label>
																</div>
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="4" <?php if(in_array("4", $id_levelku)) {echo 'CHECKED';}; ?>>Manager</label>
																</div>
																				
															</div>

															<div class="col-sm-2">
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="5" <?php if(in_array("5", $id_levelku)) {echo 'CHECKED';}; ?>>BOD </label>
																</div>
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="6" <?php if(in_array("6", $id_levelku)) {echo 'CHECKED';}; ?>>SPV</label>
																</div>
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="7" <?php if(in_array("7", $id_levelku)) {echo 'CHECKED';}; ?>>Assistant SPV</label>
																</div>
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="8" <?php if(in_array("8", $id_levelku)) {echo 'CHECKED';}; ?>>Assistant Manager</label>
																</div>
																
																
															</div>


															<div class="col-sm-2">
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="9" <?php if(in_array("9", $id_levelku)) {echo 'CHECKED';}; ?>>Senior Manager</label>
																</div>
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="10" <?php if(in_array("10", $id_levelku)) {echo 'CHECKED';}; ?>>Senior Staff</label>
																</div>
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="11" <?php if(in_array("11", $id_levelku)) {echo 'CHECKED';}; ?>>Non Staff</label>
																</div>
															</div>

															<div class="col-sm-2">
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="12" <?php if(in_array("12", $id_levelku)) {echo 'CHECKED';}; ?>>Freelance</label>
																</div>
																<div class="checkbox">
																  <label><input class="level<?php echo $u->id_bobot ?>" type="checkbox" name="level[]" value="13" <?php if(in_array("13", $id_levelku)) {echo 'CHECKED';}; ?>>Direktur</label>
																</div>
															</div>
														</div>


												      </div>
												      <div class="modal-footer">
															
														      	<button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary">Simpan</button>

												      </div>
												    </div>
												  </div>
												</div>
												</form>

												
												<div class="modal fade" id="myModalhapus<?php echo $u->id_bobot ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
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
															<form id="form_kpim" method="POST" action="<?php echo base_url();?>karyawan/hapusbobot/<?php echo $u->id_bobot?>">
														      	<button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary">Hapus</button>
															</form>
												      </div>
												    </div>
												  </div>
												</div>
							                   
											</td>

										</tr>
									<?php } ?> -->
									</tbody>
								</table>
							</div><!-- ini tutup div pesan terkirim -->
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- mulai modal ajax -->

    <form id="form_edit" action="" method="POST">
	<div class="modal fade" id="myModaleditajax" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
	  <div class="modal-dialog modal-lg vertical-align-center" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Edit Bobot</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row" style="padding-top: 15px; padding-bottom: 10px">
				<div class="col-sm-3"> 
				<text>Departement :</text>
				
				</div>
				<div id="form_pilih_dept" class="col-sm-9">
					<select class="form-control semua" id="editpilihdept" name="pilihdept" >
					<option value="">--- Pilih Departement ---</option>
						<?php foreach ($isinamadept->result() as $key): ?>
							<option value="<?php echo $key->id_dept;?>" > <?php echo $key->nama_dept;?></option>
						<?php endforeach ?>

				      </select>
				      
				</div>
			</div>

			<div class="row" >
				<div class="col-sm-3"> 
				<text>Nama Pekerjaan :</text>
				</div>
				<div id="form_nm_pekerjaan" class="col-sm-9" style="padding-bottom: 10px">
					<input class="form-control" placeholder="Nama Pekerjaan" type="text" id="editnama_pekerjaan" name="nama_pekerjaan" value='' required>
				</div>
			</div>
			<div class="row">

				<div class="col-sm-3"> 
					<text>Nilai Bobot :</text>
				</div>

				<div id="form_pilih_nilai" class="col-sm-9" style="padding-bottom: 10px">
					<select class="form-control" id="editnilai_bobot" name="nilai_bobot" placeholder="Pilih Karyawan" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="">--- Pilih Nilai Bobot ---</option>
						<option value="5" >5 ( Lima ) - Ringan</option>
						<option value="6" >6 ( Enam ) - Ringan</option>
						<option value="7" >7 ( Tujuh ) - Sedang</option>
						<option value="8" >8 ( Delapan ) - Sedang</option>
						<option value="9" >9 ( Sembilan ) - Berat</option>
						<option value="10" >10 ( Sepuluh ) - Berat</option>
			      </select>
				</div>
			</div>

			<div class="row" style="text-align: left;">
				<div class="col-sm-3" style="text-align: center;">
				<text>Level :</text>
				</div>


				<div class="col-lg-9">
					<div class="checkbox">
					  <label><input id="alllevelajax" onclick="pilihleveleditajax()" type="checkbox" value="">Pilih semua level</label>
					</div>
				</div>

			    <div class="col-sm-2 col-sm-offset-3">
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="1">Admin</label>
					</div>
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="2">Staff</label>
					</div>
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="3">Head</label>
					</div>
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="4">Manager</label>
					</div>
									
				</div>

				<div class="col-sm-2">
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="5">BOD </label>
					</div>
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="6">SPV</label>
					</div>
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="7">Assistant SPV</label>
					</div>
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="8">Assistant Manager</label>
					</div>
					
					
				</div>


				<div class="col-sm-2">
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="9">Senior Manager</label>
					</div>
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="10">Senior Staff</label>
					</div>
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="11">Non Staff</label>
					</div>
				</div>

				<div class="col-sm-2">
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="12">Freelance</label>
					</div>
					<div class="checkbox">
					  <label><input id="pilihlevel" class="levelajax" type="checkbox" name="level[]" value="13">Direktur</label>
					</div>
				</div>
			</div>

	      </div>
	      <div class="modal-footer">
				
			      	<button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary">Simpan</button>

	      </div>
	    </div>
	  </div>
	</div>
	</form>

	<!-- bawah modal hapus ajax, atas modal edit ajax -->

    <div class="modal fade" id="myModalhapusajax" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
	  <div class="modal-dialog vertical-align-center" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
	      </div>
	      <div class="modal-body" style="background-color: #2372ef; color: white">
	        <h4>Yakin hapus ?</h4>
	        <input type="hidden" name="idsub">
	      </div>
	      <div class="modal-footer">
				<form id="form_hapus" method="POST" action="">
			      	<button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary">Hapus</button>
				</form>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- selesai modal ajax -->

	<div class="row" style="padding-bottom: 50px">
			<button class= "btn btn-primary col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" onclick="hilangkan(); printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print</button>			
	</div>
	

	

    <script type="text/javascript">

    	function hilangkan(){
    		$("#tabel_bobot td:nth-child(6)").css({'display':'none'});
		    $("#tabel_bobot th:nth-child(6)").css({'display':'none'});

		    $('#tabel_bobot_length').css({'display':'none'});
	        $('#tabel_bobot_filter').css({'display':'none'});
	        $('#tabel_bobot_paginate').css({'display':'none'});
	        $('#tabel_bobot_info').css({'display':'none'});
    	}

    	function printContent(el){
		    var restorepage = document.body.innerHTML;
		    var printcontent = document.getElementById(el).innerHTML;
		    document.body.innerHTML = printcontent;
		    window.print();
		    document.body.innerHTML = restorepage;

		}


    	

        // <input name='ygdihapus[]' type='checkbox' value='"+data[i]["id_bobot"]+"' style='margin-left:10px'>
    	

	    function edit(id){

            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('karyawan/ambilbobotsatu/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {   
                    var dept = data.id_dept;
                	document.querySelector('#editpilihdept [value="' + dept + '"]').selected = true;

                    $('#editnama_pekerjaan').val(data.nama);

                    var bobot = data.bobot;
                	document.querySelector('#editnilai_bobot [value="' + bobot + '"]').selected = true;


                	$('input[type="checkbox"]').prop('checked', false);



                	// untuk cek checked checkbox
                	// pertama diexplode
                	var levelakses = data.id_levelakses;

                	var mylevel = levelakses.split(',');

                	// lalu dicheked
                	for (var i = 0; i < mylevel.length; i++)
                    {
                		$('input[type="checkbox"][id="pilihlevel"][value="'+mylevel[i]+'"]').prop('checked', true);
                	}

                    
                         
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        
	    	$('#myModaleditajax').modal('show');
	    	var url = '<?php echo base_url(); ?>karyawan/updatebobotajax/' + id;
	    	$('#form_edit').attr('action', url);
	    }

	    function hapus(id){
	    	$('#myModalhapusajax').modal('show');
	    	var url = '<?php echo base_url(); ?>karyawan/hapusbobot/' + id;
	    	$('#form_hapus').attr('action', url);
	    }


	    // utk checkbox level add master
	    function pilihlevel(){
			if ($('#alllevel').prop('checked')) {
		    	$('.level').prop('checked', true);
		    	}
		    else {
		        $('.level').prop('checked', false);
		    }
		}

		// utk checkbox level edit master
		function pilihleveledit(a){
			if ($('#alllevel' + a).prop('checked')) {
		    	$('.level' + a).prop('checked', true);
		    	}
		    else {
		        $('.level' + a).prop('checked', false);
		    }
		}

		// utk checkbox level edit ajax master
	    function pilihleveleditajax(){
			if ($('#alllevelajax').prop('checked')) {
		    	$('.levelajax').prop('checked', true);
		    	}
		    else {
		        $('.levelajax').prop('checked', false);
		    }
		}
    </script>

    





	<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>assets/js/moment.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
	<script>
		$(function() {
		  $('input[id^=MyDate]').datetimepicker({ format: 'YYYY-MM-DD' });
		});


		

		$(function () {
					$('#datetimepicker1').datetimepicker({
						format: 'YYYY-MM-DD'
					});         
				});
		$(function () {
					$('#datetimepicker2').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});


	</script>

	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
		$('#tabel_bobot').DataTable();

		var nilai = $('#selectdept').val();

		carimaster();


	} );

	$('#selectdept').change(function()
    {     
    	carimaster();
    });


	function carimaster()
    {            
    	$('#tabel_bobot').DataTable().destroy();
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('karyawan/ambildatabobot')?>",
            type: "POST",
            data: {pilihdept:$('#selectdept').val()},
            dataType: "JSON",
            success: function(data)
            { 
            	$('#konten').empty();
            	                     
                for (var i = 0; i < data.length; i++) {
                  var $tr = $('<tr>').append(
                        $('<td>').text(i+1),
                        $('<td>').text(data[i]["nama_dept"]),
                        $('<td>').text(data[i]["nama"]),
                        $('<td>').text(data[i]["bobot"]),
                        $('<td>').text(moment(data[i]["tgl_diinput"]).format('DD-MM-YYYY')),
                        // $('<td>'+data[i]["nama"]+'/td>'),
                        $("<td width='180px'><button type='button' class='btn btn-default btn-sm' onclick='edit("+data[i]["id_bobot"]+")' name='input' class='btn btn-default' style='font-family: 'Exo 2', sans-serif; text-transform: capitalize;'> <span class='glyphicon glyphicon-edit'></span> <span style=' text-transform: capitalize;'>Edit</span></button> <button type='button' class='btn btn-warning btn-sm' onclick='hapus("+data[i]["id_bobot"]+")' name='input' class='btn btn-default' style='font-family: 'Exo 2', sans-serif; text-transform: capitalize;'> <span class='glyphicon glyphicon-trash'></span> <span style=' text-transform: capitalize;'>Hapus</span></button></td>")

                        ).appendTo('#konten');
                }
                $('#tabel_bobot').DataTable({
			        "lengthMenu": [[20, 30, 50, -1], [20, 30, 50, "All"]]
			    });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

        $('#all').html('-- Semua Departement --');
    }
	</script>


</body>
</html>