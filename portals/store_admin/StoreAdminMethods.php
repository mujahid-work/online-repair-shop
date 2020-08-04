<?php 

include_once('../../Connection.php');
require ('../../PHPMailer/PHPMailerAutoload.php');

	class StoreAdminMethods extends Connection{


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

				if($row['role']=='Store Admin'){
					$tbl_name='stores_admin_tbl';
					$id_column='store_admin_id';
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


		public function getSingleStoreAdminRelationWithStores($store_admin_id){

			$con=$this->connect();

			$sql=" SELECT `store_id` FROM `store_admin_stores_relation_tbl` WHERE `store_admin_id`='".$store_admin_id."'  ";
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


		public function fetchMyProfile(){

			$con=$this->connect();

			$sql = "SELECT admin.* , account.email FROM `accounts_tbl` as account INNER JOIN `stores_admin_tbl` as admin on admin.store_admin_id=account.account_id WHERE account.account_id= '".$_SESSION['logged_in_id']."' ";

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
					
					$sql1=" UPDATE `stores_admin_tbl` SET `store_admin_full_name`= '".$full_name."' , `store_admin_mobile`= '".$mobile."' WHERE `store_admin_id`='".$_SESSION['logged_in_id']."' ";
					$result1=$con->query($sql1);

					$_SESSION['logged_in_name']=$full_name;
					$_SESSION['logged_in_email']=$email;
					$_SESSION['logged_in_pic']=$pic;
				}

				else{
					
					move_uploaded_file($temp_pic, "../../uploads/".$pic);

					$sql1=" UPDATE `stores_admin_tbl` SET `store_admin_full_name`= '".$full_name."' , `store_admin_mobile`= '".$mobile."' , `store_admin_pic`= '".$pic."' WHERE `store_admin_id`='".$_SESSION['logged_in_id']."' ";
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

			$sql=" SELECT * FROM `accounts_tbl` WHERE `email`= '".$email."' AND `role`= 'Store Admin' ";
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

			$sql=" SELECT * FROM `accounts_tbl` WHERE `email`='".$email."' && `role`='Store Admin' ";
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


		public function getMyStores(){

			$con=$this->connect();

			$sql=" SELECT * FROM `store_admin_stores_relation_tbl` as sasr INNER JOIN `stores_tbl` as store on sasr.store_id=store.store_id WHERE sasr.store_admin_id='".$_SESSION['logged_in_id']."'  ";
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










		public function addTechnician($first_name,$last_name,$email,$password,$contact,$country,$city,$zip,$about,$address,$store,$background_check,$age_check,$service,$experience,$pic,$temp_pic){

			$con=$this->connect();

			session_start();

			$sql=" INSERT INTO `accounts_tbl` (`email` , `password` , `role` , `status`) VALUES ('".$email."' , '".$password."' , 'Tech' , 'Active') ";
			$result=$con->query($sql);

			if($result==true){

				$last_id = $con->insert_id;

				move_uploaded_file($temp_pic, "../../uploads/".$pic);

				$sql1=" INSERT INTO `technicians_tbl` (`tech_id` , `store_id` , `first_name` , `last_name` , `contact_number` , `country` , `city` , `address` , `background_check` , `age_check` , `experience` , `about_me` , `tech_pic`) VALUES ('".$last_id."' , '".$store."' , '".$first_name."' , '".$last_name."' , '".$contact."' , '".$country."' , '".$city."' , '".$address."' , '".$background_check."' , '".$age_check."' , '".$experience."' , '".$about."' , '".$pic."') ";
				$result1=$con->query($sql1);
				
				if($result1==true){

					for ($i=0; $i < sizeof($zip) ; $i++) { 

						$sql2=" INSERT INTO `tech_service_zip_tbl` (`tech_id` , `zip_id`) VALUES ('".$last_id."' , '".$zip[$i]."') ";
						$result2=$con->query($sql2);
					}

					if($result2==true){

						for ($i=0; $i < sizeof($service) ; $i++) { 

							$sql3=" INSERT INTO `tech_services_tbl` (`tech_id` , `service_id`) VALUES ('".$last_id."' , '".$service[$i]."') ";
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


		public function updateTechnician($tech_id,$first_name,$last_name,$email,$password,$contact,$country,$city,$zip,$about,$address,$store,$background_check,$age_check,$service,$experience){

			$con=$this->connect();

			session_start();			

			$sql=" UPDATE `accounts_tbl` SET `email`= '".$email."' , `password`='".$password."' WHERE `account_id`='".$tech_id."' ";
			$result=$con->query($sql);

			if($result==true){

				$sql1=" UPDATE `technicians_tbl` SET `store_id`='".$store."' , `first_name`= '".$first_name."' , `last_name`= '".$last_name."' , `contact_number`= '".$contact."' , `country`= '".$country."' , `city`= '".$city."' , `address`= '".$address."' , `about_me`= '".$about."' , `background_check`= '".$background_check."' , `age_check`= '".$age_check."' , `experience`= '".$experience."'  WHERE `tech_id`='".$tech_id."' ";
				
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


		public function getAllMyActiveTechnicians(){

			$con=$this->connect();

			$store_ids=implode("," , $_SESSION['logged_in_store_id']);

			$sql=" SELECT * FROM `accounts_tbl` as account INNER JOIN `technicians_tbl` as tech on account.account_id=tech.tech_id WHERE account.status='Active' && tech.store_id IN ($store_ids) ";
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


		public function getAllMyTechnicians(){

			$con=$this->connect();

			$store_ids=implode("," , $_SESSION['logged_in_store_id']);

			$sql=" SELECT * FROM `accounts_tbl` as account INNER JOIN `technicians_tbl` as tech on account.account_id=tech.tech_id LEFT JOIN `stores_tbl` as store on tech.store_id=store.store_id WHERE tech.store_id IN ($store_ids) ";
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


		public function getAllIssues(){

			$con=$this->connect();

			$sql=" SELECT * FROM `services_tbl` group by `service_title` ";
			$result=$con->query($sql);

			$ssues=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$ssues[]=$row;
				}

				$con->close();
				return $ssues;
			}
			else{

				$con->close();
				return false;
			}
		}







		public function createCustomOrder($name,$email,$contact,$zip,$address,$repair_type,$brand,$model,$store,$time_slot,$time,$order_date,$order_status,$service_type,$grand_total,$new_issues,$new_prices){

			$con=$this->connect();

			$new_time_slot=$time.' , '.$time_slot;

			$sql=" INSERT INTO `sales_orders_tbl` (`store_id` , `client_name` , `client_address` , `client_email` , `client_contact` , `client_zip_code` , `time_slot` , `grand_total` , `order_date` , `order_status` , `service_type`) VALUES ('".$store."' , '".$name."' , '".$address."' , '".$email."' , '".$contact."' , '".$zip."' , '".$new_time_slot."' , '".$grand_total."' , '".$order_date."' , '".$order_status."' , '".$service_type."') ";
			$result=$con->query($sql);

			if($result==true){

				$last_id = $con->insert_id;

				for ($i=0; $i < sizeof($new_issues) ; $i++) {

					$sql1=" INSERT INTO `sales_services_tbl` (`order_id` , `repair_type` , `brand` , `model` , `service` , `service_price`) VALUES ('".$last_id."' , '".$repair_type."' , '".$brand."' , '".$model."' , '".$new_issues[$i]."' , '".$new_prices[$i]."') ";
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









		public function getAllNewRepairOrders(){

			$con=$this->connect();

			$store_ids=implode("," , $_SESSION['logged_in_store_id']);

			// $sql=" SELECT store.store_title , customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='New' AND orders.store_id IN ($store_ids) GROUP BY orders.order_id ";

			$sql=" SELECT store.store_title , orders.client_name , orders.client_contact , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='New' AND orders.store_id IN ($store_ids) GROUP BY orders.order_id ";

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

			$store_ids=implode("," , $_SESSION['logged_in_store_id']);

			// $sql=" SELECT store.store_title , customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='In-Progress' AND orders.store_id IN ($store_ids) GROUP BY orders.order_id ";

			$sql=" SELECT store.store_title , orders.client_name , orders.client_contact , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='In-Progress' AND orders.store_id IN ($store_ids) GROUP BY orders.order_id ";

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

			$store_ids=implode("," , $_SESSION['logged_in_store_id']);

			// $sql=" SELECT store.store_title , customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='Completed' AND orders.store_id IN ($store_ids) GROUP BY orders.order_id ";

			$sql=" SELECT store.store_title , orders.client_name , orders.client_contact , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='Completed' AND orders.store_id IN ($store_ids) GROUP BY orders.order_id ";

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

			$store_ids=implode("," , $_SESSION['logged_in_store_id']);

			// $sql=" SELECT store.store_title , customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='Cancelled' AND orders.store_id IN ($store_ids) GROUP BY orders.order_id ";

			$sql=" SELECT store.store_title , orders.client_name , orders.client_contact , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id LEFT JOIN `stores_tbl` as store on orders.store_id=store.store_id WHERE orders.order_status='Completed' AND orders.store_id IN ($store_ids) GROUP BY orders.order_id ";

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

			// $sql=" SELECT * FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id INNER JOIN`accounts_tbl` as account on customer.customer_id=account.account_id  WHERE orders.order_id='".$order_id."' GROUP BY orders.order_id ";

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


		public function updateOrderStatus($order_id,$order_status,$tech_id){

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


		public function countAllNewOrders(){

			$con=$this->connect();

			$store_ids=implode("," , $_SESSION['logged_in_store_id']);

			$sql=" SELECT count(*) as total_orders FROM `sales_orders_tbl` WHERE `order_status`='New' AND `store_id` IN ($store_ids) ";
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


		public function countAllInProgressOrders(){

			$con=$this->connect();

			$store_ids=implode("," , $_SESSION['logged_in_store_id']);

			$sql=" SELECT count(*) as total_orders FROM `sales_orders_tbl` WHERE `order_status`='In-Progress' AND `store_id` IN ($store_ids) ";
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


		public function countAllCompletedOrders(){

			$con=$this->connect();

			$store_ids=implode("," , $_SESSION['logged_in_store_id']);

			$sql=" SELECT count(*) as total_orders FROM `sales_orders_tbl` WHERE `order_status`='Completed' AND `store_id` IN ($store_ids) ";
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


		public function countAllCancelledOrders(){

			$con=$this->connect();

			$store_ids=implode("," , $_SESSION['logged_in_store_id']);

			$sql=" SELECT count(*) as total_orders FROM `sales_orders_tbl` WHERE `order_status`='Cancelled' AND `store_id` IN ($store_ids) ";
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










		public function addPart($title,$price,$qty,$min_qty,$store,$description,$pic,$temp_pic){

			$con=$this->connect();

			move_uploaded_file($temp_pic, "../../uploads/".$pic);

			$sql=" INSERT INTO `parts_tbl` (`store_id` , `part_title` , `unit_cost` , `qty` , `min_qty` , `part_description` , `part_pic`) VALUES ('".$store."' , '".$title."' , '".$price."' , '".$qty."' , '".$min_qty."' , '".$description."' , '".$pic."') ";
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


		public function getAllParts(){

			$con=$this->connect();


			$store_ids=implode("," , $_SESSION['logged_in_store_id']);
			

			$sql=" SELECT * FROM `parts_tbl` WHERE `store_id` IN ($store_ids) ";
			$result=$con->query($sql);

			$parts=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$parts[]=$row;
				}

				$con->close();
				return $parts;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getLowQtyParts(){

			$con=$this->connect();


			$store_ids=implode("," , $_SESSION['logged_in_store_id']);
			

			$sql=" SELECT `part_title` , `qty` FROM `parts_tbl` WHERE `qty` < `min_qty` AND `store_id` IN ($store_ids) ";
			$result=$con->query($sql);

			$parts=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$parts[]=$row;
				}

				$con->close();
				return $parts;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSinglePart($part_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `parts_tbl` WHERE `part_id`='".$part_id."' ";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				$part=$result->fetch_assoc();

				$con->close();
				return $part;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function updatePart($part_id,$title,$price,$qty,$min_qty,$store,$description,$pic,$temp_pic){

			$con=$this->connect();					

			if($pic=="" || $temp_pic==""){
				
				$sql=" UPDATE `parts_tbl` SET `store_id`= '".$store."' , `part_title`= '".$title."' , `unit_cost`= '".$price."' , `qty`= '".$qty."' , `min_qty`= '".$min_qty."' , `part_description`= '".$description."' WHERE `part_id`='".$part_id."' ";
				$result=$con->query($sql);
			}

			else{
				
				move_uploaded_file($temp_pic, "../../uploads/".$pic);

				$sql=" UPDATE `parts_tbl` SET `store_id`= '".$store."' , `part_title`= '".$title."' , `unit_cost`= '".$price."' , `qty`= '".$qty."' , `min_qty`= '".$min_qty."' , `part_description`= '".$description."' , `part_pic`= '".$pic."' WHERE `part_id`='".$part_id."' ";
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










		public function addJob($title,$store,$about,$city,$state,$requirments,$benefit,$additional){

			$con=$this->connect();

			$date=date("l jS \of F Y");

			$sql=" INSERT INTO `jobs_tbl` (`store_id` , `job_title` , `about_company` , `job_city` , `job_state` , `job_requirements` , `job_key_benefits` , `job_additional_description` ,`posted_on`) VALUES ('".$store."' , '".$title."' , '".$about."' , '".$city."' , '".$state."' , '".$requirments."' , '".$benefit."' , '".$additional."' , '".$date."') ";
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



		public function getAllJobs(){

			$con=$this->connect();


			$store_ids=implode("," , $_SESSION['logged_in_store_id']);
			

			$sql=" SELECT * FROM `jobs_tbl` as job INNER JOIN `stores_tbl` as store on job.store_id=store.store_id WHERE job.store_id IN ($store_ids) ";
			$result=$con->query($sql);

			$jobs=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$jobs[]=$row;
				}

				$con->close();
				return $jobs;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getSingleJob($job_id){

			$con=$this->connect();			

			$sql=" SELECT * FROM `jobs_tbl` as job INNER JOIN `stores_tbl` as store on job.store_id=store.store_id WHERE job.job_id='".$job_id."' ";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				$job=$result->fetch_assoc();

				$con->close();
				return $job;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function updateJob($job_id,$title,$store,$about,$city,$state,$requirments,$benefit,$additional){

			$con=$this->connect();
				
				$sql=" UPDATE `jobs_tbl` SET `store_id`= '".$store."' , `job_title`= '".$title."' , `about_company`= '".$about."' , `job_city`= '".$city."' , `job_state`= '".$state."' , `job_requirements`= '".$requirments."' , `job_key_benefits`= '".$benefit."' , `job_additional_description`= '".$additional."' WHERE `job_id`='".$job_id."' ";
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


		public function deleteJob($job_id){

			$con=$this->connect();
				
				$sql=" DELETE FROM `jobs_tbl` WHERE `job_id`='".$job_id."' ";
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