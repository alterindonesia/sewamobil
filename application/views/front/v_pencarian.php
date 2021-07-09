<?php $this->load->view('front/v_header') ?>
<?php $this->load->view('front/v_menu') ?>

	<br>
				<div class="modal-body modal-body-sub_agile">
					 <div class="col-md-4"></div>
						<div class="col-md-4 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Cari Mobil <span></span></h3>
						 <form action="" method="get">
							<div class="color-quality-right">
								<label>Tanggal Mulai</label>
								<input type="date" name="tgl_mulai" required="required" style="width: 100%;margin-bottom: 30px">
							</div>
							<div class="color-quality-right">
								<label>Tanggal Selesai</label>
								<input type="date" name="tgl_akhir" required="required" style="width: 100%;margin-bottom: 30px">
							</div> 
							<div class="color-quality-right">
								<label>Jam Check-in</label>
								<select style="width: 100%;margin-bottom: 30px" name="jam_mulai" class="frm-field required sect">
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

							<input style="width: 100%" type="submit" value="Cari Mobil">
						</form>						
						<div class="clearfix"></div>
						</div>
						
						<div class="clearfix"></div>
					</div>
<!-- //Modal2 -->
<?php $this->load->view('front/v_footer_up') ?>
<?php $this->load->view('front/v_footer_bottom') ?>