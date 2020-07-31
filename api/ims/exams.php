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

$prod_cat = $_POST['cat_val'];
  //$prod_cat ='E0007,E0002,E0003';
  
  $userid = $_POST['userid'];
   $ttype = $_POST['ttype'];
   
   
    $resultlesson = $post->examsresult($prod_cat,$ttype);
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
	  
	  //  echo '<option value="'. $row["cat_name"] .'">'. $row["cat_name"] .'</option>';
	  
	//  $code = $row["code"];
	
	
	$thePostIdArray = explode(',', $prod_cat);
	
	if (in_array($tcode, $thePostIdArray))
   {
	   
	
	 
	   $viewcompt = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'","'.$ttype.'")\'  style="cursor:pointer;text-decoration:underline;color:blue" >View</a>';
	 
	    $add ='';
	   
	 $viewcompt2 = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'","'.$ttype.'")\'  style="cursor:pointer;text-decoration:underline;color:blue" ></a>';
	 
	   
	    $remove ='<a  onclick=\'deletetargetsforstudent("'.$tcode.'")\' style="cursor:pointer" id="targetreomove1'.$tcode.'"><i class="fa fa-times fa-fw"></i></a>';
	   
	   $name1 = '<span style="color:green;" id="namecolor'.$tcode.'">'. $tname. '</span>';
	   
	   
	   
	    $viewcompt1 = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'","'.$ttype.'")\'  style="cursor:pointer" ><i class="fa fa-bars fa-fw"></i></a>';
		
		 $viewcompt12 = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'","'.$ttype.'")\'  style="cursor:pointer" ></a>';
	
	   
	     $add1 ='<a  onclick=\'addtargetsforstudent("'.$tcode.'")\'  style="cursor:pointer" id="targteadd2'.$tcode.'"><i class="fa fa-plus-circle fa-fw"></i></a>';
	   
	  $remove1 ='';
	   
	   
	   
	   
	 // $finaladd = '<span id="existsid'.$tcode.'">'.$add .' '.$remove.' ' .$viewcompt.'</span><span id="existsid1'.$tcode.'" style="display:none">'.$add1 .' '.$remove1.' ' .$viewcompt1.'</span>'; 
	 
	$finaladd = '<span id="existsid'.$tcode.'">'.$add .' '.$remove.' ' .$viewcompt2.'</span><span id="existsid1'.$tcode.'" style="display:none">'.$add1 .' '.$remove1.' ' .$viewcompt12.'</span>'; 
	 
	   
   }
   else {
	   
	   
	
	    $viewcompt = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'","'.$ttype.'")\'  style="cursor:pointer;text-decoration:underline;color:blue" >View</a> ';
		
		 $viewcompt2 = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'","'.$ttype.'")\'  style="cursor:pointer;text-decoration:underline;color:blue" ></a> ';
	
	   
	     $add ='<a  onclick=\'addtargetsforstudent("'.$tcode.'")\'  style="cursor:pointer" id="targteadd2'.$tcode.'"><i class="fa fa-plus-circle fa-fw"></i></a>';
	   
	  $remove ='';
	    $name1 = '<span style="color:#686868" id="namecolor'.$tcode.'">'. $tname. '</span>';
		
		
		
		
	   $viewcompt1 = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'","'.$ttype.'")\'  style="cursor:pointer" ><i class="fa fa-bars fa-fw"></i></a> ';
	      $viewcompt12 = '<a   onclick=\'openmodalboxtargetfornew("'.$tname.'","'.$tid.'","'.$ttype.'")\'  style="cursor:pointer" ></a> ';
	 
	    $add1 ='';
	   
	 
	 
	   
	    $remove1 ='<a  onclick=\'deletetargetsforstudent("'.$tcode.'")\' style="cursor:pointer" id="targetreomove1'.$tcode.'"><i class="fa fa-times fa-fw"></i></a>';
		
		
		
		
	//	 $finaladd = '<span id="existsid'.$tcode.'">'.$add .' '.$remove.' ' .$viewcompt.'</span><span id="existsid1'.$tcode.'" style="display:none">'.$add1 .' '.$remove1.' ' .$viewcompt1.'</span>'; 
		
    $finaladd = '<span id="existsid'.$tcode.'">'.$add .' '.$remove.' ' .$viewcompt2.'</span><span id="existsid1'.$tcode.'" style="display:none">'.$add1 .' '.$remove1.' ' .$viewcompt12.'</span>'; 
		
   }
	
	
	
	
	
	
	
	$checkcon = $post->gettargetstatusbycond($userid);
	
	if($checkcon == 0 )
	{
		$statu = '<a onclick="conditionsuit()"><i class="w-fa fas fa-question-circle"></i></a>';
		
	}
	else if($gettargetstatus = $post->gettargetstatus($tcode,$userid,$tminage,$tmaxage,$year) == 1)
		$statu = '<span class="dot"></span>';

	else
		$statu = '<span style="cursor:pointer" class="dot1" data-toggle="tooltip" onclick=\'toastr.error("Age should be between '.$tminage.' and '.$tmaxage.'")\'  data-placement="right"
  title="Age should be between '.$tminage.' and '.$tmaxage.'"></span>';
	
	//$statu = $post->gettargetstatus($tcode,$userid,$tminage,$tmaxage);
	
	
	
     if($checkcon == 0 )
	{
		$rank = '<a onclick="conditionsuit()"><i class="w-fa fas fa-question-circle"></i></a>';
		
	}
	else {
	$rank = $post->getrank($tcode,$userid);
	}

      $post_item = array(
       
	 'recom' => html_entity_decode($statu),
       'name' => html_entity_decode($name1),
	   'company' => html_entity_decode($compname),
	   
	   'cutoff' => html_entity_decode($tcutoff),
	   'minage' => html_entity_decode($tminage),
	    'maxage' => html_entity_decode($tmaxage),
	   'studentactions' => html_entity_decode($finaladd),
	   'month_approximate' => html_entity_decode($month_approximate),
	   'year' => html_entity_decode($year),
	   'rank' => html_entity_decode($rank),
	    'viewcom' => html_entity_decode($viewcompt)
	   
      
      );
	  
	  

      // Push to "data"
      array_push($posts_arr, $post_item);
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
   // echo json_encode($posts_arr);
	
	 $json_data = array("data"            => $posts_arr );

    // Turn to JSON & output
    echo json_encode($json_data);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No records Found')
    );
  }
  
 /* } else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
