<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | Select Services</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <?php echo $obj->cssLinks(); ?>


  <style type="text/css">
  	ul {
	  list-style-type: none;
	}

	li {
	  display: inline-block;
	}

	input[type="checkbox"][id^="myCheckbox"] {
	  display: none;
	}

	label {
	  border: 1px solid #fff;
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
    			<div class="col-md-8">
    				<div class="container">
				      <div class="section-title text-center mr-5">
				        <h2><strong>What Services you Need?</strong></h2>
				        <p class="separator">We carefully select our technicians to ensure <strong> quality </strong> results every time.</p>
				      </div>
				    </div>
				    <div class="container">
					    <div class="row ml-5">
					      	<div class="form">
					            <ul>
			                      <form action="ExeFile.php" method="post">
			                        <?php

				                        if(isset($_GET['model_id'])){
				                            $model_id=$_GET['model_id'];
				                            $services=$obj-> getModelRelatedServices($model_id);
				                        }
			                            
			                            if(!empty($services)){
			                              $no=0;
			                              foreach ($services as $service) {
			                                $no++;
			                        ?>
			                                <li title="">
			                                  <input type="checkbox" id="<?php echo 'myCheckbox'.$no; ?>" name="services[]" value="<?php echo $service['service_title'].','.$service['price']; ?>" />

			                                  <label for="<?php echo 'myCheckbox'.$no; ?>">
			                                    <img src="<?php echo 'uploads/'.$service['service_pic']; ?>" />
			                                  </label>
			                                  <label><?php echo $service['service_title']; ?></label>
			                                </li>
			                                <!-- <input type="text" name="service_prices[]" value="<?php echo $service['price']; ?>"> -->
			                        <?php
			                            }
			                          }
			                        ?>
			                        <div class="text-center">
			                          <br><br>
			                          <button type="submit" class="btn btn-success" name="services_btn">Continue</button>
			                      </div>
			                      </form>
	      						</ul>
					            <br><br>
					            <p class="text-center"><strong>Questions? Call (855) 852-8485</strong></p>
					        </div>
					    </div>
				    </div>
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
							  			<hr style="border: 1px solid green; border-radius: 5px;">				  							  	
						  	</li>
						</ul>
				    </div>
    			</div>
    		</div>
		    
		  </section>

    <!-- Services -->
  	
  		<br><br><br>

  	<!-- footer -->
  		<?php include_once('includes/footer.php') ?>
  	<!-- footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

 <?php echo $obj->jsLinks(); ?>

</body>
</html>
