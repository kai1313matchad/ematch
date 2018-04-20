<!DOCTYPE html>
<html>
<head>
	<title>Report Nilai</title>
	<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript" scr="<?php echo base_url(); ?>/assets/js/jquery-1.11.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">
</head>
<style type="text/css">
	.test {
    	background-color: #eee;
    }
</style>
<body class="semua home">
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
	                <!-- <li class="active"><a href="#">KPIM Report Sub - Kordinat</a></li> -->
	                
	                		<li class="dropdown">
			                    <a href="#" class="dropdown-toggle test" data-toggle="dropdown">Report Nilai
			                    <span class="caret"></span>
			                    </a>
			                    <ul class="dropdown-menu"> 
			                    	<li><a href="<?php echo base_url(); ?>kpimmingguan">KPIM Mingguan</a></li>
			                        <li><a href="<?php echo base_url(); ?>kpimmingguan/kpimterkirim">KPIM Terkirim</a></li>
			                        <li><a href="<?php echo base_url(); ?>reportku/tdkinput">Report Tidak Input</a></li>
			                        
			                    </ul>
			                 </li>
	                <!-- <li><a href="<?php echo base_url(); ?>kpimmingguannext">KPIM Plan Next Week</a></li> -->
	                <!-- <li><a href="<?php echo base_url(); ?>reportkaryawan">Grafik Report Karyawan</a></li> -->
	                <!-- <a class="btn btn-success navbar-btn" href="<?php echo base_url(); ?>kpimmingguan/jadwal" style="font-family: 'Exo 2', sans-serif; margin-left: 5px ">Jadwal Penilaian Terakhir KPIM</a> -->
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


	<div class="container-fluid" style="max-width: 600px; background-color: black; color: white; border:solid 4px #3498DB; border-radius: 15px;">

		<div class="row"> 
			<div class="col-sm-3"></div>
			<div class="col-sm-8 text-center" style="padding-top: 10px"><h4>Pilih Periode Mingguan</h4></div>
		</div>
	
		<form id="form_kpim" action="<?php echo base_url();?>reportku/berinilai/" method="POST">
		<!-- <div class="row" style="padding-top: 15px">
			<div class="col-sm-3"> 
			<text style="word-spacing: 10px">Departement :
			</text>
			</div>




			<div class="col-sm-8" style="padding-bottom: 10px">
				<select class="form-control semua" id="pilihdept" name="jabatan" >
				<option>--- Pilih Departement ---</option>
					<?php foreach ($isinamadept->result() as $key): ?>
						<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
					<?php endforeach ?>


			       
			      </select>
			      <input type="hidden" value="<?php echo $this->session->userdata('id_karyawan'); ?>" id="idkar">
			      <input type="hidden" value="<?php echo $this->session->userdata('level'); ?>" id="jab">
			      <input type="hidden" value="<?php echo $this->session->userdata('hak_akses'); ?>" id="hak">
			</div>
		</div>

		<script type="text/javascript">
			function ambilkaryawan(){
				
				$('#pilihdept').change(function() {
					//var id = {id:$('#pilihdept').val()};
					//var idkar = {idkar:$('#idkar').val()};
				    $.ajax({
				        type: "POST",
				        url: "<?php echo base_url().'reportsub/get_karyawan2'; ?>",
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
			<div class="col-sm-3"> 
			<text style="word-spacing: 56px">Nama :</text>
			</div>

			<div class="col-sm-8" style="padding-bottom: 10px">
				<select class="form-control" id="namakar" name="pilihkar" placeholder="Pilih Karyawan" required>
				
		      </select>
			</div>
		</div> -->

		<div class="row" style="padding-bottom:10px">
			<div class="col-sm-3"> 
			<text style="word-spacing: 10px">Departement :</text>
			</div>
			<div class="col-sm-8">
				<select id="pilihdept" name="tgs_dept" class="form-control" required oninvalid="this.setCustomValidity('Pilih terlebih dahulu')" oninput="setCustomValidity('')">
					<option value="">-- Pilih Dept --</option>
					<?php foreach ($isinamadept->result() as $key): ?>
					<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>

		


		<div class="row">
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
		</div>

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

		<div class="row">
			<div class="col-sm-3"> 
			
			</div>

			<div class="col-sm-8 text-center" style="padding-bottom: 15px"> <button type="submit" name="input"  class="btn btn-primary col-sm-12" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-zoom-in"></span> Tampilkan</button>
			</div>
		</div>
		</form>
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


</body>
</html>