	<div class="content-wrapper">
		<div class="container">
			<div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h4 class="page-head-line">Ubah Jenis Reminder</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-xs-10 col-sm-offset-1 col-xs-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Jenis Reminder</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12 col-xs-12">
                                <form class="form-horizontal" action="<?php echo base_url(). 'projectreminder/crud/ubah_jenis'; ?>" method="post">
                                    <?php 
                                           $i=1;
                                           foreach($jenis_reminder as $d){ 
                                    ?>
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $d->id ?>">
                                    <!-- <input type="hidden" class="form-control" name="kodedept"> -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama Reminder</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nama" value="<?php echo $d->nama_jenis ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Keterangan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="keterangan" value="<?php echo $d->keterangan ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                             <button type="submit" class="btn btn-primary">Save</button>
                                             <button type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>                            
                        </div>
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
    <!-- EXTRA JS -->
    <script src="<?php echo base_url('assets/projectreminder/js/extra.js')?>"></script>
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
    <!-- untuk multiple select -->
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