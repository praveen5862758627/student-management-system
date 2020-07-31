<?php

require('config.php');
include "../../config/myconfig.php";

session_start();

include_once './vendor/autoload.php';
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

  include_once 'config/Database.php';
    // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();


if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
   
            /* <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
			   <p>Order ID: {$_SESSION['razorpay_order_id']}</p>
			      <p>merchant_order_id: {$_SESSION['merchant_order_id']}</p>";*/
				  
				  
				    // Create query
          $query = 'INSERT INTO paymentdetails SET durartion = :durartion,userid = :userid, productcode = :productcode, productname = :productname, razorpay_payment_id = :razorpay_payment_id,razorpay_order_id= :razorpay_order_id,merchant_order_id = :merchant_order_id , datetime = :datetime , price = :price , type = :type';

          // Prepare statement
          $stmt =  $db->prepare($query);

          // Clean data
          $userid = htmlspecialchars(strip_tags($_SESSION['uid']));
          $productcode = htmlspecialchars(strip_tags($_SESSION['product_code']));
          $productname = htmlspecialchars(strip_tags($_SESSION['product_name']));
          $razorpay_payment_id = htmlspecialchars(strip_tags($_POST['razorpay_payment_id']));
		  
		         $razorpay_order_id = htmlspecialchars(strip_tags($_SESSION['razorpay_order_id']));
				 
				        $merchant_order_id = htmlspecialchars(strip_tags($_SESSION['merchant_order_id']));
						
						$price = htmlspecialchars(strip_tags($_SESSION['displayAmount']));
						$type = htmlspecialchars(strip_tags($_SESSION['type']));
						
						$ddd = htmlspecialchars(strip_tags($_SESSION['ddd']));
					
					
						
						date_default_timezone_set('Asia/Kolkata');
						$datetime = date("Y-m-d h:i a");
	

          // Bind data
          $stmt->bindParam(':userid', $userid);
          $stmt->bindParam(':productcode', $productcode);
          $stmt->bindParam(':productname', $productname);
          $stmt->bindParam(':razorpay_payment_id', $razorpay_payment_id);
		        $stmt->bindParam(':razorpay_order_id', $razorpay_order_id);
				      $stmt->bindParam(':merchant_order_id', $merchant_order_id);
					    $stmt->bindParam(':datetime', $datetime);
							    $stmt->bindParam(':price', $price);
								  $stmt->bindParam(':durartion', $ddd);
								   $stmt->bindParam(':type', $type);

          // Execute query
          if($stmt->execute()) {
          //  $html = "<p>Your payment was successful</p>";
		  
		  ?>
		 
		
<!--  <img id="loading-image" src="https://testsms.odinlearning.in/img/ajax-loading.gif" alt="Loading..." />-->

		<p>Sending payment informations to ODIN. Please wait...</p>
		  
		  <script>
window.location = "<?php echo $config['MyConf']['weburlmainsite']; ?>users/paymentsuccess?code=<?php echo $merchant_order_id; ?>&pid=<?php echo $_SESSION['product_code']; ?>&type=<?php echo $type; ?>";



</script>
		
			
			
			 
			<?php
   die();
      }
			   
			   
			  
}
else
{
	$html = "<p>Your payment failed</p>";
   // $html = "<p>Your payment failed</p>
            // <p>{$error}</p>";
}

echo $html;
