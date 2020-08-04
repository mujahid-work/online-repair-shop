<?php
    include_once('AdminMethods.php');
    $obj=new AdminMethods();

    session_start();

    $_SESSION['active_tab']='Zip Codes';

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
    eStartUp | Manage Zip Codes
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    

    <?php echo $obj->cssLinks(); ?>


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
  		    <div class="col-md-5">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Add Zip Code</h5>
                <hr>
              </div>
              <div class="card-body">
                <form action="ExeFile.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                  	<div class="col-md-1"></div>
                    <div class="col-md-10">
                      <div class="form-group">
                        <label>Zip Code</label>
                        <input type="number" name="zip_field" class="form-control" placeholder="enter zip code" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="add_zip_btn" class="btn btn-success btn-round">Create Zip Code</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-7">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">All Zip Codes</h5>
                  <hr>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table" id="employees">
                        <thead style="color: #51cbce;">
                          <th class="text-center">Zip ID</th>
                          <th class="text-center">Zip Code</th>
                          <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            <?php
                              $zip_codes=$obj->getAllZipCodes();

                              if(!empty($zip_codes)){
                                $no=0;
                                foreach ($zip_codes as $zip) {
                                  $no++;
                            ?>

                                  <tr>
                                    <td class="text-center">
                                      <label><?php echo $zip['zip_id']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label><?php echo $zip['zip_code']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <a href="<?php echo 'ExeFile.php?zip_del_id='.$zip['zip_id']; ?>" title="Delete Zip Code"><i class="fa fa-trash fa-2x text-danger"></i></i></a>
                                    </td>
                                  </tr>

                                  
                            <?php
                                }
                              }
                            ?>
                        </tbody>
                      </table>
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

  <script type='text/javascript'>

    function preview_image(event) {

      var reader = new FileReader();

      reader.onload = function() {

        var output = document.getElementById('output_image');
        output.src = reader.result;
      }

      reader.readAsDataURL(event.target.files[0]);
    }
  </script>


  <script type='text/javascript'>

    function preview_image1(event) {

      var reader = new FileReader();

      reader.onload = function() {

        var output = document.getElementById('output_image1');
        output.src = reader.result;
      }

      reader.readAsDataURL(event.target.files[0]);
    }
  </script>

</body>

</html>