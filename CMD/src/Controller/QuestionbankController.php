<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Questionbank Controller
 *
 * @property \App\Model\Table\QuestionbankTable $Questionbank
 *
 * @method \App\Model\Entity\Questionbank[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionbankController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Topic', 'Level', 'Targettype', 'Status']
        ];
        $questionbank = $this->paginate($this->Questionbank);

        $this->set(compact('questionbank'));
    }

    /**
     * View method
     *
     * @param string|null $id Questionbank id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $questionbank = $this->Questionbank->get($id, [
            'contain' => ['Topic', 'Level', 'Targettype', 'Status']
        ]);

        $this->set('questionbank', $questionbank);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $questionbank = $this->Questionbank->newEntity();
        if ($this->request->is('post')) {
            $questionbank = $this->Questionbank->patchEntity($questionbank, $this->request->getData());
            if ($this->Questionbank->save($questionbank)) {
                $this->Flash->success(__('The questionbank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The questionbank could not be saved. Please, try again.'));
        }
        $topic = $this->Questionbank->Topic->find('list', ['limit' => 200]);
        $level = $this->Questionbank->Level->find('list', ['limit' => 200]);
        $targettype = $this->Questionbank->Targettype->find('list', ['limit' => 200]);
        $status = $this->Questionbank->Status->find('list', ['limit' => 200]);
        $this->set(compact('questionbank', 'topic', 'level', 'targettype', 'status'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Questionbank id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $questionbank = $this->Questionbank->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $questionbank = $this->Questionbank->patchEntity($questionbank, $this->request->getData());
            if ($this->Questionbank->save($questionbank)) {
                $this->Flash->success(__('The questionbank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The questionbank could not be saved. Please, try again.'));
        }
        $topic = $this->Questionbank->Topic->find('list', ['limit' => 200]);
        $level = $this->Questionbank->Level->find('list', ['limit' => 200]);
        $targettype = $this->Questionbank->Targettype->find('list', ['limit' => 200]);
        $status = $this->Questionbank->Status->find('list', ['limit' => 200]);
        $this->set(compact('questionbank', 'topic', 'level', 'targettype', 'status'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Questionbank id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $questionbank = $this->Questionbank->get($id);
        if ($this->Questionbank->delete($questionbank)) {
            $this->Flash->success(__('The questionbank has been deleted.'));
        } else {
            $this->Flash->error(__('The questionbank could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
