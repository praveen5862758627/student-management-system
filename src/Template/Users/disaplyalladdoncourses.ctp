   <?= $this->Html->css('mdb.css') ?>
<body class="fixed-sn white-skin"  style="background-color: #ffff;">
<?php include('scriptfiles.ctp'); ?>

  <script>
  function searchaddoncouse()
  {
	  var amount = document.getElementById("inputNamesearch").value;
	 
	  window.location = '<?php echo Configure::read("MyConf.weburlmainsite");?>users/disaplyalladdoncourses/'+amount;
  }
  </script>
  
  

    <div class="container-fluid">
	  
	   <div class="row">
	 
	  <div class="col-md-8">
                      <div class="md-form mb-0">
					   <?= $this->Form->control('searchtext' ,array('label' => false,'class' => 'form-control' ,'id' => 'inputNamesearch','required'=>'required')); ?>
						
                        <label for="inputName"  class="active" id="searchaddoncouse">Search by text</label>
					  
					  </div>
					  </div>
					  
					   <div class="col-md-2">
                      <div class="md-form mb-0">
					  
					   <button class="btn btn-unique" style="padding: 10px 10px 10px 10px;background-color:#454545 !important"  type="submit" onclick="searchaddoncouse()">Search</button>
					   
					   </div>
					   </div>
					   
					    <div class="col-md-2">
                      <div class="md-form mb-0">
					  
					  <?php if($showall == 1 ) { ?>
					  
					    <a class="btn btn-unique" href="<?php echo Configure::read('MyConf.weburlmainsite');?>users/disaplyalladdoncourses/" style="padding: 10px 10px 10px 10px;background-color:#454545 !important">Show All</a>
					
					  <?php } ?>
					   
					   </div>
					   </div>
					   
					   
					  
					   
					
					  </div>
					    
					  <br />
					  
					  
					  
	
	<?PHP
  $NUMPERPAGE = 10; // max. number of items to display per page
  
    if($showall == 0 ) { 
  
  $this_page = "/users/disaplyalladdoncourses/";
  
	}
	else
	{
		
		$this_page = "/users/disaplyalladdoncourses/".$serachtext;
	}
  
  $data =$topiccodes1['data'];
  $num_results = count($data);
  

  
    if(!isset($_GET['page']) || !$page = intval($_GET['page'])) {
    $page = 1;
  }
?>

	
	      <div class="row">

<?php 

if($num_results > 0) {

  $data = new \ArrayIterator($data); // NOT needed if $data is already an Iterator!
  $it = new \LimitIterator($data, ($page - 1) * $NUMPERPAGE, $NUMPERPAGE);
  try {
    $it->rewind();
    /*foreach($it as $row) {
      echo $row; 
    }*/


 //foreach( $data as $allmodulesdis) {

 foreach($it as $allmodulesdis) {	 ?>



          <!-- Grid column -->
          <div class="col-xl-6 col-md-6 mb-xl-0 mb-4" style="margin-bottom: 46px!important;">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card" >

              <!-- Card Data -->
              <div class="admin-up">
           <!--     <i class="fas fa-shopping-cart warning-color mr-3 z-depth-2"></i>-->
                 <div class="data" style="float: left;  text-align: left;">
                  <p class="text-uppercase"><?php echo $allmodulesdis['name']; ?></p>
                  <h4 class="font-weight-bold dark-grey-text">₹<?php echo $allmodulesdis['price']; ?></h4>
                </div>
              </div>

              <!-- Card content -->
              <div class="card-body card-body-cascade" >
                
                <p class="card-text"><b>Category :</b> <?php echo $allmodulesdis['position']; ?></p>
				
				  <a class="btn btn-unique" href="<?php echo Configure::read('MyConf.weburlmainsite');?>users/displayaddondeatils/<?php echo $allmodulesdis['id']; ?>" style="padding: 10px 10px 10px 10px;background-color:#454545 !important">Details</a>
						 <?php echo $allmodulesdis['bynowbuttn']; ?>
				
              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->
		  
		  <?php }   } catch(\OutOfBoundsException $e) {
    echo "Error: Caught OutOfBoundsException";
  }?>
  
  
  <?php }  else { ?>
  
  <?php echo "No search results found"; ?>
  
  <?php } ?>
		  
		  </div>
		  
		 


	<?php
	 /*$nb_elem_per_page = 3;
$page = isset($_GET['page'])?intval($_GET['page']-1):0;
$data = $topiccodes1['data'];
$number_of_pages = intval(count($data)/$nb_elem_per_page)+1;*/

  # Original PHP code by Chirp Internet: www.chirp.com.au
  # Please acknowledge use of this code by including this header.



  // extra variables to append to navigation links (optional)
  $linkextra = [];
  if(isset($_GET['var1']) && $var1 = $_GET['var1']) { // repeat as needed for each extra variable
    $linkextra[] = "var1=" . urlencode($var1);
  }
  $linkextra = implode("&amp;", $linkextra);
  if($linkextra) {
    $linkextra .= "&amp;";
  }

  // build array containing links to all pages
  $tmp = [];
  for($p=1, $i=0; $i < $num_results; $p++, $i += $NUMPERPAGE) {
    if($page == $p) {
      // current page shown as bold, no link
      $tmp[] = "<b class='page-link' style='background-color: #4285f4;color:white'>{$p}</b>";
    } else {
      $tmp[] = "<a href=\"{$this_page}?{$linkextra}page={$p}\" class='page-link'>{$p}</a>";
    }
  }

  // thin out the links (optional)
  for($i = count($tmp) - 3; $i > 1; $i--) {
    if(abs($page - $i - 1) > 2) {
      unset($tmp[$i]);
    }
  }

  // display page navigation iff data covers more than one page
  if(count($tmp) > 1) {
    echo "<p class='pagination pg-blue'>";

    if($page > 1) {
      // display 'Prev' link
      echo "<a class='page-link' tabindex='-1' href=\"{$this_page}?{$linkextra}page=" . ($page - 1) . "\">&laquo; Prev</a>  ";
    } else {
      echo "";
    }

    $lastlink = 0;
    foreach($tmp as $i => $link) {
      if($i > $lastlink + 1) {
        echo " ... "; // where one or more links have been omitted
      } elseif($i) {
        echo "  ";
      }
      echo $link;
      $lastlink = $i;
    }

    if($page <= $lastlink) {
      // display 'Next' link
      echo "  <a class='page-link' href=\"{$this_page}?{$linkextra}page=" . ($page + 1) . "\">Next &raquo;</a>";
    }

    echo "</p>\n\n";
  }

	?>


	
	
	
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