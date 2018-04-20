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
    *padding: 0 1rem;
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
                                                        <?php if ($dept['id_d'] != 15 && $dept['id_d'] != 16) : ?>
                                                            <option value="<?php echo $dept['id_dept'];?>"><?php echo $dept['nama_dept'];?> </option>
                                                        <?php endif; ?>
																
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
												      <input class="form-control datepicker" id="start" name="mulai" type="text" data-date-format="yyyy-mm-dd" placeholder="pick date" required/>
												    </div>
												</div>
												<div class="form-group  col-md-6">
												    <div class="input-group">
												      <div class="input-group-addon">To</div>
												      <input class="form-control datepicker" id="akhir" name="selesai" type="text" data-date-format="yyyy-mm-dd" placeholder="pick date" required/>
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
					if (!empty($history_visit)) {
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


                        	<div class="product text-center">
                				<h3 class="text-header">History Visit to Client</h3>
                			</div>

                            <div id="listingAndHeader2">
                                <div class="nui-listing-header hidden-xs">
                                    <div class="headers-col header-col-1 tengah" style="text-align: center;">Perusahaan</div>
                                    <div class="headers-col header-col-2 tengah" style="text-align: center;">Alamat</div>
                                    <div class="headers-col header-col-2 tengah" style="text-align: center;">Lokasi</div>
                                    <div class="headers-col header-col-2 tengah" style="text-align: center;">Hasil Kunjungan</div>
                                    <div class="headers-col header-col-2 tengah" style="text-align: center;">Note</div>
                                    <div class="nui-listing-sorter nui-filter-panel" style="font-weight: 700; padding-left: 80px; padding-right: 80px;">
                                        <div class="nui-filter-info">
                                            <span class="nui-filter-info-label" style="">
						                    Aksi
                                            </span>
                                        </div>
                                    </div>
                                </div>

                        <div id="test-list">

							<div class="row">
                            	<div class="col-lg-9">
				                  	<!-- <a href="<?php echo base_url();?>Evisit/Visit/printViewBy" class="btn btn-action btn-xs-full btn-track edit-item" target="_blank">
                                        print
                                    </a> -->
                                    <?php echo form_open('Evisit/Visit/printViewBy', 'class="" id="myform"'); ?>
                                        <input type="hidden" name="id" id="id" value="<?php echo isset($id_name) ? $id_name : ''; ?>">
                                        <input type="hidden" name="id_dept" id="id_dept" value="<?php echo isset($id_dept) ? $id_dept : ''; ?>">
                                        <input type="hidden" name="tgl_awal" id="tgl_awal" value="<?php echo isset($tgl_awal) ? $tgl_awal : ''; ?>">
                                        <input type="hidden" name="tgl_akhir" id="tgl_akhir" value="<?php echo isset($tgl_akhir) ? $tgl_akhir : ''; ?>">
                                        <button type="submit" class="btn btn-action btn-xs-full btn-track edit-item">Print</button>
                                    <?php echo form_close();?> 
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
								if (!empty($history_visit)) {
									foreach($history_visit->result_array() as $row) {
										$dateArr = explode(' ', $row['visited_at']);
										$onlyDate = $dateArr[0];

								?>

                                <div class="nui-cards-listing post" id="listing">
                                    <div class="nui-card has-tag-layer">
                                        <div class="nui-card-content">
                                            <div class="content-details">
                                                <div class="details-col content-col-1 company">
                                                	<h2 class="product-name text-sub-header" itemprop="name">
								                        <?php echo $row['company'];?> 
								                    </h2>
                                                    <p style="">
                                                        <?php echo strtoupper($row['pic']);?>
                                                    </p>    
                                                    <p style="font-weight: bold; font-style: italic;">    
                                                        <?php echo $row['no_telp'];?>
                                                    </p>
                                                    <?php echo nama_hari($onlyDate).', '.tgl_indo($onlyDate);?><br>
                                                    <?php echo date('H:i A', strtotime($row['visited_at']));?><br>
                                                    <div>
                                                        <div class="col-md-6 col-md-pull-1">
                                                            <h4>
                                                            <img src="<?php echo base_url();?>assets/evisit/<?php echo ($row['verified'] == 1) ? "Icon-verified" : "cancel-circle" ;?>.png" width="30">
                                                            </h4>
                                                        </div>
                                                        <div class="col-md-6 col-md-pull-1">
                                                            <h4><strong><?php echo ($row['verified'] == 1) ? $row['verification_code'] : "Belum Diverifikasi";?></strong></h4>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="details-col content-col-2 lokasi">
                                                    <?php echo $row['lokasi'];?>
                                                </div>
                                                <div class="details-col content-col-2 tengah">
                                                	<a href="#" class="btn btn-xs-full btn-track" data-lat="<?php echo $row['lat'].', '.$row['long'];?>"" data-toggle="modal" data-target="#myMapModal">
								                        VIEW
								                    </a>
                                                    <!-- <a href="<?php echo base_url();?>Evisit/visit/show_map/<?php echo $row['lat'].'/'.$row['long'];?>" class="btn btn-xs-full btn-track">
								                        VIEW
								                    </a> -->
                                                </div>
                                                <div class="details-col content-col-2 rata">
                                                	<?php echo $row['keterangan'];?> <br><br><hr>
                                                    <label class="">Email :</label>
                                                    <span class="label label-success">
                                                        <?php echo $row['email_address'];?>
                                                    </span>                                                    
                                                </div>
                                                <div class="details-col content-col-2 rata">
                                                    <?php echo $row['note'];?> 
                                                </div>
                                            </div>
                                            <div class="content-actions">
                                                <!-- <div class="block-tombol">
                                                    <a href="#" class="btn btn-action btn-xs-full btn-track edit-item lebar" data-toggle="modal" data-target="#edit-item" onclick="edit_book(<?php echo $row['id'];?>)" style="width: 100%;">
                                                        Beri Catatan
                                                    </a>
                                                </div> -->
                                                <div class="block-tombol">
                                                    <a href="#" class="btn btn-action btn-xs-full btn-track edit-item lebar" data-id="<?php echo $row['visits_id'];?>" data-toggle="modal" data-target="#edit-item<?php echo $row['visits_id'];?>" style="width: 100%;">
                                                        Beri Catatan
                                                    </a>
                                                </div>

                                                <!-- Bootstrap modal -->
                                                <div class="modal fade" id="edit-item<?php echo $row['visits_id'];?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h3 class="modal-title">Beri Catatan</h3>
                                                            </div>
                                                            <div class="modal-body form" style="height: 200px;">
                                                                <form action="<?php echo base_url();?>Evisit/visit/edit_history" id="form" class="" method="POST">
                                                                    <input type="hidden" value="<?php echo $row['visits_id'];?>" name="id"/>
                                                                    <input type="hidden" name="id_karyawan" value="<?php echo $id_name;?>">
                                                                    <input type="hidden" name="id_dept" value="<?php echo $id_dept;?>">
                                                                    <input type="hidden" name="start" value="<?php echo $tgl_awal;?>">
                                                                    <input type="hidden" name="end" value="<?php echo $tgl_akhir;?>">
                                                                    <div class="form-body">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Catatan</label>
                                                                                <textarea name="note" class="form-control" style="height: 160px"><?php echo trim($row['note']);?> </textarea>
                                                                        </div>
                                                                    </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                            </form>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- End Bootstrap modal -->  
                                                <?php if ($this->session->userdata('id_karyawan') == 96) : ?>
                                    
                                                <div class="block-tombol">
                                                    <a href="#" class="btn btn-red btn-xs-full btn-track lebar" onclick="confirm_modal('<?php echo base_url();?>Evisit/Visit/delete/<?php echo $row['visits_id'].'/'.$id_name.'/'.$id_dept.'/'.$tgl_awal.'/'.$tgl_akhir;?>');" data-toggle="modal" style="width: 100%;">
                                                        Delete
                                                    </a>
                                                </div>

                                                <?php endif; ?>

                                                <div class="block-tombol">
                                                    <a href="#" class="btn btn-primary btn-xs-full btn-track edit-item lebar" data-id="ttd<?php echo $row['visits_id'];?>" data-toggle="modal" data-target="#ttd-item<?php echo $row['visits_id'];?>" style="width: 100%;">
                                                        TTD
                                                    </a>
                                                </div>

                                                <!-- Bootstrap modal -->
                                                <div class="modal fade" id="ttd-item<?php echo $row['visits_id'];?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h3 class="modal-title">Tanda Tangan</h3>
                                                            </div>
                                                            <div class="modal-body form" style="height: 200px;">
                                                                <?php if ($row['sign'] != null) : ?>
                                                                    <div class="tengah">
                                                                        <img src="data:<?php echo $row['sign']; ?>" width="100">        
                                                                    </div>
                                                                <?php else : ?>
                                                                    <div class="tengah">
                                                                        <h3>Belum ada TTD dari perusahaan/instansi</h3>
                                                                    </div>    
                                                                <?php endif; ?>    
                                                            </div>                                                            
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- End Bootstrap modal -->  

                                                <!-- <a href="#" class="btn btn-action btn-xs-full btn-track edit-item lebar" data-toggle="modal" data-target="#edit-item" onclick="edit_book(<?php echo $row['id'];?>)">
							                        Beri Catatan
							                    </a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php }} elseif(empty($history_visit)) { ?>

                                <div style="text-align: center;">Tidak ada data</div>

                                <?php } ?>

                             </div> 
                            <ul class="pagination"></ul>
                        </div>      
                                
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>

                    <div style="text-align: center;">Tidak ada data</div>
                    <?php } ?>
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

<div class="modal fade" id="modal-4">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
            </div>
            
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger" id="delete_link">delete</a>
                <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>

  