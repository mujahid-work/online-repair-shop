<?php
	include_once('MethodsFile.php');
	$obj=new MethodsClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eStartup | Repair Details</title>
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

   	

    	<br><br>
    	    			
        <section id="contact" class="wow fadeInUp">		        	
        	<div class="row">
				<div class="col-lg-8 col-md-8" style="background-color: #eff2f5;">
					<br><br><br><br>
				    <div class="">
				      <div class="section-title text-center">
				        <h3><strong>Few More Appliance Details</strong></h3>
				        <p class="separator">A few more details will help us bring the <strong> right tool </strong> for the task.</p>
				      </div>
				    </div>
				    <div class="" style="margin-top: -50px;">
				      <div class="row justify-content-center">
				        <div class="col-lg-10 col-md-8">
				          <div class="form">
				            <ul>
                      <form action="ExeFile.php" method="post">
                        <?php

                          if(isset($_GET['service_id'])){
                            $service_id=$_GET['service_id'];
                            $service_issues=$obj->getSingleServiceIssues($service_id);
                          }
                            
                            if(!empty($service_issues)){
                              $no=0;
                              foreach ($service_issues as $service) {
                                $no++;
                        ?>

                                <li>
                                  <input type="checkbox" id="<?php echo 'myCheckbox'.$no; ?>" name="issue_title_field[]" value="<?php echo $service['issue_title']; ?>" />

                                  <label for="<?php echo 'myCheckbox'.$no; ?>">
                                    <img src="<?php echo 'uploads/'.$service['issue_pic']; ?>" />
                                  </label>
                                </li>
                                <input type="hidden" name="issue_price_field[]" value="<?php echo $service['issue_price']; ?>">

                        <?php
                            }
                          }
                        ?>

                        <div class="text-center">
                          <br><br>
                          <button type="submit" class="btn btn-success" name="issue_btn">Continue</button>
                      </div>
                      </form>
      							</ul>
				            <br><br>
				            <p class="text-center"><strong>Questions? Call (855) 852-8485</strong></p>
				          </div>
				        </div>
				      </div>
				    </div>
				    <br><br><br><br>
		    	</div>
		    	<div class="col-lg-4 col-md-4">
            <br>
            <div class="col-md-11">
              <ul class="list-group list-group-flush">
                <li class="list-group-item" style="background-color: #eff2f5;">
                  <?php
                    if(isset($_SESSION['service_catg_title'])){
                  ?>
                      <div class="row">
                        <div class="col-lg-2">
                          <img src="<?php echo 'uploads/'.$_SESSION['service_catg_img']; ?>" style="height: 40px;">
                        </div>
                        <div class="col-lg-10">
                          <h5><strong><?php echo $_SESSION['service_catg_title']; ?></strong></h5>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <h4 class="ml-3 mt-5"><?php echo $_SESSION['service_title']; ?></h4>
                        </div>
                      </div>
                  <?php
                    }
                  ?>
                                  
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

</body>
</html>
