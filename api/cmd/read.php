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

// Blog post query
$result = $post->read();
// Get row count
$num = $result->rowCount();






//if($post->require_auth()){
// Check if any posts
if ($num > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'tcode' => html_entity_decode($code),
            'id' => html_entity_decode($id),
            'name' => html_entity_decode($name)
        );

        // Push to "data"
        array_push($posts_arr, $post_item);
        // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);
} else {
    // No Posts
    echo json_encode(
            array('message' => 'No records Found')
    );
}
  
  /*} else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
