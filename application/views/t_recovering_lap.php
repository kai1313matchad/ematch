
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Laporan Tahapan Recovering | Quality Control Application</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Aplikasi Quality Control" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_qc.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>

<!-- //font -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>


<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<!-- lokasi -->
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfXY2npHNq_B_GVvTL0c6fJ-iL2tdN3Ug&libraries=places&sensor=false"></script>
<!-- lokasi end -->



<!-- UNTUK DATETIMEPICKER -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<!-- UNTUK DATETIMEPICKER SELESAI-->

<!-- untuk datatable -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">


</head>
<body >
	<!-- banner -->
	<div class="banner-1 jarallax">
		<div class="agileinfo-dot-1">
			<div class="w3ls-banner-info-bottom">
				<div class="container">
					<div class="banner-address" style="padding-bottom: 5px">
						<!-- <div class="col-md-4 banner-address-left">
							<p><i class="fa fa-map-marker" aria-hidden="true"></i> Taman Street No.15
Sidoarjo - East Java, 61257</p>
						</div> -->
						<!-- <div class="col-md-3 banner-address-left">
							<p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:marketing@tritunggalmetalworks.com">marketing@tritunggalmetalworks.com</a></p>
						</div> -->
						<div class="col-md-3 banner-address-left">
							<p><i class="fa fa-phone" aria-hidden="true"></i> Head Office (62-31) 7870870 - Sidoarjo</p>
						</div>
						<div class="col-md-3 banner-address-left">
							<p><i class="fa fa-phone" aria-hidden="true"></i> Branch Office (62-21) 8291734 - Jakarta</p>
						</div>
						<div class="col-md-2 agileinfo-social-grids" style="color: white">
							
							<script>
							var d=new Date();
							var weekday=new Array("Ahad","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
							var monthname=new Array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
							document.write(weekday[d.getDay()] + ", ");
							document.write(d.getDate() + " " );
							document.write(monthname[d.getMonth()] + " ");
							document.write(d.getFullYear());
							</script>
							
						</div>
						<div class="col-md-2 agileinfo-social-grids">
						<iframe frameborder='0' height='25' id='sidebar-gadget1' name='sidebar-gadget1' src='//www-blogger-opensocial.googleusercontent.com/gadgets/ifr?url=http://www.dwebresources.com/widgets/google_clock.xml&container=blogger&view=default&lang=in&country=ALL&sanitize=0&v=be64a465e8b03bec&libs=com.google.gadgets.analytics:core&parent=http://gilangkencure.blogspot.com/&up_mode=1&up_bg=%23000000&up_color=%2388ECFB&up_font&up_bold=1&mid=1#up_bold=1&up_gmt=99&up_color=%2388ECFB&up_font&up_bg=%ff66ff&up_mode=1&st=e%3DAFlCd0XxtNliwM4RXgodqJ%252FE4n8xUWmGRgUuTN1FHI0w8yOXHi%252Fi48HACtcLEygrIux1ukdUmO6E%252BsSbz8la9Yr1zm8reTYZ%252BVgb4sa2V0gexkhErvEsxmDWVTYmy9%252FU%252BZwKhOCCbp9b%26c%3Dblogger&rpctoken=-7441248477833140870' style='display: block;' width='100px'></iframe>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<div class="header">
				<div class="container">
					<div class="header-top-grids">
						<div class="agileits-logo">
							<!-- <a href="#"><span style="font-size: 33px; color:white; font-family:inherit; font-weight: bold; ">Quality Control Application</span></a> -->
							<h3><a href="#">Quality Control Application</a></h3>
						</div>
						<div class="top-nav">
							<nav class="navbar navbar-default">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
									<nav>
										<ul class="nav navbar-nav">
											<li><a href="<?php echo base_url() ?>qcindex">Home</a></li>
											<!-- <li><a href="about.html">About</a></li>
											<li><a href="gallery.html">Gallery</a></li> -->
											<li><a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recovering <span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a class="hvr-bounce-to-bottom" href="<?php echo base_url() ?>recovering">Input Recovering</a></li>
													<li><a class="hvr-bounce-to-bottom" href="<?php echo base_url() ?>recovering/terkirim">Laporan Terkirim</a></li>          
												</ul>
											</li>

											<?php 

											$find   = '7';
											$pos = strpos($this->session->userdata('id_dept'), $find);

											if (($this->session->userdata('level') != '2' AND $this->session->userdata('level') != '11' AND $this->session->userdata('level') != '12') 

											OR

											($this->session->userdata('level') != 1 AND $this->session->userdata('level') != 11 AND $this->session->userdata('level') != 12 AND $this->session->userdata('level') != 10 AND $this->session->userdata('level') != 5 AND ($pos !== false)))

											{ ?>


											<li><a href="<?php echo base_url() ?>recovering/laporan">Laporan Recovering</a></li>

											<!-- <li><a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a class="hvr-bounce-to-bottom" href="<?php echo base_url() ?>recovering/laporan">Laporan Recovering</a></li>
												</ul>
											</li> -->

											<?php } ?>
											
											<li><a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('username'); ?> <span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a class="hvr-bounce-to-bottom" href="<?php echo base_url() ?>login/logout">Logout</a></li>
												</ul>
											</li>
										</ul>
									</nav>
								</div>
								<!-- /.navbar-collapse -->
							</nav>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- contact -->
	<div class="contact">
		<div class="container">
			<h3 class="agileinfo_header"><span style="color: maroon">Laporan</span> Tahapan Recovering</h3>
			<p class="agileits_dummy_para">Dapat melihat seluruh laporan langsung atau lihat laporan berdasarkan periode tanggal</p>
			<br><br>
			

			<form id="form_laporan" action="<?php echo base_url();?>recovering/laporantgl" method="POST">
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

					<div class="col-sm-6 text-center" style="padding-bottom: 15px" > <button type="submit" name="input"  class="btn btn-danger col-sm-12"><span style="color: white" class="glyphicon glyphicon-zoom-in"></span> Tampilkan</button>
					</div>
				</div>
			</form>

			
			<?php if(isset($start) AND ($end)){ ?>
			<center><h3>
			Periode antara tanggal <?php echo date('d-m-Y', strtotime($start)) ?> sampai <?php echo date('d-m-Y', strtotime($end)) ?>
			</h3></center>
			<br>		
			<a href="<?php echo base_url() ?>recovering/laporan"><button class="btn btn-primary"><span style="color: white" class="glyphicon glyphicon-arrow-left"></span> Tampilkan Semua Laporan</button></a><br><br>
			<?php } ?>


			

			<!-- mualai table -->
			
			<div class="row table-responsive">
					<table id="dataTables" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
				        <thead>
				            <t>
				                <th style="text-align: center; color: black">NO.</th>
				                <th style="text-align: center; color: black">ID Recovering</th>
				                <th style="text-align: center; color: black">Tanggal dan Jam</th>
				                <th style="text-align: center; color: black">Jenis Reklame</th>
				                <th style="text-align: center; color: black">Karyawan</th>
				                <th style="text-align: center; color: black">Perusahaan</th>
				                <th style="text-align: center; color: black">Vendor</th>
				                <th style="text-align: center; color: black">Siang/Malam</th>
				                <th style="text-align: center; color: black">Alamat</th>
				                <th style="text-align: center; color: black; padding: 100px">Alamat Via</th>
				                <th style="text-align: center; color: black">Keterangan</th>
				                <th style="text-align: center; color: black; ">Lihat Detail</th>
				                
				           
				                
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
											<!--<td style="text-align: center; color: black"><?php echo $u->id_karyawan ?></td>!-->
											<td style="text-align: center; color: black"><?php echo $no++ ?></td>
											<td style="text-align: center; color: black"><?php echo $u->id_recovering ?></td>
											<!-- <td style="text-align: center; color: black"><?php echo $u->nama_karyawan ?></td> -->
											<td style="text-align: center; color: black; width: 170px "><?php 
											echo date('d-m-Y, H:i', strtotime($u->tanggal ))?></td>
											<td style="text-align: center; color: black"><?php echo $u->reklame ?></td>
											<td style="text-align: center; color: black "><?php echo $u->nama_karyawan ?></td>
											<td style="text-align: center; color: black"><?php echo $u->perusahaan ?></td>					
											<td style="text-align: center; color: black"><?php echo $u->vendor ?></td>
											<td style="text-align: center; color: black"><?php echo $u->status_foto ?></td>
											<td style="text-align: center; color: black"><?php echo $u->alamat ?></td>
											<td style="text-align: center; color: black"><?php echo $u->jenis_alamat?></td>
											<td style="text-align: center; color: black"><?php echo $u->ket?></td>
											<td style="text-align: center; color: black;">
												<form id="Detail" action="<?php echo base_url();?>recovering/detail/<?php echo $u->id_recovering ?>" method="POST">
													<!-- <input type="text" name="id_recovering" style="visibility: hidden;" value="<?php echo $u->id_recovering ?>"> -->
												<center><button type="submit" class="btn btn-primary">Detail</button></center>
												</form>

												<!-- mulai fungsi hapus laporan -->

												<?php if ($this->session->userdata('level') == 1) { ?>			
												<br>
												<button data-toggle="modal" data-target="#modalHapus<?= $u->id_recovering ?>" type="button" class="btn btn-danger btn-sm col-md-12">
										        	<span  style="color: white" class="glyphicon glyphicon-trash"></span> Hapus
										        </button>

										        <?php } ?>

												<!-- Modal hapus -->
												<div class="modal fade" id="modalHapus<?php echo $u->id_recovering ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
												  <div class="modal-dialog modal-lg" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title" id="myModalLabel">Konfirmasi hapus laporan</h4>
												      </div>
												      <div class="modal-body" style="background-color: #ce1e1e; color: white">
												        <h4>Yakin hapus laporan beserta foto-fotonya?</h4>
												      </div>
												      <div class="modal-footer">
															<form id="form_kpim" method="POST" action="<?php echo base_url();?>recovering/hapuslaporan/<?php echo $u->id_recovering?>">
														      	<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" class="btn btn-primary">Hapus</button>
															</form>
												      </div>
												    </div>
												  </div>
												</div>
												<!-- modal selesai -->
												<!-- selesai fungsi hapus laporan -->
											</td>

										</tr>
										
									<?php } } ?>
									</tbody>
									
					</table>
			</div>

			<!-- selesai table -->
		

		</div>
	</div>
	<!-- //contact -->
<!-- footer -->
<div class="footer">
		<div class="container">
			<h2 class="agileinfo_header">Laporan Tahapan <span>Recovering</span></h2>
				<p class="agileits_dummy_para">Halaman laporan Recovering.</p>

		</div>
	</div>
<!-- //footer -->
	<!-- jarallax -->
	<script src="<?php echo base_url(); ?>assets/js/jarallax.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	<!-- //jarallax -->

	<!-- untuk scroll -->
	<script>
	$(document).ready(function(){

		// hide #trik_scroll first
		$("#trik_scroll").hide();
		
		// fade in #trik_scroll
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('#trik_scroll').fadeIn();
				} else {
					$('#trik_scroll').fadeOut();
				}
			});

			// scroll body to 0px on click
			$('#trik_scroll a').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		});

	});
	</script>
	<style>
	#trik_scroll {
	position:fixed;_position:absolute;bottom:20px; right:12px;
	clip:inherit;
	_bottom:expression(document.documentElement.scrollTop+
	document.documentElement.clientHeight-this.clientHeight);
	_left:expression(document.documentElement.scrollLeft+
	document.documentElement.clientWidth - offsetWidth); -webkit-transition-duration: 0.3s;   -moz-transition-duration: 0.3s;   -o-transition-duration: 0.3s; }
	#trik_scroll:hover {
	position:fixed;_position:absolute; bottom:23px; right:12px;
	clip:inherit;
	_bottom:expression(document.documentElement.scrollTop+
	document.documentElement.clientHeight-this.clientHeight);
	_left:expression(document.documentElement.scrollLeft+
	document.documentElement.clientWidth - offsetWidth);}
	</style>
	<div id="trik_scroll"><a href="#"><img src="https://cdn2.iconfinder.com/data/icons/social-buttons-2/512/back_on_top-512.png" border="0" height="40"/></a></div>
	<!-- untuk scroll selesai-->

	<!-- UNTUK DATETIMEPICKER -->
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
	<script src="<?php echo base_url();?>assets/js/moment.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
	<!-- UNTUK DATETIMEPICKER SELESAI-->

	<!-- untuk datatable -->
	<!-- <script src="//code.jquery.com/jquery-1.12.0.min.js"></script> -->
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
		$('#dataTables').DataTable();
	} );
	</script>




	
</body>	

	

</html>