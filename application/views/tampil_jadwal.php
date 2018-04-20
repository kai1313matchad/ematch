<!DOCTYPE html>
<html lang="en">
<head>

<title>KPIM Online - Jadwal Pengumpulan Terakhir KPIM Plan Next Week</title>
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


</head>
<body class="keempat semua">

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
	               <!--  <li><a href="<?php echo base_url(); ?>kpimmingguan">KPIM Mingguan</a></li>
	                <li><a href="<?php echo base_url(); ?>reportsub">Report Subordinate</a></li> -->
	                <li class="active"><a href="#">Jadwal Pengumpulan Terakhir KPIM Plan Next Week</a></li>

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
	                                            <a href="<?php echo base_url();?>login/logout" class="btn btn-danger btn-block" style="margin: 0px 25px ">Logout</a>
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
		<h1 style="padding-top: 20px; color: green"><center>Jadwal Pengumpulan Terakhir KPIM Plan Next Week</center></h1><br><br>

		<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;}
		.tg td{font-size:14px;padding:10px 5px;border-style:solid;border-width:1.5px;overflow:hidden;word-break:normal;}
		.tg th{font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
		.tg .tg-yzt1{background-color:#efefef;vertical-align:top}
		.tg .tg-mtwr{background-color:#bbdaff;vertical-align:top}
		.tg .tg-ds4c{background-color:#000000;color:#ffffff;vertical-align:top; text-align: center;}
		.tg .tg-yw4l{vertical-align:top}
		.tg .tg-2s1i{background-color:#fd6864;vertical-align:top}
		.tg .tg-4hfa{background-color:#fffe65;vertical-align:top}
		.tg .tg-r61r{background-color:#67fd9a;vertical-align:top}
		.tg .tg-dza{background-color:#e6a6ed;vertical-align:top}
		</style>
	<div class="table-responsive"  style="text-align: center;">
  		<table class="table tg">
		  <tr>
		    <th class="tg-ds4c" style="width:60px">NO</th>
		    <th class="tg-ds4c">Dept</th>
		    <th class="tg-ds4c">Senin</th>
		    <th class="tg-ds4c">Selasa</th>
		    <th class="tg-ds4c">Rabu</th>
		    <th class="tg-ds4c">Kamis</th>
		    <th class="tg-ds4c">Jum'at</th>
		    <th class="tg-ds4c">Sabtu</th>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">1</td>
		    <td class="tg-yw4l">HC &amp; GA</td>
		    <td class="tg-2s1i" style="width: 110px"></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa"></td>
		    <td class="tg-r61r"></td>
		    <td class="tg-yzt1"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">2</td>
		    <td class="tg-yw4l">IA</td>
		    <td class="tg-2s1i" style="width: 110px"></span></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa"></td>
		    <td class="tg-r61r"></td>
		    <td class="tg-yzt1"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">3</td>
		    <td class="tg-yw4l">Marketing</td>
		    <td class="tg-2s1i" style="width: 110px"></span></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa"></td>
		    <td class="tg-r61r"></td>
		    <td class="tg-yzt1"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">4</td>
		    <td class="tg-yw4l">BD</td>
		    <td class="tg-2s1i"></td>
		    <td class="tg-mtwr" style="width: 110px"></span></td>
		    <td class="tg-4hfa"></td>
		    <td class="tg-r61r"></td>
		    <td class="tg-yzt1"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">5</td>
		    <td class="tg-yw4l">FA</td>
		    <td class="tg-2s1i"></td>
		    <td class="tg-mtwr" style="width: 110px"></span></td>
		    <td class="tg-4hfa"></td>
		    <td class="tg-r61r"></td>
		    <td class="tg-yzt1"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">6</td>
		    <td class="tg-yw4l">SITAC &amp; CRTV</td>
		    <td class="tg-2s1i"></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa" style="width: 110px"></span></td>
		    <td class="tg-r61r"></td>
		    <td class="tg-yzt1"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">7</td>
		    <td class="tg-yw4l">IT</td>
		    <td class="tg-2s1i"></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa" style="width: 110px"></span></td>
		    <td class="tg-r61r"></td>
		    <td class="tg-yzt1"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">8</td>
		    <td class="tg-yw4l">LOGISTIC</td>
		    <td class="tg-2s1i"></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa" style="width: 110px"></span></td>
		    <td class="tg-r61r"></td>
		    <td class="tg-yzt1"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">9</td>
		    <td class="tg-yw4l">KCT</td>
		    <td class="tg-2s1i"></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa"></td>
		    <td class="tg-r61r" style="width: 110px"></td>
		    <td class="tg-yzt1"></td>
		    <td class="tg-dza"><span class="glyphicon glyphicon-ok"></span></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">10</td>
		    <td class="tg-yw4l">PAT</td>
		    <td class="tg-2s1i"></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa"></td>
		    <td class="tg-r61r"></td>
		    <td class="tg-yzt1" style="width: 110px"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">11</td>
		    <td class="tg-yw4l">Sekretaris</td>
		    <td class="tg-2s1i"></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa"></td>
		    <td class="tg-r61r"></td>
		    <td class="tg-yzt1" style="width: 110px"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">12</td>
		    <td class="tg-yw4l">PRO</td>
		    <td class="tg-2s1i"></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa"></td>
		    <td class="tg-r61r" style="width: 110px"></td>
		    <td class="tg-yzt1"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">13</td>
		    <td class="tg-yw4l">Jakarta</td>
		    <td class="tg-2s1i"></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa"></td>
		    <td class="tg-r61r"></td>
		    <td class="tg-yzt1" style="width: 110px"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		  <tr>
		    <td class="tg-ds4c" style="width:60px">14</td>
		    <td class="tg-yw4l">WIPERINDO</td>
		    <td class="tg-2s1i"></td>
		    <td class="tg-mtwr"></td>
		    <td class="tg-4hfa"></td>
		    <td class="tg-r61r" style="width: 110px"></td>
		    <td class="tg-yzt1"><span class="glyphicon glyphicon-ok"></span></td>
		    <td class="tg-dza"></td>
		  </tr>
		</table>
	</div>
		<div class="row">
			<div class="col-sm-12">
			<button class="btn btn-primary" style="margin-top:5px; font-family: 'Exo 2', sans-serif;" onclick="history.go(-1);"><span class="glyphicon glyphicon-arrow-left"></span> Back </button>
			<a href="<?php echo base_url(); ?>home" class="btn btn-primary" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-home"></span> Home</a>
			<a href="<?php echo base_url(); ?>kpimmingguan"class="btn btn-primary" style="margin-top:5px; font-family: 'Exo 2', sans-serif;">KPIM Mingguan</a>
			<a href="<?php echo base_url(); ?>reportsub"class="btn btn-warning" style="margin-top:5px; font-family: 'Exo 2', sans-serif;">Report Subordinate</a></div>
		</div>


		<div class="outputClass" id="outputdiv"></div>
		<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url();?>assets/js/moment.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
	</div>
</div>


</body>
</html>
