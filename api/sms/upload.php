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

/*if($_FILES["file"]["name"] != '')
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = rand(100, 999).$userid. '.' . $ext;
 $location = './upload/' . $name;  



 move_uploaded_file($_FILES["file"]["tmp_name"], $location);

echo $name;
    
    exit;


}*/

/*if(isset($_FILES["audiovideo"])){
  
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

else*/ if($_FILES["file"]["name"] != '')
{
    
     $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $filename = rand(100, 999).$userid. '.' . $ext;
/* Getting file name */
//$filename = $_FILES['file']['name'];

/* Location */
$location = "./upload/".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png","docx","pdf","txt","odt","zip","war","tar","csv");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo "File format nor supported.";
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
     // echo $location;
       $resultlesson = $post->getasignments($userid,$codeforassignment);
       $numlesson = $resultlesson->rowCount();
       if($numlesson == 0)
       {
          
             echo $resultlesson = $post->savestudentassignment($userid,$studentcomment,$groupidforstudent,$codeforassignment,$filename,$assignmentnamestu,$assignmenturlstu,$compreacodeforassignment,"");
       }
       else 
       {
            //echo $resultlesson = $post->savestudentassignmentupdate($userid,$studentcomment,$groupidforstudent,$codeforassignment,$filename);
            echo "Error in submitting. You have already submitted answer for this assignment.";
       }
     
       
   }else{
      echo "Error in submitting";
   }
}
}
else
{
    if($studentcomment == "" || $studentcomment == NULL || $studentcomment == " ")
    {
        echo "Please write your answer.";
        exit;
    }
    else 
    {
         $resultlesson = $post->getasignments($userid,$codeforassignment);
       $numlesson = $resultlesson->rowCount();
       if($numlesson == 0)
       {
            echo $resultlesson = $post->savestudentassignment($userid,$studentcomment,$groupidforstudent,$codeforassignment,"",$assignmentnamestu,$assignmenturlstu,$compreacodeforassignment,"");
       }
       else 
       {
            //echo $resultlesson = $post->savestudentassignmentupdate($userid,$studentcomment,$groupidforstudent,$codeforassignment,"");
           echo "Error in submitting. You have already submitted answer for this assignment.";
       }
    }
   
}