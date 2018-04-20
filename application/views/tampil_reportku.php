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
<!--<script src="<?php echo base_url(); ?>bootstrap-confirm-delete.js"></script>!-->

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
			                    <a href="#" class="dropdown-toggle test" data-toggle="dropdown">Report Nilai
			                    <span class="caret"></span>
			                    </a>
			                    <ul class="dropdown-menu"> 
			                        <li><a href="<?php echo base_url(); ?>kpimmingguan">KPIM Mingguan</a></li>
			                        <li><a href="<?php echo base_url(); ?>kpimmingguan/kpimterkirim">KPIM Terkirim</a></li>
			                    </ul>
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
		<h1 style="padding-top: 20px; color: #3498DB"><center>Report Nilai Karyawan</center></h1><br><br>

		
		
		<div class="row">
			<div class="col-lg-6 text-left">
			<h4><text style="word-spacing: 20px">Nama </text> <text style="word-spacing: 30px;">: </text><?php echo $nama->nama_karyawan; ?></text></h4>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 text-left">
			<?php $tglstart = date("d-m-Y", strtotime($piltglstart)); ?>
			<?php $tglend = date("d-m-Y", strtotime($piltglend)); ?>

			<!-- <?php echo nama_hari($u->tgl).', '. tgl_indo($u->tgl)?> -->

			<h4>Tanggal &nbsp:  &nbsp &nbsp &nbsp &nbsp<?php echo nama_hari($piltglstart).', '. $tglstart;?>
				<text style="color: #c96604; font-style: italic;"> &nbsp &nbsp sampai&nbsp &nbsp &nbsp </text>     <?php echo nama_hari($piltglend).', '. $tglend;?></h4>
			</div>
<!-- 
			<div class="col-sm-6 text-right"><a class= "btn btn-primary" href="<?php echo base_url(); ?>reportsub" style="font-family: 'Exo 2', sans-serif;"><h7><i>Kembali</i></h7></a></div> -->

			

			<?php
			$s = strtotime($piltglstart);
			$e = strtotime($piltglend);
			//$rata = ($piltglstart*$piltglend);

			$tanggal = date ('Y-m-d', ($s+$e)/2 );

			//echo $tanggal;
			?>

		</div>
		<br/>


		<div class="row">
			<div class="col-lg-12 table-responsive">
				<table id="dataTables" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
					<thead class="text-center" style="background-color: #3498DB;">
					  <tr>
					  	<!--<th style="text-align: center;">tes</th>!-->
						<th style="text-align: center;">No</th>
						<th style="text-align: center;">Hari/Tanggal</th>
						<th style="text-align: center;">Goal</th>
						<th style="text-align: center;">Action</th>
						<th style="text-align: center;">Kendala</th>
						<th style="text-align: center;">Result</th>
						<th style="text-align: center;">Deadline</th>
						<th style="text-align: center;">Nilai Subordinate</th>
						<th style="text-align: center;">Dept</th>
						<th style="text-align: center;">Ket. Deadline</th>
						<th style="text-align: center;">Bobot (%)</th>
						<th style="text-align: center;">Target (Point)</th>
						<th style="text-align: center;">Actual</th>
						<th style="text-align: center;">Score</th>
						<th style="text-align: center;">Note</th>
						<?php 
						$this->db->where('tgl >=', $piltglstart);
						$this->db->where('tgl <= ', $piltglend);
						$this->db->where('kpim_karyawan.id_karyawan', $idkar);
						$this->db->where('status_nilai', 1);
						$this->db->join('kpim_karyawan', 'kpim_karyawan.id = detail_nilai.id_kpim');
						$this->db->join('karyawan', 'karyawan.id_karyawan = detail_nilai.id_penilai');
						$this->db->group_by('nama_karyawan');
						$this->db->order_by('nama_karyawan', 'asc');
						$query = $this->db->get('detail_nilai');
						foreach ($query->result() as $key) { ?>
							<th> <?php echo $key->nama_karyawan; ?> </th>

						<?php }?>
					  </tr>
					</thead>
					<tbody >
					<?php 
					$no = 1;
					if (!isset($table)) {
						echo "tidak ada data";
					}
					else {
						$sumbobot = 0;
						$sumtarget = 0;
						$sumactual = 0;
						$sumscore = 0;
					foreach($table as $u){ 

						$totalrow = count($table);
						
						$sumbobot += $u->bobot;
						$sumtarget += $u->target;
						$sumactual += $u->actual;
						$sumscore += $u->score;
						error_reporting(0);
					?>

					
						<tr>
							<!--<td style="text-align: center;"><?php echo $u->id_karyawan ?></td>!-->
							<td style="text-align: center;"><?php echo $no++ ?></td>
							<td style="text-align: center;"><?php echo nama_hari($u->tgl).', '. tgl_indo($u->tgl)?></td>
							<td style="text-align: center; max-width: 100px; word-wrap: break-word; overflow: auto;"><?php echo $u->nama_goals ?></td>
							<td style="text-align: center; max-width: 90px; word-wrap: break-word; overflow: auto;" ><?php echo $u->action ?></td>
							<td style="text-align: center;"><?php echo $u->kendala ?></td>
							<td style="text-align: center; max-width: 90px; word-wrap: break-word; overflow: auto;"><?php echo $u->result ?></td>
							<td style="text-align: center;"><?php echo date("d-m-Y", strtotime($u->deadline)) ?></td>
							<td style="text-align: center; max-width: 90px; word-wrap: break-word; overflow: auto;"><?php echo $u->usulnilai ?></td>
							<td style="text-align: center;"><?php echo $u->nama_dept ?></td>
							<td style="text-align: center; padding-top: 15px; font-size: 20px; letter-spacing: 1px">
							<?php switch ($u->status_deadline)
							{
							case 1:
							  echo   '<span class="label label-success">Intime</span>';
							  break;
							case 2:
							  echo   '<span class="label label-warning">Ontime</span>';
							  break;
							case 3:
							  echo   '<span class="label label-danger">Overtime</span>';
							  break;
							default:
							  echo "No number between 1 and 3";
							}
							?>				

							</td>
							<td style="text-align: center;"><?php echo $u->bobot ?></td>
							<td style="text-align: center;"><?php echo $u->target ?></td>
							<td style="text-align: center;"><?php echo round($u->actual,2) ?></td>
							<td style="text-align: center;"><?php echo round ($u->score,1) ?></td>
							<td style="text-align: center; max-width: 200px; word-wrap: break-word; overflow: auto;">
							<?php if ($u->note == '0'){
								echo "";
							}
							else {
							echo $u->note;
							}
							?></td>
							<?php 
							$this->db->where_not_in('id_penilai', $this->session->userdata('id_karyawan'));
							$this->db->join('karyawan', 'karyawan.id_karyawan = detail_nilai.id_penilai');
							$this->db->group_by('nama_karyawan');
							$this->db->order_by('nama_karyawan', 'asc');
							$query = $this->db->get_where('detail_nilai', array('id_kpim' => $u->id));
							foreach ($query->result() as $key) { ?>
								<td style="text-align: center; background-color: #6dbcff" >
								 <?php echo $key->nilai_actual; ?> </td>

							<?php }?>
						</tr>
					<?php } } ?>
					</tbody>


				<!-- <tr style="background-color: #6ded68; border:2px solid gray; border-bottom: 2px solid gray;">
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: left;">Total :</td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"><?php echo  $sumbobot; error_reporting(0);?></td>
					<td style="text-align: center;"><?php echo  $sumtarget; error_reporting(0);?></td>
					<td style="text-align: center;"><?php echo  $sumactual; error_reporting(0);?></td>
					<td style="text-align: center;">
					<?php $sumscore2 = round ($sumscore,1); echo $sumscore2; error_reporting(0);?></td>
					<td style="text-align: center;"></td>
					

					
				</tr> -->
				<tr style="background-color: #ECF0F1; border:2px solid gray;">
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: left;">Penilaian Akhir :</td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<!--<td style="text-align: center;">
						<?php
						$satus = '100';

						$total = $score / $bobot * $satus ;

						if ( $total == 0 )
							{
							     // don't divide by zero, handle special case
							} else {
								$etotal = round ($total,1);
							     echo $etotal;
							}

      	
						//echo round ($total,1);
						 error_reporting(0);?>%
					</td>!-->
					<td style="text-align: center;">
						<?php
						$satus = '100';

						$total = $sumscore / $totalrow * 1.3;

						// $total = $sumscore / $sumbobot * $satus ;
						if ( $total == 0 )
							{
							     // don't divide by zero, handle special case
							} else {
								$etotal = round ($total,1);
							     echo $etotal;
							}

      	
						//echo round ($total,1);
						 error_reporting(0);?>
					</td>
					<td style="text-align: center;"></td>
					<?php 
					$this->db->where('tgl >=', $piltglstart);
					$this->db->where('tgl <= ', $piltglend);
					$this->db->where('kpim_karyawan.id_karyawan', $idkar);
					$this->db->where('status_nilai', 1);
					$this->db->join('kpim_karyawan', 'kpim_karyawan.id = detail_nilai.id_kpim');
					$this->db->join('karyawan', 'karyawan.id_karyawan = detail_nilai.id_penilai');
					$this->db->group_by('nama_karyawan');
					$this->db->order_by('nama_karyawan', 'asc');
					$query = $this->db->get('detail_nilai');
					foreach ($query->result() as $key) { ?>
						<td></td>
					<?php }?>
					
				</tr>


				</table>
				

			</div>
		</div>
		

			<?php
				$nilaiakhir = round ($etotal/100*75,1);
				$status_nilai = '';
				
				if ($nilaiakhir >= '1'){
					$status_nilai = 'Under Expectation';
					print "<style type=\"text/css\">.totalpersen {background-color: firebrick; color:white;}</style>\n";
				 }

				 if ($nilaiakhir > '30' ){
				 	$status_nilai = 'Not Meet Expectation';
				 	print "<style type=\"text/css\">.totalpersen {background-color: #d18c02; color:white;}</style>\n";
				 }

				 if ($nilaiakhir > '45' ){
				 	$status_nilai = 'Meet Expectation';
				 	 print "<style type=\"text/css\">.totalpersen {background-color: gray; color:white;}</style>\n";
				 	
				 }

				 if ($nilaiakhir > '56.2' ){
				 	$status_nilai = 'Exceeds Expectation';
				 	print "<style type=\"text/css\">.totalpersen {background-color: #1d67e0; color:white;}</style>\n";
				 	
				 }

				 if ($nilaiakhir > '63.7' ){
				 	$status_nilai = 'Exceptional';
				 	print "<style type=\"text/css\">.totalpersen {background-color: green;}</style>\n";
				 }

				 // echo '<br/> ini' . $totalpersen;
			?>
		<div class="nilaiakhir totalpersen">
		Nilai Score = <?= $etotal . ', Persentase = ' . $nilaiakhir ?>% (<?= $status_nilai?>)
			
		</div><br>

		</div> <!-- ini div batas print -->

	

		

		<div style="padding-bottom: 15px; font-size: 17px">
			<b>Intime</b> = Sebelum Deadline | <b>Ontime</b> = Sesuai Deadline | <b>Overtime</b> = Melebihi Deadline 
		</div>

		<div class="row ">
		 
		  <div class="col-sm-12" style="text-align: right;">
		  <div style="float: left;"><button class="btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" onclick="printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print Report</button> <text style="color:blue">*Cetak pada akhir penilaian</text></div>
		  


		  				<a class= "btn btn-primary" href="<?php echo base_url(); ?>reportku" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><i><span class="glyphicon glyphicon-arrow-left"></span> Kembali</i></h7></a>
						<a class= "btn btn-primary" href="<?php echo base_url(); ?>home" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><span class="glyphicon glyphicon-home"></span> Home</h7></a>
						<!-- <a class= "btn btn-success" href="<?php echo base_url(); ?>reportsubnext2" style="margin-top:5px; font-family: 'Exo 2', sans-serif; font-style: italic;"><h7>Plan Next Week </h7><span class="glyphicon glyphicon-arrow-right"></span></a> -->
						
					
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
		<br>
		<div style="float: left;">

		<button class="btn btn-default" id="show" style="font-family: 'Exo 2', sans-serif;">Tampilkan Parameter Nilai</button>
		<button class="btn btn-success ini" id="hide" style="font-family: 'Exo 2', sans-serif; display: none">Sembunyikan</button>		
		</div>


		<br/><br/>

		<div class="row ini" style="display: none">
		<div class="col-sm-1" align="center">
		</div>
				<div class="col-sm-3" align="center">
					<style type="text/css">
					.tg  {border-collapse:collapse;border-spacing:0;}
					.tg td{padding:10px 5px;border-style:solid;border-width:1px;}
					.tg th{font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;}
					.tg .tg-5xqe{background-color:#ffd36d;text-align:center;vertical-align:top}
					.tg .tg-pn40{background-color:#253247;text-align:center; color:white;}
					.tg .tg-giv5{background-color:#fffe65;text-align:center}
					.tg .tg-wr27{background-color:#ffd36d;text-align:center}
					.tg .tg-7ygo{background-color:#ffd36d;text-align:center;vertical-align:top}
					</style>
					<table class="tg" style="float:center;">
					  <tr>
					    <th class="tg-pn40" colspan="2">Penilaian Bobot</th>
					  </tr>
					  <tr>
					    <td class="tg-giv5">Ringan</td>
					    <td class="tg-wr27">1 - 2</td>
					  </tr>
					  <tr>
					    <td class="tg-giv5">Sedang</td>
					    <td class="tg-wr27">3 - 5</td>
					  </tr>
					  <tr>
					    <td class="tg-7ygo">Berat / Sulit</td>
					    <td class="tg-5xqe">6 - 7</td>
					  </tr>
					  <tr>
					    <td class="tg-7ygo">Berat Sekali</td>
					    <td class="tg-5xqe">8 - 10</td>
					  </tr>
					</table>
				</div>

				<div class="col-sm-8">						
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
		<br><br>

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

		<!--<script type="text/javascript">
	    function confirmSimpan() {
	        return confirm('Apakah Anda yakin menyimpan nilai?');
	    }
		</script>!-->
	</div>
</div>


</body>
</html>
