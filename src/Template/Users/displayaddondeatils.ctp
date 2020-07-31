<script>
function goBack() {
  window.history.back();
}
</script>
<style>
.razorpay-payment-button{
	padding: 10px 10px 5px 10px;
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
  
	<?= $this->Html->css('mdb.css') ?>


	<body style="background-color: white;">
   <main>
     <div class="container-fluid">


	 <a onclick="goBack()" title="Go back" class="razorpay-payment-button" > <i class="w-fa fas fa-backward"></i>Go Back </a>
	 <br />
	 <br />
	 
	 
	  
  <div class="col-md-12 col-lg-12 col-xl-12">
  
  <h3><?php echo $name; ?></h3>
  
  <p><?php echo $getdesc; ?></p>
  
  
  </div>
  </div>
  
  </main>
  </body>
