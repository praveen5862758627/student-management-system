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

   
    $resultlesson = $post->getcoupondeatils($_POST['counponcode'],$_POST['modulecode']);
	
	
	  $price1 = $post->encrypt($resultlesson[1]);
	
	$value = array( 
    "name"=>$resultlesson[0], 
    "email"=>$price1); 
   
   
   echo json_encode($value);
   
 
