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
	  	ul {
		  list-style-type: none;
		}

		li {
		  display: inline-block;
		}

		input[type="radio"][id^="id"] {
		  display: none;
		}

		label {
		  border: 1px solid grey;
		  padding: 10px;
		  display: block;
		  position: relative;
		  margin: 10px;
		  cursor: pointer;
		}

		label:before {
		  background-color: white;
		  color: white;
		  content: " ";
		  display: block;
		  border-radius: 50%;
		  border: 1px solid grey;
		  position: absolute;
		  top: -5px;
		  left: -5px;
		  width: 25px;
		  height: 25px;
		  text-align: center;
		  line-height: 28px;
		  transition-duration: 0.4s;
		  transform: scale(0);
		}

		label img {
		  height: 100px;
		  width: 100px;
		  transition-duration: 0.2s;
		  transform-origin: 50% 50%;
		}

		:checked + label {
		  border-color: #ddd;
		}

		:checked + label:before {
		  content: "✓";
		  background-color: grey;
		  transform: scale(1);
		}

		:checked + label img {
		  transform: scale(0.9);
		  /* box-shadow: 0 0 5px #333; */
		  z-index: -1;
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
					        <h3><strong>What's Your Preferred timing?</strong></h3>
					        <p class="separator">We will text or call you as soon as we assign one of our technicians.</p>
					      </div>
					    </div>
					    <div class="" style="margin-top: -50px;">
					      <div class="row justify-content-center">
					        <div class="col-lg-12 col-md-12">
					          <div class="form">
					            <form action="ExeFile.php" method="post" class="contactForm">
					            	<div class="row">
						            	<div class="col-md-4"></div>
						            	<div class="col-md-4">
							              <div class="form-group">
							              	<input type="date" name="time_field" class="form-control">
							                <!-- <div class="">
			                                    <div class='input-group date' id='datetimepicker1' data date-format="dd-mm-yyyy" >
			                                        <input type='text' name="time_field" class="form-control"/>
			                                        <span class="input-group-addon">
			                                            <span class="glyphicon glyphicon-calendar"></span>
			                                        </span>
			                                    </div>
			                                </div> -->
							              </div>
							          	</div>
							        </div>
							        <div class="row">
							            <div class="col-md-12">
							              	<ul>
							              		<li title="">
				                                  <input type="radio" id="id1" name="time" value="08am-09am" />
				                                  <label for="id1">08am-09am</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id2" name="time" value="09am-10am" />
				                                  <label for="id2">09am-10am</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id3" name="time" value="10am-11am" />
				                                  <label for="id3">10am-11am</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id4" name="time" value="11am-12pm" />
				                                  <label for="id4">11am-12pm</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id5" name="time" value="12pm-01pm" />
				                                  <label for="id5">12pm-01pm</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id6" name="time" value="01pm-02pm" />
				                                  <label for="id6">01pm-02pm</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id7" name="time" value="02pm-03pm" />
				                                  <label for="id7">02pm-03pm</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id8" name="time" value="03pm-04pm" />
				                                  <label for="id8">03pm-04pm</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id9" name="time" value="04pm-05pm" />
				                                  <label for="id9">04pm-05pm</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id10" name="time" value="05pm-06pm" />
				                                  <label for="id10">05pm-06pm</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id11" name="time" value="06pm-07pm" />
				                                  <label for="id11">06pm-07pm</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id12" name="time" value="07pm-08pm" />
				                                  <label for="id12">07pm-08pm</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id13" name="time" value="08pm-09pm" />
				                                  <label for="id13">08pm-09pm</label>
				                                </li>
				                                <li title="">
				                                  <input type="radio" id="id14" name="time" value="09pm-10pm" />
				                                  <label for="id14">09pm-10pm</label>
				                                </li>
				      						</ul>
							            </div>
							        </div>
							        <div class="row">
							        	<div class="col-md-4"></div>
							        	<div class="col-md-4 text-center">
							              	<button type="submit" class="btn btn-success" name="time_btn">Continue</button>
							            </div>
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
