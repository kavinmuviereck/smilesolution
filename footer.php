<div class="modal fade" id="exampleModalCenter11" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="  modal-dialog modal-dialog-centered ">
            <div class="modal-content for-form  " style="border-radius: 20px;">
                <div class="modal-header" style="border-top-left-radius:20px !important;   ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa-solid fa-x" style="color:#fff !important;"></i></span></button>
                </div>
                <div class="modal-body " style="border-radius:20px !important;">
                    <div class="blog-box-item mb-0">

                        <div class="blog-content pl-0 pr-0">



                            <h5 class="comment-title mb-2 text-center">SEND AN ENQUIRY</h5>
                            <hr>

                            <form class="contact-form blog-model-form" id="contactpage" method="POST" onsubmit="return submitUserForm();">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="col">
                                            <input type="text" name="name" id="fullname" class="form-control upper_layer_name" placeholder="Name:" pattern="[a-zA-Z][a-zA-Z ]{2,}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="col">
                                            <input type="email" name="email" id="emailaddress" class="form-control upper_layer" placeholder="Email:" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="col">
                                            <input type="tel" name="mobile" id="phoneno" class="form-control upper_layer" placeholder="Phone:" pattern="[0-9]{10}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="col">
                                            <input type="tel" name="subject" id="phoneno" class="form-control upper_layer" placeholder="subject:">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col">
                                            <input type="text" name="message" id="message" class="form-control lower_message" placeholder="Message:">
                                        </div>
                                    </div>
                                </div>

                               
                                    <!-- <div class="mb-4 d-flex justify-content-center ">
                                        <div class="g-recaptcha" data-sitekey="6Lc2BPEkAAAAAKtiTYK80cpTZzxkfFzXtWx7ifzm" required>
                                        </div>
                                        <div id="g-recaptcha-error"></div>
                                    </div> -->
                               

                                <div class=" form_button_wrapper text-center">
                                    <button type="submit" name="send_contacts" id="submitbutton" class="button_style">SUBMIT</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $('#exampleModalCenter').modal('show');

    </script>
<!-- Footer ==== -->
<footer class="footer" style="background-image:url(images/background/footer.jpg);">
	<!-- Footer Top -->
	<div class="footer-top">
		<div class="container">
			<div class="row mt-5">
				<div class="col-xl-3 col-lg-3 col-md-6">
					<div class="widget widget_info">
						<div >
						<a href="<?= $base_url ?>index.php"><img src="<?= $base_url ?>images/header_img/smile-solutions.png" alt="Smile Solutions Logo"></a>
						</div>
						<div class="ft-contact">
							<p><b>Dr. M. Srikanth</b> is a Dentist, Prosthodontist, and Cosmetic/Aesthetic Dentist in Chrompet,Chennai and has an experience of 23 years in these fields.</p>
							
							<div class="contact-bx">
								<div class="icon"><i class="fas fa-phone-alt"></i></div>
								<div class="contact-number">
									<span>Contact Us</span>
                                    <a href="tel:8637632673"><h4 class="number">+91-8637632673</h4></a>
									<a href="tel:044-43575349"><h4 class="number">044-43575349</h4></a>

									<!-- <h4 class="number">+01 123 456 7890</h4>
									<h4 class="number">+01 123 456 7890</h4> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-12">
					<div class="widget footer_widget">
						<h3 class="footer-title">Specialities of Dr. M. Srikanth </h3>
						<ul>
                            <li ><a href="<?= $base_url ?>children-dentistry-in-chromepet.php"><span>Children Dentistry</span> </a></li>
						    <li><a href="<?= $base_url ?>root-canal-treatment-in-chromepet.php"><span>Root Canal Treatment</span> </a></li>
						    <li><a href="<?= $base_url ?>orthodontics-in-chromepet.php"><span>Orthodontics</span> </a></li>
						    <li><a href="<?= $base_url ?>implant-dentistry-in-chromepet.php"><span>Implant Dentistry</span> </a></li>
						    <li><a href="<?= $base_url ?>brushing-techniques-in-chromepet.php"><span>Brushing techniques</span> </a></li>
						    <li><a href="<?= $base_url ?>dental-bridges-in-chromepet.php"><span>Dental Bridges</span> </a></li>
						    <li><a href="<?= $base_url ?>dentures-in-chromepet.php"><span>Dentures</span> </a></li>
						    <li><a href="<?= $base_url ?>teeth-whitening-in-chromepet.php"><span>Teeth Whitening</span> </a></li>
						    <li><a href="<?= $base_url ?>smile-makeover-in-chromepet.php"><span>Smile Makeover</span> </a></li>
						    <li><a href="<?= $base_url ?>sedation-dentistry-in-chromepet.php"><span>Sedation Dentistry</span> </a></li>
						    <li><a href="<?= $base_url ?>oral-maxillofacial-in-chromepet.php"><span>Oral Maxillofacial</span> </a></li>
						    <li><a href="<?= $base_url ?>dental-veneers-in-chromepet.php"><span>Dental Veneers</span> </a></li>
						    <li><a href="<?= $base_url ?>dental-crowns-in-chromepet.php"><span>Dental Crowns</span> </a></li>
						    <li><a href="<?= $base_url ?>preventive-dentistry-in-chromepet.php"><span>Preventive Dentistry</span> </a></li>
						</ul>

					</div>
				</div>

                <div class="col-xl-3 col-lg-3 col-12">
					<div class="widget footer_widget ml-50">
						<h3 class="footer-title">Quick Links</h3>
						<ul>
							<li><a href="<?= $base_url ?>index.php"><span>Home</span></a></li>
							<li><a href="<?= $base_url ?>about-us.php"><span>About Us</span></a></li>
							<!-- <li><a href="<?//= $base_url ?>services.php"><span>Services</span></a></li> -->
                            <!-- <li><a href="<?//= $base_url ?>press-releases.php"><span>Press Releases</span></a></li> -->
                            <li><a href="<?= $base_url ?>testimonial.php"><span>Testimonials</span></a></li>
                            <li><a href="<?= $base_url ?>gallery.php"><span>Gallery</span></a></li>
							<li><a href="<?= $base_url ?>blogs.php"><span>Blogs</span></a></li>
							<li><a href="<?= $base_url ?>contact-us.php"><span>Contact Us</span></a></li>

						</ul>
					</div>
				</div>


				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
					<div class="widget widget_form">
						<h3 class="footer-title">Get In Touch</h3>
						<!-- <form class="subscribe-form subscription-form mb-30" action="https://meditro.themetrades.com/html/demo/script/mailchamp.php" method="post">
							<div class="ajax-message"></div>
							<div class="input-group">
								<input name="email" required="required" class="form-control" placeholder="Email Address" type="email">
							</div>
							<button name="submit" value="Submit" type="submit" class="btn btn-secondary shadow w-100">Subscribe Now</button>
						</form> -->
						<div class="footer-social-link">
							<!-- <ul>
								<li><a target="_blank" href="https://www.facebook.com/profile.php?id=100089147133660&mibextid=ZbWKwL"><img src="<?= $base_url ?>images/social/facebook.png" alt="" /></a></li>
								<li><a target="_blank" href="https://twitter.com/Dr_DCR_EP"><img src="<?= $base_url ?>images/social/twitter.png" alt="" /></a></li>
								<li><a target="_blank" href="https://www.instagram.com/dr_dcr/"><img src="<?= $base_url ?>images/social/instagram.png" alt="" /></a></li>
							</ul> -->

                            <ul class="mt-5">
								<a target="_blank" href="https://www.facebook.com/profile.php?id=100089147133660&mibextid=ZbWKwL">
                                    <div class="d-flex">
                                        <div class="pr-3">
                                            <img src="<?= $base_url ?>images/social/facebook.png" alt="Facebook Logo" />
                                        </div>

                                        <div class="text-dark">
                                            <p>Facebok</p>
                                        </div>
                                    </div>
                                </a>

                                <a target="_blank" href="https://twitter.com/Dr_DCR_EP">
                                    <div class="d-flex">
                                        <div class="pr-3">
                                        <img src="<?= $base_url ?>images/social/twitter.png" alt="Twitter Logo" />
                                        </div>
                                        
                                        <div class="text-dark">
                                            <p>Twitter</p>
                                        </div>
                                    </div>
                                </a>

                                <a target="_blank" href="https://www.instagram.com/dr_dcr/">
                                    <div class="d-flex">
                                        <div class="pr-3">
                                        <img src="<?= $base_url ?>images/social/instagram.png" alt="Facebook Logo" />
                                        </div>
                                        
                                        <div class="text-dark">
                                            <p>Instagram</p>
                                        </div>
                                    </div>
                                </a>

                                <!-- <a target="_blank" href="https://www.linkedin.com/">
                                    <div class="d-flex ">
                                        <div class="pr-3">
                                        <img src="<?//= $base_url ?>images/social/linkedin.png" alt="" />
                                        </div>
                                        
                                        <div class="text-dark">
                                            <p>linkedin</p>
                                        </div>
                                    </div>
                                </a>
                               -->
				
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer bottom -->
	<div class="container">
		<div class="footer-bottom">
			<div class="row">
				<div class="col-12 text-center">
                <p class="copyright-text"> All Rights Reserved<a href="https://www.yetlosocial.com/" class="text-dark"> &copy;</a> 2023 <a href="https://www.muvierecktech.com/" class="text-dark">Muviereck Technologies Pvt Ltd</a>.</p>
                <!-- <p class="copyright-text">Copyright © 2022 Design & Developed by <a href="https://themeforest.net/user/themetrades" target="_blank" class="text-secondary"></a></p> -->
				</div>
			</div>
		</div>
	</div>
	<!-- footer-shape -->
	<!-- <img class="pt-img1 animate-wave" src="images/shap/wave-blue.png" alt="">
	<img class="pt-img2 animate1" src="images/shap/circle-dots.png" alt="">
	<img class="pt-img3 animate-rotate" src="images/shap/plus-blue.png" alt="">
	<img class="pt-img4 animate-wave" src="images/shap/wave-blue.png" alt=""> -->
</footer>
<!-- Footer END ==== -->
<!-- <button class="back-to-top fa fa-chevron-up"></button> -->
<!-- </div> -->
<!-- for whatsapp inegration -->

<div>
    <a href="https://api.whatsapp.com/send?phone=9043632236" id="toTopr" target="_blank">
    <i class="fa fa-whatsapp"></i>
    </a>
</div>

<!-- JAVASCRIPT FILES ========================================= -->
<script src="<?= $base_url ?>js/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="vendor/swiper/swiper.min.js"></script>
<script src="../../../www.google.com/recaptcha/api.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="vendor/progress-bar/jquery.appear.js"></script>
<script src="vendor/progress-bar/jquery.skillbar.js"></script>
<script src="vendor/counter/counterup.min.js"></script>
<script src="vendor/counter/waypoints-min.js"></script>
<script src="<?= $base_url ?>js/jquery.paroller.min.js"></script>
<script src="<?= $base_url ?>js/functions.js"></script>
<script src="<?= $base_url ?>js/contact.js"></script>
<!-- <script src="<?= $base_url ?>js/owl.js"></script>
<script src="<?= $base_url ?>js/owl.carousel.min.js"></script> -->
<script src="<?= $base_url ?>/js/aos.js%2bnavbar.js%2bcounter.js%2bcustom.js.pagespeed.jc.CxAnoGTbEE.js"></script><script>eval(mod_pagespeed_i7bt4CtYGG);</script>
<script src="<?= $base_url ?>/js/animation.js"></script>
<!-- for testimonial -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

  <!--====== Javascripts & Jquery ======-->

  <script src="<?= $base_url ?>js/jquery-3.2.1.min.js"></script>

  <script src="<?= $base_url ?>js/bootstrap.min.js"></script>

  <script src="<?= $base_url ?>js/owl.carousel.min.js"></script>

  <script src="<?= $base_url ?>js/circle-progress.min.js"></script>

  <script src="<?= $base_url ?>js/main.js"></script>
  <script src="<?= $base_url ?>js/aos.js%2bnavbar.js%2bcounter.js%2bcustom.js.pagespeed.jc.CxAnoGTbEE.js"></script><script>eval(mod_pagespeed_i7bt4CtYGG);</script>

  



  <script src="<?= $base_url ?>js/services_jav.js"></script>





  <link rel="stylesheet" type="text/css" href="https://brokensquare.com/Code/jquery-flipster/dist/jquery.flipster.min.css">

  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

   

  <style type="text/css">

    .flipster--carousel .flipster__item--past .flipster__item__content {

    transform: rotateY(15deg) scale(.9);

  }

  .flipster--carousel .flipster__item--future .flipster__item__content {

    transform: rotateY(-15deg) scale(.9);

}



 </style>

    <!----------------jquery alert plugin---------->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

  <!-- js -->

  <script src="<?= $base_url ?>js/jquery-2.2.3.min.js"></script>

    <!-- //js -->

    <!-- few java snippets-->

    <script src="<?= $base_url ?>js/strive.js"></script>

    <!-- //few java snippets-->

    <!-- nav -->

    <script src="<?= $base_url ?>js/menuFullpage.min.js"></script>

    <!-- //nav -->

    <!-- smooth scroll -->

    <script src="<?= $base_url ?>js/SmoothScroll.min.js "></script>

    <!-- Bootstrap Core JavaScript -->



    <!-- here stars scrolling icon -->

    <script type="text/javascript" src="<?= $base_url ?>js/move-top.js"></script>

    <script type="text/javascript" src="<?= $base_url ?>js/easing.js"></script>

    <script type="text/javascript">

        jQuery(document).ready(function($) {

            $(".scroll").click(function(event){     

                event.preventDefault();

                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);

            });

        });

    </script>

    <script type="text/javascript">

        $(document).ready(function() {

           

            $().UItoTop({ easingType: 'easeOutQuart' });

                                

            });

    </script>

    <!-- //here ends scrolling icon -->



    <script src="<?= $base_url ?>js/bootstrap.js"></script>



    <script type="text/javascript">

        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);

        $("#menu li a").each(function(){

            var menuurl = $(this).attr("href");

            if(menuurl == pgurl ){

                $(this).addClass("active"); 

            }else{

                $(this).removeClass("active"); 

            }

            if(menuurl == 'index.php' && pgurl == ''){

                $(this).addClass("active"); 

            }

            if(menuurl == 'viewportfolio.php' && pgurl == 'portfolio.php'){

                $(this).addClass("active"); 

            } 

            if(menuurl == 'services.php' && (pgurl=='MobileAppDevelopment.php' || pgurl == 'EcommerceDevelopment.php' || pgurl == 'DigitalMarketing.php' || pgurl == 'ERPandCRMDevelopment.php' || pgurl == 'WebDesignandApplications.php' || pgurl == 'GraphicDesigning.php')){

                $(this).addClass("active"); 

            }       

        });



    </script>

   



<script type="text/javascript">

    $('.nav-item').click(function(){

        //$('.nav-item').removeClass('active');

        $('.nav-item').removeClass('active');

        $(this).addClass('active');

        //return false;

    });



    //Search Submit function

    //Jun-10-2019

    $('#search-blog-form').on('submit', function (e) {

        var Search = $('#Search_text').val();

        var URL = '<?php echo $base_url; ?>blog_search/';

        var Skey = Search.replace(/ /g,'-');

        var SearchKey = URL+Skey;

        // alert(SearchKey);

        window.location.href = SearchKey;

        return false;

    });

</script>
