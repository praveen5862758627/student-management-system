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


//  $prod_cat = 'industry';
// if($post->require_auth()){


if ($prod_cat->typecount == 'exam')
    $resultlesson = $post->exam();
else if ($prod_cat->typecount == 'industry')
    $resultlesson = $post->industrycount();

else if ($prod_cat->typecount == 'company')
    $resultlesson = $post->companycount();




$getcountv = $resultlesson->rowCount();

$post_item = array(
    'getcountv' => html_entity_decode($getcountv)
);

// array_push($posts_arr, $post_item);

echo json_encode($post_item);





/* } else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
