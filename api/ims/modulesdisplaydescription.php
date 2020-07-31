<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/text');
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




$resultlesson = $post->moduleslistdescr($_POST['cat_val']);
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



    $row = $resultlesson->fetch(PDO::FETCH_ASSOC);


    echo $row['description'];
} else {
    // No Posts
    echo 'No records Found';
}
  
 /* } else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
