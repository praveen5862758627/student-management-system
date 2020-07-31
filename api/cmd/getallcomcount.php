<?php 
  // Headers
  /*header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');*/

  include_once 'config/Database.php';
  include_once 'models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

//$prod_cat = json_decode(file_get_contents("php://input"));
   
    $resultlesson = $post->getcomcounttotal();
  // Get row count
   $numlesson = $resultlesson->rowCount();
   
 
 //  echo $numlesson;
 //  exit;

  
    //if($post->require_auth()){
		
		
		
		/************ lesson *****************/
		
  // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();
	
	   $post_item = array(
       
       'numlesson' => html_entity_decode($numlesson)
      );

      // Push to "data"
      array_push($posts_arr, $post_item);


    // Turn to JSON & output
    echo json_encode($posts_arr);
  
  /*} else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }
**/