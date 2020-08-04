<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | Jobs</title>
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
    	<section id="blog" class="wow fadeInUp">
		    <div class="container">
		      <div class="section-title text-center">
		        <h2><strong>Latest Jobs</strong></h2>
		        <p class="separator">We are looking for self-motivated, tech-savvy individuals, looking to become their own boss. Our platform provides you with tools, access to discount high-quality parts, and most importantly - consistent jobs in your area!.</p>
		        <hr>
		      </div>
		    </div>
		    <div class="container" style="margin-top: -40px;">
		      <div class="row">
		      	<?php 
		      		$jobs=$obj->getAllJobs();

		      		if(!empty($jobs)){
		      			foreach ($jobs as $job) {
		      	?>
		      				<div class="col-md-6 col-lg-4">
					          <div class="block-blog text-left">
					            <div class="content-blog">
					              <h4><strong><a href="<?php echo 'job_details.php?job_id='.$job['job_id']; ?>"><?php echo $job['job_title']; ?></a></strong></h4>
					              <span><?php echo $job['job_city']; ?>,</span> <span><?php echo $job['job_state']; ?></span>
					              <br><br>
					              <span><strong><?php echo $job['posted_on']; ?></strong></span>
					              <a class="pull-right readmore" style="text-decoration: underline;" href="<?php echo 'job_details.php?job_id='.$job['job_id']; ?>">read more</a>
					            </div>
					          </div>
					        </div>
		      	<?php
		      			}
		      		}
		      	?>
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
