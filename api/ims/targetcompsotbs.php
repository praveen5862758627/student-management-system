<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'config/Database.php';
  include_once 'models/Post.php';
  error_reporting(0);

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

$prod_cat = $_POST['cat_val'];
$useridmoodle = $_POST['useridmoodle']; 
$gettopicids = $_POST['gettopicids']; 
$tragetids = $_POST['tragetids']; 

   
 /*  $prod_cat = 89;
$useridmoodle = 113;*/


   
    $resultlesson = $post->examsresultcomps($prod_cat);
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
	
	
	
	$otbs = "";

    while($row = $resultlesson->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
	  
	  
	  if($tclevel == 1 )
		  $levelname  = 'Level 1 (None)';
	   else if($tclevel == 2 )
		  $levelname  = 'Level 2 (Basic)';
	  else if($tclevel == 3 )
		  $levelname  = 'Level 3 (Intermediate)';
	  else if($tclevel == 4 )
		  $levelname  = 'Level 4 (Advanced)';
	   else if($tclevel == 5 )
		  $levelname  = 'Level 5 (Expert)';
	 
	 
	 
	   $resultgrade = $post->gettyhegrade(trim($comcode),$useridmoodle,$prod_cat,$tclevel);
	 
	
	if($resultgrade[0] == 'nan%')
		$resultgrade1 ='0.00';
	else
		$resultgrade1 = $resultgrade[0];
	
	
	$otbs +=$resultgrade1;

      /*$post_item = array(
       
	
       'name' => html_entity_decode('<a style=cursor:pointer onclick=gettopicslist("'.trim($comcode).'")>'.$cmname.'</a>'),
	   'level' => html_entity_decode($levelname),
	   
	    'topics' => html_entity_decode('<a   onclick=\'gettopicslist("'.trim($comcode).'")\'  style="cursor:pointer" ><i class="fa fa-bars fa-fw"></i></a>'),
	   
	   'hours' => html_entity_decode($resultgrade1),
	   
	  
	   'pendinghours' => html_entity_decode($post->convertTime($resultgrade[1])),
	   
	 
	   'totalhours' => html_entity_decode($post->convertTime($resultgrade[2]))
	   
      
      );*/
	  
	  

      // Push to "data"
     // array_push($posts_arr, $post_item);
      // array_push($posts_arr['data'], $post_item);
    }
	
	//echo $otbs/$numlesson;
	  echo number_format((float)$otbs/$numlesson, 2, '.', '');
exit;
   

  } else {
    echo 0;
	exit;
  }
  
 /* } else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
