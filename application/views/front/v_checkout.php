<?php $this->load->view('front/v_header') ?>
<?php $this->load->view('front/v_menu') ?>

<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Single <span>Page </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?php echo base_url() ?>">Home</a><i>|</i></li>
								<li>Chart</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-12 single-right-left ">
			


	     	<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cart-header1').fadeOut('slow', function(c){
							$('.cart-header1').remove();
						});
						});	  
					});
			   </script>
			   <script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cart-header2').fadeOut('slow', function(c){
							$('.cart-header2').remove();
						});
						});	  
					});
			   </script>
<div class="container">

	<div class="bs-docs-example">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="table-grid">Item</th>		
							<th>Prices</th>
							<th>QTY</th>
							
							<th>Subtotal</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
		  				<?php foreach ($this->cart->contents()as $items): ?>
							<tr align="center">
								<td><h5><a href="<?php echo base_url('index/detail/'.$items['id'])?>"><?php echo $items['name'] ?></a></h5></td>
								<td>Rp <?php echo number_format($items['price']) ?></td>
								<td><?php echo $items['qty'] ?></td>
								
								<td><?php echo number_format($items['subtotal']) ?></td>
								<td><form method="post" action="<?php echo base_url('index/hapus')?>">
										<input type="hidden" value="<?php echo $items['rowid']; ?>" name="id">
										<input type="submit" class="btn btn-danger" value="Delete">
									</form>
								</td>
							</tr>
							
						<?php
						$i++;
						endforeach;
						?>
					</tbody>
				</table>
	</div>

			<br><br>
			<div class="modal-body modal-body-sub_agile">
				<div class="col-md-6 login-right">
				 <h3>Lengkapi Alamat Pengiriman</h3>
				 
				 <p> Silahkan isi alamat dengan lengkap agar memudahkan kami dalam pengiriman. Terimakasih :) </p>

			</div>
						<div class="col-md-6 modal_body_left modal_body_left1">
						
						 <form action="" method="post"> 
						 	<input type="hidden" name="id_pembeli" value="<?= $this->session->userdata('id_pembeli') ?>">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="alamat" required="required">
								<label>Alamat</label>
								<span></span>
							</div><br><br>
							<label>Kota</label>
							<div class="styled-input">
								<select name="id_kota">
								<?php foreach ($city->result() as $kota):?>
									<option value="<?php echo $kota -> id_kota?>"><?php echo $kota->kota?></option>
								<?php endforeach ?>
								</select>
								<span></span>
							</div>

							<input type="submit" value="BAYAR">
						</form>						
						<div class="clearfix"></div>
					</div>
			
			<div class="clearfix"> </div>
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
                $('#minus').click(function () {
                      $('#minus_option').show('fast');
                 });

                $('#normal').click(function () {
                      $('#minus_option').hide('fast');
                 });
               });
</script>