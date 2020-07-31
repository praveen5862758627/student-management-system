<?php
		echo "Curl Test";
		
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "https://docs.odinlearning.in/lmsdata/01-QA/01-NumberSystems/level2/quiz.json");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch); 
		
		echo $output;
?>