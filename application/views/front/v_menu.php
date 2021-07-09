<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
			<form action="<?php echo base_url('kendaraan')?>" method="get">
					<input type="search" name="key" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
					<input type="submit" value=" ">
				<div class="clearfix"></div>
			</form>
		</div>
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1><a href="<?php echo base_url() ?>"><span>S</span>ewa Mobil <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
			</div>
        <!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">
						<ul class="social-nav model-3d-0 footer-social w3_agile_social">
	                       <li class="share">Follow : </li>
							<li><a href="#" class="facebook">
								  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a>
							</li>
							<li><a href="#" class="twitter"> 
								  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a>
							</li>
							<li><a href="#" class="instagram">
								  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a>
							</li>

						</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a></li>
<!-- 					<li class="menu__item dropdown">
					   <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Short Codes <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="icons.html">Web Icons</a></li>
									<li><a href="typography.html">Typography</a></li>
								</ul>
					</li> -->
					<?php if($this->session->userdata('login_user')){ ?>
					<li class=" menu__item"><a class="menu__link" href="<?php echo base_url('pesanan') ?>">Pesanan</a></li>
					<li class=" menu__item"><a class="menu__link" href="<?php echo base_url('akun') ?>">Akun</a></li>	
					<li class=" menu__item"><a class="menu__link" href="<?php echo base_url('login/logout') ?>">Logout</a></li>
		       	 	<?php } ?>

					<?php if(!$this->session->userdata('login_user')){ ?>
		            <li class=" menu__item"><a class="menu__link" href="<?php echo base_url('login') ?>"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Login</a></li>
					<li class=" menu__item"><a class="menu__link" href="<?php echo base_url('index/registrasi') ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Register</a></li>
		       	 	<?php } ?>
					
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<a href="<?= base_url('kendaraan/cari') ?>">
				<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
					<b style="color: #000">SEWA</b>
					<button class="w3view-cart"><i class="fa fa-car" aria-hidden="true"></i>
					</button>
				</div>
			</a>	
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
		<div class="modal fade" id="login" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Log In <span></span></h3>
									<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="">
								<label>Nama</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="Email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<input type="submit" value="Sign In">
						</form>
						<div class="clearfix"></div>
						<p><a href="#" data-toggle="modal" data-target="#myModal2" > Belum Punya Akun?</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->
<!-- Modal2 -->
		<div class="modal fade" id="register" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up <span></span></h3>
						 <form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="">
								<label>Nama</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="password" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<!-- <div class="styled-input">
								<input type="password" name="Confirm Password" required=""> 
								<label>Confirm Password</label>
								<span></span>
							</div> --> 
							<input type="submit" value="Sign Up">
						</form>						
						<div class="clearfix"></div>
						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->
