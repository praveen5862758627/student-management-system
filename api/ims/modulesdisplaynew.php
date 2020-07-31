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

/*$prod_cat = $_POST['cat_val'];
$useridmoodle = $_POST['useridmoodle']; 
$gettopicids = $_POST['gettopicids']; 
$tragetids = $_POST['tragetids']; */

 //$prod_cat = json_decode(file_get_contents("php://input"));
   

//$uid = $prod_cat->uid;
//$uid = $post->encrypt(281);

$uuuid= $_POST['uid'];


   
    $resultlesson = $post->moduleslist();
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
	  
	    $pid =  $code;
	    
	  $price1 = $post->encrypt($price);
	  
	  
	  $getproductflag =  $post->getproductflag($uuuid,$code);
	  
	  if( $getproductflag == 0) {
	 
	
	//$bynowbuttn ='<a id="getmod'.$pid.'"  class="btn btn-default" href="https://cit.odinlearning.in/razor/pay.php?type=modules&fjhqhjqew='.$price1.'&uid='.$uid.'&name='.$name.'&pid='.$pid.'"  style="padding: 10px 10px 10px 10px;background-color:#454545 !important;" onclick="removeclasfromiframe()" >Buy now</a>';
	

 $bynowbuttn = "&#10060;";
  	
	  }
	  
	  else 
	  {
		 $bynowbuttn = "<span style='color: green;font-size: 27px;'>&#10004;</span>";
				 // $bynowbuttn =   '<a  style="padding: 10px 10px 10px 10px;background-color:#454545 !important;color:white" href="https://cit.odinlearning.in/users/paymentpddf/'.$uid.'/'.$code.'"  >Invoice </a>';
	  }
	  
	  
	  if($type == 1)
		  $typeop = "Lesson + Quiz + Practice Quiz";
	  else
		  $typeop ="Quiz";
	  
	  
	  
	   //$getproductflag =  $post->getproductflag($uuuid,$code);
	  
		  
      $post_item = array(
       
	
       'name' => html_entity_decode($name),
	   'description' => html_entity_decode($description),
	     'code' => html_entity_decode($code),
	    'id' => html_entity_decode($id),
		 'type' => html_entity_decode($typeop),
	    'price' => html_entity_decode($price),
	   'bynowbuttn' => html_entity_decode($bynowbuttn)
	   
      
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
