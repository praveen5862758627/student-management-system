<?php // Headers
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

$resultlesson = $post->saceonlineclasses($_POST['code'],$_POST['onlineclassname'],$_POST['studentsgroupsclass'],$_POST['startdattime'],$_POST['enddattime'],$_POST['onlineclassdescription']);

echo json_encode($resultlesson);

// echo json_encode($attempts);
   
 
