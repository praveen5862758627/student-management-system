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


				   
				   

$resultlesson = $post->savattendancesheet($_POST['attendancetype'],$_POST['attandancecompare'],$_POST['attandancecompareval'],
$_POST['attandancetopiocs'],$_POST['attandancetopiocscal'],
$_POST['atatdnavcestartdate'],$_POST['attendanceendtaer'],$_POST['group'],$_POST['attandenceforstu'],$_POST['loggeduserid']);

echo json_encode($resultlesson);

// echo json_encode($attempts);
   
 
