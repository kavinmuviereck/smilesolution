<?php include('starter.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include "header.php"; ?>
</head>

<style>
	iframe
	{
		width: 100% !important;
		height: 100% !important;
	}
</style>

<body>
<?php include('menu.php'); ?>
<?php $section_id = $_REQUEST['id']; 

$files = $_REQUEST['file'];




$sections = $db->getRow("SELECT section FROM section WHERE id='$section_id'"); 


if(count($sections)>0)
{

	if($files == 'image')
	{

?>

   
	<div class="page-content bg-white">
	
		<!-- Inner Banner -->
		<div class="banner-wraper">
			<div class="page-banner" style="background-image:url(images/banner/img1.jpg);">
				<div class="container">
					<div class="page-banner-entry text-center">
						<h1><?= $sections['section']?> Images</h1>
						<!-- Breadcrumb row -->
						<nav aria-label="breadcrumb" class="breadcrumb-row">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Images</li>
							</ul>
						</nav>
					</div>
				</div>
				<img class="pt-img1 animate-wave" src="images/shap/wave-blue.png" alt="Wave Blue">
				<img class="pt-img2 animate2" src="images/shap/circle-dots.png" alt="Circle Dots">
				<img class="pt-img3 animate-rotate" src="images/shap/plus-blue.png" alt="Plus Blue">
			</div>
			<!-- Breadcrumb row END -->
		</div>
		<!-- Inner Banner end -->
			
		<!-- About us -->
		<section class="section-sp1 about-area">
			<div class="container">
				<div class="row">

					<?php 
						$section_images = $db->getRows("SELECT image FROM images WHERE project_id='$section_id'");
						// echo count($sections);
						// echo count($sections);

						if(count($section_images) > 0)
						{
							foreach($section_images as $images)
							{  

								if(!empty($images['image'])){

								?>
								<div class="col-4 p-3">
									<img src="<?=$images['image']?>" style="width: 100% !important;"   alt="">
								</div>
								
					 		 <?php }
					  
							}
						}

						else
						{ ?>
							<div class="text-center">
								<h2>No Images Available</h2>
							</div>
				<?php	}
					?>

					
				</div>
			</div>

			
		</section>
	
	</div>

	<?php } 


	elseif($files == 'video')
	{  ?>


<div class="page-content bg-white">
	
		<!-- Inner Banner -->
		<div class="banner-wraper">
			<div class="page-banner" style="background-image:url(images/banner/img1.jpg);">
				<div class="container">
					<div class="page-banner-entry text-center">
						<h1><?= $sections['section']?> Videos</h1>
						<!-- Breadcrumb row -->
						<nav aria-label="breadcrumb" class="breadcrumb-row">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Videos</li>
							</ul>
						</nav>
					</div>
				</div>
				<img class="pt-img1 animate-wave" src="images/shap/wave-blue.png" alt="Wave Blue">
				<img class="pt-img2 animate2" src="images/shap/circle-dots.png" alt="Circle Dots">
				<img class="pt-img3 animate-rotate" src="images/shap/plus-blue.png" alt="Plus Blue">
			</div>
			<!-- Breadcrumb row END -->
		</div>
		<!-- Inner Banner end -->
			
		<!-- About us -->
		<section class="section-sp1 about-area ">
			<div class="container">
				<div class="row">

					<?php 
						$section_images = $db->getRows("SELECT video FROM images WHERE project_id='$section_id'");
						// echo count($sections);
						// echo count($sections);

						if(count($section_images) > 0)
						{
							foreach($section_images as $images)
							{  

							 if(!empty($images['video']))
							 {
								$videoFileName = $images['video'];
							
								// $hello = substr($videoFileName, -strlen('.yyyyy'));
								// echo $hello;
								?>
								<div class="col-12 col-lg-4">
								<?php 

								if ((substr($videoFileName, -strlen('.mp4')) == '.mp4') || (substr($videoFileName, -strlen('.mkv')) == '.mkv') || (substr($videoFileName, -strlen('.avi')) == '.avi'))
								{ 
									?>
									<video controls style="width: inherit; height: 150px;">  
                                      <source src="<?= $images['video']?>" type="video/mp4">  
                                      Your browser does not support the html video tag.  
                                    </video>
									<?php }
									
									else 
									
									{ 
										$video_url_remove_watch = str_replace('watch?v=', 'embed/', $images['video']);
										if (strpos($images['video'], '<iframe') !== false)
										{ ?>
											<div>
												<?=$images['video']?>
											</div>
								<?php	}
									else
									{  ?>

										<div >
											<iframe src="<?= $video_url_remove_watch ?>" frameborder="0" allowfullscreen style="width: 100%; height: 150px;"></iframe>
										</div>
								<?php	}
										
										
										
									}
									
									?>
								</div>
							<?php }
					  
					}
						}

						else
						{ ?>
							<div class="text-center">
								<h2>No Videos To Show </h2>
							</div>
				<?php	}
					?>

					
				</div>
			</div>



		
		</section>
	
	</div>

	<section class="">
			<div class="container-fluid mt-100">
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
													<input name="email" type="email" required class="form-control index-form" placeholder="Email*"  pattern="^[a-zA-Z][a-zA-Z0-9]+@([-a-zA-Z0-9]+\.)[a-zA-Z]{2,5}$" style="background: white !important; color:#222222;">
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



	<?php	}

	
	
} 
			
			else
			{
				echo "<script>alert('Sorry No Images to show! Thank You')</script>";
				// echo "<script type='text/javascript'>location.href = '$base_url./apply-jobs-in-chennai-and-salem';</script>";

				echo "<script type='text/javascript'>location.href = 'gallery-section.php';</script>";
			}
			
			?>
	
<?php include "footer.php" ; ?>	
</body>
</html>