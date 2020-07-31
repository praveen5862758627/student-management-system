<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Cache\Cache;
use Cake\Http\Client;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Excelreader\PhpExcelReader;
use Cake\Auth\DefaultPasswordHasher;
use Cake\View\Helper;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
//App::import('Helper', 'Custom');


class UsersController extends AppController {


    private $mainurl = 'https://napi.odinlearning.in/';
    private $weburlmainsite = 'https://nsms.odinlearning.in/';
    public $weburlformoodle = 'https://ncms.odinlearning.in/';
    private $weburlforhc = 'https://hc.odinlearning.in/';
    private $weburlforpc = 'https://pc.odinlearning.in/';
    private $weburlforsc = 'https://sc.odinlearning.in/';
    private $weburlforic = 'https://ic.odinlearning.in/';

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public $indianStates1 = ['-' => '-'];

    public function setPasswordforstudent($password) { //password hashing
        return (new DefaultPasswordhasher)->hash($password);
    }

    public function deleteacademicdetailslist() { // function to delete SSLC PUC details
     

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
            $conn = ConnectionManager::get('default');
            $querytcomps = 'SELECT * from sslcpuc WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by type desc';

            $stmt1 = $conn->execute($querytcomps);

            $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);




                $deletebutton = '<a  class="btn-floating peach-gradient mt-0  waves-effect waves-light"  title="Delete" onclick="deleteacademicedetails(' . $id . ')" >
                <i class="fas fa-trash" aria-hidden="true"></i> 
              </a>';


                if ($type == 'PUC')
                    $typen = 'SSLC + 2/3';
                else
                    $typen = 'SSLC';


                $post_item1 = array(
                    'type' => html_entity_decode($typen),
                    'name' => html_entity_decode($collegename),
                    'actiondel' => html_entity_decode($deletebutton)
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }

            $json_data = array("data" => $posts_arr1);

            // Turn to JSON & output
            echo json_encode($json_data);
            /*             * **************************************** */
        }
    }

    public function stepperprofile() {
        
    }
		   public function intp(){}
	     public function intj(){}
		   public function entp(){}
		     public function entj(){}
			   public function infp(){}
			     public function infj(){}
				   public function enfp(){}
				     public function enfj(){}
					   public function istj(){}
					     public function isfj(){}
						   public function estj(){}
						     public function esfj(){}
							   public function istp(){}
							     public function isfp(){}
								   public function estp(){}
								     public function esfp(){}

    public function comingsoon() {
        
    }
    public function deleteacademicdetailslistgrad() { // function to delete graduation  details
       

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');





            /*             * ********************************* */

            $conn = ConnectionManager::get('default');



            $querytcomps = 'SELECT * from ugpg WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by type desc';




            $stmt1 = $conn->execute($querytcomps);

            $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);




                $deletebutton = '<a  class="btn-floating peach-gradient mt-0  waves-effect waves-light"  title="Delete" onclick="deleteacademicedetailsgrad(' . $id . ')" >
                <i class="fas fa-trash" aria-hidden="true"></i> 
              </a>';


                if ($type == 'UG')
                    $typen = 'Graduation';
                else
                    $typen = 'Post Graduation';


                $post_item1 = array(
                    'type' => html_entity_decode($typen),
                    'name' => html_entity_decode($universityname),
                    'actiondel' => html_entity_decode($deletebutton)
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }

            //  $json_data = array("data"            => $posts_arr1 );
            // Turn to JSON & output
            //   echo json_encode($posts_arr1);


            $json_data = array("data" => $posts_arr1);

            // Turn to JSON & output
            echo json_encode($json_data);
            /*             * **************************************** */
        }
    }

    public function areaofinterestajaxx() { //function to display and edit profile sections 
      

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


            /*             * ********************************* */

            $conn = ConnectionManager::get('default');

            $getflag = $_POST['cat_val'];

            if ($_POST['cat_val'] == 1) {
                $table = 'areaofinterest';
            } else if ($_POST['cat_val'] == 2) {
                $table = 'projectexecuted';
            } else if ($_POST['cat_val'] == 3) {
                $table = 'internshipdetails';
            } else if ($_POST['cat_val'] == 4) {
                $table = 'hobiesandextracurricular';
            } else if ($_POST['cat_val'] == 5) {
                $table = 'electives';
            } else if ($_POST['cat_val'] == 6) {
                $table = 'coursesattended';
            } else if ($_POST['cat_val'] == 7) {
                $table = 'personaldetails';
            }

            $querytcomps = 'SELECT * from ' . $table . ' WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';




            $stmt1 = $conn->execute($querytcomps);

            $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);

                $editbutton = '<a class="btn-floating peach-gradient mt-0   waves-effect waves-light"  title="Save" onClick="saveareaofintesdata(' . $id . ',' . $getflag . ')">
                <i class="fas fa-save" aria-hidden="true" id="' . $getflag . 'editbutton' . $id . '"></i>
             </a>';


                $deletebutton = '<a  class="btn-floating peach-gradient mt-0  waves-effect waves-light"  title="Delete" onclick="deleteareaofinterest(' . $id . ',' . $getflag . ')" >
                <i class="fas fa-trash" aria-hidden="true"></i> 
              </a>';


                $post_item1 = array(
                    'id' => html_entity_decode($id),
                    'name' => html_entity_decode('<div class="md-form mt-3"> <textarea id="nameforare' . $id . '" class="form-control md-textarea" rows="0" onkeyup="JavaScript: ControlChanges(' . $getflag . ',' . $id . ')" >' . $name . '</textarea></div>'),
                    'description' => html_entity_decode('<div class="md-form mt-3"> <textarea id="descforare' . $id . '" class="form-control md-textarea" rows="0" onkeyup="JavaScript: ControlChanges(' . $getflag . ',' . $id . ')" >' . $description . '</textarea></div>'),
                    'editbutton' => html_entity_decode($editbutton),
                    'deletebutton' => html_entity_decode($deletebutton)
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }

           


            $json_data = array("data" => $posts_arr1);

            // Turn to JSON & output
            echo json_encode($json_data);
            /*             * **************************************** */
        }
    }

    public function deleterowacemic() {  // delete academic details

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {
            $blockid = $_POST['cat_val'];




            $optionalblockTable = TableRegistry::get('sslcpuc');
            $query = $optionalblockTable->query();
            $query->delete()
                    //  ->set(['deletedblock' => 1])
                    ->where(['id' => $blockid])
                    ->execute();
            echo "Deleted Successfully";
            exit;
        }
    }

    public function updatestudentsmodulesflag() { // function to set module enabled flag

        $this->autoRender = false;

        if ($this->request->is(array('ajax'))) {


            $userid = $this->request->getSession()->read('sessionname');
            $this->Users->updateAll(['modulesenable' => 1], ['id' => $userid]);
        }
    }

    public function updatevebnts() { //institute admin event subscription function

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {
            $blockid = $_POST['cat_val'];

            $type = $_POST['type'];

            if ($type == 1) {

                $userid = $this->request->getSession()->read('sessionname');
                $this->Users->updateAll(['event1' => $blockid], ['id' => $userid]);
//echo "Deleted Successfully";
            } else if ($type == 2) {

                $userid = $this->request->getSession()->read('sessionname');
                $this->Users->updateAll(['event2' => $blockid], ['id' => $userid]);
            } else if ($type == 3) {

                $userid = $this->request->getSession()->read('sessionname');
                $this->Users->updateAll(['event3' => $blockid], ['id' => $userid]);
            } else if ($type == 4) {

                $userid = $this->request->getSession()->read('sessionname');
                $this->Users->updateAll(['event4' => $blockid], ['id' => $userid]);
            } else if ($type == 5) {

                $userid = $this->request->getSession()->read('sessionname');
                $this->Users->updateAll(['event5' => $blockid], ['id' => $userid]);
            }



            //echo "Deleted Successfully";
            exit;
        }
    }

    public function deleterowacemicgrad() { // function to delete graduation and post graduation records 

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {
            $blockid = $_POST['cat_val'];




            $optionalblockTable = TableRegistry::get('ugpg');
            $query = $optionalblockTable->query();
            $query->delete()
                    //  ->set(['deletedblock' => 1])
                    ->where(['id' => $blockid])
                    ->execute();
            echo "Deleted Successfully";
            exit;
        }
    }

    public function displayaddondeatils() {  // function to get add-on course list

        $parameters = $this->request->getAttribute('params');
        $id = $parameters['pass'][0];

        $row = array('pid' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'ims/getaddondesc.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        $getdesc = $topiccodes[0]['description'];
        $name = $topiccodes[0]['name'];

        $this->set(compact('getdesc', 'name'));
    }

    public function displayaddondeatilsnew() { // function to get semesters list

        $parameters = $this->request->getAttribute('params');
        $id = $parameters['pass'][0];

        $row = array('pid' => $id);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'ims/getaddondescnew.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        $getdesc = $topiccodes[0]['description'];
        $name = $topiccodes[0]['name'];

        $this->set(compact('getdesc', 'name'));
    }

    public function paymentsuccess1() {

        // echo "";
        //	sleep(1);

        $this->Flash->success(__('Sending payment informations to ODIN. Please wait...'));

        return $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'paymentsuccess?code=' . $_GET['code']
        ));
    }

    public function paymentsuccess() {  //send email after payment success



        $this->request->getSession()->write('modulestype', $_GET['type']);

        $email = new Email();
        $email->template('payment');
        $email->emailFormat('both');
        $email->from('noreply@odinlearning.in');
        $email->to($this->request->session()->read('sessionemail'), $this->request->session()->read('sessionname1'));
        $email->subject('ODIN : Payment Succesful');
        $email->viewVars(['pcode' => $_GET['pid'], 'userid' => $this->encrypt($this->request->getSession()->read('sessionname')), 'merchant_order_id' => $_GET['code'], 'username' => $this->request->session()->read('sessionname1')]);

        $email->send();
    }

    public function examcompsiframe() { //get exam comps

        $userid = $this->request->getSession()->read('sessionname');
        $categoryname = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $getcatn = $categoryname->scheduleoption;
        $topiccodes = $this->getalltopiccodes();
        $this->set(compact('getcatn', 'topiccodes', 'topiccodesconsolidated', 'comlistforstudent'));
    }

    public function pricing() {
        
    }

    public function paymentpddf() { // pdf generation for the payment

        $parameters = $this->request->getAttribute('params');

        if ($parameters['pass'][0] == NULL) {
            $userid = $this->request->getSession()->read('sessionname');
        } else {
            $userid = $this->decrypt($parameters['pass'][0]);
        }
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from paymentdetails WHERE userid = ' . $userid . ' and productcode ="' . $parameters['pass'][1] . '" order by id desc';



        $stmt1 = $conn->execute($querytcomps);


        $getpaymentdetails = $stmt1->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('getpaymentdetails'));
    }

    public function learningplans() { // function display learning plans

        $userid = $this->request->getSession()->read('sessionname');
        $categoryname = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $getcatn = $categoryname->scheduleoption;

        //if($getcatn == 'General') {




        $topiccodesconsolidated = $this->topiccodesconsolidated();




        /*         * ************* conalling another controller ******************** */
        $compereanameslist = new TargetController();
        $comlistforstudent = $compereanameslist->compereanameslist();
        //}

        $this->set(compact('getcatn', 'topiccodes', 'topiccodesconsolidated', 'comlistforstudent'));
    }

    public function genaretepasswordforstudent() { //function to update password  for all the students



        $this->autoRender = false;

        $users = $this->Users->find('all')->where(['Users.userroles_id' => 2]);
        foreach ($users as $level) {
            $useridrow = $level['id'];

            $phonenumber = $level['phonenumber'];
            if ($phonenumber == '0') {
                $finalpass = '0123456789Aa';
            } else {
                $finalpass = $phonenumber . 'Aa';
            }



            $fpass = $this->setPasswordforstudent($finalpass);
            $this->Users->updateAll(['password' => $fpass], ['id' => $useridrow]);
            echo 'passwordupdated for user id' . $useridrow . '<br />';
        }
    }

    public function areaofinterestcount() {  //row count of areaofinterest
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from areaofinterest WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function projectexecutedcount() { //row count of projectexecuted
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from projectexecuted WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function internshipdetailscount() { //row count of internship details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from internshipdetails WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function hobbiesandextracount() { //row count of hobies and extracurricular 
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from hobiesandextracurricular WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function electivescount() { //row count of electives
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from electives WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function coursesattendedcount() { //row count of coursesattended
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from coursesattended WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function personaldetailscount() { //row count of personaldetails
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from personaldetails WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function postgraduationcount() { //row count of post graduation 
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from ugpg WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function getpaymentdetails() { //function to get payment details
        //$this->autoRender = false;
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from paymentdetails WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);
    }

    public function areaofinterest() { //function to get  areaofinterest details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from areaofinterest WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function projectexecuted() {  //function to get  projectexecuted details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from projectexecuted WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function internshipdetails() { //function to get  internship details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from internshipdetails WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function hobbiesandextra() { //function to get  hobbies and extra  details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from hobiesandextracurricular WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function electives() { //function to get  electives  details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from electives WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function coursesattended() { //function to get  coursesattended   details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from coursesattended WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function personaldetails() { //function to get  electives  details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from personaldetails WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function studentresume() { // function for student resume disply

        $this->loadModel('Users');
        $userid = $this->request->getSession()->read('sessionname');
        $sslcpuc = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $aboutme = $sslcpuc->aboutme;
        $myersbriggs = $sslcpuc->myersbriggs;

        $areaofinterest = $this->areaofinterest();
        $projectexecuted = $this->projectexecuted();
        $internshipdetails = $this->internshipdetails();
        $hobbiesandextra = $this->hobbiesandextra();
        $electives = $this->electives();
        $coursesattended = $this->coursesattended();
        $personaldetails = $this->personaldetails();


        $areaofinterestcount = $this->areaofinterestcount();
        $projectexecutedcount = $this->projectexecutedcount();
        $internshipdetailscount = $this->internshipdetailscount();
        $hobbiesandextracount = $this->hobbiesandextracount();
        $electivescount = $this->electivescount();
        $coursesattendedcount = $this->coursesattendedcount();
        $personaldetailscount = $this->personaldetailscount();



        $postgraduationcount = $this->postgraduationcount();



        $fname = $sslcpuc->fname;
        $lname = $sslcpuc->lname;
        $email = $sslcpuc->email;
        $emailalternate = $sslcpuc->emailalternate;
        $phonenumber = $sslcpuc->phonenumber;
        $phonenumalter = $sslcpuc->phonenumalter;

        if ($sslcpuc->country == '-')
            $country = '-';
        else
            $country = $this->retuyrncountryname($sslcpuc->country);


        $state = $sslcpuc->state;
        $pincode = $sslcpuc->pincode;
        $nationality = $sslcpuc->nationality;
        $dateofbirth = $sslcpuc->dateofbirth;
        $category = $sslcpuc->category;
        $gender = $sslcpuc->gender;
        $address = $sslcpuc->address;
        $address2 = $sslcpuc->address2;



        $problemsolving = $sslcpuc->problemsolving;
        $teamwork = $sslcpuc->teamwork;
        $leadership = $sslcpuc->leadership;
        $socialskils = $sslcpuc->socialskils;
        $initative = $sslcpuc->initative;
        $communicationspoken = $sslcpuc->communicationspoken;
        $communicationwritten = $sslcpuc->communicationwritten;
        $communicationoratory = $sslcpuc->communicationoratory;
        $travelandexploration = $sslcpuc->travelandexploration;
        $technologyaffiliation = $sslcpuc->technologyaffiliation;
        $managementskills = $sslcpuc->managementskills;
        $foriegnlanguages = $sslcpuc->foriegnlanguages;

        $this->loadModel('Sslcpuc');
        //$userid = $this->request->getSession()->read('sessionname');
        $sslcpuc = $this->Sslcpuc->find('all', ['conditions' => ['Sslcpuc.userid' => $userid, 'Sslcpuc.type' => 'SSLC']])->first();
        $collegename = $sslcpuc->collegename;
        $board = $sslcpuc->board;
        $percentage = $sslcpuc->percentage;
        $regnon = $sslcpuc->regno;
        $joining = $sslcpuc->joining;
        $passout = $sslcpuc->passout;



        $sslcpucpuc = $this->Sslcpuc->find('all', ['conditions' => ['Sslcpuc.userid' => $userid, 'Sslcpuc.type' => 'PUC']])->first();
        $collegenamepuc = $sslcpucpuc->collegename;
        $boardpuc = $sslcpucpuc->board;
        $percentagepuc = $sslcpucpuc->percentage;
        $regnonpuc = $sslcpucpuc->regno;
        $joiningpuc = $sslcpucpuc->joining;
        $passoutpuc = $sslcpucpuc->passout;



        $this->loadModel('Ugpg');
        //	$userid = $this->request->getSession()->read('sessionname');
        $uppg = $this->Ugpg->find('all', ['conditions' => ['Ugpg.userid' => $userid, 'Ugpg.type' => 'UG']])->first();
        $universityname = $uppg->universityname;
        $stream = $this->returncousername($uppg->stream);
        $specialization = $uppg->specialization;
        $courseduration = $uppg->courseduration;
        $regnoug = $uppg->regno;
        $yearjoining = $uppg->yearjoining;
        $yearpassout = $uppg->yearpassout;
        $sem1 = $uppg->sem1;
        $sem2 = $uppg->sem2;
        $sem3 = $uppg->sem3;
        $sem4 = $uppg->sem4;
        $sem5 = $uppg->sem5;
        $sem6 = $uppg->sem6;
        $sem7 = $uppg->sem7;
        $sem8 = $uppg->sem8;


        $uppgug = $this->Ugpg->find('all', ['conditions' => ['Ugpg.userid' => $userid, 'Ugpg.type' => 'PG']])->first();
        $universitynameug = $uppgug->universityname;
        $streamug = $this->returncousername($uppgug->stream);
        $specializationug = $uppgug->specialization;
        $coursedurationug = $uppgug->courseduration;
        $regnougug = $uppgug->regno;
        $yearjoiningug = $uppgug->yearjoining;
        $yearpassoutug = $uppgug->yearpassout;
        $sem1ug = $uppgug->sem1;
        $sem2ug = $uppgug->sem2;
        $sem3ug = $uppgug->sem3;
        $sem4ug = $uppgug->sem4;
        $sem5ug = $uppgug->sem5;
        $sem6ug = $uppgug->sem6;
        $sem7ug = $uppgug->sem7;
        $sem8ug = $uppgug->sem8;

        $photoname1 = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $photoname = $photoname1->photoname;

        $this->set(compact('postgraduationcount', 'areaofinterestcount', 'projectexecutedcount', 'internshipdetailscount', 'hobbiesandextracount', 'electivescount', 'coursesattendedcount', 'personaldetailscount', 'photoname', 'universityname', 'stream', 'specialization', 'courseduration', 'regnoug', 'yearjoining', 'yearpassout', 'sem1', 'sem2', 'sem3', 'sem4', 'sem5', 'sem6', 'sem7', 'sem8'));

        $this->set(compact('universitynameug', 'streamug', 'specializationug', 'coursedurationug', 'regnougug', 'yearjoiningug', 'yearpassoutug', 'sem1ug', 'sem2ug', 'sem3ug', 'sem4ug', 'sem5ug', 'sem6ug', 'sem7ug', 'sem8ug'));


        $this->set(compact('collegename', 'board', 'percentage', 'regnon', 'joining', 'passout'));

        $this->set(compact('collegenamepuc', 'boardpuc', 'percentagepuc', 'regnonpuc', 'joiningpuc', 'passoutpuc'));

        $this->set(compact('problemsolving', 'teamwork', 'leadership', 'socialskils', 'initative', 'communicationspoken', 'communicationwritten', 'communicationoratory'));
        $this->set(compact('travelandexploration', 'technologyaffiliation', 'managementskills', 'foriegnlanguages'));

        $this->set(compact('fname', 'lname', 'email', 'emailalternate', 'phonenumber', 'phonenumalter', 'country', 'state', 'pincode', 'nationality', 'dateofbirth', 'category', 'gender', 'address', 'address2'));

        $this->set(compact('myersbriggs', 'aboutme', 'areaofinterest', 'projectexecuted', 'internshipdetails', 'hobbiesandextra', 'electives', 'coursesattended', 'personaldetails'));
    }

    public function areaofinterestcountadmin($userid) { //function to check area of interest count
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from areaofinterest WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function projectexecutedcountadmin($userid) {  //function to check project executeed count
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from projectexecuted WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function internshipdetailscountadmin($userid) {  //function to check internship details count

        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from internshipdetails WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function hobbiesandextracountadmin($userid) {  //function to check hobbies and extra curricular  details count

        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from hobiesandextracurricular WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function electivescountadmin($userid) {  //function to check internship details count
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from electives WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function coursesattendedcountadmin($userid) {  //function to check course attended details count
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from coursesattended WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function personaldetailscountadmin($userid) { //function to check personal details count
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from personaldetails WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function areaofinterestadmin($userid) { //function to check area of interest details count
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from areaofinterest WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function projectexecutedadmin($userid) {  // fetch project executed details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from projectexecuted WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function internshipdetailsadmin($userid) { // fetch internship details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from internshipdetails WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function hobbiesandextraadmin($userid) { // fetch hobies and extracurricular details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from hobiesandextracurricular WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function electivesadmin($userid) { // fetch electives details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from electives WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function coursesattendedadmin($userid) { // fetch courses attended details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from coursesattended WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function personaldetailsadmin($userid) { // fetch personal details
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from personaldetails WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function postgraduationcountadmin($userid) { // fetch row count of post graduation
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT * from ugpg WHERE userid = ' . $userid . ' order by id asc';
        $stmt1 = $conn->execute($querytcomps);


        return $stmt1->rowCount();
    }

    public function studentcv() { //function to display students cv

        $this->loadModel('Users');


        $parameters = $this->request->getAttribute('params');
        $userid = $parameters['pass'][1];


        $sslcpuc = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $aboutme = $sslcpuc->aboutme;
        $myersbriggs = $sslcpuc->myersbriggs;
        $areaofinterest = $this->areaofinterestadmin($userid);
        $projectexecuted = $this->projectexecutedadmin($userid);
        $internshipdetails = $this->internshipdetailsadmin($userid);
        $hobbiesandextra = $this->hobbiesandextraadmin($userid);
        $electives = $this->electivesadmin($userid);
        $coursesattended = $this->coursesattendedadmin($userid);
        $personaldetails = $this->personaldetailsadmin($userid);


        $areaofinterestcount = $this->areaofinterestcountadmin($userid);
        $projectexecutedcount = $this->projectexecutedcountadmin($userid);
        $internshipdetailscount = $this->internshipdetailscountadmin($userid);
        $hobbiesandextracount = $this->hobbiesandextracountadmin($userid);
        $electivescount = $this->electivescountadmin($userid);
        $coursesattendedcount = $this->coursesattendedcountadmin($userid);
        $personaldetailscount = $this->personaldetailscountadmin($userid);



        $postgraduationcount = $this->postgraduationcountadmin($userid);



        $fname = $sslcpuc->fname;
        $lname = $sslcpuc->lname;

        $name = $fname . " " . $lname;

        $email = $sslcpuc->email;
        $emailalternate = $sslcpuc->emailalternate;
        $phonenumber = $sslcpuc->phonenumber;
        $phonenumalter = $sslcpuc->phonenumalter;

        if ($sslcpuc->country == '-')
            $country = '-';
        else
            $country = $this->retuyrncountryname($sslcpuc->country);


        $state = $sslcpuc->state;
        $pincode = $sslcpuc->pincode;
        $nationality = $sslcpuc->nationality;
        $dateofbirth = $sslcpuc->dateofbirth;
        $category = $sslcpuc->category;
        $gender = $sslcpuc->gender;
        $address = $sslcpuc->address;
        $address2 = $sslcpuc->address2;



        $problemsolving = $sslcpuc->problemsolving;
        $teamwork = $sslcpuc->teamwork;
        $leadership = $sslcpuc->leadership;
        $socialskils = $sslcpuc->socialskils;
        $initative = $sslcpuc->initative;
        $communicationspoken = $sslcpuc->communicationspoken;
        $communicationwritten = $sslcpuc->communicationwritten;
        $communicationoratory = $sslcpuc->communicationoratory;
        $travelandexploration = $sslcpuc->travelandexploration;
        $technologyaffiliation = $sslcpuc->technologyaffiliation;
        $managementskills = $sslcpuc->managementskills;
        $foriegnlanguages = $sslcpuc->foriegnlanguages;

        $this->loadModel('Sslcpuc');
        //$userid = $userid;
        $sslcpuc = $this->Sslcpuc->find('all', ['conditions' => ['Sslcpuc.userid' => $userid, 'Sslcpuc.type' => 'SSLC']])->first();
        $collegename = $sslcpuc->collegename;
        $board = $sslcpuc->board;
        $percentage = $sslcpuc->percentage;
        $regnon = $sslcpuc->regno;
        $joining = $sslcpuc->joining;
        $passout = $sslcpuc->passout;



        $sslcpucpuc = $this->Sslcpuc->find('all', ['conditions' => ['Sslcpuc.userid' => $userid, 'Sslcpuc.type' => 'PUC']])->first();
        $collegenamepuc = $sslcpucpuc->collegename;
        $boardpuc = $sslcpucpuc->board;
        $percentagepuc = $sslcpucpuc->percentage;
        $regnonpuc = $sslcpucpuc->regno;
        $joiningpuc = $sslcpucpuc->joining;
        $passoutpuc = $sslcpucpuc->passout;



        $this->loadModel('Ugpg');
        //	$userid = $userid;
        $uppg = $this->Ugpg->find('all', ['conditions' => ['Ugpg.userid' => $userid, 'Ugpg.type' => 'UG']])->first();
        $universityname = $uppg->universityname;
        $stream = $this->returncousername($uppg->stream);
        $specialization = $uppg->specialization;
        $courseduration = $uppg->courseduration;
        $regnoug = $uppg->regno;
        $yearjoining = $uppg->yearjoining;
        $yearpassout = $uppg->yearpassout;
        $sem1 = $uppg->sem1;
        $sem2 = $uppg->sem2;
        $sem3 = $uppg->sem3;
        $sem4 = $uppg->sem4;
        $sem5 = $uppg->sem5;
        $sem6 = $uppg->sem6;
        $sem7 = $uppg->sem7;
        $sem8 = $uppg->sem8;


        $uppgug = $this->Ugpg->find('all', ['conditions' => ['Ugpg.userid' => $userid, 'Ugpg.type' => 'PG']])->first();
        $universitynameug = $uppgug->universityname;
        $streamug = $this->returncousername($uppgug->stream);
        $specializationug = $uppgug->specialization;
        $coursedurationug = $uppgug->courseduration;
        $regnougug = $uppgug->regno;
        $yearjoiningug = $uppgug->yearjoining;
        $yearpassoutug = $uppgug->yearpassout;
        $sem1ug = $uppgug->sem1;
        $sem2ug = $uppgug->sem2;
        $sem3ug = $uppgug->sem3;
        $sem4ug = $uppgug->sem4;
        $sem5ug = $uppgug->sem5;
        $sem6ug = $uppgug->sem6;
        $sem7ug = $uppgug->sem7;
        $sem8ug = $uppgug->sem8;

        $photoname1 = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $photoname = $photoname1->photoname;

        $this->set(compact('postgraduationcount', 'areaofinterestcount', 'projectexecutedcount', 'internshipdetailscount', 'hobbiesandextracount', 'electivescount', 'coursesattendedcount', 'personaldetailscount', 'photoname', 'universityname', 'stream', 'specialization', 'courseduration', 'regnoug', 'yearjoining', 'yearpassout', 'sem1', 'sem2', 'sem3', 'sem4', 'sem5', 'sem6', 'sem7', 'sem8'));

        $this->set(compact('universitynameug', 'streamug', 'specializationug', 'coursedurationug', 'regnougug', 'yearjoiningug', 'yearpassoutug', 'sem1ug', 'sem2ug', 'sem3ug', 'sem4ug', 'sem5ug', 'sem6ug', 'sem7ug', 'sem8ug'));


        $this->set(compact('collegename', 'board', 'percentage', 'regnon', 'joining', 'passout'));

        $this->set(compact('collegenamepuc', 'boardpuc', 'percentagepuc', 'regnonpuc', 'joiningpuc', 'passoutpuc'));

        $this->set(compact('problemsolving', 'teamwork', 'leadership', 'socialskils', 'initative', 'communicationspoken', 'communicationwritten', 'communicationoratory'));
        $this->set(compact('travelandexploration', 'technologyaffiliation', 'managementskills', 'foriegnlanguages'));

        $this->set(compact('fname', 'lname', 'email', 'emailalternate', 'phonenumber', 'phonenumalter', 'country', 'state', 'pincode', 'nationality', 'dateofbirth', 'category', 'gender', 'address', 'address2'));

        $this->set(compact('myersbriggs', 'name', 'aboutme', 'areaofinterest', 'projectexecuted', 'internshipdetails', 'hobbiesandextra', 'electives', 'coursesattended', 'personaldetails'));
    }

    public function returncousername($id) { //return course name
        $this->loadModel('Courselist');
        $photoname1 = $this->Courselist->find('all', ['conditions' => ['Courselist.id' => $id]])->first();
        return $photoname = $photoname1->name;
    }

    public function retuyrncountryname($id) { //return country name
        $this->loadModel('Countries');
        $photoname1 = $this->Countries->find('all', ['conditions' => ['Countries.id' => $id]])->first();
        return $photoname = $photoname1->name;
    }

    public function index() { // index page functions




        $userid = $this->request->getSession()->read('sessionname');
        $ticketuserid = $this->request->getSession()->read('ticketuserid');
        $tickettokenkey = $this->request->getSession()->read('tickettokenkey');
        //  $firstlogin = $this->request->getSession()->read('firstlogin');






        $this->loadModel('Usersession');
        $loggedintime1 = $this->Usersession->find('all', ['conditions' => ['Usersession.uid' => $userid, 'lastlogin' => 1]])->first();

        $loggedintime = $loggedintime1->datetime;

        //echo $loggedsta =   date("Y-m-d h:i a",$loggedintime);
        //exit;



        $indianStates = $this->indianStates1;


        $loggesingroupid = $this->request->getSession()->read('groupid');

        $useridmoodle = $this->request->getSession()->read('moodleuid');

        $getecodes = $this->getexamcodefortarget();


        $loadtragerscore = $this->loadexamsforscore();

        $photoname1 = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $photoname = $photoname1->photoname;


        $users = $this->Users->get($this->request->getSession()->read('sessionname'));

        $id = $users['institution_id'];
        if ($id == null) {
            $institution = 0;
        } else {

            $institution = $this->Users->Institution->get($id);
        }

        $usersrole = $this->request->getSession()->read('sessionname2');


        $this->loadModel('Blocks');
        $this->loadModel('optionalblock');

        $this->loadModel('Target');

        $block = $this->Blocks->newEntity();


        $blocks = $this->getalltheblocks();


        /*         * ********** targets ******************************* */
        $targetexamslist = $this->Target->newEntity();

     

        //if($mytargeticc != 0) {
        $targetexamsicc = TableRegistry::get('target')->find('all')
                ->where(['target.users_id' => $this->request->getSession()->read('sessionname'), 'target.targettype' => 'ICC']);
        //}
        //if($mytargetdep != 0) {
        $targetexamsdep = TableRegistry::get('target')->find('all')
                ->where(['target.users_id' => $this->request->getSession()->read('sessionname'), 'target.targettype' => 'DEP']);
        //}

        /*         * ************************************* */
        $categoryname = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $getcatn = $categoryname->scheduleoption;
        $courseduration = $categoryname->courseduration;
        $firstlogin = $categoryname->firstlogin;
        //exit;
        /*         * ************************************** */

        $this->request->getSession()->write('scheduleoption', $getcatn);


        $targetexams = TableRegistry::get('target')->find('all')
                ->where(['target.users_id' => $this->request->getSession()->read('sessionname'), 'target.targettype' => 'EEP']);




        $targetexamslimit = TableRegistry::get('target')->find('all', array(
                    'limit' => 2
                ))
                ->where(['target.users_id' => $this->request->getSession()->read('sessionname'), 'target.targettype' => 'EEP']);





        $industrycount = $this->getexamcount('industry');
        $examcount = $this->getexamcount('exam');
        $companycount = $this->getexamcount('company');


        $targetexamscount = TableRegistry::get('target')->find('all')
                        ->where(['target.users_id' => $this->request->getSession()->read('sessionname'), 'target.targettype' => 'EEP'])->count();


        $getalltopics = $this->gettopicsfromcmd();

        $topicscount = $getalltopics['data'];


        //  $scorecarddetails = $this->getallcoursesbygrade();

        /*         * ************************************************* */
        $options = array("Male" => "Male", "Female" => "Female", "Other" => "Other");


        $countrylist = array(
            'INDIA' => 'INDIA');

        $usersrole = $this->request->getSession()->read('sessionname2');
        $roleid = $this->request->getSession()->read('sessionname');

        $user = $this->Users->get($roleid, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $coursetype = "";
            foreach ($_POST["coursetype"] as $selectedOption) {

                $coursetype .= $selectedOption . ',';
            }

            $this->request->data['coursetype'] = rtrim($coursetype, ',');


            $degreetype = "";
            foreach ($_POST["degreetype"] as $selectedOption) {

                $degreetype .= $selectedOption . ',';
            }

            $this->request->data['degreetype'] = rtrim($degreetype, ',');





            $user = $this->Users->patchEntity($user, $this->request->getData());

            $password = $this->request->data['password'];




            if ($this->Users->save($user)) {
                $this->Flash->success(__('Changes have been saved'));
                return $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'index'
                ));
            }
            //	}
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        // 
        /*         * ************************************************* */

        $this->loadModel('Countries');
        $countirelist = $this->Countries->find('all', ['conditions' => ['1' => '1']])->all();

        $userid = $this->request->getSession()->read('sessionname');
        $degreetype = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $degreetypefetch = $degreetype->degreetype;
        $getcountry = $degreetype->country;
        $getcountrystate = $degreetype->state;
        $myersbriggs = $degreetype->myersbriggs;





        $gender = $degreetype->gender;



        if ($this->request->getSession()->read('sessionname2') == 2) {

            $this->loadModel('Courselist');
            $courselist = $this->Courselist->find('all', ['conditions' => ['type' => 'UG']])->all();
            $courselistpg = $this->Courselist->find('all', ['conditions' => ['type' => 'PG']])->all();



            $this->loadModel('Sslcpuc');
            $userid = $this->request->getSession()->read('sessionname');
            $sslcpuc = $this->Sslcpuc->find('all', ['conditions' => ['Sslcpuc.userid' => $userid, 'Sslcpuc.type' => 'SSLC']])->first();
            $collegename = $sslcpuc->collegename;
            $board = $sslcpuc->board;
            $percentage = $sslcpuc->percentage;
            $regnon = $sslcpuc->regno;
            $joining = $sslcpuc->joining;
            $passout = $sslcpuc->passout;


            $sslcpucpuc = $this->Sslcpuc->find('all', ['conditions' => ['Sslcpuc.userid' => $userid, 'Sslcpuc.type' => 'PUC']])->first();
            $collegenamepuc = $sslcpucpuc->collegename;
            $boardpuc = $sslcpucpuc->board;
            $percentagepuc = $sslcpucpuc->percentage;
            $regnonpuc = $sslcpucpuc->regno;
            $joiningpuc = $sslcpucpuc->joining;
            $passoutpuc = $sslcpucpuc->passout;



            $this->loadModel('Ugpg');
            $userid = $this->request->getSession()->read('sessionname');
            $uppg = $this->Ugpg->find('all', ['conditions' => ['Ugpg.userid' => $userid, 'Ugpg.type' => 'UG']])->first();
            $universityname = $uppg->universityname;
            $stream = $uppg->stream;
            $specialization = $uppg->specialization;
            $courseduration = $uppg->courseduration;
            $regnoug = $uppg->regno;
            $yearjoining = $uppg->yearjoining;
            $yearpassout = $uppg->yearpassout;
            $sem1 = $uppg->sem1;
            $sem2 = $uppg->sem2;
            $sem3 = $uppg->sem3;
            $sem4 = $uppg->sem4;
            $sem5 = $uppg->sem5;
            $sem6 = $uppg->sem6;
            $sem7 = $uppg->sem7;
            $sem8 = $uppg->sem8;



            $uppgug = $this->Ugpg->find('all', ['conditions' => ['Ugpg.userid' => $userid, 'Ugpg.type' => 'PG']])->first();
            $universitynameug = $uppgug->universityname;
            $streamug = $uppgug->stream;
            $specializationug = $uppgug->specialization;
            $coursedurationug = $uppgug->courseduration;
            $regnougug = $uppgug->regno;
            $yearjoiningug = $uppgug->yearjoining;
            $yearpassoutug = $uppgug->yearpassout;
            $sem1ug = $uppgug->sem1;
            $sem2ug = $uppgug->sem2;
            $sem3ug = $uppgug->sem3;
            $sem4ug = $uppgug->sem4;
            $sem5ug = $uppgug->sem5;
            $sem6ug = $uppgug->sem6;
            $sem7ug = $uppgug->sem7;
            $sem8ug = $uppgug->sem8;




            $this->loadModel('Preferencesquestion');
            $userid = $this->request->getSession()->read('sessionname');
            $Preferencesquestion = $this->Preferencesquestion->find('all', ['conditions' => ['Preferencesquestion.userid' => $userid]])->first();
            $question1 = $Preferencesquestion->question1;
            $question2 = $Preferencesquestion->question2;
            $question3 = $Preferencesquestion->question3;
            $question4 = $Preferencesquestion->question4;
            $question5 = $Preferencesquestion->question5;
            $question6 = $Preferencesquestion->question6;
            $question7 = $Preferencesquestion->question7;
            $question8 = $Preferencesquestion->question8;
            $question9 = $Preferencesquestion->question9;
            $question10 = $Preferencesquestion->question10;
            $question11 = $Preferencesquestion->question11;
            $question12 = $Preferencesquestion->question12;
            $question13 = $Preferencesquestion->question13;



            $curdate = date("Y-m-d");

            $noticationscount = TableRegistry::get('notications')->find('all')
                    ->where(['notications.notificationdate' => $curdate])
                    ->count();




            $conn = ConnectionManager::get('default');
            $querytcomps = 'SELECT * from paymentdetails WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' order by id desc';
            $stmt1 = $conn->execute($querytcomps);


            $getpaymentdetails = $stmt1->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($getpaymentdetails as $det) {

                /* echo $det['datetime'];
                  echo $det['id'];

                  echo ; */
                date_default_timezone_set('Asia/Kolkata');
                $curdate = date("Y-m-d H:i:s");

                if ($det['type'] == 'modules') {
                    $mydate = date('Y-m-d H:i:s', strtotime("+12 months", strtotime(date('Y-m-d H:i:s', strtotime($det['datetime'])))));
                } else if ($det['type'] == 'addon') {
                    $mydate = date('Y-m-d H:i:s', strtotime("+3 months", strtotime(date('Y-m-d H:i:s', strtotime($det['datetime'])))));
                }

                if ($curdate > $mydate) {
              
                    $this->loadModel('Paymentdetails');
                    $this->Paymentdetails->updateAll(['datetime' => 'Expired'], ['id' => $det['id']]);

                    $optionalblockTable = TableRegistry::get('modulecomps');
                    $query = $optionalblockTable->query();
                    $query->delete()
                            ->where(['target_id' => $det['id']])
                            ->execute();
                    $optionalblockTable = TableRegistry::get('events');
                    $query = $optionalblockTable->query();
                    $query->delete()
                            ->where(['targetidevent' => $det['id']])
                            ->execute();
                }
            }



           



            $stcategory = array("OBC" => "OBC", "Gen" => "Gen", "SC" => "SC", "ST" => "ST", "PwD" => "PwD", "Women" => "Women", "Ex-Servicemen" => "Ex-Servicemen");

            $this->loadModel('Events');
            $getlesurl = $this->Events->find('all', ['conditions' => ['Events.userid' => $userid, 'completionflag' => 0]])->first();

            $finalgeturl = $getlesurl->url;

            $finalgeturltype = $getlesurl->type;

            $finalgeturltitle = $getlesurl->title;




            $eventsdatarci = 'SELECT * from events where userid="' . $userid . '" and  completionflag = 0 and  type="L" limit 1,3';

            $eventsdatarci1 = $conn->execute($eventsdatarci);


            $eventsdatarci12 = $eventsdatarci1->fetchAll(\PDO::FETCH_ASSOC);




            $userid = $this->request->getSession()->read('sessionname');


            $programenrolled = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
            $programenrolled1 = $programenrolled->programenrolled;


            $coursetype = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
            $coursetypefetch = $coursetype->coursetype;

            $degreetype = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
            $degreetypefetch = $degreetype->degreetype;
            $getcountry = $degreetype->country;
            $getcountrystate = $degreetype->state;
            $myersbriggs = $degreetype->myersbriggs;

            $modulesenable = $degreetype->modulesenable;



            $gender = $degreetype->gender;

            $problemsolving = $degreetype->problemsolving;
            $teamwork = $degreetype->teamwork;
            $leadership = $degreetype->leadership;
            $socialskils = $degreetype->socialskils;
            $initative = $degreetype->initative;
            $communicationspoken = $degreetype->communicationspoken;
            $communicationwritten = $degreetype->communicationwritten;
            $communicationoratory = $degreetype->communicationoratory;
            $travelandexploration = $degreetype->travelandexploration;
            $technologyaffiliation = $degreetype->technologyaffiliation;
            $managementskills = $degreetype->managementskills;
            $foriegnlanguages = $degreetype->foriegnlanguages;



            $regno = $degreetype->regnumber . ' / ' . $degreetype->collegeregnumber;
            $adminisonyear = $degreetype->admissiondate;
            $graduationyear = $degreetype->admissiondate;





            $search = array('EEP', 'DEP', 'ICC');
            $replace = array('Employability Enhancement Program', 'Distance Education Program', 'Add-On courses');
            $subject = $programenrolled1;
            $pgent = str_replace($search, $replace, $subject);







            $useflag = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
            $uflg = $useflag->calendarflagdate;
            $gettdate = date('d-m-Y', strtotime($uflg));


           


            $compereanameslist = new TargetController();
            $tragetids = $compereanameslist->gettopicidforthecomprea();
            $gettopicids = $compereanameslist->gettopicidformcompsthecomprea($tragetids);


            $disaplyallmodulecourses = $this->disaplyallmodulecourses();

            if ($this->findDayDiff($gettdate) != 'Today') {

              
                $this->Users->updateAll(['calendarflag' => 1], ['id' => $userid]);
                $this->Users->updateAll(['calendarflagdate' => date('d-m-Y')], ['id' => $userid]);


                $firstloginlogout = 1;


                if ($getcatn == 'Semester wise') {
             

                    $synctocalsem = 1;
                } else {

                   
                    $synctocalsem = 0;
                }
            } else {
                $firstloginlogout = 0;
                $synctocalsem = 2;
            }


            $this->loadModel('TicketDepartments');
            $ticketDepts = $this->TicketDepartments->find('all', ['conditions' => ['status' => 1]])->all();
            $getcoutrsename = $this->getgraduationnamefinaldata($user->inscoursename);

            $coursenameforfileter = $user->inscoursename;

            $this->loadModel('Target');

           

            $semename = $this->Target->find('all', ['conditions' => ['Target.users_id' => $userid]])->first();
            $getsemanme = $semename->name;


            $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $stmt1notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);
        }

        if ($this->request->getSession()->read('sessionname2') == 4) {

          

            $stcategorycoueses = $this->getgraduationname(1);

            $myArray = explode(',', $loggesingroupid);


            $result = "'" . implode("', '", $myArray) . "'";


            $conn = ConnectionManager::get('default');

            $querytcomps = 'SELECT id FROM users where  userroles_id != 3 and userroles_id != 4 and status=1 and groupid in (' . $result . ') and  groupid != 0 ORDER BY id DESC';




            $stmt1 = $conn->execute($querytcomps);


            $usercountget = count($stmt1);
            //exit;
            // $stcategory = array("OBC" => "OBC", "Gen" => "Gen", "SC" => "SC", "ST" => "ST");
            $stcategory = array("OBC" => "OBC", "Gen" => "Gen", "SC" => "SC", "ST" => "ST", "PwD" => "PwD", "Women" => "Women", "Ex-Servicemen" => "Ex-Servicemen");
            /* $stschedule = array("General" => "General", "Semester wise" => "Semester wise");
              $stdurartion = array("2 Sem" => "2 Sem", "4 Sem" => "4 Sem", "6 Sem" => "6 Sem", "8 Sem" => "8 Sem"); */

            $stschedule = array("General" => "General", "Semester wise" => "Semester wise", "Module wise" => "Module wise", "Add-on Course" => "Add-on Course");
            $stdurartion = array("2 Sem" => "2 Sem", "4 Sem" => "4 Sem", "6 Sem" => "6 Sem", "8 Sem" => "8 Sem");

            //  $stproenrolled = array("EEP" => "EEP", "DEP" => "DEP", "ICC" => "ICC");
			
			  $getgroup = $this->Users->find('all', ['conditions' => ['Users.id' => $this->request->getSession()->read('sessionname')]])->first();
  $listiofgroups = $getgroup->groupid;
  $studentgroupss = 'SELECT * from studentgroup where id in ('.$listiofgroups.')';
  $studentgroups1 = $conn->execute($studentgroupss);
  $studentgroups = $studentgroups1->fetchAll(\PDO::FETCH_ASSOC);

            $stproenrolled = array("EEP" => "Employability Enhancement Program", "DEP" => "Distance Education Program", "ICC" => "Add-On courses");

            $this->set(compact('loggesingroupid', 'usercountget', 'stcategory', 'stschedule', 'stdurartion', 'stproenrolled'));
        }

        if ($this->request->getSession()->read('sessionname2') == 3) {
            $usergrou = $this->Users->newEntity();

            $userlists = $this->Users->find('all', array('fields' => array('id', 'email', 'fname', 'lname'), 'order' => 'Users.fname asc'))->where(['Users.status' => 1, 'Users.userroles_id' => 2]);

            $userlistsfinal = $this->Users->find('all', array('fields' => array('id', 'email', 'fname', 'lname'), 'order' => 'Users.fname asc'))->where(['Users.status' => 1, 'Users.userroles_id' => 2, 'Users.groupid' => 0]);

            $userlistsina = $this->Users->find('all', array('fields' => array('id', 'email', 'fname', 'lname'), 'order' => 'Users.fname asc'))->where(['Users.status' => 0, 'Users.userroles_id =' => 2]);

            $this->loadModel('Studentgroup');
            // $this->loadModel('Groupadmin');
            $grouplists = $this->Studentgroup->find('all', array('fields' => array('id', 'name'), 'order' => 'Studentgroup.name asc'));

            $grouplistsadmin = $this->Users->find('all', array('fields' => array('id', 'fname', 'email'), 'order' => 'Users.fname asc'))->where(['Users.userroles_id' => 4]);


            $stcategory = array("OBC" => "OBC", "Gen" => "Gen", "SC" => "SC", "ST" => "ST", "PwD" => "PwD", "Women" => "Women", "Ex-Servicemen" => "Ex-Servicemen");




            $stcategorycoueses = $this->getgraduationname(1);

            $degreetype = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
            $event1 = $degreetype->event1;
            $event2 = $degreetype->event2;
            $event3 = $degreetype->event3;
            $event4 = $degreetype->event4;
            $event5 = $degreetype->event5;




            $stschedule = array("General" => "General", "Semester wise" => "Semester wise", "Module wise" => "Module wise", "Add-on Course" => "Add-on Course");
            $stdurartion = array("2 Sem" => "2 Sem", "4 Sem" => "4 Sem", "6 Sem" => "6 Sem", "8 Sem" => "8 Sem");

            $stproenrolled = array("EEP" => "Employability Enhancement Program", "DEP" => "Distance Education Program", "ICC" => "Add-On courses");

            $usercountget = $userlists->count();

            $usercountgetin = $userlistsina->count();
			
		    $this->loadModel('Studentgroup');
            $studentgroups = $this->Studentgroup->find('all');

            $this->set(compact('usercountgetin', 'usercountget', 'grouplistsadmin', 'grouplists', 'userlists', 'usergrou', 'stcategory', 'stschedule', 'stdurartion', 'stproenrolled'));
        }

      


        $this->set(compact('studentgroups','modulesenable', 'myersbriggs', 'event1', 'event2', 'event3', 'event4', 'event5', 'disaplyallmodulecourses', 'getcountrystate', 'getcountry', 'countirelist', 'finalgeturltype', 'finalgeturltitle', 'eventsdatarci12', 'courselistpg', 'universitynameug', 'streamug', 'specializationug', 'coursedurationug', 'regnougug', 'yearjoiningug', 'yearpassoutug', 'sem1ug', 'sem2ug', 'sem3ug', 'sem4ug', 'sem5ug', 'sem6ug', 'sem7ug', 'sem8ug', 'universityname', 'stream', 'specialization', 'courseduration', 'regnoug', 'yearjoining', 'yearpassout', 'sem1', 'sem2', 'sem3', 'sem4', 'sem5', 'sem6', 'sem7', 'sem8', 'courselist', 'collegenamepuc', 'boardpuc', 'percentagepuc', 'regnonpuc', 'joiningpuc', 'passoutpuc', 'collegename', 'board', 'percentage', 'regnon', 'joining', 'passout', 'problemsolving', 'teamwork', 'leadership', 'socialskils', 'initative', 'communicationspoken', 'communicationwritten', 'communicationoratory', 'travelandexploration', 'technologyaffiliation', 'managementskills', 'foriegnlanguages', 'gender', 'stmt1notications', 'noticationscount', 'comlistforstudentprofiule', 'areaofinterest', 'projectexecuted', 'internshipdetails', 'hobbiesandextra', 'electives', 'coursesattended', 'personaldetails', 'getpaymentdetails', 'regno', 'adminisonyear', 'graduationyear', 'degreetypefetch', 'coursetypefetch', 'stcategory', 'countrylist', 'finalgeturl', 'pgent', 'tragetids', 'gettopicids', 'synctocalsem', 'comlistforstudent', 'firstloginlogout', 'userlistsfinal', 'getsemanme', 'courseduration', 'coursenameforfileter', 'getcoutrsename', 'stcategorycoueses', 'useridmoodle', 'getcatn', 'ticketuserid', 'tickettokenkey', 'mytargetdep', 'mytargeticc', 'targetexamsdep', 'targetexamsicc', 'loggedintime'));
        $this->set(compact('user', 'ticketDepts', 'usersrole', 'options', 'userid', 'photoname', 'getecodes', 'indianStates', 'loadtragerscore'));
        $this->set(compact('scorecarddetails', 'topicscount', 'getalltopics', 'targetexamscount', 'industrycount'));
        $this->set(compact('examcount', 'companycount', 'topiccodesconsolidated', 'targetexams', 'topiccodes'));
        $this->set(compact('targetexamslist', 'examschedulecalendar', 'searchtopic', 'searchlesson', 'users'));
        $this->set(compact('institution', 'usersrole', 'blocks', 'block', 'mytarget', 'mytargetcompetency'));
        $this->set(compact('learingplan', 'scorecard', 'mytopicfortoday', 'pendingtopic', 'goalprogres', 'mymentor', 'firstlogin', 'topiccodes1', 'targetexamslimit'));
        $this->set(compact('question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8', 'question9', 'question10', 'question11', 'question12', 'question13'));
    }

    public function findDayDiff($date) {
        $param_date = date('d-m-Y', strtotime($date));
        $response = $param_date;
        if ($param_date == date('d-m-Y', strtotime("now"))) {
            $response = 'Today';
        } else if ($param_date == date('d-m-Y', strtotime("-1 days"))) {
            $response = 'Yesterday';
        }
        return $response;
    }

    public function changepass() { //profile change password

        if ($this->request->is(array('ajax'))) {



            $userid = $this->request->getSession()->read('sessionname');
            $password_check = $this->request->data ['password_check'];
            $Password_new = $this->request->data ['password_new'];
            $password_newconfirm = $this->request->data ['password_newconfirm'];

            $query = $this->Users->find()->where(['id' => $userid]);
            $user = $query->first();

            if ($user) {




                $verify = (new DefaultPasswordHasher)
                        ->check($this->request->data['password_check'], $user->password);


                $verifyfinal = (new DefaultPasswordHasher)
                        ->check($this->request->data ['password_newconfirm'], $user->password);


                if ($verify == 1) {


                    if (strlen($Password_new) < '8') {

                        echo 'Your Password Must Contain At Least 8 Characters!';
                    } else if (strlen($Password_new) > '14') {

                        echo 'Your Password length should be only less than 14 Characters!';
                    } else if (!preg_match("#[0-9]+#", $Password_new)) {

                        echo 'Your Password Must Contain At Least 1 Number!';
                    } else if (!preg_match("#[A-Z]+#", $Password_new)) {

                        echo 'Your Password Must Contain At Least 1 Capital Letter!';
                    } else if (!preg_match("#[a-z]+#", $Password_new)) {

                        echo 'Your Password Must Contain At Least 1 Lowercase Letter!';
                    } else if ($Password_new != $password_newconfirm) {
                        echo 'Password doesn`t match';
                    } else if ($verifyfinal == 1) {
                        echo 'New password can`t be same as old.';
                    } else {







                        $user->password = $this->request->data ['password_newconfirm'];
                        if ($this->Users->save($user)) {
                            echo '1';
                            $this->request->getSession()->destroy();
                        }
                    }
                } else {
                    echo 'Password update failed. Current password is incorrect.';
                }
            }
        }
        exit;
    }

    public function getgroupname($groupid) { //return group name
        $this->loadModel('Studentgroup');
        $photoname1 = $this->Studentgroup->find('all', ['conditions' => ['Studentgroup.id' => $groupid]])->first();
        return $photoname = $photoname1->name;
    }

    public function saveaboutme() { // save about student details
        if ($this->request->is(array('ajax'))) {
            //  $areaofinterest = $this->Users->newEntity();
            $areaofinterest = $this->Users->get($this->request->getSession()->read('sessionname'), [
                'contain' => []
            ]);


            $areaofinterest->aboutme = $this->request->data['aboutme'];

            $areaofinterest = $this->Users->patchEntity($areaofinterest, $this->request->getData());
            if ($this->Users->save($areaofinterest)) {

                echo 'Changes has been saved';
            } else {

                echo "Error saving the data.";
            }
        }
        EXIT;
    }

    public function saveuserdatails() {  // function to save profile information
        if ($this->request->is(array('ajax'))) {
            //  $areaofinterest = $this->Users->newEntity();
            $areaofinterest = $this->Users->get($this->request->getSession()->read('sessionname'), [
                'contain' => []
            ]);


            $areaofinterest->fname = $this->request->data['fname'];
            $areaofinterest->lname = $this->request->data['lname'];
            $areaofinterest->phonenumber = $this->request->data['phonenumber'];
            $areaofinterest->phonenumalter = $this->request->data['phonenumalter'];
            $areaofinterest->country = $this->request->data['country'];
            $areaofinterest->state = $this->request->data['state'];
            $areaofinterest->gender = $this->request->data['gender'];
            $areaofinterest->email = $this->request->data['email'];
            $areaofinterest->emailalternate = $this->request->data['emailalternate'];
            $areaofinterest->nationality = $this->request->data['nationality'];
            $areaofinterest->dateofbirth = $this->request->data['dateofbirth'];
            $areaofinterest->category = $this->request->data['category'];
            $areaofinterest->pincode = $this->request->data['pincode'];
            $areaofinterest->address = $this->request->data['address'];
            $areaofinterest->address2 = $this->request->data['address2'];
            $areaofinterest->userroles_id = $this->request->data['userroles_id'];
            $areaofinterest->city = $this->request->data['city'];



            $areaofinterest = $this->Users->patchEntity($areaofinterest, $this->request->getData());
            if ($this->Users->save($areaofinterest)) {

                echo 'Changes has been saved';
            } else {

                echo "Error saving the data.";
            }
        }
        EXIT;
    }

    public function getquizattaemps() {

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



            $prod_cat = $_POST['cat_val'];

            $uid = $_POST['userid'];

            /* $prod_cat = 762;

              $uid = 10; */

            $gradefromaccordin = $_POST['score'];

            $http = new Client();




            $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
                //'wstoken' => '948c273439239fc69a6ed2d81f660428',
                'wstoken' => '31d5ea42bb33e56a14d751848742de22',
                'moodlewsrestformat' => 'json',
                'quizid' => $prod_cat,
                'userid' => $uid,
                /* 'quizid' => 8,
                  'userid' => 25, */
                // 'preflightdata' => array('name' => 'praveen' , 'value' => 'Praveen12*'),
                'wsfunction' => 'mod_quiz_get_user_attempts'
            ]);

            $json1 = $response->getJson();


            //var_dump( $json1['attempts']);



            $posts_arr1 = array();

            $i = 0;

            foreach ($json1['attempts'] as $qdata) {


                $time1 = strtotime(date("Y-m-d h:i:s a", $qdata['timestart']));
                $time2 = strtotime(date("Y-m-d h:i:s a", $qdata['timefinish']));

                $timeinterval = $time2 - $time1;

                $timediffformarks = $timeinterval / $qdata['sumgrades']; //11/291


                $post_item1 = array(
                    'attempt' => html_entity_decode($qdata['attempt']),
                    'timestart' => html_entity_decode(date("Y-m-d h:i:s a", $qdata['timestart'])),
                    'timefinish' => html_entity_decode(date("Y-m-d h:i:s a", $qdata['timefinish'])),
                    'sumgrades' => html_entity_decode($qdata['sumgrades']),
                    'timeinterval' => html_entity_decode($timeinterval)
                );

                //  echo date('h:i:s a m/d/Y', strtotime($date));
                array_push($posts_arr1, $post_item1);
                $i++;

                $timediffformarksfinal += $timediffformarks;
                $markswithtime .= $timediffformarks . ',';
            }

            $average = $timediffformarksfinal / $i; //average calculation

            $myArray = explode(',', rtrim($markswithtime, ','));

            $min = min($myArray);
            $max = max($myArray);


            $standarddeviation = ($max - $min) / $average;

            $standarddeviationf = number_format((float) $standarddeviation, 2, '.', '');  //standarddeviation

            /*             * ******************************* */

            if ($average < 1000)
                $averagefinal = $average;
            else
                $averagefinal = 1000;

            if ($standarddeviationf < 10)
                $standarddeviationfinal = $standarddeviationf;
            else
                $standarddeviationfinal = 10;
            /*             * ******************************* */



            $getscoreforattemps = ( $gradefromaccordin + ((1000 - $averagefinal) / 10) + (((10 - $standarddeviationfinal) * 10 ) / 100) ) / 3;
            $atscore = number_format((float) $getscoreforattemps, 2, '.', '');

            echo $blocksarray1 = json_encode($posts_arr1);
        }
    }

    public function updatestutsoflesson() { //skip function

        $this->autoRender = false;

        $cat_val = $_POST['cat_val'];
        $sta = $_POST['sta'];

        if ($sta == 0) {
            $status = 1;
            $feed = 'Skipped';
        } else if ($sta == 1) {

            $status = 0;
            $feed = 'Skip it';
        }

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            $this->loadModel('Modulecomps');

            $this->Modulecomps->updateAll(['Skip' => $status], ['id' => $cat_val]);
            echo $feed;
        }
    }

    public function problemsolving() { //problem solving section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {


            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4']) / 4);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['problemsolving' => $update])
                    ->where(['id' => $userid])
                    ->execute();

            /* echo $update.'<br />';
              echo $userid;
              exit; */

            echo number_format((float) $update * 100, 2, '.', '');

            // echo 'Changes has been saved.';
            exit;
        }
    }

    public function myersbriggs() { //myer briggs logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {




            $aa = array_count_values(array($_POST['question1'], $_POST['question5'], $_POST['question9'], $_POST['question13'], $_POST['question17']));
            if ($aa['11'] > $aa['22']) {
                $sec = 'e';
            } else {
                $sec = 'i';
            }


            $aa = array_count_values(array($_POST['question2'], $_POST['question6'], $_POST['question10'], $_POST['question14'], $_POST['question18']));
            if ($aa['11'] > $aa['22']) {
                $sec1 = 's';
            } else {
                $sec1 = 'n';
            }


            $aa = array_count_values(array($_POST['question3'], $_POST['question7'], $_POST['question11'], $_POST['question15'], $_POST['question19']));
            if ($aa['11'] > $aa['22']) {
                $sec2 = 't';
            } else {
                $sec2 = 'f';
            }


            $aa = array_count_values(array($_POST['question4'], $_POST['question8'], $_POST['question12'], $_POST['question16'], $_POST['question20']));
            if ($aa['11'] > $aa['22']) {
                $sec3 = 'j';
            } else {
                $sec3 = 'p';
            }




            $userid = $this->request->getSession()->read('sessionname');

            $update = $sec . $sec1 . $sec2 . $sec3;
            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['myersbriggs' => $update])
                    ->where(['id' => $userid])
                    ->execute();
            echo $sec . $sec1 . $sec2 . $sec3;
            exit;
        }
    }

    public function teamwork() { //teamwork section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {


            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4'] + $_POST['question5'] ) / 5);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['teamwork' => $update])
                    ->where(['id' => $userid])
                    ->execute();


            echo number_format((float) $update * 100, 2, '.', '');
            exit;
        }
    }

    public function leadership() { //leadership section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {


            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4'] + $_POST['question5']) / 5);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['leadership' => $update])
                    ->where(['id' => $userid])
                    ->execute();


            echo number_format((float) $update * 100, 2, '.', '');
            exit;
        }
    }

    public function socialskils() { //socialskils section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {


            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4'] + $_POST['question5'] + $_POST['question6'] + $_POST['question7'] + $_POST['question8'] + $_POST['question9'] + $_POST['question10'] + $_POST['question11'] + $_POST['question12']) / 12);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['socialskils' => $update])
                    ->where(['id' => $userid])
                    ->execute();


            echo number_format((float) $update * 100, 2, '.', '');
            exit;
        }
    }

    public function initative() { //initative section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {


            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4'] + $_POST['question5']) / 5);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['initative' => $update])
                    ->where(['id' => $userid])
                    ->execute();


            echo number_format((float) $update * 100, 2, '.', '');
            exit;
        }
    }
	
		public function checksession(){
		
$this->autoRender = false;
   if ($this->request->is(array('ajax'))) {
	   
	   if (empty($this->request->getSession()->read('sessionname')))
	   {
		   echo 0;
	   }
	   else 
	   {
		   echo 1;
	   }
	   exit;
   }
		}

    public function communicationspoken() { //communication spoken section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {


            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4'] + $_POST['question5'] + $_POST['question6'] + $_POST['question7'] + $_POST['question8'] + $_POST['question9'] + $_POST['question10']) / 10);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['communicationspoken' => $update])
                    ->where(['id' => $userid])
                    ->execute();


            echo number_format((float) $update * 100, 2, '.', '');
            exit;
        }
    }

    public function communicationwritten() {  //communication written section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {

            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4'] + $_POST['question5'] + $_POST['question6'] ) / 6);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['communicationwritten' => $update])
                    ->where(['id' => $userid])
                    ->execute();


            echo number_format((float) $update * 100, 2, '.', '');
            exit;
        }
    }

    public function communicationoratory() { //communication oratory section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {


            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4'] + $_POST['question5'] + $_POST['question6'] ) / 6);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['communicationoratory' => $update])
                    ->where(['id' => $userid])
                    ->execute();


            echo number_format((float) $update * 100, 2, '.', '');
            exit;
        }
    }

    public function travelandexploration() {  //communication oratory section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {


            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4'] + $_POST['question5'] + $_POST['question6'] ) / 6);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['travelandexploration' => $update])
                    ->where(['id' => $userid])
                    ->execute();


            echo number_format((float) $update * 100, 2, '.', '');
            exit;
        }
    }

    public function technologyaffiliation() { //technology affiliation section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {


            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4'] + $_POST['question5']) / 5);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['technologyaffiliation' => $update])
                    ->where(['id' => $userid])
                    ->execute();


            echo number_format((float) $update * 100, 2, '.', '');
            exit;
        }
    }

    public function managementskills() { //management skills section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {


            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4'] + $_POST['question5']) / 5);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['managementskills' => $update])
                    ->where(['id' => $userid])
                    ->execute();


            echo number_format((float) $update * 100, 2, '.', '');
            exit;
        }
    }

    public function foriegnlanguages() { //foriegn languages section logic

        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {


            $update = (($_POST['question1'] + $_POST['question2'] + $_POST['question3'] + $_POST['question4'] + $_POST['question5'] + $_POST['question6'] ) / 6);

            $userid = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['foriegnlanguages' => $update])
                    ->where(['id' => $userid])
                    ->execute();

            echo number_format((float) $update * 100, 2, '.', '');
            exit;
        }
    }

    public function updatetargetesscore() {

        $this->autoRender = false;

        $cat_val = $_POST['cat_val'];
        $grade = $_POST['grade'];
        $progress = $_POST['progress'];

   

        $this->loadModel('Target');

        $optionalblockTable = TableRegistry::get('target');
        $query = $optionalblockTable->query();
        $query->update()
                ->set(['grade' => $grade, 'progress' => $progress])
                ->where(['id' => $cat_val])
                ->execute();

    
    }

    public function updatestuts() { //function to update stundent status

        $this->autoRender = false;

        $cat_val = $_POST['cat_val'];
        $sta = $_POST['sta'];

        if ($sta == 0) {
            $status = 1;
            $feed = 'Active';
        } else if ($sta == 1) {

            $status = 0;
            $feed = 'Disabled';
        }

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            if ($this->Users->updateAll(['status' => $status], ['id' => $cat_val])) {
                echo $feed;
            } else {
                echo 'Error';
            }
        }
    }

    public function getstudentdetsils() { //function to get student details from user table for the group admin section

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



            $prod_cat = $_POST['cat_val'];
            //$prod_cat ='praveen';

            /*             * ********************************* */

            $conn = ConnectionManager::get('default');

            $querytcomps = 'SELECT * FROM users where id = "' . $prod_cat . '" ';




            $stmt1 = $conn->execute($querytcomps);

            $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);


                $post_item1 = array(
                    /*  'esid' => html_entity_decode($esid),
                      'ename' => html_entity_decode($ename), */
                    'regnumber' => html_entity_decode($regnumber),
                    'inscoursename' => html_entity_decode($inscoursename),
                    'category' => html_entity_decode($category),
                    'admissiondate' => html_entity_decode($admissiondate),
                    'scheduleoption' => html_entity_decode($scheduleoption),
                    'courseduration' => html_entity_decode($courseduration),
                    'programenrolled' => html_entity_decode($programenrolled),
                    'dateofbirth' => html_entity_decode($dateofbirth),
                    'collegeregnumber' => html_entity_decode($collegeregnumber)
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }

            //  $json_data = array("data"            => $posts_arr1 );
            // Turn to JSON & output
            echo json_encode($posts_arr1);
            /*             * **************************************** */
        }
    }

    public function getstudentdetsilsprofile() { //function to get student details from user table for the profile section

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



            $prod_cat = $_POST['cat_val'];
            //$prod_cat ='praveen';

            /*             * ********************************* */

            $conn = ConnectionManager::get('default');

            $querytcomps = 'SELECT * FROM users where id = "' . $prod_cat . '" ';




            $stmt1 = $conn->execute($querytcomps);

            $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);


                $post_item1 = array(
                    /*  'esid' => html_entity_decode($esid), */
                    'userroles_id' => html_entity_decode($userroles_id),
                    'fname' => html_entity_decode($fname),
                    'lname' => html_entity_decode($lname),
                    'email' => html_entity_decode($email),
                    'username' => html_entity_decode($username),
                    'password' => html_entity_decode($password),
                    'gender' => html_entity_decode($gender),
                    'address' => html_entity_decode($address),
                    'address2' => html_entity_decode($address2),
                    'city' => html_entity_decode($city),
                    'pincode' => html_entity_decode($pincode),
                    'state' => html_entity_decode($state),
                    'phonenumber' => html_entity_decode($phonenumber)
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }

            //  $json_data = array("data"            => $posts_arr1 );
            // Turn to JSON & output
            echo json_encode($posts_arr1);
            /*             * **************************************** */
        }
    }

    public function studentslistadmin() { //function to get student details from user table for the institute admin section

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



            $prod_cat = $_POST['cat_val'];
            //$prod_cat ='praveen';

            $getgroups = $_POST['getgroups'];

            //$getgroups = '1,2';




            $myArray = explode(',', $getgroups);


            $result = "'" . implode("', '", $myArray) . "'";


            $conn = ConnectionManager::get('default');



            /*             * ********************************* */



            $querytcomps = 'SELECT * FROM users where (fname LIKE "%' . $prod_cat . '%" or lname LIKE "%' . $prod_cat . '%" or username LIKE "%' . $prod_cat . '%") and userroles_id != 3 and userroles_id != 4 and status=1 and groupid in (' . $result . ') and groupid != 0 ORDER BY id DESC';

//echo $querytcomps;
//exit;


            $stmt1 = $conn->execute($querytcomps);

            $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);


                if ($status == 0) {
                    $stat = "Disabled";
                } else {
                    $stat = "Active";
                }

                $groupid = $this->getgroupname($groupid);

                $post_item1 = array(
                    /*  'esid' => html_entity_decode($esid),
                      'ename' => html_entity_decode($ename), */
                    'regnumber' => html_entity_decode($regnumber),
                    'id' => html_entity_decode($id),
                    'fname' => html_entity_decode($fname),
                    'lname' => html_entity_decode($lname),
                    'email' => html_entity_decode($email),
                    'username' => html_entity_decode($username),
                    'gender' => html_entity_decode($gender),
                    'created' => html_entity_decode($created),
                    'groupid' => html_entity_decode($groupid),
                    //'link' => html_entity_decode("<a style='cursor:pointer'  onclick='makestudentactive($id,$status)'>$stat  </a>"),
                    'editlink' => html_entity_decode("<a style='cursor:pointer'  onclick='editausergroupadmin($id)'><i class='fa fa-eye fa-fw'></i>  </a>"),
                    /*'totall' => html_entity_decode($this->getscoreforbaselinegetscore($moodleuid)[0]),
                    'averagescore' => html_entity_decode(number_format((float) $this->getscoreforbaselinegetscore($moodleuid)[1], 2, '.', '')),*/
					'activitylog' => html_entity_decode("<a style='cursor:pointer'  onclick='displayactivitylog($id)'>View  </a>"),
                    'reportview' => html_entity_decode('<a style="cursor:pointer"  onclick=\'loadestudentsscore("' . html_entity_decode($fname) . '","' . html_entity_decode($lname) . '","' . html_entity_decode($email) . '","' . html_entity_decode($id) . '")\' >View  </a>')
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }

            $json_data = array("data" => $posts_arr1);

            // Turn to JSON & output
            echo json_encode($json_data);
            /*             * **************************************** */
        }
    }

    public function targetlists() { //function for the target list

        $this->autoRender = false;


        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



            //	$prod_cat = $_POST['cat_val'];
            //$prod_cat ='praveen';

            /*             * ********************************* */

            $conn = ConnectionManager::get('default');

            $querytcomps = 'SELECT examcode,name FROM target where users_id = ' . $this->request->getSession()->read('sessionname') . ' and targettype ="EEP"';




            $stmt1 = $conn->execute($querytcomps);

            $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);


                $companyname = $this->getcompanybnamesforstudent($examcode);







                $post_item1 = array(
                    /*  'esid' => html_entity_decode($esid),
                      'ename' => html_entity_decode($ename), */
                    'name' => html_entity_decode($name),
                    'companyname' => html_entity_decode($companyname)
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }

            $json_data = array("data" => $posts_arr1);

            // Turn to JSON & output
            echo json_encode($json_data);
            exit;
            /*             * **************************************** */
        }
    }

    public function getcompanybnamesforstudent($examcode) { //return company code

        $this->autoRender = false;
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
        $result1 = file_get_contents($this->mainurl . 'ims/topicgetcode.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['companycode'];


    }

    public function getscoreforbaselinegetscore($useridmoodle) { //functions to calculate total and pending hours




        $row = array('useridmoodle' => $useridmoodle);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cms/totalaveragescore.php', false, $context1);

        $topiccodes = json_decode($result1, true);

        return array($topiccodes[0]['total'], $topiccodes[0]['sumf']);
    }

    public function studentslist() { //student info for admin

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



            $prod_cat = $_POST['cat_val'];
            //$prod_cat ='praveen';

            /*             * ********************************* */

            $conn = ConnectionManager::get('default');

            $querytcomps = 'SELECT * FROM users where (fname LIKE "%' . $prod_cat . '%" or lname LIKE "%' . $prod_cat . '%" or username LIKE "%' . $prod_cat . '%") and userroles_id = 2  ORDER BY id DESC';




            $stmt1 = $conn->execute($querytcomps);

            $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);


                if ($status == 0) {
                    $stat = "Disabled";
                } else {
                    $stat = "Active";
                }

                $groupid = $this->getgroupname($groupid);

                $getallcodes = $this->getalltheproductcodes($id);

                $post_item1 = array(
                    /*  'esid' => html_entity_decode($esid),
                      'ename' => html_entity_decode($ename), */

                    'regnumber' => html_entity_decode($regnumber),
                    'id' => html_entity_decode($id),
                    'fname' => html_entity_decode($fname),
                    'lname' => html_entity_decode($lname),
                    'email' => html_entity_decode($email),
                    'username' => html_entity_decode($username),
                    'gender' => html_entity_decode($gender),
                    'created' => html_entity_decode($created),
                    'groupid' => html_entity_decode($groupid),
                    'link' => html_entity_decode("<a style='cursor:pointer'  onclick='makestudentactive($id,$status)'>$stat  </a>"),
					 'activitylog' => html_entity_decode("<a style='cursor:pointer'  onclick='displayactivitylog($id)'>View  </a>"),
                    /* 'totall' => html_entity_decode($this->getscoreforbaselinegetscore($moodleuid)[0]),
                      'averagescore' => html_entity_decode(number_format((float)$this->getscoreforbaselinegetscore($moodleuid)[1], 2, '.', '')), */
                    'report' => html_entity_decode('<a style="cursor:pointer"  onclick=\'loadestudentsscore("' . html_entity_decode($fname) . '","' . html_entity_decode($lname) . '","' . html_entity_decode($email) . '","' . html_entity_decode($id) . '")\' >View  </a>'),
                    'editlink' => html_entity_decode("<a style='cursor:pointer' onclick=editauser($id,$moodleuid,'" . $getallcodes . "') ><i class='fa fa-edit fa-fw'></i>  </a>"),
                    'icc' => html_entity_decode("<a style='cursor:pointer'  onclick=displaypaidmodules($id,$moodleuid) > View  </a>"),
                        //'dep' => html_entity_decode("<a style='cursor:pointer'  href='./Targetcomps/evalauetargetcompsfordep/$id' > Evaluate  </a>")
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }

            $json_data = array("data" => $posts_arr1);

            // Turn to JSON & output
            echo json_encode($json_data);
            /*             * **************************************** */
        }
    }

    public function studentslistmodules() {  //return payment details

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



            $prod_cat = $_POST['cat_val'];
            //$prod_cat ='praveen';

            /*             * ********************************* */

            $conn = ConnectionManager::get('default');

            $querytcomps = 'SELECT * FROM paymentdetails where  userid = ' . $prod_cat . '  ORDER BY id DESC';




            $stmt1 = $conn->execute($querytcomps);

            $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);




                $post_item1 = array(
                    /*  'esid' => html_entity_decode($esid),
                      'ename' => html_entity_decode($ename), */

                    'productcode' => html_entity_decode($productcode),
                    'productname' => html_entity_decode($productname),
                    'type' => html_entity_decode($type),
                    'datetime' => html_entity_decode($datetime),
                    'deleteaction' => html_entity_decode("<a style='cursor:pointer'  onclick='deletemodules($id)'><i class='fa fa-trash-alt fa-fw'></i>  </a>")
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }

            $json_data = array("data" => $posts_arr1);

            // Turn to JSON & output
            echo json_encode($json_data);
            /*             * **************************************** */
        }
    }

    public function getalltheproductcodes($id) { // returns product code
        $this->loadModel('Paymentdetails');
        $Targetusers = $this->Paymentdetails->find('all', array('fields' => array('productcode', 'id')))->where(['Paymentdetails.userid' => $id]);

        //	if( $Targetusers->count() > 0 ) {


        $examcode = "";
        foreach ($Targetusers as $tar) {
            $examcode .= $tar['productcode'] . ',';
        }
        /* } else {
          $examcode =0;
         */
        return rtrim($examcode, ',');
    }

    public function getalltopiccodes() { //function to fetch target competencies

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        //  if ($this->request->is(array('ajax'))) { 

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargets();

        $compereanameslist = new TargetController();

        $userid = $this->request->getSession()->read('sessionname');
        $categoryname = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $getcatn = $categoryname->scheduleoption;

        // echo count($Targetusers);
        //exit;

        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT DISTINCT  tc.level, tc.status as tctstatus,tc.skip as tcskip,t.name as tname , t.examcode as ecode
    , tc.topiccode as tcode
    , tc.lesson as lcode
    , tc.level as lecode
	, tc.score as escore
	, tc.targetname as targetname
	, tc.levelname as levelname
FROM target t
INNER JOIN targetcomps tc
    on t.id = tc.target_id
 WHERE tc.target_id IN (' . $Targetusers . ') order by tc.id asc';




        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            if ($lecode == 1)
                $flevel = 'Level 1';
            else if ($lecode == 2)
                $flevel = 'Level 2';
            else if ($lecode == 3)
                $flevel = 'Level 3';
            else if ($lecode == 4)
                $flevel = 'Level 4';
            else if ($lecode == 5)
                $flevel = 'Level 5';
            else if ($lecode == 7)
                $flevel = 'Basic';


            if ($getcatn == 'Semester wise') {


                $actionname = '<a href="#" style="cursor:pointer;" onclick="openmodalboxforlearning(' . $tcode . ',' . $lecode . ');return false;">Learning Modules</a>';

                $post_item1 = array(
                    /*  'esid' => html_entity_decode($esid), */
                    'tname' => html_entity_decode($tname),
                    'ecode' => html_entity_decode($ecode),
                    'tcode' => html_entity_decode($tcode),
                    /* 'lcode' => html_entity_decode($compereanameslist->getlesson($lcode)),
                      'lecode' => html_entity_decode($compereanameslist->getlevel($lecode)), */
                    'lcode' => html_entity_decode($targetname),
                    'lecode' => html_entity_decode($flevel),
                    'escore' => html_entity_decode($escore),
                    'tctstatus' => html_entity_decode($tctstatus),
                    'tcskip' => html_entity_decode($tcskip),
                    'actionname' => html_entity_decode($actionname)
                );
            } else {

                $actionname = '-';

                $post_item1 = array(
                    /*  'esid' => html_entity_decode($esid), */
                    'tname' => html_entity_decode($tname),
                    'ecode' => html_entity_decode($ecode),
                    'tcode' => html_entity_decode($tcode),
                    'lcode' => html_entity_decode($targetname),
                    'lecode' => html_entity_decode($flevel),
                    'escore' => html_entity_decode($escore),
                    'tctstatus' => html_entity_decode($tctstatus),
                    'tcskip' => html_entity_decode($tcskip)
                );
            }





            // Push to "data"
            array_push($posts_arr1, $post_item1);
            // array_push($posts_arr['data'], $post_item);
        }

        $json_data = array("data" => $posts_arr1);
        echo json_encode($json_data);

        //	}
    }

    public function getalltopiccodes1() { //return targetcomps data

        $conn = ConnectionManager::get('default');
        $this->autoRender = false;


        //   if ($this->request->is(array('ajax'))) { 

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $prod_cat = $_POST['cat_val'];
        //$prod_cat = '603';

        $querytcomps = 'SELECT tc.status as tctstatus,tc.skip as tcskip,t.name as tname , t.examcode as ecode
    , tc.topiccode as tcode
    , tc.lesson as lcode
    , tc.level as lecode
	, tc.score as escore
FROM target t
INNER JOIN targetcomps tc
    on t.id = tc.target_id
 WHERE tc.target_id IN (' . $prod_cat . ')';





        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);


            $post_item1 = array(
                'tname' => html_entity_decode($tname),
                'ecode' => html_entity_decode($ecode),
                'tcode' => html_entity_decode($this->gettopic($tcode)),
                'lcode' => html_entity_decode($this->getlesson($lcode)),
                'lecode' => html_entity_decode($this->getlevel($lecode)),
                'escore' => html_entity_decode($escore),
                'tctstatus' => html_entity_decode($tctstatus),
                'tcskip' => html_entity_decode($tcskip)
            );


            array_push($posts_arr1, $post_item1);
        }







        $json_data1 = array("data" => $posts_arr1);

        // Turn to JSON & output
        echo json_encode($json_data1);
    }

    public function getallexams() {

        $conn = ConnectionManager::get('default');
        $this->autoRender = false;


        //   if ($this->request->is(array('ajax'))) { 

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        //$prod_cat = $_POST['cat_val'];
        //$prod_cat = '603';

        $querytcomps = 'SELECT id FROM target where users_id = ' . $this->request->getSession()->read('sessionname') . '';





        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);


            $post_item1 = array(
                'id' => html_entity_decode($id),
            );


            array_push($posts_arr1, $post_item1);
        }







        //  $json_data1 = array("data"            => $posts_arr1 );
        // Turn to JSON & output
        echo json_encode($posts_arr1);
    }

    public function getalltheblocks() {  //return all the blocks in the dashboard
        $conn = ConnectionManager::get('default');


        $userid = $this->request->getSession()->read('sessionname');



        $stmt = $conn->execute('SELECT b.id,b.name  FROM blocks b  WHERE b.optional_mandatory_flag = :id and b.id NOT IN (SELECT o.blocks_id FROM optionalblock o where o.users_id = ' . $userid . ' ) ', ['id' => 0]);

        $posts_arr = array();

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            extract($row);


            $post_item = array(
                'id' => html_entity_decode($id),
                'name' => html_entity_decode($name)
            );

            // Push to "data"
            array_push($posts_arr, $post_item);
            // array_push($posts_arr['data'], $post_item);
        }

        $blocksarray = json_encode($posts_arr);
        $blocks = json_decode($blocksarray, true);

        return $blocks;
    }



    


    public function deleteactionformodules() { //functions to delete modules


        $this->autoRender = false;

        if ($this->request->is(array('ajax'))) {



					
					    
		  
		  $this->loadModel('Paymentdetails');
            
            $sslcpuc = $this->Paymentdetails->find('all', ['conditions' => ['Paymentdetails.id' => $_POST['cat_val']]])->first();
            $productcode = $sslcpuc->productcode;
			    $userid = $sslcpuc->userid;
		  
		  
		  		   $row = array('moduleid' =>  $productcode);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'ims/moduletargets.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		
		$examcode = "";
		foreach($topiccodes as $tcode) {
		
		

            $selectedOption = $tcode['targetcode'];
			
					          $this->loadModel('Target');
							     $this->loadModel('targetcomps');
        $Targetusers = $this->Target->find('all', array('fields' => array('examcode', 'id')))->where(['Target.users_id' => $userid, 'Target.examcode' => $selectedOption]);

        //$examcode ="";
        foreach ($Targetusers as $tar) {
            //$examcode .=  $tar['id'].',';

            $optionalblockTable = TableRegistry::get('targetcomps');
            $query = $optionalblockTable->query();
            $query->delete()
                    //  ->set(['deletedblock' => 1])
                    ->where(['target_id' => $tar['id']])
                    ->execute();
					
					
					      $optionalblockTable = TableRegistry::get('target');
            $query = $optionalblockTable->query();
            $query->delete()
                    //  ->set(['deletedblock' => 1])
                    ->where(['id' => $tar['id']])
                    ->execute();
					
        }
			
		}
		  
		  
		  


            $optionalblockTable = TableRegistry::get('paymentdetails');
            $query = $optionalblockTable->query();
            $query->delete()
                    ->where(['id' => $_POST['cat_val']])
                    ->execute();

            $optionalblockTable = TableRegistry::get('modulecomps');
            $query = $optionalblockTable->query();
            $query->delete()
                    ->where(['target_id' => $_POST['cat_val']])
                    ->execute();
            $optionalblockTable = TableRegistry::get('events');
            $query = $optionalblockTable->query();
            $query->delete()
                    ->where(['targetidevent' => $_POST['cat_val']])
                    ->execute();
		  

            echo 'Successfully deleted.';
			
			//echo $productcode;
            exit;
        }
    }

   public function deleteonlineclass() { //functions to delete modules


        $this->autoRender = false;

        if ($this->request->is(array('ajax'))) {

        $optionalblockTable = TableRegistry::get('events');
        $query = $optionalblockTable->query();
        $query->delete()
                ->where(['meetingid' => $_POST['cat_val']])
                ->execute();
				
				 $optionalblockTable = TableRegistry::get('institutecalendar');
        $query = $optionalblockTable->query();
        $query->delete()
                ->where(['meetingid' => $_POST['cat_val']])
                ->execute();




            echo 'Successfully deleted.';
            exit;
        }
    }

    public function returntargetcompslevel($lessonid) { //return levels

        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargets();


        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT max(tc.level) as lecode,tc.id as tcid, tc.status as tctstatus,tc.skip as tcskip,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') and lesson = ' . $lessonid . ' GROUP BY tc.topiccode order by tc.level asc';






        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();
        $examcode = "";
        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            $level = $lecode;   //level
        }

        return $level;
    }

    public function gettargetcompsid($courseid) { //return targtecomps ids

        //return $courseid;

        $row = array('id' => $courseid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/gettargetcompsid.php', false, $context1);
        $topiccodes = json_decode($result1, true);


        //echo $topiccodes[0]['topic_id'];
        //exit;

        $this->loadModel('Targetcomps');
        if ($topiccodes[0]['topic_id'] != null) {
            // $returnid = "Topic null".$courseid.$topiccodes[0]['topic_id'];




            $record = $this->Targetcomps->find('all', ['conditions' => ['Targetcomps.topiccode' => $topiccodes[0]['topic_id']]])->first();
            $targetcompid = $record->id;
        } else if ($topiccodes[0]['lesson_id'] != null) {
            $record = $this->Targetcomps->find('all', ['conditions' => ['Targetcomps.lesson' => $topiccodes[0]['lesson_id']]])->first();
            $targetcompid = $record->id;
        }

        // echo $topiccodes['lesson_id'];
        return $targetcompid;
    }

    public function getexamcount($a) { //get target count
        $row = array('typecount' => $a);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'ims/getcount.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes['getcountv'];
    }

    public function showstatusbar() {
        $compereanameslistprofile = new TargetController();
        $comlistforstudentprofiule = $compereanameslistprofile->comperaforprofile();


        $this->set(compact('comlistforstudentprofiule'));
    }

    public function gettopicsfromcmd() { //topic code count
        //$this->autoRender = false;


        $row = array('topic' => '');
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/getalltopiccount.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes;
    }

    public function disaplyallmodulecourses() { //return modules
        $row = array('uid' => $this->request->getSession()->read('sessionname'));
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'ims/modulesdisplay.php', false, $context1);
        $topiccodes = json_decode($result1, true);

        $this->set(compact('topiccodes'));
    }

    public function disaplyalladdoncourses() { //return addon courses


        $parameters = $this->request->getAttribute('params');


        if ($parameters['pass'][0] != NULL) {
            $serachtext = $parameters['pass'][0];


            $row = array('uid' => $this->request->getSession()->read('sessionname'), 'serachtext' => $serachtext);
            $data = json_encode($row);
            $options1 = array(
                'http' => array(
                    'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                    "Content-Type: application/json\r\n",
                    'method' => 'POST',
                    'content' => $data,
            ));


            $context1 = stream_context_create($options1);
            $result1 = file_get_contents($this->mainurl . 'ims/addoncoursedisplay.php', false, $context1);
            $topiccodes1 = json_decode($result1, true);

            $showall = 1;
            $this->set(compact('topiccodes1', 'showall', 'serachtext'));
        } else {

            $row = array('uid' => $this->request->getSession()->read('sessionname'), 'serachtext' => '');
            $data = json_encode($row);
            $options1 = array(
                'http' => array(
                    'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                    "Content-Type: application/json\r\n",
                    'method' => 'POST',
                    'content' => $data,
            ));

            /* 	var_dump($options1);
              exit; */
            $context1 = stream_context_create($options1);
            $result1 = file_get_contents($this->mainurl . 'ims/addoncoursedisplay.php', false, $context1);
            $topiccodes1 = json_decode($result1, true);

            $showall = 0;
            $this->set(compact('topiccodes1', 'showall'));
        }
    }

    public function hoursToMinutes($hours) {
        if (strstr($hours, ':')) {
            # Split hours and minutes.
            $separatedData = split(':', $hours);

            $minutesInHours = $separatedData[0] * 60;
            $minutesInDecimals = $separatedData[1];

            $totalMinutes = $minutesInHours + $minutesInDecimals;
        } else {
            $totalMinutes = $hours * 60;
        }

        return $totalMinutes;
    }

    public function synctocalendar() { //calendar sync
        $this->autoRender = false;

        $parameters = $this->request->getAttribute('params');
        if ($parameters['pass'][0] == NULL) {
            $uid = $this->request->getSession()->read('sessionname');
        } else {
            $uid = $parameters['pass'][0];
        }

        if ($parameters['pass'][1] == NULL) {
            $moodleid = $this->request->getSession()->read('sessionname');
        } else {
            $moodleid = $parameters['pass'][1];
        }




        //$uid = $this->request->getSession()->read('sessionname');

        $optionalblockTable = TableRegistry::get('events');
        $query = $optionalblockTable->query();
        $query->delete()
                ->where(['userid' => $uid])
                ->execute();

        $lessyn = $this->syncforlesson($uid, $moodleid);

        /* $quizsyn = $this->syncforquiz();
          $examplesyn = $this->syncforexample(); */

        $this->updatedateforcalendar($uid);
    }

    public function syncalmodulkesadmin($id, $moodleid) {
        $this->autoRender = false;

        $uid = $id;




        //$uid = $this->request->getSession()->read('sessionname');

        $optionalblockTable = TableRegistry::get('events');
        $query = $optionalblockTable->query();
        $query->delete()
                ->where(['userid' => $uid])
                ->execute();

        $lessyn = $this->syncforlesson($uid, $moodleid);

        /* $quizsyn = $this->syncforquiz();
          $examplesyn = $this->syncforexample(); */

        $this->updatedateforcalendaradmin($uid);
    }

    public function updatedateforcalendaradmin($uid) {



        $optionalblockTable = TableRegistry::get('events');
        $query = $optionalblockTable->query();
        $query->delete()
                ->where(['userid' => $uid, 'courseid' => 'N'])
                ->execute();


        $users = TableRegistry::get('users')->find('all')
                ->where(['users.id' => $uid]);
        foreach ($users as $user) {
            $this->request->getSession()->write('sunday', $user['sunday']);
            $this->request->getSession()->write('monday', $user['monday']);
            $this->request->getSession()->write('tuesday', $user['tuesday']);
            $this->request->getSession()->write('wednesday', $user['wednesday']);
            $this->request->getSession()->write('thursday', $user['thursday']);
            $this->request->getSession()->write('friday', $user['friday']);
            $this->request->getSession()->write('saturday', $user['saturday']);
        }


        $getcurrentdate = date('Y-m-d', strtotime($date . '+1 day'));

        $targetexams = TableRegistry::get('events')->find('all')
                ->where(['events.userid' => $uid, 'events.completionflag' => 0]);

        $currentday = strtolower(date('l'));
        $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($currentday));

        $i = 0;
        foreach ($targetexams as $tar) {
            $cdr = $tar['durationprofile'];
            $selectedOption = $tar['id'];

            if ($totalhourdaywise <= 0 || $totalhourdaywise < $cdr) {

                $timestamp = strtotime($gtedat);

                $day = strtolower(date('l', $timestamp));
                $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($day));


                $i++;
            }

            $gtedat = date('Y-m-d', strtotime($getcurrentdate . ' +' . $i . ' day'));


            $optionalblockTable = TableRegistry::get('events');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['start' => date('Y-m-d', strtotime($gtedat . ' -1 day')), 'end' => date('Y-m-d', strtotime($gtedat . ' -1 day')), 'allDay' => 'true'])
                    ->where(['id' => $selectedOption], ['userid' => $uid])
                    ->execute();

            $totalhourdaywise = $totalhourdaywise - $cdr;
        }


        //  $this->Flash->success(__('Your targets have been added to your "Target list". You may now baseline your competency levels.'));

        echo "Setup completed";
        exit;
    }

    public function updatedateforcalendar($uid) {



        $optionalblockTable = TableRegistry::get('events');
        $query = $optionalblockTable->query();
        $query->delete()
                ->where(['userid' => $uid, 'courseid' => 'N'])
                ->execute();


        $users = TableRegistry::get('users')->find('all')
                ->where(['users.id' => $uid]);
        foreach ($users as $user) {
            $this->request->getSession()->write('sunday', $user['sunday']);
            $this->request->getSession()->write('monday', $user['monday']);
            $this->request->getSession()->write('tuesday', $user['tuesday']);
            $this->request->getSession()->write('wednesday', $user['wednesday']);
            $this->request->getSession()->write('thursday', $user['thursday']);
            $this->request->getSession()->write('friday', $user['friday']);
            $this->request->getSession()->write('saturday', $user['saturday']);
        }


        $getcurrentdate = date('Y-m-d', strtotime($date . '+1 day'));

        $targetexams = TableRegistry::get('events')->find('all')
                ->where(['events.userid' => $uid, 'events.completionflag' => 0]);

        $currentday = strtolower(date('l'));
        $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($currentday));

        $i = 0;
        foreach ($targetexams as $tar) {
            $cdr = $tar['durationprofile'];
            $selectedOption = $tar['id'];

            if ($totalhourdaywise <= 0 || $totalhourdaywise < $cdr) {

                $timestamp = strtotime($gtedat);

                $day = strtolower(date('l', $timestamp));
                $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($day));


                $i++;
            }

            $gtedat = date('Y-m-d', strtotime($getcurrentdate . ' +' . $i . ' day'));


            $optionalblockTable = TableRegistry::get('events');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['start' => date('Y-m-d', strtotime($gtedat . ' -1 day')), 'end' => date('Y-m-d', strtotime($gtedat . ' -1 day')), 'allDay' => 'true'])
                    ->where(['id' => $selectedOption], ['userid' => $uid])
                    ->execute();

            $totalhourdaywise = $totalhourdaywise - $cdr;
        }


        //  $this->Flash->success(__('Your targets have been added to your "Target list". You may now baseline your competency levels.'));


        return $this->redirect(array(
                    /* 'controller' => 'users',
                      'action' => 'index' */

                    'controller' => 'targetcomps',
                    'action' => 'finalpayment'
        ));
    }

    public function syncforexample1($id) {



        $getcurrentdate = date('Y-m-d', strtotime($date . ' -0 day'));



        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargets();


        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT max(tc.level) as lecode,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') and tc.skip != 1 GROUP BY tc.topiccode order by tc.level asc';






        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();
        $this->loadModel('Events');
        //  $k= 1;



        $k = $getcountofles;

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            if ($lecode != 7) {

                $row = array('topiccode' => $tcode, 'levelcode' => $lecode);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));


                $context1 = stream_context_create($options1);
                $result1 = file_get_contents($this->mainurl . 'cmd/getquizescalendar.php', false, $context1);
                $topiccodes = json_decode($result1, true);




                foreach ($topiccodes as $calendarva) {
                    $courseid = $calendarva['courseid'];
                    $coursename = $calendarva['name'];
                    $studyduration = $calendarva['studyduration'];
                    $scorecard = $this->Events->newEntity();


                    $scorecard->title = $coursename;
                    $scorecard->courseid = $courseid;


                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +0 day'));

                    $scorecard->durationprofile = $studyduration;
                    $scorecard->type = 'Q';

                    $scorecard->url = 'cms/displayquiz/' . $courseid;
                    $scorecard->color = 'orange';
                    $scorecard->userid = $this->request->getSession()->read('sessionname');

                    if ($this->Events->save($scorecard)) {
                        
                    }

                    $k++;
                }
            }
        }
    }

    public function syncforexample() {



        $getcurrentdate = date('Y-m-d', strtotime($date . ' -0 day'));



        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargets();


        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT max(tc.level) as lecode,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') and tc.skip != 1 GROUP BY tc.topiccode order by tc.level asc';






        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();
        $this->loadModel('Events');
        //  $k= 1;


   

        $k = $getcountofles;

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            if ($lecode != 7) {

                $row = array('topiccode' => $tcode, 'levelcode' => $lecode);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));


                $context1 = stream_context_create($options1);
                $result1 = file_get_contents($this->mainurl . 'cmd/getquizescalendar.php', false, $context1);
                $topiccodes = json_decode($result1, true);




                foreach ($topiccodes as $calendarva) {
                    $courseid = $calendarva['courseid'];
                    $coursename = $calendarva['name'];
                    $studyduration = $calendarva['studyduration'];
                    $scorecard = $this->Events->newEntity();


                    $scorecard->title = $coursename;
                    $scorecard->courseid = $courseid;


                  


                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +0 day'));

                    $scorecard->durationprofile = $studyduration;
                    $scorecard->type = 'Q';

                    $scorecard->url = 'cms/displayquiz/' . $courseid;
                    $scorecard->color = 'orange';
                    $scorecard->userid = $this->request->getSession()->read('sessionname');

                    if ($this->Events->save($scorecard)) {
                        
                    }

                    $k++;
                }
            }
        }
    }

    public function syncforquiz() {
      

        $getcurrentdate = date('Y-m-d', strtotime($date . ' -0 day'));


       

        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargets();


        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT max(tc.level) as lecode,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') and tc.skip != 1 GROUP BY tc.topiccode order by tc.level asc';






        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();
        $this->loadModel('Events');
        //  $k= 1;
        //$currentday = strtolower(date('l'));
        // $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($currentday));


        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            if ($lecode != 7) {

                $row = array('topiccode' => $tcode);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));


                $context1 = stream_context_create($options1);
                $result1 = file_get_contents($this->mainurl . 'cmd/getpracticequizcalendar.php', false, $context1);
                $topiccodes = json_decode($result1, true);






                foreach ($topiccodes as $calendarva) {
                    $courseid = $calendarva['courseid'];
                    $coursename = $calendarva['name'];
                    $studyduration = $calendarva['studyduration'];
                    $scorecard = $this->Events->newEntity();


                    $scorecard->title = $coursename;
                    $scorecard->courseid = $courseid;
                   

                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +0 day'));

                    $scorecard->durationprofile = $studyduration;
                    $scorecard->type = 'PQ';
                    // $scorecard->start = $this->getdateforrowquiz($studyduration,$totmin,$j,$finaldate,$p,$z);
                    $scorecard->url = 'cms/displayquiz/' . $courseid;
                    $scorecard->color = 'orange';
                    $scorecard->userid = $this->request->getSession()->read('sessionname');

                    if ($this->Events->save($scorecard)) {
                        
                    }
                    $j++;
                    //$totmin-=$studyduration;
                }
            }
        }

      
    }

    public function syncforquiz1($id) {
      


        $getcurrentdate = date('Y-m-d', strtotime($date . ' -0 day'));


       

        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargets();


        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT max(tc.level) as lecode,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') and tc.skip != 1 GROUP BY tc.topiccode order by tc.level asc';






        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();
        $this->loadModel('Events');
       

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            if ($lecode != 7) {

                $row = array('topiccode' => $tcode);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));


                $context1 = stream_context_create($options1);
                $result1 = file_get_contents($this->mainurl . 'cmd/getpracticequizcalendar.php', false, $context1);
                $topiccodes = json_decode($result1, true);






                foreach ($topiccodes as $calendarva) {
                    $courseid = $calendarva['courseid'];
                    $coursename = $calendarva['name'];
                    $studyduration = $calendarva['studyduration'];
                    $scorecard = $this->Events->newEntity();


                    $scorecard->title = $coursename;
                    $scorecard->courseid = $courseid;
                  

                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +0 day'));

                    $scorecard->durationprofile = $studyduration;
                    $scorecard->type = 'PQ';
                    // $scorecard->start = $this->getdateforrowquiz($studyduration,$totmin,$j,$finaldate,$p,$z);
                    $scorecard->url = 'cms/displayquiz/' . $courseid;
                    $scorecard->color = 'orange';
                    $scorecard->userid = $this->request->getSession()->read('sessionname');

                    if ($this->Events->save($scorecard)) {
                        
                    }
                    $j++;
                    //$totmin-=$studyduration;
                }
            }
        }

      
    }

    public function getexamcompstargetsformodules($uid) {
        $this->loadModel('Paymentdetails');



        $Targetusers = $this->Paymentdetails->find('all', array('fields' => array('id')))->where(['Paymentdetails.userid' => $uid]);

        if ($Targetusers->count() > 0) {


            $examcode = "";
            foreach ($Targetusers as $tar) {
                $examcode .= $tar['id'] . ',';
            }
        } else {
            $examcode = 0;
        }
        return rtrim($examcode, ',');
    }

    public function syncforlesson($uid, $moodleid) {

        $getcurrentdate = date('Y-m-d', strtotime($date . ' -0 day'));


       

        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargetsformodules($uid);


        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT tc.target_id as targetid , tc.level as lecode,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  modulecomps tc WHERE tc.target_id IN (' . $Targetusers . ') and tc.skip != 1 GROUP BY tc.topiccode order by tc.id asc ';






        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();
        $this->loadModel('Events');
        //  $k= 1;

        $currentday = strtolower(date('l'));
       
        $s = 0;
        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            //$lecode;

            $targetidfinal = $targetid;



            $row = array('topiccode' => $tcode);
            $data = json_encode($row);
            $options1 = array(
                'http' => array(
                    'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                    "Content-Type: application/json\r\n",
                    'method' => 'POST',
                    'content' => $data,
            ));

            /* 	var_dump($options1);
              exit; */
            $context1 = stream_context_create($options1);
            $result1 = file_get_contents($this->mainurl . 'cmd/getlessoncalendar.php', false, $context1);
            $topiccodes = json_decode($result1, true);

            //$i= $k ;





            foreach ($topiccodes as $calendarva) {
                $courseid = $calendarva['courseid'];
                $coursename = $calendarva['name'];
                $studyduration = $calendarva['studyduration'];
                $mcode = $calendarva['mcode'];
				  $code = $calendarva['code'];


                $scorecard = $this->Events->newEntity();

               
                $scorecard->title = $coursename;
                $scorecard->courseid = $lcode;

              
                $scorecard->type = 'L';
                $scorecard->durationprofile = $studyduration;
                $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));
                $scorecard->url = $mcode;
                $scorecard->color = 'orange';
 $scorecard->code = $code;
                $scorecard->userid = $uid;
                $scorecard->targetidevent = $targetidfinal;


                /*                 * ******************************************** */
                if ($this->getmoodlecomplestatusfinal($code, $moodleid) == 0) {

                    $scorecard->color = 'orange';
                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));
                    $scorecard->completionflag = '0';

                    if ($this->Events->save($scorecard)) {
                        
                    }
                } else {


                    $scorecard->color = '#899194';
                    $scorecard->completionflag = '1';
                    $scorecard->start = $this->getmoodlecomplestatusfinal1($code, $moodleid);
                    $scorecard->end = $this->getmoodlecomplestatusfinal2($code, $moodleid);


                    if ($this->Events->save($scorecard)) {
                        
                    }
                }

                $i++;
            }


            /*             * ************** code for practice quiz **************************** */
            if ($lecode != 7) {

                $row = array('topiccode' => $tcode);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));


                $context1 = stream_context_create($options1);
                $result1 = file_get_contents($this->mainurl . 'cmd/getpracticequizcalendar.php', false, $context1);
                $topiccodes = json_decode($result1, true);






                foreach ($topiccodes as $calendarva) {
                    $courseid = $calendarva['courseid'];
					 $code = $calendarva['code'];
                    $coursename = $calendarva['name'];
                    $studyduration = $calendarva['studyduration'];
                    $scorecard = $this->Events->newEntity();


                    $scorecard->title = $coursename;
                    $scorecard->courseid = $lcode;
                  

                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));

                    $scorecard->durationprofile = $studyduration;
                    $scorecard->type = 'PQ';
                    // $scorecard->start = $this->getdateforrowquiz($studyduration,$totmin,$j,$finaldate,$p,$z);
                    $scorecard->url = 'cms/displayquiz/' . $courseid;
                    $scorecard->color = 'orange';
                    $scorecard->userid = $uid;
                    $scorecard->targetidevent = $targetidfinal;
					$scorecard->code = $code;
                    if ($this->getmoodlecomplestatusfinal($code, $moodleid) == 0) {

                        $scorecard->color = 'orange';
                        $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));
                        $scorecard->completionflag = '0';


                        if ($this->Events->save($scorecard)) {
                            
                        }
                    } else {


                        $scorecard->color = '#899194';
                        $scorecard->completionflag = '1';
                        $scorecard->start = $this->getmoodlecomplestatusfinal1($code, $moodleid);
                        $scorecard->end = $this->getmoodlecomplestatusfinal2($code, $moodleid);


                        if ($this->Events->save($scorecard)) {
                            
                        }
                    }
                    $j++;
                    //$totmin-=$studyduration;
                }
            }

            /*             * ************** end code for practice quiz **************************** */

            /*             * **********************code for quizes ************************************ */
            if ($lecode != 7) {

                $row = array('topiccode' => $tcode, 'levelcode' => $lecode);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));


                $context1 = stream_context_create($options1);
                $result1 = file_get_contents($this->mainurl . 'cmd/getquizescalendar.php', false, $context1);
                $topiccodes = json_decode($result1, true);




                foreach ($topiccodes as $calendarva) {
                    $courseid = $calendarva['courseid'];
                    $coursename = $calendarva['name'];
                    $studyduration = $calendarva['studyduration'];
                    $mcode = $calendarva['mcode'];
					 $code = $calendarva['code'];

                    $scorecard = $this->Events->newEntity();


                    $scorecard->title = $coursename;
                    $scorecard->courseid = $lcode;


                  


                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));

                    $scorecard->durationprofile = $studyduration;
                    $scorecard->type = 'Q';

                    $scorecard->url = $mcode;
                    $scorecard->color = 'orange';
                    $scorecard->userid = $uid;
                    $scorecard->targetidevent = $targetidfinal;
					$scorecard->code = $code;

                    if ($this->getmoodlecomplestatusfinal($code, $moodleid) == 0) {

                        $scorecard->color = 'orange';
                        $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));
                        $scorecard->completionflag = '0';


                        if ($this->Events->save($scorecard)) {
                            
                        }
                    } else {


                        $scorecard->color = '#899194';
                        $scorecard->completionflag = '1';
                        $scorecard->start = $this->getmoodlecomplestatusfinal1($code, $moodleid);
                        $scorecard->end = $this->getmoodlecomplestatusfinal2($code, $moodleid);


                        if ($this->Events->save($scorecard)) {
                            
                        }
                    }

                    $k++;
                }
            }

            /*             * **********************end code for quizes ************************************ */

            $s++;
        }


       
    }
	
				public function getmoodlecomplestatusfinal($courseid,$moodleid) {
				
			 //$timcomp = str_replace('IST','T',date("Y-m-dTH:i:s",$timecompleted));
			 
			/*/  $conn = ConnectionManager::get('default');
            $querytcomps = 'SELECT score_in_percentage,passingscore_in_percentage	 from studentscore WHERE userid = "'.$this->request->getSession()->read('sessionname').'" and  code ="'.$courseid.'" order by id desc';
            $stmt1 = $conn->execute($querytcomps);


            $getpaymentdetails = $stmt1->fetch(\PDO::FETCH_ASSOC);
			
			if($getpaymentdetails['score_in_percentage'] >= $getpaymentdetails['passingscore_in_percentage'])
				$a=  1;
			else
				$a = 0;
			
			return $a;*/
			
			     $row = array('courseid' => $courseid, 'moodleid' => $moodleid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'sms/getsamenamescom.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
			
	
			
		
	}
	public function getmoodlecomplestatusfinal1($courseid,$moodleid) {
		
				/*  $conn = ConnectionManager::get('default');
            $querytcomps = 'SELECT starttime	 from studentscore WHERE userid = "'.$this->request->getSession()->read('sessionname').'" and  code ="'.$courseid.'" order by id desc';
            $stmt1 = $conn->execute($querytcomps);


            $getpaymentdetails = $stmt1->fetch(\PDO::FETCH_ASSOC);
			
		return $getpaymentdetails['starttime'];*/
		
		     $row = array('courseid' => $courseid, 'moodleid' => $moodleid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'sms/getsamenames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
		
			
		
			
			
	}
		public function getmoodlecomplestatusfinal2($courseid,$moodleid) {
		
				/*  $conn = ConnectionManager::get('default');
            $querytcomps = 'SELECT endtime	 from studentscore WHERE userid = "'.$this->request->getSession()->read('sessionname').'" and  code ="'.$courseid.'" order by id desc';
            $stmt1 = $conn->execute($querytcomps);


            $getpaymentdetails = $stmt1->fetch(\PDO::FETCH_ASSOC);
			
			return $getpaymentdetails['endtime'];*/
				//return '08-04-2020';
				     $row = array('courseid' => $courseid, 'moodleid' => $moodleid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'sms/getsamenamesnew.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
			
	}

    public function syncforlesson1($id) {

        $getcurrentdate = date('Y-m-d', strtotime($date . ' -0 day'));


        //$getcurrentdate = date( 'Y-m-d', strtotime( $date . ' -0 day' ) );



        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargets1($id);


        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT max(tc.level) as lecode,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') and tc.skip != 1 GROUP BY tc.topiccode order by tc.level asc';






        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();
        $this->loadModel('Events');
        //  $k= 1;

        $currentday = strtolower(date('l'));
        
        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            //$lecode;


            $row = array('topiccode' => $tcode);
            $data = json_encode($row);
            $options1 = array(
                'http' => array(
                    'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                    "Content-Type: application/json\r\n",
                    'method' => 'POST',
                    'content' => $data,
            ));

            /* 	var_dump($options1);
              exit; */
            $context1 = stream_context_create($options1);
            $result1 = file_get_contents($this->mainurl . 'cmd/getlessoncalendar.php', false, $context1);
            $topiccodes = json_decode($result1, true);

            //$i= $k ;





            foreach ($topiccodes as $calendarva) {
                $courseid = $calendarva['courseid'];
                $coursename = $calendarva['name'];
                $studyduration = $calendarva['studyduration'];

                $scorecard = $this->Events->newEntity();

                //$totalstudentmin += $studyduration;


                $scorecard->title = $coursename;
                $scorecard->courseid = $courseid;

             
                $scorecard->type = 'L';
                $scorecard->durationprofile = $studyduration;
                $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +0 day'));
                $scorecard->url = 'cms/displayquiz/' . $courseid;
                $scorecard->color = 'orange';

                $scorecard->userid = $id;
                /*                 * ******************************************** */
                if ($this->Events->save($scorecard)) {
                    
                }

                $i++;
            }
        }


       
    }

    public function returnpendinhminutes($studyduration, $i, $totalhourdaywise) {
        return ($studyduration * $i) - $totalhourdaywise;
    }

    public function jobfilters() {
        
    }

    public function viewgraphforstudents() {
        $useridmoodle = $this->request->getSession()->read('sessionname');
        $this->set(compact('useridmoodle'));
    }

    public function topiccodesconsolidated() {  //consoloidate function


        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



            $conn = ConnectionManager::get('default');

            $Targetusers = $this->getexamcompstargets();
            $compereanameslist = new TargetController();


            $myArray = explode(',', $Targetusers);

            $querytcomps = 'SELECT max(tc.level) as lecode,tc.id as tcid, tc.status as tctstatus,tc.skip as tcskip,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
	, tc.targetname as targetname
	, tc.levelname as levelname
FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') GROUP BY tc.topiccode order by tc.level asc , tc.id  asc';






            $stmt1 = $conn->execute($querytcomps);

            $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);




                if ($tcskip == 0) {
                    $stat = "Skip it";
                } else {
                    $stat = "Skipped";
                }

                $tcskip = '<a id=' . $tcid . ' style="cursor:pointer"  onclick=skipthelesson(' . $tcid . ',' . $tcskip . ',1)>' . $stat . '</a>';

                $urlforeach = $this->weburlmainsite . "users/viewgraphforstudents/" . $lecode . "/" . $lcode;

                $this->loadModel('Modulecomps');
                $Modulecomps = $this->Modulecomps->find('all')->where(['Modulecomps.userid' => $this->request->getSession()->read('sessionname'), 'Modulecomps.lesson' => $lcode]);

                if ($Modulecomps->count() == 0) {
                    $actiondata = 'This module not yet purchased.';
                } else {
                    $actiondata = '<a href=# style=cursor:pointer; onclick=openmodalboxforlearning(' . $tcode . ',' . $lecode . ',"' . $urlforeach . '");return false;>Learning Modules</a>';
                }

                if ($lecode == 1)
                    $flevel = 'Level 1';
                else if ($lecode == 2)
                    $flevel = 'Level 2';
                else if ($lecode == 3)
                    $flevel = 'Level 3';
                else if ($lecode == 4)
                    $flevel = 'Level 4';
                else if ($lecode == 5)
                    $flevel = 'Level 5';
                else if ($lecode == 7)
                    $flevel = 'Basic';


                $post_item1 = array(
                    /*  'esid' => html_entity_decode($esid),
                      'ename' => html_entity_decode($ename), */
                    'tcid' => html_entity_decode($tcid),
                    'tcode' => html_entity_decode($tcode),
                    'lcode' => html_entity_decode($targetname),
                    'lecode' => html_entity_decode($flevel),
                    'escore' => html_entity_decode($escore),
                    'tctstatus' => html_entity_decode($tctstatus),
                    'tcskip' => html_entity_decode($tcskip),
                    'actiondata' => html_entity_decode($actiondata)
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }
            $json_data = array("data" => $posts_arr1);

            echo json_encode($json_data);
        }
        // return json_decode($blocksarray1, true);
    }

    public function getexamcodefortarget() {
        $this->loadModel('Target');
      



        $Targetusers = $this->Target->find('all', array('fields' => array('examcode')))->where(['Target.users_id' => $this->request->getSession()->read('sessionname')]);

        if ($Targetusers->count() > 0) {


            $examcode = "";
            foreach ($Targetusers as $tar) {
                $examcode .= $tar['examcode'] . ',';
            }
        } else {
            $examcode = 0;
        }
        return rtrim($examcode, ',');
    }

    public function getexamcompstargets1($id) {
        $this->loadModel('Target');
      



        $Targetusers = $this->Target->find('all', array('fields' => array('id')))->where(['Target.users_id' => $id]);

        if ($Targetusers->count() > 0) {


            $examcode = "";
            foreach ($Targetusers as $tar) {
                $examcode .= $tar['id'] . ',';
            }
        } else {
            $examcode = 0;
        }
        return rtrim($examcode, ',');
    }

    public function getexamcompstargets() {
        $this->loadModel('Target');
      



        $Targetusers = $this->Target->find('all', array('fields' => array('id')))->where(['Target.users_id' => $this->request->getSession()->read('sessionname')]);

        if ($Targetusers->count() > 0) {


            $examcode = "";
            foreach ($Targetusers as $tar) {
                $examcode .= $tar['id'] . ',';
            }
        } else {
            $examcode = 0;
        }
        return rtrim($examcode, ',');
    }

    public function blocksadd() {

        $userloggedid = $this->request->getSession()->read('sessionname');

        if ($this->request->is('post')) {

            $optionalblockTable = TableRegistry::get('optionalblock');

            if (is_array($_POST["blocks"]) || is_object($_POST["blocks"])) {

                foreach ($_POST["blocks"] as $selectedOption) {



                    $blockt = $optionalblockTable->newEntity();

                    $conditions = ['users_id' => $this->request->getSession()->read('sessionname'), 'blocks_id' => $selectedOption];
                    $exists = $optionalblockTable->exists($conditions);
                    if ($exists) {

                     

                        $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'index'
                        ));
                    } else {





                        $blockt->users_id = $userloggedid;
                        $blockt->blocks_id = $selectedOption;
                        // $blockt->deletedblock = 0;
                        if ($optionalblockTable->save($blockt)) {
                           
                        }
                    }
                }
            } else {
                $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'index'
                ));
            }

            $this->redirect(array(
                'controller' => 'users',
                'action' => 'index'
            ));
        }
    }

    public function tagetaddexam() { //add exams from institute admin
       if ($this->request->is(array('ajax'))) {

            $this->loadModel('Institutecalendar');

            $optionalblockTable = TableRegistry::get('institutecalendar');

            $blockt = $optionalblockTable->newEntity();

            $targetexams = $_POST['targetexams'];
            $examdatedateqq = $_POST['examdatedate'];
			$getmeetingid = time().$this->request->getSession()->read('sessionname');
			
			
  $endate = date('Y-m-d H:i:s', strtotime($examdatedateqq));
		  $examdatedate =	str_replace(' ', 'T', $endate);


            $company = ' (Company : ' . $this->getcompanybnamesforstudent($targetexams) . ')';


            $blockt->ttype = 'EE';
            $blockt->title = $this->getexamname($targetexams) . $company;
            $blockt->code = $targetexams;
            $blockt->start = $examdatedate;
			$blockt->end = $examdatedate;
			$blockt->meetingid = $getmeetingid;

            $blockt->description = $_POST['description'];

            // $blockt->start = $examdatedate.'T00:00:00';
            //$blockt->end = $examdatedate.'T23:59:00';
            $blockt->color = $_POST['color'];
			
			$optionalblockTable->save($blockt);
			


            /*             * ***************** */

            $this->loadModel('Events');

            $optionalblockTable = TableRegistry::get('events');

            $blockt = $optionalblockTable->newEntity();

   



            $blockt->userid = 0;
            $blockt->title = $this->getexamname($targetexams);
            $blockt->courseid = 0;
            $blockt->start = $examdatedate;
			$blockt->end = $examdatedate;
            $blockt->color = $_POST['color'];
            $blockt->code = $targetexams;
            $blockt->type = 'EE';
            $blockt->description = $_POST['description'];
			$blockt->meetingid = $getmeetingid;
			
         

$optionalblockTable->save($blockt);



                   echo 'Event loaded for Students successfully.';
				  exit;
        }
    }

    public function tagetaddsem() { // add sem exam from admin
        if ($this->request->is('post')) {

            $this->loadModel('Institutecalendar');

            $optionalblockTable = TableRegistry::get('institutecalendar');

            $blockt = $optionalblockTable->newEntity();

            $targetexams = $_POST['semesterrs'];
            $examdatedate = $_POST['examdatedate'];

            $eventtitleadmin = $_POST['eventtitleadmin'];



            $blockt->ttype = 'SEM';
//$blockt->title = $this->getsemname($targetexams).'-'. $eventtitleadmin;

            $blockt->title = $this->getsemname($targetexams) . '-' . $eventtitleadmin;

            $blockt->code = $targetexams;
            $blockt->start = $examdatedate;
            //  $blockt->start = $examdatedate.'T00:00:00';
            $blockt->end =  $examdatedate;
            $blockt->description = $_POST['description'];

            $blockt->color = $_POST['color'];

            $conditions = ['code' => $targetexams];
            $exists = $optionalblockTable->exists($conditions);





            if ($exists) {

                $optionalblockTable = TableRegistry::get('institutecalendar');
                $query = $optionalblockTable->query();
                $query->update()
                        ->set(['title' => $this->getsemname($targetexams), 'start' => $examdatedate, 'color' => $_POST['color']])
                        ->where(['code' => $targetexams])
                        ->execute();
            } else {

                if ($optionalblockTable->save($blockt)) {
                    // The $article entity contains the id now
                    //echo $id = $blockt->id;
                    //return $this->redirect(['action' => '/users/index']);
                    $idincal = $blockt->id;

                    $this->Flash->success(__('Added successfully.'));
                } else {
                    $this->Flash->error(__('Could not be added. Please, try again.'));
                }
            }
            /*             * ***************** */

            $this->loadModel('Events');

            $optionalblockTable = TableRegistry::get('events');

            $blockt = $optionalblockTable->newEntity();

            $targetexams = $_POST['semesterrs'];
            $examdatedate = $_POST['examdatedate'];



            $blockt->userid = 0;
//$blockt->title = $this->getsemname($targetexams);

            $blockt->title = $this->getsemname($targetexams) . '-' . $eventtitleadmin;
            $blockt->url = '#';



            $blockt->courseid = 0;
            $blockt->start = $examdatedate;
            $blockt->color = $_POST['color'];
            $blockt->code = $targetexams;
            $blockt->type = 'SEM';
            $blockt->description = $_POST['description'];

            $blockt->inscalid = $idincal;

            $conditions = ['code' => $targetexams];
            $exists = $optionalblockTable->exists($conditions);





            if ($exists) {

                $optionalblockTable = TableRegistry::get('events');
                $query = $optionalblockTable->query();
                $query->update()
                        ->set(['title' => $this->getsemname($targetexams), 'start' => $examdatedate . 'T09:00:00', 'end' => $examdatedate . 'T13:00:00', 'color' => $_POST['color']])
                        ->where(['code' => $targetexams])
                        ->execute();
            } else {

                if ($optionalblockTable->save($blockt)) {
                    // The $article entity contains the id now
                    //echo $id = $blockt->id;
                    //return $this->redirect(['action' => '/users/index']);


                    $optionalblockTable = TableRegistry::get('events');
                    $query = $optionalblockTable->query();
                    $query->update()
                            ->set(['url' => 'cms/displayevents/' . $blockt->id])
                            ->where(['id' => $blockt->id])
                            ->execute();

                    $this->Flash->success(__('Event loaded for Students successfully.'));
                } else {
                    $this->Flash->error(__('Could not be deleted. Please, try again.'));
                }
            }
            /*             * **************** */

            $this->redirect(array(
                'controller' => 'users',
                'action' => 'index'
            ));
        }
    }

    public function saveareaofintereste() {  //funmction to  update profile section

        ///Targetcomps/evalauetargetcomps

        if ($this->request->is(array('ajax'))) {

            if ($_POST['urltype'] == 1) {
                $this->loadModel('Areaofinterest');

                $this->Areaofinterest->updateAll(['name' => $_POST['nameforare'], 'description' => $_POST['descforare']], ['id' => $_POST['recordid']]);
            } else if ($_POST['urltype'] == 2) {
                $this->loadModel('Projectexecuted');

                $this->Projectexecuted->updateAll(['name' => $_POST['nameforare'], 'description' => $_POST['descforare']], ['id' => $_POST['recordid']]);
            } else if ($_POST['urltype'] == 3) {
                $this->loadModel('Internshipdetails');

                $this->Internshipdetails->updateAll(['name' => $_POST['nameforare'], 'description' => $_POST['descforare']], ['id' => $_POST['recordid']]);
            } else if ($_POST['urltype'] == 4) {
                $this->loadModel('Hobiesandextracurricular');

                $this->Hobiesandextracurricular->updateAll(['name' => $_POST['nameforare'], 'description' => $_POST['descforare']], ['id' => $_POST['recordid']]);
            } else if ($_POST['urltype'] == 5) {
                $this->loadModel('Electives');

                $this->Electives->updateAll(['name' => $_POST['nameforare'], 'description' => $_POST['descforare']], ['id' => $_POST['recordid']]);
            } else if ($_POST['urltype'] == 6) {
                $this->loadModel('Coursesattended');

                $this->Coursesattended->updateAll(['name' => $_POST['nameforare'], 'description' => $_POST['descforare']], ['id' => $_POST['recordid']]);
            } else if ($_POST['urltype'] == 7) {
                $this->loadModel('Personaldetails');

                $this->Personaldetails->updateAll(['name' => $_POST['nameforare'], 'description' => $_POST['descforare']], ['id' => $_POST['recordid']]);
            }

            echo "Changes saved successfully";
            exit;
        }
    }

    public function tagetadd() { // add target

        ///Targetcomps/evalauetargetcomps

        if ($this->request->is(array('ajax'))) {
            $userloggedid = $this->request->getSession()->read('sessionname');
            $selectedOption = $_POST['cat_val'];
            $this->loadModel('Target');

            $optionalblockTable = TableRegistry::get('target');



            $conditions = ['users_id' => $this->request->getSession()->read('sessionname'), 'examcode' => $selectedOption];
            $exists = $optionalblockTable->exists($conditions);





            if ($exists) {

                echo 'Could not be saved. Target already exists.';
                exit;
            }


            $blockt = $optionalblockTable->newEntity();
            $blockt->targettype = 'EEP';
            $blockt->name = $this->getexamname($selectedOption);
            $blockt->users_id = $userloggedid;
            $blockt->examcode = $selectedOption;

            $blocks = $this->Target->find('list')->where(['Target.users_id' => $this->request->getSession()->read('sessionname'), 'Target.targettype' => 'EEP'])->count();

            if ($blocks > 9) {

                echo 'The number of Targets selected exceeds the permissible limit set for you. Please contact your administrator.';
                exit;
            }


            if ($optionalblockTable->save($blockt)) {


                echo 'Target has been added.';
                exit;
            } else {
                echo 'Could not be added. Please, try again.';
                exit;
            }
        }


    }

    public function getexamname($id) { // get tatrget name
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
        $result1 = file_get_contents($this->mainurl . 'ims/getexamnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function deleteblock() { //delete optional block
        $blockid = $this->request->pass[0];


        $optionalblockTable = TableRegistry::get('optionalblock');
        $query = $optionalblockTable->query();
        $query->delete()
                //  ->set(['deletedblock' => 1])
                ->where(['blocks_id' => $blockid], ['users_id' => $this->request->getSession()->read('sessionname')])
                ->execute();
        $this->redirect(array(
            'controller' => 'users',
            'action' => 'index'
        ));
    }

    public function deleteexamcode() { //delete target

        if ($this->request->is(array('ajax'))) {

            $this->loadModel('Target');

            $blockid = $_POST['cat_val'];


            $optionalblockTable = TableRegistry::get('Target');
            $query = $optionalblockTable->query();
            $deltetarget = $query->delete()
                    //  ->set(['deletedblock' => 1])
                    ->where(['examcode' => $blockid], ['users_id' => $this->request->getSession()->read('sessionname')])
                    ->execute();

            if ($deltetarget) {
                echo 'Target has been deleted.';
                exit;
            } else {
                echo 'Could not be deleted. Please, try again.';
                exit;
            }
        }
    }

    public function userindex() {
        $this->request->getSession()->read('sessionname');







        if ($this->request->is('post')) {
            $pes = '%' . $this->request->data('Search') . '%';


            $users = $this->Users->find('all')->where(['OR' => ['username LIKE' => $pes, 'email LIKE' => $pes]]);
        } else {

            $users = $this->paginate($this->Users);
        }

        $this->set(compact('users'));
    }

    public function gausers() { // list of users from super admin


        $users = $this->paginate($this->Users->find('all')->where(['Users.userroles_id' => 4]));

        $this->set(compact('users'));
    }

    public function addga() {  ///super admin add users


        //$users = $this->paginate($this->Users->find('all')->where(['Users.userroles_id' => 4]));


        $usertypes = array("4" => "Group Admin", "2" => "Student");
        $options = array("Male" => "Male", "Female" => "Female", "Other" => "Other");
      /*  $indianStates = ['AP' => 'Andhra Pradesh',
            'AR' => 'Arunachal Pradesh',
            'AS' => 'Assam',
            'BR' => 'Bihar',
            'CT' => 'Chhattisgarh',
            'GA' => 'Goa',
            'GJ' => 'Gujarat',
            'HR' => 'Haryana',
            'HP' => 'Himachal Pradesh',
            'JK' => 'Jammu and Kashmir',
            'JH' => 'Jharkhand',
            'KA' => 'Karnataka',
            'KL' => 'Kerala',
            'MP' => 'Madhya Pradesh',
            'MH' => 'Maharashtra',
            'MN' => 'Manipur',
            'ML' => 'Meghalaya',
            'MZ' => 'Mizoram',
            'NL' => 'Nagaland',
            'OR' => 'Odisha',
            'PB' => 'Punjab',
            'RJ' => 'Rajasthan',
            'SK' => 'Sikkim',
            'TN' => 'Tamil Nadu',
            'TG' => 'Telangana',
            'TR' => 'Tripura',
            'UP' => 'Uttar Pradesh',
            'UT' => 'Uttarakhand',
            'WB' => 'West Bengal',
            'AN' => 'Andaman and Nicobar Islands',
            'CH' => 'Chandigarh',
            'DN' => 'Dadra and Nagar Haveli',
            'DD' => 'Daman and Diu',
            'LD' => 'Lakshadweep',
            'DL' => 'National Capital Territory of Delhi',
            'PY' => 'Puducherry'];*/
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {


            $password = $this->request->data['password'];




            if (strlen($this->request->data('phonenumber')) != 10) {
                $this->Flash->error('Phone number should be 10 digits.');
            } else if (strlen($password) < '8') {

                $this->Flash->error('Your Password Must Contain At Least 8 Characters!');
            } else if (strlen($password) > '14') {

                $this->Flash->error('Your Password length should be only less than 14 Characters!');
            } else if (!preg_match("#[0-9]+#", $password)) {

                $this->Flash->error('Your Password Must Contain At Least 1 Number!');
            } else if (!preg_match("#[A-Z]+#", $password)) {

                $this->Flash->error('Your Password Must Contain At Least 1 Capital Letter!');
            } else if (!preg_match("#[a-z]+#", $password)) {

                $this->Flash->error('Your Password Must Contain At Least 1 Lowercase Letter!');
            } else {

                $user->photoname = 'logo_150-150.png';

                //$user = $this->Users->patchEntity($user, $this->request->data);


                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('User has been added.'));
                    $this->emailadressconfimation1($_POST['email'], $_POST['fname']);

                    return $this->redirect($this->weburlmainsite . 'users/addga');
                }
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $username = "";

        $this->set(compact('username', 'user', 'usertypes', 'options', 'indianStates'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    public function removeFromString($str, $item) {
        $parts = explode(',', $str);

        while (($i = array_search($item, $parts)) !== false) {
            unset($parts[$i]);
        }

        return implode(',', $parts);
    }

    public function removefromgroup() {  //remove from group

        $this->autoRender = false;

        $this->loadModel('Users');
        $groupid = $this->request->pass[0];
        $userid = $this->request->pass[1];


        $semename = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $getsemanme = $semename->groupid;

        $final = $this->removeFromString($getsemanme, $groupid);



        $this->Users->updateAll(['groupid' => $final], ['id' => $userid]);


        $this->Flash->success(__('Group has been removed.'));
        return $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'gausers'
        ));
    }

    public function studentsgroup($id = null) { //list of student group

        $users = $this->Users->get($id);

        $groupid = $users['groupid'];



        $myArray = explode(',', $groupid);


        $result = "('" . implode("', '", $myArray) . "')";


        $this->loadModel('Studentgroup');

        $conn = ConnectionManager::get('default');

        $querytcomps = 'SELECT * FROM studentgroup where id in ' . $result . '  ORDER BY id ASC';




        $studentgroupsto = $conn->execute($querytcomps);



        $this->set(compact('studentgroupsto'));

      
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $usertypes = array("3" => "Institute Admin", "4" => "Group Admin", "6" => "Ticketing System Admin", "7" => "Facitpanel");
        $options = array("Male" => "Male", "Female" => "Female", "Other" => "Other");
        $indianStates = ['AP' => 'Andhra Pradesh',
            'AR' => 'Arunachal Pradesh',
            'AS' => 'Assam',
            'BR' => 'Bihar',
            'CT' => 'Chhattisgarh',
            'GA' => 'Goa',
            'GJ' => 'Gujarat',
            'HR' => 'Haryana',
            'HP' => 'Himachal Pradesh',
            'JK' => 'Jammu and Kashmir',
            'JH' => 'Jharkhand',
            'KA' => 'Karnataka',
            'KL' => 'Kerala',
            'MP' => 'Madhya Pradesh',
            'MH' => 'Maharashtra',
            'MN' => 'Manipur',
            'ML' => 'Meghalaya',
            'MZ' => 'Mizoram',
            'NL' => 'Nagaland',
            'OR' => 'Odisha',
            'PB' => 'Punjab',
            'RJ' => 'Rajasthan',
            'SK' => 'Sikkim',
            'TN' => 'Tamil Nadu',
            'TG' => 'Telangana',
            'TR' => 'Tripura',
            'UP' => 'Uttar Pradesh',
            'UT' => 'Uttarakhand',
            'WB' => 'West Bengal',
            'AN' => 'Andaman and Nicobar Islands',
            'CH' => 'Chandigarh',
            'DN' => 'Dadra and Nagar Haveli',
            'DD' => 'Daman and Diu',
            'LD' => 'Lakshadweep',
            'DL' => 'National Capital Territory of Delhi',
            'PY' => 'Puducherry'];
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Changes have been saved'));

                return $this->redirect($this->weburlmainsite . 'users/userindex');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user', 'usertypes', 'options', 'indianStates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);


        $options2 = array("0" => "Suspend", "1" => "Activate");

        if ($this->request->is(['patch', 'post', 'put'])) {

            //	var_dump($this->request->getData());
            //	exit;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Changes have been saved'));

                return $this->redirect($this->weburlmainsite . 'users/userindex');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $role1 = $this->Users->Userroles->find('list', ['limit' => 200]);
        $institution = $this->Users->Institution->find('list', ['limit' => 200]);

        // var_dump($role1 );
        //exit;

        $this->set(compact('user', 'role1', 'institution', 'options2'));
    }

    public function editga($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $options = array("Male" => "Male", "Female" => "Female", "Other" => "Other");

        $options2 = array("0" => "Suspend", "1" => "Activate");

        if ($this->request->is(['patch', 'post', 'put'])) {
			   $password = $this->request->data['password'];




            if (strlen($this->request->data('phonenumber')) != 10) {
                $this->Flash->error('Phone number should be 10 digits.');
            } else if (strlen($password) < '8') {

                $this->Flash->error('Your Password Must Contain At Least 8 Characters!');
            } else if (strlen($password) > '14') {

                $this->Flash->error('Your Password length should be only less than 14 Characters!');
            } else if (!preg_match("#[0-9]+#", $password)) {

                $this->Flash->error('Your Password Must Contain At Least 1 Number!');
            } else if (!preg_match("#[A-Z]+#", $password)) {

                $this->Flash->error('Your Password Must Contain At Least 1 Capital Letter!');
            } else if (!preg_match("#[a-z]+#", $password)) {

                $this->Flash->error('Your Password Must Contain At Least 1 Lowercase Letter!');
            } else {

            //	var_dump($this->request->getData());
            //	exit;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Changes have been saved'));

                return $this->redirect($this->weburlmainsite . 'users/gausers');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
			
		}
        }
        $role1 = $this->Users->Userroles->find('list', ['limit' => 200])->where(['Userroles.role' => 4]);


        // $users = $this->Users->find('all')->where(['Users.userroles_id' => 4]);

        $institution = $this->Users->Institution->find('list', ['limit' => 200]);

        // var_dump($role1 );
        //exit;

        $this->set(compact('user', 'options', 'role1', 'institution', 'options2'));
    }

    public function adduserstudyhours() { //update study hours


        if ($this->request->is(array('ajax'))) {

            $id = $this->request->getSession()->read('sessionname');
            $user = $this->Users->get($id, [
                'contain' => []
            ]);





            if (($this->request->data('sunday') + $this->request->data('monday') + $this->request->data('tuesday') + $this->request->data('wednesday') + $this->request->data('thursday') + $this->request->data('friday') + $this->request->data('saturday')) == 0) {

                echo '1';
                exit;
            } else {

                //	var_dump($this->request->getData());
                //	exit;

                $this->request->data['sunday'] = $this->request->data('sunday');
                $this->request->data['monday'] = $this->request->data('monday');
                $this->request->data['tuesday'] = $this->request->data('tuesday');
                $this->request->data['wednesday'] = $this->request->data('wednesday');
                $this->request->data['thursday'] = $this->request->data('thursday');
                $this->request->data['friday'] = $this->request->data('friday');
                $this->request->data['saturday'] = $this->request->data('saturday');


                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    //$this->Flash->success(__('Changes have been saved'));

                    if ($this->request->getSession()->read('scheduleoption') == 'Semester wise') {
                        echo 'Study hours have been saved. Changes will get reflected in the calendar within 24hrs.';
                        exit;
                    } else {

                        echo 'Study hours have been saved. Changes will get reflected in the calendar within 24hrs.';
                        exit;
                    }
                } else {
                    echo 'Could not be saved. Please, try again.';
                    exit;
                }
            }
        }
    }

    public function deleteuserpics() { //delete user pics

        $this->autoRender = false;


        if ($this->request->is(array('ajax'))) {
            $id = $this->request->getSession()->read('sessionname');

            $optionalblockTable = TableRegistry::get('users');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['photoname' => 'logo_150-150.png'])
                    ->where(['id' => $id])
                    ->execute();
            echo 'Profile Picture has been deleted.';
            exit;
        }
    }

    public function savestudentprofileinfo() {  //save students profile info

        $this->autoRender = false;

        if ($this->request->is('post')) {


            if (strlen($this->request->data('phonenumber')) != 10) {
                $this->Flash->error('Phone number should be 10 digits.');
            } else {


                $id = $_POST['useridsaveprofile'];

                $user = $this->Users->get($id, [
                    'contain' => []
                ]);

                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Changes have been saved'));
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            }


            return $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'index'));
        }
    }

    public function getexamcompstargetsidssem($id, $type) {
        $this->loadModel('Target');
        $Targetusers = $this->Target->find('all', array('fields' => array('examcode', 'id')))->where(['Target.users_id' => $id, 'Target.targettype' => $type]);

        //$examcode ="";
        foreach ($Targetusers as $tar) {
            //$examcode .=  $tar['id'].',';

            $optionalblockTable = TableRegistry::get('targetcomps');
            $query = $optionalblockTable->query();
            $query->delete()
                    //  ->set(['deletedblock' => 1])
                    ->where(['target_id' => $tar['id']])
                    ->execute();
        }

        //return rtrim($examcode,',');
    }

    public function savestudentinfo() {  //evaluation process from admin while saving student info

        $this->autoRender = false;

        if ($this->request->is(['patch', 'post', 'put'])) {


            $dob = $_POST['dateofbirth'];

            $then = strtotime($dob);
            //The age to be over, over +18
            $min = strtotime('+16 years', $then);

            if (time() < $min) {
                $this->Flash->error(__('Age should be above 16 years.'));
                return $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'index'
                ));
            }



            $id = $_POST['useridsave'];

            $moodleid = $_POST['useridsavemoodle'];

            $user = $this->Users->get($id, [
                'contain' => []
            ]);

            /* $categoryname = $this->Users->find('all', [ 'conditions' => ['Users.id' => $id]])->first();
              $getcatn =  $categoryname->scheduleoption; */
            $this->request->getSession()->write('semuserid', $id);

            $this->Users->updateAll(['firstlogin' => 1], ['id' => $id]);



            $this->request->data['scheduleoption'] = 'General';


            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Changes saved successfully.'));
            }

            /**/


            /*             * ******************************************* */

            if ($_POST['scheduleoption'] == 'General') {



                $this->loadModel('Target');

                $optionalblockTable = TableRegistry::get('target');



                $query = $optionalblockTable->query();

                $query->delete()
                        //  ->set(['deletedblock' => 1])
                        ->where(['users_id' => $id, 'targettype' => 'SEM'])
                        ->execute();
            }


            if ($_POST['scheduleoption'] == 'Semester wise') {

                $this->loadModel('Target');

                $optionalblockTable = TableRegistry::get('target');



                $query = $optionalblockTable->query();
                $query->delete()
                        //  ->set(['deletedblock' => 1])
                        ->where(['users_id' => $id, 'targettype' => 'EEP'])
                        ->execute();

                $query = $optionalblockTable->query();
                $query->delete()
                        //  ->set(['deletedblock' => 1])
                        ->where(['users_id' => $id, 'targettype' => 'SEM'])
                        ->execute();

                foreach ($_POST["semesterrs"] as $selectedOption) {

                    if ($selectedOption != NULL) {

                        $blockt = $optionalblockTable->newEntity();

                        $blockt->targettype = 'SEM';
                        $blockt->users_id = $id;
                        $blockt->examcode = $selectedOption;
                        $blockt->name = $this->getsemname($selectedOption);
                        //  $blockt->deletedblock = 0;
                        if ($optionalblockTable->save($blockt)) {
                            // The $article entity contains the id now
                            // echo $id = $blockt->id;
                            //return $this->redirect(['action' => '/users/index']);
                        }
                    }
                }
            }
            /*             * ******************************************* */



            if ($_POST['scheduleoption'] == 'Module wise') {

                $this->loadModel('Paymentdetails');
                $optionalblockTable = TableRegistry::get('paymentdetails');


                foreach ($_POST["modules"] as $selectedOption) {

                    if ($selectedOption != NULL) {

                        $blockt = $optionalblockTable->newEntity();

                        $blockt->type = 'modules';
                        $blockt->userid = $id;
                        $blockt->productcode = $selectedOption;
                        $blockt->productname = $this->getsemname($selectedOption);

                        $blockt->razorpay_payment_id = '-';
                        $blockt->razorpay_order_id = '-';
                        $blockt->merchant_order_id = '-';
                        $blockt->price = '-';
                        date_default_timezone_set('Asia/Kolkata');

                        $blockt->datetime = date('d-m-Y H:i');

                        if ($optionalblockTable->save($blockt)) {
                            
                        }
                    }
                }

                return $this->redirect(array(
                            'controller' => 'Targetcomps',
                            'action' => 'evalauetargetcompsformodulesadmin/' . $id . '/' . $moodleid));
            }
            if ($_POST['scheduleoption'] == 'Add-on Course') {

                $this->loadModel('Paymentdetails');
                $optionalblockTable = TableRegistry::get('paymentdetails');


                foreach ($_POST["addoncourse"] as $selectedOption) {

                    if ($selectedOption != NULL) {

                        $blockt = $optionalblockTable->newEntity();

                        $blockt->type = 'addon';
                        $blockt->userid = $id;
                        $blockt->productcode = $selectedOption;
                        $blockt->productname = $this->geticcname($selectedOption);

                        $blockt->razorpay_payment_id = '-';
                        $blockt->razorpay_order_id = '-';
                        $blockt->merchant_order_id = '-';
                        $blockt->price = '-';
                        date_default_timezone_set('Asia/Kolkata');

                        $blockt->datetime = date('d-m-Y H:i');

                        if ($optionalblockTable->save($blockt)) {
                            
                        }
                    }
                }
                return $this->redirect(array(
                            'controller' => 'Targetcomps',
                            'action' => 'evalauetargetcompsforiccmodsadmin/' . $id . '/' . $moodleid));
            }


            if ($_POST['scheduleoption'] == 'Semester wise') {

                return $this->redirect(array(
                            'controller' => 'Targetcomps',
                            'action' => 'evalauetargetcompsforsemester/' . $id));
            } else {
                return $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'index'));
            }

            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->weburlmainsite . 'users/userindex');
    }



    public function register() { // registration of user






        $chat = 0;
        $this->set(compact('chat'));
        $user = $this->Users->newEntity();


        $indianStates = $this->indianStates1;


        $options = array("Male" => "Male", "Female" => "Female", "Other" => "Other");
        if ($this->request->is('post')) {




            /*             * *********************************** */
            $password = $this->request->data['password'];

            $email = $this->request->data('email');
            $query = $this->Users->find()
                            ->where(['Users.email ' => $email])->count();

            $username = $this->request->data('username');
            $fname = $this->request->data('fname');

            if (strlen($fname) < '5') {

                $fname1 = $this->request->data('fname') . 'abc';
            } else {
                $fname1 = $this->request->data('fname');
            }

            $usern = $this->Users->find()
                            ->where(['Users.username ' => $username])->count();

            if (strlen($this->request->data('phonenumber')) != 10) {
                $this->Flash->error('Phone number should be 10 digits.');
            } else if ($query) {
                $this->Flash->error('Email: ' . $email . ' already exists.');
            } else if ($usern) {
                $this->Flash->error('Username: ' . $username . ' already exists.');
            }
            /* else if (strlen($fname) < '5') {

              $this->Flash->error('FirstName Must Contain At Least 5 Characters!');
              } */

            /*             * *********************************** */ else if (strlen($password) < '8') {

                $this->Flash->error('Your Password Must Contain At Least 8 Characters!');
            } else if (strlen($password) > '14') {

                $this->Flash->error('Your Password length should be only less than 14 Characters!');
            } else if (!preg_match("#[0-9]+#", $password)) {

                $this->Flash->error('Your Password Must Contain At Least 1 Number!');
            } else if (!preg_match("#[A-Z]+#", $password)) {

                $this->Flash->error('Your Password Must Contain At Least 1 Capital Letter!');
            } else if (!preg_match("#[a-z]+#", $password)) {

                $this->Flash->error('Your Password Must Contain At Least 1 Lowercase Letter!');
            } else {


                $user->institution_id = 1;
                $user->status = 1;






                $user->photoname = 'logo_150-150.png';

                $this->request->data['email'] = strtolower($this->request->data('email'));
                $this->request->data['username'] = strtolower($this->request->data('username'));

                $user = $this->Users->patchEntity($user, $this->request->data);



                if ($this->Users->save($user)) {

                    $this->emailadressconfimation($_POST['email'], $_POST['fname']);

                    $this->Flash->success('Account created. Just one step more. We have sent you an email to verify it`s you. Please check your email to activate your account.');
                    /* return $this->redirect(array(
                      'controller' => 'users',
                      'action' => 'login'
                      )); */
                } else {
                    $this->Flash->error('You are not registered');
                }
            }
        }
        $stcategorycoueses = $this->getgraduationname(1);

        $this->set(compact('user', 'options', 'indianStates', 'stcategorycoueses'));
        // $this->set('_serialzie', ['user']);
    }

    public function emailadressconfimation($email, $fname) { // email address confirmation from user end

        $passkey = uniqid();
        $timeout = time() + DAY;
        $url = Router::Url(['controller' => 'users', 'action' => 'emailconfirm'], true) . '/' . $passkey . '/' . $timeout;
        // $url = Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey . '/' . $timeout ;

        if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['email' => $email])) {
            $this->sendconfirmEmail($url, $email, $fname);

            return $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'login'
            ));
        } else {
            $this->Flash->error('Error saving reset passkey/timeout');
            return $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'login'
            ));
        }
    }

    public function emailadressconfimation1($email, $fname) { // email address confirmation from admin end

        $passkey = uniqid();
        $timeout = time() + DAY;
        $url = Router::Url(['controller' => 'users', 'action' => 'emailconfirm'], true) . '/' . $passkey . '/' . $timeout;
        // $url = Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey . '/' . $timeout ;

        if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['email' => $email])) {
            $this->sendconfirmEmail($url, $email, $fname);

            return $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'addga'
            ));
        } else {
            $this->Flash->error('Error saving reset passkey/timeout');
            return $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'addga'
            ));
        }
    }

    private function sendconfirmEmail($url, $useremail, $username) {
        $email = new Email();
        $email->template('emailconfim');
        $email->emailFormat('both');
        $email->from('noreply@odinlearning.in');
        $email->to($useremail, $username);
        $email->subject('ODIN - Confirm email address');
        $email->viewVars(['url' => $url, 'username' => $username]);
        if ($email->send()) {
            // $this->Flash->success(__('Check your email to confrim the email address.'));
        } else {
            $this->Flash->error(__('Error sending email: ') . $email->smtpError);
        }
    }

    public function emailconfirm($passkey = null, $timeout = null) { //email confirmation post registration


        $selectedTime = date("Y-m-d H:i:s", $timeout);

        /// $endtime = date("Y-m-d H:i:s",strtotime("+15 minutes", strtotime($selectedTime)));


        $currentdate = date("Y-m-d H:i:s");

        // echo time() - $timeout;

        if (time() - $timeout > 900) {
            $this->Flash->error('Invalid or expired passkey. Please check your email or try again');
            return $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'login'
            ));
        }




        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $user = $query->first();
            if ($user) {





                $user->passkey = null;
                $user->timeout = null;
                $user->emailconfirm = 1;

                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Congratulations! your account set up is complete. You may now login and strat your learning journey with ODIN!'));
                    //   return $this->redirect(array('action' => 'login'));
                    return $this->redirect(array(
                                'controller' => 'users',
                                'action' => 'login'
                    ));
                } else {
                    $this->Flash->error(__('Email could not be updated. Please, try again.'));
                }
            } else {
                $this->Flash->error('Email address has been already confirmed.');
                return $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'login'
                ));
            }
            //unset($user->password);
            $this->set(compact('user'));
        } else {
            $this->redirect('/');
        }
    }

    public function getlogdata($type) {
        date_default_timezone_set('Asia/Kolkata');
// echo date("Y-m-d H:i:s");
        $paymentDate = date("Y-m-d H:i:s");
        $userid = $this->request->getSession()->read('sessionname');
        $conn = ConnectionManager::get('default');
        $querytcomps = 'INSERT INTO eventlog (userid, type, time) VALUES ("' . $userid . '","' . $type . '","' . $paymentDate . '");';
        $stmt1 = $conn->execute($querytcomps);
    }

    // Logout
    public function logout() {
        $this->Users->updateAll(['firstlogin' => 0], ['id' => $this->request->session()->read('sessionname')]);

        $this->getlogdata('LOGOUT');


        $this->loadModel('Usersession');


        $Targetusers = $this->Usersession->find('all', array('fields' => array('maxid' => 'MAX(Usersession.id)')))->where(['Usersession.uid' => $this->request->getSession()->read('sessionname')]);

        $user = $Targetusers->first();
        $amount = $user->maxid;
        $this->Usersession->updateAll(['lastlogin' => 0], ['uid' => $this->request->getSession()->read('sessionname')]);
        $this->Usersession->updateAll(['lastlogin' => 1], ['id' => $amount]);



        $this->Flash->success('You are logged out');
        /*  $this->request->getSession()->delete('sessionname');
          $this->request->getSession()->delete('sessionname1');
          $this->request->getSession()->delete('sessionname2'); */
        $this->request->getSession()->destroy();



        //header('Location:https://odinlearning.in/moodle30/login/logout.php');
        return $this->redirect($this->Auth->logout());
        //return $this->redirect($this->weburlformoodle.'login/logoutusersms.php');
    }

    public function login() {



        // $users = $this->Users->get($this->request->getSession()->read('sessionname'));

        if ($this->Auth->user()) {

            return $this->redirect(['controller' => 'users']);
        }


        $chat = 0;
        $this->set(compact('chat'));

        //$this->autoRender = false;
        if ($this->request->is('post')) {

            //$this->userLogout();


            $user = $this->Auth->identify();

            if ($user['status'] == '0') {
                $this->Flash->error('Login disabled.Please Contact Administrator');
            } else if ($user['emailconfirm'] == '0') {
                $this->Flash->error('Please confirm your email address to login.');
            } else if ($user) {



                $this->Auth->setUser($user);


                $this->request->getSession()->write('sessusername', $user['username']);
                $this->request->getSession()->write('sesspassword', ucfirst($user['fname']));
               // $this->request->getSession()->write('moodleuid', $user['moodleuid']);
                $this->request->getSession()->write('photoname', $user['photoname']);
                $this->request->getSession()->write('sessionname', $user['id']);
                $this->request->getSession()->write('sessionname1', $user['fname'] . " " . $user['lname']);
                $this->request->getSession()->write('sessionemail', $user['email']);
                $this->request->getSession()->write('sessionname2', $user['userroles_id']);

                $this->request->getSession()->write('groupid', $user['groupid']);

                $this->request->getSession()->write('firstlogin', $user['firstlogin']);



                $this->loadModel('Institution');
                $degreetype = $this->Institution->find('all')->first();
                $inscode = $degreetype->code;

                $this->request->getSession()->write('inscode', $inscode);

                /*                 * ********************************************************************** */

                $this->request->getSession()->write('susername', $user['username']);
                $this->request->getSession()->write('sfname', $user['fname']);
                $this->request->getSession()->write('slname', $user['lname']);
                $this->request->getSession()->write('semail', $user['email']);




                /*                 * *********************************************************************** */


                $this->loadModel('Usersession');

                $optionalblockTable = TableRegistry::get('usersession');
                $blockt = $optionalblockTable->newEntity();
                $blockt->datetime = date("Y-m-d h:i a");

                $blockt->uid = $this->request->session()->read('sessionname');
                //  $blockt->deletedblock = 0;
                if ($optionalblockTable->save($blockt)) {
                    // The $article entity contains the id now
                    // echo $id = $blockt->id;
                    //return $this->redirect(['action' => '/users/index']);

                    if ($this->request->getSession()->read('sessionname2') == 2) {



                        $this->loadModel('Target');

                        $userid = $this->request->getSession()->read('sessionname');

                        $optionalblockTable = TableRegistry::get('target');
                       


                        $this->getlogdata('LOGIN');
                    }


                    return $this->redirect(['controller' => 'users']);
                }

            
            } else {
                // Bad Login
                $this->Flash->error('Incorrect Login');
            }
        }
    }

    public function eventcalendar() {
        
    }



    public function userprofile() {


        $options = array("Male" => "Male", "Female" => "Female", "Other" => "Other");
        $usersrole = $this->request->getSession()->read('sessionname2');
        $roleid = $this->request->getSession()->read('sessionname');

        $user = $this->Users->get($roleid, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Changes have been saved'));
                return $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'index'
                ));
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user', 'usersrole', 'options'));
    }



    public function password() { //forgot password
        if ($this->request->is('post')) {
            $query = $this->Users->findByEmail($this->request->data['email']);
            $user = $query->first();
            if (is_null($user)) {
                $this->Flash->error('Email address does not exist. Please try again');
            } else {
                $passkey = uniqid();
                $timeout = time() + DAY;
                $url = Router::Url(['controller' => 'users', 'action' => 'reset'], true) . '/' . $passkey . '/' . $timeout;

                if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['id' => $user->id])) {
                    $this->sendResetEmail($url, $user);
                    // $this->redirect(['action' => 'login']);
                    return $this->redirect(array(
                                'controller' => 'users',
                                'action' => 'login'
                    ));
                } else {
                    $this->Flash->error('Error saving reset passkey/timeout');
                }
            }
        }
    }

    private function sendResetEmail($url, $user) {
        $email = new Email();
        $email->template('resetpw');
        $email->emailFormat('both');
        $email->from('noreply@odinlearning.in');
        $email->to($user->email, $user->fname);
        $email->subject('Reset your password');
        $email->viewVars(['url' => $url, 'username' => $user->username]);
        if ($email->send()) {
            $this->Flash->success(__('Check your email for your reset password link'));
        } else {
            $this->Flash->error(__('Error sending email: ') . $email->smtpError);
        }
    }

    public function differenceInHours($startdate, $enddate) {
        $starttimestamp = strtotime($startdate);
        $endtimestamp = strtotime($enddate);
        $difference = abs($endtimestamp - $starttimestamp) / 3600;
        return $difference;
    }

    public function reset($passkey = null, $timeout = null) {


        $selectedTime = date("Y-m-d H:i:s", $timeout);

        /// $endtime = date("Y-m-d H:i:s",strtotime("+15 minutes", strtotime($selectedTime)));


        $currentdate = date("Y-m-d H:i:s");

        // echo time() - $timeout;

        if (time() - $timeout > 900) {
            $this->Flash->error('Invalid or expired passkey. Please check your email or try again');
            $this->redirect(['action' => 'password']);
        }




        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $user = $query->first();
            if ($user) {

                if (!empty($this->request->data)) {


                    $password = $this->request->data['password'];

                    if (strlen($password) < '8') {

                        $this->Flash->error('Your Password Must Contain At Least 8 Characters!');
                    } else if (strlen($password) > '14') {

                        $this->Flash->error('Your Password length should be only less than 14 Characters!');
                    } else if (!preg_match("#[0-9]+#", $password)) {

                        $this->Flash->error('Your Password Must Contain At Least 1 Number!');
                    } else if (!preg_match("#[A-Z]+#", $password)) {

                        $this->Flash->error('Your Password Must Contain At Least 1 Capital Letter!');
                    } else if (!preg_match("#[a-z]+#", $password)) {

                        $this->Flash->error('Your Password Must Contain At Least 1 Lowercase Letter!');
                    } else


                    if ($this->request->data['password'] != $this->request->data['confirm_password']) {
                        $this->Flash->error('Password does not match!');
                    } else {

                        // Clear passkey and timeout
                        $this->request->data['passkey'] = null;
                        $this->request->data['timeout'] = null;
                        $user = $this->Users->patchEntity($user, $this->request->data);
                        if ($this->Users->save($user)) {
                            $this->Flash->success(__('Your password has been updated.'));
                            //   return $this->redirect(array('action' => 'login'));
                            return $this->redirect(array(
                                        'controller' => 'users',
                                        'action' => 'login'
                            ));
                        } else {
                            $this->Flash->error(__('The password could not be updated. Please, try again.'));
                        }
                    }
                }
            } else {
                $this->Flash->error('Invalid or expired passkey. Please check your email or try again');
                $this->redirect(['action' => 'password']);
            }
            unset($user->password);
            $this->set(compact('user'));
        } else {
            $this->redirect('/');
        }
    }

    public function addgroup() {



        if ($this->request->is('post')) {

            $optionalblockTable = TableRegistry::get('users');

            if (is_array($_POST["userlis"]) || is_object($_POST["userlis"])) {

                foreach ($_POST["userlis"] as $selectedOption) {



                    //   $blockt = $optionalblockTable->newEntity();

                    $blockt = $optionalblockTable->get($selectedOption);
                    //$blockt->groupid = $selectedOption;

                    $blockt->groupid = $_POST["groupname"];

                    if ($optionalblockTable->save($blockt)) {
                        // The $article entity contains the id now
                        //  echo $id = $blockt->id;
                        //return $this->redirect(['action' => '/users/index']);
                    }
                }

                $this->Flash->success(__('Student(s)  added to the Group successfully'));

                return $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'index'
                ));
            }
        }
    }

    public function addgroupadmin() {



        if ($this->request->is('post')) {

            $optionalblockTable = TableRegistry::get('users');

            if (is_array($_POST["userlisgoup"]) || is_object($_POST["userlisgoup"])) {


                $groupids = "";
                foreach ($_POST["userlisgoup"] as $selectedOption) {


                    $groupids .= $selectedOption . ',';
                }

                $gids = rtrim($groupids, ',');



                //   $blockt = $optionalblockTable->newEntity();

                $blockt = $optionalblockTable->get($_POST['groupadminname']);
                //$blockt->groupid = $selectedOption;

                $blockt->groupid = $gids;

                if ($optionalblockTable->save($blockt)) {
                    // The $article entity contains the id now
                    //  echo $id = $blockt->id;
                    //return $this->redirect(['action' => '/users/index']);
                }

                $this->Flash->success(__('Group(s) has been assigned to group administrator successfully'));

                return $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'index'
                ));
            }
        }
    }

    public function getalltargetsforscorecard1() {

        $this->autoRender = false;


        //if ($this->request->is(array('ajax'))) { 
        $this->loadModel('Targetcomps');

        $optionalblockTable = TableRegistry::get('targetcomps');

        $cat_val = $_POST['cat_val'];
        //$cat_val = 598;


        $blocks = $this->Targetcomps->find('all')->where(['Targetcomps.target_id' => $cat_val]);

        //var_dump($blocks);

        $programecrolled = "";
        foreach ($blocks as $selectedOption) {

            $programecrolled .= $selectedOption['topiccode'] . ',';
            /*             * *************************level code****************************** */
            /*             * **************************level code ends****************************** */
        }

        $topiccode = rtrim($programecrolled, ',');



        $row = array('topiccode' => $topiccode);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/getpracticeforscore.php', false, $context1);
        $topiccodes = json_decode($result1, true);


        $programecrolled = "";
        foreach ($topiccodes as $selectedOption) {

            $programecrolled .= $selectedOption['courseid'] . ',';
        }

        $lessoncouserid = rtrim($programecrolled, ','); // couseids for lesson





        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['topic_id'] . ',';
        }

        $topics = rtrim($programecrolled1, ','); // topics for lessons


        /*         * ****************quizes************** */
        $myArray = explode(',', $topics);
        $courseidforquizes = "";
        foreach ($myArray as $top) {
            // echo $top;

            $blocks = $this->Targetcomps->find('all')->where(['Targetcomps.target_id' => $cat_val, 'Targetcomps.topiccode' => $top]);
            foreach ($blocks as $level) {
                $level = $level['level'];

                /*                 * ********************************************************* */
                $row = array('level' => $level, 'topiccode' => $top);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));

                /* 	var_dump($options1);
                  exit; */
                $context1 = stream_context_create($options1);
                $result1 = file_get_contents($this->mainurl . 'cmd/getquizesforscore.php', false, $context1);
                $topiccodesq = json_decode($result1, true);

                $programecrolledq = "";
                foreach ($topiccodesq as $selectedOptionq) {

                    $programecrolledq .= $selectedOptionq['courseid'] . ',';
                }

                $courseidforquizes .= $programecrolledq; // couseids for quizes 


                /*                 * *********************************************************** */
            }
        }

        /* echo $courseidforquizes;
          exit; */
        /*         * ******************************* * */



        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['id'] . ',';
        }

        $lessonid = rtrim($programecrolled1, ','); // lesson id



        $row = array('lessonid' => $lessonid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/getpracticefinal.php', false, $context1);
        $topiccodes = json_decode($result1, true);



        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['courseid'] . ',';
        }

        $lessonid = rtrim($programecrolled1, ','); // course ids for example



        $finalval = rtrim($lessoncouserid . "," . $lessonid . "," . $courseidforquizes, ',');



        $conn = ConnectionManager::get('default');
        $this->autoRender = false;


        //   if ($this->request->is(array('ajax'))) { 

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $prod_cat = $_POST['cat_val'];
        //$prod_cat = '603';




        if ($_POST['type'] == 'pending') {
            $st = 'Not Completed';
        } else {
            $st = 'Completed';
        }


        $string = str_replace('N', '"0"', $finalval);

        $querytcomps = 'SELECT * from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and courseid IN (' . $string . ') and status = "Not Completed"';
        /* echo $querytcomps;
          exit; */




        $stmt1 = $conn->execute($querytcomps);

        $pendig = $stmt1->rowCount();


        $querytcomps = 'SELECT * from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and courseid IN (' . $string . ') and status = "Completed"';
        /* echo $querytcomps;
          exit; */




        $stmt1 = $conn->execute($querytcomps);

        $completd = $stmt1->rowCount();



        $querytcomps = 'SELECT sum(score) as tot from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and courseid IN (' . $string . ') and status = "Completed"';
        /* echo $querytcomps;
          exit; */




        $stmt1 = $conn->execute($querytcomps);

        //$scorecount =  $stmt1->rowCount();
        $row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);

        $scorecount = $row1['tot'];




        $post_item1 = array(
            'pendig' => html_entity_decode($pendig),
            'completd' => html_entity_decode($completd),
            'scorecount' => html_entity_decode($scorecount)
        );


       

        // Turn to JSON & output
        echo json_encode($post_item1);



        //}
    }

    public function returnbaselineresults($cat_val, $baselinescore) {
        $this->autoRender = false;
        //if ($this->request->is(array('ajax'))) { 
        $this->loadModel('Targetcomps');
        $blocks = $this->Targetcomps->find('all')->where(['Targetcomps.target_id' => $cat_val]);
        $programecrolled = "";


        if ($baselinescore <= 19.00) {
            $baselin = 1;
        } else if ($baselinescore <= 20.00 && $baselinescore >= 39.00) {
            $baselin = 2;
        } else if ($baselinescore <= 40.00 && $baselinescore >= 59.00) {
            $baselin = 3;
        } else if ($baselinescore <= 60.00 && $baselinescore >= 79.00) {
            $baselin = 4;
        } else if ($baselinescore <= 80.00 && $baselinescore >= 100.00) {
            $baselin = 5;
        }

        $conn = ConnectionManager::get('default');


        foreach ($blocks as $selectedOption) {

            $levels = ($selectedOption['level'] - 1);

            $topiccode = $selectedOption['topiccode'];

            $practiceminutes = $this->getminutesofpracticequiz($topiccode);

            $querytcomps = 'SELECT numberofpracticequiz from baseline WHERE baselinelevel = ' . $baselin . ' and targetlevel = ' . $levels . '';
            $stmt1 = $conn->execute($querytcomps);


            $row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);

            $numberofpracticequiz = $row1['numberofpracticequiz'];

            $getfinalmin = ($practiceminutes * $numberofpracticequiz);

            $final += $getfinalmin;
        }

        return $final;
    }

    public function getminutesofpracticequiz($topiccode) {

        $row = array('topiccode' => $topiccode);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/getpracticeforscore.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['id'] . ',';
        }


        $lessonid = rtrim($programecrolled1, ','); // lesson id



        $row = array('lessonid' => $lessonid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/getpracticefinal.php', false, $context1);
        $topiccodes = json_decode($result1, true);



        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['studyduration'] . ',';
        }

        return $lessonid = rtrim($programecrolled1, ','); // course ids for example
    }

    public function computehoursforscorebaseline() {

        $this->autoRender = false;


        //if ($this->request->is(array('ajax'))) { 
        $this->loadModel('Targetcomps');

        $optionalblockTable = TableRegistry::get('targetcomps');

        $cat_val = $_POST['cat_val'];






        $baselinescore = $_POST['score'];




        /* $cat_val = 743;
          $baselinescore = 1; */


        $blocks = $this->Targetcomps->find('all')->where(['Targetcomps.target_id' => $cat_val]);

        //var_dump($blocks);

        $programecrolled = "";
        foreach ($blocks as $selectedOption) {

            $programecrolled .= $selectedOption['topiccode'] . ',';
            /*             * *************************level code****************************** */
            /*             * **************************level code ends****************************** */
        }

        $topiccode = rtrim($programecrolled, ',');






        $row = array('topiccode' => $topiccode);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/getpracticeforscore.php', false, $context1);
        $topiccodes = json_decode($result1, true);


        $programecrolled = "";
        foreach ($topiccodes as $selectedOption) {

            $programecrolled .= $selectedOption['studyduration'] . ',';
        }

        $lessoncouserid = rtrim($programecrolled, ','); // hours for lesson
        //echo  $lessoncouserid; exit;



        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['topic_id'] . ',';
        }

        $topics = rtrim($programecrolled1, ','); // topics for lessons


        /*         * ****************quizes************** */
        $myArray = explode(',', $topics);
        $courseidforquizes = "";
        foreach ($myArray as $top) {
            // echo $top;

            $blocks = $this->Targetcomps->find('all')->where(['Targetcomps.target_id' => $cat_val, 'Targetcomps.topiccode' => $top]);
            foreach ($blocks as $level) {
                $level = $level['level'];

                /*                 * ********************************************************* */
                $row = array('level' => $level, 'topiccode' => $top);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));

                /* 	var_dump($options1);
                  exit; */
                $context1 = stream_context_create($options1);
                $result1 = file_get_contents($this->mainurl . 'cmd/getquizesforscore.php', false, $context1);
                $topiccodesq = json_decode($result1, true);

                $programecrolledq = "";
                foreach ($topiccodesq as $selectedOptionq) {

                    if ($level == 7) {
                        $programecrolledq .= '0,';
                    } else {
                        $programecrolledq .= $selectedOptionq['studyduration'] . ',';
                    }
                }

                $courseidforquizes .= $programecrolledq; // couseids for quizes 


                /*                 * *********************************************************** */
            }
        }



        /* echo $courseidforquizes;
          exit; */
        /*         * ******************************* * */



        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['id'] . ',';
        }

        $lessonid = rtrim($programecrolled1, ','); // lesson id



        $row = array('lessonid' => $lessonid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/getpracticefinal.php', false, $context1);
        $topiccodes = json_decode($result1, true);



        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['studyduration'] . ',';
        }

        $lessonid = rtrim($programecrolled1, ','); // course ids for example

       

        $courseidsforquiz = rtrim($courseidforquizes, ',');

        $sum_array = explode(",", $courseidsforquiz);
        $result = count($sum_array);



        /*         * *****************example sec ********************* */



        $exaplecountarray = explode(",", $lessonid);
        $examplefinalcount = count($exaplecountarray);

        /*         * **************** end  ***************************** */


        $numberofpracticequiz = $this->returnbaselineresults($cat_val, $baselinescore);


        //	 $numberofpracticequiz = $row1['numberofpracticequiz'];




        $sum_arrayforlesson = explode(",", $lessoncouserid);


       

        $lessoncouserid1 = array_sum($sum_arrayforlesson) + ($numberofpracticequiz) + (array_sum($sum_array));


        $pendinghours11 = intdiv($lessoncouserid1, 60) . ':' . ($lessoncouserid1 % 60);

        if (intdiv($lessoncouserid1, 60) < 10)
            $hr = '0' . intdiv($lessoncouserid1, 60);
        else
            $hr = intdiv($lessoncouserid1, 60);


        if (($lessoncouserid1 % 60) < 10)
            $hr1 = '0' . ($lessoncouserid1 % 60);
        else
            $hr1 = ($lessoncouserid1 % 60);

        $pendinghours1 = $hr . ':' . $hr1;



        $post_item1 = array(
            'lessoncouserid1' => html_entity_decode($lessoncouserid1),
            'pendinghours1' => html_entity_decode($pendinghours1)
        );
        echo json_encode($post_item1);
    }

    public function getallscoreforbaseline() {

        $this->autoRender = false;
        $conn = ConnectionManager::get('default');
        $querytcomps = 'SELECT score as level1 from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and type ="762" and status = "Completed"';

        $stmt1 = $conn->execute($querytcomps);

        //$scorecount =  $stmt1->rowCount();
        $row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);

        $level1 = $row1['level1'];



        $querytcomps = 'SELECT score as level2 from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and type ="763" and status = "Completed"';

        $stmt1 = $conn->execute($querytcomps);

        //$scorecount =  $stmt1->rowCount();
        $row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);

        $level2 = $row1['level2'];


        $querytcomps = 'SELECT score as level3 from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and type ="764" and status = "Completed"';

        $stmt1 = $conn->execute($querytcomps);

        //$scorecount =  $stmt1->rowCount();
        $row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);

        $level3 = $row1['level3'];


        $querytcomps = 'SELECT score as level4 from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and type ="765" and status = "Completed"';

        $stmt1 = $conn->execute($querytcomps);

        //$scorecount =  $stmt1->rowCount();
        $row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);

        $level4 = $row1['level4'];

        $querytcomps = 'SELECT score as level5 from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and type ="766" and status = "Completed"';

        $stmt1 = $conn->execute($querytcomps);

        //$scorecount =  $stmt1->rowCount();
        $row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);

        $level5 = $row1['level5'];



        $post_item1 = array(
            'level1' => html_entity_decode($level1),
            'level2' => html_entity_decode($level2),
            'level3' => html_entity_decode($level3),
            'level4' => html_entity_decode($level4),
            'level5' => html_entity_decode($level5)
        );
        echo json_encode($post_item1);
    }

    public function getalltargetsforscorecard() {

        $this->autoRender = false;


        //if ($this->request->is(array('ajax'))) { 
        $this->loadModel('Targetcomps');

        $optionalblockTable = TableRegistry::get('targetcomps');

        $cat_val = $_POST['cat_val'];
        // $cat_val = 603;


        $blocks = $this->Targetcomps->find('all')->where(['Targetcomps.target_id' => $cat_val]);

        //var_dump($blocks);

        $programecrolled = "";
        foreach ($blocks as $selectedOption) {

            $programecrolled .= $selectedOption['topiccode'] . ',';
            /*             * *************************level code****************************** */
            /*             * **************************level code ends****************************** */
        }

        $topiccode = rtrim($programecrolled, ',');



        $row = array('topiccode' => $topiccode);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/getpracticeforscore.php', false, $context1);
        $topiccodes = json_decode($result1, true);


        $programecrolled = "";
        foreach ($topiccodes as $selectedOption) {

            $programecrolled .= $selectedOption['courseid'] . ',';
        }

        $lessoncouserid = rtrim($programecrolled, ','); // couseids for lesson





        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['topic_id'] . ',';
        }

        $topics = rtrim($programecrolled1, ','); // topics for lessons


        /*         * ****************quizes************** */
        $myArray = explode(',', $topics);
        $courseidforquizes = "";
        foreach ($myArray as $top) {
            // echo $top;

            $blocks = $this->Targetcomps->find('all')->where(['Targetcomps.target_id' => $cat_val, 'Targetcomps.topiccode' => $top]);
            foreach ($blocks as $level) {
                $level = $level['level'];

                /*                 * ********************************************************* */
                $row = array('level' => $level, 'topiccode' => $top);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));

                /* 	var_dump($options1);
                  exit; */
                $context1 = stream_context_create($options1);
                $result1 = file_get_contents($this->mainurl . 'cmd/getquizesforscore.php', false, $context1);
                $topiccodesq = json_decode($result1, true);

                $programecrolledq = "";
                foreach ($topiccodesq as $selectedOptionq) {

                    if ($level == 7) {
                        $programecrolledq .= '0,';
                    } else {
                        $programecrolledq .= $selectedOptionq['courseid'] . ',';
                    }

                    //$programecrolledq.=	$selectedOptionq['courseid'].',';
                }

                $courseidforquizes .= $programecrolledq; // couseids for quizes 


                /*                 * *********************************************************** */



                /*                 * ************************************************************* */

                $programecrolled1 = "";
                foreach ($topiccodes as $selectedOption1) {

                    $programecrolled1 .= $selectedOption1['id'] . ',';
                }

                $lessonid = rtrim($programecrolled1, ','); // lesson id



                $row = array('lessonid' => $lessonid);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));

                /* 	var_dump($options1);
                  exit; */
                $context1 = stream_context_create($options1);
                $result1 = file_get_contents($this->mainurl . 'cmd/getpracticefinal.php', false, $context1);
                $topiccodes = json_decode($result1, true);



                $programecrolled1 = "";
                foreach ($topiccodes as $selectedOption1) {

                    if ($level == 7) {
                        $programecrolled1 .= '0,';
                    } else {
                        $programecrolled1 .= $selectedOption1['courseid'] . ',';
                    }
                }

                $lessonid = rtrim($programecrolled1, ','); // course ids for example

                /*                 * ************************************************************* */
            }
        }

       


        $finalval = rtrim($lessoncouserid . "," . $lessonid . "," . $courseidforquizes, ',');



        $conn = ConnectionManager::get('default');
        $this->autoRender = false;


        //   if ($this->request->is(array('ajax'))) { 

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $prod_cat = $_POST['cat_val'];
        //$prod_cat = '603';




        if ($_POST['type'] == 'pending') {
            $st = 'Not Completed';
        } else {
            $st = 'Completed';
        }


        $string = str_replace('N', '"0"', $finalval);

        $querytcomps = 'SELECT * from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and courseid IN (' . $string . ') and status = "' . $st . '"';
        /* echo $querytcomps;
          exit; */




        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);



            $getmoodlequizid = $type;

            if ($getmoodlequizid == NULL) {

                $button = "";
            } else {
                $button = "<button id='buttonshowatemps' onclick='getmoodlequizid($getmoodlequizid)' >Show</button>";
            }


            $name222 = "<a style='cursor:pointer;color:blue' onclick='openmoodlelink($courseid)'>$name</a>";

            $post_item1 = array(
                'status' => html_entity_decode($status),
                'complete_date' => html_entity_decode($complete_date),
                /* 'tcode' => html_entity_decode($this ->gettopic($tcode)),
                  'lcode' => html_entity_decode($this ->getlesson($lcode)),
                  'lecode' => html_entity_decode($this ->getlevel($lecode)), */
                'name' => html_entity_decode($name222),
                'score' => html_entity_decode($score),
                'courseid' => html_entity_decode($courseid),
                'link' => html_entity_decode($button),
                'scorefinal' => html_entity_decode($scorefinal),
                'log' => html_entity_decode($logdata)
            );


            array_push($posts_arr1, $post_item1);
        }







        $json_data1 = array("data" => $posts_arr1);

        // Turn to JSON & output
        echo json_encode($json_data1);



        //}
    }

    public function getselectsemsister() {

        $this->autoRender = false;


        if ($this->request->is(array('ajax'))) {
            $this->loadModel('Target');

            $optionalblockTable = TableRegistry::get('target');

            $cat_val = $_POST['cat_val'];


            $blocks = $this->Target->find('all')->where(['Target.users_id' => $cat_val]);

            //var_dump($blocks);

            $programecrolled = "";
            foreach ($blocks as $selectedOption) {

                $programecrolled .= $selectedOption['examcode'] . ',';
            }

            echo rtrim($programecrolled, ',');
        }
    }

    public function getselectsemsister1() {

        $this->autoRender = false;


        if ($this->request->is(array('ajax'))) {
            $this->loadModel('Target');

            $optionalblockTable = TableRegistry::get('target');

            $cat_val = $_POST['cat_val'];


            $blocks = $this->Target->find('all')->where(['Target.users_id' => $cat_val, 'Target.targettype' => 'SEM']);

            //var_dump($blocks);

            $programecrolled = "";
            foreach ($blocks as $selectedOption) {

                $programecrolled .= $selectedOption['examcode'] . ',';
            }

            echo rtrim($programecrolled, ',');
        }
    }

    public function loadexamsforscore() {
        $this->loadModel('Target');
        $Targetusers = $this->Target->find('all', array('order' => array('Target.name' => 'asc')))->where(['Target.users_id' => $this->request->getSession()->read('sessionname')]);

        //var_dump($Targetusers);
        // exit;
        return $Targetusers;
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
        $result1 = file_get_contents($this->mainurl . 'cmd/getcoursename.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getcoursetype($id) {
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
        $result1 = file_get_contents($this->mainurl . 'cmd/getcoursetype.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['catypye'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getlessonidforscore($id) {
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
        $result1 = file_get_contents($this->mainurl . 'cmd/getlessonidforcourse.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['lid'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getcoursenamestudydurartion($id) {
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
        $result1 = file_get_contents($this->mainurl . 'cmd/getcoursestudyhours.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['studyduration'];
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
        $result1 = file_get_contents($this->mainurl . 'cmd/quizmoodleid.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['mcode'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getscorecardlist() {

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



            //$prod_cat = $_POST['cat_val'];
            //$prod_cat ='praveen';

            /*             * ********************************* */

            $conn = ConnectionManager::get('default');

            $querytcomps = 'SELECT status,complete_date,name,type,courseid,score FROM scorecard where  users_id = ' . $this->request->getSession()->read('sessionname') . '  ORDER BY id DESC';




            $stmt1 = $conn->execute($querytcomps);

            $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);


//if($status==0){ $stat = "Disabled"; } else { $stat = "Active";}



                $coursename = $name . '  [Course ID :' . $courseid . ']';


                $getmoodlequizid = $type;

                if ($getmoodlequizid == NULL) {

                    $button = "";
                } else {
                    $button = "<button id='buttonshowatemps' onclick='getmoodlequizid($getmoodlequizid,$score)' >Show attempts</button>";
                }

                $post_item1 = array(
                    'score' => html_entity_decode($score),
                    'coursename' => html_entity_decode($coursename),
                    'status' => html_entity_decode($status),
                    //'complete_date' => html_entity_decode($complete_date),
                    'complete_date' => html_entity_decode(substr($complete_date, 0, 16)),
                    'link' => html_entity_decode($button)
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }

            $json_data = array("data" => $posts_arr1);

            // Turn to JSON & output
            echo json_encode($json_data);
            /*             * **************************************** */
        }
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
        $result1 = file_get_contents($this->mainurl . 'ims/getsamenames.php', false, $context1);
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
        $result1 = file_get_contents($this->mainurl . 'ims/getdepnames.php', false, $context1);
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
        $result1 = file_get_contents($this->mainurl . 'ims/geticcnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getgraduationname($id) {
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
        $result1 = file_get_contents($this->mainurl . 'ims/getgraduationanme.php', false, $context1);
        return $topiccodes = json_decode($result1, true);
        //return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function getgraduationnamefinaldata($id) {
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
        $result1 = file_get_contents($this->mainurl . 'ims/getgraduationanmenew.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
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
        $result1 = file_get_contents($this->mainurl . 'cmd/topic.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['code'];
        //var_dump( $topiccodes);
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
        $result1 = file_get_contents($this->mainurl . 'cmd/lessonname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
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
        $result1 = file_get_contents($this->mainurl . 'cmd/levelname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //	var_dump( $topiccodes);
        //exit;
    }

    public function emailCheck() {
        $this->autoRender = false;
        $this->viewBuilder()->layout('false');
        if ($this->request->is(['post'])) {
            $email = $this->request->data('email');
            $query = $this->Users->find()
                            ->where(['Users.email ' => $email])->count();
            if ($query) {
                echo 1;
            }
        }
    }

    public function usernameCheck() {
        $this->autoRender = false;
        $this->viewBuilder()->layout('false');
        if ($this->request->is(['post'])) {
            $username = $this->request->data('username');
            $query = $this->Users->find()
                            ->where(['Users.username ' => $username])->count();
            if ($query) {
                echo 1;
            }
        }
    }

    public function getquizcalculationforscore($lessonid, $uid, $baselinescore) {

        $conn = ConnectionManager::get('default');
        $this->autoRender = false;

        if ($baselinescore <= 19.00) {
            $baselin = 1;
        } else if ($baselinescore <= 20.00 && $baselinescore >= 39.00) {
            $baselin = 2;
        } else if ($baselinescore <= 40.00 && $baselinescore >= 59.00) {
            $baselin = 3;
        } else if ($baselinescore <= 60.00 && $baselinescore >= 79.00) {
            $baselin = 4;
        } else if ($baselinescore <= 80.00 && $baselinescore >= 100.00) {
            $baselin = 5;
        }


        $querytcomps = 'SELECT count(*) as totalcount from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and lessonid IN (' . $lessonid . ') and status = "Completed" and coursecategory = "quiz" ';



        $stmt1 = $conn->execute($querytcomps);


        $row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);

        $levels = $row1['totalcount'];


        $querytcomps11 = 'SELECT numberofpracticequiz from baseline WHERE baselinelevel = ' . $baselin . ' and targetlevel = ' . $levels . '';
        $stmt11 = $conn->execute($querytcomps11);


        $row11 = $stmt11->fetch(\PDO::FETCH_ASSOC);

        $numberofpracticequiz1 = $row11['numberofpracticequiz'];




        $querytcomps111 = 'SELECT studyduration from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and lessonid IN (' . $lessonid . ') and status = "Completed" and coursecategory = "example" ';



        $stmt111 = $conn->execute($querytcomps111);


        $row111 = $stmt111->fetch(\PDO::FETCH_ASSOC);

        $practiceminutes = $row111['studyduration'];



        // return $getfinalmin .'='. ($practiceminutes .'*'. $numberofpracticequiz1).'<br />';

        return $getfinalmin = ($practiceminutes * $numberofpracticequiz1);

        // $final +=$getfinalmin;
    }

    public function gettargetforcompltedhours() {

        $this->autoRender = false;
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

        //if ($this->request->is(array('ajax'))) { 
        $this->loadModel('Targetcomps');

        $optionalblockTable = TableRegistry::get('targetcomps');

        $cat_val = $_POST['cat_val'];
        //$cat_val = 728;

        $prod_cat = $_POST['cat_val'];
        //$prod_cat = 728;

        $baselinescore = $_POST['baseline'];

        $durationminutes = $_POST['durationminutes'];


        $blocks = $this->Targetcomps->find('all')->where(['Targetcomps.target_id' => $cat_val]);

        //var_dump($blocks);

        $programecrolled = "";
        foreach ($blocks as $selectedOption) {

            $programecrolled .= $selectedOption['topiccode'] . ',';
            /*             * *************************level code****************************** */
            /*             * **************************level code ends****************************** */
        }

        $topiccode = rtrim($programecrolled, ',');



        $row = array('topiccode' => $topiccode);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/getpracticeforscore.php', false, $context1);
        $topiccodes = json_decode($result1, true);





        $programecrolled = "";
        foreach ($topiccodes as $selectedOption) {

            $lessonid .= $selectedOption['id'] . ',';


            $getfinalmin = $this->getquizcalculationforscore($selectedOption['id'], $this->request->getSession()->read('sessionname'), $baselinescore);

          

            $final += $getfinalmin;
        }




        $lessoncouserid = rtrim($lessonid, ','); // couseids for lesson

        $conn = ConnectionManager::get('default');
        $this->autoRender = false;




        $string = str_replace('N', '"0"', $lessoncouserid);

        $querytcomps = 'SELECT sum(studyduration) as stuyd from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and lessonid IN (' . $string . ') and status = "Completed" and coursecategory = "lesson" ';



        $stmt1 = $conn->execute($querytcomps);


        $row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);

        $scorecount = $row1['stuyd'];



        if ($scorecount == NULL)
            $scorecount = 0;
        else
            $scorecount = $row1['stuyd'];  // total lesson


            /*             * ********************************************** */
        $querytcomps11 = 'SELECT sum(studyduration) as stuyd from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and lessonid IN (' . $string . ') and status = "Completed" and coursecategory = "quiz" ';



        $stmt11 = $conn->execute($querytcomps11);


        $row11 = $stmt11->fetch(\PDO::FETCH_ASSOC);

        $scorecount11 = $row11['stuyd'];



        if ($scorecount11 == NULL)
            $scorecount11 = 0;
        else
            $scorecount11 = $row11['stuyd']; // totalquiz


            /* echo $scorecount;
              echo $scorecount11;
              exit; */

        $scorecountff = $final + $scorecount + $scorecount11;




        $hours1 = intdiv($scorecountff, 60) . ':' . ($scorecountff % 60);
        /*         * ************************************************* */

        if (intdiv($scorecountff, 60) < 10)
            $hr = '0' . intdiv($scorecountff, 60);
        else
            $hr = intdiv($scorecountff, 60);


        if (($scorecountff % 60) < 10)
            $hr1 = '0' . ($scorecountff % 60);
        else
            $hr1 = ($scorecountff % 60);

        $hours = $hr . ':' . $hr1;





        $pendinghours = $durationminutes - $scorecountff;

        $pendinghours11 = intdiv($pendinghours, 60) . ':' . ($pendinghours % 60);

        if (intdiv($pendinghours, 60) < 10)
            $hr = '0' . intdiv($pendinghours, 60);
        else
            $hr = intdiv($pendinghours, 60);


        if (($pendinghours % 60) < 10)
            $hr1 = '0' . ($pendinghours % 60);
        else
            $hr1 = ($pendinghours % 60);

        $pendinghours1 = $hr . ':' . $hr1;



        if ($baselinescore <= 19.00) {
            $baselin = 1;
        } else if ($baselinescore <= 20.00 && $baselinescore >= 39.00) {
            $baselin = 2;
        } else if ($baselinescore <= 40.00 && $baselinescore >= 59.00) {
            $baselin = 3;
        } else if ($baselinescore <= 60.00 && $baselinescore >= 79.00) {
            $baselin = 4;
        } else if ($baselinescore <= 80.00 && $baselinescore >= 100.00) {
            $baselin = 5;
        }



        $post_item1 = array(
            'scorecountff' => html_entity_decode($hours),
            'totalpeninghoursinminutes' => html_entity_decode($pendinghours1),
            'baselinescorefin' => html_entity_decode($baselin)
        );
        echo json_encode($post_item1);
    }

    public function computeaveragescoretargetwise() {

        $this->autoRender = false;


        //if ($this->request->is(array('ajax'))) { 
        $this->loadModel('Targetcomps');

        $optionalblockTable = TableRegistry::get('targetcomps');

        $cat_val = $_POST['cat_val'];
        $finaltotal = $_POST['finaltotal'];
        // $cat_val = 603;


        $blocks = $this->Targetcomps->find('all')->where(['Targetcomps.target_id' => $cat_val]);

        //var_dump($blocks);

        $programecrolled = "";
        foreach ($blocks as $selectedOption) {

            $programecrolled .= $selectedOption['topiccode'] . ',';
            /*             * *************************level code****************************** */
            /*             * **************************level code ends****************************** */
        }

        $topiccode = rtrim($programecrolled, ',');



        $row = array('topiccode' => $topiccode);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/getpracticeforscore.php', false, $context1);
        $topiccodes = json_decode($result1, true);


        $programecrolled = "";
        foreach ($topiccodes as $selectedOption) {

            $programecrolled .= $selectedOption['courseid'] . ',';
        }

        $lessoncouserid = rtrim($programecrolled, ','); // couseids for lesson





        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['topic_id'] . ',';
        }

        $topics = rtrim($programecrolled1, ','); // topics for lessons


        /*         * ****************quizes************** */
        $myArray = explode(',', $topics);
        $courseidforquizes = "";
        foreach ($myArray as $top) {
            // echo $top;

            $blocks = $this->Targetcomps->find('all')->where(['Targetcomps.target_id' => $cat_val, 'Targetcomps.topiccode' => $top]);
            foreach ($blocks as $level) {
                $level = $level['level'];

                /*                 * ********************************************************* */
                $row = array('level' => $level, 'topiccode' => $top);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));

                /* 	var_dump($options1);
                  exit; */
                $context1 = stream_context_create($options1);
                $result1 = file_get_contents($this->mainurl . 'cmd/getquizesforscore.php', false, $context1);
                $topiccodesq = json_decode($result1, true);

                $programecrolledq = "";
                foreach ($topiccodesq as $selectedOptionq) {

                    $programecrolledq .= $selectedOptionq['courseid'] . ',';
                }

                $courseidforquizes .= $programecrolledq; // couseids for quizes 


                /*                 * *********************************************************** */
            }
        }

        /* echo $courseidforquizes;
          exit; */
        /*         * ******************************* * */



        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['id'] . ',';
        }

        $lessonid = rtrim($programecrolled1, ','); // lesson id



        $row = array('lessonid' => $lessonid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));

        /* 	var_dump($options1);
          exit; */
        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'cmd/getpracticefinal.php', false, $context1);
        $topiccodes = json_decode($result1, true);



        $programecrolled1 = "";
        foreach ($topiccodes as $selectedOption1) {

            $programecrolled1 .= $selectedOption1['courseid'] . ',';
        }

        $lessonid = rtrim($programecrolled1, ','); // course ids for example



        $finalval = rtrim($lessoncouserid . "," . $lessonid . "," . $courseidforquizes, ',');



        $conn = ConnectionManager::get('default');
        $this->autoRender = false;


        //   if ($this->request->is(array('ajax'))) { 

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $prod_cat = $_POST['cat_val'];
        //$prod_cat = '603';






        $string = str_replace('N', '"0"', $finalval);

        $querytcomps = 'SELECT sum(scorefinal) as scorefinaltot from scorecard WHERE users_id = ' . $this->request->getSession()->read('sessionname') . ' and courseid IN (' . $string . ')';
        /* echo $querytcomps;
          exit; */




        $stmt1 = $conn->execute($querytcomps);



        $row1 = $stmt1->fetch(\PDO::FETCH_ASSOC);

        $scorefinaltot = $row1['scorefinaltot'];


        echo number_format((float) ($scorefinaltot / $finaltotal), 2, '.', '');



        //}
    }

    public function openhrconect() {



        $finalurl = $this->weburlforhc . 'index.php?sms_user=' . $this->encrypt($this->request->session()->read('sessionname')) . '&role=' . $this->encrypt($this->request->session()->read('sessionname2'));


        $this->redirect($finalurl);
    }

    public function openscconect() {



        $finalurl = $this->weburlforsc . 'index.php?sms_user=' . $this->encrypt($this->request->session()->read('sessionname')) . '&role=' . $this->encrypt($this->request->session()->read('sessionname2'));


        $this->redirect($finalurl);
    }

    public function openicconect() {



        $finalurl = $this->weburlforic . 'index.php?sms_user=' . $this->encrypt($this->request->session()->read('sessionname')) . '&role=' . $this->encrypt($this->request->session()->read('sessionname2'));


        $this->redirect($finalurl);
    }

    public function openpcconect() {



        $finalurl = $this->weburlforpc . 'index.php?sms_user=' . $this->encrypt($this->request->session()->read('sessionname')) . '&role=' . $this->encrypt($this->request->session()->read('sessionname2'));


        $this->redirect($finalurl);
    }

    public function openrecoapiconect() {



        $finalurl = 'http://recoapi.odinlearning.in/';


        $this->redirect($finalurl);
    }

    public function encrypt($sData) {
        $id = (double) $sData * 543544.456;
        return base64_encode($id);
    }

    public function decrypt($sData) {
        $url_id = base64_decode($sData);
        $id = (double) $url_id / 543544.456;
        return $id;
    }

    /*     * ******************************************** */





    /*     * ********************************************* */

    public function getexamcompstargetspaymentaddon() {
        $this->loadModel('Paymentdetails');



        $Targetusers = $this->Paymentdetails->find('all', array('fields' => array('id')))->where(['Paymentdetails.userid' => $this->request->getSession()->read('sessionname'), 'Paymentdetails.type' => 'addon']);

        if ($Targetusers->count() > 0) {


            $examcode = "";
            foreach ($Targetusers as $tar) {
                $examcode .= $tar['id'] . ',';
            }
        } else {
            $examcode = 0;
        }
        return rtrim($examcode, ',');
    }

    public function getalltopiccodesformodulesaddon() {

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        //  if ($this->request->is(array('ajax'))) { 

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargetspaymentaddon();

        $compereanameslist = new TargetController();

        $userid = $this->request->getSession()->read('sessionname');
        $categoryname = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $getcatn = $categoryname->scheduleoption;

        // echo count($Targetusers);
        //exit;

        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT DISTINCT  tc.level,tc.id as tcid, tc.status as tctstatus,tc.skip as tcskip,t.productname as tname , t.productcode as ecode
    , tc.topiccode as tcode
    , tc.lesson as lcode
    , tc.level as lecode
	, tc.score as escore
	, tc.targetname as targetname
	, tc.levelname as levelname
FROM paymentdetails t
INNER JOIN modulecomps tc
    on t.id = tc.target_id
 WHERE tc.target_id IN (' . $Targetusers . ') order by tc.id asc';




        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            if ($lecode == 1)
                $flevel = 'Level 1';
            else if ($lecode == 2)
                $flevel = 'Level 2';
            else if ($lecode == 3)
                $flevel = 'Level 3';
            else if ($lecode == 4)
                $flevel = 'Level 4';
            else if ($lecode == 5)
                $flevel = 'Level 5';
            else if ($lecode == 7)
                $flevel = 'Basic';


            $urlforeach = $this->weburlmainsite . "users/viewgraphforstudents/" . $lecode . "/" . $lcode;


            $actionname = '<a href=# style=cursor:pointer; onclick=openmodalboxforlearning(' . $tcode . ',' . $lecode . ',"' . $urlforeach . '");return false;>Learning Modules</a>';

//$actionname ='<a href="#" style="cursor:pointer;" onclick="openmodalboxforlearning('.$tcode.','.$lecode.');return false;">Learning Modules</a>';


            if ($tcskip == 0) {
                $stat = "Skip it";
            } else {
                $stat = "Skipped";
            }

            $tcskip = '<a id=' . $tcid . ' style="cursor:pointer"  onclick=skipthelesson(' . $tcid . ',' . $tcskip . ',1)>' . $stat . '</a>';

            //'tcskip' => html_entity_decode($tcskip),

            $post_item1 = array(
                /*  'esid' => html_entity_decode($esid), */
                'tname' => html_entity_decode($tname),
                'ecode' => html_entity_decode($ecode),
                'tcode' => html_entity_decode($tcode),
                /* 'lcode' => html_entity_decode($compereanameslist->getlesson($lcode)),
                  'lecode' => html_entity_decode($compereanameslist->getlevel($lecode)), */
                'lcode' => html_entity_decode($targetname),
                'lecode' => html_entity_decode($flevel),
                'escore' => html_entity_decode($escore),
                'tctstatus' => html_entity_decode($tctstatus),
                'tcskip' => html_entity_decode($tcskip),
                'actionname' => html_entity_decode($actionname)
            );







            // Push to "data"
            array_push($posts_arr1, $post_item1);
            // array_push($posts_arr['data'], $post_item);
        }

        $json_data = array("data" => $posts_arr1);
        echo json_encode($json_data);

        //	}
    }

    public function getexamcompstargetspayment() {
        $this->loadModel('Paymentdetails');



        $Targetusers = $this->Paymentdetails->find('all', array('fields' => array('id')))->where(['Paymentdetails.userid' => $this->request->getSession()->read('sessionname'), 'Paymentdetails.type' => 'modules']);

        if ($Targetusers->count() > 0) {


            $examcode = "";
            foreach ($Targetusers as $tar) {
                $examcode .= $tar['id'] . ',';
            }
        } else {
            $examcode = 0;
        }
        return rtrim($examcode, ',');
    }

    public function getalltopiccodesformodules() {

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        //  if ($this->request->is(array('ajax'))) { 

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');



        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargetspayment();



        $compereanameslist = new TargetController();

        $userid = $this->request->getSession()->read('sessionname');
        $categoryname = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $getcatn = $categoryname->scheduleoption;

        // echo count($Targetusers);
        //exit;

        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT DISTINCT  tc.level,tc.id as tcid, tc.status as tctstatus,tc.skip as tcskip,t.productname as tname , t.productcode as ecode
    , tc.topiccode as tcode
    , tc.lesson as lcode
    , tc.level as lecode
	, tc.score as escore
	, tc.targetname as targetname
	, tc.levelname as levelname
FROM paymentdetails t
INNER JOIN modulecomps tc
    on t.id = tc.target_id
 WHERE tc.target_id IN (' . $Targetusers . ') order by tc.id asc';




        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            if ($lecode == 1)
                $flevel = 'Level 1';
            else if ($lecode == 2)
                $flevel = 'Level 2';
            else if ($lecode == 3)
                $flevel = 'Level 3';
            else if ($lecode == 4)
                $flevel = 'Level 4';
            else if ($lecode == 5)
                $flevel = 'Level 5';
            else if ($lecode == 7)
                $flevel = 'Basic';



            $urlforeach = $this->weburlmainsite . "users/viewgraphforstudents/" . $lecode . "/" . $lcode;


            $actionname = '<a href=# style=cursor:pointer; onclick=openmodalboxforlearning(' . $tcode . ',' . $lecode . ',"' . $urlforeach . '","' . $this->request->getSession()->read('sessionname') . '");return false;>Learning Modules</a>';

            if ($tcskip == 0) {
                $stat = "Skip it";
            } else {
                $stat = "Skipped";
            }

            $tcskip = '<a id=' . $tcid . ' style="cursor:pointer"  onclick=skipthelesson(' . $tcid . ',' . $tcskip . ',1)>' . $stat . '</a>';

            //'tcskip' => html_entity_decode($tcskip),														
//$actionname ='<a href="#" style="cursor:pointer;" onclick="openmodalboxforlearning('.$tcode.','.$lecode.');return false;">Learning Modules</a>';

            $post_item1 = array(
                /*  'esid' => html_entity_decode($esid), */
                'tname' => html_entity_decode($tname),
                'ecode' => html_entity_decode($ecode),
                'tcode' => html_entity_decode($tcode),
                /* 'lcode' => html_entity_decode($compereanameslist->getlesson($lcode)),
                  'lecode' => html_entity_decode($compereanameslist->getlevel($lecode)), */
                'lcode' => html_entity_decode($targetname),
                'lecode' => html_entity_decode($flevel),
                'escore' => html_entity_decode($escore),
                'tctstatus' => html_entity_decode($tctstatus),
                'tcskip' => html_entity_decode($tcskip),
                'actionname' => html_entity_decode($actionname)
            );







            // Push to "data"
            array_push($posts_arr1, $post_item1);
            // array_push($posts_arr['data'], $post_item);
        }

        $json_data = array("data" => $posts_arr1);
        echo json_encode($json_data);

        //	}
    }

    public function savestudentinfobuyadminmodules() {

        $this->autoRender = false;


        if ($this->request->is(array('ajax'))) {

            $id = $_POST['useridforrow'];

            $moodleid = $_POST['useridsavemoodle'];

            $user = $this->Users->get($id, [
                'contain' => []
            ]);
            $this->request->data['scheduleoption'] = $_POST['scheduleoption'];
            $this->request->data['inscoursename'] = $_POST['course'];


            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                //echo "saved";
            }

            //exit;


            if ($_POST['scheduleoption'] == 'Module wise') {

                $this->loadModel('Paymentdetails');
                $optionalblockTable = TableRegistry::get('paymentdetails');


                foreach ($_POST["modules"] as $selectedOption) {

                    if ($selectedOption != NULL) {

                        $blockt = $optionalblockTable->newEntity();

                        $blockt->type = 'modules';
                        $blockt->userid = $id;
                        $blockt->productcode = $selectedOption;
                        $blockt->productname = $this->getsemname($selectedOption);

                        $blockt->razorpay_payment_id = '-';
                        $blockt->razorpay_order_id = '-';
                        $blockt->merchant_order_id = '-';
                        $blockt->price = '-';
                        date_default_timezone_set('Asia/Kolkata');

                        $blockt->datetime = date('d-m-Y H:i');

                        if ($optionalblockTable->save($blockt)) {
                            
                        }
						
										/*****************************target modules feature****************************************/
				/*   $row = array('moduleid' =>  $selectedOption);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'ims/moduletargets.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		
		$examcode = "";
		foreach($topiccodes as $tcode) {
		
		

            $targetcode = $tcode['targetcode'];
			   $examcode .= $tcode['targetcode'] . ',';
			
            $this->loadModel('Target');

            $optionalblockTable = TableRegistry::get('target');
           $conditions = ['users_id' => $id, 'examcode' => $targetcode];
            $exists = $optionalblockTable->exists($conditions);
           if ($exists) {

        
            }
            else {

            $blockt = $optionalblockTable->newEntity();
            $blockt->targettype = 'EEP';
            $blockt->name = $tcode['targetname'];
            $blockt->users_id = $id;
            $blockt->examcode = $selectedOption;
			$optionalblockTable->save($blockt);
			}
		}*/
				/*******************************************************************/
				
				
					/****** evaluate modulecomps ************************************/
				 /*       $this->loadModel('Target');


	  
	  $Targetusers = rtrim($examcode, ',');

       

        $myArray = explode(',', $Targetusers);

      


        $row = array('id' => $myArray);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));




        $context1 = stream_context_create($options1);
        $result1 = file_get_contents($this->mainurl . 'ims/getexamcomps.php', false, $context1);
        $topiccodes = json_decode($result1, true);

  
        if ($topiccodes['message'] == 'No records Found') {

        }

  $this->loadModel('Targetcomps');
   $compereanameslist = new TargetcompsController();
            
        foreach ($topiccodes as $target) {

            

            $returncompreadid = $compereanameslist->returncompreadids($target['competency_code']);


            $competency_code = $target['competency_code'];

            $targetcode = $target['targetcode'];

            $level = $target['level'];



           $compereanameslist->gettopicsforstudentsloop($returncompreadid, $competency_code, $targetcode, $level);


                                    
        */
				/*******************************************************************/
						
						
                    }
                }


                /* return $this->redirect(array(
                  'controller' => 'Targetcomps',
                  'action' => 'evalauetargetcompsformodulesadmin/'.$id.'/'.$moodleid)); */

                $compereanameslist = new TargetcompsController();
                $comlistforstudent = $compereanameslist->evalautemodsbyadmin($id, $moodleid);
            }
            if ($_POST['scheduleoption'] == 'Add-on Course') {



                $this->loadModel('Paymentdetails');
                $optionalblockTable = TableRegistry::get('paymentdetails');



                foreach ($_POST["addoncourse"] as $selectedOption) {

                    if ($selectedOption != NULL) {

                        $blockt = $optionalblockTable->newEntity();

                        $blockt->type = 'addon';
                        $blockt->userid = $id;
                        $blockt->productcode = $selectedOption;
                        $blockt->productname = $this->geticcname($selectedOption);

                        $blockt->razorpay_payment_id = '-';
                        $blockt->razorpay_order_id = '-';
                        $blockt->merchant_order_id = '-';
                        $blockt->price = '-';
                        date_default_timezone_set('Asia/Kolkata');

                        $blockt->datetime = date('d-m-Y H:i');

                        if ($optionalblockTable->save($blockt)) {
                            
                        }
                    }
                }

                $compereanameslist = new TargetcompsController();
                $comlistforstudent = $compereanameslist->evalauetargetcompsforiccmodsadminnew($id, $moodleid);

                /* return $this->redirect(array(
                  'controller' => 'Targetcomps',
                  'action' => 'evalauetargetcompsforiccmodsadmin/'.$id.'/'.$moodleid)); */
            }
        }
        EXIT;
    }

    public function getredirectionformos() {
        $this->autoRender = false;
        $price1 = $_GET['fjhqhjqew'];
        $uid = $_GET['uid'];
        $name = $_GET['name'];
        $pid = $_GET['pid'];
        $modules = $_GET['type'];
        $this->redirect($this->weburlmainsite . 'razor/pay.php?type=' . $modules . '&fjhqhjqew=' . $price1 . '&uid=' . $uid . '&name=' . $name . '&pid=' . $pid . '');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['studentcv', 'paymentpddf', 'pricing', 'emailconfirm', 'register', 'login', 'uploadfile', 'password', 'sendResetEmail', 'reset', 'logout', 'emailCheck', 'usernameCheck']);
    }

}
