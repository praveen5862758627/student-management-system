<?php
session_start();
error_reporting(0);
include 'libs.php';
if (!isset($_SESSION["userquiz"])) {

//header('Location: index.php'); 
echo 'Invalid session key.';
exit;
}
$string = file_get_contents($quizurlroot);
$json_data = json_decode($string, true);

/* echo $json_data["opentime"]; 
  echo $json_data["closetime"]; */
date_default_timezone_set('Asia/Kolkata');
// echo date("Y-m-d H:i:s");
/* $paymentDate = strtotime(date("Y-m-d H:i:s"));
  $contractDateBegin = strtotime($json_data["opentime"]);
  $contractDateEnd = strtotime($json_data["closetime"]);

  if($paymentDate > $contractDateBegin && $paymentDate < $contractDateEnd) {

  } else {
  echo "Quiz not available at the moment.";
  exit;
  } */



if($_SESSION['quizstartdate'] == 0)
{

$_SESSION['quizstartdate'] = date('Y-m-d H:i:s');
}



if(!isset($_GET['n']))
$a = 0;
else
$a = $_GET['n'];


if(!isset($_GET['question']))
$b = 0;
else
$b = $_GET['question'];




if (in_array($a.$b.'100', $_SESSION["sectionarray".$a]))
{
// echo "Match found";
}
else
{
//echo "Match not found";
array_push($_SESSION["sectionarray".$a], $a.$b.'100');

}
/* print_r($_SESSION["sectionarray".$a]);
  echo count($_SESSION["sectionarray".$a]); */
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link href="/img/favicon.png" type="image/x-icon" rel="icon"/><link href="/img/favicon.png" type="image/x-icon" rel="shortcut icon"/>
        <title>ODIN QUIZ System</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.min.css" rel="stylesheet">

        <style>

            .map-container{
                overflow:hidden;
                padding-bottom:56.25%;
                position:relative;
                height:0;
            }
            .map-container iframe{
                left:0;
                top:0;
                height:100%;
                width:100%;
                position:absolute;
            }

            .pills-blue-teal .nav-item .nav-link.active {
                background-color: #4fc3f7;
                -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
                -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
                animation-name: example;
                animation-duration: 4s;
            }
            /* Safari 4.0 - 8.0 */
            @-webkit-keyframes example {
                from {background-color: #4fc3f7;}
                to {background-color: #009688;}
            }

            /* Standard syntax */
            @keyframes example {
                from {background-color: #4fc3f7;}
                to {background-color: #009688;}
            }

            .pills-outline-purple-anm .nav-item .nav-link.active {
                border: 2px solid #9c27b0;
                color: #9c27b0;
                background-color: transparent;
                -webkit-animation-name: outline; /* Safari 4.0 - 8.0 */
                -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
                animation-name: outline;
                animation-duration: 4s;
            }
            /* Safari 4.0 - 8.0 */
            @-webkit-keyframes outline {
                from {border: 2px solid #9c27b0; color: #9c27b0;}
                to {border: 2px solid #f48fb1; color: #f48fb1;}
            }

            /* Standard syntax */
            @keyframes outline {
                from {border: 2px solid #9c27b0; color: #9c27b0;}
                to {border: 2px solid #f48fb1; color: #f48fb1;}
            }

            .pills-orange-anm .nav-item .nav-link.active {
                background-color: #ffa000 ;
                -webkit-animation-name: orange; /* Safari 4.0 - 8.0 */
                -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
                animation-name: orange;
                animation-duration: 4s;
            }
            /* Safari 4.0 - 8.0 */
            @-webkit-keyframes orange {
                from {background-color: #ffa000 ;}
                to {background-color: #f44336;}
            }

            /* Standard syntax */
            @keyframes orange {
                from {background-color: #ffa000 ;}
                to {background-color: #f44336;}
            }

        </style>
    </head>

    <body class="grey lighten-3">


        <?php
        $string = file_get_contents($quizurlroot);
        $json_data = json_decode($string, true);
        ?>



        <!--Main layout-->
        <main class="" style="padding-left:0px;margin-top: -36px;">
            <div class="container-fluid mt-5">

                <!-- Heading -->
                <div class="card mb-4 wow fadeIn">

                    <!--Card content-->
                    <div class="card-body d-sm-flex justify-content-between">

                        <h4 class="mb-2 mb-sm-0 pt-1">

                            <span ><?php echo $json_data["name"]; ?></span>
                        </h4>

<?php if($_SESSION["timeLeft"] != 0 || $_SESSION["timeLeft"] != "" ) { ?>
                        <a href="#" class="nav-link border border-light rounded waves-effect" id="changecolloo">
                            Time Left : <span id="count">00:00:00</span>
                        </a>
<?php } ?>


                        <select class="browser-default custom-select" style="width:200px;background-color: yellow;" onchange="replacveurl(this.value)" >
                            <!--<option value="">Choose Section</option>-->
                            <?php
                            $n = 0;

                            foreach ($json_data["Sections"] as $key => $value) {
                            ?>
                            <option value="<?php echo $n; ?>" <?php if($n == $a) { echo "selected";
                            } ?> ><?php echo $value['section'][0]['name']; ?></option>
                            <?php $n++;
                            }
                            ?>
                        </select>

                        <script>

                            function recivemark(a)
                            {

                                document.getElementById("loadvaloida").value = a;

                            }
                            function replacveurl(a) {
                                //alert(a);
                                window.location.replace("dashboard.php?n=" + a + "&question=0");
                            }

                            function questionsupdate(a)
                            {
                                window.location.replace("dashboard.php?n=" + getUrlVars()["n"] + "&question=" + a + "&nav=1");
                            }

                            function getUrlVars() {
                                var vars = {};
                                var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,
                                        function (m, key, value) {
                                            vars[key] = value;
                                        });
                                return vars;
                            }

                            function savequestionsquiz(totalquestion)
                            {

                                if (Number(getUrlVars()["question"]) == Number(totalquestion - 1))
                                    question = 0;
                                else
                                    question = Number(getUrlVars()["question"]) + 1;

                                window.location.replace("dashboard.php?n=" + getUrlVars()["n"] + "&question=" + question);
                            }
                            function onsubmitcheck()
                            {
                                if (document.getElementById("loadvaloida").value == 0) {
                                    var choosecheckbox = 'defaultExampleRadios' + getUrlVars()['n'] + getUrlVars()['question'];
                                    //toastr.error('Please choose an option');
                                    if (!$("input[name='" + choosecheckbox + "']:checked").val()) {
                                        alert('Please choose an option');
                                        return false;
                                    }
                                }
                            }

                            function claerresponse() {
                                var choosecheckbox = 'defaultExampleRadios' + getUrlVars()['n'] + getUrlVars()['question'];
                                $("input[name='" + choosecheckbox + "']").prop("checked", false);
                            }
                        </script>

                        <?php
                        if (isset($_POST['markforreviewnext'])){

                        $_SESSION["questionnumbermarkforreview".$a.$b] = 1;

                        //$_SESSION["questionnumbermarkforreview".$a.$b] = 1;
                        $_SESSION["questionnumbersavemarkforreview".$a.$b] = 0;
                        $_SESSION["questionnumbersavenext".$a.$b] = 0;

                        /* echo $_SESSION["questionnumber".$a.$b];
                          exit; */

                        $numberofquestioninthesecyion = $_POST['numberofquestioninthesecyion'];


                        /* if($_SESSION["markedforreview".$a] <= ($numberofquestioninthesecyion - 1 )) {
                          $_SESSION["markedforreview".$a] =  isset($_SESSION['markedforreview'.$a]) ? ++$_SESSION['markedforreview'.$a] : 0;
                          } */


                        if (in_array($a.$b.'200', $_SESSION["markedforreview".$a]))
                        {
                        // echo "Match found";
                        //array_diff($_SESSION["markedforreview".$a], array($a.$b.'200'));
                        }
                        else
                        {
                        //echo "Match not found";
                        array_push($_SESSION["markedforreview".$a], $a.$b.'200');
                        }




                       /* if($_GET['question'] == $numberofquestioninthesecyion - 1)
                        $question = 0;
                        else
                        $question = $_GET['question']+1;

                        echo("<script>location.href ='dashboard.php?n=$a&question=$question';</script>");*/
                            
                            
                                              if($_GET['question'] == $numberofquestioninthesecyion - 1)
                            {
                                 $question = 0;
                                echo("<script>alert('You have reached end of the section.');</script>");
                            }
                       
                        else
                        {
                             $question = $_GET['question']+1;
                        echo("<script>location.href ='dashboard.php?n=$a&question=$question';</script>");
                        }
                            

                        }


                        if (isset($_POST['submitsavemarkforreview'])){
							
							
				$_SESSION["postedquestiontype".$a.$b] = $_POST['postedquestiontype'.$_GET['n'].$_GET['question']];


                        $_SESSION["questionnumbersavemarkforreview".$a.$b] = 1;

                        $_SESSION["questionnumbermarkforreview".$a.$b] = 0;

                        $_SESSION["questionnumbersavenext".$a.$b] = 0;

                        //	$_SESSION["notvisited".$a] =  isset($_SESSION['notvisited'.$a]) ? ++$_SESSION['notvisited'.$a] : 0;
                        //	$_SESSION["answeredandmarkedforreview".$a] =  isset($_SESSION['answeredandmarkedforreview'.$a]) ? ++$_SESSION['answeredandmarkedforreview'.$a] : 0;



                        if (in_array($a.$b.'200', $_SESSION["answeredandmarkedforreview".$a]))
                        {
                        // echo "Match found";
                        // array_diff($_SESSION["answeredandmarkedforreview".$a], array($a.$b.'200'));
                        }
                        else
                        {
                        //echo "Match not found";
                        array_push($_SESSION["answeredandmarkedforreview".$a], $a.$b.'200');
                        }

                        $_SESSION["questionanswerresponses".$a.$b] = $_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']];


                        if($_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']] == 1 )
                        $questionanswerresponsesuserchoice = 'a';
                        else if($_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']] == 2 )
                        $questionanswerresponsesuserchoice = 'b';
                        else if($_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']] == 3 )
                        $questionanswerresponsesuserchoice = 'c';
                        else if($_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']] == 4 )
                        $questionanswerresponsesuserchoice = 'd';
                        else if($_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']] == 5 )
                        $questionanswerresponsesuserchoice = 'e';


                    //    $_SESSION["questionanswerresponsesuserchoice".$a.$b] = $questionanswerresponsesuserchoice;



                       /* if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 1)
                        $aansw = 'a';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 2)
                        $aansw = 'b';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 3)
                        $aansw = 'c';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 4)
                        $aansw = 'd';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 5)
                        $aansw = 'e';*/
					
		 if($_POST['questiontype'] == 'NU')
						{
							
						
							$check =  $_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']];
                            
                            $value1 =  $_POST['quizgetanv1'.$_GET['n'].$_GET['question']];
                                       $value2 =  $_POST['quizgetanv2'.$_GET['n'].$_GET['question']];
                                       $operator =  $_POST['quizgetanp'.$_GET['n'].$_GET['question']];
             
             $_SESSION["postedanswernu".$a.$b] = $_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']];
                                 $_SESSION["postedanswernuva1".$a.$b] = $_POST['quizgetanv1'.$_GET['n'].$_GET['question']];
                                 $_SESSION["postedanswernuval2".$a.$b] = $_POST['quizgetanv2'.$_GET['n'].$_GET['question']];
                                 $_SESSION["postedanswernuoperator".$a.$b] = $_POST['quizgetanp'.$_GET['n'].$_GET['question']];
                            
                                             if(trim($operator) == '=')
                                          {
                                             if($check == $value1)
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                         else  if(trim($operator) == '>')
                                          {
                                             if($check > $value1)
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                                  else  if(trim($operator) == '<')
                                          {
                                             if($check < $value1)
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                                                else  if(trim($operator) == '>=')
                                          {
                                             if($check >= $value1)
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                                                           else  if(trim($operator) == '<=')
                                          {
                                             if($check <= $value1)
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                                                                       else  if(trim($operator) == '==')
                                          {
                                             if($value1 <= $check && $check <= $value2 )
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                             
                                                                                                    else  if(trim($operator) == '===')
                                          {
                                             if($value1 < $check && $check < $value2 )
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                
                                 $_SESSION["questionanswerresponsesuserchoice".$a.$b] = $qidans;
                                $aansw = $qidans;
                            
                        }
					else if($_POST['questiontype'] == 'MS')
						{
							
						
							  $_SESSION["questionanswerresponsesuserchoice".$a.$b] = $_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']];
                        $aansw = $_POST['quizgetanms'.$_GET['n'].$_GET['question']];
							
						}
						else if($_POST['questiontype'] == 'weighted')
						{
							
							 $_SESSION["quizgetan".$a.$b] = $_POST['quizgetan'.$_GET['n'].$_GET['question']];
						
							 
							
						}
                        else 
						{
							  $_SESSION["questionanswerresponsesuserchoice".$a.$b] = $questionanswerresponsesuserchoice;
                            
                            	   if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 1)
                        $aansw = 'a';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 2)
                        $aansw = 'b';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 3)
                        $aansw = 'c';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 4)
                        $aansw = 'd';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 5)
                        $aansw = 'e';
                   
						}


					


                        $_SESSION["questionanswerresponsescorrectanswer".$a.$b] = $aansw;


                        $questioncodee = $_POST['questioncodee'];
                        $_SESSION[$questioncodee] = $aansw;

                        $_SESSION["questionanswerresponsesnew".$a.$b] = $questioncodee;

                        $numberofquestioninthesecyion = $_POST['numberofquestioninthesecyion'];

                       /* if($_GET['question'] == $numberofquestioninthesecyion - 1)
                        $question = 0;
                        else
                        $question = $_GET['question']+1;
                        echo("<script>location.href ='dashboard.php?n=$a&question=$question';</script>");*/
                            
                            if($_GET['question'] == $numberofquestioninthesecyion - 1)
                            {
                                 $question = 0;
                                echo("<script>alert('You have reached end of the section.');</script>");
                            }
                       
                        else
                        {
                             $question = $_GET['question']+1;
                        echo("<script>location.href ='dashboard.php?n=$a&question=$question';</script>");
                        }
                       
                            
                        }


                        if (isset($_POST['submitquiz'])){
							
							 				$_SESSION["postedquestiontype".$a.$b] = $_POST['postedquestiontype'.$_GET['n'].$_GET['question']];


                        $_SESSION["questionnumbersavenext".$a.$b] = 1;

                        $_SESSION["questionnumbermarkforreview".$a.$b] = 0;
                        $_SESSION["questionnumbersavemarkforreview".$a.$b] = 0;


                        //  $_SESSION["notvisited".$a] =  isset($_SESSION['notvisited'.$a]) ? ++$_SESSION['notvisited'.$a] : 0;
                        // $_SESSION["answered".$a] =  isset($_SESSION['answered'.$a]) ? ++$_SESSION['answered'.$a] : 0;


                        if (in_array($a.$b.'200', $_SESSION["answered".$a]))
                        {
                        // echo "Match found";
                        //array_diff($_SESSION["answered".$a], array($a.$b.'200'));
                        }
                        else
                        {
                        //echo "Match not found";
                        array_push($_SESSION["answered".$a], $a.$b.'200');
                        }


                        $numberofquestioninthesecyion = $_POST['numberofquestioninthesecyion'];

                        if($_GET['question'] == $numberofquestioninthesecyion - 1)
                        $question = 0;
                        else
                        $question = $_GET['question']+1;
					
					   /* if($_POST['questiontype'] == 'MS')
						{
							
							print_r($_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']]);
							exit;
							
						}
                        else 
						{
                   
						}*/
						
						     $_SESSION["questionanswerresponses".$a.$b] = $_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']];

                        if($_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']] == 1 )
                        $questionanswerresponsesuserchoice = 'a';
                        else if($_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']] == 2 )
                        $questionanswerresponsesuserchoice = 'b';
                        else if($_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']] == 3 )
                        $questionanswerresponsesuserchoice = 'c';
                        else if($_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']] == 4 )
                        $questionanswerresponsesuserchoice = 'd';
                        else if($_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']] == 5 )
                        $questionanswerresponsesuserchoice = 'e';
                            
                            if($_POST['questiontype'] == 'NU')
						{
							
						
							$check =  $_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']];
                            
                            $value1 =  $_POST['quizgetanv1'.$_GET['n'].$_GET['question']];
                                       $value2 =  $_POST['quizgetanv2'.$_GET['n'].$_GET['question']];
                                       $operator =  $_POST['quizgetanp'.$_GET['n'].$_GET['question']];
                                
                                
                                $_SESSION["postedanswernu".$a.$b] = $_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']];
                                 $_SESSION["postedanswernuva1".$a.$b] = $_POST['quizgetanv1'.$_GET['n'].$_GET['question']];
                                 $_SESSION["postedanswernuval2".$a.$b] = $_POST['quizgetanv2'.$_GET['n'].$_GET['question']];
                                 $_SESSION["postedanswernuoperator".$a.$b] = $_POST['quizgetanp'.$_GET['n'].$_GET['question']];
                                
                                
                                
                            
                                             if(trim($operator) == '=')
                                          {
                                             if($check == $value1)
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                         else  if(trim($operator) == '>')
                                          {
                                             if($check > $value1)
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                                  else  if(trim($operator) == '<')
                                          {
                                             if($check < $value1)
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                                                else  if(trim($operator) == '>=')
                                          {
                                             if($check >= $value1)
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                                                           else  if(trim($operator) == '<=')
                                          {
                                             if($check <= $value1)
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                                                                       else  if(trim($operator) == '==')
                                          {
                                             if($value1 <= $check && $check <= $value2 )
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                             
                                                                                                    else  if(trim($operator) == '===')
                                          {
                                             if($value1 < $check && $check < $value2 )
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                                
                                 $_SESSION["questionanswerresponsesuserchoice".$a.$b] = $qidans;
                                $aansw = $qidans;
                            
                        }
					else if($_POST['questiontype'] == 'MS')
						{
							
						
							  $_SESSION["questionanswerresponsesuserchoice".$a.$b] = $_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']];
                        $aansw = $_POST['quizgetanms'.$_GET['n'].$_GET['question']];
							
						}
						else if($_POST['questiontype'] == 'weighted')
						{
							$qqqid = 1;
							foreach ($_POST['quizgetan'.$_GET['n'].$_GET['question']] as $optNum => $option) {
    // do stuff with $optNum and $option\\
	
	
	
	if($_SESSION["questionanswerresponses".$_GET['n'].$_GET['question']] == $qqqid) {
	 $_SESSION["quizgetan".$a.$b] = $option;
}
	
	$qqqid++;
}
							
							

							
						
							
						}
                        else 
						{
							  $_SESSION["questionanswerresponsesuserchoice".$a.$b] = $questionanswerresponsesuserchoice;
                            
                            	   if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 1)
                        $aansw = 'a';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 2)
                        $aansw = 'b';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 3)
                        $aansw = 'c';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 4)
                        $aansw = 'd';
                        else if(decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']]) == 5)
                        $aansw = 'e';
                   
						}


        
                        $_SESSION["questionanswerresponsescorrectanswer".$a.$b] = $aansw;

                        $questioncodee = $_POST['questioncodee'];
                        $_SESSION[$questioncodee] = $aansw;
                        $_SESSION["questionanswerresponsesnew".$a.$b] = $questioncodee;

                        if( $_POST['defaultExampleRadios'.$_GET['n'].$_GET['question']] == decrypt($_POST['quizgetan'.$_GET['n'].$_GET['question']])) {

                        //echo "Correct"	;
                        //$_SESSION['correct'.$a.$b] = $_SESSION['correct'.$a.$b] + 1;
                        }
                        else
                        {
                        //echo "Wrong"	;
                        //$_SESSION['wrong'.$a.$b] = $_SESSION['wrong'.$a.$b]+1;
                        }
                            
                             if($_GET['question'] == $numberofquestioninthesecyion - 1)
                            {
                                 $question = 0;
                                echo("<script>alert('You have reached end of the section.');</script>");
                            }
                       
                        else
                        {
                             $question = $_GET['question']+1;
                        echo("<script>location.href ='dashboard.php?n=$a&question=$question';</script>");
                        }

                       // echo("<script>location.href ='dashboard.php?n=$a&question=$question';</script>");

                        //header("Location: dashboard.php?n=".$_GET['n']."&question=".$question);

                        }

                        if (isset($_POST['clearreposness'])){

                        $_SESSION["questionnumbersavemarkforreview".$a.$b] = 0;

                        $_SESSION["questionnumbermarkforreview".$a.$b] = 0;

                        $_SESSION["questionnumbersavenext".$a.$b] = 0;

                        $_SESSION["questionanswerresponses".$a.$b] = "";
                        echo("<script>location.href ='dashboard.php?n=$a&question=$b';</script>");
                        }
                        ?>



                    </div>

                </div>
                <!-- Heading -->

                <!--Grid row-->
                <div class="row wow fadeIn">

                    <!--Grid column-->
                    <div class="col-md-8 mb-4">

                        <!--Card-->
                        <div class="card">

                            <!--Card content-->
                            <div class="card-body">


<?php
foreach ($json_data["Sections"][$a] as $key => $value) { //increment the array section
$qid = 1;
$numberofquestioninthesecyion = 0;

$result = array();

foreach($value[1]['questiongroups'] as $key => $getnumberofquestio )
{
$numberofquestioninthesecyion += $getnumberofquestio['noofquestions'];
$string11 = file_get_contents($questionBank.$getnumberofquestio['category'].'/'.$getnumberofquestio['level'].'/question.json');
//$json_data11 = json_decode($string11, true);

$json_data11 = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $string11), true );

//var_dump($string11);
//var_dump($json_data11);
    
      $answersfq = $json_data11['question'];
          
                                       shuffle($answersfq); 

$questionall = array_slice($answersfq, 0, $getnumberofquestio['noofquestions']);


//var_dump($questionall);

$result = array_merge($result, $questionall);

}
?>


                                <?php
                                $questionssuffle = array_slice($result, 0, $numberofquestioninthesecyion);



                                if($_SESSION['sectionswisequestions'.$a] == 0 ){

                                // echo "dsjadkjdfa0";
                                $_SESSION['sectionswisequestions'.$a] = 1;



                                shuffle($questionssuffle);
                                $_SESSION['sectionswisequestionsnew'.$a] = $questionssuffle;
                                $questionssuffle11 = $questionssuffle;
                                }else{
                                /*  echo "dsjadkjdfa1"; */
                                $questionssuffle11 = $_SESSION['sectionswisequestionsnew'.$a];

                                }



                                $value = $questionssuffle11[$b];
                                ?>


                                <span style="font-size: 21px;
                                      font-weight: bold;">Question <?php echo $b + 1; ?>:</span>
                                <hr />

                                <p> <?php echo $value['questiontext']['text']; ?></p>
								<?php if($value['type']['text'] == 'NU') { ?>
                                			<script> 
								
								          function onsubmitcheck1()
                            {
                               // $('input[name=QUEST7_prefix]').val();
                                if (document.getElementById("loadvaloida").value == 0) {
                                    var choosecheckbox = 'defaultExampleRadios' + getUrlVars()['n'] + getUrlVars()['question'];
                                    //toastr.error('Please choose an option');
                                    if ($("input[name='" + choosecheckbox + "']").val()=="") {
                                        alert('Please enter the answer.');
                                        return false;
                                    }
                                }
                            }
							</script>
                                
                                
                                
								<?php } else  if($value['type']['text'] == 'MS') { ?>
								
								<script> 
								
								          function onsubmitcheck1()
                            {
                                if (document.getElementById("loadvaloida").value == 0) {
                                    var choosecheckbox = 'defaultExampleRadios' + getUrlVars()['n'] + getUrlVars()['question']+'[]';
                                    //toastr.error('Please choose an option');
                                    if (!$("input[name='" + choosecheckbox + "']:checked").val()) {
                                        alert('Please choose an option');
                                        return false;
                                    }
                                }
                            }
							</script>
								<?php }  else {?>
								
														<script> 
								
								          function onsubmitcheck1()
                            {
                                if (document.getElementById("loadvaloida").value == 0) {
                                    var choosecheckbox = 'defaultExampleRadios' + getUrlVars()['n'] + getUrlVars()['question'];
                                    //toastr.error('Please choose an option');
                                    if (!$("input[name='" + choosecheckbox + "']:checked").val()) {
                                        alert('Please choose an option');
                                        return false;
                                    }
                                }
                            }
							</script>
								
								
								<?php } ?>

                              <form  method="post" id="quiz" onsubmit="return onsubmitcheck1();">
								

                                    <input type="hidden" name="questioncodee" value="<?php echo $value['name']['text']; ?>" />
									 <input type="hidden" name="questiontype" value="<?php echo $value['type']['text']; ?>" />

                                    <?
    if($value['type']['text'] == 'NU') {

                                   foreach($value['answer'] as $key => $value)
                                    {

                                       
                                       
                                       $check = $_SESSION["questionanswerresponses".$a.$b];
                                       $value1 =  trim($value['value1']);
                                       $value2 =  trim($value['value2']);
                                       $operator =  trim($value['operator']);
                      
                                                                                    
                                                                                   

                                       
                                    if(trim($value['marks']) =='100') {?>

<?php // echo encrypt('45515111'.$value['text']);  ?>

                                   <!-- <input type="hidden" name="quizgetan<?php echo $_GET['n'].$_GET['question']; ?>" value="<?php echo $qidans; ?>" />-->
                                  <input type="hidden" name="quizgetanv1<?php echo $_GET['n'].$_GET['question']; ?>" value="<?php echo $value1; ?>" />
                                  <input type="hidden" name="quizgetanv2<?php echo $_GET['n'].$_GET['question']; ?>" value="<?php echo $value2; ?>" />
                                  <input type="hidden" name="quizgetanp<?php echo $_GET['n'].$_GET['question']; ?>" value="<?php echo $operator; ?>" />

<?php }
?>
<?php

?>

                                        <input type="text" class="form-control" id="<?php echo $qid; ?>defaultUnchecked5" name="defaultExampleRadios<?php echo $_GET['n'].$_GET['question']; ?>" value="<?php echo $check; ?>" <?php echo $check; ?> onkeypress="return fun_AllowOnlyAmountAndDot(this.id);" >

                                        <label  for="<?php echo $qid; ?>defaultUnchecked5"><?php echo $value['text']; ?><?php //echo $value['marks']; ?></label>
                                    
                                        <?php
                                        $qid++;
                                        }
 
    }
									
									else if($value['type']['text'] == 'MS') {
                                        
                                        $answersf = $value['answer'];
          
                                       shuffle($answersf); 
										
										    foreach($answersf as $key => $value)
                                    {

                                    if(trim($value['marks']) =='100') {?>

<?php // echo encrypt('45515111'.$value['text']);  ?>

                                    <input type="hidden" name="quizgetanms<?php echo $_GET['n'].$_GET['question']; ?>[]" value="<?php echo $qid; ?>" />

<?php }
?>




                                    <div class="form-check" style="padding-bottom: 10px;">

<?php

//$str = implode (", ", $_SESSION["questionanswerresponses".$a.$b] );
$str = $_SESSION["questionanswerresponses".$a.$b];

//var_dump($str );

if (in_array($qid, $str))
{
$check = 'checked';

} else {
$check = '';
}
?>



                                        <input type="checkbox" class="form-check-input" id="<?php echo $qid; ?>defaultUnchecked5" name="defaultExampleRadios<?php echo $_GET['n'].$_GET['question']; ?>[]" value="<?php echo $qid; ?>" <?php echo $check; ?> >

                                        <label class="form-check-label" for="<?php echo $qid; ?>defaultUnchecked5"><?php echo $value['text']; ?><?php //echo $value['marks']; ?></label>
                                    </div>
                                        <?php
                                        $qid++;

									}
									}
									else if($value['type']['text'] == 'weighted') {
               if($_SESSION["questionanswerresponses".$a.$b]  == "")
                                        {
                                            $answersf = $value['answer'];
                                           shuffle($answersf); 
                                             $_SESSION["shufflenaser".$a.$b] =$answersf;
                                        }
                                       else 
                                       {
                                           $answersf =  $_SESSION["shufflenaser".$a.$b];
                                           
                                       }
                                      //echo $value['type']['text'];
									  
									//  $_SESSION["postedquestiontype".$a.$b] = 'weighted';
                                        
                                    foreach($answersf as $key => $value)
                                    {
                                   ?>

                                    <input type="hidden" name="quizgetan<?php echo $_GET['n'].$_GET['question']; ?>[]" value="<?php echo $value['marks']; ?>" />


 <input type="hidden" name="postedquestiontype<?php echo $_GET['n'].$_GET['question']; ?>" value="weighted" />


                                    <div class="custom-control custom-radio" style="padding-bottom: 10px;">

<?php
if($_SESSION["questionanswerresponses".$a.$b] == $qid) {
$check = 'checked';
} else {
$check = '';
}
?>



                                        <input type="radio" class="custom-control-input" id="<?php echo $qid; ?>defaultUnchecked5" name="defaultExampleRadios<?php echo $_GET['n'].$_GET['question']; ?>" value="<?php echo $qid; ?>" <?php echo $check; ?> >

                                        <label class="custom-control-label" for="<?php echo $qid; ?>defaultUnchecked5"><?php echo $value['text']; ?><?php //echo $value['marks']; ?></label>
                                    </div>
                                        <?php
                                        $qid++;
                                        }

}
									else 
									{
                                        
                                        
                                        if($_SESSION["questionanswerresponses".$a.$b]  == "")
                                        {
                                            $answersf = $value['answer'];
                                           shuffle($answersf); 
                                             $_SESSION["shufflenaser".$a.$b] =$answersf;
                                        }
                                       else 
                                       {
                                           $answersf =  $_SESSION["shufflenaser".$a.$b];
                                           
                                       }
                                      
                                        
                                    foreach($answersf as $key => $value)
                                    {
                                    if(trim($value['marks']) =='100') {?>

<?php // echo encrypt('45515111'.$value['text']);  ?>

                                    <input type="hidden" name="quizgetan<?php echo $_GET['n'].$_GET['question']; ?>" value="<?php echo encrypt($qid); ?>" />

<?php }
?>



                                    <div class="custom-control custom-radio" style="padding-bottom: 10px;">

<?php
if($_SESSION["questionanswerresponses".$a.$b] == $qid) {
$check = 'checked';
} else {
$check = '';
}
?>



                                        <input type="radio" class="custom-control-input" id="<?php echo $qid; ?>defaultUnchecked5" name="defaultExampleRadios<?php echo $_GET['n'].$_GET['question']; ?>" value="<?php echo $qid; ?>" <?php echo $check; ?> >

                                        <label class="custom-control-label" for="<?php echo $qid; ?>defaultUnchecked5"><?php echo $value['text']; ?><?php echo $value['marks']; ?></label>
                                    </div>
                                        <?php
                                        $qid++;
                                        }
								}
                                        }
                                        ?>






                                    <br /><br />

                                    <input type="hidden" name="numberofquestioninthesecyion" value="<?php echo $numberofquestioninthesecyion; ?>" />

                                    <input type="hidden" id="loadvaloida" />

                                    <input type="submit" value="Save & Next" class="btn btn-success" name="submitquiz" onclick='recivemark(0)' style="padding-left: 15px;padding-right: 15px;"/>
                                    <!--<button type="button" class="btn btn-light" onclick="claerresponse()">Clear Response</button>-->

                                    <input type="submit" value="Clear Response" class="btn btn-light" name="clearreposness" style="padding-left: 15px;padding-right: 15px;" />

                                    <input type="submit" value="Save & Mark For Review" class="btn btn-warning" name="submitsavemarkforreview" onclick='recivemark(0)' style="padding-left: 15px;padding-right: 15px;"/>



                                    <input type="submit" value="Mark For Review & Next" class="btn btn-info" onclick='recivemark(1)' name="markforreviewnext" style="padding-left: 15px;padding-right: 15px;"/>

                                </form>

            <!--<button type="button" class="btn btn-success" onclick="savequestionsquiz(<?php echo $numberofquestioninthesecyion; ?>)">Save & Next</button>-->





                            </div>

                        </div>
                        <!--/.Card-->
                        <script>
                            function confimquizsave()
                            {
                                var txt;
                                var r = confirm("Are you sure want to terminate Quiz?");
                                if (r == true) {
                                    window.location.replace("review.php");
                                } else {
                                    txt = "You pressed Cancel!";
                                }
                            }
                        </script>

                        <button type="button" class="btn btn-success" style="    float: right;" onclick="confimquizsave()">Submit</button>

<?php
/*  echo 'Number of Questions: '.$numberofquestioninthesecyion.'<br />';
  echo 'Number of Sections: '.$n.'<br />'; */
?>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-4">

                        <!--Card-->
                        <div class="card mb-4">

                            <!-- Card header -->
                            <!-- <div class="card-header text-center">
                               Pie chart
                             </div>-->

                            <!--Card content-->
                            <div class="card-body" style="font-size:12px">



                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-md-6 col-xl-6" >


<?php
if (isset($_GET['nav'])) {

    if ($_GET['nav'] == '1') {



        //$_SESSION["notvisited".$a] =  isset($_SESSION['notvisited'.$a]) ? ++$_SESSION['notvisited'.$a] : 0;
        //$_SESSION["notanswered".$a]  =  isset($_SESSION['notanswered'.$a]) ? ++$_SESSION['notanswered'.$a] : 0;
        //$numberofquestioninthesecyion = $_POST['numberofquestioninthesecyion'];

        /* if($_SESSION["notanswered".$a] <= ($numberofquestioninthesecyion - 1 )) {

          $_SESSION["notanswered".$a]  =  isset($_SESSION['notanswered'.$a]) ? ++$_SESSION['notanswered'.$a] : 0;
          } */
    }
}
?>



                                        <button type="button" class="btn btn-light"  style="padding: 10px 15px 10px 15px;width:45px"><?php echo ($numberofquestioninthesecyion - count($_SESSION["sectionarray" . $a])) < 0 ? 0 : ($numberofquestioninthesecyion - count($_SESSION["sectionarray" . $a])); ?></button> Not Visited
                                    </div>

                                    <div class="col-md-6 col-xl-6">
                                        <button type="button" class="btn btn-success"  style="padding: 10px 15px 10px 15px;width:45px" id="questionnumbersavenext">
                                        <?php // echo count($_SESSION["answered".$a]); ?></button> Answered
                                    </div>




                                </div>

                                <div class="row">

                                    <div class="col-md-6 col-xl-6">
                                        <button type="button" class="btn btn-danger"  style="padding: 10px 15px 10px 15px;width:45px" id="notansweredtot">
                                            <?php
                                            /* if(isset($_GET['nav'])) {

                                              if ($_GET['nav'] == '1'){

                                              echo abs($_SESSION["notanswered".$a]);
                                              }

                                              }
                                              else
                                              {
                                              echo 0;
                                              } */
                                            //	echo	($numberofquestioninthesecyion - (count($_SESSION["answered".$a]) + count($_SESSION["answeredandmarkedforreview".$a]) )) < 0 ? 0 : ($numberofquestioninthesecyion - (count($_SESSION["answered".$a]) + count($_SESSION["answeredandmarkedforreview".$a]) )); 
                                            ?>

                                        </button> Not Answered
                                    </div>

                                    <div class="col-md-6 col-xl-6">
                                        <button type="button" class="btn btn-info"  style="padding: 10px 15px 10px 15px;width:45px" id="questionnumbermarkforreviewmmmm"><?php // echo count($_SESSION["markedforreview".$a]); ?></button>Marked for Review
                                    </div>
                                </div>
                                <div class="row">

                                    <!--<div class="col-md-6 col-xl-6">
                                  <button type="button" class="btn btn-secondary"  style="padding: 10px 15px 10px 15px;width:45px"><?php echo $_GET['question'] + 1; ?></button> Current Question No.
                                  </div>-->
                                    <div class="col-md-12 col-xl-12">
                                        <button type="button" class="btn btn-warning"  style="padding: 10px 15px 10px 15px;width:45px" id="questionnumbersavemarkforreview"><?php //echo count($_SESSION["answeredandmarkedforreview".$a]);  ?></button>Answered & Marked for Review
                                    </div>

                                </div>



                                <!-- Grid column -->

          <!--    <canvas id="pieChart"></canvas>-->

                            </div>

                        </div>
                        <!--/.Card-->

                        <!--Card-->
                        <div class="card mb-4">

                            <!--Card content-->
                            <div class="card-body">

                                <form  method="post" >

                                    <input type="hidden" name="numberofquestioninthesecyion" value="<?php echo $numberofquestioninthesecyion; ?>" />
<?php
//$z=0;$p=0;$t=0;

for ($m = 0; $m < $numberofquestioninthesecyion; $m++) {
    ?>

                                        <input type="hidden" name="questionnumbernav" value="<?php echo $m; ?>" />



    <?php
    //echo $_SESSION["questionnumber".$n.$s];
    //echo $_SESSION["questionnumber".$a.$b];
    //echo count($_SESSION["questionnumbersavenext".$a.$m]);

    /*
      if($_SESSION['int'.$a] == 0 && $m ==0) { ?>
      <button type="button" class="btn btn-secondary"  style="padding: 10px 15px 10px 15px;width:45px" onclick="questionsupdate(<?php echo $m; ?>)"><?php echo $m+1; ?></button>


      <?php } else */ if ($_SESSION["questionnumbersavenext" . $a . $m] == 1) {
        ?>

                                            <button type="button" id="questionnumbersavenext" class="btn btn-success"  style="padding: 10px 15px 10px 15px;width:45px" onclick="questionsupdate(<?php echo $m; ?>)"><?php echo $m + 1; ?></button>
                                            <?php //echo $p =+ $m; ?>

                                        <?php } else if ($_SESSION["questionnumbersavemarkforreview" . $a . $m] == 1) { ?>

                                            <button type="button" id="questionnumbersavemarkforreview" class="btn btn-warning"  style="padding: 10px 15px 10px 15px;width:45px" onclick="questionsupdate(<?php echo $m; ?>)"><?php echo $m + 1; ?></button>


                                            <?php //echo $z =+ $m; ?>

                                        <?php } else if ($_SESSION["questionnumbermarkforreview" . $a . $m] == 1) { ?>

        <!-- <input type="submit" value="<?php echo $m + 1; ?>" style="padding: 10px 15px 10px 15px;width:45px"  class="btn btn-secondary"  name="questionnumberss"/>-->

                                            <button  type="button" id="questionnumbermarkforreviewccvcvcvxcvx" class="btn btn-info"  style="padding: 10px 15px 10px 15px;width:45px" onclick="questionsupdate(<?php echo $m; ?>)"><?php echo $m + 1; ?></button>
                                            <?php //echo $t =+ $m;  ?>

                                        <?php } else {
                                            ?>
        <!--<input type="submit" value="<?php echo $m + 1; ?>" style="padding: 10px 15px 10px 15px;width:45px"  class="btn btn-light"  name="questionnumberss"/>-->
                                            <button type="button"  class="btn btn-light"  style="padding: 10px 15px 10px 15px;width:45px" onclick="questionsupdate(<?php echo $m; ?>)"><?php echo $m + 1; ?></button>

                                        <?php
                                        }
                                    }

                                    /* echo $z;
                                      echo $p.'<br />';
                                      echo $t.'<br />'; */
                                    ?>

                                </form>



                                <!-- <button type="button" class="btn btn-light"  style="padding: 10px 15px 10px 15px;width:45px">1</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px">2</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px">3</button>
                     <button type="button" class="btn btn-success" style="padding: 10px 15px 10px 15px;width:45px">4</button>
                     <button type="button" class="btn btn-info" style="padding: 10px 15px 10px 15px;width:45px">5</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px">6</button>
                     <button type="button" class="btn btn-success" style="padding: 10px 15px 10px 15px;width:45px" >7</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px">8</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px">9</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px" >10</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px">11</button>
                     <button type="button" class="btn btn-danger" style="padding: 10px 15px 10px 15px;width:45px" >12</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px" >13</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px">14</button>
                       <button type="button" class="btn btn-danger" style="padding: 10px 15px 10px 15px;width:45px">15</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px">16</button>
                       <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px" >17</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px" >18</button>
                        <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px" >19</button>
                     <button type="button" class="btn btn-light" style="padding: 10px 15px 10px 15px;width:45px" >20</button>-->

                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->






            </div>
        </main>
        <!--Main layout-->


        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.min.js"></script>

     <script type="text/javascript" async
src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>  

<script type="text/x-mathjax-config">
MathJax.Hub.Config({
tex2jax: {inlineMath: [["$","$"],["\(","\)"]]}
});
</script>

        <!-- Initializations -->
        <script type="text/javascript">
                                        // Animations initialization
                                        new WOW().init();

        </script>

        <!-- Charts -->
        <script>
            // Line
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });

            //pie
            var ctxP = document.getElementById("pieChart").getContext('2d');
            var myPieChart = new Chart(ctxP, {
                type: 'pie',
                data: {
                    labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
                    datasets: [{
                            data: [300, 50, 100, 40, 120],
                            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                        }]
                },
                options: {
                    responsive: true,
                    legend: false
                }
            });


            //line
            var ctxL = document.getElementById("lineChart").getContext('2d');
            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [{
                            label: "My First dataset",
                            backgroundColor: [
                                'rgba(105, 0, 132, .2)',
                            ],
                            borderColor: [
                                'rgba(200, 99, 132, .7)',
                            ],
                            borderWidth: 2,
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            backgroundColor: [
                                'rgba(0, 137, 132, .2)',
                            ],
                            borderColor: [
                                'rgba(0, 10, 130, .7)',
                            ],
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                },
                options: {
                    responsive: true
                }
            });


            //radar
            var ctxR = document.getElementById("radarChart").getContext('2d');
            var myRadarChart = new Chart(ctxR, {
                type: 'radar',
                data: {
                    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                    datasets: [{
                            label: "My First dataset",
                            data: [65, 59, 90, 81, 56, 55, 40],
                            backgroundColor: [
                                'rgba(105, 0, 132, .2)',
                            ],
                            borderColor: [
                                'rgba(200, 99, 132, .7)',
                            ],
                            borderWidth: 2
                        }, {
                            label: "My Second dataset",
                            data: [28, 48, 40, 19, 96, 27, 100],
                            backgroundColor: [
                                'rgba(0, 250, 220, .2)',
                            ],
                            borderColor: [
                                'rgba(0, 213, 132, .7)',
                            ],
                            borderWidth: 2
                        }]
                },
                options: {
                    responsive: true
                }
            });

            //doughnut
            var ctxD = document.getElementById("doughnutChart").getContext('2d');
            var myLineChart = new Chart(ctxD, {
                type: 'doughnut',
                data: {
                    labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
                    datasets: [{
                            data: [300, 50, 100, 40, 120],
                            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                        }]
                },
                options: {
                    responsive: true
                }
            });

        </script>

        <!--Google Maps-->
        <script src="https://maps.google.com/maps/api/js"></script>
        <script>
            // Regular map
            function regular_map() {
                var var_location = new google.maps.LatLng(40.725118, -73.997699);

                var var_mapoptions = {
                    center: var_location,
                    zoom: 14
                };

                var var_map = new google.maps.Map(document.getElementById("map-container"),
                        var_mapoptions);

                var var_marker = new google.maps.Marker({
                    position: var_location,
                    map: var_map,
                    title: "New York"
                });
            }

            new Chart(document.getElementById("horizontalBar"), {
                "type": "horizontalBar",
                "data": {
                    "labels": ["Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey"],
                    "datasets": [{
                            "label": "My First Dataset",
                            "data": [22, 33, 55, 12, 86, 23, 14],
                            "fill": false,
                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
                                "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)",
                                "rgba(54, 162, 235, 0.2)",
                                "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
                            ],
                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
                                "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
                                "rgb(201, 203, 207)"
                            ],
                            "borderWidth": 1
                        }]
                },
                "options": {
                    "scales": {
                        "xAxes": [{
                                "ticks": {
                                    "beginAtZero": true
                                }
                            }]
                    }
                }
            });

        </script>
    </body>

</html>




<script type="text/javascript" src="js/jquery.cookie.js"></script>
<?php if($_SESSION["timeLeft"] != 0  || $_SESSION["timeLeft"] != "") { ?>

<script>
//$.cookie("test", 1);

//$.removeCookie("test");
            /*Additionally, to set a timeout of a certain number of days (10 here) on the cookie:
             
             $.cookie("test", 1, { expires : 10 });**/

            /*var cookieValue = $.cookie("test");
             alert(cookieValue);*/


            d = $.cookie("quiztime");



            var myVar = setInterval(function () {
                myTimer()
            }, 1000);




            //console.log(d);
            function myTimer() {
                var timeLeft = d--;
                $.cookie("quiztime", timeLeft);
                //console.log(timeLeft);
                if (timeLeft < '180') {
                    //alert("hello");
                    //$("#count").css("color","green");
                    $("#changecolloo").css("background-color", "green");
                    $("#changecolloo").css("color", "white");


                }
                if (timeLeft < '120') {
                    //alert("hello");
                    //$("#count").css("color","blue");
                    $("#changecolloo").css("background-color", "#33B5E5");
                    $("#changecolloo").css("color", "white");
                }
                if (timeLeft < '60') {
                    //alert("hello");
                    //$("#count").css("color","red");
                    $("#changecolloo").css("background-color", "red");
                    $("#changecolloo").css("color", "white");
                }

                if (timeLeft < 0) {
                    window.location.replace("review.php");

                    //alert("quiz ended.");
                } else {
                    var displayTime = new Date(null, null, null, null, null, timeLeft).toTimeString().match(/\d{2}:\d{2}:\d{2}/)[0]
                    document.getElementById("count").innerHTML = displayTime;
                }
            }





</script>
<?php } ?>

<script>
    $(document).ready(function () {
        //console.log( "ready!" );
        //var conveniancecount = $("#conveniancecount").length;
        var questionnumbersavenext = $('button[id*="questionnumbersavenext"]').length;
        var questionnumbersavemarkforreview = $('button[id*="questionnumbersavemarkforreview"]').length;
        var questionnumbermarkforreview = $('button[id*="questionnumbermarkforreviewccvcvcvxcvx"]').length;
        // alert(questionnumbermarkforreview);
        $("#questionnumbersavenext").html(parseInt(questionnumbersavenext - 1));
        $("#questionnumbersavemarkforreview").html(parseInt(questionnumbersavemarkforreview - 1));
        $("#questionnumbermarkforreviewmmmm").html(parseInt(questionnumbermarkforreview));

        //alert(<?php echo $numberofquestioninthesecyion; ?>);

        //console.log(<?php echo $numberofquestioninthesecyion; ?>);
        //console.log();
        //console.log(<?php echo $numberofquestioninthesecyion; ?> - ((questionnumbersavemarkforreview - 1) + (questionnumbersavenext - 1)));

        notanswerdqq = <?php echo $numberofquestioninthesecyion; ?> - ((questionnumbersavemarkforreview - 1) + (questionnumbersavenext - 1));

        $("#notansweredtot").html(notanswerdqq);

        totanswer = (questionnumbersavenext - 1) + (questionnumbersavemarkforreview - 1);

        $.cookie("<?php echo $a; ?>numberofqanswered", totanswer);

        totanswerssss = (questionnumbersavenext - 1) + (questionnumbersavemarkforreview - 1) + questionnumbermarkforreview;

        $.cookie("<?php echo $a; ?>numberofqansweredcddsdsd", totanswerssss);


    });
</script>

<?php $_SESSION['int' . $a] = 1; ?>

<script type="text/javascript">
     function fun_AllowOnlyAmountAndDot(txt)
        {
        }
 function fun_AllowOnlyAmountAndDot1(txt)
        {
            //alert(event.keyCode);
            if(event.keyCode == 45)
                {
                                   var txtbx=document.getElementById(txt);
               var amount = document.getElementById(txt).value;
               var present=0;
               var count=0;

               if(amount.indexOf("-",present)||amount.indexOf("-",present+1));
               {
              // alert('0');
               }

              /*if(amount.length==2)
              {
                if(event.keyCode != 46)
                return false;
              }*/
               do
               {
               present=amount.indexOf("-",present);
               if(present!=-1)
                {
                 count++;
                 present++;
                 }
               }
               while(present!=-1);
               if(present==-1 && amount.length==0 && event.keyCode == 45)
               {
                    event.keyCode=0;
                    //alert("Wrong position of decimal point not  allowed !!");
                    return false;
               }

               if(count>=1 && event.keyCode == 45)
               {

                    event.keyCode=0;
                    //alert("Only one decimal point is allowed !!");
                    return false;
               }
               if(count==1)
               {
                var lastdigits=amount.substring(amount.indexOf("-")+1,amount.length);
                if(lastdigits.length>=2)
                            {
                              //alert("Two decimal places only allowed");
                              event.keyCode=0;
                              return false;
                              }
               }
                    
                    return true;
                }
            else if(event.keyCode == 43)
                {
                                   var txtbx=document.getElementById(txt);
               var amount = document.getElementById(txt).value;
               var present=0;
               var count=0;

               if(amount.indexOf("+",present)||amount.indexOf("+",present+1));
               {
              // alert('0');
               }

              /*if(amount.length==2)
              {
                if(event.keyCode != 46)
                return false;
              }*/
               do
               {
               present=amount.indexOf("+",present);
               if(present!=-1)
                {
                 count++;
                 present++;
                 }
               }
               while(present!=-1);
               if(present==-1 && amount.length==0 && event.keyCode == 43)
               {
                    event.keyCode=0;
                    //alert("Wrong position of decimal point not  allowed !!");
                    return false;
               }

               if(count>=1 && event.keyCode == 43)
               {

                    event.keyCode=0;
                    //alert("Only one decimal point is allowed !!");
                    return false;
               }
               if(count==1)
               {
                var lastdigits=amount.substring(amount.indexOf("+")+1,amount.length);
                if(lastdigits.length>=2)
                            {
                              //alert("Two decimal places only allowed");
                              event.keyCode=0;
                              return false;
                              }
               }
                    
                    return true;
                }
            else if(event.keyCode > 47 && event.keyCode < 58 || event.keyCode == 46)
            {
               var txtbx=document.getElementById(txt);
               var amount = document.getElementById(txt).value;
               var present=0;
               var count=0;

               if(amount.indexOf(".",present)||amount.indexOf(".",present+1));
               {
              // alert('0');
               }

              /*if(amount.length==2)
              {
                if(event.keyCode != 46)
                return false;
              }*/
               do
               {
               present=amount.indexOf(".",present);
               if(present!=-1)
                {
                 count++;
                 present++;
                 }
               }
               while(present!=-1);
               if(present==-1 && amount.length==0 && event.keyCode == 46)
               {
                    event.keyCode=0;
                    //alert("Wrong position of decimal point not  allowed !!");
                    return false;
               }

               if(count>=1 && event.keyCode == 46)
               {

                    event.keyCode=0;
                    //alert("Only one decimal point is allowed !!");
                    return false;
               }
               if(count==1)
               {
                var lastdigits=amount.substring(amount.indexOf(".")+1,amount.length);
                if(lastdigits.length>=2)
                            {
                              //alert("Two decimal places only allowed");
                              event.keyCode=0;
                              return false;
                              }
               }
                    return true;
            }
            else
            {
                    event.keyCode=0;
                    //alert("Only Numbers with dot allowed !!");
                    return false;
            }

        }

    </script>
