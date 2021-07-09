<?php $this->load->view('front/v_header') ?>
<?php $this->load->view('front/v_menu') ?>

<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Single <span>Page </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?= base_url() ?>">Home</a><i>|</i></li>
								<li>Detail</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul class="slides">
						<li data-thumb="<?php echo base_url('assets/uploads/files/'.$detail->file) ?>">
							<div class="thumb-image"> <img src="<?php echo base_url('assets/uploads/files/'.$detail->file) ?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<!-- <li data-thumb="images/d1.jpg">
							<div class="thumb-image"> <img src="images/d1.jpg" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb="images/d3.jpg">
							<div class="thumb-image"> <img src="images/d3.jpg" data-imagezoom="true" class="img-responsive"> </div>
						</li> -->
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-4 single-right-left simpleCart_shelfItem">
					<h3>
						<i><?= $detail->nama_merk ?></i><br>
						<?= $detail->type ?>
					</h3>
					<p>
						<span class="item_price">
							<!--  -->
						</span>
					</p>
					<div class="description">
						<div class="col-md-12" style="margin-left: -12px">
							<table class="table table-bordered">
								<tr>
									<th>Transmisi</th><td><i><?= $detail->transmisi ?></i></td>
								</tr>
								<tr>
									<th>Bahan Bakar</th><td><i><?= $detail->bahan_bakar ?></i></td>
								</tr>
								<tr>
									<th>Plat</th><td><i><?= $detail->kategori_plat ?></i></td>
								</tr>
								<tr>
									<th>Kursi</th><td><i><?= $detail->jumlah_kursi ?></i></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="clearfix"></div>
					
					<br>
					<br>
					<br>					
		</div>
		<div class="col-md-4 single-right-left simpleCart_shelfItem">
			<div class="occasion-cart" style="width: 90%; padding-left: 0">
						<div class="snipcart-details top_brand_home_details item_add single-item">
							<form action="" method="post" style="text-align: left">
								<input type='hidden' name="id_kendaraan" value='<?php echo $detail->id_kendaraan ?>'>
								<div class="color-quality">
									<div class="color-quality-right">
										<h5>Pilih Layanan</h5>
										<input type="radio" id="include_driver" checked="checked" name="layanan" value="Dengan Driver"> Dengan Driver <br>
										<input type="radio" id="exclude_driver" name="layanan" value="Tanpa Driver"> Tanpa Driver (Lepas Kunci)
										<br><br>

										<div id="harga_include_driver" style="text-align: center;"> 
										<hr>	
											<h5 style="color: #000">
												Rp<?= number_format($detail->harga_include_driver) ?> <span style="font-size: 12pt;">x <?= $jumlah_hari ?> Hari</span>
											</h5>
											<h3><span style="color: #000">Total:</span> 
												Rp<?= number_format($detail->harga_include_driver * $jumlah_hari) ?><span style="font-size: 12pt;"></span>
											</h3>
										<hr>	
										</div>

										<div id="harga_exclude_driver" style="display: none; text-align: center;"> 
											<hr>
											<h5 style="color: #000">
												Rp<?= number_format($detail->harga_exclude_driver) ?> <span style="font-size: 12pt;">x <?= $jumlah_hari ?> Hari</span>
											</h5>
											<h3><span style="color: #000">Total:</span> 
												Rp<?= number_format($detail->harga_exclude_driver * $jumlah_hari) ?><span style="font-size: 12pt;"></span>
											</h3>
											<hr>
										</div>

									</div>
								</div>
								<br>
								<div class="color-quality">
									<div class="color-quality-right">
										<h5 style="color: #424242; text-align: center;"><i><?= date('d M Y', strtotime($tgl_mulai)) ?> <i class="fa fa-arrow-right" style="margin-left: 3px; color: #bdbdbd; margin-right: 3px" aria-hidden="true"></i> <?= date('d M Y', strtotime($tgl_akhir)) ?></i></h5>

										<h5 style="text-align: center; font-weight: bold;"><?= $jumlah_hari ?> Hari</h5>

										<h5 style="text-align: center; font-size: 9pt">Jam pengambilan: <span><b><?= $jam_mulai ?> WIB</b></span></h5>

									</div>
								</div>
								<br>
								<div class="color-quality">
									<hr>
									<div class="color-quality-right">
										<h5><b>Pilih Bank</b></h5>
										
										<input type="radio" checked="checked" name="bank" value="BCA"> BCA <br>
										<input type="radio" name="bank" value="MANDIRI"> MANDIRI <br>
										<input type="radio" name="bank" value="BNI"> BNI
										<br>
									</div>
								</div><br><br>
										<input type="hidden" readonly="readonly" name="tgl_mulai" value="<?= $tgl_mulai ?>">

										<input type="hidden" readonly="readonly" name="tgl_akhir" value="<?= $tgl_akhir ?>">

										<input type="hidden" readonly="readonly" name="jam_mulai" value="<?= $jam_mulai ?>">
								<fieldset>
									<input style="width: 100%" type="submit" name="submit" value="Pesan" class="button">
								</fieldset>
							</form>
						</div>
																			
					</div>
		</div>
	 	<div class="clearfix"> </div>

	  	<!--/slider_owl-->
	
	</div>
 </div>
<!--//single_page-->

<?php $this->load->view('front/v_footer_up') ?>
<?php $this->load->view('front/v_footer_bottom') ?>

<script type="text/javascript">
	$(document).ready(function () {
                $('#include_driver').click(function () {
                      $('#harga_include_driver').slideDown();
                      $('#harga_exclude_driver').slideUp();
                 });

                $('#exclude_driver').click(function () {
                      $('#harga_include_driver').slideUp();
                      $('#harga_exclude_driver').slideDown();
                 });
               });

	function getDate(){
    var today = new Date();

	document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);

	}

</script>