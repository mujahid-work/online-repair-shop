<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | FAQs</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <?php echo $obj->cssLinks(); ?>

  <style type="text/css">
  	section{
	
			}

			#accordion-style-1 h1,
			#accordion-style-1 a{
			    color:#007b5e;
			}
			#accordion-style-1 .btn-link {
			    font-weight: 400;
			    color: #007b5e;
			    background-color: transparent;
			    text-decoration: none !important;
			    font-size: 16px;
			    font-weight: bold;
				padding-left: 25px;
			}

			#accordion-style-1 .card-body {
			    border-top: 2px solid #007b5e;
			}

			#accordion-style-1 .card-header .btn.collapsed .fa.main{
				display:none;
			}

			#accordion-style-1 .card-header .btn .fa.main{
				background: #007b5e;
			    padding: 13px 11px;
			    color: #ffffff;
			    width: 35px;
			    height: 41px;
			    position: absolute;
			    left: -1px;
			    top: 10px;
			    border-top-right-radius: 7px;
			    border-bottom-right-radius: 7px;
				display:block;
			}
  </style>

</head>

<body style="background-color: #eff2f5;">

	<!-- header -->
 		<?php include_once('includes/header.php'); ?>
    <!-- header -->

    <!-- Pricing -->
    	<br><br><br><br>
    	<section id="blog" class="wow fadeInUp">
		    <div class="container">
		      <div class="section-title text-center">
		        <h2><strong>Got questions? We're here to help</strong></h2>
		        <p class="separator">Use the sections below to find answers to frequently asked questions. You’re also welcome to email us at example@mail.com</p>
		        <hr>
		      </div>
		    </div>
		    <div class="container-fluid bg-gray" id="accordion-style-1">
				<div class="container">
					<section>
						<div class="row">
							<div class="col-lg-12 mx-auto">
								<div class="accordion" id="accordionExample">
									<div class="card">
										<div class="card-header" id="heading1">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
										  			<i class="fa fa-angle-double-right mr-3"></i>
										  			<p style="text-transform: capitalize; display: inline;">
												  		<strong>How does TV mounting work?</strong>
												  	</p>
												</button>
									  		</h5>
										</div>
										<div id="collapse1" class="collapse fade" aria-labelledby="heading1" data-parent="#accordionExample">
											<div class="card-body">
												Leave all the heavy lifting to us! Puls technicians can mount your big screen TV on the wall so you can start viewing your favorite shows. We can be there as soon as today. eStartUp technicians can handle TVs of almost any size, and we can provide almost any style of bracket.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading2">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
												  	<i class="fa fa-angle-double-right mr-3"></i>
												  	<p style="text-transform: capitalize; display: inline;">
												  		<strong>Who are the eStartUp technicians?</strong>
												  	</p>
												</button>
											</h5>
										</div>
										<div id="collapse2" class="collapse fade" aria-labelledby="heading2" data-parent="#accordionExample">
											<div class="card-body">
												Convenience, trust and safety are very important to us. wStartUp technicians are experts in their field and are enthusiastic about using their expertise to solve your problems and bring you peace of mind. All eStartUp technicians have been carefully vetted and screened. We only select the top 10% of technicians who apply, and we require a comprehensive background check for every technician.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading3">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
												  	<i class="fa fa-angle-double-right mr-3"></i>
												  	<p style="text-transform: capitalize; display: inline;">
												  		<strong>Who are the eStartUp technicians?</strong>
												  	</p>
												</button>
											</h5>
										</div>
										<div id="collapse3" class="collapse fade" aria-labelledby="heading3" data-parent="#accordionExample">
											<div class="card-body">
												Convenience, trust and safety are very important to us. wStartUp technicians are experts in their field and are enthusiastic about using their expertise to solve your problems and bring you peace of mind. All eStartUp technicians have been carefully vetted and screened. We only select the top 10% of technicians who apply, and we require a comprehensive background check for every technician.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="heading4">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
												  	<i class="fa fa-angle-double-right mr-3"></i>
												  	<p style="text-transform: capitalize; display: inline;">
												  		<strong>How does TV mounting work?</strong>
												  	</p>
												</button>
											</h5>
										</div>
										<div id="collapse4" class="collapse fade" aria-labelledby="heading4" data-parent="#accordionExample">
											<div class="card-body">
												Leave all the heavy lifting to us! Puls technicians can mount your big screen TV on the wall so you can start viewing your favorite shows. We can be there as soon as today. eStartUp technicians can handle TVs of almost any size, and we can provide almost any style of bracket.
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</section>
				</div>
			</div>
		</section>

    <!-- Pricing -->

    
  	
  		<br><br><br>

  	<!-- footer -->
  		<?php include_once('includes/footer.php') ?>
  	<!-- footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

 <?php echo $obj->jsLinks(); ?>

</body>
</html>
