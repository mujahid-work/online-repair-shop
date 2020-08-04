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

  <style type="text/css">
  	$color1: #faf3e6;
	$color2: #5C331A;
	$color3: #aa8;
	$color4: #000;
	$color5: #fff;

	section {
	  display: block;
	  float: left;
	  margin: 15px 15px;
	}

	// FIELDSETS

	fieldset {
	  border: 1px solid $color2;
	  border-top: 20px solid $color2;
	  border-bottom: 10px solid $color2;
	  background: $color1;
	}

	fieldset legend {
	  text-transform: capitalize;
	  font-variant: small-caps;
	  background: $color2;
	  color: $color5;
	  position: relative;
	  top: -9px;
	  left: 0px;
	  padding: 5px 20px;
	  font-size: 24px;
	  border-radius: 8px 8px 0 0;
	}

	fieldset:before {
	  content: "";
		display: block;
		position: relative;
	  top: -13px;
	  left: -10px;
	  width: calc(100% + 18px);
	  border: 1px solid $color2;
	}

	/*
	fieldset:after {
	  content: "";
		display: block;
		position: relative;
	  left: -10px;
	  width: calc(100% + 18px);
	  border: 1px solid $color2;
	}
	*/

	// 

	fieldset.dons {
	  width: 400px;
	}
	fieldset.traits {
	  width: 400px;
	}
  </style>

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
						<br><br><br><br>
					    <div class="">
					      <div class="section-title text-center">
					        <h3><strong>Provide address and Contact details?</strong></h3>
					        <p class="separator">We will text or call you as soon as we assign one of our technicians.</p>
					      </div>
					    </div>
					    <div class="" style="margin-top: -50px;">
					      <div class="row justify-content-center">
					        <div class="col-md-7">
					          <div class="form">
					            <form action="ExeFile.php" method="post" class="contactForm">
					              <div class="form-group">
					                <div class="">
					                	<div class="row">
					                		<div class="col-md-2"></div>
	                                    	<div class="col-md-8">
	                                    		<input value="<?php echo $_SESSION['logged_in_name']; ?>" type="text" name="name_field" class="form-control" placeholder="enter your full name">
	                                    	</div>
	                                    </div>
	                                    <br>
	                                    <div class="row">
	                                    	<div class="col-md-12">
	                                    		<textarea rows="3" class="form-control" name="address_field" placeholder="enter your physical address"><?php echo $_SESSION['logged_in_address']; ?></textarea>
	                                    	</div>
	                                    </div>
	                                    <br>
	                                    <div class="row">
	                                    	<div class="col-md-6">
	                                    		<input value="<?php echo $_SESSION['logged_in_email']; ?>" type="email" name="email_field" class="form-control" placeholder="enter your email">
	                                    	</div>
	                                    	<div class="col-md-6">
	                                    		<input value="<?php echo $_SESSION['logged_in_contact']; ?>" type="text" name="contact_field" class="form-control" placeholder="enter your contact">
	                                    	</div>
	                                    </div>
	                                </div>
					              </div>
					              <!-- <div class="row">
					              	<div class="col-md-12 text-left"> -->
					              		<br>
					              		<section id="basics">
										    <fieldset class="abilities">
										      	<legend style="border-color: green;">Related Services</legend>
										      	<?php

							                        if(isset($_SESSION['model_id'])){
							                            $model_id=$_SESSION['model_id'];
							                            $services=$obj-> getModelRelatedServices($model_id);
							                        }
						                            
						                            if(!empty($services)){
						                              	$no=0;
						                              	foreach ($services as $service) {
						                                	$no++;
						                                	if(!in_array($service['service_title'], $_SESSION['services'])){
						                        ?>
														    	<div class="row">
														    		<div class="col-md-9 text-left">
														    			<p><?php echo $service['service_title']; ?></p>
														    		</div>
														    		<div class="col-md-3 text-right">
														    			<p>
														    				<a href="<?php echo 'ExeFile.php?add='.$service['service_title'].'&&price='.$service['price']; ?>" class="btn btn-success" title="add servce">
														    					<?php echo '$'.$service['price']; ?>
														    				</a>
														    			</p>
														    		</div>
														    	</div>
												<?php
															}
						                            	}
						                         	}
						                        ?>
										    </fieldset>
										  </section>
										  <hr style="border: 1px solid green; border-radius: 5px;">
					              	<!-- </div>
					              </div> -->
					              <div class="text-center">
					              	<button type="submit" class="btn btn-success" name="contact_btn">Continue</button>
					              </div>
					            </form>
					            <br><br>
					            <p class="text-center"><strong>Questions? Call (855) 852-8485</strong></p>
					          </div>
					        </div>
					      </div>
					    </div>
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
										  						<p style="">
										  							<strong>$<?php echo $_SESSION['service_prices'][$i]; ?></strong>
										  							<a href="<?php echo 'ExeFile.php?remove='.$_SESSION['services'][$i].'&&price='.$_SESSION['service_prices'][$i]; ?>" title="remove service">
										  								<img class="ml-4" src="assets/img/remove.png" alt="remove" height="30">
										  							</a>
										  						</p>
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
