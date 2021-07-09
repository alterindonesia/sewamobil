<?php $this->load->view('front/v_header') ?>
<?php $this->load->view('front/v_menu') ?>

<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>All <span>Product</span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?php echo base_url() ?>">Home</a><i>|</i></li>
								<li>Hasil Pencarian</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		<div class="col-md-4 products-left">
			<div class="css-treeview">
				<h4>Merk</h4>
				<ul class="tree-list-pad">
					<?php foreach ($merk as $key): ?>
						<li>
							<a href="<?= base_url('kendaraan/cari_by_merk?'.$params.'&merk='.$key->id) ?>">
								<label for="item-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> <?= $key->nama ?></label>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<?php foreach ($kendaraan as $key): ?>
				<div class="col-md-4 product-men">
					<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item">
											<img src="<?php echo base_url('assets/uploads/files/'.$key->file); ?>" alt="" class="pro-image-front">
											<img src="<?php echo base_url('assets/uploads/files/'.$key->file); ?>" alt="" class="pro-image-back">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="<?= base_url('kendaraan/booking/'.$key->id_kendaraan.'?'.$params) ?>" class="link-product-add-cart">LIHAT DETAIL</a>
													</div>
												</div>
																	
										</div>
										<div class="item-info-product ">
											<h4><a href="<?= base_url('kendaraan/booking/'.$key->id_kendaraan.'?'.$params) ?>"><?= $key->type ?></a></h4>
											<div class="info-product-price">
												<span class="item_price">
													Rp<?= number_format($key->harga_include_driver) ?> /<span style="font-size: 9pt"> 24 jam</span>
												</span><br>
												<i style="font-size: 10pt;">
													<span style="color:#757575" class="fa fa-check"></span>
													Dengan Driver
												</i>
												<br><br>
												<span class="item_price" style="color: #ffa000">
													Rp<?= number_format($key->harga_exclude_driver) ?> /<span style="font-size: 9pt;color: #ffa000"> 24 jam</span>
												</span><br>
												<i style="font-size: 10pt;">
													<span style="color:#757575" class="fa fa-times"></span>
													Tanpa Driver
												</i>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2"></div>							
										</div>
									</div>				
				</div>
			<?php endforeach ?>
				
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		
	
	</div>
</div>	
<!-- //mens -->
<?php $this->load->view('front/v_footer_up') ?>
<?php $this->load->view('front/v_footer_bottom') ?>