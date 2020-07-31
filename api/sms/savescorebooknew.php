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
date_default_timezone_set('Asia/Kolkata');
$paymentDate = date("Y-m-d H:i:s");


$quizstart = $post->savestudentsstart($paymentDate, $_POST['useridmoodle'], 'LESSONVIEW', $_POST['lessoncode'], NULL);


echo json_encode($quizstart);

// echo json_encode($attempts);
   
 
