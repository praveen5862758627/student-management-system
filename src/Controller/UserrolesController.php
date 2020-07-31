<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Userroles Controller
 *
 * @property \App\Model\Table\UserrolesTable $Userroles
 *
 * @method \App\Model\Entity\Userrole[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserrolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $userroles = $this->paginate($this->Userroles);

        $this->set(compact('userroles'));
    }

    /**
     * View method
     *
     * @param string|null $id Userrole id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userrole = $this->Userroles->get($id, [
            'contain' => []
        ]);

        $this->set('userrole', $userrole);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userrole = $this->Userroles->newEntity();
        if ($this->request->is('post')) {
            $userrole = $this->Userroles->patchEntity($userrole, $this->request->getData());
            if ($this->Userroles->save($userrole)) {
                $this->Flash->success(__('The userrole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The userrole could not be saved. Please, try again.'));
        }
        $this->set(compact('userrole'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Userrole id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userrole = $this->Userroles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userrole = $this->Userroles->patchEntity($userrole, $this->request->getData());
            if ($this->Userroles->save($userrole)) {
                $this->Flash->success(__('The userrole has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The userrole could not be saved. Please, try again.'));
        }
        $this->set(compact('userrole'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Userrole id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userrole = $this->Userroles->get($id);
        if ($this->Userroles->delete($userrole)) {
            $this->Flash->success(__('The userrole has been deleted.'));
        } else {
            $this->Flash->error(__('The userrole could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
