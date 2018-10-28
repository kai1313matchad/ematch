<!DOCTYPE html>
<html lang="en">
<head>
	<title>KPIM Online | Report Subordinate</title>
	<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.css">
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">
</head>
<body class="kedua semua">
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
	                <li><a href="<?php echo base_url();?>reportsub">KPIM Report Subordinate</a></li>
	                <li class="active"><a href="#">KPIM Plan Next Week</a></li>
	                <?php 
					if ($this->session->userdata('level') == 1 ){
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
					} ?>
	            </ul>
	            <ul class="nav navbar-nav navbar-right">
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                        <span style="position: absolute; margin-left: -40px; margin-top: -3px"><?php
							foreach ($profilku as $row){ ?>
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
	                                        <?php foreach ($profilku as $row){ ?>
	                                            <img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $row->img; ?>" alt="<?php echo $row->username; ?>" title="Foto <?php echo $row->username; ?>" style=" border-radius: 50%; border: solid 3px gray; margin-left: 10px">
	                                        <?php } ?>
	                                        </p>
	                                    </div>
	                                    <div class="col-lg-8">
	                                        <p class="text-left" style="max-width: 120px"><strong><?php echo $this->session->userdata('nama_karyawan'); ?></strong></p>
	                                        <p class="text-left small" style="max-width: 120px">
	                                        	<?php foreach ($jabatan->result() as $row){ ?>
													<i><?php echo $row->nama_akses; ?></i>
												<?php } ?>
												-
												<?php foreach ($dept->result() as $row){ ?>
													<b><?php echo $row->deptini; ?></b>
												<?php } ?>
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
	<div class="container">
		<div class="background">
			<div id='div1'>
				<input type="hidden" name="subordinat" value="<?= $nama->id_karyawan ?>">
				<input type="hidden" name="tglstart" value="<?= $piltglstart ?>">
				<input type="hidden" name="tglend" value="<?= $piltglend ?>">
				<h1 style="padding-top: 20px"><center>KPIM Online - Plan Next Week</center></h1><br><br>
				<input type="hidden" name="strDt" value="<?= $piltglstart; ?>">
				<input type="hidden" name="endDt" value="<?= $piltglend; ?>">
				<div class="row">
					<div class="col-lg-6 text-left">
						<h4><text style="word-spacing: 20px">Nama </text> <text>: <?php echo $nama->nama_karyawan; ?></text></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 text-left">
						<h4 style="word-spacing: 5px">Tanggal <text>: </text>  <text name="tglStart"></text><text style="color: #c96604; font-style: italic;"> S/D </text><text name="tglEnd"></text></h4> 
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-lg-12 table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead class="text-center" style="background-color: #f9bc2c">
							  <tr>
								<!-- <th class="text-center">No</th> -->
								<th class="col-xs-1 text-center">Tanggal</th>
								<th class="col-xs-2 text-center">Goal</th>
								<th class="col-xs-3 text-center">Action</th>
								<th class="col-xs-1 text-center">Departement</th>
								<th class="col-xs-1 text-center">Deadline</th>
								<th class="col-xs-1 text-center">Approved</th>
								<th class="col-xs-3 text-center">Note</th>
							  </tr>
							</thead>
							<tbody id="tbContent">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row ">
		  		<div class="col-sm-12" style="text-align: right;">
		  			<div style="float: left;">
		  				<button class="btn btn-success" style="font-family: 'Exo 2', sans-serif; margin-top:5px;" onclick="printContent('div1'); window.location.reload();return false;"><span class="glyphicon glyphicon-print"></span> Print Plan Next Week</button> <text style="color:blue"></text>
		  			</div>
					<form id="form_kpim" action="<?php base_url();?>reportsubnext2/updatestatus" method="POST">
						<a class= "btn btn-primary" href="<?php echo base_url(); ?>reportsubnext2" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><i><span class="glyphicon glyphicon-arrow-left"></span> Kembali</i></h7></a>
						<a class= "btn btn-primary" href="<?php echo base_url(); ?>home" style="margin-top:5px; font-family: 'Exo 2', sans-serif;"><h7><span class="glyphicon glyphicon-home"></span> Home</h7></a>
						<input type='hidden' class="form-control" name="isistatus" value="3" />
						<input type="hidden" name="input"  class="btn btn-warning" value="Send">
					</form>
		  		</div>
			</div>
		</div>
	</div><br><br><br>
	<div class="container">
		<div class="dialogbox">
			<div class="body">
		    	<span class="tip tip-up"></span>
				<div class="message">
		    		<p class="info">
						<text style="font-family: 'Exo 2', sans-serif, medium">
							<b>Ketentuan pengisian nilai aktual :</b><br>
						</text>
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
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Approved</h4>
					</div>
					<div class="modal-body">
						<!-- <form id="form_kpim" action="<?php echo base_url();?>reportsubnext2/updateapprove/<?php echo $u->id ?>" method="POST"> -->
						<select name="approve" class="form-control" required>
							<option value="">-- Pilih --</option>
							<option value="1" <?php if($u->id_approve == 1){echo 'selected' ;}; ?>>Disetujui</option>
							<option value="2" <?php if($u->id_approve == 2){echo 'selected' ;}; ?>>Tidak disetujui</option>
						</select>
						<input type="hidden" name="id" value="<?php echo $idkar;?>">
						<input type="hidden" name="piltglstart" value="<?php echo $piltglstart;?>">
						<input type="hidden" name="piltglend" value="<?php echo $piltglend;?>">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" style="font-family: 'Exo 2', sans-serif; "><span class="glyphicon glyphicon-floppy-remove"></span> Batal</button>
			        	<button type="submit" name="input"  class="btn btn-primary" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</div>
				</div>
			</div>
	</div>
	<div class="modal fade" id="modal_noteAdd" role="dialog" style="padding-top: 100px;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title text-center" id="myModalLabel"><b>Tulis Catatan</b></h4>
		        </div>
		        <div class="modal-body" style="background-color: #2372ef; color: white;">
		        	<form id="form_note" class="form-horizontal">
		        		<div class="row">
		        			<div class="form-group">
		        				<div class="col-xs-offset-2 col-xs-8">
		        					<textarea class="form-control" name="notes"></textarea>
		        					<input type="hidden" name="subid_notes">
		        				</div>
		        			</div>
		        		</div>
		        	</form>
		       	</div>
		        <div class="modal-footer">
		        	<button type="button" style="font-family: 'Exo 2', sans-serif;" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="button" style="font-family: 'Exo 2', sans-serif;" name="input"  class="btn btn-primary" onclick="saveNote_()">Simpan</button>
		        </div>
		    </div>
		</div>
	</div>
	<!-- modal -->
	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/moment-with-locales.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.js"></script>
	<script>
		$(document).ready(function(){
			getTables();
			$('[name="tglStart"]').text(moment($('[name="strDt"]').val()).locale('id').format('dddd, DD-MM-YYYY'));
			$('[name="tglEnd"]').text(moment($('[name="endDt"]').val()).locale('id').format('dddd, DD-MM-YYYY'));
		})
		function getTables()
		{
			$('#tbContent').empty();
			$.ajax({
	            url : "<?php echo site_url('Reportsubnext2/get_allplannext')?>",
	            type: "POST",
	            data: $('input').serialize(),
	            dataType: "JSON",
            	success: function(data)
                {
                	for (var i = 0; i < data.length; i++)
                	{
                		var tgl_in = Date.parse(data[i]["tgl"]);
                		var tgl_dl = Date.parse(data[i]["deadline"]);
                		var note = (data[i]["note"] == null)?'':data[i]["note"];
                		var btn = (data[i]["id_approve"] != '0')?'<td class="text-center"><button type="button" onclick="disapprove_('+data[i]["id"]+')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok"></span></button></td>':'<td class="text-center"><button type="button" onclick="approve_('+data[i]["id"]+')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button></td>';
                		var $tr = $('<tr>').append(
                			$('<td class="text-center" data-order="'+tgl_in+'">'+moment(data[i]["tgl"]).locale('id').format('dddd, DD-MM-YYYY')+'</td>'),
                			$('<td class="text-center">'+data[i]["nama_goals"]+'</td>'),
                			$('<td class="text-center">'+data[i]["action"]+'</td>'),
                			$('<td class="text-center">'+data[i]["nama_dept"]+'</td>'),
                			$('<td class="text-center" data-order="'+tgl_dl+'">'+moment(data[i]["deadline"]).locale('id').format('dddd, DD-MM-YYYY')+'</td>'),
                			$(btn),
                			$('<td><button type="button" onclick="note_('+data[i]["id"]+')" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></button><br>'+note+'</td>')
                		).appendTo('#tbContent');
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
		function note_(id)
		{
			$.ajax({
	            url : "<?php echo site_url('Reportsubnext2/get_plannext/')?>"+id,
	            type: "GET",
	            dataType: "JSON",
            	success: function(data)
                {
                	var note = (data.note == null)?'':data.note;
                	$('[name="notes"]').val(note);
                	$('[name="subid_notes"]').val(data.id);
                	$('#modal_noteAdd').modal('show');
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax drop bank');
                }
            });
		}
		function saveNote_()
		{
			if($('[name="notes"]').val() == '')
			{
				alert('Notes Kosong');
			}
			else
			{
				$.ajax({
		            url : "<?php echo site_url('Reportsubnext2/up_notesplannext')?>",
		            type: "POST",
		            data: $('#form_note').serialize(),
		            dataType: "JSON",
	            	success: function(data)
	                {
	                	if(data.status)
	                	{
	                		getTables();
	                		$('#modal_noteAdd').modal('hide');
	                	}
	                	else
	                	{
	                		alert('Ada Yang Salah');
	                	}
	                },
	            	error: function (jqXHR, textStatus, errorThrown)
	                {
	                    alert('Error get data from ajax drop bank');
	                }
	            });
			}
		}
		function approve_(id)
		{
			$.ajax({
	            url : "<?php echo site_url('Reportsubnext2/approve_plannext/')?>"+id,
	            type: "GET",
	            dataType: "JSON",
            	success: function(data)
                {
                	if(data.status)
                	{
                		getTables();
                	}
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax drop bank');
                }
            });
		}

		function hanyaAngka(e, decimal)
		{
			var key;
			var keychar;
		    if (window.event)
		    {
		    	key = window.event.keyCode;
		    }
		    else if (e)
		    {
		    	key = e.which;
		    } 
		    else 
			return true;
		    keychar = String.fromCharCode(key);
		    if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) )
		    {
		        return true;
		    }
		    else if ((("0123456789").indexOf(keychar) > -1))
		    {
		        return true;
		    }
		    else if (decimal && (keychar == "."))
		    {
		    	return true;
		    }
		    else
		    return false;
		}
	</script>
	<script>
		function confirmDialog()
		{
			return confirm('Apakah anda yakin akan menghapus data?')
		}
		$(function() 
		{
		  $('input[id^=MyDate]').datetimepicker({ format: 'YYYY-MM-DD' });
		});
		$(function ()
		{
			$('#datetimepicker1').datetimepicker({
				format: 'YYYY-MM-DD'
			});         
		});
		$(function ()
		{
			$('#datetimepicker2').datetimepicker({
				format: 'YYYY-MM-DD'
			});         
		});
		$(function ()
		{
			$('#datetimepicker3').datetimepicker({
				format: 'YYYY-MM-DD'
			});         
		});
		$(function ()
		{
			$('#datetimepicker4').datetimepicker({			
				format: 'YYYY-MM-DD'
			});         
		});
		$(function ()
		{
			$('#datetimepicker_tgledit').datetimepicker({
				format: 'YYYY-MM-DD'
			});         
		});
		$(function ()
		{
			$('#datetimepicker_deadlineedit').datetimepicker({			
				format: 'YYYY-MM-DD'
			});         
		});
		$(function ()
		{
			$('#datetimepicker5').datetimepicker({			
				format: 'YYYY-MM-DD'
			});         
		});
		</script>
	<script>
		function printContent(el)
		{
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}
	</script>
</body>
</html>
