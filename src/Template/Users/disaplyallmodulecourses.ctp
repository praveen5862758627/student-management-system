   <?= $this->Html->css('mdb.css') ?>
<body class="fixed-sn white-skin"  style="background-color: #ffff;">
<?php include('scriptfiles.ctp'); ?>

  
  
  

    <div class="container-fluid">
	      <div class="row">

<?php foreach($topiccodes['data'] as $allmodulesdis) { ?>

<?php 



//if($this->Custom->getmodulesenables($allmodulesdis['code'],$this->request->getSession()->read('sessionname')) == 0) {
 ?>



          <!-- Grid column -->
          <div class="col-xl-3 col-md-4 mb-xl-0 mb-4" style="margin-bottom: 46px!important;
">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
              <!--  <i class="fas fa-shopping-cart warning-color mr-3 z-depth-2"></i>-->
                <div class="data" style="float: left;  text-align: left;">
                  <p class="text-uppercase"><?php echo $allmodulesdis['name']; ?></p>
                  <h4 class="font-weight-bold dark-grey-text">₹<?php echo $allmodulesdis['price']; ?></h4>
                </div>
              </div>

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                
                <p class="card-text"></p>
				
				  <a class="btn btn-unique" href="displayaddondeatilsnew/<?php echo $allmodulesdis['id']; ?>"   style="padding: 10px 10px 10px 10px;background-color:#454545 !important">Details</a>
						 <?php echo $allmodulesdis['bynowbuttn']; ?>
				
              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->
		  <?php //} ?>
		  
		  <?php } ?>
		  
		  </div>
	
	
	
	</div>
	
   <div id="diagnostics" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width:75%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
        <h4 class="modal-title" id="titlefiorpreference"></h4>
      </div>
      <div class="modal-body">
	 <iframe  id="iframepreferences" width="100%" height="800" frameBorder="0" class="holds-the-iframe" ></iframe>
	    
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default btn-default-another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div> 
	

	</body>