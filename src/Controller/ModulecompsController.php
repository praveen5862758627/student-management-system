<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modulecomps Controller
 *
 * @property \App\Model\Table\ModulecompsTable $Modulecomps
 *
 * @method \App\Model\Entity\Modulecomp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModulecompsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Targets']
        ];
        $modulecomps = $this->paginate($this->Modulecomps);

        $this->set(compact('modulecomps'));
    }

    /**
     * View method
     *
     * @param string|null $id Modulecomp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modulecomp = $this->Modulecomps->get($id, [
            'contain' => ['Targets']
        ]);

        $this->set('modulecomp', $modulecomp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modulecomp = $this->Modulecomps->newEntity();
        if ($this->request->is('post')) {
            $modulecomp = $this->Modulecomps->patchEntity($modulecomp, $this->request->getData());
            if ($this->Modulecomps->save($modulecomp)) {
                $this->Flash->success(__('The modulecomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modulecomp could not be saved. Please, try again.'));
        }
        $targets = $this->Modulecomps->Targets->find('list', ['limit' => 200]);
        $this->set(compact('modulecomp', 'targets'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Modulecomp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modulecomp = $this->Modulecomps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modulecomp = $this->Modulecomps->patchEntity($modulecomp, $this->request->getData());
            if ($this->Modulecomps->save($modulecomp)) {
                $this->Flash->success(__('The modulecomp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modulecomp could not be saved. Please, try again.'));
        }
        $targets = $this->Modulecomps->Targets->find('list', ['limit' => 200]);
        $this->set(compact('modulecomp', 'targets'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Modulecomp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modulecomp = $this->Modulecomps->get($id);
        if ($this->Modulecomps->delete($modulecomp)) {
            $this->Flash->success(__('The modulecomp has been deleted.'));
        } else {
            $this->Flash->error(__('The modulecomp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
