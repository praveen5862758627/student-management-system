<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Learningplan Controller
 *
 * @property \App\Model\Table\LearningplanTable $Learningplan
 *
 * @method \App\Model\Entity\Learningplan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LearningplanController extends AppController
{
    
	public function initialize()
    {
        parent::initialize();
		
		//if($this->request->session()->read('sessionname2') != 1 )
			//die("Access Denied");
		

	}	
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Targetcomps']
        ];
        $learningplan = $this->paginate($this->Learningplan);

        $this->set(compact('learningplan'));
    }

    /**
     * View method
     *
     * @param string|null $id Learningplan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $learningplan = $this->Learningplan->get($id, [
            'contain' => ['Targetcomps']
        ]);

        $this->set('learningplan', $learningplan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $learningplan = $this->Learningplan->newEntity();
        if ($this->request->is('post')) {
            $learningplan = $this->Learningplan->patchEntity($learningplan, $this->request->getData());
            if ($this->Learningplan->save($learningplan)) {
                $this->Flash->success(__('The learningplan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The learningplan could not be saved. Please, try again.'));
        }
        $targetcomps = $this->Learningplan->Targetcomps->find('list', ['limit' => 200]);
        $this->set(compact('learningplan', 'targetcomps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Learningplan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $learningplan = $this->Learningplan->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $learningplan = $this->Learningplan->patchEntity($learningplan, $this->request->getData());
            if ($this->Learningplan->save($learningplan)) {
                $this->Flash->success(__('The learningplan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The learningplan could not be saved. Please, try again.'));
        }
        $targetcomps = $this->Learningplan->Targetcomps->find('list', ['limit' => 200]);
        $this->set(compact('learningplan', 'targetcomps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Learningplan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $learningplan = $this->Learningplan->get($id);
        if ($this->Learningplan->delete($learningplan)) {
            $this->Flash->success(__('The learningplan has been deleted.'));
        } else {
            $this->Flash->error(__('The learningplan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
}
