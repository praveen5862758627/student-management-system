<?php

namespace App\Controller;

use App\Controller\AppController;
//use Ruler\Ruler\RuleBuilder;
//use Ruler\Ruler\Context;
use Cake\Http\Client;
use Cake\Core\Configure;

Configure::load('myconfig');

//header('Access-Control-Allow-Origin: *');
/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CmsController extends AppController {

    //public $weburlformoodle = 'https://odinlearning.in/moodle30/';
    //public $weburlformoodle = 'http://cms.loc/';
    public $weburlformoodle = 'https://testcms.odinlearning.in/';

    // private $url1 = 'https://odinlearning.in/moodle30/course/view.php?id=3';
    /* private $options1 = array(
      'http' => array(
      'header' => "Authorization:Basic YWRtaW46QWRtaW4xMiM=\r\n" .
      "Content-Type: application/json\r\n",
      'method' => 'POST',
      )); */



    // private $email = $this->request->getSession()->read('sessionemail');
    //  private $username = "praveen";
    // private $password = "Praveen12345*";

    public function initialize() {
        parent::initialize();

        // No model for this Controller, Only View

        $this->modelClass = false;
    }

    public function displayevents() {
        $this->autoRender = false;
        $this->loadModel('Events');

        $id = $this->request->pass[0];

        $semename = $this->Events->find('all', ['conditions' => ['Events.id' => $id]])->first();
        echo $getsemanme = $semename->description;
        exit;
    }

    public function index() {

        $http = new Client();

        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            'wstoken' => '948c273439239fc69a6ed2d81f660428',
            'moodlewsrestformat' => 'json',
            'quizid' => '8',
            'userid' => '25',
            // 'preflightdata' => array('name' => 'praveen' , 'value' => 'Praveen12345*'),
            'wsfunction' => 'mod_quiz_get_user_attempts'
        ]);

        $json1 = $response->getJson();
        var_dump($json1);
        exit;

        echo "<br /><br /><br /><br />----------------------------quiz questions-------------------------------<br />";

        echo ' <span style=color:red>ID :</span> ' . $json1['attempt']['id'] . '<br />';
        echo ' <span style=color:red>User ID :</span> ' . $json1['attempt']['userid'] . '<br />';
        echo ' <span style=color:red>Layout :</span> ' . $json1['attempt']['layout'] . '<br />';
        echo ' <span style=color:red>Next page:</span> ' . $json1['nextpage'] . '<br />';
        echo ' <span style=color:red>Question:</span> ' . $json1['questions'][0]['html'] . '<br />';
        echo '<span style=color:red>attempt : </span>' . $json1['attempt']['attempt'] . '<br /><br />';



        $response = $http->post($this->weburlformoodle . 'login/token.php?username=praveen58627&service=CMSS&password=Praveen12345*');
        $json3 = $response->getJson();

        /* echo $json3['token'];

          exit; */

        $http = new Client();
        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            'wstoken' => $json3['token'],
            'moodlewsrestformat' => 'json',
            'wsfunction' => 'core_course_get_courses'
        ]);

        $json1 = $response->getJson();
        echo "---------------------------- Courses ----------------------------------------<br />";

        foreach ($json1 as $row) {
            echo '<span style=color:red>Course id</span> :' . $row['id'] . ' <br /><span style=color:red>Course Name</span> : ' . $row['fullname'] . '<br />';
            echo '<span style=color:red>shortname </span>:' . $row['shortname'] . '<br /><br />';
        }



        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            'wstoken' => $json3['token'],
            'moodlewsrestformat' => 'json',
            'courseid' => '2',
            'wsfunction' => 'core_course_get_contents'
        ]);

        $json1 = $response->getJson();


        $json = json_encode($json1);

        echo "<br /><br /><br /><br />----------------------------section for couseid 2-------------------------------<br />";

        foreach ($json1 as $row) {
            echo '<span style=color:red>Section id :</span>' . $row['id'] . '<br /><span style=color:red> Name : </span>' . $row['name'] . '<br />';

            foreach ($row['modules'] as $k) {
                echo '<span style=color:red>URL:</span> ' . $k['url'] . '<br /><br />';
            }
        }


        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            'wstoken' => $json3['token'],
            'moodlewsrestformat' => 'json',
            'courseid' => '3',
            'wsfunction' => 'core_course_get_contents'
        ]);

        $json1 = $response->getJson();

        $json = json_encode($json1);


        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            'wstoken' => $json3['token'],
            'moodlewsrestformat' => 'json',
            'courseid' => '4',
            'wsfunction' => 'core_course_get_contents'
        ]);

        $json1 = $response->getJson();

        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            'wstoken' => $json3['token'],
            'moodlewsrestformat' => 'json',
            'courseids' => ['2'],
            'wsfunction' => 'mod_quiz_get_quizzes_by_courses'
        ]);

        $json1 = $response->getJson();

        echo "<br /><br /><br /><br />----------------------------quiz data-------------------------------<br />";


        foreach ($json1['quizzes'] as $row) {

            echo ' <span style=color:red>ID :</span> ' . $row['id'] . '<br />';
            echo '<span style=color:red>Name : </span>' . $row['name'] . '<br /><br />';
        }



        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            'wstoken' => '0d195b9b93790877bbcf401ce0b8d166',
            'moodlewsrestformat' => 'json',
            'attemptid' => '1',
            'page' => '0',
            // 'preflightdata' => array('name' => 'praveen' , 'value' => 'Praveen12345*'),
            'wsfunction' => 'mod_quiz_get_attempt_data'
        ]);

        $json1 = $response->getJson();

        echo "<br /><br /><br /><br />----------------------------quiz questions-------------------------------<br />";

        echo ' <span style=color:red>ID :</span> ' . $json1['attempt']['id'] . '<br />';
        echo ' <span style=color:red>User ID :</span> ' . $json1['attempt']['userid'] . '<br />';
        echo ' <span style=color:red>Layout :</span> ' . $json1['attempt']['layout'] . '<br />';
        echo ' <span style=color:red>Next page:</span> ' . $json1['nextpage'] . '<br />';
        echo ' <span style=color:red>Question:</span> ' . $json1['questions'][0]['html'] . '<br />';
        echo '<span style=color:red>attempt : </span>' . $json1['attempt']['attempt'] . '<br /><br />';

        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            'wstoken' => '98c447393477657ab69ea116d2c13289',
            'moodlewsrestformat' => 'json',
            'username' => 'praveen12345',
            'password' => 'Praveen12345*',
            'firstname' => 'Praveen5',
            'lastname' => 'Kumar',
            'email' => 'praveen12345@xlanz.com',
            'city' => 'Mangalore',
            'country' => 'India',
            'recaptchachallengehash' => '',
            'recaptcharesponse' => '',
            'redirect' => '',
            'wsfunction' => 'auth_email_signup_user'
        ]);


        $json1 = $response->getJson();

        $json = json_encode($json1);

        echo "<br /><br /><br /><br />----------------------------users details-------------------------------<br />";

        var_dump($json);


        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            'wstoken' => '9741ec72ba634239016b24d29410c218',
            'moodlewsrestformat' => 'json',
            'user' => ['username' => '',
                'firstname' => '',
                'lastname' => '',
                'email' => 'praveen12345@xlanz.com'],
            'wsfunction' => 'auth_userkey_request_login_url'
        ]);

        $json1 = $response->getJson();

        echo "<br /><br /><br /><br />----------------------------auth login-------------------------------<br /><br />";


        echo '<span style=color:red>Login URL :</span>' . $json1['loginurl'];
    }

    public function getloginurl($emailid) {
        $http = new Client();

        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            // 'wstoken' => '9741ec72ba634239016b24d29410c218',
            'wstoken' => 'c07cf6ba54d8bc36924635c683673498',
            'moodlewsrestformat' => 'json',
            'user' => ['username' => '',
                'firstname' => '',
                'lastname' => '',
                'email' => $emailid],
            'wsfunction' => 'auth_userkey_request_login_url'
        ]);

        $json1 = $response->getJson();
        return $json1['loginurl'];
    }

    public function getusertoken($username, $password) {
        $http = new Client();
        $response = $http->post($this->weburlformoodle . 'login/token.php?username=' . $username . '&service=SGRADE&password=' . $password);
        $json3 = $response->getJson();
        return $json3;
    }

    public function geturl($urlid, $urlpath) {
        $loginurl = $this->getloginurl($this->request->getSession()->read('sessionemail'));
        //$username = $this->request->getSession()->read('username') ;
        //	$password = $this->request->getSession()->read('sesspassword').'12345*';
        // $getusername = $this->getusertoken($username, $password);


        if (!isset($loginurl)) {
            return false;
        }
        $path = '&wantsurl=' . urlencode($urlpath . $urlid);

        return $finalurl = $loginurl . $path;
    }

    public function geturl1($urlid, $urlpath, $para) {
        $loginurl = $this->getloginurl($para);
        //$username = $this->request->getSession()->read('username') ;
        //	$password = $this->request->getSession()->read('sesspassword').'12345*';
        // $getusername = $this->getusertoken($username, $password);


        if (!isset($loginurl)) {
            return false;
        }
        $path = '&wantsurl=' . urlencode($urlpath . $urlid);

        return $finalurl = $loginurl . $path;
    }

    public function displayerror() {
        
    }

    public function displayquiz() {

        $urlid = $this->request->pass[0];
        $urlpath = $this->weburlformoodle . 'course/view.php?id=';

        $finalurl = $this->geturl($urlid, $urlpath);

        $this->redirect($finalurl);
    }

    public function displayquizforgarde() {

        $urlid = $this->request->pass[0];
        //   $urlpath = $this->weburlformoodle.'course/user.php?mode=grade&user='.$this->request->getSession()->read('moodleuid').'&id=';

        $urlpath = $this->weburlformoodle . 'grade/report/quizanalytics/index.php?id=';

        $finalurl = $this->geturl($urlid, $urlpath);

        $this->redirect($finalurl);
    }

    public function displayquizforgardeforlesson() {

        $urlid = $this->request->pass[0];
        $urlpath = $this->weburlformoodle . 'course/user.php?mode=grade&user=' . $this->request->getSession()->read('moodleuid') . '&id=';

        //  $urlpath = $this->weburlformoodle.'grade/report/quizanalytics/index.php?id=';

        $finalurl = $this->geturl($urlid, $urlpath);

        $this->redirect($finalurl);
    }

    public function displayquizfscorecardforeach() {

        /*  $urlid =   "";
          $para =   $this->request->pass[0];
          $urlpath = $this->weburlformoodle.'grade/report/overview/index.php';

          $finalurl = $this->geturl1($urlid, $urlpath , $para);

          $this->redirect($finalurl); */

        $para = $this->request->pass[0];

        return $this->redirect($this->weburlformoodle . 'login/logoutuser.php?email=' . $para);
    }

    public function displayquizfscorecardforeach1() {

        $urlid = "";
        $para = $this->request->pass[0];

        $this->loadModel('Users');

        $categoryname = $this->Users->find('all', ['conditions' => ['Users.email' => $para]])->first();
        $getcatn = $categoryname->moodleuid;

        if ($getcatn == 0) {
            echo "<b><h1>Score Card not available. Student hasn't started using the learning module.</h1></b>";
            exit;
        }



        $urlpath = $this->weburlformoodle . 'blocks/configurable_reports/viewreport.php?id=3&courseid=1';

        $finalurl = $this->geturl1($urlid, $urlpath, $para);

        $this->redirect($finalurl);
    }

    public function displayquizfscorecard() {

        $urlid = $this->request->pass[0];
        //  $urlpath = $this->weburlformoodle.'grade/report/overview/index.php';

        $urlpath = $this->weburlformoodle . 'blocks/configurable_reports/viewreport.php?id=3&courseid=1';

        $finalurl = $this->geturl($urlid, $urlpath);

        $this->redirect($finalurl);
    }

    /* public function displayquiz1() {

      $urlid =   $this->request->pass[0];
      $urlpath = 'https://odinlearning.in/moodle30/course/view.php?id=';

      $finalurl = $this->geturl($urlid, $urlpath);

      $this->redirect($finalurl);
      }

      public function displayquiz2() {

      $urlid =   $this->request->pass[0];
      $urlpath = 'https://odinlearning.in/moodle30/course/view.php?id=';

      $finalurl = $this->geturl($urlid, $urlpath);

      $this->redirect($finalurl);
      } */

    public function displayscorm() {


        //echo $this->request->getSession()->read('sessionemail');
        //  exit;


        $urlid = '93';
        $urlpath = $this->weburlformoodle . 'mod/scorm/view.php?id=';

        $finalurl = $this->geturl($urlid, $urlpath);

        $this->redirect($finalurl);
    }

    public function displaycourse() {

        $urlid = '2';
        $urlpath = $this->weburlformoodle . 'course/view.php?id=';

        $finalurl = $this->geturl($urlid, $urlpath);

        $this->redirect($finalurl);
        //echo $finalurl;
        // exit;
    }

    public function displayurl() {

        $urlid = '6';
        $urlpath = $this->weburlformoodle . 'mod/url/view.php?id=';

        $finalurl = $this->geturl($urlid, $urlpath);
        $this->redirect($finalurl);

        //$this->set(compact('finalurl'));
    }

}
