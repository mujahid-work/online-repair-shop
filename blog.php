<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | Blog</title>
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
		        <h2><strong>Latest posts</strong></h2>
		        <p class="separator">Discover Posts from our blog, tips and insights for all your at-home needs.</p>
		        <hr>
		      </div>
		    </div>
		    <div class="container">
		      <div class="row">
		        <div class="col-md-6 col-lg-4">
		          <div class="block-blog text-left">
		            <a href="#"><img src="assets/img/blog/blog-image-1.jpg" alt="img"></a>
		            <div class="content-blog">
		              <h4><a href="#">TV Installation Made Easy: How Puls TV Mounting Works ...</a></h4>
		              <span>05, juin 2017</span>
		              <a class="pull-right readmore" href="#">read more</a>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-6 col-lg-4">
		          <div class="block-blog text-left">
		            <a href="#"><img src="assets/img/blog/blog-image-2.jpg" class="img-responsive" alt="img"></a>
		            <div class="content-blog">
		              <h4><a href="#">Simple Tricks to Transform Your Outdoor Space, Patio or Deck ...</a></h4>
		              <span>05, juin 2017</span>
		              <a class="pull-right readmore" href="#">read more</a>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-6 col-lg-4">
		          <div class="block-blog text-left">
		            <a href="#"><img src="assets/img/blog/blog-image-3.jpg" class="img-responsive" alt="img"></a>
		            <div class="content-blog">
		              <h4><a href="#">whats isthe difference between good and bat typography</a></h4>
		              <span>05, juin 2017</span>
		              <a class="pull-right readmore" href="#">read more</a>
		            </div>
		          </div>
		        </div>
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
