
   <?= $this->Html->css('mdb.css') ?>
   <?php include('scriptfiles.ctp'); ?>

  <?php include('functionsscript.ctp'); ?>
  <?php include('customcss.css'); ?>
 
<body class="fixed-sn white-skin" >

  <header>
  
    </header>
  <!-- Main Navigation -->

  <!-- Main layout -->
  <main>
  
  
  

    <div class="container-fluid">
	
	   <div class="row mb-4">
	  <?php foreach($comlistforstudentprofiule as $eachele) { ?>
	 
	   <!-- Grid column -->
          <div class="col-lg-4 col-md-4 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header blue">
                <h5 class="mb-0">	<?php echo $eachele['name']; ?></h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
			 

                 <span class="min-chart my-3" id="chart-sales" data-percent="<?php echo $eachele['percentge']; ?>"><span class="percent"></span></span>
												

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->
		    <?php } ?>  
			
			</div>
	 
												   
							
	
	 </div>
  </main>
  
  <footer>
  
  </footer>
<!-- Footer -->
<!-- Footer -->
  <!-- Footer -->
  <script>
   //minimalist
    $(function () {
      $('.min-chart#chart-sales').easyPieChart({
        barColor: "#4caf50",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });
	   });
   </script>
  
</body>