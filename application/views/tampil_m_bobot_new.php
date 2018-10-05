<!DOCTYPE html>
<html>
<head>
	<title>Master Bobot</title>
	<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- <link href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">
</head>
<style type="text/css">
	.test {
    	background-color: #eee;
    }
    .panel-default > .panel-heading {
	  background-color: white;
	}
</style>
<body class="semua bg">
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
	            <!--<?php print_r($this->session->all_userdata());?>!-->
	            <a href="<?php echo base_url(); ?>home" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> KPIM Online.</a>
	        </div>
	        <div class="collapse navbar-collapse">
	            <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url();?>reportsub">KPIM Report Subordinate Mingguan</a></li>
	                <li><a href="<?php echo base_url();?>reportsubnext2">KPIM Plan Next Week</a></li>
	                <li class="active"><a href="#">Master Bobot</a></li>
	                <a class="btn btn-warning navbar-btn" href="<?php echo base_url(); ?>kpimmingguan/jadwalnilai" style="font-family: 'Exo 2', sans-serif; margin-left: 5px ">Jadwal Penilaian Terakhir KPIM</a>
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
									<img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $row->img; ?>" alt="<?php echo $row->username; ?>" title="Foto <?php echo $row->username; ?>" style=" border-radius: 50%; width: 2em; height: auto;">
                            	<?php
                        		}
                            	?>
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
												foreach ($profilku as $row)
												{ 
												?>
	                                            	<img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $row->img; ?>" alt="<?php echo $row->username; ?>" title="Foto <?php echo $row->username; ?>" style=" border-radius: 50%; border: solid 3px gray; margin-left: 10px">
	                                            <?php
	                                        	}
	                                        	?>
	                                        </p>
	                                    </div>
	                                    <div class="col-lg-8">
	                                        <p class="text-left" style="max-width: 120px"><strong><?php echo $this->session->userdata('nama_karyawan'); ?></strong></p>
	                                        <p class="text-left small" style="max-width: 120px">
	                                        	<?php
												foreach ($jabatan->result() as $row)
												{ 
												?>		
													<i><?php echo $row->nama_akses; ?></i>
												<?php
												}
												?>
												-
												<?php
												foreach ($dept->result() as $row)
												{ 
												?>		
													<b><?php echo $row->deptini; ?></b>
												<?php
												}
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
	<div style="padding-bottom: 60px"></div>
	<center>
		<img src="<?php echo base_url();?>assets/img/kpimlogo.png" alt="KIMP Online" name="KPIM Online" style="width:auto; height:70px; margin-bottom: 10px" >
	</center>
	<?php
	if($this->session->userdata('level') != 2 AND $this->session->userdata('level') != 11)
	{
	?>
	<div class="container-fluid" style="max-width: 800px; background-color: rgba(204, 204, 204, 0.3); color: black; border:solid 4px #337ab7; border-radius: 15px;">
		<div class="row"> 
			<div class="col-sm-12 text-center" style="padding-top: 10px">
				<h4>Form Master Bobot Pekerjaan</h4>
			</div>
		</div>
		<form id="form_bobot" action="<?php echo base_url();?>karyawan/simpanbobot" method="POST">
			<div class="row" style="padding-top: 15px;">
				<div class="col-sm-3"> 
					<text>Departement :</text>			
				</div>
				<div id="form_pilih_dept" class="col-sm-9">
					<select class="form-control semua" id="pilihdept" name="pilihdept" >
						<option value="">--- Pilih Departement ---</option>
						<?php 
						foreach ($isinamadept->result() as $key):
						?>
						<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
						<?php
						endforeach
						?>
			      	</select>
				</div>
			</div>
			<br>
			<div class="row" >
				<div class="col-sm-3"> 
					<text>Nama Pekerjaan :</text>
				</div>
				<div id="form_nm_pekerjaan" class="col-sm-9" style="padding-bottom: 10px">
					<input class="form-control" placeholder="Nama Pekerjaan" type="text" id="nama_pekerjaan" name="nama_pekerjaan" required>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3"> 
					<text>Nilai Bobot :</text>
				</div>
				<div id="form_pilih_nilai" class="col-sm-9" style="padding-bottom: 10px">
					<select class="form-control" id="nilai_bobot" name="nilai_bobot" placeholder="Pilih Karyawan" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="" selected="">--- Pilih Nilai Bobot ---</option>
						<option value="5">5 ( Lima ) - Ringan</option>
						<option value="6">6 ( Enam ) - Ringan</option>
						<option value="7">7 ( Tujuh ) - Sedang</option>
						<option value="8">8 ( Delapan ) - Sedang</option>
						<option value="9">9 ( Sembilan ) - Berat</option>
						<option value="10">10 ( Sepuluh ) - Berat</option>
			      </select>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<text>Status :</text>
				</div>
				<div class="col-sm-9">
					<label class="radio-inline">
				      <input type="radio" name="stsbobot" onclick="stschg()" value="0" checked>Rutinitas
				    </label>
				    <label class="radio-inline">
				      <input type="radio" name="stsbobot" onclick="stschg()" value="1">Proyek
				    </label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<text>Deadline :</text>
				</div>
				<div class="col-sm-9" id="fixdl">
					<input type="number" name="fixdldate" class="form-control">
				</div>
				<div class="col-sm-9" id="custdl">
					<div class='input-group date' id='custdldate'>     
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' class="form-control input-group-addon" name="custdltgl" placeholder="Tanggal" required/>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-sm-3">
					<text>Level :</text>
				</div>
				<div class="col-lg-9">
					<div class="checkbox">
					  	<label>
					  		<input id="alllevel" onclick="pilihlevel()" type="checkbox" value="">Pilih semua level
						</label>
					</div>
				</div>
			    <div class="col-sm-2 col-sm-offset-3">
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="1">Admin</label>
					</div>
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="2">Staff</label>
					</div>
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="3">Head</label>
					</div>
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="4">Manager</label>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="5">BOD </label>
					</div>
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="6">SPV</label>
					</div>
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="7">Assistant SPV</label>
					</div>
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="8">Assistant Manager</label>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="9">Senior Manager</label>
					</div>
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="10">Senior Staff</label>
					</div>
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="11">Non Staff</label>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="12">Freelance</label>
					</div>
					<div class="checkbox">
					  	<label><input class="level" type="checkbox" name="level[]" value="13">Direktur</label>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<button type="button" name="input" onclick="simpan()" class="btn btn-primary col-lg-12 btn-block"  style="font-family: 'Exo 2', sans-serif; margin-bottom: 10px">
						<span class="glyphicon glyphicon-floppy-save"></span> Simpan
					</button>
				</div>
			</div>
		</form>
	</div>
	<?php 
	}
	?>
	<!-- Modal simpan -->
	<div class="modal fade" id="myModal" role="dialog" style="padding-top: 100px;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title">Konfirmasi</h4>
		        </div>
		        <div class="modal-body">
		        	Apakah Anda yakin menginputkan data sebagai berikut?
	            	<table class="table">
		                <tr>
		                	<th>Departement :</th>
		                    <td id="deptnya"></td> <td></td> <td></td>
		                </tr>
		                <tr>
		                	<th>Nama Pekerjaan :</th>
		                	<td id="nama_pekerjaannya"></td> <td></td> <td></td>
						</tr>
		                <tr>
		                	<th>Nilai Bobot :</th>
		                    <td id="nilai_bobotnya"></td> <td></td> <td></td>
		                </tr>
		                <tr>
		                	<th>Status/Deadline :</th>
		                	<td id="stat_dl"></td> <td></td> <td></td>
		                </tr>
	            	</table>
		       	</div>
		        <div class="modal-footer">
		        	<div class="row">
			        	<div class="col-sm-10">
				        	<button type="button" onclick="submitbobot()" name="input" class="btn btn-primary col-sm-12" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button>
				        </div>
						<div class="col-sm-2">
			          		<button type="button" class="btn btn-default" data-dismiss="modal" style="font-family: 'Exo 2', sans-serif;">Batal</button>
			          	</div>
		          	</div>
		        </div>
		    </div>
		</div>
	</div>
	<!-- /Modal simpan -->
	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/moment.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#custdldate').datetimepicker({
				format: 'YYYY-MM-DD'
			});
			stschg();
		})
		function stschg()
		{
			var sts = $('[name="stsbobot"]:checked').val();
			if(sts != '0')
			{
				$('#fixdl').css({'display':'none'});
				$('#custdl').css({'display':'block'});
			}
			else
			{
				$('#custdl').css({'display':'none'});
				$('#fixdl').css({'display':'block'});
			}
		}
		function simpan()
		{
			if ( $('#pilihdept').val() === '' )
			{
				alert('Pilih Departement Terlebih Dahulu');
				$("#form_pilih_dept").addClass('has-error has-feedback');
				return false;
			}
			else
			{
				$("#form_pilih_dept").removeClass('has-error has-feedback');
			}
			if ( $('#nama_pekerjaan').val() === '' )
			{
				alert('Isi Nama Pekerjaan Terlebih Dahulu');
				$("#form_nm_pekerjaan").addClass('has-error has-feedback');
				return false;
			}
			else
			{
				$("#form_nm_pekerjaan").removeClass('has-error has-feedback');
			}
			if ( $('#nilai_bobot').val() === '' )
			{
				alert('Isi Nilai Bobot Terlebih Dahulu');
				$("#form_pilih_nilai").addClass('has-error has-feedback');
				return false;
			}
			else
			{
				$("#form_pilih_nilai").removeClass('has-error has-feedback');
			}
			var sts = $('[name="stsbobot"]:checked').val();
			if(sts != '0')
			{
				if($('[name="custdltgl"]').val() === '')
				{
					alert('Isi Tanggal Terlebih Dahulu');
					$('#custdldate').addClass('has-error has-feedback');
					return false;
				}
				else
				{
					$('#custdldate').removeClass('has-error has-feedback');
				}
			}
			else
			{
				if($('[name="fixdldate"]').val() === '')
				{
					alert('Isi Deadline Terlebih Dahulu');
					$('#fixdldate').removeClass('has-error has-feedback');
					return false;
				}
				else
				{
					$('#fixdldate').removeClass('has-error has-feedback');
				}
			}
			$('#myModal').modal('show');
			$("#deptnya").text($("#pilihdept option:selected").text());
			$("#nama_pekerjaannya").text($("#nama_pekerjaan").val());
			$("#nilai_bobotnya").text($("#nilai_bobot option:selected").text());
		}
		function submitbobot()
		{
			$.ajax({
                url : "<?php echo site_url('Karyawan/simpanbobot')?>",
                type: "POST",
                data: $('form').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                	if(data.status)
                    {
                    	var url = "<?php echo site_url('administrator/Finance/fin_invoice')?>";
                        window.location = url;
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('Error adding / update data');
                }
            });
		}
	</script>
</body>
</html>