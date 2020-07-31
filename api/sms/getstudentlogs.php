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


$userid = $_POST['userid'];



$resultlesson = $post->getalltheventlogs($userid);
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

           $start =  date('d/m/Y H:i:s', strtotime($time));

        $post_item = array(
            'type' => html_entity_decode($type),
			'val1' => html_entity_decode($val1),
			'val2' => html_entity_decode($val2),
            'time' => html_entity_decode($start)
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
