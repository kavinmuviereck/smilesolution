<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "header.php" ?>
</head>
<body>

	<?php $file = $_REQUEST['file']; 
	
	
	if($file == 'image')
	{
	
	
	?>


        
	<div class="page-content ">
	
		<!-- Inner Banner -->
		<div class="banner-wraper">
			<div class="page-banner" style="background-image:url(images/banner/img1.jpg);">
				<div class="container">
					<div class="page-banner-entry text-center">
						<h1>Images</h1>
						<!-- Breadcrumb row -->
						<nav aria-label="breadcrumb" class="breadcrumb-row">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Images</li>
							</ul>
						</nav>
					</div>
				</div>
				<img class="pt-img1 animate-wave" src="images/shap/wave-blue.png" alt="">
				<img class="pt-img2 animate2" src="images/shap/circle-dots.png" alt="">
				<img class="pt-img3 animate-rotate" src="images/shap/plus-blue.png" alt="">
			</div>
			<!-- Breadcrumb row END -->
		</div>
		<!-- Inner Banner end -->
			
		<!-- About us -->
		<section class="section-sp1 about-area">
			<div class="container">
				<div class="row">

					<?php 
						$sections = $db->getRows("SELECT id,section,image FROM section");
						// echo count($sections);

						if(count($sections) > 0)
						{
							foreach($sections as $section_data)
							{  ?>
								<div class="col-md-4 mb-30 text-center" style="padding-top: 20px;">
										
										<div class ="pcard letter">
											<a href="gallery-files.php?id=<?=$section_data['id']?>&file=image">
												<img src="<?=$section_data['image']?>" alt="" style="width:100%; height:100%">
											</a>	
										</div>

										<a href="gallery-files.php?id=<?=$section_data['id']?>&file=image"><h6 class="text-center mt-3"><?= $section_data['section']?></h6></a>
		
								</div>
								
					  <?php }
						}else{ ?>
							 
							 <h2 class="text-center">No Images To Show</h2>

							<?php }
					?>

					
				</div>
			</div>
			<!-- <img class="pt-img1 animate-wave" src="images/shap/wave-orange.png" alt="">
			<img class="pt-img2 animate2" src="images/shap/circle-small-blue.png" alt="">
			<img class="pt-img3 animate-rotate" src="images/shap/line-circle-blue.png" alt="">
			<img class="pt-img4 animate-wave" src="images/shap/square-dots-orange.png" alt="">
			<img class="pt-img5 animate2" src="images/shap/square-blue.png" alt=""> -->
		</section>
	
	</div>

	<?php }



	if($file == 'video')
	{
	
	
	?>


        
	<div class="page-content bg-white">
	
		<!-- Inner Banner -->
		<div class="banner-wraper">
			<div class="page-banner" style="background-image:url(images/banner/img1.jpg);">
				<div class="container">
					<div class="page-banner-entry text-center">
						<h1>Videos</h1>
						<!-- Breadcrumb row -->
						<nav aria-label="breadcrumb" class="breadcrumb-row">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Videos</li>
							</ul>
						</nav>
					</div>
				</div>
				<img class="pt-img1 animate-wave" src="images/shap/wave-blue.png" alt="">
				<img class="pt-img2 animate2" src="images/shap/circle-dots.png" alt="">
				<img class="pt-img3 animate-rotate" src="images/shap/plus-blue.png" alt="">
			</div>
			<!-- Breadcrumb row END -->
		</div>
		<!-- Inner Banner end -->
			
		<!-- About us -->
		<section class="section-sp1 about-area">
			<div class="container">
				<div class="row">

					<?php 
						$sections = $db->getRows("SELECT id,section,image FROM section");
						// echo count($sections);

						if(count($sections) > 0)
						{
							foreach($sections as $section_data)
							{  ?>
								<div class="col-md-4 mb-30 text-center" style="padding: 20px;">										
										<div class ="pcard letter">											
											<a href="gallery-files.php?id=<?=$section_data['id']?>&file=video">
												<img src="<?=$section_data['image']?>" alt="" style="width:100%; height:100%">
											</a>
										</div>	
										
										<a href="gallery-files.php?id=<?=$section_data['id']?>&file=video"><h6 class="text-center mt-3"><?= $section_data['section']?></h6></a>

							 	</div>


								
					  <?php }
						}
					else{ ?>
							 
						<h2 class="text-center">No Videos To Show</h2>

					   <?php }
			   ?>
					

					
				</div>
			</div>
			<!-- <img class="pt-img1 animate-wave" src="images/shap/wave-orange.png" alt="">
			<img class="pt-img2 animate2" src="images/shap/circle-small-blue.png" alt="">
			<img class="pt-img3 animate-rotate" src="images/shap/line-circle-blue.png" alt="">
			<img class="pt-img4 animate-wave" src="images/shap/square-dots-orange.png" alt="">
			<img class="pt-img5 animate2" src="images/shap/square-blue.png" alt=""> -->
		</section>
	
	</div>

	<?php } ?>
	
<?php include "footer.php" ; ?>	
</body>
</html>