<!--
author: W3layouts
author URL: //w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: //creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Pengumuman - E-Match Ad</title>
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
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Prompt:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">

</head>
<style type="text/css">
	.paddingtextarea{
		margin-left: -25px;
	}
</style>


<body>
<!-- banner -->
	<div class="header">
		<div class="header_left">
			<ul>
				<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Lesti Street No.42
Surabaya - East Java, 60241</li>
				<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>031 5678 346 (Surabaya)</li>
				<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>021 3512 775 (Jakarta)</li>
			</ul>
		</div>
		<div class="header_right">
			<div class="w3_agile_login">
				<div class="cd-main-header">
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
					<!-- <a class="cd-search-trigger" href="#cd-search"> <span></span></a> -->
					<!-- cd-header-buttons -->
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
				<h1><a class="navbar-brand" href="<?= base_url();?>index"><span>E-Match </span>Ad</a></h1>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<nav class="link-effect-2" id="link-effect-2">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url(); ?>index"><span data-hover="Home">Home</span></a></li>
						<li class="active"><a href="#"><span data-hover="Pengumuman">Pengumuman</span></a></li>
						<li><a href="<?php echo base_url(); ?>laporan/entry"><span data-hover="Laporan Input KPIM">Laporan Input KPIM</span></a></li>
						<!-- <li><a href="lessons.html"><span data-hover="Lessons">Lessons</span></a></li> -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span data-hover="<?php echo $this->session->userdata('username'); ?>"><?php echo $this->session->userdata('username'); ?></span> <b class="caret"></b></a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li><a href="<?php echo base_url();?>Profil">Profil</a></li>
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
						
						<?php 
						$find   = 'e';
						$pos = strpos($this->session->userdata('id_dept'), $find);
						$find2   = 'd';
						$pos2 = strpos($this->session->userdata('id_dept'), $find2);
						if ($this->session->userdata('level') != 1 AND $this->session->userdata('level') != 2 AND $this->session->userdata('level') != 11 AND $this->session->userdata('level') != 12 AND $this->session->userdata('level') != 10 AND $this->session->userdata('level') != 5 AND ($pos !== false || $pos2 !== false) ) { ?>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span data-hover="User Vendor">User Vendor</span> <b class="caret"></b></a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li><a href="<?php echo base_url();?>Karyawan/vendor">Data User Vendor</a></li>
								<li><a href="<?php echo base_url();?>Addvendor">Tambah User Vendor</a></li>
							</ul>
						</li>
						<?php }	?>
						<!-- <li><a href="mail.html"><span data-hover="Mail Us">Mail Us</span></a></li> -->
					</ul>
				</nav>
			</div>
			<!-- <div class="agileinfo-social-grids">
				<ul>
					<li><a href="https://www.facebook.com/matchadvertising/" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/search?q=matchadv" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<li><a href="//matchad.wordpress.com/" target="_blank"><i class="fa fa-rss"></i></a></li>
				</ul>
			</div> -->
		</nav>
	</div>
	<div class="banner1">
	</div>
<!-- //banner -->	
<!-- about -->
	<!-- about-top -->
	<div class="about-top">
		<div class="container containerpengumuman">
			<div class="w3l-heading">
			<br>
				<h2 class="w3ls_head">Pengumuman </h2>
			</div>

			<?php 
				if ($this->session->userdata('level') != 2 AND $this->session->userdata('level') != 11 AND $this->session->userdata('level') != 10) {
					?>
					
					<div class="row">
						<div class="col-sm-12">	
							<div class="panel panel-default">
							    <div class="panel-heading" style="text-align: center;">Form Posting Pengumuman</div>
							    <div class="panel-body">
							    
									  <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>Pengumuman/Addpengumuman">
									    <div class="form-group">
									      <label class="control-label col-sm-2">Judul Pengumuman:</label>
									      <div class="col-sm-10">
									        <input type="text" class="form-control" id="judul_pengumuman" placeholder="Judul Pengumuman" name="judul_pengumuman" required>
									      </div>
									    </div>

									    <div class="form-group">
									      <label class="control-label col-sm-2">Ditujukan Kepada:</label>
									     	<div class="row" >
									     		<div class="col-sm-9">
									     			<div class="checkbox">
													  <label><input type="checkbox" name="dept[]" value="15">Semua Departement </label>
													</div>
													<hr>
									     		</div>
									     		<div class="col-sm-2"></div>
											    <div class="col-sm-3" style="padding-right: 90px">
											    	Match Ad :
											    	<br>

													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="1">IT</label>
													</div>
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="2">HC</label>
													</div>
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="3">PAT</label>
													</div>
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="4">GA</label>
													</div>
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="5">Marketing </label>
													</div>	
												</div>

												<div class="col-sm-3" style="padding-right: 90px">
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="6">Finance</label>
													</div>
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="7">Logistic</label>
													</div>
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="8">Production</label>
													</div>
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="9">SITAC</label>
													</div>
												</div>


												<div class="col-sm-3">
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="a">Accounting</label>
													</div>
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="b">Secretary</label>
													</div>
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="c">Internal Audit</label>
													</div>
													<div class="checkbox">
													  <label><input class="match" type="checkbox" name="dept[]" value="l">Vendor</label>
													</div>
												</div>

												<div class="col-sm-12"><hr></div>

												<div class="col-sm-2"></div>
											    <div class="col-sm-3" style="padding-right: 90px">
											    	Wiperindo :
											    	<br>

													<div class="checkbox">
													  <label><input class="wpi" type="checkbox" name="dept[]" value="w">IT</label>
													</div>
													<div class="checkbox">
													  <label><input class="wpi" type="checkbox" name="dept[]" value="f">HC</label>
													</div>
													<div class="checkbox">
													  <label><input class="wpi" type="checkbox" name="dept[]" value="g">PAT</label>
													</div>
													<div class="checkbox">
													  <label><input class="wpi" type="checkbox" name="dept[]" value="h">GA</label>
													</div>
												</div>

												<div class="col-sm-3" style="padding-right: 90px">
													<div class="checkbox">
												  <label><input class="wpi" type="checkbox" name="dept[]" value="i">Marketing </label>
												</div>
												<div class="checkbox">
												  <label><input class="wpi" type="checkbox" name="dept[]" value="j">Finance</label>
												</div>
												<div class="checkbox">
												  <label><input class="wpi" type="checkbox" name="dept[]" value="k">Logistic</label>
												</div>
												<div class="checkbox">
												  <label><input class="wpi" type="checkbox" name="dept[]" value="d">Production</label>
												</div>
												</div>


												<div class="col-sm-3">
													<div class="checkbox">
													  <label><input class="wpi" type="checkbox" name="dept[]" value="m">SITAC</label>
													</div>
													<div class="checkbox">
													  <label><input class="wpi" type="checkbox" name="dept[]" value="n">Accounting</label>
													</div>
													<div class="checkbox">
													  <label><input class="wpi" type="checkbox" name="dept[]" value="o">Secretary</label>
													</div>
												</div>

												<div class="col-sm-12"><hr></div>

												<div class="col-sm-2"></div>
											    <div class="col-sm-3" style="padding-right: 90px">
											    	KCT :
											    	<br>

													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="p">IT</label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="q">HC</label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="r">PAT</label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="s">GA</label>
													</div>
												</div>

												<div class="col-sm-3" style="padding-right: 90px">
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="t">Marketing </label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="u">Finance</label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="v">Logistic</label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="e">Production</label>
													</div>
												</div>


												<div class="col-sm-3">
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="x">SITAC</label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="y">Accounting</label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="z">Secretary</label>
													</div>
												</div>

												<div class="col-sm-12"><hr></div>
												<div class="col-sm-2"></div>
											    <div class="col-sm-3" style="padding-right: 90px">
											    	WIKLAN :
											    	<br>

													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="22">IT</label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="17">HC</label>
													</div>
												</div>

												<div class="col-sm-3" style="padding-right: 90px">
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="16">Marketing </label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="20">Finance</label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="23">Secretary</label>
													</div>
												</div>


												<div class="col-sm-3">
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="19">SITAC</label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="21">Accounting</label>
													</div>
													<div class="checkbox">
													  <label><input class="kct" type="checkbox" name="dept[]" value="18">GA</label>
													</div>
												</div>

												<div class="col-sm-12"><hr></div>
												
											</div>
									    </div>									    

										<div class="form-group">  
									    	<div class="col-sm-2">
									    		<label class="control-label col-sm-2">Isi Pengumuman:</label>
									    	</div>

									    	<div class="col-sm-10">
									    		<textarea id="isi_pengumuman" name="isi_pengumuman" class="form-control" rows="3"></textarea>
									    	</div>
									    </div>
						
									   

									    <div class="form-group">        
									      <div class="col-sm-offset-2 col-sm-10">
									      <br>
									      <button type="submit" id="checkBtn" name="input" class="btn btn-warning col-sm-12">Kirim Pengumuman <span class="glyphicon glyphicon-send"></span></button>
									        <!-- <button type="submit" class="btn btn-default">Posting</button> -->
									      </div>
									    </div>
									  </form>
									


							    </div>
							 </div>
						</div>
					</div>
				<div class="row">
					<a href="<?php echo base_url(); ?>Pengumuman/pengumumanku"><button class="btn btn-primary col-md-4 col-sm-offset-4" >Edit pengumuman dari saya <span class="glyphicon glyphicon-pencil"></span></button></a>
				</div>
					<br><br><br>
			<?php
			}
			?>

			

			<!--tinymce source-->
			<script src="<?php echo base_url(); ?>assets/js/tinymce/js/tinymce/tinymce.dev.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/tinymce/js/tinymce/plugins/wordcount/plugin.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
			<script>
			tinymce.init({
				selector: "textarea",
				theme: "modern",
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker toc",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern codesample"
				],
				external_plugins: {
					//"moxiemanager": "/moxiemanager-php/plugin.js"
				},
				// content_css: "css/development.css",
				add_unload_trigger: false,

				toolbar: "insertfile undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table codesample",

				image_advtab: true,
				image_caption: true,

				style_formats: [
					{title: 'Bold text', format: 'h1'},
					{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
					{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
					{title: 'Example 1', inline: 'span', classes: 'example1'},
					{title: 'Example 2', inline: 'span', classes: 'example2'},
					{title: 'Table styles'},
					{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
				],

				template_replace_values : {
					username : "Jack Black"
				},

				template_preview_replace_values : {
					username : "Preview user name"
				},

				link_class_list: [
					{title: 'Example 1', value: 'example1'},
					{title: 'Example 2', value: 'example2'}
				],

				image_class_list: [
					{title: 'Example 1', value: 'example1'},
					{title: 'Example 2', value: 'example2'}
				],

				templates: [
					{title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'},
					{title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
				],

				setup: function(ed) {
					/*ed.on(
						'Init PreInit PostRender PreProcess PostProcess BeforeExecCommand ExecCommand Activate Deactivate ' +
						'NodeChange SetAttrib Load Save BeforeSetContent SetContent BeforeGetContent GetContent Remove Show Hide' +
						'Change Undo Redo AddUndo BeforeAddUndo', function(e) {
						console.log(e.type, e);
					});*/
				},

				spellchecker_callback: function(method, data, success) {
					if (method == "spellcheck") {
						var words = data.match(this.getWordCharPattern());
						var suggestions = {};

						for (var i = 0; i < words.length; i++) {
							suggestions[words[i]] = ["First", "second"];
						}

						success({words: suggestions, dictionary: true});
					}

					if (method == "addToDictionary") {
						success();
					}
				}
			});

			if (!window.console) {
				window.console = {
					log: function() {
						tinymce.$('<div></div>').text(tinymce.grep(arguments).join(' ')).appendTo(document.body);
					}
				};
			}
			</script>
			<!--tinymce source-->

			<!-- untuk pagination dan search -->
			
			    <!-- untuk pagination dan search -->	
					<div class="wthree-services-bottom-grids" id="pengumuman">
						<!-- <div class="col-md-6 wthree-services-left">
							<img src="<?php echo base_url(); ?>assets/img/5.jpg" Class="img-responsive" alt="">
						</div> -->
						
						<div class="col-md-12 wthree-services-right">
							<div class="wthree-services-right-top">
								<!-- untuk pagination dan search -->
								<div id="test-list">
								    <input type="text" class="search" placeholder=" Cari Pengumuman di sini.." style="float: right; border-radius: 5px; border: 2px orange solid" />
								    <br>
								    <div class="list">
								<!-- untuk pagination dan search -->
										<?php 
										$no = 1;
										
										foreach($table as $pengumuman){ 
										?>
											<div class="cariku">
											<?php $tgl = $pengumuman->tgl_post ;?>
												<?php echo $no++?> ) 
													<center>
														<h3><div class="carijudul"><?php echo $pengumuman->judul_post ?></div></h3>
													</center>

													<h5>Ditulis oleh <?php echo $pengumuman->nama_karyawan ?> 
													<span class="glyphicon glyphicon-calendar"></span>
													<?php echo date('d-M-Y', strtotime($tgl)); ?></h5>
													<h5><text style="color: #f79820">Ditujukan kepada : <?php echo $pengumuman->deptini ?></text></h5>
												<div class="cariisi"><?php echo $pengumuman->isi_post ?></div>
											</div>
											<hr>

										<?php } ?>
								<!-- untuk pagination dan search -->
									</div>
									<ul class="pagination" style="float: right;"></ul>
								</div>
								<!-- untuk pagination dan search -->
							</div>
							
							
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					
			</div>

			<!-- untuk pagination dan search -->
			<!-- <div id="test-list">
			    <input type="text" class="search" />
			    <div class="list"> -->
			    <!-- untuk pagination dan search -->
				    <!-- <div class="nui-cards-listing post" id="listing searchable list">
				          <div class="nui-card has-tag-layer">
				              <div class="nui-card-content">
				                  <div class="content-details" class="name">
				                      <div class="details-col content-col-2 lokasi">
				                          <p >Guybrush Threepwood</p>
				                      </div>
				                  </div>
				              </div>
				          </div>
				      </div>

				      <div class="nui-cards-listing post" id="listing searchable list">
				          <div class="nui-card has-tag-layer">
				              <div class="nui-card-content">
				                  <div class="content-details">
				                      <div class="details-col content-col-2 lokasi">
				                          <p class="cariku">Elaine Marley</p>
				                      </div>
				                  </div>
				              </div>
				          </div>
				      </div>

				      <div class="nui-cards-listing post" id="listing searchable list">
				          <div class="nui-card has-tag-layer">
				              <div class="nui-card-content">
				                  <div class="content-details">
				                      <div class="details-col content-col-2 lokasi">
				                          <p class="cariku">LeChuck</p>
				                      </div>
				                  </div>
				              </div>
				          </div>
				      </div>

			      <ul class="pagination"></ul>
			    </div>
			</div>
			<!-- pagination -->
		
		</div>
	</div>

	


	<!-- //about-top -->
	<!-- advantages -->
	<div class="advantages">
		<div class="agile-dot">
			<div class="container">
				<div class="advantages-main">
					<!-- <div class="w3l-heading">
						<h3 class="w3ls_head">Perusahaan Kami</h3>
					</div>	 -->			  
				   <div class="advantage-bottom">
				   <a href="//www.match-advertising.com/" target="_blank">
					 <div class="col-md-4 advantage-grid">
						<div class="advantage-block">
							<center><img src="<?php base_url()?>assets\img\menu-match.png" class="img-responsive"></center>
							<h4>Match Advertising</h4>
							<!-- <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates.</p> -->
						</div>
					 </div>
					</a>
					<a href="//www.tritunggalmetalworks.com/" target="_blank">
					 <div class="col-md-4 advantage-grid">
						<div class="advantage-block">
							<center><img src="<?php base_url()?>assets\img\menu-tri.png" class="img-responsive"></center>
							<h4>Tritunggal Metalworks</h4>
							<!-- <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates.</p> -->
						</div>
					 </div>
					</a>
					<a href="//www.wiperindonesia.com/" target="_blank">
					 <div class="col-md-4 advantage-grid">
						<div class="advantage-block">
							<center><img src="<?php base_url()?>assets\img\menu-wiper.png" class="img-responsive"></center>
							<h4>Wiperindo</h4>
							<!-- <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates.</p> -->
						</div>
					 </div>
					</a>
					<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

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
							<span>Website :<br><a href="//matchadonline.com/" target="_blank">www.matchadonline.com</a></span>
							<a href="//match-advertising.com/" target="_blank">www.match-advertising.com</a>
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
							<?php 
						$no = 1;
						foreach($ambilsatu as $ambil){ 
						?>
							<li  style="color:#739ee2"><?php echo $ambil->judul_post ?></li><br>
							<li><i>
							<!-- mulai untuk menampilkan max teks -->
							<?php 

							$string = $ambil->isi_post;
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
						<?php }?>
							
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
						<a href="https://drive.google.com/open?id=1xDo2dzOsAUzXR1p4em2eiV5YPNcAOH4B" target="_blank"><img src="<?php echo base_url(); ?>assets/img/downloadematch.png" alt="Download Aplikasi E-Match" title="Download Aplikasi E-Match" class="img-responsive" style="width: 280px" /></a>
						</div>
						<div class="col-md-3">
						<a href="https://drive.google.com/open?id=1x2y_MT3RmM9dTmUoOjtv_7LfhMKs6KHL" target="_blank"><img src="<?php echo base_url(); ?>assets/img/downloadmatchadonline.png" alt="Download Aplikasi MatchAd Online" title="Download Aplikasi MatchAd Online" class="img-responsive" style="width: 280px" /></a>
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
				<p>© 2017 E-Match Ad . All Rights Reserved By <a href="https://www.match-advertising.com/">Match Advertising</a> <!-- | Design by <a href="https://www.match-advertising.com/">Match Ad</a> & <a href="//w3layouts.com/"> W3layouts</a> -->   </p>
			</div>
		</div>
	</div>
	<!-- //footer -->

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

<!-- untuk search dan pagination   -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/list.js"></script>
<script>
	var monkeyList = new List('test-list', {
  valueNames: ['cariku','cariisi', 'carijudul'],
  page: 10,
  pagination: true
});

</script>
<!-- selesai -->
</body>
</html>