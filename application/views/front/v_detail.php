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
						<li data-thumb="<?php echo base_url('assets/uploads/files/'.$detail->gambar) ?>">
							<div class="thumb-image"> <img src="<?php echo base_url('assets/uploads/files/'.$detail->gambar) ?>" data-imagezoom="true" class="img-responsive"> </div>
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
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
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
						<div class="col-md-6" style="margin-left: -12px">
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

										<div id="harga_include_driver"> 
											<h3>Rp<?= number_format($detail->harga_include_driver) ?> /<span style="font-size: 12pt">24jam</span></h3><br>
										</div>

										<div id="harga_exclude_driver" style="display: none"> 
											<h3>Rp<?= number_format($detail->harga_exclude_driver) ?> /<span style="font-size: 12pt;">24jam</span></h3><br>
										</div>

									</div>
								</div>
								<br>
								<div class="color-quality">
									<div class="color-quality-right">
										<h5>Tanggal Mulai</h5>
										<input type="date" name="tgl_mulai">
									</div>
								</div>
								<br>
								<div class="color-quality">
									<div class="color-quality-right">
										<h5>Tanggal Selesai</h5>
										<input type="date" name="tgl_akhir">
									</div>
								</div>
								<br>
								<div class="color-quality">
									<div class="color-quality-right">
										<h5>Jam Pengambilan (WIB)</h5>
										<select name="jam_mulai" class="frm-field required sect">
											<option checked="checked" value="00:00:00">00:00</option>
											<option value="01:00:00">01:00</option>
											<option value="02:00:00">02:00</option>				
											<option value="03:00:00">03:00</option>
											<option value="04:00:00">04:00</option>
											<option value="05:00:00">05:00</option>
											<option value="06:00:00">06:00</option>
											<option value="07:00:00">07:00</option>
											<option value="08:00:00">08:00</option>
											<option value="09:00:00">09:00</option>
											<option value="10:00:00">10:00</option>
											<option value="11:00:00">11:00</option>
											<option value="12:00:00">12:00</option>
											<option value="13:00:00">13:00</option>
											<option value="14:00:00">14:00</option>
											<option value="15:00:00">15:00</option>
											<option value="16:00:00">16:00</option>
											<option value="17:00:00">17:00</option>
											<option value="18:00:00">18:00</option>
											<option value="19:00:00">19:00</option>
											<option value="20:00:00">20:00</option>
											<option value="21:00:00">21:00</option>
											<option value="22:00:00">22:00</option>
											<option value="23:00:00">23:00</option>
										</select>
									</div>
								</div>
								<br>
								<div class="color-quality">
									<div class="color-quality-right">
										<h5>Keterangan :</h5>
										<textarea rows="5" cols="60" name="keterangan"></textarea>
									</div>
								</div>
								
								<br>
								<fieldset>
									<input type="submit" name="submit" value="Pesan" class="button">
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