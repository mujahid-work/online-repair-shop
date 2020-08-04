<?php
    include_once('AdminMethods.php');
    $obj=new AdminMethods();

    session_start();

    $_SESSION['active_tab']='Invoice';

    if(!isset($_SESSION['logged_in_id']) || $_SESSION['logged_in_id']=="" || $_SESSION['role'] != 'Admin'){
      header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    eStartUp | Manage Customers
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    

    <?php echo $obj->cssLinks(); ?>

    <style type="text/css">
    	.searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #353b48;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 450px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: white;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:white;
    }
    </style>


</head>

<body class="">
  <div class="wrapper ">

      <!-- Sidebar -->
        <?php include_once('includes/side_bar.php'); ?>
      <!-- End Sidebar -->

    <div class="main-panel">

      <!-- Navbar -->
        <?php include_once('includes/nav_bar.php'); ?>
      <!-- End Navbar -->

      <div class="content">

        <!-- Navbar -->
          <?php include_once('includes/uper_bar.php'); ?>
        <!-- End Navbar -->
        
        <div class="row">
        	<div class="col-md-5"></div>
        	<div class="col-md-7">
        		<div class="container h-100">
			      <div class="d-flex justify-content-center h-100">
			      	<form action="ExeFile.php" method="post">
			        <div class="searchbar">
				        
					        <input class="search_input" type="email" name="search_field" placeholder="enter customer email to create invoice">
					        <button type="submit" class="search_icon"><i class="fa fa-search"></i></button>
					    
			        </div>
			        </form>
			      </div>
			    </div>
        	</div>
        </div>
        <br>
        <div class="row">
		    <div class="col-md-12">
		    	<div class="">
					<div class="card">
						<div class="card-header">
							Invoice <strong>01/01/01/2018</strong> 
				  			<span class="float-right">
				  				<a href="#" class="btn btn-success"><i class="fa fa-print"></i> Print Invoice</a>
				  			</span>
						</div>
						<div class="card-body">
							<div class="row mb-4">
								<div class="col-sm-6">
									<h6 class="mb-3">From:</h6>
									<div>
										<strong>Webz Poland</strong>
									</div>
									<div>Madalinskiego 8</div>
									<div>71-101 Szczecin, Poland</div>
									<div>Email: info@webz.com.pl</div>
									<div>Phone: +48 444 666 3333</div>
								</div>
								<div class="col-sm-6">
									<h6 class="mb-3">To:</h6>
									<div>
										<strong>Bob Mart</strong>
									</div>
									<div>Attn: Daniel Marek</div>
									<div>43-190 Mikolow, Poland</div>
									<div>Email: marek@daniel.com</div>
									<div>Phone: +48 123 456 789</div>
								</div>
							</div>
							<div class="table-responsive-sm">
								<table class="table table-striped">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Item</th>
											<th>Description</th>
											<th class="right">Unit Cost</th>
											<th class="center">Qty</th>
											<th class="right">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="center">1</td>
											<td class="left strong">Origin License</td>
											<td class="left">Extended License</td>
											<td class="right">$999,00</td>
											<td class="center">1</td>
											<td class="right">$999,00</td>
										</tr>
										<tr>
											<td class="center">2</td>
											<td class="left">Custom Services</td>
											<td class="left">Instalation and Customization (cost per hour)</td>
											<td class="right">$150,00</td>
											<td class="center">20</td>
											<td class="right">$3.000,00</td>
										</tr>
										<tr>
											<td class="center">3</td>
											<td class="left">Hosting</td>
											<td class="left">1 year subcription</td>
											<td class="right">$499,00</td>
											<td class="center">1</td>
											<td class="right">$499,00</td>
										</tr>
										<tr>
											<td class="center">4</td>
											<td class="left">Platinum Support</td>
											<td class="left">1 year subcription 24/7</td>
											<td class="right">$3.999,00</td>
											<td class="center">1</td>
											<td class="right">$3.999,00</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-lg-4 col-sm-5"></div>
								<div class="col-lg-4 col-sm-5 ml-auto">
									<table class="table table-clear">
										<tbody>
											<tr>
												<td class="left"><strong>Subtotal</strong></td>
												<td class="right">$8.497,00</td>
											</tr>
											<tr>
												<td class="left"><strong>Grand Total</strong></td>
												<td class="right"><strong>$7.477,36</strong></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
      </div>
      
      <!-- Navbar -->
        <?php include_once('includes/footer.php'); ?>
      <!-- End Navbar -->
    </div>
  </div>
  

    <?php echo $obj->jsLinks(); ?>

	  <script>
	    $(document).ready(function() {
	      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
	      demo.initChartsPages();
	    });
	  </script>

  	<script>
	  $(document).ready(function() {
	      $('#employees').DataTable( {
	          dom: 'Bfrtip',
	          buttons: [
	              'copyHtml5',
	              'excelHtml5',
	              'csvHtml5',
	              'pdfHtml5',
	              'print'
	          ]
	      } );
	  });
	</script>
</body>

</html>