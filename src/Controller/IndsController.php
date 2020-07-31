<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;
use Cake\Core\Configure;

Configure::load('myconfig');

/**
 * Inds Controller
 *
 * @property \App\Model\Table\IndsTable $Inds
 *
 * @method \App\Model\Entity\Ind[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IndsController extends AppController
{
	//public $weburl = 'https://sms.loc/';
	//public $weburl = 'https://testsms.odinlearning.in/';

    public function initialize() {
       parent::initialize();
	   
	   // No model for this Controller, Only View
	   
       $this->modelClass = false;
   }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //$inds = $this->paginate($this->Inds);
		
		$http = new Client();
		$response = $http->post($this->weburl.'moodle30/login/token.php?username=dinesh&service=Joomdle&password=Token12*');
		$json3 = $response->getJson();
		
		var_dump($json3);
		//exit;
	
		$this->set('json3', $json3);
		
		
		$http = new Client();
		$response = $http->post($this->weburl.'moodle30/webservice/rest/server.php', [
		  'wstoken' => $json3['token'],
		  'moodlewsrestformat' => 'json',
		  'wsfunction' => 'joomdle_get_roles'
		]);
		
		$json1 = $response->getJson();
		var_dump($json1);
		
		$this->set('json1', $json1);
		
		$response = $http->post($this->weburl.'moodle30/webservice/rest/server.php', [
		  'wstoken' => $json3['token'],
		  'moodlewsrestformat' => 'json',
		  'wsfunction' => 'joomdle_get_all_courses',
		  'sortby'=>'cat_id'
		]);
		
		$json2 = $response->getJson();
		//$this->set('json2', $json2);
		
		$response = $http->post($this->weburl.'moodle30/webservice/rest/server.php', [
		  'wstoken' => $json3['token'],
		  'moodlewsrestformat' => 'json',
		  'wsfunction' => 'joomdle_my_enrolments',
		  'username'=>'dinesh',
		  'order_by_cat'=>1
		]);
		
		var_dump($json2);
		
		/*$json4 = $response->getJson();
		$this->set('json4', $json4);*/

       // $this->set(compact('inds'));
    }

    /**
     * View method
     *
     * @param string|null $id Ind id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ind = $this->Inds->get($id, [
            'contain' => ['Comps']
        ]);

        $this->set('ind', $ind);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ind = $this->Inds->newEntity();
        if ($this->request->is('post')) {
            $ind = $this->Inds->patchEntity($ind, $this->request->getData());
            if ($this->Inds->save($ind)) {
                $this->Flash->success(__('The ind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ind could not be saved. Please, try again.'));
        }
        $this->set(compact('ind'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ind id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ind = $this->Inds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ind = $this->Inds->patchEntity($ind, $this->request->getData());
            if ($this->Inds->save($ind)) {
                $this->Flash->success(__('The ind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ind could not be saved. Please, try again.'));
        }
        $this->set(compact('ind'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ind id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ind = $this->Inds->get($id);
        if ($this->Inds->delete($ind)) {
            $this->Flash->success(__('The ind has been deleted.'));
        } else {
            $this->Flash->error(__('The ind could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
