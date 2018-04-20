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
                    <h4 class="page-head-line">Cetak</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-sm-offset-0 col-xs-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Cetak Data Meeting</h4>
                        </div>
                        <form name="ftgl" action="<?php echo base_url(). 'Post/cetak_tertentu'; ?>" method="post">    
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="col-sm-1 control-label">Tanggal</label>
                                    <div class="col-sm-2">
                                    <td>
                                    <div class="input-group date dtp">
                                         <input type="text" class="form-control input-group-addon" name="tanggal" required />
                                         <span class="input-group-addon">
                                         <span class="glyphicon glyphicon-calendar"></span>
                                         </span>
                                    </div>
                                    </td>
                                    </div>

                                    <div class="col-sm-1"> <center>s/d</center></div>   

                                    <div class="col-sm-2">
                                    <td>
                                    <div class="input-group date dtp2">
                                         <input type="text" class="form-control input-group-addon" name="tanggal2" required />
                                         <span class="input-group-addon">
                                         <span class="glyphicon glyphicon-calendar"></span>
                                         </span>
                                    </div>
                                    </td>
                                    </div>
                                    <div class="col-sm-2">
                                            <select class="form-control" name="dept">
                                                <option value="0">Semua</option>
                                                <option value="1">IT</option>
                                                <option value="2">HC</option>
                                                <option value="3">PAT</option>
                                                <option value="4">GA</option>
                                                <option value="5">Marketing</option>
                                                <option value="6">Finance</option>
                                                <option value="7">Logistic</option>
                                                <option value="8">Production</option>
                                                <option value="9">SITAC</option>
                                                <option value="a">Accounting</option>
                                                <option value="b">Secretary</option>
                                                <option value="c">Internal Audit</option>
                                                <option value="d">WIPERINDO</option>
                                                <option value="e">Tritunggal Metalworks</option>
                                                <option value="f">Vendor</option>
                                            </select>
                                    </div>
                                    <div class="col-sm-3">
                                         <td>
                                               <button type="submit">Cetak</button>
                                         </td>
                                    </div>
                                </div>
                            </div>   
                        </form> 
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
                                        <th>Notulen</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>

                                <?php 
                                $i=1;
                                 foreach($schedule as $d){ 
                                ?>
                                    <tr>
                                        <form name="form1" action="<?php echo base_url(). 'Post/cetak_aksi'; ?>" method="post">
                                              <input type="hidden" name="id" value="<?php echo $d->SCH_ID; ?>">
                                              <input type="hidden" name="dept" value="<?php echo $d->deptini; ?>">
                                              <td><center><?php echo $i++ ?></center></td>
                                              <td><center><?php echo $d->SCH_TITLE ?></center></td>
                                              <td><center><?php echo $d->deptini ?></center></td>
                                              <td><center><?php echo date('d - m - Y',strtotime($d->SCH_DATE)) ?></center></td>
                                              <td><center><?php echo $d->SCH_TIME ?></center></td>
                                               <td><center><?php echo $d->SCHDT_INFO ?></center></td>
                                              <td><center>

                                        <button type="submit" style="color:black"><span class="glyphicon glyphicon-print"></span></button>
                                    </center></td>                   
                                        </form>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        </div>
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
    <!-- DATATABLES -->
    <script src="<?php echo base_url('assets/js/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/datatables/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/datatables/dataTables.responsive.js')?>"></script>
    <!-- DATETIME -->
    <script src="<?php echo base_url('assets/js/dateTime/moment.js')?>"></script>
    <script src="<?php echo base_url('assets/js/dateTime/bootstrap-datetimepicker.min.js')?>"></script>
    
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
                url : "<?php echo base_url('Post/cetak_aksi/')?>"+id,
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

    <!-- EXTRA JS -->
    <script src="<?php echo base_url('assets/js/extra.js')?>"></script>
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