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



$jobid = $_POST['jobid'];
$companyid = $_POST['companyid'];
$useridforic = $_POST['useridforic'];
$insidforic = $_POST['insidforic'];
$name = $_POST['name'];




$resultlesson = $post->applyforjobstudents($jobid, $companyid, $useridforic, $insidforic, $name);

if ($resultlesson)
    echo "You have successfully applied for this job.";
else
    echo "Error in applying for this job.";

exit;
