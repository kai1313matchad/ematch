
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Detail Tahapan Tiang | Quality Control Application</title>
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




<!-- mulai untuk upload -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/basic.min.css') ?>">
<script type="text/javascript" src="<?php echo base_url('assets/dropzone.min.js') ?>"></script>
<style type="text/css">
.dropzone {
	/*margin-top: 100px;*/
	border: 2px dashed #0087F7;
}

.fotoku{
width:290px;
height: 250px;
-webkit-transition: all 1s ease-in-out;
  	-moz-transition: all 1s ease-in-out;
  	-o-transition: all 1s ease-in-out;
  	transition: all 1s ease-in-out;
/*overflow: hidden;*/

}



.fotoku img{
width:100%;
height: 100%;
overflow: hidden;
	-webkit-transition: all 0.2s ease-in-out;
  	-moz-transition: all 0.2s ease-in-out;
  	-o-transition: all 0.2s ease-in-out;
  	transition: all 0.2s ease-in-out;
}

.margin80{
	margin-bottom: 50px
}

.fotoku img:hover{
		opacity: 1;
	-webkit-animation: flash 1.5s;
	animation: flash 1.5s;
}
@-webkit-keyframes flash {
	0% {
		opacity: .4;
	}
	100% {
		opacity: 1;
	}
}
@keyframes flash {
	0% {
		opacity: .4;
	}
	100% {
		opacity: 1;
	}
}

.album-besar{
width:300px;
float:left;
}
.sub-album{
width:300px;

float:left;
padding:5px;
margin:5px;
text-align:center;
	/*-moz-border-radius:4px;
	-webkit-border-radius: 4px;*/
	
}

.borderfoto{
	border:1px dashed gray;
}


#lightbox .modal-content {
    display: inline-block;
    text-align: center;   
}

#lightbox .close {
    opacity: 1;
    color: rgb(255, 255, 255);
    background-color: rgb(25, 25, 25);
    padding: 5px 8px;
    border-radius: 30px;
    border: 2px solid rgb(255, 255, 255);
    position: absolute;
    top: -15px;
    right: -55px;
    
    z-index:1032;
}

@media (max-width: 768px){
#lightbox{
 padding-top: 150px;
}


}

</style>
<!-- selesai untuk upload -->


<style>
.utkhilang {
    display: none;
}

.enternya{
	padding-top: 20px;
}
.enternya2{
	padding-top: 25px;
}
.enternya3{
	padding-top: 65px;
}
/*.enternya4{
	padding-top: 243px;
}*/
</style>
<!-- untuk hilangkan tulisan download -->

</head>
<body >
	<!-- banner -->
	<div class="banner-tiang jarallax">
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
											<li><a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tiang <span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a class="hvr-bounce-to-bottom" href="<?php echo base_url() ?>tiang">Input Tiang</a></li>
													<li><a class="hvr-bounce-to-bottom" href="<?php echo base_url() ?>tiang/terkirim">Laporan Terkirim</a></li>          
												</ul>
											</li>

											<?php if ($this->session->userdata('level') != '2' AND $this->session->userdata('level') != '11' AND $this->session->userdata('level') != '12') { ?>


											<li><a href="<?php echo base_url() ?>tiang/laporan">Laporan Tiang</a></li>

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
			<h3 class="agileinfo_header">Detail Tahapan  <span>Tiang</span></h3>
			<p class="agileits_dummy_para"><a href="<?php echo base_url(); ?>tiang/laporan"><button class="btn btn-danger" style="width: 200px"><span style="color: white" class="glyphicon glyphicon-arrow-left"></span> Kembali</button></a></p>
			<br><br>
		<div id="ygdiprint">

			<?php 
				$no = 1;
				
				foreach($table as $posting){ 
				?>
				<?php $tgl = $posting->tanggal ;?>
					<hr>
					<!-- <div class="col-md-12">
					<button class="btn btn-primary" style="cursor:default;"><?php echo $no++?> )</button>	
					</div> -->

					<!-- tiang -->
					<?php $data_foto = $this->db->get_where('foto_tiang', array('id_posting' => $posting->id_tiang, 'jenis_foto' => 'Tiang'))->result(); ?>
				

					<!-- pengelasant -->
					<?php $data_fotopengelasant = $this->db->get_where('foto_tiang', array('id_posting' => $posting->id_tiang, 'jenis_foto' => 'Pengelasan Tiang'))->result(); ?>
					

					<!-- pengecetant -->
					<?php $data_fotopengecetant = $this->db->get_where('foto_tiang', array('id_posting' => $posting->id_tiang, 'jenis_foto' => 'Pengecetan Tiang'))->result(); ?>
					

					<!-- penyambungan tiang -->
					<?php $data_fotopenyambungant = $this->db->get_where('foto_tiang', array('id_posting' => $posting->id_tiang, 'jenis_foto' => 'Penyambungan Tiang'))->result(); ?>


					<!-- untuk falidasi edit tidak bisa jika sdh ada foto -->
					<!-- <?php if (!empty($data_foto || $data_foto100 || $data_foto150 )){ ?>
					<script>
						$(document).ready(function(){						    
						    $("#editku").click(function(){
						        alert("Sudah ada foto yang diupload, Hapus dulu foto jika ingin edit laporan");
						        document.getElementById("editku").setAttribute("disabled", "");
						    });
						    return false;
						});
			  		</script>
					<?php } ?> -->
					<!-- untuk falidasi edit tidak bisa jika sdh ada foto -->

					<div class="col-md-12">

						<center><b>
							<span style="font-size: 25px; text-decoration: underline;">BERITA ACARA PENYERAHAN PEKERJAAN</span><br>
							<span style="font-weight: bold;">
								No.TT/<?php echo date('mY')?>/<?php echo $posting->id_tiang ?>
							</span>
							<h3><?php echo $posting->reklame ?></h3>
						</b></center>
						<center><h4 style=" text-transform: capitalize;"><?php echo $posting->alamat ?> ( Via : <?php echo $posting->jenis_alamat ?> )</h4>
						
						</center>

						<h5>Dipost oleh <?php echo $posting->nama_karyawan ?>	</h5>
					<div>
						<span class="glyphicon glyphicon-calendar"></span> <?php echo date('d-M-Y', strtotime($tgl)); ?>
						<span class="glyphicon glyphicon-time"></span> <?php echo date('H:i:s', strtotime($tgl)); ?>
					</div>
					<h4><text style="color: #0b3789">Perusahaan &nbsp:&nbsp <?php echo $posting->perusahaan ?></text></h4>
					<?php if(!empty($posting->vendor)){ ?>
					<h4><text style="color: #0b3789">Vendor  &nbsp  &nbsp  &nbsp  &nbsp  &nbsp:&nbsp <?php echo $posting->vendor ?></text></h4>
					<?php } ?>
					<h4><text style="color: #0b3789">Kondisi Foto :&nbsp <?php echo $posting->status_foto ?></text></h4>					
					<!-- <h4><text style="color: #0b3789">Jenis Rekalame : <?php echo $posting->reklame ?></text></h4>
					<h4 style=" text-transform: capitalize;"><text style="color: #0b3789; ">Alamat : <?php echo $posting->alamat ?> ( Via : <?php echo $posting->jenis_alamat ?> )</text></h4> -->
					<p style="font-style: italic;">Keteragan : <?php echo $posting->ket ?></p>
						

						<input type="text" name="alamate" id="alamate" style="visibility: hidden;" value="<?php echo $posting->alamat ?>">
						
						<!-- <div class="row" style="margin-bottom: 5px">
							<div class="col-md-4">
								<button data-toggle="modal" style="height: 50px; color: white; background-color: #184169"" data-target="#modalFoto<?php echo $posting->id_tiang ?>" type="button" class="btn btn-sm form-control">
						        <span  style="color: white" class="glyphicon glyphicon-plus-sign"></span> Tambah Foto 50 M
						        </button>
					        </div>

					        <div class="col-md-4">
						        <button data-toggle="modal" style="height: 50px; color: white; background-color: #13314D" " data-target="#modalFoto100<?php echo $posting->id_tiang ?>" type="button" class="btn btn-sm form-control">
						        <span  style="color: white" class="glyphicon glyphicon-plus-sign"></span> Tambah Foto 100 M
						        </button>
					    	</div>

					        <div class="col-md-4">
						        <button data-toggle="modal" style="height: 50px; color: white; background-color: #121C25" data-target="#modalFoto150<?php echo $posting->id_tiang ?>" type="button" class="btn btn-sm form-control">
						        <span  style="color: white" class="glyphicon glyphicon-plus-sign"></span> Tambah Foto 150 M
						        </button>
					    	</div>
					    </div> -->

					        
					        
					    <!-- <div class="row">
					        <div class="col-md-6">
								<button data-toggle="modal" data-target="#myModal<?php echo $posting->id_tiang ?>" id="editku" type="button" class="btn btn-warning btn-sm form-control">
						        <span  style="color: white" class="glyphicon glyphicon-edit"></span> Edit
						        </button>
					        </div>

					        <div class="col-md-6">
						        <button data-toggle="modal" data-target="#modalHapus<?php echo $posting->id_tiang ?>" type="button" class="btn btn-danger btn-sm form-control">
						        <span  style="color: white" class="glyphicon glyphicon-trash"></span> Hapus
						        </button>
					        </div>
					        <br><br>
				        </div> -->
						<!-- <hr> -->
						<div style="border: dashed 1px gray"></div>
						<br>
					</div>



					<!-- untuk menampilkan data foto -->
					<!-- <div class="col-md-12"> -->


					<div class="row">

					<?php if (!empty($data_foto)){ ?>	
					<div class="col-md-12">
					<h3>Foto Tiang :</h3>
					</div>				

					<?php } ?>

					<?php
						foreach($data_foto as $foto) { ?>

						

						<span class="album-besar sub-album borderfoto">
								
							<a href="#" data-toggle="modal" data-target="#lightbox">	
							<div class="fotoku">
							<img class="img-responsive shine" src="<?php echo base_url() ?>/assets/upload-foto/tiang/<?= $foto->nama_foto ?>">
							</div>
							</a>

							<div class="row hilangkan">
								<div class="col-md-6">
								<a href="<?php echo base_url().'tiang/lakukan_download/'.$foto->nama_foto ?>"><button class="btn btn-primary form-control" style="margin-top: 5px">Download</button></a>
								</div>
								<div class="col-md-6">
								<a href="<?php echo base_url().'tiang/lakukan_download_asli/'.$foto->token ?>"><button class="btn btn-warning form-control" style="margin-top: 5px">Download Asli</button></a>
								</div>
							</div>

							

							
						</span>
						<!-- <div style="color: red; font-size: 55px"><?= $foto->nama_foto ?></div> -->
						

						
					<?php
						}
					?>
					</div>

					<div class="row" style="border-top: 1px solid black">

					<?php if (!empty($data_fotopengelasant)){ ?>	
					<div class="enter1"></div>
					<div class="col-md-12 enter">
						<h3>Foto Pengelasan Tiang :</h3>
					</div>				

					<?php } ?>

							<?php
								foreach($data_fotopengelasant as $foto) { ?>


						<span class="album-besar sub-album borderfoto">
								
							<a href="#"  data-toggle="modal" data-target="#lightbox">	
							<div class="fotoku">
							<img class="img-responsive shine" src="<?php echo base_url() ?>/assets/upload-foto/tiang/<?= $foto->nama_foto ?>">
							</div>
							</a>

							<div class="row hilangkan">
								<div class="col-md-6">
								<a href="<?php echo base_url().'tiang/lakukan_download/'.$foto->nama_foto ?>"><button class="btn btn-primary form-control" style="margin-top: 5px">Download</button></a>
								</div>
								<div class="col-md-6">
								<a href="<?php echo base_url().'tiang/lakukan_download_asli/'.$foto->token ?>"><button class="btn btn-warning form-control" style="margin-top: 5px">Download Asli</button></a>
								</div>
							</div>

							
					        
						</span>
						<!-- <div style="color: red; font-size: 55px"><?= $foto->nama_foto ?></div> -->
						

						
					<?php
						}
					?>
					</div>
					<!-- untuk menampilkan foto 100 M selesai -->

					<!-- untuk menampilkan foto 150 mulai -->
					<div class="row" style="border-top: 1px solid black;">

					<?php if (!empty($data_fotopengecetant)){ ?>
					<div class="enter4"></div>	
					<div class="col-md-12">
					<h3>Foto Pengecetan Tiang :</h3>
					</div>				

					<?php } ?>

					<?php
						foreach($data_fotopengecetant as $foto) { ?>


						<span class="album-besar sub-album borderfoto">
								
							<a href="#" data-toggle="modal" data-target="#lightbox">	
							<div class="fotoku">
							<img class="img-responsive shine" src="<?php echo base_url() ?>/assets/upload-foto/tiang/<?= $foto->nama_foto ?>">
							</div>
							</a>

							<div class="row hilangkan">
								<div class="col-md-6">
								<a href="<?php echo base_url().'tiang/lakukan_download/'.$foto->nama_foto ?>"><button class="btn btn-primary form-control" style="margin-top: 5px">Download</button></a>
								</div>
								<div class="col-md-6">
								<a href="<?php echo base_url().'tiang/lakukan_download_asli/'.$foto->token ?>"><button class="btn btn-warning form-control" style="margin-top: 5px">Download Asli</button></a>
								</div>
							</div>
					        
						</span>
						

						
					<?php
						}
					?>
					</div>
					<!-- untuk menampilkan foto 150 M selesai -->

					<div class="row" style="border-top: 1px solid black">
					<?php if (!empty($data_fotopenyambungant)){ ?>	
					<div class="enter5"></div>
					<div class="col-md-12">
					<h3>Foto Penyambungan Tiang :</h3>
					</div>				

					<?php } ?>

					<?php
						foreach($data_fotopenyambungant as $foto) { ?>


						<span class="album-besar sub-album borderfoto">
								
							<a href="#" data-toggle="modal" data-target="#lightbox">	
							<div class="fotoku">
							<img class="img-responsive shine" src="<?php echo base_url() ?>/assets/upload-foto/tiang/<?= $foto->nama_foto ?>">
							</div>
							</a>

							<div class="row hilangkan">
								<div class="col-md-6">
								<a href="<?php echo base_url().'tiang/lakukan_download/'.$foto->nama_foto ?>"><button class="btn btn-primary form-control" style="margin-top: 5px">Download</button></a>
								</div>
								<div class="col-md-6">
								<a href="<?php echo base_url().'tiang/lakukan_download_asli/'.$foto->token ?>"><button class="btn btn-warning form-control" style="margin-top: 5px">Download Asli</button></a>
								</div>
							</div>
					        
						</span>
					<?php
						}
					?>
					</div>

					

					<!-- untuk lightbox -->
						<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						    <div class="modal-dialog">
						        
						        <div class="modal-content pull-right">
						        	<button class="btn btn-warning" style="position:fixed;z-index:999; border-color: white; border:solid; border-radius: 50%; right: -3%; top: -15px;"  data-dismiss="modal">X</button>
						            <div class="modal-body">
						            	<div class="col-md-12">
						            	
						                <img style="width: 100%; height: auto; padding: 0px 0px 10px 0px" src="" alt="" />
						                </div>

						                



						                

						                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
						            </div>
						        </div>
						    </div>
						</div>

						<script>
							$(document).ready(function() {
						    var $lightbox = $('#lightbox');
						    
						    $('[data-target="#lightbox"]').on('click', function(event) {
						        var $img = $(this).find('img'), 
						            src = $img.attr('src'),
						            alt = $img.attr('alt'),
						            css = {
						                'maxWidth': $(window).width() - 100,
						                'maxHeight': $(window).height() - 100
						            };
						    
						        $lightbox.find('.close').addClass('hidden');
						        $lightbox.find('img').attr('src', src);
						        $lightbox.find('img').attr('alt', alt);
						        $lightbox.find('img').css(css);
						        // $lightbox.find('a').attr('href', src);
						    });
						    
						    $lightbox.on('shown.bs.modal', function (e) {
						        var $img = $lightbox.find('img');
						            
						        $lightbox.find('.modal-dialog').css({'width': $img.width()});
						        $lightbox.find('.close').removeClass('hidden');
						    });
						});
						</script>
						<!-- untuk lightbox selesai-->


				<br>
				<script>
				var d=new Date();
				var weekday=new Array("Ahad","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
				var monthname=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
				document.write(weekday[d.getDay()] + ", ");
				document.write(d.getDate() + " " );
				document.write(monthname[d.getMonth()] + " ");
				document.write(d.getFullYear());
				</script>
				<br>
				<div class="row" style="padding-top: 20px">
					<div class="col-xs-4 text-center">
						Supplier,
						<br>
						<br>
						<br>
						<br>
						
						<span id="namasup"></span>
						<input type="text" class="form-control hilangkan" id="isinamasup" placeholder="Nama Terang">
						<div style="border: solid 1px #696969"></div>
						<span id="jabsup"></span>
						<input type="text" class="form-control hilangkan" id="isijabsup" placeholder="Jabatan">

						
					</div>

					<div class="col-xs-4 col-xs-offset-4 text-center">
						Diterima,
						<br>
						<br>
						<br>
						<br>
						<span id="namanerima"></span>
						<input type="text" class="form-control hilangkan" id="isinamanerima" placeholder="Nama Terang">
						<div style="border: solid 1px #696969"></div>
						<span id="jabnerima"></span>
						<input type="text" class="form-control hilangkan" id="isijabnerima" placeholder="Jabatan">
					</div>
				</div>

				<div class="panel panel-default" style="margin-top: 40px; border: 2px black solid">
				  <div class="panel-heading" style="border-bottom: 2px black solid">Note :</div>
				  <div class="panel-body" id="note">
				  	<!-- <input type="text" class="form-control hilangkan" id="isinote" placeholder="Note.."> -->
				  	<textarea class="form-control hilangkan" rows="10" cols="20" placeholder="Tulis Catatan di sini.." id="isinote" style="resize:vertical;"></textarea>
				  </div>
				</div>
		</div>


					
			<?php } ?>

			

			<?php if(!empty($posting)){ ?>

			<center><button type="button" id="print" class="btn btn-primary col-md-12" style="height: 50px; margin-top: 10px" data-toggle="modal" onclick="ayo(); printContent('ygdiprint'); window.location.reload();return false;"><span style="color: white" class="glyphicon glyphicon-print"></span> Print / Save</button></center>

			

			<script>
				// function printContent(el){
				//     var restorepage = document.body.innerHTML;
				//     var printcontent = document.getElementById(el).innerHTML;
				//     document.body.innerHTML = printcontent;
				//     window.print();
				//     document.body.innerHTML = restorepage;

				// }

				function printContent(printpage){
				var headstr = "<html><head><title></title></head><body>";
				var footstr = "</body>";
				var newstr = document.all.item(printpage).innerHTML;
				var oldstr = document.body.innerHTML;
				document.body.innerHTML = headstr+newstr+footstr;
				window.print();
				document.body.innerHTML = oldstr;
				return false;
				}

				function ayo(){
					if (document.getElementById('isinote').value==='') {
						$('#note').addClass("margin80");
					};
					$(".hilangkan").addClass("utkhilang");
					$(".enter2").addClass("enternya2");
					$(".enter3").addClass("enternya3");
					// $(".enter4").addClass("enternya4");
					$("<br><br><br><br><br><br><br><br><br><br><br><br><br>").appendTo(".enter4");
					$("<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>").appendTo(".enter5");
					$("<br><br>").appendTo(".enter1");
					$(".sub-album").removeClass("borderfoto");
					// mulai untuk tdd
					$('#namasup').text($('#isinamasup').val());
					$('#jabsup').text($('#isijabsup').val());
					$('#namanerima').text($('#isinamanerima').val());
					$('#jabnerima').text($('#isijabnerima').val());
					$('#note').text($('#isinote').val());
				};
			</script>
			

<!-- 
			<button class="btn btn-success" style="font-family: 'Exo 2', sans-serif;" onclick="printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print Report</button> -->

			<?php } ?>

			
		

		</div>
	</div>
	<!-- //contact -->
<!-- footer -->
<div class="footer">
		<div class="container">
			<h2 class="agileinfo_header">Detail Tahapan  <span>Tiang</span></h2>
				<p class="agileits_dummy_para">Halaman detail laporan Tiang.</p>
				<!-- <div class="news-w3l">
					<form action="#" method="post">
						<input type="email" name="Email" placeholder="Enter Your Email..." required="">
						<input type="submit" value="Send">
					</form>
				</div> -->
			<!-- <div class="agile_footer_copy">
				<div class="w3agile_footer_grids">
					<div class="col-md-4 w3agile_footer_grid">
						<h3>About Us</h3>
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse.<span>Excepteur sint occaecat cupidatat 
							non proident, sunt in culpa qui officia deserunt mollit.</span></p>
					</div>
					<div class="col-md-4 w3agile_footer_grid">
						<h3>Contact Info</h3>
						<ul>
							<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
							<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
							<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
						</ul>
					</div>
					<div class="col-md-4 w3agile_footer_grid w3agile_footer_grid1">
						<h3>Navigation</h3>
						<ul>
							<li><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><a href="about.html">About</a></li>
							<li><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><a href="gallery.html">Gallery</a></li>
							<li><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><a href="icons.html">Web Icons</a></li>
							<li><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><a href="mail.html">Mail Us</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="w3_agileits_copy_right_social">
				<div class="col-md-6 agileits_w3layouts_copy_right">
					<p>© 2017 Style Decor. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
				</div>
				<div class="col-md-6 w3_agile_copy_right">
					<ul class="agileinfo_social_icons">
						<li><a href="#" class="w3_agileits_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="wthree_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agileinfo_google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agileits_pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div> -->
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




	
</body>	

	

</html>