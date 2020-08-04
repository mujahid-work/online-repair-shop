<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | Time Slot</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <?php echo $obj->cssLinks(); ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css" />

</head>

<body style="background-color: #eff2f5;">

	<!-- header -->
 		<?php include_once('includes/header.php'); ?>
    <!-- header -->

    	<!-- Services -->
	    	<br><br><br><br>
	    	<section id="features" class="text-center wow fadeInUp">
	    		<div class="row">
	    			<div class="col-lg-8 col-md-8" style="background-color: #eff2f5;">
						<br><br>
					    <div class="">
					      <div class="section-title text-center">
					      	<div class="row text-center">
				              	<div class="col-md-4"></div>
			              		<div class="col-md-4">
			              			<img src="assets/img/preview.png" style="height: 50px;">
			              		</div>
				            </div>
					        <h2><strong>Review Your Order!</strong></h2>
					        <p class="separator">You are almost done.please review the details and confirm order below!</p>
					        <br>
					      </div>
					    </div>
						<form action="ExeFile.php" method="post" class="contactForm">
						    <div class="text-center" style="margin-top: -50px;">
				              	<button class="btn btn-success" type="submit" name="confirm_btn">Confirm Your Order!</button>
				            </div>
				        </form>
					    <br><br><br><br>
			    	</div>
	    			<div class="col-md-4">
	    				<br>		    		
					    <div class="col-md-11" style='overflow-y: scroll; height: 750px;'>				    	
					    	<ul class="list-group list-group-flush">
					    		<li class="list-group-item" style="background-color: white;">
					    			<div class="row">
						    			<div class="col-md-7 text-left">
						    				<h5 class="mt-3" style="color: green;">
						    					<strong>Booking Details</strong>
						    				</h5>
						    			</div>
						    		</div>
					    		</li>

					    		<br>

					    		<li class="list-group-item" style="background-color: white;">
								  	<?php
								  		if(isset($_SESSION['repair_title'])){
								  	?>
								  			<div class="row">
								    			<div class="col-md-7 text-left">
								    			</div>
								    			<div class="col-md-5">
								    				<a href="select_repair_type.php" style="display: inline; text-decoration: underline;"><i class="fa fa-pencil"></i> Edit Details</a>
								    			</div>
								    		</div>
								  			<div class="row">
										  		<div class="col-lg-2 text-center">
										  			<img src="<?php echo 'uploads/'.$_SESSION['repair_img']; ?>" style="height: 40px;">
										  		</div>
										  		<div class="col-lg-10 text-left">
										  			<h5><strong><?php echo $_SESSION['repair_title']; ?></strong></h5>
										  		</div>
										  	</div>									  	
								  	<?php
								  		}
								  	?>
								  			<br>
								  	<?php
								  		if(isset($_SESSION['brand_title'])){
								  	?>
								  			<div class="row">
										  		<div class="col-lg-2 text-center">
										  			<img src="<?php echo 'uploads/'.$_SESSION['brand_pic']; ?>" style="height: 40px;">
										  		</div>
										  		<div class="col-lg-10 text-left">
										  			<h5><strong><?php echo $_SESSION['brand_title']; ?></strong></h5>
										  		</div>
										  	</div>									  	
								  	<?php
								  		}
								  	?>
								  			<br>
								  	<?php
								  		if(isset($_SESSION['model_title'])){
								  	?>
								  			<div class="row">
										  		<div class="col-lg-2 text-center">
										  			<img src="<?php echo 'uploads/'.$_SESSION['model_pic']; ?>" style="height: 40px;">
										  		</div>
										  		<div class="col-lg-10 text-left">
										  			<h5><strong><?php echo $_SESSION['model_title']; ?></strong></h5>
										  		</div>
										  	</div>									  	
								  	<?php
								  		}
								  	?>

								  			<br>
								  	<?php
								  		if(isset($_SESSION['service_type'])){
								  	?>
								  			<div class="row">
										  		<div class="col-lg-2 text-center">
										  			<img src="<?php echo $_SESSION['service_type_pic']; ?>" style="height: 40px;">
										  		</div>
										  		<div class="col-lg-10 text-left">
										  			<h5><strong><?php echo $_SESSION['service_type']; ?></strong></h5>
										  		</div>
										  	</div>									  	
								  	<?php
								  		}
								  	?>
								  			<br>
								  	<?php
								  		if(isset($_SESSION['store_id'])){
								  	?>
								  			<div class="row">
										  		<div class="col-lg-2 text-center">
										  			<img src="<?php echo 'uploads/'.$_SESSION['store_pic']; ?>" style="height: 40px;">
										  		</div>
										  		<div class="col-lg-10 text-left">
										  			<h5><strong><?php echo $_SESSION['store_title']; ?></strong></h5>
										  		</div>
										  	</div>									  	
								  	<?php
								  		}
								  	?>
								  			<hr style="border: 1px solid green; border-radius: 5px;">
								  	<?php
								  		if(isset($_SESSION['services'])){
								  	?>
								  			<div class="row">
										  		<div class="col-lg-6">
										  			<?php
										  				if(!empty($_SESSION['services'])){
										  					for ($i=0; $i < sizeof($_SESSION['services']) ; $i++) {
										  			?>
										  						<p><?php echo $_SESSION['services'][$i]; ?></p>
										  			<?php
										  					}
										  				}
										  			?>								  			
										  		</div>
										  		<div class="col-lg-6">
										  			<?php
										  				if(!empty($_SESSION['service_prices'])){
										  					for ($i=0; $i < sizeof($_SESSION['service_prices']) ; $i++) { 
										  			?>
										  						<p style=""><strong>$<?php echo $_SESSION['service_prices'][$i]; ?></strong></p>
										  			<?php
										  					}
										  				}
										  			?>
										  			
										  		</div>
										  	</div>
										  	<hr>
										  	<div class="row">
										  		<div class="col-lg-3"></div>
										  		<div class="col-lg-5 text-right">
										  			<h5>Grand Total</h5>
										  		</div>
										  		<div class="col-lg-4 text-left">
										  			<h5><strong><?php echo '$'.$_SESSION['grand_total']; ?></strong></h5>
										  		</div>
										  	</div>									  	
								  	<?php
								  		}
								  	?>

								  			<hr style="border: 1px solid green; border-radius: 5px;">
							  	</li>

							  	<br>

							  	<li class="list-group-item" style="background-color: white;">
									<?php
								  		if(isset($_SESSION['time'])){
								  	?>
								  		<div class="row">
							    			<div class="col-md-7 text-left">
							    			</div>
							    			<div class="col-md-5">
							    				<a href="time_slot.php" style="display: inline; text-decoration: underline;"><i class="fa fa-pencil"></i> Edit Details</a>
							    			</div>
							    		</div>
										<div class="row">
									  		<div class="col-lg-2 text-center">
									  			<img src="assets/img/time.png" style="height: 40px;">
									  		</div>
									  		<div class="col-lg-10 text-left">
									  			<h5><strong>Requested Time Slot</strong></h5>
									  		</div>
									  	</div>
									  	<div class="row">
									  		<div class="col-lg-12 text-left">
									  			<h4 class="ml-3 mt-5"><?php echo $_SESSION['time']; ?></h4>
									  			<h5 class="ml-3 mt-5"><?php echo $_SESSION['time_slot']; ?></h5>
									  		</div>
									  	</div>
									<?php
								  		}
								  	?>
								</li>

								<br>

								<li class="list-group-item" style="background-color: white;">
									<?php
								  		if(isset($_SESSION['logged_in_id'])){
								  	?>
								  		<div class="row">
							    			<div class="col-md-7 text-left">
							    			</div>
							    			<div class="col-md-5">
							    				<a href="contact_details.php" style="display: inline; text-decoration: underline;"><i class="fa fa-pencil"></i> Edit Details</a>
							    			</div>
							    		</div>
										<div class="row">
									  		<div class="col-lg-2 text-center">
									  			<img src="assets/img/location.png" style="height: 40px;">
									  		</div>
									  		<div class="col-lg-10 text-left">
									  			<h5><strong>Location</strong></h5>
									  		</div>
									  	</div>
									  	<div class="row">
									  		<div class="col-lg-12 text-left">
									  			<h5 class="ml-3 mt-5"><?php echo $_SESSION['address']; ?></h5>
									  		</div>
									  	</div>
									<?php
								  		}
								  	?>
								</li>

								<br>

								<li class="list-group-item" style="background-color: white;">
									<?php
								  		if(isset($_SESSION['logged_in_id'])){
								  	?>
								  		<div class="row">
							    			<div class="col-md-7 text-left">
							    			</div>
							    			<div class="col-md-5">
							    				<a href="contact_details.php" style="display: inline; text-decoration: underline;"><i class="fa fa-pencil"></i> Edit Details</a>
							    			</div>
							    		</div>
										<div class="row">
									  		<div class="col-lg-2 text-center">
									  			<img src="assets/img/contact.svg" style="height: 40px;">
									  		</div>
									  		<div class="col-lg-10 text-left">
									  			<h5><strong>Contact Details</strong></h5>
									  		</div>
									  	</div>
									  	<div class="row">
									  		<div class="col-lg-12 text-left">
									  			<h5 class="ml-3 mt-5"><?php echo $_SESSION['name']; ?></h5>
									  			<h5 class="ml-3 mt-5" style="text-transform: none;"><?php echo $_SESSION['email']; ?></h5>
									  			<h5 class="ml-3 mt-5"><?php echo $_SESSION['contact']; ?></h5>
									  		</div>
									  	</div>
									<?php
								  		}
								  	?>
								</li>
							</ul>
					    </div>
	    			</div>
	    		</div>
			    
			  </section>
	    <!-- Services -->
	        

  	<!-- footer -->
  		<?php include_once('includes/footer.php') ?>
  	<!-- footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

 <?php echo $obj->jsLinks(); ?>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>

</body>
</html>
