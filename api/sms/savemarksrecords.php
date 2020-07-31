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


				   
				   

$resultlesson = $post->savemarksforstudents($_POST['useridlog'],$_POST['uid'],$_POST['markstype'],$_POST['listofmarkscomname'],$_POST['listdoftopicsmarksname'],$_POST['marksscore'],$_POST['markapssing'],$_POST['markssmax'],$_POST['listofmarkscom'],$_POST['listdoftopicsmarks']);

echo json_encode($resultlesson);

// echo json_encode($attempts);
   
 
