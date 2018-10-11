<!DOCTYPE html>
<html>
<head>
	<title>KPIM Online - Plan Next</title>
	<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.css">
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">
</head>
<style type="text/css">
	@media screen and (max-width: 1024px) 
	{
      .jarak 
      {
        margin-bottom: 10px;
      }
      .test 
      {
    	background-color: #eee;
   	 }
    }
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
</style>
<body class="bg semua">
	<?php date_default_timezone_set('Asia/Jakarta'); ?>
	<!---Mulai navbar account!-->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	    <div class="container-fluid"> 
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span> 
	            </button>
	            <a href="<?php echo base_url();?>home" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> KPIM Online.</a>
	        </div>
	        <div class="collapse navbar-collapse">
	            <ul class="nav navbar-nav">
	                <li ><a href="<?php echo base_url();?>kpimmingguan">KPIM Mingguan</a></li>
	                <li class="active"><a href="#">KPIM Plan Next</a></li>
	                <li class="dropdown">
	                	<?php
							foreach ($inboxblmbaca as $total)
							foreach ($noteblmbaca as $totalnote)
							foreach ($planblmbaca as $totalplan)
							foreach ($noteplan as $totalnoteplan) 
							{ 
						?>
			            <a href="#" class="dropdown-toggle test" data-toggle="dropdown"><text class="blink">Notifikasi</text>
			            	<span class="caret"></span>
				                <?php if(isset($totalnote->jumlah))
				                {
				                ?> 
			                	<text style="background-color: orange; color: white; border-radius: 5px; padding: 5px 5px;  margin-right: 3px; text-align: center;">
								<?=$totalnote->jumlah?> <span class="glyphicon glyphicon-pencil"></span> 	
								</text>
				                <?php 
				            	}
				            	?>
			                <!-- batas -->
				                <?php if(isset($totalplan->jumlah))
				                {
				                ?> 
			                    <text style="background-color: #ce0808; color: white; border-radius: 5px; padding: 5px 5px;  margin-right: 3px; text-align: center;">
								<?=$totalplan->jumlah?> <span class="glyphicon glyphicon-remove"></span> 	
								</text>
			                    <?php
				                }
				                ?>
			                <!-- batas -->
				                <?php if(isset($totalnoteplan->jumlah))
				                {
				                ?> 
			                    <text style="background-color: orange; color: white; border-radius: 5px; padding: 5px 5px;  margin-right: 3px; text-align: center;">
								<?=$totalnoteplan->jumlah?> <span class="glyphicon glyphicon-pencil"></span>
								</text>
				                <?php
				                }
				                ?>
			                <!-- batas -->
				                <?php if(isset($total->jumlah))
				                {
				                ?> 
			                    <text style="background-color: black; color: white; border-radius: 5px; padding: 5px 5px;  margin-right: 3px; text-align: center;">
								<?=$total->jumlah?> <span class="glyphicon glyphicon-envelope"></span> 	
								</text>
				                <?php
				            	}
				            	?>
			        	</a>
			            	<ul class="dropdown-menu"> 
								<li>
									<a href="<?php echo base_url(); ?>kpimmingguan/replykpim">KPIM Mingguan
				                    <?php if(isset($totalnote->jumlah)){?>
			                    		<div style="background-color: orange; color: white; border-radius: 5px; padding: 5px 5px; text-align: center;">
										<?=$totalnote->jumlah?> <span class="glyphicon glyphicon-pencil"></span> Catatan Baru
										</div>
									<?php }?>
			                        </a>
			                    </li>
			                    <li>
			                    	<a href="<?php echo base_url(); ?>kpimmingguan/replykpimnext">KPIM Plan Next
			                        <?php if(isset($totalplan->jumlah)){?>
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
	                <a class="btn btn-primary navbar-btn" href="<?php echo base_url(); ?>kpimmingguan/jadwal" style="font-family: 'Exo 2', sans-serif; margin-left: 5px ">Jadwal Pengumpulan KPIM</a>
	                <?php 
					if ($this->session->userdata('level') == 1 )
					{
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
	            </ul>
	            <ul class="nav navbar-nav navbar-right">
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                        <span style="position: absolute; margin-left: -40px; margin-top: -3px">
	                        <?php
								foreach ($profilku as $row)
								{ 
							?>	
							<?php $alamatfoto =  $row->img; 
							if (empty($alamatfoto))
							{
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
													foreach ($profilku as $row) { 
												?>	
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
													foreach ($dept->result() as $row) { 
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
	                                            <a href="<?php base_url();?>login/logout" class="btn btn-danger btn-block" style="font-family: 'Exo 2', sans-serif; margin: 0px 25px ">Logout</a>
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
	<div class="container" style="width:95%">
		<div class="background">
			<h1 style="padding-top: 20px"><center>KPIM Online - Plan Next</center></h1><br><br>
			<div class="row" id="alert_">
			</div>
			<div class="row">
				<div class="col-lg-4 text-left" style="margin-left: 5px">
					<h4><strong>
						<span class="glyphicon glyphicon-user"></span> Nama  &nbsp &nbsp &nbsp&nbsp: &nbsp<?php echo $this->session->userdata('nama_karyawan'); ?>
					</strong></h4>
					<h4><strong>
						<span class="glyphicon glyphicon-briefcase"></span> Jabatan &nbsp  : &nbsp<?php echo $this->session->userdata('jabatannya'); ?>
					</strong></h4>
				</div>
			</div>
			<form id="form_kpim">
				<div class="row">
					<div class="col-lg-5 text-left" style="margin-left: 5px">
						<h4><strong>Rencana Mingguan : </strong></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<div class='input-group date tgls' id='tgl_input'>     
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
								</span>
								<input type='text' class="form-control input-group-addon" name="tgl" placeholder="Tanggal" required/>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-xs-4">
						<div class="form-group">
							<select name="tgs_dept"  id="pilihdept" class="form-control" data-live-search="true">
								<option value="all">-- Pilih Dept --</option>
								<?php foreach ($isinamadept->result() as $key): ?>
								<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<div id="jdl_konten" class="text-left" style="margin:0px 0 0 5px;">Goal/Pekerjaan :</div>
					        <select id="konten" class="form-control" name="goals" data-live-search="true">
					        	<option value="all">-- Pilih salah Satu --</option>
							</select>
						</div>
					</div>
					<div class="col-sm-5 col-xs-5">
						<textarea class="form-control jarak" rows="4" cols="40" placeholder="Description" name="action" id="action" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
					</div>
					<div class="col-sm-2 col-xs-2">
						<div class="form-group">
							<div class='input-group date tgls' id='tgl_dl'>     
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
								</span>
								<input type='text' class="form-control input-group-addon" placeholder="Deadline" name="deadline" id="deadline" readonly required>
							</div>
							<br>
							<button type="button" onclick="add_plan()" style="font-family: 'Exo 2', sans-serif; " name="input" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> Tambah Data</button>
						</div>
					</div>
				</div>
			</form>
			<div class="row">
				<div class="col-sm-12 col-xs-12 table-responsive">
                    <table id="dataTablenext" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
                        <thead class="text-center" style="background-color: #6db1ff">
                            <tr>
                            	<!-- <th class="text-center">No</th> -->
								<th class="text-center">Hari/Tanggal</th>
								<th class="text-center">Goal</th>
								<th class="text-center">Description</th>
								<th class="text-center">Deadline</th>
								<th class="text-center">Departement</th>
								<th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbcontent"></tbody>
                    </table>
                </div>
			</div>
			<div class="row">
				<div class="col-lg-12" style="margin-right: 15px">
					<div class="col-sm-2" style="float: left;">
						<a class= "btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" href="<?php echo base_url();?>kpimmingguan"><span class="glyphicon glyphicon-arrow-left"></span><h7> KPIM Mingguan</h7></a>
					</div>
					<div class="col-sm-3" style="float: right;">
						<button class= "btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" onclick="ayo(); printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print</button>
						<a class= "btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" href="<?php echo base_url();?>home"><span class="glyphicon glyphicon-home"></span><h7>  Home</h7></a>
						<button type="button" class="btn btn-warning" style="font-family: 'Exo 2'; margin-top:5px"  onclick="opensendplan()">Send</button>
					</div>
				</div>
			</div>
			<br><br><br>
			<div class="row">
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
										7. Plannext(Rencana kegiatan/pekerjaan) wajib diisi<br>
									</text>
								</p>
					      	</div>
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
								<input type="text" name="tgl_plan" class="form-control" readonly>
							</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-sm-4">
		        				<h4>Dept</h4>
		        			</div>
		        			<div class="col-sm-8">
		        				<input type="text" name="dept_plan" class="form-control" readonly>
		        				<input type="hidden" name="id_plan">
		        			</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-sm-4">
		        				<h4>Goals</h4>
		        			</div>
		        			<div class="col-sm-8">
		        				<input type="text" name="goals_plan" class="form-control" readonly>
		        			</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-sm-4">
		        				<h4>Description</h4>
		        			</div>
		        			<div class="col-sm-8">
		        				<textarea class="form-control" rows="4" name="desc_plan"></textarea>
		        			</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-sm-4">
		        				<h4>Deadline</h4>
		        			</div>
		        			<div class="col-sm-8">
		        				<input type="text" name="dl_plan" class="form-control" readonly>
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
		        		<input type="hidden" name="id_plan_hps">
		        	</form>
		       	</div>
		        <div class="modal-footer">
		        	<button type="button" style="font-family: 'Exo 2', sans-serif;" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="button" style="font-family: 'Exo 2', sans-serif;" name="input"  class="btn btn-primary" onclick="del_kpim()">Hapus</button>
		        </div>
		    </div>
		</div>
	</div>
	<div class="modal fade" id="modal_send" role="dialog" style="padding-top: 100px;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title text-center" id="myModalLabel"><b>Konfirmasi</b></h4>
		        </div>
		        <div class="modal-body" style="background-color: #2372ef; color: white;">
		        	<form id="form_send" class="form-horizontal">
		        		<h4 class="text-center">Anda akan mengirim Plan KPIM periode tanggal</h4>
		        		<h3 class="text-center"><span name="awal"></span> s/d <span name="akhir"></span></h3>
		        		<input type="hidden" name="awal_">
		        		<input type="hidden" name="akhir_">
		        		<div class="row">
		        			<div class="col-xs-6">
		        				<h4 class="text-center">Yang Harus Diinput</h4>
		        				<p id="periode" class="text-center"></p>
		        			</div>
		        			<div class="col-xs-6">
		        				<h4 class="text-center">Plan Anda</h4>
		        				<p id="periodeplan" class="text-center"></p>
		        			</div>
		        		</div>
		        	</form>
		       	</div>
		        <div class="modal-footer">
		        	<button type="button" style="font-family: 'Exo 2', sans-serif;" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="button" style="font-family: 'Exo 2', sans-serif;" name="input"  class="btn btn-primary" onclick="sendplan_()">Kirim</button>
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
			$('#tgl_input').datetimepicker({
				useCurrent: false,
				format: 'YYYY-MM-DD',
				ignoreReadonly: true,
				minDate: moment().millisecond(0).second(0).minute(0).hour(24)
			});
			$('#tgl_dl').datetimepicker({
				format: 'YYYY-MM-DD'
			});
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
            $('#tgl_input').on('dp.change', function(e){
            	get_dl(($('#konten option:selected').val()!='')?$('#konten option:selected').val():0);
            });
		})

		function add_plan()
		{
			$.ajax({
	            url : "<?php echo site_url('Kpimmingguannext/add_plannext')?>",
	            type: "POST",
	            data: $('form').serialize(),
	            dataType: "JSON",
            	success: function(data)
                {
                	if(data.status)
                	{
                		$("#dataTablenext").dataTable().fnDestroy();
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
                    alert('Error get data from ajax drop bank');
                }
            });
		}

		function opensendplan()
		{
			$.ajax({
	            url : "<?php echo site_url('Kpimmingguannext/sendplan_')?>",
	            type: "GET",
	            dataType: "JSON",
            	success: function(data)
                {
                	$('[name="awal"]').text(moment(data.monday).locale('id').format('DD-MM-YYYY'));
                	$('[name="akhir"]').text(moment(data.saturday).locale('id').format('DD-MM-YYYY'));
                	$('[name="awal_"]').text(data.monday);
                	$('[name="akhir_"]').text(data.saturday);
                	for (var i = 0; i < data['period'].length; i++)
                	{
                		var v = $('<h4>').append(data['period'][i]).appendTo('#periode');
                	}
                	for (var i = 0; i < data['perplan'].length; i++)
                	{
                		var v = $('<h4>').append(data['perplan'][i]).appendTo('#periodeplan');
                	}
                	$('#modal_send').modal('show');
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Send Plan Error');
                }
            });
		}

		function get_list()
		{
			$('#tbcontent').empty();
			$.ajax({
	            url : "<?php echo site_url('Kpimmingguannext/get_allplannext')?>",
	            type: "GET",
	            dataType: "JSON",
            	success: function(data)
                {
                	for (var i = 0; i < data.length; i++)
                	{
                		var tgl_in = Date.parse(data[i]["tgl"]);
                		var tgl_dl = Date.parse(data[i]["deadline"]);
                		var $tr = $('<tr>').append(
                			$('<td class="text-center" data-order="'+tgl_in+'">'+data[i]["tgl"]+'</td>'),
                			$('<td class="text-center">'+data[i]["nama_goals"]+'</td>'),
                			$('<td class="text-center">'+data[i]["action"]+'</td>'),
                			$('<td class="text-center" data-order="'+tgl_dl+'">'+data[i]["deadline"]+'</td>'),
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

		function dtables()
      	{
	        $('#dataTablenext').DataTable({
	          order: [[0, 'desc']],
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
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Pilih Goals');
                }
            });
        }

        function edit_(id)
        {
        	$.ajax({
	            url : "<?php echo site_url('Kpimmingguannext/get_plannext/')?>"+id,
	            type: "GET",
	            dataType: "JSON",
            	success: function(data)
                {
                	$('[name="id_plan"]').val(data.id);
                	$('[name="tgl_plan"]').val(data.tgl);
                	$('[name="dept_plan"]').val(data.nama_dept);
                	$('[name="goals_plan"]').val(data.nama_goals);
                	$('[name="desc_plan"]').val(data.action);
                	$('[name="dl_plan"]').val(data.deadline);
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
        	$('[name="id_plan_hps"]').val(id);
        	$('#modal_hapus').modal('show');
        }
	</script>
</body>
</html>