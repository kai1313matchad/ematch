<!DOCTYPE html>
<html>
<head>
	<title>Subordinate</title>
	<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript" scr="<?php echo base_url(); ?>/assets/js/jquery-1.11.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

	
</head>
<style type="text/css">
	.test {
    	background-color: #eee;
    }

    .panel-default > .panel-heading {
	  background-color: white;
	}

</style>
<body class="semua ketiga">
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
                    <!-- <li><a href="<?php echo base_url(); ?>reportsub">KPIM Report Subordinate Mingguan</a></li>
                    <li><a href="<?php echo base_url(); ?>reportsubnext2">KPIM Plan Next Week</a></li> -->
                    <li >
	                    <a href="<?php echo base_url(); ?>reportkaryawan" >Grafik Report Karyawan </a>
	                    
                    </li>

                    <?php 
					if ($this->session->userdata('id_dept') == 2 || $this->session->userdata('level') == 1 ) { ?>
                    
                    <li class=""><a href="<?php echo base_url(); ?>kpimmingguan/ijin">Ijin Karyawan</a></li>
                    <li><a href="<?php echo base_url(); ?>pengumuman/libur">Hari Libur</a></li>
                    
                    <?php } ?>

                    <?php 
					if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5 ) { ?>
                    
                    <li class="active" ><a href="<?php echo base_url(); ?>karyawan/subordinate">Susunan Subordinate</a></li>

                    <li class="dropdown">
	                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Laporan <span class="caret"></span></a>
	                    <ul class="dropdown-menu">
	                    	<li><a href="<?php echo base_url(); ?>Laporan">Laporan Entry Karyawan</a></li>
	                    	<li><a href="<?php echo base_url(); ?>nilai">Nilai Rata-Rata Karyawan</a></li>
	                    </ul>
                    </li>  
                    <?php } ?>

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
		<!-- <h1 style="padding-top: 20px; color: #0f6296"><center>Pesan</center></h1> -->

<?php 
if ($this->session->userdata('level') != 2 AND $this->session->userdata('level') != 11) {
?>
	<div class="container-fluid" style="max-width: 800px; background-color: rgba(204, 204, 204, 0.3); color: black; border:solid 4px #337ab7; border-radius: 15px;">

		<div class="row"> 
			<div class="col-sm-12 text-center" style="padding-top: 10px"><h4>Form Subordinate KPIM</h4></div>
		</div>
	
		<!-- <form id="form_kpim" action="<?php echo base_url();?>karyawan/simpansubordinate" method="POST"> -->

		
		<div class="row" style="padding-top: 15px; background-color: #f45642">
			<center style="font-weight: bold; padding-bottom:10px">Penilai : </center>
			<div class="col-sm-2"> 
			<text style="word-spacing: 5px">Departement :</text>
			
			</div>




			<div class="col-sm-4" style="padding-bottom: 10px">
				<select class="form-control semua" id="pilihdept" name="pilihdept" >
				<option>--- Pilih Departement ---</option>
					<?php foreach ($isidept->result() as $key): ?>
						<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
					<?php endforeach ?>

			      </select>
			      <input type="hidden" value="<?php echo $this->session->userdata('id_karyawan'); ?>" id="idkar">
			      <input type="hidden" value="<?php echo $this->session->userdata('level'); ?>" id="jab">
			      <input type="hidden" value="<?php echo $this->session->userdata('hak_akses'); ?>" id="hak">
			      
			</div>

			<div class="col-sm-2"> 
				<text style="word-spacing: 20px">Karyawan :</text>
			</div>

			<div class="col-sm-4" style="padding-bottom: 10px">
				<select class="form-control" id="namakar" name="pilihkar" placeholder="Pilih Karyawan" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
				
				
		      </select>
			</div>
		</div>
		<script type="text/javascript">
			function ambilkaryawan(){
				
				$('#pilihdept').change(function() {
					//var id = {id:$('#pilihdept').val()};
					//var idkar = {idkar:$('#idkar').val()};
				    $.ajax({
				        type: "POST",
				        url: "<?php echo base_url().'karyawan/get_karyawan'; ?>",
				        data: {id:$('#pilihdept').val(), idkar:$('#idkar').val(), jab:$('#jab').val(), hak:$('#hak').val()}, //id,
				        success: function(resp){
				                $("#namakar").html(resp);
				        },
				        error:function(event, textStatus, errorThrown) {
				            $("#namakar").html('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				        },
				        timeout: 4000
						    });
						});    
					}

				ambilkaryawan();
		</script>

		<br>
		

		<div class="row" style="padding-top: 15px; background-color: #f4bb41">
			<center style="font-weight: bold; padding-bottom: 10px">Dinilai : </center>
			<div class="col-sm-2"> 
			<text style="word-spacing: 5px">Departement :</text>
			
			</div>




			<div class="col-sm-4" style="padding-bottom: 10px">
				<select class="form-control semua" id="pilihdept2" name="pilihdept" >
				<option>--- Pilih Departement ---</option>
					<?php foreach ($isidept->result() as $key): ?>
						<option value="<?php echo $key->id_dept;?>"> <?php echo $key->nama_dept;?></option>
					<?php endforeach ?>

			      </select>
			      <input type="hidden" value="<?php echo $this->session->userdata('id_karyawan'); ?>" id="idkar2">
			      <input type="hidden" value="<?php echo $this->session->userdata('level'); ?>" id="jab2">
			      <input type="hidden" value="<?php echo $this->session->userdata('hak_akses'); ?>" id="hak2">
			      
			</div>

			<div class="col-sm-2"> 
				<text style="word-spacing: 20px">Karyawan :</text>
			</div>

			<div class="col-sm-4" style="padding-bottom: 10px">
				<select class="form-control" id="namakar2" name="pilihkar2[]" placeholder="Pilih Karyawan" size="6" multiple="multiple" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
				
				
		      </select>
			</div>
		</div>

		<script type="text/javascript">
			function ambilkaryawan(){
				
				$('#pilihdept2').change(function() {
					//var id = {id:$('#pilihdept').val()};
					//var idkar = {idkar:$('#idkar').val()};
				    $.ajax({
				        type: "POST",
				        url: "<?php echo base_url().'karyawan/get_karyawanygdinilai'; ?>",
				        data: {id:$('#pilihdept2').val(), idkar:$('#idkar2').val(), jab:$('#jab2').val(), hak:$('#hak2').val(), penilai:$('#namakar').val()}, //id,
				        success: function(resp){
				                $("#namakar2").html(resp);
				        },
				        error:function(event, textStatus, errorThrown) {
				            $("#namakar2").html('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				        },
				        timeout: 4000
						    });
						});    
					}

				ambilkaryawan();
				
		</script>

		

		

		<br>
		<div class="row">
			
			<div class="col-sm-12">
			

			<button type="button" name="input" id="konfirmasi" class="btn btn-primary col-lg-12 btn-block" data-toggle="modal" data-target="#myModal" style="font-family: 'Exo 2', sans-serif; margin-bottom: 10px"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button>
			</div>
			
		</div>

		<!-- Modal simpan ijin-->
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
	                        <th>Nama Penilai :</th>
	                        <td id="namanya"></td> <td></td> <td></td>
	                    </tr>
	                    <tr>
	                        <th>Nama yang dinilai :</th>
	                        <td id="namanya2"></td> <td></td> <td></td>
	                    </tr>
	                </table>
		        </div>
		        <div class="modal-footer">
		        	<div class="row">
			        	<div class="col-sm-10">
				         <button type="button" id='simpansubordinate' name="input" data-dismiss="modal" class="btn btn-primary col-sm-12" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button>
				         </div>
						
						<div class="col-sm-2">
			          	<button type="button" class="btn btn-default" data-dismiss="modal" style="font-family: 'Exo 2', sans-serif;">Batal</button>
			          	</div>
		          	</div>
		        </div>
		      </div>
		    </div>
		  </div>
		<!-- modal selesai -->

		<script>
		$( "#namakar2" )
		.change(function() {
		    var str = "";
		    $( "#namakar2 option:selected" ).each(function() {
		      str += $( this ).text() + ", ";
		    });
		    $('#namanya').text( $('#namakar option:selected').text()); 
		    $( "#namanya2" ).text( str );
		  })
		.trigger( "change" );


		// $('#konfirmasi').click(function() {
		//      $('#namanya').text( $('#namakar option:selected').text()); 
		//      // $('#namanya2').text($('#namakar2 option:selected').text()); 
		// });
		</script>

		<!-- </form> -->
	</div>

<?php } ?>

		<!-- ajax untuk menyimpan -->
		<script type="text/javascript">
			function ambilkaryawan(){
				$('#simpansubordinate').click(function() {
					//var id = {id:$('#pilihdept').val()};
					//var idkar = {idkar:$('#idkar').val()};
				    $.ajax({
				        type: "POST",
				        url: "<?php echo base_url();?>karyawan/simpansubordinate",
				        data: {pilihkar:$('#namakar').val(), pilihkar2:$('#namakar2').val()},
				        success: function(resp){
				        		// $("#tabel_subordinate").ajax.reload();
				        		$('#konten').empty();
				        		ambil_data();
				        		// reload();
				                // $("#namakar2").html(resp);
				        },
				        error:function(event, textStatus, errorThrown) {
				            alert('Error Message: '+ textStatus + ' , HTTP Error: '+errorThrown);
				        },
				        timeout: 4000
						    });
						});    
					}
				ambilkaryawan();
		</script>



		<!-- <div class="container">
			yang menilai
			<?php foreach ($satu as $s){
			echo $s->namapenilai;
			} ?>
			<br>
		yang dinilai

			<?php foreach ($satu as $s){
			var_dump($s->id_dinilai) . '<br>';
			$a = $s->idygdinilai;

			// hasil array yg dinilai
			$b = (explode(",",$a));

			var_dump($b);

			} ?>

				<?php foreach ($b as $c){ ?>

					<div class="checkbox">
				      <label><input type="checkbox" value=""><?php echo $c ?></label>
				    </div>

				<?php } ?>

				 

			
			
		</div> -->
		
			

	
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

										<th style="text-align: center;">Action</th>
									  </tr>
									</thead>
									<tbody id="konten">

									<!-- <?php 
									$no = 1;
									foreach($table as $u){ 
									?>
										<tr>
											<td><?php echo $no++ ?></td>
											
											<td style=" max-width: 150px; word-wrap: break-word; overflow: auto;"><?php echo $u->namapenilai ?></td>
											
											<td><ol><li><?php echo $u->subnya ?></li></ol></td>
											
											
											
											<td width="150px">
							                    <button type="button" class="btn btn-default btn-sm" data-target="#myModalhapus<?php echo $u->idsub ?>" data-toggle="modal" name="input" class="btn btn-default" style="font-family: 'Exo 2', sans-serif; text-transform: capitalize;"> <span class="glyphicon glyphicon-trash"></span> Hapus
												</button>
							                   

											    
												<div class="modal fade" id="myModalhapus<?php echo $u->idsub ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
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
															<form id="form_kpim" method="POST" action="<?php echo base_url();?>karyawan/hapussubordinate/<?php echo $u->idsub?>">
														      	<button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal">Batal</button>
															<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary">Hapus</button>
															</form>
												      </div>
												    </div>
												  </div>
												</div>
							                   
											</td>

										</tr>
									<?php } ?> -->
									</tbody>
								</table>
							</div><!-- ini tutup div pesan terkirim -->
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class= "btn btn-primary" style="font-family: 'Exo 2', sans-serif; margin:5px 0 20px 0;" onclick=" ayo(); printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print</button>

    <div class="modal fade" id="myModalhapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 100px;">
	  <div class="modal-dialog vertical-align-center" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
	      </div>
	      <div class="modal-body" style="background-color: #2372ef; color: white">
	        <h4>Yakin hapus ?</h4>
	        <input type="hidden" name="idsub">
	      </div>
	      <div class="modal-footer">
				<form id="form_hapus" method="POST" action="">
			      	<button type="button" style="font-family: 'Exo 2', sans-serif; " class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="submit" style="font-family: 'Exo 2', sans-serif; " class="btn btn-primary">Hapus</button>
				</form>
	      </div>
	    </div>
	  </div>
	</div>

    <script type="text/javascript">
    	$(document).ready(function(){
    		ambil_data();

	    });
	    function ambil_data()
	        {            
	        	$('#tabel_subordinate').DataTable().destroy();
	            //Ajax Load data from ajax
	            $.ajax({
	                url : "<?php echo site_url('karyawan/datasubordinate')?>",
	                type: "GET",
	                dataType: "JSON",
	                success: function(data)
	                { 
	                	$('#konten').empty();
	                	                     
	                    for (var i = 0; i < data.length; i++) {
	                      var $tr = $('<tr>').append(
	                            $('<td>').text(i+1),
	                            $('<td>').text(data[i]["namapenilai"]),
	                            $('<td><ol style="text-align:left"><li>'+data[i]["subnya"]+'</li></ol></td>'),
	                            $("<td width='50px'><a href='<?php echo base_url() ?>karyawan/pageupdate/"+data[i]["idsub"]+"'><button type='button' class='btn btn-warning btn-sm' name='input' class='btn btn-default' style='font-family: 'Exo 2', sans-serif; text-transform: capitalize;'> <span class='glyphicon glyphicon-edit'></span> <span style=' text-transform: capitalize;'>Edit</span></button></a><button type='button' class='btn btn-default btn-sm' onclick='test("+data[i]["idsub"]+")' name='input' class='btn btn-default' style='font-family: 'Exo 2', sans-serif; text-transform: capitalize;'> <span class='glyphicon glyphicon-trash'></span> <span style=' text-transform: capitalize;'>Hapus</span></button></td>")
	                            

	                            ).appendTo('#konten');
	                    }
	                    $('#tabel_subordinate').DataTable();
	                },
	                error: function (jqXHR, textStatus, errorThrown)
	                {
	                    alert('Error get data from ajax');
	                }
	            });
	        }
	    function test(id){
	    	$('#myModalhapus').modal('show');
	    	var url = '<?php echo base_url(); ?>karyawan/hapussubordinate/' + id;
	    	$('#form_hapus').attr('action', url);
	    }
    </script>

    <script>


		function ayo(){
	        $("#tabel_subordinate").css({"font-size":"18px"});
	        $("#tabel_subordinate td:nth-child(4)").css({'display':'none'});
	        $("#tabel_subordinate th:nth-child(4)").css({'display':'none'});

	        $('#tabel_subordinate_length').css({'display':'none'});
	        $('#tabel_subordinate_filter').css({'display':'none'});
	        $('#tabel_subordinate_paginate').css({'display':'none'});
	        $('#tabel_subordinate_info').css({'display':'none'});


	    }

		function printContent(el){
		    var restorepage = document.body.innerHTML;
		    var printcontent = document.getElementById(el).innerHTML;
		    document.body.innerHTML = printcontent;
		    window.print();
		    document.body.innerHTML = restorepage;

		}


	</script>


	<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>assets/js/moment.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
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

	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
		// $('#tabel_subordinate').DataTable();
	} );
	</script>


</body>
</html>