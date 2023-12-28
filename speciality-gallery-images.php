<?php include('starter.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include "header.php"; ?>
</head>

<body>
<?php include('menu.php'); ?>
<?php 

$speciality_type = $_REQUEST['type'];

$modified_speciality_type = str_replace('-', ' ', $speciality_type);


?>

   
	<div class="page-content bg-white">
	
		<!-- Inner Banner -->
		<div class="banner-wraper">
			<div class="page-banner" style="background-image:url(images/banner/img1.jpg);">
				<div class="container">
					<div class="page-banner-entry text-center">
						<h1><?=$modified_speciality_type?> Images</h1>
						<!-- Breadcrumb row -->
						<nav aria-label="breadcrumb" class="breadcrumb-row">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?=$modified_speciality_type?> Images</li>
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

		<?php
		$gall_details = $db->getRows("SELECT * FROM speciality_gallery WHERE type='$speciality_type' ORDER BY id DESC"); 


		if(count($gall_details)>0)
		{	
			
		?>
			
		<!-- About us -->
		<section class="section-sp1 about-area">
			<div class="container">
				<div class="row">

					<?php 
					foreach($gall_details as $gall_details_data)
					{ 
						if(!empty($gall_details_data['image']))
						{						
						?>

					<div class="col-md-4 p-4">
						<div>
							<img src="<?=$gall_details_data['image']?>" alt="">
						</div>
					</div>

					<?php
					}
					}
					?>
					
				</div>
			</div>
		
		</section>
	
	

	
	<?php	} 	
	
	else
	{ ?>
		<div class="text-center">
			<h3>No data to show</h3>
		</div>
<?php	}

	?>
	</div>
	
<?php include "footer.php" ; ?>	
</body>
</html>