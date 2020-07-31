<?php

// Headers
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
error_reporting(0);

include_once 'config/Database.php';
include_once 'models/Post.php';




//exit;

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

$userid = $_POST['userid'];
$studentcomment = $_POST['studentcomment'];

$groupidforstudent = 0;

$codeforassignment = $_POST['codeforassignment'];

$assignmentnamestu = $_POST['assignmentnamestu'];

$assignmenturlstu = $_POST['assignmenturlstu'];

$compreacodeforassignment = $_POST['compreacodeforassignment'];

if(isset($_FILES["audiovideo"])){
  
    $fileNamenn = rand(100, 999).rand(100, 999).$userid."assignmentrecording.webm";
	
	

 
    $uploadDirectory = './upload/'. $fileNamenn;
    
    
    if (!move_uploaded_file($_FILES["audiovideo"]["tmp_name"], $uploadDirectory)) {
        echo("Couldn't upload video !");
		exit;
    }
    else{
    	
		   $resultlesson = $post->getasignments($userid,$codeforassignment);
       $numlesson = $resultlesson->rowCount();
       if($numlesson == 0)
       {
          
             echo $resultlesson = $post->savestudentassignment($userid,$studentcomment,$groupidforstudent,$codeforassignment,"",$assignmentnamestu,$assignmenturlstu,$compreacodeforassignment,$fileNamenn);
       }
       else 
       {
         
            echo "Error in submitting. You have already submitted answer for this assignment.";
       }
    }
}

