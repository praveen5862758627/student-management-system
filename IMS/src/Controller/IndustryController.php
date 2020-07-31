<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Industry Controller
 *
 * @property \App\Model\Table\IndustryTable $Industry
 *
 * @method \App\Model\Entity\Industry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IndustryController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $industry = $this->paginate($this->Industry);

        $this->set(compact('industry'));
    }

    /**
     * View method
     *
     * @param string|null $id Industry id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $industry = $this->Industry->get($id, [
            'contain' => ['Company']
        ]);

        $this->set('industry', $industry);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $industry = $this->Industry->newEntity();
        if ($this->request->is('post')) {
            $industry = $this->Industry->patchEntity($industry, $this->request->getData());
            if ($this->Industry->save($industry)) {
                $this->Flash->success(__('The industry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The industry could not be saved. Please, try again.'));
        }
        $this->set(compact('industry'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Industry id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $industry = $this->Industry->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $industry = $this->Industry->patchEntity($industry, $this->request->getData());
            if ($this->Industry->save($industry)) {
                $this->Flash->success(__('The industry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The industry could not be saved. Please, try again.'));
        }
        $this->set(compact('industry'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Industry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $industry = $this->Industry->get($id);
        if ($this->Industry->delete($industry)) {
            $this->Flash->success(__('The industry has been deleted.'));
        } else {
            $this->Flash->error(__('The industry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
