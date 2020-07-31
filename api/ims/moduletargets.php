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

/* $prod_cat = $_POST['cat_val'];
  $useridmoodle = $_POST['useridmoodle'];
  $gettopicids = $_POST['gettopicids'];
  $tragetids = $_POST['tragetids']; */

$prod_cat = json_decode(file_get_contents("php://input"));


$resultlesson = $post->getratgetmodules($prod_cat->moduleid);
// Get row count
$numlesson = $resultlesson->rowCount();




//  echo $numlesson;
//  exit;
//if($post->require_auth()){



/* * ********** lesson **************** */

if ($numlesson > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();




    while ($row = $resultlesson->fetch(PDO::FETCH_ASSOC)) {
        extract($row);


        $post_item = array(
            'targetcode' => html_entity_decode($targetcode),
			 'targetname' => html_entity_decode($targetname),
			  'type' => html_entity_decode($type)
          
        );



        // Push to "data"
        array_push($posts_arr, $post_item);
        // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    // echo json_encode($posts_arr);

    //$json_data = array("data" => $posts_arr);

    // Turn to JSON & output
    echo json_encode($posts_arr);
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
