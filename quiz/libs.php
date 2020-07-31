<?php
//$quizurlroot = 'https://nsms.odinlearning.in/lmsdata/QA/01-NumberSystems/level1/quiz.json';

include "../../config/myconfig.php";


if($_GET['url'] != NULL )
{
$quizurlroot =  $_GET['url'];
$_SESSION['urlquiz'] = $quizurlroot ;
}
else 
{
	$quizurlroot =  $_SESSION['urlquiz'];
}



//$questionBank = 'https://nsms.odinlearning.in/lmsdata/QuestionBank/';

$questionBank = $config['MyConf']['questionBank'];


function encrypt($sData){
$id=(double)$sData*543544.456;
return base64_encode($id);
}

function decrypt($sData){
$url_id=base64_decode($sData);
$id=(double)$url_id/543544.456;
return $id;
}
