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
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<!--font google!-->
<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!--<script src="<?php echo base_url(); ?>bootstrap-confirm-delete.js"></script>!-->

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>

</head>
<style type="text/css">
	.test {
    	background-color: #eee;
    }

    table th {
			padding:0px 5px !important;
		}

    @media screen and (max-width: 1024px) {
      .containerku {
        width: 100%;
      }
    }
</style>
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
	                <!-- <li class="active"><a href="#">KPIM Report Subordinat</a></li> -->
	                		<li class="dropdown">
			                    <a href="#" class="dropdown-toggle test" data-toggle="dropdown">KPIM Report Subordinate
			                    <span class="caret"></span>
			                    </a>
			                    <ul class="dropdown-menu"> 
			                        <li><a href="<?php echo base_url(); ?>reportsub2">Report Subordinate yang sudah dinilai</a></li>
			                        <li><a href="<?php echo base_url(); ?>kpimmingguan/jadwal">Jadwal Pengumpulan KPIM</a></li>
			                    </ul>
			                 </li>
	                <li><a href="<?php echo base_url(); ?>reportsubnext2">KPIM Plan Next Week</a></li>
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

<div class="container containerku" style="width: 95%">
	<div class="background">
		<div id='div1'>
		<h1 style="padding-top: 20px;"><center>Report Subordinate</center></h1><br><br>
		
		<div class="row">
			<div class="col-lg-6 text-left">
			<h4><text style="word-spacing: 20px">Nama </text> <text style="word-spacing: 30px;">: </text><?php echo $nama->nama_karyawan; ?></text></h4>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 text-left">
			<?php $tglstart = date("d-m-Y", strtotime($piltglstart)); ?>
			<?php $tglend = date("d-m-Y", strtotime($piltglend)); ?>

			<h4>Tanggal &nbsp:  &nbsp &nbsp &nbsp &nbsp<?php echo nama_hari($piltglstart).', '. $tglstart;?>
				<text style="color: #c96604; font-style: italic;"> &nbsp &nbsp sampai&nbsp &nbsp &nbsp </text>     <?php echo nama_hari($piltglend).', '. $tglend;?>
			 ( 

			<!-- menghitunga hari tdk termasuk hari pertama
			<?php
			$tglini = date_create($tglstart);
			$tglitu = date_create($tglend);
			$jumlahhari = date_diff($tglini, $tglitu);
			echo $jumlahhari->format("%d")."  Hari";
			?>  -->

			<?php // menghitung jarak hari termasuk hari pertama
			$date1 = new DateTime($tglstart);
			$date2 = new DateTime($tglend);
			$date2->add(new DateInterval('P1D'));

			$diff = $date2->diff($date1)->format("%a");

			 echo 'Total : '. $diff . ' Hari';

			// $totalhari = date("d",$hitunghari);
			?>





			)</h4>
			
			</div>

			
<!-- 
			<div class="col-sm-6 text-right"><a class= "btn btn-primary" href="<?php echo base_url(); ?>reportsub" style="font-family: 'Exo 2', sans-serif;"><h7><i>Kembali</i></h7></a></div> -->

			

			<?php
			$s = strtotime($piltglstart);
			$e = strtotime($piltglend);
			//$rata = ($piltglstart*$piltglend);

			// $tanggal = date ('Y-m-d', ($s+$e)/2 );

			// echo $tanggal .'ini';
			?>

		</div>
		<br/>

<?php
if (isset($tgl_akhir)) {
	foreach ($tgl_akhir as $tgl1) {
		$awal = $tgl1->tgl;
		if (isset($awal)){
			$date_awal = strtotime($awal);
		}
		 //date("d", strtotime($tgl1->tgl));
		
	}
	
	foreach ($tgl_awal as $tgl2) {
		$akhir = $tgl2->tgl;
		if (isset($akhir)){
			$date_akhir = strtotime($akhir);
			$tanggal = date ('Y-m-d', ($date_awal+$date_akhir)/2 );
		}
		 
	}
	
	
	
	// echo "<br";
	// echo "sukses";
	// $avg_date = date("d", $date_akhir);
	// if (isset($avg_date)) {
	// 	echo $avg_date;
	// }
	
	// echo "sukses";
} 
?>


		<div class="row">
			<div class="col-lg-12 table-responsive">
				<table id="dataTables" class="table table-bordered table-hover table-striped">
					<thead class="text-center" style="background-color: #f9bc2c">
					  <tr>
					  	<!--<th style="text-align: center;">tes</th>!-->
						<th style="text-align: center;">No</th>
						<th style="text-align: center;">Hari/Tgl</th>
						<th style="text-align: center;">Goal</th>
						<th style="text-align: center;">Description</th>
						<th style="text-align: center;">Kendala</th>
						<th style="text-align: center;">Result</th>
						<th style="text-align: center;">Deadline</th>
						<th style="text-align: center;">Nilai Subordinate</th>
						<th style="text-align: center;">Dept</th>
						<th style="text-align: center;">Ket. Deadline</th>
						<th style="text-align: center;">Bobot</th>
						<th style="text-align: center;">Target (Point)</th>
						<th style="text-align: center;">Total Actual</th>
						<th style="text-align: center;">Score</th>
						<th style="text-align: center;">Action</th>
						<th style="text-align: center;">Nilai dari Saya</th>
						<th style="text-align: center;">Note</th>

						<?php 
						$this->db->where_not_in('id_penilai', $this->session->userdata('id_karyawan'));
						$this->db->where('tgl >=', $piltglstart);
						$this->db->where('tgl <= ', $piltglend);
						$this->db->where('kpim_karyawan.id_karyawan', $idkar);
						$this->db->where('status_nilai', 0);
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
						// echo "<br>";
						//echo count($table);
						$sumbobot = 0;
						$sumtarget = 0;
						$sumactual = 0;
						$sumscore = 0;
						//set tanggal nol
						$jumlah_tanggal = 0;

					$totalrow = count($table);

					foreach($table as $u) { 
						$sumbobot += (float) $u->bobot;
						$sumtarget += $u->target;
						$sumactual += $u->actual;
						$sumscore += $u->score;


						
						//$date = strtotime($u->tgl);
						//$tgl = date("d", $date); //$date->format("d");
						// echo $tanggal."<br>";
 						//echo $date->format("d")."<br>";

 						// jumlah hari
 						//$jumlah_tanggal = $jumlah_tanggal+$tgl;
 						//echo $jumlah_tanggal / count($u->tgl);
 						//echo "<br>";
 						//$avg_tgl = $jumlah_tanggal / count($table);
 						//echo $avg_tgl;

						error_reporting(0);
					?>
						<tr>
							<!--<td style="text-align: center;"><?php echo $u->id_karyawan ?></td>!-->
							<span class="label label-danger"><?php echo $avg_tgl; ?></span>

							<td style="text-align: center;"><?php echo $no++ ?></td>
							<td style="text-align: center;"><?php echo nama_hari($u->tgl).', '. tgl_indo($u->tgl)?></td>
							<td style="text-align: center; max-width: 100px; word-wrap: break-word; overflow: auto;"><?php echo $u->nama_goals ?></td>
							<td style="text-align: center; max-width: 200px; word-wrap: break-word; overflow: auto;" ><?php echo $u->action ?></td>
							<td style="text-align: center;"><?php echo $u->kendala ?></td>
							<td style="text-align: center; max-width: 150px; word-wrap: break-word; overflow: auto;"><?php echo $u->result ?></td>
							<td style="text-align: center;"><?php echo date("d-m-Y", strtotime($u->deadline)) ?></td>
							<td style="text-align: center; max-width: 150px; word-wrap: break-word; overflow: auto;"><?php echo $u->usulnilai ?></td>
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
							<td style="text-align: center; background:linear-gradient(to right, #f9eb8e, #faffd1,  #f9eb8e); font-weight: bold"><?php echo round ($u->actual,2) ?></td>
							<td style="text-align: center;"><?php echo round ($u->score,2) ?></td>

							<td width="30px">
								<center>
									<!-- <button data-toggle="modal" data-target="#myModal<?php echo $u->id ?>" type="button" class="btn btn-default btn-sm">
							          <span class="glyphicon glyphicon-edit"></span> 
							          <text style="text-transform: capitalize; " > Nilai</text> 
							        </button> -->
							        <button data-toggle="modal" data-target="#myModalmasingmasing<?php echo $u->id ?>" type="button" class="btn btn-default btn-sm">
							          <span class="glyphicon glyphicon-edit"></span> 
							          <text style="text-transform: capitalize; " > Nilai</text> 
							        </button>
							    </center>


		<!-- Modal nilai masing-masing leader -->
		<div class="modal fade" id="myModalmasingmasing<?php echo $u->id ?>" role="dialog" aria-labelledby="myModalmasingmasingLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header" style="background-color: #f9bc2c">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalmasingmasingLabel">Penilaian</h4>
		      </div>
		      <div class="modal-body">
		      
		     <!--isi modal!-->

		<form id="form_kpim" action="<?php echo base_url();?>reportsub/updatenilai/<?php echo $u->id ?>" method="POST">

		<input type="hidden" name="pilihkar" value="<?php echo $id_ini;?>">
			<div class="table-responsive">
			<table border="0" class="table">
			  <tr>
			    <td class="bg-primary" style="width: 65%; border:2px solid #afafaf">
			    	<div class="row" style="border-bottom: 3px black;">
						<div class="col-sm-4" style="text-align: center;">
							
								<h4>Tanggal :</h4>
					
			 	</div>
				<div class="col-sm-8">
					
						<div id='datetimepicker_tgledit'>
						<div class="col-sm-8" style="padding-bottom:3px; margin: 10px 5px 0px 0px; text-align: center;border-bottom: 1px solid white"><?php echo $u->tgl ?></div>
							<input id="MyDate<?php echo $u->id ?>" value="<?php echo $u->tgl ?>" type='hidden' class="form-control" name="tgledit" placeholder="Tanggal" /> 
							
						</div>
					
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4" style="text-align: center;">
					
						<h4>Goal :</h4>
					
			 	</div>
				<div class="col-sm-8 ">
					
						<div class="col-sm-8" style="padding-bottom:3px; margin: 10px 5px 0px 0px; text-align: center;border-bottom: 1px solid white; max-width: 250px; word-wrap: break-word; overflow: auto;"><?php echo $u->nama_goals ?></div>
						<input value="<?php echo $u->nama_goals ?>" type='hidden'  class="form-control" id="goal" name="goaledit" placeholder="Goal">
						<!--<textarea class="form-control" rows="5" id="goal" name="goaledit"></textarea>!-->
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4" style="text-align: center;">
					
						<h4>Description :</h4>
					
			 	</div>
				<div class="col-sm-8">
					
					<div class="col-sm-8" style="padding-bottom:3px; margin: 10px 5px 0px 0px; text-align: center;border-bottom: 1px solid white; max-width: 250px; word-wrap: break-word; overflow: auto;"><?php echo $u->action ?></div>
					<input value="<?php echo $u->action ?>" type='hidden'  class="form-control" id="action" name="actionedit" placeholder="Goal">
						<!--<textarea class="form-control" rows="4" id="action" name="actionedit" placeholder="Action"><?php echo $u->action ?></textarea>!-->
					
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4" style="text-align: center;">
					
						<h4>Kendala :</h4>
					
			 	</div>
				<div class="col-sm-8">
					
						<div class="col-sm-8" style="padding-bottom:3px; margin: 15px 5px 0px 0px; text-align: center; border-bottom: 1px solid white"><?php echo $u->kendala ?></div>
						<input value="<?php echo $u->kendala ?>" type="hidden" class="form-control" id="kendala" name="kendalaedit" placeholder="Kendala">
						<!--<textarea class="form-control" rows="5" id="goal" name="goaledit"></textarea>!-->
					
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4" style="text-align: center;">
					
						<h4>Result :</h4>
					
			 	</div>
				<div class="col-sm-8">
					
						<div class="col-sm-8" style="padding-bottom:3px; margin: 10px 5px 0px 0px; text-align: center;border-bottom: 1px solid white; max-width: 250px; word-wrap: break-word; overflow-y: auto;"><?php echo $u->result ?></div>
						<input value="<?php echo $u->result ?>" type="hidden" class="form-control" id="result" name="resultedit" placeholder="Result">
						<!--<textarea class="form-control" rows="5" id="goal" name="goaledit"></textarea>!-->


				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4" style="text-align: center;">
					
						<h4>Dept :</h4>
					
			 	</div>
				<div class="col-sm-8">
					

					<div class="col-sm-8" style="padding-bottom:3px; margin: 10px 5px 0px 0px; text-align: center;border-bottom: 1px solid white">
						<?php echo $u->nama_dept ?>
						<input value="<?php echo $u->tgs_dept ?>" type="hidden" class="form-control" id="tgs_dept" name="tgs_dept" placeholder="tgs_dept">
						
					</div>
					
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4" style="text-align: center;">
					
						<h4>Deadline :</h4>
					
			 	</div>
				<div class="col-sm-8">
					
						<div  id='datetimepicker_deadlineedit'>
							<div class="col-sm-8" style="padding-bottom:3px; margin: 10px 5px 0px 0px; text-align: center;border-bottom: 1px solid white"><?php echo $u->deadline ?></div>
							<input id="MyDate<?php echo $u->id ?>" value="<?php echo $u->deadline ?>" type='hidden' class="form-control" name="deadlineedit" placeholder="Tanggal" /> 
							
						</div>
					
				</div>
			</div>

		    </td>
		    <td style="border:2px solid #afafaf; background-color: #e2ff89;">

		    <div class="row">
		    	<div class="col-md-12">
		    		Edit Goal : 
		    	</div>
		    </div>

		    	<?php 
		    	$this->db->select("*");
		        $this->db->from('master_bobot');
		        $this->db->join('dept', 'dept.id_dept = master_bobot.id_dept');
		        $this->db->where_in('master_bobot.id_dept', $u->tgs_dept);
		        // $this->db->group_by("master_bobot.id_dept");
		        $this->db->order_by("master_bobot.nama","asc");
		        $master_bobot = $this->db->get();
		    	?>

		    	<!-- multiple select -->
				<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
				<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

				<script>
				  $(document).ready(function() { 
				   $("select.select").select2(); 
				  });
				</script>
				<!-- multiple select -->

		    <div class="row" style="padding-bottom: 10px">
		    	<section>
		    		<select class="select form-control " id="pilihgoal"  name="goals" style="width: 90%">
						<option value="">-- Pilih Goal/Pekerjaan --</option>
						<?php foreach ($master_bobot->result() as $mb) { ?>

						<option value="<?php echo $mb->nama . 'pisah' . $mb->bobot ?> " <?php if($u->nama_goals == $mb->nama){echo 'selected' ; } ?>><?php echo $mb->nama ?></option>
			
						<?php } ?>
					</select>
				</section>
				<span style="color:#f42e2e; font-style: italic">Edit goal hanya untuk leader terkait</span>
		    </div>

		    <div class="row">
			  	<div class="col-sm-6">
					
						<h4>Bobot :</h4>
					
			 	</div>
				<div class="col-sm-6">
					
							<input style="text-align: center;" id="bobot<?php echo $u->id ?>" value="<?php echo $u->bobot ?>" type='number' min="1" max="10" class="form-control" name="bobotedit" onkeypress="return hanyaAngka(event, false)" placeholder="Bobot" readonly required/>
							<script>
							var max_chars = 2;

							$('#bobot<?php echo $u->id ?>').keydown( function(e){
							    if ($(this).val().length >= max_chars) { 
							        $(this).val($(this).val().substr(0, max_chars));
							    }
							});

							$('#bobot<?php echo $u->id ?>').keyup( function(e){
							    if ($(this).val().length >= max_chars) { 
							        $(this).val($(this).val().substr(0, max_chars));
							    }
							});
						</script>  
						
					
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-6">
					
						<h4>Target (Point) :</h4>
					
			 	</div>
				<div class="col-sm-6">
					
						<input id="target" style="text-align: center;" value="<?php echo $u->target ?>" type='number' min="1" max="10" class="form-control" name="targetedit" onkeypress="return hanyaAngka(event, false)" placeholder="Target" readonly/> 
					
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-12">
					
						<h4>Actual :</h4>
					
			 	</div>
				<div class="col-sm-12">

					<?php $query = $this->db->get_where('detail_nilai', array('id_kpim' => $u->id, 'id_penilai' => $this->session->userdata('id_karyawan')));
					foreach ($query->result() as $key) {
						$nilai_sub = $key->nilai_actual;
					}
					?>
					
						
					<label class="radio-inline">
				      <input type="radio" name="actualedit" value="0" <?php if ($nilai_sub == 0) {echo 'checked'; } ?> required >0
				    </label>
					<label class="radio-inline">
				      <input type="radio" name="actualedit" value="1" <?php if ($nilai_sub == 1) {echo 'checked'; } ?>  >1
				    </label>
				    <label class="radio-inline">
				      <input type="radio" name="actualedit" value="2" <?php if ($nilai_sub == 2) {echo 'checked'; } ?> >2
				    </label>
			   
				    <label class="radio-inline">
				      <input type="radio" name="actualedit" value="3" <?php if ($nilai_sub == 3) {echo 'checked'; } ?> >3
				    </label>
				    <label class="radio-inline">
				      <input type="radio" name="actualedit" value="4" <?php if ($nilai_sub == 4) {echo 'checked'; } ?> >4
				    </label>
				    <label class="radio-inline">
				      <input type="radio" name="actualedit" value="5" <?php if ($nilai_sub == 5) {echo 'checked'; } ?> >5
				    </label>
				    <label class="radio-inline">
				      <input type="radio" name="actualedit" value="6" <?php if ($nilai_sub == 6) {echo 'checked'; } ?> >6
				    </label>
				    <label class="radio-inline">
				      <input type="radio" name="actualedit" value="7" <?php if ($nilai_sub == 7) {echo 'checked'; } ?> >7
				    </label>
				    <label class="radio-inline">
				      <input type="radio" name="actualedit" value="8" <?php if ($nilai_sub == 8) {echo 'checked'; } ?> >8
				    </label>
				    <label class="radio-inline">
				      <input type="radio" name="actualedit" value="9" <?php if ($nilai_sub == 9) {echo 'checked'; } ?> >9
				    </label>
				     <label class="radio-inline">
				      <input type="radio" name="actualedit" value="10" <?php if ($nilai_sub == 10) {echo 'checked'; } ?> >10
				    </label>
			    



					<!-- yang lama -->
						<!-- <input id="actual<?php echo $u->id ?>" style="text-align: center;" value="<?php echo $u->actual ?>" type='number' min="0" max="10" class="form-control" name="actualedit" onkeypress="return hanyaAngka(event, false)" placeholder="Actual" />
						<script>
							var max_chars = 2;

							$('#actual<?php echo $u->id ?>').keydown( function(e){
							    if ($(this).val().length >= max_chars) { 
							        $(this).val($(this).val().substr(0, max_chars));
							    }
							});

							$('#actual<?php echo $u->id ?>').keyup( function(e){
							    if ($(this).val().length >= max_chars) { 
							        $(this).val($(this).val().substr(0, max_chars));
							    }
							});
						</script>  -->
					
				</div>
			</div>

			<div class="row" style="padding-top: 20px">
			  	<div class="col-sm-6">
					
						<h5>Nilai Subordinate :</h5>
					
			 	</div>
				<div class="col-sm-6">
					
						<input style="text-align: center; background-color: #a6e6f5" value="<?php echo $u->usulnilai ?>" type='number' min="1" max="10" class="form-control"  onkeypress="return hanyaAngka(event, false)" placeholder="Target" readonly/> 
					
				</div>
			</div>


			<div class="row">
			  	<div class="col-sm-6">
					
						<h4>Score :</h4>
					
			 	</div>
				<div class="col-sm-6">
					
						
							<div style="margin: 5px 5px 0px 0px; text-align: center;"><?php echo round ($u->score,1); ?></div>
							<input id="score" style="text-align: center;" value=" " type='hidden' class="form-control" name="scoreedit" placeholder="Score" /> 
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-12">
					
						<h4>Note :</h4>
					
			 	</div>
			 </div>
			 <div class="row">
				<div class="col-sm-12">

				<?php if($u->note == '0') {
					echo $u->note = '';
				}
				?>
					
							<textarea id="note" rows="5" style="text-align: center;" class="form-control" name="noteedit" placeholder="Note"><?php $query = $this->db->get_where('detail_nilai', array('id_kpim' => $u->id, 'id_penilai' => $this->session->userdata('id_karyawan')));
								foreach ($query->result() as $key) {
									echo $key->note;
								}
								?></textarea>
							<!-- <input id="note" style="text-align: center;" value="<?php echo $u->note ?>" type='textarea' class="form-control" name="noteedit" placeholder="Note" /> -->
				</div>
			</div><br/><br/>

				<div class="row">
				  	<div class="col-sm-6">
						
							<h4>Ket. Deadline :</h4>
						
				 	</div>
					<div class="col-sm-6" style="padding-top: 5px; font-size: 20px; letter-spacing: 1px">

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
					</div>

			    </td>

			  </tr>
			  </div>
			</table>

			<!--isi modal selesai!-->

		      </div>
		      <div class="modal-footer" style="background-color: #f9bc2c">
		      	<input type="hidden" name="id" value="<?php echo $idkar;?>">
		      	<input type="hidden" name="iddept" value="<?php echo $iddept;?>">
		      	<input type="hidden" name="piltglstart" value="<?php echo $piltglstart;?>">
		      	<input type="hidden" name="piltglend" value="<?php echo $piltglend;?>">
		      	
		        <button type="button" class="btn btn-default" data-dismiss="modal" style="font-family: 'Exo 2', sans-serif; "><span class="glyphicon glyphicon-floppy-remove"></span> Batal</button>
		        <button type="submit" name="input"  class="btn btn-primary" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
		      </div>
		    </div>
		  </div>
		</div>
		</form>
		<!--Modal nilai masing-masing leader selesai!-->
			                   <!-- <?php echo anchor('reportsub/hapus/'.$u->id,
			                    	'<button type="button" class="btn btn-default btn-sm">
							          <span class="glyphicon glyphicon-trash"></span>
							          	<text style="text-transform: capitalize;"> Hapus</text>  
							        </button>', array('class'=>'hapus', 'onclick'=>"return confirmDialog();")
							    ); ?>!-->
			                   
							</td>
							<td>
								<?php $query = $this->db->get_where('detail_nilai', array('id_kpim' => $u->id, 'id_penilai' => $this->session->userdata('id_karyawan')));
								foreach ($query->result() as $key) {
									echo $key->nilai_actual;
								}
								?>
							</td>

							

						

							<td style="text-align: center; max-width: 300px; word-wrap: break-word; overflow: auto">
								
								<?php $query = $this->db->get_where('detail_nilai', array('id_kpim' => $u->id, 'id_penilai' => $this->session->userdata('id_karyawan')));
								foreach ($query->result() as $key) {
									echo $key->note;
								}
								?>
							</td>

							<?php 
							$this->db->where_not_in('id_penilai', $this->session->userdata('id_karyawan'));
							$this->db->join('karyawan', 'karyawan.id_karyawan = detail_nilai.id_penilai');
							$this->db->group_by('nama_karyawan');
							$this->db->order_by('nama_karyawan', 'asc');
							$query = $this->db->get_where('detail_nilai', array('id_kpim' => $u->id));
							foreach ($query->result() as $key) { ?>
								<td style="text-align: center; background-color: #ffd36d" >
								 <?php echo $key->nilai_actual; ?> </td>

							<?php }?>



						</tr>
					<?php } } ?>

					</tbody>

					<?php
						$satus = 100;  error_reporting(0);
						// $total = $sumscore / $sumbobot * $satus ;  error_reporting(0); yang lama
						$total = $sumscore / $totalrow * 1.3 ;  error_reporting(0);
						if ( $total == 0 )
							{
							     // don't divide by zero, handle special case
							} else {
								$etotal = round ($total,2);
							     
							}

      	
						//echo round ($total,1);
						 error_reporting(0);?>

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

					

				<!-- <tr style="background-color: #ffd36d; border:2px solid gray; border-bottom: 2px solid gray;">
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
					<?php $sumscore2 = round ($sumscore,2); echo $sumscore2; error_reporting(0);?></td>
					<td class='totalpersen' style="text-align: center; vertical-align:top;padding:20px; color: white" rowspan="1"><?php echo $status_nilai ?> <br/><?php echo $nilaiakhir ?>%</td>
					<td style="text-align: center;"></td>
				</tr> -->
				<tr style="background-color: #ffd36d; border:2px solid gray;">
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;">Penilaian Akhir :</td>
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
					
					<td style="text-align: center; vertical-align:top;padding:20px;" class="totalpersen">
						Score&nbsp:<br/>
						<span style="font-size: 25px;">
						<?php echo $etotal; ?>
						</span>
					</td>
					<td class='totalpersen' style="text-align: center; vertical-align:top;padding:20px; color: white" rowspan="1"><?php echo $status_nilai ?> <br/><span style="font-size: 25px"> <?php echo $nilaiakhir ?>%</span></td>
					
					<td style="text-align: center;">
						<button type="button" data-target="#myModal" data-toggle="modal" name="input" class="btn btn-sm btn-default" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-floppy-save"></span> simpan
							</button>
					</td>
					<td></td>

					<?php 
					$this->db->where_not_in('id_penilai', $this->session->userdata('id_karyawan'));
					$this->db->where('tgl >=', $piltglstart);
					$this->db->where('tgl <= ', $piltglend);
					$this->db->where('kpim_karyawan.id_karyawan', $idkar);
					$this->db->where('status_nilai', 0);
					$this->db->join('kpim_karyawan', 'kpim_karyawan.id = detail_nilai.id_kpim');
					$this->db->join('karyawan', 'karyawan.id_karyawan = detail_nilai.id_penilai');
					$this->db->group_by('nama_karyawan');
					$this->db->order_by('nama_karyawan', 'asc');
					$query = $this->db->get('detail_nilai');
					foreach ($query->result() as $key) { ?>
						<td></td>
					<?php }?>
					
					<!-- <?php 
						$this->db->select('*');
				        $this->db->from('detail_nilai');
				        $this->db->join('karyawan', 'karyawan.id_karyawan = detail_nilai.id_penilai');
				        $this->db->group_by("id_penilai");
				        $query = $this->db->get()->result();

				        foreach ($query as $q) {
				        	// echo $q->nama_karyawan . '<br>';
				        	if ($q->id_karyawan != $this->session->userdata('id_karyawan')) { ?>

							<td></td>
				        		
				        	<?php }
			        }?> -->
				</tr>


				</table>
				

			</div>
		</div>
		</div>

	

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
		  <div class="modal-dialog vertical-align-center" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
		      </div>
		      <div class="modal-body totalpersen" style="color: white">
		      <!-- <?php
		      if ($status_nilai == 'SKS' ) {
		      	$status_nilai = 'Sangat Kurang Sekali';
		      }

		      if ($status_nilai == 'KS' ) {
		      	$status_nilai = 'Kurang Sekali';
		      }

		      if ($status_nilai == 'K' ) {
		      	$status_nilai = 'Kurang';
		      }

		      if ($status_nilai == 'C' ) {
		      	$status_nilai = 'Cukup';
		      }

		      if ($status_nilai == 'B' ) {
		      	$status_nilai = 'Baik';
		      }

		      if ($status_nilai == 'BS' ) {
		      	$status_nilai = 'Baik Sekali';
		      }
		       ?> -->
		        <h4 style="line-height:20px;">Yakin simpan dengan nilai akhir <br> score : <span style="font-size: 20px"><?php echo $etotal; ?></span> persentase : <span style="font-size: 20px"><?php echo $nilaiakhir?> % </span> 
		        	<br>(<?php echo $status_nilai ?>) ?</h4>
		      </div>
		      <div class="modal-footer">

		        
		        <form id="form_kpim" method="POST" action="<?php echo base_url();?>reportsub/createandupdate">
							<input type="hidden" name="nama" value="<?php echo $nama->nama_karyawan;?>">
							<input type="hidden" name="id" value="<?php echo $idkar;?>">
							<input type="hidden" name="tbobot" value="<?php echo $sumbobot?>">
							<input type="hidden" name="ttarget" value="<?php echo $sumtarget?>">
							<input type="hidden" name="tactual" value="<?php echo $sumactual?>">
							<input type="hidden" name="tscore" value="<?php echo $sumscore2?>">
							<input type="hidden" name="totalnilai" value="<?php echo $etotal?>">
							<input type="hidden" name="tnilai_akhir" value="<?php echo $nilaiakhir?>">
								<input type="hidden" name="id" value="<?php echo $idkar;?>">
								<input type="hidden" name="iddept" value="<?php echo $iddept;?>">
						      	<input type="hidden" name="piltglstart" value="<?php echo $piltglstart;?>">
						      	<input type="hidden" name="piltglend" value="<?php echo $piltglend;?>">
						      	<input type="hidden" name="tanggal" value="<?php echo $tanggal;?>">
						     <div style="float: left"><text style="color: red;"><b>Warning : </b></text>Simpan Nilai ini Pada Akhir Periode Mingguan!</div>
						      	<button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove"></span> Batal</button>
							<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
						</form>
		        
		      </div>
		    </div>
		  </div>
		</div>

		<div style="padding-bottom: 15px; font-size: 17px">
		<?php

		$u->tgl
		 ?>
		
			<b>Intime</b> = Sebelum Deadline | <b>Ontime</b> = Sesuai Deadline | <b>Overtime</b> = Melebihi Deadline 
		</div>

		<div class="row ">
		 
		  <div class="col-sm-12" style="text-align: right;">
		  <div style="float: left;"><button class="btn btn-success" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" onclick="printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print Report</button> <!-- <text style="color:blue">*Cetak pada akhir penilaian</text> --></div>
		  

					

		  				<a class= "btn btn-primary" href="<?php echo base_url(); ?>reportsub" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><i><span class="glyphicon glyphicon-arrow-left"></span> Kembali</i></h7></a>
						<a class= "btn btn-primary" href="<?php echo base_url(); ?>home" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><span class="glyphicon glyphicon-home"></span> Home</h7></a>
						<a class= "btn btn-primary" href="<?php echo base_url(); ?>reportsubnext2" style="margin-top:5px; font-family: 'Exo 2', sans-serif; font-style: italic;"><h7>Plan Next Week </h7><span class="glyphicon glyphicon-arrow-right"></span></a>
						<input type='hidden' class="form-control" name="isistatus" value="3" />
						<input type="hidden" name="input"  class="btn btn-warning" value="Send">
	
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
		<div style="float: left;">

		<button class="btn btn-default" id="show" style="font-family: 'Exo 2', sans-serif;">Tampilkan Parameter Nilai</button>
		<button class="btn btn-success ini" id="hide" style="font-family: 'Exo 2', sans-serif; display: none">Sembunyikan</button>		
		</div>
		<br/><br/>

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

		<div class="row ini" style="display: none">
				<div class="col-sm-2" align="center">
					<table class="tg" style="float:center;">
					  <tr>
					    <th class="tg-pn40" colspan="2">Parameter Nilai Actual</th>
					  </tr>
					  <tr>
					    <td class="tg-giv5">Overtime</td>
					    <td class="tg-wr27" style="background-color: firebrick; color: white">0 - 5</td>
					  </tr>
					  <tr>
					    <td class="tg-giv5">Ontime</td>
					    <td class="tg-wr27" style="background-color: #d18c02; color: white">5 - 8</td>
					  </tr>
					  <tr>
					    <td class="tg-7ygo">Intime</td>
					    <td class="tg-5xqe" style="background-color: green; color: white">6 - 10</td>
					  </tr>
					</table>
				</div>
				<div class="col-sm-2" align="center">
					
					<table class="tg" style="float:center;">
					  <tr>
					    <th class="tg-pn40" colspan="2">Parameter Nilai Bobot</th>
					  </tr>
					  <tr>
					    <td class="tg-giv5">Ringan</td>
					    <td class="tg-wr27">5 - 6</td>
					  </tr>
					  <tr>
					    <td class="tg-giv5">Sedang</td>
					    <td class="tg-wr27">7 - 8</td>
					  </tr>
					  <tr>
					    <td class="tg-7ygo">Berat / Sulit</td>
					    <td class="tg-5xqe">9 - 10</td>
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
			5. Penilaian juga dipertimbangkan berdasarkan Goals, Description, Result dan Deadline<br>
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

		<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
		<script>
		// $(document).ready(function() {
		// 	$('#dataTables').DataTable();
		// } );

		$(document).ready(function() {
		$('#dataTables').dataTable( {
		    // Sets the row-num-selection "Show %n entries" for the user
		    "lengthMenu": [ 20, 40, 60, 80, 100, 200 ], 
		    
		    // Set the defult no. of rows to display
		    "pageLength": 200 
		} );
		} );
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
