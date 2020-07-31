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



$id = $_POST['id'];
$status = $_POST['status'];




$resultlesson = $post->updatestatus($id, $status);

if ($resultlesson)
    echo "Status of the job has been changed.";
else
    echo "Error in changing the job status.";

exit;
