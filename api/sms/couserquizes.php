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

$prod_cat = json_decode(file_get_contents("php://input"));

//$prod_cat->id
$resultlesson = $post->compereaname($prod_cat->id, $prod_cat->useridmoodle, $prod_cat->courseid);
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
        // $getlesson  = $post->getlesson($courseid);
        //  $code = $row["code"];

        if ($score_in_percentage >= $passingscore_in_percentage)
            $status = 'Pass';
        else
            $status = 'Fail';

        $post_item = array(
            'Grade' => html_entity_decode($status)
                /* 'courseid' => html_entity_decode($courseid),
                  'Compid' => html_entity_decode($Compid),
                  'Course' => html_entity_decode($Course),
                  'Competency' => html_entity_decode($Competency),
                  'levelid' => html_entity_decode($getlesson) */
        );

        // Push to "data"
        array_push($posts_arr, $post_item);
        // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);
} else {
    // No Posts
    echo json_encode(
            array('message' => 'No records Found')
    );
}
  
 /* } else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
