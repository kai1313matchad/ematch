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
<body class="semua ketiga">
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
                    
                    <li class=""><a href="<?php echo base_url(); ?>kpimmingguan/ijin">Ijin Karyawan</a></li>
                    <li><a href="<?php echo base_url(); ?>pengumuman/libur">Hari Libur</a></li>
                    
                    <?php } ?>

                    <?php 
					if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5 ) { ?>
                    
                    <li class="active" ><a href="<?php echo base_url(); ?>karyawan/subordinate">Susunan Subordinate</a></li>

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
		<!-- <h1 style="padding-top: 20px; color: #0f6296"><center>Pesan</center></h1> -->

		<?php
		
		$this->db->select("*");
		$this->db->from('karyawan');	
		$this->db->where('id_jabatan !=', 1);
		$this->db->where('id_jabatan !=', 11);
		$this->db->where('status', "Aktif");
		$karyawan = $this->db->get();  
		
		?>
		

	<div class="container">

		

		

		

				
		

		<form id="" action="<?php echo base_url();?>Karyawan/updatesubordinate/<?php echo $penilai->id_penilai ?>" method="POST" enctype="multipart/form-data">

			<!-- select2 -->
			<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

			<script>
			  $(document).ready(function() { 
			   $("select.select").select2(); 
			  });
			</script>
			<!-- select2 -->

			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<h4 style="padding-bottom: 5px">Penilai : </h4>
					<select style="height: 35px; font-size: 18px; text-align-last:center; " name="id_penilai" id="" class="select form-control" required="">
						<option value="">-- Pilih Penilai --</option>
						<?php 
						foreach ($karyawan->result() as $row)
						{ ?>
						<option value="<?php echo $row->id_karyawan ?>" <?php if($penilai->id_penilai == $row->id_karyawan) {echo 'selected';} ?>> <?php echo $row->nama_karyawan ?></option>
						        
						<?php }
						?>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-md-offset-4">	
					<h4 style="padding-bottom: 5px">yang dinilai : </h4>
					<?php foreach($dinilai as $s){ ?>
						<div class="checkbox">
					      <label><input type="checkbox" name="id_dinilai[]" value="<?php echo $s->id_dinilai ?>" checked><?php echo $s->namaygdinilai ?></label>
					    </div>
					<?php } ?>

					<center><a href="<?php echo base_url() ?>karyawan/subordinate"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></a>
					<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-saved"></span> simpan</button></center>
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

	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
		// $('#tabel_subordinate').DataTable();
	} );
	</script>


</body>
</html>