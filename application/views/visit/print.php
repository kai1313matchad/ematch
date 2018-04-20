<style>
	thead tr th {
		text-align: center;
		font-size: 30px;
		font-weight: 700;
		background-color: #007bc1;
	}
	table {
		background: #fff;
		overflow-x: auto;
	}
	.margin-atas {
		margin-top: 20px;
	}
	#tombol-print {
		
		margin-bottom: 30px;
	}
	#tombol-print input {
		width: 30%;
		display: block;
		margin: 0 auto;
	}
	@media(max-width: 767px) {
		#tombol-print input {
			width: 100%;
		}
	}
</style>

<div class="container" id="printableArea">

	<table class="table margin-atas">
		<tbody>
			<tr>
				<td style="width: 200px; text-align: center; font-size: 20px; font-weight: 700;">Visitor</td>
				<td style="width: 200px; text-align: center; font-size: 20px; font-weight: 700;">Jabatan</td>
				<td style="width: 200px; text-align: center; font-size: 20px; font-weight: 700;">Departemen</td>
				<td style="width: 200px; text-align: center; font-size: 20px; font-weight: 700;">Waktu</td>
			</tr>
			<tr>
				<td style="text-align: center;"><?php echo isset($visitor) ? $visitor : $this->session->userdata('nama_karyawan');?></td>
				<td style="text-align: center;"><?php echo $jabatan;?></td>
				<td style="text-align: center;"><?php echo seperate($dept); ?></td>
				<td style="text-align: center;"><?php echo isset($ago) ? $ago : '';?></td>
			</tr>
		</tbody>
	</table>

	<hr>

	<table class="table table-responsive table-bordered table-stripped">
		<thead style="background: #007bc1;">
			<tr style="height: 60px; background: #007bc1; padding-top: 20px; line-height: 20px; font-size: 40px;">
				<th style="width: 40px; font-size: 20px;">No</th>
				<th style="width: 150px; font-size: 20px;">Tanggal</th>
				<th style="width: 200px; font-size: 20px;">Perusahaan</th>
				<th style="width: 150px; font-size: 20px;">Alamat</th>
				<th style="width: 200px; font-size: 20px;">Hasil Kunjungan</th>
				<th style="width: 200px; font-size: 20px;">Note</th>

			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($visit->result_array() as $row) :
					$dateArr = explode(' ', $row['visited_at']);
					$onlyDate = $dateArr[0];
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td>
					<?php echo nama_hari($onlyDate).', '.tgl_indo($onlyDate);?><br>
                    <?php echo date('H:i A', strtotime($row['visited_at']));?>
				</td>
				<td>
					<p><strong><?php echo $row['company'];?></strong>,</p>
					<p><?php echo strtoupper($row['pic']);?>,</p>
					<p><?php echo $row['no_telp'];?>,</p>
					<i><?php echo $row['email_address'];?></i>
				</td>
				<td>
					<?php echo $row['lokasi'];?>
				</td>
				<td>
					<?php echo $row['keterangan'];?><br><br><br>
					<strong>
						<?php echo ($row['verified'] == 1) ? $row['verification_code'] : "<span class='label label-danger'>Belum Diverifikasi</span>";?>		
					</strong>
				</td>
				<td>
					<?php echo $row['note'];?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<table>
		
	</table>
</div>

<div class="container">
	<div class="col-md-122">
		<div id="tombol-print">
			<input type="button" onclick="printDiv('printableArea')" value="PRINT"  class="btn btn-action btn-xs-full btn-track edit-item"/>
		</div>
	</div>	
</div>
