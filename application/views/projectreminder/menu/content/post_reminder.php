    <style type="text/css">
        .maxh{
            height: 300px;
            max-height: 300px;
            overflow-y: scroll;
        }
    </style>
    <div class="content-wrapper">
		<div class="container">
			<div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h4 class="page-head-line">Reminder</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-sm-offset-0 col-xs-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Reminder Meeting</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <div class="maxh">
                            <table id="dataTables" class="table table-bordered table-hover table-striped iki" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Departemen</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Info</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                                <?php 
                                $i=1;
                                 foreach($schedule as $d){ 
                                ?>
                                    <tr>
                                        <form name="form1" action="<?php echo base_url(). 'Post/karyawan' ?>" method="post">
                                              <td><center><?php echo $i++ ?></center></td>
                                              <td><center><?php echo $d->SCH_TITLE ?></center></td>
                                              <td><center><?php echo $d->deptini ?></center></td>
                                              <td><center><?php echo date('d - m - Y',strtotime($d->SCH_DATE)) ?></center></td>
                                              <td><center><?php echo $d->SCH_TIME ?></center></td>
                                               <td><center><?php echo $d->SCH_INFO ?></center></td>
                                              <td><center>
                                            <!-- <button type="button" data-toggle="modal" data-toggle="modal" data-target="#myModalku<?php echo $d->SCH_ID ?>" style="color:black"><span class="glyphicon glyphicon-saved"></span></button> -->

                                            <!-- <button type="button" data-toggle="modal" data-target="#myModalku<?php echo $d->SCH_ID ?>" style="color:black"><span class="glyphicon glyphicon-saved"></span></button>
 -->

                                        <button type="button"  onclick='srch_sch("<?php echo $d->SCH_ID; ?>")' style="color:black"><span class="glyphicon glyphicon-saved"></span></button>
                                    </center></td>  
                                              <!-- <td><input type="hidden" name="id" value="<?php echo $d->SCH_ID ?>"></input></td> -->                   
                                        </form>
                                    </tr>

                                <?php $DEPTNYA = $d->deptini; 
                                $id_deptnya = explode(', ', $DEPTNYA); ?>


                                <!-- Modal dzaky-->
                                  <!-- <div class="modal fade" id="myModalku<?php echo $d->SCH_ID ?>" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                          <input type="text" name="" value="<?php echo $d->SCH_TITLE ?>">
                                          <?php $datane = $this->db->get_where('schedule', array('SCH_ID' => $d->SCH_ID))->result(); ?>

                                          <?php 
                                          foreach ($datane as $dnya) { ?>

                                        

                                          <table class="table">
                                            
                                              <tr>
                                                <th>Nama</th>
                                                <th>Dept</th>
                                                <th>info</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                              </tr>
                                            
                                              <tr>
                                                <td><?php echo $dnya->SCH_TITLE ?></td>
                                                <td><?php echo $dnya->SCH_DEPT ?></td>
                                                <td><?php echo $dnya->SCH_INFO ?></td>
                                                <td><?php echo $dnya->SCH_DATE ?></td>
                                                <td><?php echo $dnya->SCH_TIME ?></td>
                                              </tr>
                                              
                                          
                                          </table>





                                        
                                          <?php } ?>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div> -->
                                <!-- modal dzaky -->


                                

                                
                                
                                
                                <?php } ?>
                            </table>
                            <form id="tessss">
                                <input type="hidden" name="test">
                            </form>
                        </div>
                        </div>
                    </div>  
                        </div>
                    </div>                    
                </div>
            </div>
		</div>
	</div>

    

    <!-- Modal -->
    <div class="modal fade" id="modal_reminder" name="modal_reminder" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="formku" action="<?php echo base_url('Post/send_email') ; ?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
                    <!-- <input type="text" class="form-control" name="dept"> -->
                    <div class="row">
                        <input type="text" name="id_meeting" >
                        <input type="text" name="title" >
                        <input type="text" name="tgl" >
                        <input type="text" name="jam" >
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <div class="maxh">
                            <table id="dataTables9" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>e-mail</th>
                                        <th>Departemen</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                                        
                                <!-- <?php 
                                $i=1;
                                 foreach($karyawan as $c){ 
                                ?>
                                    
                                    <tr>
                                        <form action="<?php echo base_url(). 'Post/edit'; ?>" method="post">
                                              <!-- <td><center><?php echo $d->SCH_ID ?></center></td> -->
                                              
                                              <!-- <td><center><?php echo $i++ ?></center></td>
                                              <td><center><?php echo $c->nama_karyawan; ?></center></td>
                                              <td><center><?php echo $c->email; ?></center></td>
                                              <td><center><?php echo $c->deptini; ?></center></td>
                                              <td><center>
                                        <button type="button" onclick="edit_sch('<?php echo $c->id_karyawan?>')" style="color:black"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span></button>
                                    </center></td>                     
                                        </form>
                                    </tr> -->
                                
                                <!-- <?php } ?> -->
                            </table>
                        </div>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="kirim_email()" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-send"></span> Send</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal selesai -->

    <!-- <?php echo $id_deptnya[0];?> -->
    
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-am-12">
                    &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Jquery -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery-1.11.1.js')?>"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
    <!-- DATATABLES -->rahasia2017

    <script src="<?php echo base_url('assets/js/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/datatables/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/datatables/dataTables.responsive.js')?>"></script>
    <!-- DATETIME -->
    <script src="<?php echo base_url('assets/js/dateTime/moment.js')?>"></script>
    <script src="<?php echo base_url('assets/js/dateTime/bootstrap-datetimepicker.min.js')?>"></script>
    <!-- EXTRA JS -->
    <script src="<?php echo base_url('assets/js/extra.js')?>"></script>
    
    <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script>
         $(document).ready(function() {
              $('#dataTables').DataTable({
                     "bLengthChange": true,
                     "bFilter": true,
                     "bInfo" : true,
                     "paging": true
              });
              // dtb();
         } );
    </script>
    <script>
        function srch_sch(id)
        {
            $('[name="id_meeting"]').val(id);
            // $('[name="dept"]').val($('[name="test"]').val());
            // var dpt = $('[name="test"]').val().replace(/,/g,'');

            // alert(dpt);
            dtb(id);        
            test(id);
            // alert(dpt);
            $('#modal_reminder').modal('show');
            $('.modal-title').text('Daftar Karyawan');
        }

        function dtb(id)
        {
            $('#dataTables9').DataTable({
              "destroy":true,
              "processing":true,
              "serverSide" :true,
              "ajax" : {
                "url":"<?php echo base_url('Post/karyawan/')?>"+id,
                "type" : "POST",                
              }

            });
        }

        function test(id)
        {
            $.ajax ({
                url : "<?php echo base_url('Post/tes/')?>"+id,
                type : "POST",
                data : $('#modal_reminder').serialize(),
                dataType : "JSON",
                success: function(data)
                {
                    $('[name="id_meeting"]').val(data.id);
                    $('[name="title"]').val(data.title);
                    $('[name="tgl"]').val(data.tgl);
                    $('[name="jam"]').val(data.jam);
                    // alert(data.tes);
                }
            })
        }

        function email(t)
        {
            var id=t.val();
            if (t.is(':checked')) {
                alert(id);
                var data = $('#formku').serialize();
                $.ajax({
                      url : "<?php echo base_url('Post/simpan_email/')?>"+id,
                      type : "POST",
                      data: data
                })
             } else {
                var data = $('#formku').serialize();
                $.ajax({
                      url : "<?php echo base_url('Post/hapus_email/')?>"+id,
                      type : "POST",
                      data: data
                })
            }
        }

        function kirim_email()
        {   alert('Send E-mail');
            var data = $('#formku').serialize();
            $.ajax ({
                url : "<?php echo base_url('Post/send_email/')?>",
                type : "POST",
                data : data
            })
        }
    </script>
   
