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
                    <h4 class="page-head-line">Tulis Notulensi</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xs-6 col-sm-offset-3 col-xs-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Notulen Meeting</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12 col-xs-12">
                                <form class="form-horizontal" action="<?php echo base_url(). 'crud/update_notulen'; ?>" method="post">
                                    <input type="hidden" class="form-control" name="kodedept">
                                    <input type="hidden" class="form-control" name="id">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tema Meeting</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="tema" readonly="">
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="javascript:void(0)" onclick="srch_sch()" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> Cari</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Dept. Terkait</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="dept" readonly=""/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tanggal</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date dtp">
                                                <input type="text" class="form-control input-group-addon" name="tanggal" readonly="" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Jam</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date dtm">
                                                <input type="text" class="form-control" name="jam" readonly=""/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Informasi</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control inputtxtarea" rows="5" name="info" readonly=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Hasil Meeting</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control inputtxtarea" rows="5" name="hasil"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                             <button type="submit" class="btn btn-primary">Save</button>
                                             <button type="submit" class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
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
                    &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="modal_schedule" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                </div>
                <div class="modal-body">
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
                                        <form action="<?php echo base_url(). 'Post/edit'; ?>" method="post">
                                              <!-- <td><center><?php echo $d->SCH_ID ?></center></td> -->
                                              <td><center><?php echo $i++ ?></center></td>
                                              <td><center><?php echo $d->SCH_TITLE ?></center></td>
                                              <td><center><?php echo $d->deptini ?></center></td>
                                              <td><center><?php echo $d->SCH_DATE ?></center></td>
                                              <td><center><?php echo $d->SCH_TIME ?></center></td>
                                              <td><center><?php echo $d->SCH_INFO ?></center></td>
                                              <td><center>
                                        <button type="button" onclick="edit_sch('<?php echo $d->SCH_ID ?>')" style="color:black"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span></button>
                                    </center></td>                     
                                        </form>
                                    </tr>
                                
                                <?php } ?>
                            </table>
                        </div>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        $(document).ready(function() {
            $('.dtp').datetimepicker({                
                  format: 'YYYY-MM-DD'
             });
            $('.dtm').datetimepicker({                
                  format: 'HH:mm'
             });
        });

        function srch_sch()
        {
            $('#modal_schedule').modal('show');
            $('.modal-title').text('Cari Jadwal');
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
    <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script>
         $(document).ready(function() {
              $('#dataTables').DataTable({
                     "bLengthChange": true,
                     "bFilter": true,
                     "bInfo" : true,
                     "paging": false
              });
         } );
    </script>
    <script>
        var values;
        function edit_sch(id)
    {
        

        $.ajax({
            url : "<?php echo site_url('Post/notulen_aksi/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {   
                values = data.SCH_DEPT;
                $('[name="id"]').val(data.SCH_ID);
                $('[name="kodedept"]').val(data.SCH_DEPT);
                $('[name="tema"]').val(data.SCH_TITLE);
                $('[name="dept"]').val(data.deptini);
                $('[name="tanggal"]').val(data.SCH_DATE);
                $('[name="jam"]').val(data.SCH_TIME);
                $('[name="info"]').val(data.SCH_INFO);
                $('[name="hasil"]').val(data.SCHDT_INFO);
                $('#modal_schedule').modal('hide');    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
    </script>