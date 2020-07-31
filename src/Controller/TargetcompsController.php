<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Cache\Cache;
use Cake\Http\Client;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Configure;

Configure::load('myconfig');

/**
 * Targetcomps Controller
 *
 * @property \App\Model\Table\TargetcompsTable $Targetcomps
 *
 * @method \App\Model\Entity\Targetcomp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TargetcompsController extends AppController {
    /* public $weburl = 'https://api.loc/';
      private $url1 = 'https://api.loc/cmd/read.php'; */

  //  public $weburl = 'https://napi.odinlearning.in/';
 //   private $url1 = 'https://napi.odinlearning.in/cmd/read.php';
    private $options1 = array(
        'http' => array(
            'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
            "Content-Type: application/json\r\n",
            'method' => 'POST',
    ));

    public function initialize() {
        parent::initialize();

        //if($this->request->session()->read('sessionname2') != 1 )
        //	die("Access Denied");
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Target']
        ];
        $targetcomps = $this->paginate($this->Targetcomps);

        $this->set(compact('targetcomps'));
    }

    /**
     * View method
     *
     * @param string|null $id Targetcomp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $targetcomp = $this->Targetcomps->get($id, [
            'contain' => ['Target']
        ]);

        $this->set('targetcomp', $targetcomp);
    }

    public function getexamcompstargets($type) {
        $this->loadModel('Target');
        $Targetusers = $this->Target->find('all', array('fields' => array('examcode', 'id')))->where(['Target.users_id' => $this->request->getSession()->read('sessionname'), 'Target.targettype' => $type]);

        //	if( $Targetusers->count() > 0 ) {


        $examcode = "";
        foreach ($Targetusers as $tar) {
            $examcode .= $tar['examcode'] . ',';
        }
        /* } else {
          $examcode =0;
         */
        return rtrim($examcode, ',');
    }

    public function getexamcompstargetssem($id, $type) {
        $this->loadModel('Target');
        $Targetusers = $this->Target->find('all', array('fields' => array('examcode', 'id')))->where(['Target.users_id' => $id, 'Target.targettype' => $type]);

        //	if( $Targetusers->count() > 0 ) {


        $examcode = "";
        foreach ($Targetusers as $tar) {
            $examcode .= $tar['examcode'] . ',';
        }
        /* } else {
          $examcode =0;
         */
        return rtrim($examcode, ',');
    }

    public function getexamcompstargetsids($type) {
        $this->loadModel('Target');
        $Targetusers = $this->Target->find('all', array('fields' => array('examcode', 'id')))->where(['Target.users_id' => $this->request->getSession()->read('sessionname'), 'Target.targettype' => $type]);

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

    public function evalauetargetcomps() {

        //$this->Flash->success(__("Please wait... Don't refresh the page until we process your request."));
        //$gettragetidsfordelete = $this -> getexamcompstargetsids('EEP');
        $this->loadModel('Target');


        $gettragetidsfordelete = $this->getexamcompstargetsids('EEP');


        $Targetusers = $this->getexamcompstargets('EEP');

       

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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getexamcomps.php', false, $context1);
        $topiccodes = json_decode($result1, true);

        //  $optionalblockTable = TableRegistry::get('targetcomps');
        // 
        if ($topiccodes['message'] == 'No records Found') {

            $gettragetidsfordelete = $this->getexamcompstargetsids('EEP');

            $this->Flash->error(__('No records found to be processed. Please, try again.'));
            return $this->redirect(['controller' => 'users']);
        }

        //	$articlesTable = TableRegistry::get('targetcomps');
        //$i = 0;

        foreach ($topiccodes as $target) {



            $returncompreadid = $this->returncompreadids($target['competency_code']);


            $competency_code = $target['competency_code'];

            $targetcode = $target['targetcode'];

            $level = $target['level'];



            $this->gettopicsforstudentsloop($returncompreadid, $competency_code, $targetcode, $level);


                                    
        }

       


        $this->Flash->success(__('Targets are now aligned to you. If you want to optimize your efforts based on your existing expertise/competency, take the baseline test from the baseline section in the sidebar. If you do not take the baseline test, ODIN will map you to level 1 and plan and schedule your lessons accordingly. You may take the baseline test at any time from the baseline section in the sidebar.'));

        $this->redirect(array(
            'controller' => 'users',
            'action' => 'index'
        ));
    }
	
	
	
	  public function gettopicsforstudentsloopnew($returncompreadid, $competency_code, $targetcode, $level,$uid) {

        $this->autoRender = false;
        

        $targetcomp = $this->Targetcomps->newEntity();




        $row1 = array('id' => $returncompreadid);
        $data1 = json_encode($row1);
        $options11 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data1,
        ));




        $context11 = stream_context_create($options11);
        $result11 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getexamcomps.php', false, $context11);
        $topiccodes1 = json_decode($result11, true);

        foreach ($topiccodes1 as $target1) {

          


            $conn = ConnectionManager::get('default');



            $topiccode = $target1['id'];
            $targetid = $this->gettargetidlocalnew($targetcode,$uid);
            $lessonid = $this->gettopiccodeforstudent1($topiccode);

            $level1 = $this->gettopiccodeforstudentlevls($targetcode, $competency_code);


            $compereanameslist = new TargetController();
            $lename = $compereanameslist->getlesson($lessonid);
            $lvelname = $compereanameslist->getlevel($level1);
            $studyduration = $compereanameslist->getstudydurationforeach($lessonid);


             $lessonid = $this ->gettopiccodeforstudent1($topiccode);
	
	  
	

         $querytcomps = 'INSERT INTO targetcomps (target_id, topiccode, level, lesson, score ,targetname,levelname,studyduration) VALUES ("'.$targetid.'","'.$topiccode.'","'.$level1.'","'.$lessonid.'","-","'.$lename.'","'.$lvelname.'","'.$studyduration.'");';






            $blocks = $this->Targetcomps->find('list')->where(['Targetcomps.target_id' => $targetid, 'Targetcomps.topiccode' => $topiccode ,'Targetcomps.level' => $level1, 'Targetcomps.lesson' => $lessonid ])->count();


if( $blocks== 0) {
       $stmt1 = $conn->execute($querytcomps);
}



          
        }
    }

    public function gettopicsforstudentsloop($returncompreadid, $competency_code, $targetcode, $level) {

        $this->autoRender = false;
        

        $targetcomp = $this->Targetcomps->newEntity();




        $row1 = array('id' => $returncompreadid);
        $data1 = json_encode($row1);
        $options11 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data1,
        ));




        $context11 = stream_context_create($options11);
        $result11 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getexamcomps.php', false, $context11);
        $topiccodes1 = json_decode($result11, true);

        foreach ($topiccodes1 as $target1) {

          


            $conn = ConnectionManager::get('default');



            $topiccode = $target1['id'];
            $targetid = $this->gettargetidlocal($targetcode);
            $lessonid = $this->gettopiccodeforstudent1($topiccode);

            $level1 = $this->gettopiccodeforstudentlevls($targetcode, $competency_code);


            $compereanameslist = new TargetController();
            $lename = $compereanameslist->getlesson($lessonid);
            $lvelname = $compereanameslist->getlevel($level1);
            $studyduration = $compereanameslist->getstudydurationforeach($lessonid);


             $lessonid = $this ->gettopiccodeforstudent1($topiccode);
	
	  
	

         $querytcomps = 'INSERT INTO targetcomps (target_id, topiccode, level, lesson, score ,targetname,levelname,studyduration) VALUES ("'.$targetid.'","'.$topiccode.'","'.$level1.'","'.$lessonid.'","-","'.$lename.'","'.$lvelname.'","'.$studyduration.'");';



 $blocks = $this->Targetcomps->find('list')->where(['Targetcomps.target_id' => $targetid, 'Targetcomps.topiccode' => $topiccode ,'Targetcomps.level' => $level1, 'Targetcomps.lesson' => $lessonid ])->count();


if( $blocks== 0) {
       $stmt1 = $conn->execute($querytcomps);
}


          



          
        }
    }

    public function returncompreadids($tid) {
        $this->autoRender = false;
        // $tid = 'CID001';


        $row = array('id' => $tid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/topicgetcode.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['id'];
    }

    public function gettopiccodeforstudent($tid) {
        $this->autoRender = false;
        // $tid = 'CID001';


        $row = array('id' => $tid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/topicgetcode.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        $getcomperaid = $topiccodes[0]['id'];



        $row = array('id' => $getcomperaid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/topicgetcodeid.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['id'];
    }

    public function gettopiccodeforstudentlevls($tid, $competency_code) {
        $this->autoRender = false;


        $row = array('id' => $tid, 'competency_code' => $competency_code);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/topicgetcodelessnew.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['level'];
    }

    public function gettopiccodeforstudent1($tid) {
        $this->autoRender = false;



        $row = array('id' => $tid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/topicgetcodeless.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['id'];
    }

    public function gettargetidlocalsem($examcode, $id) {

        $this->loadModel('Target');
       

        $record = $this->Target->find('all', ['conditions' => ['Target.examcode' => $examcode, 'Target.users_id' => $id]])->first();
        return $record->id;
    }



   public function gettargetidlocalnew($examcode,$uid) {

        $this->loadModel('Target');
        

        $record = $this->Target->find('all', ['conditions' => ['Target.examcode' => $examcode, 'Target.users_id' => $uid]])->first();
        return $record->id;
    }
    public function gettargetidlocal($examcode) {

        $this->loadModel('Target');
        

        $record = $this->Target->find('all', ['conditions' => ['Target.examcode' => $examcode, 'Target.users_id' => $this->request->getSession()->read('sessionname')]])->first();
        return $record->id;
    }

    public function gettargetid($sid) {
        $row = array('id' => $sid);
        $data = json_encode($row);
        $options1 = array(
            'http' => array(
                'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
        ));


        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getexamcode.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['ecode'];
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $targetcomp = $this->Targetcomps->newEntity();
        if ($this->request->is('post')) {
            $targetcomp = $this->Targetcomps->patchEntity($targetcomp, $this->request->getData());
            if ($this->Targetcomps->save($targetcomp)) {
                $this->Flash->success(__('The targetcomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The targetcomp could not be saved. Please, try again.'));
        }
        $targets = $this->Targetcomps->Target->find('list', ['limit' => 200]);
        $context1 = stream_context_create($this->options1);
        $result1 = file_get_contents($this->url1, false, $context1);


        $topiccodes = json_decode($result1, true);
        $this->set(compact('targetcomp', 'targets', 'topiccodes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Targetcomp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $targetcomp = $this->Targetcomps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $targetcomp = $this->Targetcomps->patchEntity($targetcomp, $this->request->getData());
            if ($this->Targetcomps->save($targetcomp)) {
                $this->Flash->success(__('The targetcomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The targetcomp could not be saved. Please, try again.'));
        }
        $targets = $this->Targetcomps->Target->find('list', ['limit' => 200]);
        $this->set(compact('targetcomp', 'targets'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Targetcomp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $targetcomp = $this->Targetcomps->get($id);
        if ($this->Targetcomps->delete($targetcomp)) {
            $this->Flash->success(__('The targetcomp has been deleted.'));
        } else {
            $this->Flash->error(__('The targetcomp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function evalauetargetcompsforsemester() {

        $id = $this->request->pass[0];

        $this->loadModel('Target');


        $gettragetidsfordelete = $this->getexamcompstargetsidssem($id, 'SEM');


        $Targetusers = $this->getexamcompstargetssem($id, 'SEM');



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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getsemestercomps.php', false, $context1);
        $topiccodes = json_decode($result1, true);


        if ($topiccodes['message'] == 'No records Found') {
            $this->Flash->error(__('No records found to process evaluation for EEP. Please, try again.'));
            return $this->redirect(['controller' => 'users']);
        }

        $articlesTable = TableRegistry::get('targetcomps');

        $i = 0;

        foreach ($topiccodes as $target) {
            //	  echo $targetcomp->topiccode = $target['tcode'];
            $targetcomp = $this->Targetcomps->newEntity();
            $examcode = $target['ecode'];


            $compereanameslist = new TargetController();
            $lename = $compereanameslist->getlesson($target['lcode']);
            $lvelname = $compereanameslist->getlevel($target['lecode']);


            $targetcomp->target_id = $this->gettargetidlocalsem($examcode, $id);
            $targetcomp->topiccode = $target['tcode'];
            $targetcomp->level = $target['lecode'];
            $targetcomp->lesson = $target['lcode'];
            $targetcomp->score = $target['escore'];


            $targetcomp->targetname = $lename;
            $targetcomp->levelname = $lvelname;

            $targetcomp->studyduration = $compereanameslist->getstudydurationforeach($target['lcode']);


            if ($this->Targetcomps->save($targetcomp)) {

                $i++;
            }
            //}                             
        }



        $this->redirect(array(
            /* 'controller' => 'users',
              'action' => 'synctocalendarforsem/'.$id */

            'controller' => 'events',
            'action' => 'synctocalendar/' . $id
        ));
    }

    public function evalauetargetcompsforicc() {

        $id = $this->request->pass[0];

        $this->loadModel('Target');


        $gettragetidsfordelete = $this->getexamcompstargetsidssem($id, 'ICC');


        $Targetusers = $this->getexamcompstargetssem($id, 'ICC');

       

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




        /*         * ********************** evaluation for ICC ******************************* */

        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/geticccomps.php', false, $context1);
        $topiccodes = json_decode($result1, true);

        //  $optionalblockTable = TableRegistry::get('targetcomps');
        // 
        if ($topiccodes['message'] == 'No records Found') {
            $this->Flash->error(__('No records found to process evaluation for ICC. Please, try again.'));
            return $this->redirect(['controller' => 'users']);
        }

        $articlesTable = TableRegistry::get('targetcomps');

        $i = 0;

        foreach ($topiccodes as $target) {
            //	  echo $targetcomp->topiccode = $target['tcode'];
            $targetcomp = $this->Targetcomps->newEntity();
            $examcode = $target['ecode'];


            $targetcomp->target_id = $this->gettargetidlocalsem($examcode, $id);
            $targetcomp->topiccode = $target['tcode'];


            $compereanameslist = new TargetController();
            $lename = $compereanameslist->getlesson($target['lcode']);
            $lvelname = $compereanameslist->getlevel($target['lecode']);
            $studyduration = $compereanameslist->getstudydurationforeach($target['lcode']);

            $targetcomp->level = $lvelname;
            $targetcomp->lesson = $lename;
            $targetcomp->studyduration = $studyduration;
            $targetcomp->score = $target['escore'];


   
            if ($this->Targetcomps->save($targetcomp)) {

                $i++;
            }
            //}                             
        }

        $this->Flash->success(__('Evaluation -. [ ' . $i . ' record(s) processed for ICC ]'));

        /*         * *************************** end ********************************************* */


        return $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'index'));
    }

    public function evalauetargetcompsfordep() {


        $id = $this->request->pass[0];
        $this->loadModel('Target');


        $gettragetidsfordelete = $this->getexamcompstargetsidssem($id, 'DEP');


        $Targetusers = $this->getexamcompstargetssem($id, 'DEP');

      
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






        /*         * ******************** evalaution for DEP ********************************* */

        $context1 = stream_context_create($options1);
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getdepcomps.php', false, $context1);
        $topiccodes = json_decode($result1, true);

        //  $optionalblockTable = TableRegistry::get('targetcomps');
        // 
        if ($topiccodes['message'] == 'No records Found') {
            $this->Flash->error(__('No records found to process evaluation for DEP. Please, try again.'));
            return $this->redirect(['controller' => 'users']);
        }

        $articlesTable = TableRegistry::get('targetcomps');

        $i = 0;

        foreach ($topiccodes as $target) {
            //	  echo $targetcomp->topiccode = $target['tcode'];
            $targetcomp = $this->Targetcomps->newEntity();
            $examcode = $target['ecode'];


            $targetcomp->target_id = $this->gettargetidlocalsem($examcode, $id);
            $targetcomp->topiccode = $target['tcode'];
            $targetcomp->level = $target['lecode'];
            $targetcomp->lesson = $target['lcode'];
            $targetcomp->score = $target['escore'];


           
            if ($this->Targetcomps->save($targetcomp)) {

                $i++;
            }
            //}                             
        }

        $this->Flash->success(__('Evaluation -. [ ' . $i . ' record(s) processed for DEP ]'));

        /*         * ************************** end ****************************************** */
        return $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'index'));
    }

    public function evalauetargetcompsformodules() {

        $parameters = $this->request->getAttribute('params');
        if ($parameters['pass'][1] == NULL) {
            $id = $this->request->getSession()->read('sessionname');
        } else {
            $id = $parameters['pass'][1];
        }


        $this->loadModel('Paymentdetails');


        $blocks = $this->Paymentdetails->find('list')->where(['Paymentdetails.userid' => $id, 'Paymentdetails.productcode' => $parameters['pass'][0]])->count();


        if ($blocks == 1) {


            $myArray = explode(',', $parameters['pass'][0]);




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
            $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getsemestercomps.php', false, $context1);
            $topiccodes = json_decode($result1, true);


            if ($topiccodes['message'] == 'No records Found') {
                //$this->Flash->error(__('No records found to process evaluation for modules. Please, try again.'));
                $this->redirect(array(
                    'controller' => 'targetcomps',
                    'action' => 'finalpaymentfailed'

                        /*  'controller' => 'events',
                          'action' => 'synctocalendar/'.$id */
                ));
                //exit;
            } else {
                $this->loadModel('Modulecomps');
                $this->loadModel('Target');
                $articlesTable = TableRegistry::get('modulecomps');

                $i = 0;



                foreach ($topiccodes as $target) {
                    //	  echo $targetcomp->topiccode = $target['tcode'];
                    $targetcomp = $this->Modulecomps->newEntity();
                    $examcode = $target['ecode'];


                    $compereanameslist = new TargetController();
                    $lename = $compereanameslist->getlesson($target['lcode']);
                    $lvelname = $compereanameslist->getlevel($target['lecode']);


                    $targetcomp->target_id = $this->gettargetidlocalmodule($examcode, $id);
                    $targetcomp->topiccode = $target['tcode'];
                    $targetcomp->level = $target['lecode'];
                    $targetcomp->lesson = $target['lcode'];
                    $targetcomp->score = $target['escore'];
                    $targetcomp->userid = $id;

                    $targetcomp->targetname = $lename;
                    $targetcomp->levelname = $lvelname;

                    $targetcomp->studyduration = $compereanameslist->getstudydurationforeach($target['lcode']);
                    
                                    $targetid = $this->gettargetidlocalmodule($examcode, $id);
                    $topiccode = $target['tcode'];
                    
                $level1 = $target['lecode'];
                    $lessonid = $target['lcode'];

                
                
                 $blocks = $this->Modulecomps->find('list')->where(['Modulecomps.target_id' => $targetid, 'Modulecomps.topiccode' => $topiccode ,'Modulecomps.level' => $level1, 'Modulecomps.lesson' => $lessonid ])->count();


if( $blocks== 0) {
    if ($this->Modulecomps->save($targetcomp)) {

                    $i++;
                }
}


                 
                    //}                             
                }
				
				/*****************************target modules feature****************************************/
				   $row = array('moduleid' =>  $parameters['pass'][0]);
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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/moduletargets.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		
		$examcode = "";
		foreach($topiccodes as $tcode) {
		
		

            $selectedOption = $tcode['targetcode'];
			   $examcode .= $tcode['targetcode'] . ',';
			
            $this->loadModel('Target');

            $optionalblockTable = TableRegistry::get('target');
           $conditions = ['users_id' => $this->request->getSession()->read('sessionname'), 'examcode' => $selectedOption];
            $exists = $optionalblockTable->exists($conditions);
           if ($exists) {

               /* echo 'Could not be saved. Target already exists.';
                exit;*/
            }
            else {

            $blockt = $optionalblockTable->newEntity();
            $blockt->targettype = 'EEP';
            $blockt->name = $tcode['targetname'];
            $blockt->users_id = $this->request->getSession()->read('sessionname');
            $blockt->examcode = $selectedOption;
			$optionalblockTable->save($blockt);
			}
		}
				/*******************************************************************/
				
				/****** evaluate modulecomps ************************************/
				        $this->loadModel('Target');


	  
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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getexamcomps.php', false, $context1);
        $topiccodes = json_decode($result1, true);

        //  $optionalblockTable = TableRegistry::get('targetcomps');
        // 
        if ($topiccodes['message'] == 'No records Found') {

       //     $gettragetidsfordelete = $this->getexamcompstargetsids('EEP');

           /* $this->Flash->error(__('No records found to be processed. Please, try again.'));
            return $this->redirect(['controller' => 'users']);*/
        }

        //	$articlesTable = TableRegistry::get('targetcomps');
        //$i = 0;

        foreach ($topiccodes as $target) {



            $returncompreadid = $this->returncompreadids($target['competency_code']);


            $competency_code = $target['competency_code'];

            $targetcode = $target['targetcode'];

            $level = $target['level'];



            $this->gettopicsforstudentsloop($returncompreadid, $competency_code, $targetcode, $level);


                                    
        }
				/*******************************************************************/



                $this->redirect(array(
                    /* 'controller' => 'targetcomps',
                      'action' => 'finalpayment' */

                    'controller' => 'users',
                    'action' => 'synctocalendar'
                ));
            }
        } else {

            echo "Somthing went wrong!.";
            exit;
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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getexamnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
        return $topiccodes[0]['name'];
        //var_dump( $topiccodes);
        //exit;
    }

    public function finalpayment() {
        
    }

    public function finalpaymentfailed() {
        
    }

    public function evalauetargetcompsforiccmods() {

        $parameters = $this->request->getAttribute('params');
        if ($parameters['pass'][1] == NULL) {
            $id = $this->request->getSession()->read('sessionname');
        } else {
            $id = $parameters['pass'][1];
        }

        $this->loadModel('Paymentdetails');


        $blocks = $this->Paymentdetails->find('list')->where(['Paymentdetails.userid' => $id, 'Paymentdetails.productcode' => $parameters['pass'][0]])->count();


        if ($blocks == 1) {


            $myArray = explode(',', $parameters['pass'][0]);




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
            $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/geticccomps.php', false, $context1);
            $topiccodes = json_decode($result1, true);


            if ($topiccodes['message'] == 'No records Found') {
                //$this->Flash->error(__('No records found to process evaluation for Add-On course. Please, try again.'));
                $this->redirect(array(
                    'controller' => 'targetcomps',
                    'action' => 'finalpaymentfailed'

                        /*  'controller' => 'events',
                          'action' => 'synctocalendar/'.$id */
                ));
                //exit;
            } else {
                $this->loadModel('Modulecomps');
                $this->loadModel('Target');
                $articlesTable = TableRegistry::get('modulecomps');

                $i = 0;



                foreach ($topiccodes as $target) {
                    //	  echo $targetcomp->topiccode = $target['tcode'];
                    $targetcomp = $this->Modulecomps->newEntity();
                    $examcode = $target['ecode'];


                    $compereanameslist = new TargetController();
                    $lename = $compereanameslist->getlesson($target['lcode']);
                    $lvelname = $compereanameslist->getlevel($target['lecode']);


                    $targetcomp->target_id = $this->gettargetidlocalmodule($examcode, $id);
                    $targetcomp->topiccode = $target['tcode'];
                    $targetcomp->level = $target['lecode'];
                    $targetcomp->lesson = $target['lcode'];
                    $targetcomp->score = $target['escore'];


                    $targetcomp->targetname = $lename;
                    $targetcomp->levelname = $lvelname;

                    $targetcomp->studyduration = $compereanameslist->getstudydurationforeach($target['lcode']);

                $targetid = $this->gettargetidlocalmodule($examcode, $id);
                    $topiccode = $target['tcode'];
                    
                $level1 = $target['lecode'];
                    $lessonid = $target['lcode'];

                
                
                 $blocks = $this->Modulecomps->find('list')->where(['Modulecomps.target_id' => $targetid, 'Modulecomps.topiccode' => $topiccode ,'Modulecomps.level' => $level1, 'Modulecomps.lesson' => $lessonid ])->count();


if( $blocks== 0) {
    if ($this->Modulecomps->save($targetcomp)) {

                    $i++;
                }
}
                   
                    //}                             
                }



                $this->redirect(array(
                    /* 'controller' => 'targetcomps',
                      'action' => 'finalpayment' */


                    'controller' => 'users',
                    'action' => 'synctocalendar'
                ));
            }
        } else {

            echo "Somthing went wrong!.";
            exit;
        }
    }

    public function getexamcompstargetsadmin($type, $id) {
        $this->loadModel('Paymentdetails');
        $Targetusers = $this->Paymentdetails->find('all', array('fields' => array('productcode', 'id')))->where(['Paymentdetails.userid' => $id, 'Paymentdetails.type' => $type]);

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

    public function evalauetargetcompsformodulesadmin() {

        $parameters = $this->request->getAttribute('params');
        if ($parameters['pass'][0] == NULL) {
            $id = $this->request->getSession()->read('sessionname');
        } else {
            $id = $parameters['pass'][0];
        }

        $moodleid = $parameters['pass'][1];

        //	  $parameters = $this->request->getAttribute('params');



        $Targetusers = $this->getexamcompstargetsadmin('modules', $id);
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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getsemestercomps.php', false, $context1);
        $topiccodes = json_decode($result1, true);


        if ($topiccodes['message'] == 'No records Found') {
            //$this->Flash->error(__('No records found to process evaluation for modules. Please, try again.'));
            $this->redirect(array(
                'controller' => 'targetcomps',
                'action' => 'finalpaymentfailed'

                    /*  'controller' => 'events',
                      'action' => 'synctocalendar/'.$id */
            ));
            //exit;
        } else {
            $this->loadModel('Modulecomps');
            $this->loadModel('Target');
            $articlesTable = TableRegistry::get('modulecomps');

            $i = 0;



            foreach ($topiccodes as $target) {
                //	  echo $targetcomp->topiccode = $target['tcode'];
                $targetcomp = $this->Modulecomps->newEntity();
                $examcode = $target['ecode'];


                $compereanameslist = new TargetController();
                $lename = $compereanameslist->getlesson($target['lcode']);
                $lvelname = $compereanameslist->getlevel($target['lecode']);


                $targetcomp->target_id = $this->gettargetidlocalmodule($examcode, $id);
                $targetcomp->topiccode = $target['tcode'];
                $targetcomp->level = $target['lecode'];
                $targetcomp->lesson = $target['lcode'];
                $targetcomp->score = $target['escore'];
                $targetcomp->userid = $id;

                $targetcomp->targetname = $lename;
                $targetcomp->levelname = $lvelname;

                $targetcomp->studyduration = $compereanameslist->getstudydurationforeach($target['lcode']);
                $targetid = $this->gettargetidlocalmodule($examcode, $id);
                    $topiccode = $target['tcode'];
                    
                $level1 = $target['lecode'];
                    $lessonid = $target['lcode'];

                
                
                 $blocks = $this->Modulecomps->find('list')->where(['Modulecomps.target_id' => $targetid, 'Modulecomps.topiccode' => $topiccode ,'Modulecomps.level' => $level1, 'Modulecomps.lesson' => $lessonid ])->count();


if( $blocks== 0) {
    if ($this->Modulecomps->save($targetcomp)) {

                    $i++;
                }
}

               
                //}                             
            }



            $this->redirect(array(
                /* 'controller' => 'targetcomps',
                  'action' => 'finalpayment' */

                'controller' => 'users',
                'action' => 'synctocalendar/' . $id . '/' . $moodleid));
        }
    }

    public function evalautemodsbyadmin($id, $moodleid, $modules) {


        $Targetusers = $this->getexamcompstargetsadmin('modules', $id);
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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getsemestercomps.php', false, $context1);
        $topiccodes = json_decode($result1, true);


        if ($topiccodes['message'] == 'No records Found') {
            echo 'No records found to process evaluation for modules';
        } else {
            $this->loadModel('Modulecomps');
            $this->loadModel('Target');
            $articlesTable = TableRegistry::get('modulecomps');

            $i = 0;



            foreach ($topiccodes as $target) {
                //	  echo $targetcomp->topiccode = $target['tcode'];
                $targetcomp = $this->Modulecomps->newEntity();
                $examcode = $target['ecode'];


                $compereanameslist = new TargetController();
                $lename = $compereanameslist->getlesson($target['lcode']);
                $lvelname = $compereanameslist->getlevel($target['lecode']);


                $targetcomp->target_id = $this->gettargetidlocalmodule($examcode, $id);
                $targetcomp->topiccode = $target['tcode'];
                $targetcomp->level = $target['lecode'];
                $targetcomp->lesson = $target['lcode'];
                $targetcomp->score = $target['escore'];
				 $targetcomp->type = $target['sctype'];
                $targetcomp->userid = $id;

                $targetcomp->targetname = $lename;
                $targetcomp->levelname = $lvelname;

                $targetcomp->studyduration = $compereanameslist->getstudydurationforeach($target['lcode']);
                $targetid = $this->gettargetidlocalmodule($examcode, $id);
                    $topiccode = $target['tcode'];
                    
                $level1 = $target['lecode'];
                    $lessonid = $target['lcode'];

                
                
                 $blocks = $this->Modulecomps->find('list')->where(['Modulecomps.target_id' => $targetid, 'Modulecomps.topiccode' => $topiccode ,'Modulecomps.level' => $level1, 'Modulecomps.lesson' => $lessonid ])->count();


if( $blocks== 0) {
    if ($this->Modulecomps->save($targetcomp)) {

                    $i++;
                }
}

                
                //}                             
            }


           	/*****************************target modules feature****************************************/
				   $row = array('moduleid' =>  $modules);
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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/moduletargets.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		
		$examcode = "";
		foreach($topiccodes as $tcode) {
		
		

            $selectedOption = $tcode['targetcode'];
			   $examcode .= $tcode['targetcode'] . ',';
			
            $this->loadModel('Target');

            $optionalblockTable = TableRegistry::get('target');
           $conditions = ['users_id' => $id, 'examcode' => $selectedOption];
            $exists = $optionalblockTable->exists($conditions);
           if ($exists) {

               /* echo 'Could not be saved. Target already exists.';
                exit;*/
            }
            else {

            $blockt = $optionalblockTable->newEntity();
            $blockt->targettype = $tcode['type'];
            $blockt->name = $tcode['targetname'];
            $blockt->users_id =$id;
            $blockt->examcode = $selectedOption;
			$optionalblockTable->save($blockt);
			}
		}
				/*******************************************************************/
				
				/****** evaluate modulecomps ************************************/
				        $this->loadModel('Target');


	  
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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/getexamcomps.php', false, $context1);
        $topiccodes = json_decode($result1, true);

        //  $optionalblockTable = TableRegistry::get('targetcomps');
        // 
        if ($topiccodes['message'] == 'No records Found') {

       //     $gettragetidsfordelete = $this->getexamcompstargetsids('EEP');

           /* $this->Flash->error(__('No records found to be processed. Please, try again.'));
            return $this->redirect(['controller' => 'users']);*/
        }

        //	$articlesTable = TableRegistry::get('targetcomps');
        //$i = 0;

        foreach ($topiccodes as $target) {



            $returncompreadid = $this->returncompreadids($target['competency_code']);


            $competency_code = $target['competency_code'];

            $targetcode = $target['targetcode'];

            $level = $target['level'];



            $this->gettopicsforstudentsloopnew($returncompreadid, $competency_code, $targetcode, $level,$id);


                                    
        }
				/*******************************************************************/



            $compereanameslist = new UsersController();
            $comlistforstudent = $compereanameslist->syncalmodulkesadmin($id, $moodleid);
        }
    }

    public function evalauetargetcompsforiccmodsadminnew($id, $moodleid) {




        $Targetusers = $this->getexamcompstargetsadmin('addon', $id);
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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/geticccomps.php', false, $context1);
        $topiccodes = json_decode($result1, true);


        if ($topiccodes['message'] == 'No records Found') {

            echo 'No records found to process evaluation for Add-On course';
        } else {
            $this->loadModel('Modulecomps');
            $this->loadModel('Target');
            $articlesTable = TableRegistry::get('modulecomps');

            $i = 0;



            foreach ($topiccodes as $target) {
                //	  echo $targetcomp->topiccode = $target['tcode'];
                $targetcomp = $this->Modulecomps->newEntity();
                $examcode = $target['ecode'];


                $compereanameslist = new TargetController();
                $lename = $compereanameslist->getlesson($target['lcode']);
                $lvelname = $compereanameslist->getlevel($target['lecode']);


                $targetcomp->target_id = $this->gettargetidlocalmodule($examcode, $id);
                $targetcomp->topiccode = $target['tcode'];
                $targetcomp->level = $target['lecode'];
                $targetcomp->lesson = $target['lcode'];
                $targetcomp->score = $target['escore'];


                $targetcomp->targetname = $lename;
                $targetcomp->levelname = $lvelname;

                $targetcomp->studyduration = $compereanameslist->getstudydurationforeach($target['lcode']);
                
                                $targetid = $this->gettargetidlocalmodule($examcode, $id);
                    $topiccode = $target['tcode'];
                    
                $level1 = $target['lecode'];
                    $lessonid = $target['lcode'];

                
                
                 $blocks = $this->Modulecomps->find('list')->where(['Modulecomps.target_id' => $targetid, 'Modulecomps.topiccode' => $topiccode ,'Modulecomps.level' => $level1, 'Modulecomps.lesson' => $lessonid ])->count();


if( $blocks== 0) {
    if ($this->Modulecomps->save($targetcomp)) {

                    $i++;
                }
}


                
                //}                             
            }



            $compereanameslist = new UsersController();
            $comlistforstudent = $compereanameslist->syncalmodulkesadmin($id, $moodleid);
        }
    }

    public function evalauetargetcompsforiccmodsadmin() {

        $parameters = $this->request->getAttribute('params');
        if ($parameters['pass'][0] == NULL) {
            $id = $this->request->getSession()->read('sessionname');
        } else {
            $id = $parameters['pass'][0];
        }

        $moodleid = $parameters['pass'][1];


        $Targetusers = $this->getexamcompstargetsadmin('addon', $id);
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
        $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'ims/geticccomps.php', false, $context1);
        $topiccodes = json_decode($result1, true);


        if ($topiccodes['message'] == 'No records Found') {
            //$this->Flash->error(__('No records found to process evaluation for Add-On course. Please, try again.'));
            $this->redirect(array(
                'controller' => 'targetcomps',
                'action' => 'finalpaymentfailed'

                    /*  'controller' => 'events',
                      'action' => 'synctocalendar/'.$id */
            ));
            //exit;
        } else {
            $this->loadModel('Modulecomps');
            $this->loadModel('Target');
            $articlesTable = TableRegistry::get('modulecomps');

            $i = 0;



            foreach ($topiccodes as $target) {
                //	  echo $targetcomp->topiccode = $target['tcode'];
                $targetcomp = $this->Modulecomps->newEntity();
                $examcode = $target['ecode'];


                $compereanameslist = new TargetController();
                $lename = $compereanameslist->getlesson($target['lcode']);
                $lvelname = $compereanameslist->getlevel($target['lecode']);


                $targetcomp->target_id = $this->gettargetidlocalmodule($examcode, $id);
                $targetcomp->topiccode = $target['tcode'];
                $targetcomp->level = $target['lecode'];
                $targetcomp->lesson = $target['lcode'];
                $targetcomp->score = $target['escore'];


                $targetcomp->targetname = $lename;
                $targetcomp->levelname = $lvelname;

                $targetcomp->studyduration = $compereanameslist->getstudydurationforeach($target['lcode']);
                
                                $targetid = $this->gettargetidlocalmodule($examcode, $id);
                    $topiccode = $target['tcode'];
                    
                $level1 = $target['lecode'];
                    $lessonid = $target['lcode'];

                
                
                 $blocks = $this->Modulecomps->find('list')->where(['Modulecomps.target_id' => $targetid, 'Modulecomps.topiccode' => $topiccode ,'Modulecomps.level' => $level1, 'Modulecomps.lesson' => $lessonid ])->count();


if( $blocks== 0) {
    if ($this->Modulecomps->save($targetcomp)) {

                    $i++;
                }
}


             
                //}                             
            }



            $this->redirect(array(
                /* 'controller' => 'targetcomps',
                  'action' => 'finalpayment' */

                'controller' => 'users',
                'action' => 'synctocalendar/' . $id . '/' . $moodleid));
        }
    }

    public function gettargetidlocalmodule($examcode, $id) {

        $this->loadModel('Paymentdetails');
       

        $record = $this->Paymentdetails->find('all', ['conditions' => ['Paymentdetails.productcode' => $examcode, 'Paymentdetails.userid' => $id]])->first();

        return $record->id;
    }

}
