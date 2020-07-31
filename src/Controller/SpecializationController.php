<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Specialization Controller
 *
 * @property \App\Model\Table\SpecializationTable $Specialization
 *
 * @method \App\Model\Entity\Specialization[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpecializationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $specialization = $this->paginate($this->Specialization);

        $this->set(compact('specialization'));
    }

    /**
     * View method
     *
     * @param string|null $id Specialization id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $specialization = $this->Specialization->get($id, [
            'contain' => []
        ]);

        $this->set('specialization', $specialization);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $specialization = $this->Specialization->newEntity();
        if ($this->request->is('post')) {
            $specialization = $this->Specialization->patchEntity($specialization, $this->request->getData());
            if ($this->Specialization->save($specialization)) {
                $this->Flash->success(__('The specialization has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The specialization could not be saved. Please, try again.'));
        }
        $this->set(compact('specialization'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Specialization id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $specialization = $this->Specialization->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specialization = $this->Specialization->patchEntity($specialization, $this->request->getData());
            if ($this->Specialization->save($specialization)) {
                $this->Flash->success(__('The specialization has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The specialization could not be saved. Please, try again.'));
        }
        $this->set(compact('specialization'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Specialization id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $specialization = $this->Specialization->get($id);
        if ($this->Specialization->delete($specialization)) {
            $this->Flash->success(__('The specialization has been deleted.'));
        } else {
            $this->Flash->error(__('The specialization could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
