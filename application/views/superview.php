<!DOCTYPE html>
<html>
<head>
	<title>Report Karyawan</title>
	<link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.css">
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">
</head>
<body class="semua home">
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
	            <a href="<?php echo base_url(); ?>home" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> KPIM Online.</a>
	        </div>
	        <div class="collapse navbar-collapse">
	            <ul class="nav navbar-nav">           
	            </ul>
	            <ul class="nav navbar-nav navbar-right">
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                        <span style="position: absolute; margin-left: -40px; margin-top: -3px">
	                        <?php foreach ($profilku as $row) { ?>
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
	                                        <?php foreach ($profilku as $row) { ?>
	                                            <img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $row->img; ?>" alt="<?php echo $row->username; ?>" title="Foto <?php echo $row->username; ?>" style=" border-radius: 50%; border: solid 3px gray; margin-left: 10px">
	                                            <?php } ?>
	                                        </p>
	                                    </div>
	                                    <div class="col-lg-8">
	                                        <p class="text-left" style="max-width: 120px"><strong><?php echo $this->session->userdata('nama_karyawan'); ?></strong></p>
	                                        <p class="text-left small" style="max-width: 120px">
	                                        	<?php foreach ($jabatan->result() as $row) { ?>	
													<i><?php echo $row->nama_akses; ?></i>
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
	<div style="padding-bottom: 60px"></div>
		<center><img src="<?php echo base_url();?>assets/img/kpimlogo.png" alt="KIMP Online" name="KPIM Online" style="width:auto; height:90px; margin-bottom: 10px"></center>
	<div class="container-fluid" style="max-width: 600px; height: auto; background-color: black; color: white; border:solid 4px maroon; border-radius: 15px;">
		<div class="row"> 
			<label class="control-label col-xs-12 text-center" style="padding-top: 10px">Report</label>
		</div>
		<div class="row">
			<form class="form-horizontal" id="form-check">
				<div class="form-group">
					<label class="control-label col-xs-2">Tipe</label>
					<div class="col-xs-9">
						<select class="form-control" name="tipesuper" id="tipelist" data-live-search="true">
							<option value="0">KPIM Next</option>
							<option value="1">KPIM Mingguan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2">Karyawan</label>
					<div class="col-xs-9">
						<select class="form-control" name="karyawan" id="krylist" data-live-search="true">
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2">Tanggal</label>
					<div class="col-xs-4">
						<div class="input-group date" id="datetimepicker1" style="color: black">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
							<input type="text" class="form-control input-group-addon" name="tglstart" placeholder="Awal" required />
						</div>
					</div>
					<label class="control-label col-xs-1">S/D</label>
					<div class="col-xs-4">
						<div class="input-group date" id="datetimepicker2" style="color: black">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
							<input type="text" class="form-control input-group-addon" name="tglend" placeholder="Akhr" required />
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-4">
						<button type="button" class="btn btn-primary btn-block" onclick="createListNext()">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 table-responsive">
				<table id="dtb-next" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="col-xs-2 text-center">Nama</th>
							<th class="col-xs-3 text-center">Goals</th>
							<th class="col-xs-3 text-center">Deskripsi</th>
							<th class="col-xs-1 text-center">Tgl.Plan</th>
							<th class="col-xs-1 text-center">Deadline</th>
							<th class="col-xs-1 text-center">Status</th>
							<th class="col-xs-1 text-center">Action</th>
						</tr>
					</thead>
					<tbody id="tbcontent-next"></tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/moment-with-locales.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.js"></script>
	<script>
		$(document).ready(function()
		{
			$('#datetimepicker1').datetimepicker({ format: 'YYYY-MM-DD' });
			$('#datetimepicker2').datetimepicker({ format: 'YYYY-MM-DD' });
			$('#tipelist').selectpicker({});
			drop_kry();
			dtables();
		})
		function drop_kry()
        {
        	$('#krylist').empty();
            $.ajax({
	            url : "<?php echo site_url('Super/getAllKry')?>",
	            type: "GET",
	            dataType: "JSON",
            	success: function(data)
                {
                    var select = document.getElementById('krylist');
                    var option;
                    option = document.createElement('option');
                        option.value = '';
                        option.text = '--- Pilih salah satu ---';
                        select.add(option);
                    for (var i = 0; i < data.length; i++) {
                        option = document.createElement('option');
                        option.value = data[i]["id_karyawan"];
                        option.text = data[i]["nama_karyawan"];
                        select.add(option);
                    }
                    $('#krylist').selectpicker({ dropupAuto: false });
                    $('#krylist').selectpicker('refresh');
                },
            	error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax drop bank');
                }
            });
        }
        function createListNext()
        {
        	$("#dtb-next").dataTable().fnDestroy();
        	$('#tbcontent-next').empty();
			$.ajax({
	            url : "<?php echo site_url('Super/getPlanList')?>",
	            type: "POST",
	            data: $('#form-check').serialize(),
	            dataType: "JSON",
            	success: function(data)
                {
                	for (var i = 0; i < data.length; i++)
                	{
                		var tgl_in = Date.parse(data[i]["tgl"]);
                		var tgl_dl = Date.parse(data[i]["deadline"]);
                		var btn = (data[i]["id_status"] != '2')?'<td class="text-center"><button type="button" onclick="kirim_('+data[i]["id"]+')" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span> <text style="text-transform: capitalize;"> Kirim</text></button></td>':'<td class="text-center"><button type="button" class="btn btn-default btn-sm" disabled><span class="glyphicon glyphicon-edit"></span> <text style="text-transform: capitalize;"> Kirim</text></button></td>';
                		var sts = (data[i]["id_approve"] != '0')?'<td class="text-center"><button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok"></span></button><br><button type="button" onclick="note_('+data[i]["id"]+')" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span>Note</button></td>':'<td class="text-center"><button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button></td>';
                		var $tr = $('<tr>').append(
                			$('<td class="text-center">'+data[i]["nama_karyawan"]+'</td>'),
                			$('<td class="text-center">'+data[i]["nama_goals"]+'</td>'),
                			$('<td class="text-center">'+data[i]["action"]+'</td>'),
                			$('<td class="text-center" data-order="'+tgl_in+'">'+moment(data[i]["tgl"]).locale('id').format('dddd, DD-MM-YYYY')+'</td>'),
                			$('<td class="text-center" data-order="'+tgl_dl+'">'+moment(data[i]["deadline"]).locale('id').format('dddd, DD-MM-YYYY')+'</td>'),
                			$(sts),
                			$(btn)
                		).appendTo('#tbcontent-next');
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
	        $('#dtb-next').DataTable({
	          order: [[0, 'desc']],
	        });
      	}
      	function reloadTb()
      	{
      		$("#dtb-next").dataTable().fnDestroy();
      		createListNext();
      	}
      	function kirim_(id)
      	{
      		$.ajax({
				url : "<?php echo site_url('Super/sendPlan/')?>"+id,
		        type: "GET",
		        dataType: "JSON",
	            success: function(data)
	            {
	            	if(data.status)
	                {
	                	reloadTb();
	                }
	                else
	                {
	                	alert('Fail To Update Data');
	                	reloadTb();
	                }
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	            	alert('Error Happened!!!');
	            }
	        });
      	}
	</script>
</body>
</html>