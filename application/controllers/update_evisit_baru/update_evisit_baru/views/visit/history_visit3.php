
<section class="content-body">    
            
        <div class="wrapper secondary">
            <div class="container">
                <div class="content">


            		<div class="nui-simulation">
                		<div id="simulation">
                            <h3 class="nui-mobile-padding text-sub-header hidden-xs">History Visit to Client</h3>
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
                                                    <option>-- PILIH NAMA --</option>
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
                    
                    <div class="row">
                        <div class="col-xs-12">

							<div class="row">
	                        	<div class="col-lg-9">
	                        		<div class="nui-cards-listing" id="listing">
	                                    <div class="nui-card has-tag-layer">
	               
	                                        <div class="nui-card-content">
	                                            <div class="content-details">
	                                                <div class="details-col content-col-1">
	                                                    <div class="user-foto">
	                                                    	<img src="<?php echo base_url();?>assets/ft_profil/<?php echo isset($foto) ? $foto : ''; ?>" style="width: 90px; text-align: center;">
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
	                                                	<span class="label label-danger">15 menit yang lalu</span>
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
	                                                    	<img src="unnamed.png" style="width: 90px; text-align: center;">
	                                                    </div>
	                                                </div>
	                                                
	                                               	<div class="content-actions">
	                                               		<?php echo form_open('Evisit/visit/getRouteMap', 'class="" id="myform"'); ?>
															<input type="hidden" name="id" id="id" value="<?php echo isset($id_name) ? $id_name : ''; ?>">
															<input type="hidden" name="tgl_awal" id="tgl_awal" value="<?php echo isset($tgl_awal) ? $tgl_awal : ''; ?>">
															<input type="hidden" name="tgl_akhir" id="tgl_akhir" value="<?php echo isset($tgl_akhir) ? $tgl_akhir : ''; ?>">
				        		                            <button type="submit" class="btn btn-xs-full btn-track" id="btnRoute2">Get Route Map</button>
				        		                        <?php echo form_close();?> 
                                                	</div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>

	                        	</div>
                        	</div>		


                        	<div class="product text-center">
                		<h3 class="text-header">History visit</h3>
                	</div>

                            <div id="listingAndHeader2">
                                <div class="nui-listing-header hidden-xs">
                                    <div class="headers-col header-col-1">Perusahaan</div>
                                    <div class="headers-col header-col-2">Alamat</div>
                                    <div class="headers-col header-col-2">Lokasi</div>
                                    <div class="headers-col header-col-2">Keterangan</div>
                                    <div class="nui-listing-sorter nui-filter-panel" style="font-weight: 700; padding-left: 80px; padding-right: 80px;">
                                        <div class="nui-filter-info">
                                            <span class="nui-filter-info-label" style="">
						                    Note
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
								if (isset($history_visit)) {
									foreach($history_visit->result_array() as $row) {
								?>

                                <div class="nui-cards-listing" id="listing">
                                    <div class="nui-card has-tag-layer">
                                        <div class="nui-card-content">
                                            <div class="content-details">
                                                <div class="details-col content-col-1">
                                                	<h2 class="product-name text-sub-header" itemprop="name">
								                        <?php echo $row['company'];?> 	
								                    </h2>
                                                    <?php echo date('d-m-Y', strtotime($row['visited_at']));?><br>
                                                    <?php echo date('H:i:s', strtotime($row['visited_at']));?>
                                                </div>
                                                <div class="details-col content-col-2">
                                                    <?php echo $row['lokasi'];?>
                                                </div>
                                                <div class="details-col content-col-2">
                                                    <a href="<?php echo base_url();?>Evisit/visit/show_map/<?php echo $row['lat'].'/'.$row['long'];?>" class="btn btn-xs-full btn-track">
								                        VIEW
								                    </a>
                                                </div>
                                                <div class="details-col content-col-4">
                                                	<?php echo $row['keterangan'];?>                                                     
                                                </div>
                                            </div>
                                            <div class="content-actions">
                                                <a href="#" class="btn btn-action btn-xs-full btn-track">
							                        Beri Catatan
							                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php }} ?>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <nav aria-label="Page navigation example">
				  	<ul class="pagination">
				    	<li class="page-item"><a class="page-link" href="#">Previous</a></li>
				    	<li class="page-item"><a class="page-link" href="#">1</a></li>
				    	<li class="page-item"><a class="page-link" href="#">2</a></li>
				    	<li class="page-item"><a class="page-link" href="#">3</a></li>
				    	<li class="page-item"><a class="page-link" href="#">Next</a></li>
				  	</ul>
				</nav>
     
            </div>            
        </div>
    </section>