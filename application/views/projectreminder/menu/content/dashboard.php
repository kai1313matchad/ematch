	<div class="content-wrapper">
		<div class="container">
			<div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h4 class="page-head-line">Schedule Meeting</h4>
                </div>
            </div>
			<!-- <div class="col-sm-12 col-xs-12 table-responsive">
				<table id="dash_table" class="table table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="text-center">
								No
							</th>
							<th class="text-center">
								Tanggal
							</th>
							<th class="text-center">
								Departemen
							</th>
							<th class="text-center">
								Agenda
							</th>
							<th class="text-center">
								Status
							</th>
							<th class="text-center">
								Detail
							</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div> -->
			<div class="row">
				<div id="calendar" class="col-sm-8 col-sm-offset-2">
					
				</div>
			</div>
		</div>
	</div>
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
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
    <!-- FULLCALENDAR -->
    <script src="<?php echo base_url('assets/fullcalendar/lib/moment.min.js')?>"></script>
    <script src="<?php echo base_url('assets/fullcalendar/fullcalendar.js')?>"></script>
    <script src="<?php echo base_url('assets/fullcalendar/locale-all.js')?>"></script>
    <!-- EXTRA JS -->
    <script src="<?php echo base_url('assets/js/extra.js')?>"></script>
    <script>
    	$(document).ready(function() {      		
    		$('#calendar').fullCalendar({    			
    			header: 
    			{
    				left: 'today,month,listMonth',
    				center: 'title',
    				right: 'prev,next'
    			},
    			views: 
    			{
    				// listWeek: { buttonText: 'Minggu'}
    			},
    			locale: 'id',
    			navLinks: true,
    			eventLimit: true,
    			// events:
    			// [    				
    			// 	{
    			// 		title: 'Meeting Marketing AAaaaaa',
    			// 		// url: 'http://www.google.com',
    			// 		start: '2017-10-23T10:30:00'
    			// 		// end: '2017-10-23T12:30:00'
    			// 	},
    			// 	{
    			// 		title: 'Meeting Marketing AAaaaaa',
    			// 		// url: 'http://www.google.com',
    			// 		start: '2017-10-23T10:30:00'
    			// 		// end: '2017-10-23T12:30:00'
    			// 	}
    			// ]
    			eventSources: 
    			[
    				{
    					events: function(start, end, timezone, callback)
    					{
    						$.ajax({
    							url: '<?php echo site_url('Dashboard/resources')?>',
	    						dataType: 'JSON',
	    						data: 
	    						{
	    							start: start.unix(),
	    							end: end.unix()
	    						},
	    						success: function(msg)
	    						{
	    							var events = msg.events;
	    							callback(events);
	    						}
    						});
    					}	    				
	    			}
    			]
    		});
    	});
    </script>
