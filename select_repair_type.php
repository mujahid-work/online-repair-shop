<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | Select Repair Type</title>
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
		    <div class="container">
		      <div class="section-title text-center">
		        <h2><strong>Select a Repair Type</strong></h2>
		        <p class="separator">Save time and money with same-day setup and repairs.</p>
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
				        	<a href="<?php echo 'ExeFile.php?repair_id='.$repair['repair_id'].'&&repair_title='.$repair['repair_title'].'&&repair_img='.$repair['repair_pic']; ?>" style="text-decoration: none;">
					          <div class="feature-block">
					            <img src="<?php echo 'uploads/'.$repair['repair_pic']; ?>" alt="img" class="img-fluid">
					            <h5><?php echo $repair['repair_title']; ?></h5>
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

    <!-- Services -->
  	
  		<br><br><br>

  	<!-- footer -->
  		<?php include_once('includes/footer.php') ?>
  	<!-- footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

 <?php echo $obj->jsLinks(); ?>

</body>
</html>
