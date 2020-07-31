<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
 // header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
error_reporting(0);
//upload.php
if($_FILES["file"]["name"] != '')
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = rand(100, 999).$_GET['uid'] . '.' . $ext;
 $location = './upload/' . $name;  

 //$location = 'https://odinlearning.in/SMS/img/'. $name;

 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
// echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
echo $name;
//exit;

/***********************************************/

  include_once 'Database.php';
  include_once 'Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  $uid = $_GET['uid'];
   
   
    $resultlesson = $post->update($uid,$name);

/*************************************************/

}
?>