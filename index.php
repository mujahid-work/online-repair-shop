<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | Home</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <?php echo $obj->cssLinks(); ?>

</head>

<body style="background-color: #eff2f5;">

	<!-- header -->
 		<?php include_once('includes/header.php'); ?>
    <!-- header -->

    <!-- Slider -->
  	<section id="hero" class="wow fadeIn">
	    <div class="hero-container">
	    	<br><br>
	      <h1>Mobile Repairing made simple</h1>
	      <h2>The best technicians in your neighborhood. Guaranteed.</h2>
	      <img src="assets/img/banner.png" alt="Hero Imgs" height="380">
	      <a href="select_repair_type.php" class="btn-get-started scrollto" style="margin-top: -20px;">Book a Service</a>
	    </div>
  	</section>
  	<!-- Slider -->

  		<br><br><br>

  	<!-- Services Offered -->
  	<section id="features" class="text-center wow fadeInUp">
	    <div class="container">
	      <div class="section-title text-center">
	        <h2><strong>One Click Repair Services Offered</strong></h2>
	        <h4>REPAIR. IMPROVE. MAINTAIN</h4>
	        <p class="separator">Services That You Need We Will Provide At Your Door Step.</p>
	        <hr style="border: 1px solid green; border-radius: 5px;">
	      </div>
	    </div>
	    <div class="container">
		    <div class="row">
		    	<?php

	                $repair_types=$obj->getAllRepairTypes();

	                if(!empty($repair_types)){
	                  foreach ($repair_types as $repair) {
	              ?>
				        <div class="col-md-6 col-lg-3">
				        	<a href="<?php echo 'select_service.php?service_catg_id='.$repair['repair_id']; ?>" style="text-decoration: none;">
						        <div class="feature-block ">
						            <img src="<?php echo 'uploads/'.$repair['repair_pic']; ?>" alt="img" class="img-fluid">
						            <h5><?php echo $repair['repair_title']; ?></h5>
						            <!-- <p><?php echo $category['category_description']; ?></p> -->
						        </div>
						    </a>
				        </div>
		        <?php
	                  }
	                }
	            ?>
		    </div>
	    </div>
	</section>
	<!-- Services Offered -->

	<!-- About Us & Team -->
	<section id="about-us" class="about-us wow fadeInUp">
		<!-- About Us -->
		<div class="container">
	      <div class="section-title text-center">
	        <h2><strong>About Us & Team Members</strong></h2>
	        <p class="separator">Know a little more about us.</p>
	        <hr style="border: 1px solid green; border-radius: 5px;">
	      </div>
	    </div>
	    <div class="container">
	      <div class="row justify-content-center">
	        <div class="col-md-7 col-lg-7">
	          <div class="about-content">

	            <h2><span>eStartup</span>One Click Repair </h2>

	            <ul class="list-unstyled">
	              <li>
	              	<i class="fa fa-angle-right fa-2x"></i>
	              	<strong style="font-size: 20px;">About us</strong>
	              	<p class="ml-5"> We are a San Francisco based company with more than 4,000 fully vetted technicians across the nation - from Los Angeles, CA, to Raleigh, NC, and hundreds of cities in between.</p>
	              </li>
	              <li>
	              	<i class="fa fa-angle-right fa-2x"></i>
	              	<strong style="font-size: 20px;">How does it work?</strong>
	              	<p class="ml-5">Our strength is in our people and our technology. We have engineered a powerful platform that matches our trusted technicians with customers like you. At the click of a button, we spring into action and send a qualified professional to your doorstep.</p>
	              </li>
	              <li>
	              	<i class="fa fa-angle-right fa-2x"></i>
	              	<strong style="font-size: 20px;">Our technicians</strong>
	              	<p class="ml-5">We work hard to find the best technicians and we only accept the top 10% so we can give you peace of mind that your job will be done right. All of our technicians undergo a thorough background check and are always held to our high standard of quality.</p>
	              </li>
	            </ul>

	          </div>
	        </div>
	        <div class="col-md-5 col-lg-5">
	          <img src="assets/img/side_banner.png" alt="About" style="min-height: 100%; max-width: 100%;">
	        </div>

	      </div>
	    </div>
	    <!-- About Us -->

	    <br><br>

	    <!-- Team -->
	    <section id="team" class="text-center wow fadeInUp">
		    <div class="container">
		      <div class="section-title text-center">
		        <h2>Team Member</h2>
		      </div>
		    </div>
		    <div class="container">
		      <div class="row">
		        <div class="col-md-6 col-md-4 col-lg-3">
		          <div class="team-block bottom">
		            <img src="assets/img/team/1.jpg" class="img-responsive" alt="img">
		            <div class="team-content">
		              <ul class="list-unstyled">
		                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
		                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
		                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
		              </ul>
		              <span>manager</span>
		              <h4>Kimberly Tran</h4>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-6 col-md-4 col-lg-3">
		          <div class="team-block bottom">
		            <img src="assets/img/team/2.jpg" class="img-responsive" alt="img">
		            <div class="team-content">
		              <ul class="list-unstyled">
		                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
		                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
		                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
		              </ul>
		              <span>manager</span>
		              <h4>Kimberly Tran</h4>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-6 col-md-4 col-lg-3">
		          <div class="team-block bottom">
		            <img src="assets/img/team/3.jpg" class="img-responsive" alt="img">
		            <div class="team-content">
		              <ul class="list-unstyled">
		                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
		                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
		                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
		              </ul>
		              <span>manager</span>
		              <h4>Kimberly Tran</h4>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-6 col-md-4 col-lg-3">
		          <div class="team-block bottom">
		            <img src="assets/img/team/4.jpg" class="img-responsive" alt="img">
		            <div class="team-content">
		              <ul class="list-unstyled">
		                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
		                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
		                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
		              </ul>
		              <span>manager</span>
		              <h4>Kimberly Tran</h4>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		</section>
	    <!-- Team -->
	</section>
	<!-- About Us & Team -->

		<br><br><br>

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

  	<!-- contact -->
  	<section id="contact" class="wow fadeInUp">
	    <div class="container">
	      <div class="section-title text-center">
	        <h2><strong>Contact Us</strong></h2>
	        <p class="separator">Get in touch with us. Feel free to say HELLO!</p>
	        <hr style="border: 1px solid green; border-radius: 5px;">
	      </div>
	    </div>
	    <div class="container">
	      <div class="row justify-content-center">

	        <div class="col-lg-3 col-md-4">

	          <div class="info">
	            <div>
	              <i class="fa fa-map-marker"></i>
	              <p>A108 Adam Street<br>New York, NY 535022</p>
	            </div>

	            <div class="email">
	              <i class="fa fa-envelope"></i>
	              <p>info@example.com</p>
	            </div>

	            <div>
	              <i class="fa fa-phone"></i>
	              <p>+1 5589 55488 55s</p>
	            </div>
	          </div>

	          <div class="social-links">
	            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
	            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
	            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
	            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
	            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
	          </div>

	        </div>

	        <div class="col-lg-5 col-md-8">
	          <div class="form">
	            <div id="sendmessage">Your message has been sent. Thank you!</div>
	            <div id="errormessage"></div>
	            <form action="" method="post" role="form" class="contactForm">
	              <div class="form-group">
	                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
	                <div class="validation"></div>
	              </div>
	              <div class="form-group">
	                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
	                <div class="validation"></div>
	              </div>
	              <div class="form-group">
	                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
	                <div class="validation"></div>
	              </div>
	              <div class="form-group">
	                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
	                <div class="validation"></div>
	              </div>
	              <div class="text-center"><button type="submit">Send Message</button></div>
	            </form>
	          </div>
	        </div>
	      </div>
	    </div>
	    <br>
  	</section>
  	<!-- contact -->
  	
  	<!-- footer -->
  		<?php include_once('includes/footer.php') ?>
  	<!-- footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

 <?php echo $obj->jsLinks(); ?>

</body>
</html>
