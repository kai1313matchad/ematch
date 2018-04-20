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
                        <div class="panel-body">
                            <div class="row">
                        <div class="col-sm-12 col-xs-12 table-responsive">
                            <div id="printableArea">
                            <table id="dataTables" class="table table-bordered table-hover table-striped iki" cellspacing="0" width="100%">
                                <form name="form1" action="#" method="post">
                                <?php 
                                $i=1;
                                 foreach($schedule as $d){ 
                                ?>
                                    <tr>
                                        <td style="width: 200px">Tema meeting</td>
                                        <td style="width: 50px" class="text-center">:</td>
                                        <td><?php echo $d->SCH_TITLE ?></td>
                                    </tr>
                                    <tr>
                                        <td>Departemen</td>
                                        <td style="width: 50px" class="text-center">:</td>
                                        <td><?php echo $d->deptini ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td style="width: 50px" class="text-center">:</td>
                                        <td><?php echo date('d - m - Y',strtotime($d->SCH_DATE)) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jam</td>
                                        <td style="width: 50px" class="text-center">:</td>
                                        <td><?php echo $d->SCH_TIME ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hasil Meeting</td>
                                        <td style="width: 50px" class="text-center">:</td>
                                        <td><?php echo $d->SCHDT_INFO ?></td>
                                    </tr>
                                    <tr style="border-bottom: solid 5px maroon;">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            </div>
                            <table>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-default" onclick="printDiv('printableArea')" value="print a div!">Cetak</button>
                                        </td>
                                        <td>
                                            <button type="button" onclick="window.location.href='http://localhost/ms/Post/cetak'" class="btn btn-default">Batal</button>
                                        </td>
                                    </tr>
                                 </form>
                            </table>
                        </div>
                    </div>  
                        </div>
                    </div>                    
                </div>
            </div>
		</div>
	</div>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>