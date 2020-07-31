<!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->
<h1>ODIN Checkout</h1>
<script src="../js/jquery-3.4.1.min.js"></script> 

<?php include "../../config/myconfig.php";?>


<style>
.card {
    font-weight: 400;
    border: 0;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
}
.p-5 {
    padding: 29px!important;
}
.mt-3, .my-3 {
    margin-top: 1rem!important;
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
	//background-color: rgba(0, 0, 0, 0.3);
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
</style>

 <div class="card p-5 mt-3">

            <div class="card-body">

            <p style="font-size: 19px;">When you click on Proceed to Pay, you will be redirected to payment gateway to process your payment.</p>

<p style="font-size: 19px;">We accept all major credit cards, debit cards, wallets, UPI and net banking.</p>

<p style="font-size: 19px;">Please do not exit or refresh the page while payment is being processed.</p>

            </div>

          </div>


 <br />
<?php if(!isset($_GET['couponcode'])) { if($_GET['couponcode'] != 1) { ?>

 <div class="card p-5 mt-3">

            <div class="card-body">
			
			

            <p style="font-size: 19px;">Do you have a Coupon code? Enter it below and apply, to avail discounted price.</p>
			
			
  <input type="text" id="numberExample" class="form-control" placeholder="Enter Coupon Code">
   <input type="hidden" id="numberExamplemood" class="form-control" placeholder="Enter Coupon Code" value="<?php echo $_GET['pid']; ?>">
  
&nbsp;<a style="text-decoration: underline;cursor:pointer" onclick="getcouponcode()" >Apply</a>

<br />
<span id="coupapply"></span>

            </div>

          </div>
		  
		  <?php }  } else { ?>
		  
		  <p>Coupon code applied: <?php echo $_GET['cccode']; ?></p>
		  
		  <?php  $_SESSION['cccode']  = $_GET['cccode']; ?>
		  
		  <?php } ?>

		  <script>
		  function getcouponcode()
{
	//alert("<?php echo $_GET['pid']; ?>");
	
		var counponcode  = document.getElementById("numberExample").value;
		
		var numberExamplemood  = document.getElementById("numberExamplemood").value;
		
		//var modulesname =  document.getElementById("numberExamplemoodnnn"+aaa).value;
	
	  $.ajax({
                   type:"POST",
                   url: "<?php echo $config['MyConf']['mainurl']; ?>sms/getcouponcodes.php",
                   data:{
                        counponcode : counponcode , modulecode : numberExamplemood
                   },
                   dataType: 'json',
				   beforeSend: function() {
   // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
  },
                   success:function(response)
                    {
//alert(response);



var json = JSON.parse(JSON.stringify(response));
console.log(json);
console.log(json.name);
console.log(json.email);
 
 if(json.name == '0')
						{
						
						document.getElementById("coupapply").innerHTML="Counpon code applied";
						
						
						
						newUrl = "<?php echo $config['MyConf']['weburlmainsite']; ?>razor/pay.php?cccode="+counponcode+"&couponcode=1&type=modules&fjhqhjqew="+json.email+"&uid=<?php echo  $_SESSION['uidnee']; ?>&name=<?php echo $data['name']?>&pid="+numberExamplemood;
 //$("#getmod"+numberExamplemood).attr("href", newUrl); 
 
 window.location = newUrl;
 
						}
						else if(json.name == '1')
						{
						document.getElementById("coupapply").innerHTML="Coupon code already used by someone else.";
						

						}
						else {
						document.getElementById("coupapply").innerHTML="Coupon code doesn't exists";
							
						}
 
                    }
                });
	
}
		  </script>
<script>

function goBack() {
  window.history.back();
    $("#diagnostics").modal('hide');
}

</script>



<style>
.razorpay-payment-button{
	padding: 10px 10px 10px 10px;
    background-color: #454545 !important;
	    margin: 0.375rem;
        color: white;
    text-transform: uppercase;
    word-wrap: break-word;
    white-space: normal;
    cursor: pointer;
    border: 0;
    border-radius: 0.125rem;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  
    font-size: 0.81rem;
	font-family: sans-serif;

}
</style>




<form action="verify.php" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR" 
    data-buttontext="Proceed to pay"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id=<?php echo $_SESSION['merchant_order_id']; ?>
    data-theme.color="#F37254"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
  
  <a onclick="goBack()" title="Go back" class="razorpay-payment-button" > <i class="w-fa fas fa-backward"></i>Cancel </a>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="<?php echo $_SESSION['merchant_order_id']; ?>">
</form>
