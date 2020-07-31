<?php

require('config.php');
include_once './vendor/autoload.php';
session_start();
error_reporting(0);
include "../../config/myconfig.php";
// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);


  include_once 'config/Database.php';
    // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

 $uid = $database->decrypt($_GET['uid']);


 
   $price = $database->decrypt($_GET['fjhqhjqew']);
 

 
  $_SESSION['uid']  = $uid;
 $_SESSION['product_code']  = $_GET['pid'];
  $_SESSION['product_name']  = $_GET['name'];
$_SESSION['type']  = $_GET['type'];
$_SESSION['ddd']  = $_GET['ddd'];


 $_SESSION['uidnee']  = $_GET['uid'];

  $query1 = "SELECT * from paymentdetails WHERE userid ='".$uid."' and productcode ='".$_GET['pid']."'";


      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt1 = $db->prepare($query1);
	  
	  $stmt1->execute(); 
$number_of_rows = $stmt1->fetchColumn(); 

    
	//echo $number_of_rows;	  
		 
		
if($number_of_rows > 0)
{
	echo "Product has already been purchased. Please refresh the page to view the invoice.";
	exit;
}

  
        $query = "SELECT * from users WHERE id ='".$uid."'";


      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $db->prepare($query);

      // Execute query
      $stmt->execute();
	

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

      



//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//

$_SESSION['merchant_order_id']  = $_GET['pid'] . $uid;

$orderData = [
    'receipt'         => $_SESSION['merchant_order_id'] ,
    'amount'          => $price *100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];


$_SESSION['displayAmount'] = $price;


$checkout = 'automatic';


if($_GET['type']=='modules') {

$row111 = array('pid' => $_GET['pid']);
$data = json_encode($row111);
 $options1 = array(
        'http' => array(
        'header' => "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'ims/getmodiuledescrip.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		 $getdesc =  $topiccodes[0]['description'];
}
else{
	$getdesc = "";
}
	
	


$data = [
 "getdesc"               => $getdesc,
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $_GET['name'],
    "description"       => "",
    "image"             => "http://www.odinlearning.in/razor/img/ODINlogo.jpg",
    "prefill"           => [
    "name"              => $row['fname'].'  '. $row['lname'],
    "email"             => $row['email'],
    "contact"           => $row['phonenumber'],
    ],
    "notes"             => [
    "address"           => $row['address'],
    "merchant_order_id" => $_SESSION['merchant_order_id'] ,
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];


$json = json_encode($data);


  



/* $row = array('pid' => $_GET['pid']);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents('https://api.odinlearning.in/ims/getmodiuledescrip.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		echo $getdesc =  $topiccodes[0]['description'];*/
		
	

require("{$checkout}.php");
