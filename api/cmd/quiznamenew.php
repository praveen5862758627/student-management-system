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

$resultlesson = $post->quiznamefi($prod_cat->id);





//echo json_encode($resultlesson);
// Get row count
$numlesson = $resultlesson->rowCount();


//  echo $numlesson;
//  exit;
//if($post->require_auth()){



/* * ********** lesson **************** */

if ($numlesson > 0) {

    $posts_arr = array();


    while ($row = $resultlesson->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'id' => html_entity_decode($id)
        );


        array_push($posts_arr, $post_item);
    }


    echo json_encode($posts_arr);
} else {

    echo json_encode(
            array('message' => 'No records Found')
    );
}
  
 /* } else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
