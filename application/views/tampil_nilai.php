<!DOCTYPE html>
<html>
<head>
	<title>Laporan Nilai Akhir / Rata-rata Karyawan</title>
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
		border: 4px inset red;
	    outline-style: solid;
	    outline-color: black;
	   	width: 50%;
  		margin:10px auto 20px;
  		padding: 5px 0 10px;

		}

		/*body{
			background: #948E99;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #2E1437, #948E99);   Chrome 10-25, Safari 5.1-6 
			background: linear-gradient(to right, #2E1437, #948E99); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}*/

	

		
      
	</style>



	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
</head>
<body class="nilai2 semua">
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
                    <li><a href="<?php echo base_url(); ?>reportkaryawan">Grafik Report Karyawan</a></li>
                    <?php 
					if ($this->session->userdata('id_dept') == 2 || $this->session->userdata('level') == 1 ) { ?>
                    <li><a href="<?php echo base_url(); ?>kpimmingguan/ijin">Ijin Karyawan</a></li>
                    <li><a href="<?php echo base_url(); ?>pengumuman/libur">Hari Libur</a></li>
                    <?php } ?>
                    <li><a href="<?php echo base_url(); ?>laporan">Laporan Entry Karyawan</a></li>
                    <li class="active"><a href="#">Nilai Rata-Rata Karyawan</a></li>
                     <!-- <a class="btn btn-danger navbar-btn" href="<?php echo base_url(); ?>kpimmingguan/jadwal" style="font-family: 'Exo 2', sans-serif; margin-left: 5px ">Jadwal Pengumpulan KPIM</a> -->
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
	
		<center><h2 style="padding-bottom: 50px">Laporan Nilai Akhir / Nilai Rata-rata KPIM Karyawan</h2></center>

	<form id="form_kpim" action="<?php echo base_url();?>Nilai/berinilai" method="POST">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-2"> 
			<text><h3>Pilih Tanggal :</h3></text>
			</div>

			<div class="col-lg-3 text-center">
				<div class="form-group">
					<div class='input-group date' id='datetimepicker1' style="color: black">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' class="form-control input-group-addon" name="tglstart" placeholder="Start" required />
					</div>
				</div>
			</div>

			<div class="col-sm-3 text-center">
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


		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-2"> 
			
			</div>

			<div class="col-sm-6 text-center" style="padding-bottom: 15px"> <button type="submit" name="input"  class="btn btn-danger col-sm-12" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-zoom-in"></span> Tampilkan</button>
			</div>
		</div>
	</form>

<div id='div1'>
	<?php
	if (isset($tglstart) AND $tglstart < $tglend) {
	echo '<div class="keterangan">';
	}?>
	<h4 align="center"> 

	<?php
	if (isset($tglstart) AND $tglstart < $tglend) {
		// echo nama_hari($tglstart).', '. tgl_indo($tglstart);
    echo 'Nilai untuk Periode :<br/><br/>'. nama_hari($tglstart).', '. date("d-M-Y",strtotime($tglstart)) . ' <text style="color:red; padding:0px 10px 0px 10px; "> sampai </text> '. nama_hari($tglend).', '. date("d-M-Y",strtotime($tglend));
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


	<!-- <?php //untuk menghitung hari kerja 
		//get current month for example
		// $beginday=date("Y-m-01");
		// $lastday=date("Y-m-t");
	if (isset($tglstart) AND $tglstart < $tglend) {
		
		$harikerja = getWorkingDays($tglstart,$tglend);
		echo '<br/>Hari Kerja :<text style=color:#1e6cea> '. $harikerja .' Hari</text>';
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
	?> -->

	</h4>
	</div>
	<div class="table-responsive">
		<table id="dataTables" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th style="text-align: center;">NO.</th>
	                <th style="text-align: center;">Nama</th>
	                <!-- <th style="text-align: center;">Nama Lengkap</th> -->
	                <th style="text-align: center;">Pangkat</th>
	                <th style="text-align: center;">Jabatan</th>
	                <th style="text-align: center;">Departement</th>
	                <th style="text-align: center;">Nilai</th>
	                <th style="text-align: center;">Nilai (%)</th>
	                <th style="text-align: center;">Keterangan</th>
	                
	           
	                
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
								<!--<td style="text-align: center;"><?php echo $u->id_karyawan ?></td>!-->
								<td style="text-align: center;"><?php echo $no++ ?></td>
								<td style="text-align: center;"><?php echo $u->nama_karyawan ?></td>
								<!-- <td style="text-align: center;"><?php echo $u->nama_karyawan ?></td> -->
								<td style="text-align: center;"><?php echo $u->nama_akses ?></td>
								<td style="text-align: center;"><?php echo $u->jabatannya ?></td>
								<td style="text-align: center;"><?php echo $u->deptini ?></td>
								<td style="text-align: center;"><?php echo $u->totalnilai ?></td>
								<td style="text-align: center;"><?php echo round ( $u->jumlah,2) ?> %</td>				
								<td class="totalpersen" style="text-align: center; font-size: 20px;">
								<?php
									$status_nilai = '';
									$nilai_akhir = $u->jumlah;
									$case = '';
									if ($nilai_akhir >= '0'){
										$status_nilai = 'Under Expectation';
										$case = '1';
										// print "<style type=\"text/css\">.totalpersen {background-color: red; color:white;}</style>\n";
									}

									if ($nilai_akhir > '30'){
										$status_nilai = 'Not Meet Expectation';
										$case = '2';
										// print "<style type=\"text/css\">.totalpersen {background-color: #a86700; color:white;}</style>\n";
									}

									if ($nilai_akhir > '45'){
										$status_nilai = 'Meet Expectation';
										$case = '3';
										// print "<style type=\"text/css\">.totalpersen {background-color: #e8cc00; color:white;}</style>\n";
										
									}

									if ($nilai_akhir > '56.2'){
										// print "<style type=\"text/css\">.totalpersen {background-color: green; color:white;}</style>\n";
										$status_nilai = 'Exceeds Expectation';
										$case = '4';
										
									}
									if ($nilai_akhir > '63.7'){
										$status_nilai = 'Exceptional';
										$case = '5';
										// print "<style type=\"text/css\">.totalpersen {background-color: #0085d8;}</style>\n";
									}

									// echo $status_nilai;


								?>

								<?php switch ($case)
							{
							case 1:
							  echo   '<span class="label label-danger">'.$status_nilai.'</span>';
							  break;
							case 2:
							  echo   '<span class="label label-warning">'.$status_nilai.'</span>';
							  break;
							case 3:
							  echo   '<span class="label label-default">'.$status_nilai.'</span>';
							  break;
							 case 4:
							  echo   '<span class="label label-primary">'.$status_nilai.'</span>';
							  break;
							 case 5:
							  echo   '<span class="label label-primary" style="background-color:green">'.$status_nilai.'</span>';
							  break;
							default:
							  echo "tidak ada data";
							}
							?>				
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
		<div class="col-lg-1"></div>
		<div class="col-lg-11">
			<div style="float: left;">
			<button class="btn btn-success" style="font-family: 'Exo 2', sans-serif;" onclick="printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print Report</button> <text style="color:blue">*Pastikan tanggal periode benar!</text>	
			</div>
		</div>
	</div>

	<br/><br/>

	<div class="col-lg-12" align="center">
		<div class="col-lg-1"></div>
		<div class="col-lg-11">
			<div style="float: left;">
				<button class="btn btn-default" id="show" style="font-family: 'Exo 2', sans-serif;">Tampilkan</button>
				<button class="btn btn-default ini" id="hide" style="font-family: 'Exo 2', sans-serif; display: none;">Sembunyikan</button>		
			</div>
		</div>
	</div>
	<br/>
	<br/><br/>


	<div class="row ini" style="display: none; padding-left: 100px">
		<div class="col-sm-3" align="center">
          <style type="text/css">
          .tg  {border-collapse:collapse;border-spacing:0;}
          .tg td{padding:10px 5px;border-style:solid;border-width:1px;}
          .tg th{font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;}
          .tg .tg-5xqe{background-color:#ffd36d;text-align:center;vertical-align:top; color: black}
          .tg .tg-pn40{background-color:#253247;text-align:center; color:white;}
          .tg .tg-giv5{background-color:#fffe65;text-align:center; color: black}
          .tg .tg-wr27{background-color:#ffd36d;text-align:center; color: black}
          .tg .tg-7ygo{background-color:#ffd36d;text-align:center;vertical-align:top; color: black}
          </style>
          <table class="tg" style="float:center;">
            <tr>
              <th class="tg-pn40" colspan="2">Penilaian Karyawan</th>
            </tr>
            <tr>
              <td class="tg-giv5">KPIM</td>
              <td class="tg-wr27">75 %</td>
            </tr>
            <tr>
              <td class="tg-giv5">Disiplin</td>
              <td class="tg-wr27">10 %</td>
            </tr>
            <tr>
              <td class="tg-7ygo">Softskill</td>
              <td class="tg-5xqe">15 %</td>
            </tr>
             <tr>
              <td class="tg-5xqe" style="background-color: white">Total</td>
              <td class="tg-5xqe" style="background-color: white">100 %</td>
            </tr>
          </table>
        </div>
      


        <div class="col-sm-9">            
          <style type="text/css">
          .tg  {border-collapse:collapse;border-spacing:0;}
          .tg td{padding:10px 5px;border-style:solid;border-width:1px;}
          .tg th{font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;}
          .tg .tg-e5lu{background-color:#253247;color:#ffffff;text-align:center;vertical-align:top}
          .tg .tg-ejr1{background-color:#ffd36d;text-align:center;vertical-align:top}
          .tg .tg-bgyt{background-color:#253247;color:#ffffff;text-align:center}
          .tg .tg-giv5{background-color:#fffe65;text-align:center}
          .tg .tg-7ygo{background-color:#fffe65;text-align:center;vertical-align:top}
          .tg .tg-nbme{background-color:#ffd36d;text-align:center}
          </style>
          <table class="tg" style="float:center;">
				<tr>
					<th class="tg-bgyt" colspan="6">Parameter Total Penilaian Akhir (%)</th>
				</tr>
			  <tr>
			  	<th class="tg-bgyt" ></th>
			    <th class="tg-bgyt" style="background-color: firebrick">Under Expectation<br/>(Di Bawah Harapan)</th>
			    <th class="tg-bgyt" style="background-color: #d18c02">Not Meet Expectation<br/>(Tidak Sesuai Harapan)</th>
			    <th class="tg-bgyt" style="background-color: gray">Meet Expectation<br/>(Sesuai Harapan)</th>
			    <th class="tg-e5lu" style="background-color: #1d67e0">Exceeds Expectation<br/>(Melebihi Harapan)</th>
			    <th class="tg-e5lu" style="background-color: green">Exceptional<br/>(Istimewah)</th>
			  </tr>

			  <tr>
			  	<td class="tg-giv5">Score : </td>
			    <td class="tg-giv5">0 - 40</td>
			    <td class="tg-giv5">>40 - 60</td>
			    <td class="tg-giv5">>60 - 75</td>
			    <td class="tg-7ygo">>75 - 85</td>
			    <td class="tg-7ygo">>85 - 100</td>
			  </tr>
			  <tr>
			  	<td class="tg-nbme">Persentase: </td>
			    <td class="tg-nbme">0 - 30%</td>
			    <td class="tg-nbme">31% - 45%</td>
			    <td class="tg-nbme">46% - 56.2%</td>
			    <td class="tg-ejr1">56.3% - 63.7%</td>
			    <td class="tg-ejr1">63.8% - 75%</td>
			  </tr>
			</table>
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
	<br/>

	<div style="padding-bottom: 30px"></div>



	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	// $(document).ready(function() {
	// 	$('#dataTables').DataTable();
	// } );

	$(document).ready(function() {
	$('#dataTables').dataTable( {
	    // Sets the row-num-selection "Show %n entries" for the user
	    "lengthMenu": [ 10, 20, 40, 60, 80, 100, 200 ], 
	    
	    // Set the defult no. of rows to display
	    "pageLength": 100 
	} );
	} );
	</script>

	<script> //ini untuk hide show table
		$(document).ready(function(){
		    $("#hide").click(function(){
		        $(".ini").hide(1000);
		    });
		    $("#show").click(function(){
		        $(".ini").show(1000);
		    });

		   
		});
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