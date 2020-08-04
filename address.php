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
				<div class="col-lg-8 col-md-8" style="background-color: #eff2f5;">
					<br><br>
				    <div class="">
				      <div class="section-title text-center">
				        <h3><strong>What is your address?</strong></h3>
				        <div class="row text-center">
			              	<div class="col-md-4"></div>
		              		<div class="col-md-4">
		              			<img src="assets/img/info.png" style="height: 30px;">
		              		</div>
			             </div>
			              <br>
			              <p class="separator">We will text or call you as soon as we assign one of our technicians.</p>
				      </div>
				    </div>
				    <div class="" style="margin-top: -50px;">
				      <div class="row justify-content-center">
				        <div class="col-lg-5 col-md-8">
				          <div class="form">
				            <form action="#" method="post" class="contactForm">
				              <div class="form-group">
				                <input type="text" name="" class="form-control" placeholder="Enter exact physical address">
				              </div>
				              <div class="form-group">
				                <input type="text" name="" class="form-control" placeholder="Apt / Suite / Floor No. (optional)">
				              </div>
				              <div class="form-group">
				                <textarea rows="6" class="form-control" name="" placeholder="Add instruction (optional)"></textarea>
				              </div>
				              <p class="text-center"><strong>Questions? Call (855) 852-8485</strong></p>
				              
				              <br>
				              <div class="text-center">
				              	<a href="contact_details.php" class="btn btn-success">
				              		<!-- <button type="submit">Continue</button> -->
				              		Continue
				              	</a>
				              </div>
				            </form>
				            
				          </div>
				        </div>
				      </div>
				    </div>
				    <br><br><br><br>
		    	</div>
		    	<div class="col-lg-4 col-md-4">
		    		<br>
		    		
				    <div class="col-md-11" style='overflow-y: scroll; height: 750px;'>
				    	
				    	<ul class="list-group list-group-flush">
				    		<li class="list-group-item" style="background-color: #eff2f5;">
				    			<div class="row">
					    			<div class="col-md-7"></div>
					    			<div class="col-md-5">
					    				<a href="#" style="display: inline;"><i class="fa fa-pencil"></i> Edit Details</a>
					    			</div>
					    		</div>
				    		</li>
				    		<br>
							<li class="list-group-item" style="background-color: #eff2f5;">
							  	<img src="assets/img/washer.png" style="height: 40px; float: left; padding-left: 10px;">
							  	<h5 style="float: right; padding-right: 55px;"><strong>Home Appliance Repair</strong></h5>
							  	<br>
							  	<h4 class="ml-3 mt-5">Washer</h4>

							  	<hr style="border: 1px solid green; border-radius: 5px;">

							  	<p style="float: left; padding-left: 10px; margin-top: -10px;">Inspection</p>
							  	<h5 style="float: right; padding-right: 10px; margin-top: -2px;"><strong>$50</strong></h5>

							  	<br><br>

							  	<p style="float: left; padding-left: 10px; margin-top: -38px;">Repair</p>
							  	<h5 style="float: right; margin-top: -30px;">Pending in-home qoute</h5>
							  	<hr style="border: 1px solid green; border-radius: 5px; margin-top:-1px;">

							  	<p>Your technician will fully inspect your appliance and provide a qoute for recommended repair.</p>
							  	<p style="margin-top: -10px;">This inspection fee is free if you move forward with recommended repair.</p>
							  	<p><strong>Yoy are also free to decline the repair and simply pay for the inspection.</strong></p>
							</li>
							<br>
							<li class="list-group-item" style="background-color: #eff2f5;">
							  	<img src="assets/img/time.png" style="height: 40px; float: left; padding-left: 10px;">
							  	<h5 style="float: right; padding-right: 75px;"><strong>Requested Time Slot</strong></h5>
							  	<br>
							  	<h5 class="ml-3 mt-5">07/25/2019 1:00 PM</h5>
							</li>
						</ul>
				    </div>
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
