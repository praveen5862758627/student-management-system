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





if ($post->getscoecount($_POST['code'], $_POST['nsadfkj']) == 0) {


    $resultlesson = $post->scorecrdforuser($_POST['comparea_code'], $_POST['quiz_type'], $_POST['totalscopre'], $_POST['displayTime'], $_POST['quizstartdate'], $_POST['quizenddate'], $_POST['nsadfkj'], $_POST['timeLeft'], $_POST['qurl'], $_POST['qname'], $_POST['passingscore_in_percentage'], $_POST['code']);
} else {
    $resultlesson = $post->updatescorecrdforuser($_POST['comparea_code'], $_POST['quiz_type'], $_POST['scoring_method'], $_POST['totalscopre'], $_POST['displayTime'], $_POST['quizstartdate'], $_POST['quizenddate'], $_POST['nsadfkj'], $_POST['timeLeft'], $_POST['qurl'], $_POST['qname'], $_POST['passingscore_in_percentage'], $_POST['code']);
}

$attempts = $post->gettotalatatmpts($_POST['nsadfkj'], $_POST['code']);
$gstatus = $post->getquizstatusfind($_POST['nsadfkj'], $_POST['code']);

if($gstatus == 'pass')
{
	$post->updateeventcalendarforqu($_POST['nsadfkj'], $_POST['code'], $_POST['quizstartdate'], $_POST['quizenddate']);
}




$quizstart = $post->savestudentsstart($_POST['quizstartdate'], $_POST['nsadfkj'], 'QUIZSTART', $_POST['code'], $attempts);
$quizend = $post->savestudentsstart($_POST['quizenddate'], $_POST['nsadfkj'], 'QUIZEND', $_POST['code'], $attempts);

echo json_encode($resultlesson);

// echo json_encode($attempts);
   
 
