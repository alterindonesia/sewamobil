<?php $this->load->view('front/v_header') ?>
<?php $this->load->view('front/v_menu') ?>

<style>
	body{
		background-color: #f5f5f5;
	}
		#invoice{
			border: 2px solid lavender;
			width:100%;
		}
		
		#invoice h1{
			background: #006644;
			color: white;
		}
		
		#invoice th{
			color: white;
		}
		
		#invoice td{
			color: black;
		}

		.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>

<div class="container">
	<div class="col-md-offset-3 col-md-6 col-xs-12" style="background-color: #fff; padding: 10px 10px 30px 15px; border-radius: 10px; margin-top: 20px">
		<div class="bs-docs-example">
			<div class="col-md-2 col-xs-2">
				<i style="font-size: 32pt" class="fa fa-user-circle" aria-hidden="true"></i>
			</div>
			<div class="col-md-10 col-xs-10"> 
				<h4 style="font-weight: bold;">
					<?= $user->nama ?> 
					<a href="<?= base_url('akun/ubah_nama') ?>" style="font-size: 10pt; float: right;">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						Ubah
					</a>	
				</h4>
				
				<?php if ($user->status_verifikasi == "Terverifikasi"): ?>
					<i style="color: #2fdab8" class="fa fa-check-circle-o" aria-hidden="true"></i>
					<span style="font-size: 11pt; font-style: italic;color: #2fdab8">
						<?= $user->status_verifikasi ?>		
					</span>
					
					<?php elseif($user->status_verifikasi == "Proses Verifikasi"): ?>
						<i style="color: #f9a825" class="fa fa-clock-o" aria-hidden="true"></i>
						<span style="font-size: 11pt; font-style: italic;color: #f9a825">
							Dalam <?= $user->status_verifikasi ?>
						</span>

					<?php elseif($user->status_verifikasi == "Belum Terverifikasi"): ?>
						<i style="color: red" class="fa fa-exclamation" aria-hidden="true"></i>
						<span style="font-size: 11pt; font-style: italic;color: red">
							<?= $user->status_verifikasi ?>	
						</span>	<br>
						<p style="font-size: 11pt; color:#fbc02d">
							Silahkan upload KTP Anda	
						</p>

						<?php elseif($user->status_verifikasi == "Ditolak"): ?>
						<i style="color: red" class="fa fa-exclamation" aria-hidden="true"></i>
						<span style="font-size: 11pt; font-style: italic;color: red">
							Verifikasi <?= $user->status_verifikasi ?>	
						</span>	<br>
						<p style="font-size: 11pt; color:#f57f17">
							Silahkan upload ulang KTP Anda <i><b>(Pastikan gambar KTP jelas dan sesuai)</b></i>
						</p>		

				<?php endif ?>
				
				<hr>
				<span style="font-size: 10pt; color: #757575">
					No. HP
					<a href="<?= base_url('akun/ubah_nomor') ?>" style="font-size: 10pt; float: right;">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						Ubah
					</a>
				</span>
				<h5 style="font-size: 12pt; font-weight: bold;">
					<?= $user->no_telpon ?>
				</h5>

				<hr>
				<span style="font-size: 10pt; color: #757575">
					Email
					<a href="<?= base_url('akun/ubah_email') ?>" style="font-size: 10pt; float: right;">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						Ubah
					</a>
				</span>
				<h5 style="font-size: 12pt; font-weight: bold;">
					<?= $user->email ?>
				</h5>

				<hr>
				<span style="font-size: 10pt; color: #757575">Alamat 
					<a href="<?= base_url('akun/ubah_alamat') ?>" style="font-size: 10pt; float: right;">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						Ubah
					</a>
				</span>
				<h5 style="font-size: 11pt;">
					<?= $user->alamat ?>
				</h5>

				<hr>
				<span style="font-size: 10pt; color: #757575">KTP</span>
				<br>

					<?php if($user->status_verifikasi == "Ditolak"){ ?>
						<img src="<?= base_url('assets/uploads/ktp/'.$user->ktp) ?>" class="img-responsive" style="max-width: 150px">
						<br>
						<a href="<?= base_url('akun/upload_ktp') ?>">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Upload ulang KTP
						</a>
						<?php } elseif($user->status_verifikasi == "Belum Terverifikasi") { ?>
							<a href="<?= base_url('akun/upload_ktp') ?>">
								<i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload KTP
							</a>
						<?php } else { ?>
							<img src="<?= base_url('assets/uploads/ktp/'.$user->ktp) ?>" class="img-responsive" style="max-width: 150px">
						<?php } ?>
			</div>	
		</div>
	</div>
</div>	

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">

</div>
</div>
<!--//single_page-->

<?php $this->load->view('front/v_footer_up') ?>
<?php $this->load->view('front/v_footer_bottom') ?>

<script type="text/javascript">

	// $('#submit_nama').click(function(){
    
	//     alert('submitting');
	//     $('#formfield').submit();
	// });	

	function form_submit(){
    	document.getElementById("form_nama").submit();
   } 

	function myFunction() {
		  /* Get the text field */
		  var copyText = document.getElementById("rekening");

		  /* Select the text field */
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  /* Alert the copied text */
		  var tooltip = document.getElementById("myTooltip");
  		  tooltip.innerHTML = "Berhasil Disalin: " + copyText.value;
		}
	function outFunc() {
	  var tooltip = document.getElementById("myTooltip");
	  tooltip.innerHTML = "Salin";
	}
</script>