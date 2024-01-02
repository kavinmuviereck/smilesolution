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
									<img src="images/index/nbf.png" alt="DrDCR – Best Heart Rhythm Specialist in Chennai">
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
								<h2 style="font-size: 40px;" class="banner-content mb-3">Smile Makeover in Chromepet</h2>
								<a href="about-us.php" class="btn common-btn btn-lg shadow">Read More</a>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-5">
								<div class="banner-img">
									<img src="images/index/nbt.jpg" alt="DrDCR – Best Cardiac Electrophysiologist in Chennai">
								</div>
							</div>
						</div>
					</div>
					<!-- <img src="new-images/dban.jpg" alt="Chicago" style="width: 100%; height: 500px;"> -->
				</div>
				<div class="carousel-item">
					<div class="container-fluid inner-content">
						<div class="row align-items-center">
							<div class="col-lg-7 col-md-6 col-sm-7">
								<!-- <h6 class="title-ext text-primary">We Provide All Health Care Solution</h6> -->
								<h2 style="font-size: 40px;" class="banner-content mb-3">Children Dentistry In Chrompet</h2>
								<a href="about-us.php" class="btn common-btn btn-lg shadow">Read More</a>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-5">
								<div class="banner-img">
									<img src="images/index/nbfo.jpg" width="67%" alt="DrDCR – Best Cardiac Electrophysiologist in Chennai">
								</div>
							</div>
						</div>
					</div>
					<!-- <img src="new-images/dban.jpg" alt="Chicago" style="width: 100%; height: 500px;"> -->
				</div>
				

			</div>

			<!-- Left and right controls -->
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<i class="fa fa-chevron-left p-2 border-2 rounded-circle" aria-hidden="true" style="color: #154D38;"></i>
				<!-- <span class="carousel-control-prev-icon"></span> -->
			</a>

			<a class="carousel-control-next" href="#demo" data-slide="next">
				<!-- <span class="carousel-control-next-icon"></span> -->
				<i class="fa fa-chevron-right p-2 border-2 rounded-circle" aria-hidden="true" style="color: #154D38;"></i>
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

			<!-- <img class="pt-img1 animate-rotate" src="images/shap/line-circle-blue.png" alt="">
	 <img class="pt-img3 animate-wave" src="images/shap/wave-blue.png" alt="">
	 <img class="pt-img4 animate1" src="images/shap/square-rotate.png" alt=""> -->
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
			<!-- <div class="text-center w-100">
				<a href="/about-us" class="btn create-btn2">About Us</a>
			</div> -->
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
							<div class="container1">
								<img class="slide-img" id="" src="images/index/sm3.jpg" alt="">
								<h3 class="text-center mt-3" style="font-size: 20px;"><a class="h3-head" href="<?= $base_url ?>root-canal-treatment-in-chromepet">Root Canal</a></h3>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 pb-4">
						<div class="d-flex justify-content-center pt-3 px-3" style="">
							<div class="container1">
								<img class="slide-img" id="" src="images/index/sm4.jpg" alt="">
								<h3 class="text-center mt-3" style="font-size: 20px;"><a class="h3-head" href="<?= $base_url ?>root-canal-treatment-in-chromepet">Root Canal</a></h3>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 pb-4">
						<div class="d-flex justify-content-center pt-3 px-3" style="">
							<div class="container1">
								<img class="slide-img" id="" src="images/index/sm1.jpg" alt="">
								<h3 class="text-center mt-3" style="font-size: 20px;"><a class="h3-head" href="<?= $base_url ?>root-canal-treatment-in-chromepet">Root Canal</a></h3>
							</div>
						</div>
					</div>

					<!-- 	<div class="col-lg-4 col-md-6 pb-4">
						<div class="d-flex justify-content-center pt-3 px-3" style="border: 1px solid #1fa151; border-radius: 20px;">
							<div class="container1">
								<img class="slide-img" src="images/index/root-canal-before.jpg" alt="">
								<img class="slide-img" id="my-img" src="images/index/root-canal-after.jpg" alt="">
								<i class="fa fa-sort" aria-hidden="true" style="position: absolute;top: 37%;color: white;font-size: 25px;left: 47.5%; transform: rotate(90deg);" id="silde_text"></i>

								<input type="range" min="0" max="100" value="50" id="slider" oninput="slide()">
								<h3 class="text-center mt-3" style="font-size: 20px;"><a class="h3-head" href="<?= $base_url ?>root-canal-treatment-in-chromepet">Root Canal</a></h3>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-6 pb-4">
						<div class="d-flex justify-content-center pt-3 px-3" style="border: 1px solid #1fa151; border-radius: 20px;">
							<div class="container1">
								<img class="slide-img" src="images/index/teeth-whitening-before.jpg" alt="">
								<img class="slide-img" id="my-img1" src="images/index/teeth-whitening-after.jpg" alt="">
								<i class="fa fa-sort" aria-hidden="true" style="position: absolute;top: 37%;color: white;font-size: 25px;left: 47.5%; transform: rotate(90deg);" id="silde_text1"></i>
								<input type="range" min="0" max="100" value="50" id="slider1" oninput="slide1()">
								<h3 class="text-center mt-3" style="font-size: 20px;"><a class="h3-head" href="<?= $base_url ?>teeth-whitening-in-chromepet">Teeth Whitening</a></h3>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-6 pb-4">
						<div class="d-flex justify-content-center pt-3 px-3" style="border: 1px solid #1fa151; border-radius: 20px;">
							<div class="container1 ">
								<img class="slide-img" src="images/index/dental-implant-before.jpg" alt="">
								<img class="slide-img" id="my-img2" src="images/index/dental-implant-after.jpg" alt="">
								<i class="fa fa-sort" aria-hidden="true" style="position: absolute;top: 37%;color: white;font-size: 25px;left: 47.5%; transform: rotate(90deg);" id="silde_text2"></i>
								<input type="range" min="0" max="100" value="50" id="slider2" oninput="slide2()">
								<h3 class="text-center mt-3" style="font-size: 20px;"><a class="h3-head" href="<?= $base_url ?>implant-dentistry-in-chromepet">Dental Implants</a></h3>
							</div>
						</div>
					</div>  -->

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



























		<!-- About us -->
		<!-- <section class="section-sp1 about-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 mb-30">
					<div class="about-thumb-area">
						<img src="new-images/aboutus.png" alt="" class="shadows-box">
					</div>
				</div>
				<div class="col-lg-6 mb-30">
					<div class="heading-bx">
						<h6 class="title-ext text-secondary">About Us</h6>
						<h2 class="title">Meticulous. Attentive & Patient Focused Care</h2>
						<p>Advancing on his passion for Cardiology, Dr. DCR specializes in a super-specialty of cardiology called Cardiac Electrophysiology- a niche specialization which involves the evaluation and treatment of complex heart rhythm abnormalities, also known as arrhythmias.</p>
					</div>
					<div class="row">
						<div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
							<div class="feature-container-fluidfeature-bx1 feature1">
								<div class="icon-md">
									<span class="icon-cell">
										<svg enable-background="new 0 0 512 512" height="85" viewBox="0 0 512 512" width="85" xmlns="http://www.w3.org/2000/svg">
											<path d="m509.82 327.343-21.991-27.599c-1.896-2.381-4.775-3.768-7.82-3.768h-7.712l-74.353-93.385c-1.897-2.383-4.777-3.771-7.823-3.771h-22.862v-22.765c0-19.014-15.43-34.483-34.396-34.483h-97.678v-4.552c0-28.428-23.127-51.555-51.555-51.555s-51.555 23.127-51.555 51.555v4.552h-97.678c-18.966 0-34.397 15.47-34.397 34.484v251.241c0 5.523 4.478 10 10 10h22.279c4.628 22.794 24.758 39.999 48.815 39.999s44.186-17.205 48.814-39.999h250.37c4.628 22.794 24.757 39.999 48.814 39.999s44.187-17.205 48.815-39.999h24.093c5.522 0 10-4.477 10-10v-93.722c0-2.264-.769-4.461-2.18-6.232zm-124.52-108.523 61.432 77.156h-79.474v-77.156zm-233.226-81.799c0-17.399 14.155-31.555 31.555-31.555s31.555 14.156 31.555 31.555v4.552h-63.109v-4.552zm-132.074 39.035c0-7.986 6.459-14.483 14.397-14.483h298.464c7.938 0 14.396 6.497 14.396 14.483v241.241h-217.35c-4.628-22.794-24.757-39.999-48.814-39.999s-44.187 17.205-48.815 39.999h-12.278zm61.094 281.24c-16.44 0-29.816-13.458-29.816-29.999s13.376-29.999 29.816-29.999 29.815 13.458 29.815 29.999-13.375 29.999-29.815 29.999zm347.998 0c-16.44 0-29.815-13.458-29.815-29.999s13.375-29.999 29.815-29.999 29.816 13.458 29.816 29.999-13.376 29.999-29.816 29.999zm62.908-39.999h-14.093c-4.628-22.794-24.758-39.999-48.815-39.999s-44.186 17.205-48.814 39.999h-13.02v-101.321h107.932l16.81 21.096z" />
											<path d="m183.629 66.808c5.522 0 10-4.477 10-10v-12.104c0-5.523-4.478-10-10-10s-10 4.477-10 10v12.104c0 5.523 4.477 10 10 10z" />
											<path d="m236.764 94.969c1.934 1.829 4.404 2.736 6.871 2.736 2.652 0 5.299-1.048 7.266-3.127l10.626-11.229c3.796-4.011 3.621-10.341-.391-14.137s-10.341-3.621-14.137.391l-10.626 11.229c-3.796 4.012-3.621 10.341.391 14.137z" />
											<path d="m116.358 94.579c1.967 2.078 4.613 3.126 7.266 3.126 2.467 0 4.938-.907 6.871-2.737 4.012-3.796 4.187-10.125.391-14.137l-10.627-11.229c-3.796-4.011-10.126-4.187-14.137-.39-4.012 3.796-4.187 10.125-.391 14.137z" />
											<path d="m90.896 216.592h184.372v113.287h-184.372z" fill="#b2f0fb" />
										</svg>
									</span>
								</div>
								<div class="icon-content">
									<h4 class="ttr-title">Emergency Help</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
							<div class="feature-container-fluidfeature-bx1 feature2">
								<div class="icon-md">
									<span class="icon-cell">
										<svg enable-background="new 0 0 512 512" height="85" viewBox="0 0 512 512" width="85" xmlns="http://www.w3.org/2000/svg">
											<path d="m351.524 124.49h-37.907v-37.907h-44.657v37.907h-37.906v44.657h37.906v37.907h44.657v-37.907h37.907z" fill="#a4fcc4" />
											<path d="m291.289 279.415c73.114 0 132.597-59.482 132.597-132.597s-59.483-132.596-132.597-132.596-132.598 59.482-132.598 132.596 59.484 132.597 132.598 132.597zm0-245.193c62.086 0 112.597 50.511 112.597 112.597s-50.511 112.597-112.597 112.597c-62.087 0-112.598-50.511-112.598-112.597s50.511-112.597 112.598-112.597z" />
											<path d="m502 267.736c-32.668 0-59.245 26.577-59.245 59.245v13.605h-240.266v-19.048c0-23.625-19.221-42.846-42.846-42.846h-90.398v-17.584c0-32.668-26.577-59.245-59.245-59.245-5.522 0-10 4.478-10 10v275.914c0 5.522 4.478 10 10 10h49.245c5.522 0 10-4.478 10-10v-39.327h373.51v39.327c0 5.522 4.478 10 10 10h49.245c5.522 0 10-4.478 10-10v-210.041c0-5.522-4.478-10-10-10zm-342.356 30.957c12.598 0 22.846 10.249 22.846 22.846v19.048h-113.245v-41.894zm-110.399 179.085h-29.245v-254.623c16.812 4.434 29.245 19.77 29.245 37.954zm20-49.327v-67.864h373.51v67.864zm422.755 49.327h-29.245v-150.797c0-18.185 12.434-33.521 29.245-37.954z" />
										</svg>
									</span>
								</div>
								<div class="icon-content">
									<h4 class="ttr-title">Qualified Doctors</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
							<div class="feature-container-fluidfeature-bx1 feature3">
								<div class="icon-md">
									<span class="icon-cell">
										<svg enable-background="new 0 0 512 512" height="85" viewBox="0 0 512 512" width="85" xmlns="http://www.w3.org/2000/svg">
											<path d="m397.886 191.161c-3.545-4.235-9.852-4.797-14.087-1.252-4.235 3.544-4.797 9.851-1.253 14.086 26.684 31.893 41.165 72.339 40.775 113.888-.886 94.681-79.215 172.782-174.608 174.1-48.125.666-93.326-17.479-127.401-51.087-33.708-33.246-52.272-77.526-52.272-124.685 0-59.98 30.361-115.236 81.216-147.809 51.27-32.838 79.187-66.186 93.348-111.507l2.581-8.26 2.58 8.257c9.333 29.869 25.53 55.364 49.516 77.939 4.02 3.786 10.35 3.593 14.136-.428 3.785-4.021 3.594-10.351-.429-14.136-21.713-20.438-35.736-42.471-44.133-69.341l-12.125-38.802c-1.305-4.175-5.171-7.018-9.545-7.018s-8.24 2.843-9.545 7.018l-12.126 38.807c-12.639 40.45-38.072 70.545-85.045 100.63-56.624 36.268-90.429 97.819-90.429 164.65 0 52.553 20.679 101.891 58.228 138.924 37.248 36.736 86.47 56.867 138.888 56.865.941 0 1.891-.006 2.833-.02 51.527-.712 100.087-21.236 136.733-57.792 36.664-36.573 57.12-84.914 57.6-136.118.432-46.301-15.704-91.371-45.436-126.909z" />
											<path d="m279.576 280.012v-29.712c0-5.523-4.478-10-10-10h-46.783c-5.522 0-10 4.477-10 10v29.712h-29.711c-5.522 0-10 4.477-10 10v46.783c0 5.523 4.478 10 10 10h29.711v29.711c0 5.523 4.478 10 10 10h46.783c5.522 0 10-4.477 10-10v-29.711h29.712c5.522 0 10-4.477 10-10v-46.783c0-5.523-4.478-10-10-10zm19.712 46.783h-29.712c-5.522 0-10 4.477-10 10v29.711h-26.783v-29.711c0-5.523-4.478-10-10-10h-29.711v-26.783h29.711c5.522 0 10-4.477 10-10v-29.712h26.783v29.712c0 5.523 4.478 10 10 10h29.712z" />
											<path d="m369.497 246.666c51.239-.708 92.983-42.352 93.459-93.223.313-33.486-16.989-62.983-43.266-79.911-21.598-13.914-37.772-29.46-45.4-53.873l-6.143-19.659-6.143 19.661c-7.603 24.331-23.627 39.927-45.19 53.738-26.16 16.756-43.48 45.945-43.48 79.151 0 52.43 43.18 94.848 96.163 94.116z" fill="#ffbdbc" />
										</svg>
									</span>
								</div>
								<div class="icon-content">
									<h4 class="ttr-title">Best Professionals</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
							<div class="feature-container-fluidfeature-bx1 feature4">
								<div class="icon-md">
									<span class="icon-cell">
										<svg enable-background="new 0 0 512 512" height="85" viewBox="0 0 512 512" width="85" xmlns="http://www.w3.org/2000/svg">
											<path d="m181.049 229.112-76.87 76.971c-14.045 14.07-14.045 36.883 0 50.953l50.881 50.974c14.045 14.07 36.815 14.07 50.86 0l178.611-178.899h-203.482z" fill="#e2c4ff" />
											<path d="m495.277 81.339c-10.57-10.578-24.625-16.403-39.574-16.403-3.325 0-6.605.288-9.813.853 3.065-17.397-2.103-35.975-15.505-49.387-10.57-10.577-24.624-16.402-39.574-16.402s-29.003 5.825-39.573 16.402c-21.816 21.83-21.816 57.352 0 79.182 2.71 2.712 5.648 5.111 8.772 7.18l-18.689 18.716-52.105-52.184c-3.902-3.907-10.233-3.912-14.142-.012-3.908 3.902-3.914 10.234-.011 14.143l18.64 18.67-196.602 196.922c-17.56 17.593-17.902 46.002-1.029 64.017l-16.422 16.452c-3.896 3.903-3.896 10.226 0 14.129l12.383 12.406-88.75 88.913c-3.901 3.909-3.896 10.24.013 14.142 1.953 1.948 4.509 2.922 7.065 2.922 2.562 0 5.125-.979 7.078-2.936l88.724-88.887 12.357 12.38c1.876 1.88 4.422 2.936 7.078 2.936s5.202-1.056 7.078-2.936l16.396-16.426c8.547 8.028 19.644 12.432 31.418 12.432 12.28 0 23.825-4.79 32.506-13.487l196.588-196.91 18.617 18.648c1.953 1.956 4.515 2.935 7.077 2.935 2.557 0 5.113-.975 7.065-2.923 3.908-3.902 3.914-10.234.011-14.143l-52.155-52.24 18.732-18.758c2.054 3.126 4.453 6.09 7.198 8.836 10.57 10.577 24.624 16.402 39.573 16.402s29.003-5.825 39.574-16.402c21.817-21.831 21.817-57.352.001-79.182zm-129.892-50.8c6.792-6.796 15.822-10.539 25.426-10.539s18.635 3.743 25.427 10.539c13.407 13.416 13.997 34.875 1.773 49.001-.638.583-1.266 1.183-1.881 1.799-.616.617-1.214 1.245-1.795 1.882-6.533 5.671-14.791 8.766-23.524 8.766-9.604 0-18.634-3.743-25.427-10.54-14.025-14.035-14.025-36.873.001-50.908zm-239.787 380.799-24.74-24.786 9.327-9.344 14.287 14.313 10.454 10.473zm73.244-10.392c-4.903 4.912-11.42 7.617-18.352 7.617s-13.449-2.705-18.353-7.617l-50.881-50.975c-10.134-10.152-10.134-26.672-.001-36.823l196.578-196.898 87.616 87.767zm177.227-244.657-20.619-20.654 24.634-24.669c3.498.676 7.086 1.021 10.727 1.021 3.325 0 6.606-.288 9.813-.853-1.189 6.75-1.139 13.678.151 20.413zm105.062-9.905c-6.792 6.796-15.823 10.539-25.427 10.539s-18.635-3.743-25.427-10.539c-13.407-13.416-13.998-34.875-1.773-49.001.638-.583 1.266-1.183 1.881-1.799.617-.617 1.215-1.246 1.797-1.884 6.532-5.67 14.789-8.764 23.521-8.764 9.604 0 18.635 3.743 25.427 10.54 14.026 14.035 14.026 36.873.001 50.908z" fill="#020288" />
										</svg>
									</span>
								</div>
								<div class="icon-content">
									<h4 class="ttr-title">Medical Treatment</h4>
								</div>
							</div>
						</div>
					</div>
					<a href="about-us.php" class="btn common-btn shadow">Read More</a>
				</div>
			</div>
		</div>

	</section> -->

		<!-- Our Progress -->
		<!-- <section class="section-area section-sp5 work-area" style="background-image: url(images/background/line-bg1.png); background-repeat: no-repeat; background-position: center; background-size: 100%;">
			<div class="container-sm">
				<div class="heading-bx text-center">
					<h6 class="title-ext text-secondary">Working Process</h6>
					<h2 class="title">How we works?</h2>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-4 col-sm-6 mb-30">
						<div class="work-bx">
							<div class="work-num-bx">01</div>
							<div class="work-content">
								<h5 class="title mb-10">Make Appointmnet</h5>
								<p>Making an appointment can seem like a daunting task, but it is an essential step in ensuring your health and wellbeing.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 mb-30">
						<div class="work-bx active">
							<div class="work-num-bx">02</div>
							<div class="work-content">
								<h5 class="title mb-10">Take Treatment</h5>
								<p>Taking treatment is a critical step towards improving your health and wellbeing.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 mb-30">
						<div class="work-bx">
							<div class="work-num-bx">03</div>
							<div class="work-content">
								<h5 class="title mb-10">Registration</h5>
								<p>Remember, registration is an important step in becoming a member of a specific organization, group, or event.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<img class="pt-img1 animate1" src="images/shap/circle-orange.png" alt="">
			<img class="pt-img2 animate2" src="images/shap/plus-orange.png" alt="">
			<img class="pt-img3 animate3" src="images/shap/circle-dots.png" alt="">
		</section> -->

		<!-- Appointment -->
		<!-- <section class="section-area account-wraper1">
			<div class="container-fluid">
				<div class="appointment-inner section-sp2" style="background-image: url(images/appointment/line-bg.png); background-repeat: no-repeat; background-position: 20px 140px;">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-xl-5 col-lg-6 col-md-6">
								<div class="appointment-form form-wraper">
									<h3 class="title">Book Appointment</h3>
									<form action="#">
										<div class="form-group">
											<select class="form-select">
												<option selected>Selecty Department</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
										</div>
										<div class="form-group">
											<select class="form-select">
												<option selected>Select Doctor</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Your Name">
										</div>
										<div class="form-group">
											<input type="number" class="form-control" placeholder="Phone Numbers">
										</div>
										<div class="form-group">
											<input type="date" class="form-control">
										</div>
										<button type="submit" class="btn btn-secondary btn-lg">Appointment Now</button>
									</form>
								</div>
							</div>
							<div class="col-xl-7 col-lg-6 col-md-6">
								<div class="appointment-thumb">
									<img src="images/appointment/mobile.png" alt="">
									<div class="images-group">
										<img class="img1" src="images/appointment/women.png" alt="">
										<img class="img2" src="images/appointment/map-pin.png" alt="">
										<img class="img3" src="images/appointment/setting.png" alt="">
										<img class="img4" src="images/appointment/check.png" alt="">
										<img class="img5" src="images/appointment/chat.png" alt="">
									</div>
								</div>
							</div>
						</div>					
					</div>	
					<img class="pt-img1 animate1" src="images/shap/trangle-orange.png" alt="">
					<img class="pt-img2 animate-wave" src="images/shap/wave-orange.png" alt="">
					<img class="pt-img3 animate-wave" src="images/shap/wave-blue.png" alt="">
					<img class="pt-img4 animate2" src="images/shap/circle-orange.png" alt="">
				</div>					
			</div>
		</section> -->




		<!-- <div class="page-content bg-white"> -->


		<!-- About us -->
		<!-- <section class="section-area section-sp1">
			<div class="container">
				<div class="page-banner-entry text-center paroller">
					<h1>Press Releases</h1>
				</div>
				<div class="row">


					<div class="col-xl-4 col-md-6">
						<div class="blog-card mb-30">
							<div class="post-media">
								<a href="https://www.newindianexpress.com/cities/chennai/2023/feb/22/six-hour-surgery-at-chennais-kauvery-hospital-saves-patients-life-2549603.amp"><img src="images/blog/grid/pic1.jpg" alt=""></a>
							</div>
							<div class="post-info">

								<h4 class="post-title"><a href="https://www.newindianexpress.com/cities/chennai/2023/feb/22/six-hour-surgery-at-chennais-kauvery-hospital-saves-patients-life-2549603.amp">Six-hour surgery at Chennai's Kauvery Hospital saves patient’s life..</a></h4>
								<a href="https://www.newindianexpress.com/cities/chennai/2023/feb/22/six-hour-surgery-at-chennais-kauvery-hospital-saves-patients-life-2549603.amp" class="btn btn-outline-primary btn-sm">Read More <i class="btn-icon-bx fas fa-chevron-right"></i></a>
							</div>
						</div>
					</div>


					<div class="col-xl-4 col-md-6">
						<div class="blog-card mb-30">
							<div class="post-media">
								<a href="https://theprint.in/ani-press-releases/kauvery-hospital-perform-multiple-life-saving-procedures-on-a-55-year-old-who-suffered-heart-attack-and-heart-arrhythmias/1045841/"><img src="images/blog/grid/pic2.jpg" alt=""></a>
							</div>
							<div class="post-info">

								<h4 class="post-title"><a href="https://theprint.in/ani-press-releases/kauvery-hospital-perform-multiple-life-saving-procedures-on-a-55-year-old-who-suffered-heart-attack-and-heart-arrhythmias/1045841/">Kauvery Hospital perform multiple life-saving procedures on a 55-year old..</a></h4>
								<a href="https://theprint.in/ani-press-releases/kauvery-hospital-perform-multiple-life-saving-procedures-on-a-55-year-old-who-suffered-heart-attack-and-heart-arrhythmias/1045841/" class="btn btn-outline-primary btn-sm">Read More <i class="btn-icon-bx fas fa-chevron-right"></i></a>
							</div>
						</div>
					</div>


					<div class="col-xl-4 col-md-6">
						<div class="blog-card mb-30">
							<div class="post-media">
								<a href="https://www.thenewsminute.com/article/chennai-hosp-performs-life-saving-procedures-55-yr-old-woman-cardiac-arrhythmias-166011"><img src="images/blog/grid/pic3.jpg" alt=""></a>
							</div>
							<div class="post-info">

								<h4 class="post-title"><a href="https://www.thenewsminute.com/article/chennai-hosp-performs-life-saving-procedures-55-yr-old-woman-cardiac-arrhythmias-166011">Chennai hosp saves the life of 55-yr-old woman with cardiac arrhythmias..</a></h4>
								<a href="https://www.thenewsminute.com/article/chennai-hosp-performs-life-saving-procedures-55-yr-old-woman-cardiac-arrhythmias-166011" class="btn btn-outline-primary btn-sm">Read More <i class="btn-icon-bx fas fa-chevron-right"></i></a>
							</div>
						</div>
					</div>


				</div>


				<div class="col-12  text-center ">

					<div class="post-info ">
						<a href="press-releases.php" class="btn btn-outline-primary btn-sm">More Press Releases <i class="btn-icon-bx fas fa-chevron-right"></i></a>
					</div>
				</div>


			</div>
		</section>

	</div> -->



	</div>

	<!-- <section>
<div class="row mt-5 contact-strip mb-5">
	<div class="container-fluid ">
		<div class="col-12  p-0" style="height: 200px; ">
		<span>
		<h2 class="text-white">Contact us</h2>

		</span>
		<form action="">
			

		</form>

		</div>
	</div>
</div>
</section> -->

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

										<!-- <div class="form-group col-md-4"></div> -->

										<div class="form-group col-md-4">
											<input type="text" name="mobile" class="form-control index-form" placeholder="Phone Number*" pattern="^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$" required maxlength="10" style="background: white !important; color:#222222;">
											<!-- <input name="mobile" type="text" required class="form-control" placeholder="Phone Numbers"> -->
										</div>
										<!-- <div class="form-group col-md-4">
													
													<input name="subject" type="text" required class="form-control index-form" placeholder="Subject*" pattern="^[a-zA-Z][ a-zA-Z0-9]+$">

												</div> -->

										<!-- <div class="form-group col-md-12">
													<div class="input-group">
														<div class="g-recaptcha" data-sitekey="6Lf2gYwUAAAAAJLxwnZTvpJqbYFWqVyzE-8BWhVe" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
														<input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
													</div>
												</div> -->


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

	<script type="application/ld+json">
		{
			"@context": "https://schema.org/",
			"@type": "WebSite",
			"name": "DrDCR",
			"url": "https://www.smilesolutions.com/",
			"potentialAction": {
				"@type": "SearchAction",
				"target": "https://www.smilesolutions.com/{search_term_string}",
				"query-input": "required name=search_term_string"
			}
		}
	</script>

	<?php include "footer.php"; ?>
	<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "FAQPage",
			"mainEntity": [{
				"@type": "Question",
				"name": "What is the difference between a cardiologist and a cardiac electrophysiologist?",
				"acceptedAnswer": {
					"@type": "Answer",
					"text": "A cardiologist specializes in heart health and treats a variety of cardiovascular problems. A cardiac electrophysiologist is a cardiologist who specializes in heart rhythm disorders and their therapies, such as ablation and device implantation."
				}
			}, {
				"@type": "Question",
				"name": "What is a cardiac electrophysiologist?",
				"acceptedAnswer": {
					"@type": "Answer",
					"text": "A cardiac electrophysiologist is a specialized cardiologist who detects and treats heart rhythm disorders, such as arrhythmias, with techniques such as ablation and device implantation."
				}
			}, {
				"@type": "Question",
				"name": "Who is the best electrophysiologist in Chennai?",
				"acceptedAnswer": {
					"@type": "Answer",
					"text": "Dr DCR (Deep Chandh Raja) is the Best Electrophysiologist in Chennai"
				}
			}, {
				"@type": "Question",
				"name": "Who needs electrophysiology?",
				"acceptedAnswer": {
					"@type": "Answer",
					"text": "Individuals experiencing abnormal heartbeats, palpitations, or fainting may require electrophysiology (EP). It is crucial in diagnosing and treating conditions such as atrial fibrillation, tachycardia, and ventricular arrhythmias. EP procedures, including ablation or device implantation, can help address these rhythm problems efficiently. Consult a cardiologist for evaluation."
				}
			}, {
				"@type": "Question",
				"name": "What is the recovery time for an electrophysiology study?",
				"acceptedAnswer": {
					"@type": "Answer",
					"text": "The recovery period following an electrophysiology (EP) study is usually brief. Most patients can return to normal activities within a day or two. Some precautions may be required for a few days, depending on the specific procedure and individual health. Your healthcare provider will advise you."
				}
			}, {
				"@type": "Question",
				"name": "Is electrophysiology painful?",
				"acceptedAnswer": {
					"@type": "Answer",
					"text": "Local anesthetic and sedation reduce pain during an electrophysiology (EP) operation. Some patients may experience mild pressure or momentary discomfort when catheters are implanted, although pain is generally managed. Minor discomfort or bruising at the insertion site is usual after the surgery."
				}
			}, {
				"@type": "Question",
				"name": "What is the duration of electrophysiology?",
				"acceptedAnswer": {
					"@type": "Answer",
					"text": "The length of an electrophysiology (EP) procedure varies, but it usually takes 2-4 hours. Complex cases may require more time. The recovery time in the hospital could range from a few hours to overnight. Your cardiologist can provide a more accurate estimate based on your condition and the complexity of the surgery."
				}
			}, {
				"@type": "Question",
				"name": "What is the success rate of the electrophysiology study?",
				"acceptedAnswer": {
					"@type": "Answer",
					"text": "The success rate of electrophysiology (EP) research varies according to the condition and procedure. Arrhythmia diagnosis and therapy success rates are reasonable, frequently reaching 90%. Individual factors, on the other hand, can influence outcomes. For more specific information, speak with your medical professional."
				}
			}]
		}
	</script>
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