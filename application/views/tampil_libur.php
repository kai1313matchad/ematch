<!DOCTYPE html>
<html>
<head>
	<title>Hari Libur / Cuti Bersama</title>
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
<body class="semua keempat">
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
                    <!-- <li><a href="<?php echo base_url(); ?>reportsub">KPIM Report Subordinate Mingguan</a></li>
                    <li><a href="<?php echo base_url(); ?>reportsubnext2">KPIM Plan Next Week</a></li> -->
                    <li >
	                    <a href="<?php echo base_url(); ?>reportkaryawan" >Grafik Report Karyawan </a>
	                    
                    </li>

                    <?php 
					if ($this->session->userdata('id_dept') == 2 || $this->session->userdata('level') == 1 ) { ?>
                    
                    <li><a href="<?php echo base_url(); ?>kpimmingguan/ijin">Ijin Karyawan</a></li>
                    <li class="active"><a href="<?php echo base_url(); ?>pengumuman/libur">Hari Libur</a></li>
                    
                    <?php } ?>

                    <?php 
					if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5 ) { ?>
                    
                    <li><a href="<?php echo base_url(); ?>karyawan/subordinate">Susunan Subordinate</a></li>

                    <li class="dropdown">
	                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Laporan <span class="caret"></span></a>
	                    <ul class="dropdown-menu">
	                    	<li><a href="<?php echo base_url(); ?>Laporan">Laporan Entry Karyawan</a></li>
	                    	<li><a href="<?php echo base_url(); ?>nilai">Nilai Rata-Rata Karyawan</a></li>
	                    </ul>
                    </li>  
                    <?php } ?>

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
		<!-- <center>
		<img src="<?php echo base_url();?>assets/img/kpimlogo.png" alt="KIMP Online" name="KPIM Online" style="width:auto; height:90px; margin-bottom: 10px" >
		</center> -->
		<!-- <h1 style="padding-top: 20px; color: #0f6296"><center>Pesan</center></h1> -->

<?php 
if ($this->session->userdata('level') != 2 AND $this->session->userdata('level') != 11) {
?>
	<div class="container-fluid" style="max-width: 800px; background-color: rgba(204, 204, 204, 0.3); color: black; border:solid 4px #0fc433; border-radius: 15px;">

		<div class="row"> 
			<div class="col-sm-12 text-center" style="padding-top: 10px"><h4>Form Input Hari Libur Nasional / Cuti Bersama</h4></div>
		</div>
		<br>
	
		<form id="form_kpim" action="<?php echo base_url();?>pengumuman/simpanlibur" method="POST">

		<div class="row">
			<div class="col-sm-2"> 
			<text style="word-spacing: 40px">Tanggal :</text>
			</div>

			<div class="col-lg-4 text-center">
				<div class="form-group">
					<div class='input-group date' id='datetimepicker1' style="color: black">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' style="background-color: white" class="form-control input-group-addon tglstart" name="tglstart" placeholder="Start" required />
					</div>
				</div>
			</div>

			<div class="col-sm-2 text-center"> 
				<text>Sampai</text>
			</div>

			<div class="col-sm-4 text-center">
				<div class="form-group">
					<div class='input-group date' id='datetimepicker2' style="color: black;">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' style="background-color: white" class="form-control input-group-addon tglend" name="tglend" placeholder="End" required />
					</div>
				</div>
			</div>
		</div>

	

		<div class="row">
			
			<div class="col-sm-2" style="padding-top: 3px"> 
			<text style="word-spacing: 47px">Status :</text>
			
			</div>




			<div class="col-sm-10" style="padding-bottom: 10px">
				<select class="form-control semua" id="status_libur" name="status_libur" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
				<option value="">--- Pilih Kategori ---</option>
					<option value="Libur Nasional">Libur Nasional</option>
					<option value="Cuti Bersama">Cuti Bersama</option>
			    </select>
			      
			</div>
		
		</div>

		<div class="row">
			<div class="col-sm-2"> 
				<text>Keterangan &nbsp &nbsp &nbsp:</text>
			</div>

			<div class="col-sm-10">
				<!--input type='text' class="form-control" name="action" placeholder="Action"/-->
				<textarea class="form-control jarak" rows="2" cols="20" placeholder="Keterangan" name="keterangan" id="keterangan" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
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

			<!-- <div class="col-sm-10 text-center" style="padding-bottom: 15px"> <button type="submit" name="input"  class="btn btn-primary col-sm-12" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button>
			</div> -->

			<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button> -->

			<div class="col-sm-10">
			

			<button type="button" id="simpanijin" name="input"  class="btn col-lg-12 btn-block" data-toggle="modal" style="font-family: 'Exo 2', sans-serif; margin-bottom: 10px; background: #FDFC47;background: -webkit-linear-gradient(to right, #24FE41, #FDFC47); background: linear-gradient(to right, #24FE41, #FDFC47);"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button>
			</div>
			
		</div>

		<!-- Modal simpan ijin-->
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
	                        <th>Tanggal Libur :</th>
	                        <td id="tanggalstart"></td> <td>sampai</td> <td id="tanggalend"></td>
	                    </tr>
	                    <tr>
	                        <th>Keterangan Libur :</th>
	                        <td id="ijinnya"></td> <td id="keterangannya"></td> <td></td>
	                    </tr>
	                </table>
		        </div>
		        <div class="modal-footer">
		        	<div class="row">
			        	<div class="col-sm-10">
				         <button type="submit" name="input"  class="btn col-sm-12" style="font-family: 'Exo 2', sans-serif; background: #FDFC47; background: -webkit-linear-gradient(to left, #24FE41, #FDFC47); background: linear-gradient(to left, #24FE41, #FDFC47);"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button>
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
		$('#simpanijin').click(function() {
			if ( $('.tglstart').val() == '' ) {
				alert('Isi tanggal start terlebih dahulu');
				return false;
			}
			if ( $('.tglend').val() == '' ) {
				alert('Isi tanggal end terlebih dahulu');
				return false;
			}
			if ( $('#status_libur').val() == '' ) {
				alert('Isi kategori libur terlebih dahulu');
				return false;
			}
			if ( $('#keterangan').val() == '' ) {
				alert('Isi keterangan terlebih dahulu');
				return false;
			}
			else
			$('#myModal').modal('show');
			
		     $('#tanggalstart').text($('.tglstart').val());
		     $('#tanggalend').text($('.tglend').val());
		     $('#ijinnya').text($('#status_libur').val());
		     $('#keterangannya').text($('#keterangan').val());
		});
		</script>

		</form>
	</div>

<?php } ?>
<!-- 
<?php 
$startDate = DateTime::createFromFormat("Y/m/d","2017/10/11");
$endDate = DateTime::createFromFormat("Y/m/d","2017/10/15");

$periodInterval = new DateInterval( "P1D" ); // 1-day, though can be more sophisticated rule
$endDate->add( $periodInterval );
$period = new DatePeriod( $startDate, $periodInterval, $endDate );


foreach($period as $date){
   echo $date->format("Y-m-d") , PHP_EOL;
} ?>
 -->


		
			

	
	<div class="container" style="padding-top: 50px">
		<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Data Hari Libur</a></li>
                           
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                        	<div class="col-lg-12 table-responsive">
								<table id="dataTablesmasuk" class="table table-bordered table-hover table-striped" style="text-align: center;" width="100%">
									<thead class="text-center" style="background: #FDFC47;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #24FE41, #FDFC47);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #24FE41, #FDFC47); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
									  <tr>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Hari/Tanggal</th>
										<th style="text-align: center;">Kategori</th>
										<th style="text-align: center;">Keterangan</th>
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
											<td style=" max-width: 100px;"><?php echo nama_hari($u->tgl).', <br> '. tgl_indo($u->tgl)?></td>
											<td style=" max-width: 150px; word-wrap: break-word; overflow: auto;"><?php echo $u->kategori ?></td>
											<td style="max-width: 300px; word-wrap: break-word; overflow: auto;"><?php echo $u->ket ?></td>
											<td width="150px">
							                    <button type="button" class="btn btn-success btn-sm" data-target="#myModaledit<?php echo $u->id_libur ?>" data-toggle="modal" name="input" class="btn btn-default" style="font-family: 'Exo 2', sans-serif; text-transform: capitalize;"> <span class="glyphicon glyphicon-edit"></span> Edit
												</button>
												<button type="button" class="btn btn-danger btn-sm" data-target="#myModalhapus<?php echo $u->id_libur ?>" data-toggle="modal" name="input" class="btn btn-default" style="font-family: 'Exo 2', sans-serif; text-transform: capitalize;"> <span class="glyphicon glyphicon-trash"></span> Hapus
												</button>
							                    <!-- <?php echo anchor('kpimmingguan/hapus/'.$u->id,
							                    	'<button type="button" class="btn btn-default btn-sm">
											          <span class="glyphicon glyphicon-trash"></span>
											          	<text style="text-transform: capitalize;"> Hapus</text>  
											        </button>', array('class'=>'hapus', 'onclick'=>"#myModal;")
											    ); ?> -->

											    <!-- Modal edit-->
												<div class="modal fade" id="myModaledit<?php echo $u->id_libur ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
												  <div class="modal-dialog modal-lg vertical-align-center" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title" id="myModalLabel">Edit</h4>
												      </div>
												<form id="form_kpim" method="POST" action="<?php echo base_url();?>pengumuman/editlibur/<?php echo $u->id_libur?>">
												      <div class="modal-body">
												      	<div class="row">
												      		<div class=" col-md-4">
													       		<div class='input-group date' id="MyDate<?php echo $u->id_libur ?>">     
																	<span class="input-group-addon">
																	<span class="glyphicon glyphicon-calendar"></span>
																	</span>
																	<input  type='text' value="<?php echo $u->tgl ?>" class="form-control input-group-addon" placeholder="Tanggal Libur" name="tgl" id="tgl"  required>
																</div>
															</div>
															<div class="col-md-4">
																<select class="form-control" id="status_libur" name="status_libur" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
																<option value="">--- Pilih Kategori ---</option>
																	<option value="Libur Nasional" <?php if($u->kategori == 'Libur Nasional') { echo 'selected'; } ?> >Libur Nasional</option>
																	<option value="Cuti Bersama" <?php if($u->kategori == 'Cuti Bersama') { echo 'selected';} ?>>Cuti Bersama</option>
															    </select>
															</div>
															<div class="col-md-4">
																<input class="form-control" type="text" name="keterangan" placeholder="Keterangan" value="<?php echo $u->ket ?>" required>
															</div>
														</div>
												      </div>
												      <div class="modal-footer">
														     <button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary">Simpan</button>
												</form>
												      </div>
												    </div>
												  </div>
												</div>

											    <!-- Modal hapus -->
												<div class="modal fade" id="myModalhapus<?php echo $u->id_libur ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
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
															<form id="form_kpim" method="POST" action="<?php echo base_url();?>pengumuman/hapuslibur/<?php echo $u->id_libur?>">
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
                </div>
            </div>
        </div>
    </div>

    





	<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>assets/js/moment.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
	<script>
		

		$(function() {
		  $('div[id^=MyDate]').datetimepicker({ format: 'YYYY-MM-DD' });
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