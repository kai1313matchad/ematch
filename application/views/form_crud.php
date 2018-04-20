<!DOCTYPE html>
<html>
<head>
	<title>Crud</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>
	<style type="text/css">
		.container {
			margin-top: 30px;
		}
	</style>
</head>
<body>

<div class="container">

	<div class="row">
		<div class="col-md-6">
				<form class="form-horizontal" method="POST" action="<?php base_url();?>crud/create">
					  <div class="form-group">
					    <label for="dept" class="col-sm-2 control-label">Nama Departemen</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="dept" placeholder="Departemen" name="departemen">
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary">Submit</button>
					    </div>
					  </div>
				</form>
		</div>
	</div>
	
	

</div>
</body>
</html>