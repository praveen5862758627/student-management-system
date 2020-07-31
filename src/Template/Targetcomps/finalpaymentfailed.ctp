<p>No records found to add modules to the learning plan.</p>
<style>
.razorpay-payment-button{
	padding: 10px 10px 10px 10px;
    background-color: #454545 !important;
	    margin: 0.375rem;
        color: white !important;
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
<script>
function goBack() {
  window.location.assign("<?php echo Configure::read('MyConf.weburlmainsite');?>users/disaplyalladdoncourses")
 
 
}
function goBack1() {
  window.location.assign("<?php echo Configure::read('MyConf.weburlmainsite');?>users/disaplyallmodulecourses")
 
 
}
</script>



<?php if($this->request->getSession()->read('modulestype') == 'addon') { ?>


<a onclick="goBack()" title="Go back" class="razorpay-payment-button" > Go back </a>
 <?php } else { ?>

<a onclick="goBack1()" title="Go back" class="razorpay-payment-button" > Go back </a>
<?php } ?>