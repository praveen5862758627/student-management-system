<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Scoretype Controller
 *
 * @property \App\Model\Table\ScoretypeTable $Scoretype
 *
 * @method \App\Model\Entity\Scoretype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScoretypeController extends AppController {

    public function initialize() {
        parent::initialize();

        //if($this->request->session()->read('sessionname2') != 1 )
        //	die("Access Denied");
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $scoretype = $this->paginate($this->Scoretype);

        $this->set(compact('scoretype'));
    }

    /**
     * View method
     *
     * @param string|null $id Scoretype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $scoretype = $this->Scoretype->get($id, [
            'contain' => ['Scorecard']
        ]);

        $this->set('scoretype', $scoretype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $scoretype = $this->Scoretype->newEntity();
        if ($this->request->is('post')) {
            $scoretype = $this->Scoretype->patchEntity($scoretype, $this->request->getData());
            if ($this->Scoretype->save($scoretype)) {
                $this->Flash->success(__('The scoretype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scoretype could not be saved. Please, try again.'));
        }
        $this->set(compact('scoretype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scoretype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $scoretype = $this->Scoretype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scoretype = $this->Scoretype->patchEntity($scoretype, $this->request->getData());
            if ($this->Scoretype->save($scoretype)) {
                $this->Flash->success(__('The scoretype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scoretype could not be saved. Please, try again.'));
        }
        $this->set(compact('scoretype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scoretype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $scoretype = $this->Scoretype->get($id);
        if ($this->Scoretype->delete($scoretype)) {
            $this->Flash->success(__('The scoretype has been deleted.'));
        } else {
            $this->Flash->error(__('The scoretype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
