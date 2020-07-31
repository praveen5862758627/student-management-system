<?php
 
namespace Google\Cloud\Samples\Dialogflow;
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;

require __DIR__.'/vendor/autoload.php';

// Turn off all error reporting
error_reporting(0);
session_start(); 
$sssid = session_id();

function detect_intent_texts($projectId, $text, $sessionId, $languageCode = 'en-US')
{
    // new session
    $test = array('credentials' => 'admissions-4aeac-65f48d6bcc6e.json');
    $sessionsClient = new SessionsClient($test);
    $session = $sessionsClient->sessionName($projectId, $sessionId ?: uniqid());
  //  printf('Session path: %s' . PHP_EOL, $session);

    // create text input
    $textInput = new TextInput();
    $textInput->setText($text);
    $textInput->setLanguageCode($languageCode);

    // create query input
    $queryInput = new QueryInput();
    $queryInput->setText($textInput);

    // get response and relevant info
    $response = $sessionsClient->detectIntent($session, $queryInput);
    $queryResult = $response->getQueryResult();
    $queryText = $queryResult->getQueryText();
    $intent = $queryResult->getIntent();
    $displayName = $intent->getDisplayName();
    $confidence = $queryResult->getIntentDetectionConfidence();
    $fulfilmentText = $queryResult->getFulfillmentText();
	
	
				$fullfilmentmesage = json_decode($queryResult->serializeToJsonString(), true);
				
				$txt = 'Text :'.$text. $queryResult->serializeToJsonString();
                $myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
				
			//	var_dump($fullfilmentmesage['fulfillmentMessages']);
				
			//	echo count($fullfilmentmesage['fulfillmentMessages']);
				
			//	exit;
				
				if($fullfilmentmesage['queryText'] == $text){
					
					//echo $fullfilmentmesage['queryText'];
				//	exit;
				
				$arraaycount = count($fullfilmentmesage['fulfillmentMessages']);
				
				for($i=0 ; $i< $arraaycount ; $i++) {
					
					//echo $i;
					
					$getfm1 = json_decode($queryResult->getFulfillmentMessages()[$i]->serializeToJsonString(), true);
	                $basiccard = array_keys($getfm1);
              //  echo   $basiccardtitle1 =  $basiccard[0].'<br />';
				 
				 $basiccardtitle =  $basiccard[0];
				   
				   switch ($basiccardtitle) {
                   case "linkOutSuggestion":
				   
				   
                  $destname = $fullfilmentmesage['fulfillmentMessages'][$i]['linkOutSuggestion']['destinationName'];
					$uri = $fullfilmentmesage['fulfillmentMessages'][$i]['linkOutSuggestion']['uri'];
					
					echo '<br />Click on below button for more details : <br /><a target="_blank" href='.$uri.' class="btn btn-primary">'.$destname.'</a><br />';
                   break;
                   case "simpleResponses":
				   echo $getfm1['simpleResponses']['simpleResponses'][0]['textToSpeech'];
                  
                   break;
                   case "suggestions":
				   
				   echo '<br />Please choose one of the following option(s):<br />';
		           foreach($getfm1['suggestions']['suggestions'] as $key) {
                   $sugestion = $key['title'];
                   printf('<button type="button" onClick="suggestionstext(\'%s\');" class="btn btn-primary" style="margin-right: 10px;margin-bottom: 5px;height: 28px;line-height: 6px;">%s</button> ', $sugestion, $sugestion);
				  
		          }
				    echo '<br />';
                  
                   break;
				   
				   case "basicCard":
				   
				   if($getfm1['basicCard']['image']['imageUri'] != NULL) {
					   
					   $getimg = $getfm1['basicCard']['image']['imageUri'];
					   
					   if($getimg == "https://www.odinlearning.in/images/srinivas.png" )
					    $imagecss = "";
					else 
						$imagecss = "card-img-bottom";
					   
		           $cardimage = '<img id="" onclick=\'getcardimageresize("'.$getimg.'")\'  class="'.$imagecss.'"  src='.$getfm1['basicCard']['image']['imageUri'].' alt='.$getfm1['basicCard']['image']['accessibilityText'].'  >';
		           }
		           else {
			       $cardimage ='';
		           }
		
		           echo '<div class="card" style="width:350px">
                   <div class="card-body">
	               '.$cardimage.'
                   <h4 class="card-title">'.$getfm1['basicCard']['title'].'<br /><small>'. $getfm1['basicCard']['subtitle'].'</small></h4>
                   <p class="card-text">'.$getfm1['basicCard']['formattedText'].'</p>
                   <a target="_blank" href='.$getfm1['basicCard']['buttons'][0]['openUriAction']['uri'].' class="btn btn-primary">'.$getfm1['basicCard']['buttons'][0]['title'].'</a>
                   </div>
                   </div>';
				   break;
				   
				   case "listSelect":
				   
				   echo $getfm1['listSelect']['title'].':<br />';
	    
                  $getlist ='<div style="width:400px">';
	  
	              foreach($getfm1['listSelect']['items'] as $key){
	      
                   if($key["image"]["imageUri"] != null){
		  
		  $imageinfo =' <img src="'.$key["image"]["imageUri"].'" style="width:85px;height:85px" alt="" class="img-circle"/>';
		  } else {
			  $imageinfo= '';
		  }
		  
		  
		 
		 $getkey =  $key['info']['key'];
		 $getlist .=  '<li class="list-group-item right clearfix" style="margin-right:20px;margin-left:20px;    margin-bottom: -1px;padding-left: 13px;cursor:pointer" onclick=\'suggestionstext("'.$getkey.'")\'>
		 <span class="chat-img pull-right">
                                               '.$imageinfo.'
											   </span>

                                            <div class="chat-body clearfix">
											
											 <h6 class="card-title">'.$key['title'].'</h6>
											
                                              
                                                <p>
                                                   
													'.$key['description'].'
                                                </p>
                                            </div>
                                        </li>';
	    
	    
	      
	  }
	  $getlist.='</div>';
	  
	  echo  $getlist;
				   
				   
				   break;
                   default:
                   
                   }
				   
					
				}
				//exit;
					
				
					
				}
				
			
				

	
	
    $sessionsClient->close();
}


  



$data = $_POST['datasent'];
//$data = 'linkout';
detect_intent_texts('admissions-4aeac',$data,$sssid);






