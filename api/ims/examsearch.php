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

// $prod_cat = $_POST['cat_val'];

$prod_cat = "";


$resultlesson = $post->examsearch($prod_cat);
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
        $codename = 'exams';

        $post_item = array(
            //  'id' => html_entity_decode($tid),
            'tname1' => html_entity_decode($tname),
            'compname1' => html_entity_decode($compname),
            'tcutoff1' => html_entity_decode($tcutoff),
            'tminage1' => html_entity_decode($tminage),
            'tmaxage1' => html_entity_decode($tmaxage),
            'detailsindustry' => html_entity_decode('<a style="cursor:pointer;color:blue"  onclick="showdetail(\'' . $tcode . '\',\'' . $codename . '\')" >Show details</a>'),
            'link' => html_entity_decode("<a style='cursor:pointer;color:blue' onclick='showrelatedschedules($tid)'>Show Exam Schedules</a>")
        );

        // Push to "data"
        array_push($posts_arr, $post_item);
        // array_push($posts_arr['data'], $post_item);
    }

    $json_data = array("data" => $posts_arr);

    // Turn to JSON & output
    echo json_encode($json_data);
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
