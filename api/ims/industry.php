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

$prod_cat = $_POST['cat_val'];

// $prod_cat = "";


$resultlesson = $post->industrysearch($prod_cat);
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

        $codename = 'industry';

        $post_item = array(
            'id' => html_entity_decode($id),
            'code' => html_entity_decode($code),
            'name' => html_entity_decode($name),
            'description' => html_entity_decode($description),
            'detailsindustry' => html_entity_decode('<a style="cursor:pointer;color:blue"  onclick="showdetail(\'' . $code . '\',\'' . $codename . '\')" >Show details</a>'),
            'link' => html_entity_decode("<a style='cursor:pointer;color:blue' onclick='showrelatedcompanies($id)'>Show related Companies</a>")
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
  
 
