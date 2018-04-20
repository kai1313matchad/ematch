<!DOCTYPE html>
<html lang="en">
<head>
  <title>KPIM Online</title>
  <meta charset="utf-8">
  <link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="assets/metisMenu/metisMenu.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/sendiri.css" rel="stylesheet" type="text/css" media="screen"></link>

  <!--font google!-->
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <!--font google!-->
  <link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">

  <style type="text/css">
  	#atas div, #atas img  {
  		padding: 0;
  	}
  	@media screen and (min-width: 1204px) {
	    #atas img:nth-child(2n-1) {
	  		float: right !important;
	  	}
	  	#atas img:nth-child(2n){
	  		float: left !important;
	  	}
	}

	@media screen and (min-width: 768px) {
	    #atas img:nth-child(2n-1) {
	  		float: right !important;
	  	}
	  	#atas img:nth-child(2n+0){
	  		float: left !important;
	  	}
	}

	@media screen and (min-width: 480px) {
	    #atas img:nth-child(2n-1) {
	  		*float: right !important;
	  	}
	}

	.bordershadow {transition: all ease .2s;
	}

	.bordershadow:hover {
		padding-right: 5px;
	
	}
  	
  </style>
  

</head>
<body class="home">

<?php if ($this->session->flashdata('message_name')) { ?>
	<div class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <?= $this->session->flashdata('message_name') ?>
  	</div>
    
<?php } ?>

			<?php 
				if ($this->session->userdata('level') == 1 ) { ?>

				<?php
					foreach ($profilku as $row) { 
				?>	
                <!-- <span class="glyphicon glyphicon-user icon-size"></span> -->
                <div style="display: block;">
		  	<a href="<?php echo base_url() ?>karyawan">
                <img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $row->img; ?>" alt="<?php echo $row->username; ?>" title="Foto <?php echo $row->username; ?>" style=" border-radius: 50%; border: solid 3px gray; width:auto; height:70px; float: right;
            position: relative; margin:20px 20px 0px 0px;">
                </a>
                </div>
                <?php } ?>
			<?php }
			?>

	<!-- <div style="display: block;">
	  	<a href="<?php echo base_url();?>index">
	  	<div class="buttoniki"><img src="<?php echo base_url();?>assets/img/homebutton.png" style="width:auto; height:100px; float: left;
	    position: relative; padding:20px 0px 0px 20px;"></div>
	  	</a>
  	</div> -->
  	<?php if($this->session->userdata('level') == 12 ) {?>
	  	<br>
	  	<div class="row" style="padding: 0px 0px 0px 20px">
	  	<a href="<?php echo base_url();?>login/logout"><button style="font-family: 'Exo 2', sans-serif; " class="btn btn-danger col-md-2"><span class="glyphicon glyphicon-log-out"></span><text style="text-transform: capitalize;"> Logout</text></button></a>
		</div>

  	<?php } else { ?>
  	<br>
  	<div class="row" style="padding: 0px 0px 0px 20px">
  	<a href="<?php echo base_url();?>index"><button style="font-family: 'Exo 2', sans-serif; " class="btn btn-success col-md-2"><span class="glyphicon glyphicon-home"></span><text style="text-transform: capitalize;"> Home E-Match</text></button></a>
	</div>
	<?php } ?>


<div class="container " >
	<div class="row">

	<center>
		<img src="<?php echo base_url();?>assets/img/kpimlogo.png" alt="KIMP Online" class="img-responsive" name="KPIM Online" style="width:auto; max-height:100px; margin-top: 10px; padding: 0px 10px 0px 10px" >
		

		<br/><br/>
		

		<div class="col-sm-12">
			
		</div>


		<div class="row container-fluid">
		  <div class="col-sm-6">
		  	<a href="<?php echo base_url();?>kpimmingguan">
		  	<img src="<?php echo base_url();?>assets/img/report_mingguan.png" alt="report_mingguan" class="img-responsive" style="width:auto; max-height:200px;">
		  	</a>
		  </div>

		  <div class="col-sm-6">
		  	<a href="<?php echo base_url();?>reportsub">
		  	<img  src="<?php echo base_url();?>assets/img/report_sub.png" alt="report_mingguan" class="img-responsive" style="width:auto; max-height:200px;" >
			</a>
		  </div>
		</div>


		<div class="col-sm-12">
		<a href="<?php echo base_url();?>reportkaryawan">
			<img src="<?php echo base_url();?>assets/img/report_karyawan.png" class="img-responsive " alt="report_sub" style="width:auto; height:auto">
		</a>
		</div>
				
	</div>
</div>
<br/>
<center>
<div class="col-sm-12" style="display:inline-block; padding-bottom: 20px">
<img src="<?php echo base_url();?>assets/img/match.png" alt="" class="img-responsive" style="width:auto; height:70px; float:center; display:inline" >
<img src="<?php echo base_url();?>assets/img/tritunggal.png" alt="Tritunggal" class="img-responsive" style="width:170px; height:50px; float:center; display:inline" >
<img src="<?php echo base_url();?>assets/img/wp.png" alt="" class="img-responsive" style="width:auto; height:70px; float:center; display:inline" >
</div>
<br/>

<!--<text style="padding-bottom: 10px;  font-family: 'Josefin Sans', sans-serif; font-size: 14px; color:red;">Copyright @2017 By Match Advertising</text>!-->

</center>

</center>
<script type="text/javascript">
<!--
 
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
 
});
//-->
</script>
</body>
</html>
