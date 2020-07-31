<?php
session_start();
error_reporting(0);
include 'libs.php';
$sttringn = $_SERVER['HTTP_USER_AGENT'];
if($_GET['seb'] == 1 ) {
if (strpos($sttringn, 'SEB') !== false) {
    //echo 'SEB';
}
else
{
	echo "This quiz should be attempted in a SAFE Environment.";
	exit;
}
}

include_once 'config/Database.php';
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();



$string = file_get_contents($quizurlroot);
$json_data = json_decode($string, true);

/* echo $json_data["opentime"]; 
  echo $json_data["closetime"]; */
date_default_timezone_set('Asia/Kolkata');
// echo date("Y-m-d H:i:s");
$paymentDate = strtotime(date("Y-m-d H:i:s"));
$contractDateBegin = strtotime($json_data["opentime"]);
$contractDateEnd = strtotime($json_data["closetime"]);

if ($paymentDate > $contractDateBegin && $paymentDate < $contractDateEnd && $contractDateBegin != "" && $contractDateEnd != "") {
    // echo "is between";
} else if ($contractDateBegin == "" && $contractDateEnd == "") {
    
} else if ($contractDateBegin == "" && $paymentDate < $contractDateEnd) {
    
} else if ($contractDateEnd == "" && $paymentDate > $contractDateBegin) {
    
} else {
    echo "Quiz not available at the moment.";
    exit;
}

$query1 = "SELECT attempts from studentscore WHERE userid ='" . $_GET['nsadfkj'] . "' and code ='" . $json_data["code"] . "'";



//  echo $query;
// exit;
// Prepare statement
$stmt1 = $db->prepare($query1);

$stmt1->execute();
//$number_of_rows = $stmt1->fetchColumn(); 

$row = $stmt1->fetch(PDO::FETCH_ASSOC);

//echo $number_of_rows;	  

if($json_data["noofattempts"] !=0 || $json_data["noofattempts"] !="") {

if ($json_data["noofattempts"] <= $row['attempts']) {
    echo "No. of attempts exhausted";
    exit;
}
}


$_SESSION['userid'] = $_GET['nsadfkj'];
$_SESSION['qurl'] = $_GET['url'];
$_SESSION['qname'] = $json_data["topic"];
$_SESSION['code'] = $json_data["code"];
$_SESSION['passingscore_in_percentage'] = $json_data["passingscore_in_percentage"];

$_SESSION['show_results'] = $json_data["show_results"];
$_SESSION['show_review'] = $json_data["show_review"];
$_SESSION['scoring_method'] = $json_data["scoring_method"];


$_SESSION['quiz_type'] = $json_data["type"];
$_SESSION['comparea_code'] = $json_data["comparea_code"];




$_SESSION["timeLeft"] = $json_data["time"] * 60;
$_SESSION['review'] = 0;
$numberofquestioninthesecyion = 0;

$_SESSION['userquiz'] = 'adsADSADSDAS1234';
$_SESSION['quizstartdate'] = 0;
$_SESSION['quizenddate'] = 0;


//echo $_GET['url'];



$n = count($json_data["Sections"]);

for ($i = 0; $i < $n; $i++) {
    $_SESSION["notvisited" . $i] = array();
    $_SESSION["answered" . $i] = array();
    $_SESSION["notanswered" . $i] = array();
    $_SESSION["markedforreview" . $i] = array();
    $_SESSION["answeredandmarkedforreview" . $i] = array();

    $_SESSION['sectionswisequestions' . $i] = 0;

    $_SESSION["sectionarray" . $i] = array();
    $_SESSION['int' . $i] = 0;

    /*     * ************************ */
    foreach ($json_data["Sections"][$i] as $key => $value) { //increment the array section
        foreach ($value[1]['questiongroups'] as $key => $getnumberofquestio) {
            $numberofquestioninthesecyion += $getnumberofquestio['noofquestions'];
        }
        $q = $numberofquestioninthesecyion;

        for ($s = 0; $s < $q; $s++) {
            $_SESSION["questionnumbermarkforreview" . $i . $s] = 0;
            $_SESSION["questionnumbersavenext" . $i . $s] = 0;
            $_SESSION["questionnumbersavemarkforreview" . $i . $s] = 0;

            $_SESSION["questionanswerresponses" . $i . $s] = "";
            $_SESSION["shufflenaser" . $i . $s] = "";
            $_SESSION["questionanswerresponsescorrectanswer" . $i . $s] = 0;

            $_SESSION["questionanswerresponsesnew" . $i . $s] = 0;

            $_SESSION["questionanswerresponsesuserchoice" . $i . $s] = 0;
            
             $_SESSION["postedanswernu".$i.$s] == "";
			 
			  $_SESSION["postedquestiontype".$i.$s] == 0;
			   $_SESSION["quizgetan".$i.$s] == 0;
			  
			  
        }
    }
}
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
table.table td, table.table th{
	font-size: 20px !important;
}
</style>

        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.min.js"></script>

        <script type="text/javascript" src="js/jquery.cookie.js"></script>

        <script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>

        <script>

            $.removeCookie("quiztime");
            $.cookie("quiztime", <?php echo $_SESSION["timeLeft"]; ?>);

        </script>
		<style>
		.p-5 {
    padding: 1.5rem!important;
}
.ml-lg-5, .mx-lg-5
{
	    margin-top: -20px!important;
}
</style>
    </head>

    <body class="grey lighten-3">
        <main class="pt-5 mx-lg-5" style="padding-left:0px">
            <div class="container-fluid">
			
			
			    <div class="card p-5 mt-3">

            <div class="card-body">
			
			  <center>


                    <table class="table table-bordered" style="width: 60%;">

                        <tbody>
                            <tr>
                                <th scope="row"><b>Topic</b></th>
                                <td><?php echo $json_data["topic"]; ?></td>

                            </tr>
							 <tr>
                                <th scope="row"><b>Code</b></th>
                                <td><?php echo $json_data["code"]; ?></td>

                            </tr>
<?php if ($json_data["time"] != 0) { ?>
                                <tr>
                                    <th scope="row"><b>Time limit(Mins)</b></th>
                                    <td><?php echo $json_data["time"]; ?></td>

                                </tr>
<?php } ?>
<?php if ($json_data["opentime"] != 0) { ?>
                                <tr>
                                    <th scope="row"><b>Open Time</b></th>
                                    <td colspan="2"><?php echo $json_data["opentime"]; ?></td>

                                </tr>
<?php } ?>
                            <?php if ($json_data["closetime"] != 0) { ?>
                                <tr>
                                    <th scope="row"><b>Close Time</b></th>
                                    <td colspan="2"><?php echo $json_data["closetime"]; ?></td>

                                </tr>
                            <?php } ?>
                            <?php if ($json_data["noofattempts"] != 0 || $json_data["noofattempts"] != 0) { ?>
                                <tr>
                                    <th scope="row"><b>No. of attempts allowed</b></th>
                                    <td colspan="2"><?php echo $json_data["noofattempts"]; ?></td>

                                </tr>
                            <?php } ?>
                            <?php if ($json_data["passingscore_in_percentage"] != 0) { ?>
                                <tr>
                                    <th scope="row"><b>Passing score(%)</b></th>
                                    <td colspan="2"><?php echo $json_data["passingscore_in_percentage"]; ?></td>

                                </tr>
                            <?php } ?>
                            <tr>
                                <th scope="row"><b>Show results</b></th>
                                <td colspan="2"><?php echo ($json_data["show_results"] == 1) ? 'Yes' : 'No'; ?></td>

                            </tr>
                            <tr>
                                <th scope="row"><b>Show review</b></th>

                                <td colspan="2"><?php echo ($json_data["show_review"] == 1) ? 'Yes' : 'No'; ?></td>

                            </tr>
                            <tr>
                                <th scope="row"><b>Scoring method</b></th>
                                <td colspan="2"><?php echo $json_data["scoring_method"]; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </center>

                <center><a class="btn btn-primary"  href="dashboard.php?n=0&question=0" alt="">Start Quiz <i class="fa fa-angle-double-right"></i></a></center>
        

              <!--<button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip
                on top</button>

              <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Tooltip on right">Tooltip
                on right</button>

              <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Tooltip
                on bottom</button>

              <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Tooltip
                on left</button>-->

            </div>

          </div>
		  
		  
                  </div>
        </main>
    </body>

</html>




