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


				   
				   

$resultlesson = $post->savevoideodssree($_POST['videotittle'],$_POST['videocategpy'],$_POST['videodepartment'],$_POST['videourl'],
$_POST['videovisson'],$_POST['videoorder'],$_POST['filepreview_image']);

echo json_encode($resultlesson);

// echo json_encode($attempts);
   
 
