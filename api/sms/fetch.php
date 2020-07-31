<?php

// Headers
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');
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

//$prod_cat = json_decode(file_get_contents("php://input"));


$limit = $_POST["limit"];
$start = $_POST["start"];


$resultlesson = $post->getallvideos($limit,$start);  

// Get row count
$numlesson = $resultlesson->rowCount();


//  echo $numlesson;
//  exit;
// if($post->require_auth()){



/* * ********** lesson **************** */


    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while ($row = $resultlesson->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
		
		if($_POST['userrole'] == 3)
		{
						$delelte ='| <a title="Delete this video" onclick="deletetargetsforstudentttendcenew('.$id.')" style="cursor:pointer" id=""><i class="fa fa-times fa-fw"></i></a>';

		}
		else
		{
			$delelte ='';
		}
		

echo '<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12"><div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="'.$videourl.'" allowfullscreen></iframe>
</div> <h5 class="card-title" style="    margin-top: 10px;">'.$title.'</h5>
    <h6 style="    margin-bottom: 32px !important;" class="card-subtitle mb-2 text-muted">Category : '.$category.' | Department : '.$department.' '.$delelte.'</h6></div>';

    }

 // echo '</div><br />';
  