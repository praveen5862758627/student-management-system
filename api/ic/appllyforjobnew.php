<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once 'config/Database.php';
include_once 'models/Post.php';
error_reporting(0);

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);



$userid = $_POST['userid'];

//$userid = 45;





$resultlesson = $post->listofappliedjobswithuser($userid);
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


        /*  $resultlesson11 = $post->listodcount($id,$companyid,$useridforic,$insidforic);

          $numlesson11 = $resultlesson11->rowCount();

          if($numlesson11 > 0 )
          $applistate = "<span style='color:green;font-weight:bold'><i class='w-fa fas fa-check'></i> Applied</span>";
          else
          $applistate = '<a style="text-decoration:underline;color:blue" onclick="applyjob('.$id.','.$companyid.')">Apply</a>'; */
        $jonb = $post->getjobnameandesc($jobid);


        $collegedetails = $post->getcollegedetaoils($institutecode);

        if ($collegedetails[1] == 'none')
            $dkey = "";
        else
            $dkey = $collegedetails[1];


        if ($status == 'Processing')
            $color = 'green';
        else
            $color = 'blue';

        if ($status == 'Rejected')
            $color1 = 'green';
        else
            $color1 = 'blue';


        if ($status == 'Approved')
            $color3 = 'green';
        else
            $color3 = 'blue';


        //$status11 ='<div class="custom-control custom-radio"><input type="radio" class="custom-control-input" id="defaultUnchecked'.$id.'" name="defaultExampleRadios'.$id.'"><label class="custom-control-label" for="defaultUnchecked'.$id.'">Eliglible</label></div><div class="custom-control custom-radio"><input type="radio" class="custom-control-input" id="defaultChecked'.$id.'" name="defaultExampleRadios'.$id.'" ><label class="custom-control-label" for="defaultChecked'.$id.'">Rejected</label></div>';

        $status11 = '<a style="cursor:pointer;color:' . $color . '" onclick="changestudentstatus(' . $id . ',1)" >Processing</a><br /><a style="cursor:pointer;color:' . $color3 . '" onclick="changestudentstatus(' . $id . ',3)" >Approved</a><br /><a style="cursor:pointer;color:' . $color1 . '" onclick="changestudentstatus(' . $id . ',2)" >Rejected</a>';

        $post_item = array(
            'collegename' => html_entity_decode($collegedetails[0]),
            'jobtitle' => html_entity_decode($jonb[0]),
            'jobdescription' => html_entity_decode($jonb[1]),
            'jobenddate' => html_entity_decode($jonb[2]),
            'studentname' => html_entity_decode($studentname),
            'updatedstatus' => html_entity_decode($status11),
            'applieddate' => html_entity_decode($appliedforjobdate),
            'proceeseddate' => html_entity_decode($statusprocesseddate),
            'viewcv' => html_entity_decode('<a style="cursor:pointer;color:blue" target="_blank" href="https://' . $dkey . 'sms.odinlearning.in/users/studentcv/' . $collegedetails[1] . '/' . $iuserid . '/0">View CV</a>')
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
  
 
