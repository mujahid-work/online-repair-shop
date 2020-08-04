<?php 

include_once('Connection.php');

	class MethodsClass extends Connection{


		public function cssLinks(){

			$css='';			
			$css.='<link href="assets/img/favicon.png" rel="icon">';
			$css.='<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">';
			$css.='<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">';
			$css.='<link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
			$css.='<link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">';
			$css.='<link href="assets/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">';
			$css.='<link href="assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">';
			$css.='<link href="assets/lib/animate/animate.min.css" rel="stylesheet">';
			$css.='<link href="assets/lib/modal-video/css/modal-video.min.css" rel="stylesheet">';
			$css.='<link href="assets/css/style.css" rel="stylesheet">';
			$css.='<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">';
			$css.='<link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">';
			// $css.='<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">';
    
			
			return $css;
		}


		public function jsLinks(){
			
			$js='';			
			$js.='<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>';
			$js.='<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>';
			$js.='<script src="assets/lib/superfish/hoverIntent.js"></script>';
			$js.='<script src="assets/lib/superfish/superfish.min.js"></script>';
			$js.='<script src="assets/lib/easing/easing.min.js"></script>';
			$js.='<script src="assets/lib/modal-video/js/modal-video.js"></script>';
			$js.='<script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>';
			$js.='<script src="assets/lib/wow/wow.min.js"></script>';
			$js.='<script src="assets/js/main.js"></script>';
			// $js.='<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>';
			// $js.='<script src="src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js""></script>';
			
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

				if($row['role']=='Customer'){
					$tbl_name='customers_tbl';
					$id_column='customer_id';
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


		public function addCustomer($first_name,$last_name,$email,$password,$contact,$country,$address,$city,$zip){

			$con=$this->connect();

			$sql=" INSERT INTO `accounts_tbl` (`email` , `password` , `role` , `status`) VALUES ('".$email."' , '".$password."' , 'Customer' , 'Active') ";
			$result=$con->query($sql);

			if($result==true){

				$last_id = $con->insert_id;

				$sql1=" INSERT INTO `customers_tbl` (`customer_id` , `first_name` , `last_name` , `contact_number` , `country` , `city` , `zip` , `address`) VALUES ('".$last_id."' , '".$first_name."' , '".$last_name."' , '".$contact."' , '".$country."' , '".$city."' , '".$zip."' , '".$address."') ";
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









		public function techLoginValidate($email,$password) {

			$con=$this->connect();

			$email=stripslashes($email);
	        $password=stripslashes($password);
	        
			$email=mysqli_real_escape_string($con,$email);
	        $password=mysqli_real_escape_string($con,$password);

			$sql=" SELECT * FROM `accounts_tbl` WHERE `email`= '".$email."' AND `password`= '".$password."' AND `status`= 'Active' ";
			$result=$con->query($sql);

			if($result->num_rows>0){

				$row=$result->fetch_assoc();

				if($row['role']=='Tech'){
					$tbl_name='technicians_tbl';
					$id_column='tech_id';
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


		public function addTechnician($first_name,$last_name,$email,$password,$contact,$country,$city,$zip,$address,$background_check,$age_check,$service,$experience,$file,$temp_file){

			$con=$this->connect();

			$sql=" INSERT INTO `accounts_tbl` (`email` , `password` , `role` , `status`) VALUES ('".$email."' , '".$password."' , 'Tech' , 'In-Active') ";
			$result=$con->query($sql);

			if($result==true){

				$last_id = $con->insert_id;

				move_uploaded_file($temp_file, "uploads/".$file);

				$sql1=" INSERT INTO `technicians_tbl` (`tech_id` , `first_name` , `last_name` , `contact_number` , `country` , `city` , `address` , `background_check` , `age_check` , `experience` , `tech_cv`) VALUES ('".$last_id."' , '".$first_name."' , '".$last_name."' , '".$contact."' , '".$country."' , '".$city."' , '".$address."' , '".$background_check."' , '".$age_check."' , '".$experience."' , '".$file."') ";
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


		public function applyForJob($store_id,$first_name,$last_name,$email,$password,$contact,$country,$city,$zip,$address,$background_check,$age_check,$service,$experience,$file,$temp_file){

			$con=$this->connect();

			$sql=" INSERT INTO `accounts_tbl` (`email` , `password` , `role` , `status`) VALUES ('".$email."' , '".$password."' , 'Tech' , 'In-Active') ";
			$result=$con->query($sql);

			if($result==true){

				$last_id = $con->insert_id;

				move_uploaded_file($temp_file, "uploads/".$file);

				$sql1=" INSERT INTO `technicians_tbl` (`tech_id` , `store_id` , `first_name` , `last_name` , `contact_number` , `country` , `city` , `address` , `background_check` , `age_check` , `experience` , `tech_cv`) VALUES ('".$last_id."' ,'".$store_id."' , '".$first_name."' , '".$last_name."' , '".$contact."' , '".$country."' , '".$city."' , '".$address."' , '".$background_check."' , '".$age_check."' , '".$experience."' , '".$file."') ";
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









		public function getAllRepairTypes(){

			$con=$this->connect();

			$sql=" SELECT * FROM `repair_types_tbl` where `repair_status`='Active' ";
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


		public function getSingleRepairTypePrices($repair_type){

			$con=$this->connect();

			$sql=" SELECT service.service_title , msr.price from services_tbl as service INNER JOIN models_services_relation_tbl as msr on msr.service_id=service.service_id WHERE msr.repair_id='".$repair_type."' GROUP BY service.service_title order by msr.repair_id ";
			$result=$con->query($sql);

			$repair_type_prices=array();

			if($result->num_rows > 0){

				while($row=$result->fetch_assoc()){

					$repair_type_prices[]=$row;
				}

				$con->close();
				return $repair_type_prices;
			}
			else{

				$con->close();
				return false;
			}
		}


		public function getRepairRelatedBrands($repair_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `brands_tbl` as brand INNER JOIN `repair_brand_relation_tbl` as rbr on brand.brand_id=rbr.brand_id WHERE rbr.repair_id='".$repair_id."' ";
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


		public function getBrandRelatedModels($brand_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `models_tbl` as model INNER JOIN `brand_models_relation_tbl` as bmr on model.model_id=bmr.model_id WHERE bmr.brand_id='".$brand_id."' AND bmr.repair_id='".$_SESSION['repair_id']."' ";

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


		public function getModelRelatedServices($model_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `services_tbl` as service INNER JOIN `models_services_relation_tbl` as msr on service.service_id=msr.service_id WHERE msr.model_id='".$model_id."' AND msr.repair_id='".$_SESSION['repair_id']."' ";

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


		public function checkZipCode($zip_code,$service_id,$model_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `zip_codes_tbl` as zip INNER JOIN `zip_services_relation_tbl` as zsr on zip.zip_id=zsr.zip_id INNER JOIN `tech_service_zip_tbl` as tsz on zsr.zip_id=tsz.zip_id INNER JOIN `tech_services_tbl` as ts on tsz.tech_id=ts.tech_id WHERE zip.zip_code='".$zip_code."' AND zsr.service_id='".$service_id."' AND ts.service_id='".$model_id."' ";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				$con->close();
				return true;
			}
			else{
				
				$con->close();
				return false;
			}
		}


		public function checkStoreAvailabilty($zip_code,$model_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `zip_codes_tbl` as zip INNER JOIN `store_zip_relation_tbl` as szr on zip.zip_id=szr.zip_id INNER JOIN `store_models_relation_tbl` as smr on szr.store_id=smr.store_id INNER JOIN `stores_tbl` as store on szr.store_id=store.store_id INNER JOIN `models_tbl` as model on smr.model_id=model.model_id WHERE zip.zip_code='".$zip_code."' && model.model_id='".$model_id."' ";
			$result=$con->query($sql);

			if($result->num_rows > 0){

				$con->close();
				return true;
			}
			else{
				
				$con->close();
				return false;
			}
		}


		public function getAvailableStores($zip_code,$model_id){

			$con=$this->connect();

			$sql=" SELECT * FROM `zip_codes_tbl` as zip INNER JOIN `store_zip_relation_tbl` as szr on zip.zip_id=szr.zip_id INNER JOIN `store_models_relation_tbl` as smr on szr.store_id=smr.store_id INNER JOIN `stores_tbl` as store on szr.store_id=store.store_id INNER JOIN `models_tbl` as model on smr.model_id=model.model_id WHERE zip.zip_code='".$zip_code."' && model.model_id='".$model_id."' ";
			$result=$con->query($sql);

			$available_stores=array();

			if($result->num_rows > 0){

				while ($row=$result->fetch_assoc()) {
					$available_stores[]=$row;
				}

				$con->close();
				return $available_stores;
			}
			else{
				
				$con->close();
				return false;
			}
		}









		public function insertOrderDetails($client_id,$client_name,$client_address,$client_email,$client_contact,$client_zip_code,$date,$time_slot,$grand_total,$order_date,$order_status,$repair_type,$brand,$model,$service_type,$store_id,$services,$service_prices){

			$con=$this->connect();

			$new_time_slot=$date.' , '.$time_slot;

			$sql=" INSERT INTO `sales_orders_tbl` (`client_id` , `store_id` , `client_name` , `client_address` , `client_email` , `client_contact` , `client_zip_code` , `time_slot` , `grand_total` , `order_date` , `order_status` , `service_type`) VALUES ('".$client_id."' , '".$store_id."' , '".$client_name."' , '".$client_address."' , '".$client_email."' , '".$client_contact."' , '".$client_zip_code."' , '".$new_time_slot."' , '".$grand_total."' , '".$order_date."' , '".$order_status."' , '".$service_type."') ";
			$result=$con->query($sql);

			if($result==true){

				$last_id = $con->insert_id;

				for ($i=0; $i < sizeof($services) ; $i++) {

					$sql1=" INSERT INTO `sales_services_tbl` (`order_id` , `repair_type` , `brand` , `model` , `service` , `service_price`) VALUES ('".$last_id."' , '".$repair_type."' , '".$brand."' , '".$model."' , '".$services[$i]."' , '".$service_prices[$i]."') ";
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










		public function getAllJobs(){

			$con=$this->connect();			

			$sql=" SELECT * FROM `jobs_tbl` as job INNER JOIN `stores_tbl` as store on job.store_id=store.store_id ORDER BY job.job_id DESC ";
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


	}
?>