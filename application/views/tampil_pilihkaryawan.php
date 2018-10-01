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
			                    <a href="#" class="dropdown-toggle test" data-toggle="dropdown">KPIM Report Subordinate Mingguan
			                    <span class="caret"></span>
			                    </a>
			                    <ul class="dropdown-menu"> 
			                        <li><a href="<?php echo base_url(); ?>reportsub2">Report Subordinate yang sudah dinilai</a></li>
			                    </ul>
			                 </li>
	                <li><a href="<?php echo base_url(); ?>reportsubnext2">KPIM Plan Next</a></li>
	                <?php if ($this->session->userdata('level') == 1 ){ ?>
	                	<li><a href="<?php echo base_url(); ?>karyawan/bobot">Master Bobot</a></li>
	                <?php } ?>
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
		<img src="<?php echo base_url();?>assets/img/kpimlogo.png" alt="KIMP Online" name="KPIM Online" style="width:auto; height:90px; margin-bottom: 10px" >
		</center>


	<div class="container-fluid" style="max-width: 600px; background-color: gray; color: white; border:solid 4px orange; border-radius: 15px;">

		<div class="row"> 
			<div class="col-sm-12 text-center" style="padding-top: 10px"><h4>KPIM Report Subordinate</h4></div>
		</div>
	
		<form id="form_kpim" action="<?php echo base_url();?>reportsub/berinilai/" method="POST">
		<div class="row" style="padding-top: 15px">
			<div class="col-sm-3"> 
			<text style="word-spacing: 10px">Departement :
			</text>
			</div>




			<div class="col-sm-8" style="padding-bottom: 10px">
				<select class="form-control semua" id="pilihdept" name="pilihdept" >
				<option>--- Pilih Departement ---</option>
					<?php foreach ($isinamadept->result() as $key): ?>
						<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
					<?php endforeach ?>


			       <!--<?php 
		            foreach($isidept as $row)
		            { 
		              echo '<option class="semua" value="'.$row->id_dept.'">'.$row->nama_dept.'</option>';
		            }
		            ?>!-->
			      </select>
			      <input type="hidden" value="<?php echo $this->session->userdata('id_karyawan'); ?>" id="idkar">
			      <input type="hidden" value="<?php echo $this->session->userdata('level'); ?>" id="jab">
			      <input type="hidden" value="<?php echo $this->session->userdata('hak_akses'); ?>" id="hak">
			</div>
		</div>

		<!-- jika admin maka menggunakan akses ini (akses ver.1) -->
		<?php if ($this->session->userdata('level') == 1) { ?>

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
			
		<?php } ?>


		<!-- jika bukan admin maka menggunakan akses ini (akses ver.2) berdasarkan susunan subordinate -->
		<?php if ($this->session->userdata('level') != 1) { ?>
		<script type="text/javascript">
			function ambilkaryawan(){
				
				$('#pilihdept').change(function() {
					//var id = {id:$('#pilihdept').val()};
					//var idkar = {idkar:$('#idkar').val()};
				    $.ajax({
				        type: "POST",
				        url: "<?php echo base_url().'reportsub/get_karyawanterbaru'; ?>",
				        data: {iddept:$('#pilihdept').val(), idkar:$('#idkar').val(), jab:$('#jab').val(), hak:$('#hak').val()}, //id,
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
		<?php } ?>



		

		

	

		<div class="row">
			<div class="col-sm-3"> 
			<text style="word-spacing: 56px">Nama :</text>
			</div>

			<div class="col-sm-8" style="padding-bottom: 10px">
				<select class="form-control" id="namakar" name="pilihkar" placeholder="Pilih Karyawan" required>
				<!-- <option>--- Pilih karyawan ---</option>
					<?php foreach ($isinamakaryawan->result() as $key): ?>
						<option value="<?php echo $key->id_karyawan;?>"> <?php echo $key->nama_karyawan;?></option>
					<?php endforeach ?> -->
		        <!--<option value="">-- Pilih Karyawan ---</option>!-->




		        <!--<?php
					foreach ($ambilkaryawanall->result() as $row) { 
				?>		
					<option value="<?php echo $row->id_karyawan; ?>"><i><?php echo $row->nama_karyawan; ?></i>
					</option>

				<?php	}
				?>!-->
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

			<div class="col-sm-8 text-center" style="padding-bottom: 15px"> <button type="submit" name="input"  class="btn btn-warning col-sm-12" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-zoom-in"></span> Tampilkan</button>
			</div>
		</div>
		</form>
	</div>
	<br><br>

	<!-- <center><h3 style="font-weight: bold">Susunan Daftar Penilai :</h3> <br>
	<img class="img-responsive" src="<?php echo base_url() ?>/assets/img/menilai.png" alt="Tabel menilai karyawan" title="Tabel menilai karyawan"></center> -->

	<div class="container" style="padding-top: 50px">
		<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Data Susunan Subordinate</a></li>
                           
                        </ul>
                </div>
                <div id="div1"  class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                        	<div class="col-lg-12 table-responsive">
								<table id="tabel_subordinate" class="table table-bordered table-hover table-striped" style="text-align: center;" width="100%">
									<thead class="text-center" style="background-color: orange">
									  <tr>
										<th style="text-align: center; width: 50px">No</th>
										
										<th style="text-align: center;">Penilai</th>
										
										<th style="text-align: center;">Dinilai</th>

									  </tr>
									</thead>
									<tbody id="konten">

										<?php $no = 1; ?>

										<?php foreach($susunansub as $s){ ?>

										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $s->namapenilai ?></td>
											<td><ol style="text-align:left"><li><?php echo $s->subnya ?></li></ol></td>
										</tr>

										 
										<?php }?>

										

									
									</tbody>
								</table>
							</div><!-- ini tutup div pesan terkirim -->
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    	$(document).ready(function(){
    		$('#tabel_subordinate').DataTable({
    			paging: false
    		});
    	})
    </script>

	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">


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