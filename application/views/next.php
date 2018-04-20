<!DOCTYPE html>
<html lang="en">
<head>

<title>KPIM Online - Mingguan</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/metisMenu/metisMenu.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>!-->
<link href="assets/css/extra.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>

<!--font google!-->
<link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="bootstrap-confirm-delete.js"></script>

</head>
<body class="bg semua">

<div class="container">
	<div class="background">
		<h1><center>KPIM Online - Plan Next Week</center></h1><br><br><br><br>
		<div class="row">
			<div class="col-lg-3">
				<h4><strong>Next Week Report Periode</strong></h4>
			</div>

<form id="form_kpim" action="<?php base_url();?>kpimmingguannext/create" method="POST">

			<div class="col-lg-3 text-center">
				<div class="form-group">
					<div class='input-group date' id='datetimepicker1'>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' class="form-control" name="tgl1" placeholder="Start" />
					</div>
				</div>
			</div>

			<div class="col-lg-3 ">
				<div class="form-group text-center">
					<div class='input-group date ' id='datetimepicker2'>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' class="form-control" name="tgl2" placeholder="End"/> 
					</div>
				</div>
			</div>
		</div><br><br>
		<div class="row">
		</div>
		
		
		<div class="row">
			<div class="col-lg-2 text-right">
				<h4>Nama :</h4>
			</div>
			<div class="col-lg-3 text-left">
				<input class="form-control" size="32" id="nama" name="nama">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 text-right">
				<h4>Jabatan :</h4>
			</div>
			<div class="col-lg-3 text-left">
				<select class="form-control" id="jabatan" name="jabatan">
					<option value="Staff"><p>Staff</p></option>
					<option value="Koordinator">Koordinator</option>
					<option value="Supervisor">Supervisor</option>
					<option value="Supervisor">Head</option>
					<option value="Asisten Manager">Asisten Manager</option>
					<option value="Manager">Manager</option>
				</select>
			</div>
			<div class="col-lg-1 text-left">
				<h4>Posisi :</h4>
			</div>
			<div class="col-lg-3 text-left">
				
					<div class="form-group">
						<select class="form-control" id="dept" name="dept">
							<option value="IT">IT</option>
							<option value="HC">HC</option>
							<option value="GA">GA</option>
							<option value="MARKETING">MARKETING</option>
							<option value="FINANCE">FINANCE</option>
							<option value="LOGISTIC">LOGISTIC</option>
							<option value="PRODUCTION">PRODUCTION</option>
							<option value="SITAC">SITAC</option>
							<option value="ACCOUNTING">ACCOUNTING</option>
							<option value="SECRETARY">SECRETARY</option>
							<option value="INTERNAL">INTERNAL</option>
							<option value="AUDIT">AUDIT</option>
							<option value="INTERNAL">INTERNAL</option>
							<option value="WIPER INDONESIA">WIPER INDONESIA</option>
							<option value="TRITUNGGAL METALWORKS">TRITUNGGAL METALWORKS</option>
						</select>
					</div>
			
			</div>
		</div>

		<br><br>
		<div class="row">
			<div class="col-lg-5 text-left">
				<h4><strong>Report Plan Next Week</strong></h4>
			</div>
		</div>
		
		<div class="row">
			<!--tanggal-->
			<div class="col-lg-2">
				<div class="form-group">
					<div class='input-group date' id='datetimepicker3'>     
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' class="form-control" name="tgl" placeholder="Tanggal" id="tgl"/>
					</div>
				</div>
			</div>
			<!--goal-->
			<div class="col-lg-2">
				<!--input type='text' class="form-control" name="goal" placeholder="Goal"/-->
				<textarea class="form-control" rows="3" cols="20" placeholder="Goal" name="goals" id="goals"></textarea>
			</div>
			<!--action-->
			<div class="col-lg-2">
				<!--input type='text' class="form-control" name="action" placeholder="Action"/-->
				<textarea class="form-control" rows="3" cols="20" placeholder="Action" name="action" id="action"></textarea>
			</div>
			<!--Kendala-->
			<div class="col-lg-2">
				<!--input type='text' class="form-control" name="kendala" placeholder="Kendala" /-->
				<textarea class="form-control" rows="3" cols="20" placeholder="Kendala" name="kendala" id="kendala"></textarea>
			</div>
			<!--result-->
			<div class="col-lg-2">
				<!--input type='text' class="form-control" name="result" placeholder="Result" /-->
				<textarea class="form-control" rows="3" cols="20" placeholder="Result" name="result" id="result"></textarea>
			</div>
			<!--Dateline-->
			<div class="col-lg-2">
				<div class="form-group">
					<div class='input-group date' id='datetimepicker4'>     
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type='text' class="form-control" placeholder="Deadline" name="deadline" id="deadline">
					</div>
				</div>
			</div>
			

			
			
			<div class="col-lg-2">
			 <input type="submit" name="input"  class="btn btn-primary" value="Tambah Data">
			</div>
		</div>
		</form>	




		<!-- Button trigger modal mulai
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
		  Edit
		</button>-->

		
		<!--div class="row">
			
			<Bobot>
			<div class="col-lg-3">
				<input type='text' class="form-control" name="bobot" placeholder="Bobot 0-100%"/>
			</div>
			<target>
			<div class="col-lg-2">
				<input type='text' class="form-control" name="targetpoint" placeholder="Target(Point) 0-10" />
			</div>
			<actual>
			<div class="col-lg-2">
				<input type='text' class="form-control" name="actual" placeholder="Actual 0-10" />
			</div>
		</div-->
		<!--div class="row">
			<div class="col-lg-offset-5 col-lg-2">
			<button type="button" class="btn btn-primary"><h4>add</h4></button>
			</div>
		</div-->
		<br/>
		<div class="row">
			<div class="col-lg-12">
				<table class="table table-bordered table-hover ">
					<thead class="text-center">
					  <tr>
						<th style="text-align: center;">No</th>
						<th style="text-align: center;">Tanggal</th>
						<th style="text-align: center;">Goal</th>
						<th style="text-align: center;">Action</th>
						<th style="text-align: center;">Kendala</th>
						<th style="text-align: center;">Result</th>
						<th style="text-align: center;">Deadline</th>
						<th style="text-align: center;">Action</th>
					  </tr>
					</thead>
					<tbody >
					<?php 
					$no = 1;
					foreach($table as $u){ 
					?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $u->tgl ?></td>
							<td><?php echo $u->nama_goals ?></td>
							<td><?php echo $u->action ?></td>
							<td><?php echo $u->kendala ?></td>
							<td><?php echo $u->result ?></td>
							<td><?php echo $u->deadline ?></td>
							<td width="200px">
									<button data-toggle="modal" data-target="#myModal<?php echo $u->id ?>" type="button" class="btn btn-default btn-sm">
							          <span class="glyphicon glyphicon-edit"></span> 
							          <text style="text-transform: capitalize;"> Edit</text> 


							        </button>
			
		<!-- Modal -->
		<div class="modal fade" id="myModal<?php echo $u->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit</h4>
		      </div>
		      <div class="modal-body">
		      
		     <!--isi modal!-->

		<form id="form_kpim" action="<?php base_url();?>kpimmingguannext/update/<?php echo $u->id ?>" method="POST">
		    <div class="row">
			  	<div class="col-sm-4">
					<div class="col-lg-8">
						<h4>Tanggal :</h4>
					</div>
			 	</div>
				<div class="col-sm-8">
					<div class="col-lg-8 ">
						<div id='datetimepicker_tgledit'>
							<input id="MyDate<?php echo $u->id ?>" value="<?php echo $u->tgl ?>" type='text' class="form-control" name="tgledit" placeholder="Tanggal" disabled/> 
						</div>
					</div>
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4">
					<div class="col-lg-8">
						<h4>Goal :</h4>
					</div>
			 	</div>
				<div class="col-sm-8">
					<div class="col-lg-8 ">
						<input value="<?php echo $u->nama_goals ?>" type="text" class="form-control" id="goal" name="goaledit" placeholder="Goal">
						<!--<textarea class="form-control" rows="5" id="goal" name="goaledit"></textarea>!-->
					</div>
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4">
					<div class="col-lg-8">
						<h4>Action :</h4>
					</div>
			 	</div>
				<div class="col-sm-8">
					<div class="col-lg-8 ">
						<!--<input type="text" class="form-control" id="action" name="actionedit">!-->
						<textarea class="form-control" rows="5" id="action" name="actionedit" placeholder="Action"><?php echo $u->action ?></textarea>
					</div>
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4">
					<div class="col-lg-8">
						<h4>Kendala :</h4>
					</div>
			 	</div>
				<div class="col-sm-8">
					<div class="col-lg-8 ">
						<input value="<?php echo $u->kendala ?>" type="text" class="form-control" id="kendala" name="kendalaedit" placeholder="Kendala">
						<!--<textarea class="form-control" rows="5" id="goal" name="goaledit"></textarea>!-->
					</div>
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4">
					<div class="col-lg-8">
						<h4>Result :</h4>
					</div>
			 	</div>
				<div class="col-sm-8">
					<div class="col-lg-8 ">
						<input value="<?php echo $u->result ?>" type="text" class="form-control" id="result" name="resultedit" placeholder="Result">
						<!--<textarea class="form-control" rows="5" id="goal" name="goaledit"></textarea>!-->
					</div>
				</div>
			</div>

			<div class="row">
			  	<div class="col-sm-4">
					<div class="col-lg-8">
						<h4>Deadline :</h4>
					</div>
			 	</div>
				<div class="col-sm-8">
					<div class="col-lg-8 ">
						<div  id='datetimepicker_deadlineedit'>
							
							<input value="<?php echo $u->deadline ?>" type='text' class="form-control" name="deadlineedit" id="MyDate<?php echo $u->id ?>" placeholder="Deadline" disabled/> 
						</div>
					</div>
				</div>
			</div>




			
			<!--isi modal selesai!-->

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="submit" name="input"  class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
		<!--Modal selesai!-->
			                    <?php echo anchor('kpimmingguannext/hapus/'.$u->id,
			                    	'<button type="button" class="btn btn-default btn-sm">
							          <span class="glyphicon glyphicon-trash"></span>
							          	<text style="text-transform: capitalize;"> Hapus</text>  
							        </button>', array('class'=>'hapus', 'onclick'=>"return confirmDialog();")
							    ); ?>
			                   
							</td>

						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-offset-8" style="text-align: right; margin-right: 15px">
				<!--button type="button" class="btn btn-primary">Save</button-->
				<a class= "btn btn-primary" href="kpimmingguannext"><h5><strong>Save</strong></h5></a>
				<a class= "btn btn-primary" href="home"><h5><strong>Home</strong></h5></a>
			</div>
		</div><br><br><br>
		<div class="row">
			<p>
			<text style="font-family: 'Exo 2', sans-serif, medium">
			<b>Ketentuan pengisian nilai aktual :</b><br></text>
			<text style="font-family: 'Exo 2', sans-serif; font-style: italic;">
			1. Apabila sesuai dengan deadline maka akan mendapatkan nilai 10 (sepuluh)<br>
			2. Apabila selesai sebelum  deadline maka akan mendapatkan nilai 10 (sepuluh) plus 1 (satu) point<br>
			3. Apabila melebihi deadline tetapi sdh  tercapai (H+1)  maka akan medapatkan nilai 5 (lima)<br>
			4. Apabila melebihi deadline  (H+2) dan tdk  tercapai  maka akan medapatkan nilai 0 (nol)<br>
			5. Apabila melebihi deadline tetapi tdk  tercapai  maka akan medapatkan nilai 0 (nol) dan harus dicantumkan untuk KPIM minggu berikutnya<br>
			6. Untuk Goals yang tidak tercapai pada minggu I harus tetap di cantumkan di KPIM minggu II, apabila tidak tercapai maka nilai nya -1 (negatif)<br></text>
			</p>
		</div>

		<div class="outputClass" id="outputdiv"></div>
	
		<script type="text/javascript" src="<?php base_url();?>assets/bootstrap/js/bootstrap.js"></script>
		<script src="assets/js/moment.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script>

		function confirmDialog() {
		 return confirm('Apakah anda yakin akan menghapus data?')
		}


		$(function() {
		  $('input[id^=MyDate]').datetimepicker({ format: 'YYYY-MM-DD' });
		});
		

		$(function () {
					$('#datetimepicker1').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		$(function () {
					$('#datetimepicker2').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		$(function () {
				   $('#datetimepicker3').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		$(function () {
				   $('#datetimepicker4').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		$(function () {
				   $('#datetimepicker_tgledit').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		$(function () {
				   $('#datetimepicker_deadlineedit').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});

		$(function () {
				   $('#datetimepicker5').datetimepicker({
						//format: 'DD/MM/YYYY'
						format: 'YYYY-MM-DD'
					});         
				});
		</script>
	</div>
</div>


</body>
</html>
