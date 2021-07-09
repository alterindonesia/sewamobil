<?php $this->load->view('front/v_header') ?>
<?php $this->load->view('front/v_menu') ?>

<style>
	body{
		background-color: #f5f5f5;
	}
		#invoice{
			border: 2px solid lavender;
			width:100%;
		}
		
		#invoice h1{
			background: #006644;
			color: white;
		}
		
		#invoice th{
			color: white;
		}
		
		#invoice td{
			color: black;
		}

		.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>

<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>INVOICE <span> </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?php echo base_url() ?>">Home</a><i>|</i></li>
								<li>INVOICE</li>
							</ul>
						 </div>
				</div>

	</div>
</div>

<div class="container">
	<div class="col-md-offset-2 col-md-8 col-xs-12" style="background-color: #ffffff">
	<div class="bs-docs-example">
		

			<table class="table table-borderless">
					<thead>
						<tr>
							<?php if ($row->status_pembayaran == "Pembayaran Berhasil"): ?>
								<th colspan="2" style="text-align: center; color: #8bc34a">
									
									<h3>
										<i style="font-size: 32pt;" class="fa fa-check-circle-o" aria-hidden="true"></i>
										<span><?=$row->status_pembayaran?></span>
									</h3><br>
									<h4>
										<span style="font-size: 10pt; color: #9e9e9e">Kode Booking:</span> 
										<span style="font-weight: bold; color: #757575"><?= $row->kode_booking ?></span>
									</h4>
								</th>
								<?php elseif ($row->status_pembayaran == "Verifikasi Pembayaran"): ?>

									<th colspan="2" style="text-align: center;">
										<h3>
											<i style="font-size: 32pt;" class="fa fa-clock-o" aria-hidden="true"></i>
											<span>Pembayaran Sedang Diverifikasi</span>
										</h3><br>
										<h4>
											<span style="font-weight: bold; color: #000">INV<?= $row->kode_booking ?></span>
										</h4>
									</th>
								<?php else: ?>
									<th colspan="2">
										<?php if ($row->status_pembayaran == "Menunggu Pembayaran"): ?>
											<span style="margin-bottom: 10px" class="badge badge-warning">
												<?=$row->status_pembayaran?>
											</span>

										<?php elseif ($row->status_pembayaran == "Pembayaran Gagal"): ?>
											<span style="margin-bottom: 5px; background-color: #e53935" class="badge">
												<?=$row->status_pembayaran?>
											</span>	
										
										<?php elseif ($row->status_pembayaran == "Batal"): ?>
											<span style="margin-bottom: 5px; background-color: #bdbdbd" class="badge">
												<?=$row->status_pembayaran?>
											</span>		
										<?php endif ?>
										<h4>INV<?= $row->kode_booking ?></h4>
									</th>
								<?php endif ?>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; $grandTotal = 0?>
		  				
							<tr align="center">
								<td>
									<img src="<?= base_url('assets/uploads/files/'.$row->file) ?>" class="img-fluid" style="max-width: 150px">
								</td>
								<td>
									<h4 style="text-align: left; font-weight: bold;">
										<?= $row->nama_merk ?> <?= $row->type ?>
									</h4>	

									<h5 style="text-align: left; margin-top: 15px">
										Transmisi: <i><b><?= $row->transmisi ?></b></i>
									</h5>
									<h5 style="text-align: left; margin-top: 8px">
										Bahan Bakar: <i><b><?= $row->bahan_bakar ?></b></i>
									</h5>
									<h5 style="text-align: left; margin-top: 8px">
										Plat: <i><b><?= $row->kategori_plat ?></b></i>
									</h5>
									<h5 style="text-align: left; margin-top: 8px; margin-bottom: 20px">
										Kursi: <i><b><?= $row->jumlah_kursi ?></b></i>
									</h5>
									<h4 style="text-align: left;">
										<i><span style="font-size: 12pt;"><?= $row->layanan ?></span></i>
									</h4>
								</td>
							</tr>
							
					</tbody>

					<tfoot>
						<tr><td colspan="2"><hr></td></tr>
						<tr>
							<td style="text-align: right;">Waktu mulai</td>
							<td>
								<h4 style="font-weight: bold;"><?= date('d M Y', strtotime($row->tgl_mulai)) ?></h4>
								<i>Jam: <?= $row->jam_mulai ?></i>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">Waktu selesai</td>
							<td>
								<h4 style="font-weight: bold;"><?= date('d M Y', strtotime($row->tgl_akhir)) ?></h4>
								<i>Jam: <?= $row->jam_mulai ?></i>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">Lama sewa</td>
							<td>
								<h5 style="font-weight: bold;"><?= $row->jumlah_hari ?> hari</h5>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">Biaya per hari</td>
							<td>
								<h5 style="font-weight: bold;">Rp<?= number_format($row->harga_layanan) ?></h5>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;">Kode Unik</td>
							<td>
								<h5 style="font-weight: bold;">
									<?= substr($row->total_bayar, -3) ?>
								</h5>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;"><b>Total Bayar</b></td>
							<td>
								<h4 style="color: #ffa000; font-weight: bold;">Rp<?= number_format($row->total_bayar) ?></h4>
							</td>
						</tr>
						<tr>
							<td style="text-align: right;"><b>Metode Pembayaran</b></td>
							<td> 
								<?php if ($row->bank_tujuan == "BCA"): ?>
									<b>Transfer Bank <?=$row->bank_tujuan?></b>
									<h5 style="font-weight: bold;">421-012-6789</h5>
									<input type="hidden" value="4210126789" id="rekening">
									a.n. Sewa Mobil Jakarta
									<br><br>

									<?php elseif ($row->bank_tujuan == "MANDIRI"): ?>
										<b>Transfer Bank <?=$row->bank_tujuan?></b>
										<h5 style="font-weight: bold;">50001-012-6789</h5>
										<input type="hidden" value="500010126789" id="rekening">
										a.n. Sewa Mobil Jakarta
										<br><br>

									<?php elseif ($row->bank_tujuan == "BNI"): ?>
										<b>Transfer Bank <?=$row->bank_tujuan?></b>
										<h5 style="font-weight: bold; margin-top: 5px">341-0129-5555</h5>
										<input type="hidden" value="34101295555" id="rekening">
										a.n. Sewa Mobil Jakarta
										<br><br>	
								<?php endif ?>
								
								<!-- <div class="tooltip"> -->
									<!-- <button onclick="myFunction()" onmouseout="outFunc()" class="btn btn-primary" style="border-radius: 20px"> 
										<span class="tooltiptext" id="myTooltip">Salin</span>
									Salin Nomor Rekening</button> -->
								<!-- </div>	 -->
									
							</td>
						</tr>	
						<tr><td colspan="2"><hr></td></tr>

					</tfoot>	
				</table>
				<div class="konfirm" style="text-align: center;">		
				<?php if ($row->status_pembayaran == "Menunggu Pembayaran"): ?>
					<a href="<?= base_url("Konfirmasi/index/$row->id_transaksi") ?>">
						<button class="btn btn-success">Konfirmasi Pembayaran</button>
					</a>
				<?php endif ?>
				</div>	
	</div>
	</div>
</div>	

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">

</div>
</div>
<!--//single_page-->

<?php $this->load->view('front/v_footer_up') ?>
<?php $this->load->view('front/v_footer_bottom') ?>

<script type="text/javascript">
	function myFunction() {
		  /* Get the text field */
		  var copyText = document.getElementById("rekening");

		  /* Select the text field */
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  /* Alert the copied text */
		  var tooltip = document.getElementById("myTooltip");
  		  tooltip.innerHTML = "Berhasil Disalin: " + copyText.value;
		}
	function outFunc() {
	  var tooltip = document.getElementById("myTooltip");
	  tooltip.innerHTML = "Salin";
	}
</script>