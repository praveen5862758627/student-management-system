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



//$domainkey = $_POST['cat_val'];




$resultlesson = $post->listcompanies();
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

        $getcomapnyname11 = $post->getcomapnynamenew($uid);

        $post_item = array(
            'id' => html_entity_decode($uid),
            'name' => html_entity_decode($getcomapnyname11),
            /* 'email' => html_entity_decode($uemail),
              'emailalt' => html_entity_decode($uemailalternate),
              'phonenumber' => html_entity_decode($uphonenumber),
              'phonenumberalt' => html_entity_decode($uphonenumalter), */
            /* 'stream' => html_entity_decode($post->getgradutionname($stram[0])),
              'specialization' => html_entity_decode($stram[1]), */
            'actionview' => html_entity_decode("<a style='cursor:pointer;color:blue' onclick='shojobslist($uid)'>View Jobs</a>")

                /* ,
                  'description' => html_entity_decode($description),
                  'detailsindustry' => html_entity_decode('<a style="cursor:pointer;color:blue"  onclick="showdetail(\''.$code.'\',\''.$codename.'\')" >Show details</a>'),
                  'link' => html_entity_decode("<a style='cursor:pointer;color:blue' onclick='showrelatedcompanies($id)'>Show related Companies</a>") */
        );

        // Push to "data"
        array_push($posts_arr, $post_item);
        // array_push($posts_arr['data'], $post_item);
    }

    $json_data = array("data" => $posts_arr);

    // Turn to JSON & output
    echo json_encode($json_data);
} else {


    $json_data = array("data" => "No data found");

    echo json_encode($json_data);
}
  
 
