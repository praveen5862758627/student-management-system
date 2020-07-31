<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Optionalblock Controller
 *
 * @property \App\Model\Table\OptionalblockTable $Optionalblock
 *
 * @method \App\Model\Entity\Optionalblock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OptionalblockController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Blocks']
        ];
        $optionalblock = $this->paginate($this->Optionalblock);

        $this->set(compact('optionalblock'));
    }

    /**
     * View method
     *
     * @param string|null $id Optionalblock id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $optionalblock = $this->Optionalblock->get($id, [
            'contain' => ['Users', 'Blocks']
        ]);

        $this->set('optionalblock', $optionalblock);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $optionalblock = $this->Optionalblock->newEntity();
        if ($this->request->is('post')) {
            $optionalblock = $this->Optionalblock->patchEntity($optionalblock, $this->request->getData());
            if ($this->Optionalblock->save($optionalblock)) {
                $this->Flash->success(__('The optionalblock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The optionalblock could not be saved. Please, try again.'));
        }
        $users = $this->Optionalblock->Users->find('list', ['limit' => 200]);
        $blocks = $this->Optionalblock->Blocks->find('list', ['limit' => 200]);
        $this->set(compact('optionalblock', 'users', 'blocks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Optionalblock id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $optionalblock = $this->Optionalblock->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $optionalblock = $this->Optionalblock->patchEntity($optionalblock, $this->request->getData());
            if ($this->Optionalblock->save($optionalblock)) {
                $this->Flash->success(__('The optionalblock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The optionalblock could not be saved. Please, try again.'));
        }
        $users = $this->Optionalblock->Users->find('list', ['limit' => 200]);
        $blocks = $this->Optionalblock->Blocks->find('list', ['limit' => 200]);
        $this->set(compact('optionalblock', 'users', 'blocks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Optionalblock id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $optionalblock = $this->Optionalblock->get($id);
        if ($this->Optionalblock->delete($optionalblock)) {
            $this->Flash->success(__('The optionalblock has been deleted.'));
        } else {
            $this->Flash->error(__('The optionalblock could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
