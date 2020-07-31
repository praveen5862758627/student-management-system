<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Institution Controller
 *
 * @property \App\Model\Table\InstitutionTable $Institution
 *
 * @method \App\Model\Entity\Institution[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InstitutionController extends AppController
{
	
	public function initialize()
    {
        parent::initialize();
		
		
		
		//if($this->request->session()->read('sessionname2') == 2 || $this->request->session()->read('sessionname2') == 4)
		//	die("Access Denied");
		

	}	

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $institution = $this->paginate($this->Institution);

        $this->set(compact('institution'));
    }

    /**
     * View method
     *
     * @param string|null $id Institution id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $institution = $this->Institution->get($id, [
            'contain' => []
        ]);

        $this->set('institution', $institution);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $institution = $this->Institution->newEntity();
        if ($this->request->is('post')) {
            $institution = $this->Institution->patchEntity($institution, $this->request->getData());
            if ($this->Institution->save($institution)) {
                $this->Flash->success(__('The institution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The institution could not be saved. Please, try again.'));
        }
        $this->set(compact('institution'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Institution id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $institution = $this->Institution->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $institution = $this->Institution->patchEntity($institution, $this->request->getData());
            if ($this->Institution->save($institution)) {
                $this->Flash->success(__('The institution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The institution could not be saved. Please, try again.'));
        }
        $this->set(compact('institution'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Institution id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $institution = $this->Institution->get($id);
        if ($this->Institution->delete($institution)) {
            $this->Flash->success(__('The institution has been deleted.'));
        } else {
            $this->Flash->error(__('The institution could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
