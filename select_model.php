<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | Select Model</title>
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
    			<div class="col-md-8">
    				<div class="container">
				      <div class="section-title text-center mr-5">
				        <h2><strong>Select your Device Model</strong></h2>
				        <p class="separator">We carefully select our technicians to ensure <strong> quality </strong> results every time.</p>
				      </div>
				    </div>
				    <div class="container">
				      <div class="row ml-5">

				      	<?php

				      		if(isset($_GET['brand_id'])){

				      			$brand_id=$_GET['brand_id'];
				      			$models=$obj->getBrandRelatedModels($brand_id);
				      		}

			                if(!empty($models)){
			                  foreach ($models as $model) {
			            ?>
			                    <div class="col-md-3 col-lg-3">
						        	<a href="<?php echo 'ExeFile.php?model_id='.$model['model_id'].'&&model_title='.$model['model_title'].'&&model_pic='.$model['model_pic']; ?>" style="text-decoration: none;">
							          <div class="feature-block">
							            <img src="<?php echo 'uploads/'.$model['model_pic']; ?>" alt="img" class="img-fluid">
							            <h5><?php echo $model['model_title']; ?></h5>
							          </div>
						          	</a>
						        </div>
			            <?php
			                  }
			                }

			            ?>
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
