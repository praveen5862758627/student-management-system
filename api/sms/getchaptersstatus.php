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

$code = $_POST['code'];
$uid = $_POST['uid'];
$name = $_POST['name'];
$id = $_POST['id'];
$compreacode = $_POST['compreacode'];


/* $prod_cat = 4;

  $uid = 4978;

  $limitre = 5; */


// $prod_cat = 4;
//$limitre = 4 -1;

$resultlesson = $post->compereaname("",$uid,$code);
// Get row count
$numlesson = $resultlesson->rowCount();


//  echo $numlesson;
//  exit;
//if($post->require_auth()){



/* * ********** lesson **************** */

if ($numlesson > 0) {

   $posts_arr ='<button type="button" class="btn btn-success" disabled>Lesson set as Completed</button>';

    // Turn to JSON & output
    echo json_encode($posts_arr);
} else {
 
     $posts_arr ='<button type="button" class="btn" onclick=\'setlessoncompletenw("'.$uid.'","'.$code.'","'.$name.'","'.$id.'","'.$compreacode.'")\' >Set Lesson Complete</button>';

    // Turn to JSON & output
    echo json_encode($posts_arr);
}
  
  /*} else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }
**/