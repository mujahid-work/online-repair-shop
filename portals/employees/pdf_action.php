<?php

	include_once('EmployeeMethods.php');
  	$obj=new EmployeeMethods();

  	if(isset($_GET['order_id'])){
        $id=$_GET['order_id'];
    }

    $id;

    $customer_data=$obj->getCustomerDetails($id);
    $store_data=$obj->getStoreDetails($id);
    $order_data=$obj->getOrderDetails($id);

    // print_r($order_data);exit();
	
	ob_start();
	require_once('pdf_view.php');
	$html=ob_get_clean();

	require_once('../dompdf/autoload.inc.php');
	use Dompdf\Dompdf;

	$document = new Dompdf();


	$document->loadHtml($html);
	$document->setPaper('A4','portrait');
	$document->render();
	$document->stream("Recipt#".$id,array("Attachment"=>0));

?>