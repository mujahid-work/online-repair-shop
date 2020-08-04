<?php
    include_once('StoreAdminMethods.php');
    $obj=new StoreAdminMethods();

    session_start();

    $_SESSION['active_tab']='Technicians';

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
    eStartUp | Add Tech Profile
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
            <div class="col-md-12">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">Add New Profile</h5>
                </div>
                <div class="card-body">
                  <form action="ExeFile.php" method="post" enctype="multipart/form-data">
                  	<div class="row">
                    	<div class="col-md-4"></div>
	                    <div class="col-md-4">
	                        <div class="form-group">
	                          <img src="" id="output_image"  onclick="$(#file).click()" style=" height: 150px; width: 150px; border-radius: 10px;" onerror="this.src='../assets/img/logo-small.png';">
	                        </div>
	                    </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-3"></div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                         	<input type="file" name="file_field" class="form-control" id="file" accept="image/*" onchange="preview_image(event)" style="display: block; opacity: 20; position: relative;" required="true" >
	                        </div>
	                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 pr-1">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" name="email_field" placeholder="enter email address" required="true">
                        </div>
                      </div>
                      <div class="col-md-4 px-1">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" class="form-control" name="password_field" placeholder="enter password" required="true">
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Contact</label>
                          <input type="text" name="contact_field" class="form-control" placeholder="enter contact number" required="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname_field" class="form-control" placeholder="enter first name" required="true">
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname_field" class="form-control" placeholder="enter last name" required="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label>Address</label>
                          <textarea class="form-control" required="true" name="address_field" rows="5" placeholder="enter your physical address"></textarea>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Select Store</label>
                          <select class="form-control" required="true" name="store_field" style="height: 45px;">
                          	<option value="">select tech store</option>
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
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>City</label>
                          <input type="text" name="city_field" class="form-control" placeholder="enter city name" required="true">
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                          	<label>Country</label>
	                        <select name="country_field" class="form-control" required="true" style="height: 40px;">
			                    <option value="Afghanistan">Afghanistan</option>
			                    <option value="Albania">Albania</option>
			                    <option value="Algeria">Algeria</option>
			                    <option value="American Samoa">American Samoa</option>
			                    <option value="Andorra">Andorra</option>
			                    <option value="Angola">Angola</option>
			                    <option value="Anguilla">Anguilla</option>
			                    <option value="Antartica">Antarctica</option>
			                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
			                    <option value="Argentina">Argentina</option>
			                    <option value="Armenia">Armenia</option>
			                    <option value="Aruba">Aruba</option>
			                    <option value="Australia">Australia</option>
			                    <option value="Austria">Austria</option>
			                    <option value="Azerbaijan">Azerbaijan</option>
			                    <option value="Bahamas">Bahamas</option>
			                    <option value="Bahrain">Bahrain</option>
			                    <option value="Bangladesh">Bangladesh</option>
			                    <option value="Barbados">Barbados</option>
			                    <option value="Belarus">Belarus</option>
			                    <option value="Belgium">Belgium</option>
			                    <option value="Belize">Belize</option>
			                    <option value="Benin">Benin</option>
			                    <option value="Bermuda">Bermuda</option>
			                    <option value="Bhutan">Bhutan</option>
			                    <option value="Bolivia">Bolivia</option>
			                    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
			                    <option value="Botswana">Botswana</option>
			                    <option value="Bouvet Island">Bouvet Island</option>
			                    <option value="Brazil">Brazil</option>
			                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
			                    <option value="Brunei Darussalam">Brunei Darussalam</option>
			                    <option value="Bulgaria">Bulgaria</option>
			                    <option value="Burkina Faso">Burkina Faso</option>
			                    <option value="Burundi">Burundi</option>
			                    <option value="Cambodia">Cambodia</option>
			                    <option value="Cameroon">Cameroon</option>
			                    <option value="Canada">Canada</option>
			                    <option value="Cape Verde">Cape Verde</option>
			                    <option value="Cayman Islands">Cayman Islands</option>
			                    <option value="Central African Republic">Central African Republic</option>
			                    <option value="Chad">Chad</option>
			                    <option value="Chile">Chile</option>
			                    <option value="China">China</option>
			                    <option value="Christmas Island">Christmas Island</option>
			                    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
			                    <option value="Colombia">Colombia</option>
			                    <option value="Comoros">Comoros</option>
			                    <option value="Congo">Congo</option>
			                    <option value="Congo">Congo, the Democratic Republic of the</option>
			                    <option value="Cook Islands">Cook Islands</option>
			                    <option value="Costa Rica">Costa Rica</option>
			                    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
			                    <option value="Croatia">Croatia (Hrvatska)</option>
			                    <option value="Cuba">Cuba</option>
			                    <option value="Cyprus">Cyprus</option>
			                    <option value="Czech Republic">Czech Republic</option>
			                    <option value="Denmark">Denmark</option>
			                    <option value="Djibouti">Djibouti</option>
			                    <option value="Dominica">Dominica</option>
			                    <option value="Dominican Republic">Dominican Republic</option>
			                    <option value="East Timor">East Timor</option>
			                    <option value="Ecuador">Ecuador</option>
			                    <option value="Egypt">Egypt</option>
			                    <option value="El Salvador">El Salvador</option>
			                    <option value="Equatorial Guinea">Equatorial Guinea</option>
			                    <option value="Eritrea">Eritrea</option>
			                    <option value="Estonia">Estonia</option>
			                    <option value="Ethiopia">Ethiopia</option>
			                    <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
			                    <option value="Faroe Islands">Faroe Islands</option>
			                    <option value="Fiji">Fiji</option>
			                    <option value="Finland">Finland</option>
			                    <option value="France">France</option>
			                    <option value="France Metropolitan">France, Metropolitan</option>
			                    <option value="French Guiana">French Guiana</option>
			                    <option value="French Polynesia">French Polynesia</option>
			                    <option value="French Southern Territories">French Southern Territories</option>
			                    <option value="Gabon">Gabon</option>
			                    <option value="Gambia">Gambia</option>
			                    <option value="Georgia">Georgia</option>
			                    <option value="Germany">Germany</option>
			                    <option value="Ghana">Ghana</option>
			                    <option value="Gibraltar">Gibraltar</option>
			                    <option value="Greece">Greece</option>
			                    <option value="Greenland">Greenland</option>
			                    <option value="Grenada">Grenada</option>
			                    <option value="Guadeloupe">Guadeloupe</option>
			                    <option value="Guam">Guam</option>
			                    <option value="Guatemala">Guatemala</option>
			                    <option value="Guinea">Guinea</option>
			                    <option value="Guinea-Bissau">Guinea-Bissau</option>
			                    <option value="Guyana">Guyana</option>
			                    <option value="Haiti">Haiti</option>
			                    <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
			                    <option value="Holy See">Holy See (Vatican City State)</option>
			                    <option value="Honduras">Honduras</option>
			                    <option value="Hong Kong">Hong Kong</option>
			                    <option value="Hungary">Hungary</option>
			                    <option value="Iceland">Iceland</option>
			                    <option value="India">India</option>
			                    <option value="Indonesia">Indonesia</option>
			                    <option value="Iran">Iran (Islamic Republic of)</option>
			                    <option value="Iraq">Iraq</option>
			                    <option value="Ireland">Ireland</option>
			                    <option value="Israel">Israel</option>
			                    <option value="Italy">Italy</option>
			                    <option value="Jamaica">Jamaica</option>
			                    <option value="Japan">Japan</option>
			                    <option value="Jordan">Jordan</option>
			                    <option value="Kazakhstan">Kazakhstan</option>
			                    <option value="Kenya">Kenya</option>
			                    <option value="Kiribati">Kiribati</option>
			                    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
			                    <option value="Korea">Korea, Republic of</option>
			                    <option value="Kuwait">Kuwait</option>
			                    <option value="Kyrgyzstan">Kyrgyzstan</option>
			                    <option value="Lao">Lao People's Democratic Republic</option>
			                    <option value="Latvia">Latvia</option>
			                    <option value="Lebanon">Lebanon</option>
			                    <option value="Lesotho">Lesotho</option>
			                    <option value="Liberia">Liberia</option>
			                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
			                    <option value="Liechtenstein">Liechtenstein</option>
			                    <option value="Lithuania">Lithuania</option>
			                    <option value="Luxembourg">Luxembourg</option>
			                    <option value="Macau">Macau</option>
			                    <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
			                    <option value="Madagascar">Madagascar</option>
			                    <option value="Malawi">Malawi</option>
			                    <option value="Malaysia">Malaysia</option>
			                    <option value="Maldives">Maldives</option>
			                    <option value="Mali">Mali</option>
			                    <option value="Malta">Malta</option>
			                    <option value="Marshall Islands">Marshall Islands</option>
			                    <option value="Martinique">Martinique</option>
			                    <option value="Mauritania">Mauritania</option>
			                    <option value="Mauritius">Mauritius</option>
			                    <option value="Mayotte">Mayotte</option>
			                    <option value="Mexico">Mexico</option>
			                    <option value="Micronesia">Micronesia, Federated States of</option>
			                    <option value="Moldova">Moldova, Republic of</option>
			                    <option value="Monaco">Monaco</option>
			                    <option value="Mongolia">Mongolia</option>
			                    <option value="Montserrat">Montserrat</option>
			                    <option value="Morocco">Morocco</option>
			                    <option value="Mozambique">Mozambique</option>
			                    <option value="Myanmar">Myanmar</option>
			                    <option value="Namibia">Namibia</option>
			                    <option value="Nauru">Nauru</option>
			                    <option value="Nepal">Nepal</option>
			                    <option value="Netherlands">Netherlands</option>
			                    <option value="Netherlands Antilles">Netherlands Antilles</option>
			                    <option value="New Caledonia">New Caledonia</option>
			                    <option value="New Zealand">New Zealand</option>
			                    <option value="Nicaragua">Nicaragua</option>
			                    <option value="Niger">Niger</option>
			                    <option value="Nigeria">Nigeria</option>
			                    <option value="Niue">Niue</option>
			                    <option value="Norfolk Island">Norfolk Island</option>
			                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
			                    <option value="Norway">Norway</option>
			                    <option value="Oman">Oman</option>
			                    <option value="Pakistan" selected>Pakistan</option>
			                    <option value="Palau">Palau</option>
			                    <option value="Panama">Panama</option>
			                    <option value="Papua New Guinea">Papua New Guinea</option>
			                    <option value="Paraguay">Paraguay</option>
			                    <option value="Peru">Peru</option>
			                    <option value="Philippines">Philippines</option>
			                    <option value="Pitcairn">Pitcairn</option>
			                    <option value="Poland">Poland</option>
			                    <option value="Portugal">Portugal</option>
			                    <option value="Puerto Rico">Puerto Rico</option>
			                    <option value="Qatar">Qatar</option>
			                    <option value="Reunion">Reunion</option>
			                    <option value="Romania">Romania</option>
			                    <option value="Russia">Russian Federation</option>
			                    <option value="Rwanda">Rwanda</option>
			                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
			                    <option value="Saint LUCIA">Saint LUCIA</option>
			                    <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
			                    <option value="Samoa">Samoa</option>
			                    <option value="San Marino">San Marino</option>
			                    <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
			                    <option value="Saudi Arabia">Saudi Arabia</option>
			                    <option value="Senegal">Senegal</option>
			                    <option value="Seychelles">Seychelles</option>
			                    <option value="Sierra">Sierra Leone</option>
			                    <option value="Singapore">Singapore</option>
			                    <option value="Slovakia">Slovakia (Slovak Republic)</option>
			                    <option value="Slovenia">Slovenia</option>
			                    <option value="Solomon Islands">Solomon Islands</option>
			                    <option value="Somalia">Somalia</option>
			                    <option value="South Africa">South Africa</option>
			                    <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
			                    <option value="Span">Spain</option>
			                    <option value="SriLanka">Sri Lanka</option>
			                    <option value="St. Helena">St. Helena</option>
			                    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
			                    <option value="Sudan">Sudan</option>
			                    <option value="Suriname">Suriname</option>
			                    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
			                    <option value="Swaziland">Swaziland</option>
			                    <option value="Sweden">Sweden</option>
			                    <option value="Switzerland">Switzerland</option>
			                    <option value="Syria">Syrian Arab Republic</option>
			                    <option value="Taiwan">Taiwan, Province of China</option>
			                    <option value="Tajikistan">Tajikistan</option>
			                    <option value="Tanzania">Tanzania, United Republic of</option>
			                    <option value="Thailand">Thailand</option>
			                    <option value="Togo">Togo</option>
			                    <option value="Tokelau">Tokelau</option>
			                    <option value="Tonga">Tonga</option>
			                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
			                    <option value="Tunisia">Tunisia</option>
			                    <option value="Turkey">Turkey</option>
			                    <option value="Turkmenistan">Turkmenistan</option>
			                    <option value="Turks and Caicos">Turks and Caicos Islands</option>
			                    <option value="Tuvalu">Tuvalu</option>
			                    <option value="Uganda">Uganda</option>
			                    <option value="Ukraine">Ukraine</option>
			                    <option value="United Arab Emirates">United Arab Emirates</option>
			                    <option value="United Kingdom">United Kingdom</option>
			                    <option value="United States">United States</option>
			                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
			                    <option value="Uruguay">Uruguay</option>
			                    <option value="Uzbekistan">Uzbekistan</option>
			                    <option value="Vanuatu">Vanuatu</option>
			                    <option value="Venezuela">Venezuela</option>
			                    <option value="Vietnam">Viet Nam</option>
			                    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
			                    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
			                    <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
			                    <option value="Western Sahara">Western Sahara</option>
			                    <option value="Yemen">Yemen</option>
			                    <option value="Yugoslavia">Yugoslavia</option>
			                    <option value="Zambia">Zambia</option>
			                    <option value="Zimbabwe">Zimbabwe</option>
			                </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Assign Zip codes</label>
                            <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
                              <?php
                                $zip_codes=$obj->getAllZipCodes();

                                if(!empty($zip_codes)){
                                  foreach ($zip_codes as $zip) {
                              ?>
                                    <div>
                                      <label class="form-control">
                                        <input type="checkbox" name="zip_codes[]" value="<?php echo $zip['zip_id']; ?>" />
                                        <strong class="ml-3"><?php echo $zip['zip_code']; ?></strong>
                                      </label>
                                    </div>
                              <?php
                                  }
                                }
                              ?>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                            <label>Assign Services</label>
                            <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
                            <?php
                              $models=$obj->getAllActiveModels();

                              if(!empty($models)){
                                foreach ($models as $model) {
                            ?>
                                  <div>
                                    <label class="form-control">
                                      <input type="checkbox" name="models[]" value="<?php echo $model['model_id']; ?>" />
                                      <strong class="ml-3"><?php echo $model['model_title']; ?></strong>
                                    </label>
                                  </div>
                            <?php
                                }
                              }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <textarea class="form-control" rows="5" name="about_field"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Would you pass a background check? </label>
                          <select class="form-control" style="height: 50px;" name="background_field">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                          <label>Are you over the age of 18?</label>
                          <select class="form-control" style="height: 50px;" name="age_field">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Describe your experience with appliance repairs</label>
                          <select class="form-control" style="height: 50px;" name="experience_field">
                            <option value="">Please Select</option>
                            <option value="I dont have any experience">
                              Idon't have any experience
                            </option>
                            <option value="I have done a few repairs">
                              I have done a few repairs
                            </option>
                            <option value="I have a professional experience">
                              I have a professional experience
                            </option>
                            <option value="I am a Master Tech">I am a Master Tech</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-success btn-round" name="add_tech_btn">Update Profile</button>
                      </div>
                    </div>
                  </form>
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