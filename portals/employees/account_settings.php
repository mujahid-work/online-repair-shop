<?php
    include_once('EmployeeMethods.php');
    $obj=new EmployeeMethods();

    session_start();

    $_SESSION['active_tab']='Account Settings';

    if(!isset($_SESSION['logged_in_id']) || $_SESSION['logged_in_id']=="" || $_SESSION['role'] != 'Tech'){
      header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    eStartUp | My Profile
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
        <form action="ExeFile.php" method="post" enctype="multipart/form-data">
	        <div class="row">
	            <?php

	                $profile_data=$obj->getSingleTechnician();
	            ?>
	            
	            <div class="col-md-4">
		            <div class="card card-user">
		                <div class="image">
		                  <img src="../assets/img/damir-bosnjak.jpg" alt="...">
		                </div>
		                <div class="card-body">
		                  <div class="author">
		                    <a href="#">
		                      <img id="output_image"  onclick="$(#file).click()" class="avatar border-gray" src="<?php echo '../../uploads/'.$profile_data['tech_pic'] ?>"  onerror="this.src='../assets/img/logo-small.png';">
		                    </a>
		                    
		                      <input type="file" name="file_field" class="form-control" id="file" accept="image/*" onchange="preview_image(event)" style="display: block; opacity: 20; position: relative;" >
		                    
		                    <br>
		                    <h5 class="title"><?php echo $profile_data['first_name'].' '.$profile_data['last_name']; ?></h5>
		                    <p class="description">
		                      <?php echo $profile_data['email']; ?>
		                    </p>
		                  </div>
		                  <p class="description text-center">
		                    <?php echo $profile_data['about_me']; ?>
		                  </p>
		                </div>
		                <div class="card-footer">
		                  <hr>
		                  <!-- <div class="button-container">
		                    <div class="row">
		                      <div class="col-lg-3 col-md-6 col-6 ml-auto">
		                        <h5>12
		                          <br>
		                          <small>Files</small>
		                        </h5>
		                      </div>
		                      <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
		                        <h5>2GB
		                          <br>
		                          <small>Used</small>
		                        </h5>
		                      </div>
		                      <div class="col-lg-3 mr-auto">
		                        <h5>24,6$
		                          <br>
		                          <small>Spent</small>
		                        </h5>
		                      </div>
		                    </div>
		                  </div> -->
		                </div>
		            </div>
	            </div>
	            <div class="col-md-8">
		            <div class="card card-user">
		                <div class="card-header">
		                	<div class="row">
			                	<div class="col-md-8">
			                		<h5 class="card-title">Edit Profile</h5>
			                	</div>
			                	<div class="col-md-3">
			                		<a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Change Password</a>
			                	</div>
			                </div>	                  
		                </div>
		                <div class="card-body">
		                    <div class="row">
		                      <div class="col-md-6 pr-1">
		                        <div class="form-group">
		                          <label>First Name</label>
		                          <input type="text" name="fname_field" class="form-control" placeholder="enter first name" value="<?php echo $profile_data['first_name']; ?>" required="true">
		                        </div>
		                      </div>
		                      <div class="col-md-6 pl-1">
		                        <div class="form-group">
		                          <label>Last Name</label>
		                          <input type="text" name="lname_field" class="form-control" placeholder="enter last name" value="<?php echo $profile_data['last_name']; ?>" required="true">
		                        </div>
		                      </div>
		                    </div>
		                    <div class="row">
		                      <div class="col-md-6 pr-1">
		                        <div class="form-group">
		                          <label for="exampleInputEmail1">Email address</label>
		                          <input type="email" class="form-control" name="email_field" placeholder="enter email address" value="<?php echo $profile_data['email']; ?>" required="true">
		                        </div>
		                      </div>
		                      <div class="col-md-6 pl-1">
		                        <div class="form-group">
		                          <label for="exampleInputEmail1">Contact</label>
		                          <input type="text" name="contact_field" class="form-control" placeholder="enter contact number" value="<?php echo $profile_data['contact_number']; ?>" required="true">
		                        </div>
		                      </div>
		                    </div>
		                    <div class="row">
		                      <div class="col-md-12">
		                        <div class="form-group">
		                          <label>Address</label>
		                          <textarea class="form-control" required="true" name="address_field" rows="5" placeholder="enter your physical address"><?php echo $profile_data['address']; ?></textarea>
		                        </div>
		                      </div>
		                    </div>
		                    <div class="row">
		                      <div class="col-md-6 pr-1">
		                        <div class="form-group">
		                          <label>City</label>
		                          <input type="text" name="city_field" class="form-control" placeholder="enter city name" value="<?php echo $profile_data['city']; ?>" required="true">
		                        </div>
		                      </div>
		                      <div class="col-md-6 pl-1">
		                        <div class="form-group">
		                          <label>Country</label>
		                          <select class="form-control" name="country_field" style="height: 47px;" required="true">
		                            <option value="Afghanistan" <?php if($profile_data['country']=='Afghanistan'){echo 'selected=selected';} ?>>Afghanistan</option>
		                            <option value="Albania" <?php if($profile_data['country']=='Albania'){echo 'selected=selected';} ?>>Albania</option>
		                            <option value="Algeria" <?php if($profile_data['country']=='Algeria'){echo 'selected=selected';} ?>>Algeria</option>
		                            <option value="American Samoa" <?php if($profile_data['country']=='American Samoa'){echo 'selected=selected';} ?>>American Samoa</option>
		                            <option value="Andorra" <?php if($profile_data['country']=='Andorra'){echo 'selected=selected';} ?>>Andorra</option>
		                            <option value="Angola" <?php if($profile_data['country']=='Angola'){echo 'selected=selected';} ?>>Angola</option>
		                            <option value="Anguilla" <?php if($profile_data['country']=='Anguilla'){echo 'selected=selected';} ?>>Anguilla</option>
		                            <option value="Antarctica" <?php if($profile_data['country']=='Antarctica'){echo 'selected=selected';} ?>>Antarctica</option>
		                            <option value="Antigua and Barbuda" <?php if($profile_data['country']=='Antigua and Barbuda'){echo 'selected=selected';} ?>>Antigua and Barbuda</option>
		                            <option value="Argentina" <?php if($profile_data['country']=='Argentina'){echo 'selected=selected';} ?>>Argentina</option>
		                            <option value="Armenia" <?php if($profile_data['country']=='Armenia'){echo 'selected=selected';} ?>>Armenia</option>
		                            <option value="Aruba" <?php if($profile_data['country']=='Aruba'){echo 'selected=selected';} ?>>Aruba</option>
		                            <option value="Australia" <?php if($profile_data['country']=='Australia'){echo 'selected=selected';} ?>>Australia</option>
		                            <option value="Austria" <?php if($profile_data['country']=='Austria'){echo 'selected=selected';} ?>>Austria</option>
		                            <option value="Azerbaijan" <?php if($profile_data['country']=='Azerbaijan'){echo 'selected=selected';} ?>>Azerbaijan</option>
		                            <option value="Bahamas" <?php if($profile_data['country']=='Bahamas'){echo 'selected=selected';} ?>>Bahamas</option>
		                            <option value="Bahrain" <?php if($profile_data['country']=='Bahrain'){echo 'selected=selected';} ?>>Bahrain</option>
		                            <option value="Bangladesh" <?php if($profile_data['country']=='Bangladesh'){echo 'selected=selected';} ?>>Bangladesh</option>
		                            <option value="Barbados" <?php if($profile_data['country']=='Barbados'){echo 'selected=selected';} ?>>Barbados</option>
		                            <option value="Belarus" <?php if($profile_data['country']=='Belarus'){echo 'selected=selected';} ?>>Belarus</option>
		                            <option value="Belgium" <?php if($profile_data['country']=='Belgium'){echo 'selected=selected';} ?>>Belgium</option>
		                            <option value="Belize" <?php if($profile_data['country']=='Belize'){echo 'selected=selected';} ?>>Belize</option>
		                            <option value="Benin" <?php if($profile_data['country']=='Benin'){echo 'selected=selected';} ?>>Benin</option>
		                            <option value="Bermuda" <?php if($profile_data['country']=='Bermuda'){echo 'selected=selected';} ?>>Bermuda</option>
		                            <option value="Bhutan" <?php if($profile_data['country']=='Bhutan'){echo 'selected=selected';} ?>>Bhutan</option>
		                            <option value="Bolivia" <?php if($profile_data['country']=='Bolivia'){echo 'selected=selected';} ?>>Bolivia</option>
		                            <option value="Bosnia and Herzegowina" <?php if($profile_data['country']=='Bosnia and Herzegowina'){echo 'selected=selected';} ?>>Bosnia and Herzegowina</option>
		                            <option value="Botswana" <?php if($profile_data['country']=='Botswana'){echo 'selected=selected';} ?>>Botswana</option>
		                            <option value="Bouvet Island" <?php if($profile_data['country']=='Bouvet Island'){echo 'selected=selected';} ?>>Bouvet Island</option>
		                            <option value="Brazil" <?php if($profile_data['country']=='Brazil'){echo 'selected=selected';} ?>>Brazil</option>
		                            <option value="British Indian Ocean Territory" <?php if($profile_data['country']=='British Indian Ocean Territory'){echo 'selected=selected';} ?>>British Indian Ocean Territory</option>
		                            <option value="Brunei Darussalam" <?php if($profile_data['country']=='Brunei Darussalam'){echo 'selected=selected';} ?>>Brunei Darussalam</option>
		                            <option value="Bulgaria" <?php if($profile_data['country']=='Bulgaria'){echo 'selected=selected';} ?>>Bulgaria</option>
		                            <option value="Burkina Faso" <?php if($profile_data['country']=='Burkina Faso'){echo 'selected=selected';} ?>>Burkina Faso</option>
		                            <option value="Burundi" <?php if($profile_data['country']=='Burundi'){echo 'selected=selected';} ?>>Burundi</option>
		                            <option value="Cambodia" <?php if($profile_data['country']=='Cambodia'){echo 'selected=selected';} ?>>Cambodia</option>
		                            <option value="Cameroon" <?php if($profile_data['country']=='Cameroon'){echo 'selected=selected';} ?>>Cameroon</option>
		                            <option value="Canada" <?php if($profile_data['country']=='Canada'){echo 'selected=selected';} ?>>Canada</option>
		                            <option value="Cape Verde" <?php if($profile_data['country']=='Cape Verde'){echo 'selected=selected';} ?>>Cape Verde</option>
		                            <option value="Cayman Islands" <?php if($profile_data['country']=='Cayman Islands'){echo 'selected=selected';} ?>>Cayman Islands</option>
		                            <option value="Central African Republic" <?php if($profile_data['country']=='Central African Republic'){echo 'selected=selected';} ?>>Central African Republic</option>
		                            <option value="Chad" <?php if($profile_data['country']=='Chad'){echo 'selected=selected';} ?>>Chad</option>
		                            <option value="Chile" <?php if($profile_data['country']=='Chile'){echo 'selected=selected';} ?>>Chile</option>
		                            <option value="China" <?php if($profile_data['country']=='China'){echo 'selected=selected';} ?>>China</option>
		                            <option value="Christmas Island" <?php if($profile_data['country']=='Christmas Island'){echo 'selected=selected';} ?>>Christmas Island</option>
		                            <option value="Cocos Islands" <?php if($profile_data['country']=='Cocos Islands'){echo 'selected=selected';} ?>>Cocos (Keeling) Islands</option>
		                            <option value="Colombia" <?php if($profile_data['country']=='Colombia'){echo 'selected=selected';} ?>>Colombia</option>
		                            <option value="Comoros" <?php if($profile_data['country']=='Comoros'){echo 'selected=selected';} ?>>Comoros</option>
		                            <option value="Congo" <?php if($profile_data['country']=='Congo'){echo 'selected=selected';} ?>>Congo</option>
		                            <option value="Cook Islands" <?php if($profile_data['country']=='Cook Islands'){echo 'selected=selected';} ?>>Cook Islands</option>
		                            <option value="Costa Rica" <?php if($profile_data['country']=='Costa Rica'){echo 'selected=selected';} ?>>Costa Rica</option>
		                            <option value="Cota D-Ivoire" <?php if($profile_data['country']=='Cota D-Ivoire'){echo 'selected=selected';} ?>>Cote d-Ivoire</option>
		                            <option value="Croatia" <?php if($profile_data['country']=='Croatia'){echo 'selected=selected';} ?>>Croatia (Hrvatska)</option>
		                            <option value="Cuba" <?php if($profile_data['country']=='Cuba'){echo 'selected=selected';} ?>>Cuba</option>
		                            <option value="Cyprus" <?php if($profile_data['country']=='Cyprus'){echo 'selected=selected';} ?>>Cyprus</option>
		                            <option value="Czech Republic" <?php if($profile_data['country']=='Czech Republic'){echo 'selected=selected';} ?>>Czech Republic</option>
		                            <option value="Denmark" <?php if($profile_data['country']=='Denmark'){echo 'selected=selected';} ?>>Denmark</option>
		                            <option value="Djibouti" <?php if($profile_data['country']=='Djibouti'){echo 'selected=selected';} ?>>Djibouti</option>
		                            <option value="Dominica" <?php if($profile_data['country']=='Dominica'){echo 'selected=selected';} ?>>Dominica</option>
		                            <option value="Dominican Republic" <?php if($profile_data['country']=='Dominican Republic'){echo 'selected=selected';} ?>>Dominican Republic</option>
		                            <option value="East Timor" <?php if($profile_data['country']=='East Timor'){echo 'selected=selected';} ?>>East Timor</option>
		                            <option value="Ecuador" <?php if($profile_data['country']=='Ecuador'){echo 'selected=selected';} ?>>Ecuador</option>
		                            <option value="Egypt" <?php if($profile_data['country']=='Egypt'){echo 'selected=selected';} ?>>Egypt</option>
		                            <option value="El Salvador" <?php if($profile_data['country']=='El Salvador'){echo 'selected=selected';} ?>>El Salvador</option>
		                            <option value="Equatorial Guinea" <?php if($profile_data['country']=='Equatorial Guinea'){echo 'selected=selected';} ?>>Equatorial Guinea</option>
		                            <option value="Eritrea" <?php if($profile_data['country']=='Eritrea'){echo 'selected=selected';} ?>>Eritrea</option>
		                            <option value="Estonia" <?php if($profile_data['country']=='Estonia'){echo 'selected=selected';} ?>>Estonia</option>
		                            <option value="Ethiopia" <?php if($profile_data['country']=='Ethiopia'){echo 'selected=selected';} ?>>Ethiopia</option>
		                            <option value="Falkland Islands" <?php if($profile_data['country']=='Falkland Islands'){echo 'selected=selected';} ?>>Falkland Islands (Malvinas)</option>
		                            <option value="Faroe Islands" <?php if($profile_data['country']=='Faroe Islands'){echo 'selected=selected';} ?>>Faroe Islands</option>
		                            <option value="Fiji" <?php if($profile_data['country']=='Fiji'){echo 'selected=selected';} ?>>Fiji</option>
		                            <option value="Finland" <?php if($profile_data['country']=='Finland'){echo 'selected=selected';} ?>>Finland</option>
		                            <option value="France" <?php if($profile_data['country']=='France'){echo 'selected=selected';} ?>>France</option>
		                            <option value="France Metropolitan" <?php if($profile_data['country']=='France Metropolitan'){echo 'selected=selected';} ?>>France, Metropolitan</option>
		                            <option value="French Guiana" <?php if($profile_data['country']=='French Guiana'){echo 'selected=selected';} ?>>French Guiana</option>
		                            <option value="French Polynesia" <?php if($profile_data['country']=='French Polynesia'){echo 'selected=selected';} ?>>French Polynesia</option>
		                            <option value="French Southern Territories" <?php if($profile_data['country']=='French Southern Territories'){echo 'selected=selected';} ?>>French Southern Territories</option>
		                            <option value="Gabon" <?php if($profile_data['country']=='Gabon'){echo 'selected=selected';} ?>>Gabon</option>
		                            <option value="Gambia" <?php if($profile_data['country']=='Gambia'){echo 'selected=selected';} ?>>Gambia</option>
		                            <option value="Georgia" <?php if($profile_data['country']=='Georgia'){echo 'selected=selected';} ?>>Georgia</option>
		                            <option value="Germany" <?php if($profile_data['country']=='Germany'){echo 'selected=selected';} ?>>Germany</option>
		                            <option value="Ghana" <?php if($profile_data['country']=='Ghana'){echo 'selected=selected';} ?>>Ghana</option>
		                            <option value="Gibraltar" <?php if($profile_data['country']=='Gibraltar'){echo 'selected=selected';} ?>>Gibraltar</option>
		                            <option value="Greece" <?php if($profile_data['country']=='Greece'){echo 'selected=selected';} ?>>Greece</option>
		                            <option value="Greenland" <?php if($profile_data['country']=='Greenland'){echo 'selected=selected';} ?>>Greenland</option>
		                            <option value="Grenada" <?php if($profile_data['country']=='Grenada'){echo 'selected=selected';} ?>>Grenada</option>
		                            <option value="Guadeloupe" <?php if($profile_data['country']=='Guadeloupe'){echo 'selected=selected';} ?>>Guadeloupe</option>
		                            <option value="Guam" <?php if($profile_data['country']=='Guam'){echo 'selected=selected';} ?>>Guam</option>
		                            <option value="Guatemala" <?php if($profile_data['country']=='Guatemala'){echo 'selected=selected';} ?>>Guatemala</option>
		                            <option value="Guinea" <?php if($profile_data['country']=='Guinea'){echo 'selected=selected';} ?>>Guinea</option>
		                            <option value="Guinea-Bissau" <?php if($profile_data['country']=='Guinea-Bissau'){echo 'selected=selected';} ?>>Guinea-Bissau</option>
		                            <option value="Guyana" <?php if($profile_data['country']=='Guyana'){echo 'selected=selected';} ?>>Guyana</option>
		                            <option value="Haiti" <?php if($profile_data['country']=='Haiti'){echo 'selected=selected';} ?>>Haiti</option>
		                            <option value="Heard and McDonald Islands" <?php if($profile_data['country']=='Heard and McDonald Islands'){echo 'selected=selected';} ?>>Heard and Mc Donald Islands</option>
		                            <option value="Honduras" <?php if($profile_data['country']=='Honduras'){echo 'selected=selected';} ?>>Honduras</option>
		                            <option value="Hong Kong" <?php if($profile_data['country']=='Hong Kong'){echo 'selected=selected';} ?>>Hong Kong</option>
		                            <option value="Hungary" <?php if($profile_data['country']=='Hungary'){echo 'selected=selected';} ?>>Hungary</option>
		                            <option value="Iceland" <?php if($profile_data['country']=='Iceland'){echo 'selected=selected';} ?>>Iceland</option>
		                            <option value="India" <?php if($profile_data['country']=='India'){echo 'selected=selected';} ?>>India</option>
		                            <option value="Indonesia" <?php if($profile_data['country']=='Indonesia'){echo 'selected=selected';} ?>>Indonesia</option>
		                            <option value="Iran" <?php if($profile_data['country']=='Iran'){echo 'selected=selected';} ?>>Iran</option>
		                            <option value="Iraq" <?php if($profile_data['country']=='Iraq'){echo 'selected=selected';} ?>>Iraq</option>
		                            <option value="Ireland" <?php if($profile_data['country']=='Ireland'){echo 'selected=selected';} ?>>Ireland</option>
		                            <option value="Israel" <?php if($profile_data['country']=='Israel'){echo 'selected=selected';} ?>>Israel</option>
		                            <option value="Italy" <?php if($profile_data['country']=='Italy'){echo 'selected=selected';} ?>>Italy</option>
		                            <option value="Jamaica" <?php if($profile_data['country']=='Jamaica'){echo 'selected=selected';} ?>>Jamaica</option>
		                            <option value="Japan" <?php if($profile_data['country']=='Japan'){echo 'selected=selected';} ?>>Japan</option>
		                            <option value="Jordan" <?php if($profile_data['country']=='Jordan'){echo 'selected=selected';} ?>>Jordan</option>
		                            <option value="Kazakhstan" <?php if($profile_data['country']=='Kazakhstan'){echo 'selected=selected';} ?>>Kazakhstan</option>
		                            <option value="Kenya" <?php if($profile_data['country']=='Kenya'){echo 'selected=selected';} ?>>Kenya</option>
		                            <option value="Kiribati" <?php if($profile_data['country']=='Kiribati'){echo 'selected=selected';} ?>>Kiribati</option>
		                            <option value="Korea" <?php if($profile_data['country']=='Korea'){echo 'selected=selected';} ?>>Korea</option>
		                            <option value="Kuwait" <?php if($profile_data['country']=='Kuwait'){echo 'selected=selected';} ?>>Kuwait</option>
		                            <option value="Kyrgyzstan" <?php if($profile_data['country']=='Kyrgyzstan'){echo 'selected=selected';} ?>>Kyrgyzstan</option>
		                            <option value="Lao People Democratic Republic" <?php if($profile_data['country']=='Lao People Democratic Republic'){echo 'selected=selected';} ?>>Lao People Democratic Republic</option>
		                            <option value="Latvia" <?php if($profile_data['country']=='Latvia'){echo 'selected=selected';} ?>>Latvia</option>
		                            <option value="Lebanon"  <?php if($profile_data['country']=='Lebanon'){echo 'selected=selected';} ?>>Lebanon</option>
		                            <option value="Lesotho" <?php if($profile_data['country']=='Lesotho'){echo 'selected=selected';} ?>>Lesotho</option>
		                            <option value="Liberia" <?php if($profile_data['country']=='Liberia'){echo 'selected=selected';} ?>>Liberia</option>
		                            <option value="Libyan Arab Jamahiriya" <?php if($profile_data['country']=='Libyan Arab Jamahiriya'){echo 'selected=selected';} ?>>Libyan Arab Jamahiriya</option>
		                            <option value="Liechtenstein" <?php if($profile_data['country']=='Liechtenstein'){echo 'selected=selected';} ?>>Liechtenstein</option>
		                            <option value="Lithuania" <?php if($profile_data['country']=='Lithuania'){echo 'selected=selected';} ?>>Lithuania</option>
		                            <option value="Luxembourg" <?php if($profile_data['country']=='Luxembourg'){echo 'selected=selected';} ?>>Luxembourg</option>
		                            <option value="Macau" <?php if($profile_data['country']=='Macau'){echo 'selected=selected';} ?>>Macau</option>
		                            <option value="Macedonia" <?php if($profile_data['country']=='Macedonia'){echo 'selected=selected';} ?>>Macedonia, The Former Yugoslav Republic of</option>
		                            <option value="Madagascar" <?php if($profile_data['country']=='Madagascar'){echo 'selected=selected';} ?>>Madagascar</option>
		                            <option value="Malawi" <?php if($profile_data['country']=='Malawi'){echo 'selected=selected';} ?>>Malawi</option>
		                            <option value="Malaysia" <?php if($profile_data['country']=='Malaysia'){echo 'selected=selected';} ?>>Malaysia</option>
		                            <option value="Maldives" <?php if($profile_data['country']=='Maldives'){echo 'selected=selected';} ?>>Maldives</option>
		                            <option value="Mali" <?php if($profile_data['country']=='Mali'){echo 'selected=selected';} ?>>Mali</option>
		                            <option value="Malta" <?php if($profile_data['country']=='Malta'){echo 'selected=selected';} ?>>Malta</option>
		                            <option value="Marshall Islands" <?php if($profile_data['country']=='Marshall Islands'){echo 'selected=selected';} ?>>Marshall Islands</option>
		                            <option value="Martinique" <?php if($profile_data['country']=='Martinique'){echo 'selected=selected';} ?>>Martinique</option>
		                            <option value="Mauritania" <?php if($profile_data['country']=='Mauritania'){echo 'selected=selected';} ?>>Mauritania</option>
		                            <option value="Mauritius" <?php if($profile_data['country']=='Mauritius'){echo 'selected=selected';} ?>>Mauritius</option>
		                            <option value="Mayotte" <?php if($profile_data['country']=='Mayotte'){echo 'selected=selected';} ?>>Mayotte</option>
		                            <option value="Mexico" <?php if($profile_data['country']=='Mexico'){echo 'selected=selected';} ?>>Mexico</option>
		                            <option value="Micronesia" <?php if($profile_data['country']=='Micronesia'){echo 'selected=selected';} ?>>Micronesia, Federated States of</option>
		                            <option value="Moldova" <?php if($profile_data['country']=='Moldova'){echo 'selected=selected';} ?>>Moldova, Republic of</option>
		                            <option value="Monaco" <?php if($profile_data['country']=='Monaco'){echo 'selected=selected';} ?>>Monaco</option>
		                            <option value="Mongolia" <?php if($profile_data['country']=='Mongolia'){echo 'selected=selected';} ?>>Mongolia</option>
		                            <option value="Montserrat" <?php if($profile_data['country']=='Montserrat'){echo 'selected=selected';} ?>>Montserrat</option>
		                            <option value="Morocco" <?php if($profile_data['country']=='Morocco'){echo 'selected=selected';} ?>>Morocco</option>
		                            <option value="Mozambique" <?php if($profile_data['country']=='Mozambique'){echo 'selected=selected';} ?>>Mozambique</option>
		                            <option value="Myanmar" <?php if($profile_data['country']=='Myanmar'){echo 'selected=selected';} ?>>Myanmar</option>
		                            <option value="Namibia" <?php if($profile_data['country']=='Namibia'){echo 'selected=selected';} ?>>Namibia</option>
		                            <option value="Nauru" <?php if($profile_data['country']=='Nauru'){echo 'selected=selected';} ?>>Nauru</option>
		                            <option value="Nepal" <?php if($profile_data['country']=='Nepal'){echo 'selected=selected';} ?>>Nepal</option>
		                            <option value="Netherlands" <?php if($profile_data['country']=='Netherlands'){echo 'selected=selected';} ?>>Netherlands</option>
		                            <option value="Netherlands Antilles" <?php if($profile_data['country']=='Netherlands Antilles'){echo 'selected=selected';} ?>>Netherlands Antilles</option>
		                            <option value="New Caledonia" <?php if($profile_data['country']=='New Caledonia'){echo 'selected=selected';} ?>>New Caledonia</option>
		                            <option value="New Zealand" <?php if($profile_data['country']=='New Zealand'){echo 'selected=selected';} ?>>New Zealand</option>
		                            <option value="Nicaragua" <?php if($profile_data['country']=='Nicaragua'){echo 'selected=selected';} ?>>Nicaragua</option>
		                            <option value="Niger" <?php if($profile_data['country']=='Niger'){echo 'selected=selected';} ?>>Niger</option>
		                            <option value="Nigeria" <?php if($profile_data['country']=='Nigeria'){echo 'selected=selected';} ?>>Nigeria</option>
		                            <option value="Niue" <?php if($profile_data['country']=='Niue'){echo 'selected=selected';} ?>>Niue</option>
		                            <option value="Norfolk Island" <?php if($profile_data['country']=='Norfolk Island'){echo 'selected=selected';} ?>>Norfolk Island</option>
		                            <option value="Northern Mariana Islands" <?php if($profile_data['country']=='Northern Mariana Islands'){echo 'selected=selected';} ?>>Northern Mariana Islands</option>
		                            <option value="Norway" <?php if($profile_data['country']=='Norway'){echo 'selected=selected';} ?>>Norway</option>
		                            <option value="Oman" <?php if($profile_data['country']=='Oman'){echo 'selected=selected';} ?>>Oman</option>
		                            <option value="Pakistan" <?php if($profile_data['country']=='Pakistan'){echo 'selected=selected';} ?>>Pakistan</option>
		                            <option value="Palau" <?php if($profile_data['country']=='Palau'){echo 'selected=selected';} ?>>Palau</option>
		                            <option value="Panama" <?php if($profile_data['country']=='Panama'){echo 'selected=selected';} ?>>Panama</option>
		                            <option value="Papua New Guinea" <?php if($profile_data['country']=='Papua New Guinea'){echo 'selected=selected';} ?>>Papua New Guinea</option>
		                            <option value="Paraguay" <?php if($profile_data['country']=='Paraguay'){echo 'selected=selected';} ?>>Paraguay</option>
		                            <option value="Peru" <?php if($profile_data['country']=='Peru'){echo 'selected=selected';} ?>>Peru</option>
		                            <option value="Philippines" <?php if($profile_data['country']=='Philippines'){echo 'selected=selected';} ?>>Philippines</option>
		                            <option value="Pitcairn" <?php if($profile_data['country']=='Pitcairn'){echo 'selected=selected';} ?>>Pitcairn</option>
		                            <option value="Poland" <?php if($profile_data['country']=='Poland'){echo 'selected=selected';} ?>>Poland</option>
		                            <option value="Portugal" <?php if($profile_data['country']=='Portugal'){echo 'selected=selected';} ?>>Portugal</option>
		                            <option value="Puerto Rico" <?php if($profile_data['country']=='Puerto Rico'){echo 'selected=selected';} ?>>Puerto Rico</option>
		                            <option value="Qatar" <?php if($profile_data['country']=='Qatar'){echo 'selected=selected';} ?>>Qatar</option>
		                            <option value="Reunion" <?php if($profile_data['country']=='Reunion'){echo 'selected=selected';} ?>>Reunion</option>
		                            <option value="Romania" <?php if($profile_data['country']=='Romania'){echo 'selected=selected';} ?>>Romania</option>
		                            <option value="Russia" <?php if($profile_data['country']=='Russia'){echo 'selected=selected';} ?>>Russian Federation</option>
		                            <option value="Rwanda" <?php if($profile_data['country']=='Rwanda'){echo 'selected=selected';} ?>>Rwanda</option>
		                            <option value="Saint Kitts and Nevis" <?php if($profile_data['country']=='Saint Kitts and Nevis'){echo 'selected=selected';} ?>>Saint Kitts and Nevis</option> 
		                            <option value="Saint LUCIA" <?php if($profile_data['country']=='Saint LUCIA'){echo 'selected=selected';} ?>>Saint LUCIA</option>
		                            <option value="Saint Vincent" <?php if($profile_data['country']=='Saint Vincent'){echo 'selected=selected';} ?>>Saint Vincent and the Grenadines</option>
		                            <option value="Samoa" <?php if($profile_data['country']=='Samoa'){echo 'selected=selected';} ?>>Samoa</option>
		                            <option value="San Marino" <?php if($profile_data['country']=='San Marino'){echo 'selected=selected';} ?>>San Marino</option>
		                            <option value="Sao Tome and Principe" <?php if($profile_data['country']=='Sao Tome and Principe'){echo 'selected=selected';} ?>>Sao Tome and Principe</option> 
		                            <option value="Saudi Arabia" <?php if($profile_data['country']=='Saudi Arabia'){echo 'selected=selected';} ?>>Saudi Arabia</option>
		                            <option value="Senegal" <?php if($profile_data['country']=='Senegal'){echo 'selected=selected';} ?>>Senegal</option>
		                            <option value="Seychelles" <?php if($profile_data['country']=='Seychelles'){echo 'selected=selected';} ?>>Seychelles</option>
		                            <option value="Sierra" <?php if($profile_data['country']=='Sierra Leone'){echo 'selected=selected';} ?>>Sierra Leone</option>
		                            <option value="Singapore" <?php if($profile_data['country']=='Singapore'){echo 'selected=selected';} ?>>Singapore</option>
		                            <option value="Slovakia" <?php if($profile_data['country']=='Slovakia'){echo 'selected=selected';} ?>>Slovakia (Slovak Republic)</option>
		                            <option value="Slovenia" <?php if($profile_data['country']=='Slovenia'){echo 'selected=selected';} ?>>Slovenia</option>
		                            <option value="Solomon Islands" <?php if($profile_data['country']=='Solomon Islands'){echo 'selected=selected';} ?>>Solomon Islands</option>
		                            <option value="Somalia" <?php if($profile_data['country']=='Somalia'){echo 'selected=selected';} ?>>Somalia</option>
		                            <option value="South Africa" <?php if($profile_data['country']=='South Africa'){echo 'selected=selected';} ?>>South Africa</option>
		                            <option value="South Georgia" <?php if($profile_data['country']=='South Georgia'){echo 'selected=selected';} ?>>South Georgia and the South Sandwich Islands</option>
		                            <option value="Spain" <?php if($profile_data['country']=='Spain'){echo 'selected=selected';} ?>>Spain</option>
		                            <option value="Sri Lanka" <?php if($profile_data['country']=='Sri Lanka'){echo 'selected=selected';} ?>>Sri Lanka</option>
		                            <option value="St Helena" <?php if($profile_data['country']=='St Helena'){echo 'selected=selected';} ?>>St. Helena</option>
		                            <option value="St Pierre and Miguelon" <?php if($profile_data['country']=='St. Pierre and Miquelon'){echo 'selected=selected';} ?>>St. Pierre and Miquelon</option>
		                            <option value="Sudan" <?php if($profile_data['country']=='Sudan'){echo 'selected=selected';} ?>>Sudan</option>
		                            <option value="Suriname" <?php if($profile_data['country']=='Suriname'){echo 'selected=selected';} ?>>Suriname</option>
		                            <option value="Svalbard" <?php if($profile_data['country']=='Svalbard'){echo 'selected=selected';} ?>>Svalbard and Jan Mayen Islands</option>
		                            <option value="Swaziland" <?php if($profile_data['country']=='Swaziland'){echo 'selected=selected';} ?>>Swaziland</option>
		                            <option value="Sweden" <?php if($profile_data['country']=='Sweden'){echo 'selected=selected';} ?>>Sweden</option>
		                            <option value="Switzerland" <?php if($profile_data['country']=='Switzerland'){echo 'selected=selected';} ?>>Switzerland</option>
		                            <option value="Syria" <?php if($profile_data['country']=='Syria'){echo 'selected=selected';} ?>>Syrian Arab Republic</option>
		                            <option value="Taiwan" <?php if($profile_data['country']=='Taiwan'){echo 'selected=selected';} ?>>Taiwan, Province of China</option>
		                            <option value="Tajikistan" <?php if($profile_data['country']=='Tajikistan'){echo 'selected=selected';} ?>>Tajikistan</option>
		                            <option value="Tanzania" <?php if($profile_data['country']=='Tanzania'){echo 'selected=selected';} ?>>Tanzania, United Republic of</option>
		                            <option value="Thailand" <?php if($profile_data['country']=='Thailand'){echo 'selected=selected';} ?>>Thailand</option>
		                            <option value="Togo" <?php if($profile_data['country']=='Togo'){echo 'selected=selected';} ?>>Togo</option>
		                            <option value="Tokelau" <?php if($profile_data['country']=='Tokelau'){echo 'selected=selected';} ?>>Tokelau</option>
		                            <option value="Tonga" <?php if($profile_data['country']=='Tonga'){echo 'selected=selected';} ?>>Tonga</option>
		                            <option value="Trinidad and Tobago" <?php if($profile_data['country']=='Trinidad and Tobago'){echo 'selected=selected';} ?>>Trinidad and Tobago</option>
		                            <option value="Tunisia" <?php if($profile_data['country']=='Tunisia'){echo 'selected=selected';} ?>>Tunisia</option>
		                            <option value="Turkey" <?php if($profile_data['country']=='Turkey'){echo 'selected=selected';} ?>>Turkey</option>
		                            <option value="Turkmenistan" <?php if($profile_data['country']=='Turkmenistan'){echo 'selected=selected';} ?>>Turkmenistan</option>
		                            <option value="Turks and Caicos" <?php if($profile_data['country']=='Turks and Caicos'){echo 'selected=selected';} ?>>Turks and Caicos Islands</option>
		                            <option value="Tuvalu" <?php if($profile_data['country']=='Tuvalu'){echo 'selected=selected';} ?>>Tuvalu</option>
		                            <option value="Uganda" <?php if($profile_data['country']=='Uganda'){echo 'selected=selected';} ?>>Uganda</option>
		                            <option value="Ukraine" <?php if($profile_data['country']=='Ukraine'){echo 'selected=selected';} ?>>Ukraine</option>
		                            <option value="United Arab Emirates" <?php if($profile_data['country']=='United Arab Emirates'){echo 'selected=selected';} ?>>United Arab Emirates</option>
		                            <option value="United Kingdom" <?php if($profile_data['country']=='United Kingdom'){echo 'selected=selected';} ?>>United Kingdom</option>
		                            <option value="United States" <?php if($profile_data['country']=='United States'){echo 'selected=selected';} ?>>United States</option>
		                            <option value="United States Minor Outlying Islands" <?php if($profile_data['country']=='United States Minor Outlying Islands'){echo 'selected=selected';} ?>>United States Minor Outlying Islands</option>
		                            <option value="Uruguay" <?php if($profile_data['country']=='Uruguay'){echo 'selected=selected';} ?>>Uruguay</option>
		                            <option value="Uzbekistan" <?php if($profile_data['country']=='Uzbekistan'){echo 'selected=selected';} ?>>Uzbekistan</option>
		                            <option value="Vanuatu" <?php if($profile_data['country']=='Vanuatu'){echo 'selected=selected';} ?>>Vanuatu</option>
		                            <option value="Venezuela" <?php if($profile_data['country']=='Venezuela'){echo 'selected=selected';} ?>>Venezuela</option>
		                            <option value="Vietnam" <?php if($profile_data['country']=='Vietnam'){echo 'selected=selected';} ?>>Viet Nam</option>
		                            <option value="Virgin Islands (British)" <?php if($profile_data['country']=='Virgin Islands (British)'){echo 'selected=selected';} ?>>Virgin Islands (British)</option>
		                            <option value="Virgin Islands (U.S)" <?php if($profile_data['country']=='Virgin Islands (U.S.)'){echo 'selected=selected';} ?>>Virgin Islands (U.S.)</option>
		                            <option value="Wallis and Futuna Islands" <?php if($profile_data['country']=='Wallis and Futuna Islands'){echo 'selected=selected';} ?>>Wallis and Futuna Islands</option>
		                            <option value="Western Sahara" <?php if($profile_data['country']=='Western Sahara'){echo 'selected=selected';} ?>>Western Sahara</option>
		                            <option value="Yemen" <?php if($profile_data['country']=='Yemen'){echo 'selected=selected';} ?>>Yemen</option>
		                            <option value="Yugoslavia" <?php if($profile_data['country']=='Yugoslavia'){echo 'selected=selected';} ?>>Yugoslavia</option>
		                            <option value="Zambia" <?php if($profile_data['country']=='Zambia'){echo 'selected=selected';} ?>>Zambia</option>
		                            <option value="Zimbabwe" <?php if($profile_data['country']=='Zimbabwe'){echo 'selected=selected';} ?>>Zimbabwe</option>
		                          </select>
		                        </div>
		                      </div>
		                    </div>
		                    <div class="row">
		                      <div class="col-md-6 pr-1">
		                        <div class="form-group">
		                          	<label>Select Zip codes where you can provide services</label>
		                            <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
		                              <?php
		                                $zip_codes=$obj->getAllZipCodes();
		                                
		                                $stores_zip_relations=$obj->getSingleTechRelationWithZipCodes($profile_data['tech_id']);
		                                $zip_ids = array_column($stores_zip_relations, 'zip_id');

		                                if(!empty($zip_codes)){
		                                  foreach ($zip_codes as $zip) {
		                              ?>
		                                    <div>
		                                      <label class="form-control">
		                                        <input type="checkbox" name="zip_codes[]" value="<?php echo $zip['zip_id']; ?>" <?php if(in_array($zip['zip_id'], $zip_ids)) { echo 'checked="checked"'; }?> />
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
		                            <label>Select Services you can provide</label>
		                            <div class="multiselect" style='overflow-y: scroll; height: 150px;'>
			                            <?php
			                              $models=$obj->getAllActiveModels();
			                              
			                              $stores_models_relations=$obj->getSingleTechRelationWithModels($profile_data['tech_id']);;
			                              $models_ids = array_column($stores_models_relations, 'service_id');

			                              if(!empty($models)){
			                                foreach ($models as $model) {
			                            ?>
			                                  <div>
			                                    <label class="form-control">
			                                      <input type="checkbox" name="models[]" value="<?php echo $model['model_id']; ?>" <?php if(in_array($model['model_id'], $models_ids)) { echo 'checked="checked"'; }?> />
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
		                          <textarea class="form-control" rows="5" name="about_field"><?php echo $profile_data['about_me']; ?></textarea>
		                        </div>
		                      </div>
		                    </div>
		                    <div class="row">
		                      <div class="col-md-6 pr-1">
		                        <div class="form-group">
		                          	<label>Would you pass a background check? </label>
			                        <select class="form-control" style="height: 50px;" name="background_field">
			                            <option value="Yes" <?php if($profile_data['background_check']=='Yes'){ echo 'selected';} ?>>Yes</option>
			                            <option value="No" <?php if($profile_data['background_check']=='No'){ echo 'selected';} ?>>No</option>
			                        </select>
		                        </div>
		                      </div>
		                      <div class="col-md-6 pl-1">
		                        <div class="form-group">
			                        <label>Are you over the age of 18?</label>
			                        <select class="form-control" style="height: 50px;" name="age_field">
			                            <option value="Yes" <?php if($profile_data['age_check']=='Yes'){ echo 'selected';} ?>>Yes</option>
			                            <option value="No" <?php if($profile_data['age_check']=='No'){ echo 'selected';} ?>>No</option>
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
			                            <option value="I dont have any experience" <?php if($profile_data['experience']=='I dont have any experience'){ echo 'selected';} ?>>
			                              Idon't have any experience
			                            </option>
			                            <option value="I have done a few repairs" <?php if($profile_data['experience']=='I have done a few repairs'){ echo 'selected';} ?>>
			                              I have done a few repairs
			                            </option>
			                            <option value="I have a professional experience" <?php if($profile_data['experience']=='I have a professional experience'){ echo 'selected';} ?>>
			                              I have a professional experience
			                            </option>
			                            <option value="I am a Master Tech" <?php if($profile_data['experience']=='I am a Master Tech'){ echo 'selected';} ?>>I am a Master Tech</option>
			                        </select>
		                        </div>
		                      </div>
		                      <div class="col-md-6 pl-1 mt-2">
		                        <div class="form-group">
			                        <fieldset class="form-control">
			                            <legend>Resume/CV</legend>
			                            <a target="_blank" href="<?php echo '../../uploads/'.$profile_data['tech_cv']; ?>"><?php echo $profile_data['tech_cv']; ?></a>
			                        </fieldset>                          
		                        </div>
		                      </div>
		                    </div>
		                    <!-- <div class="row">
			            		<div class="col-lg-8 pr-1">
			            			<div class="form-group">
			            				<label>Upload Your CV (optional) </label>
						                <input type="file" class="form-control" name="cv_field" style="height: 50px; display: block; opacity: 20; position: relative;" />
						            </div>
			            		</div>
			            	</div> -->
			            	<div class="row">
		                      <div class="update ml-auto mr-auto">
		                        <button type="submit" class="btn btn-success btn-round" name="update_tech_btn">Update Profile</button>
		                      </div>
		                    </div>
		                </div>
		            </div>
	            </div>        
	        </div>
	    </form>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Update Password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="ExeFile.php" method="post">
                	<div class="row">
		            	<div class="col-md-12">
				            <div class="form-group">
		                        <label for="company" class=" form-control-label">Current Password</label>
		                        <input type="password" class="form-control" name="current_pass_field" placeholder="enter current password" required="true">
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		            	<div class="col-md-12">
				           	<div class="form-group">
		                        <label for="company" class=" form-control-label">New Password</label>
		                        <input type="password" class="form-control" name="new_pass_field" placeholder="enter new password" required="true">
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		            	<div class="col-md-12">
				            <div class="form-group">
		                        <label for="company" class=" form-control-label">Confirm Password</label>
		                        <input type="password" class="form-control" name="confirm_pass_field" placeholder="confirm new password" required="true">
		                    </div>
		                </div>
		            </div>
		            <hr>
			        <div class="card-text text-sm-center">
			            <input type="submit" name="update_pass_btn" value="Update Password" class="btn btn-success btn-round">
			        </div>
                </form>
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

</body>

</html>