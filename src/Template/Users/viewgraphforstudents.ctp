
<?php
 $lecode = $this->request->pass[0];
 $lcode = $this->request->pass[1];
 
  $timef = $this->Custom->getstudydurationforeach($lcode)/60;

 
?>

<body style="background-color: #EEEEEE;">

<table class="table table-bordered">
  <thead>
  <?php  $ff =0;  $t =$timef ; $c=1;   ?>
													  
													  
    <tr>
	<?php foreach($this->Custom->getquizesforchart($lecode,$lcode) as $courids ) {  ?>
      <th scope="col" style="text-align:center">Level <?php echo $c; ?></th>
	  <?php 
													  $c++;
													 
													 } ?>
     
    </tr>
	
  </thead>
  <tbody>
    <tr>
	  <?php foreach($this->Custom->getquizesforchart($lecode,$lcode) as $courids ) {  ?>
	 <?php if($this->Custom->getmoodlecomplestatusfinal($courids['code'],$useridmoodle) == '<b style="color:green">Pass</b>')
													  { 
													$codefin = "&#10004;";
													//$colordocde  ='#B6D7A8';
													
													 $nn=$c*$t; 
													   $ff+=$nn;
													
													  }
													 else {
														  $codefin = "&#10060;";
													 // $colordocde  ='red';
													 }
														 ?>
      
     <td style="background-color: <?php echo $colordocde; ?>;width:200px;text-align: center;"><?php echo $codefin; ?></td>
	 <?php 
													  $c++;
													 
													 } ?>
    </tr>
	
	
	
	
  
  </tbody>
</table>


											
											<?php  $ff =0;  $t =$timef ; $c=1;   ?>
													  
													  <?php foreach($this->Custom->getquizesforchart($lecode,$lcode) as $courids ) {  ?>
                                               
													
													 <?php if($this->Custom->getmoodlecomplestatusfinal($courids['code'],$useridmoodle) == '<b style="color:green">Pass</b>')
													  { 
													$codefin = "&#10004;";
													$colordocde  ='#B6D7A8';
													
													 $nn=$c*$t; 
													   $ff+=$nn;
													
													  }
													 else {
														  $codefin = "&#10060;";
													  $colordocde  ='red';
													 }
														 ?>
													
                                                    
                                                   
                                              
												
												<?php 
													  $c++;
													 
													 } ?>
													 
													 	<?php $f =0;  $t =$timef ;    ?>
													  
													  <?php for($cc=1 ; $cc <= $lecode ; $cc++)  {  ?>
													   <?php 
													 
													  $nn=$cc*$t; 
													   $f+=$nn;
													
													 } ?>
													
												
													 <p style="font-size:20px;text-align: center;">Hours total	 :   <?php echo $this->Custom->convertTime($f); ?>       
													 | Hours remaining	 :   <?php echo $this->Custom->convertTime($f - $ff); ?></p>
                                               
                                          



						<!--<div class="progress md-progress" style="height: 20px">
    <div class="progress-bar" role="progressbar" style="width: <?php echo $f - ($f - $ff); ?>%; height: 20px" aria-valuenow="<?php echo $f - ($f - $ff); ?>" aria-valuemin="0" aria-valuemax="<?php echo $f; ?> "><?php echo $f - ($f - $ff); ?>(Hours completed)</div>
</div>		-->					   


<!--	 	 <div id="morris-donut-chart" style="height: 220px; width: 400px;"></div>-->
													 
													<?php /*
													 
													 <?= $this->Html->script('raphael.min.js') ?>
<?= $this->Html->script('morris.min.js') ?>
													 <script>
													 
													  Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Hours total",
            value: <?php echo $f; ?>   
        }, {
            label: "Hours completed",
            value: <?php echo $f - ($f - $ff); ?>
        }],
        resize: true
    });
	</script>
*/ ?>



													 
													
	

	</body>
	

