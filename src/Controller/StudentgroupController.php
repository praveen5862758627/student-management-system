<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
/**
 * Studentgroup Controller
 *
 * @property \App\Model\Table\StudentgroupTable $Studentgroup
 *
 * @method \App\Model\Entity\Studentgroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentgroupController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $studentgroup = $this->paginate($this->Studentgroup);

        $this->set(compact('studentgroup'));
    }

    public function viewstudents() {

        $this->loadModel('Users');
        $blockid = $this->request->pass[0];

        //$users = $this->paginate($this->Users->find('all')->where(['Users.userroles_id' => 2, 'Users.groupid in ' => $blockid]));
        
        $input = '0';
$list = $blockid;

$array1 = Array($input);
$array2 = explode(',', $list);
$array3 = array_diff($array2, $array1);

$output = implode(',', $array3);
            
            
$locArray = explode(',', $output);
$locQuery = implode(' OR ', array_map(function($locArray) { return "FIND_IN_SET($locArray, groupid)"; }, $locArray));

             $conn = ConnectionManager::get('default');

            $querytcomps = "SELECT * FROM users where ($locQuery) and userroles_id = 2  and status=1 and  groupid != 0 ORDER BY id DESC";
              $stmt1 = $conn->execute($querytcomps);
        
                 $posts_arr1 = array();

            while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
                extract($row1);


                if ($status == 0) {
                    $stat = "Disabled";
                } else {
                    $stat = "Active";
                }

     

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
                   // 'editlink' => html_entity_decode("<a style='cursor:pointer'  onclick='editausergroupadmin($id)'><i class='fa fa-eye fa-fw'></i>  </a>"),
                    
                      'editlink' => html_entity_decode("<a style='cursor:pointer'  onclick='showallasignemntsforst($id)'>View</i>  </a>"),
                    /*'totall' => html_entity_decode($this->getscoreforbaselinegetscore($moodleuid)[0]),
                    'averagescore' => html_entity_decode(number_format((float) $this->getscoreforbaselinegetscore($moodleuid)[1], 2, '.', '')),*/
					'activitylog' => html_entity_decode("<a style='cursor:pointer'  onclick='displayactivitylog($id)'>View  </a>"),
                    'reportview' => html_entity_decode('<a style="cursor:pointer"  onclick=\'loadestudentsscore("' . html_entity_decode($fname) . '","' . html_entity_decode($lname) . '","' . html_entity_decode($email) . '","' . html_entity_decode($id) . '")\' >View  </a>')
                );

                // Push to "data"
                array_push($posts_arr1, $post_item1);
                // array_push($posts_arr['data'], $post_item);
            }

            $usersnn = array("data" => $posts_arr1);
        
        
        
//$users = $this->paginate($users1);
       $this->set(compact('usersnn'));
    }
function removeFromString($str, $item) {
    $parts = explode(',', $str);

    while(($i = array_search($item, $parts)) !== false) {
        unset($parts[$i]);
    }

    return implode(',', $parts);
}
    public function deletegroupuser() {

        $this->autoRender = false;

        $this->loadModel('Users');
        $blockid = $this->request->pass[0];
        
        
        $optionalblockTable = TableRegistry::get('users');
        $blockt = $optionalblockTable->get($blockid);
       $str = $blockt->groupid;

            $finalgroup = $this->removeFromString($str, $this->request->pass[1]);
        
        if($finalgroup == "")
        {
            $ff = 0;
        }

    else 
    {
         $ff = $finalgroup;
    }
        $this->Users->updateAll(['groupid' => $ff], ['id' => $blockid]);


        $this->Flash->success(__('Student ahs been removed from the group.'));
        return $this->redirect(array(
                    'controller' => 'studentgroup',
                    'action' => 'index'
        ));
    }

    /**
     * View method
     *
     * @param string|null $id Studentgroup id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $studentgroup = $this->Studentgroup->get($id, [
            'contain' => []
        ]);

        $this->set('studentgroup', $studentgroup);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $studentgroup = $this->Studentgroup->newEntity();
        if ($this->request->is('post')) {
            $studentgroup = $this->Studentgroup->patchEntity($studentgroup, $this->request->getData());
            if ($this->Studentgroup->save($studentgroup)) {
                $this->Flash->success(__('The studentgroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The studentgroup could not be saved. Please, try again.'));
        }
        $this->set(compact('studentgroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Studentgroup id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $studentgroup = $this->Studentgroup->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentgroup = $this->Studentgroup->patchEntity($studentgroup, $this->request->getData());
            if ($this->Studentgroup->save($studentgroup)) {
                $this->Flash->success(__('The studentgroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The studentgroup could not be saved. Please, try again.'));
        }
        $this->set(compact('studentgroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Studentgroup id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $studentgroup = $this->Studentgroup->get($id);
        if ($this->Studentgroup->delete($studentgroup)) {
            $this->Flash->success(__('The studentgroup has been deleted.'));
        } else {
            $this->Flash->error(__('The studentgroup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
