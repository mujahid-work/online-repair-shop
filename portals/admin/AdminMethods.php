<?php 

include_once('../../Connection.php');

require ('../../PHPMailer/PHPMailerAutoload.php');

	class AdminMethods extends Connection{


		public function cssLinks(){

			$css='';			
			$css.='<link href="../assets/demo/demo.css" rel="stylesheet" >';
			$css.='<link href="../assets/css/wizard.css" rel="stylesheet" >';
			$css.='<link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" >';
			$css.='<link href="../assets/css/bootstrap.min.css" rel="stylesheet">';
			// $css.='<link href="../assets/fonts/fontawsome.min.css" rel="stylesheet">';
			$css.='<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">';
			$css.='<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" >';
			$css.='<link rel="icon" type="image/png" href="../assets/img/favicon.png">';
			$css.='<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">';
			$css.='<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" >';
			$css.='<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" >';
			
			return $css;
		}


		public function jsLinks(){
			
			$js='';			
			$js.='<script src="../assets/js/core/jquery.min.js"></script>';
			$js.='<script src="../assets/js/wizard.js"></script>';
			$js.='<script src="../assets/js/core/popper.min.js"></script>';
			$js.='<script src="../assets/js/core/bootstrap.min.js"></script>';
			$js.='<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>';
			$js.='<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>';
			$js.='<script src="../assets/js/plugins/chartjs.min.js"></script>';
			$js.='<script src="../assets/js/plugins/bootstrap-notify.js"></script>';
			$js.='<script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>';
			$js.='<script src="../assets/demo/demo.js"></script>';
			$js.='<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>';
			$js.='<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>';
			$js.='<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>';
			$js.='<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>';
			$js.='<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>';
			$js.='<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>';
			$js.='<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>';
			$js.='<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>';
			
			return $js;
		}


		public function loginValidate($email,$password) {

			$con=$this->connect();

			$email=stripslashes($email);
	        $password=stripslashes($password);
	        
			$email=mysqli_real_escape_string($con,$email);
	        $password=mysqli_real_escape_string($con,$password);

			$sql=" SELECT * FROM `accounts_tbl` WHERE `email`= '".$email."' AND `password`= '".$password."' AND `status`= 'Active' ";
			$result=$con->query($sql);

			if($result->num_rows>0){

				$row=$result->fetch_assoc();

				if($row['role']=='Admin'){
					$tbl_name='admin_tbl';
					$id_column='admin_id';
					$id=$row['account_id'];
				}

				$sql1=" SELECT * FROM `accounts_tbl` as account INNER JOIN $tbl_name as tbl on account.account_id=tbl.$id_column WHERE account.account_id='".$id."'";
				$result1=$con->query($sql1);

				if($result1->num_rows>0){

					$row1=$result1->fetch_assoc();
					$con->close();
					return $row1;
				}
				else{

					$con->close();
					return false;
				}
				
			}
			else{

				$con->close();
				return false;
			}	
		}


		public function fetchMyProfile(){

			$con=$this->connect();

			$sql = "SELECT admin.* , account.email FROM `accounts_tbl` as account INNER JOIN `admin_tbl` as admin on admin.admin_id=account.account_id WHERE account.account_id= '".$_SESSION['logged_in_id']."' ";

			$result=$con->query($sql);


			if($result->num_rows>0){

				$my_profile=$result->fetch_assoc();
				$con->close();
				return $my_profile;
			}
			else{
				$con->close();
				return false;
			}
		}


		public function updateAdminData($full_name,$mobile,$email,$pic,$temp_pic){

			$con=$this->connect();

			session_start();

			$sql=" UPDATE `accounts_tbl` SET `email`='".$email."' WHERE `account_id`='".$_SESSION['logged_in_id']."' ";
			$result=$con->query($sql);

			if($result==true){					

				if($pic=="" || $temp_pic==""){
					
					$sql1=" UPDATE `admin_tbl` SET `admin_full_name`= '".$full_name."' , `admin_mobile`= '".$mobile."' WHERE `admin_id`='".$_SESSION['logged_in_id']."' ";
					$result1=$con->query($sql1);

					$_SESSION['logged_in_name']=$full_name;
					$_SESSION['logged_in_email']=$email;
					$_SESSION['logged_in_pic']=$pic;
				}

				else{
					
					move_uploaded_file($temp_pic, "../../uploads/".$pic);

					$sql1=" UPDATE `admin_tbl` SET `admin_full_name`= '".$full_name."' , `admin_mobile`= '".$mobile."' , `admin_pic`= '".$pic."' WHERE `admin_id`='".$_SESSION['logged_in_id']."' ";
					$result1=$con->query($sql1);

					$_SESSION['logged_in_name']=$full_name;
					$_SESSION['logged_in_email']=$email;
					$_SESSION['logged_in_pic']=$pic;
				}

				if($result1==true){
					$con->close();
					return true;
				}
				else{
					$con->close();
					return false;
				}
			}
			else{
				$con->close();
				return false;
			}
		}


		public function updateAdminPassword($current_pass,$new_pass){

			$con=$this->connect();
			session_start();

			$sql=" SELECT * FROM `accounts_tbl` WHERE `account_id`='".$_SESSION['logged_in_id']."' && `password`='".$current_pass."' ";
			$result=$con->query($sql);

			if($result->num_rows>0){

				$sql1=" UPDATE `accounts_tbl` SET `password`='".$new_pass."' WHERE `account_id`='".$_SESSION['logged_in_id']."' ";
				$value=$con->query($sql1);

				if($value==true){
					
					$con->close();
					return true;
				}
				else{
					
					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}			
		}


		public function checkEmail($email) {

			$con=$this->connect();

			$email=stripslashes($email);	        
			$email=mysqli_real_escape_string($con,$email);

			$sql=" SELECT * FROM `accounts_tbl` WHERE `email`= '".$email."' AND `role`= 'Admin' ";
			$result=$con->query($sql);

			if($result->num_rows>0){

				$con->close();
				return true;				
			}
			else{

				$con->close();
				return false;
			}	
		}


		public function sendVerificationCode($email){

			session_start();

			$_SESSION['email'] = $email;
			$pin_code=$_SESSION['pin'] = $pin = rand(1000,9999);

			$mail = new PHPMailer;
			$mail->isSMTP();                                   // Set mailer to use SMTP
			$mail->Host = 'box5487.bluehost.com';                    // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                            // Enable SMTP authentication
			$mail->Username = 'no_reply@migoswireless.com';          // SMTP username
			$mail->Password = 'mwV+rL,j3~s@'; // SMTP password
			$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                 // TCP port to connect to

			$mail->setFrom('no_reply@migoswireless.com', 'Test');
			//$mail->addReplyTo('786muhammadnaveed@gmail.com', 'Test');
			$mail->addAddress($email);   // Add a recipient

			$mail->isHTML(true);  // Set email format to HTML

			$msg="Hey use this ".$pin_code." as verification code to reset password";
			$bodyContent = '<p>'.$msg.'</p>';

			$mail->Subject = 'Password Reset Pin Code';
			$mail->Body    = $bodyContent;

			if(!$mail->send()) {
			    // echo 'Message could not be sent.';
			    // echo 'Mailer Error: ' . $mail->ErrorInfo;

			    return false;
			}
			else {

				return true;
			}
		}


		public function resetPassword($email,$new_pass){

			$con=$this->connect();
			session_start();

			$sql=" SELECT * FROM `accounts_tbl` WHERE `email`='".$email."' && `role`='Admin' ";
			$result=$con->query($sql);

			if($result->num_rows>0){

				$sql1=" UPDATE `accounts_tbl` SET `password`='".$new_pass."' WHERE `email`='".$email."' ";
				$value=$con->query($sql1);

				if($value==true){
					
					$con->close();
					return true;
				}
				else{
					
					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}			
		}










		public function addRepairType($title,$pic,$temp_pic){

			$con=$this->connect();

			move_uploaded_file($temp_pic, "../../uploads/".$pic);

			$sql=" INSERT INTO `repair_types_tbl` (`repair_title` , `repair_status` , `repair_pic`) VALUES ('".$title."' , 'Active' , '".$pic."') ";
			$result=$con->query($sql);

			if($result==true){

				$con->close();
				return true;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function updateRepairType($repair_id,$title,$status,$pic,$temp_pic){

			$con=$this->connect();					

			if($pic=="" || $temp_pic==""){
				
				$sql=" UPDATE `repair_types_tbl` SET `repair_title`= '".$title."' , `repair_status`= '".$status."' WHERE `repair_id`='".$repair_id."' ";
				$result=$con->query($sql);
			}

			else{
				
				move_uploaded_file($temp_pic, "../../uploads/".$pic);

				$sql=" UPDATE `repair_types_tbl` SET `repair_title`= '".$title."' , `repair_status`= '".$status."' , `repair_pic`= '".$pic."' WHERE `repair_id`='".$repair_id."' ";
				$result=$con->query($sql);
			}

			if($result==true){

				$con->close();
				return true;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllRepairTypes(){

			$con=$this->connect();

			$sql=" SELECT * FROM `repair_types_tbl` ";
			$result=$con->query($sql);

			$repair_types=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$repair_types[]=$row;
				}

				$con->close();
				return $repair_types;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllActiveRepairTypes(){

			$con=$this->connect();

			$sql=" SELECT * FROM `repair_types_tbl` WHERE `repair_status`='Active' ";
			$result=$con->query($sql);

			$repair_types=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$repair_types[]=$row;
				}

				$con->close();
				return $repair_types;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleRepairType($repair_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `repair_types_tbl` WHERE `repair_id`='".$repair_id."' ";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$repair_type=$row;
				}

				$con->close();
				return $repair_type;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function disableRepairType($repair_id){

			$con=$this->connect();

			$sql=" UPDATE `repair_types_tbl` SET `repair_status`='In-Active' WHERE `repair_id`='".$repair_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}


		public function enableRepairType($repair_id){

			$con=$this->connect();

			$sql=" UPDATE `repair_types_tbl` SET `repair_status`='Active' WHERE `repair_id`='".$repair_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}










		public function addBrand($title,$repair_type,$pic,$temp_pic){

			$con=$this->connect();

			move_uploaded_file($temp_pic, "../../uploads/".$pic);

			$sql=" INSERT INTO `brands_tbl` (`brand_title` , `brand_status` , `brand_pic`) VALUES ('".$title."' , 'Active' , '".$pic."') ";
			$result=$con->query($sql);

			if($result==true){

				$last_id = $con->insert_id;

				$length=sizeof($repair_type);

				for ($i=0; $i < $length ; $i++) { 

					$sql1=" INSERT INTO `repair_brand_relation_tbl` (`repair_id` , `brand_id`) VALUES ('".$repair_type[$i]."' , '".$last_id."') ";
					$result1=$con->query($sql1);
				}

				if($result1==true){

					$con->close();
					return true;
				}
				else{

					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}
		}


		public function updateBrand($brand_id,$title,$repair_type,$status,$pic,$temp_pic){

			$con=$this->connect();					

			if($pic=="" || $temp_pic==""){
				
				$sql=" UPDATE `brands_tbl` SET `brand_title`= '".$title."' , `brand_status`= '".$status."' WHERE `brand_id`='".$brand_id."' ";
				$result=$con->query($sql);
			}

			else{
				
				move_uploaded_file($temp_pic, "../../uploads/".$pic);

				$sql=" UPDATE `brands_tbl` SET `brand_title`= '".$title."' , `brand_status`= '".$status."' , `brand_pic`= '".$pic."' WHERE `brand_id`='".$brand_id."' ";
				$result=$con->query($sql);
			}

			if($result==true){

				$sql1=" DELETE FROM `repair_brand_relation_tbl` WHERE `brand_id`='".$brand_id."' ";
				$result1=$con->query($sql1);

				if($result1==true){

					$length=sizeof($repair_type);

					for ($i=0; $i < $length ; $i++) { 

						$sql2=" INSERT INTO `repair_brand_relation_tbl` (`repair_id` , `brand_id`) VALUES ('".$repair_type[$i]."' , '".$brand_id."') ";
						$result2=$con->query($sql2);
					}

					if($result2==true){

						$con->close();
						return true;
					}
				}
				else{

					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllBrands(){

			$con=$this->connect();

			$sql=" SELECT * FROM `brands_tbl` ";
			$result=$con->query($sql);

			$brands=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$brands[]=$row;
				}

				$con->close();
				return $brands;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllActiveBrands(){

			$con=$this->connect();

			$sql=" SELECT * FROM `brands_tbl` WHERE `brand_status`='Active' ";
			$result=$con->query($sql);

			$brands=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$brands[]=$row;
				}

				$con->close();
				return $brands;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleBrand($brand_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `brands_tbl` as brand INNER JOIN `repair_brand_relation_tbl` as rbr on brand.brand_id=rbr.brand_id WHERE brand.brand_id='".$brand_id."'  ";
			$result=$con->query($sql);

			$brand=array();
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$brand[]=$row;
				}

				$con->close();
				return $brand;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleBrandRelationWithRepairTypes($brand_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `repair_brand_relation_tbl` WHERE brand_id='".$brand_id."'  ";
			$result=$con->query($sql);

			$brand=array();
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$brand[]=$row;
				}

				$con->close();
				return $brand;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function disableBrand($brand_id){

			$con=$this->connect();

			$sql=" UPDATE `brands_tbl` SET `brand_status`='In-Active' WHERE `brand_id`='".$brand_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}


		public function enableBrand($brand_id){

			$con=$this->connect();

			$sql=" UPDATE `brands_tbl` SET `brand_status`='Active' WHERE `brand_id`='".$brand_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}









		public function addStore($title,$address,$zip_codes,$models,$pic,$temp_pic){

			$con=$this->connect();

			move_uploaded_file($temp_pic, "../../uploads/".$pic);

			$sql=" INSERT INTO `stores_tbl` (`store_title` , `store_address` , `store_status` , `store_pic`) VALUES ('".$title."' , '".$address."' , 'Active' , '".$pic."') ";
			$result=$con->query($sql);

			if($result==true){

				$last_id = $con->insert_id;

				$length=sizeof($zip_codes);

				for ($i=0; $i < $length ; $i++) { 

					$sql1=" INSERT INTO `store_zip_relation_tbl` (`zip_id` , `store_id`) VALUES ('".$zip_codes[$i]."' , '".$last_id."') ";
					$result1=$con->query($sql1);
				}

				if($result1==true){

					$length1=sizeof($models);

					for ($i=0; $i < $length1 ; $i++) { 

						$sql2=" INSERT INTO `store_models_relation_tbl` (`model_id` , `store_id`) VALUES ('".$models[$i]."' , '".$last_id."') ";
						$result2=$con->query($sql2);
					}
					if($result2==true){

						$con->close();
						return true;
					}
					else{

						$con->close();
						return false;
					}
				}
				else{

					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}
		}


		public function updateStore($store_id,$title,$address,$zip_codes,$models,$status,$pic,$temp_pic){

			$con=$this->connect();					

			if($pic=="" || $temp_pic==""){
				
				$sql=" UPDATE `stores_tbl` SET `store_title`= '".$title."' , `store_address`= '".$address."' , `store_status`= '".$status."' WHERE `store_id`='".$store_id."' ";
				$result=$con->query($sql);
			}

			else{
				
				move_uploaded_file($temp_pic, "../../uploads/".$pic);

				$sql=" UPDATE `stores_tbl` SET `store_title`= '".$title."' , `store_address`= '".$address."' , `store_status`= '".$status."' , `store_pic`= '".$pic."' WHERE `store_id`='".$store_id."' ";
				$result=$con->query($sql);
			}

			if($result==true){

				$sql1=" DELETE FROM `store_zip_relation_tbl` WHERE `store_id`='".$store_id."' ";
				$result1=$con->query($sql1);

				if($result1==true){

					$length=sizeof($zip_codes);

					for ($i=0; $i < $length ; $i++) { 

						$sql2=" INSERT INTO `store_zip_relation_tbl` (`zip_id` , `store_id`) VALUES ('".$zip_codes[$i]."' , '".$store_id."') ";
						$result2=$con->query($sql2);
					}

					if($result2==true){

						$sql3=" DELETE FROM `store_models_relation_tbl` WHERE `store_id`='".$store_id."' ";
						$result3=$con->query($sql3);

						if($result3==true){

							$length1=sizeof($models);

							for ($i=0; $i < $length1 ; $i++) { 

								$sql4=" INSERT INTO `store_models_relation_tbl` (`model_id` , `store_id`) VALUES ('".$models[$i]."' , '".$store_id."') ";
								$result4=$con->query($sql4);
							}

							if($result4==true){

								$con->close();
								return true;
							}
							else{

								$con->close();
								return false;
							}
						}
					}
				}
				else{

					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllStores(){

			$con=$this->connect();

			$sql=" SELECT * FROM `stores_tbl` ";
			$result=$con->query($sql);

			$stores=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$stores[]=$row;
				}

				$con->close();
				return $stores;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllActiveStores(){

			$con=$this->connect();

			$sql=" SELECT * FROM `stores_tbl` WHERE `store_status`='Active' ";
			$result=$con->query($sql);

			$stores=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$stores[]=$row;
				}

				$con->close();
				return $stores;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleStore($store_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `stores_tbl` as store INNER JOIN `store_zip_relation_tbl` as szr on store.store_id=szr.store_id WHERE store.store_id='".$store_id."'  ";
			$result=$con->query($sql);

			$store=array();
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$store[]=$row;
				}

				$con->close();
				return $store;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleStoreRelationWithZipCodes($store_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `store_zip_relation_tbl` WHERE store_id='".$store_id."'  ";
			$result=$con->query($sql);

			$store=array();
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$store[]=$row;
				}

				$con->close();
				return $store;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleStoreRelationWithModels($store_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `store_models_relation_tbl` WHERE store_id='".$store_id."'  ";
			$result=$con->query($sql);

			$store=array();
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$store[]=$row;
				}

				$con->close();
				return $store;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function disableStore($store_id){

			$con=$this->connect();

			$sql=" UPDATE `stores_tbl` SET `store_status`='In-Active' WHERE `store_id`='".$store_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}


		public function enableStore($store_id){

			$con=$this->connect();

			$sql=" UPDATE `stores_tbl` SET `store_status`='Active' WHERE `store_id`='".$store_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}









		public function addStoreAdmin($name,$store,$email,$contact,$password,$pic,$temp_pic){

			$con=$this->connect();

			$sql=" INSERT INTO `accounts_tbl` (`email` , `password` , `role` , `status`) VALUES ('".$email."' , '".$password."' , 'Store Admin' , 'Active') ";
			$result=$con->query($sql);

			if($result==true){

				$last_id=$con->insert_id;

				move_uploaded_file($temp_pic, "../../uploads/".$pic);

				$sql1=" INSERT INTO `stores_admin_tbl` (`store_admin_id` , `store_admin_full_name` , `store_admin_mobile` , `store_admin_pic`) VALUES ('".$last_id."' , '".$name."' , '".$contact."' , '".$pic."') ";
				$result1=$con->query($sql1);

				if($result1==true){

					$length=sizeof($store);

					for ($i=0; $i < $length ; $i++) { 

						$sql2=" INSERT INTO `store_admin_stores_relation_tbl` (`store_id` , `store_admin_id`) VALUES ('".$store[$i]."' , '".$last_id."') ";
						$result2=$con->query($sql2);
					}

					if($result2==true){

						$con->close();
						return true;
					}
					else{

						$con->close();
						return false;
					}
				}
				else{

					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}
		}


		public function updateStoreAdmin($store_admin_id,$name,$store,$email,$contact,$password,$status,$pic,$temp_pic){

			$con=$this->connect();

			$sql=" UPDATE `accounts_tbl` SET `email`='".$email."' , `password`='".$password."' , `status`='".$status."' WHERE `account_id`='".$store_admin_id."' ";
			$result=$con->query($sql);

			if($result==true){


				if($pic=="" || $temp_pic==""){

					$sql1=" UPDATE `stores_admin_tbl` SET `store_admin_full_name`='".$name."' , `store_admin_mobile`='".$contact."' WHERE `store_admin_id`='".$store_admin_id."' ";
				}
				else{

					move_uploaded_file($temp_pic, "../../uploads/".$pic);

					$sql1=" UPDATE `stores_admin_tbl` SET `store_admin_full_name`='".$name."' , `store_admin_mobile`='".$contact."' , `store_admin_pic`='".$pic."' WHERE `store_admin_id`='".$store_admin_id."' ";
				}

				$result1=$con->query($sql1);

				if($result1==true){

					$sql2=" DELETE FROM `store_admin_stores_relation_tbl` WHERE `store_admin_id`='".$store_admin_id."' ";
					$result2=$con->query($sql2);

					if($result2==true){

						$length=sizeof($store);

						for ($i=0; $i < $length ; $i++) { 

							$sql3=" INSERT INTO `store_admin_stores_relation_tbl` (`store_id` , `store_admin_id`) VALUES ('".$store[$i]."' , '".$store_admin_id."') ";
							$result3=$con->query($sql3);
						}

						if($result3==true){

							$con->close();
							return true;
						}
					}
					else{

						$con->close();
						return false;
					}
				}
				else{

					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllStoresAdmin(){

			$con=$this->connect();

			$sql=" SELECT * FROM `accounts_tbl` as account INNER JOIN `stores_admin_tbl` as store_admin on account.account_id=store_admin.store_admin_id ";
			$result=$con->query($sql);

			$technicians=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$technicians[]=$row;
				}

				$con->close();
				return $technicians;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllActiveStoresAdmin(){

			$con=$this->connect();

			$sql=" SELECT * FROM `accounts_tbl` as account INNER JOIN `stores_admin_tbl` as store_admin on account.account_id=store_admin.store_admin_id WHERE account.status='Active' ";
			$result=$con->query($sql);

			$store_admins=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$store_admins[]=$row;
				}

				$con->close();
				return $store_admins;
			}
			else{

				$con->close();
				return false;
			}
		}



		public function getSingleStoreAdmin($store_admin_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `accounts_tbl` as account INNER JOIN `stores_admin_tbl` as store_admin on account.account_id=store_admin.store_admin_id WHERE account.account_id='".$store_admin_id."' ";
			$result=$con->query($sql);

			$store_admin=array();

			if($result->num_rows > 0){
				while ($row=$result->fetch_assoc()) {
					$store_admin[]=$row;
				}

				$con->close();
				return $store_admin;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleStoreAdminRelationWithStores($store_admin_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `store_admin_stores_relation_tbl` WHERE `store_admin_id`='".$store_admin_id."'  ";
			$result=$con->query($sql);

			$brand=array();
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$brand[]=$row;
				}

				$con->close();
				return $brand;
			}
			else{

				$con->close();
				return false;
			}
		}









		public function addModel($title,$repair_type,$brands,$pic,$temp_pic){

			$con=$this->connect();

			move_uploaded_file($temp_pic, "../../uploads/".$pic);

			$sql=" INSERT INTO `models_tbl` (`model_title` , `model_status` , `model_pic`) VALUES ('".$title."' , 'Active' , '".$pic."') ";
			$result=$con->query($sql);

			if($result==true){

				$last_id = $con->insert_id;

				$length=sizeof($brands);

				for ($i=0; $i < $length ; $i++) { 

					$sql1=" INSERT INTO `brand_models_relation_tbl` (`brand_id` , `model_id`,repair_id) VALUES ('".$brands[$i]."' , '".$last_id."' , '".$repair_type."') ";
					$result1=$con->query($sql1);
				}

				if($result1==true){

					$con->close();
					return true;
				}
				else{

					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}
		}


		public function updateModel($model_id,$title,$repair_type,$brands,$status,$pic,$temp_pic){

			$con=$this->connect();					

			if($pic=="" || $temp_pic==""){
				
				$sql=" UPDATE `models_tbl` SET `model_title`= '".$title."' , `model_status`= '".$status."' WHERE `model_id`='".$model_id."' ";
				$result=$con->query($sql);
			}

			else{
				
				move_uploaded_file($temp_pic, "../../uploads/".$pic);

				$sql=" UPDATE `models_tbl` SET `model_title`= '".$title."' , `model_status`= '".$status."' , `model_pic`= '".$pic."' WHERE `model_id`='".$model_id."' ";
				$result=$con->query($sql);
			}

			if($result==true){

				$sql1=" DELETE FROM `brand_models_relation_tbl` WHERE `model_id`='".$model_id."' ";
				$result1=$con->query($sql1);

				if($result1==true){

					$length=sizeof($brands);

					for ($i=0; $i < $length ; $i++) { 

						$sql2=" INSERT INTO `brand_models_relation_tbl` (`brand_id` , `model_id` , `repair_id`) VALUES ('".$brands[$i]."' , '".$model_id."' , '".$repair_type."') ";
						$result2=$con->query($sql2);
					}

					if($result2==true){

						$con->close();
						return true;
					}
				}
				else{

					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllModels(){

			$con=$this->connect();

			$sql=" SELECT * FROM `models_tbl` ";
			$result=$con->query($sql);

			$models=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$models[]=$row;
				}

				$con->close();
				return $models;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllActiveModels(){

			$con=$this->connect();

			$sql=" SELECT * FROM `models_tbl` WHERE `model_status`='Active' ";
			$result=$con->query($sql);

			$models=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$models[]=$row;
				}

				$con->close();
				return $models;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleModel($model_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `models_tbl` as model INNER JOIN `brand_models_relation_tbl` as bmr on model.model_id=bmr.model_id WHERE model.model_id='".$model_id."'  ";
			$result=$con->query($sql);

			// $models=array();
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$models=$row;
				}

				$con->close();
				return $models;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleModelRelationWithBrands($model_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `brand_models_relation_tbl` WHERE model_id='".$model_id."'  ";
			$result=$con->query($sql);

			$model=array();
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$model[]=$row;
				}

				$con->close();
				return $model;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function disableModel($model_id){

			$con=$this->connect();

			$sql=" UPDATE `models_tbl` SET `model_status`='In-Active' WHERE `model_id`='".$model_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}


		public function enableModel($model_id){

			$con=$this->connect();

			$sql=" UPDATE `models_tbl` SET `model_status`='Active' WHERE `model_id`='".$model_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}









		public function addService($title,$repair_type,$models,$prices,$zip_codes,$pic,$temp_pic){

			$con=$this->connect();

			move_uploaded_file($temp_pic, "../../uploads/".$pic);

			$sql=" INSERT INTO `services_tbl` (`service_title` , `service_status` , `service_pic`) VALUES ('".$title."' , 'Active' , '".$pic."') ";
			$result=$con->query($sql);

			if($result==true){

				$last_id = $con->insert_id;

				$length=sizeof($models);

				for ($i=0; $i < $length ; $i++) { 

					if($models[$i]!="" && $prices[$i]!=""){

						$sql1=" INSERT INTO `models_services_relation_tbl` (`model_id` , `price` , `service_id` , `repair_id`) VALUES ('".$models[$i]."' , '".$prices[$i]."' , '".$last_id."' , '".$repair_type."') ";
						$result1=$con->query($sql1);
					}
				}

				if($result1==true){

					$length=sizeof($zip_codes);

					for ($i=0; $i < $length ; $i++) {

						$sql2=" INSERT INTO `zip_services_relation_tbl` (`zip_id` , `service_id`) VALUES ('".$zip_codes[$i]."' , '".$last_id."') ";
						$result2=$con->query($sql2);
					}

					if($result2==true){

						$con->close();
						return true;
					}
					else{

						$con->close();
						return false;
					}
				}
				else{

					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}
		}

		public function updateService($service_id,$title,$repair_type,$models,$new_prices,$status,$pic,$temp_pic){

			$con=$this->connect();					

			if($pic=="" || $temp_pic==""){
				
				$sql=" UPDATE `services_tbl` SET `service_title`= '".$title."' , `service_status`= '".$status."' WHERE `service_id`='".$service_id."' ";
				$result=$con->query($sql);
			}

			else{
				
				move_uploaded_file($temp_pic, "../../uploads/".$pic);

				$sql=" UPDATE `services_tbl` SET `service_title`= '".$title."' , `service_status`= '".$status."' , `service_pic`= '".$pic."' WHERE `service_id`='".$service_id."' ";
				$result=$con->query($sql);
			}

			if($result==true){

				$sql1=" DELETE FROM `models_services_relation_tbl` WHERE `service_id`='".$service_id."' ";
				$result1=$con->query($sql1);

				if($result1==true){

					$length=sizeof($models);

					for ($i=0; $i < $length ; $i++) { 

						$sql2=" INSERT INTO `models_services_relation_tbl` (`model_id` , `price` , `service_id` , `repair_id`) VALUES ('".$models[$i]."' , '".$new_prices[$i]."' , '".$service_id."' , '".$repair_type."') ";
						$result2=$con->query($sql2);
					}

					if($result2==true){

						$con->close();
						return true;
					}
				}
				else{

					$con->close();
					return false;
				}
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllServices(){

			$con=$this->connect();

			$sql=" SELECT * FROM `services_tbl` ";
			$result=$con->query($sql);

			$services=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$services[]=$row;
				}

				$con->close();
				return $services;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllActiveServices(){

			$con=$this->connect();

			$sql=" SELECT * FROM `services_tbl` WHERE `service_status`='Active' ";
			$result=$con->query($sql);

			$services=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$services[]=$row;
				}

				$con->close();
				return $services;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleService($service_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `services_tbl` as service INNER JOIN `models_services_relation_tbl` as msr on service.service_id=msr.service_id WHERE service.service_id='".$service_id."'  ";
			$result=$con->query($sql);
			
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$services=$row;
				}

				$con->close();
				return $services;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleServiceRelationWithModels($service_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `models_services_relation_tbl` WHERE service_id='".$service_id."'  ";
			$result=$con->query($sql);

			$services=array();
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$services[]=$row;
				}

				$con->close();
				return $services;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function disableService($service_id){

			$con=$this->connect();

			$sql=" UPDATE `services_tbl` SET `service_status`='In-Active' WHERE `service_id`='".$service_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}


		public function enableService($service_id){

			$con=$this->connect();

			$sql=" UPDATE `services_tbl` SET `service_status`='Active' WHERE `service_id`='".$service_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}








		public function updateCustomer($customer_id,$first_name,$last_name,$email,$password,$contact,$country,$address,$city,$zip,$about){

			$con=$this->connect();

			$sql=" UPDATE `accounts_tbl` SET `email`= '".$email."' , `password`= '".$password."' WHERE `account_id`='".$customer_id."' ";
			$result=$con->query($sql);

			if($result==true){

				$sql1=" UPDATE `customers_tbl` SET `first_name`= '".$first_name."' , `last_name`= '".$last_name."' , `contact_number`= '".$contact."' , `country`= '".$country."' , `city`= '".$city."' , `zip`= '".$zip."' , `address`= '".$address."' , `about_me`= '".$about."' WHERE `customer_id`='".$customer_id."' ";
				$result1=$con->query($sql1);
				
				if($result1==true){

					$con->close();
					return true;
				}
				else{

					$con->close();
					return false;
				}				
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllCustomers(){

			$con=$this->connect();

			$sql=" SELECT * FROM `accounts_tbl` as account INNER JOIN `customers_tbl` as customer on account.account_id=customer.customer_id ";
			$result=$con->query($sql);

			$customers=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$customers[]=$row;
				}

				$con->close();
				return $customers;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleCustomer($customer_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `accounts_tbl` as account INNER JOIN `customers_tbl` as customer on account.account_id=customer.customer_id WHERE account.account_id='".$customer_id."' ";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$customer=$row;
				}

				$con->close();
				return $customer;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function enableCustomer($customer_id){

			$con=$this->connect();

			$sql=" UPDATE `accounts_tbl` SET `status`='Active' WHERE `account_id`='".$customer_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}


		public function disableCustomer($customer_id){

			$con=$this->connect();

			$sql=" UPDATE `accounts_tbl` SET `status`='In-Active' WHERE `account_id`='".$customer_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}








		public function updateTechnician($tech_id,$first_name,$last_name,$email,$password,$contact,$country,$city,$zip,$about,$address,$background_check,$age_check,$service,$experience){

			$con=$this->connect();

			$sql=" UPDATE `accounts_tbl` SET `email`= '".$email."' , `password`= '".$password."' WHERE `account_id`='".$tech_id."' ";
			$result=$con->query($sql);

			if($result==true){

				$sql1=" UPDATE `technicians_tbl` SET `first_name`= '".$first_name."' , `last_name`= '".$last_name."' , `contact_number`= '".$contact."' , `country`= '".$country."' , `city`= '".$city."' , `address`= '".$address."' , `about_me`= '".$about."' , `background_check`= '".$background_check."' , `age_check`= '".$age_check."' , `experience`= '".$experience."' WHERE `tech_id`='".$tech_id."' ";
				$result1=$con->query($sql1);
				
				if($result1==true){

					$query=" DELETE FROM `tech_service_zip_tbl` WHERE `tech_id`='".$tech_id."' ";
					$res=$con->query($query);

					for ($i=0; $i < sizeof($zip) ; $i++) { 

						$sql2=" INSERT INTO `tech_service_zip_tbl` (`tech_id` , `zip_id`) VALUES ('".$tech_id."' , '".$zip[$i]."') ";
						$result2=$con->query($sql2);
					}

					if($result2==true){

						$query1=" DELETE FROM `tech_services_tbl` WHERE `tech_id`='".$tech_id."' ";
						$res1=$con->query($query1);

						for ($i=0; $i < sizeof($service) ; $i++) { 

							$sql3=" INSERT INTO `tech_services_tbl` (`tech_id` , `service_id`) VALUES ('".$tech_id."' , '".$service[$i]."') ";
							$result3=$con->query($sql3);
						}

						if($result3==true){
							
							$con->close();
							return true;
						}
						else{

							$con->close();
							return false;
						}
					}
					else{

						$con->close();
						return false;
					}
				}
				else{

					$con->close();
					return false;
				}				
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllTechnicians(){

			$con=$this->connect();

			$sql=" SELECT * FROM `accounts_tbl` as account INNER JOIN `technicians_tbl` as tech on account.account_id=tech.tech_id LEFT JOIN `stores_tbl` as store on tech.store_id=store.store_id ";
			$result=$con->query($sql);

			$technicians=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$technicians[]=$row;
				}

				$con->close();
				return $technicians;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllActiveTechnicians(){

			$con=$this->connect();

			$sql=" SELECT * FROM `accounts_tbl` as account INNER JOIN `technicians_tbl` as tech on account.account_id=tech.tech_id WHERE account.status='Active' && tech.store_id='0' ";
			$result=$con->query($sql);

			$technicians=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$technicians[]=$row;
				}

				$con->close();
				return $technicians;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleTechnician($tech_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `accounts_tbl` as account INNER JOIN `technicians_tbl` as tech on account.account_id=tech.tech_id WHERE account.account_id='".$tech_id."' ";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$technician=$row;
				}

				$con->close();
				return $technician;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleTechRelationWithZipCodes($tech_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `tech_service_zip_tbl` WHERE `tech_id`='".$tech_id."'  ";
			$result=$con->query($sql);

			$store=array();
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$store[]=$row;
				}

				$con->close();
				return $store;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleTechRelationWithModels($tech_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `tech_services_tbl` WHERE `tech_id`='".$tech_id."'  ";
			$result=$con->query($sql);

			$store=array();
			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$store[]=$row;
				}

				$con->close();
				return $store;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function enableTechnician($tech_id){

			$con=$this->connect();

			$sql=" UPDATE `accounts_tbl` SET `status`='Active' WHERE `account_id`='".$tech_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}


		public function disableTechnician($tech_id){

			$con=$this->connect();

			$sql=" UPDATE `accounts_tbl` SET `status`='In-Active' WHERE `account_id`='".$tech_id."' ";
			$value=$con->query($sql);

			if($value==true){
				$con->close();
				return true;
			}
			else{
				$con->close();
				return false;
			}
		}








		public function addZipCode($zip_code){

			$con=$this->connect();

			$sql=" INSERT INTO `zip_codes_tbl` (`zip_code`) VALUES ('".$zip_code."') ";
			$result=$con->query($sql);

			if($result==true){

				$con->close();
				return true;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllZipCodes(){

			$con=$this->connect();

			$sql=" SELECT * FROM `zip_codes_tbl` ";
			$result=$con->query($sql);

			$zip_codes=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$zip_codes[]=$row;
				}

				$con->close();
				return $zip_codes;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function removeZipCode($zip_id){

			$con=$this->connect();

			$sql=" DELETE FROM `zip_codes_tbl` WHERE `zip_id`='".$zip_id."' ";
			$value=$con->query($sql);

			if($value==true){

				$con->close();
				return true;				
			}
			else{
				$con->close();
				return false;
			}
		}









		public function getAllNewRepairOrders(){

			$con=$this->connect();

			// $sql=" SELECT store.store_title , customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='New' GROUP BY orders.order_id ";

			$sql=" SELECT store.store_title , orders.client_name , orders.client_contact , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='New' GROUP BY orders.order_id ";
			$result=$con->query($sql);

			$repair_orders=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$repair_orders[]=$row;
				}

				$con->close();
				return $repair_orders;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllInProgressRepairOrders(){

			$con=$this->connect();

			// $sql=" SELECT store.store_title , customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='In-Progress' GROUP BY orders.order_id ";

			$sql=" SELECT store.store_title , orders.client_name , orders.client_contact , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='In-Progress' GROUP BY orders.order_id ";

			$result=$con->query($sql);

			$repair_orders=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$repair_orders[]=$row;
				}

				$con->close();
				return $repair_orders;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllCompletedRepairOrders(){

			$con=$this->connect();

			// $sql=" SELECT store.store_title , customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='Completed' GROUP BY orders.order_id ";

			$sql=" SELECT store.store_title , orders.client_name , orders.client_contact , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='Completed' GROUP BY orders.order_id ";

			$result=$con->query($sql);

			$repair_orders=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$repair_orders[]=$row;
				}

				$con->close();
				return $repair_orders;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getAllCancelledRepairOrders(){

			$con=$this->connect();

			// $sql=" SELECT store.store_title , customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='Cancelled' GROUP BY orders.order_id ";

			$sql=" SELECT store.store_title , orders.client_name , orders.client_contact , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='Cancelled' GROUP BY orders.order_id ";

			$result=$con->query($sql);

			$repair_orders=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$repair_orders[]=$row;
				}

				$con->close();
				return $repair_orders;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleRepairOrders($order_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id WHERE orders.order_id='".$order_id."' GROUP BY orders.order_id ";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				$repair_orders=$result->fetch_assoc();

				$con->close();
				return $repair_orders;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleRepairOrderIssues($order_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id  WHERE orders.order_id='".$order_id."' ";
			$result=$con->query($sql);

			$repair_order_issues=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$repair_order_issues[]=$row;
				}

				$con->close();
				return $repair_order_issues;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getRelatedTechnicians($service_category,$zip_code){

			$con=$this->connect();

			$sql=" SELECT * FROM `technicians_tbl` as tech INNER JOIN `tech_service_zip_tbl` as tsz on tech.tech_id=tsz.tech_id WHERE tech.service='".$service_category."' && tsz.zip_code='".$zip_code."' ";
			$result=$con->query($sql);

			$technicians=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$technicians[]=$row;
				}

				$con->close();
				return $technicians;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function updateOrderStatus($order_id,$tech_id,$order_status){

			$con=$this->connect();

			$sql=" UPDATE `sales_orders_tbl` SET `order_status`='".$order_status."' , `tech_id`='".$tech_id."' WHERE `order_id`='".$order_id."' ";
			$result=$con->query($sql);

			if($result==true){

				$con->close();
				return true;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function countAllOrders(){

			$con=$this->connect();

			$sql=" SELECT count(*) as total_orders FROM `sales_orders_tbl`";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				$total_orders=$result->fetch_assoc();

				$total_orders=$total_orders['total_orders'];

				$con->close();
				return $total_orders;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getTotalRevenue(){

			$con=$this->connect();

			$sql=" SELECT sum(grand_total) as grand_total FROM `sales_orders_tbl` WHERE order_status='Completed' ";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				$grand_total=$result->fetch_assoc();

				$grand_total=$grand_total['grand_total'];

				$con->close();
				return $grand_total;
			}
			else{

				$con->close();
				return false;
			}
		}









		public function getCustomerDetails($id){

			$con=$this->connect();

			$sql=" SELECT `client_name` , `client_address` , `client_email` , `client_contact` , `client_zip_code` FROM `sales_orders_tbl` WHERE `order_id`='".$id."' ";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				$customer_data=$result->fetch_assoc();

				$con->close();
				return $customer_data;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getStoreDetails($id){

			$con=$this->connect();

			//  account.email , 

			$sql=" SELECT admin.store_admin_full_name , admin.store_admin_mobile , store.store_address , account.email FROM `sales_orders_tbl` as sale INNER JOIN `stores_tbl` as store on sale.store_id=store.store_id INNER JOIN `store_admin_stores_relation_tbl` as sasr on store.store_id=sasr.store_id INNER JOIN `stores_admin_tbl` as admin on sasr.store_admin_id=admin.store_admin_id INNER JOIN `accounts_tbl` as account on admin.store_admin_id=account.account_id WHERE sale.order_id='".$id."' ";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				$store_data=$result->fetch_assoc();

				$con->close();
				return $store_data;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getOrderDetails($id){

			$con=$this->connect();

			$sql=" SELECT sale.order_date , sale.grand_total , services.repair_type , services.brand , services.model , services.service , services.service_price FROM `sales_orders_tbl` as sale INNER JOIN `sales_services_tbl` as services on sale.order_id=services.order_id WHERE sale.order_id='".$id."' ";
			$result=$con->query($sql);

			$order_data=array();
			if($result->num_rows > 0){

				while ($row=$result->fetch_assoc()) {
					$order_data[]=$row;
				}

				$con->close();
				return $order_data;
			}
			else{

				$con->close();
				return false;
			}
		}

	}
?>