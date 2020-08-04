<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | Service Type</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <?php echo $obj->cssLinks(); ?>

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
				        <h3><strong>What's Your Preffered service type?</strong></h3>
				        <p class="separator">Our best technicians in your neighborhood are only a few clicks away</p>
				      </div>
				    </div>
				    <div class="container">
				      <div class="row ml-5">
		                    <div class="col-md-3 col-lg-3">
					        	<a href="<?php echo 'ExeFile.php?service_type=Store Repair'?>" style="text-decoration: none;">
						          <div class="feature-block">
						            <img src="<?php echo 'assets/img/store.png'; ?>" alt="img" class="img-fluid">
						            <h5>Store Repair</h5>
						          </div>
					          	</a>
					        </div>
					        <div class="col-md-3 col-lg-3">
					        	<a href="<?php echo 'ExeFile.php?service_type=Mobile Repair'?>" style="text-decoration: none;">
						          <div class="feature-block">
						            <img src="<?php echo 'assets/img/mobile_repair.svg'; ?>" alt="img" class="img-fluid">
						            <h5>Mobile Repair</h5>
						          </div>
					          	</a>
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

</body>
</html>
