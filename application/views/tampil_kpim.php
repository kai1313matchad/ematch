<!DOCTYPE html>
<html lang="en">
<head>

<title>KPIM Online - Mingguan</title>

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

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>


</head>
<style type="text/css">
	.blink {
    animation-duration: 1s;
    animation-name: blink;
    animation-iteration-count: infinite;
    animation-timing-function: steps(2, start);
}
	@keyframes blink {
    0% {
        opacity: 1;
    }
    80% {
        opacity: 1;
    }
    81% {
        opacity: 0;
    }
    100% {
        opacity: 0;
    }
	}
	@media screen and (max-width: 1024px) {
      .jarak {
        margin-bottom: 10px;
      }
    }
    .test {
    	background-color: #eee;
    }

    .libur{
    	font-size: 30px;
    	background: rgba(198, 15, 15, 0.8);
    	color: white

    }

    button {
		font-family: 'Exo 2', sans-serif !important;
	}

    select#konten {
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    text-indent: 1px;
	    text-overflow: '';
	}
</style>


<?php foreach ($harilibur as $hr) {?>
	<?php date_default_timezone_set('Asia/Jakarta');?>
	<?php if ($hr->tgl == date('Y-m-d')) {
		echo 'disabled';
	} ?> 
	<?php } ?>>
<body class="bg semua">

<?php 
date_default_timezone_set('Asia/Jakarta');
 ?>


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
	            	<li class="dropdown">
	            		<a href="<?php echo base_url(); ?>kpimmingguan" class="dropdown-toggle test" data-toggle="dropdown">KPIM Mingguan <span class="caret"></span></a>
	            		<ul class="dropdown-menu"> 
			                        <li><a href="<?php echo base_url(); ?>kpimmingguan/kpimterkirim">KPIM Terkirim</a></li>
			                        <li><a href="<?php echo base_url(); ?>reportku">Report Nilai</a></li>
			                        <li><a href="<?php echo base_url(); ?>reportku/tdkinput">Report Tidak Input</a></li>
			                    </ul>
	            	</li>
	                <!-- <li class="active"><a href="#">KPIM Mingguan</a></li> -->
	                <li><a href="<?php echo base_url(); ?>kpimmingguannext">KPIM Plan Next Week</a></li>
	                		<li class="dropdown">
                				<?php
									foreach ($inboxblmbaca as $total)
									foreach ($noteblmbaca as $totalnote)
									foreach ($planblmbaca as $totalplan)
									foreach ($noteplan as $totalnoteplan) { 
								?>

			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><text class="blink">Notifikasi</text>
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
			        <?php if($this->session->userdata('level') == 12 ) {

			        } else { ?>


	                <a class="btn btn-primary navbar-btn" href="<?php echo base_url(); ?>kpimmingguan/jadwal" style="font-family: 'Exo 2', sans-serif; margin-left: 5px ">Jadwal Pengumpulan KPIM</a>

	                <?php } ?>

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
													foreach ($deptbaru->result() as $row) { 
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


<?php
if ($this->session->userdata('harikerja') == 5 ) {
	$lamakerja = 5;
	}
	else
	{
	$lamakerja = 6;
	}

?>
	<?php
	$tglawalinput = date("Y-m-26", strtotime("-1 month", now()));
	$tglsekarang = date("d-m-Y", strtotime("-2 day", now()));


	// echo $tglawalinput .'<br>';
	// echo $tglsekarang;
	?>

	<?php //untuk menghitung hari kerja 
		//get current month for example
		// $beginday=date("Y-m-01");
		// $lastday=date("Y-m-t");
	
		
		$harikerja = getWorkingDays($tglawalinput,$tglsekarang,$lamakerja);
		// echo '<br/>Hari Kerja :<text style=color:#1e6cea> '. $harikerja .' Hari</text>';
	


		function getWorkingDays($startDate, $endDate, $lamakerja){
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
		     if($what_day>$lamakerja) { // 6 and 7 are weekend days
		          $weekends++;
		     };
		    $begin+=86400; // +1 day
		  };
		  $working_days=$no_days-$weekends;
		  return $working_days;
		 }
		}
	?>


	
	<div class="alert alert-info alert-dismissable col-sm-5" style="font-size: 15px; z-index: 1; margin: 60px 0 0 20px; position: absolute; display: none">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	    <text style="color: green">Nilai pekan lalu : 

	    
	   <?php
		foreach ($nilaiku as $u) { 
		?>		

		<!-- <?php echo $u->totalnilai  ?> -->

		<?php
		if ($u->totalnilai >= '1' || $u->totalnilai == '' || $u->totalnilai < '1' ){
			$status = $u->totalnilai. ", Under Expectation (Di Bawah Harapan)";
		}
		if ($u->totalnilai > '40'){
			$status = $u->totalnilai. ", Not Meet Expectation (Tidak Sesuai Harapan)";
		}
		if ($u->totalnilai > '60'){
			$status = $u->totalnilai. ", Meet Expectation (Sesuai Harapan)";
		}
		if ($u->totalnilai > '75'){
			$status = $u->totalnilai. ", Exceeds Expectation (Melebihi Harapan)";
		}
		if ($u->totalnilai > '85'){
			$status =  $u->totalnilai. ", Exceptional (Istimewah)";
		}
		echo $status;
		

		?>

		<a href="<?= base_url(); ?>reportku">Lihat Report</a>

		<?php } ?>
		</text>

		<!-- Mencari Hari libur -->
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
		<!-- Mencari Hari libur -->



		<br>

		<?php 
		$batas = 27;
		$sekarang = date('d');

		if($sekarang < $batas) { ?>

			Kirim KPIM :
			<?php
			foreach ($tdkinput as $u) { 
			?>		

			<?php echo $u->jumlah  ?>
			Hari,

			<br>Tidak Kirim : <text style="font-weight: bold; color: red">



			

			<?php 
			$totalinput = $u->jumlah;
			$totaltdkinput = $harikerja - $totalinput - $libur;

			echo $totaltdkinput  ?>
			hari* </text> <!-- (belum dikurangi libur nasional & cuti bersama) -->
			<br><small style="color: red">*Terhitung mulai tanggal 26 <?=date("F Y", strtotime("-1 month", now()))?> sampai <?php echo date("d F Y", strtotime("-2 day", now())) ?></small>

			

			<?php } ?>
		<?php } ?>
	   
	    <!-- <?= $this->session->flashdata('message_name') ?> -->
	</div>

<div class="container" style="width: 95%">

	<div class="background">
		<h1 style="padding-top: 20px"><center>KPIM Online (Mingguan)</center></h1><br><br>

		<?php foreach ($harilibur as $hr) {?>
			<?php date_default_timezone_set('Asia/Jakarta');?>
			<?php if ($hr->tgl == date('Y-m-d')) {
				echo '<div class="libur">Hari ini '. $hr->kategori . '<br>('. $hr->ket . ')</div> <br>';
			} ?> 
		<?php } ?>

		<?php 
		$statushari = "";
	    $weekDay = date('w');

		if ($this->session->userdata('harikerja') == '5') {

			if ($weekDay == 0 || $weekDay == 6) {
	    	$statushari = "libur";
	    	// echo $statushari;
	    	// echo "libur";
	    	// redirect(base_url() . 'home', 'refresh');
		    }
		    else {
		    	$statushari = "masuk";
		    	// echo $statushari;
		    	// echo "masuk";
		    }
		}

		else {
			if ($weekDay == 0 ) {
	    	$statushari = "libur";
	    	// echo $statushari;
	    	// echo "libur";
	    	// redirect(base_url() . 'home', 'refresh');
		    }
		    else {
		    	$statushari = "masuk";
		    	// echo $statushari;
		    	// echo "masuk";
		    }
		}
		
	    

		?>



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

		

		<?php 
		$hariini = date('Y-m-d'); 
		?>

		<?php 
		$valid = 'tidak ada'; ?>

		<?php
		foreach($table as $a){
			if ($hariini == $a->tgl) {
				$valid = 'ada';
			}
		} 


		foreach($tableplannext as $tp){
			if ($hariini == $tp->tgl) {
				$valid = 'ada';
			}
		} ?>


		<!-- utk mengaktifkan validasi plannext harus ada -->
		<!-- tulisan "valida" diganti valid jk ingin mengaktifkan -->
		<?php 
		$valida = 'ada'; ?>
		<!-- utk mengaktifkan validasi plannext harus $valid = 'ada' -->


		<!-- ini mulai validasi input plannext atau tdk -->
		<?php if ($valid == 'ada') { ?>

			<form id="form_kpim" action="<?php echo base_url();?>kpimmingguan/create" method="POST">
			<div class="row">
				<div class="col-lg-2 text-left" style="margin-left: 5px">
		
					<h4><strong>Laporan Harian :</strong></h4>

					<div class="form-group">
						<div class="input-group">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
							</span>
						<?php $inputsekarang = date("d-M-Y");?>
						<input  type="text" style="text-align: center;" class="form-control" value="<?php echo $inputsekarang;?>" disabled>
						<input type="hidden" id='tgl_sekarang' value="<?php echo date('Y-m-d'); ?>">
					
						</div>
					</div>

				</div>
			</div>
			<div class="row">				
				<div class="col-md-3">
					
					<select id="pilihdept" name="tgs_dept" class="form-control" required oninvalid="this.setCustomValidity('Pilih terlebih dahulu')" oninput="setCustomValidity('')">
						<option value="">-- Pilih Dept --</option>
						<?php foreach ($isinamadept->result() as $key): ?>
						<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
						<?php endforeach ?>
					</select>

					<div id="jdl_konten" class="text-left" style="margin:0px 0 0 5px; display: none">
					Goal/Pekerjaan :
					</div>				

					<div class="input-group">
						<select class="form-control " id="konten"  name="goals" style="display: none" required="">
							<option value="">-- Pilih Goal/Pekerjaan --</option>
							<?php foreach ($selectbobot as $sb) { ?>

							<option value="<?php echo $sb->nama . 'pisah' . $sb->bobot ?> "><?php echo $sb->nama ?></option>
				
							<?php } ?>
						</select>
				        <span class="input-group-btn">
						<button id="open" type="button" class="btn btn-primary" onclick="bukakdept()" style="display: none; text-transform: capitalize;">Open</button>
						</span>
					</div>
					
				</div>

				<script>
					$('#pilihdept').change(function()
			        {     
			        	bukakdept();       
			            //Ajax Load data from ajax
			            $.ajax({
			                url : "<?php echo site_url('karyawan/ambildatabobotkpim')?>",
			                type: "POST",
			                data: {pilihdept:$('#pilihdept').val()},
			                dataType: "JSON",
			                success: function(data)
			                { 
			                	$('#konten').empty();

			                	// document.getElementById('konten'); itu sama dengan $('#konten')[0]

	                    		var select = $('#konten')[0];
	                    		
	                    		option = document.createElement('option');
		                        option.value = '';
		                        option.text = '--- Pilih salah satu ---';
		                        select.add(option);

			                    for (var i = 0; i < data.length; i++) {
			                     	option = document.createElement('option');
			                        option.value = data[i]["nama"] + 'pisah' + data[i]["bobot"];
			                        option.text = data[i]["nama"];
			                       	select.add(option);
			                    }
			                    // $('#tabel_bobot').DataTable();
			                },
			                error: function (jqXHR, textStatus, errorThrown)
			                {
			                    alert('Error get data from ajax');
			                }
			            });
			        });
				</script>

				<!-- <button type="button" class="btn btn-info btn-lg" onclick="bukakdept('4')">Open Large Modal</button> -->

				<!-- Modal -->
				  <div class="modal fade" id="pilihGoal" role="dialog">
				    <div class="modal-dialog modal-lg">
				      <div class="modal-content">
				        <div class="modal-header" style="">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Pilih Goal / Pekerjaan</h4>
				        </div>
				        <div class="modal-body">
				          	<div class="table-responsive">
				          		<i style="color: #ad0707">*Mohon dicek seluruh pilihan goal/pekerjaan pada next page</i>
								<table id="dataTables2" class="table table-bordered table-hover table-striped">
									<thead class="text-center" style="background-color: #6db1ff">
									  <tr>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Dept</th>
										<th style="text-align: center; min-width: 500px">Goal/Pekerjaan</th>
										<th style="text-align: center;">Action</th>
									  </tr>
									</thead>
									<tbody id="isigoal">
										
										
									</tbody>
								</table>
							</div>							
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				    </div>
				  </div>
				<!-- selesai modal -->

				<script>
					function bukakdept(iddept){
						$('#pilihGoal').modal('show');
						$('#dataTables2').DataTable().destroy();

						$.ajax({
			                url : "<?php echo site_url('karyawan/ambildatabobotkpim/')?>",
			                type: "POST",
			                data: {pilihdept:$('#pilihdept').val()},
			                dataType: "JSON",
			                success: function(data)
			                { 
			                	$('#isigoal').empty();


			                	// document.getElementById('konten'); itu sama dengan $('#konten')[0]

			                    for (var i = 0; i < data.length; i++) {
			                    	var tes = data[i]['nama'];
			                     	var tr = $('<tr>').append(
			                     		$('<td>'+(i+1)+'</td>'),
			                     		$('<td>'+ data[i]['nama_dept'] +'</td>'),
			                     		$('<td>'+ data[i]['nama'] +'</td>'),
			                     		
			                     		$('<td><button class="btn btn-sm btn-primary" type="button" onclick="pick_goal(\''+ data[i]['nama']+ 'pisah' + data[i]['bobot'] +'\')" data-dismiss="modal">Pilih</button></td>')
			                     		).appendTo('#isigoal');


			                    }
							$('#dataTables2').DataTable({
						        "lengthMenu": [[20, 30, 50, -1], [20, 30, 50, "All"]]
						    });
							// $('#dataTables2').DataTable().ajax.reload();

			                },
			                error: function (jqXHR, textStatus, errorThrown)
			                {
			                    alert('Error get data from ajax');
			                }
			            });

			            


					}

					function pick_goal(idbobot){

						document.querySelector('#konten [value="' + idbobot +'"]').selected=true;

						// $('#konten select option [value=' + idbobot + ']').attr('selected','selected');

					}
				</script>


				<!--action-->
				<div class="col-md-3">
					
					<textarea class="form-control jarak" rows="4" cols="30" placeholder="Action" name="action" id="action" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
				</div>
				<!--Kendala-->
				<div class="col-md-2">
					
					<textarea class="form-control jarak" rows="4" cols="20" placeholder="Kendala" name="kendala" id="kendala"></textarea>
				</div>
				<!--result-->
				<div class="col-md-2">
					
					<textarea class="form-control jarak" rows="4" cols="20" placeholder="Result" name="result" id="result" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
				</div>



					
				<!--Dateline-->
				<div class="col-md-2">
					<div class="form-group">
						<div class='input-group date' id='datetimepicker4'>     
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
							</span>
							<input type='text' class="form-control input-group-addon" placeholder="Deadline" name="deadline" id="deadline" required>
						</div>
					</div>
				</div>

				<div class="col-md-2">
					<div id="overtime" style="display: none">
						<div class="col-md-12">
							<label class="radio-inline">
						      <input type="radio" name="usulnilai" value="0" required>0
						    </label>
							<label class="radio-inline">
						      <input type="radio" name="usulnilai" value="1" >1
						    </label>
						    <label class="radio-inline">
						      <input type="radio" name="usulnilai" value="2">2
						    </label>
					    </div>
						<div class="col-md-12">
						    <label class="radio-inline">
						      <input type="radio" name="usulnilai" value="3">3
						    </label>
						    <label class="radio-inline">
						      <input type="radio" name="usulnilai" value="4">4
						    </label>
						    <label class="radio-inline">
						      <input type="radio" name="usulnilai" value="5">5
						    </label>
					    </div>

					</div>

					<div id="ontime" style="display: none">
						<label class="radio-inline">
					      <input type="radio" name="usulnilai" value="5" required>5
					    </label>
					    <label class="radio-inline">
					      <input type="radio" name="usulnilai" value="6">6
					    </label>
					    <label class="radio-inline">
					      <input type="radio" name="usulnilai" value="7">7
					    </label>
					    <label class="radio-inline">
					      <input type="radio" name="usulnilai" value="8">8
					    </label>
					</div>

					<div id="intime" style="display: none">
						<div class="col-md-12">
							<label class="radio-inline">
						      <input type="radio" name="usulnilai" value="5" required>5
						    </label>
						    <label class="radio-inline">
						      <input type="radio" name="usulnilai" value="6">6
						    </label>
						    <label class="radio-inline">
						      <input type="radio" name="usulnilai" value="7">7
						    </label>
						</div>
						<div class="col-md-12">
						    <label class="radio-inline">
						      <input type="radio" name="usulnilai" value="8">8
						    </label>
						    <label class="radio-inline">
						      <input type="radio" name="usulnilai" value="9">9
						    </label>
						     <label class="radio-inline">
						      <input type="radio" name="usulnilai" value="10">10
						    </label>
						</div>
					</div>
				</div>

				<div class="col-lg-12">
				<button type="submit" style="font-family: 'Exo 2', sans-serif; margin-top: 5px" name="input" class="btn btn-primary form-control" <?php if ($statushari == 'libur') {echo 'disabled';} ?>
					<?php foreach ($harilibur as $hr) {?>
						<?php date_default_timezone_set('Asia/Jakarta');?>
						<?php if ($hr->tgl == date('Y-m-d')) {
							echo 'disabled';
						} ?> 
					<?php } ?>>
					<span class="glyphicon glyphicon-floppy-save"></span>
					Tambah Data
				</button>
				 <!-- <input type="submit" name="input" style="font-family: 'Exo 2', sans-serif; font-style: italic;" class="btn btn-primary" value="Tambah Data"> -->
				</div>
			</div>
			</form>	

			<?php }
			else {?>

			<h4><span style="font-style: italic; color: red;">Karena sebelumnya Anda tidak input KPIM Plannext week untuk hari ini, <br> maka mohon maaf, hari ini Anda tidak dapat input KPIM. </span><br><br> Silahkan input KPIM Plannext week untuk besok dan yang akan datang <a href="<?php echo base_url(); ?>kpimmingguannext">di sini</a></h4>

		<?php } ?>
		<!-- ini selesai validasi input plannext atau tdk -->



		<br/>
		<div class="row">
		
			<div class="col-lg-12 table-responsive">
				<table id="dataTables" class="table table-bordered table-hover table-striped">
					<thead class="text-center" style="background-color: #6db1ff">
					  <tr>
						<th style="text-align: center;">No</th>
						<th style="text-align: center;">Hari/Tanggal</th>
						<th style="text-align: center;">Goal</th>
						<th style="text-align: center;">Action</th>
						<th style="text-align: center;">Kendala</th>
						<th style="text-align: center;">Result</th>
						<th style="text-align: center;">Deadline</th>
						<th style="text-align: center;">Nilai</th>
						<th style="text-align: center;">Departement</th>
						<th style="text-align: center;">Action</th>
					  </tr>
					</thead>
					<tbody >
					<?php 
					$no = 1;
					foreach($table as $u){ 
					?>
						<tr
							<?php 
							if ($u->tgl == date('Y-m-d') AND $u->result == '') 
								{ echo 'style="background-color: #f79d00; color: black;"';}
							?>

							<?php 
							if ($u->tgl == date('Y-m-d')) {echo 'style="background: linear-gradient(-20deg,#20b189,#456f9c);
							    background-image: linear-gradient(-20deg, rgb(32, 177, 137), rgb(69, 111, 156));
							    background-position-x: initial;
							    background-position-y: initial;
							    background-size: initial;
							    background-repeat-x: initial;
							    background-repeat-y: initial;
							    background-attachment: initial;
							    background-origin: initial;
							    background-clip: initial;
							    background-color: initial; color: white;"';}
							?>
						>
							<td><?php echo $no++ ?></td>
							<td style=" max-width: 100px; "><?php echo nama_hari($u->tgl).', <br> '. tgl_indo($u->tgl)?></td>
							<td style=" max-width: 150px; word-wrap: break-word; overflow: auto;"><?php echo $u->nama_goals ?></td>
							<td style="max-width: 300px; word-wrap: break-word; overflow: auto;"><?php echo $u->action ?></td>
							<td style="max-width: 150px; word-wrap: break-word; overflow: auto;"><?php echo $u->kendala ?></td>
							<td style="max-width: 200px; word-wrap: break-word; overflow: auto;"><?php echo $u->result ?></td>
							<td style=" max-width: 100px;"><?php echo nama_hari($u->deadline).', <br> '. tgl_indo($u->deadline)?></td>
							<td style="max-width: 200px; word-wrap: break-word; overflow: auto;"><?php echo $u->usulnilai ?></td>
							<td><?php echo $u->nama_dept ?></td>
							<td width="150px">
								<button data-toggle="modal" data-target="#myModal<?php echo $u->id ?>" type="button" class="btn btn-default btn-sm" 
									<?php if ($u->tgl > date('Y-m-d')) {
									echo "disabled";
								} ?>
								>
						          <span class="glyphicon glyphicon-edit"></span> 
						          <text style="text-transform: capitalize;"> Edit</text> 
						        </button>
			
		
			                    <button type="button" class="btn btn-default btn-sm" data-target="#myModalhapus<?php echo $u->id ?>" data-toggle="modal" name="input" class="btn btn-default" style="font-family: 'Exo 2', sans-serif; text-transform: capitalize;"> <span class="glyphicon glyphicon-trash"></span> Hapus
								</button>
			                    <!-- <?php echo anchor('kpimmingguan/hapus/'.$u->id,
			                    	'<button type="button" class="btn btn-default btn-sm">
							          <span class="glyphicon glyphicon-trash"></span>
							          	<text style="text-transform: capitalize;"> Hapus</text>  
							        </button>', array('class'=>'hapus', 'onclick'=>"#myModal;")
							    ); ?> -->

							    <!-- Modal -->
								<div class="modal fade" id="myModalhapus<?php echo $u->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
								  <div class="modal-dialog vertical-align-center" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
								      </div>
								      <div class="modal-body" style="background-color: #2372ef; color: white">
								        <h4>Yakin hapus ?</h4>
								      </div>
								      <div class="modal-footer">
											<form id="form_kpim" method="POST" action="<?php echo base_url();?>kpimmingguan/hapus/<?php echo $u->id?>">
										      	<button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal">Batal</button>
											<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary">Hapus</button>
											</form>
								      </div>
								    </div>
								  </div>
								</div>
			                   
							</td>

						</tr>
						<!-- Modal -->
						<div class="modal fade" id="myModal<?php echo $u->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header" style="background-color: #6db1ff">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel"><b>Edit</b></h4>
						      </div>
						      <div class="modal-body">
						      
						     <!--isi modal!-->

						<form id="form_kpim" action="<?php base_url();?>kpimmingguan/update/<?php echo $u->id ?>" method="POST">
						    <div class="row">
							  	<div class="col-sm-4">
									<div class="col-lg-8">
										<h4>Tanggal :</h4>
									</div>
							 	</div>
								<div class="col-sm-8">
									<div class="col-lg-10 ">
										<div id='datetimepicker_tgledit'>
										<div class="col-sm-12" style="margin: 5px 5px 0px 0px; font-weight: bold;"><?php echo date("d-m-Y", strtotime($u->tgl)) ?></div>
											<!-- <input id="MyDate<?php echo $u->id ?>" value="<?php echo $u->tgl ?>" type='hidden' class="form-control" name="tgledit" placeholder="Tanggal" /> --> 
										</div>
									</div>
								</div>
							</div>

							<div class="row">
							  	<div class="col-sm-4">
									<div class="col-lg-8">
										<h4>Dept :</h4>
									</div>
							 	</div>
								<div class="col-sm-8">
									<div class="col-lg-10 ">
										<select id="deptedit<?php echo $u->id ?>" name="tgs_dept" class="form-control" required oninvalid="this.setCustomValidity('Pilih terlebih dahulu')" oninput="setCustomValidity('')" >
										<?php foreach ($isinamadept->result() as $key): ?>
										<option value="<?php echo $key->id_dept;?>" <?php if ($key->id_dept == $u->tgs_dept) { echo 'selected' ;}; ?>> <?php echo $key->nama_dept;?></option>
										<?php endforeach ?>
									</select>
										<!--<textarea class="form-control" rows="5" id="goal" name="goaledit"></textarea>!-->
									</div>
								</div>
							</div>

							<!-- <div class="row">
							  	<div class="col-sm-4">
									<div class="col-lg-8">
										<h4>Goal :</h4>
									</div>
							 	</div>
								<div class="col-sm-8">
									<div class="col-lg-8 ">
										<input value="<?php echo $u->nama_goals ?>" type="text" class="form-control" id="goal" name="goaledit" placeholder="Goal" required>
									</div>
								</div>
							</div> -->

							<div class="row">
							  	<div class="col-sm-4">
									<div class="col-lg-8">
										<h4>Goal :</h4>
									</div>
							 	</div>
								<div class="col-sm-8">
									<div class="col-lg-10">
										<select id="kontenedit<?php echo $u->id ?>" class="form-control" name="goaledit" required>

										<?php $datadept = $this->M_karyawanku->getbobot($u->tgs_dept)->result(); ?>

										<?php foreach ($datadept as $sb) { ?>
										<option value="<?php echo $sb->nama . 'pisah' . $sb->bobot ?>" <?php if ($u->nama_goals == $sb->nama) { echo 'selected'; } ?> ><?php echo $sb->nama ?></option>							
										<?php } ?>


										<!-- di bawah ini untuk mengeluarkan semua -->
										<!-- <?php foreach ($selectbobot as $sb) { ?>
										<option value="<?php echo $sb->nama . 'pisah' . $sb->bobot ?>" <?php if ($u->nama_goals == $sb->nama) { echo 'selected'; } ?> ><?php echo $sb->nama ?></option>							
										<?php } ?> -->
											
										</select>
									</div>
								</div>
							</div>

							

							<div class="row">
							  	<div class="col-sm-4">
									<div class="col-lg-8">
										<h4>Action :</h4>
									</div>
							 	</div>
								<div class="col-sm-8">
									<div class="col-lg-10 ">
										<!--<input type="text" class="form-control" id="action" name="actionedit">!-->
										<textarea class="form-control" rows="4" id="action" name="actionedit" placeholder="Action" required><?php echo $u->action ?></textarea>
									</div>
								</div>
							</div>

							<div class="row">
							  	<div class="col-sm-4">
									<div class="col-lg-8">
										<h4>Kendala :</h4>
									</div>
							 	</div>
								<div class="col-sm-8">
									<div class="col-lg-10 ">
										<input value="<?php echo $u->kendala ?>" type="text" class="form-control" id="kendala" name="kendalaedit" placeholder="Kendala">
										<!--<textarea class="form-control" rows="5" id="goal" name="goaledit"></textarea>!-->
									</div>
								</div>
							</div>

							<div class="row">
							  	<div class="col-sm-4">
									<div class="col-lg-8">
										<h4>Result :</h4>
									</div>
							 	</div>
								<div class="col-sm-8">
									<div class="col-lg-10 ">
										<textarea class="form-control" rows="4" id="result" name="resultedit" placeholder="Result" required><?php echo $u->result ?></textarea>
										

										<!-- <input value="<?php echo $u->result ?>" type="text" class="form-control" id="result" name="resultedit" placeholder="Result"> -->
										<!--<textarea class="form-control" rows="5" id="goal" name="goaledit"></textarea>!-->
									</div>
								</div>
							</div>

							<div class="row">
							  	<div class="col-sm-4">
									<div class="col-lg-8">
										<h4>Nilai :</h4>
									</div>
							 	</div>
								<div class="col-sm-8">
									<div class="col-lg-10" style="padding-top: 5px">
										<!-- <textarea class="form-control" rows="1" id="result" name="usulnilaiedit" placeholder="Result"><?php echo $u->usulnilai ?></textarea> -->
										<!-- <input id="usulnilaiedit" style=" margin-bottom: 5px" type='number' min="1" max="10" class="form-control" value="<?= $u->usulnilai ?>" name="usulnilaiedit" onkeypress="return hanyaAngka(event, false)" placeholder="Nilai" required />
										<script>
											var max_chars = 2;

											$('#usulnilaiedit').keydown( function(e){
											    if ($(this).val().length >= max_chars) { 
											        $(this).val($(this).val().substr(0, max_chars));
											    }
											});

											$('#usulnilaiedit').keyup( function(e){
											    if ($(this).val().length >= max_chars) { 
											        $(this).val($(this).val().substr(0, max_chars));
											    }
											});
										</script> -->

										<?php if ($u->status_deadline == 1) { ?>
											<div>
												<div class="col-md-12">
													<label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="5" <?php if ($u->usulnilai == 5) {echo 'checked';} ?> required>5
												    </label>
												    <label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="6" <?php if ($u->usulnilai == 6) {echo 'checked';} ?>>6
												    </label>
												    <label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="7" <?php if ($u->usulnilai == 7) {echo 'checked';} ?>>7
												    </label>
												</div>
												<div class="col-md-12">
												    <label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="8" <?php if ($u->usulnilai == 8) {echo 'checked';} ?>>8
												    </label>
												    <label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="9" <?php if ($u->usulnilai == 9) {echo 'checked';} ?>>9
												    </label>
												     <label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="10" <?php if ($u->usulnilai == 10) {echo 'checked';} ?>>10
												    </label>
												</div>
											</div>
										<?php } ?>

										<?php if ($u->status_deadline == 2) { ?>
											<div>
												<label class="radio-inline">
											      <input type="radio" name="usulnilaiedit" value="5" <?php if ($u->usulnilai == 5) {echo 'checked'; } ?>	required>5
											    </label>
											    <label class="radio-inline">
											      <input type="radio" name="usulnilaiedit" value="6" <?php if ($u->usulnilai == 6) {echo 'checked';} ?> >6
											    </label>
											    <label class="radio-inline">
											      <input type="radio" name="usulnilaiedit" value="7" <?php if ($u->usulnilai == 7) {echo 'checked';} ?> >7
											    </label>
											    <label class="radio-inline">
											      <input type="radio" name="usulnilaiedit" value="8" <?php if ($u->usulnilai == 8) {echo 'checked';} ?> >8
											    </label>
											</div>
										<?php } ?>

										<?php if ($u->status_deadline == 3) { ?>
											<div>
												<div class="col-md-12">
													<label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="0" <?php if ($u->usulnilai == 0) {echo 'checked';} ?> required>0
												    </label>
													<label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="1" <?php if ($u->usulnilai == 1) {echo 'checked';} ?>>1
												    </label>
												    <label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="2" <?php if ($u->usulnilai == 2) {echo 'checked';} ?>>2
												    </label>
											    </div>
												<div class="col-md-12">
												    <label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="3" <?php if ($u->usulnilai == 3) {echo 'checked';} ?>>3
												    </label>
												    <label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="4" <?php if ($u->usulnilai == 4) {echo 'checked';} ?>>4
												    </label>
												    <label class="radio-inline">
												      <input type="radio" name="usulnilaiedit" value="5" <?php if ($u->usulnilai == 5) {echo 'checked';} ?>>5
												    </label>
											    </div>
											</div>
										<?php } ?>

										
									</div>
								</div>
							</div>

							

							<div class="row" style="margin-top: 10px">
							  	<div class="col-sm-4">
									<div class="col-lg-8">
										<h4>Deadline :</h4>
									</div>
							 	</div>
								<div class="col-sm-8">
									<div  id="tgl_deadline" class="col-lg-10 ">

											<div style="margin-top: 7px; font-weight: bold;"><?php echo date("d-m-Y", strtotime($u->deadline)) ?></div>

											<input type="hidden" name="deadlineedit" value="<?php echo $u->deadline ?>">
											<!-- <div class='input-group date' id="MyDate<?php echo $u->id ?>">     
												<span class="input-group-addon" style="">
												<span class="glyphicon glyphicon-calendar"></span>
												</span>
												<input type='text' value="<?php echo $u->deadline ?>" class="form-control input-group-addon" placeholder="Deadline" name="" id="deadline" disabled required> 
											</div>	 -->									
									</div>
								</div>
							</div>

							<script>
								$(document).ready(function(){

									$('#deptedit<?php echo $u->id ?>').change(function(){
										
										if ($('#deptedit<?php echo $u->id ?>').val() !== null ){
											$('#kontenedit<?php echo $u->id ?>').show(1000);
										}
									})

									$('#tgl_deadline').click(function(){
										alert('Tanggal Deadline Tidak Bisa diedit!');
									})

								})

								$('#deptedit<?php echo $u->id ?>').change(function()
						        {            
						            //Ajax Load data from ajax
						            $.ajax({
						                url : "<?php echo site_url('karyawan/ambildatabobotkpim')?>",
						                type: "POST",
						                data: {pilihdept:$('#deptedit<?php echo $u->id ?>').val()},
						                dataType: "JSON",
						                success: function(data)
						                { 
						                	$('#kontenedit<?php echo $u->id ?>').empty();

						                	// document.getElementById('konten'); itu sama dengan $('#konten')[0]

					                		var select = $('#kontenedit<?php echo $u->id ?>')[0];		                	                     
						                    for (var i = 0; i < data.length; i++) {
						                     	option = document.createElement('option');
						                        option.value = data[i]["nama"] + 'pisah' + data[i]["bobot"]
						                        option.text = data[i]["nama"];
						                       	select.add(option)
						                    }
						                    // $('#tabel_bobot').DataTable();
						                },
						                error: function (jqXHR, textStatus, errorThrown)
						                {
						                    alert('Error get data from ajax');
						                }
						            });
						        });
							</script>

				
							<!--isi modal selesai!-->

						      </div>
						      <div class="modal-footer" style="background-color: #6db1ff">
						        <button type="button" style="font-family: 'Exo 2', sans-serif;" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="submit" style="font-family: 'Exo 2', sans-serif;" name="input"  class="btn btn-primary">Save changes</button>
						      </div>
						    </div>
						  </div>
						</div>
					</form>
						<!--Modal selesai!-->
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>


		<div class="row ">
		 <div class="col-sm-4" style="text-align: left;">
		 	
				<button class="btn btn-default" id="show" style="font-family: 'Exo 2', sans-serif;">Tampilkan Parameter Nilai</button>
				<button class="btn btn-default ini" id="hide" style="font-family: 'Exo 2', sans-serif; display: none"> Hide </button>		
		 </div>
		
		  <div class="col-sm-6" style="text-align: right;">						
						
						<a class= "btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin-top:5px" href="<?php echo base_url(); ?>home"><h7><span class="glyphicon glyphicon-home"></span> Home</h7></a>
						<button type="button" class="btn btn-warning" style="font-family: 'Exo 2'; margin-top:5px"  data-toggle="modal" data-target="#myModalsend">Send</button>
						
		  </div>
		  <div class="col-sm-2 text-right"><a class= "btn btn-primary" href="<?php echo base_url(); ?>kpimmingguannext" style="font-family: 'Exo 2', sans-serif; font-style: italic; margin-top:5px"><h7>Plan Next Week </h7><span class="glyphicon glyphicon-arrow-right"></span></a></div>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-6" style="text-align: left;">
				<button class="btn btn-danger" id="show2" style="font-family: 'Exo 2', sans-serif;">Tampilkan Daftar Subordinate</button>
				<button class="btn btn-danger ini2" id="hide2" style="font-family: 'Exo 2', sans-serif; display: none"> Hide </button>		
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="myModalsend" role="dialog" style="padding-top: 100px;">
			<div class="modal-dialog modal-sm">
			  <div class="modal-content">
			    <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal">&times;</button>
			      <h4 class="modal-title">Konfirmasi Kirim</h4>
			    </div>
			    <div class="modal-body" style="background-color: #2372ef; ">
			    <form id="form_kpim" action="<?php base_url();?>kpimmingguan/updatestatus" method="POST">
			    <input type='hidden' class="form-control" name="isistatus" value="2" /> 
			      <p style="text-align: center; color: white;">Yakin Kirim laporan?</p>
			    
			    </div>
			    <div class="modal-footer">
			      <button type="button" class="btn btn-default" style="font-family: 'Exo 2'; margin-top:5px" data-dismiss="modal">Batal</button>
			      <input type="submit" name="input" style="font-family: 'Exo 2'; margin-top:5px" class="btn btn-primary" value="Kirim"> 
			    </form>
			    </div>
			  </div>
			</div>
		</div>

		
		

			<div class="row ini" style="display: none">	
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

				<div class="col-sm-2">
					<table class="tg" style="float:center;">
					  <tr>
					    <th class="tg-bgyt" colspan="2">Parameter Nilai Actual</th>
					  </tr>
					  <tr>
					    <td class="tg-giv5">Overtime</td>
					    <td class="tg-bgyt" style="background-color: firebrick">0 - 5</td>
					  </tr>
					  <tr>
					    <td class="tg-giv5">Ontime</td>
					    <td class="tg-bgyt" style="background-color: gray">5 - 8</td>
					  </tr>
					  <tr>
					    <td class="tg-giv5">Intime</td>
					    <td class="tg-e5lu" style="background-color: green">6 - 10</td>
					  </tr>
					</table>
				</div>			
				<div class="col-sm-10 table-responsive">						
					
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
					</table>
				</div>
			</div>

			<div class="ini2" style="display: none">
				<!-- <img class="img-responsive" src="<?php echo base_url() ?>/assets/img/menilai.png" alt="Tabel menilai karyawan" title="Tabel menilai karyawan"> -->
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
												<thead class="text-center" style="background-color: #6db1ff">
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

			</div>



			<script> //ini untuk hide show table
				$(document).ready(function(){
				    $("#hide").click(function(){
				        $(".ini").hide(1000);
				    });
				    $("#show").click(function(){
				        $(".ini").show(1000);
				    });

				    $("#hide2").click(function(){
				        $(".ini2").hide(1000);
				    });
				    $("#show2").click(function(){
				        $(".ini2").show(1000);
				    });
				});
			</script>




		
			</div>
		</div>
		
		


		<div class="container">


			<div class="dialogbox">
		    <div class="body">
		      <span class="tip tip-up"></span>
		      <div class="message">


		    <p class="info">
			<text style="font-family: 'Exo 2', sans-serif, medium">
				<b>Penjelasan Warna pada tabel :</b><br>
			</text>
				<text style="font-family: 'Exo 2', sans-serif; font-style: italic;">
					<table style="font-family: 'Exo 2', sans-serif; ">
						<tr>
							<td style="width: 20px;">1. </td>
							<td><div style="background: linear-gradient(-20deg,#20b189,#456f9c);
						    background-image: linear-gradient(-20deg, rgb(32, 177, 137), rgb(69, 111, 156));
						    background-position-x: initial;
						    background-position-y: initial;
						    background-size: initial;
						    background-repeat-x: initial;
						    background-repeat-y: initial;
						    background-attachment: initial;
						    background-origin: initial;
						    background-clip: initial;
						    background-color: initial; width: 30px; height: 30px; border:black 1px solid; "></div></td>
							<td>&nbsp; Warna Gradient Hijau adalah input kpim hari ini</td>
						</tr> 
						<tr >
							<td style="width: 20px;">2. </td>
							<td><div style="background-color:  #f79d00; width: 30px; height: 30px; border:black 1px solid; "></div></td>
							<td>&nbsp; Warna Orange adalah input kpim hari ini dari inputan plannext week yang harus diedit (disesuaikan serta diisi kolom result dan nilainya)</td>
						</tr>
						<tr>
							<td style="width: 20px;">3. </td>
							<td><div style="background-color:  #ddd; width: 30px; height: 30px; border:black 1px solid; "></div></td>
							<td>&nbsp; Warna Abu-abu adalah input kpim <b>bukan</b> hari ini</td>
						</tr> 
					</table>
				</text>
			</p>
		       
		    <p class="info">
			<text style="font-family: 'Exo 2', sans-serif, medium">
			<b>Ketentuan penilaian karyawan :</b><br></text>
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
		<script src="<?php echo base_url();?>assets/js/moment.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>

		

		<!-- <script type="text/javascript">
			$(document).ready(function(){
				$("#datetimepicker4").click(function(){		
					

					if ($("#deadline").val() > $("#tgl_sekarang").val()) {
						$("#usulnilai").attr({
					       "max" : 5,        // substitute your own
					       "min" : 0          // values (or variables) here
					    });
					}

					if ($("#deadline").val() == $("#tgl_sekarang").val()) {
						$("#usulnilai").attr({
					       "max" : 8,        // substitute your own
					       "min" : 6          // values (or variables) here
					    });
					}

					if ($("#deadline").val() < $("#tgl_sekarang").val()) {
						$("#usulnilai").attr({
					       "max" : 10,        // substitute your own
					       "min" : 5          // values (or variables) here
					    });
					}

					$("#usulnilai").val('');

				})

			})

			
		</script> -->

		<!-- <script type="text/javascript">
			$(document).ready(function(){
				$("#datetimepicker4").click(function(){		
					

					if ($("#deadline").val() > $("#tgl_sekarang").val()) {
						$("#intime").show(1000);
						$("#overtime").hide(1000);
						$("#ontime").hide(1000);
					}

					if ($("#deadline").val() == $("#tgl_sekarang").val()) {
						$("#ontime").show(1000);
						$("#overtime").hide(1000);
						$("#intime").hide(1000);
					}

					if ($("#deadline").val() < $("#tgl_sekarang").val()) {
						$("#overtime").show(1000);
						$("#intime").hide(1000);
						$("#ontime").hide(1000);
					}

					$("#usulnilai").val('');

				})

			})

			
		</script> -->

		<script>

			$(document).ready(function(){

				$('#pilihdept').change(function(){
					
					if ($('#pilihdept').val() !== null ){
						$('#konten').show(1000);
						$('#jdl_konten').show(1000);
						$('#open').show(1000);

					}

				})

			})

			$('#datetimepicker4').on('dp.change', function(e){ 
				console.log(e.date);
				if ($("#deadline").val() > $("#tgl_sekarang").val()) {
						$("#intime").show(1000);
						$("#overtime").hide(1000);
						$("#ontime").hide(1000);
					}

					if ($("#deadline").val() == $("#tgl_sekarang").val()) {
						$("#ontime").show(1000);
						$("#overtime").hide(1000);
						$("#intime").hide(1000);
					}

					if ($("#deadline").val() < $("#tgl_sekarang").val()) {
						$("#overtime").show(1000);
						$("#intime").hide(1000);
						$("#ontime").hide(1000);
					}

					$("#usulnilai").val('');
					$("input[type='radio'][name='usulnilai']" ).prop('checked', false);
			})
		</script>
		
		<script>

		function confirmDialog() {
		 return confirm('Apakah anda yakin akan menghapus data?')
		}


		$(function() {
		  $('input[id^=MyDate]').datetimepicker({ format: 'YYYY-MM-DD' });
		});

		$(function() {
		  $('div[id^=MyDate]').datetimepicker({ format: 'YYYY-MM-DD' });
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
						minDate: moment().millisecond(0).second(0).minute(0).hour(0),
						maxDate: moment().millisecond(0).second(0).minute(0).hour(23),
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

<script type="text/javascript">
<!--
 
$(document).ready(function () {
 	window.setTimeout(function() {
	    $(".alert").fadeIn(1500, function(){
	        $(this).show(); 
	    });
	}, 2000);

	window.setTimeout(function() {
	    $(".alert").fadeTo(1500, 0).slideUp(5000, function(){
	        $(this).remove(); 
	    });
	}, 12000);
 
});
//-->
</script>

	<script>
	$(document).ready(function() {
		$('#dataTables').DataTable();
		$('#tabel_subordinate').DataTable({
    			paging: false
    		});
	} );
	</script>



</body>
</html>
