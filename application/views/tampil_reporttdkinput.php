<!DOCTYPE html>
<html lang="en">
<head>

<title>KPIM Online | Report Nilai Karyawan</title>
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
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

</head>
<style type="text/css">
	.test {
    	background-color: #eee;
    }

    .nilaiakhir{
    	font-size: 30px;
    	border-radius: 10px;
    	padding: 10px 0 10px 0;
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
	                <!-- <li class="active"><a href="#">KPIM Report Subordinat</a></li> -->
	                
	                		<li class="dropdown">
			                    <a href="#" class="dropdown-toggle test" data-toggle="dropdown">Report Tidak Input
			                    <?php if (!isset($darireport)) { ?>
			                    <span class="caret"></span>
			                    <?php } ?>
			                    </a>
			                    <?php if (!isset($darireport)) { ?>
			                    <ul class="dropdown-menu"> 
			                        <li><a href="<?php echo base_url(); ?>kpimmingguan">KPIM Mingguan</a></li>
			                        <li><a href="<?php echo base_url(); ?>kpimmingguan/kpimterkirim">KPIM Terkirim</a></li>
			                        <li><a href="<?php echo base_url(); ?>reportku">Report Nilai</a></li>
			                    </ul>			                    	
			                    <?php } ?>
			                    
			                 </li>
	                <!-- <li><a href="<?php echo base_url(); ?>reportsubnext2">KPIM Plan Next Week</a></li> -->
	                <!-- <li><a href="<?php echo base_url(); ?>reportkaryawan">Grafik Report Karyawan</a></li> -->
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

<div class="container">
	<div class="background">
		<div id='div1'>
		<h1 style="padding-top: 20px; color: #3498DB"><center>Laporan Tanggal Karyawan tidak input KPIM</center></h1><br><br>
	  

		
		<div class="row">
			<div class="col-lg-6 text-left">
			<h4><text style="word-spacing: 20px">Nama </text> <text style="word-spacing: 30px;">: </text><?php echo $nama->nama_karyawan; ?></text></h4>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 text-left">
			<?php $tglstart = date("d-m-Y", strtotime($piltglstart)); ?>
			<?php $tglend = date("d-m-Y", strtotime($piltglend)); ?>

			<!-- <?php echo nama_hari($u->tgl).', '. tgl_indo($u->tgl)?> -->

				<h4>Tanggal &nbsp:  &nbsp &nbsp &nbsp &nbsp<?php echo nama_hari($piltglstart).', '. $tglstart;?>
					<text style="color: #c96604; font-style: italic;"> &nbsp &nbsp sampai&nbsp &nbsp &nbsp </text>     <?php echo nama_hari($piltglend).', '. $tglend;?>

					<?php // menghitung jarak hari termasuk hari pertama
					$date1 = new DateTime($tglstart);
					$date2 = new DateTime($tglend);
					$date2->add(new DateInterval('P1D'));

					$diff = $date2->diff($date1)->format("%a");
					 // echo ' ( Total : '. $diff . ' Hari )';
					?>
				</h4>
			</div>
			

			<?php
			$s = strtotime($piltglstart);
			$e = strtotime($piltglend);
			//$rata = ($piltglstart*$piltglend);

			$tanggal = date ('Y-m-d', ($s+$e)/2 );

			//echo $tanggal;
			?>

		</div>
		<br/>

		<!-- untuk mengisi tanggal berapa saja inputnya mulai -->
		<?php 
			$datanya = array();
			foreach ($table as $input) {
				$datanya[] = $input->tgl;	  
			}
			rsort($daterange);
		?>
		<!-- untuk mengisi tanggal berapa saja inputnya selesai -->

		<div class="col-lg-12 table-responsive">
			<table id="dataTables" class="table table-bordered table-hover table-striped">
				<thead class="text-center" style="background-color: #ba0129; color: white">
				  <tr>
				  	<th style="text-align: center;">No. </th>
					<th style="text-align: center; font-size: 20px;">Anda tidak input KPIM pada Hari/Tanggal :</th>
				  </tr>
				</thead>
				<tbody>

					<!-- untuk mencari libur resmi perusahaan -->
					<?php
					$liburresmi = array();
					foreach ($harilibur as $hr) {
						$liburresmi[] = $hr->tgl;
					} 
					?>
					<!-- untuk mencari libur resmi perusahaan -->

					<!-- cek hari kerja -->
					<?php if (isset($dinokerjo)) {
						$hr_kerja = $dinokerjo;
					}
					else{
						$hr_kerja = $this->session->userdata('harikerja');
					}
					?>
					<!-- cek hari kerja -->

					<?php if ($hr_kerja == 5) { ?>
						<!-- untuk mencari hari libur sabtu dan minggu karyawan kerja 5 hari-->
						<?php 
							$libur = array();
							foreach ($daterange as $tanggal) {
								// $D = date('Y-m-d', strtotime($tanggal));
								if (date('N',strtotime($tanggal) ) == '7' || date('N', strtotime($tanggal))  == '6') {
									$libur[] = $tanggal;					
								}
							} ?>
						<!-- untuk mencari hari libur karyawan kerja 5 hari -->
					<?php } ?>

					<?php if ($hr_kerja == 6) { ?>
						<!-- untuk mencari hari libur karyawan kerja 6 hari-->
						<?php 
							$libur = array();
							foreach ($daterange as $tanggal) {
								// $D = date('Y-m-d', strtotime($tanggal));
								if (date('N',strtotime($tanggal) ) == '7') {
									$libur[] = $tanggal;					
								}
							} ?>
						<!-- untuk mencari hari libur karyawan kerja 5 hari -->
					<?php } ?>

					<!-- <?php var_dump($libur) ; ?> ini hari libunya -->
					<!-- <?php var_dump($daterange) ; ?> ini semua hari pada periodenya -->

					<!-- untuk mengurangi (daterange - libur) mulai-->
					<?php 
						$harikerja=array_diff($daterange,$libur);
						$result=array_diff($harikerja,$liburresmi);
						$lib = array_intersect($harikerja,$liburresmi); //ambil tgl merah saja
						// var_dump($result); komen : ini hasilnya (hari kerja saja sdh dikurangi libur nasional)
					?>
					<!-- untuk mengurangi (daterange - libur) mulai-->

					
					<span style="display:block; font-size: 20px; padding-left:10px; background-color: #0c627b; text-align: left; color: #e1f740; border-radius:7px 7px 0px 0px">
						Total Hari kerja :  
						<?php echo  count($harikerja) . ' hari - ' . 'Libur : ' . count($lib).' hari = ' . count($result); ?> Hari
						<!-- <br>
						Total Input KPIM :  
						<?php echo count($datanya); ?> Hari -->
					</span>

					<!-- untuk mencari tgl brp saja user tidak input -->
				   <?php 
				   $jmltdkinput = array();
				   $no = 1;
					   	foreach($result as $a)
					    {
					        if(in_array($a, $datanya))
					        {
					        	// echo 'ada : ' .$a. '<br>';
					            
					        }
					        else
					        { ?>
					        <tr>
					        	<td>
					        		<?php echo $no++; ?>					        		
					        	</td>

								<td style="font-size: 20px">
									<?php echo nama_hari($a) . ', '. date('d-M-Y', strtotime($a));
									$jmltdkinput[] = $a;
									?>
								</td>	
							</tr>			            
					        <?php 
					    	}    
					    }

					 ?>
					<!-- untuk mencari tgl brp saja user tidak input -->

					<span style="font-size:25px; background-color: #0c627b; color: white; display: block; text-align:left; padding-left:10px; margin-bottom:8px;">Total tidak input : <?php echo sizeof($jmltdkinput)  ?>  Hari</span>
			    	
				</tbody>
			</table>
		</div>

		</div> <!-- ini div batas print -->

	

		

		<div style="padding-bottom: 15px; font-size: 17px">
			Apabila ada data yang tidak sesuai, silahkan menghubungi Dept IT / HC
		</div>

		<div class="row ">
		 
		  <div class="col-sm-12" style="text-align: right;">
			  <div style="float: left;">
			  	<button class="btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" onclick="printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print Report
			  	</button> 
			  </div>
				<?php if (!isset($darireport)) { ?>  
	  				<a class= "btn btn-primary" href="<?php echo base_url(); ?>reportku/tdkinput" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><i><span class="glyphicon glyphicon-arrow-left"></span> Kembali</i></h7></a>
					<a class= "btn btn-primary" href="<?php echo base_url(); ?>home" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><span class="glyphicon glyphicon-home"></span> Home</h7></a>
				<?php } ?>
				<?php if (isset($darireport)) { ?>
					<a class= "btn btn-primary" href="<?php echo base_url(); ?>laporan/entry" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><i><span class="glyphicon glyphicon-arrow-left"></span> Kembali</i></h7></a>
					<a class= "btn btn-primary" href="<?php echo base_url(); ?>index" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><span class="glyphicon glyphicon-home"></span> Home</h7></a>
				<?php } ?>
				

		  </div>
		  

		</div>

			<script>
			function printContent(el){
			    var restorepage = document.body.innerHTML;
			    var printcontent = document.getElementById(el).innerHTML;
			    document.body.innerHTML = printcontent;
			    window.print();
			    document.body.innerHTML = restorepage;

			}
			</script>
		
			

		<div class="outputClass" id="outputdiv"></div>
	
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

		<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
		<script>
		$(document).ready(function() {
			$('#dataTables').DataTable();
		} );
		</script>
	</div>
</div>


</body>
</html>
