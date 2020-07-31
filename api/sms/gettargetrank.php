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


$resultlesson = $post->getstatagetrank($prod_cat->uid, $prod_cat->code);
//$resultlesson = $post->getstatagetrank('281','TG310');



echo json_encode(number_format((float) $resultlesson * 100, 2, '.', ''));
