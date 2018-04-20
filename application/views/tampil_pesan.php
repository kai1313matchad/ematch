<!DOCTYPE html>
<html>
<head>
	<title>Pilih Karyawan</title>
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
	                <!-- <li class="active"><a href="#">KPIM Report Sub - Kordinat</a></li> -->
	                		<li><a href="<?php echo base_url(); ?>kpimmingguan">KPIM Mingguan</a></li>
	               	 		<li><a href="<?php echo base_url(); ?>kpimmingguannext">KPIM Plan Next Week</a></li>
	                		<li class="dropdown">
	                			<?php
									foreach ($inboxblmbaca as $total)
									foreach ($noteblmbaca as $totalnote)
									foreach ($planblmbaca as $totalplan)
									foreach ($noteplan as $totalnoteplan) { 
								?>
			                    <a href="#" class="dropdown-toggle test" data-toggle="dropdown">Notifikasi
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
			                        <li><a href="<?php echo base_url(); ?>kpimmingguan/replykpimnext">KPIM Plan Next Week
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
	                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown">DropDown
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
		<img src="<?php echo base_url();?>assets/img/kpimlogo.png" alt="KIMP Online" name="KPIM Online" style="width:auto; height:90px; margin-bottom: 10px" >
		</center>
		<!-- <h1 style="padding-top: 20px; color: #0f6296"><center>Pesan</center></h1> -->

<?php 
if ($this->session->userdata('level') != 2 AND $this->session->userdata('level') != 11) {
?>
	<div class="container-fluid" style="max-width: 800px; background-color: rgba(204, 204, 204, 0.3); color: black; border:solid 4px #778899; border-radius: 15px;">

		<div class="row"> 
			<div class="col-sm-12 text-center" style="padding-top: 10px"><h4>Pesan untuk departement lain</h4></div>
		</div>
	
		<form id="form_kpim" action="<?php echo base_url();?>kpimmingguan/kirimpesan/" method="POST">
		<div class="row" style="padding-top: 15px">
			<div class="col-sm-2"> 
			<text style="word-spacing: 5px">Departement :</text>
			
			</div>




			<div class="col-sm-4" style="padding-bottom: 10px">
				<select class="form-control semua" id="pilihdept" name="pilihdept" >
				<option>--- Pilih Departement ---</option>
					<?php foreach ($isidept->result() as $key): ?>
						<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
					<?php endforeach ?>

					


			      </select>
			      <input type="hidden" value="<?php echo $this->session->userdata('id_karyawan'); ?>" id="idkar">
			      <input type="hidden" value="<?php echo $this->session->userdata('level'); ?>" id="jab">
			      <input type="hidden" value="<?php echo $this->session->userdata('hak_akses'); ?>" id="hak">
			      
			</div>

			<div class="col-sm-2"> 
				<text style="word-spacing: 20px">Penerima :</text>
			</div>

			<div class="col-sm-4" style="padding-bottom: 10px">
				<select class="form-control" id="namakar" name="pilihkar" placeholder="Pilih Karyawan" required>
				
				
		      </select>
			</div>
		</div>

		<script type="text/javascript">
			function ambilkaryawan(){
				
				$('#pilihdept').change(function() {
					//var id = {id:$('#pilihdept').val()};
					//var idkar = {idkar:$('#idkar').val()};
				    $.ajax({
				        type: "POST",
				        url: "<?php echo base_url().'reportsub/get_karyawanpesan'; ?>",
				        data: {id:$('#pilihdept').val(), idkar:$('#idkar').val(), jab:$('#jab').val(), hak:$('#hak').val()}, //id,
				        success: function(resp){
				                $("#namakar").html(resp);
				        },
				        error:function(event, textStatus, errorThrown) {
				            $("#namakar").html('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				        },
				        timeout: 4000
						    });
						});    
					}

				ambilkaryawan();
				
		</script>

	

		<div class="row">
			<!-- <div class="col-sm-2"> 
			<text style="word-spacing: 20px">Penerima :</text>
			</div>

			<div class="col-sm-4" style="padding-bottom: 10px">
				<select class="form-control" id="namakar" name="pilihkar" placeholder="Pilih Karyawan" required>
				
				
		      </select>
			</div> -->

			
			<div class="col-sm-2" style="padding-top: 3px"> 
			<text style="word-spacing: 47px">Status :</text>
			
			</div>




			<div class="col-sm-10" style="padding-bottom: 10px">
				<select class="form-control semua" id="status_pesan" name="status_pesan" >
				<option>--- Pilih Status ---</option>
					
					<option value="Pujian">Pujian</option>
					<option value="Pesan">Pesan</option>
					<option value="Kritik/Saran">Kritik/Saran</option>
					<option value="Peringatan">Peringatan</option>

			    </select>
			      
			</div>
		
		</div>


		<!-- <div class="row">
			<div class="col-sm-3"> 
			<text style="word-spacing: 44px">Tanggal :</text>
			</div>

			<div class="col-lg-4 text-center">
				<div class="form-group">
					<div class='input-group date' id='datetimepicker1' style="color: black">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' class="form-control input-group-addon" name="tglstart" placeholder="Start" required />
					</div>
				</div>
			</div>

			<div class="col-sm-4 text-center">
				<div class="form-group">
					<div class='input-group date' id='datetimepicker2' style="color: black;">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' class="form-control input-group-addon" name="tglend" placeholder="End" required />
					</div>
				</div>
			</div>
		</div> -->
		<div class="row">
			<div class="col-sm-2"> 
				<text style="word-spacing: 43px">Project :</text>
			</div>

			<div class="col-sm-4">
					<!--input type='text' class="form-control" name="goal" placeholder="Goal"/-->
					<textarea class="form-control jarak" rows="2" cols="20" placeholder="Nama Goal" name="goal" id="goals" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
			</div>
		

			<!--action-->
			<div class="col-lg-6">
				<!--input type='text' class="form-control" name="action" placeholder="Action"/-->
				<textarea class="form-control jarak" rows="2" cols="20" placeholder="Pesan" name="pesan" id="pesan" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
			</div>
		</div>

		
			<!--Kendala-->
			
		<!--
		<div class="row">
			<div class="col-sm-3"> 
			Tanggal End:
			</div>

			<div class="col-lg-4 text-center">
				<div class="form-group">
					<div class='input-group date' id='datetimepicker2' style="color: black;">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' class="form-control input-group-addon" name="tglend" placeholder="End" required />
					</div>
				</div>
			</div>
		</div>
		!-->

		<br>
		<div class="row">

			<div class="col-sm-2"> 
			
			</div>

			<div class="col-sm-10 text-center" style="padding-bottom: 15px"> <button type="submit" name="input"  class="btn btn-primary col-sm-12" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-send"></span> Kirim</button>
			</div>
		</div>
		</form>
	</div>

<?php } ?>


	
	<div class="container" style="padding-top: 50px">
		<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Pesan Masuk</a></li>
                            <?php 
							if ($this->session->userdata('level') != 2 AND $this->session->userdata('level') != 11) {
							?>
                            <li><a href="#tab2" data-toggle="tab">Pesan Terkirim</a></li>
                            <li><a href="#tab3" data-toggle="tab">Pesan Masuk Dept</a></li>
                            <?php } ?>
                            <!-- <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#tab4" data-toggle="tab">Warning 4</a></li>
                                    <li><a href="#tab5" data-toggle="tab">Warning 5</a></li>
                                </ul>
                            </li> -->
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                        	<div class="col-lg-12 table-responsive">
								<table id="dataTablesmasuk" class="table table-bordered table-hover table-striped" style="text-align: center;"  width="100%">
									<thead class="text-center" style="background-color: #6db1ff">
									  <tr>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Hari/Tanggal</th>
										<th style="text-align: center;">Goal</th>
										<th style="text-align: center;">Pesan</th>
										<th style="text-align: center;">Pengirim</th>
										<th style="text-align: center;">Departement</th>

										<th style="text-align: center;">Status Pesan</th>
										<!-- <th style="text-align: center;">Hapus</th> -->
									  </tr>
									</thead>
									<tbody >
									<?php 
									$no = 1;
									foreach($pesanmasuk as $u){ 
									?>

									

									
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo nama_hari($u->tgl).', '. date("d-M-Y",strtotime($u->tgl))?></td>
											<td><?php echo $u->goal ?></td>
											<td style="max-width: 100px; word-wrap: break-word; overflow: auto;"><?php echo $u->pesan ?></td>
											
											<td style=" max-width: 150px; word-wrap: break-word; overflow: auto;"><?php echo $u->nama_karyawan ?></td>
											<td style="max-width: 300px; word-wrap: break-word; overflow: auto;"><?php echo $u->nama_dept ?></td>
											
											<td>
											<?php

												$pesan = $u->status_pesan;
												$case = '';
												if ($pesan == "Pujian"){
													$case = '1';
													// print "<style type=\"text/css\">.totalpersen {background-color: red; color:white;}</style>\n";
												}

												if ($pesan == "Pesan"){
													$case = '2';
													// print "<style type=\"text/css\">.totalpersen {background-color: #a86700; color:white;}</style>\n";
												}

												if ($pesan == "Kritik/Saran"){
													$case = '3';
													// print "<style type=\"text/css\">.totalpersen {background-color: orange; color:white;}</style>\n";
												}

												if ($pesan == "Peringatan"){
													$case = '4';
													// print "<style type=\"text/css\">.totalpersen {background-color: #e8cc00; color:white;}</style>\n";
													
												}

												

												// echo $status_nilai;


											?>

												<?php switch ($case)
											{
											case 1:
											  echo   '<span class="label label-success" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											case 2:
											  echo   '<span class="label label-info" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											case 3:
											  echo   '<span class="label label-warning" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											 case 4:
											  echo   '<span class="label label-danger" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											default:
											  echo "No number between 1 and 3";
											}
											?>	
												

											</td>
											<!-- <td>
							
							                    <center>
							                    <button type="button" class="btn btn-default btn-sm" data-target="#myModal<?= $u->id_pesan?>" data-toggle="modal" name="input" class="btn btn-default" style="font-family: 'Exo 2', sans-serif; text-transform: capitalize;"> <span class="glyphicon glyphicon-trash"></span> Hapus
												</button>
												</center>
							                    
											    
												<div class="modal fade" id="myModal<?= $u->id_pesan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
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
															<form id="form_kpim" method="POST" action="<?php echo base_url();?>kpimmingguan/hapuspesanku/<?php echo $u->id_pesan?>">
														      	<button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary">Hapus</button>
															</form>
												      </div>
												    </div>
												  </div>
												</div>
							                   
											</td> -->

										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div><!-- ini tutup div pesan terkirim -->
                        </div>

                        <div class="tab-pane fade" id="tab2">
							<div class="col-lg-12 table-responsive">
								<table id="dataTableskirim" class="table table-bordered table-hover table-striped" style="text-align: center;" width="100%">
									<thead class="text-center" style="background-color: #6db1ff">
									  <tr>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Hari/Tanggal</th>
										<th style="text-align: center;">Goal</th>
										<th style="text-align: center;">Pesan</th>
										<th style="text-align: center;">Dikirim ke</th>
										<th style="text-align: center;">Departement</th>

										<th style="text-align: center;">Status Pesan</th>
										<th style="text-align: center;">Hapus</th>
									  </tr>
									</thead>
									<tbody >
									<?php 
									$no = 1;
									foreach($pesanku as $u){ 
									?>

									

									
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo nama_hari($u->tgl).', '. date("d-M-Y",strtotime($u->tgl))?></td>
											<td><?php echo $u->goal ?></td>
											<td><?php echo $u->pesan ?></td>
											
											<td><?php echo $u->nama_karyawan ?></td>
											<td><?php echo $u->nama_dept ?></td>
											
											<td>
											<?php

												$pesan = $u->status_pesan;
												$case = '';
												if ($pesan == "Pujian"){
													$case = '1';
													// print "<style type=\"text/css\">.totalpersen {background-color: red; color:white;}</style>\n";
												}

												if ($pesan == "Pesan"){
													$case = '2';
													// print "<style type=\"text/css\">.totalpersen {background-color: #a86700; color:white;}</style>\n";
												}

												if ($pesan == "Kritik/Saran"){
													$case = '3';
													// print "<style type=\"text/css\">.totalpersen {background-color: orange; color:white;}</style>\n";
												}

												if ($pesan == "Peringatan"){
													$case = '4';
													// print "<style type=\"text/css\">.totalpersen {background-color: #e8cc00; color:white;}</style>\n";
													
												}

												

												// echo $status_nilai;


											?>

												<?php switch ($case)
											{
											case 1:
											  echo   '<span class="label label-success" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											case 2:
											  echo   '<span class="label label-info" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											case 3:
											  echo   '<span class="label label-warning" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											 case 4:
											  echo   '<span class="label label-danger" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											default:
											  echo "No number between 1 and 3";
											}
											?>	
												

											</td>
											<td>
							
							                    <center>
							                    <button type="button" class="btn btn-default btn-sm" data-target="#myModal<?= $u->id_pesan?>" data-toggle="modal" name="input" class="btn btn-default" style="font-family: 'Exo 2', sans-serif; text-transform: capitalize;"> <span class="glyphicon glyphicon-trash"></span> Hapus
												</button>
												</center>
							                    <!-- <?php echo anchor('kpimmingguan/hapus/'.$u->id,
							                    	'<button type="button" class="btn btn-default btn-sm">
											          <span class="glyphicon glyphicon-trash"></span>
											          	<text style="text-transform: capitalize;"> Hapus</text>  
											        </button>', array('class'=>'hapus', 'onclick'=>"#myModal;")
											    ); ?> -->

											    <!-- Modal -->
												<div class="modal fade" id="myModal<?= $u->id_pesan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
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
															<form id="form_kpim" method="POST" action="<?php echo base_url();?>kpimmingguan/hapuspesanku/<?php echo $u->id_pesan?>">
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
							</div><!-- ini tutup div pesan terkirim -->
                        </div>
                        <div class="tab-pane fade" id="tab3">
                        	<div class="col-lg-12 table-responsive">
								<table id="dataTablesmasukdept" class="table table-bordered table-hover table-striped" style="text-align: center;" width="100%">
									<thead class="text-center" style="background-color: #6db1ff">
									  <tr>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Hari/Tanggal</th>
										<th style="text-align: center;">Goal</th>
										<th style="text-align: center;">Pesan</th>
										<th style="text-align: center;">Penerima</th>
										<th style="text-align: center;">Pengirim</th>

										<th style="text-align: center;">Status Pesan</th>
										<!-- <th style="text-align: center;">Hapus</th> -->
									  </tr>
									</thead>
									<tbody >
									<?php 
									$no = 1;
									foreach($pesandept as $u){ 
									?>

									

									
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo nama_hari($u->tgl).', '. date("d-M-Y",strtotime($u->tgl))?></td>
											<td><?php echo $u->goal ?></td>
											<td><?php echo $u->pesan ?></td>
											
											<td><?php echo $u->penerima . ' - Dept '. $u->deptpenerima ?></td>
											<td><?php echo $u->pengirim ?></td>
											
											<td>
											<?php

												$pesan = $u->status_pesan;
												$case = '';
												if ($pesan == "Pujian"){
													$case = '1';
													// print "<style type=\"text/css\">.totalpersen {background-color: red; color:white;}</style>\n";
												}

												if ($pesan == "Pesan"){
													$case = '2';
													// print "<style type=\"text/css\">.totalpersen {background-color: #a86700; color:white;}</style>\n";
												}

												if ($pesan == "Kritik/Saran"){
													$case = '3';
													// print "<style type=\"text/css\">.totalpersen {background-color: orange; color:white;}</style>\n";
												}

												if ($pesan == "Peringatan"){
													$case = '4';
													// print "<style type=\"text/css\">.totalpersen {background-color: #e8cc00; color:white;}</style>\n";
													
												}

												

												// echo $status_nilai;


											?>

												<?php switch ($case)
											{
											case 1:
											  echo   '<span class="label label-success" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											case 2:
											  echo   '<span class="label label-info" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											case 3:
											  echo   '<span class="label label-warning" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											 case 4:
											  echo   '<span class="label label-danger" style="font-size:15px;">'.$pesan.'</span>';
											  break;
											default:
											  echo "No number between 1 and 3";
											}
											?>	
												

											</td>
											<!-- <td>
							
							                    <center>
							                    <button type="button" class="btn btn-default btn-sm" data-target="#myModal<?= $u->id_pesan?>" data-toggle="modal" name="input" class="btn btn-default" style="font-family: 'Exo 2', sans-serif; text-transform: capitalize;"> <span class="glyphicon glyphicon-trash"></span> Hapus
												</button>
												</center>
							                    

											    
												<div class="modal fade" id="myModal<?= $u->id_pesan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
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
															<form id="form_kpim" method="POST" action="<?php echo base_url();?>kpimmingguan/hapuspesanku/<?php echo $u->id_pesan?>">
														      	<button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary">Hapus</button>
															</form>
												      </div>
												    </div>
												  </div>
												</div>
							                   
											</td> -->

										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div><!-- ini tutup div pesan terkirim -->
                        </div>
                        <div class="tab-pane fade" id="tab4">Warning 4</div>
                        <div class="tab-pane fade" id="tab5">Warning 5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    





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
		$('#dataTablesmasuk').DataTable();
	} );

	$(document).ready(function() {
		$('#dataTableskirim').DataTable();
	} );

	$(document).ready(function() {
		$('#dataTablesmasukdept').DataTable();
	} );
	</script>


</body>
</html>