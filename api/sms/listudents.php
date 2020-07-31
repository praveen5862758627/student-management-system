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



$domainkey = $_POST['cat_val'];

if ($_POST['type'] == 'serachtextbox') {


    $searchstr = $_POST['searchstr'];

    $resultlesson = $post->userslistbytextsearch($searchstr);
} else if ($_POST['type'] == 'list') {

    $resultlesson = $post->userslist();
} else {

    $searchstr = $_POST['searchstr'];
    $educationtype = $_POST['educationtype'];



    $resultlesson = $post->userslistserach($searchstr, $educationtype);
}
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


        $stram = $post->getgradution($uid);


        if ($domainkey == 'none')
            $domainkey1 = "";
        else
            $domainkey1 = $domainkey;

        $codename = 'industry';

        $post_item = array(
            'id' => html_entity_decode($uid),
            'fname' => html_entity_decode($ufname . ' ' . $ulname),
            /* 'email' => html_entity_decode($uemail),
              'emailalt' => html_entity_decode($uemailalternate),
              'phonenumber' => html_entity_decode($uphonenumber),
              'phonenumberalt' => html_entity_decode($uphonenumalter), */
            'stream' => html_entity_decode($post->getgradutionname($stram[0])),
            'specialization' => html_entity_decode($stram[1]),
            'link' => html_entity_decode("<a style='cursor:pointer;color:blue' target='_blank' href='https://" . $domainkey1 . "sms.odinlearning.in/users/studentcv/" . $domainkey . "/" . $uid . "/" . $umoodleuid . "'>View CV</a>")

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
  
 
