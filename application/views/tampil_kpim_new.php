<!DOCTYPE html>
<html>
<head>
	<title>KPIM Online - Mingguan</title>
	<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.css">
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">
</head>
<style type="text/css">
	.blink
	{
    	animation-duration: 1s;
    	animation-name: blink;
    	animation-iteration-count: infinite;
    	animation-timing-function: steps(2, start);
	}
	@keyframes blink
	{
	    0% 
	    {
	        opacity: 1;
	    }
	    80% 
	    {
	        opacity: 1;
	    }
	    81% 
	    {
	        opacity: 0;
	    }
	    100% 
	    {
	        opacity: 0;
	    }
	}
	@media screen and (max-width: 1024px)
	{
      .jarak 
      {
        margin-bottom: 10px;
      }
    }
    .test
    {
    	background-color: #eee;
    }
    .libur
    {
    	font-size: 30px;
    	background: rgba(198, 15, 15, 0.8);
    	color: white
    }
    button
    {
		font-family: 'Exo 2', sans-serif !important;
	}
    select#konten 
    {
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    text-indent: 1px;
	    text-overflow: '';
	}
	.kpim-plan
	{
		background-color: #f79d00 !important;
		color: black;
	}
	.kpim-today
	{
		background: linear-gradient(-20deg,#20b189,#456f9c);
		background-image: linear-gradient(-20deg, rgb(32, 177, 137), rgb(69, 111, 156));
		background-position-x: initial;
		background-position-y: initial;
		background-size: initial;
		background-repeat-x: initial;
		background-repeat-y: initial;
		background-attachment: initial;
		background-origin: initial;
		background-clip: initial;
		background-color: initial; color: white;
	}
</style>
<body class="bg semua">
	<?php date_default_timezone_set('Asia/Jakarta');?>
	<!---Mulai navbar account!-->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	    <div class="container-fluid"> 
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span> 
	            </button>
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
	                <li><a href="<?php echo base_url(); ?>kpimmingguannext">KPIM Plan Next</a></li>
	                <li class="dropdown">
                	<?php
						foreach ($inboxblmbaca as $total)
						foreach ($noteblmbaca as $totalnote)
						foreach ($planblmbaca as $totalplan)
						foreach ($noteplan as $totalnoteplan){
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
			            	<li>
			            		<a href="<?php echo base_url(); ?>kpimmingguan/replykpim">KPIM Mingguan
			                	<?php if(isset($totalnote->jumlah)){ ?>
			                    	<div style="background-color: orange; color: white; border-radius: 5px; padding: 5px 5px; text-align: center;">
									<?=$totalnote->jumlah?> <span class="glyphicon glyphicon-pencil"></span>Catatan Baru
									</div>
								<?php }?>
			                    </a>
			                </li>
			                <li>
			                	<a href="<?php echo base_url(); ?>kpimmingguan/replykpimnext">KPIM Plan Next
			                    <?php if(isset($totalplan->jumlah)){ ?>
			                       	<div style="background-color: #ce0808; color: white; border-radius: 5px; padding: 5px 5px; text-align: center;">
									<?=$totalplan->jumlah?> <span class="glyphicon glyphicon-remove"></span> Plan tidak disetujui
									</div>
								<?php }?>
								<!-- ganti -->
								<?php if(isset($totalnoteplan->jumlah)){ ?>
			                       	<div style="background-color: orange; color: white; border-radius: 5px; padding: 5px 5px; text-align: center;">
									<?=$totalnoteplan->jumlah?> <span class="glyphicon glyphicon-pencil"></span>Catatan pada Plan
									</div>
								<?php }?>
			                    </a>
			                </li>
							<li>
								<a href="<?php echo base_url(); ?>kpimmingguan/pesan">Pesan
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
			        <?php if ($this->session->userdata('level') == 1 ) {
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
					} ?>
	            </ul>
	            <ul class="nav navbar-nav navbar-right">
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                        <span style="position: absolute; margin-left: -40px; margin-top: -3px"><?php
								foreach ($profilku as $row) { ?>
								<?php $alamatfoto =  $row->img; 
								if (empty($alamatfoto)) {
								$alamatfoto = 'kosong.png';
								}?>
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
												foreach ($profilku as $row) { ?>	
												<?php $alamatfoto =  $row->img; 
												if (empty($alamatfoto)) {
													$alamatfoto = 'kosong.png';
												}?>
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
	if ($this->session->userdata('harikerja') == 5 )
	{
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
	?>
	<?php
		$harikerja = getWorkingDays($tglawalinput,$tglsekarang,$lamakerja);
		function getWorkingDays($startDate, $endDate, $lamakerja)
		{
			$begin=strtotime($startDate);
		 	$end=strtotime($endDate);
		 	if($begin>$end)
		 	{
		  		echo "<text style='color:red'>Tanggal start harus lebih kecil dari tanggal akhir!</text>";
		  		return '';
		 	}
		 	else
		 	{
		   		$no_days=0;
		   		$weekends=0;
		  		while($begin<=$end)
		  		{
		    		$no_days++; // no of days in the given interval
		    		$what_day=date("N",$begin);
		     		if($what_day>$lamakerja)
		     		{ 
		     			// 6 and 7 are weekend days
		          		$weekends++;
		     		};
			    	$begin+=86400; // +1 day
		  		};
		  		$working_days=$no_days-$weekends;
		  		return $working_days;
		 	}
		}
	?>
	<div class="alert alert-info alert-dismissable col-sm-5" style="font-size: 15px; z-index: 1; margin: 60px 0 0 20px; position: absolute; display: none;">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	    <text style="color: green">Nilai pekan lalu : 
	   	<?php
		foreach ($nilaiku as $u) { 
		?>
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
				if (date('N',strtotime($tanggal) ) == '7' || date('N', strtotime($tanggal))  == '6') {
					$liburweekend[] = $tanggal;					
				}
			} ?>
		<!-- untuk mencari hari libur karyawan kerja 5 hari -->
		<?php
		$dt_harikerja=array_diff($daterange,$liburweekend);// hari kerja
		$result=array_diff($dt_harikerja,$liburresmi); // hari kerja - data libur
		$lib = array_intersect($dt_harikerja,$liburresmi); //ambil tgl merah saja (data libur)
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
			if ($this->session->userdata('harikerja') == '5') 
			{
				if ($weekDay == 0 || $weekDay == 6) 
				{
		    		$statushari = "libur";
			    }
			    else
			    {
			    	$statushari = "masuk";
			    }
			}
			else 
			{
				if ($weekDay == 0 )
				{
		    	$statushari = "libur";
			    }
			    else
			    {
			    	$statushari = "masuk";
			    }
			}?>
		</div>
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
		$valid = 'ada';
		foreach($table as $a)
		{
			if ($hariini == $a->tgl)
			{
				$valid = 'ada';
			}
		}
		foreach($tableplannext as $tp)
		{
			if ($hariini == $tp->tgl)
			{
				$valid = 'ada';
			}
		}
		if($valid == 'ada')
		{ ?>
		<form id="form_kpim">
			<div class="row">
				<div class="col-lg-2 text-left" style="margin-left: 5px">
					<h4><strong>Laporan Harian :</strong></h4>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							<?php $inputsekarang = date("d-m-Y");?>
							<input  type="text" style="text-align: center;" class="form-control" value="<?php echo $inputsekarang;?>" disabled>
							<input type="hidden" id='tgl_sekarang' name="tgl" value="<?php echo date('Y-m-d'); ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 col-xs-3">
					<div class="form-group">
						<select id="pilihdept" name="tgs_dept" class="form-control" data-live-search="true">
							<option value="">-- Pilih Dept --</option>
							<?php foreach ($isinamadept->result() as $key): ?>
							<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group-group">
						<div id="jdl_konten" class="text-left" style="margin:0px 0 0 5px;">Goal/Pekerjaan :</div>
						<select id="konten" class="form-control" name="goals" data-live-search="true">
					    	<option value="all">-- Pilih salah Satu --</option>
						</select>
					</div>
				</div>
				<div class="col-sm-3 col-xs-3">
					<textarea class="form-control jarak" rows="4" cols="30" placeholder="Description" name="action" id="action" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
				</div>
				<div class="col-sm-2 col-xs-2">
					<textarea class="form-control jarak" rows="4" cols="20" placeholder="Kendala" name="kendala" id="kendala"></textarea>
				</div>
				<div class="col-sm-2 col-xs-2">
					<textarea class="form-control jarak" rows="4" cols="20" placeholder="Result" name="result" id="result" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
				</div>
				<div class="col-sm-2 col-xs-2">
					<div class="form-group">
						<div class='input-group date' id='datetimepicker4'>
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
							</span>
							<input type='text' class="form-control input-group-addon" placeholder="Deadline" name="deadline" id="deadline" required readonly>
						</div>
					</div>
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
			</div>
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<button type="button" onclick="add_kpim()" style="font-family: 'Exo 2', sans-serif; margin-top: 5px" name="input" class="btn btn-primary form-control" <?php if ($statushari == 'libur') {echo 'disabled';} ?>
						<?php foreach ($harilibur as $hr) {?>
							<?php date_default_timezone_set('Asia/Jakarta');?>
							<?php if ($hr->tgl == date('Y-m-d')) {
								echo 'disabled';
							} ?> 
						<?php } ?>>
						<span class="glyphicon glyphicon-floppy-save"></span>
						Tambah Data
					</button>
				</div>
			</div>
		</form>
		<?php
		}
		else
		{ ?>
			<h4><span style="font-style: italic; color: red;">Karena sebelumnya Anda tidak input KPIM Plannext untuk hari ini, <br> maka mohon maaf, hari ini Anda tidak dapat input KPIM. </span><br><br> Silahkan input KPIM Plannext untuk besok dan yang akan datang <a href="<?php echo base_url(); ?>kpimmingguannext">di sini</a></h4>
		<?php }?>
		<br>
		<div class="row">
			<div class="col-sm-12 col-xs-12 table-responsive">
				<table id="dataTables" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead class="text-center" style="background-color: #6db1ff">
					  <tr>
						<!-- <th class="text-center">No</th> -->
						<th class="col-xs-1 text-center">Hari/Tanggal</th>
						<th class="col-xs-1 text-center">Goal</th>
						<th class="col-xs-2 text-center">Description</th>
						<th class="col-xs-1 text-center">Kendala</th>
						<th class="col-xs-2 text-center">Result</th>
						<th class="col-xs-1 text-center">Deadline</th>
						<th class="col-xs-1 text-center">Nilai</th>
						<th class="col-xs-1 text-center">Departement</th>
						<th class="col-xs-2 text-center">Action</th>
					  </tr>
					</thead>
					<tbody id="tbcontent"></tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4" style="text-align: left;">
				<button class="btn btn-default" id="show" style="font-family: 'Exo 2', sans-serif;">Tampilkan Parameter Nilai</button>
				<button class="btn btn-default ini" id="hide" style="font-family: 'Exo 2', sans-serif; display: none"> Hide </button>		
		 	</div>
		 	<div class="col-sm-6" style="text-align: right;">
				<a class= "btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin-top:5px" href="<?php echo base_url(); ?>home"><h7><span class="glyphicon glyphicon-home"></span> Home</h7></a>
				<button type="button" class="btn btn-warning" style="font-family: 'Exo 2'; margin-top:5px"  data-toggle="modal" data-target="#myModalsend">Send</button>
		  	</div>
		  	<div class="col-sm-2 text-right">
		  		<a class= "btn btn-primary" href="<?php echo base_url(); ?>kpimmingguannext" style="font-family: 'Exo 2', sans-serif; font-style: italic; margin-top:5px"><h7>Plan Next </h7><span class="glyphicon glyphicon-arrow-right"></span></a>
		  	</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-6 col-xs-6" style="text-align: left;">
				<button class="btn btn-danger" id="show2" style="font-family: 'Exo 2', sans-serif;">Tampilkan Daftar Subordinate</button>
				<button class="btn btn-danger ini2" id="hide2" style="font-family: 'Exo 2', sans-serif; display: none"> Hide </button>		
			</div>
		</div>
		<div class="row ini" style="display: none;">
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
					<tr><th class="tg-bgyt" colspan="2">Parameter Nilai Actual</th></tr>
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
					<tr><th class="tg-bgyt" colspan="6">Parameter Total Penilaian Akhir (%)</th></tr>
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
									</div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
		<br><br>
		<div class="row">
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
										<td>
											<div style="background: linear-gradient(-20deg,#20b189,#456f9c);
									    background-image: linear-gradient(-20deg, rgb(32, 177, 137), rgb(69, 111, 156));
									    background-position-x: initial;
									    background-position-y: initial;
									    background-size: initial;
									    background-repeat-x: initial;
									    background-repeat-y: initial;
									    background-attachment: initial;
									    background-origin: initial;
									    background-clip: initial;
									    background-color: initial; width: 30px; height: 30px; border:black 1px solid; ">
									    	</div>
									    </td>
										<td>&nbsp; Warna Gradient Hijau adalah input kpim hari ini</td>
									</tr>
									<tr>
										<td style="width: 20px;">2. </td>
										<td><div style="background-color:  #f79d00; width: 30px; height: 30px; border:black 1px solid; "></div></td>
										<td>&nbsp; Warna Orange adalah input kpim hari ini dari inputan plannext yang harus diedit (disesuaikan serta diisi kolom result dan nilainya)</td>
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
									<b>Ketentuan penilaian karyawan :</b><br>
								</text>
								<text style="font-family: 'Exo 2', sans-serif; font-style: italic;">
									1. Total maksimal score karyawan adalah 100<br>
									2. Total nilai maksimal persentase KPIM adalah 75%<br>
									3. Standart bobot penilaian KPIM ditentukan oleh masing - masing departement<br>
									4. Standart penilaian KPIM karyawan (aktual) dilihat dari selesai dikerjakan, masih proses atau tidak dikerjakannya suatu goals<br>
									5. Penilaian juga dipertimbangkan berdasarkan Goals, Description, Result dan Deadline<br>
									6. Untuk Goals yang tidak tercapai pada minggu I harus tetap di cantumkan di KPIM minggu<br>
									7. Plannext(Rencana kegiatan/pekerjaan) wajib diisi<br>
								</text>
							</p>
		      			</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modal_edit" role="dialog" style="padding-top: 100px;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #6db1ff">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title text-center" id="myModalLabel"><b>Edit</b></h4>
		        </div>
		        <div class="modal-body">
		        	<form id="form_edit" class="form-horizontal">
		        		<div class="row">
		        			<div class="col-sm-4">
								<h4>Tanggal</h4>
							</div>
							<div class="col-sm-8">
								<input type="text" name="tgl_kpim" class="form-control" readonly>
							</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-sm-4">
		        				<h4>Dept</h4>
		        			</div>
		        			<div class="col-sm-8">
		        				<input type="text" name="dept_kpim" class="form-control" readonly>
		        				<input type="hidden" name="id_kpim">
		        			</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-sm-4">
		        				<h4>Goals</h4>
		        			</div>
		        			<div class="col-sm-8">
		        				<input type="text" name="goals_kpim" class="form-control" readonly>
		        			</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-sm-4">
		        				<h4>Description</h4>
		        			</div>
		        			<div class="col-sm-8">
		        				<textarea class="form-control" rows="4" name="desc_kpim"></textarea>
		        			</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-sm-4">
		        				<h4>Kendala</h4>
		        			</div>
		        			<div class="col-sm-8">
		        				<textarea class="form-control" rows="4" name="kendala_kpim"></textarea>
		        			</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-sm-4">
		        				<h4>Result</h4>
		        			</div>
		        			<div class="col-sm-8">
		        				<textarea class="form-control" rows="4" name="res_kpim"></textarea>
		        			</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-sm-4">
		        				<h4>Nilai</h4>
		        			</div>
		        			<div class="col-sm-8">
		        				<div id="over_" style="display: none">
									<div class="col-md-12">
										<label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="0" required>0
									    </label>
										<label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="1" >1
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="2">2
									    </label>
								    </div>
									<div class="col-md-12">
									    <label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="3">3
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="4">4
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="5">5
									    </label>
								    </div>
								</div>
								<div id="on_" style="display: none">
									<label class="radio-inline">
								      <input type="radio" name="nilai_edit" value="5" required>5
								    </label>
								    <label class="radio-inline">
								      <input type="radio" name="nilai_edit" value="6">6
								    </label>
								    <label class="radio-inline">
								      <input type="radio" name="nilai_edit" value="7">7
								    </label>
								    <label class="radio-inline">
								      <input type="radio" name="nilai_edit" value="8">8
								    </label>
								</div>
								<div id="in_" style="display: none">
									<div class="col-md-12">
										<label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="5" required>5
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="6">6
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="7">7
									    </label>
									</div>
									<div class="col-md-12">
									    <label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="8">8
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="9">9
									    </label>
									     <label class="radio-inline">
									      <input type="radio" name="nilai_edit" value="10">10
									    </label>
									</div>
								</div>
		        			</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-sm-4">
		        				<h4>Deadline</h4>
		        			</div>
		        			<div class="col-sm-8">
		        				<input type="text" name="dl_kpim" class="form-control" readonly>
		        			</div>
		        		</div>
		        	</form>
		       	</div>
		        <div class="modal-footer" style="background-color: #6db1ff">
		        	<button type="button" style="font-family: 'Exo 2', sans-serif;" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" style="font-family: 'Exo 2', sans-serif;" name="input"  class="btn btn-primary" onclick="upd_kpim()">Save changes</button>
		        </div>
		    </div>
		</div>
	</div>
	<div class="modal fade" id="modal_hapus" role="dialog" style="padding-top: 100px;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title text-center" id="myModalLabel"><b>Konfirmasi</b></h4>
		        </div>
		        <div class="modal-body" style="background-color: #2372ef; color: white;">
					<h4 class="text-center">Yakin Hapus?</h4>
		        	<form id="form_hapus" class="form-horizontal">
		        		<input type="hidden" name="id_kpim_hps">
		        	</form>
		       	</div>
		        <div class="modal-footer">
		        	<button type="button" style="font-family: 'Exo 2', sans-serif;" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="button" style="font-family: 'Exo 2', sans-serif;" name="input"  class="btn btn-primary" onclick="del_kpim()">Hapus</button>
		        </div>
		    </div>
		</div>
	</div>
	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/moment.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.js"></script>
	<script>
		$(document).ready(function(){
			get_list();

			window.setTimeout(function()
			{
			    $(".alert").fadeIn(1500, function()
			    {
			        $(this).show(); 
			    });
			}, 2000);

			window.setTimeout(function()
			{
			    $(".alert").fadeTo(1500, 0).slideUp(5000, function()
			    {
			        $(this).remove(); 
			    });
			}, 12000);

			$('#pilihdept').selectpicker({});
			$('#pilihdept').change(function(){
                if($('#pilihdept option:selected').val() != '')
                {
                    drop_goals($('#pilihdept option:selected').val());
                }
            });
            $('#konten').change(function(){
                if($('#konten option:selected').val() != '')
                {
                    get_dl($('#konten option:selected').val());
                }
            });

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
		})

		function add_kpim()
		{
			$.ajax({
	            url : "<?php echo site_url('Kpimmingguan/add_kpim')?>",
	            type: "POST",
	            data: $('form').serialize(),
	            dataType: "JSON",
            	success: function(data)
                {
                	if(data.status)
                	{
                		$("#dataTables").dataTable().fnDestroy();
                		get_list();
                		drop_goals(0);
                		$('#form_kpim')[0].reset();
                		$('#pilihdept').selectpicker('val','');
                	}
                	else
                	{
                		var dv = $('<div class="col-sm-12">').append(data.lb_msg).appendTo('#alert_');
                	}
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get save data');
                }
            });
		}

		function upd_kpim()
		{
			$.ajax({
	            url : "<?php echo site_url('Kpimmingguan/upd_kpim')?>",
	            type: "POST",
	            data: $('#form_edit').serialize(),
	            dataType: "JSON",
            	success: function(data)
                {
                	if(data.status)
                	{
                		$("#dataTables").dataTable().fnDestroy()
                		get_list();
                		drop_goals(0);
                		$('#form_edit')[0].reset();
                		$('#pilihdept').selectpicker('val','');
                		$('#modal_edit').modal('hide');
                	}
                	else
                	{
                		var dv = $('<div class="col-sm-12">').append(data.lb_msg).appendTo('#alert_');
                	}
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get save data');
                }
            });
		}

		function del_kpim()
		{
			$.ajax({
	            url : "<?php echo site_url('Kpimmingguan/del_kpim')?>",
	            type: "POST",
	            data: $('#form_hapus').serialize(),
	            dataType: "JSON",
            	success: function(data)
                {
                	if(data.status)
                	{
                		$("#dataTables").dataTable().fnDestroy()
                		get_list();
                		drop_goals(0);
                		$('#form_edit')[0].reset();
                		$('#pilihdept').selectpicker('val','');
                		$('#modal_hapus').modal('hide');
                	}
                	else
                	{
                		var dv = $('<div class="col-sm-12">').append(data.lb_msg).appendTo('#alert_');
                	}
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get save data');
                }
            });
		}		

		function dtables()
      	{
	        $('#dataTables').DataTable({
	          order: [[0, 'desc']],
	        });
      	}

		function get_list()
		{
			$('#tbcontent').empty();
			$.ajax({
	            url : "<?php echo site_url('Kpimmingguan/get_allkpim')?>",
	            type: "GET",
	            dataType: "JSON",
            	success: function(data)
                {
                	for (var i = 0; i < data.length; i++)
                	{
                		var tgl_now = moment().locale('id').format('YYYY-MM-DD');
                		var warna = '';
                		if(data[i]["tgl"] == tgl_now && data[i]["result"] == '')
                		{
                			warna = 'kpim-plan';
                		}
                		else if(data[i]["tgl"] == tgl_now && data[i]["result"] != '')
                		{
                			warna = 'kpim-today';
                		}
                		var tgl_in = Date.parse(data[i]["tgl"]);
                		var tgl_dl = Date.parse(data[i]["deadline"]);
                		var $tr = $('<tr class="'+warna+'">').append(
                			$('<td class="text-center" data-order="'+tgl_in+'">'+data[i]["tgl"]+'</td>'),
                			$('<td class="text-center">'+data[i]["nama_goals"]+'</td>'),
                			$('<td class="text-center">'+data[i]["action"]+'</td>'),
                			$('<td class="text-center">'+data[i]["kendala"]+'</td>'),
                			$('<td class="text-center">'+data[i]["result"]+'</td>'),
                			$('<td class="text-center" data-order="'+tgl_dl+'">'+data[i]["deadline"]+'</td>'),
                			$('<td class="text-center">'+data[i]["usulnilai"]+'</td>'),
                			$('<td class="text-center">'+data[i]["nama_dept"]+'</td>'),
                			$('<td class="text-center"><button type="button" onclick="edit_('+data[i]["id"]+')" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span> <text style="text-transform: capitalize;"> Edit</text></button><button type="button" onclick="hapus_('+data[i]["id"]+')" class="btn btn-default btn-sm" class="btn btn-default" style="text-transform: capitalize;"> <span class="glyphicon glyphicon-trash"></span> Hapus</button></td>')
                		).appendTo('#tbcontent');
                	}
                	dtables();
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax drop bank');
                }
            });
		}

		function drop_goals(id)
        {
            $.ajax({
	            url : "<?php echo site_url('karyawan/getbobot_/')?>"+id,
	            type: "GET",
	            dataType: "JSON",
            	success: function(data)
                {
                    $('#konten').empty();
                    var select = document.getElementById('konten');
                    var option;
                    option = document.createElement('option');
                        option.value = '';
                        option.text = '--- Pilih salah satu ---';
                        select.add(option);
                    for (var i = 0; i < data.length; i++) {
                        option = document.createElement('option');
                        option.value = data[i]["id_bobot"];
                        option.text = data[i]["nama"];
                        select.add(option);
                    }
                    $('#konten').selectpicker({
                        dropupAuto: false
                    });
                    $('#konten').selectpicker('refresh');
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax drop bank');
                }
            });
        }

        function get_dl(id)
        {
        	$.ajax({
	            url : "<?php echo site_url('karyawan/getdl_/')?>"+id,
	            type: "GET",
	            dataType: "JSON",
            	success: function(data)
                {
                	var tglinput = $('[name="tgl"]').val();
                	var dl = (data.sts_bobot != '0')?data.custom_dl:moment(tglinput).add(data.fix_dl,'days').locale('id').format('YYYY-MM-DD');
                   	$('[name="deadline"]').val(dl);
                   	if ($("#deadline").val() > $("#tgl_sekarang").val())
					{
						$("#intime").show(1000);
						$("#overtime").hide(1000);
						$("#ontime").hide(1000);
					}
					if ($("#deadline").val() == $("#tgl_sekarang").val())
					{
						$("#ontime").show(1000);
						$("#overtime").hide(1000);
						$("#intime").hide(1000);
					}
					if ($("#deadline").val() < $("#tgl_sekarang").val())
					{
						$("#overtime").show(1000);
						$("#intime").hide(1000);
						$("#ontime").hide(1000);
					}
					$("#usulnilai").val('');
					$("input[type='radio'][name='usulnilai']" ).prop('checked', false);
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax drop bank');
                }
            });
        }

        function edit_(id)
        {
        	$.ajax({
	            url : "<?php echo site_url('Kpimmingguan/get_kpim/')?>"+id,
	            type: "GET",
	            dataType: "JSON",
            	success: function(data)
                {
                	$('[name="id_kpim"]').val(data.id);
                	$('[name="tgl_kpim"]').val(data.tgl);
                	$('[name="dept_kpim"]').val(data.nama_dept);
                	$('[name="goals_kpim"]').val(data.nama_goals);
                	$('[name="desc_kpim"]').val(data.action);
                	$('[name="kendala_kpim"]').val(data.kendala);
                	$('[name="res_kpim"]').val(data.result);
                	$('[name="dl_kpim"]').val(data.deadline);
                	if (data.deadline > data.tgl)
					{
						$("#in_").show(1000);
						$("#over_").hide(1000);
						$("#on_").hide(1000);
					}
					if (data.deadline == data.tgl)
					{
						$("#on_").show(1000);
						$("#over_").hide(1000);
						$("#in_").hide(1000);
					}
					if (data.deadline < data.tgl)
					{
						$("#over_").show(1000);
						$("#in_").hide(1000);
						$("#on_").hide(1000);
					}
					$("input[type='radio'][name='nilai_edit']" ).prop('checked', false);
					$('[name="nilai_edit"][value="'+data.usulnilai+'"]').prop('checked', true);
                	$('#modal_edit').modal('show');
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax drop bank');
                }
            });
        }

        function hapus_(id)
        {
        	$('[name="id_kpim_hps"]').val(id);
        	$('#modal_hapus').modal('show');
        }
	</script>
</body>
</html>