<?php $this->load->view('front/v_header') ?>
<?php $this->load->view('front/v_menu') ?>

<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3><?php echo $kategori->nama_kategori ?> <span></span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?php echo base_url() ?>">Home</a><i>|</i></li>
								<li><?php echo $kategori->nama_kategori ?></li>
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
				<h4>Categories</h4>
				<ul class="tree-list-pad">
					<li>
						<a href="<?php echo base_url('index/product') ?>">
							<label for="item-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> ALL PRODUCT</label>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('index/categories/9') ?>">
							<label for="item-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Black Colours</label>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('index/categories/11') ?>">
							<label for="item-1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Brow Colors</label>
						</a>	
					</li>
					<li>
						<a href="<?php echo base_url('index/categories/10') ?>">
							<label for="item-2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Grey Colours</label>
						</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<?php foreach ($produk->result() as $key): ?>
				<div class="col-md-4 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="<?php echo base_url('assets/uploads/files/'.$key->gambar); ?>" alt="" class="pro-image-front">
										<img src="<?php echo base_url('assets/uploads/files/'.$key->gambar); ?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="<?php echo base_url('index/detail/'.$key->id_produk) ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<!-- <span class="product-new-top">New</span> -->
											
									</div>
									<div class="item-info-product ">
										<h4><a href="<?php echo base_url('index/detail/'.$key->id_produk) ?>"><?php echo $key->nama_produk ?></a></h4>
										<div class="info-product-price">
											<span class="item_price">Rp <?php echo number_format($key->harga) ?></span>
											
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											
										</div>
																			
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