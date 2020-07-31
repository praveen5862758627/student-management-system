<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Myavailability Controller
 *
 * @property \App\Model\Table\MyavailabilityTable $Myavailability
 *
 * @method \App\Model\Entity\Myavailability[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MyavailabilityController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $myavailability = $this->paginate($this->Myavailability);

        $this->set(compact('myavailability'));
    }

    /**
     * View method
     *
     * @param string|null $id Myavailability id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $myavailability = $this->Myavailability->get($id, [
            'contain' => []
        ]);

        $this->set('myavailability', $myavailability);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $myavailability = $this->Myavailability->newEntity();
        if ($this->request->is('post')) {
            $myavailability = $this->Myavailability->patchEntity($myavailability, $this->request->getData());
            if ($this->Myavailability->save($myavailability)) {
                $this->Flash->success(__('The myavailability has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The myavailability could not be saved. Please, try again.'));
        }
        $this->set(compact('myavailability'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Myavailability id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $myavailability = $this->Myavailability->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $myavailability = $this->Myavailability->patchEntity($myavailability, $this->request->getData());
            if ($this->Myavailability->save($myavailability)) {
                $this->Flash->success(__('The myavailability has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The myavailability could not be saved. Please, try again.'));
        }
        $this->set(compact('myavailability'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Myavailability id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $myavailability = $this->Myavailability->get($id);
        if ($this->Myavailability->delete($myavailability)) {
            $this->Flash->success(__('The myavailability has been deleted.'));
        } else {
            $this->Flash->error(__('The myavailability could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
