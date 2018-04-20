	<div class="content-wrapper">
		<div class="container">
			<div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h4 class="page-head-line">Beranda</h4>
                </div>
            </div>

           
              
            <div class="row">
            	<div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-five">
                        <a href="<?php echo base_url('projectreminder/Reminder/create')?>">
                            <i  class="fa fa-calendar-plus-o dashboard-div-icon" ></i>
                        </a>                        
                        <div class="progress progress-striped active">
						</div>
                        <h5>Reminder Jatuh Tempo</h5>
                    </div>
                </div>

                <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5) { ?>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-five">
                        <a href="<?php echo base_url('projectreminder/Reminder/edit_reminder')?>">
                            <i  class="fa fa-edit dashboard-div-icon" ></i>
                        </a>                        
                        <div class="progress progress-striped active">
                        </div>
                        <h5>Edit Reminder Jatuh Tempo</h5>
                    </div>
                </div>
                <?php } ?>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-five">
                        <a href="<?php echo base_url('projectreminder/Reminder/create_jenis')?>">
                            <i  class="fa fa-calendar-plus-o dashboard-div-icon" ></i>
                        </a>                        
                        <div class="progress progress-striped active">
                        </div>
                        <h5>Jenis Reminder</h5>
                    </div>
                </div>
                <?php if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5) { ?>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-five">
                        <a href="<?php echo base_url('projectreminder/Reminder/edit_jenis_reminder')?>">
                            <i  class="fa fa-edit dashboard-div-icon" ></i>
                        </a>                        
                        <div class="progress progress-striped active">
                        </div>
                        <h5>Edit Jenis Reminder</h5>
                    </div>
                </div>
                <?php } ?>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-five">
                        <a href="<?php echo base_url('projectreminder/Reminder/cetak')?>">
                            <i  class="fa fa-print dashboard-div-icon" ></i>
                        </a>                        
                        <div class="progress progress-striped active">
                        </div>
                        <h5>Laporan</h5>
                    </div>
                </div>
            </div>   
		</div>
	</div>
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-am-12">
                    © 2017 E-Match Ad . All Rights Reserved By Match Advertising
                </div>
            </div>
        </div>
    </footer>
    <!-- Jquery -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery-1.11.1.js')?>"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
    <!-- DATATABLES -->
    <script src="<?php echo base_url('assets/js/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/datatables/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/datatables/dataTables.responsive.js')?>"></script>
    <!-- EXTRA JS -->
    <script src="<?php echo base_url('assets/js/extra.js')?>"></script>