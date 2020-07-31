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






$insidforic = $_POST['insidforic'];


$resultlesson = $post->listyofjobsappliedprojectsbystudents($insidforic);
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


        if ($type == '2') {


            $getprojdetails = $post->getprojectdeyils($projectid);
            $appliedtyep = 'Project Mentor';
            //$removeapliedprohject ='<button type="button" class="btn btn-red" onclick=\'removefromappliedproject("'.$userid.'","'.$type.'","'.$studentid.'","'.$projectid.'","'.$inscode.'")\' ><i class="fas fa-times-circle pr-2" aria-hidden="true"></i>Remove</button>';
        } else if ($type == '3') {

            $getprojdetails = $post->getapprenticedetails($projectid);
            $appliedtyep = 'Apprenticeship';

            //$removeapliedprohject =' <button type="button"  class="btn btn-red" onclick=\'removefromappliedproject("'.$userid.'","'.$type.'","'.$studentid.'","'.$projectid.'","'.$inscode.'")\' ><i class="fas fa-times-circle pr-2" aria-hidden="true"></i>Remove</button>';
        }


        $userdetails = $post->getalluserdetails($studentid);


        $getuser = $post->getspeakerdetails($userid);

        $getuserdetails = '<i class="fas fa-user mr-3"></i>' . $getuser[0] . ' ' . $getuser[1] . '<br /><i class="fas fa-envelope mr-3"></i>' . $getuser[2] . '<br /><i class="w-fa fas fa-phone mr-3"></i>' . $getuser[3];

        $post_item = array(
            'desctription' => html_entity_decode($getprojdetails[0]),
            'definition' => html_entity_decode($getuserdetails),
            'type' => html_entity_decode($appliedtyep),
            'studentname' => html_entity_decode($studentname),
            'studentemailaddress' => html_entity_decode($studentemail)
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
  
 
