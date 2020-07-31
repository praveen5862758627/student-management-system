<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;

/**
 * Notications Controller
 *
 * @property \App\Model\Table\NoticationsTable $Notications
 *
 * @method \App\Model\Entity\Notication[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NoticationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $conn = ConnectionManager::get('default');
       // $notications = $this->paginate($this->Notications);
             $input = '0';
$list = $this->request->session()->read('groupid');

$array1 = Array($input);
$array2 = explode(',', $list);
$array3 = array_diff($array2, $array1);

$output = implode(',', $array3);
            
            
$locArray = explode(',', $output);
$locQuery = implode(' OR ', array_map(function($locArray) { return "FIND_IN_SET($locArray, groups)"; }, $locArray));

            

            $querytcompsnotifications = "SELECT * FROM notications where ($locQuery)  ORDER BY id DESC";



            /*************************************************/


           // $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('notications'));
    }

    /**
     * View method
     *
     * @param string|null $id Notication id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notication = $this->Notications->get($id, [
            'contain' => []
        ]);

        $this->set('notication', $notication);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notication = $this->Notications->newEntity();
        if ($this->request->is('post')) {
			
			date_default_timezone_set('Asia/Kolkata');
				 $curdate=date("Y-m-d");
				 
			$notication->notificationdate = $curdate; 
            
            
                $notication->groups =  $this->request->session()->read('groupid');
            
            $notication = $this->Notications->patchEntity($notication, $this->request->getData());
            if ($this->Notications->save($notication)) {
                $this->Flash->success(__('The notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notification could not be saved. Please, try again.'));
        }
        $this->set(compact('notication'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Notication id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notication = $this->Notications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
              $notication->groups =  $this->request->session()->read('groupid');
            
            $notication = $this->Notications->patchEntity($notication, $this->request->getData());
            if ($this->Notications->save($notication)) {
                $this->Flash->success(__('The notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notification could not be saved. Please, try again.'));
        }
        $this->set(compact('notication'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Notication id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notication = $this->Notications->get($id);
        if ($this->Notications->delete($notication)) {
            $this->Flash->success(__('The notification has been deleted.'));
        } else {
            $this->Flash->error(__('The notification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
