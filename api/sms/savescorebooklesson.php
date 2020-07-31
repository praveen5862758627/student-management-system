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


if ($post->getscoecount($_POST['code'], $_POST['nsadfkj']) == 0) {

    date_default_timezone_set('Asia/Kolkata');
$getdate= date('Y-m-d H:i:s');

    $resultlesson = $post->scorecrdforuser($_POST['comparea_code'],'Lesson', '100','-',$getdate, $getdate, $_POST['nsadfkj'], 60, '-', $_POST['name'], '100', $_POST['code']);
} else {
    $resultlesson = $post->updatescorecrdforuser($_POST['comparea_code'],'Lesson', 'FIRST', '100','-', $getdate,$getdate, $_POST['nsadfkj'], 60, '-', $_POST['name'], '100', $_POST['code']);
}





$updateevents = $post->updateeventslist($_POST['nsadfkj'],$_POST['id'],$_POST['code']);


/*$attempts = $post->gettotalatatmpts($_POST['nsadfkj'], $_POST['code']);

$quizstart = $post->savestudentsstart($_POST['quizstartdate'], $_POST['nsadfkj'], 'QUIZSTART', $_POST['code'], $attempts);
$quizend = $post->savestudentsstart($_POST['quizenddate'], $_POST['nsadfkj'], 'QUIZEND', $_POST['code'], $attempts);*/

echo json_encode($resultlesson);

// echo json_encode($attempts);
   
 
