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


/*

  $useridforic = $_POST['useridforic'];

  $insidforic = $_POST['insidforic'];
  $collgedomainkey = $_POST['collgedomainkey'];

  if($collgedomainkey == 'none')
  $cdomain = "";
  else
  $cdomain = $collgedomainkey; */


$resultlesson = $post->listodspearlikes();
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

        $userdeatils = $post->getspeakerdetails($userid);

        $getlikes = $post->getallthelikes($userid, 1);
        $getunlikes = $post->getallthelikes($userid, 2);

        // $resultlesson11 = $post->listodcount($id,$companyid,$useridforic,$insidforic);
        //$jonb = $post->getjobnameandesc($jobid); 

        $likes = '<button type="button" class="btn btn-primary">Likes <span class="badge badge-danger ml-2">' . $getlikes . '</span></button>';
        $unlikes = '<button type="button" class="btn btn-primary">Unlikes  <span class="badge badge-danger ml-2">' . $getunlikes . '</span></button>';

        $post_item = array(
            'username' => html_entity_decode($userdeatils[0] . ' ' . $userdeatils[1]),
            // 'contactdetails' => html_entity_decode($userdeatils[0].' '.$userdeatils[1])
            'contactdetails' => html_entity_decode('<i class="fas fa-envelope mr-3"></i>' . $userdeatils[2] . '<br /><i class="w-fa fas fa-phone mr-3"></i>' . $userdeatils[3]),
            'moreinfo' => html_entity_decode('<a style="color:blue;text-decoration:underline"  onclick=\'redirecturlsstudent1("https://iconnect.odinlearning.in/users/displaycardsdetails/' . $userid . '/1/none","Speaker :' . $userdeatils[0] . ' ' . $userdeatils[1] . ' details")\'    data-toggle="tooltip" data-placement="top"
  title="More Information"><i class="w-fa fas fa-align-justify mr-3"></i></a>'),
            'liekstab' => html_entity_decode($likes . ' ' . $unlikes)
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
  
 
