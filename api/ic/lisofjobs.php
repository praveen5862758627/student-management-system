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



$idc = $_POST['cat_val'];
$useridforic = $_POST['useridforic'];

$insidforic = $_POST['insidforic'];
$getuserfname = $_POST['getuserfname'];


$resultlesson = $post->listyofjobs($idc);
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


        $resultlesson11 = $post->listodcount($id, $companyid, $useridforic, $insidforic);
        // Get row count
        $numlesson11 = $resultlesson11->rowCount();

        if ($numlesson11 > 0)
            $applistate = "<span style='color:green;font-weight:bold'><i class='w-fa fas fa-check'></i> Applied</span>";
        else
            $applistate = '<a style="text-decoration:underline;color:blue" onclick=\'applyjob("' . $id . '","' . $companyid . '","' . $getuserfname . '")\' >Apply</a>';


        $old_date_timestamp = strtotime($jobenddate);
        $dateob = date('Y-m-d', $old_date_timestamp);

        if ($dateob >= date('Y-m-d')) {

            $post_item = array(
                'name' => html_entity_decode($name),
                'description' => html_entity_decode($description),
                'jobenddate' => html_entity_decode($jobenddate),
                'noofposition' => html_entity_decode($noofposition),
                'applyjob' => html_entity_decode($applistate)
            );
        } else {
            $post_item = array(
                'name' => html_entity_decode($name),
                'description' => html_entity_decode($description),
                'jobenddate' => html_entity_decode($jobenddate),
                'noofposition' => html_entity_decode($noofposition),
                'applyjob' => html_entity_decode('Expired')
            );
        }
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
  
 
