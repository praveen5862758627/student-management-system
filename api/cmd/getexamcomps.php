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

$prod_cat = json_decode(file_get_contents("php://input"));


$resultlesson = $post->examcomps($prod_cat->id);
// Get row count
$numlesson = $resultlesson->rowCount();


//  echo $numlesson;
//  exit;
//if($post->require_auth()){



/* * ********** lesson **************** */

if ($numlesson > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while ($row = $resultlesson->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        //  echo '<option value="'. $row["cat_name"] .'">'. $row["cat_name"] .'</option>';
        //  $code = $row["code"];

        $post_item = array(
            'id' => html_entity_decode($id)
                /* 'target_id' => html_entity_decode($target_id),
                  'targetcode' => html_entity_decode($targetcode),
                  'competency_code' => html_entity_decode($competency_code),
                  'level' => html_entity_decode($level) */



                /*  'esid' => html_entity_decode($esid),
                  'ename' => html_entity_decode($ename),
                  'ecode' => html_entity_decode($ecode),
                  'tcode' => html_entity_decode($tcode),
                  'lcode' => html_entity_decode($lcode),
                  'lecode' => html_entity_decode($lecode),
                  'escore' => html_entity_decode($escore) */
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
  
  /*} else {
	   echo json_encode(
	  array('message' => 'Access denied')
	  );
	  
  }*/
