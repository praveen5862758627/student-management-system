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

//echo $resultlesson = $post->getstataget('4961','TG001',21,30,2021);

echo $resultlesson = $post->getstataget($prod_cat->uid, $prod_cat->code, $prod_cat->tminage, $prod_cat->tmaxage, $prod_cat->year);
