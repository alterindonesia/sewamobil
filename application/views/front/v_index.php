<?php $this->load->view('front/v_header') ?>
<?php $this->load->view('front/v_menu') ?>

<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Sewa Mobil<span>Jakarta</span></h3>
						<!-- <p>Special for today</p> -->
						<a class="hvr-outline-out button2" href="<?= base_url('kendaraan/cari') ?>">Sewa Sekarang</a>
					</div>
				</div>
			</div>
			<div class="item item2"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Discount <span>Juli</span></h3>
						<!-- <p>New Arrivals On Sale</p> -->
						<a class="hvr-outline-out button2" href="<?= base_url('kendaraan/cari') ?>">Sewa Sekarang</a>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
    </div> 
	<!-- //banner -->


<!-- /new_arrivals --> 
	<div class="new_arrivals_agile_w3ls_info"> 
		<div class="container">
		    <h3 class="wthree_text_info">Daftar <span>Mobil</span></h3>		
				<div id="horizontalTab">

					<!-- List Merk Mobil -->
						<ul class="resp-tabs-list">
							<?php foreach ($merk as $key): ?>
								<li><?= $key->nama ?></li>
							<?php endforeach ?>
						</ul>	

					<div class="resp-tabs-container">
						<!--/tab_black-->
							<div class="tab1">
								<?php foreach ($toyota as $key): ?>
								<div class="col-md-3 product-men">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item">
											<img src="<?php echo base_url('assets/uploads/files/'.$key->file); ?>" alt="" class="pro-image-front">
											<img src="<?php echo base_url('assets/uploads/files/'.$key->file); ?>" alt="" class="pro-image-back">
																	
										</div>
										<div class="item-info-product ">
											<h4><a href="<?= base_url() ?>"><?= $key->type ?></a></h4>
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
										</div>
									</div>
								</div>
								<?php endforeach ?>
								<div class="clearfix"></div>
							</div>
						<!--//tab_black-->

						<!--/tab_black-->
							<div class="tab2">
								<?php foreach ($daihatsu as $key): ?>
								<div class="col-md-3 product-men">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item">
											<img src="<?php echo base_url('assets/uploads/files/'.$key->file); ?>" alt="" class="pro-image-front">
											<img src="<?php echo base_url('assets/uploads/files/'.$key->file); ?>" alt="" class="pro-image-back">
																	
										</div>
										<div class="item-info-product ">
											<h4><a href="<?= base_url() ?>"><?= $key->type ?></a></h4>
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
										</div>
									</div>
								</div>
								<?php endforeach ?>
								<div class="clearfix"></div>
							</div>
						<!--//tab_black-->

						<!--/tab_black-->
							<div class="tab3">
								<?php foreach ($honda as $key): ?>
								<div class="col-md-3 product-men">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item">
											<img src="<?php echo base_url('assets/uploads/files/'.$key->file); ?>" alt="" class="pro-image-front">
											<img src="<?php echo base_url('assets/uploads/files/'.$key->file); ?>" alt="" class="pro-image-back">
																	
										</div>
										<div class="item-info-product ">
											<h4><a href="<?= base_url() ?>"><?= $key->type ?></a></h4>
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
										</div>
									</div>
								</div>
								<?php endforeach ?>
								<div class="clearfix"></div>
							</div>
						<!--//tab_black-->

						<!--/tab_black-->
							<div class="tab4">
								<?php foreach ($nissan as $key): ?>
								<div class="col-md-3 product-men">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item">
											<img src="<?php echo base_url('assets/uploads/files/'.$key->file); ?>" alt="" class="pro-image-front">
											<img src="<?php echo base_url('assets/uploads/files/'.$key->file); ?>" alt="" class="pro-image-back">
																	
										</div>
										<div class="item-info-product ">
											<h4><a href="<?= base_url() ?>"><?= $key->type ?></a></h4>
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
										</div>
									</div>
								</div>
								<?php endforeach ?>
								<div class="clearfix"></div>
							</div>
						<!--//tab_black-->
					</div>
				</div>	
			</div>
		</div>
	<!-- //new_arrivals --> 
	<!-- /we-offer -->
		<div class="sale-w3ls">
			<div class="container">
				<!-- <h6>We Offer Flat <span>40%</span> Discount</h6> -->
 
				<a style="margin-top: 15%;" class="hvr-outline-out button2" href="<?= base_url('kendaraan/cari') ?>">Sewa Sekarang</a>
			</div>
		</div>
	<!-- //we-offer -->
<!--grids-->
<?php $this->load->view('front/v_footer_up') ?>
<?php $this->load->view('front/v_footer_bottom') ?>