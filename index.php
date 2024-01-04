<?php include('starter.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Best Dental Clinic in Chrompet: Get Quality Care Now!</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="We are the best dental clinic in Chrompet, offers advanced treatment for all dental problems. Our experienced dentists provide quality services to the patients.">
	<meta name="keywords" content="Dental clinic in Chrompet, Dental Clinic in Chromepet, Dental Care in Chrompet, Dental Hospital in Chrompet, Dentist in Chrompet, Dentistry in Chrompet, Dental Services in Chrompet">
	<meta name="author" content="Muviereck">
	<meta property="og:title" content="Experience the Best Dental Care at Chrompet's Top Clinic!">
	<meta property="og:description" content="Best Dental Clinic in Chrompet - Quality care, modern tech, friendly staff. Get your smile back!">
	<meta property="og:url" content="https://smilesolutions.muviereck.com">
	<meta property="og:site_name" content="Smile Solutions Family Dentistry">
	<meta property="og:image" content="https://smilesolutions.muviereck.com/new-images/banners/index1.jpg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<meta property="og:locale" content="en_IN">
	<meta property="og:type" content="website">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="Experience the Best Dental Care at Chrompet's Top Clinic">
	<meta name="twitter:description" content="Best Dental Clinic in Chrompet - Quality care, modern tech, friendly staff. Get your smile back!">
	<meta name="twitter:site" content="@Smilesolutions">
	<meta name="twitter:image" content="https://smilesolutions.muviereck.com/new-images/banners/index1.jpg">
	<meta name="twitter:image:alt" content="Smile Solutions - Best Dental Clinic in Chrompet">
	<meta name="twitter:creator" content="@smilesolutions">

	<link rel="canonical" href="https://www.smilesolutions.com/">
	<?php include "header.php"; ?>
	<style>
		.slide-img {
			height: 80%;
			width: 100%;
			position: absolute;
		}

		.container1 {
			height: 350px;
			width: 300px;
			position: relative;
			overflow: hidden;
		}

		@media screen and (max-width: 370px) {
			.slide-img {
				height: 75% !important;
			}

			.container1 {
				height: 300px !important;
			}
		}

		.sub-menu li a:hover {
			color: #fff !important;
		}

		#my-img {
			clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);
		}

		#my-img1 {
			clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);
		}

		#my-img2 {
			clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);
		}

		#slider {
			/* //margin-top:28px; */
			position: relative;
			height: 80%;
			margin-left: -20px;
			-webkit-appearance: none;
			width: calc(100% + 40px);
			background-color: transparent;
			outline: none;
		}

		#slider::-webkit-slider-thumb {
			-webkit-appearance: none;
			height: 50px;
			width: 50px;
			content: "more";
			/* //background: url(/new-images/arrow.png), rgba(225, 225, 225, 0.3); */
			border: 3px solid #ffffff;
			border-radius: 50%;
			background-size: contain;
			cursor: pointer;
		}

		#slider1 {
			/* margin-top:28px; */
			position: relative;
			height: 80%;
			margin-left: -20px;
			-webkit-appearance: none;
			width: calc(100% + 40px);
			background-color: transparent;
			outline: none;
		}

		#slider1::-webkit-slider-thumb {
			-webkit-appearance: none;
			height: 50px;
			width: 50px;
			/*background: url(/new-images/arrow.png), rgba(225, 225, 225, 0.3); */
			border: 3px solid #ffffff;
			border-radius: 50%;
			background-size: contain;
			cursor: pointer;
		}

		#slider2 {
			/* //margin-top:28px; */
			position: relative;
			height: 80%;
			margin-left: -20px;
			-webkit-appearance: none;
			width: calc(100% + 40px);
			background-color: transparent;
			outline: none;
		}

		#slider2::-webkit-slider-thumb {
			-webkit-appearance: none;
			height: 50px;
			width: 50px;
			/* //background: url(/new-images/arrow.png), rgba(225, 225, 225, 0.3); */
			border: 3px solid #ffffff;
			border-radius: 50%;
			background-size: contain;
			cursor: pointer;
		}

		.h3-head {
			color: black !important;
		}

		.treatment-single {
			border-radius: 15px;
		}

		/* second animation */

		.free-mini-website-row .free-mini-website-image1,
		.free-mini-website-row .free-mini-website-image3 {
			width: 100%;
			margin-top: -30px;
			border-radius: 15px;
		}

		.free-mini-website-row .free-mini-website-image2,
		.free-mini-website-row .free-mini-website-image4 {
			width: 100%;
			margin-top: 30px;
			border-radius: 15px;
		}


		@media screen and (max-width: 575.95px) {
			.free-mini-website-row .free-mini-website-image1 {
				width: 100%;
				margin-top: 0px;
				border-radius: 15px;
			}

			.free-mini-website-row .free-mini-website-image2 {
				width: 100%;
				margin-top: -10px;
				border-radius: 15px;
			}

			.free-mini-website-row .free-mini-website-image3 {
				width: 100%;
				margin-top: 0px;
				border-radius: 15px;
			}

			.free-mini-website-row .free-mini-website-image4 {
				width: 100%;
				margin-top: 37%;
				border-radius: 15px;
			}
		}

		/* Add this style to your CSS file or within a <style> tag in your HTML */
		@keyframes zoomIn {
			from {
				transform: scale(0);
			}

			to {
				transform: scale(1);
			}
		}

		.img-animation {
			animation: zoomIn 1s ease-in-out;
		}

		.parallax0 {
			/* The image used */
			background-image: url("images/index/pa6.jpg");

			/* Set a specific height */
			min-height: 400px;

			/* Create the parallax scrolling effect */
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			/* background-size: cover; */
		}

		.parallax1 {
			/* The image used */
			background-image: url("images/index/pa7.png");

			/* Set a specific height */
			min-height: 400px;

			/* Create the parallax scrolling effect */
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}

		.parallax2 {
			/* The image used */
			background-image: url("images/index/pa4.jpeg");

			/* Set a specific height */
			min-height: 400px;

			/* Create the parallax scrolling effect */
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			/* background-size: cover; */
		}

		.parallax3 {
			/* The image used */
			background-image: url("images/index/pa2.jpeg");

			/* Set a specific height */
			min-height: 400px;

			/* Create the parallax scrolling effect */
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			/* background-size: cover; */
		}

		.parallax4 {
			/* The image used */
			background-image: url("images/index/pa5.jpg");

			/* Set a specific height */
			min-height: 400px;

			/* Create the parallax scrolling effect */
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			/* background-size: cover; */
		}
	</style>
</head>


<body>
	<?php include('menu.php'); ?>
	<div class="page-content bg-white" style="margin-top: 80px; 
	background-image:url(images/main-banner/bg1.jpg);
	/* background-color:#f2fff7 !important; */
	">

		<div id="demo" class="carousel slide" data-ride="carousel">

			<!-- Indicators -->
			<div class="d-none d-md-block">
				<ul class="carousel-indicators" style="z-index: 0;">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
					<li data-target="#demo" data-slide-to="2"></li>
				</ul>
			</div>

			<!-- The slideshow -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="container-fluid inner-content">
						<div class="row align-items-center">
							<div class="col-lg-7 col-md-6 col-sm-7">
								<!-- <h6 class="title-ext text-primary">We Provide All Health Care Solution</h6> -->
								<h1 class="banner-content banner-content-index mb-3">Best Dental Clinic in Chrompet Chennai</h1>
								<a href="about-us.php" class="btn common-btn btn-lg shadow">Read More</a>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-5">
								<div class="banner-img">
									<img src="images/index/nbf.png" alt="">
								</div>
							</div>
						</div>
					</div>
					<!-- <img src="new-images/dban.jpg" alt="Los Angeles" style="width: 100%; height: 500px;"> -->
				</div>
				<div class="carousel-item">
					<div class="container-fluid inner-content">
						<div class="row align-items-center">
							<div class="col-lg-7 col-md-6 col-sm-7">
								<!-- <h6 class="title-ext text-primary">We Provide All Health Care Solution</h6> -->
								<h2 style="font-size: 40px;" class="banner-content mb-3">Smile Makeover Your Family by Smile Solution</h2>
								<a href="about-us.php" class="btn common-btn btn-lg shadow">Read More</a>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-5">
								<div class="banner-img">
									<img src="images/index/vnbs.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="carousel-item">
					<div class="container-fluid inner-content">
						<div class="row align-items-center">
							<div class="col-lg-7 col-md-6 col-sm-7">
								<h2 style="font-size: 40px;" class="banner-content mb-3">Children Dentistry In Chrompet</h2>
								<a href="about-us.php" class="btn common-btn btn-lg shadow">Read More</a>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-5">
								<div class="banner-img">
									<img src="images/index/vnbl.png" width="67%" alt="">
								</div>
							</div>
						</div>
					</div>
				</div> -->
				

			</div>

			<!-- Left and right controls -->
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<i class="fa fa-chevron-left py-2 ps-2 rounded-circle" aria-hidden="true" style="background-color: #154D38; padding-right: 0.7rem !important;"></i>
				<!-- <span class="carousel-control-prev-icon"></span> -->
			</a>

			<a class="carousel-control-next" href="#demo" data-slide="next">
				<!-- <span class="carousel-control-next-icon"></span> -->
				<i class="fa fa-chevron-right py-2 pe-2 rounded-circle" aria-hidden="true" style="background-color: #154D38; padding-left: 0.7rem !important;"></i>
			</a>
		</div>

	</div>



	<div class="container-fluid">
		<div class=" ">
			<div class="col-md-12">
				<div class="thsn-team-details-wrap">
					<div class="row main-row-padding">
						<div class="col-lg-5">
							<div class="">
								<img width="770" height="770" src="images/index/sm1.jpg" class="attachment-thsn-img-770x770 size-thsn-img-770x770 wp-post-image img-animation" alt="Dr Deep Chand Raja" srcset="images/index/sm1.jpg?resize=150%2C150&amp;ssl=1 150w, images/index/sm1.jpg?resize=770%2C770&amp;ssl=1 770w, images/index/sm1.jpg?resize=300%2C300&amp;ssl=1 300w, images/index/sm1.jpg?zoom=2&amp;resize=770%2C770&amp;ssl=1 1540w" sizes="(max-width: 770px) 100vw, 770px">
							</div>
						</div>
						<div class="col-lg-7 ">
							<div class="">
								<h3 class="mb-3" style="font-size: 26px;" data-aos="fade-up">Best Dental Clinic in Chrompet Chennai</h3>
								<h6 class="" data-aos="fade-up" data-aos-delay="100">Smile Solutions Family Dentistry </h6>
							</div>
							<div class=" text-justify">
								<p data-aos="fade-up" data-aos-delay="150">Smile Solutions Family Dentistry, a renowned dental clinic in Chrompet Chennai, provides exceptional and comprehensive dental care.Our highly skilled and experienced dentists are committed to ensuring your comfort and satisfaction.</p>
								<ul data-aos="fade-up" data-aos-delay="200">
									<li><a href="tel:9043632236" class="text-dark">Phone: 8637632673</a></li>
									<li><a href="mailto:deepchandh@gmail.com" class="text-dark">Email: smilesolutions18@gmail.com</a></li>
								</ul>
								<a href="about-us.php" class="btn common-btn shadow" data-aos="fade-up" data-aos-delay="250">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- .row -->
		
		</div>

		<div class="parallax1"></div>
		<!-- service -->
		<section class="section-area section-sp1 service-wraper service-wraper-index" style="background-color: #f7f7ff;">
			<div class="row align-items-center">
				<div class="col-xl-7 col-lg-7 mb-30">
					<div class="heading-bx">
						<h6 class="title-ext text-secondary mt-5">Services</h6>
						<h2 class="title for-service-text-size" style="color:#343a40 !important;" >Our Services</h2>
						<p style="color:#343a40 !important; font-size: 16px;" >Smile Solutions Family Dentistry offers a complete range of dental care services and treatments. Whether you require a thorough dental cleaning or a more intricate cosmetic procedure for your teeth or gums, we have the ideal dental treatment tailored to your needs. Below is a summary of the services provided by our dependable and highly skilled dentist in Chrompet, Chennai.</p>
					</div>
					<a href="services.php" class="btn btn-secondary btn-lg shadow" >Dentistry Services</a>
				</div>

				<div class="col-xl-5 col-lg-4 col-md-12   mb-15  text-center order-first order-lg-last paroller">
					<img src="images/index/sm3.jpg" alt="DrDCR – Best Cardiologist in Chennai" class="shadows-box img-animation ">
				</div>
			</div>

		</section>


		<!-- <div class="parallax1"></div> -->
		<section class=" section-style-one p-4" id="features" style="background-color: #fff;">
			<div class="">
				<div class="row section-header wow fadeInUp" style="margin-bottom: 0px;">
					<h3 style="font-family: 'Link Sans', 'Arial Black', Arial, sans-serif;">Best Dental Clinic in Chrompet Chennai</h3>
					<p class="">
						Welcome to Smile Solutions Family Dentistry, your go-to destination for top-notch dental care. Our clinic in Chrompet, Chennai, offers a wide range of dental services, from basic diagnosis to full mouth rehabilitation and dental implants. We take pride in our expert and dedicated team of dentists who work together to deliver high-quality treatment with a friendly approach. Whether you're from India or visiting from abroad, we are committed to providing personalized and exceptional dental care. Step into our clinic and experience a comfortable and serene environment with the latest technology. Your smile is our priority</p>
				</div>
				<div class="row free-mini-website-row" style="display: flex; margin: 70px 0px;">
					<div class="col-6 col-sm-3 wow fadeInUp" style="padding: 0px 10px;">
						<img src="images/index/sm1.jpg" class="paroller free-mini-website-image1" alt="Business Info" title="">
					</div>
					<div class="col-6 col-sm-3 wow fadeInDown" style="padding: 0px 10px;">
						<img src="images/index/sm2.jpg" class="paroller-2 free-mini-website-image2" alt="Badges Info" title="">
					</div>
					<div class="col-6 col-sm-3 wow fadeInUp" style="padding: 0px 10px;">
						<img src="images/index/sm5.jpg" class="paroller free-mini-website-image3" alt="Tags Info" title="">
					</div>
					<div class="col-6 col-sm-3 wow fadeInDown" style="padding: 0px 10px;">
						<img src="images/index/sm4.jpg" class="paroller-2 free-mini-website-image4" alt="Payment Info" title="">
					</div>
				</div>
			</div>
		
		</section>
		<!-- <div class="parallax2"></div>  -->
		<div class="container-fluidmt-5 p-4" style="background-color: #f7f7ff;">
			<h3>Services</h3>
			<h6 class="mt-5">CHILDREN DENTISTRY IN CHROMPET</h6>
			<div class="row">
				<div class="col-md-8 mb-30">
					<div class="skillbar-box mb-30 ">
						<h6 class="title mb-3">Dentistry for your Child</h6>
						<div class="skillbar appear" data-percent="100%">
							<p class="skillbar-bar"></p>
							<span class="skill-bar-percent">100%</span>
						</div>
						<p>Children's dentistry, also known as pediatric dentistry, refers to the specialized branch of dentistry that focuses on the oral health and dental care of infants, children, and adolescents.</p>
					</div>

					<div class="skillbar-box mb-30">
						<h6 class="title mb-3">Root Canal Treatment</h6>
						<div class="skillbar appear" data-percent="100%">
							<p class="skillbar-bar"></p>
							<span class="skill-bar-percent">100%</span>
						</div>
						<p>Root canal treatment, also known as endodontic treatment, is a dental procedure that involves removing the infected or damaged pulp from inside a tooth and filling the resulting space with a special material.</p>
					</div>

					<div class="skillbar-box mb-0">
						<h6 class="title mb-3">Orthodontics</h6>
						<div class="skillbar appear" data-percent="100%">
							<p class="skillbar-bar"></p>
							<span class="skill-bar-percent">100%</span>
						</div>
						<p>Orthodontics is a specialized branch of dentistry that focuses on the diagnosis, prevention, and treatment of dental & facial irregularities. It primarily deals with correcting misaligned teeth, improper jaw positioning, and malocclusions.</p>
					</div>

					<div class="skillbar-box mb-0">
						<h6 class="title mb-3">Implant Dentistry</h6>
						<div class="skillbar appear" data-percent="100%">
							<p class="skillbar-bar"></p>
							<span class="skill-bar-percent">100%</span>
						</div>
						<p>Implant dentistry is a subspecialty that focuses on the placement and repair of dental implants. Dental implants are artificial tooth roots surgically implanted into the jawbone to provide a solid foundation for replacement teeth.</p>
					</div>

					<div class="skillbar-box mb-0">
						<h6 class="title mb-3">Brushing Techniques</h6>
						<div class="skillbar appear" data-percent="100%">
							<p class="skillbar-bar"></p>
							<span class="skill-bar-percent">100%</span>
						</div>
						<p>Brushing techniques refer to specific methods and approaches used while brushing teeth to effectively remove plaque, prevent tooth decay, and maintain good oral hygiene.</p>
					</div>

					<div class="skillbar-box mb-0">
						<h6 class="title mb-3">Dental Bridges</h6>
						<div class="skillbar appear" data-percent="100%">
							<p class="skillbar-bar"></p>
							<span class="skill-bar-percent">100%</span>
						</div>
						<p>Dental bridges are dental restorations that are used to replace lost teeth. They are named "bridges" because they bridge the gap left by lost teeth by connecting the normal teeth on either side of the gap.</p>
					</div>

					<div class="skillbar-box mb-0">
						<h6 class="title mb-3">Dental Crowns</h6>
						<div class="skillbar appear" data-percent="100%">
							<p class="skillbar-bar"></p>
							<span class="skill-bar-percent">100%</span>
						</div>
						<p>Dental crowns, also known as dental caps, are dental restorations that cover the whole visible area of a tooth. They are custom-made prosthetic devices to restore the shape, size, strength, and appearance of damaged or weakened teeth.</p>
					</div>


					<div class="skillbar-box mb-0">
						<h6 class="title mb-3">Preventive Dentistry</h6>
						<div class="skillbar appear" data-percent="100%">
							<p class="skillbar-bar"></p>
							<span class="skill-bar-percent">100%</span>
						</div>
						<p>Preventive dentistry is maintaining good oral health and preventing dental issues before they begin or worsen. It entails a combination of at-home oral hygiene practices and professional dental care to maintain teeth and gums healthy.</p>
					</div>


					<div class="skillbar-box mb-0">
						<h6 class="title mb-3">Restorative Dentistry</h6>
						<div class="skillbar appear" data-percent="100%">
							<p class="skillbar-bar"></p>
							<span class="skill-bar-percent">100%</span>
						</div>
						<p>Restorative dentistry is a branch of dentistry that focuses on diagnosing, preventing, and treating oral diseases, injuries, and other conditions that affect the function, appearance, and overall health of teeth, gums, and surrounding tissues.</p>
					</div>

				</div>

				<div class="col-md-4 mb-30" v-align: top;>
					<h5>More Services</h5>
					<ul class="list-check-squer mb-0">
						<li>Dentures (Dentures are removable replacements for missing teeth and surrounding tissues. They resemble natural teeth, enhance facial appearance, and restore dental function.)</li>
						<li>Teeth Whitening (Teeth whitening is a cosmetic dental procedure that lightens the color of teeth, removing stains and discoloration for a brighter, more attractive smile.)</li>
						<li>Smile Makeover (A smile makeover is a personalized dental treatment aimed at improving both the look and function of a person's smile.)</li>
						<li>Sedation Dentistry (Sedation dentistry uses medication to help patients relax during dental procedures. It's often known as "sleep dentistry," but patients are generally awake unless general anesthesia is applied.)</li>
						<li>Oral Maxillofacial (Oral and maxillofacial surgery is a dental specialty that focuses on diagnosing and treating diseases in the mouth, face, jaw, and related structures.)</li>
						<li>Dental Veneers (Dental veneers, also called porcelain veneers, are thin custom shells crafted from tooth-colored materials like porcelain or composite resin.)</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- <div class="parallax3"></div> -->
		<section class="py-5" style="background-color: #fff;">

			<div class="container-fluid" data-aos="fade-up">
				<h3 class="text-center mb-4 service-head" style="font-weight:900 !important;">5 Star Patient Reviews</h3>
				<p class="p-2">In healthcare, 5-star patient reviews are a valuable form of feedback and endorsement. They serve as testimonials that can help prospective patients make informed decisions about where to seek medical treatment or care. These reviews often highlight exceptional medical expertise, compassionate care, prompt service, and positive outcomes.</p>
				<div class="row position-relative aos-init aos-animate d-flex justify-content-center">

					<div class="col-lg-4 col-md-6 pb-4">
						<div class="d-flex justify-content-center pt-3 px-3" style="">
							<div class="">
								<img class="shadows-box" id="" src="images/index/newpracto.png" alt="">
								<h3 class="text-center mt-3" style="font-size: 20px;">Practo</h3>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 pb-4">
						<div class="d-flex justify-content-center pt-3 px-3" style="">
							<div class="">
								<img class="shadows-box" id="" src="images/index/newjustdial.png" alt="">
								<h3 class="text-center mt-3" style="font-size: 20px;">Justdial</h3>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 pb-4">
						<div class="d-flex justify-content-center pt-3 px-3" style="">
							<div class="">
								<img class="shadows-box" id="" src="images/index/newgoogle.png" alt="">
								<h3 class="text-center mt-3" style="font-size: 20px;">Google</h3>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- <div class="parallax4"></div> -->
		<div class="container-fluid p-4" style="background-color: #f7f7ff;">
			<div class="row">
				<div class="col-12">
					<h3 class="" data-aos="fade-up" >Visiting Hospital with affiliations</h3>
					<ul class="list-check-squer mb-0" data-aos="fade-up" data-aos-delay="100">
						<li class="qualification-font"> Dr. M. Srikanth is a Dentist, Prosthodontist, and Cosmetic/Aesthetic Dentist in Chrompet,Chennai and has an experience of 23 years in these fields.</li>
						<li class="qualification-font">Dr. Poornima Srikanth is a Cosmetic/Aesthetic Dentist,Dental Surgeon and Oral Pathologist in Chrompet, Chennai and has an experience of 18 years in these fields.</li>
					</ul>
				</div>
			</div>
		</div>

	</div>

	<br><br><br><br><br>

	<section class="">
		<div class="container-fluid mt-5">
			<div class="contact-wraper ">
				<div class="row">
					<div class="col-lg-12 mb-30 px-lg-3 px-0">
						<div class="contact-info ovpr-dark" style="background-image: url(images/about/pic-1.jpg);">
							<div class="info-inner">
								<h4 class="title mb-30">Contact Us For Any Informations</h4>
								<form class="form-wraper contact-form ajax-form" method="post">
									<!-- <div class="ajax-message"></div> -->
									<div class="row">
										<div class="form-group col-md-4">
											<input name="name" type="text" required class="form-control index-form" placeholder="Your Name*" pattern="^[a-zA-Z ]{2,50}$" style="background: white !important; color:#222222;">
										</div>
										<div class="form-group col-md-4">
											<input name="email" type="email" required class="form-control index-form" placeholder="Email*" pattern="^[a-zA-Z][a-zA-Z0-9]+@([-a-zA-Z0-9]+\.)[a-zA-Z]{2,5}$" style="background: white !important; color:#222222;">
										</div>

										<div class="form-group col-md-4">
											<input type="text" name="mobile" class="form-control index-form" placeholder="Phone Number*" pattern="^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$" required maxlength="10" style="background: white !important; color:#222222;">
										</div>

									</div>
									<div class="text-center my-5">
										<button name="contacts_send" type="submit" value="Submit" class="btn w-75 btn-secondary btn-lg">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<?php include "footer.php"; ?>

	<script>
		// slide();
		// slide1();
		// slide2();

		function slide() {
			let slideValue = document.getElementById("slider").value;
			document.getElementById("my-img").style.clipPath = "polygon(0 0," + slideValue + "% 0," + slideValue + "% 100%, 0 100%)";
			document.getElementById("silde_text").style.left = (slideValue - 6) + "%";
			// console.log("polygon(0 0," + slideValue + "% 0," + slideValue + "% 100%, 0 100%)");
			// slideValue1=parseInt(slideValue)+0.2;
			// document.getElementById("outside_my-img").style.clipPath = "polygon(0 0," + slideValue1 + "% 0," + slideValue1 + "% 100%, 0 100%)";
		}

		function slide1() {
			let slideValue = document.getElementById("slider1").value;
			document.getElementById("my-img1").style.clipPath = "polygon(0 0," + slideValue + "% 0," + slideValue + "% 100%, 0 100%)";
			document.getElementById("silde_text1").style.left = (slideValue - 6) + "%";
			// console.log("polygon(0 0," + slideValue + "% 0," + slideValue + "% 100%, 0 100%)");
			// slideValue2=parseInt(slideValue)+0.2;
			// document.getElementById("outside_my-img1").style.clipPath = "polygon(0 0," + slideValue2 + "% 0," + slideValue2 + "% 100%, 0 100%)";
		}

		function slide2() {
			let slideValue = document.getElementById("slider2").value;
			document.getElementById("my-img2").style.clipPath = "polygon(0 0," + slideValue + "% 0," + slideValue + "% 100%, 0 100%)";
			document.getElementById("silde_text2").style.left = (slideValue - 6) + "%";
			// console.log("polygon(0 0," + slideValue + "% 0," + slideValue + "% 100%, 0 100%)");
			// slideValue3=parseInt(slideValue)+0.2;
			// document.getElementById("outside_my-img2").style.clipPath = "polygon(0 0," + slideValue3 + "% 0," + slideValue3 + "% 100%, 0 100%)";
		}


		if ($('.paroller').length) {
			$('.paroller').paroller({
				factor: 0.1, // multiplier for scrolling speed and offset, +- values for direction control  
				factorLg: 0.1, // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control  
				type: 'foreground', // background, foreground  
				direction: 'vertical' // vertical, horizontal  
			});
		}

		if ($('.paroller-2').length) {
			$('.paroller-2').paroller({
				factor: -0.1, // multiplier for scrolling speed and offset, +- values for direction control  
				factorLg: -0.1, // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control  
				type: 'foreground', // background, foreground  
				direction: 'vertical' // vertical, horizontal  
			});
		}
	</script>
</body>

</html>