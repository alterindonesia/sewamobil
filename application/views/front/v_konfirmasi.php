<?php $this->load->view('front/v_header') ?>
<?php $this->load->view('front/v_menu') ?>


<!-- Modal2 -->
	<br>
				<div class="modal-body modal-body-sub_agile">
					 <div class="col-md-4"></div>
						<div class="col-md-4 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Konfirmasi Pembayaran <span></span></h3>
						 <form action="" method="post">
							<div class="styled-input agile-styled-input-top">
								<label>INV</label><br>
								<input type="text" readonly="readonly" name="" value="<?= $row->kode_booking ?>" required="">
								
								<span></span>
							</div>
							<div class="styled-input">
								<label>Jumlah Bayar</label>
								<br>
								<input style="font-size: 14pt; font-weight: bold;" type="text" readonly="readonly" value="Rp<?= number_format($row->total_bayar) ?>">
								
								<span></span>
							</div> 
							<div class="login-mail">
								<label>Transfer Ke:</label>
								<br>
								<input style="font-size: 12pt; font-weight: bold;" type="text" readonly="readonly" value="BANK <?= $row->bank_tujuan ?>">
								<input type="hidden" name="bank_tujuan" value="<?= $row->bank_tujuan ?>">
							</div>
							<input type="hidden" name="tgl_konfirmasi" placeholder="" value="<?= date('Y-m-d H:i:s') ?>" required="">
							<select name="status_pembayaran" hidden="hidden">
								<option value="Verifikasi Pembayaran" selected="selected">Verifikasi Pembayaran</option>
							</select><br><br>
							<input style="width: 100%" type="submit" value="Saya Sudah Bayar">
						</form>						
						<div class="clearfix"></div>
						</div>
						
						<div class="clearfix"></div>
					</div>
<!-- //Modal2 -->
<?php $this->load->view('front/v_footer_up') ?>
<?php $this->load->view('front/v_footer_bottom') ?>