<?php $this->load->view('front/v_header') ?>
<?php $this->load->view('front/v_menu') ?>

	<br>
		<div class="modal-body modal-body-sub_agile">
			 <div class="col-md-4"></div>
				<div class="col-md-4 modal_body_left modal_body_left1">
				<h3 class="agileinfo_sign">Upload KTP <span></span></h3>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="styled-input agile-styled-input-top">
						<input type="file" name="userfile" required=""/>
						<span></span>
					</div>		
					<input type="text" name="tes"/>				
					<input style="width: 100%" type="submit" value="Simpan">
				</form>			
				<div class="clearfix"></div>
				</div>
				
				<div class="clearfix"></div>
			</div>
<!-- //Modal2 -->
<?php $this->load->view('front/v_footer_up') ?>
<?php $this->load->view('front/v_footer_bottom') ?>