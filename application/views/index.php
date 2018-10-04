<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home - E-Match Ad</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="E Match Ad - Personal Website Match Ad" />
<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap_index.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/style_index.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css" type="text/css" media="screen" property="" />
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Prompt:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">

<style type="text/css">
	 .sesuaikan {
        position: relative;
      /*  padding-bottom: 25%; // This is the aspect ratio*/
        overflow: hidden;
    }

    .navbar-brand {
	  padding: 0px;
	}
	.navbar-brand>img {
	  height: 100%;
	  padding: 0px;
	  width: auto;
	}
   

    @media (max-width: 991px){

    	.sesuaikan iframe, .sesuaikan video 
    	{
	       /* position: absolute;*/
	        top: 0;
	        left: 0;
	        width: 100% !important;
	    }

    	.sesuaikan img
    	{
	       /* position: absolute;*/
	        top: 0;
	        left: 0;
	        width: 100% !important;
	        height: auto;
	        display: block;
    	}
    }
</style>
</head>
<body>
<?php if ($this->session->flashdata('message_name')) { ?>
	<div id="alertsession" class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <?= $this->session->flashdata('message_name') ?>
  	</div>
    
<?php } ?>
<!-- banner -->
	<div class="header">
		<div class="header_left">

			<ul>
				<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Lesti Street No.42
Surabaya - East Java, 60241</li>
				<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>031 5678 346 (Surabaya) </li>
				<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>021 3512 775 (Jakarta)</li>
			</ul>
		</div>
		<div class="header_right">
			<div class="w3_agile_login">
				<div class="cd-main-header">
					<!-- <a class="cd-search-trigger" href="#cd-search"> <span></span></a> -->
					<!-- cd-header-buttons -->
					<div style="padding-top: 10px; color: white">
					<?php
						$tanggal= mktime(date("m"),date("d"),date("Y"));
						echo "Tanggal : ".date("D, d-M-Y", $tanggal)." ";
						date_default_timezone_set('Asia/Jakarta');
						$jam=date("H:i");
						echo "| Pukul : ". $jam." "."";
						$a = date ("H");
						// if (($a>=5) && ($a<=11)){
						// echo ", Selamat Pagi !!";
						// }
						// else if(($a>11) && ($a<=15))
						// {
						// echo ", Selamat Siang !!";}
						// else if (($a>15) && ($a<=18)){
						// echo ", Selamat Sore !!";}
						// else { echo ",  Selamat Malam ";}
					?>
					</div>
				</div>
				<!-- <div id="cd-search" class="cd-search">
					<form action="#" method="post">
						<input name="Search" type="search" placeholder="Search...">
					</form>
				</div> -->
			</div>
		</div>
			<div class="clearfix"></div>
		
	</div>
	<div class="header-bottom">
		<nav class="navbar navbar-default">
			<div class="navbar-header navbar-left">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- <h1><a class="navbar-brand" href="<?= base_url();?>index"><span>E-Match </span>Ad</a></h1> -->
				<a class="navbar-brand" href="<?= base_url();?>"><img class="img-responsive" src="<?php echo base_url()?>assets/img/logo.png">
            </a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<nav class="link-effect-2" id="link-effect-2">
					<ul class="nav navbar-nav">
						<li class="active"><a href="<?php echo base_url(); ?>index"><span data-hover="Home">Home</span></a></li>
						<li><a href="<?php echo base_url(); ?>Pengumuman"><span data-hover="Pengumuman">Pengumuman</span></a></li>
						<li><a href="<?php echo base_url(); ?>laporan/entry"><span data-hover="Laporan Input KPIM">Laporan Input KPIM</span></a></li>
						<li><a href="<?php echo base_url(); ?>doku/dokumentasi"><span data-hover="Dokumentasi">Dokumentasi</span></a></li>
						<!-- <li><a href="lessons.html"><span data-hover="Lessons">Lessons</span></a></li> -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span data-hover="<?php echo $this->session->userdata('username'); ?>"><?php echo $this->session->userdata('username'); ?></span> <b class="caret"></b></a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li><a href="<?php echo base_url();?>Profil">Profil</a></li>
								<li><a href="<?php echo base_url();?>Ebank">E-filling</a></li>
								<li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
							</ul>
						</li>

						<?php 
							if ($this->session->userdata('level') == 1 ) { ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span data-hover="Menu Admin">Menu Admin</span> <b class="caret"></b></a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li><a href="<?php echo base_url();?>Pengumuman/datapengumuman">Data Pengumuman</a></li>
								<li><a href="<?php echo base_url();?>Karyawan">Data Karyawan</a></li>
								<li><a href="<?php echo base_url();?>Addkaryawan">Tambah Karyawan</a></li>
							</ul>
						</li>
						<?php }	?>

						<!-- <?php 
						$find   = 'e';
						$pos = strpos($this->session->userdata('id_dept'), $find);
						$find2   = 'd';
						$pos2 = strpos($this->session->userdata('id_dept'), $find2);
						$find3   = '7';
						$pos3 = strpos($this->session->userdata('id_dept'), $find3);
						if ( ($this->session->userdata('level') != 1 AND $this->session->userdata('level') != 2 AND $this->session->userdata('level') != 11 AND $this->session->userdata('level') != 12 AND $this->session->userdata('level') != 10 AND $this->session->userdata('level') != 5 AND ($pos !== false || $pos2 !== false)) OR 
							($this->session->userdata('level') != 1 AND $this->session->userdata('level') != 11 AND $this->session->userdata('level') != 12 AND $this->session->userdata('level') != 10 AND $this->session->userdata('level') != 5 AND ($pos3 !== false))) { ?>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span data-hover="User Vendor">User Vendor</span> <b class="caret"></b></a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li><a href="<?php echo base_url();?>Karyawan/vendor">Data User Vendor</a></li>
								<li><a href="<?php echo base_url();?>Addvendor">Tambah User Vendor</a></li>
							</ul>
						</li>
						<?php }	?> -->


						<!-- <li><a href="mail.html"><span data-hover="Mail Us">Mail Us</span></a></li> -->
					</ul>
				</nav>
			</div>
			<!-- <div class="agileinfo-social-grids">
				<ul>
					<li><a href="https://www.facebook.com/matchadvertising/" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/search?q=matchadv" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<li><a href="http://matchad.wordpress.com/" target="_blank"><i class="fa fa-rss"></i></a></li>
				</ul>
			</div> -->
		</nav>
	</div>

	<?php 
	foreach($notif as $pengumuman){ 
	?>
		<?php if(isset($pengumuman)) { ?>
		<div id="ikialert" class="alert alert-info alert-dismissable col-sm-12" style="font-size: 15px; z-index: 2; margin: 0 0 0 0; position: absolute; display: none">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		    <text style="color: green">Informasi Pengumuman Terbaru : </text>
		    <center><a href="#pengumuman">
			<span style="font-size: 35px; font-weight: bold"><?php echo $pengumuman->judul_post; ?> </span>
			<span class="label label-danger" style="font-size: 20px; ">Lihat Detail <span class="glyphicon glyphicon-menu-down"></span></span>
		    </a>
			</center>
		</div>
		<?php } ?>
	<?php } ?>
	<div class="banner-bottom-icons">
		<div class="container">
			<div class="w3l-heading">

				<h2 class="w3ls_head">Menu </h2>
			</div>


			
			<div class="col-md-12 w3_banner_bottom_icons_right">
				<div style="display: block; padding: 5px 0px 5px 0px ">
					<span class="menunya"><button class="btn btn-default" id="showmatch" style="font-family: 'Exo 2', sans-serif; width: 200px"><img src="<?php echo base_url(); ?>assets/img/match.png" width='auto' height='30px'></button></span>
					<span class="menunya"><button class="btn btn-default inimatch" id="hidematch" style="font-family: 'Exo 2', sans-serif; display: none"><img src="<?php echo base_url(); ?>assets/img/hide.png" width='auto' height='30px'></button></span>
					<text style="float: right; padding-top: 5px"><h3 class="judul"><span>Media sosial Match Advertising</span></h3></text>
				</div>
				<div class="inimatch" style="display: none;">
					<div class="col-xs-4 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.facebook.com/matchadvertising/" target="_blank">
							<i class="fa-facebook" style="background: #3B5998;"></i>
							<h3>Match Advertising</h3>
							<p>Facebook Match Advertising</p>
							</a>
						</div>
					</div>
					<div class="col-xs-4 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://twitter.com/search?q=matchadv" target="_blank">
							<i class="fa-twitter" style="background: #55ACEE;"></i>
							<h3>Match Advertising</h3>
							<p>Twitter Match Advertising</p>
							</a>
						</div>
					</div>
					<div class="col-xs-4 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.instagram.com/match_ad/" target="_blank">
							<i class="fa-instagram" style="background: #e51d5d;"></i>
							<h3>Match Advertising</h3>
							<p>Instagram Match Advertising</p>
							</a>
						</div>
					</div>
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="http://marketing-match-ad.blogspot.co.id/" target="_blank">
							<i class="fa-rss" style="background: #ff6600;"></i>
							<h3>Match Advertising</h3>
							<p>Blogger Match Advertising</p>
							</a>
						</div>
					</div>
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="http://matchad.wordpress.com/" target="_blank">
							<i class="fa-rss" style="background: #45bbff;"></i>
							<h3>Match Advertising</h3>
							<p>Wordpress Match Advertising</p>
							</a>
						</div>
					</div>
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.linkedin.com/in/matchad/recent-activity/" target="_blank">
							<i class="fa-linkedin" style="background: #007bb5;"></i>
							<h3>Match Advertising</h3>
							<p>LinkedIn Match Advertising</p>
							</a>
						</div>
					</div>
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.youtube.com/channel/UCOJV4OX3ccNzmbGOJtYvE9Q/videos?live_view=500&flow=grid&view=0&sort=dd" target="_blank">
							<i class="fa-youtube" style="background: #bb0000;"></i>
							<h3>Match Advertising</h3>
							<p>Youtube Match Advertising</p>
							</a>
						</div>
					</div>
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://plus.google.com/u/0/100150203391938362914" target="_blank">
							<i class="fa-google" style="background: #dd4b39;"></i>
							<h3>Match Advertising</h3>
							<p>Google + Match Advertising</p>
							</a>
						</div>
					</div>
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.path.com/56eb7c19dfa69f113fca04a5" target="_blank">
							<i class="fa-pinterest" style="background: #cb2027;"></i>
							<h3>Match Advertising</h3>
							<p>Path Match Advertising</p>
							</a>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

			<!-- batas di bawah ini Match, wiper & KCT -->

			
			<div class="col-md-12 w3_banner_bottom_icons_right">
				<div style="display: block; padding:5px 0px 5px 0px  ">
					<span class="menunya"><button class="btn btn-default" id="showwiper" style="font-family: 'Exo 2', sans-serif; width: 200px"><img src="<?php echo base_url(); ?>assets/img/wp.png" width='auto' height='30px'></button></span>
					<span class="menunya"><button class="btn btn-default iniwiper" id="hidewiper" style="font-family: 'Exo 2', sans-serif; display: none"><img src="<?php echo base_url(); ?>assets/img/hide.png" width='auto' height='30px'></button></span>

					<text style="float: right; padding-top: 5px"><h3 class="judul"><span>Media sosial Wiperindo</span></h3></text>
				</div>
				<div class="iniwiper" style="display: none">
					<div class="col-xs-4 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.facebook.com/Wiperindo-1480173922043389/" target="_blank">
							<i class="fa-facebook" style="background: #3B5998;"></i>
							<h3>Wiperindo</h3>
							<p>Facebook Wiperindo</p>
							</a>
						</div>
					</div>
					<div class="col-xs-4 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://twitter.com/wiperindo" target="_blank">
							<i class="fa-twitter" style="background: #55ACEE;"></i>
							<h3>Wiperindo</h3>
							<p>Twitter Wiperindo</p>
							</a>
						</div>
					</div>
					<div class="col-xs-4 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.instagram.com/wiperindonesia/" target="_blank">
							<i class="fa-instagram" style="background: #e51d5d;"></i>
							<h3>Wiperindo</h3>
							<p>Instagram Wiperindo</p>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 w3_banner_bottom_icons_right">
				<div style="display: block; padding:5px 0px 5px 0px  ">
					<span class="menunya"><button class="btn btn-default" id="showtritunggal" style="font-family: 'Exo 2', sans-serif; width: 200px"><img src="<?php echo base_url(); ?>assets/img/tritunggal.png" width='auto' height='30px'></button></span>
					<span class="menunya"><button class="btn btn-default initritunggal" id="hidetritunggal" style="font-family: 'Exo 2', sans-serif; display: none"><img src="<?php echo base_url(); ?>assets/img/hide.png" width='auto' height='30px'></button></span>
					<text style="float: right; padding-top: 5px"><h3 class="judul"><span>Media sosial Tritunggal Metalworks</span></h3></text>
				</div>

				<div class="initritunggal" style="display: none">
					<div class="col-xs-4 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.facebook.com/Tritunggal-Metalworks-153338715169247/" target="_blank">
							<i class="fa-facebook" style="background: #3B5998;"></i>
							<h3>Tritunggal Metalworks</h3>
							<p>Facebook Tritunggal Metalworks</p>
							</a>
						</div>
					</div>
					<div class="col-xs-4 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://twitter.com/PT_KCT" target="_blank">
							<i class="fa-twitter" style="background: #55ACEE;"></i>
							<h3>Tritunggal Metalworks</h3>
							<p>Twitter Tritunggal Metalworks</p>
							</a>
						</div>
					</div>
					<div class="col-xs-4 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.instagram.com/tritunggalmetalworks/" target="_blank">
							<i class="fa-instagram" style="background: #e51d5d;"></i>
							<h3>Tritunggal Metalworks</h3>
							<p>Instagram Tritunggal Metalworks</p>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 w3_banner_bottom_icons_right">
				<div style="display: block; padding:5px 0px 5px 0px  ">
					<span class="menunya"><button class="btn btn-default" id="showwiklan" style="font-family: 'Exo 2', sans-serif; width: 200px"><img src="<?php echo base_url(); ?>assets/img/wiklanlogo.png" width='auto' height='30px'></button></span>
					<span class="menunya"><button class="btn btn-default iniwiklan" id="hidewiklan" style="font-family: 'Exo 2', sans-serif; display: none"><img src="<?php echo base_url(); ?>assets/img/hide.png" width='auto' height='30px'></button></span>
					<text style="float: right; padding-top: 5px"><h3 class="judul"><span>Media sosial WIKLAN</span></h3></text>
				</div>

				<div class="iniwiklan" style="display: none">
					<div class="col-xs-3 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.facebook.com/wiklanindonesia" target="_blank">
							<i class="fa-facebook" style="background: #3B5998;"></i>
							<h3>WIKLAN</h3>
							<p>Facebook WIKLAN</p>
							</a>
						</div>
					</div>
					<div class="col-xs-3 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://twitter.com/wiklanindonesia" target="_blank">
							<i class="fa-twitter" style="background: #55ACEE;"></i>
							<h3>WIKLAN</h3>
							<p>Twitter WIKLAN</p>
							</a>
						</div>
					</div>
					<div class="col-xs-3 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.instagram.com/wiklanindonesia/" target="_blank">
							<i class="fa-instagram" style="background: #e51d5d;"></i>
							<h3>WIKLAN</h3>
							<p>Instagram WIKLAN</p>
							</a>
						</div>
					</div>
					<div class="col-xs-3 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.linkedin.com/in/wiklan-indonesia-77b2b9166/" target="_blank">
							<i class="fa-linkedin" style="background: #007bb5;"></i>
							<h3>WIKLAN</h3>
							<p>LinkedIn WIKLAN</p>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 w3_banner_bottom_icons_right">
				<div style="display: block; padding:5px 0px 5px 0px  ">
					<span class="menunya"><button class="btn btn-default" id="showrcp" style="font-family: 'Exo 2', sans-serif; width: 200px"><img src="<?php echo base_url(); ?>assets/img/rcplogo.jpg" width='auto' height='30px'></button></span>
					<span class="menunya"><button class="btn btn-default inircp" id="hidercp" style="font-family: 'Exo 2', sans-serif; display: none"><img src="<?php echo base_url(); ?>assets/img/hide.png" width='auto' height='30px'></button></span>
					<text style="float: right; padding-top: 5px"><h3 class="judul"><span>Media sosial RCP</span></h3></text>
				</div>

				<div class="inircp" style="display: none">
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.facebook.com/Raja.Cahaya.Prima/" target="_blank">
							<i class="fa-facebook" style="background: #3B5998;"></i>
							<h3>RCP</h3>
							<p>Facebook RCP</p>
							</a>
						</div>
					</div>
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.instagram.com/eseledindonesia/" target="_blank">
							<i class="fa-instagram" style="background: #e51d5d;"></i>
							<h3>RCP</h3>
							<p>Instagram RCP</p>
							</a>
						</div>
					</div>
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.tokopedia.com/eseled" target="_blank">
							<i class="fa-rss" style="background: #44B64B;"></i>
							<h3>RCP</h3>
							<p>Tokopedia RCP</p>
							</a>
						</div>
					</div>
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.bukalapak.com/u/eseled" target="_blank">
							<i class="fa-rss" style="background: #EF1551;"></i>
							<h3>RCP</h3>
							<p>Bukalapak RCP</p>
							</a>
						</div>
					</div>
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://shopee.co.id/eseled" target="_blank">
							<i class="fa-rss" style="background: #E85205;"></i>
							<h3>RCP</h3>
							<p>Shopee RCP</p>
							</a>
						</div>
					</div>
					<div class="col-xs-2 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="https://www.olx.co.id/all-results/user/4mCGP/" target="_blank">
							<i class="fa-rss" style="background: #662288;"></i>
							<h3>RCP</h3>
							<p>OLX RCP</p>
							</a>
						</div>
					</div>
				</div>
			</div>
				<!-- <div class="col-xs-3 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="https://accounts.google.com/" target="_blank">
						<i class="fa-google" style="background: #dd4b39;"></i>
						<h3>Gmail</h3>
						<p>Login Gmail Match, WPI, KCT</p>
						</a>
					</div>
				</div> -->
				<div class="clearfix"> </div>

			<div style="display: block; padding:5px 0px 5px 0px  ">
				<span class="menunya"><button class="btn btn-default" id="showecom" style="font-family: 'Exo 2', sans-serif; width: 200px"><img src="<?php echo base_url(); ?>assets/img/ecommerce.png" width='auto' height='30px'></button></span>
				<span class="menunya"><button class="btn btn-default iniecom" id="hideecom" style="font-family: 'Exo 2', sans-serif; display: none"><img src="<?php echo base_url(); ?>assets/img/hide.png" width='auto' height='30px'></button></span>
				<text style="float: right; padding-top: 5px"><h3 class="judul"><span>E - Commerce</span></h3></text>
			</div>
			<div class="col-md-12 w3_banner_bottom_icons_right">
				<div class="iniecom" style="display: none">				
					<div class="col-xs-6 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="http://www.matchadonline.com/" target="_blank">
							<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-matchadonline.png" alt=" " class="img-responsive" /></center>
							<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
							<h3>Match Ad Online</h3>
							<p>www.matchadonline.com</p>
							</a>
						</div>
					</div>
					<div class="col-xs-6 w3_banner_bottom_icons1">
						<div class="w3_banner_bottom_icons1_effect">
							<a href="http://www.matchadonline.com/manage" target="_blank">
							<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-matchadonline.png" alt=" " class="img-responsive" /></center>
							<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
							<h3>Admin Match Ad Online</h3>
							<p>Admin www.matchadonline.com</p>
							</a>
						</div>
					</div>
				<div class="clearfix"> </div>
				</div>
			</div>


			

			<!-- batas -->
			<div style="display: block; padding:5px 0px 5px 0px  ">
				<span class="menunya"><button class="btn btn-default" id="showweb" style="font-family: 'Exo 2', sans-serif; width: 200px"><img src="<?php echo base_url(); ?>assets/img/cp.png" width='auto' height='30px'></button></span>
				<span class="menunya"><button class="btn btn-default iniweb" id="hideweb" style="font-family: 'Exo 2', sans-serif; display: none"><img src="<?php echo base_url(); ?>assets/img/hide.png" width='auto' height='30px'></button></span>
				<text style="float: right; padding-top: 5px"><h3 class="judul"><span>Web Company Profile</span></h2></text>
			</div>

		
			
			<!-- batas -->
		<div class="iniweb" style="display: none">
			<div class="col-md-12 w3_banner_bottom_icons_right">
				<div class="col-xs-4 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="http://www.match-advertising.com/" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-match.png" alt=" " class="img-responsive" /></center>
						<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
						<h3>Match Advertising</h3>
						<p>www.match-advertising.com</p>
						</a>
					</div>
				</div>
				<!-- <div class="col-xs-4 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="http://www.match-advertising.com/front/administrator" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-match.png" alt=" " class="img-responsive" /></center>
						
						<h3>Admin</h3>
						<p>Admin Match Advertising</p>
						</a>
					</div>
				</div> -->
				<div class="col-xs-4 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="https://match-advertising.com:2083/" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-match.png" alt=" " class="img-responsive" /></center>
						<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
						<h3>Cpanel</h3>
						<p>Cpanel Match Advertising</p>
						</a>
					</div>
				</div>
				<div class="col-xs-4 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="https://match-advertising.com:2096/" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-match.png" alt=" " class="img-responsive" /></center>
						<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
						<h3>Webmail</h3>
						<p>Webmail Match Advertising</p>
						</a>
					</div>
				</div>
				<div class="col-xs-3 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="http://www.tritunggalmetalworks.com/" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-tri.png" alt=" " class="img-responsive" /></center>
						<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
						<h3>Tritunggal</h3>
						<p>www.tritunggalmetalworks.com</p>
						</a>
					</div>
				</div>
				<div class="col-xs-3 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="http://www.tritunggalmetalworks.com/Administrator" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-tri.png" alt=" " class="img-responsive" /></center>
						<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
						<h3>Admin</h3>
						<p>Admin Tritunggal Metalworks</p>
						</a>
					</div>
				</div>
				<div class="col-xs-3 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="https://tritunggalmetalworks.com:2083/" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-tri.png" alt=" " class="img-responsive" /></center>
						<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
						<h3>Cpanel</h3>
						<p>Cpanel Tritunggal Metalworks</p>
						</a>
					</div>
				</div>
				<div class="col-xs-3 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="https://tritunggalmetalworks.com:2096/" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-tri.png" alt=" " class="img-responsive" /></center>
						<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
						<h3>Webmail</h3>
						<p>Webmail Tritunggal Metalworks</p>
						</a>
					</div>
				</div>

				<div class="col-xs-3 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="http://www.wiperindonesia.com/" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-wiper.png" alt=" " class="img-responsive" /></center>
						<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
						<h3>Wiperindo</h3>
						<p>www.wiperindonesia.com</p>
						</a>
					</div>
				</div>
				<div class="col-xs-3 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="http://wiperindonesia.com/C_login" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-wiper.png" alt=" " class="img-responsive" /></center>
						<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
						<h3>Admin</h3>
						<p>Admin Wiperindo</p>
						</a>
					</div>
				</div>
				<div class="col-xs-3 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="https://www.wiperindonesia.com:2083/" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-wiper.png" alt=" " class="img-responsive" /></center>
						<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
						<h3>Cpanel</h3>
						<p>Cpanel Wiperindo</p>
						</a>
					</div>
				</div>
				<div class="col-xs-3 w3_banner_bottom_icons1">
					<div class="w3_banner_bottom_icons1_effect">
						<a href="https://wiperindonesia.com:2096/" target="_blank">
						<center><img width="100px" height="100px" src="<?php echo base_url(); ?>assets/img/menu-wiper.png" alt=" " class="img-responsive" /></center>
						<!-- <i class="fa-google" style="background: #dd4b39;"></i> -->
						<h3>Webmail</h3>
						<p>Webmail Wiperindo</p>
						</a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>



			
			

			<div class="col-md-6 w3_banner_bottom_icons_left hover15">
				<div class="w3_agile_banner_bottom">
					<figure>
					<a href="<?php echo base_url(); ?>qcindex" ><img src="<?php echo base_url(); ?>assets/img/qc.jpg" alt=" " class="img-responsive" title="Aplikasi Quality Control" /></a>
					</figure>
				</div>
			</div>

			<div class="col-md-6 w3_banner_bottom_icons_left hover15">
				<div class="w3_agile_banner_bottom">
					<figure>
					<a href="<?php echo base_url(); ?>crud/home" ><img src="<?php echo base_url(); ?>assets/img/nt.jpg" alt=" " class="img-responsive" title="Aplikasi New Time Table" /></a>
					</figure>
				</div>
			</div>

			<div class="col-md-6 w3_banner_bottom_icons_left hover15">
				<div class="w3_agile_banner_bottom">
					<figure>
					<a href="<?php echo base_url(); ?>reminder" ><img src="<?php echo base_url(); ?>assets/img/er.jpg" alt=" " class="img-responsive" title="Aplikasi E-Reminder" /></a>
					</figure>
				</div>
			</div>

			<div class="col-md-6 w3_banner_bottom_icons_left hover15">
				<div class="w3_agile_banner_bottom">
					<figure>
					<a href="<?php echo base_url(); ?>Evisit/visit/dashboard" ><img src="<?php echo base_url(); ?>assets/img/ev.jpg" alt=" " class="img-responsive" title="Aplikasi E-Visit" /></a>
					</figure>
				</div>
			</div>

			<div class="col-md-4 w3_banner_bottom_icons_left hover15">
				<div class="w3_agile_banner_bottom">
					<figure>
					<a href="<?php echo base_url(); ?>matchterpadu" ><img src="<?php echo base_url(); ?>assets/img/match-terpadu.png" alt=" " class="img-responsive" title="Aplikasi Match Terpadu" /></a>
					</figure>
				</div>
			</div>
			<div class="col-md-4 w3_banner_bottom_icons_left hover15">
				<div class="w3_agile_banner_bottom">
					<figure>
					<a href="<?php echo base_url(); ?>HC/" ><img src="<?php echo base_url(); ?>assets/img/human-capital.png" alt=" " class="img-responsive" title="Aplikasi HC" /></a>
					</figure>
				</div>
			</div>
			<div class="col-md-4 w3_banner_bottom_icons_left hover15">
				<div class="w3_agile_banner_bottom">
					<figure>
					<a href="<?php echo base_url(); ?>home/" ><img src="<?php echo base_url(); ?>assets/img/kpim.png" alt=" " class="img-responsive" title="Aplikasi KPIM Online" /></a>
					</figure>
				</div>
			</div>


			

			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //banner-bottom-icons -->
<!-- register -->
	<div class="register" id="pengumuman">
		<div class="container">
			<!-- <div class="col-md-6 w3layouts_register_right"> -->
				<!-- <form action="#" method="post">	
					<input name="Name" placeholder="First Name" type="text" required="">
					<input name="Name" placeholder="Last Name" type="text" required="">
					<input name="Email" placeholder="Email" type="email" required="">
					<input name="Subject" placeholder="Subject" type="text" required="">
					<input type="submit" value="Book Now">
				</form> -->
			<!-- </div> -->

			<div  class="col-md-12 w3layouts_register_left">
			<?php 
			$no = 1;
			foreach($table as $pengumuman){ 
			?>
				<center><h3><span >Pengumuman Terbaru</span></h3><br></center><br>
			<h3><?php echo $pengumuman->judul_post  ?></h3>

				<h5 style="color: salmon">Ditulis oleh <?= $pengumuman->nama_karyawan ?> <span class="glyphicon glyphicon-calendar"></span> <?php echo date("d-M-Y", strtotime($pengumuman->tgl_post)) . '<br><text style="color:yellow">Ditujukan kepada ' .$pengumuman->deptini .'</text>'  ?></h5> 
				
				<text style="color: #eee">
				<div class="sesuaikan">
				<?php echo $pengumuman->isi_post ?>
				</div>
				</text> 
				<br><br>
				<a href="<?= base_url()?>Pengumuman" style="float: right;"><button class="btn btn-default">Lihat semua pengumuman <span class="glyphicon glyphicon-arrow-right"></span></button></a>

				<br><br>
			<?php }?>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //register -->
<!-- about-us -->
	<!-- <div class="about">
		<div class="container">
			<div class="w3l-heading">
				<h3 class="w3ls_head">About Us </h3>
			</div>
			
			<div class="about-grids">
				<div class="col-md-6 about-grid">
					<div class="about-grid1">
						<div class="itis">
							<h4>New Teen Drivers</h4>
						</div>
						<div class="hji">
							<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
						</div>
						<div class="about-grid1-pos">
							<img src="<?php echo base_url(); ?>assets/img/1.jpg" alt=" " class="img-responsive" />
						</div>
					</div>
				</div>
				<div class="col-md-6 about-grid">
					<div class="about-grid2">
						<div class="col-xs-2 about-grid2-left">
							<p>01.</p>
						</div>
						<div class="col-xs-10 about-grid2-right">
							<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus 
								maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="about-grids">
				<div class="col-md-6 about-grid">
					<div class="about-grid2">
						<div class="col-xs-2 about-grid2-left">
							<p>02.</p>
						</div>
						<div class="col-xs-10 about-grid2-right">
							<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus 
								maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 about-grid">
					<div class="about-grid1 about-grd1">
						<div class="itis">
							<h4>New Adult Drivers</h4>
						</div>
						<div class="hji">
							<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
						</div>
						<div class="about-grid1-pos1">
							<img src="<?php echo base_url(); ?>assets/img/2.jpg" alt=" " class="img-responsive" />
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div> -->
<!-- //about-us -->
<!-- news-letter -->
	<!-- <div class="news-letter">
		<div class="container">
			<div class="w3l-heading">
				<h3 class="w3ls_head">Subscribe Here </h3>
			</div>
			<div class="agileinfo-subscribe">
				<form action="#" method="post">
					<input type="text" placeholder="Name" name="Name"  required="">
					<input type="email" placeholder="Email" name="Email"  required="">
					<input type="submit" value="Subscribe">
					<div class="clearfix"> </div>
				</form>
			</div>
		</div>
	</div> -->
	<!-- //news-letter -->
	<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<div class="w3l-heading">
				<h3 class="w3ls_head">Perusahaan Kami </h3>
			</div>
				<div class="bs-example bs-example-tabs welcome-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">01</a></li>
						<li role="presentation" class=""><a href="#Feature1" role="tab" id="Feature1-tab" data-toggle="tab" aria-controls="Feature1" aria-expanded="false">02</a></li>
						<li role="presentation" class=""><a href="#Feature2" role="tab" id="Feature2-tab" data-toggle="tab" aria-controls="Feature2" aria-expanded="false">03</a></li>
						
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
						<div class="w3agile_tabs">
								
								
								<div class="col-md-5 w3agile_tab_right w3agile_tab_right2">
									<img src="<?php echo base_url(); ?>assets/img/match.png" alt=" " class="img-responsive" />
								</div>
								<div class="col-md-7 w3agile_tab_left">
									<h4>Match Advertising</h4>
									<p align="justify"> PT. Multi Artistikacithra Advertising yang dikenal dengan Match-Ad adalah biro iklan di Surabaya yang telah berdiri lebih dari 27 tahun, kami menyediakan layanan promosi terbaik untuk memenuhi kebutuhan klien untuk mengenalkan, mengkomunikasikan dan mempromosikan produknya ke pasar umum. Didirikan pada 22 Juni 1990 fokus segmen iklan media luar ruang terutama penyediaan lokasi strategis untuk memberikan layanan yang meningkatkan kualitas, kreativitas di setiap media promosi dan penggunaan bahan dan teknologi terkini.</p>
									
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="Feature1" aria-labelledby="Feature1-tab">
							<div class="w3agile_tabs">
								
								<div class="col-md-5 w3agile_tab_right w3agile_tab_right1">
									<img src="<?php echo base_url(); ?>assets/img/tritunggal.png" alt=" " class="img-responsive" />
								</div>
								<div class="col-md-7 w3agile_tab_left">
									<h4>Tritunggal Metalworks</h4>
									<p align="justify">PT. Kreasi Cipta Tritunggal adalah perusahaan yang fokus pada bidang konstruksi billboard. Adapun beberapa produk yang kami hasilkan berupa konstruksi billboard seperti billboard / spanduk / Videotron, neon, tanda surat, canopi, pagar, menara BTS, ACP yang berfungsi untuk interior dan eksterior. Tritunggal Metalworks sendiri sudah berdiri sejak 2004 sampai sekarang. Semua produk yang kami produksi di bengkel kami sendiri, didukung oleh tenaga ahli di bidang sumber daya manusia, peralatan yang memadai dan proses pengendalian kualitas yang dapat dipercaya sehingga semua produk yang kami hasilkan memiliki kualitas handal dan harga bersaing serta terjangkau.</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="Feature2" aria-labelledby="Feature2-tab">
							<div class="w3agile_tabs">
								
								
								<div class="col-md-5 w3agile_tab_right w3agile_tab_right2">
									<img src="<?php echo base_url(); ?>assets/img/wp.png" alt=" " class="img-responsive" />
								</div>
								<div class="col-md-7 w3agile_tab_left">
									<h4>Wiperindo</h4>

									<p align="justify"> PT. Wijaya Persada Indonesia adalah perusahaan jasa kontraktor yang ada di surabaya diantaranya jasa kontruksi baja, pekerjaan sipil, kontruksi gudang, kontruksi rumah, renovasi rumah, jasa pengecetan dan semua kontruksi bangunan. Perusahaan mempunyai pengalaman menangani project – project bidang konstruksi yang sudah kami kerjakan sejak tahun 2004 maka ditahun 2015 ini kami meresmikan PT. Wijaya Persada Indonesia pada tanggal 20 Februari 2015 sebagai perusahaan yang menangani bidang general contractor, trading, dan supplier. Misi dan visi kami adalah perusahaan dengan memberikan jasa yang berkualitas baik, terpercaya, dapat dihandalkan dan memberikan kepuasan ke customer kami. </p>
									
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>

					</div>
				</div>
		</div>
	</div>
	<!-- //welcome-->
		

	<!-- footer -->
	<div class="w3-agile-footer">
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-3 footer-grid">
					<div class="footer-grid-heading">
						<h4>Alamat</h4>
					</div>
					<div class="footer-grid-info">
						<p>Jl. Lesti No.42
Surabaya 
							<span>- Jawa Timur, 60241.</span>
						</p>
						<p class="phone">Phone : 031 5678 346
							<span>Website :<br><a href="http://matchadonline.com/" target="_blank">www.matchadonline.com</a></span>
							<a href="http://match-advertising.com/" target="_blank">www.match-advertising.com</a>
						</p>
					</div>
				</div>
				<div class="col-md-3 footer-grid">
					<div class="footer-grid-heading">
						<h4>Navigasi</h4>
					</div>
					<div class="footer-grid-info">
						<ul>
							<li><a href="<?php echo base_url(); ?>index">Home</a></li>
							<li><a href="<?php echo base_url(); ?>Pengumuman">Pengumuman</a></li>
							<li><a href="<?php echo base_url(); ?>Profil">Profil User</a></li>
							<li><a href="<?php echo base_url(); ?>matchAD2/login.php">Match Terpadu</a></li>
							<li><a href="<?php echo base_url(); ?>HC/">Human Capital</a></li>
							<li><a href="<?php echo base_url(); ?>home/">KPIM Online</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 footer-grid">
					<div class="footer-grid-heading">
						<h4>Pengumuman Terbaru</h4>
					</div>
					<div class="w3agile_footer_grid_list">
						<ul>
							<li style="color:#739ee2"><?php echo $pengumuman->judul_post ?></li><br>
							<li><i>

							<!-- mulai untuk menampilkan max teks -->
							<?php 

							$string = $pengumuman->isi_post;
							// strip tags to avoid breaking any html
							$string = strip_tags($string);

							if (strlen($string) > 300) {

							    // truncate string
							    $stringCut = substr($string, 0, 300);

							    // make sure it ends in a word so assassinate doesn't become ass...
							    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="#pengumuman">Baca Selengkapnya</a>'; 
							}
							echo $string;

							?>

							</i></li>
							
						</ul>
					</div>
				</div>
				<div class="col-md-12 footer-grid">
					<div class="footer-grid-heading">
						<br>
						<h4>Download Aplikasi Mobile</h4>
					</div>
					<div class="footer-grid-info">
						<p>
						Supaya lebih mudah dalam penggunaan, kini telah tersedia Aplikasi E-Match dan MatchAd Online
						<br>
						Silahkan download pada tombol di bawah ini :
						</p>
						<div class="col-md-3">
						<a href="https://drive.google.com/open?id=1xDo2dzOsAUzXR1p4em2eiV5YPNcAOH4B" target="_blank"><img src="<?php echo base_url(); ?>assets/img/downloadematch.png" alt="Download Aplikasi E-Match" title="Download Aplikasi E-Match" class="img-responsive" style="width: 300px" /></a>
						</div>
						<div class="col-md-3">
						<a href="https://drive.google.com/open?id=1x2y_MT3RmM9dTmUoOjtv_7LfhMKs6KHL" target="_blank"><img src="<?php echo base_url(); ?>assets/img/downloadmatchadonline.png" alt="Download Aplikasi MatchAd Online" title="Download Aplikasi MatchAd Online" class="img-responsive" style="width: 300px" /></a>
						</div>


					</div>
				</div>
				<div class="col-md-12 footer-grid">
					<div class="footer-grid-heading">
					<br>
						<h4>Map</h4>
					</div>
					<div class="w3agile_footer_grid_list w3agile-post">
					<style>
					    .google-maps {
					        position: relative;
					      /*  padding-bottom: 25%; // This is the aspect ratio*/
					        overflow: hidden;
					    }
					    .google-maps iframe {
					       /* position: absolute;*/
					        top: 0;
					        left: 0;
					        width: 100% !important;
					    }
					</style>

					<div class="google-maps">
					<iframe src="https://www.google.com/maps/d/embed?mid=15AgMjQK184ZfrmYVEbYpujTdrxY&ll=-6.841640031498245%2C110.68191079931637&z=7" width="1100" height="270"></iframe>
					</div>
						<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.559543859352!2d112.72773051433116!3d-7.290848373684933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbe65c46a9d9%3A0xf4e8978b8328329b!2sMatch+Advertising+PT.!5e0!3m2!1sid!2sid!4v1502357430112" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> -->
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="agileits-w3layouts-copyright">
				<p>© 2017 E-Match Ad . All Rights Reserved By <a href="https://www.match-advertising.com/">Match Advertising</a>
				<!-- | Design by <a href="https://www.match-advertising.com/">Match Ad</a> & <a href="http://w3layouts.com/"> W3layouts</a> -->   </p>
			</div>
		</div>
	</div>
	<!-- //footer -->

<script> //ini untuk hide show rcp
	$(document).ready(function(){
	    $("#hidercp").click(function(){
	        $(".inircp").hide(1000);
	    });
	    $("#showrcp").click(function(){
	        $(".inircp").show(1000);
	    });

	   
	});
</script>
<script> //ini untuk hide show wiklan
	$(document).ready(function(){
	    $("#hidewiklan").click(function(){
	        $(".iniwiklan").hide(1000);
	    });
	    $("#showwiklan").click(function(){
	        $(".iniwiklan").show(1000);
	    });

	   
	});
</script>
<script> //ini untuk hide show wiper
	$(document).ready(function(){
	    $("#hidewiper").click(function(){
	        $(".iniwiper").hide(1000);
	    });
	    $("#showwiper").click(function(){
	        $(".iniwiper").show(1000);
	    });

	   
	});
</script>
<script> //ini untuk hide show match
	$(document).ready(function(){
	    $("#hidematch").click(function(){
	        $(".inimatch").hide(1000);
	    });
	    $("#showmatch").click(function(){
	        $(".inimatch").show(1000);
	    });

	   
	});
</script>

<script> //ini untuk hide show tritunggal
	$(document).ready(function(){
	    $("#hidetritunggal").click(function(){
	        $(".initritunggal").hide(1000);
	    });
	    $("#showtritunggal").click(function(){
	        $(".initritunggal").show(1000);
	    });

	   
	});
</script>

<script> //ini untuk hide show tritunggal
	$(document).ready(function(){
	    $("#hideecom").click(function(){
	        $(".iniecom").hide(1000);
	    });
	    $("#showecom").click(function(){
	        $(".iniecom").show(1000);
	    });

	   
	});
</script>
<script> //ini untuk hide show tritunggal
	$(document).ready(function(){
	    $("#hideweb").click(function(){
	        $(".iniweb").hide(1000);
	    });
	    $("#showweb").click(function(){
	        $(".iniweb").show(1000);
	    });

	   
	});
</script>

<script type="text/javascript">
	// tampilan alert
	 
	$(document).ready(function () {
	 
	window.setTimeout(function() {
	    $("#alertsession").fadeTo(1500, 0).slideUp(500, function(){
	        $(this).remove(); 
	    });
	}, 5000);
	 
	});
	// untuk tampilan alert -->
	</script>

<!-- start-smooth-scrolling -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smooth-scrolling -->
<!-- for bootstrap working -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
	<script>
	$(document).ready(function(){
		window.setTimeout(function() {
		$("#ikialert").fadeIn(2000);
		}, 2000);//dijalankan setelah 2 detik refresh

		window.setTimeout(function() {
	    $("#ikialert").fadeTo(1500, 0).slideUp(5000, function(){
	        $(this).remove(); 
	    });
		}, 15000);//hilang dijalankan setelah 15 detik refresh
	});
	</script>
</body>
</html>