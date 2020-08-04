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

   	

    	<br><br>
    	    			
        <section id="contact" class="wow fadeInUp">		        	
        	<div class="row">
				<div class="col-lg-12 col-md-12" style="background-color: #eff2f5;">
					<br><br>
				    <div class="">
				      <div class="section-title text-center">
				      	<div class="row text-center">
			              	<div class="col-md-4"></div>
		              		<div class="col-md-4">
		              			<img src="assets/img/confirm.png" style="height: 50px;">
		              		</div>
			            </div>
				        <h2><strong>Thank You!</strong></h2>
				        <p class="separator">We've received your appointment request.</p>
				        <br>
				      </div>
				    </div>
				    <div class="" style="margin-top: -50px;">
				      <div class="row justify-content-center">
				        <div class="col-lg-8 col-md-8">
					        <div class="shadow p-3 mb-5 bg-white rounded">
					          	<div class="col-md-2">
					          		<img src="assets/img/mobile.png" style="height: 80px; margin-top: -10px;">
					          	</div>
					          	<div class="col-md-10 mt-3">
					          		<p>You will receive an email and SMS confirming the details of your request.</p>
					          	</div>
					          	<br><br><br><br><br><br>
					        </div>
					        <div class="shadow p-3 mb-5 bg-white rounded">
					          	<div class="col-md-2">
					          		<img class="ml-4 mt-3" src="assets/img/location.png" style="height: 40px;">
					          	</div>
					          	<div class="col-md-10 mt-3">
					          		<p>We're locating the best techs in your neighborhood and will confirm the arrival time soon.</p>
					          	</div>
					          	<br><br><br><br><br><br>
					        </div>
					        <div class="shadow p-3 mb-5 bg-white rounded">
					          	<div class="col-md-2">
					          		<img class="ml-4 mt-3" src="assets/img/search.png" style="height: 40px;">
					          	</div>
					          	<div class="col-md-10 mt-3">
					          		<p>Your technician will inspect your appliance and provide a quote. There's no pressure to move forward with the repair if you change your mind.</p>
					          	</div>
					          	<br><br><br><br><br><br>
					        </div>
					        <br>
					        <p class="text-center"><strong>Questions? Call (855) 852-8485</strong></p>
				        </div>
				      </div>
				    </div>
				    <br><br><br><br>
		    	</div>
			</div>				    
	  	</section>
	        

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
