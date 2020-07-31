<?= $this->Html->css('mdb.css') ?>
<div class="card">
  <div class="card-body">
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
<script>
function goBack() {
   window.history.back();
}
</script>

    <!-- Shopping Cart table -->
    <div class="table-responsive">
<a onclick="goBack()" title="Go back" class="razorpay-payment-button" > <i class="w-fa fas fa-backward"></i>Go Back </a>
<br />
<br />

      <table class="table product-table" id="example" data-order="[]">

        <!-- Table head -->
        <thead class="mdb-color lighten-5" >
		

		
          <tr>
            <th></th>
            <th class="font-weight-bold">
              <strong>Product</strong>
            </th>
            <th class="font-weight-bold">
              <strong>Order ID</strong>
            </th>
         
            <th class="font-weight-bold">
              <strong>Purchase Date</strong>
            </th>
            <th class="font-weight-bold">
              <strong>QTY</strong>
            </th>
			
			 <th class="font-weight-bold">
              <strong>Valid Till</strong>
            </th>
            <th class="font-weight-bold">
              <strong>Amount(INR)</strong>
            </th>
         
          </tr>
        </thead>
        <!-- /.Table head -->

        <!-- Table body -->
        <tbody>
		<?php  $totalam = 0.00;

		foreach($getpaymentdetails as $det) {   ?>
          <!-- First row -->
          <tr>
          <tr>
            <td scope="row">
              <img src="https://www.odinlearning.in/razor/img/ODINlogo.jpg" alt="" class="img-fluid z-depth-0" width="70px">
            </td>
             <td><?php echo $det['productname']; ?></td>
            <td>  <?php echo $det['merchant_order_id']; ?></td>
         
            <td>  <?php echo date('d/m/Y', strtotime($det['datetime'])) ; ?></td>
            <td>
               <strong>1</strong>
            </td>
			 <td>
               <strong style="color:red"><?php echo $effectiveDate = date('d/m/Y', strtotime("+12 months", strtotime(date('Y-m-d', strtotime($det['datetime']))))); ?></strong>
            </td>
            <td class="font-weight-bold">
              <strong><?php echo number_format((float)$det['price'], 2, '.', ''); ?></strong>
            </td>
          
          </tr>
         
  

         
		  
		   <?php   $totalam +=$det['price'];
		   
		   } ?>
		   
		    <!-- Fourth row -->
          <tr>
		    <td></td>
  <td></td>
  <td></td>
  <td></td>  
 
            <td></td>
            <td>
              <h4 class="mt-2">
                <strong>Total =</strong>
              </h4>
            </td>
            <td >
              <h4 class="mt-2">
                <strong><?php echo number_format((float)$totalam, 2, '.', ''); ?></strong>
				
              </h4>
            </td>
       
          </tr>
          <!-- Fourth row -->

        </tbody>
        <!-- /.Table body -->

      </table>

    </div>
    <!-- /.Shopping Cart table -->

  </div>

</div>

	<script>
	
	$(document).ready(function() {
    $('#example').DataTable( {
	  "searching": false,
	  "paging":   false,
        "ordering": false,
        "info":     false,
        dom: 'Bfrtip',
        buttons: [
             'pdf', 'print'
        ]
    } );
} );
</script>




