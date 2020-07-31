<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once 'config/Database.php';
include_once 'models/Post.php';
//error_reporting(0);
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);



$cat_val = $_POST['cat_val'];
$type = $_POST['type'];
$email = $_POST['email'];






$resultlesson = $post->updatestatusinsdetails($cat_val, $type, $email);





if ($resultlesson > 0) {
    // echo "Status of the job has been changed.";
    echo 1;
} else {
    echo 0;
}

exit;
