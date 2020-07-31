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

//$prod_cat = json_decode(file_get_contents("php://input"));


$prod_cat = $_POST['userid'];

    
    $fcomps = $_POST['fcomps'];


$resultlesson = $post->getallsssignnn($prod_cat,$fcomps);
// Get row count
$numlesson = $resultlesson->rowCount();


//  echo $numlesson;
//  exit;
// if($post->require_auth()){



/* * ********** lesson **************** */

if ($numlesson > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while ($row = $resultlesson->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

     /*
		
		$sttime =date("d-m-Y h:i:s a", strtotime($starttime));
		$edtime = date("d-m-Y h:i:s a", strtotime($endtime));*/
        
  
            
        $clickvire ='<a onclick=\'openmoodlelinkassignmentnew("'.$assignmentcode.'","'.$url.'","'.$name.'","'.$userid.'","'.$groupid.'")\'>View</a>';    
		

        $post_item = array(
            'name' => html_entity_decode($name),
			'code' => html_entity_decode($assignmentcode),
			'view' => html_entity_decode($clickvire),
           
        );

        // Push to "data"
        array_push($posts_arr, $post_item);
        // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    //echo json_encode($posts_arr);

    $json_data = array("data" => $posts_arr);

    // Turn to JSON & output
    echo json_encode($json_data);
} else {


    $json_data = array("data" => "No data found");

    echo json_encode($json_data);
}
  
  /*} else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
