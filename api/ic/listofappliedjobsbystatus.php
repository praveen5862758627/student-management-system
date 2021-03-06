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




$useridforic = $_POST['useridforic'];

$insidforic = $_POST['insidforic'];
$collgedomainkey = $_POST['collgedomainkey'];

if ($collgedomainkey == 'none')
    $cdomain = "";
else
    $cdomain = $collgedomainkey;


$resultlesson = $post->listyofjobsappliedins($useridforic, $insidforic);
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


        // $resultlesson11 = $post->listodcount($id,$companyid,$useridforic,$insidforic);

        $jonb = $post->getjobnameandesc($jobid);

        $post_item = array(
            'studentname' => html_entity_decode($studentname),
            'comopanyname' => html_entity_decode($post->getcomapnyname($companyid)),
            'jobtitle' => html_entity_decode($jonb[0]),
            'jobdescription' => html_entity_decode($jonb[1]),
            'jobenddate' => html_entity_decode($jonb[2]),
            'status' => html_entity_decode($status),
            'applieddate' => html_entity_decode($appliedforjobdate),
            'proceeseddate' => html_entity_decode($statusprocesseddate),
            'viewcv' => html_entity_decode('<a style="color:blue;text-decoration:underline" href="https://' . $cdomain . 'sms.odinlearning.in/users/studentcv/' . $collgedomainkey . '/' . $iuserid . '/0" target="_blank">View</a>')
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
  
 
