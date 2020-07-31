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

/**
 * Scorecard Controller
 *
 * @property \App\Model\Table\ScorecardTable $Scorecard
 *
 * @method \App\Model\Entity\Scorecard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScorecardController extends AppController {

    private $mainurl = 'https://api.odinlearning.in/';
    private $weburlmainsite = 'https://sms.odinlearning.in/';
    public $weburlformoodle = 'https://cms.odinlearning.in/';

    public function initialize() {
        parent::initialize();

        //	if($this->request->session()->read('sessionname2') != 1 )
        //die("Access Denied");
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Scoretype', 'Targetcomps']
        ];
        $scorecard = $this->paginate($this->Scorecard);
        //var_dump($scorecard);
        //	exit;

        $this->set(compact('scorecard'));
    }

    /**
     * View method
     *
     * @param string|null $id Scorecard id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $scorecard = $this->Scorecard->get($id, [
            'contain' => ['Scoretype', 'Targetcomps']
        ]);

        $this->set('scorecard', $scorecard);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $scorecard = $this->Scorecard->newEntity();
        if ($this->request->is('post')) {
            $scorecard = $this->Scorecard->patchEntity($scorecard, $this->request->getData());
            if ($this->Scorecard->save($scorecard)) {
                $this->Flash->success(__('The scorecard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scorecard could not be saved. Please, try again.'));
        }
        $scoretypes = $this->Scorecard->Scoretype->find('list', ['limit' => 200]);
        $targetcomps = $this->Scorecard->Targetcomps->find('list', ['limit' => 200]);
        $this->set(compact('scorecard', 'scoretypes', 'targetcomps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scorecard id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $scorecard = $this->Scorecard->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scorecard = $this->Scorecard->patchEntity($scorecard, $this->request->getData());
            if ($this->Scorecard->save($scorecard)) {
                $this->Flash->success(__('The scorecard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scorecard could not be saved. Please, try again.'));
        }
        $scoretypes = $this->Scorecard->Scoretype->find('list', ['limit' => 200]);
        $targetcomps = $this->Scorecard->Targetcomps->find('list', ['limit' => 200]);
        $this->set(compact('scorecard', 'scoretypes', 'targetcomps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scorecard id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $scorecard = $this->Scorecard->get($id);
        if ($this->Scorecard->delete($scorecard)) {
            $this->Flash->success(__('The scorecard has been deleted.'));
        } else {
            $this->Flash->error(__('The scorecard could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function queuedjobforscorecard() {

        $this->loadModel('Users');

        $this->autoRender = false;

        $users = $this->Users->find('all')->where(['Users.userroles_id' => 2, 'Users.scorecardsync' => 1]);
        foreach ($users as $level) {
            $usersid = $level['id'];
            $moodleuid = $level['moodleuid'];

            $this->getallcourses($usersid, $moodleuid);
        }
    }

    public function getexamcompstargets($userid) {
        $this->loadModel('Target');


        $Targetusers = $this->Target->find('all', array('fields' => array('id')))->where(['Target.users_id' => $userid]);

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

    public function getallcourses($userid, $moodleid) {



        $this->autoRender = false;

        $optionalblockTable = TableRegistry::get('scorecard');
        $query = $optionalblockTable->query();
        $query->delete()
                ->where(['users_id' => $userid])
                ->execute();


        $http = new Client();


        $response = $http->post($this->weburlformoodle . 'webservice/rest/server.php', [
            'wstoken' => '36273d0cb5670991cd92216058a151a6',
            'moodlewsrestformat' => 'json',
            'userid' => $moodleid,
            'wsfunction' => 'gradereport_overview_get_course_grades'
        ]);

        $json1 = $response->getJson();




        if ($json1['grades'] == null) {
            echo 'No Score record(s) found to be processed ';
        }


        $blocksarray = json_encode($json1);

        $blocks = json_decode($blocksarray, true);


        $this->loadModel('Scorecard');
        $i = 0;


        $conn = ConnectionManager::get('default');



        $Targetusers = $this->getexamcompstargets($userid);


        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT max(tc.level) as lecode,tc.id as tcid, tc.status as tctstatus,tc.skip as tcskip,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') GROUP BY tc.topiccode order by tc.level asc';




        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();
        $examcode = "";
        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);
            $examcode .= $lcode . ',';
        }

        $exacoderesults = rtrim($examcode, ',');

        $myArray = explode(',', $exacoderesults);

        foreach ($blocks['grades'] as $gd) {



            if (in_array($this->getlessonidforscore($gd['courseid']), $myArray)) {



                $scorecard = $this->Scorecard->newEntity();

                $scorecard->scoretype_id = '9';
                $scorecard->name = $this->getcoursename($gd['courseid']);
                $scorecard->type = $this->getmoodlequizid($gd['courseid']);



                $scorecard->studyduration = $this->getcoursenamestudydurartion($gd['courseid']);
                $scorecard->coursecategory = $this->getcoursetype($gd['courseid']);

                $scorecard->lessonid = $this->getlessonidforscore($gd['courseid']);

                $scorecard->courseid = $gd['courseid'];
                $scorecard->date = "";
                $scorecard->score = $gd['grade'];



                /* $getsta = $this ->getmoodlecomplestatus($moodleid,$gd['courseid']);

                  if($getsta[0] == NUll )
                  $scorecard->complete_date = 'Not Completed';
                  else
                  $scorecard->complete_date = date('d/m/Y H:i:s', $getsta[0]);



                  if($getsta[1] == NUll )
                  $scorecard->status = 'Not Completed';
                  else
                  $scorecard->status = 'Completed'; */



                $scorecard->users_id = $userid;



                if ($this->returntargetcompslevel($userid, $this->getlessonidforscore($gd['courseid'])) == 7) {

                    if ($this->getcoursetype($gd['courseid']) != 'quiz' && $this->getcoursetype($gd['courseid']) != 'example') {

                        if ($this->getcoursename($gd['courseid']) != NULL) {
                            if ($this->Scorecard->save($scorecard)) {

                                $i++;

                                $this->updatescoreforattamps($userid, $moodleid, $gd['courseid'], $this->getmoodlequizid($gd['courseid']), $gd['grade'], $this->getcoursetype($gd['courseid']));
                            }
                        }
                    }
                } else {

                    if ($this->getcoursename($gd['courseid']) != NULL) {
                        if ($this->Scorecard->save($scorecard)) {

                            $i++;

                            $this->updatescoreforattamps($userid, $moodleid, $gd['courseid'], $this->getmoodlequizid($gd['courseid']), $gd['grade'], $this->getcoursetype($gd['courseid']));
                        }
                    }
                }
            }
        }

        echo json_encode('Scorecard Sync done. [ ' . $i . ' record(s) processed ]');
    }

}
