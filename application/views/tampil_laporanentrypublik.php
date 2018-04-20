<!DOCTYPE html>
<html>
<head>
	<title>Laporan Entry Karyawan</title>
	<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

	<style type="text/css">
		

		.jarak {
			padding-top: 60px;
		}

		.keterangan{
		background-color: white;
		border: 4px inset cornflowerblue;
	    outline-style: solid;
	    outline-color: black;
	   	width: 50%;
  		margin: 0 auto;
  		margin-top: 10px;

		}

		.keterangan2{
		background-color: white;
		border: 4px inset limegreen;
	    outline-style: solid;
	    outline-color: black;
	   	width: 50%;
  		margin: 0 auto;
  		margin-top: 10px;

		}

		
      
	</style>



	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
</head>
<body class="nilai semua">
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
	            <a href="<?php echo base_url(); ?>index" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> E-Match.</a>
	        </div>
	        <div class="collapse navbar-collapse">
	            <ul class="nav navbar-nav">
                    <!-- <li><a href="<?php echo base_url(); ?>reportsub">KPIM Report Subordinate Mingguan</a></li>
                    <li><a href="<?php echo base_url(); ?>reportsubnext2">KPIM Plan Next Week</a></li> -->
                    <li class="active"><a href="#" >Laporan Input KPIM</a></li>
                                
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
												<!-- -
												<?php
													foreach ($dept->result() as $row) { 
												?>		
													<b><?php echo $row->nama_dept; ?></b>
												<?php	}
												?> -->

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
	
	<div class="container jarak">
	
		<center><h1 style="padding-bottom: 50px">Laporan Input KPIM Karyawan</h1></center>

	<!-- <form id="form_kpim" action="<?php echo base_url();?>Laporan/entry" method="POST">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-2"></div>
			<div class="col-sm-6 col-md-offset-4">
				<div class="col-sm-2"><h4>Libur :</h4></div>
				<div class="col-sm-4">
				
					<select class="form-control" name="libur">
							<option value='0'>Tidak ada</option>
							<option value='1'>1 Hari</option>
							<option value='2'>2 Hari</option>
							<option value='3'>3 Hari</option>
							<option value='4'>4 Hari</option>
							<option value='5'>5 Hari</option>
							<option value='6'>6 Hari</option>
							<option value='7'>7 Hari</option>
							<option value='8'>8 Hari</option>
							<option value='9'>9 Hari</option>
							<option value='10'>10 Hari</option>
					</select>
				</div>
				<div class="col-sm-5">
				<text style="color: red; ">*Wajib diisi bila ada libur Nasional/Cuti Bersama</text>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-2"> 
			
			</div>

			<div class="col-sm-6 text-center" style="padding-bottom: 15px"> <button type="submit" name="input"  class="btn btn-primary col-sm-12" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-zoom-in"></span> Tampilkan</button>
			</div>
		</div>

	</form> -->



<div id='div1'>
	<?php
	if (isset($tglstart) AND $tglstart < $tglend) {
	echo '<div class="keterangan">';
	}?>
	<h4 align="center"> 
	(Karyawan 5 Hari Kerja) <br>
	<?php echo $periode ?> <br><br>


	<?php
	if (isset($tglstart) AND $tglstart < $tglend) {
		// echo nama_hari($tglstart).', '. tgl_indo($tglstart);
    echo nama_hari($tglstart).', '. date("d-M-Y",strtotime($tglstart)) . ' <text style="color:red; padding:0px 10px 0px 10px; "> sampai </text> '. nama_hari($tglend).', '. date("d-M-Y",strtotime($tglend));
	}
	?>
	
	
	<!-- data hari libur -->
	<?php
	$liburresmi = array();
	foreach ($harilibur as $hr) {
		$liburresmi[] = $hr->tgl;
	} 
	?>



	<!-- untuk mencari hari libur sabtu dan minggu karyawan kerja 5 hari-->
	<?php 
		$liburweekend = array();
		foreach ($daterange as $tanggal) {
			// $D = date('Y-m-d', strtotime($tanggal));
			if (date('N',strtotime($tanggal) ) == '7' || date('N', strtotime($tanggal))  == '6') {
				$liburweekend[] = $tanggal;					
			}
		} ?>
	<!-- untuk mencari hari libur karyawan kerja 5 hari -->


	<?php 
	$dt_harikerja=array_diff($daterange,$liburweekend);// hari kerja
	$result=array_diff($dt_harikerja,$liburresmi); // hari kerja - data libur
	$lib = array_intersect($dt_harikerja,$liburresmi); //ambil tgl merah saja (data libur)
	// var_dump($result); komen : ini hasilnya (hari kerja saja sdh dikurangi libur nasional)
	$libur = count($lib); //total libur
	 ?>

	<?php //untuk menghitung hari kerja 
		//get current month for example
		// $beginday=date("Y-m-01");
		// $lastday=date("Y-m-t");
	if (isset($tglstart) AND $tglstart < $tglend) {
		
		$harikerja = getWorkingDays($tglstart,$tglend);
		echo '<br><br>Hari Kerja :<text style=color:#1e6cea> '. $harikerja .' Hari</text>';
	}

	if (isset($libur) AND $libur>0){
		echo ' - <text style=color:orange> Libur ' .$libur . ' Hari</text>';
		$totalhari = $harikerja - $libur;
		echo ' = ' . $totalhari . ' Hari';
	}

		function getWorkingDays($startDate, $endDate){
		 $begin=strtotime($startDate);
		 $end=strtotime($endDate);
		 if($begin>$end){
		  echo "<text style='color:red'>Tanggal start harus lebih kecil dari tanggal akhir!</text>";
		  return '';
		 }else{
		   $no_days=0;
		   $weekends=0;
		  while($begin<=$end){
		    $no_days++; // no of days in the given interval
		    $what_day=date("N",$begin);
		     if($what_day>5) { // 6 and 7 are weekend days
		          $weekends++;
		     };
		    $begin+=86400; // +1 day
		  };
		  $working_days=$no_days-$weekends;
		  return $working_days;
		 }
		}
	?>

	</h4>
	</div>
	<div class="table-responsive">
		<table id="dataTables" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
	        <thead>
	        	
	            <tr>
	                <th style="text-align: center;">NO.</th>
	                <th style="text-align: center;">Nama</th>
	                <th style="text-align: center;">Pangkat</th>
	                <th style="text-align: center;">Jabatan</th>
	                <th style="text-align: center;">Departement</th>
	                <th style="text-align: center;">Total Input</th>
	                <th style="text-align: center;">Total Tidak Input</th>
	                <th style="text-align: center;">Detail Tidak Input</th>
	            </tr>
	            
	        </thead>
			
			<tbody >
						<?php 
						$no = 1;
						if (!isset($semua)) {
							echo "tidak ada data";
						}
						else {
							
						foreach($semua as $u){ 
							
						?>
							<tr>
								<td style="text-align: center;"><?php echo $no++ ?></td>
								<td style="text-align: center;"><?php echo $u->nama_karyawan ?></td>
								<!-- <td style="text-align: center;"><?php echo $u->nama_karyawan ?></td> -->
								<td style="text-align: center;"><?php echo $u->nama_akses ?></td>
								<td style="text-align: center;"><?php echo $u->jabatannya ?></td>
								<td style="text-align: center; "><?php echo $u->deptini ?></td>
								<td style="text-align: center;"><?php echo $u->jumlah ?> Hari</td>
								<td style="text-align: center; min-width: 90px; font-weight:bold">
								<?php 
								if (isset($tglstart) AND $tglstart < $tglend) {
								echo $harikerja - $u->jumlah - $libur; ?> Hari
								<?php } ?>
								</td>
								<td style="text-align: center;">
									<form id="form_kpim" action="<?php echo base_url();?>reportku/detailtdkinput" method="POST">
									<input type="hidden" name="idkar" value="<?php echo $u->id_karyawan; ?>"></input>
									<input type="hidden" name="harikerja" value="<?php echo $u->harikerja; ?>"></input>
									<input type="hidden" name="tglstart" value="<?php echo $tglstart; ?>"></input>
									<input type="hidden" name="tglend" value="<?php echo $tglend; ?>"></input>
									<button type="submit" class="btn btn-sm text-capitalize" style="color:white; font-family: 'Exo 2'; background: #cb2d3e; background: -webkit-linear-gradient(to right, #ef473a, #cb2d3e); background: linear-gradient(to right, #ef473a, #cb2d3e);"><span class="glyphicon glyphicon-plus-sign"></span> Detail</button>
									</form>
								</td>
								

							</tr>
							
						<?php } } ?>
						</tbody>
						<?php if (empty($tglstart)){
							echo "<tr>
								<td colspan='8' align='center' style='color:red'>
										Masukan tanggal periode terlebih dahulu
									
								</td>
							</tr>";
							}
						?>

						<?php if (isset($tglstart) AND $tglstart > $tglend){
							echo "<tr>
								<td colspan='8' align='center' style='color:red'>
										Tanggal start harus lebih kecil dari tanggal end!
									
								</td>
							</tr>";
							}
						?>
		</table>
	</div>

<!-- batas antar laporan 5 hari dengan 6 hari -->

	<!-- untuk mencari hari libur sabtu dan minggu karyawan kerja 6 hari-->
	<?php 
		$liburweekend = array();
		foreach ($daterange as $tanggal) {
			// $D = date('Y-m-d', strtotime($tanggal));
			if (date('N',strtotime($tanggal) ) == '7') {
				$liburweekend[] = $tanggal;					
			}
		} ?>
	<!-- untuk mencari hari libur karyawan kerja 6 hari -->

	<?php 
	$dt_harikerja=array_diff($daterange,$liburweekend);// hari kerja
	$result=array_diff($dt_harikerja,$liburresmi); // hari kerja - data libur
	$lib = array_intersect($dt_harikerja,$liburresmi); //ambil tgl merah saja (data libur)
	// var_dump($result); komen : ini hasilnya (hari kerja saja sdh dikurangi libur nasional)
	$libur = count($lib); //total libur
	 ?>

		<?php
		if (isset($tglstart) AND $tglstart < $tglend) {
		echo '<div class="keterangan2">';
		}?>
		<h4 align="center"> 
		(Karyawan 6 Hari Kerja) <br>
		<?php echo $periode ?> <br><br>


		<?php
		if (isset($tglstart) AND $tglstart < $tglend) {
			// echo nama_hari($tglstart).', '. tgl_indo($tglstart);
	    echo nama_hari($tglstart).', '. date("d-M-Y",strtotime($tglstart)) . ' <text style="color:red; padding:0px 10px 0px 10px; "> sampai </text> '. nama_hari($tglend).', '. date("d-M-Y",strtotime($tglend));
		}
		?>
		<div></div>
		<!-- <?php
		if (isset($tglstart)) {
				$tglini = date_create($tglstart);
				$tglitu = date_create($tglend);
				$jumlahhari = date_diff($tglini, $tglitu);
				echo '<br/>(' .$jumlahhari->format("%d")."  Hari)";
			}
		?> ini untuk jarak berapa hari hari H ke H -->

		<!-- <?php // menghitung jarak hari termasuk hari pertama
			if (isset($tglstart) AND $tglstart < $tglend) {
			// $ts1 = strtotime($tglstart);
			// $ts2 = strtotime($tglend);

			// $hitunghari = $ts2 - $ts1; //menghitung jarak hari termasuk hari pertama
			// // echo '</br/>(Total : '. date("d",$hitunghari) . ' Hari, ';
			// echo '</br/>(Total : ' .floor($hitunghari / (60 * 60 * 24)) . ' Hari, ';

			$date1 = new DateTime($tglstart);
			$date2 = new DateTime($tglend);
			$date2->add(new DateInterval('P1D'));

			$diff = $date2->diff($date1)->format("%a");

			 echo '</br/>(Total : '. $diff . ' Hari, ';

			// $totalhari = date("d",$hitunghari);

			}
		?> -->


		<?php //untuk menghitung hari kerja 
			//get current month for example
			// $beginday=date("Y-m-01");
			// $lastday=date("Y-m-t");
		if (isset($tglstart) AND $tglstart < $tglend) {
			
			$harikerja = getWorkingDays6($tglstart,$tglend);
			echo '<br/>Hari Kerja :<text style=color:#1e6cea> '. $harikerja .' Hari</text>';
		}

		if (isset($libur) AND $libur>0){
			echo ' - <text style=color:orange> Libur ' .$libur . ' Hari</text>';
			$totalhari = $harikerja - $libur;
			echo ' = ' . $totalhari . ' Hari';
		}

			function getWorkingDays6($startDate, $endDate){
			 $begin=strtotime($startDate);
			 $end=strtotime($endDate);
			 if($begin>$end){
			  echo "<text style='color:red'>Tanggal start harus lebih kecil dari tanggal akhir!</text>";
			  return '';
			 }else{
			   $no_days=0;
			   $weekends=0;
			  while($begin<=$end){
			    $no_days++; // no of days in the given interval
			    $what_day=date("N",$begin);
			     if($what_day>6) { // 6 and 7 are weekend days
			          $weekends++;
			     };
			    $begin+=86400; // +1 day
			  };
			  $working_days=$no_days-$weekends;
			  return $working_days;
			 }
			}
		?>

		</h4>
		</div>
		<div class="table-responsive">
			<table id="dataTables6" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th style="text-align: center;">NO.</th>
		                <th style="text-align: center;">Nama</th>
		                <!-- <th style="text-align: center;">Nama Lengkap</th> -->
		                <th style="text-align: center;">Pangkat</th>
		                <th style="text-align: center;">Jabatan</th>
		                <th style="text-align: center;">Departement</th>
		                <th style="text-align: center;">Total Input</th>
		                <th style="text-align: center;">Total Tidak Input</th>                
	                	<th style="text-align: center;">Detail Tidak Input</th>

		                
		            </tr>
		        </thead>
				
				<tbody >
							<?php 
							$no = 1;
							if (!isset($semua)) {
								echo "tidak ada data";
							}
							else {
								
							foreach($semua6 as $u){ 
								
							?>
								<tr>
									<!--<td style="text-align: center;"><?php echo $u->id_karyawan ?></td>!-->
									<td style="text-align: center;"><?php echo $no++ ?></td>
									<td style="text-align: center;"><?php echo $u->nama_karyawan ?></td>
									<!-- <td style="text-align: center;"><?php echo $u->nama_karyawan ?></td> -->
									<td style="text-align: center;"><?php echo $u->nama_akses ?></td>
									<td style="text-align: center;"><?php echo $u->jabatannya ?></td>
									<td style="text-align: center; "><?php echo $u->deptini ?></td>
									<td style="text-align: center;"><?php echo $u->jumlah ?> Hari</td>					
									<td style="text-align: center; min-width: 90px; font-weight:bold">
										<?php 
										if (isset($tglstart) AND $tglstart < $tglend) {
										echo $harikerja - $u->jumlah - $libur;
										} ?> Hari	
									</td>

									<td style="text-align: center;">
										<form id="form_kpim" action="<?php echo base_url();?>reportku/detailtdkinput" method="POST">
										<input type="hidden" name="idkar" value="<?php echo $u->id_karyawan; ?>"></input>
										<input type="hidden" name="harikerja" value="<?php echo $u->harikerja; ?>"></input>
										<input type="hidden" name="tglstart" value="<?php echo $tglstart; ?>"></input>
										<input type="hidden" name="tglend" value="<?php echo $tglend; ?>"></input>
										<button type="submit" class="btn btn-sm text-capitalize" style="font-family: 'Exo 2', sans-serif; background: #136a8a; background: -webkit-linear-gradient(to right, #267871, #136a8a); background: linear-gradient(to right, #267871, #136a8a); color: white"><span class="glyphicon glyphicon-plus-sign"></span> Detail</button>
										</form>
									</td>
									


								</tr>
								
							<?php } } ?>
							</tbody>
							<?php if (empty($tglstart)){
								echo "<tr>
									<td colspan='8' align='center' style='color:red'>
											Masukan tanggal periode terlebih dahulu
										
									</td>
								</tr>";
								}
							?>

							<?php if (isset($tglstart) AND $tglstart > $tglend){
								echo "<tr>
									<td colspan='8' align='center' style='color:red'>
											Tanggal start harus lebih kecil dari tanggal end!
										
									</td>
								</tr>";
								}
							?>
			</table>
</div>
	</div>
	</div>	
	<br/>
	<div class="col-lg-12" align="center">
		<button class="btn btn-primary" style="font-family: 'Exo 2', sans-serif;  " onclick="ayo(); printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print Report</button> <text style="color:blue">*Pastikan tanggal periode benar!</text>	
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
	<br/>

	<div style="padding-bottom: 30px"></div>



	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	// $(document).ready(function() {
	// 	$('#dataTables').DataTable();
	// } );

	function ayo(){
        $("#dataTables6 td:nth-child(8)").css({'display':'none'});
        $("#dataTables td:nth-child(8)").css({'display':'none'});
        $("#dataTables6 th:nth-child(8)").css({'display':'none'});
        $("#dataTables th:nth-child(8)").css({'display':'none'});
    }

	$(document).ready(function(){
		jQuery.extend( jQuery.fn.dataTableExt.oSort, {
		    "formatted-num-pre": function ( a ) {
		        a = (a === "-" || a === "") ? 0 : a.replace( /[^\d\-\.]/g, "" );
		        return parseFloat( a );
		    },
		 
		    "formatted-num-asc": function ( a, b ) {
		        return a - b;
		    },
		 
		    "formatted-num-desc": function ( a, b ) {
		        return b - a;
		    }
		} );
	$('#dataTables').dataTable( {
		columnDefs: [
       { type: 'formatted-num', targets: 0 }
     ],
	    // Sets the row-num-selection "Show %n entries" for the user
	    "lengthMenu": [ 10, 20, 40, 60, 80, 100, 200 ], 
	    
	    // Set the defult no. of rows to display
	    "pageLength": 100,

	    


	} );
	} );

	// batas


// $('#tbl_jaar').dataTable( {
//      columnDefs: [
//        { type: 'formatted-num', targets: 0 }
//      ]
//   } );
	</script>

	<script>
	// $(document).ready(function() {
	// 	$('#dataTables').DataTable();
	// } );

	$(document).ready(function() {
	$('#dataTables6').dataTable( {
	    // Sets the row-num-selection "Show %n entries" for the user
	    "lengthMenu": [ 10, 20, 40, 60, 80, 100, 200 ], 
	    
	    // Set the defult no. of rows to display
	    "pageLength": 100 
	} );
	} );
	</script>

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

	

	

	


	<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>assets/js/moment.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
</body>
</html>