
<section class="content-body">    
            
        <div class="wrapper secondary">
            <div class="container">
                <div class="content">
                		
                    <div class="row">
                        <div class="col-xs-12">

                        	<div class="row">
	                        	<div class="col-lg-12">
	                        		<div class="nui-cards-listing" id="listing">
	                                    <div class="nui-card has-tag-layer">
	               
	                                        <div class="nui-card-content">
	                                            <div class="content-details">
	                                                <div class="details-col content-col-1">
	                                                    <div class="user-foto">
	                                                    	<img class="profile-img-card" src="<?php echo base_url();?>assets/ft_profil/<?php echo $this->session->userdata('foto'); ?>" style="width: 90px; text-align: center;">
	                                                    </div>
	                                                </div>

	                                                <div class="details-col content-col-2 center">
	                                                    <span class="nama">Visitor</span><br>
	                                                    <span class="visitor"><?php echo $this->session->userdata('nama_karyawan');?></span>
	                                                </div>
	                                                <div class="details-col content-col-2 center">
	                                                	<span class="nama">Jabatan</span><br>
	                                                	<span class="jab"><?php echo $this->session->userdata('nama_karyawan');?></span><br>
	                                                </div>
	                                                <div class="details-col content-col-2 center">
	                                                	<span class="nama">Departemen</span><br>
	                                                	<span class="dept"><?php echo seperate($dept); ?></span><br>
	                                                </div>
	                                                <div class="details-col content-col-2 center">
	                                                	<a href="<?php echo base_url();?>Evisit/visit" class="btn btn-action btn-xs-full btn-track">
								                        Visit Next
								                    </a>
	                                                </div>
	                                               	<div class="content-actions">
	                                                	<span class="label label-danger"><?php echo $ago;?></span>
	                                            	</div>

	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                        	</div>
	                        	<div class="col-xs-12 col-lg-6"></div>
                        	</div>

                        	<div class="product text-center">
                				<h3 class="text-header">History visit</h3>
                			</div>

                            <div id="listingAndHeader2 hacker-list">
                                <div class="nui-listing-header hidden-xs">
                                    <div class="headers-col header-col-1" style="text-align: center;">Perusahaan</div>
                                    <div class="headers-col header-col-2" style="text-align: center;">Alamat</div>
                                    <div class="headers-col header-col-2" style="text-align: center;">Lokasi</div>
                                    <div class="headers-col header-col-2" style="text-align: center;">Keterangan</div>
                                    <div class="nui-listing-sorter nui-filter-panel" style="font-weight: 700; padding-left: 80px; padding-right: 80px;">
                                        <div class="nui-filter-info">
                                            <span class="nui-filter-info-label" style="">
						                    Note
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                

                        <div id="test-list">

							<div class="row">
                            	<div class="col-lg-9">
				                  	
                            	</div>
                            	<div class="col-lg-3">
                            		<div class="subscribe">
				                      	<div class="subscribe-form">					        
				                        	<div class="input-group2">
				                          		<input type="text" placeholder="SEARCH" class="form-control search"  name="" id="search-text">
				                          		<span class="glyphicon glyphicon-remove-circle form-control-feedback form-action-clear" aria-hidden="true"></span>
				                        	</div>
				                      	</div>
				                  	</div>
                            	</div>
                            </div>

                            <div class="list">    
                                
                                <?php
									foreach($visit->result_array() as $row) :
										$dateArr = explode(' ', $row['visited_at']);
										$onlyDate = $dateArr[0];
								?>

								

                                <div class="nui-cards-listing post" id="listing">
                                    <div class="nui-card has-tag-layer">
                                       
                                        <div class="nui-card-content">
                                            <div class="content-details">
                                                <div class="details-col content-col-1 company">
                                                	<h2 class="product-name text-sub-header perusahaan" itemprop="name">
								                        <?php echo $row['company'];?> 	
								                    </h2>
                                                    <?php echo nama_hari($onlyDate).', '.tgl_indo($onlyDate);?><br>
                                                    <?php echo date('H:i A', strtotime($row['visited_at']));?>
                                                </div>
                                                <div class="details-col content-col-2 lokasi">
                                                    <?php echo $row['lokasi'];?>
                                                </div>
                                                <div class="details-col content-col-2">
                                                    <a href="#" class="btn btn-xs-full btn-track" data-lat="<?php echo $row['lat'].', '.$row['long'];?>"" data-toggle="modal" data-target="#myMapModal">
								                        VIEW
								                    </a>
								                    <!-- <a href="<?php echo base_url();?>Evisit/visit/show_map/<?php echo $row['lat'].'/'.$row['long'];?>" class="btn btn-xs-full btn-track">
								                        VIEW
								                    </a> -->
                                                </div>
                                                <div class="details-col content-col-2">
                                                	<?php echo $row['keterangan'];?>                                                   
                                                </div>
                                                <div class="details-col content-col-2">
                                                </div>	
                                            </div>
                                            <div class="content-actions">
                                                <?php echo $row['note'];?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endforeach; ?>

                            </div> 
                            <ul class="pagination"></ul>
                        </div>       
                                                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- start pagination -->
                <div class="pagination"></div>
     			<!-- end pagination -->

            </div>            
        </div>
    </section>

<!-- google map Modal -->
<div class="modal fade" id="myMapModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3 class="modal-title">View Map</h3>
            </div>
            
            <div class="modal-body" style="height: 300px;">
                <div class="container2">
                    <div class="row2">
                        <div id="map-canvas" class="">
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
