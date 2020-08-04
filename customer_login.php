<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | Customer Login</title>
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
					<br><br><br><br>
				    <div class="">
				      <div class="section-title text-center">
				        <h3><strong>Login to your account</strong></h3>
				      </div>
				    </div>
				    <div class="" style="margin-top: -50px;">
				      <div class="row justify-content-center">
				        <div class="col-lg-5 col-md-8">
				          <div class="form">
				            <form action="ExeFile.php" method="post">
				              <div class="form-group">
				                <input type="email" class="form-control" name="email_field" placeholder="enter your email"/>
				              </div>
				              <div class="form-group">
				                <input type="password" class="form-control" name="password_field" placeholder="enter your password"/>
				              </div>
				              <div class="text-center">
				                <button type="submit" class="btn btn-primary" name="customer_login_btn">Login</button>
				              </div>
				            </form>
				          </div>
				        </div>
				      </div>
				    </div>
				    <div class="container mt-5">
			          <div class="section-title text-center">
			            <p class="separator">No account? <a href="customer_signup.php"> Signup </a> |  <a href="#"> Forgot Password? </a></p>
			          </div>
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
