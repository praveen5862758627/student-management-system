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


				   
				   

$resultlesson = $post->saceffclasses($_POST['topiccode'],$_POST['topicname'],$_POST['dow'],$_POST['groupid'],$_POST['starttime'],$_POST['endtime'],$_POST['startdattime11'],$_POST['enddattime11'],$_POST['desc'],$_POST['color']);

echo json_encode($resultlesson);

// echo json_encode($attempts);
   
 
