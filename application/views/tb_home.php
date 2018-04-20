<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/extra.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<title>New Time Table Application</title>
	<!-- Icon Peringatan & Reward -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- datatable -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <style>
  .iki.table-striped>tbody>tr:nth-child(odd)>td, 
  .iki.table-striped>tbody>tr:nth-child(odd)>th {
    background-color: #1452b7; color:white;
   }
   </style>
</head>
<body class="bg semua" style="font-family: 'Raleway', sans-serif;">
	<!-- mulai navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#113672;">
      <div class="container"> 
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span> 
              </button>
              <a class="navbar-brand" href="#"><img style="height:75px;width:150px" class="img-responsive" src="<?php echo base_url()?>assets/img/LogoProject.png"></a>
          </div>
          <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                  <li ><a href="<?php base_url(); ?>index" style="color: white" ><span class="glyphicon glyphicon-time"></span> Reminder</a></li>
                   <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white">Menu
                      <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <?php if ($this->session->userdata('level') != 5 ) { ?>
                          <li><a href="<?php echo base_url(); ?>crud/home">Main Dashboard</a></li>
                          <?php if ($this->session->userdata('level') != 2 AND  $this->session->userdata('level') != 11 AND $this->session->userdata('level') != 10 ) { ?>
                          <li><a href="<?php echo base_url(); ?>crud/tambah">Input New Project</a></li>
                          <?php } ?>

                        <?php } ?>
                        <?php if ($this->session->userdata('level') == 5 || $this->session->userdata('level') == 1 ) { ?>
                          <li><a href="<?php echo base_url(); ?>crud/update">Acc Project (Goal) Dept</a></li>
                          <li><a href="<?php echo base_url(); ?>crud/hapus_project">Hapus Project</a></li>
                        <?php } ?>
                      </ul>
                   </li>              
               </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white">
                          <span class="glyphicon glyphicon-user"></span> 
                          <strong><?php echo $this->session->userdata('username'); ?></strong>
                          <span class="glyphicon glyphicon-chevron-down"></span>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                             <a href="<?php echo base_url();?>" style=" margin: 0px 25px ">
                              <span class="glyphicon glyphicon-home"></span> Home E-Match</a> 
                          </li>
                          <li>
                             <a href="<?php echo base_url();?>login/logout" style=" margin: 0px 25px "><span class="glyphicon glyphicon-log-out"></span> Logout</a> 
                          </li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </div>
  <!-- selesai navbar -->

    
     <div class="row" style="padding-top: 100px">
      <?php if ($this->session->flashdata('message_name')) { ?>
        <div class="alert alert-danger alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          <?= $this->session->flashdata('message_name') ?>
        </div>          
      <?php } ?>
          <center><h1><b>Display Project Department</b></h1></center>

      </div>

      


      
      
    <!--content-->
    <div class="container">
    	<div class="col-lg-20">
        <div class="col-lg-12 table-responsive">
          <table id="dataTables" class="table table-bordered table-hover table-striped iki"> 
      		<!-- <table class="table table-striped table-condensed table-bordered"> -->
      			<thead>
  	    			<tr style="background-color: #e22639; color:white;">
  	    				<!-- <th class="col-lg-1">No</th> -->
  	    				<th class="col-lg-6">Nama Project</th>
  	    				<th class="col-lg-1">Departemen</th>
  	    				<th class="col-lg-2">Start Project</th>
  	    				<th class="col-lg-2">End Project (Deadline)</th>
  	    				<th class="col-lg-1">Keterangan</th>
                <th class="col-lg-1">Status</th>
                <th class="col-lg-1">Progress</th>
  	    				<th class="col-lg-1">Peringatan</th>
  	    				<th class="col-lg-1">Reward</th>
  	    			</tr>
      			</thead>
      			<tbody>
      			    <?php 
      			         $c="";
  		                 foreach($dataproject as $d){ 
  		            if ($c=="") {
  		            $c="1";   
  		            echo '
      				<tr >';
      					//echo '<td>'; echo $d->id; echo '</td>';
      					echo '<td>'; echo $d->project; echo '</td>';
      					echo '<td>'; echo $d->nama_dept; echo '</td>';
      					echo '<td>'; echo $d->project_start; echo '</td>';
      					echo '<td>'; echo $d->project_end; echo '</td>';
      					echo '<td>'; echo $d->status; echo '</td>';
                ?>
                <td>

                  <?php switch ($d->ket)
                  {
                  case 'INTIME':
                    echo   '<span class="label label-success" style="font-size:15px;">Intime</span>';
                    break;
                  case 'ONTIME':
                    echo   '<span class="label label-warning" style="font-size:15px;">Ontime</span>';
                    break;
                  case 'OVERTIME':
                    echo   '<span class="label label-danger" style="font-size:15px;">Overtime</span>';
                    break;
                  case 'PENDING':
                    echo   '<span class="label label-primary" style="font-size:15px;">PENDING</span>';
                    break;
                  default:
                    echo "";
                  }
                  ?>    

                </td>

                <?php               
                echo '<td>'; echo $d->progress; echo '</td>';
      					echo '<td><i class="fa fa-bullhorn" style="font-size:25px;color:red"></i> &nbsp'; echo $d->peringatan; echo '</td>';
      					echo '<td><i class="fa fa-gift" style="font-size:25px;color:blue"></i> &nbsp '; echo $d->reward; echo '</td>';
      				echo '</tr>';
      				if (($d->project_end <= date(strtotime('Y-m-d')+7)) and ($d->project_end > date(strtotime('Y-m-d')))) { ?>
      				
      				<script>
      				    $(document).ready(function email(){
                          $.ajax({
                              url:'<?php echo base_url('Crud/send_email/') ?>' + '<?php echo $d->id; ?>',
                              type:'POST',
                              success: function(data)
                              {
                                  
                              },
                              error:function(errorThrown)
                              {
                                  alert ('gagal');
                              }
                              
                          });
                      });
      				</script>
      				
      				    
      				<?php }
  		            }else {
  		             $c="";
  		              echo '
      				<tr >';
      					//echo '<td>'; echo $d->id; echo '</td>';
      					echo '<td>'; echo $d->project; echo '</td>';
      					echo '<td>'; echo $d->nama_dept; echo '</td>';
      					echo '<td>'; echo $d->project_start; echo '</td>';
      					echo '<td>'; echo $d->project_end; echo '</td>';
                echo '<td>'; echo $d->status; echo '</td>';?>
      					<td>

                  <?php switch ($d->ket)
                  {
                  case 'INTIME':
                    echo   '<span class="label label-success" style="font-size:15px;">Intime</span>';
                    break;
                  case 'ONTIME':
                    echo   '<span class="label label-warning" style="font-size:15px;">Ontime</span>';
                    break;
                  case 'OVERTIME':
                    echo   '<span class="label label-danger" style="font-size:15px;">Overtime</span>';
                    break;
                  case 'PENDING':
                    echo   '<span class="label label-primary" style="font-size:15px;">PENDING</span>';
                    break;
                  default:
                    echo "";
                  }
                  ?>    

                </td>
                <?php
                echo '<td>'; echo $d->progress; echo '</td>';
      					echo '<td><i class="fa fa-bullhorn" style="font-size:25px;color:red"></i> &nbsp'; echo $d->peringatan; echo '</td>';
      					echo '<td><i class="fa fa-gift" style="font-size:25px;color:blue"></i> &nbsp '; echo $d->reward; echo '</td>';
      				echo '</tr>';	
  		            }
      				 } ?>
      			</tbody>
      		</table>
        </div>
    	</div>
    	
    </div>
    <!--content-->
    <!--footer-->
    <div>
        <center>
        <tr<td><b>Intime   =</b> Selesai Sebelum Deadline |</td></tr>
        <tr><td><b>Ontime   =</b> Selesai Sesuai Deadline |</td></tr>
        <tr><td><b>Overtime =</b> Selesai Melebihi Deadline |</td></tr>
        <tr><td><b>Pending  =</b> Sesuai Kebijakan BOD </td></tr>
        </center>
    </div>
    <div class="row clearfix">
			<div class="col-lg-12">
				<div class="panel panel-primary">
				<div class="panel-body" style="background-color: #3068a5; color:white;">
					<p style="text-align:center; margin-bottom: 0px;">Hak Cipta @2017 Designed by Match Ad</p>
           <?php
           // foreach ($deptku->result() as $row) {
           //   echo $row->deptini;
           // }

           // echo $tiga;
           // echo $isidept;

           // echo $isidept;

            ?>
				</div>
			</div>
		</div>
	</div>
	<!--footer-->
  <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#dataTables').DataTable();
  } );
  </script>

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