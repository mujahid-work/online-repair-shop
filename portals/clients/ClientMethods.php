<?php 

include_once('../../Connection.php');

	class ClientMethods extends Connection{


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

		public function updateCustomerPassword($current_pass,$new_pass){

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

		public function updateCustomer($first_name,$last_name,$email,$contact,$country,$address,$city,$zip,$about,$pic,$temp_pic){

			$con=$this->connect();
			session_start();

			$sql=" UPDATE `accounts_tbl` SET `email`= '".$email."' WHERE `account_id`='".$_SESSION['logged_in_id']."' ";
			$result=$con->query($sql);

			if($result==true){

				if($pic=="" || $temp_pic=""){

					$sql1=" UPDATE `customers_tbl` SET `first_name`= '".$first_name."' , `last_name`= '".$last_name."' , `contact_number`= '".$contact."' , `country`= '".$country."' , `city`= '".$city."' , `zip`= '".$zip."' , `address`= '".$address."' , `about_me`= '".$about."' WHERE `customer_id`='".$_SESSION['logged_in_id']."' ";
				}
				else{

					$sql1=" UPDATE `customers_tbl` SET `first_name`= '".$first_name."' , `last_name`= '".$last_name."' , `contact_number`= '".$contact."' , `country`= '".$country."' , `city`= '".$city."' , `zip`= '".$zip."' , `address`= '".$address."' , `about_me`= '".$about."' , `customer_pic`='".$pic."' WHERE `customer_id`='".$_SESSION['logged_in_id']."' ";
				}

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

		public function getSingleCustomer(){

			$con=$this->connect();

			$sql=" SELECT * FROM `accounts_tbl` as account INNER JOIN `customers_tbl` as customer on account.account_id=customer.customer_id WHERE account.account_id='".$_SESSION['logged_in_id']."' ";
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

		public function getAllNewRepairOrders(){

			$con=$this->connect();

			$sql=" SELECT customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id WHERE orders.order_status='New' AND orders.client_id='".$_SESSION['logged_in_id']."' GROUP BY orders.order_id ";
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

			$sql=" SELECT customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id WHERE orders.order_status='In-Progress' AND orders.client_id='".$_SESSION['logged_in_id']."' GROUP BY orders.order_id ";
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

			$sql=" SELECT customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id WHERE orders.order_status='Completed' AND orders.client_id='".$_SESSION['logged_in_id']."' GROUP BY orders.order_id ";
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

			$sql=" SELECT customer.first_name , customer.last_name , customer.contact_number , orders.order_id , orders.grand_total , orders.order_date , orders.service_type , services.repair_type FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id WHERE orders.order_status='Cancelled' AND orders.client_id='".$_SESSION['logged_in_id']."' GROUP BY orders.order_id ";
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

			$sql=" SELECT * FROM `sales_orders_tbl` as orders INNER JOIN `sales_services_tbl` as services on orders.order_id=services.order_id INNER JOIN `customers_tbl` as customer on orders.client_id=customer.customer_id INNER JOIN`accounts_tbl` as account on customer.customer_id=account.account_id  WHERE orders.order_id='".$order_id."' GROUP BY orders.order_id ";
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

		public function updateOrderStatus($order_id,$order_status){

			$con=$this->connect();

			$sql=" UPDATE `sales_orders_tbl` SET `order_status`='".$order_status."' WHERE `order_id`='".$order_id."' ";
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

		public function countAllNewOrders(){

			$con=$this->connect();

			$sql=" SELECT count(*) as total_orders FROM `sales_orders_tbl` WHERE `order_status`='New' AND `client_id`='".$_SESSION['logged_in_id']."' ";
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

			$sql=" SELECT count(*) as total_orders FROM `sales_orders_tbl` WHERE `order_status`='In-Progress' AND `client_id`='".$_SESSION['logged_in_id']."' ";
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

			$sql=" SELECT count(*) as total_orders FROM `sales_orders_tbl` WHERE `order_status`='Completed' AND `client_id`='".$_SESSION['logged_in_id']."' ";
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

			$sql=" SELECT count(*) as total_orders FROM `sales_orders_tbl` WHERE `order_status`='Cancelled' AND `client_id`='".$_SESSION['logged_in_id']."' ";
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
	}
?>