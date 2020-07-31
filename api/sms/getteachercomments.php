<?php

// Headers
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
error_reporting(0);

include_once 'config/Database.php';
include_once 'models/Post.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

$userid = $_POST['userid'];


$groupidforstudent = $_POST['groupidforstudent'];

$codeforassignment = $_POST['codeforassignment'];

echo $resultlesson = $post->getstudentcommentsandasignmentnew($userid,$codeforassignment,$groupidforstudent);
exit;