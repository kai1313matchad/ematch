<!DOCTYPE html>
<html lang="en">
<head>

<title>KPIM Online | Report Subordinate</title>
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
<!--<script src="<?php echo base_url(); ?>bootstrap-confirm-delete.js"></script>!-->

</head>
<body class="kedua semua">

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
	                <li><a href="<?php echo base_url();?>reportsub">KPIM Report Subordinate</a></li>
	                <li class="active"><a href="#">KPIM Plan Next Week</a></li>
	                <!-- <li><a href="<?php echo base_url(); ?>reportkaryawan">Grafik Report Karyawan</a></li> -->
	                <!-- <li><a href="<?php echo base_url(); ?>kpimmingguan/jadwal">Jadwal Pengumpulan KPIM</a></li> -->
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

<div class="container">
	<div class="background">
		<div id='div1'>
		<h1 style="padding-top: 20px"><center>KPIM Online - Plan Next Week</center></h1><br><br>
	
		
			<div class="row">
				<div class="col-lg-6 text-left">
				<h4><text style="word-spacing: 20px">Nama </text> <text style="word-spacing: 30px;">: </text><?php echo $nama->nama_karyawan; ?></text></h4>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 text-left">
				<h4 style="word-spacing: 5px">Tanggal <text style="word-spacing: 30px;">: </text>  <text style="word-spacing: 30px;"> <?php echo date("d-m-Y", strtotime($piltglstart)) ?> </text>     <text style="color: #c96604; font-style: italic; word-spacing: 30px;"> sampai </text><?php echo date("d-m-Y", strtotime($piltglend)) ?></h4> 
				</div>

			</div>
			<br/>

			<div class="row">
				<div class="col-lg-12 table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead class="text-center" style="background-color: #f9bc2c">
						  <tr>
						  	<!--<th style="text-align: center;">tes</th>!-->
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Tanggal</th>
							<th style="text-align: center;">Goal</th>
							<th style="text-align: center;">Action</th>
							<th style="text-align: center;">Departement</th>
							<th style="text-align: center;">Deadline</th>
							<th style="text-align: center;" colspan="2">Approved</th>
							<th style="text-align: center;" colspan="2">Note</th>
						  </tr>
						</thead>
						<tbody >
						<?php 
						$no = 1;
						if (!isset($table)) {
							echo "tidak ada data";
						}
						else {
							
						foreach($table as $u){ 
							
							
							error_reporting(0);
						?>
							<tr>
								<!--<td style="text-align: center;"><?php echo $u->id_karyawan ?></td>!-->
								<td style="text-align: center;"><?php echo $no++ ?></td>
								<td style="text-align: center;"><?php echo nama_hari($u->tgl).', '. tgl_indo($u->tgl)?></td>
								<td style="text-align: center; max-width: 100px; word-wrap: break-word; overflow: auto;"><?php echo $u->nama_goals ?></td>
								<td style="text-align: center; max-width: 250px; word-wrap: break-word; overflow: auto;"><?php echo $u->action ?></td>
								<td style="text-align: center;"><?php echo $u->nama_dept ?></td>
								<td style="text-align: center;"><?php echo nama_hari($u->deadline).', '. tgl_indo($u->deadline)?></td>
								<td style="text-align: center;font-size: 20px; letter-spacing: 1px">
									<?php switch ($u->id_approve)
									{
									case 1:
									  echo   '<span class="label label-success"><span class="glyphicon glyphicon-ok"></span></span>';
									  break;
									case 2:
									  echo   '<span class="label label-danger"><span class="glyphicon glyphicon-remove"></span></span>';
									  break;
									default:
									  echo "";
									}
									?>				
								</td>
								<td style="text-align: center;">
										<center>
										<button data-toggle="modal" data-target="#myModal<?php echo $u->id ?>" type="button" class="btn btn-default btn-sm">
								          <span class="glyphicon glyphicon-edit"></span> 
								          <text style="text-transform: capitalize; " > ACC</text> 
								        </button></center> 
									  <!-- Modal -->
									  <div class="modal fade" id="myModal<?php echo $u->id ?>" role="dialog">
									    <div class="modal-dialog modal-sm">
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title">Approved</h4>
									        </div>
									        <div class="modal-body">
									        <form id="form_kpim" action="<?php echo base_url();?>reportsubnext2/updateapprove/<?php echo $u->id ?>" method="POST">
									        <select name="approve" class="form-control" required>
									        	<option value="">-- Pilih --</option>
												<option value="1" <?php if($u->id_approve == 1){echo 'selected' ;}; ?>>Disetujui</option>
												<option value="2" <?php if($u->id_approve == 2){echo 'selected' ;}; ?>>Tidak disetujui</option>
											</select>
											<input type="hidden" name="id" value="<?php echo $idkar;?>">
									      	<input type="hidden" name="piltglstart" value="<?php echo $piltglstart;?>">
									      	<input type="hidden" name="piltglend" value="<?php echo $piltglend;?>">
									      	
										        <!-- <select>
										        <option value="Ok"><span class="glyphicon glyphicon-ok"></span></option>	
										        <option value="La"><span class="glyphicon glyphicon-remove"></span></option>
										        </select> -->
									         
									        </div>
									        <div class="modal-footer">
									           <button type="button" class="btn btn-default" data-dismiss="modal" style="font-family: 'Exo 2', sans-serif; "><span class="glyphicon glyphicon-floppy-remove"></span> Batal</button>
		        								<button type="submit" name="input"  class="btn btn-primary" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
									        </div>
									        </form>
									      </div>
									    </div>
									  </div>
									  <!-- modal -->
								</td>

								<!-- td sebelah -->

								<td style="text-align: center;">
									<?php echo $u->note ?>			
								</td>
								<td style="text-align: center;">
										<center>
										<button data-toggle="modal" data-target="#myModalnote<?php echo $u->id ?>" type="button" class="btn btn-default btn-sm">
								          <text style="text-transform: capitalize; font-family: 'Exo 2', sans-serif;" >Beri Catatan </text> 
								          <span class="glyphicon glyphicon-pencil"></span> 
								        </button></center> 
									  <!-- Modal -->
									  <div class="modal fade" style="padding-top: 40px" id="myModalnote<?php echo $u->id ?>" role="dialog">
									    <div class="modal-dialog modal-lg">
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title">Beri Catatan</h4>
									        </div>
									        <div class="modal-body">
									        <form id="form_kpim" action="<?php echo base_url();?>reportsubnext2/updatenote/<?php echo $u->id ?>" method="POST">
									        	<input type="text" placeholder="Tulis di sini.." class="form-control" name="note" value="<?php echo $u->note ?>">

									        	<input type="hidden" name="id" value="<?php echo $idkar;?>">
										      	<input type="hidden" name="piltglstart" value="<?php echo $piltglstart;?>">
										      	<input type="hidden" name="piltglend" value="<?php echo $piltglend;?>">
									        
									        </div>
									        <div class="modal-footer">
									           <button type="button" class="btn btn-default" data-dismiss="modal" style="font-family: 'Exo 2', sans-serif; "><span class="glyphicon glyphicon-floppy-remove"></span> Batal</button>
		        								<button type="submit" name="input"  class="btn btn-primary" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
									        </div>
									        </form>
									      </div>
									    </div>
									  </div>
									  <!-- modal -->
								</td>
								

								

							</tr>
						<?php } } ?>
						</tbody>


					


					</table>
					

				</div>
			</div>

		</div>


		<div class="row ">
		 
		  <div class="col-sm-12" style="text-align: right;">
		  <div style="float: left;"><button class="btn btn-success" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" onclick="printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print Plan Next Week</button> <text style="color:blue"></text></div>
					<form id="form_kpim" action="<?php base_url();?>reportsubnext2/updatestatus" method="POST">
						<a class= "btn btn-primary" href="<?php echo base_url(); ?>reportsubnext2" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><i><span class="glyphicon glyphicon-arrow-left"></span> Kembali</i></h7></a>
						<a class= "btn btn-primary" href="<?php echo base_url(); ?>home" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><span class="glyphicon glyphicon-home"></span> Home</h7></a>
						<input type='hidden' class="form-control" name="isistatus" value="3" />
						<input type="hidden" name="input"  class="btn btn-warning" value="Send">
					</form>
		  </div>

		</div>


<!--
		<div class="row">
			<div class="col-lg-offset-8" style="text-align: right; margin-right: 15px">
				
			<form id="form_kpim" action="<?php base_url();?>reportsub/updatestatus" method="POST">
			<a class= "btn btn-primary" href="home"><h7>Home</h7></a>
				<input type='hidden' class="form-control" name="isistatus" value="2" />
				<input type="submit" name="input"  class="btn btn-warning" value="Send">
			</form>
			<a class= "btn btn-primary" href="reportsubnext"><h7>Plan Next Week</h7></a>
				<!--<a class= "btn btn-primary" href="reportsubnext"><h5><strong>Plan Next Week</strong></h5></a>!-->

		
			</div>
		</div><br><br><br>
		<!--<div class="row">
			<p class="info">
			<text style="font-family: 'Exo 2', sans-serif, medium">
			<b>Ketentuan pengisian nilai aktual :</b><br></text>
			<text style="font-family: 'Exo 2', sans-serif; font-style: italic;">
			1. Total maksimal score karyawan adalah 100<br>
			2. Total nilai maksimal persentase KPIM adalah 75%<br>
			3. Standart bobot penilaian KPIM ditentukan oleh masing - masing departement<br>
			4. Standart penilaian KPIM karyawan (aktual) dilihat dari selesai dikerjakan, masih proses atau tidak dikerjakannya suatu goals<br>
			5. Penilaian juga dipertimbangkan berdasarkan Goals, Action, Result dan Deadline<br>
			6. Untuk Goals yang tidak tercapai pada minggu I harus tetap di cantumkan di KPIM minggu<br>
			7. Plannext Week (Rencana kegiatan/pekerjaan pekan depan) wajib diisi<br></text>
			</p>
		</div>!-->

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
			5. Penilaian juga dipertimbangkan berdasarkan Goals, Action, Result dan Deadline<br>
			6. Untuk Goals yang tidak tercapai pada minggu I harus tetap di cantumkan di KPIM minggu<br>
			7. Plannext Week (Rencana kegiatan/pekerjaan pekan depan) wajib diisi<br></text>
			</p>
		      </div>
			</div>
			</div>
			</div>

		<div class="outputClass" id="outputdiv"></div>

		<script>
			function printContent(el){
			    var restorepage = document.body.innerHTML;
			    var printcontent = document.getElementById(el).innerHTML;
			    document.body.innerHTML = printcontent;
			    window.print();
			    document.body.innerHTML = restorepage;

			}
			</script>
	
		<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/moment.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>
		<script language="javascript">
		    function hanyaAngka(e, decimal) {
		    var key;
		    var keychar;
		     if (window.event) {
		         key = window.event.keyCode;
		     } else
		     if (e) {
		         key = e.which;
		     } else return true;
		   
		    keychar = String.fromCharCode(key);
		    if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
		        return true;
		    } else
		    if ((("0123456789").indexOf(keychar) > -1)) {
		        return true;
		    } else
		    if (decimal && (keychar == ".")) {
		        return true;
		    } else return false;
		    }
		</script>



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
						format: 'YYYY-MM-DD'
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
