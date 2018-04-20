<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Map</title>
	
	<style>
		.btn-back {
			margin: 20px;
		}
	</style>	
</head>
<body>
  -->

 <style>
 	#map-show {
 		margin: -10px 20px 20px;
 		border: 3px solid #eee
 	}
 	.input-group {
 		margin: 0 auto;
 		position: relative;
 		width: 100%;
 		margin-left: 20px;
 	}
 	#tombol2 {
 		min-height: 10px;
 		line-height: 20px;
 		margin-top: 3px;
 	}
 	.nui-simulation .nui-simulation-box {
 		padding-top: 20px;
 		padding-bottom: 5px;
 	}
 </style>
 
	<?php echo isset($map['js']) ? $map['js'] : '';?>

<div class="nui-simulation" style="margin-top: 20px;">
	<div id="simulation">
        <!-- <h3 class="nui-mobile-padding text-sub-header hidden-xs">Check Visitor</h3> -->
        <div class="nui-simulation-box">
        	<?php echo form_open(base_url() . 'Evisit/visit/showUMarker' , array('id' => 'simulation-form'));?>
				<div class="form-group">
		        	<!-- <label for="">Tanggal</label> -->
		        	<div class="form-inline">
		        		<div class="row">
			        		<div class="form-group col-md-4">
							    <div class="input-group">
							      <div class="input-group-addon">From</div>
							      <input class="form-control datepicker" id="mulai" name="mulai" type="text" data-date-format="yyyy-mm-dd" placeholder="pick date" required/>
							    </div>
							</div>
							<div class="form-group col-md-4">
							    <div class="input-group">
							      <div class="input-group-addon">To</div>
							      <input class="form-control datepicker" id="akhiri" name="selesai" type="text" data-date-format="yyyy-mm-dd" placeholder="pick date" required/>
							    </div>
							</div>
							<div class="form-group col-md-4">
								<input type="submit" id="tombol2" class="btn btn-action btn-xs-full btn-track edit-item lebar" name="submit" value="Tampil">
							</div>
						</div>
		        	</div>
		            <div id="loan-amount-help-text" class="help-block with-errors"></div>
		        </div>
			<?php echo form_close();?> 

		</div>
	</div>
</div>			

<article id="map-show">
<?php echo isset($map['html']) ? $map['html'] : '';?>
</article>
<!-- <div class="btn-back">
	<input class="btn" action="action" onclick="window.history.go(-1); return false;" type="button" value="Back" />
</div> -->
<!-- </body>
</html>
-->