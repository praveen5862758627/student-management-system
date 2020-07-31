<?php

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

//$prod_cat = $_POST['cat_val'];
// $prod_cat = 4;
//$limitre = 4 -1;

/* $prod_cat = json_decode(file_get_contents("php://input"));

  $limitre = $prod_cat->levelcode; */


$resultlesson = $post->getinstitutreadmin();
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
            'fname' => html_entity_decode($fname),
            'email' => html_entity_decode($email),
            'event1' => html_entity_decode($event1),
            'event2' => html_entity_decode($event2),
            'event3' => html_entity_decode($event3),
            'event4' => html_entity_decode($event4),
            'event5' => html_entity_decode($event5)
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
	  
  }
**/