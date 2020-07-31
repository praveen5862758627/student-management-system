<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;
use Cake\Http\Client;
use Cake\Datasource\ConnectionManager;

use Cake\Core\Configure;
Configure::load('myconfig');

class CustomHelper extends Helper {

    // private $mainurl = 'https://api.loc/';
   // private $mainurl = 'https://napi.odinlearning.in/';
 //   public $weburlformoodle = 'https://cms.odinlearning.in/';

    //h($this->Custom->compereaname($target['comparea_id']))
    public function getmoodlecomplestatusfinal($quizcode, $userid) {


        $row = array('uid' => $userid, 'code' => $quizcode);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'sms/getquizstatusfinal.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['status'];
    }

    public function getmodulesenables($code, $uid) {
        $users = TableRegistry::get('paymentdetails');
        $users = TableRegistry::get('paymentdetails')->find('all')
                ->where(['paymentdetails.userid' => $uid, 'paymentdetails.productcode' => $code]);

        return $number = $users->count();

        //"SELECT * from paymentdetails WHERE userid ='".$uid."' and productcode ='".$_GET['pid']."'";
    }

    public function getquizesforchart($lecode, $lcode) {
        $row = array('lecode' => $lecode, 'lcode' => $lcode);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getquizesnew.php', false, $context1);
        return $topiccodes = json_decode($result1, true);
        // return $topiccodes[0]['courseid'];
    }

    public function gettopic($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/topic.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['code'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getcompanybnamesforstudentload($examcode) {

        //$this->autoRender = false;
        // $tid = 'CID001';




        $row = array('id' => $examcode);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/topicgetcode.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['companycode'];
    }

    public function compereaname($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/compreaname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getmoodlequizid($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/quizmoodleid.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['mcode'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getstudydurationforeach($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getcourseduration.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['studyduration'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getcoursename($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getcoursename.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getquizesforgetdeatils($lecode, $lcode) {
        $row = array('lecode' => $lecode, 'lcode' => $lcode);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getquizesnewlimit.php', false, $context1);
        return $topiccodes = json_decode($result1, true);
        // return $topiccodes[0]['courseid'];
    }

    public function convertTime($dec) {
        // start by converting to seconds
        $seconds = ($dec * 3600);
        // we're given hours, so let's get those the easy way
        $hours = floor($dec);
        // since we've "calculated" hours, let's remove them from the seconds variable
        $seconds -= $hours * 3600;
        // calculate minutes left
        $minutes = floor($seconds / 60);
        // remove those from seconds as well
        $seconds -= $minutes * 60;
        // return the time formatted HH:MM:SS
        return $this->lz($hours) . ":" . $this->lz($minutes);
    }

// lz = leading zero
    public function lz($num) {
        return (strlen($num) < 2) ? "0{$num}" : $num;
    }

    public function getscoreforbaseline1($id, $useridmoodle, $gettopicids, $tragetids) {




        /* echo 'swaedrfcsewdf'.$gettopicids;
          exit; */

        //  SELECT * FROM `targetcomps` WHERE `target_id`=2540 and `topiccode` in(14,15,61,62,63,64,65,66,67,68,69,70,71,72,73,146,147,148)


        $row = array('id' => $id, 'useridmoodle' => $useridmoodle, 'gettopicids' => $gettopicids);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/quizname.php', false, $context1);

        $topiccodes = json_decode($result1, true);

        $conn = ConnectionManager::get('default');

        //$querytcomps = 'SELECT lesson,level FROM targetcomps WHERE target_id  IN (' . $tragetids . ') and topiccode IN (' . $topiccodes . ')';

        $querytcomps = 'SELECT max(tc.level) as lecode,tc.id as tcid, tc.status as tctstatus,tc.skip as tcskip,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  targetcomps tc WHERE tc.target_id IN (' . $tragetids . ') and tc.topiccode IN (' . $topiccodes . ') GROUP BY tc.topiccode order by tc.level asc , tc.id  asc';




        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();

        $examcode = "";
        $complted = 0;
        $pending = 0;

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);
            //$examcode .= $lcode . ',';





            $t = $this->getstudydurationforeach($lcode) / 60;


            //level

            $finaldatalist = $this->getquizesforgetdeatils($lecode, $lcode);



            foreach ($finaldatalist as $topiccodes1) {


                $gradeff = $this->getscoreforbaselinegetscore($id, $useridmoodle, $gettopicids, $tragetids, $topiccodes1['courseid']);
                // $examcode .= $gradeff.'-'; 
                //$gradeff =$topiccodes1['courseid'];
                //if($gradeff != ""){

                if ($gradeff >= '80') {
                    $complted += $t * $topiccodes1['level_id'];
                } else {

                    $pending += $t * $topiccodes1['level_id'];
                }
                // }
            }
        }



        if (($complted / ($complted + $pending)) * 100 == 'NAN')
            return array('0.00%', ($complted + $pending), $pending);

//return $complted.'+'.$pending;
        else
            return array(number_format(($complted / ($complted + $pending)) * 100, 2) . '%', ($complted + $pending), $pending);
        //return $complted.'+'.$pending;
        // return $complted;


        /* $complted =0; $pending = 0; $t=1;
          foreach($topiccodes as $topiccodes1)
          {
          if($topiccodes1['levelid'] != ""){


          if($topiccodes1['Grade'] >= '80')
          {
          $complted+= $t*$topiccodes1['levelid'];
          }
          else{

          $pending+= $t*$topiccodes1['levelid'];
          }

          }
          }


          if(($complted / ($complted+$pending)) * 100 == 'NAN')
          return '-';
          else
          return ($complted / ($complted+$pending)) * 100 .'%'; */
    }

    public function getscoreforbaselinegetscore($id, $useridmoodle, $gettopicids, $tragetids, $courseid) {




        /* echo 'swaedrfcsewdf'.$gettopicids;
          exit; */

        //  SELECT * FROM `targetcomps` WHERE `target_id`=2540 and `topiccode` in(14,15,61,62,63,64,65,66,67,68,69,70,71,72,73,146,147,148)


        $row = array('id' => $id, 'useridmoodle' => $useridmoodle, 'courseid' => $courseid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cms/couserquizes.php', false, $context1);

        $topiccodes = json_decode($result1, true);

        return $topiccodes[0]['Grade'];
    }

    public function getscoreforbaseline($id, $useridmoodle) {


        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getbaselinelistfinal.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        //  return var_dump $topiccodes['courseid'];
        // return (var_dump($topiccodes));
        $couseridfrommodel = $topiccodes[0]['courseid'];

        $http = new Client();

        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            'wstoken' => '36273d0cb5670991cd92216058a151a6',
            'moodlewsrestformat' => 'json',
            'userid' => $useridmoodle,
            'wsfunction' => 'gradereport_overview_get_course_grades'
        ]);

        $json1 = $response->getJson();

        if ($json1['grades'] == null) {
            echo 'No Score record found.';
            // exit;
        }

        $blocksarray = json_encode($json1);

        $blocks = json_decode($blocksarray, true);



        foreach ($blocks['grades'] as $gd) {



            if ($gd['courseid'] == $couseridfrommodel) {


                $garde = $gd['grade'];
            }
        }

        return $garde;
    }

    public function getexamname($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getexamnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getsemname($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getsamenames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getdepname($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getdepnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function geticcname($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/geticcnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getdecriptionforicc($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/geticcdescription.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['description'];
        /* var_dump( 'sfqcewsdf'.$topiccodes[0]['description']);
          exit; */
    }

    public function getlevel($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/levelname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //	var_dump( $topiccodes);
        //exit;
    }

    public function getlesson($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/lessonname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function yourhelperfunction($a) {
        //$mytarget = TableRegistry::get('exam')->find('all')
        //->where(['exam.id' => $a]);

        $users = TableRegistry::get('exam');
        $name = $users->get($a)->name;

        return $name;
    }

    public function limit_words($string, $length) {
        $string = strip_tags($string);
        if (strlen($string) > $length) {

            // truncate string
            $stringCut = substr($string, 0, $length);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        return $string;
    }

    public function getsemesterid($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getsemesterid.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['id'];
        //var_dump( $topiccodes);
        //exit;
    }

    /* public function getsemesterid($id)
      {
      $row = array('id' => $id);
      $data = json_encode($row);
      $options1 = array(
      'http' => array(
      'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
      "Content-Type: application/json\r\n",
      'method'  => 'POST',
      'content' => $data,
      ));


      $context1  = stream_context_create($options1);
      $result1 = file_get_contents($this -> mainurl.'ims/getsemesterid.php', false, $context1);
      var_dump( $topiccodes = json_decode($result1, true));
      exit;
      return $topiccodes[0]['id'];

      } */

    public function getsemsterconmpsforstudents($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/semcomsstudent.php', false, $context1);
        return $topiccodes = json_decode($result1, true);
    }

    public function getcourseid($id) {
        $row = array('id' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getcourseid.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['courseid'];
        //var_dump( $topiccodes);
        //exit;
    }
	
	/*****ins admin code*******************/
		 public function getspeakersall()
		{
			 $row = array();
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'ic/getspeakersall.php', false, $context1);
        return $topiccodes = json_decode($result1, true);
		// return $topiccodes[0]['courseid'];
		
		}
		
		 public function getprojectsall()
		{
			 $row = array();
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'ic/getprojectsall.php', false, $context1);
        return $topiccodes = json_decode($result1, true);
		// return $topiccodes[0]['courseid'];
		
		}
		 public function getapprenticeall()
		{
			 $row = array();
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'ic/getapprenticeall.php', false, $context1);
        return $topiccodes = json_decode($result1, true);
		// return $topiccodes[0]['courseid'];
		
		}
		
				 public function getallthecomapnies()
		{
			 $row = array();
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'ic/getallthecomapnieslist.php', false, $context1);
        return $topiccodes = json_decode($result1, true);
		
		
		}
		
						 public function getallthecompetencies()
		{
			 $row = array();
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'cmd/compreanamelistallfinal.php', false, $context1);
        return $topiccodes = json_decode($result1, true);
		
		
		}
		
		 public function getspeakercount()
		{
			 $row = array();
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'ic/getspeakersallcount.php', false, $context1);
         $topiccodes = json_decode($result1, true);
		 return $topiccodes[0]['numlesson'];
		
		}
			 public function getcomapanyjobcount($compid)
		{
			 $row = array('compid' => $compid);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'ic/getcountaooffalljobs.php', false, $context1);
         $topiccodes = json_decode($result1, true);
		 return $topiccodes[0]['numlesson'];
		
		}
		
				 public function getcompaniescount()
		{
			 $row = array();
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'ic/getallcomcount.php', false, $context1);
         $topiccodes = json_decode($result1, true);
		 return $topiccodes[0]['numlesson'];
		
		}
						 public function getcomptenciescount()
		{
			 $row = array();
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'cmd/getallcomcount.php', false, $context1);
         $topiccodes = json_decode($result1, true);
		 return $topiccodes[0]['numlesson'];
		
		}
		
				 public function getjobscount()
		{
			 $row = array();
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'ic/getalljobscount.php', false, $context1);
         $topiccodes = json_decode($result1, true);
		 return $topiccodes[0]['numlesson'];
		
		}
		
		
				 public function getprojectscount()
		{
			 $row = array();
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'ic/getallprojectscount.php', false, $context1);
         $topiccodes = json_decode($result1, true);
		 return $topiccodes[0]['numlesson'];
		
		}
					 public function getapprenticecount()
		{
			 $row = array();
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($this -> mainurl.'ic/getallapprenticecount.php', false, $context1);
         $topiccodes = json_decode($result1, true);
		 return $topiccodes[0]['numlesson'];
		
		}
		
		public function studentgroupall()
	{
			
		return TableRegistry::get('studentgroup')->find('all', array(
    'limit' => 10
))->order(['id' => 'DESC']); 
				
		

	}
    
    		public function studentgroupallnn()
	{
			
		return TableRegistry::get('studentgroup')->find('all', array(
    'limit' => 100000
))->order(['id' => 'DESC']); 
				
		

	}
	public function studentgroupcount()
	{
			
		$users = TableRegistry::get('studentgroup')->find('all');
				
				return $number = $users->count();
		
		

	}
	    public function getcountofgroupsunderthis($a) {
        //$mytarget = TableRegistry::get('exam')->find('all')
        //->where(['exam.id' => $a]);

        $users = TableRegistry::get('users');
        $name = $users->get($a)->groupid;
		
		$groups_array = explode(",", $name);
$result = count($groups_array);

        return $result;
    }
	
	 public function subgroupsgroupadmin($a) {
        //$mytarget = TableRegistry::get('exam')->find('all')
        //->where(['exam.id' => $a]);

        $users = TableRegistry::get('users');
        $name = $users->get($a)->groupid;
		
		$groups_array = explode(",", $name);


        return $groups_array;
    }
	
	
    public function getstudentgroupnames($a) {
        //$mytarget = TableRegistry::get('exam')->find('all')
        //->where(['exam.id' => $a]);

        $users = TableRegistry::get('studentgroup');
        $name = $users->get($a)->name;

        return $name;
    }
	

}

?>