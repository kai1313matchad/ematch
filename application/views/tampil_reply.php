<!DOCTYPE html>
<html lang="en">
<head>

<title>Notifikasi KPIM Online - Mingguan</title>
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
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>

<!--font google!-->
<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">

<!-- <script src="<?php echo base_url(); ?>bootstrap-confirm-delete.js"></script> -->


</head>
<style type="text/css">
	@media screen and (max-width: 1024px) {
      .jarak {
        margin-bottom: 10px;
      }
    }

    .test {
    	background-color: #eee;
    }
</style>
<body class="bg semua">

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
			                        <li><a href="'.base_url().'Addkaryawan">Tambah Karyawan</a></li>
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



<div class="container">
	<div class="background">
		<h1 style="padding-top: 20px"><center>Notifikasi KPIM Online (Mingguan)</center></h1><br><br>

		
		
<!--
		
		
		<div class="row">
			<div class="col-lg-2 text-right">
				<h4>Nama :</h4>
			</div>
			<div class="col-lg-3 text-left">
				<input class="form-control" size="32" id="nama" name="nama" value="<?php echo $this->session->userdata('username'); ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 text-right">
				<h4>Jabatan :</h4>
			</div>
			<div class="col-lg-3 text-left">
				<?php
					foreach ($jabatan->result() as $row) { 
				?>		
					<input type="text" name="" value="<?php echo $row->nama_akses; ?>">	
				<?php	}
				?>

				<br/>

				
			</div>
			<div class="col-lg-1 text-left">

				<h4>Posisi :</h4>
			</div>
			<div class="col-lg-3 text-left">
				
					<?php
					foreach ($dept->result() as $row) { 
				?>		
					<input type="text" name="" value="<?php echo $row->nama_dept; ?>">	
				<?php	}
				?>
			
			</div>
		</div>
!-->
<div class="row">
			<div class="col-lg-12 text-left" style="margin-left: 5px">
				<h4><strong>
				<span class="glyphicon glyphicon-user"></span> Nama  &nbsp &nbsp &nbsp&nbsp: &nbsp<?php echo $this->session->userdata('nama_karyawan'); ?>
				</strong></h4>
			
				<h4><strong>
				<span class="glyphicon glyphicon-briefcase"></span> Jabatan &nbsp  : &nbsp<?php echo $this->session->userdata('jabatannya'); ?>
				</strong></h4>
			</div>
</div>
		<div class="row">
		
			<div class="col-lg-12 table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<thead class="text-center" style="background-color: #6db1ff">
					  <tr>
						<th style="text-align: center;">No</th>
						<th style="text-align: center;">Hari/Tanggal</th>
						<th style="text-align: center;">Goal</th>
						<th style="text-align: center;">Action</th>
						<th style="text-align: center;">Kendala</th>
						<th style="text-align: center;">Result</th>
						<th style="text-align: center;">Deadline</th>
						<th style="text-align: center;">Departement</th>
						<th style="text-align: center; background-color: orange">Note</th>
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
							<td style="max-width: 150px; word-wrap: break-word; overflow: auto;"><?php echo $u->nama_goals ?></td>
							<td style="max-width: 300px; word-wrap: break-word; overflow: auto;"><?php echo $u->action ?></td>
							<td><?php echo $u->kendala ?></td>
							<td style="max-width: 100px; word-wrap: break-word; overflow: auto;"><?php echo $u->result ?></td>
							<td><?php echo date("d-m-Y", strtotime($u->deadline)) ?></td>
							<td><?php echo $u->nama_dept ?></td>
							<td style="background-color: #f9f9b6" ><?php echo $u->note ?></td>
							

						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>


		<div class="row ">
		 <div class="col-sm-4"></div>
		  <!-- <div class="col-sm-5" style="text-align: right;">
					<form id="form_kpim" action="<?php base_url();?>kpimmingguan/updatestatus" method="POST">
						
						<input type='hidden' class="form-control" name="isistatus" value="2" /> 
						<input type="submit" name="input" style="font-family: 'Exo 2'; margin-top:5px" class="btn btn-warning" value="Send"> 
					</form>
		  </div> -->
		  <div class="col-sm-8 text-right">
		  <a class= "btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin-top:5px" href="<?php echo base_url(); ?>home"><h7><span class="glyphicon glyphicon-home"></span> Home</h7></a>
		  <a class= "btn btn-primary" href="<?php echo base_url(); ?>kpimmingguan/replykpimnext" style="font-family: 'Exo 2', sans-serif; font-style: italic; margin-top:5px"><h7>Notifikasi Plan Next Week </h7><span class="glyphicon glyphicon-arrow-right"></span></a></div>
		</div>

		
			</div>
		</div><br><br><br>
		

			<div class="container">
			<div class="dialogbox">
		    <div class="body">
		      <span class="tip tip-up"></span>
		      <div class="message">
		       
		    <p class="info">
			<text style="font-family: 'Exo 2', sans-serif, medium">
			<b>Informasi Terkait Notifikasi :</b><br></text>
			<text style="font-family: 'Exo 2', sans-serif; font-style: italic;">
			1. Penerima notifikasi diharap memahami maksud notifikasi <br>
			2. Apabila ada yang kurang dimengerti maka diharap langsung menghadap pemberi notifikasi<br>
			3. Segera kerjakan apa yang dimaksud dalam notifikasi<br>
			4. Notifikasi akan tampil selama 7 hari<br>
			</text>
			</p>
		      </div>
			</div>
			</div>
			</div>

		<div class="outputClass" id="outputdiv"></div>
	
		<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url();?>assets/js/moment.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<script>

		function confirmDialog() {
		 return confirm('Apakah anda yakin akan menghapus data?')
		}


		$(function() {
		  $('input[id^=MyDate]').datetimepicker({ format: 'YYYY-MM-DD' });
		});
		

		$(function () {
					$('#datetimepicker1').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		$(function () {
					$('#datetimepicker2').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		$(function () {
				   $('#datetimepicker3').datetimepicker({
						//format: 'DD/MM/YYYY'
						useCurrent: false,
						format: 'YYYY-MM-DD',
						ignoreReadonly: true,
						minDate: moment().millisecond(0).second(0).minute(0).hour(-24),
						maxDate: moment().millisecond(0).second(0).minute(0).hour(24)
					});         
				});
		$(function () {
				   $('#datetimepicker4').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		$(function () {
				   $('#datetimepicker_tgledit').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
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
		</script>
		
		
		
	</div>
</div>


</body>
</html>
