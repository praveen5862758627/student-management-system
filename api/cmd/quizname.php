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

$prod_cat = json_decode(file_get_contents("php://input"));
// $prod_cat->id

$resultlesson = $post->quizname($prod_cat->id);


$want_to_see = explode(",", $resultlesson);
$current_user_can_see = explode(",", $prod_cat->gettopicids);

// Array of common elements:
$show = array_intersect($want_to_see, $current_user_can_see);

// If you want it as a string:
$show_str = implode(",", $show);


echo json_encode($show_str);
// Get row count
  // $numlesson = $resultlesson->rowCount();
   
 
 //  echo $numlesson;
 //  exit;

  
    //if($post->require_auth()){
		
		
		
		/************ lesson *****************/
		
	/*	 if($numlesson > 0) {
   
    $posts_arr = array();
  

    while($row = $resultlesson->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
	  
      $post_item = array(
       
       'lessionid' => html_entity_decode($lessionid)
	
	   
      
      );

     
      array_push($posts_arr, $post_item);
     
    }

  
    echo json_encode($posts_arr);

  } else {
    
    echo json_encode(
      array('message' => 'No records Found')
    );
  }*/
  
 /* } else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
