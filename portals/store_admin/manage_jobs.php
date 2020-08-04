<?php
    include_once('StoreAdminMethods.php');
    $obj=new StoreAdminMethods();

    session_start();

    $_SESSION['active_tab']='Jobs';

    if(!isset($_SESSION['logged_in_id']) || $_SESSION['logged_in_id']=="" || $_SESSION['role'] != 'Store Admin'){
      header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    eStartUp | Manage Jobs
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
  		    <div class="col-md-6">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Add New Job</h5>
                <hr>
              </div>
              <div class="card-body">
                <form action="ExeFile.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Job Title</label>
                        <input type="text" name="title_field" class="form-control" placeholder="enter job title" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Select Store</label>
                      <select class="form-control" required="true" name="store_field" style="height: 45px;">
                          <option value="">select store</option>
                          <?php
                            $stores=$obj->getMyStores();

                            if(!empty($stores)){
                              foreach ($stores as $store) {
                          ?>
                                <option value="<?php echo $store['store_id']; ?>">
                                  <?php echo $store['store_title']; ?>
                                </option>
                          <?php
                              }
                            }
                          ?>
                      </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Company</label>
                        <textarea class="form-control" rows="3" placeholder="enter about company" name="about_field"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city_field" class="form-control" placeholder="enter city" required="true" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>State</label>
                        <input type="text" name="state_field" class="form-control" placeholder="enter state" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Job Requirments</label>
                        <textarea class="form-control" rows="8" placeholder="- Job Requirement 1
- Job Requirement 2
      .
      .
      .
      .
-Job Requirement N" name="requirments_field" required="true"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Key Benefits</label>
                        <textarea class="form-control" rows="8" placeholder="- Key Benefit 1
- Key Benefit 2
      .
      .
      .
      .
-Key Benefit N" name="benefit_field"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Additional Details</label>
                        <textarea class="form-control" rows="8" placeholder="enter additional job details" name="additional_field"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="add_job_btn" class="btn btn-success btn-round">Add Job</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">All Parts</h5>
                  <hr>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <table class="table" id="employees">
                        <thead style="color: #51cbce;">
                          <th class="text-center">ID</th>
                          <th class="text-center">Job Title</th>
                          <th class="text-center">Store Name</th>
                          <th class="text-center">Posted On</th>
                          <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            <?php
                              $jobs=$obj->getAllJobs();

                              if(!empty($jobs)){
                                $no=0;
                                foreach ($jobs as $job) {
                                  $no++;
                            ?>

                                  <tr>
                                    <td class="text-center">
                                      <label><?php echo $job['job_id']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label><?php echo $job['job_title']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label><?php echo $job['store_title']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label><?php echo $job['posted_on']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <a  data-toggle="modal" data-target="<?php echo '#exampleModalCenter'.$job['job_id']; ?>" href="#" title="Edit Job"><i class="fa fa-edit fa-2x text-info"></i></i></a>
                                      <a href="<?php echo 'ExeFile.php?job_del_id='.$job['job_id']; ?>"title="Delete Job"><i class="fa fa-trash fa-2x text-danger"></i></i></a>
                                    </td>
                                  </tr>

                                  <!-- Modal -->
                                  <div class="modal fade" id="<?php echo 'exampleModalCenter'.$job['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Update Job</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style='overflow-y: scroll; height: 550px;'>
                                            <?php
                                              $job_data=$obj->getSingleJob($job['job_id']);
                                            ?>
                                            <form action="ExeFile.php" method="post" enctype="multipart/form-data">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>Job Title</label>
                                                    <input type="text" name="title_field" class="form-control" placeholder="enter part title" required="true" value="<?php echo $job_data['job_title']; ?>" >
                                                    <input type="hidden" name="id_field" value="<?php echo $job_data['job_id']; ?>">
                                                  </div>
                                                </div>
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>Select Store</label>
                                                    <select class="form-control" required="true" name="store_field" style="height: 45px;">
                                                        <option value="">select store</option>
                                                        <?php
                                                          $stores=$obj->getMyStores();

                                                          if(!empty($stores)){
                                                            foreach ($stores as $store) {
                                                        ?>
                                                              <option value="<?php echo $store['store_id']; ?>" <?php if(in_array($store['store_id'], $job_data)){echo 'selected';} ?>>
                                                                <?php echo $store['store_title']; ?>
                                                              </option>
                                                        <?php
                                                            }
                                                          }
                                                        ?>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>About Company</label>
                                                    <textarea class="form-control" rows="3" placeholder="enter about company" name="about_field"><?php echo $job_data['about_company'] ?></textarea>
                                                  </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="city_field" class="form-control" placeholder="enter city" required="true" value="<?php echo $job_data['job_city']; ?>">
                                                  </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" name="state_field" class="form-control" placeholder="enter state" required="true"  value="<?php echo $job_data['job_state']; ?>">
                                                  </div>
                                                </div>
                                                <div class="col-md-12">
                      <div class="form-group">
                        <label>Job Requirments</label>
                        <textarea class="form-control" rows="8" placeholder="- Job Requirement 1
- Job Requirement 2
      .
      .
      .
      .
-Job Requirement N" name="requirments_field" required="true"><?php echo $job_data['job_requirements']; ?></textarea>
                      </div>
                    </div>
                                              <div class="col-md-12">
                      <div class="form-group">
                        <label>Key Benefits</label>
                        <textarea class="form-control" rows="8" placeholder="- Key Benefit 1
- Key Benefit 2
      .
      .
      .
      .
-Key Benefit N" name="benefit_field"><?php echo $job_data['job_key_benefits']; ?></textarea>
                      </div>
                    </div>
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Additional Details</label>
                                                  <textarea class="form-control" rows="8" placeholder="enter additional job details" name="additional_field"><?php echo $job_data['job_additional_description']; ?></textarea>
                                                </div>
                                              </div>
                                              </div>
                                              <div class="row">
                                                <div class="update ml-auto mr-auto">
                                                  <button type="submit" name="update_job_btn" class="btn btn-success btn-round">Update Job</button>
                                                </div>
                                              </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
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