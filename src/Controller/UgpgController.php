<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Ugpg Controller
 *
 * @property \App\Model\Table\UgpgTable $Ugpg
 *
 * @method \App\Model\Entity\Ugpg[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UgpgController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ugpg = $this->paginate($this->Ugpg);

        $this->set(compact('ugpg'));
    }

    /**
     * View method
     *
     * @param string|null $id Ugpg id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ugpg = $this->Ugpg->get($id, [
            'contain' => []
        ]);

        $this->set('ugpg', $ugpg);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		if ($this->request->is(array('ajax'))) { 
        $ugpg = $this->Ugpg->newEntity();
      
			
			if($_POST['type'] == 'UG') {
			   $optionalblockTable = TableRegistry::get('Ugpg');
        $query = $optionalblockTable->query();
		$query->delete()
                //  ->set(['deletedblock' => 1])
                ->where(['userid' => $this->request->getSession()->read('sessionname'),'type'=>'UG'])
                ->execute();
			}
			if($_POST['type'] == 'PG') {
			   $optionalblockTable = TableRegistry::get('Ugpg');
        $query = $optionalblockTable->query();
		$query->delete()
                //  ->set(['deletedblock' => 1])
                ->where(['userid' => $this->request->getSession()->read('sessionname'),'type'=>'PG'])
                ->execute();
			}
			
			
			$this->request->data['universityname'] =  $this->request->data['universityname']; 
			$this->request->data['stream'] =  $this->request->data['stream']; 
			$this->request->data['specialization'] =  $this->request->data['specialization']; 
			$this->request->data['regno'] =  $this->request->data['regno']; 
			$this->request->data['yearjoining'] =  $this->request->data['yearjoining']; 
			$this->request->data['yearpassout'] =  $this->request->data['yearpassout']; 
				$this->request->data['courseduration'] =  $this->request->data['courseduration']; 
			
			$this->request->data['sem1'] =  $this->request->data['sem1']; 
			$this->request->data['sem2'] =  $this->request->data['sem2']; 
			$this->request->data['sem3'] =  $this->request->data['sem3']; 
			$this->request->data['sem4'] =  $this->request->data['sem4']; 
			$this->request->data['sem5'] =  $this->request->data['sem5']; 
			$this->request->data['sem6'] =  $this->request->data['sem6']; 
			$this->request->data['sem7'] =  $this->request->data['sem7']; 
			$this->request->data['sem8'] =  $this->request->data['sem8'];
            $this->request->data['type'] =  $this->request->data['type'];			
			
			 
			 $this->request->data['userid'] =  $this->request->getSession()->read('sessionname');
			
            $ugpg = $this->Ugpg->patchEntity($ugpg, $this->request->getData());
            if ($this->Ugpg->save($ugpg)) {
             
			  echo 'Changes has been saved';
            }
            else{
			
			echo "Error saving the data.";
			}
			exit;
        }
       
    }

    /**
     * Edit method
     *
     * @param string|null $id Ugpg id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ugpg = $this->Ugpg->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ugpg = $this->Ugpg->patchEntity($ugpg, $this->request->getData());
            if ($this->Ugpg->save($ugpg)) {
                $this->Flash->success(__('The ugpg has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ugpg could not be saved. Please, try again.'));
        }
        $this->set(compact('ugpg'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ugpg id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ugpg = $this->Ugpg->get($id);
        if ($this->Ugpg->delete($ugpg)) {
            $this->Flash->success(__('The ugpg has been deleted.'));
        } else {
            $this->Flash->error(__('The ugpg could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
