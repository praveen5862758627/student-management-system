<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

Configure::load('myconfig');

/**
 * Target Controller
 *
 * @property \App\Model\Table\TargetTable $Target
 *
 * @method \App\Model\Entity\Target[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TargetController extends AppController {
    /* 	public $weburl = 'https://sms.loc/';

      private $url1 = 'https://api.loc/ims/smsread.php'; */
//  private $weburlmainsite = 'https://nsms.odinlearning.in/';
  //  public $weburl = 'https://nsms.odinlearning.in/';
    //private $url1 = 'https://napi.odinlearning.in/ims/smsread.php';
   // private $mainurl = 'https://napi.odinlearning.in/';
    private $options1 = array(
        'http' => array(
            'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
            "Content-Type: application/json\r\n",
            'method' => 'POST',
    ));

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function initialize() {
        parent::initialize();

        //if($this->request->session()->read('sessionname2') != 1 )
        //	die("Access Denied");
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

    public function getallusergrade() {
        $this->autoRender = false;
        //$Events = $this->Events->find('all')->where(['Events.userid' => $this->request->getSession()->read('sessionname')]);
        // $Events = $this->Events->find('all')->where(['Events.userid' => 29]);
        $conn = ConnectionManager::get('default');

        $querytcomps = 'SELECT name,grade FROM target where ( users_id = ' . $this->request->getSession()->read('sessionname') . ')';




        $stmt1 = $conn->execute($querytcomps);
        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);
            $post_item1 = array(
                'y' => html_entity_decode($name),
                'a' => html_entity_decode($grade)
            );


            array_push($posts_arr1, $post_item1);
        }



        $Events = $posts_arr1;


        echo json_encode($Events);
    }

    public function getalluserprogress() {
        $this->autoRender = false;
        //$Events = $this->Events->find('all')->where(['Events.userid' => $this->request->getSession()->read('sessionname')]);
        // $Events = $this->Events->find('all')->where(['Events.userid' => 29]);
        $conn = ConnectionManager::get('default');

        $querytcomps = 'SELECT name,progress FROM target where ( users_id = ' . $this->request->getSession()->read('sessionname') . ')';




        $stmt1 = $conn->execute($querytcomps);
        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);
            $post_item1 = array(
                'y' => html_entity_decode($name),
                'a' => html_entity_decode($progress)
            );


            array_push($posts_arr1, $post_item1);
        }



        $Events = $posts_arr1;


        echo json_encode($Events);
    }

    public function index() {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $target = $this->paginate($this->Target);

        $this->set(compact('target'));
    }

    /**
     * View method
     *
     * @param string|null $id Target id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $target = $this->Target->get($id, [
            'contain' => ['Users', 'Targetcomps']
        ]);

        $this->set('target', $target);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $target = $this->Target->newEntity();
        if ($this->request->is('post')) {
            $target = $this->Target->patchEntity($target, $this->request->getData());
            if ($this->Target->save($target)) {
                $this->Flash->success(__('The target has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The target could not be saved. Please, try again.'));
        }
        $users = $this->Target->Users->find('list', ['conditions' => ['Users.userroles_id' => 2], 'limit' => 200]);
//	var_dump($users);
        //exit;
        $context1 = stream_context_create($this->options1);
        $result1 = file_get_contents($this->url1, false, $context1);


        $topiccodes = json_decode($result1, true);
        $this->set(compact('target', 'users', 'topiccodes'));
    }

    public function Evaluate() {
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Target id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $target = $this->Target->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $target = $this->Target->patchEntity($target, $this->request->getData());
            if ($this->Target->save($target)) {
                $this->Flash->success(__('The target has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The target could not be saved. Please, try again.'));
        }
        $users = $this->Target->Users->find('list', ['limit' => 200]);
        $this->set(compact('target', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Target id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $target = $this->Target->get($id);
        if ($this->Target->delete($target)) {
            $this->Flash->success(__('The target has been deleted.'));
        } else {
            $this->Flash->error(__('The target could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function compereanameslistnotforicc() {

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


            $tragetids = $this->gettopicidforthecompreanotforicc();

            $gettopicids = $this->gettopicidformcompsthecomprea($tragetids);






            $row = array('id' => $gettopicids);
            $data = json_encode($row);
            $options1 = array(
                'http' => array(
                    'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                    "Content-Type: application/json\r\n",
                    'method' => 'POST',
                    'content' => $data,
            ));


            $context1 = stream_context_create($options1);
            $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/compreanamelist.php', false, $context1);
            $topiccodes = json_decode($result1, true);

            $useridmoodle = $this->request->getSession()->read('moodleuid');


            /* $tragetids = $this->gettopicidforthecomprea();
              $gettopicids    =  $this->gettopicidformcompsthecomprea($tragetids); */
            $posts_arr1 = array();
            foreach ($topiccodes as $target) {


                $view = '<a href="#" style="cursor:pointer;" onclick="openmodalboxforlearningcomprea(' . $target['id'] . ');return false;">View</a>';

                $baseline = $this->getscoreforbaseline1($target['code'], $useridmoodle, $gettopicids, $tragetids);


                if ($baseline[0] == 'nan%')
                    $returnc = '0.00%';
                else
                    $returnc = $baseline[0];



                $minutes = $baseline[1];

                $minutes1 = $baseline[2];





                $post_item1 = array(
                    'name' => html_entity_decode($target['name']),
                    'description' => html_entity_decode($target['description']),
                    'view' => html_entity_decode($view),
                    'total' => html_entity_decode($this->convertTime($minutes)),
                    'remaing' => html_entity_decode($this->convertTime($minutes1)),
                    'percentge' => html_entity_decode($returnc)
                );

                array_push($posts_arr1, $post_item1);
            }

            $json_data = array("data" => $posts_arr1);

            echo json_encode($json_data);
        }
    }

    public function comperaforprofile() {
        $this->autoRender = false;



        $tragetids = $this->gettopicidforthecomprea();

        $gettopicids = $this->gettopicidformcompsthecomprea($tragetids);


        $row = array('id' => $gettopicids);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/compreanamelist.php', false, $context1);
        $topiccodes = json_decode($result1, true);

        $useridmoodle = $this->request->getSession()->read('sessionname');


        /* $tragetids = $this->gettopicidforthecomprea();
          $gettopicids    =  $this->gettopicidformcompsthecomprea($tragetids); */



        $posts_arr1 = array();
        foreach ($topiccodes as $target) {

            $baseline = $this->getscoreforbaseline1($target['code'], $useridmoodle, $gettopicids, $tragetids);




            if ($baseline[0] == 'nan%')
                $returnc = '0.00%';
            else
                $returnc = $baseline[0];


            //echo $returncn = substr($returnc, 0, -1).'<br />';



            $returncn = substr($returnc, 0, -1);


            $post_item1 = array(
                'name' => html_entity_decode($target['name']),
                'percentge' => html_entity_decode($returncn)
            );

            array_push($posts_arr1, $post_item1);
        }



        return $posts_arr1;
    }

    public function compereanameslistnew() {

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        // if ($this->request->is(array('ajax'))) { 

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


        $tragetids = $this->gettopicidforthecomprea();

        $gettopicids = $this->gettopicidformcompsthecomprea($tragetids);






        $row = array('id' => $gettopicids);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/compreanamelist.php', false, $context1);
        $topiccodes = json_decode($result1, true);

        $useridmoodle = $this->request->getSession()->read('sessionname');


        /* $tragetids = $this->gettopicidforthecomprea();
          $gettopicids    =  $this->gettopicidformcompsthecomprea($tragetids); */
        $posts_arr1 = array();
        $returnc1 = "";

        $i = 0;
        foreach ($topiccodes as $target) {


            $view = '<a href="#" style="cursor:pointer;" onclick="openmodalboxforlearningcomprea(' . $target['id'] . ');return false;">View</a>';


            $baseline = $this->getscoreforbaseline1($target['code'], $useridmoodle, $gettopicids, $tragetids);


            if ($baseline[0] == 'nan%')
                $returnc = '0.00';
            else
                $returnc = $baseline[0];



            /* $minutes = $this->getscoreforbaseline1($target['code'],$useridmoodle,$gettopicids,$tragetids)[1];

              $minutes1 = $this->getscoreforbaseline1($target['code'],$useridmoodle,$gettopicids,$tragetids)[2];





              $post_item1 = array(

              'name' => html_entity_decode($target['name']),
              'description' => html_entity_decode($target['description']),
              'view' => html_entity_decode($view),
              'total' => html_entity_decode($this->convertTime($minutes)),
              'remaing' => html_entity_decode($this->convertTime($minutes1)),
              'percentge' => html_entity_decode($returnc)


              );

              array_push($posts_arr1, $post_item1); */

            $returnc1 += $returnc;
            $i++;
        }



        /* $json_data = array("data"            => $posts_arr1 );

          echo json_encode($json_data); */

        //echo ;
        echo number_format((float) $returnc1 / $i, 2, '.', '');
        exit;


        //}
    }

    public function compereanameslist() {

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


            $tragetids = $this->gettopicidforthecomprea();

            $gettopicids = $this->gettopicidformcompsthecomprea($tragetids);






            $row = array('id' => $gettopicids);
            $data = json_encode($row);
            $options1 = array(
                'http' => array(
                    'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                    "Content-Type: application/json\r\n",
                    'method' => 'POST',
                    'content' => $data,
            ));


            $context1 = stream_context_create($options1);
            $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/compreanamelist.php', false, $context1);
            $topiccodes = json_decode($result1, true);

            $useridmoodle = $this->request->getSession()->read('sessionname');


            /* $tragetids = $this->gettopicidforthecomprea();
              $gettopicids    =  $this->gettopicidformcompsthecomprea($tragetids); */
            $posts_arr1 = array();
            foreach ($topiccodes as $target) {


                $view = '<a href="#" style="cursor:pointer;"  onclick=\'openmodalboxforlearningcomprea("'. $target['id'].'","'.$target['code'] .'")\'    >Launch test</a>';

                $baseline = $this->getscoreforbaseline1($target['code'], $useridmoodle, $gettopicids, $tragetids);


                if ($baseline[0] == 'nan%')
                    $returnc = '0.00%';
                else
                    $returnc = $baseline[0];



                $minutes = $baseline[1];

                $minutes1 = $baseline[2];





                $post_item1 = array(
                    'name' => html_entity_decode($target['name']),
                    'description' => html_entity_decode($target['description']),
                    'view' => html_entity_decode($view),
                    'total' => html_entity_decode($this->convertTime($minutes)),
                    'remaing' => html_entity_decode($this->convertTime($minutes1)),
                    'percentge' => html_entity_decode($returnc)
                );

                array_push($posts_arr1, $post_item1);
            }

            $json_data = array("data" => $posts_arr1);

            echo json_encode($json_data);
        }
    }

    public function gettopicidforthecompreanotforicc() {

        $id = $this->request->getSession()->read('sessionname');



        $Targetusers = $this->Target->find('all', array('fields' => array('id')))->where(['Target.users_id' => $id, 'Target.targettype !=' => 'ICC']);

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

    public function gettopicidformcompsthecomprea($tragetids) {
        $conn = ConnectionManager::get('default');
        // $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT topiccode FROM  targetcomps  WHERE target_id IN (' . $tragetids . ') and skip != 1 GROUP BY topiccode order by id asc';


        $stmt1 = $conn->execute($querytcomps);
        $examcode = "";
        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);
            $examcode .= $topiccode . ',';
        }
        return rtrim($examcode, ',');
    }

    public function gettopicidforthecomprea() {

        $id = $this->request->getSession()->read('sessionname');



        $Targetusers = $this->Target->find('all', array('fields' => array('id')))->where(['Target.users_id' => $id,'Target.targettype' => 'EEP']);

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
	
	public function getacademictargets()
	{
		
		   $this->autoRender = false;

        //$this->log('You are here', 'debug');
      //  if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

		$fcomps = $this->getallthetopiccodesforsem();
		
		    $arraa =  explode(',', $fcomps);
      

 $result = "'" . implode ( "','", $arraa ) . "'";

  $row = array('targetcode' => $result);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getlistoftarcompare.php', false, $context1);
        $topiccodes = json_decode($result1, true);

       /// $useridmoodle = $this->request->getSession()->read('sessionname');


        /* $tragetids = $this->gettopicidforthecomprea();
          $gettopicids    =  $this->gettopicidformcompsthecomprea($tragetids); */
        $posts_arr1 = array();
        $returnc1 = "";

        $i = 0;
		$examcode = "";
        foreach ($topiccodes as $target) {
			$gettopicids = $target['competency_code'];
			
			 /*$arraa =  explode(',', $gettopicids);
      

 $result = "'" . implode ( "','", $arraa ) . "'";*/
			
			
			
			
			
		  $examcode .= $gettopicids . ',';
		}
		
		 $gettopicids = rtrim($examcode, ',');
		
		
		
		
		$row = array('compreaa' => $gettopicids);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getalltopicsnewtarget.php', false, $context1);
        $topiccodes = json_decode($result1, true);

      

        $posts_arr1 = array();
        foreach ($topiccodes['data'] as $target) {
			
			$tcode = $target['topicid'];
			$lcode = $target['lessoncode'];
			$lecode = $target['levelfortarget'];
			
			$cmpid = $target['cmpid'];
			

        $urlforeach = Configure::read('MyConf.weburlmainsite') . "users/viewgraphforstudents/" . $lecode . "/" . $lcode;


            $actionname = '<a href=# style=cursor:pointer;color:blue;text-decoration:underline onclick=openmodalboxforlearning(' . $tcode . ',' . $lecode . ',"' . $urlforeach . '","' . $this->request->getSession()->read('sessionname') . '");return false;>Learning Modules</a>';

            $viewmarkscard = '<a href=# style=cursor:pointer;color:blue;text-decoration:underline onclick=viemarkfrostu('.$tcode.','.$cmpid.')>View</a>';


            $post_item1 = array(
                'name' => html_entity_decode($target['name']),
                'comparea_id' => html_entity_decode($target['comparea_id']),
				'description' => html_entity_decode($target['description']),
				
				'markscard' => html_entity_decode($viewmarkscard),
				'action' => html_entity_decode($actionname)
            );

            array_push($posts_arr1, $post_item1);
        }
		  $json_data = array("data" => $posts_arr1);

            // Turn to JSON & output
            echo json_encode($json_data);
		
	//}
	}
	
		    public function getallthetopiccodesforsemadmin($id) {

       



        $Targetusers = $this->Target->find('all', array('fields' => array('examcode')))->where(['Target.users_id' => $id, 'Target.targettype'=>'SEM']);

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
	
	public function getacademictargetsadmn()
	{
		
		   $this->autoRender = false;

        //$this->log('You are here', 'debug');
      //  if ($this->request->is(array('ajax'))) {

            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$userid = $_POST['userid'];
		$fcomps = $this->getallthetopiccodesforsemadmin($userid);
		
		    $arraa =  explode(',', $fcomps);
      

 $result = "'" . implode ( "','", $arraa ) . "'";

  $row = array('targetcode' => $result);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getlistoftarcompare.php', false, $context1);
        $topiccodes = json_decode($result1, true);

       /// $useridmoodle = $this->request->getSession()->read('sessionname');


        /* $tragetids = $this->gettopicidforthecomprea();
          $gettopicids    =  $this->gettopicidformcompsthecomprea($tragetids); */
        $posts_arr1 = array();
        $returnc1 = "";

        $i = 0;
		$examcode = "";
        foreach ($topiccodes as $target) {
			$gettopicids = $target['competency_code'];
			
			 /*$arraa =  explode(',', $gettopicids);
      

 $result = "'" . implode ( "','", $arraa ) . "'";*/
			
			
			
			
			
		  $examcode .= $gettopicids . ',';
		}
		
		 $gettopicids = rtrim($examcode, ',');
		
		
		
		
		$row = array('compreaa' => $gettopicids);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getalltopicsnewtarget.php', false, $context1);
        $topiccodes = json_decode($result1, true);

      

        $posts_arr1 = array();
        foreach ($topiccodes['data'] as $target) {
			
			$tcode = $target['topicid'];
			$lcode = $target['lessoncode'];
			$lecode = $target['levelfortarget'];
			

        $urlforeach = Configure::read('MyConf.weburlmainsite') . "users/viewgraphforstudents/" . $lecode . "/" . $lcode;


            $actionname = '<input type="text" id="exampleForm2" class="form-control" placeholder="Enter Marks">';



            $post_item1 = array(
                'name' => html_entity_decode($target['name']),
                'comparea_id' => html_entity_decode($target['comparea_id']),
				//'description' => html_entity_decode($target['description']),
				'action' => html_entity_decode($actionname)
            );

            array_push($posts_arr1, $post_item1);
        }
		  $json_data = array("data" => $posts_arr1);

            // Turn to JSON & output
            echo json_encode($json_data);
		
	//}
	}
	
	    public function getallthetopiccodesforsem() {

        $id = $this->request->getSession()->read('sessionname');



        $Targetusers = $this->Target->find('all', array('fields' => array('examcode')))->where(['Target.users_id' => $id, 'Target.targettype'=>'SEM']);

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
    ,  tc.studyduration as studyduration
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
            // $t=$this->getstudydurationforeach($lcode)/60;

            $t = $studyduration / 60;


            //level

            $finaldatalist = $this->getquizesforgetdeatils($lecode, $lcode);



            foreach ($finaldatalist as $topiccodes1) {


                $gradeff = $this->getscoreforbaselinegetscore($id, $useridmoodle, $gettopicids, $tragetids, $topiccodes1['code']);
                // $examcode .= $gradeff.'-'; 
                //$gradeff =$topiccodes1['courseid'];
                //if($gradeff != ""){



                if ($gradeff == 'Pass') {
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

    public function getscoreforbaselinegetscore($id, $useridmoodle, $gettopicids, $tragetids, $courseid) {




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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'sms/couserquizes.php', false, $context1);

        $topiccodes = json_decode($result1, true);

        return $topiccodes[0]['Grade'];
    }

}
