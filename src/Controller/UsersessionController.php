<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usersession Controller
 *
 * @property \App\Model\Table\UsersessionTable $Usersession
 *
 * @method \App\Model\Entity\Usersession[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersessionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $usersession = $this->paginate($this->Usersession);

        $this->set(compact('usersession'));
    }

    /**
     * View method
     *
     * @param string|null $id Usersession id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersession = $this->Usersession->get($id, [
            'contain' => []
        ]);

        $this->set('usersession', $usersession);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersession = $this->Usersession->newEntity();
        if ($this->request->is('post')) {
            $usersession = $this->Usersession->patchEntity($usersession, $this->request->getData());
            if ($this->Usersession->save($usersession)) {
                $this->Flash->success(__('The usersession has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usersession could not be saved. Please, try again.'));
        }
        $this->set(compact('usersession'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usersession id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersession = $this->Usersession->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersession = $this->Usersession->patchEntity($usersession, $this->request->getData());
            if ($this->Usersession->save($usersession)) {
                $this->Flash->success(__('The usersession has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usersession could not be saved. Please, try again.'));
        }
        $this->set(compact('usersession'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usersession id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersession = $this->Usersession->get($id);
        if ($this->Usersession->delete($usersession)) {
            $this->Flash->success(__('The usersession has been deleted.'));
        } else {
            $this->Flash->error(__('The usersession could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
