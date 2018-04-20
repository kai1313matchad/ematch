<!DOCTYPE html>
<html>
<head>
	<title>History Visit Lsit</title>
	<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCewiQQueZpY2TS4dFqDmNiJQluU4g7fGg&sensor=false" type="text/javascript"></script>

	<style type="text/css">
	td {
		cursor: pointer;
	}

	.editor{
		display: none;
	}

	</style>
</head>
<body>

<?php $this->load->view('visit/nav_visit'); ?>

<div class="container">
	<div class="row">
		

		<div id="identitas" class="row">
			<div class="form-horizontal">
				<div class="form-group">
					<label for="username" class="col-sm-2 control-label pull-left" style="">Visitor :</label>
					<div class="col-sm-10">
						<label for="" class="control-label"><?php echo $this->session->userdata('nama_karyawan');?></label>
					</div>
				</div>
				<div class="form-group">
					<label for="jabatan" class="col-sm-2 control-label">Jabatan :</label>
					<div class="col-sm-10">
						<label for="" class="control-label"><?php echo $this->session->userdata('jabatannya');?></label>
					</div>
				</div>
				<div class="form-group">
					<label for="departement" class="col-sm-2 control-label">Departemen :</label>
					<div class="col-sm-10">
						<label for="" class="control-label"><?php echo seperate($dept); ?></label>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive col-lg-12">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th colspan="2">Lokasi</th>
                                            <th>Perusahaan</th>
                                            <th>Keterangan</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
											//untuk menampilkan data dari table, diambil dari variable table yg ada di controller hubungi
											$no=1;
											foreach($history_visit->result_array() as $row){
												echo "<tr data-id='$row[id]'>
									                    <td>";
									            echo        $no++;
									            echo 	"</td>
									                    <td>";
									            echo    	date('d-m-Y', strtotime($row['visited_at']));
									            echo 	"</td>
									                    <td>";
									            echo        date('H:i:s', strtotime($row['visited_at']));
									            echo 	"</td>
									                    <td>$row[lokasi]</td>
									                    <td>";
	                                            echo "<a href=\"".base_url()."/visit/show_map/".$row['lat']."/".$row['long']."\"
	                                            class='btn btn-danger' target='_blank'>View</a>";
	                                            echo "</td>
									                    <td>$row[company]</td>
									                    <td>$row[keterangan]</td>
									                    <td><span class='span-note caption' data-toggle='tooltip' data-placement='top' title='Click me to edit!' data-id='$row[id]'>$row[note]</span> <input type='text' class='field-note form-control editor' value='$row[note]' data-id='$row[id]' /></td>
							                		</tr>";
							                }	
										?>
	                                        
	                                        
                                    </tbody>
                                </table>
                            </div>
                            <div id="imgLoad"></div>
                           <span class="label label-info">Click Note Column to Edit!</span>
                           <span class="label label-info">Enter if you finish Edit!</span> 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

		
	</div>
</div>

<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>
<script type="text/javascript">
$(document).ready(function () {

	$('[data-toggle="tooltip"]').tooltip();

	$('.star').on('click', function () {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
</script>

<script type="text/javascript">

$(function(){

	$.ajaxSetup({
		type:"post",
		cache:false,
		dataType: "json"
	})


	$(document).on("click","td",function(){
		$(this).find("span[class~='caption']").hide();
		$(this).find("input[class~='editor']").fadeIn().focus();
	});

	$(document).on("keydown",".editor",function(e){
		if(e.keyCode==13){
			var target=$(e.target);
			var value=target.val();
			var id=target.attr("data-id");
			var data={id:id,value:value};
			if(target.is(".field-note")){
				data.modul="note";
			}

			$("#imgLoad").html("<img src='<?php echo base_url();?>assets/img/loader-1.gif'>");

			$.ajax({
				data:data,
				url:"<?php echo base_url('Visit/update'); ?>",
				success: function(a){
					$("#imgLoad").html("");
				 	target.hide();
				 	target.siblings("span[class~='caption']").html(value).fadeIn();
				}
			})
		}
	});


	$(document).on("click",".hapus-member",function(){
		var id=$(this).attr("data-id");
		swal({
			title:"Hapus Member",
			text:"Yakin akan menghapus member ini?",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Hapus",
			closeOnConfirm: true,
		},
			function(){
			 $.ajax({
				url:"<?php echo base_url('Visit/delete'); ?>",
				data:{id:id},
				success: function(){
					$("tr[data-id='"+id+"']").fadeOut("fast",function(){
						$(this).remove();
					});
				}
			 });
		});
	});

});

</script>

<script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX loader-1 IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>assets/img/loader-1.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
        
        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {	
                jQuery('#modal_ajax .modal-body').html(response);
            },
            error: function() {
            	console.log('error bos');
            }
        });
    }
</script>
<!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog" style="width: 50%;">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Any</h4>
                </div>
                
                <div class="modal-body" style="height:400px; overflow:auto;">
                
                    
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>