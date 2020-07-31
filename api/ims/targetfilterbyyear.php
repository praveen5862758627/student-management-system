<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'config/Database.php';
  include_once 'models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

 $fromdate = $_POST['fromdate'];
  $todate = $_POST['todate'];

  $temp = $_POST['filval'];
  
  $prod_cat = $_POST['cat_val'];
 
//$prod_cat = 'GR077';


   
   
    $resultlesson = $post->getsudentclustertargetdate($fromdate,$todate ,$temp);
  // Get row count
   $numlesson = $resultlesson->rowCount();
   
 
 //  echo $numlesson;
 //  exit;

  
    //if($post->require_auth()){
		
		
		
		/************ lesson *****************/
		
		 if($numlesson > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while($row = $resultlesson->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
	  	
	$thePostIdArray = explode(',', $prod_cat);
	
	if (in_array($tcode, $thePostIdArray))
   {
	   
	
	 
	   $viewcompt = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'")\'  style="cursor:pointer" ><i class="fa fa-bars fa-fw"></i></a> ';
	 
	    $add ='';
	   
	 
	 
	   
	    $remove ='<a  onclick=\'deletetargetsforstudent("'.$tcode.'")\' style="cursor:pointer" id="targetreomove1'.$tcode.'"><i class="fa fa-times fa-fw"></i></a> |';
	   
	   $name1 = '<span style="color:green;" id="namecolor'.$tcode.'">'. $tname. '</span>';
	   
	   
	   
	    $viewcompt1 = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'")\'  style="cursor:pointer" ><i class="fa fa-bars fa-fw"></i></a> ';
	
	   
	     $add1 ='<a  onclick=\'addtargetsforstudent("'.$tcode.'")\'  style="cursor:pointer" id="targteadd2'.$tcode.'"><i class="fa fa-plus-circle fa-fw"></i></a> |';
	   
	  $remove1 ='';
	   
	   
	   
	   
	   $finaladd = '<span id="existsid'.$tcode.'">'.$add .' '.$remove.' ' .$viewcompt.'</span><span id="existsid1'.$tcode.'" style="display:none">'.$add1 .' '.$remove1.' ' .$viewcompt1.'</span>'; 
	 
	
	   
   }
   else {
	   
	   
	
	    $viewcompt = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'")\'  style="cursor:pointer" ><i class="fa fa-bars fa-fw"></i></a> ';
	
	   
	     $add ='<a  onclick=\'addtargetsforstudent("'.$tcode.'")\'  style="cursor:pointer" id="targteadd2'.$tcode.'"><i class="fa fa-plus-circle fa-fw"></i></a> |';
	   
	  $remove ='';
	    $name1 = '<span style="" id="namecolor'.$tcode.'">'. $tname. '</span>';
		
		
		
		
	   $viewcompt1 = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'")\'  style="cursor:pointer" ><i class="fa fa-bars fa-fw"></i></a> ';
	 
	    $add1 ='';
	   
	 
	 
	   
	    $remove1 ='<a  onclick=\'deletetargetsforstudent("'.$tcode.'")\' style="cursor:pointer" id="targetreomove1'.$tcode.'"><i class="fa fa-times fa-fw"></i></a> |';
		
		
		
		
		 $finaladd = '<span id="existsid'.$tcode.'">'.$add .' '.$remove.' ' .$viewcompt.'</span><span id="existsid1'.$tcode.'" style="display:none">'.$add1 .' '.$remove1.' ' .$viewcompt1.'</span>'; 
		
   }

      $post_item = array(
       'tname1' => html_entity_decode($tname),
	   'compname1' => html_entity_decode($compname),
	    'tcutoff1' => html_entity_decode($tcutoff),
	   'tminage1' => html_entity_decode($tminage),
	   'tmaxage1' => html_entity_decode($tmaxage),
	   'month_approximate' => html_entity_decode($month_approximate),
	   'year' => html_entity_decode($year),
	   'studentactions' => html_entity_decode($finaladd)
      
      
      );

      // Push to "data"
      array_push($posts_arr, $post_item);
      // array_push($posts_arr['data'], $post_item);
    }

    $json_data = array("data"            => $posts_arr );

    // Turn to JSON & output
    echo json_encode($json_data);

  } else {

	   $json_data = array("data"            => "No data found" );
  
     echo json_encode($json_data);
	
  }
  
 /* } else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
