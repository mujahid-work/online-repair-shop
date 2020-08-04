<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | Pricing</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <?php echo $obj->cssLinks(); ?>

</head>

<body style="background-color: #eff2f5;">

	<!-- header -->
 		<?php include_once('includes/header.php'); ?>
    <!-- header -->

    <!-- Pricing -->
    	<br><br><br><br>
    	<section id="testimonials" class="text-center wow fadeInUp">
		    <div class="container">
		    	<?php
	                $repair_types=$obj->getAllRepairTypes();

	                if(!empty($repair_types)){
	                  foreach ($repair_types as $repair_type) {
	            ?>
					    <div class="row justify-content-center" style="background-color: white;">
					        <div class="col-md-12">
					          <div class="testimonials-content">
					            <div>
					              <div class="" role="listbox">
					                <div class="">
						                <div class="top-top">
						                	<div class="row">
						                  		<div class="col-md-12">
						                  			<h1><?php echo $repair_type['repair_title']; ?></h1>
						                  			<br>
						                    		<!-- <p><?php echo $repair_type['category_description']; ?></p> -->
						                  		</div>
						                  	</div>
						                  	<br>
						                  	<div class="row">
						                  		<div class="col-md-5"></div>
						                  		<div class="col-md-2">
							                  		<img src="<?php echo 'uploads/'.$repair_type['repair_pic']; ?>" alt="img" class="img-responsive" style="max-width: 100%;">
							                  	</div>
						                  	</div>
						                  	<br>
						                  	<div class="row">
						                  		<div class="col-md-3"></div>
						                  		<div class="col-md-6">
						                  			<ul class="list-group list-group-flush">
						                  				<?php
											                $service_prices=$obj->getSingleRepairTypePrices($repair_type['repair_id']);
											                if(!empty($service_prices)){
											                  foreach ($service_prices as $service) {
											            ?>
																<li class="list-group-item">
																  	<p style="float: left; padding-left: 70px;"><?php echo $service['service_title']; ?></p>
																  	<p style="float: right; padding-right: 70px;"><strong>Starting at $<?php echo $service['price']; ?></strong></p>
																</li>
													  	<?php
											                  }
											                }
											            ?>
													</ul>
													<a href="<?php echo 'select_service.php?service_catg_id='.$category['category_id']; ?>" class="btn btn-success">Book a Service</a>
						                  		</div>
						                  	</div>
						                  	<br><br>
						                  	<div class="row">
						                  		<div class="col-md-4"></div>
						                  		<div class="col-md-4">
						                  			<h3>Service Includes</h3>
						                  		</div>
						                  		<div class="col-md-4"></div>
						                  	</div>
						                  	<br><br>
						                  	<div class="row">
						                  		<div class="container">
							                  		<div class="row">
												        <div class="col-md-4">
												          <div class="feature-block">
												            <img src="assets/img/svg/checkmark.svg" alt="img" class="img-fluid">
												            <h5>Simple booking, 7 days a week</h5>
												          </div>
												        </div>
												        <div class="col-md-4">
												          <div class="feature-block">
												            <img src="assets/img/svg/checkmark.svg" alt="img" class="img-fluid">
												            <h5>No extra fees for emergencies or holidays</h5>
												          </div>
												        </div>
												        <div class="col-md-4">
												          <div class="feature-block">
												            <img src="assets/img/svg/checkmark.svg" alt="img" class="img-fluid">
												            <h5>Convenient arrival windows</h5>
												          </div>
												        </div>
												    </div>
												</div>
						                  	</div>
						                </div>
					                </div>
					              </div>
					            </div>
					          </div>
					        </div>
					    </div>
			    <?php
	                  }
	                }
	            ?>
		    </div>
		</section>

    <!-- Pricing -->

    	<br><br>
    	
  	<!-- Book a service -->
	  	<section id="team" class="wow fadeInUp">
	  		<div class="container">
		      <div class="section-title text-center">
		        <h2><strong>Ready to get started?</strong></h2>
		        <p class="separator">Repair or install a device today.</p>
		        <hr style="border: 1px solid green; border-radius: 5px;">
		      </div>
		    </div>
			<div class="container">
			    <div class="card">
			      <div class="row">
			        <div class="col-md-4">
			          <div class="card-block ml-5 mt-2">
			          	<br>
			            <h3 class="card-title ml-5"><strong>A simple way to take care of everything.</strong></h3>
			            <br>
			            <ul style="list-style-type:circle;">
						    <li><p style="font-size: 12px;">Trusted technicians in your neighborhood</p></li>
						    <li><p style="font-size: 12px;">Guaranteed parts and service + 24/7 support</p></li>
						    <li><p style="font-size: 12px;">Hundreds of repair and install options</p></li>
						 </ul>
						 <a href="select_repair_type.php" class="btn btn-success mt-5 ml-5 mb-5">Book a Service</a>
			          </div>
			        </div>
			        <div class="col-md-8 text-center">
			          <div class="card-img-bottom">
			          	<img src="assets/img/bottom_banner.png" alt="Hero Imgs" style="min-width:100%;">
			          </div>
			        </div>
			      </div>
			    </div>
			</div>
		</section>
	<!-- Book a Service -->
  	
  		<br><br><br>

  	<!-- footer -->
  		<?php include_once('includes/footer.php') ?>
  	<!-- footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

 <?php echo $obj->jsLinks(); ?>

</body>
</html>
