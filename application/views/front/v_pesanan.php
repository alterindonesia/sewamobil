<?php $this->load->view('front/v_header') ?>
<?php $this->load->view('front/v_menu') ?>

<style type="text/css">
	body{
		background-color: #eeeeee;
	}
</style>

<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Pesanan <span> </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?php echo base_url() ?>">Home</a><i>|</i></li>
								<li>Pesanan</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

 <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-offset-2 col-md-8 col-xs-12 single-right-left">
	     	<h3>Pesanan Anda :</h3><br>
			<div class="bs-docs-example">
						<?php $i = 1; $harto=0; ?>
							<?php foreach ($pesanan as $items): ?>
							<table class="table" style="background-color: #fff">
							<thead>
								<tr>								
									<?php if ($items->status_pembayaran == "Menunggu Pembayaran"): ?>
										<th style="text-align: center; background-color: #fbc02d; color: #000000" colspan="2">
											<?= $items->status_pembayaran ?>
										</th>	
									<?php elseif ($items->status_pembayaran == "Verifikasi Pembayaran"): ?>	
										<th style="text-align: center; background-color: #ff6f00; color: #ffffff" colspan="2">
											Pembayaran Sedang Diverifikasi
										</th>
									<?php elseif ($items->status_pembayaran == "Pembayaran Berhasil"): ?>	
										<th style="text-align: center; background-color: #79b700; color: #ffffff" colspan="2">
											<?= $items->status_pembayaran ?>
										</th>
									<?php elseif ($items->status_pembayaran == "Pesanan Selesai"): ?>	
										<th style="text-align: center;" colspan="2">
											<?= $items->statuss ?>
										</th>
									<?php elseif ($items->status_pembayaran == "Pembayaran Gagal"): ?>	
										<th style="text-align: center; background-color: #e53935; color: #ffffff" colspan="2">
											<?= $items->status_pembayaran ?>
										</th>
									<?php elseif ($items->status_pembayaran == "Batal"): ?>	
										<th style="text-align: center; background-color: #bdbdbd" colspan="2">
											<?= $items->status_pembayaran ?>
										</th>		
												 
									<?php endif ?>	
									
								</tr>
							</thead>
							<tbody style="padding: 0">	
								<tr>
									<td style="text-align: left;">
										<?php if ($items->status_pembayaran == "Pembayaran Berhasil"): ?>
											<span style="font-size: 9pt">
											<?php echo date("d M Y", strtotime($items->tgl_transaksi)) ?></span>
											<h5 style="font-weight:bold; margin-bottom: 10px">
												<span style="font-weight: none; font-size: 9pt; color: #9e9e9e">Kode Booking: </span>
												<?= $items->kode_booking ?>
											</h5>

											<?php else: ?>
												<span style="font-size: 9pt">
													<?php echo date("d M Y", strtotime($items->tgl_transaksi)) ?></span>
												<h5 style="font-weight:bold; margin-bottom: 10px">
													INV<?= $items->kode_booking ?>
												</h5>
										<?php endif ?>
										
									</td>
									<td style="text-align: right;">	
										<h5 style="color: #424242; font-weight:bold; margin-bottom: 10px; font-size: 16pt">
											<span style="font-size: 9pt; font-weight: normal;">
												Total Pembayaran:
											</span><br>
											Rp<?php echo number_format($items->total_bayar) ?>
										</h5>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="background-color: #f5f5f5; text-align: center;">
										<h5>
											<i style="font-size: 14pt" class="fa fa-clock-o" aria-hidden="true"></i> Waktu sewa<br><br>
											<b style="margin-left: 10px">
												<?= date('d M Y', strtotime($items->tgl_mulai)) ?>
											</b> 
											<i style="display: none;">
												<?= date('H:i',strtotime($items->jam_mulai)) ?> WIB 
											</i>	
											<i style="margin: 0 10px 0 10px" class="fa fa-long-arrow-right" aria-hidden="true"></i> 
											<b>
												<?= date('d M Y', strtotime($items->tgl_akhir))?>
											</b>
											<i style="display: none;">
												<?= date('H:i',strtotime($items->jam_mulai)) ?> WIB 
											</i>
										</h5>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									
										<?php if ($items->tgl_konfirmasi > 0): ?>
											<td style="text-align: center; " colspan="2"> 	
											 	<a href="<?= base_url('pesanan/invoice/'.$items->id_transaksi) ?>"><i class="fa fa-sign-in"></i> Lihat Detail</a>
											</td>
										<?php  else : ?>	
											<td>
										      	<a href="<?= base_url('pesanan/invoice/'.$items->id_transaksi) ?>"><i class="fa fa-sign-in"></i> Lihat Detail</a>
										    </td>
										    <td style="text-align: right;"> 	
											 	<a href="<?= base_url('konfirmasi/index/'.$items->id_transaksi) ?>">
										      	<button  class="btn btn-warning" style="font-size: 8pt">
										      		Konfirmasi Pembayaran
										      	</button>
										      </a>
											</td>
										      	 
										<?php endif ?>
								</tr>
							</tfoot>
							</table>
							<hr>
							<?php
							$i++;
							endforeach;
							?>
					
			</div>
		</div>
	 	<div class="clearfix"> </div>
	  	<!--/slider_owl-->
	</div>
 </div>
<!--//single_page-->

<?php $this->load->view('front/v_footer_up') ?>
<?php $this->load->view('front/v_footer_bottom') ?>