<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KMWDKRR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php $pageName = basename($_SERVER['PHP_SELF']); ?>

<div class="page-wraper">
	<!-- <div id="loading-icon-bx">
		<div class="loading-inner">
			<div class="load-one"></div>
			<div class="load-two"></div>
			<div class="load-three"></div>
		</div>
	</div> -->

	<!-- header -->
	<header class="header header-transparent rs-nav">
		<!-- main header -->
		<div class="sticky-header navbar-expand-lg">
			<div class="menu-bar clearfix">
				<div class="container-fluid clearfix">
					<!-- website logo -->
					<div class="menu-logo logo-dark">
						<a href="<?= $base_url ?>index.php"><img src="<?= $base_url ?>images/header_img/smile-solutions.png" alt="DrDCR Logo"></a>
					</div>
					<!-- nav toggle button -->
					<button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation" onclick="mobileMenu()">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- extra nav -->
					<!-- <div class="secondary-menu">
						<ul>
							<li class="search-btn"><button id="quikSearchBtn" type="button" class="btn-link"><i class="las la-search"></i></button></li>
							<li class="num-bx"><a href="tel:(+01)999888777"><i class="fas fa-phone-alt"></i> (+01) 999 888 777</a></li>
							<li class="btn-area"><a href="contact-us.php" class="btn btn-primary shadow">CONTACT US <i class="btn-icon-bx fas fa-chevron-right"></i></a></li>
						</ul>
					</div> -->
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="searchRemove"><i class="ti-close"></i></span>
                    </div>
					<div class="menu-links navbar-collapse collapse justify-content-end " id="menuDropdown">
					
						<div class="menu-logo">
							<a href="<?= $base_url ?>index.php"><img src="<?= $base_url ?>new-images/dcrlogo.png" alt="DrDCR Logo"></a>
						</div>
						<ul class="nav navbar-nav">	

							<li <?php echo($pageName=="index.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>index.php" class="header-text">Home</a></li>

							<li <?php echo($pageName=="about-us.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>about-us.php" class="header-text">About Us</a></li>
							<!-- <li>
								<a href="javascript:;">Pages <i class="fas fa-plus"></i></a>
								<ul class="sub-menu">
									<li class="add-menu-left">
										<ul>
											
											<li <?php //echo($pageName=="team.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>team.php"><span>Our Team</span></a></li>
											<li <?php// echo($pageName=="faq.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>faq.php"><span>FAQ's</span></a></li>
											<li <?php //echo($pageName=="booking.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>booking.php"><span>Booking</span></a></li>
											<li <?php// echo($pageName=="error-404.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>error-404.php"><span>Error 404</span></a></li>
											<li <?php //echo($pageName=="login.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>login.php"><span>Login / Register</span></a></li>
										</ul>
									</li>
								</ul>
							</li> -->

							<!-- <li <?php// echo($pageName=="services.php")?" class='active'" :""; ?>>
								<a href="<?//= $base_url ?>services.php">Services</a>
								<ul class="sub-menu">
									<li class="add-menu-left">
										<ul>
											<li <?php //echo($pageName=="services.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>services.php"><span>Service</span> </a></li>
											<li <?php //echo($pageName=="service-detail.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>service-detail.php"><span>Service Detail</span></a></li>
										</ul>
									</li>
								</ul>
							</li> -->

							<li>
								<a href="#" class="header-text">Services<i class="fas fa-plus"></i></a>
								<ul class="sub-menu" style="width: max-content;">
									<li class="add-menu-left">
										<ul>
											<li <?php echo($pageName=="children-dentistry-in-chromepet.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>children-dentistry-in-chromepet.php"><span >Children Dentistry</span> </a></li>
											<li <?php echo($pageName=="root-canal-treatment-in-chromepet.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>root-canal-treatment-in-chromepet.php"><span>Root Canal Treatment</span> </a></li>
											<li <?php echo($pageName=="orthodontics-in-chromepet.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>orthodontics-in-chromepet.php"><span>Orthodontics</span> </a></li>
											<li <?php echo($pageName=="ICD-implantation.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>ICD-implantation.php"><span>Defibrillators (ICD) Implantation</span> </a></li>
											<li <?php echo($pageName=="cardiac-resynchronization-therapy.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>cardiac-resynchronization-therapy.php"><span class="heading-text">Cardiac Resynchronization Therapy (CRT)</span> </a></li>
											<li <?php echo($pageName=="leadless-pacemaker-implantation.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>leadless-pacemaker-implantation.php"><span>Leadless Pacemaker Implantation</span> </a></li>
											<li <?php echo($pageName=="eps-and-rfa.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>eps-and-rfa.php"><span>Electrophysiology Study (EPS) &  <br>
												Radiofrequency Ablation (RFA)</span> </a></li>
											<li <?php echo($pageName=="atrial-fibrillation-management.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>atrial-fibrillation-management.php"><span>Atrial Fibrillation Management</span> </a></li>
											<li <?php echo($pageName=="ventricular-tachycardia-treatment.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>ventricular-tachycardia-treatment.php"><span>Ventricular Tachycardia Treatment</span> </a></li>
											<li <?php echo($pageName=="sudden-cardiac-arrest.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>sudden-cardiac-arrest.php"><span>Sudden Cardiac Arrest</span> </a></li>
										</ul>
									</li>
								</ul>
							</li>

							<!-- <li><a href="blogs.php">Blogs </a>
								<ul class="sub-menu left">
									<li <?php //echo($pageName=="blog-grid.php")?" class='active'" :""; ?>><a href="blog-grid.php"><span>Blogs</span></a></li>
									<li <?php //echo($pageName=="blog-details.php")?" class='active'" :""; ?>><a href="blog-details.php"><span>Blog Details</span></a></li>
								</ul>
							</li> -->
							<li <?php echo($pageName=="press-releases.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>press-releases.php" class="header-text">Press Releases</a></li>
							<li <?php echo($pageName=="testimonial.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>testimonial.php" class="header-text">Testimonials</a></li>
							<li <?php echo($pageName=="gallery.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>gallery.php" class="header-text">Smile Gallery</a></li>
							<li <?php echo($pageName=="blogs.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>blogs.php" class="header-text">Blogs</a></li>
							<li <?php echo($pageName=="contact-us.php")?" class='active'" :""; ?>><a href="<?= $base_url ?>contact-us.php" class="header-text">Contact Us</a></li>
							 
						</ul>
						<!-- <ul class="social-media">
							<li><a target="_blank" href="https://www.facebook.com/" class="btn btn-primary"><i class="fab fa-facebook-f"></i></a></li>
							<li><a target="_blank" href="https://www.google.com/" class="btn btn-primary"><i class="fab fa-google"></i></a></li>
							<li><a target="_blank" href="https://www.linkedin.com/" class="btn btn-primary"><i class="fab fa-linkedin-in"></i></a></li>
							<li><a target="_blank" href="https://twitter.com/" class="btn btn-primary"><i class="fab fa-twitter"></i></a></li>
						</ul> -->
						<div class="menu-close">
							<i class="ti-close"></i>
						</div>
					</div>
					<!-- Navigation Menu END ==== -->
				</div>
			</div>
		</div>
		<!-- main header END -->
	</header>
	<!-- header END -->
</div>
