<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PhpSessions Controller
 *
 * @property \App\Model\Table\PhpSessionsTable $PhpSessions
 *
 * @method \App\Model\Entity\PhpSession[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhpSessionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $phpSessions = $this->paginate($this->PhpSessions);

        $this->set(compact('phpSessions'));
    }

    /**
     * View method
     *
     * @param string|null $id Php Session id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phpSession = $this->PhpSessions->get($id, [
            'contain' => []
        ]);

        $this->set('phpSession', $phpSession);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phpSession = $this->PhpSessions->newEntity();
        if ($this->request->is('post')) {
            $phpSession = $this->PhpSessions->patchEntity($phpSession, $this->request->getData());
            if ($this->PhpSessions->save($phpSession)) {
                $this->Flash->success(__('The php session has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The php session could not be saved. Please, try again.'));
        }
        $this->set(compact('phpSession'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Php Session id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phpSession = $this->PhpSessions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phpSession = $this->PhpSessions->patchEntity($phpSession, $this->request->getData());
            if ($this->PhpSessions->save($phpSession)) {
                $this->Flash->success(__('The php session has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The php session could not be saved. Please, try again.'));
        }
        $this->set(compact('phpSession'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Php Session id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phpSession = $this->PhpSessions->get($id);
        if ($this->PhpSessions->delete($phpSession)) {
            $this->Flash->success(__('The php session has been deleted.'));
        } else {
            $this->Flash->error(__('The php session could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
