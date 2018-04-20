<style>
.kasat {
	display: block;
}
.tak-kasat {
	display: none;
}
	
.tombol-besar {
	width: 180px;
	height: 180px !important;
	font-weight: 700;
	font-size: 30px;
	padding: 15px;
	line-height: 40px
}
.nui-simulation {
	position: relative;
	width: 70%;
	margin: 0 auto;
}
@media(max-width: 767px) {
	.nui-simulation {
		width: 100%;
	}
	.tombol-besar {
		width: 100%;
		height: 40px !important;
		padding: 0 2rem;
		display: block;
	}
}

.block-tombol {
  	*display: flex;
  	margin-bottom: 5px;
  	text-align: center;
}

.block-tombol a {
  	text-align: center;
}
.nui-cards-listing .nui-card .content-actions {
    top: 5px;
}
.nui-cards-listing .nui-card .content-actions {
    right: 5px;
}

.btn {
  	padding: 0 1rem;
}
@media (min-width: 1200px){
  	.nui-listing-header .headers-col.header-col-1, .nui-listing-header .headers-col.header-col-2 {
      	width: 212px;
  	}
}
.tengah {
  	text-align: center;
}
.rata {
  	text-align: justify;
}
.lebar {
  	width: 100%;
}
	
</style>

<section class="content-body">    
            
        <div class="wrapper secondary">
            <div class="container">
                <div class="content">


            		<div class="nui-simulation">
                		<div id="simulation">
                            <h3 class="nui-mobile-padding text-sub-header hidden-xs">Check Visitor</h3>
                            <div class="nui-simulation-box">
                            	<?php echo form_open(base_url() . 'Evisit/visit/history' , array('id' => 'simulation-form'));?>

                                    <div class="col-sm-12 col-md-8 nui-simulation-box-cell box-content-border">
                                        <div class="form-group">
                                            <label for="departemen">Departement</label>
                                            <div class="new-select-icon2">
                                                <select name="kd_dept" id="dept" class="form-control">
                                                    <option>-- PILIH DEPARTEMENT --</option>

													<?php 
													foreach($list_dept->result_array() as $dept ): ?>
														<option value="<?php echo $dept['id_dept'];?>"><?php echo $dept['nama_dept'];?> </option>		
													<?php endforeach; ?>
												</select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pilih-karyawan">
                                                Pilih Karyawan
                                            </label>
                                            <div class="new-select-icon2">
                                                <select name="nama_karyawan" id="name" class="form-control">
                                                    <option>-- PILIH Visitor --</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        	<label for="">Tanggal</label>
                                        	<div class="form-inline">
                                        		<div class="row">
                                        		<div class="form-group col-md-6">
												    <div class="input-group">
												      <div class="input-group-addon">From</div>
												      <input class="form-control datepicker" id="start" name="mulai" type="text" data-date-format="yyyy-mm-dd" placeholder="pick date" />
												    </div>
												</div>
												<div class="form-group  col-md-6">
												    <div class="input-group">
												      <div class="input-group-addon">To</div>
												      <input class="form-control datepicker" id="akhir" name="selesai" type="text" data-date-format="yyyy-mm-dd" placeholder="pick date" />
												    </div>
												</div>
												</div>
                                        	</div>
                                            <div id="loan-amount-help-text" class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 nui-simulation-box-cell">
                                        <div class="text-center">
                                        	<input type="submit" id="tombol" class="btn btn-action btn-xs-full btn-lg tombol-besar" name="submit" value="Tampil">
                                        </div>
                                        
                                    </div>                                       

                                <?php echo form_close();?> 
                            </div>
                        </div>
                    </div>

                    <hr>
                    <?php
					// if (!empty($history_visit)) {
					?>
                    <div class="row" id="info">
                        <div class="col-xs-12">

							<div class="row">
	                        	<div class="col-lg-9">
	                        		<div class="nui-cards-listing" id="listing">
	                                    <div class="nui-card has-tag-layer">
	               
	                                        <div class="nui-card-content">
	                                            <div class="content-details">
	                                                <div class="details-col content-col-1">
	                                                    <div class="user-foto">
	                                                    	<img class="profile-img-card" src="<?php echo base_url();?>assets/ft_profil/<?php echo isset($foto) ? $foto : ''; ?>" style="width: 90px; text-align: center;">
	                                                    </div>
	                                                </div>
	                                                <div class="details-col content-col-2 center">
	                                                    <span class="nama">Visitor</span><br>
	                                                    <span class="visitor"><?php echo isset($visitor) ? $visitor : ''; ?></span>
	                                                </div>
	                                                <div class="details-col content-col-2 center">
	                                                	<span class="nama">Jabatan</span><br>
	                                                	<span class="jab"><?php echo isset($jabatan) ? $jabatan : ''; ?></span><br>
	                                                </div>
	                                                <div class="details-col content-col-2 center">
	                                                	<span class="nama">Departemen</span><br>
	                                                	<span class="dept"><?php echo isset($departemen) ? seperate($departemen) : ''; ?></span><br>
	                                                </div>
	                                               	<div class="content-actions">
	                                                	<span class="label label-danger"><?php echo isset($ago) ? $ago : '';?></span>
	                                            	</div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                        	</div>
	                        	<div class="col-xs-12 col-lg-3">
	                        		
	                        		<div class="nui-cards-listing" id="listing">
	                                    <div class="nui-card has-tag-layer">
	               
	                                        <div class="nui-card-content">
	                                            <div class="content-details">
	                                                <div class="details-col content-col-1">
	                                                    <div class="user-foto">
	                                                    	<img src="<?php echo base_url();?>assets/evisit/unnamed.png" style="width: 90px; text-align: center;">
	                                                    </div>
	                                                </div>
	                                                
	                                               	<div class="content-actions">
	                                               		<a href="#" class="btn btn-xs-full btn-track" data-lat="" data-toggle="modal" data-target="#myMapModal">GET MAP</a>
	                                               		<!-- <?php echo form_open('Evisit/visit/getRouteMap', 'class="" id="myform"'); ?>
															<input type="hidden" name="id" id="id" value="<?php echo isset($id_name) ? $id_name : ''; ?>">
															<input type="hidden" name="tgl_awal" id="tgl_awal" value="<?php echo isset($tgl_awal) ? $tgl_awal : ''; ?>">
															<input type="hidden" name="tgl_akhir" id="tgl_akhir" value="<?php echo isset($tgl_akhir) ? $tgl_akhir : ''; ?>">
				        		                            <button type="submit" class="btn btn-xs-full btn-track" id="btnRoute2">Get Map</button>
				        		                        <?php echo form_close();?>  -->
                                                	</div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>

	                        	</div>
                        	</div>		


                        	<div>
                        		<button type="button" class="btn btn-track btn-xs-full" id="petekan">test tombol</button>
                        	</div>


                        	<div class="product text-center">
                				<h3 class="text-header">History Visit to Client</h3>
                			</div>

                            <div id="listingAndHeader2">
                                <div class="nui-listing-header hidden-xs">
                                    <div class="headers-col header-col-1 tengah" style="text-align: center;">Perusahaan</div>
                                    <div class="headers-col header-col-2 tengah" style="text-align: center;">Alamat</div>
                                    <div class="headers-col header-col-2 tengah" style="text-align: center;">Lokasi</div>
                                    <div class="headers-col header-col-2 tengah" style="text-align: center;">Keterangan</div>
                                    <div class="headers-col header-col-2 tengah" style="text-align: center;">Note</div>
                                    <div class="nui-listing-sorter nui-filter-panel" style="font-weight: 700; padding-left: 80px; padding-right: 80px;">
                                        <div class="nui-filter-info">
                                            <span class="nui-filter-info-label" style="">
						                    Action
						                   
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
                                
                                

                                


                                

                             </div> 
                            <ul class="pagination"></ul>
                        </div>      
                                
                            </div>
                        </div>
                    </div>
                    <?php 
                		// } else { 
                	?>

                    <div style="text-align: center;">Tidak ada data</div>
                    <?php //} ?>
                </div>

               
     
            </div>            
        </div>
    </section>





<!-- google map Modal -->
<div class="modal fade" id="myMapModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3 class="modal-title">History Visit</h3>
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
