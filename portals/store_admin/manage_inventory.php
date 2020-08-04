<?php
    include_once('StoreAdminMethods.php');
    $obj=new StoreAdminMethods();

    session_start();

    $_SESSION['active_tab']='Inventory';

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
    eStartUp | Manage Inventory
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
                <h5 class="card-title">Add New Part</h5>
                <hr>
              </div>
              <div class="card-body">
                <form action="ExeFile.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-lg-3"></div>
                      <div class="col-lg-6">
                          <img src="" id="output_image"  onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='../assets/img/camera.png';">                            
                      </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="form-group">
                          <input type="file" name="file_field" class="form-control" id="file" accept="image/*" onchange="preview_image(event)" style="display: block; opacity: 20; position: relative;" required="true" >
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Part Title</label>
                        <input type="text" name="title_field" class="form-control" placeholder="enter part title" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Unit Price</label>
                        <input type="text" name="price_field" class="form-control" placeholder="enter part unit price" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Part Qty</label>
                        <input type="text" name="qty_field" class="form-control" placeholder="enter part quantity" required="true" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Minimum Qty</label>
                        <input type="text" name="min_qty_field" class="form-control" placeholder="enter part minimum quantity" required="true" >
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
                        <label>Part Description</label>
                        <textarea class="form-control" rows="3" placeholder="enter part description" name="description_field"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="add_part_btn" class="btn btn-success btn-round">Add Part to Inventory</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-7">
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
                          <th class="text-center">Part Title</th>
                          <th class="text-center">Unit Cost</th>
                          <th class="text-center">Qty</th>
                          <th class="text-center">Min. Qty</th>
                          <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            <?php
                              $parts=$obj->getAllParts();

                              if(!empty($parts)){
                                $no=0;
                                foreach ($parts as $part) {
                                  $no++;
                            ?>

                                  <tr>
                                    <td class="text-center">
                                      <label><?php echo $part['part_id']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label><?php echo $part['part_title']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label>$<?php echo $part['unit_cost']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label><?php echo $part['qty']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <label><?php echo $part['min_qty']; ?></label>
                                    </td>
                                    <td class="text-center">
                                      <a  data-toggle="modal" data-target="<?php echo '#exampleModalCenter'.$part['part_id']; ?>" href="#" title="Edit Part"><i class="fa fa-edit fa-2x text-info"></i></i></a>
                                    </td>
                                  </tr>

                                  <!-- Modal -->
                                  <div class="modal fade" id="<?php echo 'exampleModalCenter'.$part['part_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Update Part</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style='overflow-y: scroll; height: 550px;'>
                                            <?php
                                              $part_data=$obj->getSinglePart($part['part_id']);
                                            ?>
                                            <form action="ExeFile.php" method="post" enctype="multipart/form-data">
                                              <div class="row">
                                                  <div class="col-lg-3"></div>
                                                  <div class="col-lg-6">
                                                      <img src="<?php echo '../../uploads/'.$part_data['part_pic'];?>" id="output_image1"  onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='../assets/img/camera.png';">
                                                    </div>
                                              </div>
                                              <br>
                                              <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                      <input type="file" name="file_field" class="form-control" id="file" accept="image/*" onchange="preview_image1(event)" style="display: block; opacity: 20; position: relative;">
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>Part Title</label>
                                                    <input type="text" name="title_field" class="form-control" placeholder="enter part title" required="true" value="<?php echo $part_data['part_title']; ?>" >
                                                    <input type="hidden" name="id_field" value="<?php echo $part_data['part_id']; ?>">
                                                  </div>
                                                </div>
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>Unit Price</label>
                                                    <input type="text" name="price_field" class="form-control" placeholder="enter part unit cost" required="true" value="<?php echo $part_data['unit_cost']; ?>" >
                                                  </div>
                                                </div>
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>Qty</label>
                                                    <input type="text" name="qty_field" class="form-control" placeholder="enter part quantity" required="true" value="<?php echo $part_data['qty']; ?>" >
                                                  </div>
                                                </div>
                                                <div class="col-md-12">
                                                  <div class="form-group">
                                                    <label>Minimum Qty</label>
                                                    <input type="text" name="min_qty_field" class="form-control" placeholder="enter part minimum quantity" required="true" value="<?php echo $part_data['min_qty']; ?>" >
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
								                      				<option value="<?php echo $store['store_id']; ?>" <?php if(in_array($store['store_id'], $part_data)){echo 'selected';} ?>>
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
							                        <label>Part Description</label>
							                        <textarea class="form-control" rows="3" placeholder="enter part description" name="description_field"><?php echo $part_data['part_description']; ?></textarea>
							                      </div>
							                    </div>
                                              </div>
                                              <div class="row">
                                                <div class="update ml-auto mr-auto">
                                                  <button type="submit" name="update_part_btn" class="btn btn-success btn-round">Update Part in Inventory</button>
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