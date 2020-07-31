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
$companaytype = $_POST['companaytype'];


// $prod_cat = 13;

$resultlesson = $post->semestercompsstudentnolimi($prod_cat);
// Get row count
$numlesson = $resultlesson->rowCount();


//  echo $numlesson;
//  exit;


/* if($post->require_auth()){



  /************ lesson **************** */

if ($numlesson > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while ($row = $resultlesson->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        //  echo '<option value="'. $row["cat_name"] .'">'. $row["cat_name"] .'</option>';
        //  $code = $row["code"];

        $courseidget = $post->getcourseid($topic_code);


        if ($companaytype == 1) {
            $remove1 = '<a id="hideactionforstudent" onclick=\'openmodalboxforlearning("' . $topic_code . '","' . $level_code . '")\' style="cursor:pointer" >Learning Modules</a>';

            $viewgrade = '<a id="hideactionforstudent1" onclick=\'opengradebookofstudent("' . $courseidget . '")\' style="cursor:pointer" >View</a>';
        } else {

            $remove1 = '<a id="hideactionforstudent" onclick="displayerrorformodule()" href="#" style="cursor:pointer;opacity: 0.4;" >Learning Modules</a>';
            $viewgrade = '<a id="hideactionforstudent1" onclick="displayerrorforgrade()" href="#" style="cursor:pointer;opacity: 0.4;" >View</a>';
        }



        $post_item = array(
            // 'semester_id' => html_entity_decode($semester_id),
            'topiccode' => html_entity_decode($post->gettopicname($topic_code)),
            'lessoncode' => html_entity_decode($post->getlesson($lesson_code)),
            // 'levelcode' => html_entity_decode($level_code),
            'score' => html_entity_decode($score),
            'action' => html_entity_decode($remove1),
            'grade' => html_entity_decode($viewgrade)
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
