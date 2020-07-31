<?php
session_start();
error_reporting(0);
include 'libs.php';
// header("Cache-Control: no cache");
//session_cache_limiter("private_no_expire");

$string = file_get_contents($quizurlroot);
$json_data = json_decode($string, true);
$n = count($json_data["Sections"]);

if (!isset($_SESSION["userquiz"])) {

//header('Location: index.php'); 
    echo 'Invalid session key.';
    exit;
}

if ($_SESSION['quizenddate'] == 0) {
    date_default_timezone_set('Asia/Kolkata');
    $_SESSION['quizenddate'] = date('Y-m-d H:i:s');
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
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
		<script>
        window.oncontextmenu = function () {
            console.log("Right Click Disabled");
            return false;
        }
		
		//Create PDf from HTML...
function CreatePDFfromHTML() {
    var HTML_Width = $(".html-content").width();
    var HTML_Height = $(".html-content").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".html-content")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Exam_summary.pdf");
        //$(".html-content").hide();
    });
}
    </script>
	<style>
	.p-5 {
    padding: 0rem!important;
}
	</style>
	
	<style type="text/css">
	


		/*
			In order to see how the BROWSER ZOOM affects the screen width, we're going to
			change the background color / text color as the screen width changes.
		*/
		/*body {
			background-color: #000000 ;
			color: #ffffff ;
		}*/
		/*
			As the screen dimensions get larger, the background of the screen will get
			lighter. Then, as we ZOOM IN, and the dimensions get smaller, the background
			of the screen should get darker.
		*/
		@media screen and ( min-width: 200px ) {
			/*body {
				background-color: #111111 ;
			}*/
		}
		@media screen and ( min-width: 300px ) {
			/*body {
				background-color: #222222 ;
			}*/
		}
		@media screen and ( min-width: 400px ) {
			/*body {
				background-color: #444444 ;
			}*/
		}
		@media screen and ( min-width: 500px ) {
			/*body {
				background-color: #666666 ;
			}*/
		}
		@media screen and ( min-width: 600px ) {
			/*body {
				background-color: #888888 ;
			}*/
		}
		@media screen and ( min-width: 700px ) {
			/*body {
				background-color: #aaaaaa ;
				color: #000000 ;
			}*/
		}
		@media screen and ( min-width: 800px ) {
			/*body {
				background-color: #cccccc ;
			}*/
		}
		@media screen and ( min-width: 900px ) {
			/*body {
				background-color: #dddddd ;
			}*/
		}
		@media screen and ( min-width: 1000px ) {

	#cmd
{
right: 40px;
    float: right;
    position: absolute;
}
		}

	</style>
   <style>
   
 

@media screen and (min-width:993px) and (max-width:1560px) {

#cmd
{
right: 40px;
    float: right;
    position: absolute;
}
}
 
 @media screen and (min-width:768px) and (max-width:992px) {
	 #cmd
{
right: 40px;
    float: right;
    position: absolute;
}

	
}
@media screen and (min-width:320px) and (max-width:500px) {

#cmd
{
right: 40px;
    float: right;
    position: absolute;
    margin-top: -62px;
    margin-right: -39px;
}
}
  
@media screen and (min-width:500px) and (max-width:767px) {
#cmd
{
right: 40px;
    float: right;
    position: absolute;
    margin-top: -62px;
    margin-right: -39px;
}

}

/************************************************/

</style>

    </head>

    <body class="grey lighten-3" style="background-color: #fff!important;">

        <main style="padding-left:0px">
            <div class="container-fluid mt-5">
			
			    <div class="card p-5 mt-3">

            <div class="card-body">
			
						<button style="" type="button" class="btn btn-primary" onclick="CreatePDFfromHTML()" id="cmd">generate PDF</button>

			
			<div class='html-content'>

			<center>
                <h1>Exam Summary   </h1>
				
				<?php
					/**********************************/
	$positivemark = $json_data["Sections"][0]['section'][0]['positivemark'];

$maxscore = $json_data["rubric"][0]['maxscore'];


$data_array = '<table class="table table-bordered" style="width:100% !important">
                            <thead style="background-color:#D3D3D3"><tr><td>Section</td><td>Mark</td></tr></thead>';

$array2 = array();
$array3 = array();

for ($i = 0; $i < $n; $i++) {
    // $correctan.$i = 0;
	
		
	
	 
 
    foreach ($json_data["Sections"][$i] as $key => $value) { //increment the array section
	
	

	
	
	
        foreach ($value[1]['questiongroups'] as $key => $getnumberofquestio) {
            $numberofquestioninthesecyion += $getnumberofquestio['noofquestions'];
        }
        $q = $numberofquestioninthesecyion;

$fff= 0;



        for ($s = 0; $s < $q; $s++) {
//echo $_SESSION["postedquestiontype".$i.$s];
			
			if($_SESSION["postedquestiontype".$i.$s] == 'weighted')
			{
				if($_SESSION["quizgetan".$i.$s] != 0)
				{
					//echo $_SESSION["quizgetan".$i.$s];
					
					//echo $_SESSION["quizgetan".$i.$s]."hello";
					
					$gettypefofqui = 1 ;
					
					$fff+= $_SESSION["quizgetan".$i.$s] * $positivemark ;
					
					/*$post_item = array(
                $i => $fff
    );
	
		
		
	
	array_push($data_array, $post_item);*/

					
					
				}
				
			}
			else
			{
				$gettypefofqui = 0 ;
			}
		}
		
		
		
	}
	
	$coiu  = $value[0]['displayname'];
//$coiu  =var_dump($value);
	    $array2[] = $coiu;

 $array3[] = $fff;
	
	$data_array .= '<tr><td>'.$coiu .'</td><td>'.$fff.'</td></tr>';
	
	
}
$data_array .= '</table>';

$arranamer = $array2;

?>


<?php



		if($maxscore != NULL)
{
	foreach ($json_data["rubric"] as $key => $value) {

 $score = ($fff/$maxscore)*100;


if($score >= $value['low'] && $score <= $value['high'])
{
	$type = $value['name'];
	$explanation = $value['explanation'];
}
		
		
		
		
		//
		
	}
}
	/*****************************************/
				?>

<?php if($_SESSION["timeLeft"] != 0 || $_SESSION["timeLeft"] != "" ) { ?>
                <p>Total Time consumed : <span id="displayTime"></span></p>
                <p>Quiz Start Time : <?php echo date("d-m-Y h:i:s a", strtotime($_SESSION['quizstartdate'])); ?></p>
                <p>Quiz End Time : <?php echo date("d-m-Y h:i:s a", strtotime($_SESSION['quizenddate'])); ?></p>
				
<?php } ?>

                <p>Score (%)  : <span id="displayscore"></span></p>
				
				
				
				<?php if($maxscore != NULL) {  ?>
				
				
				
				<p>Level : <?php echo $type; ?></p>
				
				<p><?php echo $explanation; ?></p>
				
				<?php if($i > 1 ) { ?>
				
				<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
											<?php echo $data_array; ?>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
											<canvas id="horizontalBar" style="max-width: 600px;" ></canvas>
											</div>
											</div>
				<?php } else { ?>
				
				<?php echo $data_array; ?>
				
				<?php } ?>
				
				
				
				
				
				<script>
new Chart(document.getElementById("horizontalBar"), {
"type": "horizontalBar",
"data": {
"labels": <?php echo json_encode($arranamer); ?>,
"datasets": [{
"label": "Marks",
"data": <?php echo json_encode($array3); ?>,
"fill": false,
"backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
"rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)",
"rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
],
"borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
"rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"
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
				
				<?php } ?>
				
				</center>

              </div>
            </div>

          </div>
		  <br />
		  
		  


                <script>

                    var totalnumofcorrectanswrer = 0;
                    var totalnumofincorectcorrectanswrer = 0;
                    var totalscoreff = 0;

                </script> 

<?php
if ($_SESSION['show_results'] == '1') {
	
	
	

	

    $n = 0;

    $totalquestionsf = 0;


    foreach ($json_data["Sections"] as $key => $value) {

        //var_dump($value['section'][1]['questiongroups']);
        $numberofquestioninthesecyion = 0;

        $p = 0;
        foreach ($value['section'][1]['questiongroups'] as $key => $getnumberofquestio) {
            $numberofquestioninthesecyion += $getnumberofquestio['noofquestions'];
            $totalquestionsf += $getnumberofquestio['noofquestions'];
            //echo 'Seesion'.$n.$p;
            $p++;
        }
        //echo   $q = $numberofquestioninthesecyion;
        ?>

                        
	<?php if($maxscore != NULL) {  ?>
	<div class="table-responsive">
	<table class="table table-bordered">
                            <thead style="background-color:#D3D3D3">
                                <tr><td colspan="5"><h2>Section : <?php echo $value['section'][0]['name']; ?>   </h2></td></tr>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">No. of Questions</th>
                                   <!--<th scope="col">No. of Questions Answered</th>-->
                                    <th scope="col">No. of Questions Attempted</th>
									 <th scope="col">No. of Questions Unattempted</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        <canvas id="doughnutChart<?php echo $n; ?>"></canvas>

                                        <script>
                                            $(document).ready(function () {

                                                if ($.cookie("<?php echo $n; ?>numberofqanswered") != "undefined" && $.cookie("<?php echo $n; ?>numberofqanswered") != null) {

                                                    numanswewrd = $.cookie("<?php echo $n; ?>numberofqanswered");

                                                } else
                                                {
                                                    numanswewrd = 0;
                                                }

                                                // $("#<?php echo $n; ?>dsahdkjdadsdsadsadsadskfs").html($.cookie("<?php echo $n; ?>numberofqansweredcddsdsd"));

                                                // alert($.cookie("<?php echo $n; ?>numberofqanswered"));
                                                $("#<?php echo $n; ?>dsahdkjdkfs").html(numanswewrd);
												
												$("#<?php echo $n; ?>unmberunattempt").html(parseInt(<?php echo $numberofquestioninthesecyion; ?>) - parseInt(numanswewrd));
												
												

                                                var correctanswers = $('button[id*="csectionsnswercount<?php echo $n; ?>"]').length;

                                                //totalnumofcorrectanswrer =  parseInt(totalnumofcorrectanswrer) + parseInt(correctanswers);
                                                totalnumofcorrectanswrer += parseInt(correctanswers);

                                                $.cookie("totcanswer", totalnumofcorrectanswrer);


                                                totalnumofincorectcorrectanswrer += parseInt(parseInt(numanswewrd) - parseInt(correctanswers));
                                                $.cookie("totincanswer", totalnumofincorectcorrectanswrer);

                                                // console.log(correctanswers);
                                                $("#<?php echo $n; ?>correctanswers").html(correctanswers);



                                                $("#<?php echo $n; ?>wrongnswers").html(parseInt(numanswewrd) - parseInt(correctanswers));

                                                //	alert(<?php echo $numberofquestioninthesecyion; ?>);

                                                // totalscoreff += ((parseInt(correctanswers) * parseInt(<?php echo $value['section'][0]['positivemark']; ?>)) -  ((parseInt(numanswewrd) - parseInt(correctanswers)) * parseInt(<?php echo $value['section'][0]['negativemark']; ?>)));
                                                totalscoreffolld = ((parseInt(correctanswers) * parseInt(<?php echo $value['section'][0]['positivemark']; ?>)) - ((parseInt(numanswewrd) - parseInt(correctanswers)) * parseInt(<?php echo $value['section'][0]['negativemark']; ?>))) / (parseInt(<?php echo $numberofquestioninthesecyion; ?>) * parseInt(<?php echo $value['section'][0]['positivemark']; ?>));
                                                // alert(totalscoreffolld * 100);
                                                totalscoreff += totalscoreffolld * 100;
                                                // console.log($.cookie("<?php echo $n; ?>numberofqanswered"));

                                                var ctxP = document.getElementById("doughnutChart<?php echo $n; ?>").getContext('2d');
                                                var myPieChart = new Chart(ctxP, {
                                                    type: 'doughnut',
                                                    data: {
                                                        labels: ["No. of Questions unattempted", "No. of Questions attempted"],
                                                        datasets: [{
                                                                data: [parseInt(<?php echo $numberofquestioninthesecyion; ?>) - parseInt(numanswewrd), numanswewrd],
                                                                backgroundColor: ["red", "green"],
                                                                hoverBackgroundColor: ["red", "green"]
                                                            }]
                                                    },
                                                    options: {
                                                        responsive: true
                                                    }
                                                });

                                            });
                                        </script>


                                    </th>

                                    <th scope="row"><?php echo $numberofquestioninthesecyion; ?></th>



                                    <th scope="row" id="<?php echo $n; ?>dsahdkjdkfs">0</th>
									 <th scope="row" id="<?php echo $n; ?>unmberunattempt">0</th>
									
									
                                     
                                </tr>

                            </tbody>
                        </table>
						</div>

	<?php } else { ?>
	<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead style="background-color:#D3D3D3">
                                <tr><td colspan="5"><h2>Section : <?php echo $value['section'][0]['name']; ?>   </h2></td></tr>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">No. of Questions</th>
                                   <!--<th scope="col">No. of Questions Answered</th>-->
                                    <th scope="col">No. of Questions Attempted</th>
                                    <th scope="col">No. of Correct Answers</th>
                                    <th scope="col">No. of Incorrect Answers</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        <canvas id="doughnutChart<?php echo $n; ?>"></canvas>

                                        <script>
                                            $(document).ready(function () {

                                                if ($.cookie("<?php echo $n; ?>numberofqanswered") != "undefined" && $.cookie("<?php echo $n; ?>numberofqanswered") != null) {

                                                    numanswewrd = $.cookie("<?php echo $n; ?>numberofqanswered");

                                                } else
                                                {
                                                    numanswewrd = 0;
                                                }

                                                // $("#<?php echo $n; ?>dsahdkjdadsdsadsadsadskfs").html($.cookie("<?php echo $n; ?>numberofqansweredcddsdsd"));

                                                // alert($.cookie("<?php echo $n; ?>numberofqanswered"));
                                                $("#<?php echo $n; ?>dsahdkjdkfs").html(numanswewrd);

                                                var correctanswers = $('button[id*="csectionsnswercount<?php echo $n; ?>"]').length;

                                                //totalnumofcorrectanswrer =  parseInt(totalnumofcorrectanswrer) + parseInt(correctanswers);
                                                totalnumofcorrectanswrer += parseInt(correctanswers);

                                                $.cookie("totcanswer", totalnumofcorrectanswrer);


                                                totalnumofincorectcorrectanswrer += parseInt(parseInt(numanswewrd) - parseInt(correctanswers));
                                                $.cookie("totincanswer", totalnumofincorectcorrectanswrer);

                                                // console.log(correctanswers);
                                                $("#<?php echo $n; ?>correctanswers").html(correctanswers);



                                                $("#<?php echo $n; ?>wrongnswers").html(parseInt(numanswewrd) - parseInt(correctanswers));

                                                //	alert(<?php echo $numberofquestioninthesecyion; ?>);

                                                // totalscoreff += ((parseInt(correctanswers) * parseInt(<?php echo $value['section'][0]['positivemark']; ?>)) -  ((parseInt(numanswewrd) - parseInt(correctanswers)) * parseInt(<?php echo $value['section'][0]['negativemark']; ?>)));
                                                totalscoreffolld = ((parseInt(correctanswers) * parseInt(<?php echo $value['section'][0]['positivemark']; ?>)) - ((parseInt(numanswewrd) - parseInt(correctanswers)) * parseInt(<?php echo $value['section'][0]['negativemark']; ?>))) / (parseInt(<?php echo $numberofquestioninthesecyion; ?>) * parseInt(<?php echo $value['section'][0]['positivemark']; ?>));
                                                // alert(totalscoreffolld * 100);
                                                totalscoreff += totalscoreffolld * 100;
                                                // console.log($.cookie("<?php echo $n; ?>numberofqanswered"));

                                                var ctxP = document.getElementById("doughnutChart<?php echo $n; ?>").getContext('2d');
                                                var myPieChart = new Chart(ctxP, {
                                                    type: 'doughnut',
                                                    data: {
                                                        labels: ["No. of Questions unattempted", "No. of Correct Answers", "No. of Incorrect Answers"],
                                                        datasets: [{
                                                                data: [parseInt(<?php echo $numberofquestioninthesecyion; ?>) - parseInt(numanswewrd), correctanswers, parseInt(numanswewrd) - parseInt(correctanswers)],
                                                                backgroundColor: ["#FDB45C", "green", "red"],
                                                                hoverBackgroundColor: ["#FDB45C", "green", "red"]
                                                            }]
                                                    },
                                                    options: {
                                                        responsive: true
                                                    }
                                                });

                                            });
                                        </script>


                                    </th>

                                    <th scope="row"><?php echo $numberofquestioninthesecyion; ?></th>



                                    <th scope="row" id="<?php echo $n; ?>dsahdkjdkfs">0</th>
                                       <!-- <th scope="row" id="<?php echo $n; ?>dsahdkjdadsdsadsadsadskfs">0</th>-->
                                    <th scope="row" id="<?php echo $n; ?>correctanswers" >0</th>
                                    <th scope="row" id="<?php echo $n; ?>wrongnswers">0</th>
                                </tr>

                            </tbody>
                        </table>

</div>
	<?php } ?>



        <?php
        $n++;
    }
}
?>






            </div>
        </main>

        <script>


            $(document).ready(function () {
                function disablePrev() {
                    window.history.forward() }
                window.onload = disablePrev();
                window.onpageshow = function (evt) {
                    if (evt.persisted)
                        disableBack()
                }
            });
        </script>
        <!-- Initializations -->
        <script type="text/javascript">

            // Animations initialization
            new WOW().init();

        </script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script>

            console.log(<?php echo $_SESSION["timeLeft"]; ?> - $.cookie("quiztime"));
            timeLeft = <?php echo $_SESSION["timeLeft"]; ?> - $.cookie("quiztime");
            var displayTime = new Date(null, null, null, null, null, timeLeft).toTimeString().match(/\d{2}:\d{2}:\d{2}/)[0]
            $("#displayTime").html(displayTime);
            //$.removeCookie("quiztime");



        </script>

<?php if (isset($_SESSION["userquiz"])) { 



	
			


?>

            <script>

                //console.log(((parseInt($.cookie("totcanswer")) * 1) - (0.25 * parseInt($.cookie("totincanswer"))) )/ <?php echo $totalquestionsf; ?>);

                setTimeout(function () {
					
					if('<?php echo $gettypefofqui; ?>' == 0 )
					{
						totalscoreff = totalscoreff;
					}	
else 
{
	totalscoreff = '<?php echo ($fff/$maxscore)*100 ; ?>';
}	
					
					/*alert('<?php echo ($fff/$maxscore)*100 ; ?>');
                   alert();*/
                    /*alert(totalscoreff);
                     alert(<?php echo $totalquestionsf; ?>);*/
                    //alert(<?php echo $n; ?>);

                    //var totalscopre = ((Math.round(((parseInt($.cookie("totcanswer")) * 1) - (0.25 * parseInt($.cookie("totincanswer"))) )/ <?php echo $totalquestionsf; ?> * 100) / 100).toFixed(2)) * 100 ;

                    var totalscopre = ((Math.round((totalscoreff) / <?php echo $n; ?>)).toFixed(2));

                    //alert('Score (%) : '+ totalscopre );
                    $("#displayscore").html(totalscopre);

                    saveuserdetails(totalscopre);


                }, 300);

            </script>

<?php } ?>
        <script>

            function saveuserdetails(totalscopre)
            {
                /*alert(totalscopre);
                 alert(displayTime);*/
				// alert("<?php echo $_SESSION['quiz_type']; ?>");
                /*********************************************************/
                $.ajax({
                    type: "POST",
                    url: "<?php echo $config['MyConf']['scorebook'];?>",
                    data: {
                        // totalscopre : totalscopre , displayTime : displayTime
                        comparea_code: "<?php echo $_SESSION['comparea_code']; ?>", quiz_type: "<?php echo $_SESSION['quiz_type']; ?>", scoring_method: "<?php echo $_SESSION['scoring_method']; ?>", totalscopre: totalscopre, displayTime: displayTime, quizstartdate: "<?php echo $_SESSION['quizstartdate']; ?>", quizenddate: "<?php echo $_SESSION['quizenddate']; ?>", nsadfkj: "<?php echo $_SESSION['userid']; ?>", timeLeft: "<?php echo $_SESSION['timeLeft']; ?>", qurl: "<?php echo $_SESSION['qurl']; ?>", qname: "<?php echo $_SESSION['qname']; ?>", passingscore_in_percentage: "<?php echo $_SESSION['passingscore_in_percentage']; ?>", code: "<?php echo $_SESSION['code']; ?>"
                    },
                    dataType: 'json',
                    beforeSend: function () {
                        // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
                    },
                    success: function (response)
                    {
                        alert(response);



                    },
            error: function(xhr, status, error) 
            {
			
			
				
				 console.log(xhr.responseText);
                
            }
                });
                /**********************************************************/

            }

          /*   setTimeout(function () {
             var cookies = $.cookie();
             for(var cookie in cookies) {
             $.removeCookie(cookie);
             }
             
             }, 8000);*/



        </script>

    </body>

</html>
<?php
$items = array();
for ($i = 0; $i < $n; $i++) {
    // $correctan.$i = 0;
    ?>
    <script>
        $(document).ready(function () {

        });
    </script>
    <?php
    foreach ($json_data["Sections"][$i] as $key => $value) { //increment the array section
        foreach ($value[1]['questiongroups'] as $key => $getnumberofquestio) {
            $numberofquestioninthesecyion += $getnumberofquestio['noofquestions'];
        }
        $q = $numberofquestioninthesecyion;


        for ($s = 0; $s < $q; $s++) {

            $questioncodee = $_SESSION["questionanswerresponsesnew" . $i . $s];

            /* 	echo $_SESSION[$questioncodee].'<br />';
              echo $_SESSION["questionanswerresponsesuserchoice".$i.$s].'<br />';
             */

            if ( $_SESSION["postedquestiontype".$i.$s] == 'weighted' || (($_SESSION["questionanswerresponsesuserchoice" . $i . $s] == $_SESSION[$questioncodee]) && $_SESSION[$questioncodee] != NULL && $_SESSION[$questioncodee] != '0')) {

                echo '<button type="button"  id="csectionsnswercount' . $i . '" style="display:none" class="btn btn-success" ></button>';
                /* echo "True<br />";
                  var_dump($_SESSION["questionanswerresponsesuserchoice".$i.$s])."<br />";
                  var_dump($_SESSION["questionanswerresponsesnew".$i.$s])."<br />"; */
            } else {
                echo '<button type="button" style="display:none"  id="wsectionsnswercount' . $i . '" class="btn btn-success"></button>';
                /* echo "False<br />";
                  var_dump($_SESSION["questionanswerresponsesuserchoice".$i.$s])."<br />";
                  var_dump($_SESSION["questionanswerresponsesnew".$i.$s])."<br />"; */
            }


            /* if(($_SESSION["questionanswerresponses".$i.$s] == $_SESSION["questionanswerresponsescorrectanswer".$i.$s]) && ($_SESSION["questionanswerresponses".$i.$s] != 0 && $_SESSION["questionanswerresponsescorrectanswer".$i.$s] != 0) )
              {



              $items = $i."correct";

              }
              else
              {
              $items = $i."wrong";

              } */
        }
    }

//	echo 'corrree'.$i;
//var_dump($items);
}



//session_destroy();

if ($_SESSION['show_review'] == '1') {

    $nn = 0;
    foreach ($json_data["Sections"] as $key => $value) {
        ?>
<div class="table-responsive">
        <table class="table table-bordered">
            <thead style="background-color:#D3D3D3">
                <tr><td colspan="5"><h1>Review for the Section : <?php echo $value['section'][0]['name']; ?></h1></td></tr>
                <tr>

                    <th scope="col">Question No.</th>

                    <th scope="col">Question Text</th>
                   <!-- <th scope="col">Correct Answers</th>--->
                    <th scope="col">Feedback</th>

                </tr>
            </thead>
            <tbody>

        <?php $qq = 0;
        foreach ($_SESSION['sectionswisequestionsnew' . $nn] as $key => $value1) {
            ?>
                    <tr><td><?php echo $qq + 1; ?></td><td><?php echo $value1['questiontext']['text']; ?>

            <?php
            $qid = 1;
                if($_SESSION["shufflenaser".$nn.$qq]  == "")
                                        {
                                            $answersfff = $value1['answer'];
                                          
                                        }
                                       else 
                                       {
                                           $answersfff =  $_SESSION["shufflenaser".$nn.$qq];
                                           
                                       }
            
            foreach ($answersfff as $key => $value) {
          //  foreach ($_SESSION["shufflenaser".$nn.$qq]as $key => $value) {
                if (trim($value['marks']) == '100') {
                    //echo $value['text']; 
                }
                ?>
                        
                        <?php if($value1['type']['text'] == 'NU') { 
                    //echo $value1['generalfeedback']['text'];
                    
                    
                    						$check =  $_SESSION["postedanswernu".$nn.$qq];
                            
                            $value11 =  $_SESSION["postedanswernuva1".$nn.$qq];
                                       $value2 =  $_SESSION["postedanswernuval2".$nn.$qq];
                                       $operator =  $_SESSION["postedanswernuoperator".$nn.$qq];
                    
                     if(trim($operator) == '=')
                                          {
                                             if($check == $value11 && $check != NULL)
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
                                             if($check > $value11 && $check != NULL)
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
                                             if($check < $value11 && $check != NULL)
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
                                             if($check >= $value11 && $check != NULL)
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
                                             if($check <= $value11 && $check != NULL)
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
                                             if($value11 <= $check && $check <= $value2 && $check != NULL )
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
                                             if($value11 < $check && $check < $value2 && $check != NULL )
                                             {
                                                 $qidans = 1;
                                             }
                                              else
                                              {
                                                  $qidans = 0;
                                              }
                                          }
                    
                    
                    if($_SESSION["postedanswernu" . $nn . $qq] == NULL)
                    {
                        echo "<br /><br />Your response :";  echo "<span style='color: red;
    font-size: 22px;
    margin-top: -9px;
    position: absolute;
    padding-left: 7px;'>&#10005;</span>";
                        
                    } else {
                    
                echo '<br /><br />Your response :'. $_SESSION["postedanswernu" . $nn . $qq];   
                    if($qidans == 1) {
                        echo "<span style='color: green;
    font-size: 22px;
    margin-top: -9px;
    position: absolute;
    padding-left: 7px;'>&#10004;</span>";
                    }
                    else
                    {
                         echo "<span style='color: red;
    font-size: 22px;
    margin-top: -9px;
    position: absolute;
    padding-left: 7px;'>&#10005;</span>";
                    }
                    }
                    
                //   var_dump( $_SESSION["postedanswernu" . $nn . $qq]);
                    
                    
                    
				
				 } else if($value1['type']['text'] == 'MS') { ?>
				
				<div class="form-check" style="padding-bottom: 10px;">

                <?php
                if ($_SESSION["questionanswerresponses" . $nn . $qq] == $qid) {
                    $check = 'checked';
                } else {
                    $check = '';
                }
				
				//$str = implode (", ", $_SESSION["questionanswerresponses".$a.$b] );
$str = $_SESSION["questionanswerresponses".$nn.$qq];

//var_dump($str );

if (in_array($qid, $str))
{
$check = 'checked';

} else {
$check = '';
}
				
                ?>

                                <?php // echo $_SESSION["questionanswerresponses".$nn.$qq];  ?>

                                    <input type="checkbox" class="form-check-input" id="<?php echo $qid; ?>defaultUnchecked5" name="defaultExampleRadios<?php echo $nn . $qq; ?>" value="<?php echo $qid; ?>" <?php echo $check; ?> disabled >

                                    <label class="form-check-label" for="<?php echo $qid; ?>defaultUnchecked5"><?php echo $value['text']; ?><?php //echo $value['marks']; ?></label>
                                <?php
                                if (trim($value['marks']) == '100') {
                                    echo "<span style='color: green;
    font-size: 22px;
    margin-top: -9px;
    position: absolute;
    padding-left: 7px;'>&#10004;</span>";
                                }
                                ?>

                                </div>
								
								 <?php } else if($value1['type']['text'] == 'weighted') { ?>
								 
								              <div class="custom-control custom-radio" style="padding-bottom: 10px;">

                <?php
                if ($_SESSION["questionanswerresponses" . $nn . $qq] == $qid) {
                    $check = 'checked';
                } else {
                    $check = '';
                }
                ?>

                                <?php // echo $_SESSION["questionanswerresponses".$nn.$qq];  ?>

                                    <input type="radio" class="custom-control-input" id="<?php echo $qid; ?>defaultUnchecked5" name="defaultExampleRadios<?php echo $nn . $qq; ?>" value="<?php echo $qid; ?>" <?php echo $check; ?> disabled >

                                    <label class="custom-control-label" for="<?php echo $qid; ?>defaultUnchecked5"><?php echo $value['text']; ?><?php //echo $value['marks']; ?></label>
                                <?php
                                if (trim($value['marks']) == '100') {
                                    echo "<span style='color: green;
    font-size: 22px;
    margin-top: -9px;
    position: absolute;
    padding-left: 7px;'>&#10004;</span>";
                               }
                                ?>

                                </div>
				
				<?php } else { ?>
				
                                <div class="custom-control custom-radio" style="padding-bottom: 10px;">

                <?php
                if ($_SESSION["questionanswerresponses" . $nn . $qq] == $qid) {
                    $check = 'checked';
                } else {
                    $check = '';
                }
                ?>

                                <?php // echo $_SESSION["questionanswerresponses".$nn.$qq];  ?>

                                    <input type="radio" class="custom-control-input" id="<?php echo $qid; ?>defaultUnchecked5" name="defaultExampleRadios<?php echo $nn . $qq; ?>" value="<?php echo $qid; ?>" <?php echo $check; ?> disabled >

                                    <label class="custom-control-label" for="<?php echo $qid; ?>defaultUnchecked5"><?php echo $value['text']; ?><?php //echo $value['marks']; ?></label>
                                <?php
                                if (trim($value['marks']) == '100') {
                                    echo "<span style='color: green;
    font-size: 22px;
    margin-top: -9px;
    position: absolute;
    padding-left: 7px;'>&#10004;</span>";
                                }
                                ?>

                                </div>
								
								
			<?php } ?>

                                    <?php
                                    $qid++;
                                }
                                ?>

                        </td>
                        <td><?php echo $value1['generalfeedback']['text'];//var_dump($value1); ?></td>

                    </tr>

                        <?php $qq++;
                    } ?>

            </tbody>
        </table>
		</div>
                    <?php
                    $nn++;
                }
            }

            session_destroy();
            ?>