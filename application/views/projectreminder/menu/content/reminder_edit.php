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
                    <h4 class="page-head-line">Edit Reminder Jatuh Tempo</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-sm-offset-0 col-xs-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Reminder Jatuh Tempo</h4>
                        </div>
                        
                            <table id="dataTables" class="table table-bordered table-hover table-striped table-responsive iki" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><center>No</center></th>
                                        <th><center>Nama Reminder</center></th>
                                        <th><center>Jenis</center></th>
                                        <th><center>Info</center></th>
                                        <th><center>Tanggal Jatuh Tempo</center></th>
                                        <th><center>Departemen</center></th>
                                        <th><center>E-mail Atasan</center></th>
                                        <th><center>Pilih</center></th>
                                    </tr>
                                </thead>

                                <?php 
                                $i=1;
                                 foreach($reminder as $d){ 
                                ?>
                                    <tr>
                                        <form name="form1" action="<?php echo base_url();?>projectreminder/Reminder/ubah_reminder/<?php echo $d->idr; ?>" method="post">
                                              <input type="hidden" name="id" value="<?php echo $d->idr; ?>">
                                              <input type="hidden" name="dept" value="<?php echo $d->deptini; ?>">
                                              <td><center><?php echo $i++ ?></center></td>
                                              <td><center><?php echo $d->nama_reminder ?></center></td>
                                              <td><center><?php echo $d->jenis ?></center></td>
                                              <td><center><?php echo $d->info_reminder ?></center></td>
                                              <td><center><?php echo date('d - m - Y',strtotime($d->tanggal_batas)) ?></center></td>
                                              <td><center><?php echo $d->deptini ?></center></td>
                                              <td><center><?php echo $d->email_atasan ?></center></td>
                                              <td style="width:160px"><center>
                                        <button class="btn btn-default" type="submit" style="color:black">Edit <span class="glyphicon glyphicon-edit"></span></button>
                                              <!-- </center></td>
                                              <td><center> -->
                                        <!-- <button type="button"  style="color:black">Hapus <span class="glyphicon glyphicon-trash"></span></button> -->
                                        <a class="btn btn-danger" href="<?php echo base_url();?>projectreminder/Reminder/hapus_reminder/<?php echo $d->idr; ?>">Hapus <span class="glyphicon glyphicon-trash"></span></a>
                                    </center></td>                   
                                        </form>
                                    </tr>
                                <?php } ?>
                            </table>
                        <!-- </div>
                        </div>
                    </div>  
                        </div> -->
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
    <script src="<?php echo base_url('assets/projectreminder/js/jquery-1.11.1.js')?>"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url('assets/projectreminder/js/bootstrap.js')?>"></script>
    <!-- DATATABLES -->
    <script src="<?php echo base_url('assets/projectreminder/js/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/projectreminder/js/datatables/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/projectreminder/js/datatables/dataTables.responsive.js')?>"></script>
    <!-- DATETIME -->
    <script src="<?php echo base_url('assets/projectreminder/js/dateTime/moment.js')?>"></script>
    <script src="<?php echo base_url('assets/projectreminder/js/dateTime/bootstrap-datetimepicker.min.js')?>"></script>
    
    <script>
        $(document).ready(function() {
            $('.dtp').datetimepicker({                
                  format: 'YYYY-MM-DD'
             });
            $('.dtm').datetimepicker({                
                  format: 'HH:mm'
             });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.dtp2').datetimepicker({                
                  format: 'YYYY-MM-DD'
             });
            $('.dtm').datetimepicker({                
                  format: 'HH:mm'
             });
        });
    </script>
    
   <!-- EXTRA JS -->
    <script src="<?php echo base_url('assets/projectreminder/js/extra.js')?>"></script>
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
            $.ajax({
                url : "<?php echo base_url('projectreminder/Post/cetak_aksi/')?>"+id,
                type : "POST"
            })       
        }
   </script>
   <script>
        $('option').mousedown(function(e) {
            e.preventDefault();
            var originalScrollTop = $(this).parent().scrollTop();
            console.log(originalScrollTop);
            $(this).prop('selected', $(this).prop('selected') ? false : true);
            var self = this;
            $(this).parent().focus();
            setTimeout(function() {
                $(self).parent().scrollTop(originalScrollTop);
            }, 0);
    
            return false;
        });
    </script>
    <script>
        function getSelectValues(select) {
               var result = [];
               var options = select && select.options;
               var opt;

               for (var i=0, iLen=options.length; i<iLen; i++) {
                   opt = options[i];

                   if (opt.selected) {
                      result.push(opt.value || opt.text);
                   }
                }
                $('[name="kodedept"]').val(result);
                return result;
        }
    </script>