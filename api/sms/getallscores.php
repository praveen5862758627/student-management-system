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

//$prod_cat = json_decode(file_get_contents("php://input"));


$prod_cat = $_POST['userid'];
$userroles_id = $_POST['userroles_id'];
$fcomps = $_POST['fcomps'];



if($userroles_id == 4)
{
    $resultlesson = $post->getfinalgradenn($prod_cat,$userroles_id,$fcomps);
    
}
else {
  $resultlesson = $post->getfinalgrade($prod_cat);  
}

// Get row count
$numlesson = $resultlesson->rowCount();


//  echo $numlesson;
//  exit;
// if($post->require_auth()){



/* * ********** lesson **************** */

if ($numlesson > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while ($row = $resultlesson->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        //  echo '<option value="'. $row["cat_name"] .'">'. $row["cat_name"] .'</option>';
        //  $code = $row["code"];
        //$old_date_timestamp = strtotime($TIME);
        // $dateob = date('Y-m-d', $old_date_timestamp); 
        // $dateob = date('d-m-Y', $old_date_timestamp); 
        if ($score_in_percentage >= $passingscore_in_percentage)
            $status = 'Pass';
        else
            $status = 'Fail';
		
		$sttime =date("d-m-Y h:i a", strtotime($starttime));
		$edtime = date("d-m-Y h:i a", strtotime($endtime));
		

        $post_item = array(
            'name' => html_entity_decode($name),
			'code' => html_entity_decode($code),
			'type' => html_entity_decode($quiztype),
            'attempts' => html_entity_decode($attempts),
            'duration' => html_entity_decode($duration),
            'starttime' => html_entity_decode($sttime),
            'endtime' => html_entity_decode($edtime),
            'score_in_percentage' => html_entity_decode($score_in_percentage),
            'passingscore_in_percentage' => html_entity_decode($passingscore_in_percentage),
            'timeconsumed' => html_entity_decode($timeconsumed),
            'status' => html_entity_decode($status),
        );

        // Push to "data"
        array_push($posts_arr, $post_item);
        // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    //echo json_encode($posts_arr);

    $json_data = array("data" => $posts_arr);

    // Turn to JSON & output
    echo json_encode($json_data);
} else {


    $json_data = array("data" => "No data found");

    echo json_encode($json_data);
}
  
  /*} else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
